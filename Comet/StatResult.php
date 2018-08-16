<?php

namespace Comet;

class StatResult {
	
	/**
	 * @var int
	 */
	public $Buckets = 0;
	
	/**
	 * @var int
	 */
	public $Users = 0;
	
	/**
	 * @var int
	 */
	public $Devices = 0;
	
	/**
	 * @var int
	 */
	public $Boosters = 0;
	
	/**
	 * Preserve unknown properties when dealing with future server versions.
	 * You can recursively remove all unknown properties by calling RemoveUnknownProperties().
	 *
	 * @var array
	 */
	private $__unknown_properties = [];
	
	public function inflateFrom(array $decodedJsonObject)
	{
		$this->Buckets = (int)($decodedJsonObject['Buckets']);
		
		$this->Users = (int)($decodedJsonObject['Users']);
		
		$this->Devices = (int)($decodedJsonObject['Devices']);
		
		$this->Boosters = (int)($decodedJsonObject['Boosters']);
		
		foreach($decodedJsonObject as $k => $v) {
			switch($k) {
			case 'Buckets':
			case 'Users':
			case 'Devices':
			case 'Boosters':
				break;
			default:
				$this->__unknown_properties[$k] = $v;
			}
		}
	}
	
	public static function createFrom(array $decodedJsonObject)
	{
		$retn = new StatResult();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}
	
	public function toArray($for_json_encode=false)
	{
		$ret = [];
		$ret["Buckets"] = $this->Buckets;
		$ret["Users"] = $this->Users;
		$ret["Devices"] = $this->Devices;
		$ret["Boosters"] = $this->Boosters;
		
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

