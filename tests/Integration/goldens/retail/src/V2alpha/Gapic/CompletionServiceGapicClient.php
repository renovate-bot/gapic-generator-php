<?php
/*
 * Copyright 2024 Google LLC
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
 * https://github.com/googleapis/googleapis/blob/master/google/cloud/retail/v2alpha/completion_service.proto
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
use Google\Auth\FetchAuthTokenInterface;
use Google\Cloud\Retail\V2alpha\CompleteQueryRequest;
use Google\Cloud\Retail\V2alpha\CompleteQueryResponse;
use Google\Cloud\Retail\V2alpha\CompletionDataInputConfig;
use Google\Cloud\Retail\V2alpha\ImportCompletionDataRequest;
use Google\LongRunning\Operation;

/**
 * Service Description: Autocomplete service for retail.
 *
 * This feature is only available for users who have Retail Search enabled.
 * Enable Retail Search on Cloud Console before using this feature.
 *
 * This class provides the ability to make remote calls to the backing service through method
 * calls that map to API methods. Sample code to get started:
 *
 * ```
 * $completionServiceClient = new CompletionServiceClient();
 * try {
 *     $formattedCatalog = $completionServiceClient->catalogName('[PROJECT]', '[LOCATION]', '[CATALOG]');
 *     $query = 'query';
 *     $response = $completionServiceClient->completeQuery($formattedCatalog, $query);
 * } finally {
 *     $completionServiceClient->close();
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
class CompletionServiceGapicClient
{
    use GapicClientTrait;

    /** The name of the service. */
    const SERVICE_NAME = 'google.cloud.retail.v2alpha.CompletionService';

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

    private static $pathTemplateMap;

    private $operationsClient;

    private static function getClientDefaults()
    {
        return [
            'serviceName' => self::SERVICE_NAME,
            'apiEndpoint' => self::SERVICE_ADDRESS . ':' . self::DEFAULT_SERVICE_PORT,
            'clientConfig' => __DIR__ . '/../resources/completion_service_client_config.json',
            'descriptorsConfigPath' => __DIR__ . '/../resources/completion_service_descriptor_config.php',
            'gcpApiConfigPath' => __DIR__ . '/../resources/completion_service_grpc_config.json',
            'credentialsConfig' => [
                'defaultScopes' => self::$serviceScopes,
            ],
            'transportConfig' => [
                'rest' => [
                    'restClientConfigPath' => __DIR__ . '/../resources/completion_service_rest_client_config.php',
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

    private static function getPathTemplateMap()
    {
        if (self::$pathTemplateMap == null) {
            self::$pathTemplateMap = [
                'catalog' => self::getCatalogNameTemplate(),
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
     * Parses a formatted name string and returns an associative array of the components in the name.
     * The following name formats are supported:
     * Template: Pattern
     * - catalog: projects/{project}/locations/{location}/catalogs/{catalog}
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
     * Completes the specified prefix with keyword suggestions.
     *
     * This feature is only available for users who have Retail Search enabled.
     * Enable Retail Search on Cloud Console before using this feature.
     *
     * Sample code:
     * ```
     * $completionServiceClient = new CompletionServiceClient();
     * try {
     *     $formattedCatalog = $completionServiceClient->catalogName('[PROJECT]', '[LOCATION]', '[CATALOG]');
     *     $query = 'query';
     *     $response = $completionServiceClient->completeQuery($formattedCatalog, $query);
     * } finally {
     *     $completionServiceClient->close();
     * }
     * ```
     *
     * @param string $catalog      Required. Catalog for which the completion is performed.
     *
     *                             Full resource name of catalog, such as
     *                             `projects/&#42;/locations/global/catalogs/default_catalog`.
     * @param string $query        Required. The query used to generate suggestions.
     *
     *                             The maximum number of allowed characters is 255.
     * @param array  $optionalArgs {
     *     Optional.
     *
     *     @type string $visitorId
     *           Required field. A unique identifier for tracking visitors. For example,
     *           this could be implemented with an HTTP cookie, which should be able to
     *           uniquely identify a visitor on a single device. This unique identifier
     *           should not change if the visitor logs in or out of the website.
     *
     *           The field must be a UTF-8 encoded string with a length limit of 128
     *           characters. Otherwise, an INVALID_ARGUMENT error is returned.
     *     @type string[] $languageCodes
     *           Note that this field applies for `user-data` dataset only. For requests
     *           with `cloud-retail` dataset, setting this field has no effect.
     *
     *           The language filters applied to the output suggestions. If set, it should
     *           contain the language of the query. If not set, suggestions are returned
     *           without considering language restrictions. This is the BCP-47 language
     *           code, such as "en-US" or "sr-Latn". For more information, see [Tags for
     *           Identifying Languages](https://tools.ietf.org/html/bcp47). The maximum
     *           number of language codes is 3.
     *     @type string $deviceType
     *           The device type context for completion suggestions. We recommend that you
     *           leave this field empty.
     *
     *           It can apply different suggestions on different device types, e.g.
     *           `DESKTOP`, `MOBILE`. If it is empty, the suggestions are across all device
     *           types.
     *
     *           Supported formats:
     *
     *           * `UNKNOWN_DEVICE_TYPE`
     *
     *           * `DESKTOP`
     *
     *           * `MOBILE`
     *
     *           * A customized string starts with `OTHER_`, e.g. `OTHER_IPHONE`.
     *     @type string $dataset
     *           Determines which dataset to use for fetching completion. "user-data" will
     *           use the imported dataset through
     *           [CompletionService.ImportCompletionData][google.cloud.retail.v2alpha.CompletionService.ImportCompletionData].
     *           "cloud-retail" will use the dataset generated by cloud retail based on user
     *           events. If leave empty, it will use the "user-data".
     *
     *           Current supported values:
     *
     *           * user-data
     *
     *           * cloud-retail:
     *           This option requires enabling auto-learning function first. See
     *           [guidelines](https://cloud.google.com/retail/docs/completion-overview#generated-completion-dataset).
     *     @type int $maxSuggestions
     *           Completion max suggestions. If left unset or set to 0, then will fallback
     *           to the configured value
     *           [CompletionConfig.max_suggestions][google.cloud.retail.v2alpha.CompletionConfig.max_suggestions].
     *
     *           The maximum allowed max suggestions is 20. If it is set higher, it will be
     *           capped by 20.
     *     @type bool $enableAttributeSuggestions
     *           If true, attribute suggestions are enabled and provided in response.
     *
     *           This field is only available for "cloud-retail" dataset.
     *     @type string $entity
     *           The entity for customers that may run multiple different entities, domains,
     *           sites or regions, for example, `Google US`, `Google Ads`, `Waymo`,
     *           `google.com`, `youtube.com`, etc.
     *           If this is set, it should be exactly matched with
     *           [UserEvent.entity][google.cloud.retail.v2alpha.UserEvent.entity] to get
     *           per-entity autocomplete results.
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return \Google\Cloud\Retail\V2alpha\CompleteQueryResponse
     *
     * @throws ApiException if the remote call fails
     *
     * @experimental
     */
    public function completeQuery($catalog, $query, array $optionalArgs = [])
    {
        $request = new CompleteQueryRequest();
        $requestParamHeaders = [];
        $request->setCatalog($catalog);
        $request->setQuery($query);
        $requestParamHeaders['catalog'] = $catalog;
        if (isset($optionalArgs['visitorId'])) {
            $request->setVisitorId($optionalArgs['visitorId']);
        }

        if (isset($optionalArgs['languageCodes'])) {
            $request->setLanguageCodes($optionalArgs['languageCodes']);
        }

        if (isset($optionalArgs['deviceType'])) {
            $request->setDeviceType($optionalArgs['deviceType']);
        }

        if (isset($optionalArgs['dataset'])) {
            $request->setDataset($optionalArgs['dataset']);
        }

        if (isset($optionalArgs['maxSuggestions'])) {
            $request->setMaxSuggestions($optionalArgs['maxSuggestions']);
        }

        if (isset($optionalArgs['enableAttributeSuggestions'])) {
            $request->setEnableAttributeSuggestions($optionalArgs['enableAttributeSuggestions']);
        }

        if (isset($optionalArgs['entity'])) {
            $request->setEntity($optionalArgs['entity']);
        }

        $requestParams = new RequestParamsHeaderDescriptor($requestParamHeaders);
        $optionalArgs['headers'] = isset($optionalArgs['headers']) ? array_merge($requestParams->getHeader(), $optionalArgs['headers']) : $requestParams->getHeader();
        return $this->startCall('CompleteQuery', CompleteQueryResponse::class, $optionalArgs, $request)->wait();
    }

    /**
     * Bulk import of processed completion dataset.
     *
     * Request processing is asynchronous. Partial updating is not supported.
     *
     * The operation is successfully finished only after the imported suggestions
     * are indexed successfully and ready for serving. The process takes hours.
     *
     * This feature is only available for users who have Retail Search enabled.
     * Enable Retail Search on Cloud Console before using this feature.
     *
     * Sample code:
     * ```
     * $completionServiceClient = new CompletionServiceClient();
     * try {
     *     $formattedParent = $completionServiceClient->catalogName('[PROJECT]', '[LOCATION]', '[CATALOG]');
     *     $inputConfig = new CompletionDataInputConfig();
     *     $operationResponse = $completionServiceClient->importCompletionData($formattedParent, $inputConfig);
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
     *     $operationResponse = $completionServiceClient->importCompletionData($formattedParent, $inputConfig);
     *     $operationName = $operationResponse->getName();
     *     // ... do other work
     *     $newOperationResponse = $completionServiceClient->resumeOperation($operationName, 'importCompletionData');
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
     *     $completionServiceClient->close();
     * }
     * ```
     *
     * @param string                    $parent       Required. The catalog which the suggestions dataset belongs to.
     *
     *                                                Format: `projects/1234/locations/global/catalogs/default_catalog`.
     * @param CompletionDataInputConfig $inputConfig  Required. The desired input location of the data.
     * @param array                     $optionalArgs {
     *     Optional.
     *
     *     @type string $notificationPubsubTopic
     *           Pub/Sub topic for receiving notification. If this field is set,
     *           when the import is finished, a notification is sent to
     *           specified Pub/Sub topic. The message data is JSON string of a
     *           [Operation][google.longrunning.Operation].
     *           Format of the Pub/Sub topic is `projects/{project}/topics/{topic}`.
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
    public function importCompletionData($parent, $inputConfig, array $optionalArgs = [])
    {
        $request = new ImportCompletionDataRequest();
        $requestParamHeaders = [];
        $request->setParent($parent);
        $request->setInputConfig($inputConfig);
        $requestParamHeaders['parent'] = $parent;
        if (isset($optionalArgs['notificationPubsubTopic'])) {
            $request->setNotificationPubsubTopic($optionalArgs['notificationPubsubTopic']);
        }

        $requestParams = new RequestParamsHeaderDescriptor($requestParamHeaders);
        $optionalArgs['headers'] = isset($optionalArgs['headers']) ? array_merge($requestParams->getHeader(), $optionalArgs['headers']) : $requestParams->getHeader();
        return $this->startOperationsCall('ImportCompletionData', $optionalArgs, $request, $this->getOperationsClient())->wait();
    }
}
