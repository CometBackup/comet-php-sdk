<?php

/**
 * Copyright (c) 2018-2022 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 *
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

class BackupJobDetail {

	/**
	 * @var string
	 */
	public $GUID = "";

	/**
	 * @var string
	 */
	public $Username = "";

	/**
	 * @var int
	 */
	public $Classification = 0;

	/**
	 * @var int
	 */
	public $Status = 0;

	/**
	 * @var int
	 */
	public $StartTime = 0;

	/**
	 * @var int
	 */
	public $EndTime = 0;

	/**
	 * @var string
	 */
	public $SourceGUID = "";

	/**
	 * @var string
	 */
	public $DestinationGUID = "";

	/**
	 * @var string
	 */
	public $DeviceID = "";

	/**
	 * @var string
	 */
	public $SnapshotID = "";

	/**
	 * @var string
	 */
	public $ClientVersion = "";

	/**
	 * @var int
	 */
	public $TotalDirectories = 0;

	/**
	 * @var int
	 */
	public $TotalFiles = 0;

	/**
	 * @var int
	 */
	public $TotalSize = 0;

	/**
	 * @var int
	 */
	public $TotalChunks = 0;

	/**
	 * @var int
	 */
	public $UploadSize = 0;

	/**
	 * @var int
	 */
	public $DownloadSize = 0;

	/**
	 * @var int
	 */
	public $TotalVmCount = 0;

	/**
	 * @var int
	 */
	public $TotalMailsCount = 0;

	/**
	 * @var int
	 */
	public $TotalSitesCount = 0;

	/**
	 * @var int
	 */
	public $TotalAccountsCount = 0;

	/**
	 * @var int
	 */
	public $TotalLicensedMailsCount = 0;

	/**
	 * @var int
	 */
	public $TotalUnlicensedMailsCount = 0;

	/**
	 * @var string
	 */
	public $CancellationID = "";

	/**
	 * @var \Comet\BackupJobProgress
	 */
	public $Progress = null;

	/**
	 * @var \Comet\SizeMeasurement
	 */
	public $DestinationSizeStart = null;

	/**
	 * @var \Comet\SizeMeasurement
	 */
	public $DestinationSizeEnd = null;

	/**
	 * Preserve unknown properties when dealing with future server versions.
	 *
	 * @see BackupJobDetail::RemoveUnknownProperties() Remove all unknown properties
	 * @var array
	 */
	private $__unknown_properties = [];

	/**
	 * Replace the content of this BackupJobDetail object from a PHP \stdClass.
	 * The data could be supplied from an API call after json_decode(...); or generated manually.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return void
	 */
	protected function inflateFrom(\stdClass $sc)
	{
		if (property_exists($sc, 'GUID')) {
			$this->GUID = (string)($sc->GUID);
		}
		if (property_exists($sc, 'Username')) {
			$this->Username = (string)($sc->Username);
		}
		if (property_exists($sc, 'Classification')) {
			$this->Classification = (int)($sc->Classification);
		}
		if (property_exists($sc, 'Status')) {
			$this->Status = (int)($sc->Status);
		}
		if (property_exists($sc, 'StartTime')) {
			$this->StartTime = (int)($sc->StartTime);
		}
		if (property_exists($sc, 'EndTime')) {
			$this->EndTime = (int)($sc->EndTime);
		}
		if (property_exists($sc, 'SourceGUID')) {
			$this->SourceGUID = (string)($sc->SourceGUID);
		}
		if (property_exists($sc, 'DestinationGUID')) {
			$this->DestinationGUID = (string)($sc->DestinationGUID);
		}
		if (property_exists($sc, 'DeviceID')) {
			$this->DeviceID = (string)($sc->DeviceID);
		}
		if (property_exists($sc, 'SnapshotID') && !is_null($sc->SnapshotID)) {
			$this->SnapshotID = (string)($sc->SnapshotID);
		}
		if (property_exists($sc, 'ClientVersion')) {
			$this->ClientVersion = (string)($sc->ClientVersion);
		}
		if (property_exists($sc, 'TotalDirectories')) {
			$this->TotalDirectories = (int)($sc->TotalDirectories);
		}
		if (property_exists($sc, 'TotalFiles')) {
			$this->TotalFiles = (int)($sc->TotalFiles);
		}
		if (property_exists($sc, 'TotalSize')) {
			$this->TotalSize = (int)($sc->TotalSize);
		}
		if (property_exists($sc, 'TotalChunks')) {
			$this->TotalChunks = (int)($sc->TotalChunks);
		}
		if (property_exists($sc, 'UploadSize')) {
			$this->UploadSize = (int)($sc->UploadSize);
		}
		if (property_exists($sc, 'DownloadSize')) {
			$this->DownloadSize = (int)($sc->DownloadSize);
		}
		if (property_exists($sc, 'TotalVmCount') && !is_null($sc->TotalVmCount)) {
			$this->TotalVmCount = (int)($sc->TotalVmCount);
		}
		if (property_exists($sc, 'TotalMailsCount') && !is_null($sc->TotalMailsCount)) {
			$this->TotalMailsCount = (int)($sc->TotalMailsCount);
		}
		if (property_exists($sc, 'TotalSitesCount') && !is_null($sc->TotalSitesCount)) {
			$this->TotalSitesCount = (int)($sc->TotalSitesCount);
		}
		if (property_exists($sc, 'TotalAccountsCount') && !is_null($sc->TotalAccountsCount)) {
			$this->TotalAccountsCount = (int)($sc->TotalAccountsCount);
		}
		if (property_exists($sc, 'TotalLicensedMailsCount') && !is_null($sc->TotalLicensedMailsCount)) {
			$this->TotalLicensedMailsCount = (int)($sc->TotalLicensedMailsCount);
		}
		if (property_exists($sc, 'TotalUnlicensedMailsCount') && !is_null($sc->TotalUnlicensedMailsCount)) {
			$this->TotalUnlicensedMailsCount = (int)($sc->TotalUnlicensedMailsCount);
		}
		if (property_exists($sc, 'CancellationID') && !is_null($sc->CancellationID)) {
			$this->CancellationID = (string)($sc->CancellationID);
		}
		if (property_exists($sc, 'Progress') && !is_null($sc->Progress)) {
			if (is_array($sc->Progress) && count($sc->Progress) === 0) {
			// Work around edge case in json_decode--json_encode stdClass conversion
				$this->Progress = \Comet\BackupJobProgress::createFromStdclass(new \stdClass());
			} else {
				$this->Progress = \Comet\BackupJobProgress::createFromStdclass($sc->Progress);
			}
		}
		if (property_exists($sc, 'DestinationSizeStart') && !is_null($sc->DestinationSizeStart)) {
			if (is_array($sc->DestinationSizeStart) && count($sc->DestinationSizeStart) === 0) {
			// Work around edge case in json_decode--json_encode stdClass conversion
				$this->DestinationSizeStart = \Comet\SizeMeasurement::createFromStdclass(new \stdClass());
			} else {
				$this->DestinationSizeStart = \Comet\SizeMeasurement::createFromStdclass($sc->DestinationSizeStart);
			}
		}
		if (property_exists($sc, 'DestinationSizeEnd') && !is_null($sc->DestinationSizeEnd)) {
			if (is_array($sc->DestinationSizeEnd) && count($sc->DestinationSizeEnd) === 0) {
			// Work around edge case in json_decode--json_encode stdClass conversion
				$this->DestinationSizeEnd = \Comet\SizeMeasurement::createFromStdclass(new \stdClass());
			} else {
				$this->DestinationSizeEnd = \Comet\SizeMeasurement::createFromStdclass($sc->DestinationSizeEnd);
			}
		}
		foreach(get_object_vars($sc) as $k => $v) {
			switch($k) {
			case 'GUID':
			case 'Username':
			case 'Classification':
			case 'Status':
			case 'StartTime':
			case 'EndTime':
			case 'SourceGUID':
			case 'DestinationGUID':
			case 'DeviceID':
			case 'SnapshotID':
			case 'ClientVersion':
			case 'TotalDirectories':
			case 'TotalFiles':
			case 'TotalSize':
			case 'TotalChunks':
			case 'UploadSize':
			case 'DownloadSize':
			case 'TotalVmCount':
			case 'TotalMailsCount':
			case 'TotalSitesCount':
			case 'TotalAccountsCount':
			case 'TotalLicensedMailsCount':
			case 'TotalUnlicensedMailsCount':
			case 'CancellationID':
			case 'Progress':
			case 'DestinationSizeStart':
			case 'DestinationSizeEnd':
				break;
			default:
				$this->__unknown_properties[$k] = $v;
			}
		}
	}

	/**
	 * Coerce a stdClass into a new strongly-typed BackupJobDetail object.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return BackupJobDetail
	 */
	public static function createFromStdclass(\stdClass $sc): \Comet\BackupJobDetail
	{
		$retn = new BackupJobDetail();
		$retn->inflateFrom($sc);
		return $retn;
	}

	/**
	 * Coerce a plain PHP array into a new strongly-typed BackupJobDetail object.
	 * Because the Comet Server requires strict distinction between empty objects ({}) and arrays ([]),
	 * the result of this method may not be safe to re-submit to the Comet Server.
	 *
	 * @param array $arr Object data as PHP array
	 * @return BackupJobDetail
	 */
	public static function createFromArray(array $arr): \Comet\BackupJobDetail
	{
		$stdClass = json_decode(json_encode($arr, JSON_UNESCAPED_SLASHES));
		if (is_array($stdClass) && count($stdClass) === 0) {
			$stdClass = new \stdClass();
		}
		return self::createFromStdclass($stdClass);
	}

	/**
	 * Coerce a JSON string into a new strongly-typed BackupJobDetail object.
	 *
	 * @param string $JsonString Object data as JSON string
	 * @return BackupJobDetail
	 */
	public static function createFromJSON(string $JsonString): \Comet\BackupJobDetail
	{
		$decodedJsonObject = json_decode($JsonString); // as stdClass
		if (\json_last_error() != \JSON_ERROR_NONE) {
			throw new \Exception("JSON decode failed: " . \json_last_error_msg());
		}
		$retn = new BackupJobDetail();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}

	/**
	 * Convert this BackupJobDetail object into a plain PHP array.
	 *
	 * Unknown properties may still be represented as \stdClass objects.
	 *
	 * @param bool $for_json_encode Represent empty key-value maps as \stdClass instead of plain PHP arrays
	 * @return array
	 */
	public function toArray(bool $for_json_encode = false): array
	{
		$ret = [];
		$ret["GUID"] = $this->GUID;
		$ret["Username"] = $this->Username;
		$ret["Classification"] = $this->Classification;
		$ret["Status"] = $this->Status;
		$ret["StartTime"] = $this->StartTime;
		$ret["EndTime"] = $this->EndTime;
		$ret["SourceGUID"] = $this->SourceGUID;
		$ret["DestinationGUID"] = $this->DestinationGUID;
		$ret["DeviceID"] = $this->DeviceID;
		$ret["SnapshotID"] = $this->SnapshotID;
		$ret["ClientVersion"] = $this->ClientVersion;
		$ret["TotalDirectories"] = $this->TotalDirectories;
		$ret["TotalFiles"] = $this->TotalFiles;
		$ret["TotalSize"] = $this->TotalSize;
		$ret["TotalChunks"] = $this->TotalChunks;
		$ret["UploadSize"] = $this->UploadSize;
		$ret["DownloadSize"] = $this->DownloadSize;
		$ret["TotalVmCount"] = $this->TotalVmCount;
		$ret["TotalMailsCount"] = $this->TotalMailsCount;
		$ret["TotalSitesCount"] = $this->TotalSitesCount;
		$ret["TotalAccountsCount"] = $this->TotalAccountsCount;
		$ret["TotalLicensedMailsCount"] = $this->TotalLicensedMailsCount;
		$ret["TotalUnlicensedMailsCount"] = $this->TotalUnlicensedMailsCount;
		$ret["CancellationID"] = $this->CancellationID;
		if ( $this->Progress === null ) {
			$ret["Progress"] = $for_json_encode ? (object)[] : [];
		} else {
			$ret["Progress"] = $this->Progress->toArray($for_json_encode);
		}
		if ( $this->DestinationSizeStart === null ) {
			$ret["DestinationSizeStart"] = $for_json_encode ? (object)[] : [];
		} else {
			$ret["DestinationSizeStart"] = $this->DestinationSizeStart->toArray($for_json_encode);
		}
		if ( $this->DestinationSizeEnd === null ) {
			$ret["DestinationSizeEnd"] = $for_json_encode ? (object)[] : [];
		} else {
			$ret["DestinationSizeEnd"] = $this->DestinationSizeEnd->toArray($for_json_encode);
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
		if ($this->Progress !== null) {
			$this->Progress->RemoveUnknownProperties();
		}
		if ($this->DestinationSizeStart !== null) {
			$this->DestinationSizeStart->RemoveUnknownProperties();
		}
		if ($this->DestinationSizeEnd !== null) {
			$this->DestinationSizeEnd->RemoveUnknownProperties();
		}
	}

}

