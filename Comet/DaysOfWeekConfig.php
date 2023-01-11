<?php

/**
 * Copyright (c) 2018-2023 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 *
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

class DaysOfWeekConfig {

	/**
	 * @var boolean
	 */
	public $Sunday = false;

	/**
	 * @var boolean
	 */
	public $Monday = false;

	/**
	 * @var boolean
	 */
	public $Tuesday = false;

	/**
	 * @var boolean
	 */
	public $Wednesday = false;

	/**
	 * @var boolean
	 */
	public $Thursday = false;

	/**
	 * @var boolean
	 */
	public $Friday = false;

	/**
	 * @var boolean
	 */
	public $Saturday = false;

	/**
	 * Preserve unknown properties when dealing with future server versions.
	 *
	 * @see DaysOfWeekConfig::RemoveUnknownProperties() Remove all unknown properties
	 * @var array
	 */
	private $__unknown_properties = [];

	/**
	 * Replace the content of this DaysOfWeekConfig object from a PHP \stdClass.
	 * The data could be supplied from an API call after json_decode(...); or generated manually.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return void
	 */
	protected function inflateFrom(\stdClass $sc)
	{
		if (property_exists($sc, 'Sunday')) {
			$this->Sunday = (bool)($sc->Sunday);
		}
		if (property_exists($sc, 'Monday')) {
			$this->Monday = (bool)($sc->Monday);
		}
		if (property_exists($sc, 'Tuesday')) {
			$this->Tuesday = (bool)($sc->Tuesday);
		}
		if (property_exists($sc, 'Wednesday')) {
			$this->Wednesday = (bool)($sc->Wednesday);
		}
		if (property_exists($sc, 'Thursday')) {
			$this->Thursday = (bool)($sc->Thursday);
		}
		if (property_exists($sc, 'Friday')) {
			$this->Friday = (bool)($sc->Friday);
		}
		if (property_exists($sc, 'Saturday')) {
			$this->Saturday = (bool)($sc->Saturday);
		}
		foreach(get_object_vars($sc) as $k => $v) {
			switch($k) {
			case 'Sunday':
			case 'Monday':
			case 'Tuesday':
			case 'Wednesday':
			case 'Thursday':
			case 'Friday':
			case 'Saturday':
				break;
			default:
				$this->__unknown_properties[$k] = $v;
			}
		}
	}

	/**
	 * Coerce a stdClass into a new strongly-typed DaysOfWeekConfig object.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return DaysOfWeekConfig
	 */
	public static function createFromStdclass(\stdClass $sc): \Comet\DaysOfWeekConfig
	{
		$retn = new DaysOfWeekConfig();
		$retn->inflateFrom($sc);
		return $retn;
	}

	/**
	 * Coerce a plain PHP array into a new strongly-typed DaysOfWeekConfig object.
	 * Because the Comet Server requires strict distinction between empty objects ({}) and arrays ([]),
	 * the result of this method may not be safe to re-submit to the Comet Server.
	 *
	 * @param array $arr Object data as PHP array
	 * @return DaysOfWeekConfig
	 */
	public static function createFromArray(array $arr): \Comet\DaysOfWeekConfig
	{
		$stdClass = json_decode(json_encode($arr, JSON_UNESCAPED_SLASHES));
		if (is_array($stdClass) && count($stdClass) === 0) {
			$stdClass = new \stdClass();
		}
		return self::createFromStdclass($stdClass);
	}

	/**
	 * Coerce a JSON string into a new strongly-typed DaysOfWeekConfig object.
	 *
	 * @param string $JsonString Object data as JSON string
	 * @return DaysOfWeekConfig
	 */
	public static function createFromJSON(string $JsonString): \Comet\DaysOfWeekConfig
	{
		$decodedJsonObject = json_decode($JsonString); // as stdClass
		if (\json_last_error() != \JSON_ERROR_NONE) {
			throw new \Exception("JSON decode failed: " . \json_last_error_msg(), \json_last_error());
		}
		$retn = new DaysOfWeekConfig();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}

	/**
	 * Convert this DaysOfWeekConfig object into a plain PHP array.
	 *
	 * Unknown properties may still be represented as \stdClass objects.
	 *
	 * @param bool $for_json_encode Represent empty key-value maps as \stdClass instead of plain PHP arrays
	 * @return array
	 */
	public function toArray(bool $for_json_encode = false): array
	{
		$ret = [];
		$ret["Sunday"] = $this->Sunday;
		$ret["Monday"] = $this->Monday;
		$ret["Tuesday"] = $this->Tuesday;
		$ret["Wednesday"] = $this->Wednesday;
		$ret["Thursday"] = $this->Thursday;
		$ret["Friday"] = $this->Friday;
		$ret["Saturday"] = $this->Saturday;

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

