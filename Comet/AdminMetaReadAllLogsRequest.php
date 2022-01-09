<?php

/**
 * Copyright (c) 2018-2022 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 *
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

/**
 * Comet Server AdminMetaReadAllLogs API
 * Get a ZIP file of all of the server's log files
 * On non-Windows platforms, log content uses LF line endings. On Windows, Comet changed from LF to CRLF line endings in 18.3.2.
 * This API does not automatically convert line endings; around the 18.3.2 timeframe, log content may even contain mixed line-endings.
 *
 * You must supply administrator authentication credentials to use this API.
 * This API is only available for administrator accounts in the top-level Organization, not in any other Organization.
 */
class AdminMetaReadAllLogsRequest implements \Comet\NetworkRequest {

	/**
	 * Construct a new AdminMetaReadAllLogsRequest instance.
	 *
	 */
	public function __construct()
	{
	}

	/**
	 * Get the URL where this POST request should be submitted to.
	 *
	 * @return string
	 */
	public function Endpoint()
	{
		return '/api/v1/admin/meta/read-all-logs';
	}

	public function Method()
	{
		return 'POST';
	}

	public function ContentType()
	{
		return 'application/x-www-form-urlencoded';
	}

	/**
	 * Get the POST parameters for this request.
	 *
	 * @return string[]
	 */
	public function Parameters()
	{
		$ret = [];
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

