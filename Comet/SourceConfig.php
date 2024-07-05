<?php

/**
 * Copyright (c) 2018-2024 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 *
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

class SourceConfig {

	/**
	 * One of the ENGINE_BUILTIN_ constants
	 *
	 * @var string
	 */
	public $Engine = "";

	/**
	 * @var string
	 */
	public $Description = "";

	/**
	 * @var string
	 */
	public $OwnerDevice = "";

	/**
	 * Unix timestamp in seconds
	 *
	 * @var int
	 */
	public $CreateTime = 0;

	/**
	 * Unix timestamp in seconds
	 *
	 * @var int
	 */
	public $ModifyTime = 0;

	/**
	 * Custom commands to run before the job
	 *
	 * @var string[]
	 */
	public $PreExec = [];

	/**
	 * Custom commands to run after taking a disk snapshot
	 *
	 * @var string[]
	 */
	public $ThawExec = [];

	/**
	 * Custom commands to run after the job
	 *
	 * @var string[]
	 */
	public $PostExec = [];

	/**
	 * Configuration for the selected Protected Item type. Each "Engine" supports
	 * different configuration options for the EngineProps values.
	 *
	 * For engine1/file, Comet understands the following EngineProp keys:
	 *
	 * - Any key starting with INCLUDE: A path that is included
	 * - Any key starting with EXCLUDE: An exclusion (glob format)
	 * - Any key starting with REXCLUDE: An exclusion (regular expression format)
	 * - Any key starting with PINCLUDE: A SourceIncludePattern type encoded in JSON format, describing
	 * an advanced inclusion in glob format
	 * - Any key starting with RINCLUDE: A SourceIncludePattern type encoded in JSON format, describing
	 * an advanced inclusion in regular expression format
	 * - Any key starting with SMBAUTH: A set of Windows network share credentials in WinSMBAuth JSON
	 * format
	 * - USE_WIN_VSS: If present, the 'Take filesystem snapshot' checkbox is checked
	 * - CONFIRM_EFS: If present, the 'Dismiss EFS warning' checkbox is checked
	 * - RESCAN_UNCHANGED: If present, the 'Rescan unchanged files' checkbox is checked
	 * - EXTRA_ATTRIBUTES: If present, the 'Back up extra system permissions and attributes' checkbox is
	 * checked
	 *
	 * For engine1/mssql, Comet understands the following EngineProp keys:
	 *
	 * - ALL_DATABASES: If present, include all databases with specified exclusions. If not present,
	 * only back up the specified inclusions
	 * - Any key starting with DATABASE- : A database that is included. Only valid if ALL_DATABASES is
	 * not present.
	 * - Any key starting with EXCEPT-DATABASE- : A database that is excluded. Only valid if
	 * ALL_DATABASES is present.
	 * - INSTANCE: The Microsoft SQL Server instance name
	 * - USERNAME: The username to connect to Microsoft SQL Server
	 * - PASSWORD: The password to connect to Microsoft SQL Server
	 * - AUTHMODE: Either "windows" or "native" (corresponding to the declared MSSQL_AUTH_WINDOWS and
	 * MSSQL_AUTH_NATIVE constant values). If not present, use native authentication if the USERNAME
	 * and/or PASSWORD fields are filled in, use windows authentication if they are blank
	 * - METHOD: Either "OLEDB_NATIVE" or "OLEDB_32" (corresponding to the declared
	 * MSSQL_METHOD_OLEDB_NATIVE and MSSQL_METHOD_OLEDB_32 constant values). If not present, defaults to
	 * Native
	 * - DIFFBASE: If present, take a "Full (base image)" backup job. Otherwise, take a "Full (copy
	 * only)" backup job.
	 * - DIFFERENTIAL: If present, take a "Differential increment" backup job. Otherwise, take a "Full
	 * (copy only)" backup job.
	 * - LOGTRUNC: If present, take a "Log (truncating)" backup job. Otherwise, take a "Full (copy
	 * only)" backup job.
	 * - LOGNOTRUNC: If present, take a "Log (no truncation)" backup job. Otherwise, take a "Full (copy
	 * only)" backup job.
	 *
	 *
	 * @var array<string, string>
	 */
	public $EngineProps = [];

	/**
	 * If set, this SourceConfig was added from a Policy with the specified ID.
	 *
	 * @var string
	 * This field is available in Comet 23.6.0 and later.
	 */
	public $PolicySourceID = "";

	/**
	 * For a Policy-defined SourceConfig, this field controls whether the Protected Item will stay
	 * linked with the policy.
	 *
	 * @var boolean
	 * This field is available in Comet 23.6.0 and later.
	 */
	public $ExistingUserUpdate = false;

	/**
	 * By default, backup jobs from this Protected Item will be subject
	 * to the overall retention policy for the Storage Vault. You can override the policy
	 * for specific Storage Vaults by putting their destination ID as a key here.
	 *
	 * @var array<string, \Comet\RetentionPolicy>
	 */
	public $OverrideDestinationRetention = [];

	/**
	 * @var \Comet\SourceStatistics
	 */
	public $Statistics = null;

	/**
	 * Preserve unknown properties when dealing with future server versions.
	 *
	 * @see SourceConfig::RemoveUnknownProperties() Remove all unknown properties
	 * @var array
	 */
	private $__unknown_properties = [];

	/**
	 * Replace the content of this SourceConfig object from a PHP \stdClass.
	 * The data could be supplied from an API call after json_decode(...); or generated manually.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return void
	 */
	protected function inflateFrom(\stdClass $sc)
	{
		if (property_exists($sc, 'Engine')) {
			$this->Engine = (string)($sc->Engine);
		}
		if (property_exists($sc, 'Description')) {
			$this->Description = (string)($sc->Description);
		}
		if (property_exists($sc, 'OwnerDevice')) {
			$this->OwnerDevice = (string)($sc->OwnerDevice);
		}
		if (property_exists($sc, 'CreateTime')) {
			$this->CreateTime = (int)($sc->CreateTime);
		}
		if (property_exists($sc, 'ModifyTime')) {
			$this->ModifyTime = (int)($sc->ModifyTime);
		}
		if (property_exists($sc, 'PreExec')) {
			$val_2 = [];
			if ($sc->PreExec !== null) {
				for($i_2 = 0; $i_2 < count($sc->PreExec); ++$i_2) {
					$val_2[] = (string)($sc->PreExec[$i_2]);
				}
			}
			$this->PreExec = $val_2;
		}
		if (property_exists($sc, 'ThawExec')) {
			$val_2 = [];
			if ($sc->ThawExec !== null) {
				for($i_2 = 0; $i_2 < count($sc->ThawExec); ++$i_2) {
					$val_2[] = (string)($sc->ThawExec[$i_2]);
				}
			}
			$this->ThawExec = $val_2;
		}
		if (property_exists($sc, 'PostExec')) {
			$val_2 = [];
			if ($sc->PostExec !== null) {
				for($i_2 = 0; $i_2 < count($sc->PostExec); ++$i_2) {
					$val_2[] = (string)($sc->PostExec[$i_2]);
				}
			}
			$this->PostExec = $val_2;
		}
		if (property_exists($sc, 'EngineProps')) {
			$val_2 = [];
			if ($sc->EngineProps !== null) {
				foreach($sc->EngineProps as $k_2 => $v_2) {
					$phpk_2 = (string)($k_2);
					$phpv_2 = (string)($v_2);
					$val_2[$phpk_2] = $phpv_2;
				}
			}
			$this->EngineProps = $val_2;
		}
		if (property_exists($sc, 'PolicySourceID')) {
			$this->PolicySourceID = (string)($sc->PolicySourceID);
		}
		if (property_exists($sc, 'ExistingUserUpdate')) {
			$this->ExistingUserUpdate = (bool)($sc->ExistingUserUpdate);
		}
		if (property_exists($sc, 'OverrideDestinationRetention') && !is_null($sc->OverrideDestinationRetention)) {
			$val_2 = [];
			if ($sc->OverrideDestinationRetention !== null) {
				foreach($sc->OverrideDestinationRetention as $k_2 => $v_2) {
					$phpk_2 = (string)($k_2);
					if (is_array($v_2) && count($v_2) === 0) {
					// Work around edge case in json_decode--json_encode stdClass conversion
						$phpv_2 = \Comet\RetentionPolicy::createFromStdclass(new \stdClass());
					} else {
						$phpv_2 = \Comet\RetentionPolicy::createFromStdclass($v_2);
					}
					$val_2[$phpk_2] = $phpv_2;
				}
			}
			$this->OverrideDestinationRetention = $val_2;
		}
		if (property_exists($sc, 'Statistics') && !is_null($sc->Statistics)) {
			if (is_array($sc->Statistics) && count($sc->Statistics) === 0) {
			// Work around edge case in json_decode--json_encode stdClass conversion
				$this->Statistics = \Comet\SourceStatistics::createFromStdclass(new \stdClass());
			} else {
				$this->Statistics = \Comet\SourceStatistics::createFromStdclass($sc->Statistics);
			}
		}
		foreach(get_object_vars($sc) as $k => $v) {
			switch($k) {
			case 'Engine':
			case 'Description':
			case 'OwnerDevice':
			case 'CreateTime':
			case 'ModifyTime':
			case 'PreExec':
			case 'ThawExec':
			case 'PostExec':
			case 'EngineProps':
			case 'PolicySourceID':
			case 'ExistingUserUpdate':
			case 'OverrideDestinationRetention':
			case 'Statistics':
				break;
			default:
				$this->__unknown_properties[$k] = $v;
			}
		}
	}

	/**
	 * Coerce a stdClass into a new strongly-typed SourceConfig object.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return SourceConfig
	 */
	public static function createFromStdclass(\stdClass $sc): \Comet\SourceConfig
	{
		$retn = new SourceConfig();
		$retn->inflateFrom($sc);
		return $retn;
	}

	/**
	 * Coerce a plain PHP array into a new strongly-typed SourceConfig object.
	 * Because the Comet Server requires strict distinction between empty objects ({}) and arrays ([]),
	 * the result of this method may not be safe to re-submit to the Comet Server.
	 *
	 * @param array $arr Object data as PHP array
	 * @return SourceConfig
	 */
	public static function createFromArray(array $arr): \Comet\SourceConfig
	{
		$stdClass = json_decode(json_encode($arr, JSON_UNESCAPED_SLASHES));
		if (is_array($stdClass) && count($stdClass) === 0) {
			$stdClass = new \stdClass();
		}
		return self::createFromStdclass($stdClass);
	}

	/**
	 * Coerce a JSON string into a new strongly-typed SourceConfig object.
	 *
	 * @param string $JsonString Object data as JSON string
	 * @return SourceConfig
	 */
	public static function createFromJSON(string $JsonString): \Comet\SourceConfig
	{
		$decodedJsonObject = json_decode($JsonString); // as stdClass
		if (\json_last_error() != \JSON_ERROR_NONE) {
			throw new \Exception("JSON decode failed: " . \json_last_error_msg(), \json_last_error());
		}
		$retn = new SourceConfig();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}

	/**
	 * Convert this SourceConfig object into a plain PHP array.
	 *
	 * Unknown properties may still be represented as \stdClass objects.
	 *
	 * @param bool $for_json_encode Represent key-value maps as \stdClass instead of plain PHP arrays
	 * @return array
	 */
	public function toArray(bool $for_json_encode = false): array
	{
		$ret = [];
		$ret["Engine"] = $this->Engine;
		$ret["Description"] = $this->Description;
		$ret["OwnerDevice"] = $this->OwnerDevice;
		$ret["CreateTime"] = $this->CreateTime;
		$ret["ModifyTime"] = $this->ModifyTime;
		{
			$c0 = [];
			for($i0 = 0; $i0 < count($this->PreExec); ++$i0) {
				$val0 = $this->PreExec[$i0];
				$c0[] = $val0;
			}
			$ret["PreExec"] = $c0;
		}
		{
			$c0 = [];
			for($i0 = 0; $i0 < count($this->ThawExec); ++$i0) {
				$val0 = $this->ThawExec[$i0];
				$c0[] = $val0;
			}
			$ret["ThawExec"] = $c0;
		}
		{
			$c0 = [];
			for($i0 = 0; $i0 < count($this->PostExec); ++$i0) {
				$val0 = $this->PostExec[$i0];
				$c0[] = $val0;
			}
			$ret["PostExec"] = $c0;
		}
		{
			$c0 = $for_json_encode ? (object)[] : [];
			foreach($this->EngineProps as $k0 => $v0) {
				$ko_0 = $k0;
				$vo_0 = $v0;
				if ($for_json_encode) {
				$c0->{ $ko_0 } = $vo_0;
				} else {
					$c0[ $ko_0 ] = $vo_0;
				}
			}
			$ret["EngineProps"] = $c0;
		}
		$ret["PolicySourceID"] = $this->PolicySourceID;
		$ret["ExistingUserUpdate"] = $this->ExistingUserUpdate;
		{
			$c0 = $for_json_encode ? (object)[] : [];
			foreach($this->OverrideDestinationRetention as $k0 => $v0) {
				$ko_0 = $k0;
				if ( $v0 === null ) {
					$vo_0 = $for_json_encode ? (object)[] : [];
				} else {
					$vo_0 = $v0->toArray($for_json_encode);
				}
				if ($for_json_encode) {
				$c0->{ $ko_0 } = $vo_0;
				} else {
					$c0[ $ko_0 ] = $vo_0;
				}
			}
			$ret["OverrideDestinationRetention"] = $c0;
		}
		if ( $this->Statistics === null ) {
			$ret["Statistics"] = $for_json_encode ? (object)[] : [];
		} else {
			$ret["Statistics"] = $this->Statistics->toArray($for_json_encode);
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
		if ($this->Statistics !== null) {
			$this->Statistics->RemoveUnknownProperties();
		}
	}

}

