<?php

/**
 * Copyright (c) 2018-2025 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 *
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

/**
 * Comet Server AdminAddUserFromProfile API
 * Add a new user account (with all information)
 * This allows you to create a new account and set all its properties at once (e.g. during account replication). Developers creating a signup form may find it simpler to use the AdminAddUser and AdminGetUserProfile / AdminSetUserProfile APIs separately.
 *
 * You must supply administrator authentication credentials to use this API.
 * This API requires the Auth Role to be enabled.
 */
class AdminAddUserFromProfileRequest implements \Comet\NetworkRequest {

	/**
	 * New account username
	 *
	 * @var string
	 */
	protected $TargetUser = null;

	/**
	 * New account profile
	 *
	 * @var \Comet\UserProfileConfig
	 */
	protected $ProfileData = null;

	/**
	 * If present, create the user account on behalf of another organization. Only allowed for administrator accounts in the top-level organization. (>= 22.3.7) (optional)
	 *
	 * @var string|null
	 */
	protected $TargetOrganization = null;

	/**
	 * Construct a new AdminAddUserFromProfileRequest instance.
	 *
	 * @param string $TargetUser New account username
	 * @param \Comet\UserProfileConfig $ProfileData New account profile
	 * @param string $TargetOrganization If present, create the user account on behalf of another organization. Only allowed for administrator accounts in the top-level organization. (>= 22.3.7) (optional)
	 */
	public function __construct(string $TargetUser, \Comet\UserProfileConfig $ProfileData, string $TargetOrganization = null)
	{
		$this->TargetUser = $TargetUser;
		$this->ProfileData = $ProfileData;
		$this->TargetOrganization = $TargetOrganization;
	}

	/**
	 * Get the URL where this POST request should be submitted to.
	 *
	 * @return string
	 */
	public function Endpoint(): string
	{
		return '/api/v1/admin/add-user-from-profile';
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
		$ret["ProfileData"] = $this->ProfileData->toJSON();
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

