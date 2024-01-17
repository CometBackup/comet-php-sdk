<?php

/**
 * Copyright (c) 2018-2024 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 *
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

/**
 * The Type field controls which fields of this data type are used. For additional information, see
 * the notes on the RETENTIONRANGE_ constants.
 */
class RetentionRange {

	/**
	 * One of the RETENTIONRANGE_ constants
	 *
	 * @var int
	 */
	public $Type = 0;

	/**
	 * Unix timestamp, in seconds. Used by RETENTIONRANGE_NEWER_THAN_X.
	 *
	 * @var int
	 */
	public $Timestamp = 0;

	/**
	 * @var int
	 */
	public $Jobs = 0;

	/**
	 * @var int
	 */
	public $Days = 0;

	/**
	 * @var int
	 */
	public $Weeks = 0;

	/**
	 * @var int
	 */
	public $Months = 0;

	/**
	 * 0: Sunday, 6: Saturday
	 *
	 * @var int
	 */
	public $WeekOffset = 0;

	/**
	 * 1: 1st, 31: 31st
	 * Prior to Comet version 23.6.2, 31 was treated as 30.
	 * For months that do not have a day equal to the specified offset, no backup will be retained.
	 * For example, if the offset is set to 30, no backup will be kept for February.
	 *
	 * @var int
	 */
	public $MonthOffset = 0;

	/**
	 * Preserve unknown properties when dealing with future server versions.
	 *
	 * @see RetentionRange::RemoveUnknownProperties() Remove all unknown properties
	 * @var array
	 */
	private $__unknown_properties = [];

	/**
	 * Replace the content of this RetentionRange object from a PHP \stdClass.
	 * The data could be supplied from an API call after json_decode(...); or generated manually.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return void
	 */
	protected function inflateFrom(\stdClass $sc)
	{
		if (property_exists($sc, 'Type')) {
			$this->Type = (int)($sc->Type);
		}
		if (property_exists($sc, 'Timestamp')) {
			$this->Timestamp = (int)($sc->Timestamp);
		}
		if (property_exists($sc, 'Jobs')) {
			$this->Jobs = (int)($sc->Jobs);
		}
		if (property_exists($sc, 'Days')) {
			$this->Days = (int)($sc->Days);
		}
		if (property_exists($sc, 'Weeks')) {
			$this->Weeks = (int)($sc->Weeks);
		}
		if (property_exists($sc, 'Months')) {
			$this->Months = (int)($sc->Months);
		}
		if (property_exists($sc, 'WeekOffset')) {
			$this->WeekOffset = (int)($sc->WeekOffset);
		}
		if (property_exists($sc, 'MonthOffset')) {
			$this->MonthOffset = (int)($sc->MonthOffset);
		}
		foreach(get_object_vars($sc) as $k => $v) {
			switch($k) {
			case 'Type':
			case 'Timestamp':
			case 'Jobs':
			case 'Days':
			case 'Weeks':
			case 'Months':
			case 'WeekOffset':
			case 'MonthOffset':
				break;
			default:
				$this->__unknown_properties[$k] = $v;
			}
		}
	}

	/**
	 * Coerce a stdClass into a new strongly-typed RetentionRange object.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return RetentionRange
	 */
	public static function createFromStdclass(\stdClass $sc): \Comet\RetentionRange
	{
		$retn = new RetentionRange();
		$retn->inflateFrom($sc);
		return $retn;
	}

	/**
	 * Coerce a plain PHP array into a new strongly-typed RetentionRange object.
	 * Because the Comet Server requires strict distinction between empty objects ({}) and arrays ([]),
	 * the result of this method may not be safe to re-submit to the Comet Server.
	 *
	 * @param array $arr Object data as PHP array
	 * @return RetentionRange
	 */
	public static function createFromArray(array $arr): \Comet\RetentionRange
	{
		$stdClass = json_decode(json_encode($arr, JSON_UNESCAPED_SLASHES));
		if (is_array($stdClass) && count($stdClass) === 0) {
			$stdClass = new \stdClass();
		}
		return self::createFromStdclass($stdClass);
	}

	/**
	 * Coerce a JSON string into a new strongly-typed RetentionRange object.
	 *
	 * @param string $JsonString Object data as JSON string
	 * @return RetentionRange
	 */
	public static function createFromJSON(string $JsonString): \Comet\RetentionRange
	{
		$decodedJsonObject = json_decode($JsonString); // as stdClass
		if (\json_last_error() != \JSON_ERROR_NONE) {
			throw new \Exception("JSON decode failed: " . \json_last_error_msg(), \json_last_error());
		}
		$retn = new RetentionRange();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}

	/**
	 * Convert this RetentionRange object into a plain PHP array.
	 *
	 * Unknown properties may still be represented as \stdClass objects.
	 *
	 * @param bool $for_json_encode Represent empty key-value maps as \stdClass instead of plain PHP arrays
	 * @return array
	 */
	public function toArray(bool $for_json_encode = false): array
	{
		$ret = [];
		$ret["Type"] = $this->Type;
		$ret["Timestamp"] = $this->Timestamp;
		$ret["Jobs"] = $this->Jobs;
		$ret["Days"] = $this->Days;
		$ret["Weeks"] = $this->Weeks;
		$ret["Months"] = $this->Months;
		$ret["WeekOffset"] = $this->WeekOffset;
		$ret["MonthOffset"] = $this->MonthOffset;

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

