<?php

/**
 * Copyright (c) 2018 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 * 
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

class U2FSignRequest {
	
	/**
	 * @var string
	 */
	public $ChallengeID = "";
	
	/**
	 * @var string
	 */
	public $ChallengeData = "";
	
	/**
	 * @var string
	 */
	public $AppID = "";
	
	/**
	 * @var \Comet\U2FRegisteredKey[]
	 */
	public $RegisteredKeys = [];
	
	/**
	 * Preserve unknown properties when dealing with future server versions.
	 *
	 * @see U2FSignRequest::RemoveUnknownProperties() Remove all unknown properties
	 * @var array
	 */
	private $__unknown_properties = [];
	
	/**
	 * Replace the content of this U2FSignRequest object from a PHP \stdClass.
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
		if (property_exists($sc, 'ChallengeData')) {
			$this->ChallengeData = (string)($sc->ChallengeData);
		}
		if (property_exists($sc, 'AppID')) {
			$this->AppID = (string)($sc->AppID);
		}
		if (property_exists($sc, 'RegisteredKeys')) {
			$val_2 = [];
			for($i_2 = 0; $i_2 < count($sc->RegisteredKeys); ++$i_2) {
				$val_2[] = \Comet\U2FRegisteredKey::createFromStdclass($sc->RegisteredKeys[$i_2]);
			}
			$this->RegisteredKeys = $val_2;
		}
		foreach(get_object_vars($sc) as $k => $v) {
			switch($k) {
			case 'ChallengeID':
			case 'ChallengeData':
			case 'AppID':
			case 'RegisteredKeys':
				break;
			default:
				$this->__unknown_properties[$k] = $v;
			}
		}
	}
	
	/**
	 * Coerce a stdClass into a new strongly-typed U2FSignRequest object.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return U2FSignRequest
	 */
	public static function createFromStdclass(\stdClass $sc)
	{
		$retn = new U2FSignRequest();
		$retn->inflateFrom($sc);
		return $retn;
	}
	
	/**
	 * Coerce a plain PHP array into a new strongly-typed U2FSignRequest object.
	 * Because the Comet Server requires strict distinction between empty objects ({}) and arrays ([]),
	 * the result of this method may not be safe to re-submit to the Comet Server.
	 *
	 * @param array $arr Object data as PHP array
	 * @return U2FSignRequest
	 */
	public static function createFromArray(array $arr)
	{
		$stdClass = json_decode(json_encode($arr));
		return self::createFromStdclass($stdClass);
	}
	
	/**
	 * Coerce a plain PHP array into a new strongly-typed U2FSignRequest object.
	 * Because the Comet Server requires strict distinction between empty objects ({}) and arrays ([]),
	 * the result of this method may not be safe to re-submit to the Comet Server.
	 *
	 * @deprecated 3.0.0 Unsafe for round-trip server traversal. You should either 
	 *             (A) acknowledge this and continue by switching to createFromArray, or
	 *             (b) switch to the roundtrip-safe createFromStdclass alternative.
	 * @param array $arr Object data as PHP array
	 * @return U2FSignRequest
	 */
	public static function createFrom(array $arr)
	{
		return self::createFromArray($arr);
	}
	
	/**
	 * Coerce a JSON string into a new strongly-typed U2FSignRequest object.
	 *
	 * @param string $JsonString Object data as JSON string
	 * @return U2FSignRequest
	 */
	public static function createFromJSON($JsonString)
	{
		$decodedJsonObject = json_decode($JsonString); // as stdClass
		if (\json_last_error() != \JSON_ERROR_NONE) {
			throw new \Exception("JSON decode failed: " . \json_last_error_msg());
		}
		$retn = new U2FSignRequest();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}
	
	/**
	 * Convert this U2FSignRequest object into a plain PHP array.
	 *
	 * Unknown properties may still be represented as \stdClass objects.
	 *
	 * @param bool $for_json_encode Represent empty key-value maps as \stdClass instead of plain PHP arrays
	 * @return array
	 */
	public function toArray($for_json_encode = false)
	{
		$ret = [];
		$ret["ChallengeID"] = $this->ChallengeID;
		$ret["ChallengeData"] = $this->ChallengeData;
		$ret["AppID"] = $this->AppID;
		{
			$c0 = [];
			for($i0 = 0; $i0 < count($this->RegisteredKeys); ++$i0) {
				if ( $this->RegisteredKeys[$i0] === null ) {
					$val0 = $for_json_encode ? (object)[] : [];
				} else {
					$val0 = $this->RegisteredKeys[$i0]->toArray($for_json_encode);
				}
				$c0[] = $val0;
			}
			$ret["RegisteredKeys"] = $c0;
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
		$arr = self::toArray(true);
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
		$arr = self::toArray(false);
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

