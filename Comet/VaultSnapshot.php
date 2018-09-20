<?php

namespace Comet;

class VaultSnapshot {
	
	/**
	 * @var string
	 */
	public $Snapshot = "";
	
	/**
	 * @var string
	 */
	public $Source = "";
	
	/**
	 * @var int
	 */
	public $CreateTime = 0;
	
	/**
	 * Preserve unknown properties when dealing with future server versions.
	 * You can recursively remove all unknown properties by calling RemoveUnknownProperties().
	 *
	 * @var array
	 */
	private $__unknown_properties = [];
	
	public function inflateFrom(array $decodedJsonObject)
	{
		$this->Snapshot = (string)($decodedJsonObject['Snapshot']);
		
		$this->Source = (string)($decodedJsonObject['Source']);
		
		$this->CreateTime = (int)($decodedJsonObject['CreateTime']);
		
		foreach($decodedJsonObject as $k => $v) {
			switch($k) {
			case 'Snapshot':
			case 'Source':
			case 'CreateTime':
				break;
			default:
				$this->__unknown_properties[$k] = $v;
			}
		}
	}
	
	public static function createFrom(array $decodedJsonObject)
	{
		$retn = new VaultSnapshot();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}
	
	public function toArray($for_json_encode=false)
	{
		$ret = [];
		$ret["Snapshot"] = $this->Snapshot;
		$ret["Source"] = $this->Source;
		$ret["CreateTime"] = $this->CreateTime;
		
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

