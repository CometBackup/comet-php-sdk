<?php

namespace Comet;

class StorageVaultProviderPolicy {
	
	/**
	 * @var boolean
	 */
	public $ShouldRestrictProviderList = false;
	
	/**
	 * @var int[]
	 */
	public $AllowedProvidersWhenRestricted = [];
	
	/**
	 * Preserve unknown properties when dealing with future server versions.
	 * You can recursively remove all unknown properties by calling RemoveUnknownProperties().
	 *
	 * @var array
	 */
	private $__unknown_properties = [];
	
	public function inflateFrom(array $decodedJsonObject)
	{
		$this->ShouldRestrictProviderList = (bool)($decodedJsonObject['ShouldRestrictProviderList']);
		
		$val_2 = [];
		for($i_2 = 0; $i_2 < count($decodedJsonObject['AllowedProvidersWhenRestricted']); ++$i_2) {
			$val_2[] = (int)($decodedJsonObject['AllowedProvidersWhenRestricted'][$i_2]);
		}
		$this->AllowedProvidersWhenRestricted = $val_2;
		
		foreach($decodedJsonObject as $k => $v) {
			switch($k) {
			case 'ShouldRestrictProviderList':
			case 'AllowedProvidersWhenRestricted':
				break;
			default:
				$this->__unknown_properties[$k] = $v;
			}
		}
	}
	
	public static function createFrom(array $decodedJsonObject)
	{
		$retn = new StorageVaultProviderPolicy();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}
	
	public function toArray($for_json_encode=false)
	{
		$ret = [];
		$ret["ShouldRestrictProviderList"] = $this->ShouldRestrictProviderList;
		{
			$c0 = [];
			for($i0 = 0; $i0 < count($this->AllowedProvidersWhenRestricted); ++$i0) {
				$val0 = $this->AllowedProvidersWhenRestricted[$i0];
				$c0[] = $val0;
			}
			$ret["AllowedProvidersWhenRestricted"] = $c0;
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

