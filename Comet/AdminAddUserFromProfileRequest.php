<?php

/**
 * Copyright (c) 2018 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 * 
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

/** 
 * Comet Server AdminAddUserFromProfile API 
 * Add a new user account (with all information)
 * This allows you to create a new account and set all its properties at once (e.g. during account replication). Developers creating a signup form may find it simpler to use the AdminAddUser and AdminGetUserProfile / AdminSetUserProfile APIs separately.
 * 
 * You must supply administrator authentication credentials to use this API.
 * This API requires the Auth Role to be enabled.
 */
class AdminAddUserFromProfileRequest implements \Comet\NetworkRequest {
	
	/**
	 * New account username
	 *
	 * @var string
	 */
	protected $TargetUser = null;
	
	/**
	 * New account profile
	 *
	 * @var \Comet\UserProfileConfig
	 */
	protected $ProfileData = null;
	
	/**
	 * Construct a new AdminAddUserFromProfileRequest instance.
	 *
	 * @param string $TargetUser New account username
	 * @param \Comet\UserProfileConfig $ProfileData New account profile
	 */
	public function __construct($TargetUser, UserProfileConfig $ProfileData)
	{
		$this->TargetUser = $TargetUser;
		$this->ProfileData = $ProfileData;
	}
	
	/**
	 * Get the URL where this POST request should be submitted to.
	 *
	 * @return string
	 */
	public function Endpoint()
	{
		return '/api/v1/admin/add-user-from-profile';
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
		$ret["ProfileData"] = $this->ProfileData->toJSON();
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
		
		// Parse as CometAPIResponseMessage
		$ret = \Comet\APIResponseMessage::createFromStdclass($decoded);
		
		return $ret;
	}
	
}

