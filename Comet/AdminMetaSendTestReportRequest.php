<?php

/**
 * Copyright (c) 2018-2024 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 *
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

/**
 * Comet Server AdminMetaSendTestReport API
 * Send a test admin email report
 * This allows a user to send a test email report
 *
 * You must supply administrator authentication credentials to use this API.
 * Access to this API may be prevented on a per-administrator basis.
 */
class AdminMetaSendTestReportRequest implements \Comet\NetworkRequest {

	/**
	 * Test email reporting option for sending
	 *
	 * @var \Comet\EmailReportingOption
	 */
	protected $EmailReportingOption = null;

	/**
	 * If present, Testing email with a target organization. Only allowed for top-level admins. (>= 24.3.0) (optional)
	 *
	 * @var string|null
	 */
	protected $TargetOrganization = null;

	/**
	 * Construct a new AdminMetaSendTestReportRequest instance.
	 *
	 * @param \Comet\EmailReportingOption $EmailReportingOption Test email reporting option for sending
	 * @param string $TargetOrganization If present, Testing email with a target organization. Only allowed for top-level admins. (>= 24.3.0) (optional)
	 */
	public function __construct(\Comet\EmailReportingOption $EmailReportingOption, string $TargetOrganization = null)
	{
		$this->EmailReportingOption = $EmailReportingOption;
		$this->TargetOrganization = $TargetOrganization;
	}

	/**
	 * Get the URL where this POST request should be submitted to.
	 *
	 * @return string
	 */
	public function Endpoint(): string
	{
		return '/api/v1/admin/meta/send-test-report';
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
		$ret["EmailReportingOption"] = $this->EmailReportingOption->toJSON();
		if ($this->TargetOrganization !== null) {
			$ret["TargetOrganization"] = (string)($this->TargetOrganization);
		}
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

