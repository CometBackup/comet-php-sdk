<?php

namespace Comet;

class UpdateCampaignProperties {
	
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
	 * @var int
	 */
	public $StartTime = 0;
	
	/**
	 * @var string
	 */
	public $TargetVersion = "";
	
	/**
	 * Preserve unknown properties when dealing with future server versions.
	 *
	 * @see UpdateCampaignProperties::RemoveUnknownProperties() Remove all unknown properties
	 * @var array
	 */
	private $__unknown_properties = [];
	
	/**
	 * Replace the content of this UpdateCampaignProperties object from a PHP array.
	 * The data could be supplied from an API call after json_decode(..., true); or generated manually.
	 *
	 * @param array $decodedJsonObject Object data as PHP array
	 * @return void
	 */
	public function inflateFrom(array $decodedJsonObject)
	{
		$this->Active = (bool)($decodedJsonObject['Active']);
		
		$this->UpgradeOlder = (bool)($decodedJsonObject['UpgradeOlder']);
		
		$this->ReinstallCurrentVer = (bool)($decodedJsonObject['ReinstallCurrentVer']);
		
		$this->DowngradeNewer = (bool)($decodedJsonObject['DowngradeNewer']);
		
		$this->StartTime = (int)($decodedJsonObject['StartTime']);
		
		$this->TargetVersion = (string)($decodedJsonObject['TargetVersion']);
		
		foreach($decodedJsonObject as $k => $v) {
			switch($k) {
			case 'Active':
			case 'UpgradeOlder':
			case 'ReinstallCurrentVer':
			case 'DowngradeNewer':
			case 'StartTime':
			case 'TargetVersion':
				break;
			default:
				$this->__unknown_properties[$k] = $v;
			}
		}
	}
	
	/**
	 * Coerce a plain PHP array into a new strongly-typed UpdateCampaignProperties object.
	 * The data could be supplied from an API call after json_decode(..., true); or generated manually.
	 *
	 * @param array $decodedJsonObject Object data as PHP array
	 * @return UpdateCampaignProperties
	 */
	public static function createFrom(array $decodedJsonObject)
	{
		$retn = new UpdateCampaignProperties();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}
	
	/**
	 * Convert this UpdateCampaignProperties object into a plain PHP array.
	 *
	 * @param bool $forJSONEncode Set true to use stdClass() for empty objects instead of just [], in order to
	 *                             accurately roundtrip empty objects/arrays through json_encode() compatibility
	 * @return array
	 */
	public function toArray($forJSONEncode=false)
	{
		$ret = [];
		$ret["Active"] = $this->Active;
		$ret["UpgradeOlder"] = $this->UpgradeOlder;
		$ret["ReinstallCurrentVer"] = $this->ReinstallCurrentVer;
		$ret["DowngradeNewer"] = $this->DowngradeNewer;
		$ret["StartTime"] = $this->StartTime;
		$ret["TargetVersion"] = $this->TargetVersion;
		
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

