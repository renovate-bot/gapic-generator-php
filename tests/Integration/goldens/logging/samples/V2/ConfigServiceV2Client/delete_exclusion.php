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

// [START logging_v2_generated_ConfigServiceV2_DeleteExclusion_sync]
use Google\ApiCore\ApiException;
use Google\Cloud\Logging\V2\ConfigServiceV2Client;

/**
 * Deletes an exclusion in the _Default sink.
 *
 * @param string $formattedName The resource name of an existing exclusion to delete:
 *
 *                              "projects/[PROJECT_ID]/exclusions/[EXCLUSION_ID]"
 *                              "organizations/[ORGANIZATION_ID]/exclusions/[EXCLUSION_ID]"
 *                              "billingAccounts/[BILLING_ACCOUNT_ID]/exclusions/[EXCLUSION_ID]"
 *                              "folders/[FOLDER_ID]/exclusions/[EXCLUSION_ID]"
 *
 *                              For example:
 *
 *                              `"projects/my-project/exclusions/my-exclusion"`
 *                              Please see {@see ConfigServiceV2Client::logExclusionName()} for help formatting this field.
 */
function delete_exclusion_sample(string $formattedName): void
{
    // Create a client.
    $configServiceV2Client = new ConfigServiceV2Client();

    // Call the API and handle any network failures.
    try {
        $configServiceV2Client->deleteExclusion($formattedName);
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
    $formattedName = ConfigServiceV2Client::logExclusionName('[PROJECT]', '[EXCLUSION]');

    delete_exclusion_sample($formattedName);
}
// [END logging_v2_generated_ConfigServiceV2_DeleteExclusion_sync]
