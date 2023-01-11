<?php

/**
 * Copyright (c) 2018-2023 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 *
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

class SSHConnection {

	/**
	 * @var string
	 */
	public $SSHServer = "";

	/**
	 * @var string
	 */
	public $SSHUsername = "";

	/**
	 * @var int
	 */
	public $SSHAuthMode = 0;

	/**
	 * @var string
	 */
	public $SSHPassword = "";

	/**
	 * @var string
	 */
	public $SSHPrivateKey = "";

	/**
	 * @var boolean
	 */
	public $SSHCustomAuth_UseKnownHostsFile = false;

	/**
	 * @var string
	 */
	public $SSHCustomAuth_KnownHostsFile = "";

	/**
	 * Preserve unknown properties when dealing with future server versions.
	 *
	 * @see SSHConnection::RemoveUnknownProperties() Remove all unknown properties
	 * @var array
	 */
	private $__unknown_properties = [];

	/**
	 * Replace the content of this SSHConnection object from a PHP \stdClass.
	 * The data could be supplied from an API call after json_decode(...); or generated manually.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return void
	 */
	protected function inflateFrom(\stdClass $sc)
	{
		if (property_exists($sc, 'SSHServer')) {
			$this->SSHServer = (string)($sc->SSHServer);
		}
		if (property_exists($sc, 'SSHUsername')) {
			$this->SSHUsername = (string)($sc->SSHUsername);
		}
		if (property_exists($sc, 'SSHAuthMode')) {
			$this->SSHAuthMode = (int)($sc->SSHAuthMode);
		}
		if (property_exists($sc, 'SSHPassword')) {
			$this->SSHPassword = (string)($sc->SSHPassword);
		}
		if (property_exists($sc, 'SSHPrivateKey')) {
			$this->SSHPrivateKey = (string)($sc->SSHPrivateKey);
		}
		if (property_exists($sc, 'SSHCustomAuth_UseKnownHostsFile')) {
			$this->SSHCustomAuth_UseKnownHostsFile = (bool)($sc->SSHCustomAuth_UseKnownHostsFile);
		}
		if (property_exists($sc, 'SSHCustomAuth_KnownHostsFile')) {
			$this->SSHCustomAuth_KnownHostsFile = (string)($sc->SSHCustomAuth_KnownHostsFile);
		}
		foreach(get_object_vars($sc) as $k => $v) {
			switch($k) {
			case 'SSHServer':
			case 'SSHUsername':
			case 'SSHAuthMode':
			case 'SSHPassword':
			case 'SSHPrivateKey':
			case 'SSHCustomAuth_UseKnownHostsFile':
			case 'SSHCustomAuth_KnownHostsFile':
				break;
			default:
				$this->__unknown_properties[$k] = $v;
			}
		}
	}

	/**
	 * Coerce a stdClass into a new strongly-typed SSHConnection object.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return SSHConnection
	 */
	public static function createFromStdclass(\stdClass $sc): \Comet\SSHConnection
	{
		$retn = new SSHConnection();
		$retn->inflateFrom($sc);
		return $retn;
	}

	/**
	 * Coerce a plain PHP array into a new strongly-typed SSHConnection object.
	 * Because the Comet Server requires strict distinction between empty objects ({}) and arrays ([]),
	 * the result of this method may not be safe to re-submit to the Comet Server.
	 *
	 * @param array $arr Object data as PHP array
	 * @return SSHConnection
	 */
	public static function createFromArray(array $arr): \Comet\SSHConnection
	{
		$stdClass = json_decode(json_encode($arr, JSON_UNESCAPED_SLASHES));
		if (is_array($stdClass) && count($stdClass) === 0) {
			$stdClass = new \stdClass();
		}
		return self::createFromStdclass($stdClass);
	}

	/**
	 * Coerce a JSON string into a new strongly-typed SSHConnection object.
	 *
	 * @param string $JsonString Object data as JSON string
	 * @return SSHConnection
	 */
	public static function createFromJSON(string $JsonString): \Comet\SSHConnection
	{
		$decodedJsonObject = json_decode($JsonString); // as stdClass
		if (\json_last_error() != \JSON_ERROR_NONE) {
			throw new \Exception("JSON decode failed: " . \json_last_error_msg(), \json_last_error());
		}
		$retn = new SSHConnection();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}

	/**
	 * Convert this SSHConnection object into a plain PHP array.
	 *
	 * Unknown properties may still be represented as \stdClass objects.
	 *
	 * @param bool $for_json_encode Represent empty key-value maps as \stdClass instead of plain PHP arrays
	 * @return array
	 */
	public function toArray(bool $for_json_encode = false): array
	{
		$ret = [];
		$ret["SSHServer"] = $this->SSHServer;
		$ret["SSHUsername"] = $this->SSHUsername;
		$ret["SSHAuthMode"] = $this->SSHAuthMode;
		$ret["SSHPassword"] = $this->SSHPassword;
		$ret["SSHPrivateKey"] = $this->SSHPrivateKey;
		$ret["SSHCustomAuth_UseKnownHostsFile"] = $this->SSHCustomAuth_UseKnownHostsFile;
		$ret["SSHCustomAuth_KnownHostsFile"] = $this->SSHCustomAuth_KnownHostsFile;

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

