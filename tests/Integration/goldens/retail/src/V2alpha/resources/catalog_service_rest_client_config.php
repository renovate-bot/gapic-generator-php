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
        'google.cloud.retail.v2alpha.CatalogService' => [
            'AddCatalogAttribute' => [
                'method' => 'post',
                'uriTemplate' => '/v2alpha/{attributes_config=projects/*/locations/*/catalogs/*/attributesConfig}:addCatalogAttribute',
                'body' => '*',
                'placeholders' => [
                    'attributes_config' => [
                        'getters' => [
                            'getAttributesConfig',
                        ],
                    ],
                ],
            ],
            'BatchRemoveCatalogAttributes' => [
                'method' => 'post',
                'uriTemplate' => '/v2alpha/{attributes_config=projects/*/locations/*/catalogs/*/attributesConfig}:batchRemoveCatalogAttributes',
                'body' => '*',
                'placeholders' => [
                    'attributes_config' => [
                        'getters' => [
                            'getAttributesConfig',
                        ],
                    ],
                ],
            ],
            'GetAttributesConfig' => [
                'method' => 'get',
                'uriTemplate' => '/v2alpha/{name=projects/*/locations/*/catalogs/*/attributesConfig}',
                'placeholders' => [
                    'name' => [
                        'getters' => [
                            'getName',
                        ],
                    ],
                ],
            ],
            'GetCompletionConfig' => [
                'method' => 'get',
                'uriTemplate' => '/v2alpha/{name=projects/*/locations/*/catalogs/*/completionConfig}',
                'placeholders' => [
                    'name' => [
                        'getters' => [
                            'getName',
                        ],
                    ],
                ],
            ],
            'GetDefaultBranch' => [
                'method' => 'get',
                'uriTemplate' => '/v2alpha/{catalog=projects/*/locations/*/catalogs/*}:getDefaultBranch',
                'placeholders' => [
                    'catalog' => [
                        'getters' => [
                            'getCatalog',
                        ],
                    ],
                ],
            ],
            'ListCatalogs' => [
                'method' => 'get',
                'uriTemplate' => '/v2alpha/{parent=projects/*/locations/*}/catalogs',
                'placeholders' => [
                    'parent' => [
                        'getters' => [
                            'getParent',
                        ],
                    ],
                ],
            ],
            'RemoveCatalogAttribute' => [
                'method' => 'post',
                'uriTemplate' => '/v2alpha/{attributes_config=projects/*/locations/*/catalogs/*/attributesConfig}:removeCatalogAttribute',
                'body' => '*',
                'placeholders' => [
                    'attributes_config' => [
                        'getters' => [
                            'getAttributesConfig',
                        ],
                    ],
                ],
            ],
            'ReplaceCatalogAttribute' => [
                'method' => 'post',
                'uriTemplate' => '/v2alpha/{attributes_config=projects/*/locations/*/catalogs/*/attributesConfig}:replaceCatalogAttribute',
                'body' => '*',
                'placeholders' => [
                    'attributes_config' => [
                        'getters' => [
                            'getAttributesConfig',
                        ],
                    ],
                ],
            ],
            'SetDefaultBranch' => [
                'method' => 'post',
                'uriTemplate' => '/v2alpha/{catalog=projects/*/locations/*/catalogs/*}:setDefaultBranch',
                'body' => '*',
                'placeholders' => [
                    'catalog' => [
                        'getters' => [
                            'getCatalog',
                        ],
                    ],
                ],
            ],
            'UpdateAttributesConfig' => [
                'method' => 'patch',
                'uriTemplate' => '/v2alpha/{attributes_config.name=projects/*/locations/*/catalogs/*/attributesConfig}',
                'body' => 'attributes_config',
                'placeholders' => [
                    'attributes_config.name' => [
                        'getters' => [
                            'getAttributesConfig',
                            'getName',
                        ],
                    ],
                ],
            ],
            'UpdateCatalog' => [
                'method' => 'patch',
                'uriTemplate' => '/v2alpha/{catalog.name=projects/*/locations/*/catalogs/*}',
                'body' => 'catalog',
                'placeholders' => [
                    'catalog.name' => [
                        'getters' => [
                            'getCatalog',
                            'getName',
                        ],
                    ],
                ],
            ],
            'UpdateCompletionConfig' => [
                'method' => 'patch',
                'uriTemplate' => '/v2alpha/{completion_config.name=projects/*/locations/*/catalogs/*/completionConfig}',
                'body' => 'completion_config',
                'placeholders' => [
                    'completion_config.name' => [
                        'getters' => [
                            'getCompletionConfig',
                            'getName',
                        ],
                    ],
                ],
            ],
        ],
        'google.longrunning.Operations' => [
            'GetOperation' => [
                'method' => 'get',
                'uriTemplate' => '/v2alpha/{name=projects/*/locations/*/catalogs/*/branches/*/operations/*}',
                'additionalBindings' => [
                    [
                        'method' => 'get',
                        'uriTemplate' => '/v2alpha/{name=projects/*/locations/*/catalogs/*/branches/*/places/*/operations/*}',
                    ],
                    [
                        'method' => 'get',
                        'uriTemplate' => '/v2alpha/{name=projects/*/locations/*/catalogs/*/operations/*}',
                    ],
                    [
                        'method' => 'get',
                        'uriTemplate' => '/v2alpha/{name=projects/*/locations/*/operations/*}',
                    ],
                    [
                        'method' => 'get',
                        'uriTemplate' => '/v2alpha/{name=projects/*/operations/*}',
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
            'ListOperations' => [
                'method' => 'get',
                'uriTemplate' => '/v2alpha/{name=projects/*/locations/*/catalogs/*}/operations',
                'additionalBindings' => [
                    [
                        'method' => 'get',
                        'uriTemplate' => '/v2alpha/{name=projects/*/locations/*}/operations',
                    ],
                    [
                        'method' => 'get',
                        'uriTemplate' => '/v2alpha/{name=projects/*}/operations',
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
