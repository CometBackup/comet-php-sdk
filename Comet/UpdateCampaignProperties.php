<?php

/**
 * Copyright (c) 2018-2025 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 *
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

class UpdateCampaignProperties {

	/**
	 * @var boolean
	 */
	public $Active = false;

	/**
	 * @var boolean
	 */
	public $UpgradeOlder = false;

	/**
	 * @var boolean
	 */
	public $ReinstallCurrentVer = false;

	/**
	 * @var boolean
	 */
	public $DowngradeNewer = false;

	/**
	 * Choose whether this bulk upgrade campaign is allowed to interrupt a running backup job.
	 *
	 * @var boolean
	 */
	public $ForceUpgradeRunning = false;

	/**
	 * If true, then the UserFilter will be used to restrict which accounts and devices will be eligible
	 * for the software update. If false, all users and devices will be eligible for the software
	 * update.
	 *
	 * @var boolean
	 */
	public $ApplyDeviceFilter = false;

	/**
	 * @var \Comet\SearchClause
	 */
	public $DeviceFilter = null;

	/**
	 * Unix timestamp, in seconds
	 *
	 * @var int
	 */
	public $StartTime = 0;

	/**
	 * @var string
	 */
	public $TargetVersion = "";

	/**
	 * Preserve unknown properties when dealing with future server versions.
	 *
	 * @see UpdateCampaignProperties::RemoveUnknownProperties() Remove all unknown properties
	 * @var array
	 */
	private $__unknown_properties = [];

	/**
	 * Replace the content of this UpdateCampaignProperties object from a PHP \stdClass.
	 * The data could be supplied from an API call after json_decode(...); or generated manually.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return void
	 */
	protected function inflateFrom(\stdClass $sc)
	{
		if (property_exists($sc, 'Active')) {
			$this->Active = (bool)($sc->Active);
		}
		if (property_exists($sc, 'UpgradeOlder')) {
			$this->UpgradeOlder = (bool)($sc->UpgradeOlder);
		}
		if (property_exists($sc, 'ReinstallCurrentVer')) {
			$this->ReinstallCurrentVer = (bool)($sc->ReinstallCurrentVer);
		}
		if (property_exists($sc, 'DowngradeNewer')) {
			$this->DowngradeNewer = (bool)($sc->DowngradeNewer);
		}
		if (property_exists($sc, 'ForceUpgradeRunning')) {
			$this->ForceUpgradeRunning = (bool)($sc->ForceUpgradeRunning);
		}
		if (property_exists($sc, 'ApplyDeviceFilter')) {
			$this->ApplyDeviceFilter = (bool)($sc->ApplyDeviceFilter);
		}
		if (property_exists($sc, 'DeviceFilter')) {
			if (is_array($sc->DeviceFilter) && count($sc->DeviceFilter) === 0) {
			// Work around edge case in json_decode--json_encode stdClass conversion
				$this->DeviceFilter = \Comet\SearchClause::createFromStdclass(new \stdClass());
			} else {
				$this->DeviceFilter = \Comet\SearchClause::createFromStdclass($sc->DeviceFilter);
			}
		}
		if (property_exists($sc, 'StartTime')) {
			$this->StartTime = (int)($sc->StartTime);
		}
		if (property_exists($sc, 'TargetVersion')) {
			$this->TargetVersion = (string)($sc->TargetVersion);
		}
		foreach(get_object_vars($sc) as $k => $v) {
			switch($k) {
			case 'Active':
			case 'UpgradeOlder':
			case 'ReinstallCurrentVer':
			case 'DowngradeNewer':
			case 'ForceUpgradeRunning':
			case 'ApplyDeviceFilter':
			case 'DeviceFilter':
			case 'StartTime':
			case 'TargetVersion':
				break;
			default:
				$this->__unknown_properties[$k] = $v;
			}
		}
	}

	/**
	 * Coerce a stdClass into a new strongly-typed UpdateCampaignProperties object.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return UpdateCampaignProperties
	 */
	public static function createFromStdclass(\stdClass $sc): \Comet\UpdateCampaignProperties
	{
		$retn = new UpdateCampaignProperties();
		$retn->inflateFrom($sc);
		return $retn;
	}

	/**
	 * Coerce a plain PHP array into a new strongly-typed UpdateCampaignProperties object.
	 * Because the Comet Server requires strict distinction between empty objects ({}) and arrays ([]),
	 * the result of this method may not be safe to re-submit to the Comet Server.
	 *
	 * @param array $arr Object data as PHP array
	 * @return UpdateCampaignProperties
	 */
	public static function createFromArray(array $arr): \Comet\UpdateCampaignProperties
	{
		$stdClass = json_decode(json_encode($arr, JSON_UNESCAPED_SLASHES));
		if (is_array($stdClass) && count($stdClass) === 0) {
			$stdClass = new \stdClass();
		}
		return self::createFromStdclass($stdClass);
	}

	/**
	 * Coerce a JSON string into a new strongly-typed UpdateCampaignProperties object.
	 *
	 * @param string $JsonString Object data as JSON string
	 * @return UpdateCampaignProperties
	 */
	public static function createFromJSON(string $JsonString): \Comet\UpdateCampaignProperties
	{
		$decodedJsonObject = json_decode($JsonString); // as stdClass
		if (\json_last_error() != \JSON_ERROR_NONE) {
			throw new \Exception("JSON decode failed: " . \json_last_error_msg(), \json_last_error());
		}
		$retn = new UpdateCampaignProperties();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}

	/**
	 * Convert this UpdateCampaignProperties object into a plain PHP array.
	 *
	 * Unknown properties may still be represented as \stdClass objects.
	 *
	 * @param bool $for_json_encode Represent key-value maps as \stdClass instead of plain PHP arrays
	 * @return array
	 */
	public function toArray(bool $for_json_encode = false): array
	{
		$ret = [];
		$ret["Active"] = $this->Active;
		$ret["UpgradeOlder"] = $this->UpgradeOlder;
		$ret["ReinstallCurrentVer"] = $this->ReinstallCurrentVer;
		$ret["DowngradeNewer"] = $this->DowngradeNewer;
		$ret["ForceUpgradeRunning"] = $this->ForceUpgradeRunning;
		$ret["ApplyDeviceFilter"] = $this->ApplyDeviceFilter;
		if ( $this->DeviceFilter === null ) {
			$ret["DeviceFilter"] = $for_json_encode ? (object)[] : [];
		} else {
			$ret["DeviceFilter"] = $this->DeviceFilter->toArray($for_json_encode);
		}
		$ret["StartTime"] = $this->StartTime;
		$ret["TargetVersion"] = $this->TargetVersion;

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
		if ($this->DeviceFilter !== null) {
			$this->DeviceFilter->RemoveUnknownProperties();
		}
	}

}

