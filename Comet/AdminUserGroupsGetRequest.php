<?php

/**
 * Copyright (c) 2018-2025 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 *
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

/**
 * Comet Server AdminUserGroupsGet API
 * Retrieve a single user group object
 *
 * You must supply administrator authentication credentials to use this API.
 * This API requires the Auth Role to be enabled.
 */
class AdminUserGroupsGetRequest implements \Comet\NetworkRequest {

	/**
	 * The user group ID to retrieve
	 *
	 * @var string
	 */
	protected $GroupID = null;

	/**
	 * If present, includes the users array in the response. (optional)
	 *
	 * @var boolean|null
	 */
	protected $IncludeUsers = null;

	/**
	 * Construct a new AdminUserGroupsGetRequest instance.
	 *
	 * @param string $GroupID The user group ID to retrieve
	 * @param boolean $IncludeUsers If present, includes the users array in the response. (optional)
	 */
	public function __construct(string $GroupID, bool $IncludeUsers = null)
	{
		$this->GroupID = $GroupID;
		$this->IncludeUsers = $IncludeUsers;
	}

	/**
	 * Get the URL where this POST request should be submitted to.
	 *
	 * @return string
	 */
	public function Endpoint(): string
	{
		return '/api/v1/admin/user-groups/get';
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
		if ($this->IncludeUsers !== null) {
			$ret["IncludeUsers"] = ($this->IncludeUsers ? '1' : '0');
		}
		return $ret;
	}

	/**
	 * Decode types used in a response to this request.
	 * Use any network library to make the request.
	 *
	 * @param int $responseCode HTTP response code
	 * @param string $body HTTP response body
	 * @return \Comet\GetUserGroupWithUsersResponse
	 * @throws \Exception
	 */
	public static function ProcessResponse(int $responseCode, string $body): \Comet\GetUserGroupWithUsersResponse
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

		// Parse as GetUserGroupWithUsersResponse
		if (is_array($decoded) && count($decoded) === 0) {
		// Work around edge case in json_decode--json_encode stdClass conversion
			$ret = \Comet\GetUserGroupWithUsersResponse::createFromStdclass(new \stdClass());
		} else {
			$ret = \Comet\GetUserGroupWithUsersResponse::createFromStdclass($decoded);
		}

		return $ret;
	}

}

