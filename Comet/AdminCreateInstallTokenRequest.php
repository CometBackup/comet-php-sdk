<?php

/**
 * Copyright (c) 2018-2022 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 *
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

/**
 * Comet Server AdminCreateInstallToken API
 * Create token for silent installation
 * Currently only supported for Windows & macOS only
 * Provide the installation token to silently install the client on windows `install.exe /TOKEN=<installtoken>`
 * Provide the installation token to silently install the client on Mac OS `sudo launchctl setenv BACKUP_APP_TOKEN "installtoken" && sudo /usr/sbin/installer -allowUntrusted -pkg "Comet Backup.pkg" -target /`
 *
 * You must supply administrator authentication credentials to use this API.
 * This API requires the Auth Role to be enabled.
 */
class AdminCreateInstallTokenRequest implements \Comet\NetworkRequest {

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
	 * External URL of the authentication server that is different from the current server (optional)
	 *
	 * @var string|null
	 */
	protected $Server = null;

	/**
	 * Construct a new AdminCreateInstallTokenRequest instance.
	 *
	 * @param string $TargetUser Selected account username
	 * @param string $TargetPassword Selected account password
	 * @param string $Server External URL of the authentication server that is different from the current server (optional)
	 */
	public function __construct($TargetUser, $TargetPassword, $Server = null)
	{
		$this->TargetUser = $TargetUser;
		$this->TargetPassword = $TargetPassword;
		$this->Server = $Server;
	}

	/**
	 * Get the URL where this POST request should be submitted to.
	 *
	 * @return string
	 */
	public function Endpoint()
	{
		return '/api/v1/admin/create-install-token';
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
		if ($this->Server !== null) {
			$ret["Server"] = (string)($this->Server);
		}
		return $ret;
	}

	/**
	 * Decode types used in a response to this request.
	 * Use any network library to make the request.
	 *
	 * @param int $responseCode HTTP response code
	 * @param string $body HTTP response body
	 * @return \Comet\InstallTokenResponse
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

		// Parse as InstallTokenResponse
		if (is_array($decoded) && count($decoded) === 0) {
		// Work around edge case in json_decode--json_encode stdClass conversion
			$ret = \Comet\InstallTokenResponse::createFromStdclass(new \stdClass());
		} else {
			$ret = \Comet\InstallTokenResponse::createFromStdclass($decoded);
		}

		return $ret;
	}

}

