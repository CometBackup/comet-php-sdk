<?php

namespace Comet;

class DestinationLocation {
	
	/**
	 * @var int
	 */
	public $DestinationType = 0;
	
	/**
	 * @var string
	 */
	public $CometServer = "";
	
	/**
	 * @var string
	 */
	public $CometBucket = "";
	
	/**
	 * @var string
	 */
	public $CometBucketKey = "";
	
	/**
	 * @var string
	 */
	public $S3Server = "";
	
	/**
	 * @var boolean
	 */
	public $S3UsesTLS = false;
	
	/**
	 * @var string
	 */
	public $S3AccessKey = "";
	
	/**
	 * @var string
	 */
	public $S3SecretKey = "";
	
	/**
	 * @var string
	 */
	public $S3BucketName = "";
	
	/**
	 * @var string
	 */
	public $S3Subdir = "";
	
	/**
	 * @var string
	 */
	public $SFTPServer = "";
	
	/**
	 * @var string
	 */
	public $SFTPUsername = "";
	
	/**
	 * @var string
	 */
	public $SFTPRemotePath = "";
	
	/**
	 * @var int
	 */
	public $SFTPAuthMode = 0;
	
	/**
	 * @var string
	 */
	public $SFTPPassword = "";
	
	/**
	 * @var string
	 */
	public $SFTPPrivateKey = "";
	
	/**
	 * @var boolean
	 */
	public $SFTPCustomAuth_UseKnownHostsFile = false;
	
	/**
	 * @var string
	 */
	public $SFTPCustomAuth_KnownHostsFile = "";
	
	/**
	 * @var string
	 */
	public $FTPServer = "";
	
	/**
	 * @var string
	 */
	public $FTPUsername = "";
	
	/**
	 * @var string
	 */
	public $FTPPassword = "";
	
	/**
	 * @var boolean
	 */
	public $FTPBaseUseHomeDirectory = false;
	
	/**
	 * @var string
	 */
	public $FTPCustomBaseDirectory = "";
	
	/**
	 * @var string
	 */
	public $AZBAccountName = "";
	
	/**
	 * @var string
	 */
	public $AZBAccountKey = "";
	
	/**
	 * @var string
	 */
	public $AZBContainer = "";
	
	/**
	 * @var string
	 */
	public $AZBRealm = "";
	
	/**
	 * @var string
	 */
	public $AZBPrefix = "";
	
	/**
	 * @var string
	 */
	public $LocalcopyPath = "";
	
	/**
	 * @var string
	 */
	public $LocalcopyWinSMBUsername = "";
	
	/**
	 * @var string
	 */
	public $LocalcopyWinSMBPassword = "";
	
	/**
	 * @var int
	 */
	public $LocalcopyWinSMBPasswordFormat = 0;
	
	/**
	 * @var \Comet\SwiftDestinationLocation
	 */
	public $Swift = null;
	
	/**
	 * @var \Comet\B2DestinationLocation
	 */
	public $B2 = null;
	
	/**
	 * @var \Comet\DestinationLocation[]
	 */
	public $SpanTargets = [];
	
	/**
	 * Preserve unknown properties when dealing with future server versions.
	 * You can recursively remove all unknown properties by calling RemoveUnknownProperties().
	 *
	 * @var array
	 */
	private $__unknown_properties = [];
	
	public function inflateFrom(array $decodedJsonObject)
	{
		$this->DestinationType = (int)($decodedJsonObject['DestinationType']);
		
		$this->CometServer = (string)($decodedJsonObject['CometServer']);
		
		$this->CometBucket = (string)($decodedJsonObject['CometBucket']);
		
		$this->CometBucketKey = (string)($decodedJsonObject['CometBucketKey']);
		
		$this->S3Server = (string)($decodedJsonObject['S3Server']);
		
		$this->S3UsesTLS = (bool)($decodedJsonObject['S3UsesTLS']);
		
		$this->S3AccessKey = (string)($decodedJsonObject['S3AccessKey']);
		
		$this->S3SecretKey = (string)($decodedJsonObject['S3SecretKey']);
		
		$this->S3BucketName = (string)($decodedJsonObject['S3BucketName']);
		
		$this->S3Subdir = (string)($decodedJsonObject['S3Subdir']);
		
		$this->SFTPServer = (string)($decodedJsonObject['SFTPServer']);
		
		$this->SFTPUsername = (string)($decodedJsonObject['SFTPUsername']);
		
		$this->SFTPRemotePath = (string)($decodedJsonObject['SFTPRemotePath']);
		
		$this->SFTPAuthMode = (int)($decodedJsonObject['SFTPAuthMode']);
		
		$this->SFTPPassword = (string)($decodedJsonObject['SFTPPassword']);
		
		$this->SFTPPrivateKey = (string)($decodedJsonObject['SFTPPrivateKey']);
		
		$this->SFTPCustomAuth_UseKnownHostsFile = (bool)($decodedJsonObject['SFTPCustomAuth_UseKnownHostsFile']);
		
		$this->SFTPCustomAuth_KnownHostsFile = (string)($decodedJsonObject['SFTPCustomAuth_KnownHostsFile']);
		
		$this->FTPServer = (string)($decodedJsonObject['FTPServer']);
		
		$this->FTPUsername = (string)($decodedJsonObject['FTPUsername']);
		
		$this->FTPPassword = (string)($decodedJsonObject['FTPPassword']);
		
		$this->FTPBaseUseHomeDirectory = (bool)($decodedJsonObject['FTPBaseUseHomeDirectory']);
		
		$this->FTPCustomBaseDirectory = (string)($decodedJsonObject['FTPCustomBaseDirectory']);
		
		$this->AZBAccountName = (string)($decodedJsonObject['AZBAccountName']);
		
		$this->AZBAccountKey = (string)($decodedJsonObject['AZBAccountKey']);
		
		$this->AZBContainer = (string)($decodedJsonObject['AZBContainer']);
		
		$this->AZBRealm = (string)($decodedJsonObject['AZBRealm']);
		
		$this->AZBPrefix = (string)($decodedJsonObject['AZBPrefix']);
		
		$this->LocalcopyPath = (string)($decodedJsonObject['LocalcopyPath']);
		
		$this->LocalcopyWinSMBUsername = (string)($decodedJsonObject['LocalcopyWinSMBUsername']);
		
		$this->LocalcopyWinSMBPassword = (string)($decodedJsonObject['LocalcopyWinSMBPassword']);
		
		$this->LocalcopyWinSMBPasswordFormat = (int)($decodedJsonObject['LocalcopyWinSMBPasswordFormat']);
		
		$this->Swift = \Comet\SwiftDestinationLocation::createFrom(isset($decodedJsonObject['Swift']) ? $decodedJsonObject['Swift'] : []);
		
		$this->B2 = \Comet\B2DestinationLocation::createFrom(isset($decodedJsonObject['B2']) ? $decodedJsonObject['B2'] : []);
		
		$val_2 = [];
		for($i_2 = 0; $i_2 < count($decodedJsonObject['SpanTargets']); ++$i_2) {
			$val_2[] = \Comet\DestinationLocation::createFrom(isset($decodedJsonObject['SpanTargets'][$i_2]) ? $decodedJsonObject['SpanTargets'][$i_2] : []);
		}
		$this->SpanTargets = $val_2;
		
		foreach($decodedJsonObject as $k => $v) {
			switch($k) {
			case 'DestinationType':
			case 'CometServer':
			case 'CometBucket':
			case 'CometBucketKey':
			case 'S3Server':
			case 'S3UsesTLS':
			case 'S3AccessKey':
			case 'S3SecretKey':
			case 'S3BucketName':
			case 'S3Subdir':
			case 'SFTPServer':
			case 'SFTPUsername':
			case 'SFTPRemotePath':
			case 'SFTPAuthMode':
			case 'SFTPPassword':
			case 'SFTPPrivateKey':
			case 'SFTPCustomAuth_UseKnownHostsFile':
			case 'SFTPCustomAuth_KnownHostsFile':
			case 'FTPServer':
			case 'FTPUsername':
			case 'FTPPassword':
			case 'FTPBaseUseHomeDirectory':
			case 'FTPCustomBaseDirectory':
			case 'AZBAccountName':
			case 'AZBAccountKey':
			case 'AZBContainer':
			case 'AZBRealm':
			case 'AZBPrefix':
			case 'LocalcopyPath':
			case 'LocalcopyWinSMBUsername':
			case 'LocalcopyWinSMBPassword':
			case 'LocalcopyWinSMBPasswordFormat':
			case 'Swift':
			case 'B2':
			case 'SpanTargets':
				break;
			default:
				$this->__unknown_properties[$k] = $v;
			}
		}
	}
	
	public static function createFrom(array $decodedJsonObject)
	{
		$retn = new DestinationLocation();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}
	
	public function toArray($for_json_encode=false)
	{
		$ret = [];
		$ret["DestinationType"] = $this->DestinationType;
		$ret["CometServer"] = $this->CometServer;
		$ret["CometBucket"] = $this->CometBucket;
		$ret["CometBucketKey"] = $this->CometBucketKey;
		$ret["S3Server"] = $this->S3Server;
		$ret["S3UsesTLS"] = $this->S3UsesTLS;
		$ret["S3AccessKey"] = $this->S3AccessKey;
		$ret["S3SecretKey"] = $this->S3SecretKey;
		$ret["S3BucketName"] = $this->S3BucketName;
		$ret["S3Subdir"] = $this->S3Subdir;
		$ret["SFTPServer"] = $this->SFTPServer;
		$ret["SFTPUsername"] = $this->SFTPUsername;
		$ret["SFTPRemotePath"] = $this->SFTPRemotePath;
		$ret["SFTPAuthMode"] = $this->SFTPAuthMode;
		$ret["SFTPPassword"] = $this->SFTPPassword;
		$ret["SFTPPrivateKey"] = $this->SFTPPrivateKey;
		$ret["SFTPCustomAuth_UseKnownHostsFile"] = $this->SFTPCustomAuth_UseKnownHostsFile;
		$ret["SFTPCustomAuth_KnownHostsFile"] = $this->SFTPCustomAuth_KnownHostsFile;
		$ret["FTPServer"] = $this->FTPServer;
		$ret["FTPUsername"] = $this->FTPUsername;
		$ret["FTPPassword"] = $this->FTPPassword;
		$ret["FTPBaseUseHomeDirectory"] = $this->FTPBaseUseHomeDirectory;
		$ret["FTPCustomBaseDirectory"] = $this->FTPCustomBaseDirectory;
		$ret["AZBAccountName"] = $this->AZBAccountName;
		$ret["AZBAccountKey"] = $this->AZBAccountKey;
		$ret["AZBContainer"] = $this->AZBContainer;
		$ret["AZBRealm"] = $this->AZBRealm;
		$ret["AZBPrefix"] = $this->AZBPrefix;
		$ret["LocalcopyPath"] = $this->LocalcopyPath;
		$ret["LocalcopyWinSMBUsername"] = $this->LocalcopyWinSMBUsername;
		$ret["LocalcopyWinSMBPassword"] = $this->LocalcopyWinSMBPassword;
		$ret["LocalcopyWinSMBPasswordFormat"] = $this->LocalcopyWinSMBPasswordFormat;
		if ( $this->Swift === null ) {
			$ret["Swift"] = $for_json_encode ? (object)[] : [];
		} else {
			$ret["Swift"] = $this->Swift->toArray($for_json_encode);
		}
		if ( $this->B2 === null ) {
			$ret["B2"] = $for_json_encode ? (object)[] : [];
		} else {
			$ret["B2"] = $this->B2->toArray($for_json_encode);
		}
		{
			$c0 = [];
			for($i0 = 0; $i0 < count($this->SpanTargets); ++$i0) {
				if ( $this->SpanTargets[$i0] === null ) {
					$val0 = $for_json_encode ? (object)[] : [];
				} else {
					$val0 = $this->SpanTargets[$i0]->toArray($for_json_encode);
				}
				$c0[] = $val0;
			}
			$ret["SpanTargets"] = $c0;
		}
		
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
		if ($this->Swift !== null) {
			$this->Swift->RemoveUnknownProperties();
		}
		if ($this->B2 !== null) {
			$this->B2->RemoveUnknownProperties();
		}
	}
	
}

