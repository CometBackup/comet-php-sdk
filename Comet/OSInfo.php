<?php

/**
 * Copyright (c) 2018-2022 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 *
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

class OSInfo {

	/**
	 * @var string
	 */
	public $Version = "";

	/**
	 * @var string
	 */
	public $Distribution = "";

	/**
	 * @var string
	 */
	public $Build = "";

	/**
	 * Preserve unknown properties when dealing with future server versions.
	 *
	 * @see OSInfo::RemoveUnknownProperties() Remove all unknown properties
	 * @var array
	 */
	private $__unknown_properties = [];

	/**
	 * Replace the content of this OSInfo object from a PHP \stdClass.
	 * The data could be supplied from an API call after json_decode(...); or generated manually.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return void
	 */
	protected function inflateFrom(\stdClass $sc)
	{
		if (property_exists($sc, 'version') && !is_null($sc->version)) {
			$this->Version = (string)($sc->version);
		}
		if (property_exists($sc, 'distribution') && !is_null($sc->distribution)) {
			$this->Distribution = (string)($sc->distribution);
		}
		if (property_exists($sc, 'build') && !is_null($sc->build)) {
			$this->Build = (string)($sc->build);
		}
		foreach(get_object_vars($sc) as $k => $v) {
			switch($k) {
			case 'version':
			case 'distribution':
			case 'build':
				break;
			default:
				$this->__unknown_properties[$k] = $v;
			}
		}
	}

	/**
	 * Coerce a stdClass into a new strongly-typed OSInfo object.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return OSInfo
	 */
	public static function createFromStdclass(\stdClass $sc)
	{
		$retn = new OSInfo();
		$retn->inflateFrom($sc);
		return $retn;
	}

	/**
	 * Coerce a plain PHP array into a new strongly-typed OSInfo object.
	 * Because the Comet Server requires strict distinction between empty objects ({}) and arrays ([]),
	 * the result of this method may not be safe to re-submit to the Comet Server.
	 *
	 * @param array $arr Object data as PHP array
	 * @return OSInfo
	 */
	public static function createFromArray(array $arr)
	{
		$stdClass = json_decode(json_encode($arr, JSON_UNESCAPED_SLASHES));
		if (is_array($stdClass) && count($stdClass) === 0) {
			$stdClass = new \stdClass();
		}
		return self::createFromStdclass($stdClass);
	}

	/**
	 * Coerce a plain PHP array into a new strongly-typed OSInfo object.
	 * Because the Comet Server requires strict distinction between empty objects ({}) and arrays ([]),
	 * the result of this method may not be safe to re-submit to the Comet Server.
	 *
	 * @deprecated 3.0.0 Unsafe for round-trip server traversal. You should either
	 *             (A) acknowledge this and continue by switching to createFromArray, or
	 *             (b) switch to the roundtrip-safe createFromStdclass alternative.
	 * @param array $arr Object data as PHP array
	 * @return OSInfo
	 */
	public static function createFrom(array $arr)
	{
		return self::createFromArray($arr);
	}

	/**
	 * Coerce a JSON string into a new strongly-typed OSInfo object.
	 *
	 * @param string $JsonString Object data as JSON string
	 * @return OSInfo
	 */
	public static function createFromJSON($JsonString)
	{
		$decodedJsonObject = json_decode($JsonString); // as stdClass
		if (\json_last_error() != \JSON_ERROR_NONE) {
			throw new \Exception("JSON decode failed: " . \json_last_error_msg());
		}
		$retn = new OSInfo();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}

	/**
	 * Convert this OSInfo object into a plain PHP array.
	 *
	 * Unknown properties may still be represented as \stdClass objects.
	 *
	 * @param bool $for_json_encode Represent empty key-value maps as \stdClass instead of plain PHP arrays
	 * @return array
	 */
	public function toArray($for_json_encode = false)
	{
		$ret = [];
		$ret["version"] = $this->Version;
		$ret["distribution"] = $this->Distribution;
		$ret["build"] = $this->Build;

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
			return json_encode($arr, JSON_UNESCAPED_SLASHES);
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

