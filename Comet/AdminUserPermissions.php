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
	 *
	 * @see AdminUserPermissions::RemoveUnknownProperties() Remove all unknown properties
	 * @var array
	 */
	private $__unknown_properties = [];
	
	/**
	 * Replace the content of this AdminUserPermissions object from a PHP array.
	 * The data could be supplied from an API call after json_decode(..., true); or generated manually.
	 *
	 * @param array $decodedJsonObject Object data as PHP array
	 * @return void
	 */
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
	
	/**
	 * Coerce a plain PHP array into a new strongly-typed AdminUserPermissions object.
	 * The data could be supplied from an API call after json_decode(..., true); or generated manually.
	 *
	 * @param array $decodedJsonObject Object data as PHP array
	 * @return AdminUserPermissions
	 */
	public static function createFrom(array $decodedJsonObject)
	{
		$retn = new AdminUserPermissions();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}
	
	/**
	 * Convert this AdminUserPermissions object into a plain PHP array.
	 *
	 * @param bool $forJSONEncode Set true to use stdClass() for empty objects instead of just [], in order to
	 *                             accurately roundtrip empty objects/arrays through json_encode() compatibility
	 * @return array
	 */
	public function toArray($forJSONEncode=false)
	{
		$ret = [];
		$ret["PreventEditServerSettings"] = $this->PreventEditServerSettings;
		$ret["PreventServerShutdown"] = $this->PreventServerShutdown;
		
		// Reinstate unknown properties from future server versions
		foreach($this->__unknown_properties as $k => $v) {
			if ($forJSONEncode && is_array($v) && count($v) == 0) {
				$ret[$k] = (object)[];
			} else {
				$ret[$k] = $v;
			}
		}
		
		// Special handling for empty objects
		if ($forJSONEncode && count($ret) === 0) {
			return new stdClass();
		}
		return $ret;
	}
	
	/**
	 * Convert this object to a JSON string.
	 * The result is suitable to submit to the Comet Server API.
	 *
	 * @return string
	 */
	public function toJSON()
	{
		return json_encode( self::toArray(true) );
	}
	
	/**
	 * Erase any preserved object properties that are unknown to this Comet Server SDK.
	 *
	 * @return void
	 */
	public function RemoveUnknownProperties()
	{
		$this->__unknown_properties = [];
	}
	
}

