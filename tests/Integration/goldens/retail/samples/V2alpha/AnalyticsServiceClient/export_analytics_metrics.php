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

// [START retail_v2alpha_generated_AnalyticsService_ExportAnalyticsMetrics_sync]
use Google\ApiCore\ApiException;
use Google\ApiCore\OperationResponse;
use Google\Cloud\Retail\V2alpha\AnalyticsServiceClient;
use Google\Cloud\Retail\V2alpha\ExportAnalyticsMetricsResponse;
use Google\Cloud\Retail\V2alpha\OutputConfig;
use Google\Rpc\Status;

/**
 * Exports analytics metrics.
 *
 * `Operation.response` is of type `ExportAnalyticsMetricsResponse`.
 * `Operation.metadata` is of type `ExportMetadata`.
 *
 * @param string $catalog Full resource name of the parent catalog.
 *                        Expected format: `projects/&#42;/locations/&#42;/catalogs/*`
 */
function export_analytics_metrics_sample(string $catalog): void
{
    // Create a client.
    $analyticsServiceClient = new AnalyticsServiceClient();

    // Prepare any non-scalar elements to be passed along with the request.
    $outputConfig = new OutputConfig();

    // Call the API and handle any network failures.
    try {
        /** @var OperationResponse $response */
        $response = $analyticsServiceClient->exportAnalyticsMetrics($catalog, $outputConfig);
        $response->pollUntilComplete();

        if ($response->operationSucceeded()) {
            /** @var ExportAnalyticsMetricsResponse $result */
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
    $catalog = '[CATALOG]';

    export_analytics_metrics_sample($catalog);
}
// [END retail_v2alpha_generated_AnalyticsService_ExportAnalyticsMetrics_sync]
