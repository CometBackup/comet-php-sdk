<?php

/**
 * Copyright (c) 2018-2023 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 *
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

/**
 * DestinationLocation describes the underlying storage location for a Storage Vault.
 * Prior to Comet 17.3.3 this was an embedded part of the DestinationConfig type.
 * This type is available in Comet 17.3.3 and later.
 */
class DestinationLocation {

	/**
	 * One of the DESTINATIONTYPE_ constants
	 *
	 * @var int
	 */
	public $DestinationType = 0;

	/**
	 * The URL for the target Comet Server Storage Role, including http/https and trailing slash
	 *
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
	public $S3CustomRegion = "";

	/**
	 * If true, use legacy v2 signing. If false (default), use modern v4 signing
	 *
	 * @var boolean
	 */
	public $S3UsesV2Signing = false;

	/**
	 * @var boolean
	 */
	public $S3RemoveDeleted = false;

	/**
	 * @var int
	 */
	public $S3ObjectLockDays = 0;

	/**
	 * @var string
	 */
	public $SFTPServer = "";

	/**
	 * @var string
	 */
	public $SFTPUsername = "";

	/**
	 * The directory on the SFTP server in which data is stored.
	 *
	 * @var string
	 */
	public $SFTPRemotePath = "";

	/**
	 * One of the DESTINATION_SFTP_AUTHMODE_ constants
	 *
	 * @var int
	 */
	public $SFTPAuthMode = 0;

	/**
	 * For use with DESTINATION_SFTP_AUTHMODE_PASSWORD only: the SSH password to connect with
	 *
	 * @var string
	 */
	public $SFTPPassword = "";

	/**
	 * For use with DESTINATION_SFTP_AUTHMODE_PRIVATEKEY only: the SSH private key to connect with, in
	 * OpenSSH format.
	 *
	 * @var string
	 */
	public $SFTPPrivateKey = "";

	/**
	 * If true, then the SFTPCustomAuth_KnownHostsFile will be used to verify the remote SSH server's
	 * host key, using Trust On First Use (TOFU).
	 *
	 * @var boolean
	 */
	public $SFTPCustomAuth_UseKnownHostsFile = false;

	/**
	 * If SFTPCustomAuth_UseKnownHostFile is true, the path to the SSH known_hosts file.
	 *
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
	 * If true, store data in the default home directory given by the FTP server. If false, store data
	 * in the FTPCustomBaseDirectory path.
	 *
	 * @var boolean
	 */
	public $FTPBaseUseHomeDirectory = false;

	/**
	 * If FTPBaseUseHomeDirectory is false, this field controls the path where data is stored.
	 *
	 * @var string
	 */
	public $FTPCustomBaseDirectory = "";

	/**
	 * Control whether this is plaintext FTP or secure FTPS by using one of the FTPS_MODE_ constants.
	 *
	 * @var int
	 */
	public $FTPSMode = 0;

	/**
	 * @var int
	 */
	public $FTPPort = 0;

	/**
	 * If set to zero, uses a system default value that is not unlimited.
	 *
	 * @var int
	 */
	public $FTPMaxConnections = 0;

	/**
	 * @var boolean
	 */
	public $FTPAcceptInvalidSSL = false;

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
	 * The base URL for the Azure Blob Storage service. Leave blank to use the global default URL.
	 *
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
	 * If logging in to a Windows network share (SMB/CIFS) is required, enter the username here.
	 *
	 * @var string
	 */
	public $LocalcopyWinSMBUsername = "";

	/**
	 * If logging in to a Windows network share (SMB/CIFS) is required, enter the password here. The
	 * password may be hashed as per the LocalcopyWinSMBPasswordFormat field.
	 *
	 * @var string
	 */
	public $LocalcopyWinSMBPassword = "";

	/**
	 * One of the PASSWORD_FORMAT_ constants. It controls the hash format of the LocalcopyWinSMBPassword
	 * field.
	 *
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
	 * @var \Comet\WebDavDestinationLocation
	 * This field is available in Comet 23.6.9 and later.
	 */
	public $WebDav = null;

	/**
	 * @var \Comet\StorjDestinationLocation
	 */
	public $Storj = null;

	/**
	 * A list of underlying destinations, that will be combined and presented as one.
	 *
	 * @var \Comet\DestinationLocation[]
	 */
	public $SpanTargets = [];

	/**
	 * If true, this Spanned destination will use a consistent hashing scheme
	 * to immediately find specific files on exactly one of the target destinations.
	 * In the Static Slots mode, the span targets cannot be moved or merged, and
	 * the files must always remain in their original location.
	 *
	 * If false, the Spanned destination system will search all targets to find
	 * the requested file. This is slightly slower, but allows you to freely merge,
	 * split, and reorder the underlying destination locations.
	 *
	 * The default option is false.
	 *
	 * @var boolean
	 */
	public $SpanUseStaticSlots = false;

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
		if (property_exists($sc, 'S3CustomRegion')) {
			$this->S3CustomRegion = (string)($sc->S3CustomRegion);
		}
		if (property_exists($sc, 'S3UsesV2Signing')) {
			$this->S3UsesV2Signing = (bool)($sc->S3UsesV2Signing);
		}
		if (property_exists($sc, 'S3RemoveDeleted')) {
			$this->S3RemoveDeleted = (bool)($sc->S3RemoveDeleted);
		}
		if (property_exists($sc, 'S3ObjectLockDays')) {
			$this->S3ObjectLockDays = (int)($sc->S3ObjectLockDays);
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
		if (property_exists($sc, 'FTPSMode')) {
			$this->FTPSMode = (int)($sc->FTPSMode);
		}
		if (property_exists($sc, 'FTPPort')) {
			$this->FTPPort = (int)($sc->FTPPort);
		}
		if (property_exists($sc, 'FTPMaxConnections')) {
			$this->FTPMaxConnections = (int)($sc->FTPMaxConnections);
		}
		if (property_exists($sc, 'FTPAcceptInvalidSSL')) {
			$this->FTPAcceptInvalidSSL = (bool)($sc->FTPAcceptInvalidSSL);
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
			if (is_array($sc->Swift) && count($sc->Swift) === 0) {
			// Work around edge case in json_decode--json_encode stdClass conversion
				$this->Swift = \Comet\SwiftDestinationLocation::createFromStdclass(new \stdClass());
			} else {
				$this->Swift = \Comet\SwiftDestinationLocation::createFromStdclass($sc->Swift);
			}
		}
		if (property_exists($sc, 'B2')) {
			if (is_array($sc->B2) && count($sc->B2) === 0) {
			// Work around edge case in json_decode--json_encode stdClass conversion
				$this->B2 = \Comet\B2DestinationLocation::createFromStdclass(new \stdClass());
			} else {
				$this->B2 = \Comet\B2DestinationLocation::createFromStdclass($sc->B2);
			}
		}
		if (property_exists($sc, 'WebDav')) {
			if (is_array($sc->WebDav) && count($sc->WebDav) === 0) {
			// Work around edge case in json_decode--json_encode stdClass conversion
				$this->WebDav = \Comet\WebDavDestinationLocation::createFromStdclass(new \stdClass());
			} else {
				$this->WebDav = \Comet\WebDavDestinationLocation::createFromStdclass($sc->WebDav);
			}
		}
		if (property_exists($sc, 'Storj')) {
			if (is_array($sc->Storj) && count($sc->Storj) === 0) {
			// Work around edge case in json_decode--json_encode stdClass conversion
				$this->Storj = \Comet\StorjDestinationLocation::createFromStdclass(new \stdClass());
			} else {
				$this->Storj = \Comet\StorjDestinationLocation::createFromStdclass($sc->Storj);
			}
		}
		if (property_exists($sc, 'SpanTargets')) {
			$val_2 = [];
			if ($sc->SpanTargets !== null) {
				for($i_2 = 0; $i_2 < count($sc->SpanTargets); ++$i_2) {
					if (is_array($sc->SpanTargets[$i_2]) && count($sc->SpanTargets[$i_2]) === 0) {
					// Work around edge case in json_decode--json_encode stdClass conversion
						$val_2[] = \Comet\DestinationLocation::createFromStdclass(new \stdClass());
					} else {
						$val_2[] = \Comet\DestinationLocation::createFromStdclass($sc->SpanTargets[$i_2]);
					}
				}
			}
			$this->SpanTargets = $val_2;
		}
		if (property_exists($sc, 'SpanUseStaticSlots')) {
			$this->SpanUseStaticSlots = (bool)($sc->SpanUseStaticSlots);
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
			case 'S3CustomRegion':
			case 'S3UsesV2Signing':
			case 'S3RemoveDeleted':
			case 'S3ObjectLockDays':
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
			case 'FTPSMode':
			case 'FTPPort':
			case 'FTPMaxConnections':
			case 'FTPAcceptInvalidSSL':
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
			case 'WebDav':
			case 'Storj':
			case 'SpanTargets':
			case 'SpanUseStaticSlots':
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
	public static function createFromStdclass(\stdClass $sc): \Comet\DestinationLocation
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
	public static function createFromArray(array $arr): \Comet\DestinationLocation
	{
		$stdClass = json_decode(json_encode($arr, JSON_UNESCAPED_SLASHES));
		if (is_array($stdClass) && count($stdClass) === 0) {
			$stdClass = new \stdClass();
		}
		return self::createFromStdclass($stdClass);
	}

	/**
	 * Coerce a JSON string into a new strongly-typed DestinationLocation object.
	 *
	 * @param string $JsonString Object data as JSON string
	 * @return DestinationLocation
	 */
	public static function createFromJSON(string $JsonString): \Comet\DestinationLocation
	{
		$decodedJsonObject = json_decode($JsonString); // as stdClass
		if (\json_last_error() != \JSON_ERROR_NONE) {
			throw new \Exception("JSON decode failed: " . \json_last_error_msg(), \json_last_error());
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
	public function toArray(bool $for_json_encode = false): array
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
		$ret["S3CustomRegion"] = $this->S3CustomRegion;
		$ret["S3UsesV2Signing"] = $this->S3UsesV2Signing;
		$ret["S3RemoveDeleted"] = $this->S3RemoveDeleted;
		$ret["S3ObjectLockDays"] = $this->S3ObjectLockDays;
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
		$ret["FTPSMode"] = $this->FTPSMode;
		$ret["FTPPort"] = $this->FTPPort;
		$ret["FTPMaxConnections"] = $this->FTPMaxConnections;
		$ret["FTPAcceptInvalidSSL"] = $this->FTPAcceptInvalidSSL;
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
		if ( $this->WebDav === null ) {
			$ret["WebDav"] = $for_json_encode ? (object)[] : [];
		} else {
			$ret["WebDav"] = $this->WebDav->toArray($for_json_encode);
		}
		if ( $this->Storj === null ) {
			$ret["Storj"] = $for_json_encode ? (object)[] : [];
		} else {
			$ret["Storj"] = $this->Storj->toArray($for_json_encode);
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
		$ret["SpanUseStaticSlots"] = $this->SpanUseStaticSlots;

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
		if ($this->Swift !== null) {
			$this->Swift->RemoveUnknownProperties();
		}
		if ($this->B2 !== null) {
			$this->B2->RemoveUnknownProperties();
		}
		if ($this->WebDav !== null) {
			$this->WebDav->RemoveUnknownProperties();
		}
		if ($this->Storj !== null) {
			$this->Storj->RemoveUnknownProperties();
		}
	}

}

