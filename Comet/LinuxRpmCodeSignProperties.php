<?php

/**
 * Copyright (c) 2018-2026 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 *
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

class LinuxRpmCodeSignProperties {

	/**
	 * One of the LINUXRPMCODESIGN_METHOD_ constants
	 *
	 * @var int
	 */
	public $Method = 0;

	/**
	 * ASCII-armored GPG private key, either a local filepath or a resource:// URI
	 *
	 * @var string
	 */
	public $KeyFile = "";

	/**
	 * One of the ENCRYPTIONMETHOD_ constants
	 *
	 * @var int
	 */
	public $KeyPasswordFormat = 0;

	/**
	 * Passphrase for the GPG private key; may be empty for passphrase-less keys
	 *
	 * @var string
	 */
	public $KeyPassword = "";

	/**
	 * GPG long key ID (16 hex characters) or a full 40-hex fingerprint; only the trailing 16 hex
	 * characters are used at signing time
	 *
	 * @var string
	 */
	public $KeyID = "";

	/**
	 * Preserve unknown properties when dealing with future server versions.
	 *
	 * @see LinuxRpmCodeSignProperties::RemoveUnknownProperties() Remove all unknown properties
	 * @var array
	 */
	private $__unknown_properties = [];

	/**
	 * Replace the content of this LinuxRpmCodeSignProperties object from a PHP \stdClass.
	 * The data could be supplied from an API call after json_decode(...); or generated manually.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return void
	 */
	protected function inflateFrom(\stdClass $sc)
	{
		if (property_exists($sc, 'Method')) {
			$this->Method = (int)($sc->Method);
		}
		if (property_exists($sc, 'KeyFile')) {
			$this->KeyFile = (string)($sc->KeyFile);
		}
		if (property_exists($sc, 'KeyPasswordFormat')) {
			$this->KeyPasswordFormat = (int)($sc->KeyPasswordFormat);
		}
		if (property_exists($sc, 'KeyPassword')) {
			$this->KeyPassword = (string)($sc->KeyPassword);
		}
		if (property_exists($sc, 'KeyID')) {
			$this->KeyID = (string)($sc->KeyID);
		}
		foreach(get_object_vars($sc) as $k => $v) {
			switch($k) {
			case 'Method':
			case 'KeyFile':
			case 'KeyPasswordFormat':
			case 'KeyPassword':
			case 'KeyID':
				break;
			default:
				$this->__unknown_properties[$k] = $v;
			}
		}
	}

	/**
	 * Coerce a stdClass into a new strongly-typed LinuxRpmCodeSignProperties object.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return LinuxRpmCodeSignProperties
	 */
	public static function createFromStdclass(\stdClass $sc): \Comet\LinuxRpmCodeSignProperties
	{
		$retn = new LinuxRpmCodeSignProperties();
		$retn->inflateFrom($sc);
		return $retn;
	}

	/**
	 * Coerce a plain PHP array into a new strongly-typed LinuxRpmCodeSignProperties object.
	 * Because the Comet Server requires strict distinction between empty objects ({}) and arrays ([]),
	 * the result of this method may not be safe to re-submit to the Comet Server.
	 *
	 * @param array $arr Object data as PHP array
	 * @return LinuxRpmCodeSignProperties
	 */
	public static function createFromArray(array $arr): \Comet\LinuxRpmCodeSignProperties
	{
		$stdClass = json_decode(json_encode($arr, JSON_UNESCAPED_SLASHES));
		if (is_array($stdClass) && count($stdClass) === 0) {
			$stdClass = new \stdClass();
		}
		return self::createFromStdclass($stdClass);
	}

	/**
	 * Coerce a JSON string into a new strongly-typed LinuxRpmCodeSignProperties object.
	 *
	 * @param string $JsonString Object data as JSON string
	 * @return LinuxRpmCodeSignProperties
	 */
	public static function createFromJSON(string $JsonString): \Comet\LinuxRpmCodeSignProperties
	{
		$decodedJsonObject = json_decode($JsonString); // as stdClass
		if (\json_last_error() != \JSON_ERROR_NONE) {
			throw new \Exception("JSON decode failed: " . \json_last_error_msg(), \json_last_error());
		}
		$retn = new LinuxRpmCodeSignProperties();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}

	/**
	 * Convert this LinuxRpmCodeSignProperties object into a plain PHP array.
	 *
	 * Unknown properties may still be represented as \stdClass objects.
	 *
	 * @param bool $for_json_encode Represent key-value maps as \stdClass instead of plain PHP arrays
	 * @return array
	 */
	public function toArray(bool $for_json_encode = false): array
	{
		$ret = [];
		$ret["Method"] = $this->Method;
		$ret["KeyFile"] = $this->KeyFile;
		$ret["KeyPasswordFormat"] = $this->KeyPasswordFormat;
		$ret["KeyPassword"] = $this->KeyPassword;
		$ret["KeyID"] = $this->KeyID;

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

