<?php

/**
 * Copyright (c) 2018 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 * 
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

class SourceConfig {
	
	/**
	 * @var string
	 */
	public $Engine = "";
	
	/**
	 * @var string
	 */
	public $Description = "";
	
	/**
	 * @var string
	 */
	public $OwnerDevice = "";
	
	/**
	 * @var int
	 */
	public $CreateTime = 0;
	
	/**
	 * @var int
	 */
	public $ModifyTime = 0;
	
	/**
	 * @var string[]
	 */
	public $PreExec = [];
	
	/**
	 * @var string[]
	 */
	public $PostExec = [];
	
	/**
	 * @var string[] An array with string keys.
	 */
	public $EngineProps = [];
	
	/**
	 * @var \Comet\RetentionPolicy[] An array with string keys.
	 */
	public $OverrideDestinationRetention = [];
	
	/**
	 * @var \Comet\SourceStatistics
	 */
	public $Statistics = null;
	
	/**
	 * Preserve unknown properties when dealing with future server versions.
	 *
	 * @see SourceConfig::RemoveUnknownProperties() Remove all unknown properties
	 * @var array
	 */
	private $__unknown_properties = [];
	
	/**
	 * Replace the content of this SourceConfig object from a PHP array.
	 * The data could be supplied from an API call after json_decode(..., true); or generated manually.
	 *
	 * @param array $decodedJsonObject Object data as PHP array
	 * @return void
	 */
	protected function inflateFrom(array $decodedJsonObject)
	{
		$this->Engine = (string)($decodedJsonObject['Engine']);
		
		$this->Description = (string)($decodedJsonObject['Description']);
		
		$this->OwnerDevice = (string)($decodedJsonObject['OwnerDevice']);
		
		$this->CreateTime = (int)($decodedJsonObject['CreateTime']);
		
		$this->ModifyTime = (int)($decodedJsonObject['ModifyTime']);
		
		$val_2 = [];
		for($i_2 = 0; $i_2 < count($decodedJsonObject['PreExec']); ++$i_2) {
			$val_2[] = (string)($decodedJsonObject['PreExec'][$i_2]);
		}
		$this->PreExec = $val_2;
		
		$val_2 = [];
		for($i_2 = 0; $i_2 < count($decodedJsonObject['PostExec']); ++$i_2) {
			$val_2[] = (string)($decodedJsonObject['PostExec'][$i_2]);
		}
		$this->PostExec = $val_2;
		
		$val_2 = [];
		foreach($decodedJsonObject['EngineProps'] as $k_2 => $v_2) {
			$phpk_2 = (string)($k_2);
			$phpv_2 = (string)($v_2);
			$val_2[$phpk_2] = $phpv_2;
		}
		$this->EngineProps = $val_2;
		
		if (array_key_exists('OverrideDestinationRetention', $decodedJsonObject)) {
			$val_2 = [];
			foreach($decodedJsonObject['OverrideDestinationRetention'] as $k_2 => $v_2) {
				$phpk_2 = (string)($k_2);
				$phpv_2 = \Comet\RetentionPolicy::createFrom(isset($v_2) ? $v_2 : []);
				$val_2[$phpk_2] = $phpv_2;
			}
			$this->OverrideDestinationRetention = $val_2;
			
		}
		if (array_key_exists('Statistics', $decodedJsonObject)) {
			$this->Statistics = \Comet\SourceStatistics::createFrom(isset($decodedJsonObject['Statistics']) ? $decodedJsonObject['Statistics'] : []);
			
		}
		foreach($decodedJsonObject as $k => $v) {
			switch($k) {
			case 'Engine':
			case 'Description':
			case 'OwnerDevice':
			case 'CreateTime':
			case 'ModifyTime':
			case 'PreExec':
			case 'PostExec':
			case 'EngineProps':
			case 'OverrideDestinationRetention':
			case 'Statistics':
				break;
			default:
				$this->__unknown_properties[$k] = $v;
			}
		}
	}
	
	/**
	 * Coerce a plain PHP array into a new strongly-typed SourceConfig object.
	 *
	 * @param array $decodedJsonObject Object data as PHP array
	 * @return SourceConfig
	 */
	public static function createFrom(array $decodedJsonObject)
	{
		$retn = new SourceConfig();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}
	
	/**
	 * Coerce a JSON string into a new strongly-typed SourceConfig object.
	 *
	 * @param string $JsonString Object data as JSON string
	 * @return SourceConfig
	 */
	public static function createFromJSON($JsonString)
	{
		$decodedJsonObject = json_decode($JsonString, true);
		if (\json_last_error() != \JSON_ERROR_NONE) {
			throw new \Exception("JSON decode failed: " . \json_last_error_msg());
		}
		$retn = new SourceConfig();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}
	
	/**
	 * Convert this SourceConfig object into a plain PHP array.
	 *
	 * @param bool $forJSONEncode Set true to use stdClass() for empty objects instead of just [], in order to
	 *                             accurately roundtrip empty objects/arrays through json_encode() compatibility
	 * @return array
	 */
	public function toArray($forJSONEncode=false)
	{
		$ret = [];
		$ret["Engine"] = $this->Engine;
		$ret["Description"] = $this->Description;
		$ret["OwnerDevice"] = $this->OwnerDevice;
		$ret["CreateTime"] = $this->CreateTime;
		$ret["ModifyTime"] = $this->ModifyTime;
		{
			$c0 = [];
			for($i0 = 0; $i0 < count($this->PreExec); ++$i0) {
				$val0 = $this->PreExec[$i0];
				$c0[] = $val0;
			}
			$ret["PreExec"] = $c0;
		}
		{
			$c0 = [];
			for($i0 = 0; $i0 < count($this->PostExec); ++$i0) {
				$val0 = $this->PostExec[$i0];
				$c0[] = $val0;
			}
			$ret["PostExec"] = $c0;
		}
		{
			$c0 = [];
			foreach($this->EngineProps as $k0 => $v0) {
				$ko_0 = $k0;
				$vo_0 = $v0;
				$c0[ $ko_0 ] = $vo_0;
			}
			if ($for_json_encode && count($c0) == 0) {
				$ret["EngineProps"] = (object)[];
			} else {
				$ret["EngineProps"] = $c0;
			}
		}
		{
			$c0 = [];
			foreach($this->OverrideDestinationRetention as $k0 => $v0) {
				$ko_0 = $k0;
				if ( $v0 === null ) {
					$vo_0 = $for_json_encode ? (object)[] : [];
				} else {
					$vo_0 = $v0->toArray($for_json_encode);
				}
				$c0[ $ko_0 ] = $vo_0;
			}
			if ($for_json_encode && count($c0) == 0) {
				$ret["OverrideDestinationRetention"] = (object)[];
			} else {
				$ret["OverrideDestinationRetention"] = $c0;
			}
		}
		if ( $this->Statistics === null ) {
			$ret["Statistics"] = $for_json_encode ? (object)[] : [];
		} else {
			$ret["Statistics"] = $this->Statistics->toArray($for_json_encode);
		}
		
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
		if ($this->Statistics !== null) {
			$this->Statistics->RemoveUnknownProperties();
		}
	}
	
}

