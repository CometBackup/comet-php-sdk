<?php

/**
 * Copyright (c) 2018-2026 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 *
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

class AdminAPIToken {

	/**
	 * Random identifier embedded in the plaintext token, used to locate this record during
	 * authentication
	 *
	 * @var string
	 */
	public $TokenID = "";

	/**
	 * Human-readable label chosen at creation time
	 *
	 * @var string
	 */
	public $Description = "";

	/**
	 * Unix timestamp, in seconds
	 *
	 * @var int
	 */
	public $CreatedTime = 0;

	/**
	 * Unix timestamp, in seconds. Zero means the token never expires
	 *
	 * @var int
	 */
	public $ExpireTime = 0;

	/**
	 * Unix timestamp, in seconds. Persisted at most once per hour
	 *
	 * @var int
	 */
	public $LastUsedTime = 0;

	/**
	 * One of the PASSWORD_FORMAT_ constants
	 *
	 * @var int
	 */
	public $SecretFormat = 0;

	/**
	 * @var string
	 */
	public $SecretHash = "";

	/**
	 * Preserve unknown properties when dealing with future server versions.
	 *
	 * @see AdminAPIToken::RemoveUnknownProperties() Remove all unknown properties
	 * @var array
	 */
	private $__unknown_properties = [];

	/**
	 * Replace the content of this AdminAPIToken object from a PHP \stdClass.
	 * The data could be supplied from an API call after json_decode(...); or generated manually.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return void
	 */
	protected function inflateFrom(\stdClass $sc)
	{
		if (property_exists($sc, 'TokenID')) {
			$this->TokenID = (string)($sc->TokenID);
		}
		if (property_exists($sc, 'Description')) {
			$this->Description = (string)($sc->Description);
		}
		if (property_exists($sc, 'CreatedTime')) {
			$this->CreatedTime = (int)($sc->CreatedTime);
		}
		if (property_exists($sc, 'ExpireTime') && !is_null($sc->ExpireTime)) {
			$this->ExpireTime = (int)($sc->ExpireTime);
		}
		if (property_exists($sc, 'LastUsedTime') && !is_null($sc->LastUsedTime)) {
			$this->LastUsedTime = (int)($sc->LastUsedTime);
		}
		if (property_exists($sc, 'SecretFormat')) {
			$this->SecretFormat = (int)($sc->SecretFormat);
		}
		if (property_exists($sc, 'SecretHash')) {
			$this->SecretHash = (string)($sc->SecretHash);
		}
		foreach(get_object_vars($sc) as $k => $v) {
			switch($k) {
			case 'TokenID':
			case 'Description':
			case 'CreatedTime':
			case 'ExpireTime':
			case 'LastUsedTime':
			case 'SecretFormat':
			case 'SecretHash':
				break;
			default:
				$this->__unknown_properties[$k] = $v;
			}
		}
	}

	/**
	 * Coerce a stdClass into a new strongly-typed AdminAPIToken object.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return AdminAPIToken
	 */
	public static function createFromStdclass(\stdClass $sc): \Comet\AdminAPIToken
	{
		$retn = new AdminAPIToken();
		$retn->inflateFrom($sc);
		return $retn;
	}

	/**
	 * Coerce a plain PHP array into a new strongly-typed AdminAPIToken object.
	 * Because the Comet Server requires strict distinction between empty objects ({}) and arrays ([]),
	 * the result of this method may not be safe to re-submit to the Comet Server.
	 *
	 * @param array $arr Object data as PHP array
	 * @return AdminAPIToken
	 */
	public static function createFromArray(array $arr): \Comet\AdminAPIToken
	{
		$stdClass = json_decode(json_encode($arr, JSON_UNESCAPED_SLASHES));
		if (is_array($stdClass) && count($stdClass) === 0) {
			$stdClass = new \stdClass();
		}
		return self::createFromStdclass($stdClass);
	}

	/**
	 * Coerce a JSON string into a new strongly-typed AdminAPIToken object.
	 *
	 * @param string $JsonString Object data as JSON string
	 * @return AdminAPIToken
	 */
	public static function createFromJSON(string $JsonString): \Comet\AdminAPIToken
	{
		$decodedJsonObject = json_decode($JsonString); // as stdClass
		if (\json_last_error() != \JSON_ERROR_NONE) {
			throw new \Exception("JSON decode failed: " . \json_last_error_msg(), \json_last_error());
		}
		$retn = new AdminAPIToken();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}

	/**
	 * Convert this AdminAPIToken object into a plain PHP array.
	 *
	 * Unknown properties may still be represented as \stdClass objects.
	 *
	 * @param bool $for_json_encode Represent key-value maps as \stdClass instead of plain PHP arrays
	 * @return array
	 */
	public function toArray(bool $for_json_encode = false): array
	{
		$ret = [];
		$ret["TokenID"] = $this->TokenID;
		$ret["Description"] = $this->Description;
		$ret["CreatedTime"] = $this->CreatedTime;
		$ret["ExpireTime"] = $this->ExpireTime;
		$ret["LastUsedTime"] = $this->LastUsedTime;
		$ret["SecretFormat"] = $this->SecretFormat;
		$ret["SecretHash"] = $this->SecretHash;

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

