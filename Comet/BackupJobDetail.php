<?php

/**
 * Copyright (c) 2018 Comet Licensing Ltd.
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
	 * @var string
	 */
	public $CancellationID = "";
	
	/**
	 * @var \Comet\BackupJobProgress
	 */
	public $Progress = null;
	
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
		if (property_exists($sc, 'CancellationID')) {
			$this->CancellationID = (string)($sc->CancellationID);
		}
		if (property_exists($sc, 'Progress')) {
			$this->Progress = \Comet\BackupJobProgress::createFromStdclass($sc->Progress);
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
			case 'ClientVersion':
			case 'TotalDirectories':
			case 'TotalFiles':
			case 'TotalSize':
			case 'TotalChunks':
			case 'UploadSize':
			case 'DownloadSize':
			case 'CancellationID':
			case 'Progress':
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
	public static function createFromStdclass(\stdClass $sc)
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
	public static function createFromArray(array $arr)
	{
		$stdClass = json_decode(json_encode($arr));
		return self::createFromStdclass($stdClass);
	}
	
	/**
	 * Coerce a plain PHP array into a new strongly-typed BackupJobDetail object.
	 * Because the Comet Server requires strict distinction between empty objects ({}) and arrays ([]),
	 * the result of this method may not be safe to re-submit to the Comet Server.
	 *
	 * @deprecated 3.0.0 Unsafe for round-trip server traversal. You should either 
	 *             (A) acknowledge this and continue by switching to createFromArray, or
	 *             (b) switch to the roundtrip-safe createFromStdclass alternative.
	 * @param array $arr Object data as PHP array
	 * @return BackupJobDetail
	 */
	public static function createFrom(array $arr)
	{
		return self::createFromArray($arr);
	}
	
	/**
	 * Coerce a JSON string into a new strongly-typed BackupJobDetail object.
	 *
	 * @param string $JsonString Object data as JSON string
	 * @return BackupJobDetail
	 */
	public static function createFromJSON($JsonString)
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
	public function toArray($for_json_encode = false)
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
		$ret["ClientVersion"] = $this->ClientVersion;
		$ret["TotalDirectories"] = $this->TotalDirectories;
		$ret["TotalFiles"] = $this->TotalFiles;
		$ret["TotalSize"] = $this->TotalSize;
		$ret["TotalChunks"] = $this->TotalChunks;
		$ret["UploadSize"] = $this->UploadSize;
		$ret["DownloadSize"] = $this->DownloadSize;
		$ret["CancellationID"] = $this->CancellationID;
		if ( $this->Progress === null ) {
			$ret["Progress"] = $for_json_encode ? (object)[] : [];
		} else {
			$ret["Progress"] = $this->Progress->toArray($for_json_encode);
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
		if ($this->Progress !== null) {
			$this->Progress->RemoveUnknownProperties();
		}
	}
	
}

