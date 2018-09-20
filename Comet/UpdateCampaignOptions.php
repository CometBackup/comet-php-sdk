<?php

/**
 * Copyright (c) 2018 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 * 
 * SPDX-License-Identifier: MIT
 */

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
	 *
	 * @see UpdateCampaignOptions::RemoveUnknownProperties() Remove all unknown properties
	 * @var array
	 */
	private $__unknown_properties = [];
	
	/**
	 * Replace the content of this UpdateCampaignOptions object from a PHP array.
	 * The data could be supplied from an API call after json_decode(..., true); or generated manually.
	 *
	 * @param array $decodedJsonObject Object data as PHP array
	 * @return void
	 */
	protected function inflateFrom(array $decodedJsonObject)
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
	
	/**
	 * Coerce a plain PHP array into a new strongly-typed UpdateCampaignOptions object.
	 *
	 * @param array $decodedJsonObject Object data as PHP array
	 * @return UpdateCampaignOptions
	 */
	public static function createFrom(array $decodedJsonObject)
	{
		$retn = new UpdateCampaignOptions();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}
	
	/**
	 * Coerce a JSON string into a new strongly-typed UpdateCampaignOptions object.
	 *
	 * @param string $JsonString Object data as JSON string
	 * @return UpdateCampaignOptions
	 */
	public static function createFromJSON($JsonString)
	{
		$decodedJsonObject = json_decode($JsonString, true);
		if (\json_last_error() != \JSON_ERROR_NONE) {
			throw new \Exception("JSON decode failed: " . \json_last_error_msg());
		}
		$retn = new UpdateCampaignOptions();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}
	
	/**
	 * Convert this UpdateCampaignOptions object into a plain PHP array.
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

