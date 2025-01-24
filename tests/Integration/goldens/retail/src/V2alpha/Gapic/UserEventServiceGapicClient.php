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
 * https://github.com/googleapis/googleapis/blob/master/google/cloud/retail/v2alpha/user_event_service.proto
 * Updates to the above are reflected here through a refresh process.
 *
 * @experimental
 */

namespace Google\Cloud\Retail\V2alpha\Gapic;

use Google\ApiCore\ApiException;
use Google\ApiCore\CredentialsWrapper;
use Google\ApiCore\GapicClientTrait;
use Google\ApiCore\LongRunning\OperationsClient;
use Google\ApiCore\OperationResponse;
use Google\ApiCore\PathTemplate;
use Google\ApiCore\RequestParamsHeaderDescriptor;
use Google\ApiCore\RetrySettings;
use Google\ApiCore\Transport\TransportInterface;
use Google\ApiCore\ValidationException;
use Google\Api\HttpBody;
use Google\Auth\FetchAuthTokenInterface;
use Google\Cloud\Retail\V2alpha\CollectUserEventRequest;
use Google\Cloud\Retail\V2alpha\ImportErrorsConfig;
use Google\Cloud\Retail\V2alpha\ImportMetadata;
use Google\Cloud\Retail\V2alpha\ImportUserEventsRequest;
use Google\Cloud\Retail\V2alpha\PurgeUserEventsRequest;
use Google\Cloud\Retail\V2alpha\RejoinUserEventsRequest;
use Google\Cloud\Retail\V2alpha\UserEvent;
use Google\Cloud\Retail\V2alpha\UserEventInputConfig;
use Google\Cloud\Retail\V2alpha\WriteUserEventRequest;
use Google\LongRunning\Operation;

/**
 * Service Description: Service for ingesting end user actions on the customer website.
 *
 * This class provides the ability to make remote calls to the backing service through method
 * calls that map to API methods. Sample code to get started:
 *
 * ```
 * $userEventServiceClient = new UserEventServiceClient();
 * try {
 *     $parent = 'parent';
 *     $userEvent = 'user_event';
 *     $response = $userEventServiceClient->collectUserEvent($parent, $userEvent);
 * } finally {
 *     $userEventServiceClient->close();
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
class UserEventServiceGapicClient
{
    use GapicClientTrait;

    /** The name of the service. */
    const SERVICE_NAME = 'google.cloud.retail.v2alpha.UserEventService';

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

    private static $catalogNameTemplate;

    private static $productNameTemplate;

    private static $pathTemplateMap;

    private $operationsClient;

    private static function getClientDefaults()
    {
        return [
            'serviceName' => self::SERVICE_NAME,
            'apiEndpoint' => self::SERVICE_ADDRESS . ':' . self::DEFAULT_SERVICE_PORT,
            'clientConfig' => __DIR__ . '/../resources/user_event_service_client_config.json',
            'descriptorsConfigPath' => __DIR__ . '/../resources/user_event_service_descriptor_config.php',
            'gcpApiConfigPath' => __DIR__ . '/../resources/user_event_service_grpc_config.json',
            'credentialsConfig' => [
                'defaultScopes' => self::$serviceScopes,
            ],
            'transportConfig' => [
                'rest' => [
                    'restClientConfigPath' => __DIR__ . '/../resources/user_event_service_rest_client_config.php',
                ],
            ],
        ];
    }

    private static function getCatalogNameTemplate()
    {
        if (self::$catalogNameTemplate == null) {
            self::$catalogNameTemplate = new PathTemplate('projects/{project}/locations/{location}/catalogs/{catalog}');
        }

        return self::$catalogNameTemplate;
    }

    private static function getProductNameTemplate()
    {
        if (self::$productNameTemplate == null) {
            self::$productNameTemplate = new PathTemplate('projects/{project}/locations/{location}/catalogs/{catalog}/branches/{branch}/products/{product}');
        }

        return self::$productNameTemplate;
    }

    private static function getPathTemplateMap()
    {
        if (self::$pathTemplateMap == null) {
            self::$pathTemplateMap = [
                'catalog' => self::getCatalogNameTemplate(),
                'product' => self::getProductNameTemplate(),
            ];
        }

        return self::$pathTemplateMap;
    }

    /**
     * Formats a string containing the fully-qualified path to represent a catalog
     * resource.
     *
     * @param string $project
     * @param string $location
     * @param string $catalog
     *
     * @return string The formatted catalog resource.
     *
     * @experimental
     */
    public static function catalogName($project, $location, $catalog)
    {
        return self::getCatalogNameTemplate()->render([
            'project' => $project,
            'location' => $location,
            'catalog' => $catalog,
        ]);
    }

    /**
     * Formats a string containing the fully-qualified path to represent a product
     * resource.
     *
     * @param string $project
     * @param string $location
     * @param string $catalog
     * @param string $branch
     * @param string $product
     *
     * @return string The formatted product resource.
     *
     * @experimental
     */
    public static function productName($project, $location, $catalog, $branch, $product)
    {
        return self::getProductNameTemplate()->render([
            'project' => $project,
            'location' => $location,
            'catalog' => $catalog,
            'branch' => $branch,
            'product' => $product,
        ]);
    }

    /**
     * Parses a formatted name string and returns an associative array of the components in the name.
     * The following name formats are supported:
     * Template: Pattern
     * - catalog: projects/{project}/locations/{location}/catalogs/{catalog}
     * - product: projects/{project}/locations/{location}/catalogs/{catalog}/branches/{branch}/products/{product}
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
     * Return an OperationsClient object with the same endpoint as $this.
     *
     * @return OperationsClient
     *
     * @experimental
     */
    public function getOperationsClient()
    {
        return $this->operationsClient;
    }

    /**
     * Resume an existing long running operation that was previously started by a long
     * running API method. If $methodName is not provided, or does not match a long
     * running API method, then the operation can still be resumed, but the
     * OperationResponse object will not deserialize the final response.
     *
     * @param string $operationName The name of the long running operation
     * @param string $methodName    The name of the method used to start the operation
     *
     * @return OperationResponse
     *
     * @experimental
     */
    public function resumeOperation($operationName, $methodName = null)
    {
        $options = isset($this->descriptors[$methodName]['longRunning']) ? $this->descriptors[$methodName]['longRunning'] : [];
        $operation = new OperationResponse($operationName, $this->getOperationsClient(), $options);
        $operation->reload();
        return $operation;
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
        $this->operationsClient = $this->createOperationsClient($clientOptions);
    }

    /**
     * Writes a single user event from the browser. This uses a GET request to
     * due to browser restriction of POST-ing to a 3rd party domain.
     *
     * This method is used only by the Retail API JavaScript pixel and Google Tag
     * Manager. Users should not call this method directly.
     *
     * Sample code:
     * ```
     * $userEventServiceClient = new UserEventServiceClient();
     * try {
     *     $parent = 'parent';
     *     $userEvent = 'user_event';
     *     $response = $userEventServiceClient->collectUserEvent($parent, $userEvent);
     * } finally {
     *     $userEventServiceClient->close();
     * }
     * ```
     *
     * @param string $parent       Required. The parent catalog name, such as
     *                             `projects/1234/locations/global/catalogs/default_catalog`.
     * @param string $userEvent    Required. URL encoded UserEvent proto with a length limit of 2,000,000
     *                             characters.
     * @param array  $optionalArgs {
     *     Optional.
     *
     *     @type string $prebuiltRule
     *           The prebuilt rule name that can convert a specific type of raw_json.
     *           For example: "ga4_bq" rule for the GA4 user event schema.
     *     @type string $uri
     *           The URL including cgi-parameters but excluding the hash fragment with a
     *           length limit of 5,000 characters. This is often more useful than the
     *           referer URL, because many browsers only send the domain for 3rd party
     *           requests.
     *     @type int $ets
     *           The event timestamp in milliseconds. This prevents browser caching of
     *           otherwise identical get requests. The name is abbreviated to reduce the
     *           payload bytes.
     *     @type string $rawJson
     *           An arbitrary serialized JSON string that contains necessary information
     *           that can comprise a user event. When this field is specified, the
     *           user_event field will be ignored. Note: line-delimited JSON is not
     *           supported, a single JSON only.
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return \Google\Api\HttpBody
     *
     * @throws ApiException if the remote call fails
     *
     * @experimental
     */
    public function collectUserEvent($parent, $userEvent, array $optionalArgs = [])
    {
        $request = new CollectUserEventRequest();
        $requestParamHeaders = [];
        $request->setParent($parent);
        $request->setUserEvent($userEvent);
        $requestParamHeaders['parent'] = $parent;
        if (isset($optionalArgs['prebuiltRule'])) {
            $request->setPrebuiltRule($optionalArgs['prebuiltRule']);
        }

        if (isset($optionalArgs['uri'])) {
            $request->setUri($optionalArgs['uri']);
        }

        if (isset($optionalArgs['ets'])) {
            $request->setEts($optionalArgs['ets']);
        }

        if (isset($optionalArgs['rawJson'])) {
            $request->setRawJson($optionalArgs['rawJson']);
        }

        $requestParams = new RequestParamsHeaderDescriptor($requestParamHeaders);
        $optionalArgs['headers'] = isset($optionalArgs['headers']) ? array_merge($requestParams->getHeader(), $optionalArgs['headers']) : $requestParams->getHeader();
        return $this->startCall('CollectUserEvent', HttpBody::class, $optionalArgs, $request)->wait();
    }

    /**
     * Bulk import of User events. Request processing might be
     * synchronous. Events that already exist are skipped.
     * Use this method for backfilling historical user events.
     *
     * `Operation.response` is of type `ImportResponse`. Note that it is
     * possible for a subset of the items to be successfully inserted.
     * `Operation.metadata` is of type `ImportMetadata`.
     *
     * Sample code:
     * ```
     * $userEventServiceClient = new UserEventServiceClient();
     * try {
     *     $formattedParent = $userEventServiceClient->catalogName('[PROJECT]', '[LOCATION]', '[CATALOG]');
     *     $inputConfig = new UserEventInputConfig();
     *     $operationResponse = $userEventServiceClient->importUserEvents($formattedParent, $inputConfig);
     *     $operationResponse->pollUntilComplete();
     *     if ($operationResponse->operationSucceeded()) {
     *         $result = $operationResponse->getResult();
     *         // doSomethingWith($result)
     *     } else {
     *         $error = $operationResponse->getError();
     *         // handleError($error)
     *     }
     *     // Alternatively:
     *     // start the operation, keep the operation name, and resume later
     *     $operationResponse = $userEventServiceClient->importUserEvents($formattedParent, $inputConfig);
     *     $operationName = $operationResponse->getName();
     *     // ... do other work
     *     $newOperationResponse = $userEventServiceClient->resumeOperation($operationName, 'importUserEvents');
     *     while (!$newOperationResponse->isDone()) {
     *         // ... do other work
     *         $newOperationResponse->reload();
     *     }
     *     if ($newOperationResponse->operationSucceeded()) {
     *         $result = $newOperationResponse->getResult();
     *         // doSomethingWith($result)
     *     } else {
     *         $error = $newOperationResponse->getError();
     *         // handleError($error)
     *     }
     * } finally {
     *     $userEventServiceClient->close();
     * }
     * ```
     *
     * @param string               $parent       Required. `projects/1234/locations/global/catalogs/default_catalog`
     * @param UserEventInputConfig $inputConfig  Required. The desired input location of the data.
     * @param array                $optionalArgs {
     *     Optional.
     *
     *     @type ImportErrorsConfig $errorsConfig
     *           The desired location of errors incurred during the Import. Cannot be set
     *           for inline user event imports.
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return \Google\ApiCore\OperationResponse
     *
     * @throws ApiException if the remote call fails
     *
     * @experimental
     */
    public function importUserEvents($parent, $inputConfig, array $optionalArgs = [])
    {
        $request = new ImportUserEventsRequest();
        $requestParamHeaders = [];
        $request->setParent($parent);
        $request->setInputConfig($inputConfig);
        $requestParamHeaders['parent'] = $parent;
        if (isset($optionalArgs['errorsConfig'])) {
            $request->setErrorsConfig($optionalArgs['errorsConfig']);
        }

        $requestParams = new RequestParamsHeaderDescriptor($requestParamHeaders);
        $optionalArgs['headers'] = isset($optionalArgs['headers']) ? array_merge($requestParams->getHeader(), $optionalArgs['headers']) : $requestParams->getHeader();
        return $this->startOperationsCall('ImportUserEvents', $optionalArgs, $request, $this->getOperationsClient())->wait();
    }

    /**
     * Deletes permanently all user events specified by the filter provided.
     * Depending on the number of events specified by the filter, this operation
     * could take hours or days to complete. To test a filter, use the list
     * command first.
     *
     * Sample code:
     * ```
     * $userEventServiceClient = new UserEventServiceClient();
     * try {
     *     $formattedParent = $userEventServiceClient->catalogName('[PROJECT]', '[LOCATION]', '[CATALOG]');
     *     $filter = 'filter';
     *     $operationResponse = $userEventServiceClient->purgeUserEvents($formattedParent, $filter);
     *     $operationResponse->pollUntilComplete();
     *     if ($operationResponse->operationSucceeded()) {
     *         $result = $operationResponse->getResult();
     *         // doSomethingWith($result)
     *     } else {
     *         $error = $operationResponse->getError();
     *         // handleError($error)
     *     }
     *     // Alternatively:
     *     // start the operation, keep the operation name, and resume later
     *     $operationResponse = $userEventServiceClient->purgeUserEvents($formattedParent, $filter);
     *     $operationName = $operationResponse->getName();
     *     // ... do other work
     *     $newOperationResponse = $userEventServiceClient->resumeOperation($operationName, 'purgeUserEvents');
     *     while (!$newOperationResponse->isDone()) {
     *         // ... do other work
     *         $newOperationResponse->reload();
     *     }
     *     if ($newOperationResponse->operationSucceeded()) {
     *         $result = $newOperationResponse->getResult();
     *         // doSomethingWith($result)
     *     } else {
     *         $error = $newOperationResponse->getError();
     *         // handleError($error)
     *     }
     * } finally {
     *     $userEventServiceClient->close();
     * }
     * ```
     *
     * @param string $parent       Required. The resource name of the catalog under which the events are
     *                             created. The format is
     *                             `projects/${projectId}/locations/global/catalogs/${catalogId}`
     * @param string $filter       Required. The filter string to specify the events to be deleted with a
     *                             length limit of 5,000 characters. Empty string filter is not allowed. The
     *                             eligible fields for filtering are:
     *
     *                             * `eventType`: Double quoted
     *                             [UserEvent.event_type][google.cloud.retail.v2alpha.UserEvent.event_type]
     *                             string.
     *                             * `eventTime`: in ISO 8601 "zulu" format.
     *                             * `visitorId`: Double quoted string. Specifying this will delete all
     *                             events associated with a visitor.
     *                             * `userId`: Double quoted string. Specifying this will delete all events
     *                             associated with a user.
     *
     *                             Examples:
     *
     *                             * Deleting all events in a time range:
     *                             `eventTime > "2012-04-23T18:25:43.511Z"
     *                             eventTime < "2012-04-23T18:30:43.511Z"`
     *                             * Deleting specific eventType in time range:
     *                             `eventTime > "2012-04-23T18:25:43.511Z" eventType = "detail-page-view"`
     *                             * Deleting all events for a specific visitor:
     *                             `visitorId = "visitor1024"`
     *
     *                             The filtering fields are assumed to have an implicit AND.
     * @param array  $optionalArgs {
     *     Optional.
     *
     *     @type bool $force
     *           Actually perform the purge.
     *           If `force` is set to false, the method will return the expected purge count
     *           without deleting any user events.
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return \Google\ApiCore\OperationResponse
     *
     * @throws ApiException if the remote call fails
     *
     * @experimental
     */
    public function purgeUserEvents($parent, $filter, array $optionalArgs = [])
    {
        $request = new PurgeUserEventsRequest();
        $requestParamHeaders = [];
        $request->setParent($parent);
        $request->setFilter($filter);
        $requestParamHeaders['parent'] = $parent;
        if (isset($optionalArgs['force'])) {
            $request->setForce($optionalArgs['force']);
        }

        $requestParams = new RequestParamsHeaderDescriptor($requestParamHeaders);
        $optionalArgs['headers'] = isset($optionalArgs['headers']) ? array_merge($requestParams->getHeader(), $optionalArgs['headers']) : $requestParams->getHeader();
        return $this->startOperationsCall('PurgeUserEvents', $optionalArgs, $request, $this->getOperationsClient())->wait();
    }

    /**
     * Starts a user-event rejoin operation with latest product catalog. Events
     * are not annotated with detailed product information for products that are
     * missing from the catalog when the user event is ingested. These
     * events are stored as unjoined events with limited usage on training and
     * serving. You can use this method to start a join operation on specified
     * events with the latest version of product catalog. You can also use this
     * method to correct events joined with the wrong product catalog. A rejoin
     * operation can take hours or days to complete.
     *
     * Sample code:
     * ```
     * $userEventServiceClient = new UserEventServiceClient();
     * try {
     *     $parent = 'parent';
     *     $operationResponse = $userEventServiceClient->rejoinUserEvents($parent);
     *     $operationResponse->pollUntilComplete();
     *     if ($operationResponse->operationSucceeded()) {
     *         $result = $operationResponse->getResult();
     *         // doSomethingWith($result)
     *     } else {
     *         $error = $operationResponse->getError();
     *         // handleError($error)
     *     }
     *     // Alternatively:
     *     // start the operation, keep the operation name, and resume later
     *     $operationResponse = $userEventServiceClient->rejoinUserEvents($parent);
     *     $operationName = $operationResponse->getName();
     *     // ... do other work
     *     $newOperationResponse = $userEventServiceClient->resumeOperation($operationName, 'rejoinUserEvents');
     *     while (!$newOperationResponse->isDone()) {
     *         // ... do other work
     *         $newOperationResponse->reload();
     *     }
     *     if ($newOperationResponse->operationSucceeded()) {
     *         $result = $newOperationResponse->getResult();
     *         // doSomethingWith($result)
     *     } else {
     *         $error = $newOperationResponse->getError();
     *         // handleError($error)
     *     }
     * } finally {
     *     $userEventServiceClient->close();
     * }
     * ```
     *
     * @param string $parent       Required. The parent catalog resource name, such as
     *                             `projects/1234/locations/global/catalogs/default_catalog`.
     * @param array  $optionalArgs {
     *     Optional.
     *
     *     @type int $userEventRejoinScope
     *           The type of the user event rejoin to define the scope and range of the user
     *           events to be rejoined with the latest product catalog. Defaults to
     *           `USER_EVENT_REJOIN_SCOPE_UNSPECIFIED` if this field is not set, or set to
     *           an invalid integer value.
     *           For allowed values, use constants defined on {@see \Google\Cloud\Retail\V2alpha\RejoinUserEventsRequest\UserEventRejoinScope}
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return \Google\ApiCore\OperationResponse
     *
     * @throws ApiException if the remote call fails
     *
     * @experimental
     */
    public function rejoinUserEvents($parent, array $optionalArgs = [])
    {
        $request = new RejoinUserEventsRequest();
        $requestParamHeaders = [];
        $request->setParent($parent);
        $requestParamHeaders['parent'] = $parent;
        if (isset($optionalArgs['userEventRejoinScope'])) {
            $request->setUserEventRejoinScope($optionalArgs['userEventRejoinScope']);
        }

        $requestParams = new RequestParamsHeaderDescriptor($requestParamHeaders);
        $optionalArgs['headers'] = isset($optionalArgs['headers']) ? array_merge($requestParams->getHeader(), $optionalArgs['headers']) : $requestParams->getHeader();
        return $this->startOperationsCall('RejoinUserEvents', $optionalArgs, $request, $this->getOperationsClient())->wait();
    }

    /**
     * Writes a single user event.
     *
     * Sample code:
     * ```
     * $userEventServiceClient = new UserEventServiceClient();
     * try {
     *     $parent = 'parent';
     *     $userEvent = new UserEvent();
     *     $response = $userEventServiceClient->writeUserEvent($parent, $userEvent);
     * } finally {
     *     $userEventServiceClient->close();
     * }
     * ```
     *
     * @param string    $parent       Required. The parent catalog resource name, such as
     *                                `projects/1234/locations/global/catalogs/default_catalog`.
     * @param UserEvent $userEvent    Required. User event to write.
     * @param array     $optionalArgs {
     *     Optional.
     *
     *     @type bool $writeAsync
     *           If set to true, the user event will be written asynchronously after
     *           validation, and the API will respond without waiting for the write.
     *           Therefore, silent failures can occur even if the API returns success. In
     *           case of silent failures, error messages can be found in Stackdriver logs.
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return \Google\Cloud\Retail\V2alpha\UserEvent
     *
     * @throws ApiException if the remote call fails
     *
     * @experimental
     */
    public function writeUserEvent($parent, $userEvent, array $optionalArgs = [])
    {
        $request = new WriteUserEventRequest();
        $requestParamHeaders = [];
        $request->setParent($parent);
        $request->setUserEvent($userEvent);
        $requestParamHeaders['parent'] = $parent;
        if (isset($optionalArgs['writeAsync'])) {
            $request->setWriteAsync($optionalArgs['writeAsync']);
        }

        $requestParams = new RequestParamsHeaderDescriptor($requestParamHeaders);
        $optionalArgs['headers'] = isset($optionalArgs['headers']) ? array_merge($requestParams->getHeader(), $optionalArgs['headers']) : $requestParams->getHeader();
        return $this->startCall('WriteUserEvent', UserEvent::class, $optionalArgs, $request)->wait();
    }
}
