<?php

/**
 * Copyright (c) 2018 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 * 
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

/** 
 * Comet Server AdminMetaResourceGet API 
 * Get a resource file
 * Resources are used to upload files within the server configuration.
 * 
 * You must supply administrator authentication credentials to use this API.
 */
class AdminMetaResourceGetRequest implements \Comet\NetworkRequest {
	
	/**
	 * The resource identifier
	 *
	 * @var string
	 */
	protected $Hash = null;
	
	/**
	 * Construct a new AdminMetaResourceGetRequest instance.
	 *
	 * @param string $Hash The resource identifier
	 */
	public function __construct($Hash)
	{
		$this->Hash = $Hash;
	}
	
	/**
	 * Get the URL where this POST request should be submitted to.
	 *
	 * @return string
	 */
	public function Endpoint()
	{
		return '/api/v1/admin/meta/resource/get';
	}
	
	/**
	 * Get the POST parameters for this request.
	 *
	 * @return string[]
	 */
	public function Parameters()
	{
		$ret = [];
		$ret["Hash"] = (string)($this->Hash);
		return $ret;
	}
	
	/**
	 * Decode types used in a response to this request.
	 * Use any network library to make the request.
	 *
	 * @param int $responseCode HTTP response code
	 * @param string $body HTTP response body
	 * @return string 
	 * @throws \Exception
	 */
	public static function ProcessResponse($responseCode, $body)
	{
		// Require expected HTTP 200 response
		if ($responseCode !== 200) {
			throw new \Exception("Unexpected HTTP " . intval($responseCode) . " response");
		}
		
		return $body;
	}
	
}

