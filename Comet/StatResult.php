<?php

/**
 * Copyright (c) 2018-2025 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 *
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

class StatResult {

	/**
	 * @var int
	 */
	public $Buckets = 0;

	/**
	 * @var int
	 */
	public $Users = 0;

	/**
	 * @var int
	 */
	public $Devices = 0;

	/**
	 * @var int
	 */
	public $Boosters = 0;

	/**
	 * @var int
	 */
	public $NetworkDevices = 0;

	/**
	 * Preserve unknown properties when dealing with future server versions.
	 *
	 * @see StatResult::RemoveUnknownProperties() Remove all unknown properties
	 * @var array
	 */
	private $__unknown_properties = [];

	/**
	 * Replace the content of this StatResult object from a PHP \stdClass.
	 * The data could be supplied from an API call after json_decode(...); or generated manually.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return void
	 */
	protected function inflateFrom(\stdClass $sc)
	{
		if (property_exists($sc, 'Buckets')) {
			$this->Buckets = (int)($sc->Buckets);
		}
		if (property_exists($sc, 'Users')) {
			$this->Users = (int)($sc->Users);
		}
		if (property_exists($sc, 'Devices')) {
			$this->Devices = (int)($sc->Devices);
		}
		if (property_exists($sc, 'Boosters')) {
			$this->Boosters = (int)($sc->Boosters);
		}
		if (property_exists($sc, 'NetworkDevices')) {
			$this->NetworkDevices = (int)($sc->NetworkDevices);
		}
		foreach(get_object_vars($sc) as $k => $v) {
			switch($k) {
			case 'Buckets':
			case 'Users':
			case 'Devices':
			case 'Boosters':
			case 'NetworkDevices':
				break;
			default:
				$this->__unknown_properties[$k] = $v;
			}
		}
	}

	/**
	 * Coerce a stdClass into a new strongly-typed StatResult object.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return StatResult
	 */
	public static function createFromStdclass(\stdClass $sc): \Comet\StatResult
	{
		$retn = new StatResult();
		$retn->inflateFrom($sc);
		return $retn;
	}

	/**
	 * Coerce a plain PHP array into a new strongly-typed StatResult object.
	 * Because the Comet Server requires strict distinction between empty objects ({}) and arrays ([]),
	 * the result of this method may not be safe to re-submit to the Comet Server.
	 *
	 * @param array $arr Object data as PHP array
	 * @return StatResult
	 */
	public static function createFromArray(array $arr): \Comet\StatResult
	{
		$stdClass = json_decode(json_encode($arr, JSON_UNESCAPED_SLASHES));
		if (is_array($stdClass) && count($stdClass) === 0) {
			$stdClass = new \stdClass();
		}
		return self::createFromStdclass($stdClass);
	}

	/**
	 * Coerce a JSON string into a new strongly-typed StatResult object.
	 *
	 * @param string $JsonString Object data as JSON string
	 * @return StatResult
	 */
	public static function createFromJSON(string $JsonString): \Comet\StatResult
	{
		$decodedJsonObject = json_decode($JsonString); // as stdClass
		if (\json_last_error() != \JSON_ERROR_NONE) {
			throw new \Exception("JSON decode failed: " . \json_last_error_msg(), \json_last_error());
		}
		$retn = new StatResult();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}

	/**
	 * Convert this StatResult object into a plain PHP array.
	 *
	 * Unknown properties may still be represented as \stdClass objects.
	 *
	 * @param bool $for_json_encode Represent key-value maps as \stdClass instead of plain PHP arrays
	 * @return array
	 */
	public function toArray(bool $for_json_encode = false): array
	{
		$ret = [];
		$ret["Buckets"] = $this->Buckets;
		$ret["Users"] = $this->Users;
		$ret["Devices"] = $this->Devices;
		$ret["Boosters"] = $this->Boosters;
		$ret["NetworkDevices"] = $this->NetworkDevices;

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

