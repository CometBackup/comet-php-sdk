<?php

/**
 * Copyright (c) 2018 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 * 
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

/** 
 * Comet Server AdminBrandingGenerateClientWindowsAnycpuZip API 
 * Download software (Windows AnyCPU zip)
 * The zip endpoints are recommended for end-users, as they may be able to provide a codesigned installer even when no custom codesigning certificate is present.
 * 
 * This API requires administrator authentication credentials, unless the server is configured to allow unauthenticated software downloads.
 * This API requires the Software Build Role to be enabled.
 * This API requires the Auth Role to be enabled.
 */
class AdminBrandingGenerateClientWindowsAnycpuZipRequest implements \Comet\NetworkRequest {
	
	/**
	 * The external URL of this server, used to resolve conflicts (optional)
	 *
	 * @var string|null
	 */
	protected $SelfAddress = null;
	
	/**
	 * Construct a new AdminBrandingGenerateClientWindowsAnycpuZipRequest instance.
	 *
	 * @param string $SelfAddress The external URL of this server, used to resolve conflicts (optional)
	 */
	public function __construct($SelfAddress = null)
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
		return '/api/v1/admin/branding/generate-client/windows-anycpu-zip';
	}
	
	/**
	 * Get the POST parameters for this request.
	 *
	 * @return string[]
	 */
	public function Parameters()
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
	public static function ProcessResponse($responseCode, $body)
	{
		// Require expected HTTP 200 response
		if ($responseCode !== 200) {
			throw new \Exception("Unexpected HTTP " . intval($responseCode) . " response");
		}
		
		return $body;
	}
	
}

