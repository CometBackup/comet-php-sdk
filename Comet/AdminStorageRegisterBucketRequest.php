<?php

/**
 * Copyright (c) 2018-2022 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 *
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

/**
 * Comet Server AdminStorageRegisterBucket API
 * Create a new bucket
 * Leave the Set* parameters blank to generate a bucket with random credentials, or, supply a pre-hashed password for zero-knowledge operations.
 * Any auto-generated credentials are returned in the response message.
 *
 * You must supply administrator authentication credentials to use this API.
 * This API requires the Storage Role to be enabled.
 */
class AdminStorageRegisterBucketRequest implements \Comet\NetworkRequest {

	/**
	 * Bucket ID (optional)
	 *
	 * @var string|null
	 */
	protected $SetBucketValue = null;

	/**
	 * Bucket key hashing format (optional)
	 *
	 * @var string|null
	 */
	protected $SetKeyHashFormat = null;

	/**
	 * Bucket key hash (optional)
	 *
	 * @var string|null
	 */
	protected $SetKeyHashValue = null;

	/**
	 * Target organization ID (>= 20.9.0) (optional)
	 *
	 * @var string|null
	 */
	protected $SetOrganizationID = null;

	/**
	 * Construct a new AdminStorageRegisterBucketRequest instance.
	 *
	 * @param string $SetBucketValue Bucket ID (optional)
	 * @param string $SetKeyHashFormat Bucket key hashing format (optional)
	 * @param string $SetKeyHashValue Bucket key hash (optional)
	 * @param string $SetOrganizationID Target organization ID (>= 20.9.0) (optional)
	 */
	public function __construct(string $SetBucketValue = null, string $SetKeyHashFormat = null, string $SetKeyHashValue = null, string $SetOrganizationID = null)
	{
		$this->SetBucketValue = $SetBucketValue;
		$this->SetKeyHashFormat = $SetKeyHashFormat;
		$this->SetKeyHashValue = $SetKeyHashValue;
		$this->SetOrganizationID = $SetOrganizationID;
	}

	/**
	 * Get the URL where this POST request should be submitted to.
	 *
	 * @return string
	 */
	public function Endpoint(): string
	{
		return '/api/v1/admin/storage/register-bucket';
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
		if ($this->SetBucketValue !== null) {
			$ret["SetBucketValue"] = (string)($this->SetBucketValue);
		}
		if ($this->SetKeyHashFormat !== null) {
			$ret["SetKeyHashFormat"] = (string)($this->SetKeyHashFormat);
		}
		if ($this->SetKeyHashValue !== null) {
			$ret["SetKeyHashValue"] = (string)($this->SetKeyHashValue);
		}
		if ($this->SetOrganizationID !== null) {
			$ret["SetOrganizationID"] = (string)($this->SetOrganizationID);
		}
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

