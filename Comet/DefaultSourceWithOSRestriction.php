<?php

/**
 * Copyright (c) 2018-2022 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 *
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

class DefaultSourceWithOSRestriction {

	/**
	 * @var \Comet\SourceConfig
	 */
	public $SourceConfig = null;

	/**
	 * @var int
	 */
	public $RestrictOS = 0;

	/**
	 * Preserve unknown properties when dealing with future server versions.
	 *
	 * @see DefaultSourceWithOSRestriction::RemoveUnknownProperties() Remove all unknown properties
	 * @var array
	 */
	private $__unknown_properties = [];

	/**
	 * Replace the content of this DefaultSourceWithOSRestriction object from a PHP \stdClass.
	 * The data could be supplied from an API call after json_decode(...); or generated manually.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return void
	 */
	protected function inflateFrom(\stdClass $sc)
	{
		if (property_exists($sc, 'SourceConfig')) {
			if (is_array($sc->SourceConfig) && count($sc->SourceConfig) === 0) {
			// Work around edge case in json_decode--json_encode stdClass conversion
				$this->SourceConfig = \Comet\SourceConfig::createFromStdclass(new \stdClass());
			} else {
				$this->SourceConfig = \Comet\SourceConfig::createFromStdclass($sc->SourceConfig);
			}
		}
		if (property_exists($sc, 'RestrictOS')) {
			$this->RestrictOS = (int)($sc->RestrictOS);
		}
		foreach(get_object_vars($sc) as $k => $v) {
			switch($k) {
			case 'SourceConfig':
			case 'RestrictOS':
				break;
			default:
				$this->__unknown_properties[$k] = $v;
			}
		}
	}

	/**
	 * Coerce a stdClass into a new strongly-typed DefaultSourceWithOSRestriction object.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return DefaultSourceWithOSRestriction
	 */
	public static function createFromStdclass(\stdClass $sc): \Comet\DefaultSourceWithOSRestriction
	{
		$retn = new DefaultSourceWithOSRestriction();
		$retn->inflateFrom($sc);
		return $retn;
	}

	/**
	 * Coerce a plain PHP array into a new strongly-typed DefaultSourceWithOSRestriction object.
	 * Because the Comet Server requires strict distinction between empty objects ({}) and arrays ([]),
	 * the result of this method may not be safe to re-submit to the Comet Server.
	 *
	 * @param array $arr Object data as PHP array
	 * @return DefaultSourceWithOSRestriction
	 */
	public static function createFromArray(array $arr): \Comet\DefaultSourceWithOSRestriction
	{
		$stdClass = json_decode(json_encode($arr, JSON_UNESCAPED_SLASHES));
		if (is_array($stdClass) && count($stdClass) === 0) {
			$stdClass = new \stdClass();
		}
		return self::createFromStdclass($stdClass);
	}

	/**
	 * Coerce a plain PHP array into a new strongly-typed DefaultSourceWithOSRestriction object.
	 * Because the Comet Server requires strict distinction between empty objects ({}) and arrays ([]),
	 * the result of this method may not be safe to re-submit to the Comet Server.
	 *
	 * @deprecated 3.0.0 Unsafe for round-trip server traversal. You should either
	 *             (A) acknowledge this and continue by switching to createFromArray, or
	 *             (b) switch to the roundtrip-safe createFromStdclass alternative.
	 * @param array $arr Object data as PHP array
	 * @return DefaultSourceWithOSRestriction
	 */
	public static function createFrom(array $arr): \Comet\DefaultSourceWithOSRestriction
	{
		return self::createFromArray($arr);
	}

	/**
	 * Coerce a JSON string into a new strongly-typed DefaultSourceWithOSRestriction object.
	 *
	 * @param string $JsonString Object data as JSON string
	 * @return DefaultSourceWithOSRestriction
	 */
	public static function createFromJSON(string $JsonString): \Comet\DefaultSourceWithOSRestriction
	{
		$decodedJsonObject = json_decode($JsonString); // as stdClass
		if (\json_last_error() != \JSON_ERROR_NONE) {
			throw new \Exception("JSON decode failed: " . \json_last_error_msg());
		}
		$retn = new DefaultSourceWithOSRestriction();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}

	/**
	 * Convert this DefaultSourceWithOSRestriction object into a plain PHP array.
	 *
	 * Unknown properties may still be represented as \stdClass objects.
	 *
	 * @param bool $for_json_encode Represent empty key-value maps as \stdClass instead of plain PHP arrays
	 * @return array
	 */
	public function toArray(bool $for_json_encode = false): array
	{
		$ret = [];
		if ( $this->SourceConfig === null ) {
			$ret["SourceConfig"] = $for_json_encode ? (object)[] : [];
		} else {
			$ret["SourceConfig"] = $this->SourceConfig->toArray($for_json_encode);
		}
		$ret["RestrictOS"] = $this->RestrictOS;

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
		if ($this->SourceConfig !== null) {
			$this->SourceConfig->RemoveUnknownProperties();
		}
	}

}

