<?php

/**
 * Copyright (c) 2018-2025 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 *
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

/**
 * Comet Server AdminAdminUserNew API
 * Add a new administrator
 *
 * You must supply administrator authentication credentials to use this API.
 * Access to this API may be prevented on a per-administrator basis.
 * This API is only available for top-level administrator accounts, not for Tenant administrator accounts.
 */
class AdminAdminUserNewRequest implements \Comet\NetworkRequest {

	/**
	 * the username for this new admin
	 *
	 * @var string
	 */
	protected $TargetUser = null;

	/**
	 * the password for this new admin user
	 *
	 * @var string
	 */
	protected $TargetPassword = null;

	/**
	 * provide the organization ID for this user, it will default to the org of the authenticating user otherwise (optional)
	 *
	 * @var string|null
	 */
	protected $TargetOrgID = null;

	/**
	 * Construct a new AdminAdminUserNewRequest instance.
	 *
	 * @param string $TargetUser the username for this new admin
	 * @param string $TargetPassword the password for this new admin user
	 * @param string $TargetOrgID provide the organization ID for this user, it will default to the org of the authenticating user otherwise (optional)
	 */
	public function __construct(string $TargetUser, string $TargetPassword, string $TargetOrgID = null)
	{
		$this->TargetUser = $TargetUser;
		$this->TargetPassword = $TargetPassword;
		$this->TargetOrgID = $TargetOrgID;
	}

	/**
	 * Get the URL where this POST request should be submitted to.
	 *
	 * @return string
	 */
	public function Endpoint(): string
	{
		return '/api/v1/admin/admin-user/new';
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
		$ret["TargetPassword"] = (string)($this->TargetPassword);
		if ($this->TargetOrgID !== null) {
			$ret["TargetOrgID"] = (string)($this->TargetOrgID);
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

