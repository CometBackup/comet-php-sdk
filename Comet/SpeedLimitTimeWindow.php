<?php

/**
 * Copyright (c) 2018-2026 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 *
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

/**
 * SpeedLimitTimeWindow optionally restricts the vault speed limit
 * (BackupJobAdvancedOptions.LimitVaultSpeedBps) to a specific time of day and, optionally, certain
 * days of the week.
 * When RestrictTimes is set, the speed limit applies only while the current local time is inside
 * the window; outside the window the job runs unlimited.
 * It has no effect unless a LimitVaultSpeedBps is also set.
 */
class SpeedLimitTimeWindow {

	/**
	 * If true, LimitVaultSpeedBps only applies during the window defined below; outside it the job runs
	 * unlimited.
	 *
	 * @var boolean
	 */
	public $RestrictTimes = false;

	/**
	 * The local time-of-day when the window starts.
	 *
	 * @var \Comet\HourSchedConfig
	 */
	public $FromTime = null;

	/**
	 * The local time-of-day when the window ends. If earlier than FromTime, the window wraps past
	 * midnight. If equal to FromTime, the window covers the whole day.
	 *
	 * @var \Comet\HourSchedConfig
	 */
	public $ToTime = null;

	/**
	 * If true, the window only applies on the days of the week selected in DaysSelect. If no day is
	 * selected at all, the day-of-week restriction is ignored and the window applies on every day.
	 *
	 * @var boolean
	 */
	public $RestrictDays = false;

	/**
	 * The days of the week the window applies on, when RestrictDays is true.
	 *
	 * @var \Comet\DaysOfWeekConfig
	 */
	public $DaysSelect = null;

	/**
	 * Preserve unknown properties when dealing with future server versions.
	 *
	 * @see SpeedLimitTimeWindow::RemoveUnknownProperties() Remove all unknown properties
	 * @var array
	 */
	private $__unknown_properties = [];

	/**
	 * Replace the content of this SpeedLimitTimeWindow object from a PHP \stdClass.
	 * The data could be supplied from an API call after json_decode(...); or generated manually.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return void
	 */
	protected function inflateFrom(\stdClass $sc)
	{
		if (property_exists($sc, 'RestrictTimes')) {
			$this->RestrictTimes = (bool)($sc->RestrictTimes);
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
		foreach(get_object_vars($sc) as $k => $v) {
			switch($k) {
			case 'RestrictTimes':
			case 'FromTime':
			case 'ToTime':
			case 'RestrictDays':
			case 'DaysSelect':
				break;
			default:
				$this->__unknown_properties[$k] = $v;
			}
		}
	}

	/**
	 * Coerce a stdClass into a new strongly-typed SpeedLimitTimeWindow object.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return SpeedLimitTimeWindow
	 */
	public static function createFromStdclass(\stdClass $sc): \Comet\SpeedLimitTimeWindow
	{
		$retn = new SpeedLimitTimeWindow();
		$retn->inflateFrom($sc);
		return $retn;
	}

	/**
	 * Coerce a plain PHP array into a new strongly-typed SpeedLimitTimeWindow object.
	 * Because the Comet Server requires strict distinction between empty objects ({}) and arrays ([]),
	 * the result of this method may not be safe to re-submit to the Comet Server.
	 *
	 * @param array $arr Object data as PHP array
	 * @return SpeedLimitTimeWindow
	 */
	public static function createFromArray(array $arr): \Comet\SpeedLimitTimeWindow
	{
		$stdClass = json_decode(json_encode($arr, JSON_UNESCAPED_SLASHES));
		if (is_array($stdClass) && count($stdClass) === 0) {
			$stdClass = new \stdClass();
		}
		return self::createFromStdclass($stdClass);
	}

	/**
	 * Coerce a JSON string into a new strongly-typed SpeedLimitTimeWindow object.
	 *
	 * @param string $JsonString Object data as JSON string
	 * @return SpeedLimitTimeWindow
	 */
	public static function createFromJSON(string $JsonString): \Comet\SpeedLimitTimeWindow
	{
		$decodedJsonObject = json_decode($JsonString); // as stdClass
		if (\json_last_error() != \JSON_ERROR_NONE) {
			throw new \Exception("JSON decode failed: " . \json_last_error_msg(), \json_last_error());
		}
		$retn = new SpeedLimitTimeWindow();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}

	/**
	 * Convert this SpeedLimitTimeWindow object into a plain PHP array.
	 *
	 * Unknown properties may still be represented as \stdClass objects.
	 *
	 * @param bool $for_json_encode Represent key-value maps as \stdClass instead of plain PHP arrays
	 * @return array
	 */
	public function toArray(bool $for_json_encode = false): array
	{
		$ret = [];
		$ret["RestrictTimes"] = $this->RestrictTimes;
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

