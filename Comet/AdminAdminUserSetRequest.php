<?php

/**
 * Copyright (c) 2018-2026 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 *
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

/**
 * Comet Server AdminAdminUserSet API
 * Update another administrator
 * This API cannot update your own administrator account. Use the AdminAccountSetProperties API instead.
 * The supplied Profile replaces the stored administrator account as-is, with the following exceptions:
 * - The Username and OrganizationID fields must either be empty or match the target administrator. This API cannot rename an administrator or move it to another organization.
 * - To set a new plaintext password, use a password format of 0 (PASSWORD_FORMAT_PLAINTEXT); it must be at least 8 characters. A password format of 4 (PASSWORD_FORMAT_UNVERIFIABLE) leaves the password unchanged.
 * - APITokens may only be removed, or have their Description changed. New tokens must be created by the administrator themselves. Other fields of retained tokens are ignored.
 * - IPWhitelist is cleared if the server license does not permit it.
 *
 * You must supply administrator authentication credentials to use this API.
 * Access to this API may be prevented on a per-administrator basis.
 * This API is only available for top-level administrator accounts, not for Tenant administrator accounts.
 * This API does not accept admin personal API token authentication (AuthType=Token, or the token supplied as the password with AuthType=Password).
 */
class AdminAdminUserSetRequest implements \Comet\NetworkRequest {

	/**
	 * the username of the admin to be updated (>= 26.10.2)
	 *
	 * @var string
	 */
	protected $TargetUser = null;

	/**
	 * the updated administrator account (>= 26.10.2)
	 *
	 * @var \Comet\AllowedAdminUser
	 */
	protected $Profile = null;

	/**
	 * the organization ID of the admin to be updated. If omitted, defaults to the top-level organization. (>= 26.10.2) (optional)
	 *
	 * @var string|null
	 */
	protected $TargetOrgID = null;

	/**
	 * Construct a new AdminAdminUserSetRequest instance.
	 *
	 * @param string $TargetUser the username of the admin to be updated (>= 26.10.2)
	 * @param \Comet\AllowedAdminUser $Profile the updated administrator account (>= 26.10.2)
	 * @param string $TargetOrgID the organization ID of the admin to be updated. If omitted, defaults to the top-level organization. (>= 26.10.2) (optional)
	 */
	public function __construct(string $TargetUser, \Comet\AllowedAdminUser $Profile, string $TargetOrgID = null)
	{
		$this->TargetUser = $TargetUser;
		$this->Profile = $Profile;
		$this->TargetOrgID = $TargetOrgID;
	}

	/**
	 * Get the URL where this POST request should be submitted to.
	 *
	 * @return string
	 */
	public function Endpoint(): string
	{
		return '/api/v1/admin/admin-user/set';
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
		$ret["Profile"] = $this->Profile->toJSON();
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
			if ($carm->Status < 200 || $carm->Status > 299) {
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

