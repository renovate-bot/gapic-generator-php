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

// [START dataproc_v1_generated_AutoscalingPolicyService_ListAutoscalingPolicies_sync]
use Google\ApiCore\ApiException;
use Google\ApiCore\PagedListResponse;
use Google\Cloud\Dataproc\V1\AutoscalingPolicy;
use Google\Cloud\Dataproc\V1\AutoscalingPolicyServiceClient;

/**
 * Lists autoscaling policies in the project.
 *
 * @param string $formattedParent The "resource name" of the region or location, as described
 *                                in https://cloud.google.com/apis/design/resource_names.
 *
 *                                * For `projects.regions.autoscalingPolicies.list`, the resource name
 *                                of the region has the following format:
 *                                `projects/{project_id}/regions/{region}`
 *
 *                                * For `projects.locations.autoscalingPolicies.list`, the resource name
 *                                of the location has the following format:
 *                                `projects/{project_id}/locations/{location}`
 *                                Please see {@see AutoscalingPolicyServiceClient::regionName()} for help formatting this field.
 */
function list_autoscaling_policies_sample(string $formattedParent): void
{
    // Create a client.
    $autoscalingPolicyServiceClient = new AutoscalingPolicyServiceClient();

    // Call the API and handle any network failures.
    try {
        /** @var PagedListResponse $response */
        $response = $autoscalingPolicyServiceClient->listAutoscalingPolicies($formattedParent);

        /** @var AutoscalingPolicy $element */
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
    $formattedParent = AutoscalingPolicyServiceClient::regionName('[PROJECT]', '[REGION]');

    list_autoscaling_policies_sample($formattedParent);
}
// [END dataproc_v1_generated_AutoscalingPolicyService_ListAutoscalingPolicies_sync]
