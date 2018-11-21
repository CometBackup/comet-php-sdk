<?php

/**
 * Copyright (c) 2018 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 * 
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

/** 
 * Comet Server AdminDispatcherRunRestore API 
 * Instruct a live connected device to perform a local restore
 * This command is understood by Comet Backup 17.9.3 and newer.
 * 
 * You must supply administrator authentication credentials to use this API.
 * This API requires the Auth Role to be enabled.
 */
class AdminDispatcherRunRestoreRequest implements \Comet\NetworkRequest {
	
	/**
	 * The live connection GUID
	 *
	 * @var string
	 */
	protected $TargetID = null;
	
	/**
	 * The local path to restore to
	 *
	 * @var string
	 */
	protected $Path = null;
	
	/**
	 * The Protected Item ID
	 *
	 * @var string
	 */
	protected $Source = null;
	
	/**
	 * The Storage Vault ID
	 *
	 * @var string
	 */
	protected $Destination = null;
	
	/**
	 * If present, restore a specific snapshot. Otherwise, restore the latest snapshot for the selected Protected Item + Storage Vault pair (optional)
	 *
	 * @var string|null
	 */
	protected $Snapshot = null;
	
	/**
	 * Construct a new AdminDispatcherRunRestoreRequest instance.
	 *
	 * @param string $TargetID The live connection GUID
	 * @param string $Path The local path to restore to
	 * @param string $Source The Protected Item ID
	 * @param string $Destination The Storage Vault ID
	 * @param string $Snapshot If present, restore a specific snapshot. Otherwise, restore the latest snapshot for the selected Protected Item + Storage Vault pair (optional)
	 */
	public function __construct($TargetID, $Path, $Source, $Destination, $Snapshot = null)
	{
		$this->TargetID = $TargetID;
		$this->Path = $Path;
		$this->Source = $Source;
		$this->Destination = $Destination;
		$this->Snapshot = $Snapshot;
	}
	
	/**
	 * Get the URL where this POST request should be submitted to.
	 *
	 * @return string
	 */
	public function Endpoint()
	{
		return '/api/v1/admin/dispatcher/run-restore';
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
		$ret["Path"] = (string)($this->Path);
		$ret["Source"] = (string)($this->Source);
		$ret["Destination"] = (string)($this->Destination);
		if ($this->Snapshot !== null) {
			$ret["Snapshot"] = (string)($this->Snapshot);
		}
		return $ret;
	}
	
	/**
	 * Decode types used in a response to this request.
	 * Use any network library to make the request.
	 *
	 * @param int $responseCode HTTP response code
	 * @param string $body HTTP response body
	 * @return \Comet\APIResponseMessage 
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
		
		// Parse as CometAPIResponseMessage
		$ret = \Comet\APIResponseMessage::createFromStdclass($decoded);
		
		return $ret;
	}
	
}

