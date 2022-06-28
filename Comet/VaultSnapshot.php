<?php

/**
 * Copyright (c) 2018-2022 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 *
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

class VaultSnapshot {

	/**
	 * @var string
	 */
	public $Snapshot = "";

	/**
	 * @var string
	 */
	public $Source = "";

	/**
	 * @var int
	 */
	public $CreateTime = 0;

	/**
	 * @var boolean
	 */
	public $HasOriginalPathInfo = false;

	/**
	 * Preserve unknown properties when dealing with future server versions.
	 *
	 * @see VaultSnapshot::RemoveUnknownProperties() Remove all unknown properties
	 * @var array
	 */
	private $__unknown_properties = [];

	/**
	 * Replace the content of this VaultSnapshot object from a PHP \stdClass.
	 * The data could be supplied from an API call after json_decode(...); or generated manually.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return void
	 */
	protected function inflateFrom(\stdClass $sc)
	{
		if (property_exists($sc, 'Snapshot')) {
			$this->Snapshot = (string)($sc->Snapshot);
		}
		if (property_exists($sc, 'Source')) {
			$this->Source = (string)($sc->Source);
		}
		if (property_exists($sc, 'CreateTime')) {
			$this->CreateTime = (int)($sc->CreateTime);
		}
		if (property_exists($sc, 'HasOriginalPathInfo')) {
			$this->HasOriginalPathInfo = (bool)($sc->HasOriginalPathInfo);
		}
		foreach(get_object_vars($sc) as $k => $v) {
			switch($k) {
			case 'Snapshot':
			case 'Source':
			case 'CreateTime':
			case 'HasOriginalPathInfo':
				break;
			default:
				$this->__unknown_properties[$k] = $v;
			}
		}
	}

	/**
	 * Coerce a stdClass into a new strongly-typed VaultSnapshot object.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return VaultSnapshot
	 */
	public static function createFromStdclass(\stdClass $sc): \Comet\VaultSnapshot
	{
		$retn = new VaultSnapshot();
		$retn->inflateFrom($sc);
		return $retn;
	}

	/**
	 * Coerce a plain PHP array into a new strongly-typed VaultSnapshot object.
	 * Because the Comet Server requires strict distinction between empty objects ({}) and arrays ([]),
	 * the result of this method may not be safe to re-submit to the Comet Server.
	 *
	 * @param array $arr Object data as PHP array
	 * @return VaultSnapshot
	 */
	public static function createFromArray(array $arr): \Comet\VaultSnapshot
	{
		$stdClass = json_decode(json_encode($arr, JSON_UNESCAPED_SLASHES));
		if (is_array($stdClass) && count($stdClass) === 0) {
			$stdClass = new \stdClass();
		}
		return self::createFromStdclass($stdClass);
	}

	/**
	 * Coerce a JSON string into a new strongly-typed VaultSnapshot object.
	 *
	 * @param string $JsonString Object data as JSON string
	 * @return VaultSnapshot
	 */
	public static function createFromJSON(string $JsonString): \Comet\VaultSnapshot
	{
		$decodedJsonObject = json_decode($JsonString); // as stdClass
		if (\json_last_error() != \JSON_ERROR_NONE) {
			throw new \Exception("JSON decode failed: " . \json_last_error_msg());
		}
		$retn = new VaultSnapshot();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}

	/**
	 * Convert this VaultSnapshot object into a plain PHP array.
	 *
	 * Unknown properties may still be represented as \stdClass objects.
	 *
	 * @param bool $for_json_encode Represent empty key-value maps as \stdClass instead of plain PHP arrays
	 * @return array
	 */
	public function toArray(bool $for_json_encode = false): array
	{
		$ret = [];
		$ret["Snapshot"] = $this->Snapshot;
		$ret["Source"] = $this->Source;
		$ret["CreateTime"] = $this->CreateTime;
		$ret["HasOriginalPathInfo"] = $this->HasOriginalPathInfo;

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

