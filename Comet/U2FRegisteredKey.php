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
	 *
	 * @see U2FRegisteredKey::RemoveUnknownProperties() Remove all unknown properties
	 * @var array
	 */
	private $__unknown_properties = [];
	
	/**
	 * Replace the content of this U2FRegisteredKey object from a PHP array.
	 * The data could be supplied from an API call after json_decode(..., true); or generated manually.
	 *
	 * @param array $decodedJsonObject Object data as PHP array
	 * @return void
	 */
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
	
	/**
	 * Coerce a plain PHP array into a new strongly-typed U2FRegisteredKey object.
	 * The data could be supplied from an API call after json_decode(..., true); or generated manually.
	 *
	 * @param array $decodedJsonObject Object data as PHP array
	 * @return U2FRegisteredKey
	 */
	public static function createFrom(array $decodedJsonObject)
	{
		$retn = new U2FRegisteredKey();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}
	
	/**
	 * Convert this U2FRegisteredKey object into a plain PHP array.
	 *
	 * @param bool $forJSONEncode Set true to use stdClass() for empty objects instead of just [], in order to
	 *                             accurately roundtrip empty objects/arrays through json_encode() compatibility
	 * @return array
	 */
	public function toArray($forJSONEncode=false)
	{
		$ret = [];
		$ret["AppID"] = $this->AppID;
		$ret["KeyHandle"] = $this->KeyHandle;
		$ret["Version"] = $this->Version;
		
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

