<?php

namespace Comet;

class AdminAccountPropertiesResponse {
	
	/**
	 * @var \Comet\AdminUserPermissions
	 */
	public $Permissions = null;
	
	/**
	 * Preserve unknown properties when dealing with future server versions.
	 * You can recursively remove all unknown properties by calling RemoveUnknownProperties().
	 *
	 * @var array
	 */
	private $__unknown_properties = [];
	
	public function inflateFrom(array $decodedJsonObject)
	{
		$this->Permissions = \Comet\AdminUserPermissions::createFrom(isset($decodedJsonObject['Permissions']) ? $decodedJsonObject['Permissions'] : []);
		
		foreach($decodedJsonObject as $k => $v) {
			switch($k) {
			case 'Permissions':
				break;
			default:
				$this->__unknown_properties[$k] = $v;
			}
		}
	}
	
	public static function createFrom(array $decodedJsonObject)
	{
		$retn = new AdminAccountPropertiesResponse();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}
	
	public function toArray($for_json_encode=false)
	{
		$ret = [];
		if ( $this->Permissions === null ) {
			$ret["Permissions"] = $for_json_encode ? (object)[] : [];
		} else {
			$ret["Permissions"] = $this->Permissions->toArray($for_json_encode);
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
		if ($this->Permissions !== null) {
			$this->Permissions->RemoveUnknownProperties();
		}
	}
	
}

