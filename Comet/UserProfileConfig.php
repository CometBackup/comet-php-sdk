<?php

/**
 * Copyright (c) 2018 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 * 
 * SPDX-License-Identifier: MIT
 */

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
	 * @var \Comet\UserCustomEmailSettings[] An array with string keys.
	 */
	public $OverrideEmailSettings = [];
	
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
	 * Replace the content of this UserProfileConfig object from a PHP \stdClass.
	 * The data could be supplied from an API call after json_decode(...); or generated manually.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return void
	 */
	protected function inflateFrom(\stdClass $sc)
	{
		if (property_exists($sc, 'Username')) {
			$this->Username = (string)($sc->Username);
		}
		if (property_exists($sc, 'LocalTimezone')) {
			$this->LocalTimezone = (string)($sc->LocalTimezone);
		}
		if (property_exists($sc, 'LanguageCode')) {
			$this->LanguageCode = (string)($sc->LanguageCode);
		}
		if (property_exists($sc, 'Emails')) {
			$val_2 = [];
			for($i_2 = 0; $i_2 < count($sc->Emails); ++$i_2) {
				$val_2[] = (string)($sc->Emails[$i_2]);
			}
			$this->Emails = $val_2;
		}
		if (property_exists($sc, 'OverrideEmailSettings')) {
			$val_2 = [];
			foreach($sc->OverrideEmailSettings as $k_2 => $v_2) {
				$phpk_2 = (string)($k_2);
				$phpv_2 = \Comet\UserCustomEmailSettings::createFromStdclass($v_2);
				$val_2[$phpk_2] = $phpv_2;
			}
			$this->OverrideEmailSettings = $val_2;
		}
		if (property_exists($sc, 'SendEmailReports')) {
			$this->SendEmailReports = (bool)($sc->SendEmailReports);
		}
		if (property_exists($sc, 'Destinations')) {
			$val_2 = [];
			foreach($sc->Destinations as $k_2 => $v_2) {
				$phpk_2 = (string)($k_2);
				$phpv_2 = \Comet\DestinationConfig::createFromStdclass($v_2);
				$val_2[$phpk_2] = $phpv_2;
			}
			$this->Destinations = $val_2;
		}
		if (property_exists($sc, 'Sources')) {
			$val_2 = [];
			foreach($sc->Sources as $k_2 => $v_2) {
				$phpk_2 = (string)($k_2);
				$phpv_2 = \Comet\SourceConfig::createFromStdclass($v_2);
				$val_2[$phpk_2] = $phpv_2;
			}
			$this->Sources = $val_2;
		}
		if (property_exists($sc, 'BackupRules')) {
			$val_2 = [];
			foreach($sc->BackupRules as $k_2 => $v_2) {
				$phpk_2 = (string)($k_2);
				$phpv_2 = \Comet\BackupRuleConfig::createFromStdclass($v_2);
				$val_2[$phpk_2] = $phpv_2;
			}
			$this->BackupRules = $val_2;
		}
		if (property_exists($sc, 'Devices')) {
			$val_2 = [];
			foreach($sc->Devices as $k_2 => $v_2) {
				$phpk_2 = (string)($k_2);
				$phpv_2 = \Comet\DeviceConfig::createFromStdclass($v_2);
				$val_2[$phpk_2] = $phpv_2;
			}
			$this->Devices = $val_2;
		}
		if (property_exists($sc, 'IsSuspended')) {
			$this->IsSuspended = (bool)($sc->IsSuspended);
		}
		if (property_exists($sc, 'AllProtectedItemsQuotaEnabled')) {
			$this->AllProtectedItemsQuotaEnabled = (bool)($sc->AllProtectedItemsQuotaEnabled);
		}
		if (property_exists($sc, 'AllProtectedItemsQuotaBytes')) {
			$this->AllProtectedItemsQuotaBytes = (int)($sc->AllProtectedItemsQuotaBytes);
		}
		if (property_exists($sc, 'MaximumDevices')) {
			$this->MaximumDevices = (int)($sc->MaximumDevices);
		}
		if (property_exists($sc, 'PolicyID')) {
			$this->PolicyID = (string)($sc->PolicyID);
		}
		if (property_exists($sc, 'Policy')) {
			$this->Policy = \Comet\UserPolicy::createFromStdclass($sc->Policy);
		}
		if (property_exists($sc, 'PasswordFormat')) {
			$this->PasswordFormat = (int)($sc->PasswordFormat);
		}
		if (property_exists($sc, 'PasswordHash')) {
			$this->PasswordHash = (string)($sc->PasswordHash);
		}
		if (property_exists($sc, 'PasswordRecovery')) {
			$this->PasswordRecovery = (string)($sc->PasswordRecovery);
		}
		if (property_exists($sc, 'CreateTime')) {
			$this->CreateTime = (int)($sc->CreateTime);
		}
		if (property_exists($sc, 'CreationGUID')) {
			$this->CreationGUID = (string)($sc->CreationGUID);
		}
		foreach(get_object_vars($sc) as $k => $v) {
			switch($k) {
			case 'Username':
			case 'LocalTimezone':
			case 'LanguageCode':
			case 'Emails':
			case 'OverrideEmailSettings':
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
	 * Coerce a stdClass into a new strongly-typed UserProfileConfig object.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return UserProfileConfig
	 */
	public static function createFromStdclass(\stdClass $sc)
	{
		$retn = new UserProfileConfig();
		$retn->inflateFrom($sc);
		return $retn;
	}
	
	/**
	 * Coerce a plain PHP array into a new strongly-typed UserProfileConfig object.
	 * Because the Comet Server requires strict distinction between empty objects ({}) and arrays ([]),
	 * the result of this method may not be safe to re-submit to the Comet Server.
	 *
	 * @param array $arr Object data as PHP array
	 * @return UserProfileConfig
	 */
	public static function createFromArray(array $arr)
	{
		$stdClass = json_decode(json_encode($arr));
		return self::createFromStdclass($stdClass);
	}
	
	/**
	 * Coerce a plain PHP array into a new strongly-typed UserProfileConfig object.
	 * Because the Comet Server requires strict distinction between empty objects ({}) and arrays ([]),
	 * the result of this method may not be safe to re-submit to the Comet Server.
	 *
	 * @deprecated 3.0.0 Unsafe for round-trip server traversal. You should either 
	 *             (A) acknowledge this and continue by switching to createFromArray, or
	 *             (b) switch to the roundtrip-safe createFromStdclass alternative.
	 * @param array $arr Object data as PHP array
	 * @return UserProfileConfig
	 */
	public static function createFrom(array $arr)
	{
		return self::createFromArray($arr);
	}
	
	/**
	 * Coerce a JSON string into a new strongly-typed UserProfileConfig object.
	 *
	 * @param string $JsonString Object data as JSON string
	 * @return UserProfileConfig
	 */
	public static function createFromJSON($JsonString)
	{
		$decodedJsonObject = json_decode($JsonString); // as stdClass
		if (\json_last_error() != \JSON_ERROR_NONE) {
			throw new \Exception("JSON decode failed: " . \json_last_error_msg());
		}
		$retn = new UserProfileConfig();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}
	
	/**
	 * Convert this UserProfileConfig object into a plain PHP array.
	 *
	 * Unknown properties may still be represented as \stdClass objects.
	 *
	 * @param bool $for_json_encode Represent empty key-value maps as \stdClass instead of plain PHP arrays
	 * @return array
	 */
	public function toArray($for_json_encode = false)
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
		{
			$c0 = [];
			foreach($this->OverrideEmailSettings as $k0 => $v0) {
				$ko_0 = $k0;
				if ( $v0 === null ) {
					$vo_0 = $for_json_encode ? (object)[] : [];
				} else {
					$vo_0 = $v0->toArray($for_json_encode);
				}
				$c0[ $ko_0 ] = $vo_0;
			}
			if ($for_json_encode && count($c0) == 0) {
				$ret["OverrideEmailSettings"] = (object)[];
			} else {
				$ret["OverrideEmailSettings"] = $c0;
			}
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
			$ret[$k] = $v;
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
		$arr = self::toArray(true);
		if (count($arr) === 0) {
			return "{}"; // object
		} else {
			return json_encode($arr);
		}
	}
	
	/**
	 * Convert this object to a PHP \stdClass.
	 * This may be a more convenient format for working with unknown class properties.
	 *
	 * @return \stdClass
	 */
	public function toStdClass()
	{
		$arr = self::toArray(false);
		if (count($arr) === 0) {
			return new \stdClass();
		} else {
			return json_decode(json_encode($arr));
		}
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

