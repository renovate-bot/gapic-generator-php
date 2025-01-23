<?php
/*
 * Copyright 2024 Google LLC
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

// [START container_v1_generated_ClusterManager_SetMasterAuth_sync]
use Google\ApiCore\ApiException;
use Google\Cloud\Container\V1\ClusterManagerClient;
use Google\Cloud\Container\V1\MasterAuth;
use Google\Cloud\Container\V1\Operation;
use Google\Cloud\Container\V1\SetMasterAuthRequest\Action;

/**
 * Sets master auth materials. Currently supports changing the admin password
 * or a specific cluster, either via password generation or explicitly setting
 * the password.
 *
 * @param int $action The exact form of action to be taken on the master auth.
 */
function set_master_auth_sample(int $action): void
{
    // Create a client.
    $clusterManagerClient = new ClusterManagerClient();

    // Prepare any non-scalar elements to be passed along with the request.
    $update = new MasterAuth();

    // Call the API and handle any network failures.
    try {
        /** @var Operation $response */
        $response = $clusterManagerClient->setMasterAuth($action, $update);
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
    $action = Action::UNKNOWN;

    set_master_auth_sample($action);
}
// [END container_v1_generated_ClusterManager_SetMasterAuth_sync]
