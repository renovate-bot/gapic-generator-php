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
        'google.logging.v2.ConfigServiceV2' => [
            'CopyLogEntries' => [
                'method' => 'post',
                'uriTemplate' => '/v2/entries:copy',
                'body' => '*',
            ],
            'CreateBucket' => [
                'method' => 'post',
                'uriTemplate' => '/v2/{parent=*/*/locations/*}/buckets',
                'body' => 'bucket',
                'additionalBindings' => [
                    [
                        'method' => 'post',
                        'uriTemplate' => '/v2/{parent=projects/*/locations/*}/buckets',
                        'body' => 'bucket',
                        'queryParams' => [
                            'bucket_id',
                        ],
                    ],
                    [
                        'method' => 'post',
                        'uriTemplate' => '/v2/{parent=organizations/*/locations/*}/buckets',
                        'body' => 'bucket',
                        'queryParams' => [
                            'bucket_id',
                        ],
                    ],
                    [
                        'method' => 'post',
                        'uriTemplate' => '/v2/{parent=folders/*/locations/*}/buckets',
                        'body' => 'bucket',
                        'queryParams' => [
                            'bucket_id',
                        ],
                    ],
                    [
                        'method' => 'post',
                        'uriTemplate' => '/v2/{parent=billingAccounts/*/locations/*}/buckets',
                        'body' => 'bucket',
                        'queryParams' => [
                            'bucket_id',
                        ],
                    ],
                ],
                'placeholders' => [
                    'parent' => [
                        'getters' => [
                            'getParent',
                        ],
                    ],
                ],
                'queryParams' => [
                    'bucket_id',
                ],
            ],
            'CreateBucketAsync' => [
                'method' => 'post',
                'uriTemplate' => '/v2/{parent=*/*/locations/*}/buckets:createAsync',
                'body' => 'bucket',
                'additionalBindings' => [
                    [
                        'method' => 'post',
                        'uriTemplate' => '/v2/{parent=projects/*/locations/*}/buckets:createAsync',
                        'body' => 'bucket',
                    ],
                    [
                        'method' => 'post',
                        'uriTemplate' => '/v2/{parent=organizations/*/locations/*}/buckets:createAsync',
                        'body' => 'bucket',
                    ],
                    [
                        'method' => 'post',
                        'uriTemplate' => '/v2/{parent=folders/*/locations/*}/buckets:createAsync',
                        'body' => 'bucket',
                    ],
                    [
                        'method' => 'post',
                        'uriTemplate' => '/v2/{parent=billingAccounts/*/locations/*}/buckets:createAsync',
                        'body' => 'bucket',
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
            'CreateExclusion' => [
                'method' => 'post',
                'uriTemplate' => '/v2/{parent=*/*}/exclusions',
                'body' => 'exclusion',
                'additionalBindings' => [
                    [
                        'method' => 'post',
                        'uriTemplate' => '/v2/{parent=projects/*}/exclusions',
                        'body' => 'exclusion',
                    ],
                    [
                        'method' => 'post',
                        'uriTemplate' => '/v2/{parent=organizations/*}/exclusions',
                        'body' => 'exclusion',
                    ],
                    [
                        'method' => 'post',
                        'uriTemplate' => '/v2/{parent=folders/*}/exclusions',
                        'body' => 'exclusion',
                    ],
                    [
                        'method' => 'post',
                        'uriTemplate' => '/v2/{parent=billingAccounts/*}/exclusions',
                        'body' => 'exclusion',
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
            'CreateLink' => [
                'method' => 'post',
                'uriTemplate' => '/v2/{parent=*/*/locations/*/buckets/*}/links',
                'body' => 'link',
                'additionalBindings' => [
                    [
                        'method' => 'post',
                        'uriTemplate' => '/v2/{parent=projects/*/locations/*/buckets/*}/links',
                        'body' => 'link',
                        'queryParams' => [
                            'link_id',
                        ],
                    ],
                    [
                        'method' => 'post',
                        'uriTemplate' => '/v2/{parent=organizations/*/locations/*/buckets/*}/links',
                        'body' => 'link',
                        'queryParams' => [
                            'link_id',
                        ],
                    ],
                    [
                        'method' => 'post',
                        'uriTemplate' => '/v2/{parent=folders/*/locations/*/buckets/*}/links',
                        'body' => 'link',
                        'queryParams' => [
                            'link_id',
                        ],
                    ],
                    [
                        'method' => 'post',
                        'uriTemplate' => '/v2/{parent=billingAccounts/*/locations/*/buckets/*}/links',
                        'body' => 'link',
                        'queryParams' => [
                            'link_id',
                        ],
                    ],
                ],
                'placeholders' => [
                    'parent' => [
                        'getters' => [
                            'getParent',
                        ],
                    ],
                ],
                'queryParams' => [
                    'link_id',
                ],
            ],
            'CreateSink' => [
                'method' => 'post',
                'uriTemplate' => '/v2/{parent=*/*}/sinks',
                'body' => 'sink',
                'additionalBindings' => [
                    [
                        'method' => 'post',
                        'uriTemplate' => '/v2/{parent=projects/*}/sinks',
                        'body' => 'sink',
                    ],
                    [
                        'method' => 'post',
                        'uriTemplate' => '/v2/{parent=organizations/*}/sinks',
                        'body' => 'sink',
                    ],
                    [
                        'method' => 'post',
                        'uriTemplate' => '/v2/{parent=folders/*}/sinks',
                        'body' => 'sink',
                    ],
                    [
                        'method' => 'post',
                        'uriTemplate' => '/v2/{parent=billingAccounts/*}/sinks',
                        'body' => 'sink',
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
            'CreateView' => [
                'method' => 'post',
                'uriTemplate' => '/v2/{parent=*/*/locations/*/buckets/*}/views',
                'body' => 'view',
                'additionalBindings' => [
                    [
                        'method' => 'post',
                        'uriTemplate' => '/v2/{parent=projects/*/locations/*/buckets/*}/views',
                        'body' => 'view',
                        'queryParams' => [
                            'view_id',
                        ],
                    ],
                    [
                        'method' => 'post',
                        'uriTemplate' => '/v2/{parent=organizations/*/locations/*/buckets/*}/views',
                        'body' => 'view',
                        'queryParams' => [
                            'view_id',
                        ],
                    ],
                    [
                        'method' => 'post',
                        'uriTemplate' => '/v2/{parent=folders/*/locations/*/buckets/*}/views',
                        'body' => 'view',
                        'queryParams' => [
                            'view_id',
                        ],
                    ],
                    [
                        'method' => 'post',
                        'uriTemplate' => '/v2/{parent=billingAccounts/*/locations/*/buckets/*}/views',
                        'body' => 'view',
                        'queryParams' => [
                            'view_id',
                        ],
                    ],
                ],
                'placeholders' => [
                    'parent' => [
                        'getters' => [
                            'getParent',
                        ],
                    ],
                ],
                'queryParams' => [
                    'view_id',
                ],
            ],
            'DeleteBucket' => [
                'method' => 'delete',
                'uriTemplate' => '/v2/{name=*/*/locations/*/buckets/*}',
                'additionalBindings' => [
                    [
                        'method' => 'delete',
                        'uriTemplate' => '/v2/{name=projects/*/locations/*/buckets/*}',
                    ],
                    [
                        'method' => 'delete',
                        'uriTemplate' => '/v2/{name=organizations/*/locations/*/buckets/*}',
                    ],
                    [
                        'method' => 'delete',
                        'uriTemplate' => '/v2/{name=folders/*/locations/*/buckets/*}',
                    ],
                    [
                        'method' => 'delete',
                        'uriTemplate' => '/v2/{name=billingAccounts/*/locations/*/buckets/*}',
                    ],
                ],
                'placeholders' => [
                    'name' => [
                        'getters' => [
                            'getName',
                        ],
                    ],
                ],
            ],
            'DeleteExclusion' => [
                'method' => 'delete',
                'uriTemplate' => '/v2/{name=*/*/exclusions/*}',
                'additionalBindings' => [
                    [
                        'method' => 'delete',
                        'uriTemplate' => '/v2/{name=projects/*/exclusions/*}',
                    ],
                    [
                        'method' => 'delete',
                        'uriTemplate' => '/v2/{name=organizations/*/exclusions/*}',
                    ],
                    [
                        'method' => 'delete',
                        'uriTemplate' => '/v2/{name=folders/*/exclusions/*}',
                    ],
                    [
                        'method' => 'delete',
                        'uriTemplate' => '/v2/{name=billingAccounts/*/exclusions/*}',
                    ],
                ],
                'placeholders' => [
                    'name' => [
                        'getters' => [
                            'getName',
                        ],
                    ],
                ],
            ],
            'DeleteLink' => [
                'method' => 'delete',
                'uriTemplate' => '/v2/{name=*/*/locations/*/buckets/*/links/*}',
                'additionalBindings' => [
                    [
                        'method' => 'delete',
                        'uriTemplate' => '/v2/{name=projects/*/locations/*/buckets/*/links/*}',
                    ],
                    [
                        'method' => 'delete',
                        'uriTemplate' => '/v2/{name=organizations/*/locations/*/buckets/*/links/*}',
                    ],
                    [
                        'method' => 'delete',
                        'uriTemplate' => '/v2/{name=folders/*/locations/*/buckets/*/links/*}',
                    ],
                    [
                        'method' => 'delete',
                        'uriTemplate' => '/v2/{name=billingAccounts/*/locations/*/buckets/*/links/*}',
                    ],
                ],
                'placeholders' => [
                    'name' => [
                        'getters' => [
                            'getName',
                        ],
                    ],
                ],
            ],
            'DeleteSink' => [
                'method' => 'delete',
                'uriTemplate' => '/v2/{sink_name=*/*/sinks/*}',
                'additionalBindings' => [
                    [
                        'method' => 'delete',
                        'uriTemplate' => '/v2/{sink_name=projects/*/sinks/*}',
                    ],
                    [
                        'method' => 'delete',
                        'uriTemplate' => '/v2/{sink_name=organizations/*/sinks/*}',
                    ],
                    [
                        'method' => 'delete',
                        'uriTemplate' => '/v2/{sink_name=folders/*/sinks/*}',
                    ],
                    [
                        'method' => 'delete',
                        'uriTemplate' => '/v2/{sink_name=billingAccounts/*/sinks/*}',
                    ],
                ],
                'placeholders' => [
                    'sink_name' => [
                        'getters' => [
                            'getSinkName',
                        ],
                    ],
                ],
            ],
            'DeleteView' => [
                'method' => 'delete',
                'uriTemplate' => '/v2/{name=*/*/locations/*/buckets/*/views/*}',
                'additionalBindings' => [
                    [
                        'method' => 'delete',
                        'uriTemplate' => '/v2/{name=projects/*/locations/*/buckets/*/views/*}',
                    ],
                    [
                        'method' => 'delete',
                        'uriTemplate' => '/v2/{name=organizations/*/locations/*/buckets/*/views/*}',
                    ],
                    [
                        'method' => 'delete',
                        'uriTemplate' => '/v2/{name=folders/*/locations/*/buckets/*/views/*}',
                    ],
                    [
                        'method' => 'delete',
                        'uriTemplate' => '/v2/{name=billingAccounts/*/locations/*/buckets/*/views/*}',
                    ],
                ],
                'placeholders' => [
                    'name' => [
                        'getters' => [
                            'getName',
                        ],
                    ],
                ],
            ],
            'GetBucket' => [
                'method' => 'get',
                'uriTemplate' => '/v2/{name=*/*/locations/*/buckets/*}',
                'additionalBindings' => [
                    [
                        'method' => 'get',
                        'uriTemplate' => '/v2/{name=projects/*/locations/*/buckets/*}',
                    ],
                    [
                        'method' => 'get',
                        'uriTemplate' => '/v2/{name=organizations/*/locations/*/buckets/*}',
                    ],
                    [
                        'method' => 'get',
                        'uriTemplate' => '/v2/{name=folders/*/locations/*/buckets/*}',
                    ],
                    [
                        'method' => 'get',
                        'uriTemplate' => '/v2/{name=billingAccounts/*/locations/*/buckets/*}',
                    ],
                ],
                'placeholders' => [
                    'name' => [
                        'getters' => [
                            'getName',
                        ],
                    ],
                ],
            ],
            'GetCmekSettings' => [
                'method' => 'get',
                'uriTemplate' => '/v2/{name=*/*}/cmekSettings',
                'additionalBindings' => [
                    [
                        'method' => 'get',
                        'uriTemplate' => '/v2/{name=projects/*}/cmekSettings',
                    ],
                    [
                        'method' => 'get',
                        'uriTemplate' => '/v2/{name=organizations/*}/cmekSettings',
                    ],
                    [
                        'method' => 'get',
                        'uriTemplate' => '/v2/{name=folders/*}/cmekSettings',
                    ],
                    [
                        'method' => 'get',
                        'uriTemplate' => '/v2/{name=billingAccounts/*}/cmekSettings',
                    ],
                ],
                'placeholders' => [
                    'name' => [
                        'getters' => [
                            'getName',
                        ],
                    ],
                ],
            ],
            'GetExclusion' => [
                'method' => 'get',
                'uriTemplate' => '/v2/{name=*/*/exclusions/*}',
                'additionalBindings' => [
                    [
                        'method' => 'get',
                        'uriTemplate' => '/v2/{name=projects/*/exclusions/*}',
                    ],
                    [
                        'method' => 'get',
                        'uriTemplate' => '/v2/{name=organizations/*/exclusions/*}',
                    ],
                    [
                        'method' => 'get',
                        'uriTemplate' => '/v2/{name=folders/*/exclusions/*}',
                    ],
                    [
                        'method' => 'get',
                        'uriTemplate' => '/v2/{name=billingAccounts/*/exclusions/*}',
                    ],
                ],
                'placeholders' => [
                    'name' => [
                        'getters' => [
                            'getName',
                        ],
                    ],
                ],
            ],
            'GetLink' => [
                'method' => 'get',
                'uriTemplate' => '/v2/{name=*/*/locations/*/buckets/*/links/*}',
                'additionalBindings' => [
                    [
                        'method' => 'get',
                        'uriTemplate' => '/v2/{name=projects/*/locations/*/buckets/*/links/*}',
                    ],
                    [
                        'method' => 'get',
                        'uriTemplate' => '/v2/{name=organizations/*/locations/*/buckets/*/links/*}',
                    ],
                    [
                        'method' => 'get',
                        'uriTemplate' => '/v2/{name=folders/*/locations/*/buckets/*/links/*}',
                    ],
                    [
                        'method' => 'get',
                        'uriTemplate' => '/v2/{name=billingAccounts/*/locations/*/buckets/*/links/*}',
                    ],
                ],
                'placeholders' => [
                    'name' => [
                        'getters' => [
                            'getName',
                        ],
                    ],
                ],
            ],
            'GetSettings' => [
                'method' => 'get',
                'uriTemplate' => '/v2/{name=*/*}/settings',
                'additionalBindings' => [
                    [
                        'method' => 'get',
                        'uriTemplate' => '/v2/{name=projects/*}/settings',
                    ],
                    [
                        'method' => 'get',
                        'uriTemplate' => '/v2/{name=organizations/*}/settings',
                    ],
                    [
                        'method' => 'get',
                        'uriTemplate' => '/v2/{name=folders/*}/settings',
                    ],
                    [
                        'method' => 'get',
                        'uriTemplate' => '/v2/{name=billingAccounts/*}/settings',
                    ],
                ],
                'placeholders' => [
                    'name' => [
                        'getters' => [
                            'getName',
                        ],
                    ],
                ],
            ],
            'GetSink' => [
                'method' => 'get',
                'uriTemplate' => '/v2/{sink_name=*/*/sinks/*}',
                'additionalBindings' => [
                    [
                        'method' => 'get',
                        'uriTemplate' => '/v2/{sink_name=projects/*/sinks/*}',
                    ],
                    [
                        'method' => 'get',
                        'uriTemplate' => '/v2/{sink_name=organizations/*/sinks/*}',
                    ],
                    [
                        'method' => 'get',
                        'uriTemplate' => '/v2/{sink_name=folders/*/sinks/*}',
                    ],
                    [
                        'method' => 'get',
                        'uriTemplate' => '/v2/{sink_name=billingAccounts/*/sinks/*}',
                    ],
                ],
                'placeholders' => [
                    'sink_name' => [
                        'getters' => [
                            'getSinkName',
                        ],
                    ],
                ],
            ],
            'GetView' => [
                'method' => 'get',
                'uriTemplate' => '/v2/{name=*/*/locations/*/buckets/*/views/*}',
                'additionalBindings' => [
                    [
                        'method' => 'get',
                        'uriTemplate' => '/v2/{name=projects/*/locations/*/buckets/*/views/*}',
                    ],
                    [
                        'method' => 'get',
                        'uriTemplate' => '/v2/{name=organizations/*/locations/*/buckets/*/views/*}',
                    ],
                    [
                        'method' => 'get',
                        'uriTemplate' => '/v2/{name=folders/*/locations/*/buckets/*/views/*}',
                    ],
                    [
                        'method' => 'get',
                        'uriTemplate' => '/v2/{name=billingAccounts/*/locations/*/buckets/*/views/*}',
                    ],
                ],
                'placeholders' => [
                    'name' => [
                        'getters' => [
                            'getName',
                        ],
                    ],
                ],
            ],
            'ListBuckets' => [
                'method' => 'get',
                'uriTemplate' => '/v2/{parent=*/*/locations/*}/buckets',
                'additionalBindings' => [
                    [
                        'method' => 'get',
                        'uriTemplate' => '/v2/{parent=projects/*/locations/*}/buckets',
                    ],
                    [
                        'method' => 'get',
                        'uriTemplate' => '/v2/{parent=organizations/*/locations/*}/buckets',
                    ],
                    [
                        'method' => 'get',
                        'uriTemplate' => '/v2/{parent=folders/*/locations/*}/buckets',
                    ],
                    [
                        'method' => 'get',
                        'uriTemplate' => '/v2/{parent=billingAccounts/*/locations/*}/buckets',
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
            'ListExclusions' => [
                'method' => 'get',
                'uriTemplate' => '/v2/{parent=*/*}/exclusions',
                'additionalBindings' => [
                    [
                        'method' => 'get',
                        'uriTemplate' => '/v2/{parent=projects/*}/exclusions',
                    ],
                    [
                        'method' => 'get',
                        'uriTemplate' => '/v2/{parent=organizations/*}/exclusions',
                    ],
                    [
                        'method' => 'get',
                        'uriTemplate' => '/v2/{parent=folders/*}/exclusions',
                    ],
                    [
                        'method' => 'get',
                        'uriTemplate' => '/v2/{parent=billingAccounts/*}/exclusions',
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
            'ListLinks' => [
                'method' => 'get',
                'uriTemplate' => '/v2/{parent=*/*/locations/*/buckets/*}/links',
                'additionalBindings' => [
                    [
                        'method' => 'get',
                        'uriTemplate' => '/v2/{parent=projects/*/locations/*/buckets/*}/links',
                    ],
                    [
                        'method' => 'get',
                        'uriTemplate' => '/v2/{parent=organizations/*/locations/*/buckets/*}/links',
                    ],
                    [
                        'method' => 'get',
                        'uriTemplate' => '/v2/{parent=folders/*/locations/*/buckets/*}/links',
                    ],
                    [
                        'method' => 'get',
                        'uriTemplate' => '/v2/{parent=billingAccounts/*/locations/*/buckets/*}/links',
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
            'ListSinks' => [
                'method' => 'get',
                'uriTemplate' => '/v2/{parent=*/*}/sinks',
                'additionalBindings' => [
                    [
                        'method' => 'get',
                        'uriTemplate' => '/v2/{parent=projects/*}/sinks',
                    ],
                    [
                        'method' => 'get',
                        'uriTemplate' => '/v2/{parent=organizations/*}/sinks',
                    ],
                    [
                        'method' => 'get',
                        'uriTemplate' => '/v2/{parent=folders/*}/sinks',
                    ],
                    [
                        'method' => 'get',
                        'uriTemplate' => '/v2/{parent=billingAccounts/*}/sinks',
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
            'ListViews' => [
                'method' => 'get',
                'uriTemplate' => '/v2/{parent=*/*/locations/*/buckets/*}/views',
                'additionalBindings' => [
                    [
                        'method' => 'get',
                        'uriTemplate' => '/v2/{parent=projects/*/locations/*/buckets/*}/views',
                    ],
                    [
                        'method' => 'get',
                        'uriTemplate' => '/v2/{parent=organizations/*/locations/*/buckets/*}/views',
                    ],
                    [
                        'method' => 'get',
                        'uriTemplate' => '/v2/{parent=folders/*/locations/*/buckets/*}/views',
                    ],
                    [
                        'method' => 'get',
                        'uriTemplate' => '/v2/{parent=billingAccounts/*/locations/*/buckets/*}/views',
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
            'UndeleteBucket' => [
                'method' => 'post',
                'uriTemplate' => '/v2/{name=*/*/locations/*/buckets/*}:undelete',
                'body' => '*',
                'additionalBindings' => [
                    [
                        'method' => 'post',
                        'uriTemplate' => '/v2/{name=projects/*/locations/*/buckets/*}:undelete',
                        'body' => '*',
                    ],
                    [
                        'method' => 'post',
                        'uriTemplate' => '/v2/{name=organizations/*/locations/*/buckets/*}:undelete',
                        'body' => '*',
                    ],
                    [
                        'method' => 'post',
                        'uriTemplate' => '/v2/{name=folders/*/locations/*/buckets/*}:undelete',
                        'body' => '*',
                    ],
                    [
                        'method' => 'post',
                        'uriTemplate' => '/v2/{name=billingAccounts/*/locations/*/buckets/*}:undelete',
                        'body' => '*',
                    ],
                ],
                'placeholders' => [
                    'name' => [
                        'getters' => [
                            'getName',
                        ],
                    ],
                ],
            ],
            'UpdateBucket' => [
                'method' => 'patch',
                'uriTemplate' => '/v2/{name=*/*/locations/*/buckets/*}',
                'body' => 'bucket',
                'additionalBindings' => [
                    [
                        'method' => 'patch',
                        'uriTemplate' => '/v2/{name=projects/*/locations/*/buckets/*}',
                        'body' => 'bucket',
                        'queryParams' => [
                            'update_mask',
                        ],
                    ],
                    [
                        'method' => 'patch',
                        'uriTemplate' => '/v2/{name=organizations/*/locations/*/buckets/*}',
                        'body' => 'bucket',
                        'queryParams' => [
                            'update_mask',
                        ],
                    ],
                    [
                        'method' => 'patch',
                        'uriTemplate' => '/v2/{name=folders/*/locations/*/buckets/*}',
                        'body' => 'bucket',
                        'queryParams' => [
                            'update_mask',
                        ],
                    ],
                    [
                        'method' => 'patch',
                        'uriTemplate' => '/v2/{name=billingAccounts/*/locations/*/buckets/*}',
                        'body' => 'bucket',
                        'queryParams' => [
                            'update_mask',
                        ],
                    ],
                ],
                'placeholders' => [
                    'name' => [
                        'getters' => [
                            'getName',
                        ],
                    ],
                ],
                'queryParams' => [
                    'update_mask',
                ],
            ],
            'UpdateBucketAsync' => [
                'method' => 'post',
                'uriTemplate' => '/v2/{name=*/*/locations/*/buckets/*}:updateAsync',
                'body' => 'bucket',
                'additionalBindings' => [
                    [
                        'method' => 'post',
                        'uriTemplate' => '/v2/{name=projects/*/locations/*/buckets/*}:updateAsync',
                        'body' => 'bucket',
                    ],
                    [
                        'method' => 'post',
                        'uriTemplate' => '/v2/{name=organizations/*/locations/*/buckets/*}:updateAsync',
                        'body' => 'bucket',
                    ],
                    [
                        'method' => 'post',
                        'uriTemplate' => '/v2/{name=folders/*/locations/*/buckets/*}:updateAsync',
                        'body' => 'bucket',
                    ],
                    [
                        'method' => 'post',
                        'uriTemplate' => '/v2/{name=billingAccounts/*/locations/*/buckets/*}:updateAsync',
                        'body' => 'bucket',
                    ],
                ],
                'placeholders' => [
                    'name' => [
                        'getters' => [
                            'getName',
                        ],
                    ],
                ],
            ],
            'UpdateCmekSettings' => [
                'method' => 'patch',
                'uriTemplate' => '/v2/{name=*/*}/cmekSettings',
                'body' => 'cmek_settings',
                'additionalBindings' => [
                    [
                        'method' => 'patch',
                        'uriTemplate' => '/v2/{name=organizations/*}/cmekSettings',
                        'body' => 'cmek_settings',
                    ],
                ],
                'placeholders' => [
                    'name' => [
                        'getters' => [
                            'getName',
                        ],
                    ],
                ],
            ],
            'UpdateExclusion' => [
                'method' => 'patch',
                'uriTemplate' => '/v2/{name=*/*/exclusions/*}',
                'body' => 'exclusion',
                'additionalBindings' => [
                    [
                        'method' => 'patch',
                        'uriTemplate' => '/v2/{name=projects/*/exclusions/*}',
                        'body' => 'exclusion',
                        'queryParams' => [
                            'update_mask',
                        ],
                    ],
                    [
                        'method' => 'patch',
                        'uriTemplate' => '/v2/{name=organizations/*/exclusions/*}',
                        'body' => 'exclusion',
                        'queryParams' => [
                            'update_mask',
                        ],
                    ],
                    [
                        'method' => 'patch',
                        'uriTemplate' => '/v2/{name=folders/*/exclusions/*}',
                        'body' => 'exclusion',
                        'queryParams' => [
                            'update_mask',
                        ],
                    ],
                    [
                        'method' => 'patch',
                        'uriTemplate' => '/v2/{name=billingAccounts/*/exclusions/*}',
                        'body' => 'exclusion',
                        'queryParams' => [
                            'update_mask',
                        ],
                    ],
                ],
                'placeholders' => [
                    'name' => [
                        'getters' => [
                            'getName',
                        ],
                    ],
                ],
                'queryParams' => [
                    'update_mask',
                ],
            ],
            'UpdateSettings' => [
                'method' => 'patch',
                'uriTemplate' => '/v2/{name=*/*}/settings',
                'body' => 'settings',
                'additionalBindings' => [
                    [
                        'method' => 'patch',
                        'uriTemplate' => '/v2/{name=organizations/*}/settings',
                        'body' => 'settings',
                    ],
                    [
                        'method' => 'patch',
                        'uriTemplate' => '/v2/{name=folders/*}/settings',
                        'body' => 'settings',
                    ],
                ],
                'placeholders' => [
                    'name' => [
                        'getters' => [
                            'getName',
                        ],
                    ],
                ],
            ],
            'UpdateSink' => [
                'method' => 'put',
                'uriTemplate' => '/v2/{sink_name=*/*/sinks/*}',
                'body' => 'sink',
                'additionalBindings' => [
                    [
                        'method' => 'put',
                        'uriTemplate' => '/v2/{sink_name=projects/*/sinks/*}',
                        'body' => 'sink',
                    ],
                    [
                        'method' => 'put',
                        'uriTemplate' => '/v2/{sink_name=organizations/*/sinks/*}',
                        'body' => 'sink',
                    ],
                    [
                        'method' => 'put',
                        'uriTemplate' => '/v2/{sink_name=folders/*/sinks/*}',
                        'body' => 'sink',
                    ],
                    [
                        'method' => 'put',
                        'uriTemplate' => '/v2/{sink_name=billingAccounts/*/sinks/*}',
                        'body' => 'sink',
                    ],
                    [
                        'method' => 'patch',
                        'uriTemplate' => '/v2/{sink_name=projects/*/sinks/*}',
                        'body' => 'sink',
                    ],
                    [
                        'method' => 'patch',
                        'uriTemplate' => '/v2/{sink_name=organizations/*/sinks/*}',
                        'body' => 'sink',
                    ],
                    [
                        'method' => 'patch',
                        'uriTemplate' => '/v2/{sink_name=folders/*/sinks/*}',
                        'body' => 'sink',
                    ],
                    [
                        'method' => 'patch',
                        'uriTemplate' => '/v2/{sink_name=billingAccounts/*/sinks/*}',
                        'body' => 'sink',
                    ],
                ],
                'placeholders' => [
                    'sink_name' => [
                        'getters' => [
                            'getSinkName',
                        ],
                    ],
                ],
            ],
            'UpdateView' => [
                'method' => 'patch',
                'uriTemplate' => '/v2/{name=*/*/locations/*/buckets/*/views/*}',
                'body' => 'view',
                'additionalBindings' => [
                    [
                        'method' => 'patch',
                        'uriTemplate' => '/v2/{name=projects/*/locations/*/buckets/*/views/*}',
                        'body' => 'view',
                    ],
                    [
                        'method' => 'patch',
                        'uriTemplate' => '/v2/{name=organizations/*/locations/*/buckets/*/views/*}',
                        'body' => 'view',
                    ],
                    [
                        'method' => 'patch',
                        'uriTemplate' => '/v2/{name=folders/*/locations/*/buckets/*/views/*}',
                        'body' => 'view',
                    ],
                    [
                        'method' => 'patch',
                        'uriTemplate' => '/v2/{name=billingAccounts/*/locations/*/buckets/*/views/*}',
                        'body' => 'view',
                    ],
                ],
                'placeholders' => [
                    'name' => [
                        'getters' => [
                            'getName',
                        ],
                    ],
                ],
            ],
        ],
    ],
];
