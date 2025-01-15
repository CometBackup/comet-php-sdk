<?php

/**
 * Copyright (c) 2018-2025 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 *
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

/**
 * Comet Server AdminUserGroupsSetUsersForGroup API
 * Update the users in the specified group
 * The provided list of users will be moved into the specified group, and any users
 * already in the group who are not in the list of usernames will be removed.
 *
 * You must supply administrator authentication credentials to use this API.
 * This API requires the Auth Role to be enabled.
 */
class AdminUserGroupsSetUsersForGroupRequest implements \Comet\NetworkRequest {

	/**
	 * The user group ID to update
	 *
	 * @var string
	 */
	protected $GroupID = null;

	/**
	 * An array of usernames.
	 *
	 * @var string[]
	 */
	protected $Users = null;

	/**
	 * Construct a new AdminUserGroupsSetUsersForGroupRequest instance.
	 *
	 * @param string $GroupID The user group ID to update
	 * @param string[] $Users An array of usernames.
	 */
	public function __construct(string $GroupID, array $Users)
	{
		$this->GroupID = $GroupID;
		$this->Users = $Users;
	}

	/**
	 * Get the URL where this POST request should be submitted to.
	 *
	 * @return string
	 */
	public function Endpoint(): string
	{
		return '/api/v1/admin/user-groups/set-users-for-group';
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
		$ret["GroupID"] = (string)($this->GroupID);
		{
			$c0 = [];
			for($i0 = 0; $i0 < count($this->Users); ++$i0) {
				$val0 = $this->Users[$i0];

				$c0[] = $val0;
			}
			$ret["Users"] = json_encode($c0);
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

