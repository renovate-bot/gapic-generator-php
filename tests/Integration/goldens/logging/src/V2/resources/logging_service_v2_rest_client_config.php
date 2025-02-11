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
        'google.logging.v2.LoggingServiceV2' => [
            'DeleteLog' => [
                'method' => 'delete',
                'uriTemplate' => '/v2/{log_name=projects/*/logs/*}',
                'additionalBindings' => [
                    [
                        'method' => 'delete',
                        'uriTemplate' => '/v2/{log_name=*/*/logs/*}',
                    ],
                    [
                        'method' => 'delete',
                        'uriTemplate' => '/v2/{log_name=organizations/*/logs/*}',
                    ],
                    [
                        'method' => 'delete',
                        'uriTemplate' => '/v2/{log_name=folders/*/logs/*}',
                    ],
                    [
                        'method' => 'delete',
                        'uriTemplate' => '/v2/{log_name=billingAccounts/*/logs/*}',
                    ],
                ],
                'placeholders' => [
                    'log_name' => [
                        'getters' => [
                            'getLogName',
                        ],
                    ],
                ],
            ],
            'ListLogEntries' => [
                'method' => 'post',
                'uriTemplate' => '/v2/entries:list',
                'body' => '*',
            ],
            'ListLogs' => [
                'method' => 'get',
                'uriTemplate' => '/v2/{parent=*/*}/logs',
                'additionalBindings' => [
                    [
                        'method' => 'get',
                        'uriTemplate' => '/v2/{parent=projects/*}/logs',
                    ],
                    [
                        'method' => 'get',
                        'uriTemplate' => '/v2/{parent=organizations/*}/logs',
                    ],
                    [
                        'method' => 'get',
                        'uriTemplate' => '/v2/{parent=folders/*}/logs',
                    ],
                    [
                        'method' => 'get',
                        'uriTemplate' => '/v2/{parent=billingAccounts/*}/logs',
                    ],
                    [
                        'method' => 'get',
                        'uriTemplate' => '/v2/{parent=projects/*/locations/*/buckets/*/views/*}/logs',
                    ],
                    [
                        'method' => 'get',
                        'uriTemplate' => '/v2/{parent=organizations/*/locations/*/buckets/*/views/*}/logs',
                    ],
                    [
                        'method' => 'get',
                        'uriTemplate' => '/v2/{parent=folders/*/locations/*/buckets/*/views/*}/logs',
                    ],
                    [
                        'method' => 'get',
                        'uriTemplate' => '/v2/{parent=billingAccounts/*/locations/*/buckets/*/views/*}/logs',
                    ],
                ],
                'placeholders' => [
                    'parent' => [
                        'getters' => [
                            'getParent',
                        ],
                    ],
                ],
            ],
            'ListMonitoredResourceDescriptors' => [
                'method' => 'get',
                'uriTemplate' => '/v2/monitoredResourceDescriptors',
            ],
            'WriteLogEntries' => [
                'method' => 'post',
                'uriTemplate' => '/v2/entries:write',
                'body' => '*',
            ],
        ],
    ],
];
