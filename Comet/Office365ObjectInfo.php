<?php

/**
 * Copyright (c) 2018-2022 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 *
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

class Office365ObjectInfo {

	/**
	 * @var string
	 */
	public $GUID = "";

	/**
	 * @var string
	 */
	public $Name = "";

	/**
	 * @var string
	 */
	public $Type = "";

	/**
	 * @var string
	 */
	public $Value = "";

	/**
	 * @var string[]
	 */
	public $Members = [];

	/**
	 * Preserve unknown properties when dealing with future server versions.
	 *
	 * @see Office365ObjectInfo::RemoveUnknownProperties() Remove all unknown properties
	 * @var array
	 */
	private $__unknown_properties = [];

	/**
	 * Replace the content of this Office365ObjectInfo object from a PHP \stdClass.
	 * The data could be supplied from an API call after json_decode(...); or generated manually.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return void
	 */
	protected function inflateFrom(\stdClass $sc)
	{
		if (property_exists($sc, 'GUID')) {
			$this->GUID = (string)($sc->GUID);
		}
		if (property_exists($sc, 'Name')) {
			$this->Name = (string)($sc->Name);
		}
		if (property_exists($sc, 'Type')) {
			$this->Type = (string)($sc->Type);
		}
		if (property_exists($sc, 'Value')) {
			$this->Value = (string)($sc->Value);
		}
		if (property_exists($sc, 'Members')) {
			$val_2 = [];
			if ($sc->Members !== null) {
				for($i_2 = 0; $i_2 < count($sc->Members); ++$i_2) {
					$val_2[] = (string)($sc->Members[$i_2]);
				}
			}
			$this->Members = $val_2;
		}
		foreach(get_object_vars($sc) as $k => $v) {
			switch($k) {
			case 'GUID':
			case 'Name':
			case 'Type':
			case 'Value':
			case 'Members':
				break;
			default:
				$this->__unknown_properties[$k] = $v;
			}
		}
	}

	/**
	 * Coerce a stdClass into a new strongly-typed Office365ObjectInfo object.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return Office365ObjectInfo
	 */
	public static function createFromStdclass(\stdClass $sc): \Comet\Office365ObjectInfo
	{
		$retn = new Office365ObjectInfo();
		$retn->inflateFrom($sc);
		return $retn;
	}

	/**
	 * Coerce a plain PHP array into a new strongly-typed Office365ObjectInfo object.
	 * Because the Comet Server requires strict distinction between empty objects ({}) and arrays ([]),
	 * the result of this method may not be safe to re-submit to the Comet Server.
	 *
	 * @param array $arr Object data as PHP array
	 * @return Office365ObjectInfo
	 */
	public static function createFromArray(array $arr): \Comet\Office365ObjectInfo
	{
		$stdClass = json_decode(json_encode($arr, JSON_UNESCAPED_SLASHES));
		if (is_array($stdClass) && count($stdClass) === 0) {
			$stdClass = new \stdClass();
		}
		return self::createFromStdclass($stdClass);
	}

	/**
	 * Coerce a JSON string into a new strongly-typed Office365ObjectInfo object.
	 *
	 * @param string $JsonString Object data as JSON string
	 * @return Office365ObjectInfo
	 */
	public static function createFromJSON(string $JsonString): \Comet\Office365ObjectInfo
	{
		$decodedJsonObject = json_decode($JsonString); // as stdClass
		if (\json_last_error() != \JSON_ERROR_NONE) {
			throw new \Exception("JSON decode failed: " . \json_last_error_msg());
		}
		$retn = new Office365ObjectInfo();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}

	/**
	 * Convert this Office365ObjectInfo object into a plain PHP array.
	 *
	 * Unknown properties may still be represented as \stdClass objects.
	 *
	 * @param bool $for_json_encode Represent empty key-value maps as \stdClass instead of plain PHP arrays
	 * @return array
	 */
	public function toArray(bool $for_json_encode = false): array
	{
		$ret = [];
		$ret["GUID"] = $this->GUID;
		$ret["Name"] = $this->Name;
		$ret["Type"] = $this->Type;
		$ret["Value"] = $this->Value;
		{
			$c0 = [];
			for($i0 = 0; $i0 < count($this->Members); ++$i0) {
				$val0 = $this->Members[$i0];
				$c0[] = $val0;
			}
			$ret["Members"] = $c0;
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

