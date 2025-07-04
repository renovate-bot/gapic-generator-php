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
 * This file was automatically generated - do not edit!
 */

namespace Testing\BasicExplicitPaginated\Tests\Unit;

use Google\ApiCore\ApiException;
use Google\ApiCore\CredentialsWrapper;
use Google\ApiCore\Testing\GeneratedTest;
use Google\ApiCore\Testing\MockTransport;
use Google\Rpc\Code;
use Testing\BasicExplicitPaginated\BasicExplicitPaginatedClient;
use Testing\BasicExplicitPaginated\ExplicitResponse;
use stdClass;

/**
 * @group basicexplicitpaginated
 *
 * @group gapic
 */
class BasicExplicitPaginatedClientTest extends GeneratedTest
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

    /** @return BasicExplicitPaginatedClient */
    private function createClient(array $options = [])
    {
        $options += [
            'credentials' => $this->createCredentials(),
        ];
        return new BasicExplicitPaginatedClient($options);
    }

    /** @test */
    public function methodExplicitPaginatedTest()
    {
        $transport = $this->createTransport();
        $gapicClient = $this->createClient([
            'transport' => $transport,
        ]);
        $this->assertTrue($transport->isExhausted());
        // Mock response
        $pageSize2 = 1024500956;
        $nextPageToken = '';
        $pageToken2 = 649316932;
        $aField2 = false;
        $anotherField = 'anotherField1551924414';
        $theRealResultsElement = 'theRealResultsElement-1510860256';
        $theRealResults = [
            $theRealResultsElement,
        ];
        $expectedResponse = new ExplicitResponse();
        $expectedResponse->setPageSize($pageSize2);
        $expectedResponse->setNextPageToken($nextPageToken);
        $expectedResponse->setPageToken($pageToken2);
        $expectedResponse->setAField($aField2);
        $expectedResponse->setAnotherField($anotherField);
        $expectedResponse->setTheRealResults($theRealResults);
        $transport->addResponse($expectedResponse);
        // Mock request
        $aField = 'aField-1289259108';
        $pageToken = 'pageToken1630607433';
        $partOfRequestA = [];
        $response = $gapicClient->methodExplicitPaginated($aField, $pageToken, $partOfRequestA);
        $this->assertEquals($expectedResponse, $response->getPage()->getResponseObject());
        $resources = iterator_to_array($response->iterateAllElements());
        $this->assertSame(1, count($resources));
        $this->assertEquals($expectedResponse->getTheRealResults()[0], $resources[0]);
        $actualRequests = $transport->popReceivedCalls();
        $this->assertSame(1, count($actualRequests));
        $actualFuncCall = $actualRequests[0]->getFuncCall();
        $actualRequestObject = $actualRequests[0]->getRequestObject();
        $this->assertSame('/testing.basicexplicitpaginated.BasicExplicitPaginated/MethodExplicitPaginated', $actualFuncCall);
        $actualValue = $actualRequestObject->getAField();
        $this->assertProtobufEquals($aField, $actualValue);
        $actualValue = $actualRequestObject->getPageToken();
        $this->assertProtobufEquals($pageToken, $actualValue);
        $actualValue = $actualRequestObject->getPartOfRequestA();
        $this->assertProtobufEquals($partOfRequestA, $actualValue);
        $this->assertTrue($transport->isExhausted());
    }

    /** @test */
    public function methodExplicitPaginatedExceptionTest()
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
        $aField = 'aField-1289259108';
        $pageToken = 'pageToken1630607433';
        $partOfRequestA = [];
        try {
            $gapicClient->methodExplicitPaginated($aField, $pageToken, $partOfRequestA);
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
