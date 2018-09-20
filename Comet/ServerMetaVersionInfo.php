<?php

namespace Comet;

class ServerMetaVersionInfo {
	
	/**
	 * @var string
	 */
	public $Version = "";
	
	/**
	 * @var string
	 */
	public $VersionCodename = "";
	
	/**
	 * @var boolean
	 */
	public $StorageRole = false;
	
	/**
	 * @var boolean
	 */
	public $AuthenticationRole = false;
	
	/**
	 * @var boolean
	 */
	public $SoftwareBuildRole = false;
	
	/**
	 * @var boolean
	 */
	public $ConstellationRole_Legacy = false;
	
	/**
	 * @var boolean
	 */
	public $ConstellationRole = false;
	
	/**
	 * @var int
	 */
	public $ServerStartTime = 0;
	
	/**
	 * @var string
	 */
	public $ServerStartHash = "";
	
	/**
	 * @var int
	 */
	public $CurrentTime = 0;
	
	/**
	 * @var string
	 */
	public $ServerLicenseHash = "";
	
	/**
	 * @var int
	 */
	public $LicenseValidUntil = 0;
	
	/**
	 * @var int
	 */
	public $EmailsSentSuccessfully = 0;
	
	/**
	 * @var int
	 */
	public $EmailsSentErrors = 0;
	
	/**
	 * @var int
	 */
	public $EmailsWaitingInQueue = 0;
	
	/**
	 * Preserve unknown properties when dealing with future server versions.
	 * You can recursively remove all unknown properties by calling RemoveUnknownProperties().
	 *
	 * @var array
	 */
	private $__unknown_properties = [];
	
	public function inflateFrom(array $decodedJsonObject)
	{
		$this->Version = (string)($decodedJsonObject['Version']);
		
		$this->VersionCodename = (string)($decodedJsonObject['VersionCodename']);
		
		$this->StorageRole = (bool)($decodedJsonObject['StorageRole']);
		
		$this->AuthenticationRole = (bool)($decodedJsonObject['AuthenticationRole']);
		
		$this->SoftwareBuildRole = (bool)($decodedJsonObject['SoftwareBuildRole']);
		
		$this->ConstellationRole_Legacy = (bool)($decodedJsonObject['OverseerRole']);
		
		$this->ConstellationRole = (bool)($decodedJsonObject['ConstellationRole']);
		
		$this->ServerStartTime = (int)($decodedJsonObject['ServerStartTime']);
		
		$this->ServerStartHash = (string)($decodedJsonObject['ServerStartHash']);
		
		$this->CurrentTime = (int)($decodedJsonObject['CurrentTime']);
		
		$this->ServerLicenseHash = (string)($decodedJsonObject['ServerLicenseHash']);
		
		$this->LicenseValidUntil = (int)($decodedJsonObject['LicenseValidUntil']);
		
		$this->EmailsSentSuccessfully = (int)($decodedJsonObject['EmailsSentSuccessfully']);
		
		$this->EmailsSentErrors = (int)($decodedJsonObject['EmailsSentErrors']);
		
		$this->EmailsWaitingInQueue = (int)($decodedJsonObject['EmailsWaitingInQueue']);
		
		foreach($decodedJsonObject as $k => $v) {
			switch($k) {
			case 'Version':
			case 'VersionCodename':
			case 'StorageRole':
			case 'AuthenticationRole':
			case 'SoftwareBuildRole':
			case 'OverseerRole':
			case 'ConstellationRole':
			case 'ServerStartTime':
			case 'ServerStartHash':
			case 'CurrentTime':
			case 'ServerLicenseHash':
			case 'LicenseValidUntil':
			case 'EmailsSentSuccessfully':
			case 'EmailsSentErrors':
			case 'EmailsWaitingInQueue':
				break;
			default:
				$this->__unknown_properties[$k] = $v;
			}
		}
	}
	
	public static function createFrom(array $decodedJsonObject)
	{
		$retn = new ServerMetaVersionInfo();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}
	
	public function toArray($for_json_encode=false)
	{
		$ret = [];
		$ret["Version"] = $this->Version;
		$ret["VersionCodename"] = $this->VersionCodename;
		$ret["StorageRole"] = $this->StorageRole;
		$ret["AuthenticationRole"] = $this->AuthenticationRole;
		$ret["SoftwareBuildRole"] = $this->SoftwareBuildRole;
		$ret["OverseerRole"] = $this->ConstellationRole_Legacy;
		$ret["ConstellationRole"] = $this->ConstellationRole;
		$ret["ServerStartTime"] = $this->ServerStartTime;
		$ret["ServerStartHash"] = $this->ServerStartHash;
		$ret["CurrentTime"] = $this->CurrentTime;
		$ret["ServerLicenseHash"] = $this->ServerLicenseHash;
		$ret["LicenseValidUntil"] = $this->LicenseValidUntil;
		$ret["EmailsSentSuccessfully"] = $this->EmailsSentSuccessfully;
		$ret["EmailsSentErrors"] = $this->EmailsSentErrors;
		$ret["EmailsWaitingInQueue"] = $this->EmailsWaitingInQueue;
		
		// Reinstate unknown properties from future server versions
		foreach($this->__unknown_properties as $k => $v) {
			if ($for_json_encode && is_array($v) && count($v) == 0) {
				$ret[$k] = (object)[];
			} else {
				$ret[$k] = $v;
			}
		}
		
		// Special handling for empty objects
		if ($for_json_encode && count($ret) === 0) {
			return new stdClass();
		}
		return $ret;
	}
	
	public function toJSON()
	{
		return json_encode( self::toArray(true) );
	}
	
	public function RemoveUnknownProperties()
	{
		$this->__unknown_properties = [];
	}
	
}

