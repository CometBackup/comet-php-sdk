<?php

namespace Comet;

class DeviceConfig {
	
	/**
	 * @var string
	 */
	public $FriendlyName = "";
	
	/**
	 * @var \Comet\SourceBasicInfo[] An array with string keys.
	 */
	public $Sources = [];
	
	/**
	 * Preserve unknown properties when dealing with future server versions.
	 * You can recursively remove all unknown properties by calling RemoveUnknownProperties().
	 *
	 * @var array
	 */
	private $__unknown_properties = [];
	
	public function inflateFrom(array $decodedJsonObject)
	{
		$this->FriendlyName = (string)($decodedJsonObject['FriendlyName']);
		
		if (array_key_exists('Sources', $decodedJsonObject)) {
			$val_2 = [];
			foreach($decodedJsonObject['Sources'] as $k_2 => $v_2) {
				$phpk_2 = (string)($k_2);
				$phpv_2 = \Comet\SourceBasicInfo::createFrom(isset($v_2) ? $v_2 : []);
				$val_2[$phpk_2] = $phpv_2;
			}
			$this->Sources = $val_2;
			
		}
		foreach($decodedJsonObject as $k => $v) {
			switch($k) {
			case 'FriendlyName':
			case 'Sources':
				break;
			default:
				$this->__unknown_properties[$k] = $v;
			}
		}
	}
	
	public static function createFrom(array $decodedJsonObject)
	{
		$retn = new DeviceConfig();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}
	
	public function toArray($for_json_encode=false)
	{
		$ret = [];
		$ret["FriendlyName"] = $this->FriendlyName;
		{
			$c0 = [];
			foreach($this->Sources as $k0 => $v0) {
				$ko_0 = $k0;
				if ( $v0 === null ) {
					$vo_0 = $for_json_encode ? (object)[] : [];
				} else {
					$vo_0 = $v0->toArray($for_json_encode);
				}
				$c0[ $ko_0 ] = $vo_0;
			}
			if ($for_json_encode && count($c0) == 0) {
				$ret["Sources"] = (object)[];
			} else {
				$ret["Sources"] = $c0;
			}
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

