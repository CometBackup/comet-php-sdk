<?php

/**
 * Copyright (c) 2018 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 * 
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

/** 
 * Comet Server AdminGetUserProfileAndHash API 
 * Get user account profile (atomic)
 * The resulting hash parameter can be passed to the corresponding update API, to atomically ensure that no changes occur between get/set operations.
 * The hash format is not publicly documented and may change in a future server version. Use server APIs to retrieve current hash values.
 * 
 * You must supply administrator authentication credentials to use this API.
 * This API requires the Auth Role to be enabled.
 */
class AdminGetUserProfileAndHashRequest implements \Comet\NetworkRequest {
	
	/**
	 * Selected account username
	 *
	 * @var string
	 */
	protected $TargetUser = null;
	
	/**
	 * Construct a new AdminGetUserProfileAndHashRequest instance.
	 *
	 * @param string $TargetUser Selected account username
	 */
	public function __construct($TargetUser)
	{
		$this->TargetUser = $TargetUser;
	}
	
	/**
	 * Get the URL where this POST request should be submitted to.
	 *
	 * @return string
	 */
	public function Endpoint()
	{
		return '/api/v1/admin/get-user-profile-and-hash';
	}
	
	/**
	 * Get the POST parameters for this request.
	 *
	 * @return string[]
	 */
	public function Parameters()
	{
		$ret = [];
		$ret["TargetUser"] = (string)($this->TargetUser);
		return $ret;
	}
	
	/**
	 * Decode types used in a response to this request.
	 * Use any network library to make the request.
	 *
	 * @param int $responseCode HTTP response code
	 * @param string $body HTTP response body
	 * @return \Comet\GetProfileAndHashResponseMessage 
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
		
		// Parse as GetProfileAndHashResponseMessage
		$ret = \Comet\GetProfileAndHashResponseMessage::createFromStdclass($decoded);
		
		return $ret;
	}
	
}

