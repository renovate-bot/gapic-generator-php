<?php
/*
 * Copyright 2025 Google LLC
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

/*
 * GENERATED CODE WARNING
 * This file was automatically generated - do not edit!
 */

return [
    'interfaces' => [
        'google.logging.v2.MetricsServiceV2' => [
            'CreateLogMetric' => [
                'method' => 'post',
                'uriTemplate' => '/v2/{parent=projects/*}/metrics',
                'body' => 'metric',
                'placeholders' => [
                    'parent' => [
                        'getters' => [
                            'getParent',
                        ],
                    ],
                ],
            ],
            'DeleteLogMetric' => [
                'method' => 'delete',
                'uriTemplate' => '/v2/{metric_name=projects/*/metrics/*}',
                'placeholders' => [
                    'metric_name' => [
                        'getters' => [
                            'getMetricName',
                        ],
                    ],
                ],
            ],
            'GetLogMetric' => [
                'method' => 'get',
                'uriTemplate' => '/v2/{metric_name=projects/*/metrics/*}',
                'placeholders' => [
                    'metric_name' => [
                        'getters' => [
                            'getMetricName',
                        ],
                    ],
                ],
            ],
            'ListLogMetrics' => [
                'method' => 'get',
                'uriTemplate' => '/v2/{parent=projects/*}/metrics',
                'placeholders' => [
                    'parent' => [
                        'getters' => [
                            'getParent',
                        ],
                    ],
                ],
            ],
            'UpdateLogMetric' => [
                'method' => 'put',
                'uriTemplate' => '/v2/{metric_name=projects/*/metrics/*}',
                'body' => 'metric',
                'placeholders' => [
                    'metric_name' => [
                        'getters' => [
                            'getMetricName',
                        ],
                    ],
                ],
            ],
        ],
    ],
];
