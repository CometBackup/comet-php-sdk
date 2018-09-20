<?php

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
	 * Replace the content of this BackupJobDetail object from a PHP array.
	 * The data could be supplied from an API call after json_decode(..., true); or generated manually.
	 *
	 * @param array $decodedJsonObject Object data as PHP array
	 * @return void
	 */
	public function inflateFrom(array $decodedJsonObject)
	{
		$this->GUID = (string)($decodedJsonObject['GUID']);
		
		$this->Username = (string)($decodedJsonObject['Username']);
		
		$this->Classification = (int)($decodedJsonObject['Classification']);
		
		$this->Status = (int)($decodedJsonObject['Status']);
		
		$this->StartTime = (int)($decodedJsonObject['StartTime']);
		
		$this->EndTime = (int)($decodedJsonObject['EndTime']);
		
		$this->SourceGUID = (string)($decodedJsonObject['SourceGUID']);
		
		$this->DestinationGUID = (string)($decodedJsonObject['DestinationGUID']);
		
		$this->DeviceID = (string)($decodedJsonObject['DeviceID']);
		
		$this->ClientVersion = (string)($decodedJsonObject['ClientVersion']);
		
		$this->TotalDirectories = (int)($decodedJsonObject['TotalDirectories']);
		
		$this->TotalFiles = (int)($decodedJsonObject['TotalFiles']);
		
		$this->TotalSize = (int)($decodedJsonObject['TotalSize']);
		
		$this->TotalChunks = (int)($decodedJsonObject['TotalChunks']);
		
		$this->UploadSize = (int)($decodedJsonObject['UploadSize']);
		
		$this->DownloadSize = (int)($decodedJsonObject['DownloadSize']);
		
		if (array_key_exists('CancellationID', $decodedJsonObject)) {
			$this->CancellationID = (string)($decodedJsonObject['CancellationID']);
			
		}
		if (array_key_exists('Progress', $decodedJsonObject)) {
			$this->Progress = \Comet\BackupJobProgress::createFrom(isset($decodedJsonObject['Progress']) ? $decodedJsonObject['Progress'] : []);
			
		}
		foreach($decodedJsonObject as $k => $v) {
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
	 * Coerce a plain PHP array into a new strongly-typed BackupJobDetail object.
	 * The data could be supplied from an API call after json_decode(..., true); or generated manually.
	 *
	 * @param array $decodedJsonObject Object data as PHP array
	 * @return BackupJobDetail
	 */
	public static function createFrom(array $decodedJsonObject)
	{
		$retn = new BackupJobDetail();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}
	
	/**
	 * Convert this BackupJobDetail object into a plain PHP array.
	 *
	 * @param bool $forJSONEncode Set true to use stdClass() for empty objects instead of just [], in order to
	 *                             accurately roundtrip empty objects/arrays through json_encode() compatibility
	 * @return array
	 */
	public function toArray($forJSONEncode=false)
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
			if ($forJSONEncode && is_array($v) && count($v) == 0) {
				$ret[$k] = (object)[];
			} else {
				$ret[$k] = $v;
			}
		}
		
		// Special handling for empty objects
		if ($forJSONEncode && count($ret) === 0) {
			return new stdClass();
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
		return json_encode( self::toArray(true) );
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

