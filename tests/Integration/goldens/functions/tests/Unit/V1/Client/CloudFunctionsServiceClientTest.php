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

namespace Google\Cloud\Functions\Tests\Unit\V1\Client;

use Google\ApiCore\ApiException;
use Google\ApiCore\CredentialsWrapper;
use Google\ApiCore\Testing\GeneratedTest;
use Google\ApiCore\Testing\MockTransport;
use Google\Cloud\Functions\V1\CallFunctionRequest;
use Google\Cloud\Functions\V1\CallFunctionResponse;
use Google\Cloud\Functions\V1\Client\CloudFunctionsServiceClient;
use Google\Cloud\Functions\V1\CloudFunction;
use Google\Cloud\Functions\V1\CreateFunctionRequest;
use Google\Cloud\Functions\V1\DeleteFunctionRequest;
use Google\Cloud\Functions\V1\GenerateDownloadUrlRequest;
use Google\Cloud\Functions\V1\GenerateDownloadUrlResponse;
use Google\Cloud\Functions\V1\GenerateUploadUrlRequest;
use Google\Cloud\Functions\V1\GenerateUploadUrlResponse;
use Google\Cloud\Functions\V1\GetFunctionRequest;
use Google\Cloud\Functions\V1\ListFunctionsRequest;
use Google\Cloud\Functions\V1\ListFunctionsResponse;
use Google\Cloud\Functions\V1\UpdateFunctionRequest;
use Google\Cloud\Iam\V1\GetIamPolicyRequest;
use Google\Cloud\Iam\V1\Policy;
use Google\Cloud\Iam\V1\SetIamPolicyRequest;
use Google\Cloud\Iam\V1\TestIamPermissionsRequest;
use Google\Cloud\Iam\V1\TestIamPermissionsResponse;
use Google\LongRunning\Client\OperationsClient;
use Google\LongRunning\GetOperationRequest;
use Google\LongRunning\Operation;
use Google\Protobuf\Any;
use Google\Protobuf\GPBEmpty;
use Google\Rpc\Code;
use stdClass;

/**
 * @group functions
 *
 * @group gapic
 */
class CloudFunctionsServiceClientTest extends GeneratedTest
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

    /** @return CloudFunctionsServiceClient */
    private function createClient(array $options = [])
    {
        $options += [
            'credentials' => $this->createCredentials(),
        ];
        return new CloudFunctionsServiceClient($options);
    }

    /** @test */
    public function callFunctionTest()
    {
        $transport = $this->createTransport();
        $gapicClient = $this->createClient([
            'transport' => $transport,
        ]);
        $this->assertTrue($transport->isExhausted());
        // Mock response
        $executionId = 'executionId-1217171550';
        $result = 'result-934426595';
        $error = 'error96784904';
        $expectedResponse = new CallFunctionResponse();
        $expectedResponse->setExecutionId($executionId);
        $expectedResponse->setResult($result);
        $expectedResponse->setError($error);
        $transport->addResponse($expectedResponse);
        // Mock request
        $formattedName = $gapicClient->cloudFunctionName('[PROJECT]', '[LOCATION]', '[FUNCTION]');
        $data = 'data3076010';
        $request = (new CallFunctionRequest())
            ->setName($formattedName)
            ->setData($data);
        $response = $gapicClient->callFunction($request);
        $this->assertEquals($expectedResponse, $response);
        $actualRequests = $transport->popReceivedCalls();
        $this->assertSame(1, count($actualRequests));
        $actualFuncCall = $actualRequests[0]->getFuncCall();
        $actualRequestObject = $actualRequests[0]->getRequestObject();
        $this->assertSame('/google.cloud.functions.v1.CloudFunctionsService/CallFunction', $actualFuncCall);
        $actualValue = $actualRequestObject->getName();
        $this->assertProtobufEquals($formattedName, $actualValue);
        $actualValue = $actualRequestObject->getData();
        $this->assertProtobufEquals($data, $actualValue);
        $this->assertTrue($transport->isExhausted());
    }

    /** @test */
    public function callFunctionExceptionTest()
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
        $formattedName = $gapicClient->cloudFunctionName('[PROJECT]', '[LOCATION]', '[FUNCTION]');
        $data = 'data3076010';
        $request = (new CallFunctionRequest())
            ->setName($formattedName)
            ->setData($data);
        try {
            $gapicClient->callFunction($request);
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
    public function createFunctionTest()
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
        $incompleteOperation->setName('operations/createFunctionTest');
        $incompleteOperation->setDone(false);
        $transport->addResponse($incompleteOperation);
        $name = 'name3373707';
        $description = 'description-1724546052';
        $sourceArchiveUrl = 'sourceArchiveUrl-289007026';
        $entryPoint = 'entryPoint-799136893';
        $runtime = 'runtime1550962648';
        $availableMemoryMb = 1964533661;
        $serviceAccountEmail = 'serviceAccountEmail-1300473088';
        $versionId = 670497310;
        $network = 'network1843485230';
        $maxInstances = 330682013;
        $minInstances = 1491624145;
        $vpcConnector = 'vpcConnector1732864119';
        $kmsKeyName = 'kmsKeyName2094986649';
        $buildWorkerPool = 'buildWorkerPool1575447532';
        $buildId = 'buildId-1430655860';
        $buildName = 'buildName-470597188';
        $sourceToken = 'sourceToken1671283925';
        $dockerRepository = 'dockerRepository-1273385271';
        $expectedResponse = new CloudFunction();
        $expectedResponse->setName($name);
        $expectedResponse->setDescription($description);
        $expectedResponse->setSourceArchiveUrl($sourceArchiveUrl);
        $expectedResponse->setEntryPoint($entryPoint);
        $expectedResponse->setRuntime($runtime);
        $expectedResponse->setAvailableMemoryMb($availableMemoryMb);
        $expectedResponse->setServiceAccountEmail($serviceAccountEmail);
        $expectedResponse->setVersionId($versionId);
        $expectedResponse->setNetwork($network);
        $expectedResponse->setMaxInstances($maxInstances);
        $expectedResponse->setMinInstances($minInstances);
        $expectedResponse->setVpcConnector($vpcConnector);
        $expectedResponse->setKmsKeyName($kmsKeyName);
        $expectedResponse->setBuildWorkerPool($buildWorkerPool);
        $expectedResponse->setBuildId($buildId);
        $expectedResponse->setBuildName($buildName);
        $expectedResponse->setSourceToken($sourceToken);
        $expectedResponse->setDockerRepository($dockerRepository);
        $anyResponse = new Any();
        $anyResponse->setValue($expectedResponse->serializeToString());
        $completeOperation = new Operation();
        $completeOperation->setName('operations/createFunctionTest');
        $completeOperation->setDone(true);
        $completeOperation->setResponse($anyResponse);
        $operationsTransport->addResponse($completeOperation);
        // Mock request
        $formattedLocation = $gapicClient->locationName('[PROJECT]', '[LOCATION]');
        $function = new CloudFunction();
        $request = (new CreateFunctionRequest())
            ->setLocation($formattedLocation)
            ->setFunction($function);
        $response = $gapicClient->createFunction($request);
        $this->assertFalse($response->isDone());
        $this->assertNull($response->getResult());
        $apiRequests = $transport->popReceivedCalls();
        $this->assertSame(1, count($apiRequests));
        $operationsRequestsEmpty = $operationsTransport->popReceivedCalls();
        $this->assertSame(0, count($operationsRequestsEmpty));
        $actualApiFuncCall = $apiRequests[0]->getFuncCall();
        $actualApiRequestObject = $apiRequests[0]->getRequestObject();
        $this->assertSame('/google.cloud.functions.v1.CloudFunctionsService/CreateFunction', $actualApiFuncCall);
        $actualValue = $actualApiRequestObject->getLocation();
        $this->assertProtobufEquals($formattedLocation, $actualValue);
        $actualValue = $actualApiRequestObject->getFunction();
        $this->assertProtobufEquals($function, $actualValue);
        $expectedOperationsRequestObject = new GetOperationRequest();
        $expectedOperationsRequestObject->setName('operations/createFunctionTest');
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
    public function createFunctionExceptionTest()
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
        $incompleteOperation->setName('operations/createFunctionTest');
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
        $formattedLocation = $gapicClient->locationName('[PROJECT]', '[LOCATION]');
        $function = new CloudFunction();
        $request = (new CreateFunctionRequest())
            ->setLocation($formattedLocation)
            ->setFunction($function);
        $response = $gapicClient->createFunction($request);
        $this->assertFalse($response->isDone());
        $this->assertNull($response->getResult());
        $expectedOperationsRequestObject = new GetOperationRequest();
        $expectedOperationsRequestObject->setName('operations/createFunctionTest');
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
    public function deleteFunctionTest()
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
        $incompleteOperation->setName('operations/deleteFunctionTest');
        $incompleteOperation->setDone(false);
        $transport->addResponse($incompleteOperation);
        $expectedResponse = new GPBEmpty();
        $anyResponse = new Any();
        $anyResponse->setValue($expectedResponse->serializeToString());
        $completeOperation = new Operation();
        $completeOperation->setName('operations/deleteFunctionTest');
        $completeOperation->setDone(true);
        $completeOperation->setResponse($anyResponse);
        $operationsTransport->addResponse($completeOperation);
        // Mock request
        $formattedName = $gapicClient->cloudFunctionName('[PROJECT]', '[LOCATION]', '[FUNCTION]');
        $request = (new DeleteFunctionRequest())
            ->setName($formattedName);
        $response = $gapicClient->deleteFunction($request);
        $this->assertFalse($response->isDone());
        $this->assertNull($response->getResult());
        $apiRequests = $transport->popReceivedCalls();
        $this->assertSame(1, count($apiRequests));
        $operationsRequestsEmpty = $operationsTransport->popReceivedCalls();
        $this->assertSame(0, count($operationsRequestsEmpty));
        $actualApiFuncCall = $apiRequests[0]->getFuncCall();
        $actualApiRequestObject = $apiRequests[0]->getRequestObject();
        $this->assertSame('/google.cloud.functions.v1.CloudFunctionsService/DeleteFunction', $actualApiFuncCall);
        $actualValue = $actualApiRequestObject->getName();
        $this->assertProtobufEquals($formattedName, $actualValue);
        $expectedOperationsRequestObject = new GetOperationRequest();
        $expectedOperationsRequestObject->setName('operations/deleteFunctionTest');
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
    public function deleteFunctionExceptionTest()
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
        $incompleteOperation->setName('operations/deleteFunctionTest');
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
        $formattedName = $gapicClient->cloudFunctionName('[PROJECT]', '[LOCATION]', '[FUNCTION]');
        $request = (new DeleteFunctionRequest())
            ->setName($formattedName);
        $response = $gapicClient->deleteFunction($request);
        $this->assertFalse($response->isDone());
        $this->assertNull($response->getResult());
        $expectedOperationsRequestObject = new GetOperationRequest();
        $expectedOperationsRequestObject->setName('operations/deleteFunctionTest');
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
    public function generateDownloadUrlTest()
    {
        $transport = $this->createTransport();
        $gapicClient = $this->createClient([
            'transport' => $transport,
        ]);
        $this->assertTrue($transport->isExhausted());
        // Mock response
        $downloadUrl = 'downloadUrl1109408056';
        $expectedResponse = new GenerateDownloadUrlResponse();
        $expectedResponse->setDownloadUrl($downloadUrl);
        $transport->addResponse($expectedResponse);
        $request = new GenerateDownloadUrlRequest();
        $response = $gapicClient->generateDownloadUrl($request);
        $this->assertEquals($expectedResponse, $response);
        $actualRequests = $transport->popReceivedCalls();
        $this->assertSame(1, count($actualRequests));
        $actualFuncCall = $actualRequests[0]->getFuncCall();
        $actualRequestObject = $actualRequests[0]->getRequestObject();
        $this->assertSame('/google.cloud.functions.v1.CloudFunctionsService/GenerateDownloadUrl', $actualFuncCall);
        $this->assertTrue($transport->isExhausted());
    }

    /** @test */
    public function generateDownloadUrlExceptionTest()
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
        $request = new GenerateDownloadUrlRequest();
        try {
            $gapicClient->generateDownloadUrl($request);
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
    public function generateUploadUrlTest()
    {
        $transport = $this->createTransport();
        $gapicClient = $this->createClient([
            'transport' => $transport,
        ]);
        $this->assertTrue($transport->isExhausted());
        // Mock response
        $uploadUrl = 'uploadUrl-242738639';
        $expectedResponse = new GenerateUploadUrlResponse();
        $expectedResponse->setUploadUrl($uploadUrl);
        $transport->addResponse($expectedResponse);
        $request = new GenerateUploadUrlRequest();
        $response = $gapicClient->generateUploadUrl($request);
        $this->assertEquals($expectedResponse, $response);
        $actualRequests = $transport->popReceivedCalls();
        $this->assertSame(1, count($actualRequests));
        $actualFuncCall = $actualRequests[0]->getFuncCall();
        $actualRequestObject = $actualRequests[0]->getRequestObject();
        $this->assertSame('/google.cloud.functions.v1.CloudFunctionsService/GenerateUploadUrl', $actualFuncCall);
        $this->assertTrue($transport->isExhausted());
    }

    /** @test */
    public function generateUploadUrlExceptionTest()
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
        $request = new GenerateUploadUrlRequest();
        try {
            $gapicClient->generateUploadUrl($request);
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
    public function getFunctionTest()
    {
        $transport = $this->createTransport();
        $gapicClient = $this->createClient([
            'transport' => $transport,
        ]);
        $this->assertTrue($transport->isExhausted());
        // Mock response
        $name2 = 'name2-1052831874';
        $description = 'description-1724546052';
        $sourceArchiveUrl = 'sourceArchiveUrl-289007026';
        $entryPoint = 'entryPoint-799136893';
        $runtime = 'runtime1550962648';
        $availableMemoryMb = 1964533661;
        $serviceAccountEmail = 'serviceAccountEmail-1300473088';
        $versionId2 = 102817515;
        $network = 'network1843485230';
        $maxInstances = 330682013;
        $minInstances = 1491624145;
        $vpcConnector = 'vpcConnector1732864119';
        $kmsKeyName = 'kmsKeyName2094986649';
        $buildWorkerPool = 'buildWorkerPool1575447532';
        $buildId = 'buildId-1430655860';
        $buildName = 'buildName-470597188';
        $sourceToken = 'sourceToken1671283925';
        $dockerRepository = 'dockerRepository-1273385271';
        $expectedResponse = new CloudFunction();
        $expectedResponse->setName($name2);
        $expectedResponse->setDescription($description);
        $expectedResponse->setSourceArchiveUrl($sourceArchiveUrl);
        $expectedResponse->setEntryPoint($entryPoint);
        $expectedResponse->setRuntime($runtime);
        $expectedResponse->setAvailableMemoryMb($availableMemoryMb);
        $expectedResponse->setServiceAccountEmail($serviceAccountEmail);
        $expectedResponse->setVersionId($versionId2);
        $expectedResponse->setNetwork($network);
        $expectedResponse->setMaxInstances($maxInstances);
        $expectedResponse->setMinInstances($minInstances);
        $expectedResponse->setVpcConnector($vpcConnector);
        $expectedResponse->setKmsKeyName($kmsKeyName);
        $expectedResponse->setBuildWorkerPool($buildWorkerPool);
        $expectedResponse->setBuildId($buildId);
        $expectedResponse->setBuildName($buildName);
        $expectedResponse->setSourceToken($sourceToken);
        $expectedResponse->setDockerRepository($dockerRepository);
        $transport->addResponse($expectedResponse);
        // Mock request
        $formattedName = $gapicClient->cloudFunctionName('[PROJECT]', '[LOCATION]', '[FUNCTION]');
        $request = (new GetFunctionRequest())
            ->setName($formattedName);
        $response = $gapicClient->getFunction($request);
        $this->assertEquals($expectedResponse, $response);
        $actualRequests = $transport->popReceivedCalls();
        $this->assertSame(1, count($actualRequests));
        $actualFuncCall = $actualRequests[0]->getFuncCall();
        $actualRequestObject = $actualRequests[0]->getRequestObject();
        $this->assertSame('/google.cloud.functions.v1.CloudFunctionsService/GetFunction', $actualFuncCall);
        $actualValue = $actualRequestObject->getName();
        $this->assertProtobufEquals($formattedName, $actualValue);
        $this->assertTrue($transport->isExhausted());
    }

    /** @test */
    public function getFunctionExceptionTest()
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
        $formattedName = $gapicClient->cloudFunctionName('[PROJECT]', '[LOCATION]', '[FUNCTION]');
        $request = (new GetFunctionRequest())
            ->setName($formattedName);
        try {
            $gapicClient->getFunction($request);
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
    public function getIamPolicyTest()
    {
        $transport = $this->createTransport();
        $gapicClient = $this->createClient([
            'transport' => $transport,
        ]);
        $this->assertTrue($transport->isExhausted());
        // Mock response
        $version = 351608024;
        $etag = '21';
        $expectedResponse = new Policy();
        $expectedResponse->setVersion($version);
        $expectedResponse->setEtag($etag);
        $transport->addResponse($expectedResponse);
        // Mock request
        $resource = 'resource-341064690';
        $request = (new GetIamPolicyRequest())
            ->setResource($resource);
        $response = $gapicClient->getIamPolicy($request);
        $this->assertEquals($expectedResponse, $response);
        $actualRequests = $transport->popReceivedCalls();
        $this->assertSame(1, count($actualRequests));
        $actualFuncCall = $actualRequests[0]->getFuncCall();
        $actualRequestObject = $actualRequests[0]->getRequestObject();
        $this->assertSame('/google.cloud.functions.v1.CloudFunctionsService/GetIamPolicy', $actualFuncCall);
        $actualValue = $actualRequestObject->getResource();
        $this->assertProtobufEquals($resource, $actualValue);
        $this->assertTrue($transport->isExhausted());
    }

    /** @test */
    public function getIamPolicyExceptionTest()
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
        $resource = 'resource-341064690';
        $request = (new GetIamPolicyRequest())
            ->setResource($resource);
        try {
            $gapicClient->getIamPolicy($request);
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
    public function listFunctionsTest()
    {
        $transport = $this->createTransport();
        $gapicClient = $this->createClient([
            'transport' => $transport,
        ]);
        $this->assertTrue($transport->isExhausted());
        // Mock response
        $nextPageToken = '';
        $functionsElement = new CloudFunction();
        $functions = [
            $functionsElement,
        ];
        $expectedResponse = new ListFunctionsResponse();
        $expectedResponse->setNextPageToken($nextPageToken);
        $expectedResponse->setFunctions($functions);
        $transport->addResponse($expectedResponse);
        $request = new ListFunctionsRequest();
        $response = $gapicClient->listFunctions($request);
        $this->assertEquals($expectedResponse, $response->getPage()->getResponseObject());
        $resources = iterator_to_array($response->iterateAllElements());
        $this->assertSame(1, count($resources));
        $this->assertEquals($expectedResponse->getFunctions()[0], $resources[0]);
        $actualRequests = $transport->popReceivedCalls();
        $this->assertSame(1, count($actualRequests));
        $actualFuncCall = $actualRequests[0]->getFuncCall();
        $actualRequestObject = $actualRequests[0]->getRequestObject();
        $this->assertSame('/google.cloud.functions.v1.CloudFunctionsService/ListFunctions', $actualFuncCall);
        $this->assertTrue($transport->isExhausted());
    }

    /** @test */
    public function listFunctionsExceptionTest()
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
        $request = new ListFunctionsRequest();
        try {
            $gapicClient->listFunctions($request);
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
    public function setIamPolicyTest()
    {
        $transport = $this->createTransport();
        $gapicClient = $this->createClient([
            'transport' => $transport,
        ]);
        $this->assertTrue($transport->isExhausted());
        // Mock response
        $version = 351608024;
        $etag = '21';
        $expectedResponse = new Policy();
        $expectedResponse->setVersion($version);
        $expectedResponse->setEtag($etag);
        $transport->addResponse($expectedResponse);
        // Mock request
        $resource = 'resource-341064690';
        $policy = new Policy();
        $request = (new SetIamPolicyRequest())
            ->setResource($resource)
            ->setPolicy($policy);
        $response = $gapicClient->setIamPolicy($request);
        $this->assertEquals($expectedResponse, $response);
        $actualRequests = $transport->popReceivedCalls();
        $this->assertSame(1, count($actualRequests));
        $actualFuncCall = $actualRequests[0]->getFuncCall();
        $actualRequestObject = $actualRequests[0]->getRequestObject();
        $this->assertSame('/google.cloud.functions.v1.CloudFunctionsService/SetIamPolicy', $actualFuncCall);
        $actualValue = $actualRequestObject->getResource();
        $this->assertProtobufEquals($resource, $actualValue);
        $actualValue = $actualRequestObject->getPolicy();
        $this->assertProtobufEquals($policy, $actualValue);
        $this->assertTrue($transport->isExhausted());
    }

    /** @test */
    public function setIamPolicyExceptionTest()
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
        $resource = 'resource-341064690';
        $policy = new Policy();
        $request = (new SetIamPolicyRequest())
            ->setResource($resource)
            ->setPolicy($policy);
        try {
            $gapicClient->setIamPolicy($request);
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
    public function testIamPermissionsTest()
    {
        $transport = $this->createTransport();
        $gapicClient = $this->createClient([
            'transport' => $transport,
        ]);
        $this->assertTrue($transport->isExhausted());
        // Mock response
        $expectedResponse = new TestIamPermissionsResponse();
        $transport->addResponse($expectedResponse);
        // Mock request
        $resource = 'resource-341064690';
        $permissions = [];
        $request = (new TestIamPermissionsRequest())
            ->setResource($resource)
            ->setPermissions($permissions);
        $response = $gapicClient->testIamPermissions($request);
        $this->assertEquals($expectedResponse, $response);
        $actualRequests = $transport->popReceivedCalls();
        $this->assertSame(1, count($actualRequests));
        $actualFuncCall = $actualRequests[0]->getFuncCall();
        $actualRequestObject = $actualRequests[0]->getRequestObject();
        $this->assertSame('/google.cloud.functions.v1.CloudFunctionsService/TestIamPermissions', $actualFuncCall);
        $actualValue = $actualRequestObject->getResource();
        $this->assertProtobufEquals($resource, $actualValue);
        $actualValue = $actualRequestObject->getPermissions();
        $this->assertProtobufEquals($permissions, $actualValue);
        $this->assertTrue($transport->isExhausted());
    }

    /** @test */
    public function testIamPermissionsExceptionTest()
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
        $resource = 'resource-341064690';
        $permissions = [];
        $request = (new TestIamPermissionsRequest())
            ->setResource($resource)
            ->setPermissions($permissions);
        try {
            $gapicClient->testIamPermissions($request);
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
    public function updateFunctionTest()
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
        $incompleteOperation->setName('operations/updateFunctionTest');
        $incompleteOperation->setDone(false);
        $transport->addResponse($incompleteOperation);
        $name = 'name3373707';
        $description = 'description-1724546052';
        $sourceArchiveUrl = 'sourceArchiveUrl-289007026';
        $entryPoint = 'entryPoint-799136893';
        $runtime = 'runtime1550962648';
        $availableMemoryMb = 1964533661;
        $serviceAccountEmail = 'serviceAccountEmail-1300473088';
        $versionId = 670497310;
        $network = 'network1843485230';
        $maxInstances = 330682013;
        $minInstances = 1491624145;
        $vpcConnector = 'vpcConnector1732864119';
        $kmsKeyName = 'kmsKeyName2094986649';
        $buildWorkerPool = 'buildWorkerPool1575447532';
        $buildId = 'buildId-1430655860';
        $buildName = 'buildName-470597188';
        $sourceToken = 'sourceToken1671283925';
        $dockerRepository = 'dockerRepository-1273385271';
        $expectedResponse = new CloudFunction();
        $expectedResponse->setName($name);
        $expectedResponse->setDescription($description);
        $expectedResponse->setSourceArchiveUrl($sourceArchiveUrl);
        $expectedResponse->setEntryPoint($entryPoint);
        $expectedResponse->setRuntime($runtime);
        $expectedResponse->setAvailableMemoryMb($availableMemoryMb);
        $expectedResponse->setServiceAccountEmail($serviceAccountEmail);
        $expectedResponse->setVersionId($versionId);
        $expectedResponse->setNetwork($network);
        $expectedResponse->setMaxInstances($maxInstances);
        $expectedResponse->setMinInstances($minInstances);
        $expectedResponse->setVpcConnector($vpcConnector);
        $expectedResponse->setKmsKeyName($kmsKeyName);
        $expectedResponse->setBuildWorkerPool($buildWorkerPool);
        $expectedResponse->setBuildId($buildId);
        $expectedResponse->setBuildName($buildName);
        $expectedResponse->setSourceToken($sourceToken);
        $expectedResponse->setDockerRepository($dockerRepository);
        $anyResponse = new Any();
        $anyResponse->setValue($expectedResponse->serializeToString());
        $completeOperation = new Operation();
        $completeOperation->setName('operations/updateFunctionTest');
        $completeOperation->setDone(true);
        $completeOperation->setResponse($anyResponse);
        $operationsTransport->addResponse($completeOperation);
        // Mock request
        $function = new CloudFunction();
        $request = (new UpdateFunctionRequest())
            ->setFunction($function);
        $response = $gapicClient->updateFunction($request);
        $this->assertFalse($response->isDone());
        $this->assertNull($response->getResult());
        $apiRequests = $transport->popReceivedCalls();
        $this->assertSame(1, count($apiRequests));
        $operationsRequestsEmpty = $operationsTransport->popReceivedCalls();
        $this->assertSame(0, count($operationsRequestsEmpty));
        $actualApiFuncCall = $apiRequests[0]->getFuncCall();
        $actualApiRequestObject = $apiRequests[0]->getRequestObject();
        $this->assertSame('/google.cloud.functions.v1.CloudFunctionsService/UpdateFunction', $actualApiFuncCall);
        $actualValue = $actualApiRequestObject->getFunction();
        $this->assertProtobufEquals($function, $actualValue);
        $expectedOperationsRequestObject = new GetOperationRequest();
        $expectedOperationsRequestObject->setName('operations/updateFunctionTest');
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
    public function updateFunctionExceptionTest()
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
        $incompleteOperation->setName('operations/updateFunctionTest');
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
        $function = new CloudFunction();
        $request = (new UpdateFunctionRequest())
            ->setFunction($function);
        $response = $gapicClient->updateFunction($request);
        $this->assertFalse($response->isDone());
        $this->assertNull($response->getResult());
        $expectedOperationsRequestObject = new GetOperationRequest();
        $expectedOperationsRequestObject->setName('operations/updateFunctionTest');
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
    public function callFunctionAsyncTest()
    {
        $transport = $this->createTransport();
        $gapicClient = $this->createClient([
            'transport' => $transport,
        ]);
        $this->assertTrue($transport->isExhausted());
        // Mock response
        $executionId = 'executionId-1217171550';
        $result = 'result-934426595';
        $error = 'error96784904';
        $expectedResponse = new CallFunctionResponse();
        $expectedResponse->setExecutionId($executionId);
        $expectedResponse->setResult($result);
        $expectedResponse->setError($error);
        $transport->addResponse($expectedResponse);
        // Mock request
        $formattedName = $gapicClient->cloudFunctionName('[PROJECT]', '[LOCATION]', '[FUNCTION]');
        $data = 'data3076010';
        $request = (new CallFunctionRequest())
            ->setName($formattedName)
            ->setData($data);
        $response = $gapicClient->callFunctionAsync($request)->wait();
        $this->assertEquals($expectedResponse, $response);
        $actualRequests = $transport->popReceivedCalls();
        $this->assertSame(1, count($actualRequests));
        $actualFuncCall = $actualRequests[0]->getFuncCall();
        $actualRequestObject = $actualRequests[0]->getRequestObject();
        $this->assertSame('/google.cloud.functions.v1.CloudFunctionsService/CallFunction', $actualFuncCall);
        $actualValue = $actualRequestObject->getName();
        $this->assertProtobufEquals($formattedName, $actualValue);
        $actualValue = $actualRequestObject->getData();
        $this->assertProtobufEquals($data, $actualValue);
        $this->assertTrue($transport->isExhausted());
    }
}
