<?php

/**
 * Copyright (c) 2018 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 * 
 * SPDX-License-Identifier: MIT
 */

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
	 *
	 * @see DestinationLocation::RemoveUnknownProperties() Remove all unknown properties
	 * @var array
	 */
	private $__unknown_properties = [];
	
	/**
	 * Replace the content of this DestinationLocation object from a PHP \stdClass.
	 * The data could be supplied from an API call after json_decode(...); or generated manually.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return void
	 */
	protected function inflateFrom(\stdClass $sc)
	{
		if (property_exists($sc, 'DestinationType')) {
			$this->DestinationType = (int)($sc->DestinationType);
		}
		if (property_exists($sc, 'CometServer')) {
			$this->CometServer = (string)($sc->CometServer);
		}
		if (property_exists($sc, 'CometBucket')) {
			$this->CometBucket = (string)($sc->CometBucket);
		}
		if (property_exists($sc, 'CometBucketKey')) {
			$this->CometBucketKey = (string)($sc->CometBucketKey);
		}
		if (property_exists($sc, 'S3Server')) {
			$this->S3Server = (string)($sc->S3Server);
		}
		if (property_exists($sc, 'S3UsesTLS')) {
			$this->S3UsesTLS = (bool)($sc->S3UsesTLS);
		}
		if (property_exists($sc, 'S3AccessKey')) {
			$this->S3AccessKey = (string)($sc->S3AccessKey);
		}
		if (property_exists($sc, 'S3SecretKey')) {
			$this->S3SecretKey = (string)($sc->S3SecretKey);
		}
		if (property_exists($sc, 'S3BucketName')) {
			$this->S3BucketName = (string)($sc->S3BucketName);
		}
		if (property_exists($sc, 'S3Subdir')) {
			$this->S3Subdir = (string)($sc->S3Subdir);
		}
		if (property_exists($sc, 'SFTPServer')) {
			$this->SFTPServer = (string)($sc->SFTPServer);
		}
		if (property_exists($sc, 'SFTPUsername')) {
			$this->SFTPUsername = (string)($sc->SFTPUsername);
		}
		if (property_exists($sc, 'SFTPRemotePath')) {
			$this->SFTPRemotePath = (string)($sc->SFTPRemotePath);
		}
		if (property_exists($sc, 'SFTPAuthMode')) {
			$this->SFTPAuthMode = (int)($sc->SFTPAuthMode);
		}
		if (property_exists($sc, 'SFTPPassword')) {
			$this->SFTPPassword = (string)($sc->SFTPPassword);
		}
		if (property_exists($sc, 'SFTPPrivateKey')) {
			$this->SFTPPrivateKey = (string)($sc->SFTPPrivateKey);
		}
		if (property_exists($sc, 'SFTPCustomAuth_UseKnownHostsFile')) {
			$this->SFTPCustomAuth_UseKnownHostsFile = (bool)($sc->SFTPCustomAuth_UseKnownHostsFile);
		}
		if (property_exists($sc, 'SFTPCustomAuth_KnownHostsFile')) {
			$this->SFTPCustomAuth_KnownHostsFile = (string)($sc->SFTPCustomAuth_KnownHostsFile);
		}
		if (property_exists($sc, 'FTPServer')) {
			$this->FTPServer = (string)($sc->FTPServer);
		}
		if (property_exists($sc, 'FTPUsername')) {
			$this->FTPUsername = (string)($sc->FTPUsername);
		}
		if (property_exists($sc, 'FTPPassword')) {
			$this->FTPPassword = (string)($sc->FTPPassword);
		}
		if (property_exists($sc, 'FTPBaseUseHomeDirectory')) {
			$this->FTPBaseUseHomeDirectory = (bool)($sc->FTPBaseUseHomeDirectory);
		}
		if (property_exists($sc, 'FTPCustomBaseDirectory')) {
			$this->FTPCustomBaseDirectory = (string)($sc->FTPCustomBaseDirectory);
		}
		if (property_exists($sc, 'AZBAccountName')) {
			$this->AZBAccountName = (string)($sc->AZBAccountName);
		}
		if (property_exists($sc, 'AZBAccountKey')) {
			$this->AZBAccountKey = (string)($sc->AZBAccountKey);
		}
		if (property_exists($sc, 'AZBContainer')) {
			$this->AZBContainer = (string)($sc->AZBContainer);
		}
		if (property_exists($sc, 'AZBRealm')) {
			$this->AZBRealm = (string)($sc->AZBRealm);
		}
		if (property_exists($sc, 'AZBPrefix')) {
			$this->AZBPrefix = (string)($sc->AZBPrefix);
		}
		if (property_exists($sc, 'LocalcopyPath')) {
			$this->LocalcopyPath = (string)($sc->LocalcopyPath);
		}
		if (property_exists($sc, 'LocalcopyWinSMBUsername')) {
			$this->LocalcopyWinSMBUsername = (string)($sc->LocalcopyWinSMBUsername);
		}
		if (property_exists($sc, 'LocalcopyWinSMBPassword')) {
			$this->LocalcopyWinSMBPassword = (string)($sc->LocalcopyWinSMBPassword);
		}
		if (property_exists($sc, 'LocalcopyWinSMBPasswordFormat')) {
			$this->LocalcopyWinSMBPasswordFormat = (int)($sc->LocalcopyWinSMBPasswordFormat);
		}
		if (property_exists($sc, 'Swift')) {
			$this->Swift = \Comet\SwiftDestinationLocation::createFromStdclass($sc->Swift);
		}
		if (property_exists($sc, 'B2')) {
			$this->B2 = \Comet\B2DestinationLocation::createFromStdclass($sc->B2);
		}
		if (property_exists($sc, 'SpanTargets')) {
			$val_2 = [];
			for($i_2 = 0; $i_2 < count($sc->SpanTargets); ++$i_2) {
				$val_2[] = \Comet\DestinationLocation::createFromStdclass($sc->SpanTargets[$i_2]);
			}
			$this->SpanTargets = $val_2;
		}
		foreach(get_object_vars($sc) as $k => $v) {
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
	
	/**
	 * Coerce a stdClass into a new strongly-typed DestinationLocation object.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return DestinationLocation
	 */
	public static function createFromStdclass(\stdClass $sc)
	{
		$retn = new DestinationLocation();
		$retn->inflateFrom($sc);
		return $retn;
	}
	
	/**
	 * Coerce a plain PHP array into a new strongly-typed DestinationLocation object.
	 * Because the Comet Server requires strict distinction between empty objects ({}) and arrays ([]),
	 * the result of this method may not be safe to re-submit to the Comet Server.
	 *
	 * @param array $arr Object data as PHP array
	 * @return DestinationLocation
	 */
	public static function createFromArray(array $arr)
	{
		$stdClass = json_decode(json_encode($arr));
		return self::createFromStdclass($stdClass);
	}
	
	/**
	 * Coerce a plain PHP array into a new strongly-typed DestinationLocation object.
	 * Because the Comet Server requires strict distinction between empty objects ({}) and arrays ([]),
	 * the result of this method may not be safe to re-submit to the Comet Server.
	 *
	 * @deprecated 3.0.0 Unsafe for round-trip server traversal. You should either 
	 *             (A) acknowledge this and continue by switching to createFromArray, or
	 *             (b) switch to the roundtrip-safe createFromStdclass alternative.
	 * @param array $arr Object data as PHP array
	 * @return DestinationLocation
	 */
	public static function createFrom(array $arr)
	{
		return self::createFromArray($arr);
	}
	
	/**
	 * Coerce a JSON string into a new strongly-typed DestinationLocation object.
	 *
	 * @param string $JsonString Object data as JSON string
	 * @return DestinationLocation
	 */
	public static function createFromJSON($JsonString)
	{
		$decodedJsonObject = json_decode($JsonString); // as stdClass
		if (\json_last_error() != \JSON_ERROR_NONE) {
			throw new \Exception("JSON decode failed: " . \json_last_error_msg());
		}
		$retn = new DestinationLocation();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}
	
	/**
	 * Convert this DestinationLocation object into a plain PHP array.
	 *
	 * Unknown properties may still be represented as \stdClass objects.
	 *
	 * @param bool $for_json_encode Represent empty key-value maps as \stdClass instead of plain PHP arrays
	 * @return array
	 */
	public function toArray($for_json_encode = false)
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
		if ($this->Swift !== null) {
			$this->Swift->RemoveUnknownProperties();
		}
		if ($this->B2 !== null) {
			$this->B2->RemoveUnknownProperties();
		}
	}
	
}

