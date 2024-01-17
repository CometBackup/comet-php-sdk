<?php

/**
 * Copyright (c) 2018-2024 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 *
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

class VMwareConnection {

	/**
	 * One of the VMWARE_CONNECTION_ constants
	 *
	 * @var string
	 */
	public $ConnectionType = "";

	/**
	 * @var \Comet\SSHConnection
	 * @deprecated 23.9.11 This member has been deprecated since Comet version 23.9.11
	 */
	public $SSH = null;

	/**
	 * @var \Comet\VSphereConnection
	 */
	public $VSphere = null;

	/**
	 * Preserve unknown properties when dealing with future server versions.
	 *
	 * @see VMwareConnection::RemoveUnknownProperties() Remove all unknown properties
	 * @var array
	 */
	private $__unknown_properties = [];

	/**
	 * Replace the content of this VMwareConnection object from a PHP \stdClass.
	 * The data could be supplied from an API call after json_decode(...); or generated manually.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return void
	 */
	protected function inflateFrom(\stdClass $sc)
	{
		if (property_exists($sc, 'ConnectionType')) {
			$this->ConnectionType = (string)($sc->ConnectionType);
		}
		if (property_exists($sc, 'SSH')) {
			if (is_array($sc->SSH) && count($sc->SSH) === 0) {
			// Work around edge case in json_decode--json_encode stdClass conversion
				$this->SSH = \Comet\SSHConnection::createFromStdclass(new \stdClass());
			} else {
				$this->SSH = \Comet\SSHConnection::createFromStdclass($sc->SSH);
			}
		}
		if (property_exists($sc, 'VSphere')) {
			if (is_array($sc->VSphere) && count($sc->VSphere) === 0) {
			// Work around edge case in json_decode--json_encode stdClass conversion
				$this->VSphere = \Comet\VSphereConnection::createFromStdclass(new \stdClass());
			} else {
				$this->VSphere = \Comet\VSphereConnection::createFromStdclass($sc->VSphere);
			}
		}
		foreach(get_object_vars($sc) as $k => $v) {
			switch($k) {
			case 'ConnectionType':
			case 'SSH':
			case 'VSphere':
				break;
			default:
				$this->__unknown_properties[$k] = $v;
			}
		}
	}

	/**
	 * Coerce a stdClass into a new strongly-typed VMwareConnection object.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return VMwareConnection
	 */
	public static function createFromStdclass(\stdClass $sc): \Comet\VMwareConnection
	{
		$retn = new VMwareConnection();
		$retn->inflateFrom($sc);
		return $retn;
	}

	/**
	 * Coerce a plain PHP array into a new strongly-typed VMwareConnection object.
	 * Because the Comet Server requires strict distinction between empty objects ({}) and arrays ([]),
	 * the result of this method may not be safe to re-submit to the Comet Server.
	 *
	 * @param array $arr Object data as PHP array
	 * @return VMwareConnection
	 */
	public static function createFromArray(array $arr): \Comet\VMwareConnection
	{
		$stdClass = json_decode(json_encode($arr, JSON_UNESCAPED_SLASHES));
		if (is_array($stdClass) && count($stdClass) === 0) {
			$stdClass = new \stdClass();
		}
		return self::createFromStdclass($stdClass);
	}

	/**
	 * Coerce a JSON string into a new strongly-typed VMwareConnection object.
	 *
	 * @param string $JsonString Object data as JSON string
	 * @return VMwareConnection
	 */
	public static function createFromJSON(string $JsonString): \Comet\VMwareConnection
	{
		$decodedJsonObject = json_decode($JsonString); // as stdClass
		if (\json_last_error() != \JSON_ERROR_NONE) {
			throw new \Exception("JSON decode failed: " . \json_last_error_msg(), \json_last_error());
		}
		$retn = new VMwareConnection();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}

	/**
	 * Convert this VMwareConnection object into a plain PHP array.
	 *
	 * Unknown properties may still be represented as \stdClass objects.
	 *
	 * @param bool $for_json_encode Represent empty key-value maps as \stdClass instead of plain PHP arrays
	 * @return array
	 */
	public function toArray(bool $for_json_encode = false): array
	{
		$ret = [];
		$ret["ConnectionType"] = $this->ConnectionType;
		if ( $this->SSH === null ) {
			$ret["SSH"] = $for_json_encode ? (object)[] : [];
		} else {
			$ret["SSH"] = $this->SSH->toArray($for_json_encode);
		}
		if ( $this->VSphere === null ) {
			$ret["VSphere"] = $for_json_encode ? (object)[] : [];
		} else {
			$ret["VSphere"] = $this->VSphere->toArray($for_json_encode);
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
		if ($this->SSH !== null) {
			$this->SSH->RemoveUnknownProperties();
		}
		if ($this->VSphere !== null) {
			$this->VSphere->RemoveUnknownProperties();
		}
	}

}

