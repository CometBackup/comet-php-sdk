<?php

/**
 * Copyright (c) 2018-2022 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 *
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

/**
 * Comet Server BrandingProps API
 * Retreve basic information about this Comet Server
 */
class BrandingPropsRequest implements \Comet\NetworkRequest {

	/**
	 * Construct a new BrandingPropsRequest instance.
	 *
	 */
	public function __construct()
	{
	}

	/**
	 * Get the URL where this GET request should be submitted to.
	 *
	 * @return string
	 */
	public function Endpoint(): string
	{
		return '/gen/branding.props';
	}

	public function Method(): string
	{
		return 'GET';
	}

	public function ContentType(): string
	{
		return 'application/x-www-form-urlencoded';
	}

	/**
	 * Get the GET parameters for this request.
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
	 * @return \Comet\ServerMetaBrandingProperties
	 * @throws \Exception
	 */
	public static function ProcessResponse(int $responseCode, string $body): \Comet\ServerMetaBrandingProperties
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

		// Parse as ServerMetaBrandingProperties
		if (is_array($decoded) && count($decoded) === 0) {
		// Work around edge case in json_decode--json_encode stdClass conversion
			$ret = \Comet\ServerMetaBrandingProperties::createFromStdclass(new \stdClass());
		} else {
			$ret = \Comet\ServerMetaBrandingProperties::createFromStdclass($decoded);
		}

		return $ret;
	}

}

