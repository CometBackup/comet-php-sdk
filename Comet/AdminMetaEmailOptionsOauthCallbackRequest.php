<?php

/**
 * Copyright (c) 2018-2026 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 *
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

/**
 * Comet Server AdminMetaEmailOptionsOauthCallback API
 * Exchange an OAuth 2.0 authorization code for an encrypted SMTP refresh token
 * The web interface calls this after the mailbox user grants consent. The response is the supplied SMTPOAuth with the refresh token added and secrets encrypted; store it in EmailOptions.SMTPOAuth and save it with the AdminMetaEmailOptionsSet API.
 *
 * You must supply administrator authentication credentials to use this API.
 * Access to this API may be prevented on a per-administrator basis.
 * This API does not accept admin personal API token authentication (AuthType=Token, or the token supplied as the password with AuthType=Password).
 */
class AdminMetaEmailOptionsOauthCallbackRequest implements \Comet\NetworkRequest {

	/**
	 * The app registration that requested the authorization code. Flow must be SMTP_OAUTH_FLOW_AUTHORIZATION_CODE. The RefreshToken field is ignored. (>= 26.11.0)
	 *
	 * @var \Comet\SMTPOAuthOptions
	 */
	protected $SMTPOAuth = null;

	/**
	 * The authorization code returned to the redirect URI (>= 26.11.0)
	 *
	 * @var string
	 */
	protected $Code = null;

	/**
	 * The redirect URI used in the authorization request (>= 26.11.0)
	 *
	 * @var string
	 */
	protected $RedirectURI = null;

	/**
	 * Construct a new AdminMetaEmailOptionsOauthCallbackRequest instance.
	 *
	 * @param \Comet\SMTPOAuthOptions $SMTPOAuth The app registration that requested the authorization code. Flow must be SMTP_OAUTH_FLOW_AUTHORIZATION_CODE. The RefreshToken field is ignored. (>= 26.11.0)
	 * @param string $Code The authorization code returned to the redirect URI (>= 26.11.0)
	 * @param string $RedirectURI The redirect URI used in the authorization request (>= 26.11.0)
	 */
	public function __construct(\Comet\SMTPOAuthOptions $SMTPOAuth, string $Code, string $RedirectURI)
	{
		$this->SMTPOAuth = $SMTPOAuth;
		$this->Code = $Code;
		$this->RedirectURI = $RedirectURI;
	}

	/**
	 * Get the URL where this POST request should be submitted to.
	 *
	 * @return string
	 */
	public function Endpoint(): string
	{
		return '/api/v1/admin/meta/email-options/oauth-callback';
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
		$ret["SMTPOAuth"] = $this->SMTPOAuth->toJSON();
		$ret["Code"] = (string)($this->Code);
		$ret["RedirectURI"] = (string)($this->RedirectURI);
		return $ret;
	}

	/**
	 * Decode types used in a response to this request.
	 * Use any network library to make the request.
	 *
	 * @param int $responseCode HTTP response code
	 * @param string $body HTTP response body
	 * @return \Comet\SMTPOAuthOptions
	 * @throws \Exception
	 */
	public static function ProcessResponse(int $responseCode, string $body): \Comet\SMTPOAuthOptions
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

		// Parse as SMTPOAuthOptions
		if (is_array($decoded) && count($decoded) === 0) {
		// Work around edge case in json_decode--json_encode stdClass conversion
			$ret = \Comet\SMTPOAuthOptions::createFromStdclass(new \stdClass());
		} else {
			$ret = \Comet\SMTPOAuthOptions::createFromStdclass($decoded);
		}

		return $ret;
	}

}

