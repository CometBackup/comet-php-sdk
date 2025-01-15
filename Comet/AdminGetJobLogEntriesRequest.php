<?php

/**
 * Copyright (c) 2018-2025 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 *
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

/**
 * Comet Server AdminGetJobLogEntries API
 * Get the report log entries for a single job
 *
 * You must supply administrator authentication credentials to use this API.
 * This API requires the Auth Role to be enabled.
 */
class AdminGetJobLogEntriesRequest implements \Comet\NetworkRequest {

	/**
	 * Selected job ID
	 *
	 * @var string
	 */
	protected $JobID = null;

	/**
	 * Return only job log entries with equal or higher severity (optional)
	 *
	 * @var string|null
	 */
	protected $MinSeverity = null;

	/**
	 * Return only job log entries that contain exact string (optional)
	 *
	 * @var string|null
	 */
	protected $MessageContains = null;

	/**
	 * Construct a new AdminGetJobLogEntriesRequest instance.
	 *
	 * @param string $JobID Selected job ID
	 * @param string $MinSeverity Return only job log entries with equal or higher severity (optional)
	 * @param string $MessageContains Return only job log entries that contain exact string (optional)
	 */
	public function __construct(string $JobID, string $MinSeverity = null, string $MessageContains = null)
	{
		$this->JobID = $JobID;
		$this->MinSeverity = $MinSeverity;
		$this->MessageContains = $MessageContains;
	}

	/**
	 * Get the URL where this POST request should be submitted to.
	 *
	 * @return string
	 */
	public function Endpoint(): string
	{
		return '/api/v1/admin/get-job-log-entries';
	}

	public function Method(): string
	{
		return 'POST';
	}

	public function ContentType(): string
	{
		return 'application/x-www-form-urlencoded';
	}

	/**
	 * Get the POST parameters for this request.
	 *
	 * @return string[]
	 */
	public function Parameters(): array
	{
		$ret = [];
		$ret["JobID"] = (string)($this->JobID);
		if ($this->MinSeverity !== null) {
			$ret["MinSeverity"] = (string)($this->MinSeverity);
		}
		if ($this->MessageContains !== null) {
			$ret["MessageContains"] = (string)($this->MessageContains);
		}
		return $ret;
	}

	/**
	 * Decode types used in a response to this request.
	 * Use any network library to make the request.
	 *
	 * @param int $responseCode HTTP response code
	 * @param string $body HTTP response body
	 * @return \Comet\JobEntry[]
	 * @throws \Exception
	 */
	public static function ProcessResponse(int $responseCode, string $body): array
	{
		// Require expected HTTP 200 response
		if ($responseCode !== 200) {
			throw new \Exception("Unexpected HTTP " . intval($responseCode) . " response", $responseCode);
		}

		// Decode JSON
		$decoded = \json_decode($body); // as stdClass
		if (\json_last_error() != \JSON_ERROR_NONE) {
			throw new \Exception("JSON decode failed: " . \json_last_error_msg(), \json_last_error());
		}

		// Try to parse as error format
		$isCARMDerivedType = (($decoded instanceof \stdClass) && property_exists($decoded, 'Status') && property_exists($decoded, 'Message'));
		if ($isCARMDerivedType) {
			$carm = \Comet\APIResponseMessage::createFromStdclass($decoded);
			if ($carm->Status >= 400) {
				throw new \Exception("Error " . $carm->Status . ": " . $carm->Message, $carm->Status);
			}
		}

		// Parse as []JobEntry
		$val_0 = [];
		if ($decoded !== null) {
			for($i_0 = 0; $i_0 < count($decoded); ++$i_0) {
				if (is_array($decoded[$i_0]) && count($decoded[$i_0]) === 0) {
				// Work around edge case in json_decode--json_encode stdClass conversion
					$val_0[] = \Comet\JobEntry::createFromStdclass(new \stdClass());
				} else {
					$val_0[] = \Comet\JobEntry::createFromStdclass($decoded[$i_0]);
				}
			}
		}
		$ret = $val_0;

		return $ret;
	}

}

