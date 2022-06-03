<?php

/**
 * Copyright (c) 2018-2022 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 *
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

/**
 * Comet Server AdminAddUser API
 * Add a new user account
 *
 * You must supply administrator authentication credentials to use this API.
 * This API requires the Auth Role to be enabled.
 */
class AdminAddUserRequest implements \Comet\NetworkRequest {

	/**
	 * New account username
	 *
	 * @var string
	 */
	protected $TargetUser = null;

	/**
	 * New account password
	 *
	 * @var string
	 */
	protected $TargetPassword = null;

	/**
	 * If set to 1, store and keep a password recovery code for the generated user (>= 18.3.9) (optional)
	 *
	 * @var int|null
	 */
	protected $StoreRecoveryCode = null;

	/**
	 * If set to 1, require to reset password at the first login for the generated user (>= 20.3.4) (optional)
	 *
	 * @var int|null
	 */
	protected $RequirePasswordChange = null;

	/**
	 * If present, create the user account on behalf of another organization. Only allowed for administrator accounts in the top-level organization. (>= 22.3.7) (optional)
	 *
	 * @var string|null
	 */
	protected $TargetOrganization = null;

	/**
	 * Construct a new AdminAddUserRequest instance.
	 *
	 * @param string $TargetUser New account username
	 * @param string $TargetPassword New account password
	 * @param int $StoreRecoveryCode If set to 1, store and keep a password recovery code for the generated user (>= 18.3.9) (optional)
	 * @param int $RequirePasswordChange If set to 1, require to reset password at the first login for the generated user (>= 20.3.4) (optional)
	 * @param string $TargetOrganization If present, create the user account on behalf of another organization. Only allowed for administrator accounts in the top-level organization. (>= 22.3.7) (optional)
	 */
	public function __construct($TargetUser, $TargetPassword, $StoreRecoveryCode = null, $RequirePasswordChange = null, $TargetOrganization = null)
	{
		$this->TargetUser = $TargetUser;
		$this->TargetPassword = $TargetPassword;
		$this->StoreRecoveryCode = $StoreRecoveryCode;
		$this->RequirePasswordChange = $RequirePasswordChange;
		$this->TargetOrganization = $TargetOrganization;
	}

	/**
	 * Get the URL where this POST request should be submitted to.
	 *
	 * @return string
	 */
	public function Endpoint()
	{
		return '/api/v1/admin/add-user';
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
		$ret["TargetUser"] = (string)($this->TargetUser);
		$ret["TargetPassword"] = (string)($this->TargetPassword);
		if ($this->StoreRecoveryCode !== null) {
			$ret["StoreRecoveryCode"] = (string)($this->StoreRecoveryCode);
		}
		if ($this->RequirePasswordChange !== null) {
			$ret["RequirePasswordChange"] = (string)($this->RequirePasswordChange);
		}
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

