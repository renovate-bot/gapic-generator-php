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

// [START spanner_v1_generated_DatabaseAdmin_GetBackup_sync]
use Google\ApiCore\ApiException;
use Google\Cloud\Spanner\Admin\Database\V1\Backup;
use Google\Cloud\Spanner\Admin\Database\V1\Client\DatabaseAdminClient;
use Google\Cloud\Spanner\Admin\Database\V1\GetBackupRequest;

/**
 * Gets metadata on a pending or completed [Backup][google.spanner.admin.database.v1.Backup].
 *
 * @param string $formattedName Name of the backup.
 *                              Values are of the form
 *                              `projects/<project>/instances/<instance>/backups/<backup>`. Please see
 *                              {@see DatabaseAdminClient::backupName()} for help formatting this field.
 */
function get_backup_sample(string $formattedName): void
{
    // Create a client.
    $databaseAdminClient = new DatabaseAdminClient();

    // Prepare the request message.
    $request = (new GetBackupRequest())
        ->setName($formattedName);

    // Call the API and handle any network failures.
    try {
        /** @var Backup $response */
        $response = $databaseAdminClient->getBackup($request);
        printf('Response data: %s' . PHP_EOL, $response->serializeToJsonString());
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
    $formattedName = DatabaseAdminClient::backupName('[PROJECT]', '[INSTANCE]', '[BACKUP]');

    get_backup_sample($formattedName);
}
// [END spanner_v1_generated_DatabaseAdmin_GetBackup_sync]
