<?php

/**
 * Copyright (c) 2018-2022 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 *
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

/**
 * Comet Server AdminAccountU2fRequestRegistrationChallenge API
 * Register a new FIDO U2F token
 * Browser support for U2F is ending in February 2022. WebAuthn is backwards
 * compatible with U2F keys, and Comet will automatically migrate existing U2F keys
 * to allow their use with the WebAuthn endpoints.
 *
 * You must supply administrator authentication credentials to use this API.
 */
class AdminAccountU2fRequestRegistrationChallengeRequest implements \Comet\NetworkRequest {

	/**
	 * External URL of this server, used as U2F AppID and Facet
	 *
	 * @var string
	 */
	protected $SelfAddress = null;

	/**
	 * Construct a new AdminAccountU2fRequestRegistrationChallengeRequest instance.
	 *
	 * @param string $SelfAddress External URL of this server, used as U2F AppID and Facet
	 */
	public function __construct(string $SelfAddress)
	{
		$this->SelfAddress = $SelfAddress;
	}

	/**
	 * Get the URL where this POST request should be submitted to.
	 *
	 * @return string
	 */
	public function Endpoint(): string
	{
		return '/api/v1/admin/account/u2f/request-registration-challenge';
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
		$ret["SelfAddress"] = (string)($this->SelfAddress);
		return $ret;
	}

	/**
	 * Decode types used in a response to this request.
	 * Use any network library to make the request.
	 *
	 * @param int $responseCode HTTP response code
	 * @param string $body HTTP response body
	 * @return \Comet\U2FRegistrationChallengeResponse
	 * @throws \Exception
	 */
	public static function ProcessResponse(int $responseCode, string $body): \Comet\U2FRegistrationChallengeResponse
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

		// Parse as U2FRegistrationChallengeResponse
		if (is_array($decoded) && count($decoded) === 0) {
		// Work around edge case in json_decode--json_encode stdClass conversion
			$ret = \Comet\U2FRegistrationChallengeResponse::createFromStdclass(new \stdClass());
		} else {
			$ret = \Comet\U2FRegistrationChallengeResponse::createFromStdclass($decoded);
		}

		return $ret;
	}

}

