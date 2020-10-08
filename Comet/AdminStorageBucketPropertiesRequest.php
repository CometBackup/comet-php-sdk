<?php

/**
 * Copyright (c) 2018-2020 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 *
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

/**
 * Comet Server AdminStorageBucketProperties API
 * Retrieve properties for a single bucket
 * This API can also be used to refresh the size measurement for a single bucket by passing a valid AfterTimestamp parameter.
 *
 * You must supply administrator authentication credentials to use this API.
 * This API requires the Storage Role to be enabled.
 */
class AdminStorageBucketPropertiesRequest implements \Comet\NetworkRequest {

	/**
	 * Bucket ID
	 *
	 * @var string
	 */
	protected $BucketID = null;

	/**
	 * Allow a stale size measurement if it is at least as new as the supplied Unix timestamp. Timestamps in the future may produce a result clamped down to the Comet Server's current time. If not present, the size measurement may be arbitrarily stale. (optional)
	 *
	 * @var int|null
	 */
	protected $AfterTimestamp = null;

	/**
	 * Construct a new AdminStorageBucketPropertiesRequest instance.
	 *
	 * @param string $BucketID Bucket ID
	 * @param int $AfterTimestamp Allow a stale size measurement if it is at least as new as the supplied Unix timestamp. Timestamps in the future may produce a result clamped down to the Comet Server's current time. If not present, the size measurement may be arbitrarily stale. (optional)
	 */
	public function __construct($BucketID, $AfterTimestamp = null)
	{
		$this->BucketID = $BucketID;
		$this->AfterTimestamp = $AfterTimestamp;
	}

	/**
	 * Get the URL where this POST request should be submitted to.
	 *
	 * @return string
	 */
	public function Endpoint()
	{
		return '/api/v1/admin/storage/bucket-properties';
	}

	public function Method()
	{
		return 'POST';
	}

	/**
	 * Get the POST parameters for this request.
	 *
	 * @return string[]
	 */
	public function Parameters()
	{
		$ret = [];
		$ret["BucketID"] = (string)($this->BucketID);
		if ($this->AfterTimestamp !== null) {
			$ret["AfterTimestamp"] = (string)($this->AfterTimestamp);
		}
		return $ret;
	}

	/**
	 * Decode types used in a response to this request.
	 * Use any network library to make the request.
	 *
	 * @param int $responseCode HTTP response code
	 * @param string $body HTTP response body
	 * @return \Comet\BucketProperties
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

		// Parse as BucketProperties
		if (is_array($decoded) && count($decoded) === 0) {
		// Work around edge case in json_decode--json_encode stdClass conversion
			$ret = \Comet\BucketProperties::createFromStdclass(new \stdClass());
		} else {
			$ret = \Comet\BucketProperties::createFromStdclass($decoded);
		}

		return $ret;
	}

}

