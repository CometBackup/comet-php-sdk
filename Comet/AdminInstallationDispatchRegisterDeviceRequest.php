<?php

/**
 * Copyright (c) 2018-2023 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 *
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

/**
 * Comet Server AdminInstallationDispatchRegisterDevice API
 * Instruct an unregistered device to authenticate with a given user
 *
 * You must supply administrator authentication credentials to use this API.
 * This API requires the Auth Role to be enabled.
 */
class AdminInstallationDispatchRegisterDeviceRequest implements \Comet\NetworkRequest {

	/**
	 * The live connection Device GUID
	 *
	 * @var string
	 */
	protected $DeviceID = null;

	/**
	 * Selected account username
	 *
	 * @var string
	 */
	protected $TargetUser = null;

	/**
	 * Selected account password
	 *
	 * @var string
	 */
	protected $TargetPassword = null;

	/**
	 * Selected account TOTP code (optional)
	 *
	 * @var string|null
	 */
	protected $TargetTOTPCode = null;

	/**
	 * Construct a new AdminInstallationDispatchRegisterDeviceRequest instance.
	 *
	 * @param string $DeviceID The live connection Device GUID
	 * @param string $TargetUser Selected account username
	 * @param string $TargetPassword Selected account password
	 * @param string $TargetTOTPCode Selected account TOTP code (optional)
	 */
	public function __construct(string $DeviceID, string $TargetUser, string $TargetPassword, string $TargetTOTPCode = null)
	{
		$this->DeviceID = $DeviceID;
		$this->TargetUser = $TargetUser;
		$this->TargetPassword = $TargetPassword;
		$this->TargetTOTPCode = $TargetTOTPCode;
	}

	/**
	 * Get the URL where this POST request should be submitted to.
	 *
	 * @return string
	 */
	public function Endpoint(): string
	{
		return '/api/v1/admin/installation/dispatch/register-device';
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
		$ret["DeviceID"] = (string)($this->DeviceID);
		$ret["TargetUser"] = (string)($this->TargetUser);
		$ret["TargetPassword"] = (string)($this->TargetPassword);
		if ($this->TargetTOTPCode !== null) {
			$ret["TargetTOTPCode"] = (string)($this->TargetTOTPCode);
		}
		return $ret;
	}

	/**
	 * Decode types used in a response to this request.
	 * Use any network library to make the request.
	 *
	 * @param int $responseCode HTTP response code
	 * @param string $body HTTP response body
	 * @return string
	 * @throws \Exception
	 */
	public static function ProcessResponse(int $responseCode, string $body): string
	{
		// Require expected HTTP 200 response
		if ($responseCode !== 200) {
			throw new \Exception("Unexpected HTTP " . intval($responseCode) . " response", $responseCode);
		}

		return $body;
	}

}

