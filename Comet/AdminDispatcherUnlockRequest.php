<?php

/**
 * Copyright (c) 2018-2025 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 *
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

/**
 * Comet Server AdminDispatcherUnlock API
 * Instruct a live connected device to remove lock files from a Storage Vault
 * Misuse can cause data loss!
 * This command is understood by Comet Backup 17.9.4 and newer.
 *
 * You must supply administrator authentication credentials to use this API.
 * This API requires the Auth Role to be enabled.
 */
class AdminDispatcherUnlockRequest implements \Comet\NetworkRequest {

	/**
	 * The live connection GUID
	 *
	 * @var string
	 */
	protected $TargetID = null;

	/**
	 * The Storage Vault GUID
	 *
	 * @var string
	 */
	protected $Destination = null;

	/**
	 * Allow legacy Storage Vault unlocking, which is unsafe in some cases. (optional)
	 *
	 * @var boolean|null
	 */
	protected $AllowUnsafe = null;

	/**
	 * Construct a new AdminDispatcherUnlockRequest instance.
	 *
	 * @param string $TargetID The live connection GUID
	 * @param string $Destination The Storage Vault GUID
	 * @param boolean $AllowUnsafe Allow legacy Storage Vault unlocking, which is unsafe in some cases. (optional)
	 */
	public function __construct(string $TargetID, string $Destination, bool $AllowUnsafe = null)
	{
		$this->TargetID = $TargetID;
		$this->Destination = $Destination;
		$this->AllowUnsafe = $AllowUnsafe;
	}

	/**
	 * Get the URL where this POST request should be submitted to.
	 *
	 * @return string
	 */
	public function Endpoint(): string
	{
		return '/api/v1/admin/dispatcher/unlock';
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
		$ret["TargetID"] = (string)($this->TargetID);
		$ret["Destination"] = (string)($this->Destination);
		if ($this->AllowUnsafe !== null) {
			$ret["AllowUnsafe"] = ($this->AllowUnsafe ? '1' : '0');
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

