<?php

/**
 * Copyright (c) 2018-2024 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 *
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

/**
 * Comet Server AdminConvertStorageRole API
 * Convert IAM Storage Role vault to its underlying S3 type
 *
 * You must supply administrator authentication credentials to use this API.
 */
class AdminConvertStorageRoleRequest implements \Comet\NetworkRequest {

	/**
	 * The user to receive the new Storage Vault
	 *
	 * @var string
	 */
	protected $TargetUser = null;

	/**
	 * The id of the old storage role destination to convert
	 *
	 * @var string
	 */
	protected $DestinationId = null;

	/**
	 * Construct a new AdminConvertStorageRoleRequest instance.
	 *
	 * @param string $TargetUser The user to receive the new Storage Vault
	 * @param string $DestinationId The id of the old storage role destination to convert
	 */
	public function __construct(string $TargetUser, string $DestinationId)
	{
		$this->TargetUser = $TargetUser;
		$this->DestinationId = $DestinationId;
	}

	/**
	 * Get the URL where this POST request should be submitted to.
	 *
	 * @return string
	 */
	public function Endpoint(): string
	{
		return '/api/v1/admin/convert-storage-role';
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
		$ret["DestinationId"] = (string)($this->DestinationId);
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
