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
 * https://github.com/googleapis/googleapis/blob/master/google/cloud/retail/v2alpha/merchant_center_account_link_service.proto
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
use Google\Cloud\Retail\V2alpha\CreateMerchantCenterAccountLinkRequest;
use Google\Cloud\Retail\V2alpha\DeleteMerchantCenterAccountLinkRequest;
use Google\Cloud\Retail\V2alpha\ListMerchantCenterAccountLinksRequest;
use Google\Cloud\Retail\V2alpha\ListMerchantCenterAccountLinksResponse;
use Google\Cloud\Retail\V2alpha\MerchantCenterAccountLink;
use Google\LongRunning\Operation;
use Google\Protobuf\GPBEmpty;

/**
 * Service Description: Merchant Center Link service to link a Branch to a Merchant Center Account.
 *
 * This class provides the ability to make remote calls to the backing service through method
 * calls that map to API methods. Sample code to get started:
 *
 * ```
 * $merchantCenterAccountLinkServiceClient = new MerchantCenterAccountLinkServiceClient();
 * try {
 *     $formattedParent = $merchantCenterAccountLinkServiceClient->catalogName('[PROJECT]', '[LOCATION]', '[CATALOG]');
 *     $merchantCenterAccountLink = new MerchantCenterAccountLink();
 *     $operationResponse = $merchantCenterAccountLinkServiceClient->createMerchantCenterAccountLink($formattedParent, $merchantCenterAccountLink);
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
 *     $operationResponse = $merchantCenterAccountLinkServiceClient->createMerchantCenterAccountLink($formattedParent, $merchantCenterAccountLink);
 *     $operationName = $operationResponse->getName();
 *     // ... do other work
 *     $newOperationResponse = $merchantCenterAccountLinkServiceClient->resumeOperation($operationName, 'createMerchantCenterAccountLink');
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
 *     $merchantCenterAccountLinkServiceClient->close();
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
class MerchantCenterAccountLinkServiceGapicClient
{
    use GapicClientTrait;

    /** The name of the service. */
    const SERVICE_NAME = 'google.cloud.retail.v2alpha.MerchantCenterAccountLinkService';

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

    private static $merchantCenterAccountLinkNameTemplate;

    private static $pathTemplateMap;

    private $operationsClient;

    private static function getClientDefaults()
    {
        return [
            'serviceName' => self::SERVICE_NAME,
            'apiEndpoint' => self::SERVICE_ADDRESS . ':' . self::DEFAULT_SERVICE_PORT,
            'clientConfig' => __DIR__ . '/../resources/merchant_center_account_link_service_client_config.json',
            'descriptorsConfigPath' => __DIR__ . '/../resources/merchant_center_account_link_service_descriptor_config.php',
            'gcpApiConfigPath' => __DIR__ . '/../resources/merchant_center_account_link_service_grpc_config.json',
            'credentialsConfig' => [
                'defaultScopes' => self::$serviceScopes,
            ],
            'transportConfig' => [
                'rest' => [
                    'restClientConfigPath' => __DIR__ . '/../resources/merchant_center_account_link_service_rest_client_config.php',
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

    private static function getMerchantCenterAccountLinkNameTemplate()
    {
        if (self::$merchantCenterAccountLinkNameTemplate == null) {
            self::$merchantCenterAccountLinkNameTemplate = new PathTemplate('projects/{project}/locations/{location}/catalogs/{catalog}/merchantCenterAccountLinks/{merchant_center_account_link}');
        }

        return self::$merchantCenterAccountLinkNameTemplate;
    }

    private static function getPathTemplateMap()
    {
        if (self::$pathTemplateMap == null) {
            self::$pathTemplateMap = [
                'catalog' => self::getCatalogNameTemplate(),
                'merchantCenterAccountLink' => self::getMerchantCenterAccountLinkNameTemplate(),
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
     * Formats a string containing the fully-qualified path to represent a
     * merchant_center_account_link resource.
     *
     * @param string $project
     * @param string $location
     * @param string $catalog
     * @param string $merchantCenterAccountLink
     *
     * @return string The formatted merchant_center_account_link resource.
     *
     * @experimental
     */
    public static function merchantCenterAccountLinkName($project, $location, $catalog, $merchantCenterAccountLink)
    {
        return self::getMerchantCenterAccountLinkNameTemplate()->render([
            'project' => $project,
            'location' => $location,
            'catalog' => $catalog,
            'merchant_center_account_link' => $merchantCenterAccountLink,
        ]);
    }

    /**
     * Parses a formatted name string and returns an associative array of the components in the name.
     * The following name formats are supported:
     * Template: Pattern
     * - catalog: projects/{project}/locations/{location}/catalogs/{catalog}
     * - merchantCenterAccountLink: projects/{project}/locations/{location}/catalogs/{catalog}/merchantCenterAccountLinks/{merchant_center_account_link}
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
     * Creates a
     * [MerchantCenterAccountLink][google.cloud.retail.v2alpha.MerchantCenterAccountLink].
     *
     * Sample code:
     * ```
     * $merchantCenterAccountLinkServiceClient = new MerchantCenterAccountLinkServiceClient();
     * try {
     *     $formattedParent = $merchantCenterAccountLinkServiceClient->catalogName('[PROJECT]', '[LOCATION]', '[CATALOG]');
     *     $merchantCenterAccountLink = new MerchantCenterAccountLink();
     *     $operationResponse = $merchantCenterAccountLinkServiceClient->createMerchantCenterAccountLink($formattedParent, $merchantCenterAccountLink);
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
     *     $operationResponse = $merchantCenterAccountLinkServiceClient->createMerchantCenterAccountLink($formattedParent, $merchantCenterAccountLink);
     *     $operationName = $operationResponse->getName();
     *     // ... do other work
     *     $newOperationResponse = $merchantCenterAccountLinkServiceClient->resumeOperation($operationName, 'createMerchantCenterAccountLink');
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
     *     $merchantCenterAccountLinkServiceClient->close();
     * }
     * ```
     *
     * @param string                    $parent                    Required. The branch resource where this MerchantCenterAccountLink will be
     *                                                             created. Format:
     *                                                             projects/{PROJECT_NUMBER}/locations/global/catalogs/{CATALOG_ID}}
     * @param MerchantCenterAccountLink $merchantCenterAccountLink Required. The
     *                                                             [MerchantCenterAccountLink][google.cloud.retail.v2alpha.MerchantCenterAccountLink]
     *                                                             to create.
     *
     *                                                             If the caller does not have permission to create the
     *                                                             [MerchantCenterAccountLink][google.cloud.retail.v2alpha.MerchantCenterAccountLink],
     *                                                             regardless of whether or not it exists, a PERMISSION_DENIED error is
     *                                                             returned.
     * @param array                     $optionalArgs              {
     *     Optional.
     *
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
    public function createMerchantCenterAccountLink($parent, $merchantCenterAccountLink, array $optionalArgs = [])
    {
        $request = new CreateMerchantCenterAccountLinkRequest();
        $requestParamHeaders = [];
        $request->setParent($parent);
        $request->setMerchantCenterAccountLink($merchantCenterAccountLink);
        $requestParamHeaders['parent'] = $parent;
        $requestParams = new RequestParamsHeaderDescriptor($requestParamHeaders);
        $optionalArgs['headers'] = isset($optionalArgs['headers']) ? array_merge($requestParams->getHeader(), $optionalArgs['headers']) : $requestParams->getHeader();
        return $this->startOperationsCall('CreateMerchantCenterAccountLink', $optionalArgs, $request, $this->getOperationsClient())->wait();
    }

    /**
     * Deletes a
     * [MerchantCenterAccountLink][google.cloud.retail.v2alpha.MerchantCenterAccountLink].
     * If the
     * [MerchantCenterAccountLink][google.cloud.retail.v2alpha.MerchantCenterAccountLink]
     * to delete does not exist, a NOT_FOUND error is returned.
     *
     * Sample code:
     * ```
     * $merchantCenterAccountLinkServiceClient = new MerchantCenterAccountLinkServiceClient();
     * try {
     *     $formattedName = $merchantCenterAccountLinkServiceClient->merchantCenterAccountLinkName('[PROJECT]', '[LOCATION]', '[CATALOG]', '[MERCHANT_CENTER_ACCOUNT_LINK]');
     *     $merchantCenterAccountLinkServiceClient->deleteMerchantCenterAccountLink($formattedName);
     * } finally {
     *     $merchantCenterAccountLinkServiceClient->close();
     * }
     * ```
     *
     * @param string $name         Required. Full resource name. Format:
     *                             projects/{project_number}/locations/{location_id}/catalogs/{catalog_id}/merchantCenterAccountLinks/{merchant_center_account_link_id}
     * @param array  $optionalArgs {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @throws ApiException if the remote call fails
     *
     * @experimental
     */
    public function deleteMerchantCenterAccountLink($name, array $optionalArgs = [])
    {
        $request = new DeleteMerchantCenterAccountLinkRequest();
        $requestParamHeaders = [];
        $request->setName($name);
        $requestParamHeaders['name'] = $name;
        $requestParams = new RequestParamsHeaderDescriptor($requestParamHeaders);
        $optionalArgs['headers'] = isset($optionalArgs['headers']) ? array_merge($requestParams->getHeader(), $optionalArgs['headers']) : $requestParams->getHeader();
        return $this->startCall('DeleteMerchantCenterAccountLink', GPBEmpty::class, $optionalArgs, $request)->wait();
    }

    /**
     * Lists all
     * [MerchantCenterAccountLink][google.cloud.retail.v2alpha.MerchantCenterAccountLink]s
     * under the specified parent [Catalog][google.cloud.retail.v2alpha.Catalog].
     *
     * Sample code:
     * ```
     * $merchantCenterAccountLinkServiceClient = new MerchantCenterAccountLinkServiceClient();
     * try {
     *     $formattedParent = $merchantCenterAccountLinkServiceClient->catalogName('[PROJECT]', '[LOCATION]', '[CATALOG]');
     *     $response = $merchantCenterAccountLinkServiceClient->listMerchantCenterAccountLinks($formattedParent);
     * } finally {
     *     $merchantCenterAccountLinkServiceClient->close();
     * }
     * ```
     *
     * @param string $parent       Required. The parent Catalog of the resource.
     *                             It must match this format:
     *                             projects/{PROJECT_NUMBER}/locations/global/catalogs/{CATALOG_ID}
     * @param array  $optionalArgs {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return \Google\Cloud\Retail\V2alpha\ListMerchantCenterAccountLinksResponse
     *
     * @throws ApiException if the remote call fails
     *
     * @experimental
     */
    public function listMerchantCenterAccountLinks($parent, array $optionalArgs = [])
    {
        $request = new ListMerchantCenterAccountLinksRequest();
        $requestParamHeaders = [];
        $request->setParent($parent);
        $requestParamHeaders['parent'] = $parent;
        $requestParams = new RequestParamsHeaderDescriptor($requestParamHeaders);
        $optionalArgs['headers'] = isset($optionalArgs['headers']) ? array_merge($requestParams->getHeader(), $optionalArgs['headers']) : $requestParams->getHeader();
        return $this->startCall('ListMerchantCenterAccountLinks', ListMerchantCenterAccountLinksResponse::class, $optionalArgs, $request)->wait();
    }
}
