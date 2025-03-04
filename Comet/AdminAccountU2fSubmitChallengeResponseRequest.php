<?php

/**
 * Copyright (c) 2018-2025 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 *
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

/**
 * Comet Server AdminAccountU2fSubmitChallengeResponse API
 * Register a new FIDO U2F token
 * Browser support for U2F is ending in February 2022. WebAuthn is backwards
 * compatible with U2F keys, and Comet will automatically migrate existing U2F keys
 * to allow their use with the WebAuthn endpoints.
 *
 * You must supply administrator authentication credentials to use this API.
 */
class AdminAccountU2fSubmitChallengeResponseRequest implements \Comet\NetworkRequest {

	/**
	 * Associated value from AdminAccountU2fRequestRegistrationChallenge API
	 *
	 * @var string
	 */
	protected $U2FChallengeID = null;

	/**
	 * U2F response data supplied by hardware token
	 *
	 * @var string
	 */
	protected $U2FClientData = null;

	/**
	 * U2F response data supplied by hardware token
	 *
	 * @var string
	 */
	protected $U2FRegistrationData = null;

	/**
	 * U2F response data supplied by hardware token
	 *
	 * @var string
	 */
	protected $U2FVersion = null;

	/**
	 * Description of the token (optional)
	 *
	 * @var string|null
	 */
	protected $Description = null;

	/**
	 * Construct a new AdminAccountU2fSubmitChallengeResponseRequest instance.
	 *
	 * @param string $U2FChallengeID Associated value from AdminAccountU2fRequestRegistrationChallenge API
	 * @param string $U2FClientData U2F response data supplied by hardware token
	 * @param string $U2FRegistrationData U2F response data supplied by hardware token
	 * @param string $U2FVersion U2F response data supplied by hardware token
	 * @param string $Description Description of the token (optional)
	 */
	public function __construct(string $U2FChallengeID, string $U2FClientData, string $U2FRegistrationData, string $U2FVersion, string $Description = null)
	{
		$this->U2FChallengeID = $U2FChallengeID;
		$this->U2FClientData = $U2FClientData;
		$this->U2FRegistrationData = $U2FRegistrationData;
		$this->U2FVersion = $U2FVersion;
		$this->Description = $Description;
	}

	/**
	 * Get the URL where this POST request should be submitted to.
	 *
	 * @return string
	 */
	public function Endpoint(): string
	{
		return '/api/v1/admin/account/u2f/submit-challenge-response';
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
		$ret["U2FChallengeID"] = (string)($this->U2FChallengeID);
		$ret["U2FClientData"] = (string)($this->U2FClientData);
		$ret["U2FRegistrationData"] = (string)($this->U2FRegistrationData);
		$ret["U2FVersion"] = (string)($this->U2FVersion);
		if ($this->Description !== null) {
			$ret["Description"] = (string)($this->Description);
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

