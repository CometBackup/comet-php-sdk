<?php

/**
 * Copyright (c) 2018-2022 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 *
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

class AdminWebAuthnRegistration {

	/**
	 * @var string
	 */
	public $Description = "";

	/**
	 * @var int
	 */
	public $RegisterTime = 0;

	/**
	 * @var int
	 */
	public $Type = 0;

	/**
	 * @var boolean
	 */
	public $IsLegacyU2F = false;

	/**
	 * @var string
	 */
	public $ID = "";

	/**
	 * @var \Comet\WebAuthnCredential
	 */
	public $Credential = null;

	/**
	 * Preserve unknown properties when dealing with future server versions.
	 *
	 * @see AdminWebAuthnRegistration::RemoveUnknownProperties() Remove all unknown properties
	 * @var array
	 */
	private $__unknown_properties = [];

	/**
	 * Replace the content of this AdminWebAuthnRegistration object from a PHP \stdClass.
	 * The data could be supplied from an API call after json_decode(...); or generated manually.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return void
	 */
	protected function inflateFrom(\stdClass $sc)
	{
		if (property_exists($sc, 'Description')) {
			$this->Description = (string)($sc->Description);
		}
		if (property_exists($sc, 'RegisterTime')) {
			$this->RegisterTime = (int)($sc->RegisterTime);
		}
		if (property_exists($sc, 'Type')) {
			$this->Type = (int)($sc->Type);
		}
		if (property_exists($sc, 'IsLegacyU2F') && !is_null($sc->IsLegacyU2F)) {
			$this->IsLegacyU2F = (bool)($sc->IsLegacyU2F);
		}
		if (property_exists($sc, 'ID') && !is_null($sc->ID)) {
			$this->ID = base64_decode($sc->ID);
		}
		if (property_exists($sc, 'Credential') && !is_null($sc->Credential)) {
			if (is_array($sc->Credential) && count($sc->Credential) === 0) {
			// Work around edge case in json_decode--json_encode stdClass conversion
				$this->Credential = \Comet\WebAuthnCredential::createFromStdclass(new \stdClass());
			} else {
				$this->Credential = \Comet\WebAuthnCredential::createFromStdclass($sc->Credential);
			}
		}
		foreach(get_object_vars($sc) as $k => $v) {
			switch($k) {
			case 'Description':
			case 'RegisterTime':
			case 'Type':
			case 'IsLegacyU2F':
			case 'ID':
			case 'Credential':
				break;
			default:
				$this->__unknown_properties[$k] = $v;
			}
		}
	}

	/**
	 * Coerce a stdClass into a new strongly-typed AdminWebAuthnRegistration object.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return AdminWebAuthnRegistration
	 */
	public static function createFromStdclass(\stdClass $sc): \Comet\AdminWebAuthnRegistration
	{
		$retn = new AdminWebAuthnRegistration();
		$retn->inflateFrom($sc);
		return $retn;
	}

	/**
	 * Coerce a plain PHP array into a new strongly-typed AdminWebAuthnRegistration object.
	 * Because the Comet Server requires strict distinction between empty objects ({}) and arrays ([]),
	 * the result of this method may not be safe to re-submit to the Comet Server.
	 *
	 * @param array $arr Object data as PHP array
	 * @return AdminWebAuthnRegistration
	 */
	public static function createFromArray(array $arr): \Comet\AdminWebAuthnRegistration
	{
		$stdClass = json_decode(json_encode($arr, JSON_UNESCAPED_SLASHES));
		if (is_array($stdClass) && count($stdClass) === 0) {
			$stdClass = new \stdClass();
		}
		return self::createFromStdclass($stdClass);
	}

	/**
	 * Coerce a JSON string into a new strongly-typed AdminWebAuthnRegistration object.
	 *
	 * @param string $JsonString Object data as JSON string
	 * @return AdminWebAuthnRegistration
	 */
	public static function createFromJSON(string $JsonString): \Comet\AdminWebAuthnRegistration
	{
		$decodedJsonObject = json_decode($JsonString); // as stdClass
		if (\json_last_error() != \JSON_ERROR_NONE) {
			throw new \Exception("JSON decode failed: " . \json_last_error_msg());
		}
		$retn = new AdminWebAuthnRegistration();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}

	/**
	 * Convert this AdminWebAuthnRegistration object into a plain PHP array.
	 *
	 * Unknown properties may still be represented as \stdClass objects.
	 *
	 * @param bool $for_json_encode Represent empty key-value maps as \stdClass instead of plain PHP arrays
	 * @return array
	 */
	public function toArray(bool $for_json_encode = false): array
	{
		$ret = [];
		$ret["Description"] = $this->Description;
		$ret["RegisterTime"] = $this->RegisterTime;
		$ret["Type"] = $this->Type;
		$ret["IsLegacyU2F"] = $this->IsLegacyU2F;
		$ret["ID"] = base64_encode($this->ID);
		if ( $this->Credential === null ) {
			$ret["Credential"] = $for_json_encode ? (object)[] : [];
		} else {
			$ret["Credential"] = $this->Credential->toArray($for_json_encode);
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
		if ($this->Credential !== null) {
			$this->Credential->RemoveUnknownProperties();
		}
	}

}

