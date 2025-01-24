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

// [START dataproc_v1_generated_SessionTemplateController_GetSessionTemplate_sync]
use Google\ApiCore\ApiException;
use Google\Cloud\Dataproc\V1\SessionTemplate;
use Google\Cloud\Dataproc\V1\SessionTemplateControllerClient;

/**
 * Gets the resource representation for a session template.
 *
 * @param string $formattedName The name of the session template to retrieve. Please see
 *                              {@see SessionTemplateControllerClient::sessionTemplateName()} for help formatting this field.
 */
function get_session_template_sample(string $formattedName): void
{
    // Create a client.
    $sessionTemplateControllerClient = new SessionTemplateControllerClient();

    // Call the API and handle any network failures.
    try {
        /** @var SessionTemplate $response */
        $response = $sessionTemplateControllerClient->getSessionTemplate($formattedName);
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
    $formattedName = SessionTemplateControllerClient::sessionTemplateName(
        '[PROJECT]',
        '[LOCATION]',
        '[TEMPLATE]'
    );

    get_session_template_sample($formattedName);
}
// [END dataproc_v1_generated_SessionTemplateController_GetSessionTemplate_sync]
