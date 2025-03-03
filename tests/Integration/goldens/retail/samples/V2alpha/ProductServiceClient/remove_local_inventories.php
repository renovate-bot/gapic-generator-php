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

// [START retail_v2alpha_generated_ProductService_RemoveLocalInventories_sync]
use Google\ApiCore\ApiException;
use Google\ApiCore\OperationResponse;
use Google\Cloud\Retail\V2alpha\ProductServiceClient;
use Google\Cloud\Retail\V2alpha\RemoveLocalInventoriesResponse;
use Google\Rpc\Status;

/**
 * Remove local inventory information for a
 * [Product][google.cloud.retail.v2alpha.Product] at a list of places at a
 * removal timestamp.
 *
 * This process is asynchronous. If the request is valid, the removal will be
 * enqueued and processed downstream. As a consequence, when a response is
 * returned, removals are not immediately manifested in the
 * [Product][google.cloud.retail.v2alpha.Product] queried by
 * [ProductService.GetProduct][google.cloud.retail.v2alpha.ProductService.GetProduct]
 * or
 * [ProductService.ListProducts][google.cloud.retail.v2alpha.ProductService.ListProducts].
 *
 * Local inventory information can only be removed using this method.
 * [ProductService.CreateProduct][google.cloud.retail.v2alpha.ProductService.CreateProduct]
 * and
 * [ProductService.UpdateProduct][google.cloud.retail.v2alpha.ProductService.UpdateProduct]
 * has no effect on local inventories.
 *
 * The returned [Operation][google.longrunning.Operation]s will be obsolete
 * after 1 day, and [GetOperation][google.longrunning.Operations.GetOperation]
 * API will return NOT_FOUND afterwards.
 *
 * If conflicting updates are issued, the
 * [Operation][google.longrunning.Operation]s associated with the stale
 * updates will not be marked as [done][google.longrunning.Operation.done]
 * until being obsolete.
 *
 * @param string $formattedProduct Full resource name of
 *                                 [Product][google.cloud.retail.v2alpha.Product], such as
 *                                 `projects/&#42;/locations/global/catalogs/default_catalog/branches/default_branch/products/some_product_id`.
 *
 *                                 If the caller does not have permission to access the
 *                                 [Product][google.cloud.retail.v2alpha.Product], regardless of whether or
 *                                 not it exists, a PERMISSION_DENIED error is returned. Please see
 *                                 {@see ProductServiceClient::productName()} for help formatting this field.
 * @param string $placeIdsElement  A list of place IDs to have their inventory deleted.
 *                                 At most 3000 place IDs are allowed per request.
 */
function remove_local_inventories_sample(string $formattedProduct, string $placeIdsElement): void
{
    // Create a client.
    $productServiceClient = new ProductServiceClient();

    // Prepare any non-scalar elements to be passed along with the request.
    $placeIds = [$placeIdsElement,];

    // Call the API and handle any network failures.
    try {
        /** @var OperationResponse $response */
        $response = $productServiceClient->removeLocalInventories($formattedProduct, $placeIds);
        $response->pollUntilComplete();

        if ($response->operationSucceeded()) {
            /** @var RemoveLocalInventoriesResponse $result */
            $result = $response->getResult();
            printf('Operation successful with response data: %s' . PHP_EOL, $result->serializeToJsonString());
        } else {
            /** @var Status $error */
            $error = $response->getError();
            printf('Operation failed with error data: %s' . PHP_EOL, $error->serializeToJsonString());
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
    $formattedProduct = ProductServiceClient::productName(
        '[PROJECT]',
        '[LOCATION]',
        '[CATALOG]',
        '[BRANCH]',
        '[PRODUCT]'
    );
    $placeIdsElement = '[PLACE_IDS]';

    remove_local_inventories_sample($formattedProduct, $placeIdsElement);
}
// [END retail_v2alpha_generated_ProductService_RemoveLocalInventories_sync]
