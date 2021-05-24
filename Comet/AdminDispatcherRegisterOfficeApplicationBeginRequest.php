<?php

/**
 * Copyright (c) 2018-2021 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 *
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

/**
 * Comet Server AdminDispatcherRegisterOfficeApplicationBegin API
 * Begin the process of registering a new Azure AD application that can access Office 365 for backup
 * After calling this API, you should supply the login details to the end-user, and then begin polling the AdminDispatcherRegisterOfficeApplicationCheck with the supplied "Continuation" parameter to check on the registration process.
 *
 * You must supply administrator authentication credentials to use this API.
 * This API requires the Auth Role to be enabled.
 */
class AdminDispatcherRegisterOfficeApplicationBeginRequest implements \Comet\NetworkRequest {

	/**
	 * The live connection GUID
	 *
	 * @var string
	 */
	protected $TargetID = null;

	/**
	 * The email address of the Azure AD administrator
	 *
	 * @var string
	 */
	protected $EmailAddress = null;

	/**
	 * Construct a new AdminDispatcherRegisterOfficeApplicationBeginRequest instance.
	 *
	 * @param string $TargetID The live connection GUID
	 * @param string $EmailAddress The email address of the Azure AD administrator
	 */
	public function __construct($TargetID, $EmailAddress)
	{
		$this->TargetID = $TargetID;
		$this->EmailAddress = $EmailAddress;
	}

	/**
	 * Get the URL where this POST request should be submitted to.
	 *
	 * @return string
	 */
	public function Endpoint()
	{
		return '/api/v1/admin/dispatcher/register-office-application/begin';
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
		$ret["EmailAddress"] = (string)($this->EmailAddress);
		return $ret;
	}

	/**
	 * Decode types used in a response to this request.
	 * Use any network library to make the request.
	 *
	 * @param int $responseCode HTTP response code
	 * @param string $body HTTP response body
	 * @return \Comet\RegisterOfficeApplicationBeginResponse
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

		// Parse as RegisterOfficeApplicationBeginResponse
		if (is_array($decoded) && count($decoded) === 0) {
		// Work around edge case in json_decode--json_encode stdClass conversion
			$ret = \Comet\RegisterOfficeApplicationBeginResponse::createFromStdclass(new \stdClass());
		} else {
			$ret = \Comet\RegisterOfficeApplicationBeginResponse::createFromStdclass($decoded);
		}

		return $ret;
	}

}

