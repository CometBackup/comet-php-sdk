<?php

/**
 * Copyright (c) 2018-2022 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 *
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

class ScheduleConfig {

	/**
	 * @var int
	 */
	public $FrequencyType = 0;

	/**
	 * @var int
	 */
	public $SecondsPast = 0;

	/**
	 * @var int
	 */
	public $Offset = 0;

	/**
	 * @var boolean
	 */
	public $RestrictRuntime = false;

	/**
	 * @var \Comet\HourSchedConfig
	 */
	public $FromTime = null;

	/**
	 * @var \Comet\HourSchedConfig
	 */
	public $ToTime = null;

	/**
	 * @var boolean
	 */
	public $RestrictDays = false;

	/**
	 * @var \Comet\DaysOfWeekConfig
	 */
	public $DaysSelect = null;

	/**
	 * @var int
	 */
	public $RandomDelaySecs = 0;

	/**
	 * Preserve unknown properties when dealing with future server versions.
	 *
	 * @see ScheduleConfig::RemoveUnknownProperties() Remove all unknown properties
	 * @var array
	 */
	private $__unknown_properties = [];

	/**
	 * Replace the content of this ScheduleConfig object from a PHP \stdClass.
	 * The data could be supplied from an API call after json_decode(...); or generated manually.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return void
	 */
	protected function inflateFrom(\stdClass $sc)
	{
		if (property_exists($sc, 'FrequencyType')) {
			$this->FrequencyType = (int)($sc->FrequencyType);
		}
		if (property_exists($sc, 'SecondsPast')) {
			$this->SecondsPast = (int)($sc->SecondsPast);
		}
		if (property_exists($sc, 'Offset') && !is_null($sc->Offset)) {
			$this->Offset = (int)($sc->Offset);
		}
		if (property_exists($sc, 'RestrictRuntime')) {
			$this->RestrictRuntime = (bool)($sc->RestrictRuntime);
		}
		if (property_exists($sc, 'FromTime')) {
			if (is_array($sc->FromTime) && count($sc->FromTime) === 0) {
			// Work around edge case in json_decode--json_encode stdClass conversion
				$this->FromTime = \Comet\HourSchedConfig::createFromStdclass(new \stdClass());
			} else {
				$this->FromTime = \Comet\HourSchedConfig::createFromStdclass($sc->FromTime);
			}
		}
		if (property_exists($sc, 'ToTime')) {
			if (is_array($sc->ToTime) && count($sc->ToTime) === 0) {
			// Work around edge case in json_decode--json_encode stdClass conversion
				$this->ToTime = \Comet\HourSchedConfig::createFromStdclass(new \stdClass());
			} else {
				$this->ToTime = \Comet\HourSchedConfig::createFromStdclass($sc->ToTime);
			}
		}
		if (property_exists($sc, 'RestrictDays')) {
			$this->RestrictDays = (bool)($sc->RestrictDays);
		}
		if (property_exists($sc, 'DaysSelect')) {
			if (is_array($sc->DaysSelect) && count($sc->DaysSelect) === 0) {
			// Work around edge case in json_decode--json_encode stdClass conversion
				$this->DaysSelect = \Comet\DaysOfWeekConfig::createFromStdclass(new \stdClass());
			} else {
				$this->DaysSelect = \Comet\DaysOfWeekConfig::createFromStdclass($sc->DaysSelect);
			}
		}
		if (property_exists($sc, 'RandomDelaySecs') && !is_null($sc->RandomDelaySecs)) {
			$this->RandomDelaySecs = (int)($sc->RandomDelaySecs);
		}
		foreach(get_object_vars($sc) as $k => $v) {
			switch($k) {
			case 'FrequencyType':
			case 'SecondsPast':
			case 'Offset':
			case 'RestrictRuntime':
			case 'FromTime':
			case 'ToTime':
			case 'RestrictDays':
			case 'DaysSelect':
			case 'RandomDelaySecs':
				break;
			default:
				$this->__unknown_properties[$k] = $v;
			}
		}
	}

	/**
	 * Coerce a stdClass into a new strongly-typed ScheduleConfig object.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return ScheduleConfig
	 */
	public static function createFromStdclass(\stdClass $sc): \Comet\ScheduleConfig
	{
		$retn = new ScheduleConfig();
		$retn->inflateFrom($sc);
		return $retn;
	}

	/**
	 * Coerce a plain PHP array into a new strongly-typed ScheduleConfig object.
	 * Because the Comet Server requires strict distinction between empty objects ({}) and arrays ([]),
	 * the result of this method may not be safe to re-submit to the Comet Server.
	 *
	 * @param array $arr Object data as PHP array
	 * @return ScheduleConfig
	 */
	public static function createFromArray(array $arr): \Comet\ScheduleConfig
	{
		$stdClass = json_decode(json_encode($arr, JSON_UNESCAPED_SLASHES));
		if (is_array($stdClass) && count($stdClass) === 0) {
			$stdClass = new \stdClass();
		}
		return self::createFromStdclass($stdClass);
	}

	/**
	 * Coerce a plain PHP array into a new strongly-typed ScheduleConfig object.
	 * Because the Comet Server requires strict distinction between empty objects ({}) and arrays ([]),
	 * the result of this method may not be safe to re-submit to the Comet Server.
	 *
	 * @deprecated 3.0.0 Unsafe for round-trip server traversal. You should either
	 *             (A) acknowledge this and continue by switching to createFromArray, or
	 *             (b) switch to the roundtrip-safe createFromStdclass alternative.
	 * @param array $arr Object data as PHP array
	 * @return ScheduleConfig
	 */
	public static function createFrom(array $arr): \Comet\ScheduleConfig
	{
		return self::createFromArray($arr);
	}

	/**
	 * Coerce a JSON string into a new strongly-typed ScheduleConfig object.
	 *
	 * @param string $JsonString Object data as JSON string
	 * @return ScheduleConfig
	 */
	public static function createFromJSON(string $JsonString): \Comet\ScheduleConfig
	{
		$decodedJsonObject = json_decode($JsonString); // as stdClass
		if (\json_last_error() != \JSON_ERROR_NONE) {
			throw new \Exception("JSON decode failed: " . \json_last_error_msg());
		}
		$retn = new ScheduleConfig();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}

	/**
	 * Convert this ScheduleConfig object into a plain PHP array.
	 *
	 * Unknown properties may still be represented as \stdClass objects.
	 *
	 * @param bool $for_json_encode Represent empty key-value maps as \stdClass instead of plain PHP arrays
	 * @return array
	 */
	public function toArray(bool $for_json_encode = false): array
	{
		$ret = [];
		$ret["FrequencyType"] = $this->FrequencyType;
		$ret["SecondsPast"] = $this->SecondsPast;
		$ret["Offset"] = $this->Offset;
		$ret["RestrictRuntime"] = $this->RestrictRuntime;
		if ( $this->FromTime === null ) {
			$ret["FromTime"] = $for_json_encode ? (object)[] : [];
		} else {
			$ret["FromTime"] = $this->FromTime->toArray($for_json_encode);
		}
		if ( $this->ToTime === null ) {
			$ret["ToTime"] = $for_json_encode ? (object)[] : [];
		} else {
			$ret["ToTime"] = $this->ToTime->toArray($for_json_encode);
		}
		$ret["RestrictDays"] = $this->RestrictDays;
		if ( $this->DaysSelect === null ) {
			$ret["DaysSelect"] = $for_json_encode ? (object)[] : [];
		} else {
			$ret["DaysSelect"] = $this->DaysSelect->toArray($for_json_encode);
		}
		$ret["RandomDelaySecs"] = $this->RandomDelaySecs;

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
		if ($this->FromTime !== null) {
			$this->FromTime->RemoveUnknownProperties();
		}
		if ($this->ToTime !== null) {
			$this->ToTime->RemoveUnknownProperties();
		}
		if ($this->DaysSelect !== null) {
			$this->DaysSelect->RemoveUnknownProperties();
		}
	}

}

