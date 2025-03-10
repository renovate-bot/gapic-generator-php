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

// [START cloudkms_v1_generated_KeyManagementService_ListCryptoKeyVersions_sync]
use Google\ApiCore\ApiException;
use Google\ApiCore\PagedListResponse;
use Google\Cloud\Kms\V1\CryptoKeyVersion;
use Google\Cloud\Kms\V1\KeyManagementServiceClient;

/**
 * Lists [CryptoKeyVersions][google.cloud.kms.v1.CryptoKeyVersion].
 *
 * @param string $formattedParent The resource name of the
 *                                [CryptoKey][google.cloud.kms.v1.CryptoKey] to list, in the format
 *                                `projects/&#42;/locations/&#42;/keyRings/&#42;/cryptoKeys/*`. Please see
 *                                {@see KeyManagementServiceClient::cryptoKeyName()} for help formatting this field.
 */
function list_crypto_key_versions_sample(string $formattedParent): void
{
    // Create a client.
    $keyManagementServiceClient = new KeyManagementServiceClient();

    // Call the API and handle any network failures.
    try {
        /** @var PagedListResponse $response */
        $response = $keyManagementServiceClient->listCryptoKeyVersions($formattedParent);

        /** @var CryptoKeyVersion $element */
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
    $formattedParent = KeyManagementServiceClient::cryptoKeyName(
        '[PROJECT]',
        '[LOCATION]',
        '[KEY_RING]',
        '[CRYPTO_KEY]'
    );

    list_crypto_key_versions_sample($formattedParent);
}
// [END cloudkms_v1_generated_KeyManagementService_ListCryptoKeyVersions_sync]
