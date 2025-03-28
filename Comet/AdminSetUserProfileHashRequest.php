<?php

/**
 * Copyright (c) 2018-2025 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 *
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

/**
 * Comet Server AdminSetUserProfileHash API
 * Modify user account profile (atomic)
 * The hash parameter can be determined from the corresponding API, to atomically ensure that no changes occur between get/set operations.
 * The hash format is not publicly documented and may change in a future server version. Use server APIs to retrieve current hash values.
 *
 * You must supply administrator authentication credentials to use this API.
 * This API requires the Auth Role to be enabled.
 */
class AdminSetUserProfileHashRequest implements \Comet\NetworkRequest {

	/**
	 * Selected account username
	 *
	 * @var string
	 */
	protected $TargetUser = null;

	/**
	 * Modified user profile
	 *
	 * @var \Comet\UserProfileConfig
	 */
	protected $ProfileData = null;

	/**
	 * Previous hash parameter
	 *
	 * @var string
	 */
	protected $RequireHash = null;

	/**
	 * Instructions for modifying user profile (optional)
	 *
	 * @var \Comet\AdminOptions|null
	 */
	protected $AdminOptions = null;

	/**
	 * Construct a new AdminSetUserProfileHashRequest instance.
	 *
	 * @param string $TargetUser Selected account username
	 * @param \Comet\UserProfileConfig $ProfileData Modified user profile
	 * @param string $RequireHash Previous hash parameter
	 * @param \Comet\AdminOptions $AdminOptions Instructions for modifying user profile (optional)
	 */
	public function __construct(string $TargetUser, \Comet\UserProfileConfig $ProfileData, string $RequireHash, \Comet\AdminOptions $AdminOptions = null)
	{
		$this->TargetUser = $TargetUser;
		$this->ProfileData = $ProfileData;
		$this->RequireHash = $RequireHash;
		$this->AdminOptions = $AdminOptions;
	}

	/**
	 * Get the URL where this POST request should be submitted to.
	 *
	 * @return string
	 */
	public function Endpoint(): string
	{
		return '/api/v1/admin/set-user-profile-hash';
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
		$ret["RequireHash"] = (string)($this->RequireHash);
		if ($this->AdminOptions !== null) {
			$ret["AdminOptions"] = $this->AdminOptions->toJSON();
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

