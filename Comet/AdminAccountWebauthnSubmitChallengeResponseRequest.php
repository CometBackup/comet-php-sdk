<?php

/**
 * Copyright (c) 2018-2023 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 *
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

/**
 * Comet Server AdminAccountWebauthnSubmitChallengeResponse API
 * Register a new FIDO2 WebAuthn token
 *
 * You must supply administrator authentication credentials to use this API.
 */
class AdminAccountWebauthnSubmitChallengeResponseRequest implements \Comet\NetworkRequest {

	/**
	 * External URL of this server, used as WebAuthn ID
	 *
	 * @var string
	 */
	protected $SelfAddress = null;

	/**
	 * Associated value from AdminAccountWebAuthnRequestRegistrationChallenge API
	 *
	 * @var string
	 */
	protected $ChallengeID = null;

	/**
	 * JSON-encoded credential
	 *
	 * @var string
	 */
	protected $Credential = null;

	/**
	 * Construct a new AdminAccountWebauthnSubmitChallengeResponseRequest instance.
	 *
	 * @param string $SelfAddress External URL of this server, used as WebAuthn ID
	 * @param string $ChallengeID Associated value from AdminAccountWebAuthnRequestRegistrationChallenge API
	 * @param string $Credential JSON-encoded credential
	 */
	public function __construct(string $SelfAddress, string $ChallengeID, string $Credential)
	{
		$this->SelfAddress = $SelfAddress;
		$this->ChallengeID = $ChallengeID;
		$this->Credential = $Credential;
	}

	/**
	 * Get the URL where this POST request should be submitted to.
	 *
	 * @return string
	 */
	public function Endpoint(): string
	{
		return '/api/v1/admin/account/webauthn/submit-challenge-response';
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
		$ret["ChallengeID"] = (string)($this->ChallengeID);
		$ret["Credential"] = (string)($this->Credential);
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

