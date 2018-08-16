<?php

namespace Comet;

class ProtectedItemEngineTypePolicy {
	
	/**
	 * @var boolean
	 */
	public $ShouldRestrictEngineTypeList = false;
	
	/**
	 * @var string[]
	 */
	public $AllowedEngineTypeWhenRestricted = [];
	
	/**
	 * Preserve unknown properties when dealing with future server versions.
	 * You can recursively remove all unknown properties by calling RemoveUnknownProperties().
	 *
	 * @var array
	 */
	private $__unknown_properties = [];
	
	public function inflateFrom(array $decodedJsonObject)
	{
		$this->ShouldRestrictEngineTypeList = (bool)($decodedJsonObject['ShouldRestrictEngineTypeList']);
		
		$val_2 = [];
		for($i_2 = 0; $i_2 < count($decodedJsonObject['AllowedEngineTypeWhenRestricted']); ++$i_2) {
			$val_2[] = (string)($decodedJsonObject['AllowedEngineTypeWhenRestricted'][$i_2]);
		}
		$this->AllowedEngineTypeWhenRestricted = $val_2;
		
		foreach($decodedJsonObject as $k => $v) {
			switch($k) {
			case 'ShouldRestrictEngineTypeList':
			case 'AllowedEngineTypeWhenRestricted':
				break;
			default:
				$this->__unknown_properties[$k] = $v;
			}
		}
	}
	
	public static function createFrom(array $decodedJsonObject)
	{
		$retn = new ProtectedItemEngineTypePolicy();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}
	
	public function toArray($for_json_encode=false)
	{
		$ret = [];
		$ret["ShouldRestrictEngineTypeList"] = $this->ShouldRestrictEngineTypeList;
		{
			$c0 = [];
			for($i0 = 0; $i0 < count($this->AllowedEngineTypeWhenRestricted); ++$i0) {
				$val0 = $this->AllowedEngineTypeWhenRestricted[$i0];
				$c0[] = $val0;
			}
			$ret["AllowedEngineTypeWhenRestricted"] = $c0;
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
	}
	
}

