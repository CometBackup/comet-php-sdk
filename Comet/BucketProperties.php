<?php

/**
 * Copyright (c) 2018-2025 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 *
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

class BucketProperties {

	/**
	 * @var string
	 */
	public $OrganizationID = "";

	/**
	 * Unix timestamp, in seconds.
	 *
	 * @var int
	 */
	public $CreateTime = 0;

	/**
	 * One of the PASSWORD_FORMAT_ constants
	 *
	 * @var int
	 */
	public $ReadWriteKeyFormat = 0;

	/**
	 * @var string
	 */
	public $ReadWriteKey = "";

	/**
	 * @var \Comet\SizeMeasurement
	 */
	public $Size = null;

	/**
	 * Preserve unknown properties when dealing with future server versions.
	 *
	 * @see BucketProperties::RemoveUnknownProperties() Remove all unknown properties
	 * @var array
	 */
	private $__unknown_properties = [];

	/**
	 * Replace the content of this BucketProperties object from a PHP \stdClass.
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
		if (property_exists($sc, 'CreateTime')) {
			$this->CreateTime = (int)($sc->CreateTime);
		}
		if (property_exists($sc, 'ReadWriteKeyFormat')) {
			$this->ReadWriteKeyFormat = (int)($sc->ReadWriteKeyFormat);
		}
		if (property_exists($sc, 'ReadWriteKey')) {
			$this->ReadWriteKey = (string)($sc->ReadWriteKey);
		}
		if (property_exists($sc, 'Size')) {
			if (is_array($sc->Size) && count($sc->Size) === 0) {
			// Work around edge case in json_decode--json_encode stdClass conversion
				$this->Size = \Comet\SizeMeasurement::createFromStdclass(new \stdClass());
			} else {
				$this->Size = \Comet\SizeMeasurement::createFromStdclass($sc->Size);
			}
		}
		foreach(get_object_vars($sc) as $k => $v) {
			switch($k) {
			case 'OrganizationID':
			case 'CreateTime':
			case 'ReadWriteKeyFormat':
			case 'ReadWriteKey':
			case 'Size':
				break;
			default:
				$this->__unknown_properties[$k] = $v;
			}
		}
	}

	/**
	 * Coerce a stdClass into a new strongly-typed BucketProperties object.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return BucketProperties
	 */
	public static function createFromStdclass(\stdClass $sc): \Comet\BucketProperties
	{
		$retn = new BucketProperties();
		$retn->inflateFrom($sc);
		return $retn;
	}

	/**
	 * Coerce a plain PHP array into a new strongly-typed BucketProperties object.
	 * Because the Comet Server requires strict distinction between empty objects ({}) and arrays ([]),
	 * the result of this method may not be safe to re-submit to the Comet Server.
	 *
	 * @param array $arr Object data as PHP array
	 * @return BucketProperties
	 */
	public static function createFromArray(array $arr): \Comet\BucketProperties
	{
		$stdClass = json_decode(json_encode($arr, JSON_UNESCAPED_SLASHES));
		if (is_array($stdClass) && count($stdClass) === 0) {
			$stdClass = new \stdClass();
		}
		return self::createFromStdclass($stdClass);
	}

	/**
	 * Coerce a JSON string into a new strongly-typed BucketProperties object.
	 *
	 * @param string $JsonString Object data as JSON string
	 * @return BucketProperties
	 */
	public static function createFromJSON(string $JsonString): \Comet\BucketProperties
	{
		$decodedJsonObject = json_decode($JsonString); // as stdClass
		if (\json_last_error() != \JSON_ERROR_NONE) {
			throw new \Exception("JSON decode failed: " . \json_last_error_msg(), \json_last_error());
		}
		$retn = new BucketProperties();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}

	/**
	 * Convert this BucketProperties object into a plain PHP array.
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
		$ret["CreateTime"] = $this->CreateTime;
		$ret["ReadWriteKeyFormat"] = $this->ReadWriteKeyFormat;
		$ret["ReadWriteKey"] = $this->ReadWriteKey;
		if ( $this->Size === null ) {
			$ret["Size"] = $for_json_encode ? (object)[] : [];
		} else {
			$ret["Size"] = $this->Size->toArray($for_json_encode);
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
		if ($this->Size !== null) {
			$this->Size->RemoveUnknownProperties();
		}
	}

}

