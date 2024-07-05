<?php

/**
 * Copyright (c) 2018-2024 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 *
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

/**
 * Comet Server AdminExternalAuthSourcesSet API
 * Updates the current tenant's external admin authentication sources. This will set all
 * sources for the tenant; none will be preserved.
 *
 * You must supply administrator authentication credentials to use this API.
 */
class AdminExternalAuthSourcesSetRequest implements \Comet\NetworkRequest {

	/**
	 * (No description available)
	 *
	 * @var array<string, \Comet\ExternalAuthenticationSource>
	 */
	protected $Sources = null;

	/**
	 * Construct a new AdminExternalAuthSourcesSetRequest instance.
	 *
	 * @param array<string, \Comet\ExternalAuthenticationSource> $Sources (No description available)
	 */
	public function __construct(array $Sources)
	{
		$this->Sources = $Sources;
	}

	/**
	 * Get the URL where this POST request should be submitted to.
	 *
	 * @return string
	 */
	public function Endpoint(): string
	{
		return '/api/v1/admin/external-auth-sources/set';
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
		{
			$c0 = [];
			foreach($this->Sources as $k0 => $v0) {
				$ko_0 = $k0;

				$vo_0 = $v0->toArray(true);

				$c0[ $ko_0 ] = $vo_0;
			}
			if (count($c0) == 0) {
				$ret["Sources"] = '{}';
			} else {
				$ret["Sources"] = json_encode($c0);
			}
		}

		return $ret;
	}

	/**
	 * Decode types used in a response to this request.
	 * Use any network library to make the request.
	 *
	 * @param int $responseCode HTTP response code
	 * @param string $body HTTP response body
	 * @return \Comet\APIResponseMessage
	 * @throws \Exception
	 */
	public static function ProcessResponse(int $responseCode, string $body): \Comet\APIResponseMessage
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

		// Parse as CometAPIResponseMessage
		if (is_array($decoded) && count($decoded) === 0) {
		// Work around edge case in json_decode--json_encode stdClass conversion
			$ret = \Comet\APIResponseMessage::createFromStdclass(new \stdClass());
		} else {
			$ret = \Comet\APIResponseMessage::createFromStdclass($decoded);
		}

		return $ret;
	}

}

