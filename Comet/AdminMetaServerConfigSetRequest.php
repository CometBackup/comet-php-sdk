<?php

/**
 * Copyright (c) 2018 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 * 
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

/** 
 * Comet Server AdminMetaServerConfigSet API 
 * Set server configuration
 * The Comet Server process will exit. The service manager should restart the server automatically.
 * 
 * Prior to 18.9.2, this API terminated the server immediately without returning a response. In 18.9.2 and later, it returns a successful response before shutting down.
 * 
 * You must supply administrator authentication credentials to use this API.
 * Access to this API may be prevented on a per-administrator basis.
 */
class AdminMetaServerConfigSetRequest implements \Comet\NetworkRequest {
	
	/**
	 * Updated configuration content
	 *
	 * @var \Comet\ServerConfigOptions
	 */
	protected $Config = null;
	
	/**
	 * Construct a new AdminMetaServerConfigSetRequest instance.
	 *
	 * @param \Comet\ServerConfigOptions $Config Updated configuration content
	 */
	public function __construct(ServerConfigOptions $Config)
	{
		$this->Config = $Config;
	}
	
	/**
	 * Get the URL where this POST request should be submitted to.
	 *
	 * @return string
	 */
	public function Endpoint()
	{
		return '/api/v1/admin/meta/server-config/set';
	}
	
	/**
	 * Get the POST parameters for this request.
	 *
	 * @return string[]
	 */
	public function Parameters()
	{
		$ret = [];
		$ret["Config"] = $this->Config->toJSON();
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

