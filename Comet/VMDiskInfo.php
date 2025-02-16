<?php

/**
 * Copyright (c) 2018-2025 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 *
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

class VMDiskInfo {

	/**
	 * Relative path within this backup job snapshot to root disk files
	 *
	 * @var string
	 */
	public $Path = "";

	/**
	 * The virtual size of the virtual disk
	 *
	 * @var int
	 */
	public $Size = 0;

	/**
	 * Controller number where the disk is associated to
	 *
	 * @var int
	 */
	public $Controller = 0;

	/**
	 * Device number within the controller
	 *
	 * @var int
	 */
	public $DeviceNum = 0;

	/**
	 * Preserve unknown properties when dealing with future server versions.
	 *
	 * @see VMDiskInfo::RemoveUnknownProperties() Remove all unknown properties
	 * @var array
	 */
	private $__unknown_properties = [];

	/**
	 * Replace the content of this VMDiskInfo object from a PHP \stdClass.
	 * The data could be supplied from an API call after json_decode(...); or generated manually.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return void
	 */
	protected function inflateFrom(\stdClass $sc)
	{
		if (property_exists($sc, 'Path')) {
			$this->Path = (string)($sc->Path);
		}
		if (property_exists($sc, 'Size')) {
			$this->Size = (int)($sc->Size);
		}
		if (property_exists($sc, 'Controller')) {
			$this->Controller = (int)($sc->Controller);
		}
		if (property_exists($sc, 'DeviceNum')) {
			$this->DeviceNum = (int)($sc->DeviceNum);
		}
		foreach(get_object_vars($sc) as $k => $v) {
			switch($k) {
			case 'Path':
			case 'Size':
			case 'Controller':
			case 'DeviceNum':
				break;
			default:
				$this->__unknown_properties[$k] = $v;
			}
		}
	}

	/**
	 * Coerce a stdClass into a new strongly-typed VMDiskInfo object.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return VMDiskInfo
	 */
	public static function createFromStdclass(\stdClass $sc): \Comet\VMDiskInfo
	{
		$retn = new VMDiskInfo();
		$retn->inflateFrom($sc);
		return $retn;
	}

	/**
	 * Coerce a plain PHP array into a new strongly-typed VMDiskInfo object.
	 * Because the Comet Server requires strict distinction between empty objects ({}) and arrays ([]),
	 * the result of this method may not be safe to re-submit to the Comet Server.
	 *
	 * @param array $arr Object data as PHP array
	 * @return VMDiskInfo
	 */
	public static function createFromArray(array $arr): \Comet\VMDiskInfo
	{
		$stdClass = json_decode(json_encode($arr, JSON_UNESCAPED_SLASHES));
		if (is_array($stdClass) && count($stdClass) === 0) {
			$stdClass = new \stdClass();
		}
		return self::createFromStdclass($stdClass);
	}

	/**
	 * Coerce a JSON string into a new strongly-typed VMDiskInfo object.
	 *
	 * @param string $JsonString Object data as JSON string
	 * @return VMDiskInfo
	 */
	public static function createFromJSON(string $JsonString): \Comet\VMDiskInfo
	{
		$decodedJsonObject = json_decode($JsonString); // as stdClass
		if (\json_last_error() != \JSON_ERROR_NONE) {
			throw new \Exception("JSON decode failed: " . \json_last_error_msg(), \json_last_error());
		}
		$retn = new VMDiskInfo();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}

	/**
	 * Convert this VMDiskInfo object into a plain PHP array.
	 *
	 * Unknown properties may still be represented as \stdClass objects.
	 *
	 * @param bool $for_json_encode Represent key-value maps as \stdClass instead of plain PHP arrays
	 * @return array
	 */
	public function toArray(bool $for_json_encode = false): array
	{
		$ret = [];
		$ret["Path"] = $this->Path;
		$ret["Size"] = $this->Size;
		$ret["Controller"] = $this->Controller;
		$ret["DeviceNum"] = $this->DeviceNum;

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

