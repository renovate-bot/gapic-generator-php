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

namespace Google\Cloud\Talent\Tests\Unit\V4beta1;

use Google\ApiCore\ApiException;
use Google\ApiCore\CredentialsWrapper;
use Google\ApiCore\LongRunning\OperationsClient;
use Google\ApiCore\Testing\GeneratedTest;
use Google\ApiCore\Testing\MockTransport;
use Google\Cloud\Talent\V4beta1\Job;
use Google\Cloud\Talent\V4beta1\JobOperationResult;
use Google\Cloud\Talent\V4beta1\JobServiceClient;
use Google\Cloud\Talent\V4beta1\ListJobsResponse;
use Google\Cloud\Talent\V4beta1\RequestMetadata;
use Google\Cloud\Talent\V4beta1\SearchJobsResponse;
use Google\Cloud\Talent\V4beta1\SearchJobsResponse\MatchingJob;
use Google\LongRunning\GetOperationRequest;
use Google\LongRunning\Operation;
use Google\Protobuf\Any;
use Google\Protobuf\GPBEmpty;
use Google\Rpc\Code;
use stdClass;

/**
 * @group talent
 *
 * @group gapic
 */
class JobServiceClientTest extends GeneratedTest
{
    /** @return TransportInterface */
    private function createTransport($deserialize = null)
    {
        return new MockTransport($deserialize);
    }

    /** @return CredentialsWrapper */
    private function createCredentials()
    {
        return $this->getMockBuilder(CredentialsWrapper::class)->disableOriginalConstructor()->getMock();
    }

    /** @return JobServiceClient */
    private function createClient(array $options = [])
    {
        $options += [
            'credentials' => $this->createCredentials(),
        ];
        return new JobServiceClient($options);
    }

    /** @test */
    public function batchCreateJobsTest()
    {
        $operationsTransport = $this->createTransport();
        $operationsClient = new OperationsClient([
            'apiEndpoint' => '',
            'transport' => $operationsTransport,
            'credentials' => $this->createCredentials(),
        ]);
        $transport = $this->createTransport();
        $gapicClient = $this->createClient([
            'transport' => $transport,
            'operationsClient' => $operationsClient,
        ]);
        $this->assertTrue($transport->isExhausted());
        $this->assertTrue($operationsTransport->isExhausted());
        // Mock response
        $incompleteOperation = new Operation();
        $incompleteOperation->setName('operations/batchCreateJobsTest');
        $incompleteOperation->setDone(false);
        $transport->addResponse($incompleteOperation);
        $expectedResponse = new JobOperationResult();
        $anyResponse = new Any();
        $anyResponse->setValue($expectedResponse->serializeToString());
        $completeOperation = new Operation();
        $completeOperation->setName('operations/batchCreateJobsTest');
        $completeOperation->setDone(true);
        $completeOperation->setResponse($anyResponse);
        $operationsTransport->addResponse($completeOperation);
        // Mock request
        $formattedParent = $gapicClient->projectName('[PROJECT]');
        $jobs = [];
        $response = $gapicClient->batchCreateJobs($formattedParent, $jobs);
        $this->assertFalse($response->isDone());
        $this->assertNull($response->getResult());
        $apiRequests = $transport->popReceivedCalls();
        $this->assertSame(1, count($apiRequests));
        $operationsRequestsEmpty = $operationsTransport->popReceivedCalls();
        $this->assertSame(0, count($operationsRequestsEmpty));
        $actualApiFuncCall = $apiRequests[0]->getFuncCall();
        $actualApiRequestObject = $apiRequests[0]->getRequestObject();
        $this->assertSame('/google.cloud.talent.v4beta1.JobService/BatchCreateJobs', $actualApiFuncCall);
        $actualValue = $actualApiRequestObject->getParent();
        $this->assertProtobufEquals($formattedParent, $actualValue);
        $actualValue = $actualApiRequestObject->getJobs();
        $this->assertProtobufEquals($jobs, $actualValue);
        $expectedOperationsRequestObject = new GetOperationRequest();
        $expectedOperationsRequestObject->setName('operations/batchCreateJobsTest');
        $response->pollUntilComplete([
            'initialPollDelayMillis' => 1,
        ]);
        $this->assertTrue($response->isDone());
        $this->assertEquals($expectedResponse, $response->getResult());
        $apiRequestsEmpty = $transport->popReceivedCalls();
        $this->assertSame(0, count($apiRequestsEmpty));
        $operationsRequests = $operationsTransport->popReceivedCalls();
        $this->assertSame(1, count($operationsRequests));
        $actualOperationsFuncCall = $operationsRequests[0]->getFuncCall();
        $actualOperationsRequestObject = $operationsRequests[0]->getRequestObject();
        $this->assertSame('/google.longrunning.Operations/GetOperation', $actualOperationsFuncCall);
        $this->assertEquals($expectedOperationsRequestObject, $actualOperationsRequestObject);
        $this->assertTrue($transport->isExhausted());
        $this->assertTrue($operationsTransport->isExhausted());
    }

    /** @test */
    public function batchCreateJobsExceptionTest()
    {
        $operationsTransport = $this->createTransport();
        $operationsClient = new OperationsClient([
            'apiEndpoint' => '',
            'transport' => $operationsTransport,
            'credentials' => $this->createCredentials(),
        ]);
        $transport = $this->createTransport();
        $gapicClient = $this->createClient([
            'transport' => $transport,
            'operationsClient' => $operationsClient,
        ]);
        $this->assertTrue($transport->isExhausted());
        $this->assertTrue($operationsTransport->isExhausted());
        // Mock response
        $incompleteOperation = new Operation();
        $incompleteOperation->setName('operations/batchCreateJobsTest');
        $incompleteOperation->setDone(false);
        $transport->addResponse($incompleteOperation);
        $status = new stdClass();
        $status->code = Code::DATA_LOSS;
        $status->details = 'internal error';
        $expectedExceptionMessage = json_encode([
            'message' => 'internal error',
            'code' => Code::DATA_LOSS,
            'status' => 'DATA_LOSS',
            'details' => [],
        ], JSON_PRETTY_PRINT);
        $operationsTransport->addResponse(null, $status);
        // Mock request
        $formattedParent = $gapicClient->projectName('[PROJECT]');
        $jobs = [];
        $response = $gapicClient->batchCreateJobs($formattedParent, $jobs);
        $this->assertFalse($response->isDone());
        $this->assertNull($response->getResult());
        $expectedOperationsRequestObject = new GetOperationRequest();
        $expectedOperationsRequestObject->setName('operations/batchCreateJobsTest');
        try {
            $response->pollUntilComplete([
                'initialPollDelayMillis' => 1,
            ]);
            // If the pollUntilComplete() method call did not throw, fail the test
            $this->fail('Expected an ApiException, but no exception was thrown.');
        } catch (ApiException $ex) {
            $this->assertEquals($status->code, $ex->getCode());
            $this->assertEquals($expectedExceptionMessage, $ex->getMessage());
        }
        // Call popReceivedCalls to ensure the stubs are exhausted
        $transport->popReceivedCalls();
        $operationsTransport->popReceivedCalls();
        $this->assertTrue($transport->isExhausted());
        $this->assertTrue($operationsTransport->isExhausted());
    }

    /** @test */
    public function batchDeleteJobsTest()
    {
        $transport = $this->createTransport();
        $gapicClient = $this->createClient([
            'transport' => $transport,
        ]);
        $this->assertTrue($transport->isExhausted());
        // Mock response
        $expectedResponse = new GPBEmpty();
        $transport->addResponse($expectedResponse);
        // Mock request
        $formattedParent = $gapicClient->projectName('[PROJECT]');
        $filter = 'filter-1274492040';
        $gapicClient->batchDeleteJobs($formattedParent, $filter);
        $actualRequests = $transport->popReceivedCalls();
        $this->assertSame(1, count($actualRequests));
        $actualFuncCall = $actualRequests[0]->getFuncCall();
        $actualRequestObject = $actualRequests[0]->getRequestObject();
        $this->assertSame('/google.cloud.talent.v4beta1.JobService/BatchDeleteJobs', $actualFuncCall);
        $actualValue = $actualRequestObject->getParent();
        $this->assertProtobufEquals($formattedParent, $actualValue);
        $actualValue = $actualRequestObject->getFilter();
        $this->assertProtobufEquals($filter, $actualValue);
        $this->assertTrue($transport->isExhausted());
    }

    /** @test */
    public function batchDeleteJobsExceptionTest()
    {
        $transport = $this->createTransport();
        $gapicClient = $this->createClient([
            'transport' => $transport,
        ]);
        $this->assertTrue($transport->isExhausted());
        $status = new stdClass();
        $status->code = Code::DATA_LOSS;
        $status->details = 'internal error';
        $expectedExceptionMessage  = json_encode([
            'message' => 'internal error',
            'code' => Code::DATA_LOSS,
            'status' => 'DATA_LOSS',
            'details' => [],
        ], JSON_PRETTY_PRINT);
        $transport->addResponse(null, $status);
        // Mock request
        $formattedParent = $gapicClient->projectName('[PROJECT]');
        $filter = 'filter-1274492040';
        try {
            $gapicClient->batchDeleteJobs($formattedParent, $filter);
            // If the $gapicClient method call did not throw, fail the test
            $this->fail('Expected an ApiException, but no exception was thrown.');
        } catch (ApiException $ex) {
            $this->assertEquals($status->code, $ex->getCode());
            $this->assertEquals($expectedExceptionMessage, $ex->getMessage());
        }
        // Call popReceivedCalls to ensure the stub is exhausted
        $transport->popReceivedCalls();
        $this->assertTrue($transport->isExhausted());
    }

    /** @test */
    public function batchUpdateJobsTest()
    {
        $operationsTransport = $this->createTransport();
        $operationsClient = new OperationsClient([
            'apiEndpoint' => '',
            'transport' => $operationsTransport,
            'credentials' => $this->createCredentials(),
        ]);
        $transport = $this->createTransport();
        $gapicClient = $this->createClient([
            'transport' => $transport,
            'operationsClient' => $operationsClient,
        ]);
        $this->assertTrue($transport->isExhausted());
        $this->assertTrue($operationsTransport->isExhausted());
        // Mock response
        $incompleteOperation = new Operation();
        $incompleteOperation->setName('operations/batchUpdateJobsTest');
        $incompleteOperation->setDone(false);
        $transport->addResponse($incompleteOperation);
        $expectedResponse = new JobOperationResult();
        $anyResponse = new Any();
        $anyResponse->setValue($expectedResponse->serializeToString());
        $completeOperation = new Operation();
        $completeOperation->setName('operations/batchUpdateJobsTest');
        $completeOperation->setDone(true);
        $completeOperation->setResponse($anyResponse);
        $operationsTransport->addResponse($completeOperation);
        // Mock request
        $formattedParent = $gapicClient->projectName('[PROJECT]');
        $jobs = [];
        $response = $gapicClient->batchUpdateJobs($formattedParent, $jobs);
        $this->assertFalse($response->isDone());
        $this->assertNull($response->getResult());
        $apiRequests = $transport->popReceivedCalls();
        $this->assertSame(1, count($apiRequests));
        $operationsRequestsEmpty = $operationsTransport->popReceivedCalls();
        $this->assertSame(0, count($operationsRequestsEmpty));
        $actualApiFuncCall = $apiRequests[0]->getFuncCall();
        $actualApiRequestObject = $apiRequests[0]->getRequestObject();
        $this->assertSame('/google.cloud.talent.v4beta1.JobService/BatchUpdateJobs', $actualApiFuncCall);
        $actualValue = $actualApiRequestObject->getParent();
        $this->assertProtobufEquals($formattedParent, $actualValue);
        $actualValue = $actualApiRequestObject->getJobs();
        $this->assertProtobufEquals($jobs, $actualValue);
        $expectedOperationsRequestObject = new GetOperationRequest();
        $expectedOperationsRequestObject->setName('operations/batchUpdateJobsTest');
        $response->pollUntilComplete([
            'initialPollDelayMillis' => 1,
        ]);
        $this->assertTrue($response->isDone());
        $this->assertEquals($expectedResponse, $response->getResult());
        $apiRequestsEmpty = $transport->popReceivedCalls();
        $this->assertSame(0, count($apiRequestsEmpty));
        $operationsRequests = $operationsTransport->popReceivedCalls();
        $this->assertSame(1, count($operationsRequests));
        $actualOperationsFuncCall = $operationsRequests[0]->getFuncCall();
        $actualOperationsRequestObject = $operationsRequests[0]->getRequestObject();
        $this->assertSame('/google.longrunning.Operations/GetOperation', $actualOperationsFuncCall);
        $this->assertEquals($expectedOperationsRequestObject, $actualOperationsRequestObject);
        $this->assertTrue($transport->isExhausted());
        $this->assertTrue($operationsTransport->isExhausted());
    }

    /** @test */
    public function batchUpdateJobsExceptionTest()
    {
        $operationsTransport = $this->createTransport();
        $operationsClient = new OperationsClient([
            'apiEndpoint' => '',
            'transport' => $operationsTransport,
            'credentials' => $this->createCredentials(),
        ]);
        $transport = $this->createTransport();
        $gapicClient = $this->createClient([
            'transport' => $transport,
            'operationsClient' => $operationsClient,
        ]);
        $this->assertTrue($transport->isExhausted());
        $this->assertTrue($operationsTransport->isExhausted());
        // Mock response
        $incompleteOperation = new Operation();
        $incompleteOperation->setName('operations/batchUpdateJobsTest');
        $incompleteOperation->setDone(false);
        $transport->addResponse($incompleteOperation);
        $status = new stdClass();
        $status->code = Code::DATA_LOSS;
        $status->details = 'internal error';
        $expectedExceptionMessage = json_encode([
            'message' => 'internal error',
            'code' => Code::DATA_LOSS,
            'status' => 'DATA_LOSS',
            'details' => [],
        ], JSON_PRETTY_PRINT);
        $operationsTransport->addResponse(null, $status);
        // Mock request
        $formattedParent = $gapicClient->projectName('[PROJECT]');
        $jobs = [];
        $response = $gapicClient->batchUpdateJobs($formattedParent, $jobs);
        $this->assertFalse($response->isDone());
        $this->assertNull($response->getResult());
        $expectedOperationsRequestObject = new GetOperationRequest();
        $expectedOperationsRequestObject->setName('operations/batchUpdateJobsTest');
        try {
            $response->pollUntilComplete([
                'initialPollDelayMillis' => 1,
            ]);
            // If the pollUntilComplete() method call did not throw, fail the test
            $this->fail('Expected an ApiException, but no exception was thrown.');
        } catch (ApiException $ex) {
            $this->assertEquals($status->code, $ex->getCode());
            $this->assertEquals($expectedExceptionMessage, $ex->getMessage());
        }
        // Call popReceivedCalls to ensure the stubs are exhausted
        $transport->popReceivedCalls();
        $operationsTransport->popReceivedCalls();
        $this->assertTrue($transport->isExhausted());
        $this->assertTrue($operationsTransport->isExhausted());
    }

    /** @test */
    public function createJobTest()
    {
        $transport = $this->createTransport();
        $gapicClient = $this->createClient([
            'transport' => $transport,
        ]);
        $this->assertTrue($transport->isExhausted());
        // Mock response
        $name = 'name3373707';
        $company = 'company950484093';
        $requisitionId = 'requisitionId980224926';
        $title = 'title110371416';
        $description = 'description-1724546052';
        $department = 'department848184146';
        $incentives = 'incentives-1262874520';
        $languageCode = 'languageCode-412800396';
        $promotionValue = 353413845;
        $qualifications = 'qualifications1903501412';
        $responsibilities = 'responsibilities-926952660';
        $companyDisplayName = 'companyDisplayName1982424170';
        $expectedResponse = new Job();
        $expectedResponse->setName($name);
        $expectedResponse->setCompany($company);
        $expectedResponse->setRequisitionId($requisitionId);
        $expectedResponse->setTitle($title);
        $expectedResponse->setDescription($description);
        $expectedResponse->setDepartment($department);
        $expectedResponse->setIncentives($incentives);
        $expectedResponse->setLanguageCode($languageCode);
        $expectedResponse->setPromotionValue($promotionValue);
        $expectedResponse->setQualifications($qualifications);
        $expectedResponse->setResponsibilities($responsibilities);
        $expectedResponse->setCompanyDisplayName($companyDisplayName);
        $transport->addResponse($expectedResponse);
        // Mock request
        $formattedParent = $gapicClient->projectName('[PROJECT]');
        $job = new Job();
        $jobCompany = $gapicClient->companyName('[PROJECT]', '[TENANT]', '[COMPANY]');
        $job->setCompany($jobCompany);
        $jobRequisitionId = 'jobRequisitionId-1718160870';
        $job->setRequisitionId($jobRequisitionId);
        $jobTitle = 'jobTitle-1625529189';
        $job->setTitle($jobTitle);
        $jobDescription = 'jobDescription-549074945';
        $job->setDescription($jobDescription);
        $response = $gapicClient->createJob($formattedParent, $job);
        $this->assertEquals($expectedResponse, $response);
        $actualRequests = $transport->popReceivedCalls();
        $this->assertSame(1, count($actualRequests));
        $actualFuncCall = $actualRequests[0]->getFuncCall();
        $actualRequestObject = $actualRequests[0]->getRequestObject();
        $this->assertSame('/google.cloud.talent.v4beta1.JobService/CreateJob', $actualFuncCall);
        $actualValue = $actualRequestObject->getParent();
        $this->assertProtobufEquals($formattedParent, $actualValue);
        $actualValue = $actualRequestObject->getJob();
        $this->assertProtobufEquals($job, $actualValue);
        $this->assertTrue($transport->isExhausted());
    }

    /** @test */
    public function createJobExceptionTest()
    {
        $transport = $this->createTransport();
        $gapicClient = $this->createClient([
            'transport' => $transport,
        ]);
        $this->assertTrue($transport->isExhausted());
        $status = new stdClass();
        $status->code = Code::DATA_LOSS;
        $status->details = 'internal error';
        $expectedExceptionMessage  = json_encode([
            'message' => 'internal error',
            'code' => Code::DATA_LOSS,
            'status' => 'DATA_LOSS',
            'details' => [],
        ], JSON_PRETTY_PRINT);
        $transport->addResponse(null, $status);
        // Mock request
        $formattedParent = $gapicClient->projectName('[PROJECT]');
        $job = new Job();
        $jobCompany = $gapicClient->companyName('[PROJECT]', '[TENANT]', '[COMPANY]');
        $job->setCompany($jobCompany);
        $jobRequisitionId = 'jobRequisitionId-1718160870';
        $job->setRequisitionId($jobRequisitionId);
        $jobTitle = 'jobTitle-1625529189';
        $job->setTitle($jobTitle);
        $jobDescription = 'jobDescription-549074945';
        $job->setDescription($jobDescription);
        try {
            $gapicClient->createJob($formattedParent, $job);
            // If the $gapicClient method call did not throw, fail the test
            $this->fail('Expected an ApiException, but no exception was thrown.');
        } catch (ApiException $ex) {
            $this->assertEquals($status->code, $ex->getCode());
            $this->assertEquals($expectedExceptionMessage, $ex->getMessage());
        }
        // Call popReceivedCalls to ensure the stub is exhausted
        $transport->popReceivedCalls();
        $this->assertTrue($transport->isExhausted());
    }

    /** @test */
    public function deleteJobTest()
    {
        $transport = $this->createTransport();
        $gapicClient = $this->createClient([
            'transport' => $transport,
        ]);
        $this->assertTrue($transport->isExhausted());
        // Mock response
        $expectedResponse = new GPBEmpty();
        $transport->addResponse($expectedResponse);
        // Mock request
        $formattedName = $gapicClient->jobName('[PROJECT]', '[TENANT]', '[JOB]');
        $gapicClient->deleteJob($formattedName);
        $actualRequests = $transport->popReceivedCalls();
        $this->assertSame(1, count($actualRequests));
        $actualFuncCall = $actualRequests[0]->getFuncCall();
        $actualRequestObject = $actualRequests[0]->getRequestObject();
        $this->assertSame('/google.cloud.talent.v4beta1.JobService/DeleteJob', $actualFuncCall);
        $actualValue = $actualRequestObject->getName();
        $this->assertProtobufEquals($formattedName, $actualValue);
        $this->assertTrue($transport->isExhausted());
    }

    /** @test */
    public function deleteJobExceptionTest()
    {
        $transport = $this->createTransport();
        $gapicClient = $this->createClient([
            'transport' => $transport,
        ]);
        $this->assertTrue($transport->isExhausted());
        $status = new stdClass();
        $status->code = Code::DATA_LOSS;
        $status->details = 'internal error';
        $expectedExceptionMessage  = json_encode([
            'message' => 'internal error',
            'code' => Code::DATA_LOSS,
            'status' => 'DATA_LOSS',
            'details' => [],
        ], JSON_PRETTY_PRINT);
        $transport->addResponse(null, $status);
        // Mock request
        $formattedName = $gapicClient->jobName('[PROJECT]', '[TENANT]', '[JOB]');
        try {
            $gapicClient->deleteJob($formattedName);
            // If the $gapicClient method call did not throw, fail the test
            $this->fail('Expected an ApiException, but no exception was thrown.');
        } catch (ApiException $ex) {
            $this->assertEquals($status->code, $ex->getCode());
            $this->assertEquals($expectedExceptionMessage, $ex->getMessage());
        }
        // Call popReceivedCalls to ensure the stub is exhausted
        $transport->popReceivedCalls();
        $this->assertTrue($transport->isExhausted());
    }

    /** @test */
    public function getJobTest()
    {
        $transport = $this->createTransport();
        $gapicClient = $this->createClient([
            'transport' => $transport,
        ]);
        $this->assertTrue($transport->isExhausted());
        // Mock response
        $name2 = 'name2-1052831874';
        $company = 'company950484093';
        $requisitionId = 'requisitionId980224926';
        $title = 'title110371416';
        $description = 'description-1724546052';
        $department = 'department848184146';
        $incentives = 'incentives-1262874520';
        $languageCode = 'languageCode-412800396';
        $promotionValue = 353413845;
        $qualifications = 'qualifications1903501412';
        $responsibilities = 'responsibilities-926952660';
        $companyDisplayName = 'companyDisplayName1982424170';
        $expectedResponse = new Job();
        $expectedResponse->setName($name2);
        $expectedResponse->setCompany($company);
        $expectedResponse->setRequisitionId($requisitionId);
        $expectedResponse->setTitle($title);
        $expectedResponse->setDescription($description);
        $expectedResponse->setDepartment($department);
        $expectedResponse->setIncentives($incentives);
        $expectedResponse->setLanguageCode($languageCode);
        $expectedResponse->setPromotionValue($promotionValue);
        $expectedResponse->setQualifications($qualifications);
        $expectedResponse->setResponsibilities($responsibilities);
        $expectedResponse->setCompanyDisplayName($companyDisplayName);
        $transport->addResponse($expectedResponse);
        // Mock request
        $formattedName = $gapicClient->jobName('[PROJECT]', '[TENANT]', '[JOB]');
        $response = $gapicClient->getJob($formattedName);
        $this->assertEquals($expectedResponse, $response);
        $actualRequests = $transport->popReceivedCalls();
        $this->assertSame(1, count($actualRequests));
        $actualFuncCall = $actualRequests[0]->getFuncCall();
        $actualRequestObject = $actualRequests[0]->getRequestObject();
        $this->assertSame('/google.cloud.talent.v4beta1.JobService/GetJob', $actualFuncCall);
        $actualValue = $actualRequestObject->getName();
        $this->assertProtobufEquals($formattedName, $actualValue);
        $this->assertTrue($transport->isExhausted());
    }

    /** @test */
    public function getJobExceptionTest()
    {
        $transport = $this->createTransport();
        $gapicClient = $this->createClient([
            'transport' => $transport,
        ]);
        $this->assertTrue($transport->isExhausted());
        $status = new stdClass();
        $status->code = Code::DATA_LOSS;
        $status->details = 'internal error';
        $expectedExceptionMessage  = json_encode([
            'message' => 'internal error',
            'code' => Code::DATA_LOSS,
            'status' => 'DATA_LOSS',
            'details' => [],
        ], JSON_PRETTY_PRINT);
        $transport->addResponse(null, $status);
        // Mock request
        $formattedName = $gapicClient->jobName('[PROJECT]', '[TENANT]', '[JOB]');
        try {
            $gapicClient->getJob($formattedName);
            // If the $gapicClient method call did not throw, fail the test
            $this->fail('Expected an ApiException, but no exception was thrown.');
        } catch (ApiException $ex) {
            $this->assertEquals($status->code, $ex->getCode());
            $this->assertEquals($expectedExceptionMessage, $ex->getMessage());
        }
        // Call popReceivedCalls to ensure the stub is exhausted
        $transport->popReceivedCalls();
        $this->assertTrue($transport->isExhausted());
    }

    /** @test */
    public function listJobsTest()
    {
        $transport = $this->createTransport();
        $gapicClient = $this->createClient([
            'transport' => $transport,
        ]);
        $this->assertTrue($transport->isExhausted());
        // Mock response
        $nextPageToken = '';
        $jobsElement = new Job();
        $jobs = [
            $jobsElement,
        ];
        $expectedResponse = new ListJobsResponse();
        $expectedResponse->setNextPageToken($nextPageToken);
        $expectedResponse->setJobs($jobs);
        $transport->addResponse($expectedResponse);
        // Mock request
        $formattedParent = $gapicClient->projectName('[PROJECT]');
        $filter = 'filter-1274492040';
        $response = $gapicClient->listJobs($formattedParent, $filter);
        $this->assertEquals($expectedResponse, $response->getPage()->getResponseObject());
        $resources = iterator_to_array($response->iterateAllElements());
        $this->assertSame(1, count($resources));
        $this->assertEquals($expectedResponse->getJobs()[0], $resources[0]);
        $actualRequests = $transport->popReceivedCalls();
        $this->assertSame(1, count($actualRequests));
        $actualFuncCall = $actualRequests[0]->getFuncCall();
        $actualRequestObject = $actualRequests[0]->getRequestObject();
        $this->assertSame('/google.cloud.talent.v4beta1.JobService/ListJobs', $actualFuncCall);
        $actualValue = $actualRequestObject->getParent();
        $this->assertProtobufEquals($formattedParent, $actualValue);
        $actualValue = $actualRequestObject->getFilter();
        $this->assertProtobufEquals($filter, $actualValue);
        $this->assertTrue($transport->isExhausted());
    }

    /** @test */
    public function listJobsExceptionTest()
    {
        $transport = $this->createTransport();
        $gapicClient = $this->createClient([
            'transport' => $transport,
        ]);
        $this->assertTrue($transport->isExhausted());
        $status = new stdClass();
        $status->code = Code::DATA_LOSS;
        $status->details = 'internal error';
        $expectedExceptionMessage  = json_encode([
            'message' => 'internal error',
            'code' => Code::DATA_LOSS,
            'status' => 'DATA_LOSS',
            'details' => [],
        ], JSON_PRETTY_PRINT);
        $transport->addResponse(null, $status);
        // Mock request
        $formattedParent = $gapicClient->projectName('[PROJECT]');
        $filter = 'filter-1274492040';
        try {
            $gapicClient->listJobs($formattedParent, $filter);
            // If the $gapicClient method call did not throw, fail the test
            $this->fail('Expected an ApiException, but no exception was thrown.');
        } catch (ApiException $ex) {
            $this->assertEquals($status->code, $ex->getCode());
            $this->assertEquals($expectedExceptionMessage, $ex->getMessage());
        }
        // Call popReceivedCalls to ensure the stub is exhausted
        $transport->popReceivedCalls();
        $this->assertTrue($transport->isExhausted());
    }

    /** @test */
    public function searchJobsTest()
    {
        $transport = $this->createTransport();
        $gapicClient = $this->createClient([
            'transport' => $transport,
        ]);
        $this->assertTrue($transport->isExhausted());
        // Mock response
        $nextPageToken = '';
        $estimatedTotalSize = 1882144769;
        $totalSize = 705419236;
        $broadenedQueryJobsCount = 1432104658;
        $matchingJobsElement = new MatchingJob();
        $matchingJobs = [
            $matchingJobsElement,
        ];
        $expectedResponse = new SearchJobsResponse();
        $expectedResponse->setNextPageToken($nextPageToken);
        $expectedResponse->setEstimatedTotalSize($estimatedTotalSize);
        $expectedResponse->setTotalSize($totalSize);
        $expectedResponse->setBroadenedQueryJobsCount($broadenedQueryJobsCount);
        $expectedResponse->setMatchingJobs($matchingJobs);
        $transport->addResponse($expectedResponse);
        // Mock request
        $formattedParent = $gapicClient->projectName('[PROJECT]');
        $requestMetadata = new RequestMetadata();
        $response = $gapicClient->searchJobs($formattedParent, $requestMetadata);
        $this->assertEquals($expectedResponse, $response->getPage()->getResponseObject());
        $resources = iterator_to_array($response->iterateAllElements());
        $this->assertSame(1, count($resources));
        $this->assertEquals($expectedResponse->getMatchingJobs()[0], $resources[0]);
        $actualRequests = $transport->popReceivedCalls();
        $this->assertSame(1, count($actualRequests));
        $actualFuncCall = $actualRequests[0]->getFuncCall();
        $actualRequestObject = $actualRequests[0]->getRequestObject();
        $this->assertSame('/google.cloud.talent.v4beta1.JobService/SearchJobs', $actualFuncCall);
        $actualValue = $actualRequestObject->getParent();
        $this->assertProtobufEquals($formattedParent, $actualValue);
        $actualValue = $actualRequestObject->getRequestMetadata();
        $this->assertProtobufEquals($requestMetadata, $actualValue);
        $this->assertTrue($transport->isExhausted());
    }

    /** @test */
    public function searchJobsExceptionTest()
    {
        $transport = $this->createTransport();
        $gapicClient = $this->createClient([
            'transport' => $transport,
        ]);
        $this->assertTrue($transport->isExhausted());
        $status = new stdClass();
        $status->code = Code::DATA_LOSS;
        $status->details = 'internal error';
        $expectedExceptionMessage  = json_encode([
            'message' => 'internal error',
            'code' => Code::DATA_LOSS,
            'status' => 'DATA_LOSS',
            'details' => [],
        ], JSON_PRETTY_PRINT);
        $transport->addResponse(null, $status);
        // Mock request
        $formattedParent = $gapicClient->projectName('[PROJECT]');
        $requestMetadata = new RequestMetadata();
        try {
            $gapicClient->searchJobs($formattedParent, $requestMetadata);
            // If the $gapicClient method call did not throw, fail the test
            $this->fail('Expected an ApiException, but no exception was thrown.');
        } catch (ApiException $ex) {
            $this->assertEquals($status->code, $ex->getCode());
            $this->assertEquals($expectedExceptionMessage, $ex->getMessage());
        }
        // Call popReceivedCalls to ensure the stub is exhausted
        $transport->popReceivedCalls();
        $this->assertTrue($transport->isExhausted());
    }

    /** @test */
    public function searchJobsForAlertTest()
    {
        $transport = $this->createTransport();
        $gapicClient = $this->createClient([
            'transport' => $transport,
        ]);
        $this->assertTrue($transport->isExhausted());
        // Mock response
        $nextPageToken = '';
        $estimatedTotalSize = 1882144769;
        $totalSize = 705419236;
        $broadenedQueryJobsCount = 1432104658;
        $matchingJobsElement = new MatchingJob();
        $matchingJobs = [
            $matchingJobsElement,
        ];
        $expectedResponse = new SearchJobsResponse();
        $expectedResponse->setNextPageToken($nextPageToken);
        $expectedResponse->setEstimatedTotalSize($estimatedTotalSize);
        $expectedResponse->setTotalSize($totalSize);
        $expectedResponse->setBroadenedQueryJobsCount($broadenedQueryJobsCount);
        $expectedResponse->setMatchingJobs($matchingJobs);
        $transport->addResponse($expectedResponse);
        // Mock request
        $formattedParent = $gapicClient->projectName('[PROJECT]');
        $requestMetadata = new RequestMetadata();
        $response = $gapicClient->searchJobsForAlert($formattedParent, $requestMetadata);
        $this->assertEquals($expectedResponse, $response->getPage()->getResponseObject());
        $resources = iterator_to_array($response->iterateAllElements());
        $this->assertSame(1, count($resources));
        $this->assertEquals($expectedResponse->getMatchingJobs()[0], $resources[0]);
        $actualRequests = $transport->popReceivedCalls();
        $this->assertSame(1, count($actualRequests));
        $actualFuncCall = $actualRequests[0]->getFuncCall();
        $actualRequestObject = $actualRequests[0]->getRequestObject();
        $this->assertSame('/google.cloud.talent.v4beta1.JobService/SearchJobsForAlert', $actualFuncCall);
        $actualValue = $actualRequestObject->getParent();
        $this->assertProtobufEquals($formattedParent, $actualValue);
        $actualValue = $actualRequestObject->getRequestMetadata();
        $this->assertProtobufEquals($requestMetadata, $actualValue);
        $this->assertTrue($transport->isExhausted());
    }

    /** @test */
    public function searchJobsForAlertExceptionTest()
    {
        $transport = $this->createTransport();
        $gapicClient = $this->createClient([
            'transport' => $transport,
        ]);
        $this->assertTrue($transport->isExhausted());
        $status = new stdClass();
        $status->code = Code::DATA_LOSS;
        $status->details = 'internal error';
        $expectedExceptionMessage  = json_encode([
            'message' => 'internal error',
            'code' => Code::DATA_LOSS,
            'status' => 'DATA_LOSS',
            'details' => [],
        ], JSON_PRETTY_PRINT);
        $transport->addResponse(null, $status);
        // Mock request
        $formattedParent = $gapicClient->projectName('[PROJECT]');
        $requestMetadata = new RequestMetadata();
        try {
            $gapicClient->searchJobsForAlert($formattedParent, $requestMetadata);
            // If the $gapicClient method call did not throw, fail the test
            $this->fail('Expected an ApiException, but no exception was thrown.');
        } catch (ApiException $ex) {
            $this->assertEquals($status->code, $ex->getCode());
            $this->assertEquals($expectedExceptionMessage, $ex->getMessage());
        }
        // Call popReceivedCalls to ensure the stub is exhausted
        $transport->popReceivedCalls();
        $this->assertTrue($transport->isExhausted());
    }

    /** @test */
    public function updateJobTest()
    {
        $transport = $this->createTransport();
        $gapicClient = $this->createClient([
            'transport' => $transport,
        ]);
        $this->assertTrue($transport->isExhausted());
        // Mock response
        $name = 'name3373707';
        $company = 'company950484093';
        $requisitionId = 'requisitionId980224926';
        $title = 'title110371416';
        $description = 'description-1724546052';
        $department = 'department848184146';
        $incentives = 'incentives-1262874520';
        $languageCode = 'languageCode-412800396';
        $promotionValue = 353413845;
        $qualifications = 'qualifications1903501412';
        $responsibilities = 'responsibilities-926952660';
        $companyDisplayName = 'companyDisplayName1982424170';
        $expectedResponse = new Job();
        $expectedResponse->setName($name);
        $expectedResponse->setCompany($company);
        $expectedResponse->setRequisitionId($requisitionId);
        $expectedResponse->setTitle($title);
        $expectedResponse->setDescription($description);
        $expectedResponse->setDepartment($department);
        $expectedResponse->setIncentives($incentives);
        $expectedResponse->setLanguageCode($languageCode);
        $expectedResponse->setPromotionValue($promotionValue);
        $expectedResponse->setQualifications($qualifications);
        $expectedResponse->setResponsibilities($responsibilities);
        $expectedResponse->setCompanyDisplayName($companyDisplayName);
        $transport->addResponse($expectedResponse);
        // Mock request
        $job = new Job();
        $jobCompany = $gapicClient->companyName('[PROJECT]', '[TENANT]', '[COMPANY]');
        $job->setCompany($jobCompany);
        $jobRequisitionId = 'jobRequisitionId-1718160870';
        $job->setRequisitionId($jobRequisitionId);
        $jobTitle = 'jobTitle-1625529189';
        $job->setTitle($jobTitle);
        $jobDescription = 'jobDescription-549074945';
        $job->setDescription($jobDescription);
        $response = $gapicClient->updateJob($job);
        $this->assertEquals($expectedResponse, $response);
        $actualRequests = $transport->popReceivedCalls();
        $this->assertSame(1, count($actualRequests));
        $actualFuncCall = $actualRequests[0]->getFuncCall();
        $actualRequestObject = $actualRequests[0]->getRequestObject();
        $this->assertSame('/google.cloud.talent.v4beta1.JobService/UpdateJob', $actualFuncCall);
        $actualValue = $actualRequestObject->getJob();
        $this->assertProtobufEquals($job, $actualValue);
        $this->assertTrue($transport->isExhausted());
    }

    /** @test */
    public function updateJobExceptionTest()
    {
        $transport = $this->createTransport();
        $gapicClient = $this->createClient([
            'transport' => $transport,
        ]);
        $this->assertTrue($transport->isExhausted());
        $status = new stdClass();
        $status->code = Code::DATA_LOSS;
        $status->details = 'internal error';
        $expectedExceptionMessage  = json_encode([
            'message' => 'internal error',
            'code' => Code::DATA_LOSS,
            'status' => 'DATA_LOSS',
            'details' => [],
        ], JSON_PRETTY_PRINT);
        $transport->addResponse(null, $status);
        // Mock request
        $job = new Job();
        $jobCompany = $gapicClient->companyName('[PROJECT]', '[TENANT]', '[COMPANY]');
        $job->setCompany($jobCompany);
        $jobRequisitionId = 'jobRequisitionId-1718160870';
        $job->setRequisitionId($jobRequisitionId);
        $jobTitle = 'jobTitle-1625529189';
        $job->setTitle($jobTitle);
        $jobDescription = 'jobDescription-549074945';
        $job->setDescription($jobDescription);
        try {
            $gapicClient->updateJob($job);
            // If the $gapicClient method call did not throw, fail the test
            $this->fail('Expected an ApiException, but no exception was thrown.');
        } catch (ApiException $ex) {
            $this->assertEquals($status->code, $ex->getCode());
            $this->assertEquals($expectedExceptionMessage, $ex->getMessage());
        }
        // Call popReceivedCalls to ensure the stub is exhausted
        $transport->popReceivedCalls();
        $this->assertTrue($transport->isExhausted());
    }
}
