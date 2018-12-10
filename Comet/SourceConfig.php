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
	 * Replace the content of this SourceConfig object from a PHP \stdClass.
	 * The data could be supplied from an API call after json_decode(...); or generated manually.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return void
	 */
	protected function inflateFrom(\stdClass $sc)
	{
		if (property_exists($sc, 'Engine')) {
			$this->Engine = (string)($sc->Engine);
		}
		if (property_exists($sc, 'Description')) {
			$this->Description = (string)($sc->Description);
		}
		if (property_exists($sc, 'OwnerDevice')) {
			$this->OwnerDevice = (string)($sc->OwnerDevice);
		}
		if (property_exists($sc, 'CreateTime')) {
			$this->CreateTime = (int)($sc->CreateTime);
		}
		if (property_exists($sc, 'ModifyTime')) {
			$this->ModifyTime = (int)($sc->ModifyTime);
		}
		if (property_exists($sc, 'PreExec')) {
			$val_2 = [];
			for($i_2 = 0; $i_2 < count($sc->PreExec); ++$i_2) {
				$val_2[] = (string)($sc->PreExec[$i_2]);
			}
			$this->PreExec = $val_2;
		}
		if (property_exists($sc, 'PostExec')) {
			$val_2 = [];
			for($i_2 = 0; $i_2 < count($sc->PostExec); ++$i_2) {
				$val_2[] = (string)($sc->PostExec[$i_2]);
			}
			$this->PostExec = $val_2;
		}
		if (property_exists($sc, 'EngineProps')) {
			$val_2 = [];
			foreach($sc->EngineProps as $k_2 => $v_2) {
				$phpk_2 = (string)($k_2);
				$phpv_2 = (string)($v_2);
				$val_2[$phpk_2] = $phpv_2;
			}
			$this->EngineProps = $val_2;
		}
		if (property_exists($sc, 'OverrideDestinationRetention')) {
			$val_2 = [];
			foreach($sc->OverrideDestinationRetention as $k_2 => $v_2) {
				$phpk_2 = (string)($k_2);
				$phpv_2 = \Comet\RetentionPolicy::createFromStdclass($v_2);
				$val_2[$phpk_2] = $phpv_2;
			}
			$this->OverrideDestinationRetention = $val_2;
		}
		if (property_exists($sc, 'Statistics')) {
			$this->Statistics = \Comet\SourceStatistics::createFromStdclass($sc->Statistics);
		}
		foreach(get_object_vars($sc) as $k => $v) {
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
	 * Coerce a stdClass into a new strongly-typed SourceConfig object.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return SourceConfig
	 */
	public static function createFromStdclass(\stdClass $sc)
	{
		$retn = new SourceConfig();
		$retn->inflateFrom($sc);
		return $retn;
	}
	
	/**
	 * Coerce a plain PHP array into a new strongly-typed SourceConfig object.
	 * Because the Comet Server requires strict distinction between empty objects ({}) and arrays ([]),
	 * the result of this method may not be safe to re-submit to the Comet Server.
	 *
	 * @param array $arr Object data as PHP array
	 * @return SourceConfig
	 */
	public static function createFromArray(array $arr)
	{
		$stdClass = json_decode(json_encode($arr));
		return self::createFromStdclass($stdClass);
	}
	
	/**
	 * Coerce a plain PHP array into a new strongly-typed SourceConfig object.
	 * Because the Comet Server requires strict distinction between empty objects ({}) and arrays ([]),
	 * the result of this method may not be safe to re-submit to the Comet Server.
	 *
	 * @deprecated 3.0.0 Unsafe for round-trip server traversal. You should either 
	 *             (A) acknowledge this and continue by switching to createFromArray, or
	 *             (b) switch to the roundtrip-safe createFromStdclass alternative.
	 * @param array $arr Object data as PHP array
	 * @return SourceConfig
	 */
	public static function createFrom(array $arr)
	{
		return self::createFromArray($arr);
	}
	
	/**
	 * Coerce a JSON string into a new strongly-typed SourceConfig object.
	 *
	 * @param string $JsonString Object data as JSON string
	 * @return SourceConfig
	 */
	public static function createFromJSON($JsonString)
	{
		$decodedJsonObject = json_decode($JsonString); // as stdClass
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
	 * Unknown properties may still be represented as \stdClass objects.
	 *
	 * @param bool $for_json_encode Represent empty key-value maps as \stdClass instead of plain PHP arrays
	 * @return array
	 */
	public function toArray($for_json_encode = false)
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
			$ret[$k] = $v;
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
		$arr = self::toArray(true);
		if (count($arr) === 0) {
			return "{}"; // object
		} else {
			return json_encode($arr);
		}
	}
	
	/**
	 * Convert this object to a PHP \stdClass.
	 * This may be a more convenient format for working with unknown class properties.
	 *
	 * @return \stdClass
	 */
	public function toStdClass()
	{
		$arr = self::toArray(false);
		if (count($arr) === 0) {
			return new \stdClass();
		} else {
			return json_decode(json_encode($arr));
		}
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

