<?php

/**
 * Copyright (c) 2018-2023 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 *
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

class RestoreJobAdvancedOptions {

	/**
	 * @var int
	 */
	public $Type = 0;

	/**
	 * For RESTORETYPE_FILE
	 *
	 * @var boolean
	 */
	public $OverwriteExistingFiles = false;

	/**
	 * For RESTORETYPE_FILE. If set, OverwriteExistingFiles must be true
	 *
	 * @var boolean
	 */
	public $OverwriteIfNewer = false;

	/**
	 * For RESTORETYPE_FILE. If set, DestPath must be blank
	 *
	 * @var boolean
	 */
	public $DestIsOriginalLocation = false;

	/**
	 * For RESTORETYPE_FILE or RESTORETYPE_PROCESS_xxx
	 *
	 * @var string
	 */
	public $DestPath = "";

	/**
	 * For RESTORETYPE_WINDISK only. Must have one entry for each selected restore path
	 *
	 * @var string[]
	 */
	public $ExactDestPaths = [];

	/**
	 * For RESTORETYPE_FILE_ARCHIVE or RESTORETYPE_PROCESS_ARCHIVE. Default 0 is *.tar, for backward
	 * compatibility
	 *
	 * @var int
	 */
	public $ArchiveFormat = 0;

	/**
	 * For RESTORETYPE_OFFICE365_CLOUD.
	 *
	 * @var \Comet\Office365Credential
	 */
	public $Office365Credential = null;

	/**
	 * For RESTORETYPE_MYSQL
	 *
	 * @var string
	 */
	public $Username = "";

	/**
	 * For RESTORETYPE_MYSQL
	 *
	 * @var string
	 */
	public $Password = "";

	/**
	 * For RESTORETYPE_MYSQL
	 *
	 * @var string
	 */
	public $Host = "";

	/**
	 * For RESTORETYPE_MYSQL
	 *
	 * @var string
	 */
	public $Port = "";

	/**
	 * For RESTORETYPE_MYSQL
	 *
	 * @var boolean
	 */
	public $UseSsl = false;

	/**
	 * For RESTORETYPE_MYSQL i.e.: Self signed certs
	 *
	 * @var boolean
	 */
	public $SslAllowInvalid = false;

	/**
	 * For RESTORETYPE_MYSQL
	 *
	 * @var string
	 */
	public $SslCaFile = "";

	/**
	 * For RESTORETYPE_MYSQL
	 *
	 * @var string
	 */
	public $SslCrtFile = "";

	/**
	 * For RESTORETYPE_MYSQL
	 *
	 * @var string
	 */
	public $SslKeyFile = "";

	/**
	 * For RESTORETYPE_MSSQL.
	 *
	 * @var \Comet\MSSQLLoginArgs
	 */
	public $MsSqlConnection = null;

	/**
	 * Preserve unknown properties when dealing with future server versions.
	 *
	 * @see RestoreJobAdvancedOptions::RemoveUnknownProperties() Remove all unknown properties
	 * @var array
	 */
	private $__unknown_properties = [];

	/**
	 * Replace the content of this RestoreJobAdvancedOptions object from a PHP \stdClass.
	 * The data could be supplied from an API call after json_decode(...); or generated manually.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return void
	 */
	protected function inflateFrom(\stdClass $sc)
	{
		if (property_exists($sc, 'Type')) {
			$this->Type = (int)($sc->Type);
		}
		if (property_exists($sc, 'OverwriteExistingFiles')) {
			$this->OverwriteExistingFiles = (bool)($sc->OverwriteExistingFiles);
		}
		if (property_exists($sc, 'OverwriteIfNewer')) {
			$this->OverwriteIfNewer = (bool)($sc->OverwriteIfNewer);
		}
		if (property_exists($sc, 'DestIsOriginalLocation')) {
			$this->DestIsOriginalLocation = (bool)($sc->DestIsOriginalLocation);
		}
		if (property_exists($sc, 'DestPath')) {
			$this->DestPath = (string)($sc->DestPath);
		}
		if (property_exists($sc, 'ExactDestPaths')) {
			$val_2 = [];
			if ($sc->ExactDestPaths !== null) {
				for($i_2 = 0; $i_2 < count($sc->ExactDestPaths); ++$i_2) {
					$val_2[] = (string)($sc->ExactDestPaths[$i_2]);
				}
			}
			$this->ExactDestPaths = $val_2;
		}
		if (property_exists($sc, 'ArchiveFormat')) {
			$this->ArchiveFormat = (int)($sc->ArchiveFormat);
		}
		if (property_exists($sc, 'Office365Credential') && !is_null($sc->Office365Credential)) {
			if (is_array($sc->Office365Credential) && count($sc->Office365Credential) === 0) {
			// Work around edge case in json_decode--json_encode stdClass conversion
				$this->Office365Credential = \Comet\Office365Credential::createFromStdclass(new \stdClass());
			} else {
				$this->Office365Credential = \Comet\Office365Credential::createFromStdclass($sc->Office365Credential);
			}
		}
		if (property_exists($sc, 'Username')) {
			$this->Username = (string)($sc->Username);
		}
		if (property_exists($sc, 'Password')) {
			$this->Password = (string)($sc->Password);
		}
		if (property_exists($sc, 'Host')) {
			$this->Host = (string)($sc->Host);
		}
		if (property_exists($sc, 'Port')) {
			$this->Port = (string)($sc->Port);
		}
		if (property_exists($sc, 'UseSsl')) {
			$this->UseSsl = (bool)($sc->UseSsl);
		}
		if (property_exists($sc, 'SslAllowInvalid')) {
			$this->SslAllowInvalid = (bool)($sc->SslAllowInvalid);
		}
		if (property_exists($sc, 'SslCaFile')) {
			$this->SslCaFile = (string)($sc->SslCaFile);
		}
		if (property_exists($sc, 'SslCrtFile')) {
			$this->SslCrtFile = (string)($sc->SslCrtFile);
		}
		if (property_exists($sc, 'SslKeyFile')) {
			$this->SslKeyFile = (string)($sc->SslKeyFile);
		}
		if (property_exists($sc, 'MsSqlConnection') && !is_null($sc->MsSqlConnection)) {
			if (is_array($sc->MsSqlConnection) && count($sc->MsSqlConnection) === 0) {
			// Work around edge case in json_decode--json_encode stdClass conversion
				$this->MsSqlConnection = \Comet\MSSQLLoginArgs::createFromStdclass(new \stdClass());
			} else {
				$this->MsSqlConnection = \Comet\MSSQLLoginArgs::createFromStdclass($sc->MsSqlConnection);
			}
		}
		foreach(get_object_vars($sc) as $k => $v) {
			switch($k) {
			case 'Type':
			case 'OverwriteExistingFiles':
			case 'OverwriteIfNewer':
			case 'DestIsOriginalLocation':
			case 'DestPath':
			case 'ExactDestPaths':
			case 'ArchiveFormat':
			case 'Office365Credential':
			case 'Username':
			case 'Password':
			case 'Host':
			case 'Port':
			case 'UseSsl':
			case 'SslAllowInvalid':
			case 'SslCaFile':
			case 'SslCrtFile':
			case 'SslKeyFile':
			case 'MsSqlConnection':
				break;
			default:
				$this->__unknown_properties[$k] = $v;
			}
		}
	}

	/**
	 * Coerce a stdClass into a new strongly-typed RestoreJobAdvancedOptions object.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return RestoreJobAdvancedOptions
	 */
	public static function createFromStdclass(\stdClass $sc): \Comet\RestoreJobAdvancedOptions
	{
		$retn = new RestoreJobAdvancedOptions();
		$retn->inflateFrom($sc);
		return $retn;
	}

	/**
	 * Coerce a plain PHP array into a new strongly-typed RestoreJobAdvancedOptions object.
	 * Because the Comet Server requires strict distinction between empty objects ({}) and arrays ([]),
	 * the result of this method may not be safe to re-submit to the Comet Server.
	 *
	 * @param array $arr Object data as PHP array
	 * @return RestoreJobAdvancedOptions
	 */
	public static function createFromArray(array $arr): \Comet\RestoreJobAdvancedOptions
	{
		$stdClass = json_decode(json_encode($arr, JSON_UNESCAPED_SLASHES));
		if (is_array($stdClass) && count($stdClass) === 0) {
			$stdClass = new \stdClass();
		}
		return self::createFromStdclass($stdClass);
	}

	/**
	 * Coerce a JSON string into a new strongly-typed RestoreJobAdvancedOptions object.
	 *
	 * @param string $JsonString Object data as JSON string
	 * @return RestoreJobAdvancedOptions
	 */
	public static function createFromJSON(string $JsonString): \Comet\RestoreJobAdvancedOptions
	{
		$decodedJsonObject = json_decode($JsonString); // as stdClass
		if (\json_last_error() != \JSON_ERROR_NONE) {
			throw new \Exception("JSON decode failed: " . \json_last_error_msg(), \json_last_error());
		}
		$retn = new RestoreJobAdvancedOptions();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}

	/**
	 * Convert this RestoreJobAdvancedOptions object into a plain PHP array.
	 *
	 * Unknown properties may still be represented as \stdClass objects.
	 *
	 * @param bool $for_json_encode Represent empty key-value maps as \stdClass instead of plain PHP arrays
	 * @return array
	 */
	public function toArray(bool $for_json_encode = false): array
	{
		$ret = [];
		$ret["Type"] = $this->Type;
		$ret["OverwriteExistingFiles"] = $this->OverwriteExistingFiles;
		$ret["OverwriteIfNewer"] = $this->OverwriteIfNewer;
		$ret["DestIsOriginalLocation"] = $this->DestIsOriginalLocation;
		$ret["DestPath"] = $this->DestPath;
		{
			$c0 = [];
			for($i0 = 0; $i0 < count($this->ExactDestPaths); ++$i0) {
				$val0 = $this->ExactDestPaths[$i0];
				$c0[] = $val0;
			}
			$ret["ExactDestPaths"] = $c0;
		}
		$ret["ArchiveFormat"] = $this->ArchiveFormat;
		if ( $this->Office365Credential === null ) {
			$ret["Office365Credential"] = $for_json_encode ? (object)[] : [];
		} else {
			$ret["Office365Credential"] = $this->Office365Credential->toArray($for_json_encode);
		}
		$ret["Username"] = $this->Username;
		$ret["Password"] = $this->Password;
		$ret["Host"] = $this->Host;
		$ret["Port"] = $this->Port;
		$ret["UseSsl"] = $this->UseSsl;
		$ret["SslAllowInvalid"] = $this->SslAllowInvalid;
		$ret["SslCaFile"] = $this->SslCaFile;
		$ret["SslCrtFile"] = $this->SslCrtFile;
		$ret["SslKeyFile"] = $this->SslKeyFile;
		if ( $this->MsSqlConnection === null ) {
			$ret["MsSqlConnection"] = $for_json_encode ? (object)[] : [];
		} else {
			$ret["MsSqlConnection"] = $this->MsSqlConnection->toArray($for_json_encode);
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
		if ($this->Office365Credential !== null) {
			$this->Office365Credential->RemoveUnknownProperties();
		}
		if ($this->MsSqlConnection !== null) {
			$this->MsSqlConnection->RemoveUnknownProperties();
		}
	}

}

