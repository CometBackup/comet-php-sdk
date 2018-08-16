<?php

namespace Comet;

class BackupRuleEventTriggers {
	
	/**
	 * @var boolean
	 */
	public $OnPCBoot = false;
	
	/**
	 * @var boolean
	 */
	public $OnPCBootIfLastJobMissed = false;
	
	/**
	 * Preserve unknown properties when dealing with future server versions.
	 * You can recursively remove all unknown properties by calling RemoveUnknownProperties().
	 *
	 * @var array
	 */
	private $__unknown_properties = [];
	
	public function inflateFrom(array $decodedJsonObject)
	{
		if (array_key_exists('OnPCBoot', $decodedJsonObject)) {
			$this->OnPCBoot = (bool)($decodedJsonObject['OnPCBoot']);
			
		}
		if (array_key_exists('OnPCBootIfLastJobMissed', $decodedJsonObject)) {
			$this->OnPCBootIfLastJobMissed = (bool)($decodedJsonObject['OnPCBootIfLastJobMissed']);
			
		}
		foreach($decodedJsonObject as $k => $v) {
			switch($k) {
			case 'OnPCBoot':
			case 'OnPCBootIfLastJobMissed':
				break;
			default:
				$this->__unknown_properties[$k] = $v;
			}
		}
	}
	
	public static function createFrom(array $decodedJsonObject)
	{
		$retn = new BackupRuleEventTriggers();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}
	
	public function toArray($for_json_encode=false)
	{
		$ret = [];
		$ret["OnPCBoot"] = $this->OnPCBoot;
		$ret["OnPCBootIfLastJobMissed"] = $this->OnPCBootIfLastJobMissed;
		
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

