<?php

/**
 * Copyright (c) 2018 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 * 
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

/** 
 * Comet Server AdminRequestStorageVault API 
 * Request a new Storage Vault on behalf of a user
 * This action does not respect the "Prevent creating new Storage Vaults (via Request)" policy setting. New Storage Vaults can be requested regardless of the policy setting.
 * 
 * You must supply administrator authentication credentials to use this API.
 * This API requires the Auth Role to be enabled.
 */
class AdminRequestStorageVaultRequest implements \Comet\NetworkRequest {
	
	/**
	 * The user to recieve the new Storage Vault
	 *
	 * @var string
	 */
	protected $TargetUser = null;
	
	/**
	 * ID for the Requestable destination
	 *
	 * @var string
	 */
	protected $StorageProvider = null;
	
	/**
	 * The external URL for this server. Used to resolve conflicts (optional)
	 *
	 * @var string|null
	 */
	protected $SelfAddress = null;
	
	/**
	 * Construct a new AdminRequestStorageVaultRequest instance.
	 *
	 * @param string $TargetUser The user to recieve the new Storage Vault
	 * @param string $StorageProvider ID for the Requestable destination
	 * @param string $SelfAddress The external URL for this server. Used to resolve conflicts (optional)
	 */
	public function __construct($TargetUser, $StorageProvider, $SelfAddress = null)
	{
		$this->TargetUser = $TargetUser;
		$this->StorageProvider = $StorageProvider;
		$this->SelfAddress = $SelfAddress;
	}
	
	/**
	 * Get the URL where this POST request should be submitted to.
	 *
	 * @return string
	 */
	public function Endpoint()
	{
		return '/api/v1/admin/request-storage-vault';
	}
	
	/**
	 * Get the POST parameters for this request.
	 *
	 * @return string[]
	 */
	public function Parameters()
	{
		$ret = [];
		$ret["TargetUser"] = (string)($this->TargetUser);
		$ret["StorageProvider"] = (string)($this->StorageProvider);
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

