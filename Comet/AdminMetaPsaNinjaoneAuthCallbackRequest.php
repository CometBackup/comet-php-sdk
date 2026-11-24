<?php

/**
 * Copyright (c) 2018-2026 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 *
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

/**
 * Comet Server AdminMetaPsaNinjaoneAuthCallback API
 * Exchange a NinjaOne OAuth authorization code for an encrypted refresh token
 * The frontend should store the returned token on the NinjaOneConfig and persist it via the normal PSA config save flow.
 *
 * You must supply administrator authentication credentials to use this API.
 * This API accepts admin personal API token authentication (AuthType=Token, or the token supplied as the password with AuthType=Password).
 */
class AdminMetaPsaNinjaoneAuthCallbackRequest implements \Comet\NetworkRequest {

	/**
	 * The authorization code from NinjaOne
	 *
	 * @var string
	 */
	protected $Code = null;

	/**
	 * The callback URI used in the authorization request
	 *
	 * @var string
	 */
	protected $RedirectURI = null;

	/**
	 * The NinjaOne base URL
	 *
	 * @var string
	 */
	protected $BaseURL = null;

	/**
	 * The OAuth Client ID
	 *
	 * @var string
	 */
	protected $ClientID = null;

	/**
	 * The OAuth Client Secret
	 *
	 * @var string
	 */
	protected $ClientSecret = null;

	/**
	 * Construct a new AdminMetaPsaNinjaoneAuthCallbackRequest instance.
	 *
	 * @param string $Code The authorization code from NinjaOne
	 * @param string $RedirectURI The callback URI used in the authorization request
	 * @param string $BaseURL The NinjaOne base URL
	 * @param string $ClientID The OAuth Client ID
	 * @param string $ClientSecret The OAuth Client Secret
	 */
	public function __construct(string $Code, string $RedirectURI, string $BaseURL, string $ClientID, string $ClientSecret)
	{
		$this->Code = $Code;
		$this->RedirectURI = $RedirectURI;
		$this->BaseURL = $BaseURL;
		$this->ClientID = $ClientID;
		$this->ClientSecret = $ClientSecret;
	}

	/**
	 * Get the URL where this POST request should be submitted to.
	 *
	 * @return string
	 */
	public function Endpoint(): string
	{
		return '/api/v1/admin/meta/psa/ninjaone/auth-callback';
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
		$ret["Code"] = (string)($this->Code);
		$ret["RedirectURI"] = (string)($this->RedirectURI);
		$ret["BaseURL"] = (string)($this->BaseURL);
		$ret["ClientID"] = (string)($this->ClientID);
		$ret["ClientSecret"] = (string)($this->ClientSecret);
		return $ret;
	}

	/**
	 * Decode types used in a response to this request.
	 * Use any network library to make the request.
	 *
	 * @param int $responseCode HTTP response code
	 * @param string $body HTTP response body
	 * @return \Comet\NinjaOneAuthCallbackResponse
	 * @throws \Exception
	 */
	public static function ProcessResponse(int $responseCode, string $body): \Comet\NinjaOneAuthCallbackResponse
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

		// Parse as NinjaOneAuthCallbackResponse
		if (is_array($decoded) && count($decoded) === 0) {
		// Work around edge case in json_decode--json_encode stdClass conversion
			$ret = \Comet\NinjaOneAuthCallbackResponse::createFromStdclass(new \stdClass());
		} else {
			$ret = \Comet\NinjaOneAuthCallbackResponse::createFromStdclass($decoded);
		}

		return $ret;
	}

}

