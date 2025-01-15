<?php

/**
 * Copyright (c) 2018-2025 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 *
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

/**
 * A backup rule connects one source Protected Item and one destination Storage Vault, with multiple
 * time schedules or event triggers
 */
class BackupRuleConfig {

	/**
	 * @var string
	 */
	public $Description = "";

	/**
	 * Unix timestamp in seconds
	 *
	 * @var int
	 */
	public $CreateTime = 0;

	/**
	 * Unix timestamp in seconds. The caller is responsible for updating this themselves.
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
	 * The source Protected Item ID to back up from, during this schedule
	 *
	 * @var string
	 */
	public $Source = "";

	/**
	 * The destination Storage Vault ID to back up to, during this schedule
	 *
	 * @var string
	 */
	public $Destination = "";

	/**
	 * @var boolean
	 */
	public $SkipAlreadyRunning = false;

	/**
	 * If Zero: disabled
	 *
	 * @var int
	 */
	public $StopAfter = 0;

	/**
	 * If Zero: disabled
	 *
	 * @var int
	 */
	public $LimitVaultSpeedBps = 0;

	/**
	 * Default disabled
	 *
	 * @var boolean
	 */
	public $ReduceDiskConcurrency = false;

	/**
	 * Default disabled
	 *
	 * @var boolean
	 */
	public $UseOnDiskIndexes = false;

	/**
	 * Default disabled
	 *
	 * @var boolean
	 */
	public $AllowZeroFilesSuccess = false;

	/**
	 * If Zero: default Automatic (BACKUPJOBAUTORETENTION_AUTOMATIC)
	 *
	 * @var int
	 */
	public $AutoRetentionLevel = 0;

	/**
	 * Desired concurrency count. If Zero, uses mode defaults
	 *
	 * @var int
	 */
	public $ConcurrencyCount = 0;

	/**
	 * Log verbosity level. LOG_DEBUG has the greatest verbosity
	 *
	 * @var string
	 */
	public $LogLevel = "";

	/**
	 * Scheduled start times
	 *
	 * @var \Comet\ScheduleConfig[]
	 */
	public $Schedules = [];

	/**
	 * Other events that will cause this scheduled job to start
	 *
	 * @var \Comet\BackupRuleEventTriggers
	 */
	public $EventTriggers = null;

	/**
	 * Preserve unknown properties when dealing with future server versions.
	 *
	 * @see BackupRuleConfig::RemoveUnknownProperties() Remove all unknown properties
	 * @var array
	 */
	private $__unknown_properties = [];

	/**
	 * Replace the content of this BackupRuleConfig object from a PHP \stdClass.
	 * The data could be supplied from an API call after json_decode(...); or generated manually.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return void
	 */
	protected function inflateFrom(\stdClass $sc)
	{
		if (property_exists($sc, 'Description')) {
			$this->Description = (string)($sc->Description);
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
		if (property_exists($sc, 'Source')) {
			$this->Source = (string)($sc->Source);
		}
		if (property_exists($sc, 'Destination')) {
			$this->Destination = (string)($sc->Destination);
		}
		if (property_exists($sc, 'SkipAlreadyRunning')) {
			$this->SkipAlreadyRunning = (bool)($sc->SkipAlreadyRunning);
		}
		if (property_exists($sc, 'StopAfter')) {
			$this->StopAfter = (int)($sc->StopAfter);
		}
		if (property_exists($sc, 'LimitVaultSpeedBps')) {
			$this->LimitVaultSpeedBps = (int)($sc->LimitVaultSpeedBps);
		}
		if (property_exists($sc, 'ReduceDiskConcurrency')) {
			$this->ReduceDiskConcurrency = (bool)($sc->ReduceDiskConcurrency);
		}
		if (property_exists($sc, 'UseOnDiskIndexes')) {
			$this->UseOnDiskIndexes = (bool)($sc->UseOnDiskIndexes);
		}
		if (property_exists($sc, 'AllowZeroFilesSuccess')) {
			$this->AllowZeroFilesSuccess = (bool)($sc->AllowZeroFilesSuccess);
		}
		if (property_exists($sc, 'AutoRetentionLevel')) {
			$this->AutoRetentionLevel = (int)($sc->AutoRetentionLevel);
		}
		if (property_exists($sc, 'ConcurrencyCount')) {
			$this->ConcurrencyCount = (int)($sc->ConcurrencyCount);
		}
		if (property_exists($sc, 'LogLevel')) {
			$this->LogLevel = (string)($sc->LogLevel);
		}
		if (property_exists($sc, 'Schedules')) {
			$val_2 = [];
			if ($sc->Schedules !== null) {
				for($i_2 = 0; $i_2 < count($sc->Schedules); ++$i_2) {
					if (is_array($sc->Schedules[$i_2]) && count($sc->Schedules[$i_2]) === 0) {
					// Work around edge case in json_decode--json_encode stdClass conversion
						$val_2[] = \Comet\ScheduleConfig::createFromStdclass(new \stdClass());
					} else {
						$val_2[] = \Comet\ScheduleConfig::createFromStdclass($sc->Schedules[$i_2]);
					}
				}
			}
			$this->Schedules = $val_2;
		}
		if (property_exists($sc, 'EventTriggers')) {
			if (is_array($sc->EventTriggers) && count($sc->EventTriggers) === 0) {
			// Work around edge case in json_decode--json_encode stdClass conversion
				$this->EventTriggers = \Comet\BackupRuleEventTriggers::createFromStdclass(new \stdClass());
			} else {
				$this->EventTriggers = \Comet\BackupRuleEventTriggers::createFromStdclass($sc->EventTriggers);
			}
		}
		foreach(get_object_vars($sc) as $k => $v) {
			switch($k) {
			case 'Description':
			case 'CreateTime':
			case 'ModifyTime':
			case 'PreExec':
			case 'ThawExec':
			case 'PostExec':
			case 'Source':
			case 'Destination':
			case 'SkipAlreadyRunning':
			case 'StopAfter':
			case 'LimitVaultSpeedBps':
			case 'ReduceDiskConcurrency':
			case 'UseOnDiskIndexes':
			case 'AllowZeroFilesSuccess':
			case 'AutoRetentionLevel':
			case 'ConcurrencyCount':
			case 'LogLevel':
			case 'Schedules':
			case 'EventTriggers':
				break;
			default:
				$this->__unknown_properties[$k] = $v;
			}
		}
	}

	/**
	 * Coerce a stdClass into a new strongly-typed BackupRuleConfig object.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return BackupRuleConfig
	 */
	public static function createFromStdclass(\stdClass $sc): \Comet\BackupRuleConfig
	{
		$retn = new BackupRuleConfig();
		$retn->inflateFrom($sc);
		return $retn;
	}

	/**
	 * Coerce a plain PHP array into a new strongly-typed BackupRuleConfig object.
	 * Because the Comet Server requires strict distinction between empty objects ({}) and arrays ([]),
	 * the result of this method may not be safe to re-submit to the Comet Server.
	 *
	 * @param array $arr Object data as PHP array
	 * @return BackupRuleConfig
	 */
	public static function createFromArray(array $arr): \Comet\BackupRuleConfig
	{
		$stdClass = json_decode(json_encode($arr, JSON_UNESCAPED_SLASHES));
		if (is_array($stdClass) && count($stdClass) === 0) {
			$stdClass = new \stdClass();
		}
		return self::createFromStdclass($stdClass);
	}

	/**
	 * Coerce a JSON string into a new strongly-typed BackupRuleConfig object.
	 *
	 * @param string $JsonString Object data as JSON string
	 * @return BackupRuleConfig
	 */
	public static function createFromJSON(string $JsonString): \Comet\BackupRuleConfig
	{
		$decodedJsonObject = json_decode($JsonString); // as stdClass
		if (\json_last_error() != \JSON_ERROR_NONE) {
			throw new \Exception("JSON decode failed: " . \json_last_error_msg(), \json_last_error());
		}
		$retn = new BackupRuleConfig();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}

	/**
	 * Convert this BackupRuleConfig object into a plain PHP array.
	 *
	 * Unknown properties may still be represented as \stdClass objects.
	 *
	 * @param bool $for_json_encode Represent key-value maps as \stdClass instead of plain PHP arrays
	 * @return array
	 */
	public function toArray(bool $for_json_encode = false): array
	{
		$ret = [];
		$ret["Description"] = $this->Description;
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
		$ret["Source"] = $this->Source;
		$ret["Destination"] = $this->Destination;
		$ret["SkipAlreadyRunning"] = $this->SkipAlreadyRunning;
		$ret["StopAfter"] = $this->StopAfter;
		$ret["LimitVaultSpeedBps"] = $this->LimitVaultSpeedBps;
		$ret["ReduceDiskConcurrency"] = $this->ReduceDiskConcurrency;
		$ret["UseOnDiskIndexes"] = $this->UseOnDiskIndexes;
		$ret["AllowZeroFilesSuccess"] = $this->AllowZeroFilesSuccess;
		$ret["AutoRetentionLevel"] = $this->AutoRetentionLevel;
		$ret["ConcurrencyCount"] = $this->ConcurrencyCount;
		$ret["LogLevel"] = $this->LogLevel;
		{
			$c0 = [];
			for($i0 = 0; $i0 < count($this->Schedules); ++$i0) {
				if ( $this->Schedules[$i0] === null ) {
					$val0 = $for_json_encode ? (object)[] : [];
				} else {
					$val0 = $this->Schedules[$i0]->toArray($for_json_encode);
				}
				$c0[] = $val0;
			}
			$ret["Schedules"] = $c0;
		}
		if ( $this->EventTriggers === null ) {
			$ret["EventTriggers"] = $for_json_encode ? (object)[] : [];
		} else {
			$ret["EventTriggers"] = $this->EventTriggers->toArray($for_json_encode);
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
		if ($this->EventTriggers !== null) {
			$this->EventTriggers->RemoveUnknownProperties();
		}
	}

}

