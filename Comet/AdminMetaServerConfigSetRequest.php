<?php

namespace Comet;

/** 
 * Comet Server AdminMetaServerConfigSet API 
 * Set server configuration
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
	 * @return null Never returns 
	 * @throws \Exception
	 */
	public static function ProcessResponse($responseCode, $body)
	{
		// Require expected HTTP 200 response
		if ($responseCode !== 200) {
			throw new \Exception("Unexpected HTTP " . intval($responseCode) . " response");
		}
		
		// Decode JSON
		$decoded = \json_decode($body, true);
		if (\json_last_error() != \JSON_ERROR_NONE) {
			throw new \Exception("JSON decode failed: " . \json_last_error_msg());
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

