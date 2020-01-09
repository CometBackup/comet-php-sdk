<?php

/**
 * Copyright (c) 2018-2020 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 * 
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

/** 
 * Comet Server AdminDispatcherRequestStoredObjects API 
 * Request a list of stored objects inside an existing backup job
 * The remote device must have given consent for an MSP to browse their files.
 * 
 * You must supply administrator authentication credentials to use this API.
 * This API requires the Auth Role to be enabled.
 */
class AdminDispatcherRequestStoredObjectsRequest implements \Comet\NetworkRequest {
	
	/**
	 * The live connection GUID
	 *
	 * @var string
	 */
	protected $TargetID = null;
	
	/**
	 * The Storage Vault ID
	 *
	 * @var string
	 */
	protected $Destination = null;
	
	/**
	 * The selected backup job snapshot
	 *
	 * @var string
	 */
	protected $SnapshotID = null;
	
	/**
	 * Browse objects inside subdirectory of backup snapshot (optional)
	 *
	 * @var string|null
	 */
	protected $TreeID = null;
	
	/**
	 * Construct a new AdminDispatcherRequestStoredObjectsRequest instance.
	 *
	 * @param string $TargetID The live connection GUID
	 * @param string $Destination The Storage Vault ID
	 * @param string $SnapshotID The selected backup job snapshot
	 * @param string $TreeID Browse objects inside subdirectory of backup snapshot (optional)
	 */
	public function __construct($TargetID, $Destination, $SnapshotID, $TreeID = null)
	{
		$this->TargetID = $TargetID;
		$this->Destination = $Destination;
		$this->SnapshotID = $SnapshotID;
		$this->TreeID = $TreeID;
	}
	
	/**
	 * Get the URL where this POST request should be submitted to.
	 *
	 * @return string
	 */
	public function Endpoint()
	{
		return '/api/v1/admin/dispatcher/request-stored-objects';
	}
	
	/**
	 * Get the POST parameters for this request.
	 *
	 * @return string[]
	 */
	public function Parameters()
	{
		$ret = [];
		$ret["TargetID"] = (string)($this->TargetID);
		$ret["Destination"] = (string)($this->Destination);
		$ret["SnapshotID"] = (string)($this->SnapshotID);
		if ($this->TreeID !== null) {
			$ret["TreeID"] = (string)($this->TreeID);
		}
		return $ret;
	}
	
	/**
	 * Decode types used in a response to this request.
	 * Use any network library to make the request.
	 *
	 * @param int $responseCode HTTP response code
	 * @param string $body HTTP response body
	 * @return \Comet\DispatcherStoredObjectsResponse 
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
		
		// Parse as DispatcherStoredObjectsResponse
		if (is_array($decoded) && count($decoded) === 0) {
		// Work around edge case in json_decode--json_encode stdClass conversion
			$ret = \Comet\DispatcherStoredObjectsResponse::createFromStdclass(new \stdClass());
		} else {
			$ret = \Comet\DispatcherStoredObjectsResponse::createFromStdclass($decoded);
		}
		
		return $ret;
	}
	
}

