<?php

/**
 * Copyright (c) 2018-2025 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 *
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

/**
 * BackupJobAdvancedOptions control additional advanced options for running a backup job. They can
 * be specified as part of a schedule in the BackupRuleConfig type, or supplied immediately when
 * running a job.
 */
class BackupJobAdvancedOptions {

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
	 * Preserve unknown properties when dealing with future server versions.
	 *
	 * @see BackupJobAdvancedOptions::RemoveUnknownProperties() Remove all unknown properties
	 * @var array
	 */
	private $__unknown_properties = [];

	/**
	 * Replace the content of this BackupJobAdvancedOptions object from a PHP \stdClass.
	 * The data could be supplied from an API call after json_decode(...); or generated manually.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return void
	 */
	protected function inflateFrom(\stdClass $sc)
	{
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
		foreach(get_object_vars($sc) as $k => $v) {
			switch($k) {
			case 'SkipAlreadyRunning':
			case 'StopAfter':
			case 'LimitVaultSpeedBps':
			case 'ReduceDiskConcurrency':
			case 'UseOnDiskIndexes':
			case 'AllowZeroFilesSuccess':
			case 'AutoRetentionLevel':
			case 'ConcurrencyCount':
			case 'LogLevel':
				break;
			default:
				$this->__unknown_properties[$k] = $v;
			}
		}
	}

	/**
	 * Coerce a stdClass into a new strongly-typed BackupJobAdvancedOptions object.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return BackupJobAdvancedOptions
	 */
	public static function createFromStdclass(\stdClass $sc): \Comet\BackupJobAdvancedOptions
	{
		$retn = new BackupJobAdvancedOptions();
		$retn->inflateFrom($sc);
		return $retn;
	}

	/**
	 * Coerce a plain PHP array into a new strongly-typed BackupJobAdvancedOptions object.
	 * Because the Comet Server requires strict distinction between empty objects ({}) and arrays ([]),
	 * the result of this method may not be safe to re-submit to the Comet Server.
	 *
	 * @param array $arr Object data as PHP array
	 * @return BackupJobAdvancedOptions
	 */
	public static function createFromArray(array $arr): \Comet\BackupJobAdvancedOptions
	{
		$stdClass = json_decode(json_encode($arr, JSON_UNESCAPED_SLASHES));
		if (is_array($stdClass) && count($stdClass) === 0) {
			$stdClass = new \stdClass();
		}
		return self::createFromStdclass($stdClass);
	}

	/**
	 * Coerce a JSON string into a new strongly-typed BackupJobAdvancedOptions object.
	 *
	 * @param string $JsonString Object data as JSON string
	 * @return BackupJobAdvancedOptions
	 */
	public static function createFromJSON(string $JsonString): \Comet\BackupJobAdvancedOptions
	{
		$decodedJsonObject = json_decode($JsonString); // as stdClass
		if (\json_last_error() != \JSON_ERROR_NONE) {
			throw new \Exception("JSON decode failed: " . \json_last_error_msg(), \json_last_error());
		}
		$retn = new BackupJobAdvancedOptions();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}

	/**
	 * Convert this BackupJobAdvancedOptions object into a plain PHP array.
	 *
	 * Unknown properties may still be represented as \stdClass objects.
	 *
	 * @param bool $for_json_encode Represent key-value maps as \stdClass instead of plain PHP arrays
	 * @return array
	 */
	public function toArray(bool $for_json_encode = false): array
	{
		$ret = [];
		$ret["SkipAlreadyRunning"] = $this->SkipAlreadyRunning;
		$ret["StopAfter"] = $this->StopAfter;
		$ret["LimitVaultSpeedBps"] = $this->LimitVaultSpeedBps;
		$ret["ReduceDiskConcurrency"] = $this->ReduceDiskConcurrency;
		$ret["UseOnDiskIndexes"] = $this->UseOnDiskIndexes;
		$ret["AllowZeroFilesSuccess"] = $this->AllowZeroFilesSuccess;
		$ret["AutoRetentionLevel"] = $this->AutoRetentionLevel;
		$ret["ConcurrencyCount"] = $this->ConcurrencyCount;
		$ret["LogLevel"] = $this->LogLevel;

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
	}

}

