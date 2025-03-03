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

/** class that can fake any proto message sufficiently well for testing. */
class FakeMessage extends \Google\Protobuf\Internal\Message
{
    // DONE is a fake constant for the custom operation status enum.
    const DONE = 0;
    // RUNNING is a fake constant for the custom operation status enum.
    const RUNNING = 1;

    public function __construct()
    {
    }

    public function __call(string $name, array $arguments)
    {
        // Implement all getters and setters; to emulate a proto message class.
        // Note: This is fine if $name is shorter than 3 chars, as subtr returns a truncated or empty string.
        $prefix = substr($name, 0, 3);
        $suffix = substr($name, 3);
        switch ($prefix) {
            case 'set':
                $this->$suffix = $arguments[0];
                return $this;
            case 'get':
                // Always return an empty string as by default. If a special case is necessary we
                // can add (back) a default value function that switches on field name to handle it.
                return isset($this->$suffix) ? $this->$suffix : '';
            default:
                throw new \Exception("FakeMessage cannot handle method call: '{$name}'");
        }
    }

    public function serializeToString()
    {
        // This serialization does not need to be compatible with real proto serialization.
        $result = '';
        foreach ($this as $name => $value) {
            $v = serialize($value);
            $result .= $name . ':' . strval(strlen($v)) . ':' . $v;
        }
        return $result;
    }

    public function mergeFromString($s)
    {
        $pos = 0;
        while ($pos < strlen($s)) {
            $colon1 = strpos($s, ':', $pos);
            $colon2 = strpos($s, ':', $colon1 + 1);
            $name = substr($s, $pos, $colon1 - $pos);
            $valueLen = (int)substr($s, $colon1 + 1, $colon2 - $colon1 - 1);
            $value = unserialize(substr($s, $colon2 + 1, $valueLen));
            $this->$name = $value;
            $pos = $colon2 + 1 + $valueLen;
        }
    }
}

function protosOnDemandLoader($class)
{
    if (substr($class, 0, 8) === 'Testing\\' &&
        (strpos($class, 'Request') !== false || strpos($class, 'Response') !== false)) {
        // Create an alias to `FakeMessage` for any non-existant class that looks like it's a proto message class.
        $classAlias = FakeMessage::class;

        $parts = explode('\\', $class);
        $fragment = sprintf('%s/ProtoTests/%s/out/fragments/%s.build.txt', __DIR__, $parts[1], implode('/', $parts));

        // if a "build" fragment exists, create an anonymous class with the build method
        if (file_exists($fragment)) {
            $classAlias = get_class(eval(sprintf(
                'return new class() extends FakeMessage { %s };',
                file_get_contents($fragment)
            )));
        }
        class_alias($classAlias, $class);
    }
}

// Use a custom autoloader to produce fake proto message classes for tests.
spl_autoload_register('protosOnDemandLoader', true);
