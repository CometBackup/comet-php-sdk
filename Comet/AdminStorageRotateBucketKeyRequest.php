<?php

/**
 * Copyright (c) 2018-2026 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 *
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

/**
 * Comet Server AdminStorageRotateBucketKey API
 * Issue a new key for an existing bucket, replacing the previous one
 * The previous key stops working immediately. Any device or Storage Vault still using it loses access to the bucket until it is given the new key, so this can be used to cut off a backup job that is no longer supposed to be writing.
 * The new key is returned in the response message. It is not recoverable afterwards; if it is lost, issue another one.
 *
 * You must supply administrator authentication credentials to use this API.
 * This API requires the Storage Role to be enabled.
 * This API accepts admin personal API token authentication (AuthType=Token, or the token supplied as the password with AuthType=Password).
 */
class AdminStorageRotateBucketKeyRequest implements \Comet\NetworkRequest {

	/**
	 * Selected bucket name
	 *
	 * @var string
	 */
	protected $BucketID = null;

	/**
	 * Construct a new AdminStorageRotateBucketKeyRequest instance.
	 *
	 * @param string $BucketID Selected bucket name
	 */
	public function __construct(string $BucketID)
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
		return '/api/v1/admin/storage/rotate-bucket-key';
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
		$ret["BucketID"] = (string)($this->BucketID);
		return $ret;
	}

	/**
	 * Decode types used in a response to this request.
	 * Use any network library to make the request.
	 *
	 * @param int $responseCode HTTP response code
	 * @param string $body HTTP response body
	 * @return \Comet\AddBucketResponseMessage
	 * @throws \Exception
	 */
	public static function ProcessResponse(int $responseCode, string $body): \Comet\AddBucketResponseMessage
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
			if ($carm->Status < 200 || $carm->Status > 299) {
				throw new \Exception("Error " . $carm->Status . ": " . $carm->Message, $carm->Status);
			}
		}

		// Parse as AddBucketResponseMessage
		if (is_array($decoded) && count($decoded) === 0) {
		// Work around edge case in json_decode--json_encode stdClass conversion
			$ret = \Comet\AddBucketResponseMessage::createFromStdclass(new \stdClass());
		} else {
			$ret = \Comet\AddBucketResponseMessage::createFromStdclass($decoded);
		}

		return $ret;
	}

}

