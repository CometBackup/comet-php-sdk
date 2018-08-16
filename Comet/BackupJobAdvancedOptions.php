<?php

namespace Comet;

class BackupJobAdvancedOptions {
	
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
	 * Preserve unknown properties when dealing with future server versions.
	 * You can recursively remove all unknown properties by calling RemoveUnknownProperties().
	 *
	 * @var array
	 */
	private $__unknown_properties = [];
	
	public function inflateFrom(array $decodedJsonObject)
	{
		$this->SkipAlreadyRunning = (bool)($decodedJsonObject['SkipAlreadyRunning']);
		
		$this->StopAfter = (int)($decodedJsonObject['StopAfter']);
		
		$this->LimitVaultSpeedBps = (int)($decodedJsonObject['LimitVaultSpeedBps']);
		
		$this->ReduceDiskConcurrency = (bool)($decodedJsonObject['ReduceDiskConcurrency']);
		
		foreach($decodedJsonObject as $k => $v) {
			switch($k) {
			case 'SkipAlreadyRunning':
			case 'StopAfter':
			case 'LimitVaultSpeedBps':
			case 'ReduceDiskConcurrency':
				break;
			default:
				$this->__unknown_properties[$k] = $v;
			}
		}
	}
	
	public static function createFrom(array $decodedJsonObject)
	{
		$retn = new BackupJobAdvancedOptions();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}
	
	public function toArray($for_json_encode=false)
	{
		$ret = [];
		$ret["SkipAlreadyRunning"] = $this->SkipAlreadyRunning;
		$ret["StopAfter"] = $this->StopAfter;
		$ret["LimitVaultSpeedBps"] = $this->LimitVaultSpeedBps;
		$ret["ReduceDiskConcurrency"] = $this->ReduceDiskConcurrency;
		
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
	}
	
}

