<?php

/**
 * Copyright (c) 2018-2025 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 *
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

/**
 * Comet Server AdminExternalAuthSourcesNew API
 * Create an external admin authentication source
 *
 * You must supply administrator authentication credentials to use this API.
 */
class AdminExternalAuthSourcesNewRequest implements \Comet\NetworkRequest {

	/**
	 * (No description available)
	 *
	 * @var \Comet\ExternalAuthenticationSource
	 */
	protected $Source = null;

	/**
	 * (No description available) (optional)
	 *
	 * @var string|null
	 */
	protected $SourceID = null;

	/**
	 * Construct a new AdminExternalAuthSourcesNewRequest instance.
	 *
	 * @param \Comet\ExternalAuthenticationSource $Source (No description available)
	 * @param string $SourceID (No description available) (optional)
	 */
	public function __construct(\Comet\ExternalAuthenticationSource $Source, string $SourceID = null)
	{
		$this->Source = $Source;
		$this->SourceID = $SourceID;
	}

	/**
	 * Get the URL where this POST request should be submitted to.
	 *
	 * @return string
	 */
	public function Endpoint(): string
	{
		return '/api/v1/admin/external-auth-sources/new';
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
		$ret["Source"] = $this->Source->toJSON();
		if ($this->SourceID !== null) {
			$ret["SourceID"] = (string)($this->SourceID);
		}
		return $ret;
	}

	/**
	 * Decode types used in a response to this request.
	 * Use any network library to make the request.
	 *
	 * @param int $responseCode HTTP response code
	 * @param string $body HTTP response body
	 * @return \Comet\ExternalAuthenticationSourceResponse
	 * @throws \Exception
	 */
	public static function ProcessResponse(int $responseCode, string $body): \Comet\ExternalAuthenticationSourceResponse
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

		// Parse as ExternalAuthenticationSourceResponse
		if (is_array($decoded) && count($decoded) === 0) {
		// Work around edge case in json_decode--json_encode stdClass conversion
			$ret = \Comet\ExternalAuthenticationSourceResponse::createFromStdclass(new \stdClass());
		} else {
			$ret = \Comet\ExternalAuthenticationSourceResponse::createFromStdclass($decoded);
		}

		return $ret;
	}

}

