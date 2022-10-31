<?php

/**
 * Copyright (c) 2018-2022 Comet Licensing Ltd.
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
	 * @var int
	 */
	public $RegistrationTime = 0;

	/**
	 * @var \Comet\OSInfo
	 */
	public $PlatformVersion = null;

	/**
	 * @var \Comet\SourceBasicInfo[] An array with string keys.
	 */
	public $Sources = [];

	/**
	 * @var string
	 */
	public $DeviceTimezone = "";

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
		if (property_exists($sc, 'RegistrationTime') && !is_null($sc->RegistrationTime)) {
			$this->RegistrationTime = (int)($sc->RegistrationTime);
		}
		if (property_exists($sc, 'PlatformVersion') && !is_null($sc->PlatformVersion)) {
			if (is_array($sc->PlatformVersion) && count($sc->PlatformVersion) === 0) {
			// Work around edge case in json_decode--json_encode stdClass conversion
				$this->PlatformVersion = \Comet\OSInfo::createFromStdclass(new \stdClass());
			} else {
				$this->PlatformVersion = \Comet\OSInfo::createFromStdclass($sc->PlatformVersion);
			}
		}
		if (property_exists($sc, 'Sources') && !is_null($sc->Sources)) {
			$val_2 = [];
			if ($sc->Sources !== null) {
				foreach($sc->Sources as $k_2 => $v_2) {
					$phpk_2 = (string)($k_2);
					if (is_array($v_2) && count($v_2) === 0) {
					// Work around edge case in json_decode--json_encode stdClass conversion
						$phpv_2 = \Comet\SourceBasicInfo::createFromStdclass(new \stdClass());
					} else {
						$phpv_2 = \Comet\SourceBasicInfo::createFromStdclass($v_2);
					}
					$val_2[$phpk_2] = $phpv_2;
				}
			}
			$this->Sources = $val_2;
		}
		if (property_exists($sc, 'DeviceTimezone') && !is_null($sc->DeviceTimezone)) {
			$this->DeviceTimezone = (string)($sc->DeviceTimezone);
		}
		foreach(get_object_vars($sc) as $k => $v) {
			switch($k) {
			case 'FriendlyName':
			case 'RegistrationTime':
			case 'PlatformVersion':
			case 'Sources':
			case 'DeviceTimezone':
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
	public static function createFromStdclass(\stdClass $sc): \Comet\DeviceConfig
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
	public static function createFromArray(array $arr): \Comet\DeviceConfig
	{
		$stdClass = json_decode(json_encode($arr, JSON_UNESCAPED_SLASHES));
		if (is_array($stdClass) && count($stdClass) === 0) {
			$stdClass = new \stdClass();
		}
		return self::createFromStdclass($stdClass);
	}

	/**
	 * Coerce a JSON string into a new strongly-typed DeviceConfig object.
	 *
	 * @param string $JsonString Object data as JSON string
	 * @return DeviceConfig
	 */
	public static function createFromJSON(string $JsonString): \Comet\DeviceConfig
	{
		$decodedJsonObject = json_decode($JsonString); // as stdClass
		if (\json_last_error() != \JSON_ERROR_NONE) {
			throw new \Exception("JSON decode failed: " . \json_last_error_msg(), \json_last_error());
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
	public function toArray(bool $for_json_encode = false): array
	{
		$ret = [];
		$ret["FriendlyName"] = $this->FriendlyName;
		$ret["RegistrationTime"] = $this->RegistrationTime;
		if ( $this->PlatformVersion === null ) {
			$ret["PlatformVersion"] = $for_json_encode ? (object)[] : [];
		} else {
			$ret["PlatformVersion"] = $this->PlatformVersion->toArray($for_json_encode);
		}
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
		$ret["DeviceTimezone"] = $this->DeviceTimezone;

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
	public function toJSON(): string
	{
		$arr = $this->toArray(true);
		if (count($arr) === 0) {
			return "{}"; // object
		} else {
			return json_encode($arr, JSON_UNESCAPED_SLASHES);
		}
	}

	/**
	 * Convert this object to a PHP \stdClass.
	 * This may be a more convenient format for working with unknown class properties.
	 *
	 * @return \stdClass
	 */
	public function toStdClass(): \stdClass
	{
		$arr = $this->toArray(false);
		if (count($arr) === 0) {
			return new \stdClass();
		} else {
			return json_decode(json_encode($arr, JSON_UNESCAPED_SLASHES));
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
		if ($this->PlatformVersion !== null) {
			$this->PlatformVersion->RemoveUnknownProperties();
		}
	}

}

