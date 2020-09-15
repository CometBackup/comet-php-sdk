<?php

/**
 * Copyright (c) 2018-2020 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 *
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

/**
 * Comet Server AdminPreviewUserEmailReport API
 * Preview an email report for a customer
 *
 * You must supply administrator authentication credentials to use this API.
 * This API requires the Auth Role to be enabled.
 */
class AdminPreviewUserEmailReportRequest implements \Comet\NetworkRequest {

	/**
	 * Selected account username
	 *
	 * @var string
	 */
	protected $TargetUser = null;

	/**
	 * Email report configuration to preview
	 *
	 * @var \Comet\EmailReportConfig
	 */
	protected $EmailReportConfig = null;

	/**
	 * Email address that may be included in the report body (>= 20.3.3) (optional)
	 *
	 * @var string|null
	 */
	protected $EmailAddress = null;

	/**
	 * Construct a new AdminPreviewUserEmailReportRequest instance.
	 *
	 * @param string $TargetUser Selected account username
	 * @param \Comet\EmailReportConfig $EmailReportConfig Email report configuration to preview
	 * @param string $EmailAddress Email address that may be included in the report body (>= 20.3.3) (optional)
	 */
	public function __construct($TargetUser, EmailReportConfig $EmailReportConfig, $EmailAddress = null)
	{
		$this->TargetUser = $TargetUser;
		$this->EmailReportConfig = $EmailReportConfig;
		$this->EmailAddress = $EmailAddress;
	}

	/**
	 * Get the URL where this POST request should be submitted to.
	 *
	 * @return string
	 */
	public function Endpoint()
	{
		return '/api/v1/admin/preview-user-email-report';
	}

	public function Method()
	{
		return 'POST';
	}

	/**
	 * Get the POST parameters for this request.
	 *
	 * @return string[]
	 */
	public function Parameters()
	{
		$ret = [];
		$ret["TargetUser"] = (string)($this->TargetUser);
		$ret["EmailReportConfig"] = $this->EmailReportConfig->toJSON();
		if ($this->EmailAddress !== null) {
			$ret["EmailAddress"] = (string)($this->EmailAddress);
		}
		return $ret;
	}

	/**
	 * Decode types used in a response to this request.
	 * Use any network library to make the request.
	 *
	 * @param int $responseCode HTTP response code
	 * @param string $body HTTP response body
	 * @return \Comet\EmailReportGeneratedPreview
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
			if ($carm->Status >= 400) {
				throw new \Exception("Error " . $carm->Status . ": " . $carm->Message);
			}
		}

		// Parse as EmailReportGeneratedPreview
		if (is_array($decoded) && count($decoded) === 0) {
		// Work around edge case in json_decode--json_encode stdClass conversion
			$ret = \Comet\EmailReportGeneratedPreview::createFromStdclass(new \stdClass());
		} else {
			$ret = \Comet\EmailReportGeneratedPreview::createFromStdclass($decoded);
		}

		return $ret;
	}

}

