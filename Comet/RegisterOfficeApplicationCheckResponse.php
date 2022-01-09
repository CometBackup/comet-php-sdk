<?php

/**
 * Copyright (c) 2018-2022 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 *
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

class RegisterOfficeApplicationCheckResponse {

	/**
	 * @var string
	 */
	public $Continuation = "";

	/**
	 * @var boolean
	 */
	public $Completed = false;

	/**
	 * @var string
	 */
	public $Error = "";

	/**
	 * @var \Comet\Office365Credential
	 */
	public $Result = null;

	/**
	 * Preserve unknown properties when dealing with future server versions.
	 *
	 * @see RegisterOfficeApplicationCheckResponse::RemoveUnknownProperties() Remove all unknown properties
	 * @var array
	 */
	private $__unknown_properties = [];

	/**
	 * Replace the content of this RegisterOfficeApplicationCheckResponse object from a PHP \stdClass.
	 * The data could be supplied from an API call after json_decode(...); or generated manually.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return void
	 */
	protected function inflateFrom(\stdClass $sc)
	{
		if (property_exists($sc, 'Continuation')) {
			$this->Continuation = (string)($sc->Continuation);
		}
		if (property_exists($sc, 'Completed')) {
			$this->Completed = (bool)($sc->Completed);
		}
		if (property_exists($sc, 'Error')) {
			$this->Error = (string)($sc->Error);
		}
		if (property_exists($sc, 'Result') && !is_null($sc->Result)) {
			if (is_array($sc->Result) && count($sc->Result) === 0) {
			// Work around edge case in json_decode--json_encode stdClass conversion
				$this->Result = \Comet\Office365Credential::createFromStdclass(new \stdClass());
			} else {
				$this->Result = \Comet\Office365Credential::createFromStdclass($sc->Result);
			}
		}
		foreach(get_object_vars($sc) as $k => $v) {
			switch($k) {
			case 'Continuation':
			case 'Completed':
			case 'Error':
			case 'Result':
				break;
			default:
				$this->__unknown_properties[$k] = $v;
			}
		}
	}

	/**
	 * Coerce a stdClass into a new strongly-typed RegisterOfficeApplicationCheckResponse object.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return RegisterOfficeApplicationCheckResponse
	 */
	public static function createFromStdclass(\stdClass $sc)
	{
		$retn = new RegisterOfficeApplicationCheckResponse();
		$retn->inflateFrom($sc);
		return $retn;
	}

	/**
	 * Coerce a plain PHP array into a new strongly-typed RegisterOfficeApplicationCheckResponse object.
	 * Because the Comet Server requires strict distinction between empty objects ({}) and arrays ([]),
	 * the result of this method may not be safe to re-submit to the Comet Server.
	 *
	 * @param array $arr Object data as PHP array
	 * @return RegisterOfficeApplicationCheckResponse
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
	 * Coerce a plain PHP array into a new strongly-typed RegisterOfficeApplicationCheckResponse object.
	 * Because the Comet Server requires strict distinction between empty objects ({}) and arrays ([]),
	 * the result of this method may not be safe to re-submit to the Comet Server.
	 *
	 * @deprecated 3.0.0 Unsafe for round-trip server traversal. You should either
	 *             (A) acknowledge this and continue by switching to createFromArray, or
	 *             (b) switch to the roundtrip-safe createFromStdclass alternative.
	 * @param array $arr Object data as PHP array
	 * @return RegisterOfficeApplicationCheckResponse
	 */
	public static function createFrom(array $arr)
	{
		return self::createFromArray($arr);
	}

	/**
	 * Coerce a JSON string into a new strongly-typed RegisterOfficeApplicationCheckResponse object.
	 *
	 * @param string $JsonString Object data as JSON string
	 * @return RegisterOfficeApplicationCheckResponse
	 */
	public static function createFromJSON($JsonString)
	{
		$decodedJsonObject = json_decode($JsonString); // as stdClass
		if (\json_last_error() != \JSON_ERROR_NONE) {
			throw new \Exception("JSON decode failed: " . \json_last_error_msg());
		}
		$retn = new RegisterOfficeApplicationCheckResponse();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}

	/**
	 * Convert this RegisterOfficeApplicationCheckResponse object into a plain PHP array.
	 *
	 * Unknown properties may still be represented as \stdClass objects.
	 *
	 * @param bool $for_json_encode Represent empty key-value maps as \stdClass instead of plain PHP arrays
	 * @return array
	 */
	public function toArray($for_json_encode = false)
	{
		$ret = [];
		$ret["Continuation"] = $this->Continuation;
		$ret["Completed"] = $this->Completed;
		$ret["Error"] = $this->Error;
		if ( $this->Result === null ) {
			$ret["Result"] = $for_json_encode ? (object)[] : [];
		} else {
			$ret["Result"] = $this->Result->toArray($for_json_encode);
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
		if ($this->Result !== null) {
			$this->Result->RemoveUnknownProperties();
		}
	}

}

