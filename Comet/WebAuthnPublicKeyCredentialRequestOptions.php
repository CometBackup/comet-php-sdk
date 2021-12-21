<?php

/**
 * Copyright (c) 2018-2021 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 *
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

class WebAuthnPublicKeyCredentialRequestOptions {

	/**
	 * @var string
	 */
	public $Challenge = "";

	/**
	 * @var int
	 */
	public $Timeout = 0;

	/**
	 * @var string
	 */
	public $RelyingPartyID = "";

	/**
	 * @var \Comet\WebAuthnCredentialDescriptor[]
	 */
	public $AllowedCredentials = [];

	/**
	 * @var string
	 */
	public $UserVerification = "";

	/**
	 * @var \Comet\interface[] An array with string keys.
	 */
	public $Extensions = [];

	/**
	 * Preserve unknown properties when dealing with future server versions.
	 *
	 * @see WebAuthnPublicKeyCredentialRequestOptions::RemoveUnknownProperties() Remove all unknown properties
	 * @var array
	 */
	private $__unknown_properties = [];

	/**
	 * Replace the content of this WebAuthnPublicKeyCredentialRequestOptions object from a PHP \stdClass.
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
		if (property_exists($sc, 'timeout') && !is_null($sc->timeout)) {
			$this->Timeout = (int)($sc->timeout);
		}
		if (property_exists($sc, 'rpId') && !is_null($sc->rpId)) {
			$this->RelyingPartyID = (string)($sc->rpId);
		}
		if (property_exists($sc, 'allowCredentials') && !is_null($sc->allowCredentials)) {
			$val_2 = [];
			if ($sc->allowCredentials !== null) {
				for($i_2 = 0; $i_2 < count($sc->allowCredentials); ++$i_2) {
					if (is_array($sc->allowCredentials[$i_2]) && count($sc->allowCredentials[$i_2]) === 0) {
					// Work around edge case in json_decode--json_encode stdClass conversion
						$val_2[] = \Comet\WebAuthnCredentialDescriptor::createFromStdclass(new \stdClass());
					} else {
						$val_2[] = \Comet\WebAuthnCredentialDescriptor::createFromStdclass($sc->allowCredentials[$i_2]);
					}
				}
			}
			$this->AllowedCredentials = $val_2;
		}
		if (property_exists($sc, 'userVerification') && !is_null($sc->userVerification)) {
			$this->UserVerification = (string)($sc->userVerification);
		}
		if (property_exists($sc, 'extensions') && !is_null($sc->extensions)) {
			$val_2 = [];
			if ($sc->extensions !== null) {
				foreach($sc->extensions as $k_2 => $v_2) {
					$phpk_2 = (string)($k_2);
					if (is_array($v_2) && count($v_2) === 0) {
					// Work around edge case in json_decode--json_encode stdClass conversion
						$phpv_2 = \Comet\interface::createFromStdclass(new \stdClass());
					} else {
						$phpv_2 = \Comet\interface::createFromStdclass($v_2);
					}
					$val_2[$phpk_2] = $phpv_2;
				}
			}
			$this->Extensions = $val_2;
		}
		foreach(get_object_vars($sc) as $k => $v) {
			switch($k) {
			case 'challenge':
			case 'timeout':
			case 'rpId':
			case 'allowCredentials':
			case 'userVerification':
			case 'extensions':
				break;
			default:
				$this->__unknown_properties[$k] = $v;
			}
		}
	}

	/**
	 * Coerce a stdClass into a new strongly-typed WebAuthnPublicKeyCredentialRequestOptions object.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return WebAuthnPublicKeyCredentialRequestOptions
	 */
	public static function createFromStdclass(\stdClass $sc)
	{
		$retn = new WebAuthnPublicKeyCredentialRequestOptions();
		$retn->inflateFrom($sc);
		return $retn;
	}

	/**
	 * Coerce a plain PHP array into a new strongly-typed WebAuthnPublicKeyCredentialRequestOptions object.
	 * Because the Comet Server requires strict distinction between empty objects ({}) and arrays ([]),
	 * the result of this method may not be safe to re-submit to the Comet Server.
	 *
	 * @param array $arr Object data as PHP array
	 * @return WebAuthnPublicKeyCredentialRequestOptions
	 */
	public static function createFromArray(array $arr)
	{
		$stdClass = json_decode(json_encode($arr));
		if (is_array($stdClass) && count($stdClass) === 0) {
			$stdClass = new \stdClass();
		}
		return self::createFromStdclass($stdClass);
	}

	/**
	 * Coerce a plain PHP array into a new strongly-typed WebAuthnPublicKeyCredentialRequestOptions object.
	 * Because the Comet Server requires strict distinction between empty objects ({}) and arrays ([]),
	 * the result of this method may not be safe to re-submit to the Comet Server.
	 *
	 * @deprecated 3.0.0 Unsafe for round-trip server traversal. You should either
	 *             (A) acknowledge this and continue by switching to createFromArray, or
	 *             (b) switch to the roundtrip-safe createFromStdclass alternative.
	 * @param array $arr Object data as PHP array
	 * @return WebAuthnPublicKeyCredentialRequestOptions
	 */
	public static function createFrom(array $arr)
	{
		return self::createFromArray($arr);
	}

	/**
	 * Coerce a JSON string into a new strongly-typed WebAuthnPublicKeyCredentialRequestOptions object.
	 *
	 * @param string $JsonString Object data as JSON string
	 * @return WebAuthnPublicKeyCredentialRequestOptions
	 */
	public static function createFromJSON($JsonString)
	{
		$decodedJsonObject = json_decode($JsonString); // as stdClass
		if (\json_last_error() != \JSON_ERROR_NONE) {
			throw new \Exception("JSON decode failed: " . \json_last_error_msg());
		}
		$retn = new WebAuthnPublicKeyCredentialRequestOptions();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}

	/**
	 * Convert this WebAuthnPublicKeyCredentialRequestOptions object into a plain PHP array.
	 *
	 * Unknown properties may still be represented as \stdClass objects.
	 *
	 * @param bool $for_json_encode Represent empty key-value maps as \stdClass instead of plain PHP arrays
	 * @return array
	 */
	public function toArray($for_json_encode = false)
	{
		$ret = [];
		$ret["challenge"] = base64_encode($this->Challenge);
		$ret["timeout"] = $this->Timeout;
		$ret["rpId"] = $this->RelyingPartyID;
		{
			$c0 = [];
			for($i0 = 0; $i0 < count($this->AllowedCredentials); ++$i0) {
				if ( $this->AllowedCredentials[$i0] === null ) {
					$val0 = $for_json_encode ? (object)[] : [];
				} else {
					$val0 = $this->AllowedCredentials[$i0]->toArray($for_json_encode);
				}
				$c0[] = $val0;
			}
			$ret["allowCredentials"] = $c0;
		}
		$ret["userVerification"] = $this->UserVerification;
		{
			$c0 = [];
			foreach($this->Extensions as $k0 => $v0) {
				$ko_0 = $k0;
				if ( $v0 === null ) {
					$vo_0 = $for_json_encode ? (object)[] : [];
				} else {
					$vo_0 = $v0->toArray($for_json_encode);
				}
				$c0[ $ko_0 ] = $vo_0;
			}
			if ($for_json_encode && count($c0) == 0) {
				$ret["extensions"] = (object)[];
			} else {
				$ret["extensions"] = $c0;
			}
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
	public function toJSON()
	{
		$arr = $this->toArray(true);
		if (count($arr) === 0) {
			return "{}"; // object
		} else {
			return json_encode($arr);
		}
	}

	/**
	 * Convert this object to a PHP \stdClass.
	 * This may be a more convenient format for working with unknown class properties.
	 *
	 * @return \stdClass
	 */
	public function toStdClass()
	{
		$arr = $this->toArray(false);
		if (count($arr) === 0) {
			return new \stdClass();
		} else {
			return json_decode(json_encode($arr));
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

