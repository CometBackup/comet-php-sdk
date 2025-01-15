<?php

/**
 * Copyright (c) 2018-2025 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 *
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

/**
 * @deprecated 21.12.0 This type has been deprecated since Comet version 21.12.0
 */
class U2FSignResponse {

	/**
	 * @var string
	 */
	public $ChallengeID = "";

	/**
	 * @var string
	 */
	public $KeyHandle = "";

	/**
	 * @var string
	 */
	public $Signature = "";

	/**
	 * @var string
	 */
	public $ClientData = "";

	/**
	 * Preserve unknown properties when dealing with future server versions.
	 *
	 * @see U2FSignResponse::RemoveUnknownProperties() Remove all unknown properties
	 * @var array
	 */
	private $__unknown_properties = [];

	/**
	 * Replace the content of this U2FSignResponse object from a PHP \stdClass.
	 * The data could be supplied from an API call after json_decode(...); or generated manually.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return void
	 */
	protected function inflateFrom(\stdClass $sc)
	{
		if (property_exists($sc, 'ChallengeID')) {
			$this->ChallengeID = (string)($sc->ChallengeID);
		}
		if (property_exists($sc, 'KeyHandle')) {
			$this->KeyHandle = (string)($sc->KeyHandle);
		}
		if (property_exists($sc, 'Signature')) {
			$this->Signature = (string)($sc->Signature);
		}
		if (property_exists($sc, 'ClientData')) {
			$this->ClientData = (string)($sc->ClientData);
		}
		foreach(get_object_vars($sc) as $k => $v) {
			switch($k) {
			case 'ChallengeID':
			case 'KeyHandle':
			case 'Signature':
			case 'ClientData':
				break;
			default:
				$this->__unknown_properties[$k] = $v;
			}
		}
	}

	/**
	 * Coerce a stdClass into a new strongly-typed U2FSignResponse object.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return U2FSignResponse
	 */
	public static function createFromStdclass(\stdClass $sc): \Comet\U2FSignResponse
	{
		$retn = new U2FSignResponse();
		$retn->inflateFrom($sc);
		return $retn;
	}

	/**
	 * Coerce a plain PHP array into a new strongly-typed U2FSignResponse object.
	 * Because the Comet Server requires strict distinction between empty objects ({}) and arrays ([]),
	 * the result of this method may not be safe to re-submit to the Comet Server.
	 *
	 * @param array $arr Object data as PHP array
	 * @return U2FSignResponse
	 */
	public static function createFromArray(array $arr): \Comet\U2FSignResponse
	{
		$stdClass = json_decode(json_encode($arr, JSON_UNESCAPED_SLASHES));
		if (is_array($stdClass) && count($stdClass) === 0) {
			$stdClass = new \stdClass();
		}
		return self::createFromStdclass($stdClass);
	}

	/**
	 * Coerce a JSON string into a new strongly-typed U2FSignResponse object.
	 *
	 * @param string $JsonString Object data as JSON string
	 * @return U2FSignResponse
	 */
	public static function createFromJSON(string $JsonString): \Comet\U2FSignResponse
	{
		$decodedJsonObject = json_decode($JsonString); // as stdClass
		if (\json_last_error() != \JSON_ERROR_NONE) {
			throw new \Exception("JSON decode failed: " . \json_last_error_msg(), \json_last_error());
		}
		$retn = new U2FSignResponse();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}

	/**
	 * Convert this U2FSignResponse object into a plain PHP array.
	 *
	 * Unknown properties may still be represented as \stdClass objects.
	 *
	 * @param bool $for_json_encode Represent key-value maps as \stdClass instead of plain PHP arrays
	 * @return array
	 */
	public function toArray(bool $for_json_encode = false): array
	{
		$ret = [];
		$ret["ChallengeID"] = $this->ChallengeID;
		$ret["KeyHandle"] = $this->KeyHandle;
		$ret["Signature"] = $this->Signature;
		$ret["ClientData"] = $this->ClientData;

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

