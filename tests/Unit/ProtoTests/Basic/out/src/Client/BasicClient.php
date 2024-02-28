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
 * https://github.com/googleapis/googleapis/blob/master/tests/Unit/ProtoTests/Basic/basic.proto
 * Updates to the above are reflected here through a refresh process.
 */

namespace Testing\Basic\Client;

use Google\ApiCore\ApiException;
use Google\ApiCore\CredentialsWrapper;
use Google\ApiCore\GapicClientTrait;
use Google\ApiCore\InsecureCredentialsWrapper;
use Google\ApiCore\RetrySettings;
use Google\ApiCore\Transport\TransportInterface;
use Google\ApiCore\ValidationException;
use Google\Auth\FetchAuthTokenInterface;
use Grpc\ChannelCredentials;
use GuzzleHttp\Promise\PromiseInterface;
use Testing\Basic\Request;
use Testing\Basic\RequestWithArgs;
use Testing\Basic\Response;

/**
 * Service Description: This is a basic service.
 *
 * This class provides the ability to make remote calls to the backing service through method
 * calls that map to API methods.
 *
 * @method PromiseInterface aMethodAsync(Request $request, array $optionalArgs = [])
 * @method PromiseInterface methodWithArgsAsync(RequestWithArgs $request, array $optionalArgs = [])
 */
final class BasicClient
{
    use GapicClientTrait;

    /** The name of the service. */
    private const SERVICE_NAME = 'testing.basic.Basic';

    /** The default address of the service. */
    private const SERVICE_ADDRESS = 'basic.example.com';

    /** The default port of the service. */
    private const DEFAULT_SERVICE_PORT = 443;

    /** The name of the code generator, to be included in the agent header. */
    private const CODEGEN_NAME = 'gapic';

    /** The default scopes required by the service. */
    public static $serviceScopes = [
        'scope1',
        'scope2',
    ];

    private static function getClientDefaults()
    {
        return [
            'serviceName' => self::SERVICE_NAME,
            'apiEndpoint' => self::SERVICE_ADDRESS . ':' . self::DEFAULT_SERVICE_PORT,
            'clientConfig' => __DIR__ . '/../resources/basic_client_config.json',
            'descriptorsConfigPath' => __DIR__ . '/../resources/basic_descriptor_config.php',
            'gcpApiConfigPath' => __DIR__ . '/../resources/basic_grpc_config.json',
            'credentialsConfig' => [
                'defaultScopes' => self::$serviceScopes,
            ],
            'transportConfig' => [
                'rest' => [
                    'restClientConfigPath' => __DIR__ . '/../resources/basic_rest_client_config.php',
                ],
            ],
        ];
    }

    /**
     * Constructor.
     *
     * Setting the "BASIC_EMULATOR_HOST" environment variable will automatically set
     * the API Endpoint to the value specified in the variable, as well as ensure that
     * empty credentials are used in the transport layer.
     *
     * @param array $options {
     *     Optional. Options for configuring the service API wrapper.
     *
     *     @type string $apiEndpoint
     *           The address of the API remote host. May optionally include the port, formatted
     *           as "<uri>:<port>". Default 'basic.example.com:443'.
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
        $options = $options + $this->getDefaultEmulatorConfig();
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
     * Test summary text for AMethod
     *
     * The async variant is {@see BasicClient::aMethodAsync()} .
     *
     * @example samples/BasicClient/a_method.php
     *
     * @param Request $request     A request to house fields associated with the call.
     * @param array   $callOptions {
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
    public function aMethod(Request $request, array $callOptions = []): Response
    {
        return $this->startApiCall('AMethod', $request, $callOptions)->wait();
    }

    /**
     * Test including method args.
     *
     * The async variant is {@see BasicClient::methodWithArgsAsync()} .
     *
     * @example samples/BasicClient/method_with_args.php
     *
     * @param RequestWithArgs $request     A request to house fields associated with the call.
     * @param array           $callOptions {
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
    public function methodWithArgs(RequestWithArgs $request, array $callOptions = []): Response
    {
        return $this->startApiCall('MethodWithArgs', $request, $callOptions)->wait();
    }

    /** Configure the gapic configuration to use a service emulator. */
    private function getDefaultEmulatorConfig(): array
    {
        $emulatorHost = getenv('BASIC_EMULATOR_HOST');
        if (empty($emulatorHost)) {
            return [];
        }

        if ($scheme = parse_url($emulatorHost, PHP_URL_SCHEME)) {
            $search = $scheme . '://';
            $emulatorHost = str_replace($search, '', $emulatorHost);
        }

        return [
            'apiEndpoint' => $emulatorHost,
            'transportConfig' => [
                'grpc' => [
                    'stubOpts' => [
                        'credentials' => ChannelCredentials::createInsecure(),
                    ],
                ],
            ],
            'credentials' => new InsecureCredentialsWrapper(),
        ];
    }
}
