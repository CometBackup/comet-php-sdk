<?php

/**
 * Copyright (c) 2018 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 * 
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

class DeviceConfig {
	
	/**
	 * @var string
	 */
	public $FriendlyName = "";
	
	/**
	 * @var \Comet\SourceBasicInfo[] An array with string keys.
	 */
	public $Sources = [];
	
	/**
	 * Preserve unknown properties when dealing with future server versions.
	 *
	 * @see DeviceConfig::RemoveUnknownProperties() Remove all unknown properties
	 * @var array
	 */
	private $__unknown_properties = [];
	
	/**
	 * Replace the content of this DeviceConfig object from a PHP \stdClass.
	 * The data could be supplied from an API call after json_decode(...); or generated manually.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return void
	 */
	protected function inflateFrom(\stdClass $sc)
	{
		if (property_exists($sc, 'FriendlyName')) {
			$this->FriendlyName = (string)($sc->FriendlyName);
		}
		if (property_exists($sc, 'Sources')) {
			$val_2 = [];
			foreach($sc->Sources as $k_2 => $v_2) {
				$phpk_2 = (string)($k_2);
				$phpv_2 = \Comet\SourceBasicInfo::createFromStdclass($v_2);
				$val_2[$phpk_2] = $phpv_2;
			}
			$this->Sources = $val_2;
		}
		foreach(get_object_vars($sc) as $k => $v) {
			switch($k) {
			case 'FriendlyName':
			case 'Sources':
				break;
			default:
				$this->__unknown_properties[$k] = $v;
			}
		}
	}
	
	/**
	 * Coerce a stdClass into a new strongly-typed DeviceConfig object.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return DeviceConfig
	 */
	public static function createFromStdclass(\stdClass $sc)
	{
		$retn = new DeviceConfig();
		$retn->inflateFrom($sc);
		return $retn;
	}
	
	/**
	 * Coerce a plain PHP array into a new strongly-typed DeviceConfig object.
	 * Because the Comet Server requires strict distinction between empty objects ({}) and arrays ([]),
	 * the result of this method may not be safe to re-submit to the Comet Server.
	 *
	 * @param array $arr Object data as PHP array
	 * @return DeviceConfig
	 */
	public static function createFromArray(array $arr)
	{
		$stdClass = json_decode(json_encode($arr));
		return self::createFromStdclass($stdClass);
	}
	
	/**
	 * Coerce a plain PHP array into a new strongly-typed DeviceConfig object.
	 * Because the Comet Server requires strict distinction between empty objects ({}) and arrays ([]),
	 * the result of this method may not be safe to re-submit to the Comet Server.
	 *
	 * @deprecated 3.0.0 Unsafe for round-trip server traversal. You should either 
	 *             (A) acknowledge this and continue by switching to createFromArray, or
	 *             (b) switch to the roundtrip-safe createFromStdclass alternative.
	 * @param array $arr Object data as PHP array
	 * @return DeviceConfig
	 */
	public static function createFrom(array $arr)
	{
		return self::createFromArray($arr);
	}
	
	/**
	 * Coerce a JSON string into a new strongly-typed DeviceConfig object.
	 *
	 * @param string $JsonString Object data as JSON string
	 * @return DeviceConfig
	 */
	public static function createFromJSON($JsonString)
	{
		$decodedJsonObject = json_decode($JsonString); // as stdClass
		if (\json_last_error() != \JSON_ERROR_NONE) {
			throw new \Exception("JSON decode failed: " . \json_last_error_msg());
		}
		$retn = new DeviceConfig();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}
	
	/**
	 * Convert this DeviceConfig object into a plain PHP array.
	 *
	 * Unknown properties may still be represented as \stdClass objects.
	 *
	 * @param bool $for_json_encode Represent empty key-value maps as \stdClass instead of plain PHP arrays
	 * @return array
	 */
	public function toArray($for_json_encode = false)
	{
		$ret = [];
		$ret["FriendlyName"] = $this->FriendlyName;
		{
			$c0 = [];
			foreach($this->Sources as $k0 => $v0) {
				$ko_0 = $k0;
				if ( $v0 === null ) {
					$vo_0 = $for_json_encode ? (object)[] : [];
				} else {
					$vo_0 = $v0->toArray($for_json_encode);
				}
				$c0[ $ko_0 ] = $vo_0;
			}
			if ($for_json_encode && count($c0) == 0) {
				$ret["Sources"] = (object)[];
			} else {
				$ret["Sources"] = $c0;
			}
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
	}
	
}

