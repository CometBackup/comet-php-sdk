<?php

/**
 * Copyright (c) 2018-2026 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 *
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

/**
 * SelfBackupEventData is the Data payload for the SEVT_SELFBACKUP_START, SEVT_SELFBACKUP_SUCCEEDED
 * and SEVT_SELFBACKUP_FAILED events.
 * This type is available in Comet 26.11.1 and later.
 */
class SelfBackupEventData {

	/**
	 * For a System Self-Backup, the position of this target in ServerMetaVersionInfo.SelfBackup. Not
	 * meaningful for a tenant export.
	 *
	 * @var int
	 */
	public $TargetIndex = 0;

	/**
	 * For a tenant export, the ID of the exported tenant. Empty for a System Self-Backup.
	 *
	 * @var string
	 */
	public $OrganizationID = "";

	/**
	 * One of the DESTINATIONTYPE_ constants
	 *
	 * @var int
	 */
	public $DestinationType = 0;

	/**
	 * Unix timestamp, in seconds.
	 *
	 * @var int
	 */
	public $StartTime = 0;

	/**
	 * Unix timestamp, in seconds. Zero in SEVT_SELFBACKUP_START events.
	 *
	 * @var int
	 */
	public $EndTime = 0;

	/**
	 * True in SEVT_SELFBACKUP_SUCCEEDED events, and false otherwise.
	 *
	 * @var boolean
	 */
	public $Success = false;

	/**
	 * Size of the self-backup archive, in bytes. Zero in SEVT_SELFBACKUP_START events.
	 *
	 * @var int
	 */
	public $Size = 0;

	/**
	 * Preserve unknown properties when dealing with future server versions.
	 *
	 * @see SelfBackupEventData::RemoveUnknownProperties() Remove all unknown properties
	 * @var array
	 */
	private $__unknown_properties = [];

	/**
	 * Replace the content of this SelfBackupEventData object from a PHP \stdClass.
	 * The data could be supplied from an API call after json_decode(...); or generated manually.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return void
	 */
	protected function inflateFrom(\stdClass $sc)
	{
		if (property_exists($sc, 'TargetIndex')) {
			$this->TargetIndex = (int)($sc->TargetIndex);
		}
		if (property_exists($sc, 'OrganizationID')) {
			$this->OrganizationID = (string)($sc->OrganizationID);
		}
		if (property_exists($sc, 'DestinationType')) {
			$this->DestinationType = (int)($sc->DestinationType);
		}
		if (property_exists($sc, 'StartTime')) {
			$this->StartTime = (int)($sc->StartTime);
		}
		if (property_exists($sc, 'EndTime')) {
			$this->EndTime = (int)($sc->EndTime);
		}
		if (property_exists($sc, 'Success')) {
			$this->Success = (bool)($sc->Success);
		}
		if (property_exists($sc, 'Size')) {
			$this->Size = (int)($sc->Size);
		}
		foreach(get_object_vars($sc) as $k => $v) {
			switch($k) {
			case 'TargetIndex':
			case 'OrganizationID':
			case 'DestinationType':
			case 'StartTime':
			case 'EndTime':
			case 'Success':
			case 'Size':
				break;
			default:
				$this->__unknown_properties[$k] = $v;
			}
		}
	}

	/**
	 * Coerce a stdClass into a new strongly-typed SelfBackupEventData object.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return SelfBackupEventData
	 */
	public static function createFromStdclass(\stdClass $sc): \Comet\SelfBackupEventData
	{
		$retn = new SelfBackupEventData();
		$retn->inflateFrom($sc);
		return $retn;
	}

	/**
	 * Coerce a plain PHP array into a new strongly-typed SelfBackupEventData object.
	 * Because the Comet Server requires strict distinction between empty objects ({}) and arrays ([]),
	 * the result of this method may not be safe to re-submit to the Comet Server.
	 *
	 * @param array $arr Object data as PHP array
	 * @return SelfBackupEventData
	 */
	public static function createFromArray(array $arr): \Comet\SelfBackupEventData
	{
		$stdClass = json_decode(json_encode($arr, JSON_UNESCAPED_SLASHES));
		if (is_array($stdClass) && count($stdClass) === 0) {
			$stdClass = new \stdClass();
		}
		return self::createFromStdclass($stdClass);
	}

	/**
	 * Coerce a JSON string into a new strongly-typed SelfBackupEventData object.
	 *
	 * @param string $JsonString Object data as JSON string
	 * @return SelfBackupEventData
	 */
	public static function createFromJSON(string $JsonString): \Comet\SelfBackupEventData
	{
		$decodedJsonObject = json_decode($JsonString); // as stdClass
		if (\json_last_error() != \JSON_ERROR_NONE) {
			throw new \Exception("JSON decode failed: " . \json_last_error_msg(), \json_last_error());
		}
		$retn = new SelfBackupEventData();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}

	/**
	 * Convert this SelfBackupEventData object into a plain PHP array.
	 *
	 * Unknown properties may still be represented as \stdClass objects.
	 *
	 * @param bool $for_json_encode Represent key-value maps as \stdClass instead of plain PHP arrays
	 * @return array
	 */
	public function toArray(bool $for_json_encode = false): array
	{
		$ret = [];
		$ret["TargetIndex"] = $this->TargetIndex;
		$ret["OrganizationID"] = $this->OrganizationID;
		$ret["DestinationType"] = $this->DestinationType;
		$ret["StartTime"] = $this->StartTime;
		$ret["EndTime"] = $this->EndTime;
		$ret["Success"] = $this->Success;
		$ret["Size"] = $this->Size;

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

