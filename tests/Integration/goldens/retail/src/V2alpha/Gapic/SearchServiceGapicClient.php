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
 * Generated by gapic-generator-php from the file
 * https://github.com/googleapis/googleapis/blob/master/google/cloud/retail/v2alpha/search_service.proto
 * Updates to the above are reflected here through a refresh process.
 *
 * @experimental
 */

namespace Google\Cloud\Retail\V2alpha\Gapic;

use Google\ApiCore\ApiException;
use Google\ApiCore\CredentialsWrapper;
use Google\ApiCore\GapicClientTrait;
use Google\ApiCore\PathTemplate;
use Google\ApiCore\RequestParamsHeaderDescriptor;
use Google\ApiCore\RetrySettings;
use Google\ApiCore\Transport\TransportInterface;
use Google\ApiCore\ValidationException;
use Google\Auth\FetchAuthTokenInterface;
use Google\Cloud\Retail\V2alpha\SearchRequest;
use Google\Cloud\Retail\V2alpha\SearchRequest\BoostSpec;
use Google\Cloud\Retail\V2alpha\SearchRequest\DynamicFacetSpec;
use Google\Cloud\Retail\V2alpha\SearchRequest\FacetSpec;
use Google\Cloud\Retail\V2alpha\SearchRequest\PersonalizationSpec;
use Google\Cloud\Retail\V2alpha\SearchRequest\QueryExpansionSpec;
use Google\Cloud\Retail\V2alpha\SearchRequest\RelevanceThreshold;
use Google\Cloud\Retail\V2alpha\SearchRequest\SpellCorrectionSpec;
use Google\Cloud\Retail\V2alpha\SearchResponse;
use Google\Cloud\Retail\V2alpha\UserInfo;

/**
 * Service Description: Service for search.
 *
 * This feature is only available for users who have Retail Search enabled.
 * Enable Retail Search on Cloud Console before using this feature.
 *
 * This class provides the ability to make remote calls to the backing service through method
 * calls that map to API methods. Sample code to get started:
 *
 * ```
 * $searchServiceClient = new SearchServiceClient();
 * try {
 *     $placement = 'placement';
 *     $visitorId = 'visitor_id';
 *     // Iterate over pages of elements
 *     $pagedResponse = $searchServiceClient->search($placement, $visitorId);
 *     foreach ($pagedResponse->iteratePages() as $page) {
 *         foreach ($page as $element) {
 *             // doSomethingWith($element);
 *         }
 *     }
 *     // Alternatively:
 *     // Iterate through all elements
 *     $pagedResponse = $searchServiceClient->search($placement, $visitorId);
 *     foreach ($pagedResponse->iterateAllElements() as $element) {
 *         // doSomethingWith($element);
 *     }
 * } finally {
 *     $searchServiceClient->close();
 * }
 * ```
 *
 * Many parameters require resource names to be formatted in a particular way. To
 * assist with these names, this class includes a format method for each type of
 * name, and additionally a parseName method to extract the individual identifiers
 * contained within formatted names that are returned by the API.
 *
 * @experimental
 *
 * @deprecated This class will be removed in the next major version update.
 */
class SearchServiceGapicClient
{
    use GapicClientTrait;

    /** The name of the service. */
    const SERVICE_NAME = 'google.cloud.retail.v2alpha.SearchService';

    /**
     * The default address of the service.
     *
     * @deprecated SERVICE_ADDRESS_TEMPLATE should be used instead.
     */
    const SERVICE_ADDRESS = 'retail.googleapis.com';

    /** The address template of the service. */
    private const SERVICE_ADDRESS_TEMPLATE = 'retail.UNIVERSE_DOMAIN';

    /** The default port of the service. */
    const DEFAULT_SERVICE_PORT = 443;

    /** The name of the code generator, to be included in the agent header. */
    const CODEGEN_NAME = 'gapic';

    /** The default scopes required by the service. */
    public static $serviceScopes = [
        'https://www.googleapis.com/auth/cloud-platform',
    ];

    private static $branchNameTemplate;

    private static $pathTemplateMap;

    private static function getClientDefaults()
    {
        return [
            'serviceName' => self::SERVICE_NAME,
            'apiEndpoint' => self::SERVICE_ADDRESS . ':' . self::DEFAULT_SERVICE_PORT,
            'clientConfig' => __DIR__ . '/../resources/search_service_client_config.json',
            'descriptorsConfigPath' => __DIR__ . '/../resources/search_service_descriptor_config.php',
            'gcpApiConfigPath' => __DIR__ . '/../resources/search_service_grpc_config.json',
            'credentialsConfig' => [
                'defaultScopes' => self::$serviceScopes,
            ],
            'transportConfig' => [
                'rest' => [
                    'restClientConfigPath' => __DIR__ . '/../resources/search_service_rest_client_config.php',
                ],
            ],
        ];
    }

    private static function getBranchNameTemplate()
    {
        if (self::$branchNameTemplate == null) {
            self::$branchNameTemplate = new PathTemplate('projects/{project}/locations/{location}/catalogs/{catalog}/branches/{branch}');
        }

        return self::$branchNameTemplate;
    }

    private static function getPathTemplateMap()
    {
        if (self::$pathTemplateMap == null) {
            self::$pathTemplateMap = [
                'branch' => self::getBranchNameTemplate(),
            ];
        }

        return self::$pathTemplateMap;
    }

    /**
     * Formats a string containing the fully-qualified path to represent a branch
     * resource.
     *
     * @param string $project
     * @param string $location
     * @param string $catalog
     * @param string $branch
     *
     * @return string The formatted branch resource.
     *
     * @experimental
     */
    public static function branchName($project, $location, $catalog, $branch)
    {
        return self::getBranchNameTemplate()->render([
            'project' => $project,
            'location' => $location,
            'catalog' => $catalog,
            'branch' => $branch,
        ]);
    }

    /**
     * Parses a formatted name string and returns an associative array of the components in the name.
     * The following name formats are supported:
     * Template: Pattern
     * - branch: projects/{project}/locations/{location}/catalogs/{catalog}/branches/{branch}
     *
     * The optional $template argument can be supplied to specify a particular pattern,
     * and must match one of the templates listed above. If no $template argument is
     * provided, or if the $template argument does not match one of the templates
     * listed, then parseName will check each of the supported templates, and return
     * the first match.
     *
     * @param string $formattedName The formatted name string
     * @param string $template      Optional name of template to match
     *
     * @return array An associative array from name component IDs to component values.
     *
     * @throws ValidationException If $formattedName could not be matched.
     *
     * @experimental
     */
    public static function parseName($formattedName, $template = null)
    {
        $templateMap = self::getPathTemplateMap();
        if ($template) {
            if (!isset($templateMap[$template])) {
                throw new ValidationException("Template name $template does not exist");
            }

            return $templateMap[$template]->match($formattedName);
        }

        foreach ($templateMap as $templateName => $pathTemplate) {
            try {
                return $pathTemplate->match($formattedName);
            } catch (ValidationException $ex) {
                // Swallow the exception to continue trying other path templates
            }
        }

        throw new ValidationException("Input did not match any known format. Input: $formattedName");
    }

    /**
     * Constructor.
     *
     * @param array $options {
     *     Optional. Options for configuring the service API wrapper.
     *
     *     @type string $apiEndpoint
     *           The address of the API remote host. May optionally include the port, formatted
     *           as "<uri>:<port>". Default 'retail.googleapis.com:443'.
     *     @type string|array|FetchAuthTokenInterface|CredentialsWrapper $credentials
     *           The credentials to be used by the client to authorize API calls. This option
     *           accepts either a path to a credentials file, or a decoded credentials file as a
     *           PHP array.
     *           *Advanced usage*: In addition, this option can also accept a pre-constructed
     *           {@see \Google\Auth\FetchAuthTokenInterface} object or
     *           {@see \Google\ApiCore\CredentialsWrapper} object. Note that when one of these
     *           objects are provided, any settings in $credentialsConfig will be ignored.
     *     @type array $credentialsConfig
     *           Options used to configure credentials, including auth token caching, for the
     *           client. For a full list of supporting configuration options, see
     *           {@see \Google\ApiCore\CredentialsWrapper::build()} .
     *     @type bool $disableRetries
     *           Determines whether or not retries defined by the client configuration should be
     *           disabled. Defaults to `false`.
     *     @type string|array $clientConfig
     *           Client method configuration, including retry settings. This option can be either
     *           a path to a JSON file, or a PHP array containing the decoded JSON data. By
     *           default this settings points to the default client config file, which is
     *           provided in the resources folder.
     *     @type string|TransportInterface $transport
     *           The transport used for executing network requests. May be either the string
     *           `rest` or `grpc`. Defaults to `grpc` if gRPC support is detected on the system.
     *           *Advanced usage*: Additionally, it is possible to pass in an already
     *           instantiated {@see \Google\ApiCore\Transport\TransportInterface} object. Note
     *           that when this object is provided, any settings in $transportConfig, and any
     *           $apiEndpoint setting, will be ignored.
     *     @type array $transportConfig
     *           Configuration options that will be used to construct the transport. Options for
     *           each supported transport type should be passed in a key for that transport. For
     *           example:
     *           $transportConfig = [
     *               'grpc' => [...],
     *               'rest' => [...],
     *           ];
     *           See the {@see \Google\ApiCore\Transport\GrpcTransport::build()} and
     *           {@see \Google\ApiCore\Transport\RestTransport::build()} methods for the
     *           supported options.
     *     @type callable $clientCertSource
     *           A callable which returns the client cert as a string. This can be used to
     *           provide a certificate and private key to the transport layer for mTLS.
     * }
     *
     * @throws ValidationException
     *
     * @experimental
     */
    public function __construct(array $options = [])
    {
        $clientOptions = $this->buildClientOptions($options);
        $this->setClientOptions($clientOptions);
    }

    /**
     * Performs a search.
     *
     * This feature is only available for users who have Retail Search enabled.
     * Enable Retail Search on Cloud Console before using this feature.
     *
     * Sample code:
     * ```
     * $searchServiceClient = new SearchServiceClient();
     * try {
     *     $placement = 'placement';
     *     $visitorId = 'visitor_id';
     *     // Iterate over pages of elements
     *     $pagedResponse = $searchServiceClient->search($placement, $visitorId);
     *     foreach ($pagedResponse->iteratePages() as $page) {
     *         foreach ($page as $element) {
     *             // doSomethingWith($element);
     *         }
     *     }
     *     // Alternatively:
     *     // Iterate through all elements
     *     $pagedResponse = $searchServiceClient->search($placement, $visitorId);
     *     foreach ($pagedResponse->iterateAllElements() as $element) {
     *         // doSomethingWith($element);
     *     }
     * } finally {
     *     $searchServiceClient->close();
     * }
     * ```
     *
     * @param string $placement    Required. The resource name of the Retail Search serving config, such as
     *                             `projects/&#42;/locations/global/catalogs/default_catalog/servingConfigs/default_serving_config`
     *                             or the name of the legacy placement resource, such as
     *                             `projects/&#42;/locations/global/catalogs/default_catalog/placements/default_search`.
     *                             This field is used to identify the serving config name and the set
     *                             of models that will be used to make the search.
     * @param string $visitorId    Required. A unique identifier for tracking visitors. For example, this
     *                             could be implemented with an HTTP cookie, which should be able to uniquely
     *                             identify a visitor on a single device. This unique identifier should not
     *                             change if the visitor logs in or out of the website.
     *
     *                             This should be the same identifier as
     *                             [UserEvent.visitor_id][google.cloud.retail.v2alpha.UserEvent.visitor_id].
     *
     *                             The field must be a UTF-8 encoded string with a length limit of 128
     *                             characters. Otherwise, an INVALID_ARGUMENT error is returned.
     * @param array  $optionalArgs {
     *     Optional.
     *
     *     @type string $branch
     *           The branch resource name, such as
     *           `projects/&#42;/locations/global/catalogs/default_catalog/branches/0`.
     *
     *           Use "default_branch" as the branch ID or leave this field empty, to search
     *           products under the default branch.
     *     @type string $query
     *           Raw search query.
     *
     *           If this field is empty, the request is considered a category browsing
     *           request and returned results are based on
     *           [filter][google.cloud.retail.v2alpha.SearchRequest.filter] and
     *           [page_categories][google.cloud.retail.v2alpha.SearchRequest.page_categories].
     *     @type UserInfo $userInfo
     *           User information.
     *     @type int $pageSize
     *           The maximum number of resources contained in the underlying API
     *           response. The API may return fewer values in a page, even if
     *           there are additional values to be retrieved.
     *     @type string $pageToken
     *           A page token is used to specify a page of values to be returned.
     *           If no page token is specified (the default), the first page
     *           of values will be returned. Any page token used here must have
     *           been generated by a previous call to the API.
     *     @type int $offset
     *           A 0-indexed integer that specifies the current offset (that is, starting
     *           result location, amongst the
     *           [Product][google.cloud.retail.v2alpha.Product]s deemed by the API as
     *           relevant) in search results. This field is only considered if
     *           [page_token][google.cloud.retail.v2alpha.SearchRequest.page_token] is
     *           unset.
     *
     *           If this field is negative, an INVALID_ARGUMENT is returned.
     *     @type string $filter
     *           The filter syntax consists of an expression language for constructing a
     *           predicate from one or more fields of the products being filtered. Filter
     *           expression is case-sensitive. See more details at this [user
     *           guide](https://cloud.google.com/retail/docs/filter-and-order#filter).
     *
     *           If this field is unrecognizable, an INVALID_ARGUMENT is returned.
     *     @type string $canonicalFilter
     *           The default filter that is applied when a user performs a search without
     *           checking any filters on the search page.
     *
     *           The filter applied to every search request when quality improvement such as
     *           query expansion is needed. For example, if a query does not have enough
     *           results, an expanded query with
     *           [SearchRequest.canonical_filter][google.cloud.retail.v2alpha.SearchRequest.canonical_filter]
     *           will be returned as a supplement of the original query. This field is
     *           strongly recommended to achieve high search quality.
     *
     *           See
     *           [SearchRequest.filter][google.cloud.retail.v2alpha.SearchRequest.filter]
     *           for more details about filter syntax.
     *     @type string $orderBy
     *           The order in which products are returned. Products can be ordered by
     *           a field in an [Product][google.cloud.retail.v2alpha.Product] object. Leave
     *           it unset if ordered by relevance. OrderBy expression is case-sensitive. See
     *           more details at this [user
     *           guide](https://cloud.google.com/retail/docs/filter-and-order#order).
     *
     *           If this field is unrecognizable, an INVALID_ARGUMENT is returned.
     *     @type FacetSpec[] $facetSpecs
     *           Facet specifications for faceted search. If empty, no facets are returned.
     *
     *           A maximum of 200 values are allowed. Otherwise, an INVALID_ARGUMENT error
     *           is returned.
     *     @type DynamicFacetSpec $dynamicFacetSpec
     *           Deprecated. Refer to https://cloud.google.com/retail/docs/configs#dynamic
     *           to enable dynamic facets. Do not set this field.
     *
     *           The specification for dynamically generated facets. Notice that only
     *           textual facets can be dynamically generated.
     *     @type BoostSpec $boostSpec
     *           Boost specification to boost certain products. See more details at this
     *           [user guide](https://cloud.google.com/retail/docs/boosting).
     *
     *           Notice that if both
     *           [ServingConfig.boost_control_ids][google.cloud.retail.v2alpha.ServingConfig.boost_control_ids]
     *           and
     *           [SearchRequest.boost_spec][google.cloud.retail.v2alpha.SearchRequest.boost_spec]
     *           are set, the boost conditions from both places are evaluated. If a search
     *           request matches multiple boost conditions, the final boost score is equal
     *           to the sum of the boost scores from all matched boost conditions.
     *     @type QueryExpansionSpec $queryExpansionSpec
     *           The query expansion specification that specifies the conditions under which
     *           query expansion will occur. See more details at this [user
     *           guide](https://cloud.google.com/retail/docs/result-size#query_expansion).
     *     @type int $relevanceThreshold
     *           The relevance threshold of the search results.
     *
     *           Defaults to
     *           [RelevanceThreshold.HIGH][google.cloud.retail.v2alpha.SearchRequest.RelevanceThreshold.HIGH],
     *           which means only the most relevant results are shown, and the least number
     *           of results are returned. See more details at this [user
     *           guide](https://cloud.google.com/retail/docs/result-size#relevance_thresholding).
     *           For allowed values, use constants defined on {@see \Google\Cloud\Retail\V2alpha\SearchRequest\RelevanceThreshold}
     *     @type string[] $variantRollupKeys
     *           The keys to fetch and rollup the matching
     *           [variant][google.cloud.retail.v2alpha.Product.Type.VARIANT]
     *           [Product][google.cloud.retail.v2alpha.Product]s attributes,
     *           [FulfillmentInfo][google.cloud.retail.v2alpha.FulfillmentInfo] or
     *           [LocalInventory][google.cloud.retail.v2alpha.LocalInventory]s attributes.
     *           The attributes from all the matching
     *           [variant][google.cloud.retail.v2alpha.Product.Type.VARIANT]
     *           [Product][google.cloud.retail.v2alpha.Product]s or
     *           [LocalInventory][google.cloud.retail.v2alpha.LocalInventory]s are merged
     *           and de-duplicated. Notice that rollup attributes will lead to extra query
     *           latency. Maximum number of keys is 30.
     *
     *           For [FulfillmentInfo][google.cloud.retail.v2alpha.FulfillmentInfo], a
     *           fulfillment type and a fulfillment ID must be provided in the format of
     *           "fulfillmentType.fulfillmentId". E.g., in "pickupInStore.store123",
     *           "pickupInStore" is fulfillment type and "store123" is the store ID.
     *
     *           Supported keys are:
     *
     *           * colorFamilies
     *           * price
     *           * originalPrice
     *           * discount
     *           * variantId
     *           * inventory(place_id,price)
     *           * inventory(place_id,original_price)
     *           * inventory(place_id,attributes.key), where key is any key in the
     *           [Product.local_inventories.attributes][google.cloud.retail.v2alpha.LocalInventory.attributes]
     *           map.
     *           * attributes.key, where key is any key in the
     *           [Product.attributes][google.cloud.retail.v2alpha.Product.attributes] map.
     *           * pickupInStore.id, where id is any
     *           [FulfillmentInfo.place_ids][google.cloud.retail.v2alpha.FulfillmentInfo.place_ids]
     *           for
     *           [FulfillmentInfo.type][google.cloud.retail.v2alpha.FulfillmentInfo.type]
     *           "pickup-in-store".
     *           * shipToStore.id, where id is any
     *           [FulfillmentInfo.place_ids][google.cloud.retail.v2alpha.FulfillmentInfo.place_ids]
     *           for
     *           [FulfillmentInfo.type][google.cloud.retail.v2alpha.FulfillmentInfo.type]
     *           "ship-to-store".
     *           * sameDayDelivery.id, where id is any
     *           [FulfillmentInfo.place_ids][google.cloud.retail.v2alpha.FulfillmentInfo.place_ids]
     *           for
     *           [FulfillmentInfo.type][google.cloud.retail.v2alpha.FulfillmentInfo.type]
     *           "same-day-delivery".
     *           * nextDayDelivery.id, where id is any
     *           [FulfillmentInfo.place_ids][google.cloud.retail.v2alpha.FulfillmentInfo.place_ids]
     *           for
     *           [FulfillmentInfo.type][google.cloud.retail.v2alpha.FulfillmentInfo.type]
     *           "next-day-delivery".
     *           * customFulfillment1.id, where id is any
     *           [FulfillmentInfo.place_ids][google.cloud.retail.v2alpha.FulfillmentInfo.place_ids]
     *           for
     *           [FulfillmentInfo.type][google.cloud.retail.v2alpha.FulfillmentInfo.type]
     *           "custom-type-1".
     *           * customFulfillment2.id, where id is any
     *           [FulfillmentInfo.place_ids][google.cloud.retail.v2alpha.FulfillmentInfo.place_ids]
     *           for
     *           [FulfillmentInfo.type][google.cloud.retail.v2alpha.FulfillmentInfo.type]
     *           "custom-type-2".
     *           * customFulfillment3.id, where id is any
     *           [FulfillmentInfo.place_ids][google.cloud.retail.v2alpha.FulfillmentInfo.place_ids]
     *           for
     *           [FulfillmentInfo.type][google.cloud.retail.v2alpha.FulfillmentInfo.type]
     *           "custom-type-3".
     *           * customFulfillment4.id, where id is any
     *           [FulfillmentInfo.place_ids][google.cloud.retail.v2alpha.FulfillmentInfo.place_ids]
     *           for
     *           [FulfillmentInfo.type][google.cloud.retail.v2alpha.FulfillmentInfo.type]
     *           "custom-type-4".
     *           * customFulfillment5.id, where id is any
     *           [FulfillmentInfo.place_ids][google.cloud.retail.v2alpha.FulfillmentInfo.place_ids]
     *           for
     *           [FulfillmentInfo.type][google.cloud.retail.v2alpha.FulfillmentInfo.type]
     *           "custom-type-5".
     *
     *           If this field is set to an invalid value other than these, an
     *           INVALID_ARGUMENT error is returned.
     *     @type string[] $pageCategories
     *           The categories associated with a category page. Must be set for category
     *           navigation queries to achieve good search quality. The format should be
     *           the same as
     *           [UserEvent.page_categories][google.cloud.retail.v2alpha.UserEvent.page_categories];
     *
     *           To represent full path of category, use '>' sign to separate different
     *           hierarchies. If '>' is part of the category name, replace it with
     *           other character(s).
     *
     *           Category pages include special pages such as sales or promotions. For
     *           instance, a special sale page may have the category hierarchy:
     *           "pageCategories" : ["Sales > 2017 Black Friday Deals"].
     *     @type int $searchMode
     *           The search mode of the search request. If not specified, a single search
     *           request triggers both product search and faceted search.
     *           For allowed values, use constants defined on {@see \Google\Cloud\Retail\V2alpha\SearchRequest\SearchMode}
     *     @type PersonalizationSpec $personalizationSpec
     *           The specification for personalization.
     *
     *           Notice that if both
     *           [ServingConfig.personalization_spec][google.cloud.retail.v2alpha.ServingConfig.personalization_spec]
     *           and
     *           [SearchRequest.personalization_spec][google.cloud.retail.v2alpha.SearchRequest.personalization_spec]
     *           are set.
     *           [SearchRequest.personalization_spec][google.cloud.retail.v2alpha.SearchRequest.personalization_spec]
     *           will override
     *           [ServingConfig.personalization_spec][google.cloud.retail.v2alpha.ServingConfig.personalization_spec].
     *     @type array $labels
     *           The labels applied to a resource must meet the following requirements:
     *
     *           * Each resource can have multiple labels, up to a maximum of 64.
     *           * Each label must be a key-value pair.
     *           * Keys have a minimum length of 1 character and a maximum length of 63
     *           characters and cannot be empty. Values can be empty and have a maximum
     *           length of 63 characters.
     *           * Keys and values can contain only lowercase letters, numeric characters,
     *           underscores, and dashes. All characters must use UTF-8 encoding, and
     *           international characters are allowed.
     *           * The key portion of a label must be unique. However, you can use the same
     *           key with multiple resources.
     *           * Keys must start with a lowercase letter or international character.
     *
     *           See [Google Cloud
     *           Document](https://cloud.google.com/resource-manager/docs/creating-managing-labels#requirements)
     *           for more details.
     *     @type SpellCorrectionSpec $spellCorrectionSpec
     *           The spell correction specification that specifies the mode under
     *           which spell correction will take effect.
     *     @type string $entity
     *           The entity for customers that may run multiple different entities, domains,
     *           sites or regions, for example, `Google US`, `Google Ads`, `Waymo`,
     *           `google.com`, `youtube.com`, etc.
     *           If this is set, it should be exactly matched with
     *           [UserEvent.entity][google.cloud.retail.v2alpha.UserEvent.entity] to get
     *           search results boosted by entity.
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return \Google\ApiCore\PagedListResponse
     *
     * @throws ApiException if the remote call fails
     *
     * @experimental
     */
    public function search($placement, $visitorId, array $optionalArgs = [])
    {
        $request = new SearchRequest();
        $requestParamHeaders = [];
        $request->setPlacement($placement);
        $request->setVisitorId($visitorId);
        $requestParamHeaders['placement'] = $placement;
        if (isset($optionalArgs['branch'])) {
            $request->setBranch($optionalArgs['branch']);
        }

        if (isset($optionalArgs['query'])) {
            $request->setQuery($optionalArgs['query']);
        }

        if (isset($optionalArgs['userInfo'])) {
            $request->setUserInfo($optionalArgs['userInfo']);
        }

        if (isset($optionalArgs['pageSize'])) {
            $request->setPageSize($optionalArgs['pageSize']);
        }

        if (isset($optionalArgs['pageToken'])) {
            $request->setPageToken($optionalArgs['pageToken']);
        }

        if (isset($optionalArgs['offset'])) {
            $request->setOffset($optionalArgs['offset']);
        }

        if (isset($optionalArgs['filter'])) {
            $request->setFilter($optionalArgs['filter']);
        }

        if (isset($optionalArgs['canonicalFilter'])) {
            $request->setCanonicalFilter($optionalArgs['canonicalFilter']);
        }

        if (isset($optionalArgs['orderBy'])) {
            $request->setOrderBy($optionalArgs['orderBy']);
        }

        if (isset($optionalArgs['facetSpecs'])) {
            $request->setFacetSpecs($optionalArgs['facetSpecs']);
        }

        if (isset($optionalArgs['dynamicFacetSpec'])) {
            $request->setDynamicFacetSpec($optionalArgs['dynamicFacetSpec']);
        }

        if (isset($optionalArgs['boostSpec'])) {
            $request->setBoostSpec($optionalArgs['boostSpec']);
        }

        if (isset($optionalArgs['queryExpansionSpec'])) {
            $request->setQueryExpansionSpec($optionalArgs['queryExpansionSpec']);
        }

        if (isset($optionalArgs['relevanceThreshold'])) {
            $request->setRelevanceThreshold($optionalArgs['relevanceThreshold']);
        }

        if (isset($optionalArgs['variantRollupKeys'])) {
            $request->setVariantRollupKeys($optionalArgs['variantRollupKeys']);
        }

        if (isset($optionalArgs['pageCategories'])) {
            $request->setPageCategories($optionalArgs['pageCategories']);
        }

        if (isset($optionalArgs['searchMode'])) {
            $request->setSearchMode($optionalArgs['searchMode']);
        }

        if (isset($optionalArgs['personalizationSpec'])) {
            $request->setPersonalizationSpec($optionalArgs['personalizationSpec']);
        }

        if (isset($optionalArgs['labels'])) {
            $request->setLabels($optionalArgs['labels']);
        }

        if (isset($optionalArgs['spellCorrectionSpec'])) {
            $request->setSpellCorrectionSpec($optionalArgs['spellCorrectionSpec']);
        }

        if (isset($optionalArgs['entity'])) {
            $request->setEntity($optionalArgs['entity']);
        }

        $requestParams = new RequestParamsHeaderDescriptor($requestParamHeaders);
        $optionalArgs['headers'] = isset($optionalArgs['headers']) ? array_merge($requestParams->getHeader(), $optionalArgs['headers']) : $requestParams->getHeader();
        return $this->getPagedListResponse('Search', $optionalArgs, SearchResponse::class, $request);
    }
}
