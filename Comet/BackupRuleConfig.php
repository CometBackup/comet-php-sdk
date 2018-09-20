<?php

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
	 * Replace the content of this BackupRuleConfig object from a PHP array.
	 * The data could be supplied from an API call after json_decode(..., true); or generated manually.
	 *
	 * @param array $decodedJsonObject Object data as PHP array
	 * @return void
	 */
	public function inflateFrom(array $decodedJsonObject)
	{
		$this->Description = (string)($decodedJsonObject['Description']);
		
		$this->CreateTime = (int)($decodedJsonObject['CreateTime']);
		
		$this->ModifyTime = (int)($decodedJsonObject['ModifyTime']);
		
		$val_2 = [];
		for($i_2 = 0; $i_2 < count($decodedJsonObject['PreExec']); ++$i_2) {
			$val_2[] = (string)($decodedJsonObject['PreExec'][$i_2]);
		}
		$this->PreExec = $val_2;
		
		$val_2 = [];
		for($i_2 = 0; $i_2 < count($decodedJsonObject['PostExec']); ++$i_2) {
			$val_2[] = (string)($decodedJsonObject['PostExec'][$i_2]);
		}
		$this->PostExec = $val_2;
		
		$this->Source = (string)($decodedJsonObject['Source']);
		
		$this->Destination = (string)($decodedJsonObject['Destination']);
		
		$this->SkipAlreadyRunning = (bool)($decodedJsonObject['SkipAlreadyRunning']);
		
		$this->StopAfter = (int)($decodedJsonObject['StopAfter']);
		
		$this->LimitVaultSpeedBps = (int)($decodedJsonObject['LimitVaultSpeedBps']);
		
		$this->ReduceDiskConcurrency = (bool)($decodedJsonObject['ReduceDiskConcurrency']);
		
		$val_2 = [];
		for($i_2 = 0; $i_2 < count($decodedJsonObject['Schedules']); ++$i_2) {
			$val_2[] = \Comet\ScheduleConfig::createFrom(isset($decodedJsonObject['Schedules'][$i_2]) ? $decodedJsonObject['Schedules'][$i_2] : []);
		}
		$this->Schedules = $val_2;
		
		$this->EventTriggers = \Comet\BackupRuleEventTriggers::createFrom(isset($decodedJsonObject['EventTriggers']) ? $decodedJsonObject['EventTriggers'] : []);
		
		foreach($decodedJsonObject as $k => $v) {
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
	 * Coerce a plain PHP array into a new strongly-typed BackupRuleConfig object.
	 * The data could be supplied from an API call after json_decode(..., true); or generated manually.
	 *
	 * @param array $decodedJsonObject Object data as PHP array
	 * @return BackupRuleConfig
	 */
	public static function createFrom(array $decodedJsonObject)
	{
		$retn = new BackupRuleConfig();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}
	
	/**
	 * Convert this BackupRuleConfig object into a plain PHP array.
	 *
	 * @param bool $forJSONEncode Set true to use stdClass() for empty objects instead of just [], in order to
	 *                             accurately roundtrip empty objects/arrays through json_encode() compatibility
	 * @return array
	 */
	public function toArray($forJSONEncode=false)
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
		if ($this->EventTriggers !== null) {
			$this->EventTriggers->RemoveUnknownProperties();
		}
	}
	
}

