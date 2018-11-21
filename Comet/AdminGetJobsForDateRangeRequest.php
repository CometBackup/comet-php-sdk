<?php

/**
 * Copyright (c) 2018 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 * 
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

/** 
 * Comet Server AdminGetJobsForDateRange API 
 * Get jobs (for date range)
 * The jobs are returned in an unspecified order.
 * 
 * If the `Start` parameter is later than `End`, they will be swapped.
 * 
 * This API will return all jobs that either started or ended within the supplied range.
 * 
 * Incomplete jobs have an end time of `0`. You can use this API to find incomplete jobs by setting both `Start` and `End` to `0`.
 * 
 * You must supply administrator authentication credentials to use this API.
 * This API requires the Auth Role to be enabled.
 */
class AdminGetJobsForDateRangeRequest implements \Comet\NetworkRequest {
	
	/**
	 * Timestamp (Unix)
	 *
	 * @var int
	 */
	protected $Start = null;
	
	/**
	 * Timestamp (Unix)
	 *
	 * @var int
	 */
	protected $End = null;
	
	/**
	 * Construct a new AdminGetJobsForDateRangeRequest instance.
	 *
	 * @param int $Start Timestamp (Unix)
	 * @param int $End Timestamp (Unix)
	 */
	public function __construct($Start, $End)
	{
		$this->Start = $Start;
		$this->End = $End;
	}
	
	/**
	 * Get the URL where this POST request should be submitted to.
	 *
	 * @return string
	 */
	public function Endpoint()
	{
		return '/api/v1/admin/get-jobs-for-date-range';
	}
	
	/**
	 * Get the POST parameters for this request.
	 *
	 * @return string[]
	 */
	public function Parameters()
	{
		$ret = [];
		$ret["Start"] = (string)($this->Start);
		$ret["End"] = (string)($this->End);
		return $ret;
	}
	
	/**
	 * Decode types used in a response to this request.
	 * Use any network library to make the request.
	 *
	 * @param int $responseCode HTTP response code
	 * @param string $body HTTP response body
	 * @return \Comet\BackupJobDetail[] 
	 * @throws \Exception
	 */
	public static function ProcessResponse($responseCode, $body)
	{
		// Require expected HTTP 200 response
		if ($responseCode !== 200) {
			throw new \Exception("Unexpected HTTP " . intval($responseCode) . " response");
		}
		
		// Decode JSON
		$decoded = \json_decode($body); // as stdClass
		if (\json_last_error() != \JSON_ERROR_NONE) {
			throw new \Exception("JSON decode failed: " . \json_last_error_msg());
		}
		
		// Try to parse as error format
		$isCARMDerivedType = (($decoded instanceof \stdClass) && property_exists($decoded, 'Status') && property_exists($decoded, 'Message'));
		if ($isCARMDerivedType) {
			$carm = \Comet\APIResponseMessage::createFromStdclass($decoded);
			if ($carm->Status !== 200) {
				throw new \Exception("Error " . $carm->Status . ": " . $carm->Message);
			}
		}
		
		// Parse as []BackupJobDetail
		$val_0 = [];
		for($i_0 = 0; $i_0 < count($decoded); ++$i_0) {
			$val_0[] = \Comet\BackupJobDetail::createFromStdclass($decoded[$i_0]);
		}
		$ret = $val_0;
		
		return $ret;
	}
	
}

