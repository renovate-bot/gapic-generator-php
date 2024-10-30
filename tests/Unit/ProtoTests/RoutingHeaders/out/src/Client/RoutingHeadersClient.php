<?php
/*
 * Copyright 2022 Google LLC
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
 * https://github.com/googleapis/googleapis/blob/master/tests/Unit/ProtoTests/RoutingHeaders/routing-headers.proto
 * Updates to the above are reflected here through a refresh process.
 */

namespace Testing\RoutingHeaders\Client;

use Google\ApiCore\ApiException;
use Google\ApiCore\CredentialsWrapper;
use Google\ApiCore\GapicClientTrait;
use Google\ApiCore\RetrySettings;
use Google\ApiCore\Transport\TransportInterface;
use Google\ApiCore\ValidationException;
use Google\Auth\FetchAuthTokenInterface;
use GuzzleHttp\Promise\PromiseInterface;
use Testing\RoutingHeaders\NestedRequest;
use Testing\RoutingHeaders\OrderRequest;
use Testing\RoutingHeaders\Response;
use Testing\RoutingHeaders\SimpleRequest;

/**
 * Service Description:
 *
 * This class provides the ability to make remote calls to the backing service through method
 * calls that map to API methods.
 *
 * @method PromiseInterface<Response> deleteMethodAsync(SimpleRequest $request, array $optionalArgs = [])
 * @method PromiseInterface<Response> getMethodAsync(SimpleRequest $request, array $optionalArgs = [])
 * @method PromiseInterface<Response> getNoPlaceholdersMethodAsync(SimpleRequest $request, array $optionalArgs = [])
 * @method PromiseInterface<Response> getNoTemplateMethodAsync(SimpleRequest $request, array $optionalArgs = [])
 * @method PromiseInterface<Response> nestedMethodAsync(NestedRequest $request, array $optionalArgs = [])
 * @method PromiseInterface<Response> nestedMultiMethodAsync(NestedRequest $request, array $optionalArgs = [])
 * @method PromiseInterface<Response> orderingMethodAsync(OrderRequest $request, array $optionalArgs = [])
 * @method PromiseInterface<Response> patchMethodAsync(SimpleRequest $request, array $optionalArgs = [])
 * @method PromiseInterface<Response> postMethodAsync(SimpleRequest $request, array $optionalArgs = [])
 * @method PromiseInterface<Response> putMethodAsync(SimpleRequest $request, array $optionalArgs = [])
 * @method PromiseInterface<Response> routingRuleWithOutParametersAsync(NestedRequest $request, array $optionalArgs = [])
 * @method PromiseInterface<Response> routingRuleWithParametersAsync(NestedRequest $request, array $optionalArgs = [])
 */
final class RoutingHeadersClient
{
    use GapicClientTrait;

    /** The name of the service. */
    private const SERVICE_NAME = 'testing.routingheaders.RoutingHeaders';

    /** The default address of the service. */
    private const SERVICE_ADDRESS = 'routingheaders.example.com';

    /** The default port of the service. */
    private const DEFAULT_SERVICE_PORT = 443;

    /** The name of the code generator, to be included in the agent header. */
    private const CODEGEN_NAME = 'gapic';

    /** The default scopes required by the service. */
    public static $serviceScopes = [];

    private static function getClientDefaults()
    {
        return [
            'serviceName' => self::SERVICE_NAME,
            'apiEndpoint' => self::SERVICE_ADDRESS . ':' . self::DEFAULT_SERVICE_PORT,
            'clientConfig' => __DIR__ . '/../resources/routing_headers_client_config.json',
            'descriptorsConfigPath' => __DIR__ . '/../resources/routing_headers_descriptor_config.php',
            'gcpApiConfigPath' => __DIR__ . '/../resources/routing_headers_grpc_config.json',
            'credentialsConfig' => [
                'defaultScopes' => self::$serviceScopes,
            ],
            'transportConfig' => [
                'rest' => [
                    'restClientConfigPath' => __DIR__ . '/../resources/routing_headers_rest_client_config.php',
                ],
            ],
        ];
    }

    /**
     * Constructor.
     *
     * @param array $options {
     *     Optional. Options for configuring the service API wrapper.
     *
     *     @type string $apiEndpoint
     *           The address of the API remote host. May optionally include the port, formatted
     *           as "<uri>:<port>". Default 'routingheaders.example.com:443'.
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
     */
    public function __construct(array $options = [])
    {
        $clientOptions = $this->buildClientOptions($options);
        $this->setClientOptions($clientOptions);
    }

    /** Handles execution of the async variants for each documented method. */
    public function __call($method, $args)
    {
        if (substr($method, -5) !== 'Async') {
            trigger_error('Call to undefined method ' . __CLASS__ . "::$method()", E_USER_ERROR);
        }

        array_unshift($args, substr($method, 0, -5));
        return call_user_func_array([$this, 'startAsyncCall'], $args);
    }

    /**
     * The async variant is {@see RoutingHeadersClient::deleteMethodAsync()} .
     *
     * @example samples/RoutingHeadersClient/delete_method.php
     *
     * @param SimpleRequest $request     A request to house fields associated with the call.
     * @param array         $callOptions {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return Response
     *
     * @throws ApiException Thrown if the API call fails.
     */
    public function deleteMethod(SimpleRequest $request, array $callOptions = []): Response
    {
        return $this->startApiCall('DeleteMethod', $request, $callOptions)->wait();
    }

    /**
     * The async variant is {@see RoutingHeadersClient::getMethodAsync()} .
     *
     * @example samples/RoutingHeadersClient/get_method.php
     *
     * @param SimpleRequest $request     A request to house fields associated with the call.
     * @param array         $callOptions {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return Response
     *
     * @throws ApiException Thrown if the API call fails.
     */
    public function getMethod(SimpleRequest $request, array $callOptions = []): Response
    {
        return $this->startApiCall('GetMethod', $request, $callOptions)->wait();
    }

    /**
     * The async variant is {@see RoutingHeadersClient::getNoPlaceholdersMethodAsync()}
     * .
     *
     * @example samples/RoutingHeadersClient/get_no_placeholders_method.php
     *
     * @param SimpleRequest $request     A request to house fields associated with the call.
     * @param array         $callOptions {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return Response
     *
     * @throws ApiException Thrown if the API call fails.
     */
    public function getNoPlaceholdersMethod(SimpleRequest $request, array $callOptions = []): Response
    {
        return $this->startApiCall('GetNoPlaceholdersMethod', $request, $callOptions)->wait();
    }

    /**
     * The async variant is {@see RoutingHeadersClient::getNoTemplateMethodAsync()} .
     *
     * @example samples/RoutingHeadersClient/get_no_template_method.php
     *
     * @param SimpleRequest $request     A request to house fields associated with the call.
     * @param array         $callOptions {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return Response
     *
     * @throws ApiException Thrown if the API call fails.
     */
    public function getNoTemplateMethod(SimpleRequest $request, array $callOptions = []): Response
    {
        return $this->startApiCall('GetNoTemplateMethod', $request, $callOptions)->wait();
    }

    /**
     * The async variant is {@see RoutingHeadersClient::nestedMethodAsync()} .
     *
     * @example samples/RoutingHeadersClient/nested_method.php
     *
     * @param NestedRequest $request     A request to house fields associated with the call.
     * @param array         $callOptions {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return Response
     *
     * @throws ApiException Thrown if the API call fails.
     */
    public function nestedMethod(NestedRequest $request, array $callOptions = []): Response
    {
        return $this->startApiCall('NestedMethod', $request, $callOptions)->wait();
    }

    /**
     * The async variant is {@see RoutingHeadersClient::nestedMultiMethodAsync()} .
     *
     * @example samples/RoutingHeadersClient/nested_multi_method.php
     *
     * @param NestedRequest $request     A request to house fields associated with the call.
     * @param array         $callOptions {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return Response
     *
     * @throws ApiException Thrown if the API call fails.
     */
    public function nestedMultiMethod(NestedRequest $request, array $callOptions = []): Response
    {
        return $this->startApiCall('NestedMultiMethod', $request, $callOptions)->wait();
    }

    /**
     * The async variant is {@see RoutingHeadersClient::orderingMethodAsync()} .
     *
     * @example samples/RoutingHeadersClient/ordering_method.php
     *
     * @param OrderRequest $request     A request to house fields associated with the call.
     * @param array        $callOptions {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return Response
     *
     * @throws ApiException Thrown if the API call fails.
     */
    public function orderingMethod(OrderRequest $request, array $callOptions = []): Response
    {
        return $this->startApiCall('OrderingMethod', $request, $callOptions)->wait();
    }

    /**
     * The async variant is {@see RoutingHeadersClient::patchMethodAsync()} .
     *
     * @example samples/RoutingHeadersClient/patch_method.php
     *
     * @param SimpleRequest $request     A request to house fields associated with the call.
     * @param array         $callOptions {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return Response
     *
     * @throws ApiException Thrown if the API call fails.
     */
    public function patchMethod(SimpleRequest $request, array $callOptions = []): Response
    {
        return $this->startApiCall('PatchMethod', $request, $callOptions)->wait();
    }

    /**
     * The async variant is {@see RoutingHeadersClient::postMethodAsync()} .
     *
     * @example samples/RoutingHeadersClient/post_method.php
     *
     * @param SimpleRequest $request     A request to house fields associated with the call.
     * @param array         $callOptions {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return Response
     *
     * @throws ApiException Thrown if the API call fails.
     */
    public function postMethod(SimpleRequest $request, array $callOptions = []): Response
    {
        return $this->startApiCall('PostMethod', $request, $callOptions)->wait();
    }

    /**
     * The async variant is {@see RoutingHeadersClient::putMethodAsync()} .
     *
     * @example samples/RoutingHeadersClient/put_method.php
     *
     * @param SimpleRequest $request     A request to house fields associated with the call.
     * @param array         $callOptions {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return Response
     *
     * @throws ApiException Thrown if the API call fails.
     */
    public function putMethod(SimpleRequest $request, array $callOptions = []): Response
    {
        return $this->startApiCall('PutMethod', $request, $callOptions)->wait();
    }

    /**
     * The async variant is
     * {@see RoutingHeadersClient::routingRuleWithOutParametersAsync()} .
     *
     * @example samples/RoutingHeadersClient/routing_rule_with_out_parameters.php
     *
     * @param NestedRequest $request     A request to house fields associated with the call.
     * @param array         $callOptions {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return Response
     *
     * @throws ApiException Thrown if the API call fails.
     */
    public function routingRuleWithOutParameters(NestedRequest $request, array $callOptions = []): Response
    {
        return $this->startApiCall('RoutingRuleWithOutParameters', $request, $callOptions)->wait();
    }

    /**
     * The async variant is
     * {@see RoutingHeadersClient::routingRuleWithParametersAsync()} .
     *
     * @example samples/RoutingHeadersClient/routing_rule_with_parameters.php
     *
     * @param NestedRequest $request     A request to house fields associated with the call.
     * @param array         $callOptions {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return Response
     *
     * @throws ApiException Thrown if the API call fails.
     */
    public function routingRuleWithParameters(NestedRequest $request, array $callOptions = []): Response
    {
        return $this->startApiCall('RoutingRuleWithParameters', $request, $callOptions)->wait();
    }
}
