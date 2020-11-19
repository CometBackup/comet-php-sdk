<?php

/**
 * Copyright (c) 2018-2020 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 *
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

/**
 * Comet Server AdminBrandingGenerateClientByPlatform API
 * Download software
 *
 * This API requires administrator authentication credentials, unless the server is configured to allow unauthenticated software downloads.
 * This API requires the Software Build Role to be enabled.
 * This API requires the Auth Role to be enabled.
 */
class AdminBrandingGenerateClientByPlatformRequest implements \Comet\NetworkRequest {

	/**
	 * The selected download platform, from the AdminBrandingAvailablePlatforms API
	 *
	 * @var int
	 */
	protected $Platform = null;

	/**
	 * The external URL of this server, used to resolve conflicts (optional)
	 *
	 * @var string|null
	 */
	protected $SelfAddress = null;

	/**
	 * Construct a new AdminBrandingGenerateClientByPlatformRequest instance.
	 *
	 * @param int $Platform The selected download platform, from the AdminBrandingAvailablePlatforms API
	 * @param string $SelfAddress The external URL of this server, used to resolve conflicts (optional)
	 */
	public function __construct($Platform, $SelfAddress = null)
	{
		$this->Platform = $Platform;
		$this->SelfAddress = $SelfAddress;
	}

	/**
	 * Get the URL where this POST request should be submitted to.
	 *
	 * @return string
	 */
	public function Endpoint()
	{
		return '/api/v1/admin/branding/generate-client/by-platform';
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
		$ret["Platform"] = (string)($this->Platform);
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
	 * @return string
	 * @throws \Exception
	 */
	public static function ProcessResponse($responseCode, $body)
	{
		// Require expected HTTP 200 response
		if ($responseCode !== 200) {
			throw new \Exception("Unexpected HTTP " . intval($responseCode) . " response");
		}

		return $body;
	}

}

