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
 * https://github.com/googleapis/googleapis/blob/master/google/cloud/dataproc/v1/jobs.proto
 * Updates to the above are reflected here through a refresh process.
 */

namespace Google\Cloud\Dataproc\V1\Gapic;

use Google\ApiCore\ApiException;
use Google\ApiCore\Call;
use Google\ApiCore\CredentialsWrapper;
use Google\ApiCore\GapicClientTrait;
use Google\ApiCore\LongRunning\OperationsClient;
use Google\ApiCore\OperationResponse;
use Google\ApiCore\RequestParamsHeaderDescriptor;
use Google\ApiCore\RetrySettings;
use Google\ApiCore\Transport\TransportInterface;
use Google\ApiCore\ValidationException;
use Google\Auth\FetchAuthTokenInterface;
use Google\Cloud\Dataproc\V1\CancelJobRequest;
use Google\Cloud\Dataproc\V1\DeleteJobRequest;
use Google\Cloud\Dataproc\V1\GetJobRequest;
use Google\Cloud\Dataproc\V1\Job;
use Google\Cloud\Dataproc\V1\ListJobsRequest;
use Google\Cloud\Dataproc\V1\ListJobsRequest\JobStateMatcher;
use Google\Cloud\Dataproc\V1\ListJobsResponse;
use Google\Cloud\Dataproc\V1\SubmitJobRequest;
use Google\Cloud\Dataproc\V1\UpdateJobRequest;
use Google\Cloud\Iam\V1\GetIamPolicyRequest;
use Google\Cloud\Iam\V1\GetPolicyOptions;
use Google\Cloud\Iam\V1\Policy;
use Google\Cloud\Iam\V1\SetIamPolicyRequest;
use Google\Cloud\Iam\V1\TestIamPermissionsRequest;
use Google\Cloud\Iam\V1\TestIamPermissionsResponse;
use Google\LongRunning\Operation;
use Google\Protobuf\FieldMask;
use Google\Protobuf\GPBEmpty;

/**
 * Service Description: The JobController provides methods to manage jobs.
 *
 * This class provides the ability to make remote calls to the backing service through method
 * calls that map to API methods. Sample code to get started:
 *
 * ```
 * $jobControllerClient = new JobControllerClient();
 * try {
 *     $projectId = 'project_id';
 *     $region = 'region';
 *     $jobId = 'job_id';
 *     $response = $jobControllerClient->cancelJob($projectId, $region, $jobId);
 * } finally {
 *     $jobControllerClient->close();
 * }
 * ```
 *
 * @deprecated This class will be removed in the next major version update.
 */
class JobControllerGapicClient
{
    use GapicClientTrait;

    /** The name of the service. */
    const SERVICE_NAME = 'google.cloud.dataproc.v1.JobController';

    /**
     * The default address of the service.
     *
     * @deprecated SERVICE_ADDRESS_TEMPLATE should be used instead.
     */
    const SERVICE_ADDRESS = 'dataproc.googleapis.com';

    /** The address template of the service. */
    private const SERVICE_ADDRESS_TEMPLATE = 'dataproc.UNIVERSE_DOMAIN';

    /** The default port of the service. */
    const DEFAULT_SERVICE_PORT = 443;

    /** The name of the code generator, to be included in the agent header. */
    const CODEGEN_NAME = 'gapic';

    /** The default scopes required by the service. */
    public static $serviceScopes = [
        'https://www.googleapis.com/auth/cloud-platform',
    ];

    private $operationsClient;

    private static function getClientDefaults()
    {
        return [
            'serviceName' => self::SERVICE_NAME,
            'apiEndpoint' => self::SERVICE_ADDRESS . ':' . self::DEFAULT_SERVICE_PORT,
            'clientConfig' => __DIR__ . '/../resources/job_controller_client_config.json',
            'descriptorsConfigPath' => __DIR__ . '/../resources/job_controller_descriptor_config.php',
            'gcpApiConfigPath' => __DIR__ . '/../resources/job_controller_grpc_config.json',
            'credentialsConfig' => [
                'defaultScopes' => self::$serviceScopes,
            ],
            'transportConfig' => [
                'rest' => [
                    'restClientConfigPath' => __DIR__ . '/../resources/job_controller_rest_client_config.php',
                ],
            ],
        ];
    }

    /**
     * Return an OperationsClient object with the same endpoint as $this.
     *
     * @return OperationsClient
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
     *           as "<uri>:<port>". Default 'dataproc.googleapis.com:443'.
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
        $this->operationsClient = $this->createOperationsClient($clientOptions);
    }

    /**
     * Starts a job cancellation request. To access the job resource
     * after cancellation, call
     * [regions/{region}/jobs.list](https://cloud.google.com/dataproc/docs/reference/rest/v1/projects.regions.jobs/list)
     * or
     * [regions/{region}/jobs.get](https://cloud.google.com/dataproc/docs/reference/rest/v1/projects.regions.jobs/get).
     *
     * Sample code:
     * ```
     * $jobControllerClient = new JobControllerClient();
     * try {
     *     $projectId = 'project_id';
     *     $region = 'region';
     *     $jobId = 'job_id';
     *     $response = $jobControllerClient->cancelJob($projectId, $region, $jobId);
     * } finally {
     *     $jobControllerClient->close();
     * }
     * ```
     *
     * @param string $projectId    Required. The ID of the Google Cloud Platform project that the job
     *                             belongs to.
     * @param string $region       Required. The Dataproc region in which to handle the request.
     * @param string $jobId        Required. The job ID.
     * @param array  $optionalArgs {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return \Google\Cloud\Dataproc\V1\Job
     *
     * @throws ApiException if the remote call fails
     */
    public function cancelJob($projectId, $region, $jobId, array $optionalArgs = [])
    {
        $request = new CancelJobRequest();
        $requestParamHeaders = [];
        $request->setProjectId($projectId);
        $request->setRegion($region);
        $request->setJobId($jobId);
        $requestParamHeaders['project_id'] = $projectId;
        $requestParamHeaders['region'] = $region;
        $requestParamHeaders['job_id'] = $jobId;
        $requestParams = new RequestParamsHeaderDescriptor($requestParamHeaders);
        $optionalArgs['headers'] = isset($optionalArgs['headers']) ? array_merge($requestParams->getHeader(), $optionalArgs['headers']) : $requestParams->getHeader();
        return $this->startCall('CancelJob', Job::class, $optionalArgs, $request)->wait();
    }

    /**
     * Deletes the job from the project. If the job is active, the delete fails,
     * and the response returns `FAILED_PRECONDITION`.
     *
     * Sample code:
     * ```
     * $jobControllerClient = new JobControllerClient();
     * try {
     *     $projectId = 'project_id';
     *     $region = 'region';
     *     $jobId = 'job_id';
     *     $jobControllerClient->deleteJob($projectId, $region, $jobId);
     * } finally {
     *     $jobControllerClient->close();
     * }
     * ```
     *
     * @param string $projectId    Required. The ID of the Google Cloud Platform project that the job
     *                             belongs to.
     * @param string $region       Required. The Dataproc region in which to handle the request.
     * @param string $jobId        Required. The job ID.
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
     */
    public function deleteJob($projectId, $region, $jobId, array $optionalArgs = [])
    {
        $request = new DeleteJobRequest();
        $requestParamHeaders = [];
        $request->setProjectId($projectId);
        $request->setRegion($region);
        $request->setJobId($jobId);
        $requestParamHeaders['project_id'] = $projectId;
        $requestParamHeaders['region'] = $region;
        $requestParamHeaders['job_id'] = $jobId;
        $requestParams = new RequestParamsHeaderDescriptor($requestParamHeaders);
        $optionalArgs['headers'] = isset($optionalArgs['headers']) ? array_merge($requestParams->getHeader(), $optionalArgs['headers']) : $requestParams->getHeader();
        return $this->startCall('DeleteJob', GPBEmpty::class, $optionalArgs, $request)->wait();
    }

    /**
     * Gets the resource representation for a job in a project.
     *
     * Sample code:
     * ```
     * $jobControllerClient = new JobControllerClient();
     * try {
     *     $projectId = 'project_id';
     *     $region = 'region';
     *     $jobId = 'job_id';
     *     $response = $jobControllerClient->getJob($projectId, $region, $jobId);
     * } finally {
     *     $jobControllerClient->close();
     * }
     * ```
     *
     * @param string $projectId    Required. The ID of the Google Cloud Platform project that the job
     *                             belongs to.
     * @param string $region       Required. The Dataproc region in which to handle the request.
     * @param string $jobId        Required. The job ID.
     * @param array  $optionalArgs {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return \Google\Cloud\Dataproc\V1\Job
     *
     * @throws ApiException if the remote call fails
     */
    public function getJob($projectId, $region, $jobId, array $optionalArgs = [])
    {
        $request = new GetJobRequest();
        $requestParamHeaders = [];
        $request->setProjectId($projectId);
        $request->setRegion($region);
        $request->setJobId($jobId);
        $requestParamHeaders['project_id'] = $projectId;
        $requestParamHeaders['region'] = $region;
        $requestParamHeaders['job_id'] = $jobId;
        $requestParams = new RequestParamsHeaderDescriptor($requestParamHeaders);
        $optionalArgs['headers'] = isset($optionalArgs['headers']) ? array_merge($requestParams->getHeader(), $optionalArgs['headers']) : $requestParams->getHeader();
        return $this->startCall('GetJob', Job::class, $optionalArgs, $request)->wait();
    }

    /**
     * Lists regions/{region}/jobs in a project.
     *
     * Sample code:
     * ```
     * $jobControllerClient = new JobControllerClient();
     * try {
     *     $projectId = 'project_id';
     *     $region = 'region';
     *     // Iterate over pages of elements
     *     $pagedResponse = $jobControllerClient->listJobs($projectId, $region);
     *     foreach ($pagedResponse->iteratePages() as $page) {
     *         foreach ($page as $element) {
     *             // doSomethingWith($element);
     *         }
     *     }
     *     // Alternatively:
     *     // Iterate through all elements
     *     $pagedResponse = $jobControllerClient->listJobs($projectId, $region);
     *     foreach ($pagedResponse->iterateAllElements() as $element) {
     *         // doSomethingWith($element);
     *     }
     * } finally {
     *     $jobControllerClient->close();
     * }
     * ```
     *
     * @param string $projectId    Required. The ID of the Google Cloud Platform project that the job
     *                             belongs to.
     * @param string $region       Required. The Dataproc region in which to handle the request.
     * @param array  $optionalArgs {
     *     Optional.
     *
     *     @type int $pageSize
     *           The maximum number of resources contained in the underlying API
     *           response. The API may return fewer values in a page, even if
     *           there are additional values to be retrieved.
     *     @type string $pageToken
     *           A page token is used to specify a page of values to be returned.
     *           If no page token is specified (the default), the first page
     *           of values will be returned. Any page token used here must have
     *           been generated by a previous call to the API.
     *     @type string $clusterName
     *           Optional. If set, the returned jobs list includes only jobs that were
     *           submitted to the named cluster.
     *     @type int $jobStateMatcher
     *           Optional. Specifies enumerated categories of jobs to list.
     *           (default = match ALL jobs).
     *
     *           If `filter` is provided, `jobStateMatcher` will be ignored.
     *           For allowed values, use constants defined on {@see \Google\Cloud\Dataproc\V1\ListJobsRequest\JobStateMatcher}
     *     @type string $filter
     *           Optional. A filter constraining the jobs to list. Filters are
     *           case-sensitive and have the following syntax:
     *
     *           [field = value] AND [field [= value]] ...
     *
     *           where **field** is `status.state` or `labels.[KEY]`, and `[KEY]` is a label
     *           key. **value** can be `*` to match all values.
     *           `status.state` can be either `ACTIVE` or `NON_ACTIVE`.
     *           Only the logical `AND` operator is supported; space-separated items are
     *           treated as having an implicit `AND` operator.
     *
     *           Example filter:
     *
     *           status.state = ACTIVE AND labels.env = staging AND labels.starred = *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return \Google\ApiCore\PagedListResponse
     *
     * @throws ApiException if the remote call fails
     */
    public function listJobs($projectId, $region, array $optionalArgs = [])
    {
        $request = new ListJobsRequest();
        $requestParamHeaders = [];
        $request->setProjectId($projectId);
        $request->setRegion($region);
        $requestParamHeaders['project_id'] = $projectId;
        $requestParamHeaders['region'] = $region;
        if (isset($optionalArgs['pageSize'])) {
            $request->setPageSize($optionalArgs['pageSize']);
        }

        if (isset($optionalArgs['pageToken'])) {
            $request->setPageToken($optionalArgs['pageToken']);
        }

        if (isset($optionalArgs['clusterName'])) {
            $request->setClusterName($optionalArgs['clusterName']);
        }

        if (isset($optionalArgs['jobStateMatcher'])) {
            $request->setJobStateMatcher($optionalArgs['jobStateMatcher']);
        }

        if (isset($optionalArgs['filter'])) {
            $request->setFilter($optionalArgs['filter']);
        }

        $requestParams = new RequestParamsHeaderDescriptor($requestParamHeaders);
        $optionalArgs['headers'] = isset($optionalArgs['headers']) ? array_merge($requestParams->getHeader(), $optionalArgs['headers']) : $requestParams->getHeader();
        return $this->getPagedListResponse('ListJobs', $optionalArgs, ListJobsResponse::class, $request);
    }

    /**
     * Submits a job to a cluster.
     *
     * Sample code:
     * ```
     * $jobControllerClient = new JobControllerClient();
     * try {
     *     $projectId = 'project_id';
     *     $region = 'region';
     *     $job = new Job();
     *     $response = $jobControllerClient->submitJob($projectId, $region, $job);
     * } finally {
     *     $jobControllerClient->close();
     * }
     * ```
     *
     * @param string $projectId    Required. The ID of the Google Cloud Platform project that the job
     *                             belongs to.
     * @param string $region       Required. The Dataproc region in which to handle the request.
     * @param Job    $job          Required. The job resource.
     * @param array  $optionalArgs {
     *     Optional.
     *
     *     @type string $requestId
     *           Optional. A unique id used to identify the request. If the server
     *           receives two
     *           [SubmitJobRequest](https://cloud.google.com/dataproc/docs/reference/rpc/google.cloud.dataproc.v1#google.cloud.dataproc.v1.SubmitJobRequest)s
     *           with the same id, then the second request will be ignored and the
     *           first [Job][google.cloud.dataproc.v1.Job] created and stored in the backend
     *           is returned.
     *
     *           It is recommended to always set this value to a
     *           [UUID](https://en.wikipedia.org/wiki/Universally_unique_identifier).
     *
     *           The id must contain only letters (a-z, A-Z), numbers (0-9),
     *           underscores (_), and hyphens (-). The maximum length is 40 characters.
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return \Google\Cloud\Dataproc\V1\Job
     *
     * @throws ApiException if the remote call fails
     */
    public function submitJob($projectId, $region, $job, array $optionalArgs = [])
    {
        $request = new SubmitJobRequest();
        $requestParamHeaders = [];
        $request->setProjectId($projectId);
        $request->setRegion($region);
        $request->setJob($job);
        $requestParamHeaders['project_id'] = $projectId;
        $requestParamHeaders['region'] = $region;
        if (isset($optionalArgs['requestId'])) {
            $request->setRequestId($optionalArgs['requestId']);
        }

        $requestParams = new RequestParamsHeaderDescriptor($requestParamHeaders);
        $optionalArgs['headers'] = isset($optionalArgs['headers']) ? array_merge($requestParams->getHeader(), $optionalArgs['headers']) : $requestParams->getHeader();
        return $this->startCall('SubmitJob', Job::class, $optionalArgs, $request)->wait();
    }

    /**
     * Submits job to a cluster.
     *
     * Sample code:
     * ```
     * $jobControllerClient = new JobControllerClient();
     * try {
     *     $projectId = 'project_id';
     *     $region = 'region';
     *     $job = new Job();
     *     $operationResponse = $jobControllerClient->submitJobAsOperation($projectId, $region, $job);
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
     *     $operationResponse = $jobControllerClient->submitJobAsOperation($projectId, $region, $job);
     *     $operationName = $operationResponse->getName();
     *     // ... do other work
     *     $newOperationResponse = $jobControllerClient->resumeOperation($operationName, 'submitJobAsOperation');
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
     *     $jobControllerClient->close();
     * }
     * ```
     *
     * @param string $projectId    Required. The ID of the Google Cloud Platform project that the job
     *                             belongs to.
     * @param string $region       Required. The Dataproc region in which to handle the request.
     * @param Job    $job          Required. The job resource.
     * @param array  $optionalArgs {
     *     Optional.
     *
     *     @type string $requestId
     *           Optional. A unique id used to identify the request. If the server
     *           receives two
     *           [SubmitJobRequest](https://cloud.google.com/dataproc/docs/reference/rpc/google.cloud.dataproc.v1#google.cloud.dataproc.v1.SubmitJobRequest)s
     *           with the same id, then the second request will be ignored and the
     *           first [Job][google.cloud.dataproc.v1.Job] created and stored in the backend
     *           is returned.
     *
     *           It is recommended to always set this value to a
     *           [UUID](https://en.wikipedia.org/wiki/Universally_unique_identifier).
     *
     *           The id must contain only letters (a-z, A-Z), numbers (0-9),
     *           underscores (_), and hyphens (-). The maximum length is 40 characters.
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return \Google\ApiCore\OperationResponse
     *
     * @throws ApiException if the remote call fails
     */
    public function submitJobAsOperation($projectId, $region, $job, array $optionalArgs = [])
    {
        $request = new SubmitJobRequest();
        $requestParamHeaders = [];
        $request->setProjectId($projectId);
        $request->setRegion($region);
        $request->setJob($job);
        $requestParamHeaders['project_id'] = $projectId;
        $requestParamHeaders['region'] = $region;
        if (isset($optionalArgs['requestId'])) {
            $request->setRequestId($optionalArgs['requestId']);
        }

        $requestParams = new RequestParamsHeaderDescriptor($requestParamHeaders);
        $optionalArgs['headers'] = isset($optionalArgs['headers']) ? array_merge($requestParams->getHeader(), $optionalArgs['headers']) : $requestParams->getHeader();
        return $this->startOperationsCall('SubmitJobAsOperation', $optionalArgs, $request, $this->getOperationsClient())->wait();
    }

    /**
     * Updates a job in a project.
     *
     * Sample code:
     * ```
     * $jobControllerClient = new JobControllerClient();
     * try {
     *     $projectId = 'project_id';
     *     $region = 'region';
     *     $jobId = 'job_id';
     *     $job = new Job();
     *     $updateMask = new FieldMask();
     *     $response = $jobControllerClient->updateJob($projectId, $region, $jobId, $job, $updateMask);
     * } finally {
     *     $jobControllerClient->close();
     * }
     * ```
     *
     * @param string    $projectId    Required. The ID of the Google Cloud Platform project that the job
     *                                belongs to.
     * @param string    $region       Required. The Dataproc region in which to handle the request.
     * @param string    $jobId        Required. The job ID.
     * @param Job       $job          Required. The changes to the job.
     * @param FieldMask $updateMask   Required. Specifies the path, relative to <code>Job</code>, of
     *                                the field to update. For example, to update the labels of a Job the
     *                                <code>update_mask</code> parameter would be specified as
     *                                <code>labels</code>, and the `PATCH` request body would specify the new
     *                                value. <strong>Note:</strong> Currently, <code>labels</code> is the only
     *                                field that can be updated.
     * @param array     $optionalArgs {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return \Google\Cloud\Dataproc\V1\Job
     *
     * @throws ApiException if the remote call fails
     */
    public function updateJob($projectId, $region, $jobId, $job, $updateMask, array $optionalArgs = [])
    {
        $request = new UpdateJobRequest();
        $requestParamHeaders = [];
        $request->setProjectId($projectId);
        $request->setRegion($region);
        $request->setJobId($jobId);
        $request->setJob($job);
        $request->setUpdateMask($updateMask);
        $requestParamHeaders['project_id'] = $projectId;
        $requestParamHeaders['region'] = $region;
        $requestParamHeaders['job_id'] = $jobId;
        $requestParams = new RequestParamsHeaderDescriptor($requestParamHeaders);
        $optionalArgs['headers'] = isset($optionalArgs['headers']) ? array_merge($requestParams->getHeader(), $optionalArgs['headers']) : $requestParams->getHeader();
        return $this->startCall('UpdateJob', Job::class, $optionalArgs, $request)->wait();
    }

    /**
     * Gets the access control policy for a resource. Returns an empty policy
    if the resource exists and does not have a policy set.
     *
     * Sample code:
     * ```
     * $jobControllerClient = new JobControllerClient();
     * try {
     *     $resource = 'resource';
     *     $response = $jobControllerClient->getIamPolicy($resource);
     * } finally {
     *     $jobControllerClient->close();
     * }
     * ```
     *
     * @param string $resource     REQUIRED: The resource for which the policy is being requested.
     *                             See the operation documentation for the appropriate value for this field.
     * @param array  $optionalArgs {
     *     Optional.
     *
     *     @type GetPolicyOptions $options
     *           OPTIONAL: A `GetPolicyOptions` object for specifying options to
     *           `GetIamPolicy`.
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return \Google\Cloud\Iam\V1\Policy
     *
     * @throws ApiException if the remote call fails
     */
    public function getIamPolicy($resource, array $optionalArgs = [])
    {
        $request = new GetIamPolicyRequest();
        $requestParamHeaders = [];
        $request->setResource($resource);
        $requestParamHeaders['resource'] = $resource;
        if (isset($optionalArgs['options'])) {
            $request->setOptions($optionalArgs['options']);
        }

        $requestParams = new RequestParamsHeaderDescriptor($requestParamHeaders);
        $optionalArgs['headers'] = isset($optionalArgs['headers']) ? array_merge($requestParams->getHeader(), $optionalArgs['headers']) : $requestParams->getHeader();
        return $this->startCall('GetIamPolicy', Policy::class, $optionalArgs, $request, Call::UNARY_CALL, 'google.iam.v1.IAMPolicy')->wait();
    }

    /**
     * Sets the access control policy on the specified resource. Replaces
    any existing policy.

    Can return `NOT_FOUND`, `INVALID_ARGUMENT`, and `PERMISSION_DENIED`
    errors.
     *
     * Sample code:
     * ```
     * $jobControllerClient = new JobControllerClient();
     * try {
     *     $resource = 'resource';
     *     $policy = new Policy();
     *     $response = $jobControllerClient->setIamPolicy($resource, $policy);
     * } finally {
     *     $jobControllerClient->close();
     * }
     * ```
     *
     * @param string $resource     REQUIRED: The resource for which the policy is being specified.
     *                             See the operation documentation for the appropriate value for this field.
     * @param Policy $policy       REQUIRED: The complete policy to be applied to the `resource`. The size of
     *                             the policy is limited to a few 10s of KB. An empty policy is a
     *                             valid policy but certain Cloud Platform services (such as Projects)
     *                             might reject them.
     * @param array  $optionalArgs {
     *     Optional.
     *
     *     @type FieldMask $updateMask
     *           OPTIONAL: A FieldMask specifying which fields of the policy to modify. Only
     *           the fields in the mask will be modified. If no mask is provided, the
     *           following default mask is used:
     *
     *           `paths: "bindings, etag"`
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return \Google\Cloud\Iam\V1\Policy
     *
     * @throws ApiException if the remote call fails
     */
    public function setIamPolicy($resource, $policy, array $optionalArgs = [])
    {
        $request = new SetIamPolicyRequest();
        $requestParamHeaders = [];
        $request->setResource($resource);
        $request->setPolicy($policy);
        $requestParamHeaders['resource'] = $resource;
        if (isset($optionalArgs['updateMask'])) {
            $request->setUpdateMask($optionalArgs['updateMask']);
        }

        $requestParams = new RequestParamsHeaderDescriptor($requestParamHeaders);
        $optionalArgs['headers'] = isset($optionalArgs['headers']) ? array_merge($requestParams->getHeader(), $optionalArgs['headers']) : $requestParams->getHeader();
        return $this->startCall('SetIamPolicy', Policy::class, $optionalArgs, $request, Call::UNARY_CALL, 'google.iam.v1.IAMPolicy')->wait();
    }

    /**
     * Returns permissions that a caller has on the specified resource. If the
    resource does not exist, this will return an empty set of
    permissions, not a `NOT_FOUND` error.

    Note: This operation is designed to be used for building
    permission-aware UIs and command-line tools, not for authorization
    checking. This operation may "fail open" without warning.
     *
     * Sample code:
     * ```
     * $jobControllerClient = new JobControllerClient();
     * try {
     *     $resource = 'resource';
     *     $permissions = [];
     *     $response = $jobControllerClient->testIamPermissions($resource, $permissions);
     * } finally {
     *     $jobControllerClient->close();
     * }
     * ```
     *
     * @param string   $resource     REQUIRED: The resource for which the policy detail is being requested.
     *                               See the operation documentation for the appropriate value for this field.
     * @param string[] $permissions  The set of permissions to check for the `resource`. Permissions with
     *                               wildcards (such as '*' or 'storage.*') are not allowed. For more
     *                               information see
     *                               [IAM Overview](https://cloud.google.com/iam/docs/overview#permissions).
     * @param array    $optionalArgs {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return \Google\Cloud\Iam\V1\TestIamPermissionsResponse
     *
     * @throws ApiException if the remote call fails
     */
    public function testIamPermissions($resource, $permissions, array $optionalArgs = [])
    {
        $request = new TestIamPermissionsRequest();
        $requestParamHeaders = [];
        $request->setResource($resource);
        $request->setPermissions($permissions);
        $requestParamHeaders['resource'] = $resource;
        $requestParams = new RequestParamsHeaderDescriptor($requestParamHeaders);
        $optionalArgs['headers'] = isset($optionalArgs['headers']) ? array_merge($requestParams->getHeader(), $optionalArgs['headers']) : $requestParams->getHeader();
        return $this->startCall('TestIamPermissions', TestIamPermissionsResponse::class, $optionalArgs, $request, Call::UNARY_CALL, 'google.iam.v1.IAMPolicy')->wait();
    }
}
