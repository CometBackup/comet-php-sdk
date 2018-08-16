<?php

namespace Comet;

class UpdateCampaignStatusDeviceEntry {
	
	/**
	 * @var string
	 */
	public $Username = "";
	
	/**
	 * @var string
	 */
	public $DeviceID = "";
	
	/**
	 * @var int
	 */
	public $Status = 0;
	
	/**
	 * Preserve unknown properties when dealing with future server versions.
	 * You can recursively remove all unknown properties by calling RemoveUnknownProperties().
	 *
	 * @var array
	 */
	private $__unknown_properties = [];
	
	public function inflateFrom(array $decodedJsonObject)
	{
		$this->Username = (string)($decodedJsonObject['Username']);
		
		$this->DeviceID = (string)($decodedJsonObject['DeviceID']);
		
		$this->Status = (int)($decodedJsonObject['Status']);
		
		foreach($decodedJsonObject as $k => $v) {
			switch($k) {
			case 'Username':
			case 'DeviceID':
			case 'Status':
				break;
			default:
				$this->__unknown_properties[$k] = $v;
			}
		}
	}
	
	public static function createFrom(array $decodedJsonObject)
	{
		$retn = new UpdateCampaignStatusDeviceEntry();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}
	
	public function toArray($for_json_encode=false)
	{
		$ret = [];
		$ret["Username"] = $this->Username;
		$ret["DeviceID"] = $this->DeviceID;
		$ret["Status"] = $this->Status;
		
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

