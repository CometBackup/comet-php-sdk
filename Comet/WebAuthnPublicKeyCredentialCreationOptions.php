<?php

/**
 * Copyright (c) 2018-2025 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 *
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

class WebAuthnPublicKeyCredentialCreationOptions {

	/**
	 * @var string
	 */
	public $Challenge = "";

	/**
	 * @var \Comet\WebAuthnRelyingPartyEntity
	 */
	public $RelyingParty = null;

	/**
	 * @var \Comet\WebAuthnUserEntity
	 */
	public $User = null;

	/**
	 * @var \Comet\WebAuthnCredentialParameter[]
	 */
	public $Parameters = [];

	/**
	 * @var \Comet\WebAuthnAuthenticatorSelection
	 */
	public $AuthenticatorSelection = null;

	/**
	 * @var int
	 */
	public $Timeout = 0;

	/**
	 * @var \Comet\WebAuthnCredentialDescriptor[]
	 */
	public $CredentialExcludeList = [];

	/**
	 * @var array<string, mixed>
	 */
	public $Extensions = [];

	/**
	 * @var string
	 */
	public $Attestation = "";

	/**
	 * Preserve unknown properties when dealing with future server versions.
	 *
	 * @see WebAuthnPublicKeyCredentialCreationOptions::RemoveUnknownProperties() Remove all unknown properties
	 * @var array
	 */
	private $__unknown_properties = [];

	/**
	 * Replace the content of this WebAuthnPublicKeyCredentialCreationOptions object from a PHP \stdClass.
	 * The data could be supplied from an API call after json_decode(...); or generated manually.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return void
	 */
	protected function inflateFrom(\stdClass $sc)
	{
		if (property_exists($sc, 'challenge')) {
			$this->Challenge = base64_decode($sc->challenge);
		}
		if (property_exists($sc, 'rp')) {
			if (is_array($sc->rp) && count($sc->rp) === 0) {
			// Work around edge case in json_decode--json_encode stdClass conversion
				$this->RelyingParty = \Comet\WebAuthnRelyingPartyEntity::createFromStdclass(new \stdClass());
			} else {
				$this->RelyingParty = \Comet\WebAuthnRelyingPartyEntity::createFromStdclass($sc->rp);
			}
		}
		if (property_exists($sc, 'user')) {
			if (is_array($sc->user) && count($sc->user) === 0) {
			// Work around edge case in json_decode--json_encode stdClass conversion
				$this->User = \Comet\WebAuthnUserEntity::createFromStdclass(new \stdClass());
			} else {
				$this->User = \Comet\WebAuthnUserEntity::createFromStdclass($sc->user);
			}
		}
		if (property_exists($sc, 'pubKeyCredParams') && !is_null($sc->pubKeyCredParams)) {
			$val_2 = [];
			if ($sc->pubKeyCredParams !== null) {
				for($i_2 = 0; $i_2 < count($sc->pubKeyCredParams); ++$i_2) {
					if (is_array($sc->pubKeyCredParams[$i_2]) && count($sc->pubKeyCredParams[$i_2]) === 0) {
					// Work around edge case in json_decode--json_encode stdClass conversion
						$val_2[] = \Comet\WebAuthnCredentialParameter::createFromStdclass(new \stdClass());
					} else {
						$val_2[] = \Comet\WebAuthnCredentialParameter::createFromStdclass($sc->pubKeyCredParams[$i_2]);
					}
				}
			}
			$this->Parameters = $val_2;
		}
		if (property_exists($sc, 'authenticatorSelection') && !is_null($sc->authenticatorSelection)) {
			if (is_array($sc->authenticatorSelection) && count($sc->authenticatorSelection) === 0) {
			// Work around edge case in json_decode--json_encode stdClass conversion
				$this->AuthenticatorSelection = \Comet\WebAuthnAuthenticatorSelection::createFromStdclass(new \stdClass());
			} else {
				$this->AuthenticatorSelection = \Comet\WebAuthnAuthenticatorSelection::createFromStdclass($sc->authenticatorSelection);
			}
		}
		if (property_exists($sc, 'timeout') && !is_null($sc->timeout)) {
			$this->Timeout = (int)($sc->timeout);
		}
		if (property_exists($sc, 'excludeCredentials') && !is_null($sc->excludeCredentials)) {
			$val_2 = [];
			if ($sc->excludeCredentials !== null) {
				for($i_2 = 0; $i_2 < count($sc->excludeCredentials); ++$i_2) {
					if (is_array($sc->excludeCredentials[$i_2]) && count($sc->excludeCredentials[$i_2]) === 0) {
					// Work around edge case in json_decode--json_encode stdClass conversion
						$val_2[] = \Comet\WebAuthnCredentialDescriptor::createFromStdclass(new \stdClass());
					} else {
						$val_2[] = \Comet\WebAuthnCredentialDescriptor::createFromStdclass($sc->excludeCredentials[$i_2]);
					}
				}
			}
			$this->CredentialExcludeList = $val_2;
		}
		if (property_exists($sc, 'extensions') && !is_null($sc->extensions)) {
			$val_2 = [];
			if ($sc->extensions !== null) {
				foreach($sc->extensions as $k_2 => $v_2) {
					$phpk_2 = (string)($k_2);
					$phpv_2 = $v_2; // May be any type
					$val_2[$phpk_2] = $phpv_2;
				}
			}
			$this->Extensions = $val_2;
		}
		if (property_exists($sc, 'attestation') && !is_null($sc->attestation)) {
			$this->Attestation = (string)($sc->attestation);
		}
		foreach(get_object_vars($sc) as $k => $v) {
			switch($k) {
			case 'challenge':
			case 'rp':
			case 'user':
			case 'pubKeyCredParams':
			case 'authenticatorSelection':
			case 'timeout':
			case 'excludeCredentials':
			case 'extensions':
			case 'attestation':
				break;
			default:
				$this->__unknown_properties[$k] = $v;
			}
		}
	}

	/**
	 * Coerce a stdClass into a new strongly-typed WebAuthnPublicKeyCredentialCreationOptions object.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return WebAuthnPublicKeyCredentialCreationOptions
	 */
	public static function createFromStdclass(\stdClass $sc): \Comet\WebAuthnPublicKeyCredentialCreationOptions
	{
		$retn = new WebAuthnPublicKeyCredentialCreationOptions();
		$retn->inflateFrom($sc);
		return $retn;
	}

	/**
	 * Coerce a plain PHP array into a new strongly-typed WebAuthnPublicKeyCredentialCreationOptions object.
	 * Because the Comet Server requires strict distinction between empty objects ({}) and arrays ([]),
	 * the result of this method may not be safe to re-submit to the Comet Server.
	 *
	 * @param array $arr Object data as PHP array
	 * @return WebAuthnPublicKeyCredentialCreationOptions
	 */
	public static function createFromArray(array $arr): \Comet\WebAuthnPublicKeyCredentialCreationOptions
	{
		$stdClass = json_decode(json_encode($arr, JSON_UNESCAPED_SLASHES));
		if (is_array($stdClass) && count($stdClass) === 0) {
			$stdClass = new \stdClass();
		}
		return self::createFromStdclass($stdClass);
	}

	/**
	 * Coerce a JSON string into a new strongly-typed WebAuthnPublicKeyCredentialCreationOptions object.
	 *
	 * @param string $JsonString Object data as JSON string
	 * @return WebAuthnPublicKeyCredentialCreationOptions
	 */
	public static function createFromJSON(string $JsonString): \Comet\WebAuthnPublicKeyCredentialCreationOptions
	{
		$decodedJsonObject = json_decode($JsonString); // as stdClass
		if (\json_last_error() != \JSON_ERROR_NONE) {
			throw new \Exception("JSON decode failed: " . \json_last_error_msg(), \json_last_error());
		}
		$retn = new WebAuthnPublicKeyCredentialCreationOptions();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}

	/**
	 * Convert this WebAuthnPublicKeyCredentialCreationOptions object into a plain PHP array.
	 *
	 * Unknown properties may still be represented as \stdClass objects.
	 *
	 * @param bool $for_json_encode Represent key-value maps as \stdClass instead of plain PHP arrays
	 * @return array
	 */
	public function toArray(bool $for_json_encode = false): array
	{
		$ret = [];
		$ret["challenge"] = base64_encode($this->Challenge);
		if ( $this->RelyingParty === null ) {
			$ret["rp"] = $for_json_encode ? (object)[] : [];
		} else {
			$ret["rp"] = $this->RelyingParty->toArray($for_json_encode);
		}
		if ( $this->User === null ) {
			$ret["user"] = $for_json_encode ? (object)[] : [];
		} else {
			$ret["user"] = $this->User->toArray($for_json_encode);
		}
		{
			$c0 = [];
			for($i0 = 0; $i0 < count($this->Parameters); ++$i0) {
				if ( $this->Parameters[$i0] === null ) {
					$val0 = $for_json_encode ? (object)[] : [];
				} else {
					$val0 = $this->Parameters[$i0]->toArray($for_json_encode);
				}
				$c0[] = $val0;
			}
			$ret["pubKeyCredParams"] = $c0;
		}
		if ( $this->AuthenticatorSelection === null ) {
			$ret["authenticatorSelection"] = $for_json_encode ? (object)[] : [];
		} else {
			$ret["authenticatorSelection"] = $this->AuthenticatorSelection->toArray($for_json_encode);
		}
		$ret["timeout"] = $this->Timeout;
		{
			$c0 = [];
			for($i0 = 0; $i0 < count($this->CredentialExcludeList); ++$i0) {
				if ( $this->CredentialExcludeList[$i0] === null ) {
					$val0 = $for_json_encode ? (object)[] : [];
				} else {
					$val0 = $this->CredentialExcludeList[$i0]->toArray($for_json_encode);
				}
				$c0[] = $val0;
			}
			$ret["excludeCredentials"] = $c0;
		}
		{
			$c0 = $for_json_encode ? (object)[] : [];
			foreach($this->Extensions as $k0 => $v0) {
				$ko_0 = $k0;
				$vo_0 = $v0;
				if ($for_json_encode) {
				$c0->{ $ko_0 } = $vo_0;
				} else {
					$c0[ $ko_0 ] = $vo_0;
				}
			}
			$ret["extensions"] = $c0;
		}
		$ret["attestation"] = $this->Attestation;

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
		if ($this->RelyingParty !== null) {
			$this->RelyingParty->RemoveUnknownProperties();
		}
		if ($this->User !== null) {
			$this->User->RemoveUnknownProperties();
		}
		if ($this->AuthenticatorSelection !== null) {
			$this->AuthenticatorSelection->RemoveUnknownProperties();
		}
	}

}

