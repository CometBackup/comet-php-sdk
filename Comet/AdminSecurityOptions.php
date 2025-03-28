<?php

/**
 * Copyright (c) 2018-2025 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 *
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

class AdminSecurityOptions {

	/**
	 * One of the PASSWORD_FORMAT_ constants
	 *
	 * @var int
	 */
	public $PasswordFormat = 0;

	/**
	 * @var string
	 */
	public $Password = "";

	/**
	 * @var boolean
	 */
	public $AllowPasswordLogin = false;

	/**
	 * @var boolean
	 */
	public $AllowPasswordAndTOTPLogin = false;

	/**
	 * @var boolean
	 * @deprecated 21.12.0 This member has been deprecated since Comet version 21.12.0
	 */
	public $AllowPasswordAndU2FLogin = false;

	/**
	 * @var boolean
	 */
	public $AllowPasswordAndWebAuthnLogin = false;

	/**
	 * @var \Comet\AdminU2FRegistration[]
	 * @deprecated 21.12.0 This member has been deprecated since Comet version 21.12.0
	 */
	public $U2FRegistrations = [];

	/**
	 * @var \Comet\AdminWebAuthnRegistration[]
	 */
	public $WebAuthnRegistrations = [];

	/**
	 * @var boolean
	 * This field is available in Comet 24.12.0 and later.
	 */
	public $RequirePasswordChange = false;

	/**
	 * One of the ENCRYPTIONMETHOD_ constants
	 *
	 * @var int
	 */
	public $TOTPKeyEncryptionFormat = 0;

	/**
	 * @var string
	 */
	public $TOTPKey = "";

	/**
	 * A regular expression in Go regex syntax, for which IP addresses are allowed to authenticate as
	 * this admin account
	 *
	 * @var string
	 */
	public $IPWhitelist = "";

	/**
	 * Preserve unknown properties when dealing with future server versions.
	 *
	 * @see AdminSecurityOptions::RemoveUnknownProperties() Remove all unknown properties
	 * @var array
	 */
	private $__unknown_properties = [];

	/**
	 * Replace the content of this AdminSecurityOptions object from a PHP \stdClass.
	 * The data could be supplied from an API call after json_decode(...); or generated manually.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return void
	 */
	protected function inflateFrom(\stdClass $sc)
	{
		if (property_exists($sc, 'PasswordFormat')) {
			$this->PasswordFormat = (int)($sc->PasswordFormat);
		}
		if (property_exists($sc, 'Password')) {
			$this->Password = (string)($sc->Password);
		}
		if (property_exists($sc, 'AllowPasswordLogin')) {
			$this->AllowPasswordLogin = (bool)($sc->AllowPasswordLogin);
		}
		if (property_exists($sc, 'AllowPasswordAndTOTPLogin')) {
			$this->AllowPasswordAndTOTPLogin = (bool)($sc->AllowPasswordAndTOTPLogin);
		}
		if (property_exists($sc, 'AllowPasswordAndU2FLogin')) {
			$this->AllowPasswordAndU2FLogin = (bool)($sc->AllowPasswordAndU2FLogin);
		}
		if (property_exists($sc, 'AllowPasswordAndWebAuthnLogin')) {
			$this->AllowPasswordAndWebAuthnLogin = (bool)($sc->AllowPasswordAndWebAuthnLogin);
		}
		if (property_exists($sc, 'U2FRegistrations') && !is_null($sc->U2FRegistrations)) {
			$val_2 = [];
			if ($sc->U2FRegistrations !== null) {
				for($i_2 = 0; $i_2 < count($sc->U2FRegistrations); ++$i_2) {
					if (is_array($sc->U2FRegistrations[$i_2]) && count($sc->U2FRegistrations[$i_2]) === 0) {
					// Work around edge case in json_decode--json_encode stdClass conversion
						$val_2[] = \Comet\AdminU2FRegistration::createFromStdclass(new \stdClass());
					} else {
						$val_2[] = \Comet\AdminU2FRegistration::createFromStdclass($sc->U2FRegistrations[$i_2]);
					}
				}
			}
			$this->U2FRegistrations = $val_2;
		}
		if (property_exists($sc, 'WebAuthnRegistrations') && !is_null($sc->WebAuthnRegistrations)) {
			$val_2 = [];
			if ($sc->WebAuthnRegistrations !== null) {
				for($i_2 = 0; $i_2 < count($sc->WebAuthnRegistrations); ++$i_2) {
					if (is_array($sc->WebAuthnRegistrations[$i_2]) && count($sc->WebAuthnRegistrations[$i_2]) === 0) {
					// Work around edge case in json_decode--json_encode stdClass conversion
						$val_2[] = \Comet\AdminWebAuthnRegistration::createFromStdclass(new \stdClass());
					} else {
						$val_2[] = \Comet\AdminWebAuthnRegistration::createFromStdclass($sc->WebAuthnRegistrations[$i_2]);
					}
				}
			}
			$this->WebAuthnRegistrations = $val_2;
		}
		if (property_exists($sc, 'RequirePasswordChange')) {
			$this->RequirePasswordChange = (bool)($sc->RequirePasswordChange);
		}
		if (property_exists($sc, 'TOTPKeyEncryptionFormat') && !is_null($sc->TOTPKeyEncryptionFormat)) {
			$this->TOTPKeyEncryptionFormat = (int)($sc->TOTPKeyEncryptionFormat);
		}
		if (property_exists($sc, 'TOTPKey') && !is_null($sc->TOTPKey)) {
			$this->TOTPKey = (string)($sc->TOTPKey);
		}
		if (property_exists($sc, 'IPWhitelist') && !is_null($sc->IPWhitelist)) {
			$this->IPWhitelist = (string)($sc->IPWhitelist);
		}
		foreach(get_object_vars($sc) as $k => $v) {
			switch($k) {
			case 'PasswordFormat':
			case 'Password':
			case 'AllowPasswordLogin':
			case 'AllowPasswordAndTOTPLogin':
			case 'AllowPasswordAndU2FLogin':
			case 'AllowPasswordAndWebAuthnLogin':
			case 'U2FRegistrations':
			case 'WebAuthnRegistrations':
			case 'RequirePasswordChange':
			case 'TOTPKeyEncryptionFormat':
			case 'TOTPKey':
			case 'IPWhitelist':
				break;
			default:
				$this->__unknown_properties[$k] = $v;
			}
		}
	}

	/**
	 * Coerce a stdClass into a new strongly-typed AdminSecurityOptions object.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return AdminSecurityOptions
	 */
	public static function createFromStdclass(\stdClass $sc): \Comet\AdminSecurityOptions
	{
		$retn = new AdminSecurityOptions();
		$retn->inflateFrom($sc);
		return $retn;
	}

	/**
	 * Coerce a plain PHP array into a new strongly-typed AdminSecurityOptions object.
	 * Because the Comet Server requires strict distinction between empty objects ({}) and arrays ([]),
	 * the result of this method may not be safe to re-submit to the Comet Server.
	 *
	 * @param array $arr Object data as PHP array
	 * @return AdminSecurityOptions
	 */
	public static function createFromArray(array $arr): \Comet\AdminSecurityOptions
	{
		$stdClass = json_decode(json_encode($arr, JSON_UNESCAPED_SLASHES));
		if (is_array($stdClass) && count($stdClass) === 0) {
			$stdClass = new \stdClass();
		}
		return self::createFromStdclass($stdClass);
	}

	/**
	 * Coerce a JSON string into a new strongly-typed AdminSecurityOptions object.
	 *
	 * @param string $JsonString Object data as JSON string
	 * @return AdminSecurityOptions
	 */
	public static function createFromJSON(string $JsonString): \Comet\AdminSecurityOptions
	{
		$decodedJsonObject = json_decode($JsonString); // as stdClass
		if (\json_last_error() != \JSON_ERROR_NONE) {
			throw new \Exception("JSON decode failed: " . \json_last_error_msg(), \json_last_error());
		}
		$retn = new AdminSecurityOptions();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}

	/**
	 * Convert this AdminSecurityOptions object into a plain PHP array.
	 *
	 * Unknown properties may still be represented as \stdClass objects.
	 *
	 * @param bool $for_json_encode Represent key-value maps as \stdClass instead of plain PHP arrays
	 * @return array
	 */
	public function toArray(bool $for_json_encode = false): array
	{
		$ret = [];
		$ret["PasswordFormat"] = $this->PasswordFormat;
		$ret["Password"] = $this->Password;
		$ret["AllowPasswordLogin"] = $this->AllowPasswordLogin;
		$ret["AllowPasswordAndTOTPLogin"] = $this->AllowPasswordAndTOTPLogin;
		$ret["AllowPasswordAndU2FLogin"] = $this->AllowPasswordAndU2FLogin;
		$ret["AllowPasswordAndWebAuthnLogin"] = $this->AllowPasswordAndWebAuthnLogin;
		{
			$c0 = [];
			for($i0 = 0; $i0 < count($this->U2FRegistrations); ++$i0) {
				if ( $this->U2FRegistrations[$i0] === null ) {
					$val0 = $for_json_encode ? (object)[] : [];
				} else {
					$val0 = $this->U2FRegistrations[$i0]->toArray($for_json_encode);
				}
				$c0[] = $val0;
			}
			$ret["U2FRegistrations"] = $c0;
		}
		{
			$c0 = [];
			for($i0 = 0; $i0 < count($this->WebAuthnRegistrations); ++$i0) {
				if ( $this->WebAuthnRegistrations[$i0] === null ) {
					$val0 = $for_json_encode ? (object)[] : [];
				} else {
					$val0 = $this->WebAuthnRegistrations[$i0]->toArray($for_json_encode);
				}
				$c0[] = $val0;
			}
			$ret["WebAuthnRegistrations"] = $c0;
		}
		$ret["RequirePasswordChange"] = $this->RequirePasswordChange;
		$ret["TOTPKeyEncryptionFormat"] = $this->TOTPKeyEncryptionFormat;
		$ret["TOTPKey"] = $this->TOTPKey;
		$ret["IPWhitelist"] = $this->IPWhitelist;

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

