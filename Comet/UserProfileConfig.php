<?php

namespace Comet;

class UserProfileConfig {
	
	/**
	 * @var string
	 */
	public $Username = "";
	
	/**
	 * @var string
	 */
	public $LocalTimezone = "";
	
	/**
	 * @var string
	 */
	public $LanguageCode = "";
	
	/**
	 * @var string[]
	 */
	public $Emails = [];
	
	/**
	 * @var boolean
	 */
	public $SendEmailReports = false;
	
	/**
	 * @var \Comet\DestinationConfig[] An array with string keys.
	 */
	public $Destinations = [];
	
	/**
	 * @var \Comet\SourceConfig[] An array with string keys.
	 */
	public $Sources = [];
	
	/**
	 * @var \Comet\BackupRuleConfig[] An array with string keys.
	 */
	public $BackupRules = [];
	
	/**
	 * @var \Comet\DeviceConfig[] An array with string keys.
	 */
	public $Devices = [];
	
	/**
	 * @var boolean
	 */
	public $IsSuspended = false;
	
	/**
	 * @var boolean
	 */
	public $AllProtectedItemsQuotaEnabled = false;
	
	/**
	 * @var int
	 */
	public $AllProtectedItemsQuotaBytes = 0;
	
	/**
	 * @var int
	 */
	public $MaximumDevices = 0;
	
	/**
	 * @var string
	 */
	public $PolicyID = "";
	
	/**
	 * @var \Comet\UserPolicy
	 */
	public $Policy = null;
	
	/**
	 * @var int
	 */
	public $PasswordFormat = 0;
	
	/**
	 * @var string
	 */
	public $PasswordHash = "";
	
	/**
	 * @var string
	 */
	public $PasswordRecovery = "";
	
	/**
	 * @var int
	 */
	public $CreateTime = 0;
	
	/**
	 * @var string
	 */
	public $CreationGUID = "";
	
	/**
	 * Preserve unknown properties when dealing with future server versions.
	 *
	 * @see UserProfileConfig::RemoveUnknownProperties() Remove all unknown properties
	 * @var array
	 */
	private $__unknown_properties = [];
	
	/**
	 * Replace the content of this UserProfileConfig object from a PHP array.
	 * The data could be supplied from an API call after json_decode(..., true); or generated manually.
	 *
	 * @param array $decodedJsonObject Object data as PHP array
	 * @return void
	 */
	public function inflateFrom(array $decodedJsonObject)
	{
		$this->Username = (string)($decodedJsonObject['Username']);
		
		$this->LocalTimezone = (string)($decodedJsonObject['LocalTimezone']);
		
		$this->LanguageCode = (string)($decodedJsonObject['LanguageCode']);
		
		$val_2 = [];
		for($i_2 = 0; $i_2 < count($decodedJsonObject['Emails']); ++$i_2) {
			$val_2[] = (string)($decodedJsonObject['Emails'][$i_2]);
		}
		$this->Emails = $val_2;
		
		$this->SendEmailReports = (bool)($decodedJsonObject['SendEmailReports']);
		
		$val_2 = [];
		foreach($decodedJsonObject['Destinations'] as $k_2 => $v_2) {
			$phpk_2 = (string)($k_2);
			$phpv_2 = \Comet\DestinationConfig::createFrom(isset($v_2) ? $v_2 : []);
			$val_2[$phpk_2] = $phpv_2;
		}
		$this->Destinations = $val_2;
		
		$val_2 = [];
		foreach($decodedJsonObject['Sources'] as $k_2 => $v_2) {
			$phpk_2 = (string)($k_2);
			$phpv_2 = \Comet\SourceConfig::createFrom(isset($v_2) ? $v_2 : []);
			$val_2[$phpk_2] = $phpv_2;
		}
		$this->Sources = $val_2;
		
		$val_2 = [];
		foreach($decodedJsonObject['BackupRules'] as $k_2 => $v_2) {
			$phpk_2 = (string)($k_2);
			$phpv_2 = \Comet\BackupRuleConfig::createFrom(isset($v_2) ? $v_2 : []);
			$val_2[$phpk_2] = $phpv_2;
		}
		$this->BackupRules = $val_2;
		
		$val_2 = [];
		foreach($decodedJsonObject['Devices'] as $k_2 => $v_2) {
			$phpk_2 = (string)($k_2);
			$phpv_2 = \Comet\DeviceConfig::createFrom(isset($v_2) ? $v_2 : []);
			$val_2[$phpk_2] = $phpv_2;
		}
		$this->Devices = $val_2;
		
		$this->IsSuspended = (bool)($decodedJsonObject['IsSuspended']);
		
		$this->AllProtectedItemsQuotaEnabled = (bool)($decodedJsonObject['AllProtectedItemsQuotaEnabled']);
		
		$this->AllProtectedItemsQuotaBytes = (int)($decodedJsonObject['AllProtectedItemsQuotaBytes']);
		
		$this->MaximumDevices = (int)($decodedJsonObject['MaximumDevices']);
		
		$this->PolicyID = (string)($decodedJsonObject['PolicyID']);
		
		$this->Policy = \Comet\UserPolicy::createFrom(isset($decodedJsonObject['Policy']) ? $decodedJsonObject['Policy'] : []);
		
		$this->PasswordFormat = (int)($decodedJsonObject['PasswordFormat']);
		
		$this->PasswordHash = (string)($decodedJsonObject['PasswordHash']);
		
		if (array_key_exists('PasswordRecovery', $decodedJsonObject)) {
			$this->PasswordRecovery = (string)($decodedJsonObject['PasswordRecovery']);
			
		}
		$this->CreateTime = (int)($decodedJsonObject['CreateTime']);
		
		$this->CreationGUID = (string)($decodedJsonObject['CreationGUID']);
		
		foreach($decodedJsonObject as $k => $v) {
			switch($k) {
			case 'Username':
			case 'LocalTimezone':
			case 'LanguageCode':
			case 'Emails':
			case 'SendEmailReports':
			case 'Destinations':
			case 'Sources':
			case 'BackupRules':
			case 'Devices':
			case 'IsSuspended':
			case 'AllProtectedItemsQuotaEnabled':
			case 'AllProtectedItemsQuotaBytes':
			case 'MaximumDevices':
			case 'PolicyID':
			case 'Policy':
			case 'PasswordFormat':
			case 'PasswordHash':
			case 'PasswordRecovery':
			case 'CreateTime':
			case 'CreationGUID':
				break;
			default:
				$this->__unknown_properties[$k] = $v;
			}
		}
	}
	
	/**
	 * Coerce a plain PHP array into a new strongly-typed UserProfileConfig object.
	 * The data could be supplied from an API call after json_decode(..., true); or generated manually.
	 *
	 * @param array $decodedJsonObject Object data as PHP array
	 * @return UserProfileConfig
	 */
	public static function createFrom(array $decodedJsonObject)
	{
		$retn = new UserProfileConfig();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}
	
	/**
	 * Convert this UserProfileConfig object into a plain PHP array.
	 *
	 * @param bool $forJSONEncode Set true to use stdClass() for empty objects instead of just [], in order to
	 *                             accurately roundtrip empty objects/arrays through json_encode() compatibility
	 * @return array
	 */
	public function toArray($forJSONEncode=false)
	{
		$ret = [];
		$ret["Username"] = $this->Username;
		$ret["LocalTimezone"] = $this->LocalTimezone;
		$ret["LanguageCode"] = $this->LanguageCode;
		{
			$c0 = [];
			for($i0 = 0; $i0 < count($this->Emails); ++$i0) {
				$val0 = $this->Emails[$i0];
				$c0[] = $val0;
			}
			$ret["Emails"] = $c0;
		}
		$ret["SendEmailReports"] = $this->SendEmailReports;
		{
			$c0 = [];
			foreach($this->Destinations as $k0 => $v0) {
				$ko_0 = $k0;
				if ( $v0 === null ) {
					$vo_0 = $for_json_encode ? (object)[] : [];
				} else {
					$vo_0 = $v0->toArray($for_json_encode);
				}
				$c0[ $ko_0 ] = $vo_0;
			}
			if ($for_json_encode && count($c0) == 0) {
				$ret["Destinations"] = (object)[];
			} else {
				$ret["Destinations"] = $c0;
			}
		}
		{
			$c0 = [];
			foreach($this->Sources as $k0 => $v0) {
				$ko_0 = $k0;
				if ( $v0 === null ) {
					$vo_0 = $for_json_encode ? (object)[] : [];
				} else {
					$vo_0 = $v0->toArray($for_json_encode);
				}
				$c0[ $ko_0 ] = $vo_0;
			}
			if ($for_json_encode && count($c0) == 0) {
				$ret["Sources"] = (object)[];
			} else {
				$ret["Sources"] = $c0;
			}
		}
		{
			$c0 = [];
			foreach($this->BackupRules as $k0 => $v0) {
				$ko_0 = $k0;
				if ( $v0 === null ) {
					$vo_0 = $for_json_encode ? (object)[] : [];
				} else {
					$vo_0 = $v0->toArray($for_json_encode);
				}
				$c0[ $ko_0 ] = $vo_0;
			}
			if ($for_json_encode && count($c0) == 0) {
				$ret["BackupRules"] = (object)[];
			} else {
				$ret["BackupRules"] = $c0;
			}
		}
		{
			$c0 = [];
			foreach($this->Devices as $k0 => $v0) {
				$ko_0 = $k0;
				if ( $v0 === null ) {
					$vo_0 = $for_json_encode ? (object)[] : [];
				} else {
					$vo_0 = $v0->toArray($for_json_encode);
				}
				$c0[ $ko_0 ] = $vo_0;
			}
			if ($for_json_encode && count($c0) == 0) {
				$ret["Devices"] = (object)[];
			} else {
				$ret["Devices"] = $c0;
			}
		}
		$ret["IsSuspended"] = $this->IsSuspended;
		$ret["AllProtectedItemsQuotaEnabled"] = $this->AllProtectedItemsQuotaEnabled;
		$ret["AllProtectedItemsQuotaBytes"] = $this->AllProtectedItemsQuotaBytes;
		$ret["MaximumDevices"] = $this->MaximumDevices;
		$ret["PolicyID"] = $this->PolicyID;
		if ( $this->Policy === null ) {
			$ret["Policy"] = $for_json_encode ? (object)[] : [];
		} else {
			$ret["Policy"] = $this->Policy->toArray($for_json_encode);
		}
		$ret["PasswordFormat"] = $this->PasswordFormat;
		$ret["PasswordHash"] = $this->PasswordHash;
		$ret["PasswordRecovery"] = $this->PasswordRecovery;
		$ret["CreateTime"] = $this->CreateTime;
		$ret["CreationGUID"] = $this->CreationGUID;
		
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
		if ($this->Policy !== null) {
			$this->Policy->RemoveUnknownProperties();
		}
	}
	
}

