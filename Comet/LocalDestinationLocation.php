<?php

namespace Comet;

class LocalDestinationLocation {
	
	/**
	 * @var string
	 */
	public $LocalcopyPath = "";
	
	/**
	 * @var string
	 */
	public $LocalcopyWinSMBUsername = "";
	
	/**
	 * @var string
	 */
	public $LocalcopyWinSMBPassword = "";
	
	/**
	 * @var int
	 */
	public $LocalcopyWinSMBPasswordFormat = 0;
	
	/**
	 * Preserve unknown properties when dealing with future server versions.
	 *
	 * @see LocalDestinationLocation::RemoveUnknownProperties() Remove all unknown properties
	 * @var array
	 */
	private $__unknown_properties = [];
	
	/**
	 * Replace the content of this LocalDestinationLocation object from a PHP array.
	 * The data could be supplied from an API call after json_decode(..., true); or generated manually.
	 *
	 * @param array $decodedJsonObject Object data as PHP array
	 * @return void
	 */
	public function inflateFrom(array $decodedJsonObject)
	{
		$this->LocalcopyPath = (string)($decodedJsonObject['LocalcopyPath']);
		
		$this->LocalcopyWinSMBUsername = (string)($decodedJsonObject['LocalcopyWinSMBUsername']);
		
		$this->LocalcopyWinSMBPassword = (string)($decodedJsonObject['LocalcopyWinSMBPassword']);
		
		$this->LocalcopyWinSMBPasswordFormat = (int)($decodedJsonObject['LocalcopyWinSMBPasswordFormat']);
		
		foreach($decodedJsonObject as $k => $v) {
			switch($k) {
			case 'LocalcopyPath':
			case 'LocalcopyWinSMBUsername':
			case 'LocalcopyWinSMBPassword':
			case 'LocalcopyWinSMBPasswordFormat':
				break;
			default:
				$this->__unknown_properties[$k] = $v;
			}
		}
	}
	
	/**
	 * Coerce a plain PHP array into a new strongly-typed LocalDestinationLocation object.
	 * The data could be supplied from an API call after json_decode(..., true); or generated manually.
	 *
	 * @param array $decodedJsonObject Object data as PHP array
	 * @return LocalDestinationLocation
	 */
	public static function createFrom(array $decodedJsonObject)
	{
		$retn = new LocalDestinationLocation();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}
	
	/**
	 * Convert this LocalDestinationLocation object into a plain PHP array.
	 *
	 * @param bool $forJSONEncode Set true to use stdClass() for empty objects instead of just [], in order to
	 *                             accurately roundtrip empty objects/arrays through json_encode() compatibility
	 * @return array
	 */
	public function toArray($forJSONEncode=false)
	{
		$ret = [];
		$ret["LocalcopyPath"] = $this->LocalcopyPath;
		$ret["LocalcopyWinSMBUsername"] = $this->LocalcopyWinSMBUsername;
		$ret["LocalcopyWinSMBPassword"] = $this->LocalcopyWinSMBPassword;
		$ret["LocalcopyWinSMBPasswordFormat"] = $this->LocalcopyWinSMBPasswordFormat;
		
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

