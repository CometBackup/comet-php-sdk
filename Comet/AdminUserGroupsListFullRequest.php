<?php

/**
 * Copyright (c) 2018-2025 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 *
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

/**
 * Comet Server AdminUserGroupsListFull API
 * Get all user group objects
 * For the top-level organization, the API result includes all user groups for all organizations, unless the TargetOrganization parameter is present.
 *
 * You must supply administrator authentication credentials to use this API.
 * This API requires the Auth Role to be enabled.
 */
class AdminUserGroupsListFullRequest implements \Comet\NetworkRequest {

	/**
	 * If present, list the user groups belonging to the specified organization. Only allowed for administrator accounts in the top-level organization. (optional)
	 *
	 * @var string|null
	 */
	protected $TargetOrganization = null;

	/**
	 * Construct a new AdminUserGroupsListFullRequest instance.
	 *
	 * @param string $TargetOrganization If present, list the user groups belonging to the specified organization. Only allowed for administrator accounts in the top-level organization. (optional)
	 */
	public function __construct(string $TargetOrganization = null)
	{
		$this->TargetOrganization = $TargetOrganization;
	}

	/**
	 * Get the URL where this POST request should be submitted to.
	 *
	 * @return string
	 */
	public function Endpoint(): string
	{
		return '/api/v1/admin/user-groups/list-full';
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
	 * @return array<string, \Comet\UserGroup>
	 * @throws \Exception
	 */
	public static function ProcessResponse(int $responseCode, string $body): array
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

		// Parse as map[string]UserGroup
		$val_0 = [];
		if ($decoded !== null) {
			foreach($decoded as $k_0 => $v_0) {
				$phpk_0 = (string)($k_0);
				if (is_array($v_0) && count($v_0) === 0) {
				// Work around edge case in json_decode--json_encode stdClass conversion
					$phpv_0 = \Comet\UserGroup::createFromStdclass(new \stdClass());
				} else {
					$phpv_0 = \Comet\UserGroup::createFromStdclass($v_0);
				}
				$val_0[$phpk_0] = $phpv_0;
			}
		}
		$ret = $val_0;

		return $ret;
	}

}

