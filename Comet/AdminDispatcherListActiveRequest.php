<?php

/**
 * Copyright (c) 2018-2020 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 *
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

/**
 * Comet Server AdminDispatcherListActive API
 * List live connected devices
 *
 * You must supply administrator authentication credentials to use this API.
 * This API requires the Auth Role to be enabled.
 */
class AdminDispatcherListActiveRequest implements \Comet\NetworkRequest {

	/**
	 * Construct a new AdminDispatcherListActiveRequest instance.
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
	public function Endpoint()
	{
		return '/api/v1/admin/dispatcher/list-active';
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
		return $ret;
	}

	/**
	 * Decode types used in a response to this request.
	 * Use any network library to make the request.
	 *
	 * @param int $responseCode HTTP response code
	 * @param string $body HTTP response body
	 * @return \Comet\LiveUserConnection[] An array with string keys.
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

		// Parse as LiveUserConnectionMap
		$val_0 = [];
		if ($decoded !== null) {
			foreach($decoded as $k_0 => $v_0) {
				$phpk_0 = (string)($k_0);
				if (is_array($v_0) && count($v_0) === 0) {
				// Work around edge case in json_decode--json_encode stdClass conversion
					$phpv_0 = \Comet\LiveUserConnection::createFromStdclass(new \stdClass());
				} else {
					$phpv_0 = \Comet\LiveUserConnection::createFromStdclass($v_0);
				}
				$val_0[$phpk_0] = $phpv_0;
			}
		}
		$ret = $val_0;

		return $ret;
	}

}

