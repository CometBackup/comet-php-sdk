<?php

/**
 * Copyright (c) 2018-2023 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 *
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

/**
 * Comet Server AdminStorageFreeSpace API
 * Retrieve available space metrics
 *
 * You must supply administrator authentication credentials to use this API.
 * Access to this API may be prevented on a per-administrator basis.
 * This API requires the Storage Role to be enabled.
 * This API is only available for administrator accounts in the top-level Organization, not in any other Organization.
 */
class AdminStorageFreeSpaceRequest implements \Comet\NetworkRequest {

	/**
	 * (This parameter is not used) (optional)
	 *
	 * @var string|null
	 */
	protected $BucketID = null;

	/**
	 * Construct a new AdminStorageFreeSpaceRequest instance.
	 *
	 * @param string $BucketID (This parameter is not used) (optional)
	 */
	public function __construct(string $BucketID = null)
	{
		$this->BucketID = $BucketID;
	}

	/**
	 * Get the URL where this POST request should be submitted to.
	 *
	 * @return string
	 */
	public function Endpoint(): string
	{
		return '/api/v1/admin/storage/free-space';
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
		if ($this->BucketID !== null) {
			$ret["BucketID"] = (string)($this->BucketID);
		}
		return $ret;
	}

	/**
	 * Decode types used in a response to this request.
	 * Use any network library to make the request.
	 *
	 * @param int $responseCode HTTP response code
	 * @param string $body HTTP response body
	 * @return \Comet\StorageFreeSpaceInfo
	 * @throws \Exception
	 */
	public static function ProcessResponse(int $responseCode, string $body): \Comet\StorageFreeSpaceInfo
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

		// Parse as StorageFreeSpaceInfo
		if (is_array($decoded) && count($decoded) === 0) {
		// Work around edge case in json_decode--json_encode stdClass conversion
			$ret = \Comet\StorageFreeSpaceInfo::createFromStdclass(new \stdClass());
		} else {
			$ret = \Comet\StorageFreeSpaceInfo::createFromStdclass($decoded);
		}

		return $ret;
	}

}

