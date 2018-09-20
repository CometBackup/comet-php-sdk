<?php

/**
 * Copyright (c) 2018 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 * 
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

class BackupJobAdvancedOptions {
	
	/**
	 * @var boolean
	 */
	public $SkipAlreadyRunning = false;
	
	/**
	 * @var int
	 */
	public $StopAfter = 0;
	
	/**
	 * @var int
	 */
	public $LimitVaultSpeedBps = 0;
	
	/**
	 * @var boolean
	 */
	public $ReduceDiskConcurrency = false;
	
	/**
	 * Preserve unknown properties when dealing with future server versions.
	 *
	 * @see BackupJobAdvancedOptions::RemoveUnknownProperties() Remove all unknown properties
	 * @var array
	 */
	private $__unknown_properties = [];
	
	/**
	 * Replace the content of this BackupJobAdvancedOptions object from a PHP array.
	 * The data could be supplied from an API call after json_decode(..., true); or generated manually.
	 *
	 * @param array $decodedJsonObject Object data as PHP array
	 * @return void
	 */
	protected function inflateFrom(array $decodedJsonObject)
	{
		$this->SkipAlreadyRunning = (bool)($decodedJsonObject['SkipAlreadyRunning']);
		
		$this->StopAfter = (int)($decodedJsonObject['StopAfter']);
		
		$this->LimitVaultSpeedBps = (int)($decodedJsonObject['LimitVaultSpeedBps']);
		
		$this->ReduceDiskConcurrency = (bool)($decodedJsonObject['ReduceDiskConcurrency']);
		
		foreach($decodedJsonObject as $k => $v) {
			switch($k) {
			case 'SkipAlreadyRunning':
			case 'StopAfter':
			case 'LimitVaultSpeedBps':
			case 'ReduceDiskConcurrency':
				break;
			default:
				$this->__unknown_properties[$k] = $v;
			}
		}
	}
	
	/**
	 * Coerce a plain PHP array into a new strongly-typed BackupJobAdvancedOptions object.
	 *
	 * @param array $decodedJsonObject Object data as PHP array
	 * @return BackupJobAdvancedOptions
	 */
	public static function createFrom(array $decodedJsonObject)
	{
		$retn = new BackupJobAdvancedOptions();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}
	
	/**
	 * Coerce a JSON string into a new strongly-typed BackupJobAdvancedOptions object.
	 *
	 * @param string $JsonString Object data as JSON string
	 * @return BackupJobAdvancedOptions
	 */
	public static function createFromJSON($JsonString)
	{
		$decodedJsonObject = json_decode($JsonString, true);
		if (\json_last_error() != \JSON_ERROR_NONE) {
			throw new \Exception("JSON decode failed: " . \json_last_error_msg());
		}
		$retn = new BackupJobAdvancedOptions();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}
	
	/**
	 * Convert this BackupJobAdvancedOptions object into a plain PHP array.
	 *
	 * @param bool $forJSONEncode Set true to use stdClass() for empty objects instead of just [], in order to
	 *                             accurately roundtrip empty objects/arrays through json_encode() compatibility
	 * @return array
	 */
	public function toArray($forJSONEncode=false)
	{
		$ret = [];
		$ret["SkipAlreadyRunning"] = $this->SkipAlreadyRunning;
		$ret["StopAfter"] = $this->StopAfter;
		$ret["LimitVaultSpeedBps"] = $this->LimitVaultSpeedBps;
		$ret["ReduceDiskConcurrency"] = $this->ReduceDiskConcurrency;
		
		// Reinstate unknown properties from future server versions
		foreach($this->__unknown_properties as $k => $v) {
			if ($forJSONEncode && is_array($v) && count($v) == 0) {
				$ret[$k] = (object)[];
			} else {
				$ret[$k] = $v;
			}
		}
		
		// Special handling for empty objects
		if ($forJSONEncode && count($ret) === 0) {
			return new stdClass();
		}
		return $ret;
	}
	
	/**
	 * Convert this object to a JSON string.
	 * The result is suitable to submit to the Comet Server API.
	 *
	 * @return string
	 */
	public function toJSON()
	{
		return json_encode( self::toArray(true) );
	}
	
	/**
	 * Erase any preserved object properties that are unknown to this Comet Server SDK.
	 *
	 * @return void
	 */
	public function RemoveUnknownProperties()
	{
		$this->__unknown_properties = [];
	}
	
}

