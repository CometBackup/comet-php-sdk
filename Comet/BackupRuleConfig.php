<?php

/**
 * Copyright (c) 2018 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 * 
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

class BackupRuleConfig {
	
	/**
	 * @var string
	 */
	public $Description = "";
	
	/**
	 * @var int
	 */
	public $CreateTime = 0;
	
	/**
	 * @var int
	 */
	public $ModifyTime = 0;
	
	/**
	 * @var string[]
	 */
	public $PreExec = [];
	
	/**
	 * @var string[]
	 */
	public $PostExec = [];
	
	/**
	 * @var string
	 */
	public $Source = "";
	
	/**
	 * @var string
	 */
	public $Destination = "";
	
	/**
	 * @var boolean
	 */
	public $SkipAlreadyRunning = false;
	
	/**
	 * @var int
	 */
	public $StopAfter = 0;
	
	/**
	 * @var int
	 */
	public $LimitVaultSpeedBps = 0;
	
	/**
	 * @var boolean
	 */
	public $ReduceDiskConcurrency = false;
	
	/**
	 * @var \Comet\ScheduleConfig[]
	 */
	public $Schedules = [];
	
	/**
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
			for($i_2 = 0; $i_2 < count($sc->PreExec); ++$i_2) {
				$val_2[] = (string)($sc->PreExec[$i_2]);
			}
			$this->PreExec = $val_2;
		}
		if (property_exists($sc, 'PostExec')) {
			$val_2 = [];
			for($i_2 = 0; $i_2 < count($sc->PostExec); ++$i_2) {
				$val_2[] = (string)($sc->PostExec[$i_2]);
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
		if (property_exists($sc, 'Schedules')) {
			$val_2 = [];
			for($i_2 = 0; $i_2 < count($sc->Schedules); ++$i_2) {
				$val_2[] = \Comet\ScheduleConfig::createFromStdclass($sc->Schedules[$i_2]);
			}
			$this->Schedules = $val_2;
		}
		if (property_exists($sc, 'EventTriggers')) {
			$this->EventTriggers = \Comet\BackupRuleEventTriggers::createFromStdclass($sc->EventTriggers);
		}
		foreach(get_object_vars($sc) as $k => $v) {
			switch($k) {
			case 'Description':
			case 'CreateTime':
			case 'ModifyTime':
			case 'PreExec':
			case 'PostExec':
			case 'Source':
			case 'Destination':
			case 'SkipAlreadyRunning':
			case 'StopAfter':
			case 'LimitVaultSpeedBps':
			case 'ReduceDiskConcurrency':
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
	public static function createFromStdclass(\stdClass $sc)
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
	public static function createFromArray(array $arr)
	{
		$stdClass = json_decode(json_encode($arr));
		return self::createFromStdclass($stdClass);
	}
	
	/**
	 * Coerce a plain PHP array into a new strongly-typed BackupRuleConfig object.
	 * Because the Comet Server requires strict distinction between empty objects ({}) and arrays ([]),
	 * the result of this method may not be safe to re-submit to the Comet Server.
	 *
	 * @deprecated 3.0.0 Unsafe for round-trip server traversal. You should either 
	 *             (A) acknowledge this and continue by switching to createFromArray, or
	 *             (b) switch to the roundtrip-safe createFromStdclass alternative.
	 * @param array $arr Object data as PHP array
	 * @return BackupRuleConfig
	 */
	public static function createFrom(array $arr)
	{
		return self::createFromArray($arr);
	}
	
	/**
	 * Coerce a JSON string into a new strongly-typed BackupRuleConfig object.
	 *
	 * @param string $JsonString Object data as JSON string
	 * @return BackupRuleConfig
	 */
	public static function createFromJSON($JsonString)
	{
		$decodedJsonObject = json_decode($JsonString); // as stdClass
		if (\json_last_error() != \JSON_ERROR_NONE) {
			throw new \Exception("JSON decode failed: " . \json_last_error_msg());
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
	 * @param bool $for_json_encode Represent empty key-value maps as \stdClass instead of plain PHP arrays
	 * @return array
	 */
	public function toArray($for_json_encode = false)
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
		if ($this->EventTriggers !== null) {
			$this->EventTriggers->RemoveUnknownProperties();
		}
	}
	
}

