<?php

namespace Comet;

/** 
 * Comet Server AdminMetaRestartService API 
 * Restart server
 * The Comet Server process will exit. The service manager should restart the server automatically.
 * 
 * You must supply administrator authentication credentials to use this API.
 * Access to this API may be prevented on a per-administrator basis.
 */
class AdminMetaRestartServiceRequest implements \Comet\NetworkRequest {
	
	/**
	 * Construct a new AdminMetaRestartServiceRequest instance.
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
		return '/api/v1/admin/meta/restart-service';
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
	 * @return null Never returns 
	 * @throws Exception
	 */
	public static function ProcessResponse($responseCode, $body)
	{
		// Require expected HTTP 200 response
		if ($responseCode !== 200) {
			throw new Exception("Unexpected HTTP " . intval($responseCode) . " response");
		}
		
		// Decode JSON
		$decoded = \json_decode($body, true);
		if (\json_last_error() != \JSON_ERROR_NONE) {
			throw new Exception("JSON decode failed: " . \json_last_error_msg());
		}
		
		// Try to parse as error format
		if (array_key_exists('Status', $decoded) && array_key_exists('Message', $decoded)) {
			$carm = \Comet\APIResponseMessage::createFrom($decoded);
			if ($carm->Status !== 0 || $carm->Message != "") {
				throw new \Exception("Error " . $carm->Status . ": " . $carm->Message);
			}
		}
		
		// Parse as @unreached
		$ret = \Comet\@unreached::createFrom(isset($decoded) ? $decoded : []);
		
		return $ret;
	}
	
}

