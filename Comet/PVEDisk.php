<?php

/**
 * Copyright (c) 2018-2025 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 *
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

class PVEDisk {

	/**
	 * @var string
	 */
	public $Device = "";

	/**
	 * @var int
	 */
	public $DeviceNum = 0;

	/**
	 * @var string
	 */
	public $StorageID = "";

	/**
	 * @var string
	 */
	public $Volume = "";

	/**
	 * @var string
	 */
	public $Size = "";

	/**
	 * @var string
	 */
	public $Format = "";

	/**
	 * @var string
	 */
	public $Options = "";

	/**
	 * Preserve unknown properties when dealing with future server versions.
	 *
	 * @see PVEDisk::RemoveUnknownProperties() Remove all unknown properties
	 * @var array
	 */
	private $__unknown_properties = [];

	/**
	 * Replace the content of this PVEDisk object from a PHP \stdClass.
	 * The data could be supplied from an API call after json_decode(...); or generated manually.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return void
	 */
	protected function inflateFrom(\stdClass $sc)
	{
		if (property_exists($sc, 'Device')) {
			$this->Device = (string)($sc->Device);
		}
		if (property_exists($sc, 'DeviceNum')) {
			$this->DeviceNum = (int)($sc->DeviceNum);
		}
		if (property_exists($sc, 'StorageID') && !is_null($sc->StorageID)) {
			$this->StorageID = (string)($sc->StorageID);
		}
		if (property_exists($sc, 'Volume') && !is_null($sc->Volume)) {
			$this->Volume = (string)($sc->Volume);
		}
		if (property_exists($sc, 'Size') && !is_null($sc->Size)) {
			$this->Size = (string)($sc->Size);
		}
		if (property_exists($sc, 'Format') && !is_null($sc->Format)) {
			$this->Format = (string)($sc->Format);
		}
		if (property_exists($sc, 'Options') && !is_null($sc->Options)) {
			$this->Options = (string)($sc->Options);
		}
		foreach(get_object_vars($sc) as $k => $v) {
			switch($k) {
			case 'Device':
			case 'DeviceNum':
			case 'StorageID':
			case 'Volume':
			case 'Size':
			case 'Format':
			case 'Options':
				break;
			default:
				$this->__unknown_properties[$k] = $v;
			}
		}
	}

	/**
	 * Coerce a stdClass into a new strongly-typed PVEDisk object.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return PVEDisk
	 */
	public static function createFromStdclass(\stdClass $sc): \Comet\PVEDisk
	{
		$retn = new PVEDisk();
		$retn->inflateFrom($sc);
		return $retn;
	}

	/**
	 * Coerce a plain PHP array into a new strongly-typed PVEDisk object.
	 * Because the Comet Server requires strict distinction between empty objects ({}) and arrays ([]),
	 * the result of this method may not be safe to re-submit to the Comet Server.
	 *
	 * @param array $arr Object data as PHP array
	 * @return PVEDisk
	 */
	public static function createFromArray(array $arr): \Comet\PVEDisk
	{
		$stdClass = json_decode(json_encode($arr, JSON_UNESCAPED_SLASHES));
		if (is_array($stdClass) && count($stdClass) === 0) {
			$stdClass = new \stdClass();
		}
		return self::createFromStdclass($stdClass);
	}

	/**
	 * Coerce a JSON string into a new strongly-typed PVEDisk object.
	 *
	 * @param string $JsonString Object data as JSON string
	 * @return PVEDisk
	 */
	public static function createFromJSON(string $JsonString): \Comet\PVEDisk
	{
		$decodedJsonObject = json_decode($JsonString); // as stdClass
		if (\json_last_error() != \JSON_ERROR_NONE) {
			throw new \Exception("JSON decode failed: " . \json_last_error_msg(), \json_last_error());
		}
		$retn = new PVEDisk();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}

	/**
	 * Convert this PVEDisk object into a plain PHP array.
	 *
	 * Unknown properties may still be represented as \stdClass objects.
	 *
	 * @param bool $for_json_encode Represent key-value maps as \stdClass instead of plain PHP arrays
	 * @return array
	 */
	public function toArray(bool $for_json_encode = false): array
	{
		$ret = [];
		$ret["Device"] = $this->Device;
		$ret["DeviceNum"] = $this->DeviceNum;
		$ret["StorageID"] = $this->StorageID;
		$ret["Volume"] = $this->Volume;
		$ret["Size"] = $this->Size;
		$ret["Format"] = $this->Format;
		$ret["Options"] = $this->Options;

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

