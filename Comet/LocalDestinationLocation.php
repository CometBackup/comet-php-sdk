<?php

/**
 * Copyright (c) 2018-2023 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 *
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

class LocalDestinationLocation {

	/**
	 * @var string
	 */
	public $LocalcopyPath = "";

	/**
	 * If logging in to a Windows network share (SMB/CIFS) is required, enter the username here.
	 *
	 * @var string
	 */
	public $LocalcopyWinSMBUsername = "";

	/**
	 * If logging in to a Windows network share (SMB/CIFS) is required, enter the password here. The
	 * password may be hashed as per the LocalcopyWinSMBPasswordFormat field.
	 *
	 * @var string
	 */
	public $LocalcopyWinSMBPassword = "";

	/**
	 * One of the PASSWORD_FORMAT_ constants. It controls the hash format of the LocalcopyWinSMBPassword
	 * field.
	 *
	 * @var int
	 */
	public $LocalcopyWinSMBPasswordFormat = 0;

	/**
	 * Preserve unknown properties when dealing with future server versions.
	 *
	 * @see LocalDestinationLocation::RemoveUnknownProperties() Remove all unknown properties
	 * @var array
	 */
	private $__unknown_properties = [];

	/**
	 * Replace the content of this LocalDestinationLocation object from a PHP \stdClass.
	 * The data could be supplied from an API call after json_decode(...); or generated manually.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return void
	 */
	protected function inflateFrom(\stdClass $sc)
	{
		if (property_exists($sc, 'LocalcopyPath')) {
			$this->LocalcopyPath = (string)($sc->LocalcopyPath);
		}
		if (property_exists($sc, 'LocalcopyWinSMBUsername')) {
			$this->LocalcopyWinSMBUsername = (string)($sc->LocalcopyWinSMBUsername);
		}
		if (property_exists($sc, 'LocalcopyWinSMBPassword')) {
			$this->LocalcopyWinSMBPassword = (string)($sc->LocalcopyWinSMBPassword);
		}
		if (property_exists($sc, 'LocalcopyWinSMBPasswordFormat')) {
			$this->LocalcopyWinSMBPasswordFormat = (int)($sc->LocalcopyWinSMBPasswordFormat);
		}
		foreach(get_object_vars($sc) as $k => $v) {
			switch($k) {
			case 'LocalcopyPath':
			case 'LocalcopyWinSMBUsername':
			case 'LocalcopyWinSMBPassword':
			case 'LocalcopyWinSMBPasswordFormat':
				break;
			default:
				$this->__unknown_properties[$k] = $v;
			}
		}
	}

	/**
	 * Coerce a stdClass into a new strongly-typed LocalDestinationLocation object.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return LocalDestinationLocation
	 */
	public static function createFromStdclass(\stdClass $sc): \Comet\LocalDestinationLocation
	{
		$retn = new LocalDestinationLocation();
		$retn->inflateFrom($sc);
		return $retn;
	}

	/**
	 * Coerce a plain PHP array into a new strongly-typed LocalDestinationLocation object.
	 * Because the Comet Server requires strict distinction between empty objects ({}) and arrays ([]),
	 * the result of this method may not be safe to re-submit to the Comet Server.
	 *
	 * @param array $arr Object data as PHP array
	 * @return LocalDestinationLocation
	 */
	public static function createFromArray(array $arr): \Comet\LocalDestinationLocation
	{
		$stdClass = json_decode(json_encode($arr, JSON_UNESCAPED_SLASHES));
		if (is_array($stdClass) && count($stdClass) === 0) {
			$stdClass = new \stdClass();
		}
		return self::createFromStdclass($stdClass);
	}

	/**
	 * Coerce a JSON string into a new strongly-typed LocalDestinationLocation object.
	 *
	 * @param string $JsonString Object data as JSON string
	 * @return LocalDestinationLocation
	 */
	public static function createFromJSON(string $JsonString): \Comet\LocalDestinationLocation
	{
		$decodedJsonObject = json_decode($JsonString); // as stdClass
		if (\json_last_error() != \JSON_ERROR_NONE) {
			throw new \Exception("JSON decode failed: " . \json_last_error_msg(), \json_last_error());
		}
		$retn = new LocalDestinationLocation();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}

	/**
	 * Convert this LocalDestinationLocation object into a plain PHP array.
	 *
	 * Unknown properties may still be represented as \stdClass objects.
	 *
	 * @param bool $for_json_encode Represent empty key-value maps as \stdClass instead of plain PHP arrays
	 * @return array
	 */
	public function toArray(bool $for_json_encode = false): array
	{
		$ret = [];
		$ret["LocalcopyPath"] = $this->LocalcopyPath;
		$ret["LocalcopyWinSMBUsername"] = $this->LocalcopyWinSMBUsername;
		$ret["LocalcopyWinSMBPassword"] = $this->LocalcopyWinSMBPassword;
		$ret["LocalcopyWinSMBPasswordFormat"] = $this->LocalcopyWinSMBPasswordFormat;

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

