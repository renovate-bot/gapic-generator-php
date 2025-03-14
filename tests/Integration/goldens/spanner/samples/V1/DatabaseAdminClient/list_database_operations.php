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

require_once __DIR__ . '/../../../vendor/autoload.php';

// [START spanner_v1_generated_DatabaseAdmin_ListDatabaseOperations_sync]
use Google\ApiCore\ApiException;
use Google\ApiCore\PagedListResponse;
use Google\Cloud\Spanner\Admin\Database\V1\Client\DatabaseAdminClient;
use Google\Cloud\Spanner\Admin\Database\V1\ListDatabaseOperationsRequest;
use Google\LongRunning\Operation;

/**
 * Lists database [longrunning-operations][google.longrunning.Operation].
 * A database operation has a name of the form
 * `projects/<project>/instances/<instance>/databases/<database>/operations/<operation>`.
 * The long-running operation
 * [metadata][google.longrunning.Operation.metadata] field type
 * `metadata.type_url` describes the type of the metadata. Operations returned
 * include those that have completed/failed/canceled within the last 7 days,
 * and pending operations.
 *
 * @param string $formattedParent The instance of the database operations.
 *                                Values are of the form `projects/<project>/instances/<instance>`. Please see
 *                                {@see DatabaseAdminClient::instanceName()} for help formatting this field.
 */
function list_database_operations_sample(string $formattedParent): void
{
    // Create a client.
    $databaseAdminClient = new DatabaseAdminClient();

    // Prepare the request message.
    $request = (new ListDatabaseOperationsRequest())
        ->setParent($formattedParent);

    // Call the API and handle any network failures.
    try {
        /** @var PagedListResponse $response */
        $response = $databaseAdminClient->listDatabaseOperations($request);

        /** @var Operation $element */
        foreach ($response as $element) {
            printf('Element data: %s' . PHP_EOL, $element->serializeToJsonString());
        }
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
    $formattedParent = DatabaseAdminClient::instanceName('[PROJECT]', '[INSTANCE]');

    list_database_operations_sample($formattedParent);
}
// [END spanner_v1_generated_DatabaseAdmin_ListDatabaseOperations_sync]
