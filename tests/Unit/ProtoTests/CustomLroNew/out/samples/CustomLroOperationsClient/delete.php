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

require_once __DIR__ . '/../../../vendor/autoload.php';

// [START customlro_generated_CustomLroOperations_Delete_sync]
use Google\ApiCore\ApiException;
use Testing\CustomLroNew\Client\CustomLroOperationsClient;
use Testing\CustomLroNew\DeleteOperationRequest;

/** @param string $operation Name of th Operations resource to delete. */
function delete_sample(string $operation): void
{
    // Create a client.
    $customLroOperationsClient = new CustomLroOperationsClient();

    // Prepare the request message.
    $request = (new DeleteOperationRequest())
        ->setOperation($operation);

    // Call the API and handle any network failures.
    try {
        $customLroOperationsClient->delete($request);
        printf('Call completed successfully.' . PHP_EOL);
    } catch (ApiException $ex) {
        printf('Call failed with message: %s' . PHP_EOL, $ex->getMessage());
    }
}

/**
 * Helper to execute the sample.
 *
 * This sample has been automatically generated and should be regarded as a code
 * template only. It will require modifications to work:
 *  - It may require correct/in-range values for request initialization.
 *  - It may require specifying regional endpoints when creating the service client,
 *    please see the apiEndpoint client configuration option for more details.
 */
function callSample(): void
{
    $operation = '[OPERATION]';

    delete_sample($operation);
}
// [END customlro_generated_CustomLroOperations_Delete_sync]
