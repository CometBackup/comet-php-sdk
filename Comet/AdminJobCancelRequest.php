<?php

/**
 * Copyright (c) 2018-2022 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 *
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

/**
 * Comet Server AdminJobCancel API
 * Cancel a running job
 * A request is sent to the live-connected device, asking it to cancel the operation. This may fail if there is no live-connection.
 * Only jobs from Comet 18.3.5 or newer can be cancelled. A job can only be cancelled if it has a non-empty CancellationID field in its properties.
 * If the device is running Comet 21.9.5 or later, this API will wait up to ten seconds for a confirmation from the client.
 *
 * You must supply administrator authentication credentials to use this API.
 * This API requires the Auth Role to be enabled.
 */
class AdminJobCancelRequest implements \Comet\NetworkRequest {

	/**
	 * Username
	 *
	 * @var string
	 */
	protected $TargetUser = null;

	/**
	 * Job ID
	 *
	 * @var string
	 */
	protected $JobID = null;

	/**
	 * Construct a new AdminJobCancelRequest instance.
	 *
	 * @param string $TargetUser Username
	 * @param string $JobID Job ID
	 */
	public function __construct(string $TargetUser, string $JobID)
	{
		$this->TargetUser = $TargetUser;
		$this->JobID = $JobID;
	}

	/**
	 * Get the URL where this POST request should be submitted to.
	 *
	 * @return string
	 */
	public function Endpoint(): string
	{
		return '/api/v1/admin/job/cancel';
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
		$ret["TargetUser"] = (string)($this->TargetUser);
		$ret["JobID"] = (string)($this->JobID);
		return $ret;
	}

	/**
	 * Decode types used in a response to this request.
	 * Use any network library to make the request.
	 *
	 * @param int $responseCode HTTP response code
	 * @param string $body HTTP response body
	 * @return \Comet\APIResponseMessage
	 * @throws \Exception
	 */
	public static function ProcessResponse(int $responseCode, string $body): \Comet\APIResponseMessage
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
			if ($carm->Status >= 400) {
				throw new \Exception("Error " . $carm->Status . ": " . $carm->Message);
			}
		}

		// Parse as CometAPIResponseMessage
		if (is_array($decoded) && count($decoded) === 0) {
		// Work around edge case in json_decode--json_encode stdClass conversion
			$ret = \Comet\APIResponseMessage::createFromStdclass(new \stdClass());
		} else {
			$ret = \Comet\APIResponseMessage::createFromStdclass($decoded);
		}

		return $ret;
	}

}

