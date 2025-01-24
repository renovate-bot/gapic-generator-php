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

// [START jobs_v4beta1_generated_JobService_DeleteJob_sync]
use Google\ApiCore\ApiException;
use Google\Cloud\Talent\V4beta1\JobServiceClient;

/**
 * Deletes the specified job.
 *
 * Typically, the job becomes unsearchable within 10 seconds, but it may take
 * up to 5 minutes.
 *
 * @param string $formattedName The resource name of the job to be deleted.
 *
 *                              The format is
 *                              "projects/{project_id}/tenants/{tenant_id}/jobs/{job_id}". For
 *                              example, "projects/foo/tenants/bar/jobs/baz".
 *
 *                              If tenant id is unspecified, the default tenant is used. For
 *                              example, "projects/foo/jobs/bar". Please see
 *                              {@see JobServiceClient::jobName()} for help formatting this field.
 */
function delete_job_sample(string $formattedName): void
{
    // Create a client.
    $jobServiceClient = new JobServiceClient();

    // Call the API and handle any network failures.
    try {
        $jobServiceClient->deleteJob($formattedName);
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
    $formattedName = JobServiceClient::jobName('[PROJECT]', '[TENANT]', '[JOB]');

    delete_job_sample($formattedName);
}
// [END jobs_v4beta1_generated_JobService_DeleteJob_sync]
