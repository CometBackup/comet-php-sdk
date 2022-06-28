<?php

/**
 * Copyright (c) 2018-2022 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 *
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

class InstallToken {

	/**
	 * @var string
	 */
	public $Username = "";

	/**
	 * @var string
	 */
	public $Server = "";

	/**
	 * @var string
	 */
	public $Token = "";

	/**
	 * @var int
	 */
	public $CreateTime = 0;

	/**
	 * @var boolean
	 */
	public $Used = false;

	/**
	 * @var int
	 */
	public $ExpireTime = 0;

	/**
	 * Preserve unknown properties when dealing with future server versions.
	 *
	 * @see InstallToken::RemoveUnknownProperties() Remove all unknown properties
	 * @var array
	 */
	private $__unknown_properties = [];

	/**
	 * Replace the content of this InstallToken object from a PHP \stdClass.
	 * The data could be supplied from an API call after json_decode(...); or generated manually.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return void
	 */
	protected function inflateFrom(\stdClass $sc)
	{
		if (property_exists($sc, 'Username')) {
			$this->Username = (string)($sc->Username);
		}
		if (property_exists($sc, 'Server')) {
			$this->Server = (string)($sc->Server);
		}
		if (property_exists($sc, 'Token')) {
			$this->Token = (string)($sc->Token);
		}
		if (property_exists($sc, 'CreateTime')) {
			$this->CreateTime = (int)($sc->CreateTime);
		}
		if (property_exists($sc, 'Used')) {
			$this->Used = (bool)($sc->Used);
		}
		if (property_exists($sc, 'ExpireTime')) {
			$this->ExpireTime = (int)($sc->ExpireTime);
		}
		foreach(get_object_vars($sc) as $k => $v) {
			switch($k) {
			case 'Username':
			case 'Server':
			case 'Token':
			case 'CreateTime':
			case 'Used':
			case 'ExpireTime':
				break;
			default:
				$this->__unknown_properties[$k] = $v;
			}
		}
	}

	/**
	 * Coerce a stdClass into a new strongly-typed InstallToken object.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return InstallToken
	 */
	public static function createFromStdclass(\stdClass $sc): \Comet\InstallToken
	{
		$retn = new InstallToken();
		$retn->inflateFrom($sc);
		return $retn;
	}

	/**
	 * Coerce a plain PHP array into a new strongly-typed InstallToken object.
	 * Because the Comet Server requires strict distinction between empty objects ({}) and arrays ([]),
	 * the result of this method may not be safe to re-submit to the Comet Server.
	 *
	 * @param array $arr Object data as PHP array
	 * @return InstallToken
	 */
	public static function createFromArray(array $arr): \Comet\InstallToken
	{
		$stdClass = json_decode(json_encode($arr, JSON_UNESCAPED_SLASHES));
		if (is_array($stdClass) && count($stdClass) === 0) {
			$stdClass = new \stdClass();
		}
		return self::createFromStdclass($stdClass);
	}

	/**
	 * Coerce a JSON string into a new strongly-typed InstallToken object.
	 *
	 * @param string $JsonString Object data as JSON string
	 * @return InstallToken
	 */
	public static function createFromJSON(string $JsonString): \Comet\InstallToken
	{
		$decodedJsonObject = json_decode($JsonString); // as stdClass
		if (\json_last_error() != \JSON_ERROR_NONE) {
			throw new \Exception("JSON decode failed: " . \json_last_error_msg());
		}
		$retn = new InstallToken();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}

	/**
	 * Convert this InstallToken object into a plain PHP array.
	 *
	 * Unknown properties may still be represented as \stdClass objects.
	 *
	 * @param bool $for_json_encode Represent empty key-value maps as \stdClass instead of plain PHP arrays
	 * @return array
	 */
	public function toArray(bool $for_json_encode = false): array
	{
		$ret = [];
		$ret["Username"] = $this->Username;
		$ret["Server"] = $this->Server;
		$ret["Token"] = $this->Token;
		$ret["CreateTime"] = $this->CreateTime;
		$ret["Used"] = $this->Used;
		$ret["ExpireTime"] = $this->ExpireTime;

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

