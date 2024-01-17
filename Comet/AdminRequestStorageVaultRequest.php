<?php

/**
 * Copyright (c) 2018-2024 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 *
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

/**
 * Comet Server AdminRequestStorageVault API
 * Request a new Storage Vault on behalf of a user
 * This action does not respect the "Prevent creating new Storage Vaults (via Request)" policy setting. New Storage Vaults can be requested regardless of the policy setting.
 * Prior to Comet 19.8.0, the response type was CometAPIResponseMessage (i.e. no DestinationID field in response).
 * The StorageProvider must exist for the target user account's organization.
 *
 * You must supply administrator authentication credentials to use this API.
 * This API requires the Auth Role to be enabled.
 */
class AdminRequestStorageVaultRequest implements \Comet\NetworkRequest {

	/**
	 * The user to receive the new Storage Vault
	 *
	 * @var string
	 */
	protected $TargetUser = null;

	/**
	 * ID for the storage template destination
	 *
	 * @var string
	 */
	protected $StorageProvider = null;

	/**
	 * The external URL for this server. Used to resolve conflicts (optional)
	 *
	 * @var string|null
	 */
	protected $SelfAddress = null;

	/**
	 * Construct a new AdminRequestStorageVaultRequest instance.
	 *
	 * @param string $TargetUser The user to receive the new Storage Vault
	 * @param string $StorageProvider ID for the storage template destination
	 * @param string $SelfAddress The external URL for this server. Used to resolve conflicts (optional)
	 */
	public function __construct(string $TargetUser, string $StorageProvider, string $SelfAddress = null)
	{
		$this->TargetUser = $TargetUser;
		$this->StorageProvider = $StorageProvider;
		$this->SelfAddress = $SelfAddress;
	}

	/**
	 * Get the URL where this POST request should be submitted to.
	 *
	 * @return string
	 */
	public function Endpoint(): string
	{
		return '/api/v1/admin/request-storage-vault';
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
		$ret["StorageProvider"] = (string)($this->StorageProvider);
		if ($this->SelfAddress !== null) {
			$ret["SelfAddress"] = (string)($this->SelfAddress);
		}
		return $ret;
	}

	/**
	 * Decode types used in a response to this request.
	 * Use any network library to make the request.
	 *
	 * @param int $responseCode HTTP response code
	 * @param string $body HTTP response body
	 * @return \Comet\RequestStorageVaultResponseMessage
	 * @throws \Exception
	 */
	public static function ProcessResponse(int $responseCode, string $body): \Comet\RequestStorageVaultResponseMessage
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

		// Parse as RequestStorageVaultResponseMessage
		if (is_array($decoded) && count($decoded) === 0) {
		// Work around edge case in json_decode--json_encode stdClass conversion
			$ret = \Comet\RequestStorageVaultResponseMessage::createFromStdclass(new \stdClass());
		} else {
			$ret = \Comet\RequestStorageVaultResponseMessage::createFromStdclass($decoded);
		}

		return $ret;
	}

}

