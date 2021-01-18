<?php
/*
 * Copyright 2020 Google LLC
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     https://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
declare(strict_types=1);

namespace Google\Generator\IntegrationTests;

class SourceComparer
{
    public static function compareJson(string $mono, string $micro): bool
    {
        $monoJson = json_decode($mono);
        $microJson = json_decode($micro);

        $sort = null;
        $sort = function($a) use(&$sort) {
            $a = (array)$a;
            ksort($a);
            return array_map(fn($x) => is_array($x) || is_object($x) ? $sort($x) : $x, $a);
        };

        $mono = $sort($monoJson);
        $micro = $sort($microJson);

        return static::compare(json_encode($mono, JSON_PRETTY_PRINT), json_encode($micro, JSON_PRETTY_PRINT));
    }

    public static function compare(string $mono, string $micro): bool
    {
        // Compare ignoring whitespace, except within strings.
        // Ignore '*' in comments.
        // Ignore trailing commas.
        $monoLen = strlen($mono);
        $microLen = strlen($micro);
        $monoPos = 0;
        $microPos = 0;
        $inString = false;
        $inComment = false;
        $skip = function($chars, $pos, $len) use(&$inComment) {
            if ($pos >= $len) return false;
            if (static::isWhitespace($chars[$pos])) return true;
            if ($inComment && $chars[$pos] === '*') return true;
            if (substr($chars, $pos, 2) === ",\n") return true;
            if (substr($chars, $pos - 1, 2) === '//') return true;
            if (substr($chars, $pos, 2) === '//') return true;
            return false;
        };
        while ($monoPos < $monoLen && $microPos < $microLen) {
            if ($mono[$monoPos] !== $micro[$microPos]) {
                while ($skip($mono, $monoPos, $monoLen)) $monoPos++;
                while ($skip($micro, $microPos, $microLen)) $microPos++;
                if ($monoPos >= $monoLen || $microPos >= $microLen) {
                    break;
                }
            }
            $c = $mono[$monoPos];
            if ($c !== $micro[$microPos]) {
                $lines = 5;
                for ($monoFrom = $monoPos, $c = 0; $c < $lines && $monoFrom > 0; $monoFrom--) $c += $mono[$monoFrom] === "\n" ? 1 : 0;
                for ($monoTo = $monoPos, $c = 0; $c < $lines && $monoTo < $monoLen; $monoTo++) $c += $mono[$monoTo] === "\n" ? 1 : 0;
                for ($microFrom = $microPos, $c = 0; $c < $lines && $microFrom > 0; $microFrom--) $c += $micro[$microFrom] === "\n" ? 1 : 0;
                for ($microTo = $microPos, $c = 0; $c < $lines && $microTo < $microLen; $microTo++) $c += $micro[$microTo] === "\n" ? 1 : 0;
                print("-----\nmono:\n");
                print(substr($mono, $monoFrom + 2, $monoTo - $monoFrom - 2));
                print("----- '{$mono[$monoPos]}' -> '{$micro[$microPos]}'\nmicro:\n");
                print(substr($micro, $microFrom + 2, $microTo - $microFrom - 2));
                print("-----\n");
                return false;
            }
            if ($c === '"') $inString = $inString === false ? '"' : ($inString === '"' ? false : $inString);
            elseif ($c === "'") $inString = $inString === false ? "'" : ($inString === "'" ? false : $inString);
            else if (!$inString) {
                if (!$inComment && substr($mono, $monoPos - 1, 2) === '/*') $inComment = true;
                elseif ($inComment && substr($mono, $monoPos - 1, 2) === '*/') $inComment = false;
            }
            $monoPos++;
            $microPos++;
        }
        while ($monoPos < $monoLen && static::isWhiteSpace($mono[$monoPos])) $monoPos++;
        while ($microPos < $microLen && static::isWhitespace($micro[$microPos])) $microPos++;
        if ($monoPos < $monoLen || $microPos < $microLen) {
            print("One file is a prefix of the other.\n");
            if ($monoPos < $monoLen) {
                print(substr($mono, $monoPos) . "\n");
            }
            return false;
        }
        return true;
    }

    private static function isWhitespace($c)
    {
        return $c === ' ' || $c === "\n" || $c === "\r";
    }
}
