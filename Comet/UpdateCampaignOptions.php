<?php

namespace Comet;

class UpdateCampaignOptions {
	
	/**
	 * @var boolean
	 */
	public $Active = false;
	
	/**
	 * @var boolean
	 */
	public $UpgradeOlder = false;
	
	/**
	 * @var boolean
	 */
	public $ReinstallCurrentVer = false;
	
	/**
	 * @var boolean
	 */
	public $DowngradeNewer = false;
	
	/**
	 * Preserve unknown properties when dealing with future server versions.
	 * You can recursively remove all unknown properties by calling RemoveUnknownProperties().
	 *
	 * @var array
	 */
	private $__unknown_properties = [];
	
	public function inflateFrom(array $decodedJsonObject)
	{
		$this->Active = (bool)($decodedJsonObject['Active']);
		
		$this->UpgradeOlder = (bool)($decodedJsonObject['UpgradeOlder']);
		
		$this->ReinstallCurrentVer = (bool)($decodedJsonObject['ReinstallCurrentVer']);
		
		$this->DowngradeNewer = (bool)($decodedJsonObject['DowngradeNewer']);
		
		foreach($decodedJsonObject as $k => $v) {
			switch($k) {
			case 'Active':
			case 'UpgradeOlder':
			case 'ReinstallCurrentVer':
			case 'DowngradeNewer':
				break;
			default:
				$this->__unknown_properties[$k] = $v;
			}
		}
	}
	
	public static function createFrom(array $decodedJsonObject)
	{
		$retn = new UpdateCampaignOptions();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}
	
	public function toArray($for_json_encode=false)
	{
		$ret = [];
		$ret["Active"] = $this->Active;
		$ret["UpgradeOlder"] = $this->UpgradeOlder;
		$ret["ReinstallCurrentVer"] = $this->ReinstallCurrentVer;
		$ret["DowngradeNewer"] = $this->DowngradeNewer;
		
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

