<?php

/**
 * Copyright (c) 2018-2025 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 *
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

class DestinationStatistics {

	/**
	 * @var \Comet\SizeMeasurement
	 */
	public $ClientProvidedSize = null;

	/**
	 * @var \Comet\ContentMeasurement
	 */
	public $ClientProvidedContent = null;

	/**
	 * @var string
	 */
	public $LastSuccessfulDeepVerify_GUID = "";

	/**
	 * Unix timestamp in seconds
	 *
	 * @var int
	 */
	public $LastSuccessfulDeepVerify_StartTime = 0;

	/**
	 * Unix timestamp in seconds
	 *
	 * @var int
	 */
	public $LastSuccessfulDeepVerify_EndTime = 0;

	/**
	 * Preserve unknown properties when dealing with future server versions.
	 *
	 * @see DestinationStatistics::RemoveUnknownProperties() Remove all unknown properties
	 * @var array
	 */
	private $__unknown_properties = [];

	/**
	 * Replace the content of this DestinationStatistics object from a PHP \stdClass.
	 * The data could be supplied from an API call after json_decode(...); or generated manually.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return void
	 */
	protected function inflateFrom(\stdClass $sc)
	{
		if (property_exists($sc, 'ClientProvidedSize')) {
			if (is_array($sc->ClientProvidedSize) && count($sc->ClientProvidedSize) === 0) {
			// Work around edge case in json_decode--json_encode stdClass conversion
				$this->ClientProvidedSize = \Comet\SizeMeasurement::createFromStdclass(new \stdClass());
			} else {
				$this->ClientProvidedSize = \Comet\SizeMeasurement::createFromStdclass($sc->ClientProvidedSize);
			}
		}
		if (property_exists($sc, 'ClientProvidedContent')) {
			if (is_array($sc->ClientProvidedContent) && count($sc->ClientProvidedContent) === 0) {
			// Work around edge case in json_decode--json_encode stdClass conversion
				$this->ClientProvidedContent = \Comet\ContentMeasurement::createFromStdclass(new \stdClass());
			} else {
				$this->ClientProvidedContent = \Comet\ContentMeasurement::createFromStdclass($sc->ClientProvidedContent);
			}
		}
		if (property_exists($sc, 'LastSuccessfulDeepVerify_GUID') && !is_null($sc->LastSuccessfulDeepVerify_GUID)) {
			$this->LastSuccessfulDeepVerify_GUID = (string)($sc->LastSuccessfulDeepVerify_GUID);
		}
		if (property_exists($sc, 'LastSuccessfulDeepVerify_StartTime') && !is_null($sc->LastSuccessfulDeepVerify_StartTime)) {
			$this->LastSuccessfulDeepVerify_StartTime = (int)($sc->LastSuccessfulDeepVerify_StartTime);
		}
		if (property_exists($sc, 'LastSuccessfulDeepVerify_EndTime') && !is_null($sc->LastSuccessfulDeepVerify_EndTime)) {
			$this->LastSuccessfulDeepVerify_EndTime = (int)($sc->LastSuccessfulDeepVerify_EndTime);
		}
		foreach(get_object_vars($sc) as $k => $v) {
			switch($k) {
			case 'ClientProvidedSize':
			case 'ClientProvidedContent':
			case 'LastSuccessfulDeepVerify_GUID':
			case 'LastSuccessfulDeepVerify_StartTime':
			case 'LastSuccessfulDeepVerify_EndTime':
				break;
			default:
				$this->__unknown_properties[$k] = $v;
			}
		}
	}

	/**
	 * Coerce a stdClass into a new strongly-typed DestinationStatistics object.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return DestinationStatistics
	 */
	public static function createFromStdclass(\stdClass $sc): \Comet\DestinationStatistics
	{
		$retn = new DestinationStatistics();
		$retn->inflateFrom($sc);
		return $retn;
	}

	/**
	 * Coerce a plain PHP array into a new strongly-typed DestinationStatistics object.
	 * Because the Comet Server requires strict distinction between empty objects ({}) and arrays ([]),
	 * the result of this method may not be safe to re-submit to the Comet Server.
	 *
	 * @param array $arr Object data as PHP array
	 * @return DestinationStatistics
	 */
	public static function createFromArray(array $arr): \Comet\DestinationStatistics
	{
		$stdClass = json_decode(json_encode($arr, JSON_UNESCAPED_SLASHES));
		if (is_array($stdClass) && count($stdClass) === 0) {
			$stdClass = new \stdClass();
		}
		return self::createFromStdclass($stdClass);
	}

	/**
	 * Coerce a JSON string into a new strongly-typed DestinationStatistics object.
	 *
	 * @param string $JsonString Object data as JSON string
	 * @return DestinationStatistics
	 */
	public static function createFromJSON(string $JsonString): \Comet\DestinationStatistics
	{
		$decodedJsonObject = json_decode($JsonString); // as stdClass
		if (\json_last_error() != \JSON_ERROR_NONE) {
			throw new \Exception("JSON decode failed: " . \json_last_error_msg(), \json_last_error());
		}
		$retn = new DestinationStatistics();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}

	/**
	 * Convert this DestinationStatistics object into a plain PHP array.
	 *
	 * Unknown properties may still be represented as \stdClass objects.
	 *
	 * @param bool $for_json_encode Represent key-value maps as \stdClass instead of plain PHP arrays
	 * @return array
	 */
	public function toArray(bool $for_json_encode = false): array
	{
		$ret = [];
		if ( $this->ClientProvidedSize === null ) {
			$ret["ClientProvidedSize"] = $for_json_encode ? (object)[] : [];
		} else {
			$ret["ClientProvidedSize"] = $this->ClientProvidedSize->toArray($for_json_encode);
		}
		if ( $this->ClientProvidedContent === null ) {
			$ret["ClientProvidedContent"] = $for_json_encode ? (object)[] : [];
		} else {
			$ret["ClientProvidedContent"] = $this->ClientProvidedContent->toArray($for_json_encode);
		}
		$ret["LastSuccessfulDeepVerify_GUID"] = $this->LastSuccessfulDeepVerify_GUID;
		$ret["LastSuccessfulDeepVerify_StartTime"] = $this->LastSuccessfulDeepVerify_StartTime;
		$ret["LastSuccessfulDeepVerify_EndTime"] = $this->LastSuccessfulDeepVerify_EndTime;

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
		if ($this->ClientProvidedSize !== null) {
			$this->ClientProvidedSize->RemoveUnknownProperties();
		}
		if ($this->ClientProvidedContent !== null) {
			$this->ClientProvidedContent->RemoveUnknownProperties();
		}
	}

}

