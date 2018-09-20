<?php

namespace Comet;

/** 
 * Comet Server AdminGetJobProperties API 
 * Get properties of a single job
 * 
 * You must supply administrator authentication credentials to use this API.
 * This API requires the Auth Role to be enabled.
 */
class AdminGetJobPropertiesRequest implements \Comet\NetworkRequest {
	
	/**
	 * Selected job ID
	 *
	 * @var string
	 */
	protected $JobID = null;
	
	/**
	 * Construct a new AdminGetJobPropertiesRequest instance.
	 *
	 * @param string $JobID Selected job ID
	 */
	public function __construct($JobID)
	{
		$this->JobID = $JobID;
	}
	
	/**
	 * Get the URL where this POST request should be submitted to.
	 *
	 * @return string
	 */
	public function Endpoint()
	{
		return '/api/v1/admin/get-job-properties';
	}
	
	/**
	 * Get the POST parameters for this request.
	 *
	 * @return string[]
	 */
	public function Parameters()
	{
		$ret = [];
		$ret["JobID"] = (string)($this->JobID);
		return $ret;
	}
	
	/**
	 * Decode types used in a response to this request.
	 * Use any network library to make the request.
	 *
	 * @param int $responseCode HTTP response code
	 * @param string $body HTTP response body
	 * @return \Comet\BackupJobDetail 
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
		$isCARMDerivedType = (array_key_exists('Status', $decoded) && array_key_exists('Message', $decoded));
		if ($isCARMDerivedType) {
			$carm = \Comet\APIResponseMessage::createFrom($decoded);
			if ($carm->Status !== 200) {
				throw new \Exception("Error " . $carm->Status . ": " . $carm->Message);
			}
		}
		
		// Parse as BackupJobDetail
		$ret = \Comet\BackupJobDetail::createFrom(isset($decoded) ? $decoded : []);
		
		return $ret;
	}
	
}

