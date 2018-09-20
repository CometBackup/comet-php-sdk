<?php

/**
 * Copyright (c) 2018 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 * 
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

/** 
 * Comet Server AdminMetaReadLogs API 
 * Get log file content
 * On non-Windows platforms, log content uses LF line endings. On Windows, Comet changed from LF to CRLF line endings in 18.3.2.
 * This API does not automatically convert line endings; around the 18.3.2 timeframe, log content may even contain mixed line-endings.
 * 
 * You must supply administrator authentication credentials to use this API.
 */
class AdminMetaReadLogsRequest implements \Comet\NetworkRequest {
	
	/**
	 * A log day, selected from the options returned by the Get Log Files API
	 *
	 * @var int
	 */
	protected $Log = null;
	
	/**
	 * Construct a new AdminMetaReadLogsRequest instance.
	 *
	 * @param int $Log A log day, selected from the options returned by the Get Log Files API
	 */
	public function __construct($Log)
	{
		$this->Log = $Log;
	}
	
	/**
	 * Get the URL where this POST request should be submitted to.
	 *
	 * @return string
	 */
	public function Endpoint()
	{
		return '/api/v1/admin/meta/read-logs';
	}
	
	/**
	 * Get the POST parameters for this request.
	 *
	 * @return string[]
	 */
	public function Parameters()
	{
		$ret = [];
		$ret["Log"] = (string)($this->Log);
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

