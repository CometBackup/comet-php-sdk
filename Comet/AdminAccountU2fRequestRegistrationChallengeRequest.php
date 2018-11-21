<?php

/**
 * Copyright (c) 2018 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 * 
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

/** 
 * Comet Server AdminAccountU2fRequestRegistrationChallenge API 
 * Register a new FIDO U2F token
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
	public function __construct($SelfAddress)
	{
		$this->SelfAddress = $SelfAddress;
	}
	
	/**
	 * Get the URL where this POST request should be submitted to.
	 *
	 * @return string
	 */
	public function Endpoint()
	{
		return '/api/v1/admin/account/u2f/request-registration-challenge';
	}
	
	/**
	 * Get the POST parameters for this request.
	 *
	 * @return string[]
	 */
	public function Parameters()
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
	public static function ProcessResponse($responseCode, $body)
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
			if ($carm->Status !== 200) {
				throw new \Exception("Error " . $carm->Status . ": " . $carm->Message);
			}
		}
		
		// Parse as U2FRegistrationChallengeResponse
		$ret = \Comet\U2FRegistrationChallengeResponse::createFromStdclass($decoded);
		
		return $ret;
	}
	
}

