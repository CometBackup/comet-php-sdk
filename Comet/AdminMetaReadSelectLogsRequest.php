<?php

/**
 * Copyright (c) 2018-2024 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 *
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

/**
 * Comet Server AdminMetaReadSelectLogs API
 * Get logs file content
 * On non-Windows platforms, log content uses LF line endings. On Windows, Comet changed from LF to CRLF line endings in 18.3.2.
 * This API does not automatically convert line endings; around the 18.3.2 timeframe, log content may even contain mixed line-endings.
 *
 * You must supply administrator authentication credentials to use this API.
 * This API is only available for top-level administrator accounts, not for Tenant administrator accounts.
 */
class AdminMetaReadSelectLogsRequest implements \Comet\NetworkRequest {

	/**
	 * An array of log days, selected from the options returned by the Get Log Files API
	 *
	 * @var int[]
	 */
	protected $Logs = null;

	/**
	 * Construct a new AdminMetaReadSelectLogsRequest instance.
	 *
	 * @param int[] $Logs An array of log days, selected from the options returned by the Get Log Files API
	 */
	public function __construct(array $Logs)
	{
		$this->Logs = $Logs;
	}

	/**
	 * Get the URL where this POST request should be submitted to.
	 *
	 * @return string
	 */
	public function Endpoint(): string
	{
		return '/api/v1/admin/meta/read-select-logs';
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
		{
			$c0 = [];
			for($i0 = 0; $i0 < count($this->Logs); ++$i0) {
				$val0 = $this->Logs[$i0];

				$c0[] = $val0;
			}
			$ret["Logs"] = json_encode($c0);
		}

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
	public static function ProcessResponse(int $responseCode, string $body): string
	{
		// Require expected HTTP 200 response
		if ($responseCode !== 200) {
			throw new \Exception("Unexpected HTTP " . intval($responseCode) . " response", $responseCode);
		}

		return $body;
	}

}

