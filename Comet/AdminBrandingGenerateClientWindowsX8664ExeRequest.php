<?php

/**
 * Copyright (c) 2018-2025 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 *
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

/**
 * Comet Server AdminBrandingGenerateClientWindowsX8664Exe API
 * Download software update (Windows x86_64 exe)
 * The exe endpoints are not recommended for end-users, as they may not be able to provide a codesigned installer if no custom codesigning certificate is present.
 *
 * This API requires administrator authentication credentials, unless the server is configured to allow unauthenticated software downloads.
 * This API requires the Software Build Role to be enabled.
 * This API requires the Auth Role to be enabled.
 */
class AdminBrandingGenerateClientWindowsX8664ExeRequest implements \Comet\NetworkRequest {

	/**
	 * The external URL of this server, used to resolve conflicts (optional)
	 *
	 * @var string|null
	 */
	protected $SelfAddress = null;

	/**
	 * Construct a new AdminBrandingGenerateClientWindowsX8664ExeRequest instance.
	 *
	 * @param string $SelfAddress The external URL of this server, used to resolve conflicts (optional)
	 */
	public function __construct(string $SelfAddress = null)
	{
		$this->SelfAddress = $SelfAddress;
	}

	/**
	 * Get the URL where this POST request should be submitted to.
	 *
	 * @return string
	 */
	public function Endpoint(): string
	{
		return '/api/v1/admin/branding/generate-client/windows-x86_64-exe';
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
		if ($this->SelfAddress !== null) {
			$ret["SelfAddress"] = (string)($this->SelfAddress);
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

