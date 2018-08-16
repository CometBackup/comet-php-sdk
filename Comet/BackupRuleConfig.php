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
	 * You can recursively remove all unknown properties by calling RemoveUnknownProperties().
	 *
	 * @var array
	 */
	private $__unknown_properties = [];
	
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
	
	public static function createFrom(array $decodedJsonObject)
	{
		$retn = new BackupRuleConfig();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}
	
	public function toArray($for_json_encode=false)
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
		if ($this->EventTriggers !== null) {
			$this->EventTriggers->RemoveUnknownProperties();
		}
	}
	
}

