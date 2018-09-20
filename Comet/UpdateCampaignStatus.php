<?php

namespace Comet;

class UpdateCampaignStatus {
	
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
	 * @var \Comet\UpdateCampaignStatusDeviceEntry[]
	 */
	public $Devices = [];
	
	/**
	 * Preserve unknown properties when dealing with future server versions.
	 *
	 * @see UpdateCampaignStatus::RemoveUnknownProperties() Remove all unknown properties
	 * @var array
	 */
	private $__unknown_properties = [];
	
	/**
	 * Replace the content of this UpdateCampaignStatus object from a PHP array.
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
		
		$val_2 = [];
		for($i_2 = 0; $i_2 < count($decodedJsonObject['Devices']); ++$i_2) {
			$val_2[] = \Comet\UpdateCampaignStatusDeviceEntry::createFrom(isset($decodedJsonObject['Devices'][$i_2]) ? $decodedJsonObject['Devices'][$i_2] : []);
		}
		$this->Devices = $val_2;
		
		foreach($decodedJsonObject as $k => $v) {
			switch($k) {
			case 'Active':
			case 'UpgradeOlder':
			case 'ReinstallCurrentVer':
			case 'DowngradeNewer':
			case 'StartTime':
			case 'TargetVersion':
			case 'Devices':
				break;
			default:
				$this->__unknown_properties[$k] = $v;
			}
		}
	}
	
	/**
	 * Coerce a plain PHP array into a new strongly-typed UpdateCampaignStatus object.
	 * The data could be supplied from an API call after json_decode(..., true); or generated manually.
	 *
	 * @param array $decodedJsonObject Object data as PHP array
	 * @return UpdateCampaignStatus
	 */
	public static function createFrom(array $decodedJsonObject)
	{
		$retn = new UpdateCampaignStatus();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}
	
	/**
	 * Convert this UpdateCampaignStatus object into a plain PHP array.
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
		{
			$c0 = [];
			for($i0 = 0; $i0 < count($this->Devices); ++$i0) {
				if ( $this->Devices[$i0] === null ) {
					$val0 = $for_json_encode ? (object)[] : [];
				} else {
					$val0 = $this->Devices[$i0]->toArray($for_json_encode);
				}
				$c0[] = $val0;
			}
			$ret["Devices"] = $c0;
		}
		
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

