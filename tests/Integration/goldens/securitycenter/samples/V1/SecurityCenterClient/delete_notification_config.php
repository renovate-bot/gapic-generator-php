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

// [START securitycenter_v1_generated_SecurityCenter_DeleteNotificationConfig_sync]
use Google\ApiCore\ApiException;
use Google\Cloud\SecurityCenter\V1\Client\SecurityCenterClient;
use Google\Cloud\SecurityCenter\V1\DeleteNotificationConfigRequest;

/**
 * Deletes a notification config.
 *
 * @param string $formattedName Name of the notification config to delete. Its format is
 *                              "organizations/[organization_id]/notificationConfigs/[config_id]",
 *                              "folders/[folder_id]/notificationConfigs/[config_id]",
 *                              or "projects/[project_id]/notificationConfigs/[config_id]". Please see
 *                              {@see SecurityCenterClient::notificationConfigName()} for help formatting this field.
 */
function delete_notification_config_sample(string $formattedName): void
{
    // Create a client.
    $securityCenterClient = new SecurityCenterClient();

    // Prepare the request message.
    $request = (new DeleteNotificationConfigRequest())
        ->setName($formattedName);

    // Call the API and handle any network failures.
    try {
        $securityCenterClient->deleteNotificationConfig($request);
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
    $formattedName = SecurityCenterClient::notificationConfigName(
        '[ORGANIZATION]',
        '[NOTIFICATION_CONFIG]'
    );

    delete_notification_config_sample($formattedName);
}
// [END securitycenter_v1_generated_SecurityCenter_DeleteNotificationConfig_sync]
