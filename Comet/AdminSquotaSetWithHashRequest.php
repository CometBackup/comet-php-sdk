<?php

/**
 * Copyright (c) 2018-2025 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 *
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

/**
 * Comet Server AdminSquotaSetWithHash API
 * Create or update a shared storage quota
 *
 * You must supply administrator authentication credentials to use this API.
 * This API requires the Auth Role to be enabled.
 */
class AdminSquotaSetWithHashRequest implements \Comet\NetworkRequest {

	/**
	 * (No description available)
	 *
	 * @var string
	 */
	protected $SharedStorageQuotaID = null;

	/**
	 * (No description available)
	 *
	 * @var \Comet\SharedStorageQuota
	 */
	protected $SharedStorageQuota = null;

	/**
	 * If supplied, validate the change against this hash. Omit to forcibly apply changes. (optional)
	 *
	 * @var string|null
	 */
	protected $CheckHash = null;

	/**
	 * Construct a new AdminSquotaSetWithHashRequest instance.
	 *
	 * @param string $SharedStorageQuotaID (No description available)
	 * @param \Comet\SharedStorageQuota $SharedStorageQuota (No description available)
	 * @param string $CheckHash If supplied, validate the change against this hash. Omit to forcibly apply changes. (optional)
	 */
	public function __construct(string $SharedStorageQuotaID, \Comet\SharedStorageQuota $SharedStorageQuota, string $CheckHash = null)
	{
		$this->SharedStorageQuotaID = $SharedStorageQuotaID;
		$this->SharedStorageQuota = $SharedStorageQuota;
		$this->CheckHash = $CheckHash;
	}

	/**
	 * Get the URL where this POST request should be submitted to.
	 *
	 * @return string
	 */
	public function Endpoint(): string
	{
		return '/api/v1/admin/squota/set-with-hash';
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
		$ret["SharedStorageQuotaID"] = (string)($this->SharedStorageQuotaID);
		$ret["SharedStorageQuota"] = $this->SharedStorageQuota->toJSON();
		if ($this->CheckHash !== null) {
			$ret["CheckHash"] = (string)($this->CheckHash);
		}
		return $ret;
	}

	/**
	 * Decode types used in a response to this request.
	 * Use any network library to make the request.
	 *
	 * @param int $responseCode HTTP response code
	 * @param string $body HTTP response body
	 * @return \Comet\SetSharedStorageQuotaResponse
	 * @throws \Exception
	 */
	public static function ProcessResponse(int $responseCode, string $body): \Comet\SetSharedStorageQuotaResponse
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

		// Parse as SetSharedStorageQuotaResponse
		if (is_array($decoded) && count($decoded) === 0) {
		// Work around edge case in json_decode--json_encode stdClass conversion
			$ret = \Comet\SetSharedStorageQuotaResponse::createFromStdclass(new \stdClass());
		} else {
			$ret = \Comet\SetSharedStorageQuotaResponse::createFromStdclass($decoded);
		}

		return $ret;
	}

}

