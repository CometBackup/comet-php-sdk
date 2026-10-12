<?php

/**
 * Copyright (c) 2018-2026 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 *
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

class Pkcs11AllowlistOptions {

	/**
	 * Permitted PKCS#11 driver modules during codesigning
	 *
	 * @var \Comet\Pkcs11AllowedDriver[]
	 * This field is available in Comet 26.8.1 and later.
	 */
	public $AllowedDrivers = [];

	/**
	 * Set to true by the server on the first boot after upgrading; the auto-seed pulls existing module
	 * paths from branding
	 *
	 * @var boolean
	 * This field is available in Comet 26.8.1 and later.
	 */
	public $AllowlistIsBeingEnforced = false;

	/**
	 * Preserve unknown properties when dealing with future server versions.
	 *
	 * @see Pkcs11AllowlistOptions::RemoveUnknownProperties() Remove all unknown properties
	 * @var array
	 */
	private $__unknown_properties = [];

	/**
	 * Replace the content of this Pkcs11AllowlistOptions object from a PHP \stdClass.
	 * The data could be supplied from an API call after json_decode(...); or generated manually.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return void
	 */
	protected function inflateFrom(\stdClass $sc)
	{
		if (property_exists($sc, 'AllowedDrivers')) {
			$val_2 = [];
			if ($sc->AllowedDrivers !== null) {
				for($i_2 = 0; $i_2 < count($sc->AllowedDrivers); ++$i_2) {
					if (is_array($sc->AllowedDrivers[$i_2]) && count($sc->AllowedDrivers[$i_2]) === 0) {
					// Work around edge case in json_decode--json_encode stdClass conversion
						$val_2[] = \Comet\Pkcs11AllowedDriver::createFromStdclass(new \stdClass());
					} else {
						$val_2[] = \Comet\Pkcs11AllowedDriver::createFromStdclass($sc->AllowedDrivers[$i_2]);
					}
				}
			}
			$this->AllowedDrivers = $val_2;
		}
		if (property_exists($sc, 'AllowlistIsBeingEnforced')) {
			$this->AllowlistIsBeingEnforced = (bool)($sc->AllowlistIsBeingEnforced);
		}
		foreach(get_object_vars($sc) as $k => $v) {
			switch($k) {
			case 'AllowedDrivers':
			case 'AllowlistIsBeingEnforced':
				break;
			default:
				$this->__unknown_properties[$k] = $v;
			}
		}
	}

	/**
	 * Coerce a stdClass into a new strongly-typed Pkcs11AllowlistOptions object.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return Pkcs11AllowlistOptions
	 */
	public static function createFromStdclass(\stdClass $sc): \Comet\Pkcs11AllowlistOptions
	{
		$retn = new Pkcs11AllowlistOptions();
		$retn->inflateFrom($sc);
		return $retn;
	}

	/**
	 * Coerce a plain PHP array into a new strongly-typed Pkcs11AllowlistOptions object.
	 * Because the Comet Server requires strict distinction between empty objects ({}) and arrays ([]),
	 * the result of this method may not be safe to re-submit to the Comet Server.
	 *
	 * @param array $arr Object data as PHP array
	 * @return Pkcs11AllowlistOptions
	 */
	public static function createFromArray(array $arr): \Comet\Pkcs11AllowlistOptions
	{
		$stdClass = json_decode(json_encode($arr, JSON_UNESCAPED_SLASHES));
		if (is_array($stdClass) && count($stdClass) === 0) {
			$stdClass = new \stdClass();
		}
		return self::createFromStdclass($stdClass);
	}

	/**
	 * Coerce a JSON string into a new strongly-typed Pkcs11AllowlistOptions object.
	 *
	 * @param string $JsonString Object data as JSON string
	 * @return Pkcs11AllowlistOptions
	 */
	public static function createFromJSON(string $JsonString): \Comet\Pkcs11AllowlistOptions
	{
		$decodedJsonObject = json_decode($JsonString); // as stdClass
		if (\json_last_error() != \JSON_ERROR_NONE) {
			throw new \Exception("JSON decode failed: " . \json_last_error_msg(), \json_last_error());
		}
		$retn = new Pkcs11AllowlistOptions();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}

	/**
	 * Convert this Pkcs11AllowlistOptions object into a plain PHP array.
	 *
	 * Unknown properties may still be represented as \stdClass objects.
	 *
	 * @param bool $for_json_encode Represent key-value maps as \stdClass instead of plain PHP arrays
	 * @return array
	 */
	public function toArray(bool $for_json_encode = false): array
	{
		$ret = [];
		{
			$c0 = [];
			for($i0 = 0; $i0 < count($this->AllowedDrivers); ++$i0) {
				if ( $this->AllowedDrivers[$i0] === null ) {
					$val0 = $for_json_encode ? (object)[] : [];
				} else {
					$val0 = $this->AllowedDrivers[$i0]->toArray($for_json_encode);
				}
				$c0[] = $val0;
			}
			$ret["AllowedDrivers"] = $c0;
		}
		$ret["AllowlistIsBeingEnforced"] = $this->AllowlistIsBeingEnforced;

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
	}

}

