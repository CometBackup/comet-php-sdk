<?php

namespace Comet;

class AdminUserPermissions {
	
	/**
	 * @var boolean
	 */
	public $PreventEditServerSettings = false;
	
	/**
	 * @var boolean
	 */
	public $PreventServerShutdown = false;
	
	/**
	 * Preserve unknown properties when dealing with future server versions.
	 * You can recursively remove all unknown properties by calling RemoveUnknownProperties().
	 *
	 * @var array
	 */
	private $__unknown_properties = [];
	
	public function inflateFrom(array $decodedJsonObject)
	{
		if (array_key_exists('PreventEditServerSettings', $decodedJsonObject)) {
			$this->PreventEditServerSettings = (bool)($decodedJsonObject['PreventEditServerSettings']);
			
		}
		if (array_key_exists('PreventServerShutdown', $decodedJsonObject)) {
			$this->PreventServerShutdown = (bool)($decodedJsonObject['PreventServerShutdown']);
			
		}
		foreach($decodedJsonObject as $k => $v) {
			switch($k) {
			case 'PreventEditServerSettings':
			case 'PreventServerShutdown':
				break;
			default:
				$this->__unknown_properties[$k] = $v;
			}
		}
	}
	
	public static function createFrom(array $decodedJsonObject)
	{
		$retn = new AdminUserPermissions();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}
	
	public function toArray($for_json_encode=false)
	{
		$ret = [];
		$ret["PreventEditServerSettings"] = $this->PreventEditServerSettings;
		$ret["PreventServerShutdown"] = $this->PreventServerShutdown;
		
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

