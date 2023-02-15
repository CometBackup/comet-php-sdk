<?php

/**
 * Copyright (c) 2018-2023 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 *
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

/**
 * Comet Server AdminMetaServerConfigGet API
 * Get server configuration
 *
 * You must supply administrator authentication credentials to use this API.
 * Access to this API may be prevented on a per-administrator basis.
 * This API is only available for top-level administrator accounts, not for Tenant administrator accounts.
 */
class AdminMetaServerConfigGetRequest implements \Comet\NetworkRequest {

	/**
	 * Construct a new AdminMetaServerConfigGetRequest instance.
	 *
	 */
	public function __construct()
	{
	}

	/**
	 * Get the URL where this POST request should be submitted to.
	 *
	 * @return string
	 */
	public function Endpoint(): string
	{
		return '/api/v1/admin/meta/server-config/get';
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
		return $ret;
	}

	/**
	 * Decode types used in a response to this request.
	 * Use any network library to make the request.
	 *
	 * @param int $responseCode HTTP response code
	 * @param string $body HTTP response body
	 * @return \Comet\ServerConfigOptions
	 * @throws \Exception
	 */
	public static function ProcessResponse(int $responseCode, string $body): \Comet\ServerConfigOptions
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

		// Parse as ServerConfigOptions
		if (is_array($decoded) && count($decoded) === 0) {
		// Work around edge case in json_decode--json_encode stdClass conversion
			$ret = \Comet\ServerConfigOptions::createFromStdclass(new \stdClass());
		} else {
			$ret = \Comet\ServerConfigOptions::createFromStdclass($decoded);
		}

		return $ret;
	}

}

