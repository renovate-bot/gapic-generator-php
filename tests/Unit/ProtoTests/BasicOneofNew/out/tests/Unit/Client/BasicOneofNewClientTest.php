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

namespace Testing\BasicOneofNew\Tests\Unit\Client;

use Google\ApiCore\ApiException;
use Google\ApiCore\CredentialsWrapper;
use Google\ApiCore\Testing\GeneratedTest;
use Google\ApiCore\Testing\MockTransport;
use Google\Rpc\Code;
use Testing\BasicOneofNew\Client\BasicOneofNewClient;
use Testing\BasicOneofNew\Request;
use Testing\BasicOneofNew\Request\Other;
use Testing\BasicOneofNew\Response;
use stdClass;

/**
 * @group basiconeofnew
 *
 * @group gapic
 */
class BasicOneofNewClientTest extends GeneratedTest
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

    /** @return BasicOneofNewClient */
    private function createClient(array $options = [])
    {
        $options += [
            'credentials' => $this->createCredentials(),
        ];
        return new BasicOneofNewClient($options);
    }

    /** @test */
    public function aMethodTest()
    {
        $transport = $this->createTransport();
        $gapicClient = $this->createClient([
            'transport' => $transport,
        ]);
        $this->assertTrue($transport->isExhausted());
        // Mock response
        $expectedResponse = new Response();
        $transport->addResponse($expectedResponse);
        // Mock request
        $extraDescription = 'extraDescription-1352933811';
        $other = new Other();
        $otherFirst = 'otherFirst-205632128';
        $other->setFirst($otherFirst);
        $requiredOptional = 'requiredOptional987493376';
        $request = (new Request())
            ->setExtraDescription($extraDescription)
            ->setOther($other)
            ->setRequiredOptional($requiredOptional);
        $response = $gapicClient->aMethod($request);
        $this->assertEquals($expectedResponse, $response);
        $actualRequests = $transport->popReceivedCalls();
        $this->assertSame(1, count($actualRequests));
        $actualFuncCall = $actualRequests[0]->getFuncCall();
        $actualRequestObject = $actualRequests[0]->getRequestObject();
        $this->assertSame('/testing.basiconeofnew.BasicOneofNew/AMethod', $actualFuncCall);
        $actualValue = $actualRequestObject->getExtraDescription();
        $this->assertProtobufEquals($extraDescription, $actualValue);
        $actualValue = $actualRequestObject->getOther();
        $this->assertProtobufEquals($other, $actualValue);
        $actualValue = $actualRequestObject->getRequiredOptional();
        $this->assertProtobufEquals($requiredOptional, $actualValue);
        $this->assertTrue($transport->isExhausted());
    }

    /** @test */
    public function aMethodExceptionTest()
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
        $extraDescription = 'extraDescription-1352933811';
        $other = new Other();
        $otherFirst = 'otherFirst-205632128';
        $other->setFirst($otherFirst);
        $requiredOptional = 'requiredOptional987493376';
        $request = (new Request())
            ->setExtraDescription($extraDescription)
            ->setOther($other)
            ->setRequiredOptional($requiredOptional);
        try {
            $gapicClient->aMethod($request);
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
    public function aMethodAsyncTest()
    {
        $transport = $this->createTransport();
        $gapicClient = $this->createClient([
            'transport' => $transport,
        ]);
        $this->assertTrue($transport->isExhausted());
        // Mock response
        $expectedResponse = new Response();
        $transport->addResponse($expectedResponse);
        // Mock request
        $extraDescription = 'extraDescription-1352933811';
        $other = new Other();
        $otherFirst = 'otherFirst-205632128';
        $other->setFirst($otherFirst);
        $requiredOptional = 'requiredOptional987493376';
        $request = (new Request())
            ->setExtraDescription($extraDescription)
            ->setOther($other)
            ->setRequiredOptional($requiredOptional);
        $response = $gapicClient->aMethodAsync($request)->wait();
        $this->assertEquals($expectedResponse, $response);
        $actualRequests = $transport->popReceivedCalls();
        $this->assertSame(1, count($actualRequests));
        $actualFuncCall = $actualRequests[0]->getFuncCall();
        $actualRequestObject = $actualRequests[0]->getRequestObject();
        $this->assertSame('/testing.basiconeofnew.BasicOneofNew/AMethod', $actualFuncCall);
        $actualValue = $actualRequestObject->getExtraDescription();
        $this->assertProtobufEquals($extraDescription, $actualValue);
        $actualValue = $actualRequestObject->getOther();
        $this->assertProtobufEquals($other, $actualValue);
        $actualValue = $actualRequestObject->getRequiredOptional();
        $this->assertProtobufEquals($requiredOptional, $actualValue);
        $this->assertTrue($transport->isExhausted());
    }
}
