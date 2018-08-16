<?php

namespace Comet;

class ExtraFileExclusion {
	
	/**
	 * @var string
	 */
	public $Exclude = "";
	
	/**
	 * @var boolean
	 */
	public $Regex = false;
	
	/**
	 * @var int
	 */
	public $RestrictOS = 0;
	
	/**
	 * Preserve unknown properties when dealing with future server versions.
	 * You can recursively remove all unknown properties by calling RemoveUnknownProperties().
	 *
	 * @var array
	 */
	private $__unknown_properties = [];
	
	public function inflateFrom(array $decodedJsonObject)
	{
		$this->Exclude = (string)($decodedJsonObject['Exclude']);
		
		$this->Regex = (bool)($decodedJsonObject['Regex']);
		
		$this->RestrictOS = (int)($decodedJsonObject['RestrictOS']);
		
		foreach($decodedJsonObject as $k => $v) {
			switch($k) {
			case 'Exclude':
			case 'Regex':
			case 'RestrictOS':
				break;
			default:
				$this->__unknown_properties[$k] = $v;
			}
		}
	}
	
	public static function createFrom(array $decodedJsonObject)
	{
		$retn = new ExtraFileExclusion();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}
	
	public function toArray($for_json_encode=false)
	{
		$ret = [];
		$ret["Exclude"] = $this->Exclude;
		$ret["Regex"] = $this->Regex;
		$ret["RestrictOS"] = $this->RestrictOS;
		
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

