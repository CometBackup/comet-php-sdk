<?php

/**
 * Copyright (c) 2018-2025 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 *
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

class AdminAccountPropertiesResponse {

	/**
	 * @var string
	 */
	public $OrganizationID = "";

	/**
	 * @var \Comet\AdminUserPermissions
	 */
	public $Permissions = null;

	/**
	 * @var \Comet\AdminSecurityOptions
	 * This field is available in Comet 18.9.9 and later.
	 */
	public $Security = null;

	/**
	 * Preserve unknown properties when dealing with future server versions.
	 *
	 * @see AdminAccountPropertiesResponse::RemoveUnknownProperties() Remove all unknown properties
	 * @var array
	 */
	private $__unknown_properties = [];

	/**
	 * Replace the content of this AdminAccountPropertiesResponse object from a PHP \stdClass.
	 * The data could be supplied from an API call after json_decode(...); or generated manually.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return void
	 */
	protected function inflateFrom(\stdClass $sc)
	{
		if (property_exists($sc, 'OrganizationID')) {
			$this->OrganizationID = (string)($sc->OrganizationID);
		}
		if (property_exists($sc, 'Permissions')) {
			if (is_array($sc->Permissions) && count($sc->Permissions) === 0) {
			// Work around edge case in json_decode--json_encode stdClass conversion
				$this->Permissions = \Comet\AdminUserPermissions::createFromStdclass(new \stdClass());
			} else {
				$this->Permissions = \Comet\AdminUserPermissions::createFromStdclass($sc->Permissions);
			}
		}
		if (property_exists($sc, 'Security')) {
			if (is_array($sc->Security) && count($sc->Security) === 0) {
			// Work around edge case in json_decode--json_encode stdClass conversion
				$this->Security = \Comet\AdminSecurityOptions::createFromStdclass(new \stdClass());
			} else {
				$this->Security = \Comet\AdminSecurityOptions::createFromStdclass($sc->Security);
			}
		}
		foreach(get_object_vars($sc) as $k => $v) {
			switch($k) {
			case 'OrganizationID':
			case 'Permissions':
			case 'Security':
				break;
			default:
				$this->__unknown_properties[$k] = $v;
			}
		}
	}

	/**
	 * Coerce a stdClass into a new strongly-typed AdminAccountPropertiesResponse object.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return AdminAccountPropertiesResponse
	 */
	public static function createFromStdclass(\stdClass $sc): \Comet\AdminAccountPropertiesResponse
	{
		$retn = new AdminAccountPropertiesResponse();
		$retn->inflateFrom($sc);
		return $retn;
	}

	/**
	 * Coerce a plain PHP array into a new strongly-typed AdminAccountPropertiesResponse object.
	 * Because the Comet Server requires strict distinction between empty objects ({}) and arrays ([]),
	 * the result of this method may not be safe to re-submit to the Comet Server.
	 *
	 * @param array $arr Object data as PHP array
	 * @return AdminAccountPropertiesResponse
	 */
	public static function createFromArray(array $arr): \Comet\AdminAccountPropertiesResponse
	{
		$stdClass = json_decode(json_encode($arr, JSON_UNESCAPED_SLASHES));
		if (is_array($stdClass) && count($stdClass) === 0) {
			$stdClass = new \stdClass();
		}
		return self::createFromStdclass($stdClass);
	}

	/**
	 * Coerce a JSON string into a new strongly-typed AdminAccountPropertiesResponse object.
	 *
	 * @param string $JsonString Object data as JSON string
	 * @return AdminAccountPropertiesResponse
	 */
	public static function createFromJSON(string $JsonString): \Comet\AdminAccountPropertiesResponse
	{
		$decodedJsonObject = json_decode($JsonString); // as stdClass
		if (\json_last_error() != \JSON_ERROR_NONE) {
			throw new \Exception("JSON decode failed: " . \json_last_error_msg(), \json_last_error());
		}
		$retn = new AdminAccountPropertiesResponse();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}

	/**
	 * Convert this AdminAccountPropertiesResponse object into a plain PHP array.
	 *
	 * Unknown properties may still be represented as \stdClass objects.
	 *
	 * @param bool $for_json_encode Represent key-value maps as \stdClass instead of plain PHP arrays
	 * @return array
	 */
	public function toArray(bool $for_json_encode = false): array
	{
		$ret = [];
		$ret["OrganizationID"] = $this->OrganizationID;
		if ( $this->Permissions === null ) {
			$ret["Permissions"] = $for_json_encode ? (object)[] : [];
		} else {
			$ret["Permissions"] = $this->Permissions->toArray($for_json_encode);
		}
		if ( $this->Security === null ) {
			$ret["Security"] = $for_json_encode ? (object)[] : [];
		} else {
			$ret["Security"] = $this->Security->toArray($for_json_encode);
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
		if ($this->Permissions !== null) {
			$this->Permissions->RemoveUnknownProperties();
		}
		if ($this->Security !== null) {
			$this->Security->RemoveUnknownProperties();
		}
	}

}

