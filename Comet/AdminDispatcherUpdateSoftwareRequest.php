<?php

/**
 * Copyright (c) 2018 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 * 
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

/** 
 * Comet Server AdminDispatcherUpdateSoftware API 
 * Instruct a live connected device to download a software update
 * 
 * You must supply administrator authentication credentials to use this API.
 * This API requires the Auth Role to be enabled.
 * This API requires the Software Build Role to be enabled.
 */
class AdminDispatcherUpdateSoftwareRequest implements \Comet\NetworkRequest {
	
	/**
	 * The live connection GUID
	 *
	 * @var string
	 */
	protected $TargetID = null;
	
	/**
	 * Construct a new AdminDispatcherUpdateSoftwareRequest instance.
	 *
	 * @param string $TargetID The live connection GUID
	 */
	public function __construct($TargetID)
	{
		$this->TargetID = $TargetID;
	}
	
	/**
	 * Get the URL where this POST request should be submitted to.
	 *
	 * @return string
	 */
	public function Endpoint()
	{
		return '/api/v1/admin/dispatcher/update-software';
	}
	
	/**
	 * Get the POST parameters for this request.
	 *
	 * @return string[]
	 */
	public function Parameters()
	{
		$ret = [];
		$ret["TargetID"] = (string)($this->TargetID);
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

