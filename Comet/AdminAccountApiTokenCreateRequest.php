<?php

/**
 * Copyright (c) 2018-2026 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 *
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

/**
 * Comet Server AdminAccountApiTokenCreate API
 * Create a new personal API token for the current admin account
 * The response contains the plaintext token. It is shown exactly once and cannot be retrieved again - store it securely.
 * The token inherits the current permissions of the admin account that created it, evaluated live on each request; it does not capture a fixed snapshot of permissions.
 * To authenticate with the token, send it in the Token field with AuthType=Token, or in the Password field with AuthType=Password. The latter lets SDKs and integrations that only support password authentication use a token without needing to handle 2FA.
 * Creating a token requires you to supply your current password, unless the request is already authenticated with a password, or the account is managed by an external authentication source. Check AdminAccountProperties.APITokenCreateRequiresPassword to know whether it is needed.
 *
 * You must supply administrator authentication credentials to use this API.
 * This API does not accept admin personal API token authentication (AuthType=Token, or the token supplied as the password with AuthType=Password).
 */
class AdminAccountApiTokenCreateRequest implements \Comet\NetworkRequest {

	/**
	 * Human-readable label for this token
	 *
	 * @var string
	 */
	protected $Description = null;

	/**
	 * Unix timestamp, in seconds, when the token stops working. Must be in the future. If this parameter is omitted entirely, the token expires after 90 days. Pass zero explicitly for a token that never expires (optional)
	 *
	 * @var int|null
	 */
	protected $ExpireTime = null;

	/**
	 * Construct a new AdminAccountApiTokenCreateRequest instance.
	 *
	 * @param string $Description Human-readable label for this token
	 * @param int $ExpireTime Unix timestamp, in seconds, when the token stops working. Must be in the future. If this parameter is omitted entirely, the token expires after 90 days. Pass zero explicitly for a token that never expires (optional)
	 */
	public function __construct(string $Description, int $ExpireTime = null)
	{
		$this->Description = $Description;
		$this->ExpireTime = $ExpireTime;
	}

	/**
	 * Get the URL where this POST request should be submitted to.
	 *
	 * @return string
	 */
	public function Endpoint(): string
	{
		return '/api/v1/admin/account/api-token/create';
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
		$ret["Description"] = (string)($this->Description);
		if ($this->ExpireTime !== null) {
			$ret["ExpireTime"] = (string)($this->ExpireTime);
		}
		return $ret;
	}

	/**
	 * Decode types used in a response to this request.
	 * Use any network library to make the request.
	 *
	 * @param int $responseCode HTTP response code
	 * @param string $body HTTP response body
	 * @return \Comet\AdminAccountAPITokenCreateResponse
	 * @throws \Exception
	 */
	public static function ProcessResponse(int $responseCode, string $body): \Comet\AdminAccountAPITokenCreateResponse
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

		// Parse as AdminAccountAPITokenCreateResponse
		if (is_array($decoded) && count($decoded) === 0) {
		// Work around edge case in json_decode--json_encode stdClass conversion
			$ret = \Comet\AdminAccountAPITokenCreateResponse::createFromStdclass(new \stdClass());
		} else {
			$ret = \Comet\AdminAccountAPITokenCreateResponse::createFromStdclass($decoded);
		}

		return $ret;
	}

}

