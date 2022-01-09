<?php

/**
 * Copyright (c) 2018-2022 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 *
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

/**
 * Comet Server AdminDispatcherEmailPreview API
 * Request HTML content of an email
 * The remote device must have given consent for an MSP to browse their mail
 *
 * You must supply administrator authentication credentials to use this API.
 * This API requires the Auth Role to be enabled.
 */
class AdminDispatcherEmailPreviewRequest implements \Comet\NetworkRequest {

	/**
	 * The live connection GUID
	 *
	 * @var string
	 */
	protected $TargetID = null;

	/**
	 * where the email belongs to
	 *
	 * @var string
	 */
	protected $Snapshot = null;

	/**
	 * The Storage Vault ID
	 *
	 * @var string
	 */
	protected $Destination = null;

	/**
	 * of the email to view
	 *
	 * @var string
	 */
	protected $Path = null;

	/**
	 * Construct a new AdminDispatcherEmailPreviewRequest instance.
	 *
	 * @param string $TargetID The live connection GUID
	 * @param string $Snapshot where the email belongs to
	 * @param string $Destination The Storage Vault ID
	 * @param string $Path of the email to view
	 */
	public function __construct($TargetID, $Snapshot, $Destination, $Path)
	{
		$this->TargetID = $TargetID;
		$this->Snapshot = $Snapshot;
		$this->Destination = $Destination;
		$this->Path = $Path;
	}

	/**
	 * Get the URL where this POST request should be submitted to.
	 *
	 * @return string
	 */
	public function Endpoint()
	{
		return '/api/v1/admin/dispatcher/email-preview';
	}

	public function Method()
	{
		return 'POST';
	}

	public function ContentType()
	{
		return 'application/x-www-form-urlencoded';
	}

	/**
	 * Get the POST parameters for this request.
	 *
	 * @return string[]
	 */
	public function Parameters()
	{
		$ret = [];
		$ret["TargetID"] = (string)($this->TargetID);
		$ret["Snapshot"] = (string)($this->Snapshot);
		$ret["Destination"] = (string)($this->Destination);
		$ret["Path"] = (string)($this->Path);
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

