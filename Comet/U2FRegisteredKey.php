<?php

namespace Comet;

class U2FRegisteredKey {
	
	/**
	 * @var string
	 */
	public $AppID = "";
	
	/**
	 * @var string
	 */
	public $KeyHandle = "";
	
	/**
	 * @var string
	 */
	public $Version = "";
	
	/**
	 * Preserve unknown properties when dealing with future server versions.
	 * You can recursively remove all unknown properties by calling RemoveUnknownProperties().
	 *
	 * @var array
	 */
	private $__unknown_properties = [];
	
	public function inflateFrom(array $decodedJsonObject)
	{
		$this->AppID = (string)($decodedJsonObject['AppID']);
		
		$this->KeyHandle = (string)($decodedJsonObject['KeyHandle']);
		
		$this->Version = (string)($decodedJsonObject['Version']);
		
		foreach($decodedJsonObject as $k => $v) {
			switch($k) {
			case 'AppID':
			case 'KeyHandle':
			case 'Version':
				break;
			default:
				$this->__unknown_properties[$k] = $v;
			}
		}
	}
	
	public static function createFrom(array $decodedJsonObject)
	{
		$retn = new U2FRegisteredKey();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}
	
	public function toArray($for_json_encode=false)
	{
		$ret = [];
		$ret["AppID"] = $this->AppID;
		$ret["KeyHandle"] = $this->KeyHandle;
		$ret["Version"] = $this->Version;
		
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

