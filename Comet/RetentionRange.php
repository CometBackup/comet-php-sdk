<?php

/**
 * Copyright (c) 2018 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 * 
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

class RetentionRange {
	
	/**
	 * @var int
	 */
	public $Type = 0;
	
	/**
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
	 * @var int
	 */
	public $WeekOffset = 0;
	
	/**
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
	public static function createFromStdclass(\stdClass $sc)
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
	public static function createFromArray(array $arr)
	{
		$stdClass = json_decode(json_encode($arr));
		return self::createFromStdclass($stdClass);
	}
	
	/**
	 * Coerce a plain PHP array into a new strongly-typed RetentionRange object.
	 * Because the Comet Server requires strict distinction between empty objects ({}) and arrays ([]),
	 * the result of this method may not be safe to re-submit to the Comet Server.
	 *
	 * @deprecated 3.0.0 Unsafe for round-trip server traversal. You should either 
	 *             (A) acknowledge this and continue by switching to createFromArray, or
	 *             (b) switch to the roundtrip-safe createFromStdclass alternative.
	 * @param array $arr Object data as PHP array
	 * @return RetentionRange
	 */
	public static function createFrom(array $arr)
	{
		return self::createFromArray($arr);
	}
	
	/**
	 * Coerce a JSON string into a new strongly-typed RetentionRange object.
	 *
	 * @param string $JsonString Object data as JSON string
	 * @return RetentionRange
	 */
	public static function createFromJSON($JsonString)
	{
		$decodedJsonObject = json_decode($JsonString); // as stdClass
		if (\json_last_error() != \JSON_ERROR_NONE) {
			throw new \Exception("JSON decode failed: " . \json_last_error_msg());
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
	public function toArray($for_json_encode = false)
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

