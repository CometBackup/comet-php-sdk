<?php

/**
 * Copyright (c) 2018-2024 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 *
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

/**
 * This is the main data structure for a user's profile.
 */
class UserProfileConfig {

	/**
	 * The name for this account. It uniquely identifies this UserProfileConfig across the entire Comet
	 * Server. It cannot be changed directly.
	 *
	 * @var string
	 */
	public $Username = "";

	/**
	 * A longer descriptive name for this account. It is not necessarily unique to the Comet Server. The
	 * end-user might be able to change it inside the Comet Backup desktop app.
	 *
	 * @var string
	 */
	public $AccountName = "";

	/**
	 * Timezone in IANA format. Individual devices may declare a more specific timezone in the Devices
	 * field.
	 *
	 * @var string
	 */
	public $LocalTimezone = "";

	/**
	 * One of the supported languages, such as en_US (DEFAULT_LANGUAGE).
	 *
	 * @var string
	 */
	public $LanguageCode = "";

	/**
	 * Tenant
	 *
	 * @var string
	 */
	public $OrganizationID = "";

	/**
	 * A list of email addresses to send reports to.
	 *
	 * @var string[]
	 */
	public $Emails = [];

	/**
	 * By default, all the email addresses in the Emails field will receieve the policy-default or
	 * server-wide-default style of email report. Add an override for a specific email address in here
	 * to allow customizing the email report that will be received.
	 *
	 * @var array<string, \Comet\UserCustomEmailSettings>
	 */
	public $OverrideEmailSettings = [];

	/**
	 * This option can be used to control whether any email reports are sent.
	 *
	 * @var boolean
	 */
	public $SendEmailReports = false;

	/**
	 * Storage Vaults
	 * The string keys can be any unique key. Using a GUID is recommended, but optional.
	 *
	 * @var array<string, \Comet\DestinationConfig>
	 */
	public $Destinations = [];

	/**
	 * Protected Items
	 * The string keys can be any unique key. Using a GUID is recommended, but optional.
	 *
	 * @var array<string, \Comet\SourceConfig>
	 */
	public $Sources = [];

	/**
	 * Schedules
	 * The string keys can be any unique key. Using a GUID is recommended, but optional.
	 *
	 * @var array<string, \Comet\BackupRuleConfig>
	 */
	public $BackupRules = [];

	/**
	 * Devices
	 * The string keys are the device's ID. The device ID is generated automatically based on a mix of
	 * hardware and software identifiers on the installed PC.
	 * To revoke a device, use the AdminRevokeDevice API instead of accessing these fields directly.
	 * This API can also remove associated Protected Items, uninstall the remote device, and disconnect
	 * its live connection.
	 *
	 * @var array<string, \Comet\DeviceConfig>
	 */
	public $Devices = [];

	/**
	 * @var boolean
	 */
	public $IsSuspended = false;

	/**
	 * Unix timestamp in seconds. Zero if the device is not suspended.
	 *
	 * @var int
	 */
	public $LastSuspended = 0;

	/**
	 * A limit on the total Size of all Protected Items in this account. The number of bytes should be
	 * configured in AllProtectedItemsQuotaBytes.
	 *
	 * @var boolean
	 */
	public $AllProtectedItemsQuotaEnabled = false;

	/**
	 * A limit on the total Size of all Protected Items in this account. It is enforced if
	 * AllProtectedItemsQuotaEnabled is true.
	 *
	 * @var int
	 */
	public $AllProtectedItemsQuotaBytes = 0;

	/**
	 * A limit on the total number of devices registered in this account. Set to zero to allow unlimited
	 * devices.
	 *
	 * @var int
	 */
	public $MaximumDevices = 0;

	/**
	 * A limit on the total number of Office 365 Protected Accounts across all Office 365 Protected
	 * Items in this account. Set to zero to allow unlimited Office 365 Protected Accounts.
	 *
	 * @var int
	 */
	public $QuotaOffice365ProtectedAccounts = 0;

	/**
	 * If the PolicyID field is set to a non-empty string, the Comet Server will enforce the contents of
	 * the Policy field based on the matching server's policy. Otherwise if the PolicyID field is set to
	 * an empty string, the administrator may configure any custom values in the Policy field.
	 *
	 * @var string
	 */
	public $PolicyID = "";

	/**
	 * The Policy field contains a read-only copy of the effective Policy that is applied to this user
	 * account.
	 *
	 * @var \Comet\UserPolicy
	 */
	public $Policy = null;

	/**
	 * One of the PASSWORD_FORMAT_ constants
	 * To change the user's password, use the AdminResetUserPassword API instead of accessing these
	 * fields directly. Otherwise, other encrypted fields in the user profile may become corrupted.
	 *
	 * @var int
	 */
	public $PasswordFormat = 0;

	/**
	 * @var string
	 */
	public $PasswordHash = "";

	/**
	 * If this field is empty, the "Allow administrator to reset my password" feature is turned off. If
	 * this field is filled, it contains a cryptographic root of trust that can decrypt and re-encrypt
	 * other secrets in this profile.
	 *
	 * @var string
	 */
	public $PasswordRecovery = "";

	/**
	 * @var boolean
	 */
	public $AllowPasswordLogin = false;

	/**
	 * If true, then TOTP is required to open the desktop app or the Comet Server web interface with
	 * this user's credentials.
	 *
	 * @var boolean
	 */
	public $AllowPasswordAndTOTPLogin = false;

	/**
	 * One of the ENCRYPTIONMETHOD_ constants
	 *
	 * @var int
	 */
	public $TOTPKeyEncryptionFormat = 0;

	/**
	 * @var string
	 */
	public $TOTPKey = "";

	/**
	 * @var boolean
	 * This field is available in Comet 20.3.4 and later.
	 */
	public $RequirePasswordChange = false;

	/**
	 * Unix timestamp in seconds
	 *
	 * @var int
	 */
	public $CreateTime = 0;

	/**
	 * A random GUID that is allocated when the user profile is created for the first time. You can use
	 * this to help disambiguate users with the same username across multiple Comet Servers.
	 *
	 * @var string
	 */
	public $CreationGUID = "";

	/**
	 * Additional server-wide settings that are enforced for this user profile
	 *
	 * @var \Comet\UserServerConfig
	 */
	public $ServerConfig = null;

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
		if (property_exists($sc, 'AccountName')) {
			$this->AccountName = (string)($sc->AccountName);
		}
		if (property_exists($sc, 'LocalTimezone')) {
			$this->LocalTimezone = (string)($sc->LocalTimezone);
		}
		if (property_exists($sc, 'LanguageCode')) {
			$this->LanguageCode = (string)($sc->LanguageCode);
		}
		if (property_exists($sc, 'OrganizationID') && !is_null($sc->OrganizationID)) {
			$this->OrganizationID = (string)($sc->OrganizationID);
		}
		if (property_exists($sc, 'Emails')) {
			$val_2 = [];
			if ($sc->Emails !== null) {
				for($i_2 = 0; $i_2 < count($sc->Emails); ++$i_2) {
					$val_2[] = (string)($sc->Emails[$i_2]);
				}
			}
			$this->Emails = $val_2;
		}
		if (property_exists($sc, 'OverrideEmailSettings')) {
			$val_2 = [];
			if ($sc->OverrideEmailSettings !== null) {
				foreach($sc->OverrideEmailSettings as $k_2 => $v_2) {
					$phpk_2 = (string)($k_2);
					if (is_array($v_2) && count($v_2) === 0) {
					// Work around edge case in json_decode--json_encode stdClass conversion
						$phpv_2 = \Comet\UserCustomEmailSettings::createFromStdclass(new \stdClass());
					} else {
						$phpv_2 = \Comet\UserCustomEmailSettings::createFromStdclass($v_2);
					}
					$val_2[$phpk_2] = $phpv_2;
				}
			}
			$this->OverrideEmailSettings = $val_2;
		}
		if (property_exists($sc, 'SendEmailReports')) {
			$this->SendEmailReports = (bool)($sc->SendEmailReports);
		}
		if (property_exists($sc, 'Destinations')) {
			$val_2 = [];
			if ($sc->Destinations !== null) {
				foreach($sc->Destinations as $k_2 => $v_2) {
					$phpk_2 = (string)($k_2);
					if (is_array($v_2) && count($v_2) === 0) {
					// Work around edge case in json_decode--json_encode stdClass conversion
						$phpv_2 = \Comet\DestinationConfig::createFromStdclass(new \stdClass());
					} else {
						$phpv_2 = \Comet\DestinationConfig::createFromStdclass($v_2);
					}
					$val_2[$phpk_2] = $phpv_2;
				}
			}
			$this->Destinations = $val_2;
		}
		if (property_exists($sc, 'Sources')) {
			$val_2 = [];
			if ($sc->Sources !== null) {
				foreach($sc->Sources as $k_2 => $v_2) {
					$phpk_2 = (string)($k_2);
					if (is_array($v_2) && count($v_2) === 0) {
					// Work around edge case in json_decode--json_encode stdClass conversion
						$phpv_2 = \Comet\SourceConfig::createFromStdclass(new \stdClass());
					} else {
						$phpv_2 = \Comet\SourceConfig::createFromStdclass($v_2);
					}
					$val_2[$phpk_2] = $phpv_2;
				}
			}
			$this->Sources = $val_2;
		}
		if (property_exists($sc, 'BackupRules')) {
			$val_2 = [];
			if ($sc->BackupRules !== null) {
				foreach($sc->BackupRules as $k_2 => $v_2) {
					$phpk_2 = (string)($k_2);
					if (is_array($v_2) && count($v_2) === 0) {
					// Work around edge case in json_decode--json_encode stdClass conversion
						$phpv_2 = \Comet\BackupRuleConfig::createFromStdclass(new \stdClass());
					} else {
						$phpv_2 = \Comet\BackupRuleConfig::createFromStdclass($v_2);
					}
					$val_2[$phpk_2] = $phpv_2;
				}
			}
			$this->BackupRules = $val_2;
		}
		if (property_exists($sc, 'Devices')) {
			$val_2 = [];
			if ($sc->Devices !== null) {
				foreach($sc->Devices as $k_2 => $v_2) {
					$phpk_2 = (string)($k_2);
					if (is_array($v_2) && count($v_2) === 0) {
					// Work around edge case in json_decode--json_encode stdClass conversion
						$phpv_2 = \Comet\DeviceConfig::createFromStdclass(new \stdClass());
					} else {
						$phpv_2 = \Comet\DeviceConfig::createFromStdclass($v_2);
					}
					$val_2[$phpk_2] = $phpv_2;
				}
			}
			$this->Devices = $val_2;
		}
		if (property_exists($sc, 'IsSuspended')) {
			$this->IsSuspended = (bool)($sc->IsSuspended);
		}
		if (property_exists($sc, 'LastSuspended') && !is_null($sc->LastSuspended)) {
			$this->LastSuspended = (int)($sc->LastSuspended);
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
		if (property_exists($sc, 'QuotaOffice365ProtectedAccounts')) {
			$this->QuotaOffice365ProtectedAccounts = (int)($sc->QuotaOffice365ProtectedAccounts);
		}
		if (property_exists($sc, 'PolicyID')) {
			$this->PolicyID = (string)($sc->PolicyID);
		}
		if (property_exists($sc, 'Policy')) {
			if (is_array($sc->Policy) && count($sc->Policy) === 0) {
			// Work around edge case in json_decode--json_encode stdClass conversion
				$this->Policy = \Comet\UserPolicy::createFromStdclass(new \stdClass());
			} else {
				$this->Policy = \Comet\UserPolicy::createFromStdclass($sc->Policy);
			}
		}
		if (property_exists($sc, 'PasswordFormat')) {
			$this->PasswordFormat = (int)($sc->PasswordFormat);
		}
		if (property_exists($sc, 'PasswordHash')) {
			$this->PasswordHash = (string)($sc->PasswordHash);
		}
		if (property_exists($sc, 'PasswordRecovery') && !is_null($sc->PasswordRecovery)) {
			$this->PasswordRecovery = (string)($sc->PasswordRecovery);
		}
		if (property_exists($sc, 'AllowPasswordLogin')) {
			$this->AllowPasswordLogin = (bool)($sc->AllowPasswordLogin);
		}
		if (property_exists($sc, 'AllowPasswordAndTOTPLogin')) {
			$this->AllowPasswordAndTOTPLogin = (bool)($sc->AllowPasswordAndTOTPLogin);
		}
		if (property_exists($sc, 'TOTPKeyEncryptionFormat')) {
			$this->TOTPKeyEncryptionFormat = (int)($sc->TOTPKeyEncryptionFormat);
		}
		if (property_exists($sc, 'TOTPKey')) {
			$this->TOTPKey = (string)($sc->TOTPKey);
		}
		if (property_exists($sc, 'RequirePasswordChange')) {
			$this->RequirePasswordChange = (bool)($sc->RequirePasswordChange);
		}
		if (property_exists($sc, 'CreateTime')) {
			$this->CreateTime = (int)($sc->CreateTime);
		}
		if (property_exists($sc, 'CreationGUID')) {
			$this->CreationGUID = (string)($sc->CreationGUID);
		}
		if (property_exists($sc, 'ServerConfig') && !is_null($sc->ServerConfig)) {
			if (is_array($sc->ServerConfig) && count($sc->ServerConfig) === 0) {
			// Work around edge case in json_decode--json_encode stdClass conversion
				$this->ServerConfig = \Comet\UserServerConfig::createFromStdclass(new \stdClass());
			} else {
				$this->ServerConfig = \Comet\UserServerConfig::createFromStdclass($sc->ServerConfig);
			}
		}
		foreach(get_object_vars($sc) as $k => $v) {
			switch($k) {
			case 'Username':
			case 'AccountName':
			case 'LocalTimezone':
			case 'LanguageCode':
			case 'OrganizationID':
			case 'Emails':
			case 'OverrideEmailSettings':
			case 'SendEmailReports':
			case 'Destinations':
			case 'Sources':
			case 'BackupRules':
			case 'Devices':
			case 'IsSuspended':
			case 'LastSuspended':
			case 'AllProtectedItemsQuotaEnabled':
			case 'AllProtectedItemsQuotaBytes':
			case 'MaximumDevices':
			case 'QuotaOffice365ProtectedAccounts':
			case 'PolicyID':
			case 'Policy':
			case 'PasswordFormat':
			case 'PasswordHash':
			case 'PasswordRecovery':
			case 'AllowPasswordLogin':
			case 'AllowPasswordAndTOTPLogin':
			case 'TOTPKeyEncryptionFormat':
			case 'TOTPKey':
			case 'RequirePasswordChange':
			case 'CreateTime':
			case 'CreationGUID':
			case 'ServerConfig':
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
	public static function createFromStdclass(\stdClass $sc): \Comet\UserProfileConfig
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
	public static function createFromArray(array $arr): \Comet\UserProfileConfig
	{
		$stdClass = json_decode(json_encode($arr, JSON_UNESCAPED_SLASHES));
		if (is_array($stdClass) && count($stdClass) === 0) {
			$stdClass = new \stdClass();
		}
		return self::createFromStdclass($stdClass);
	}

	/**
	 * Coerce a JSON string into a new strongly-typed UserProfileConfig object.
	 *
	 * @param string $JsonString Object data as JSON string
	 * @return UserProfileConfig
	 */
	public static function createFromJSON(string $JsonString): \Comet\UserProfileConfig
	{
		$decodedJsonObject = json_decode($JsonString); // as stdClass
		if (\json_last_error() != \JSON_ERROR_NONE) {
			throw new \Exception("JSON decode failed: " . \json_last_error_msg(), \json_last_error());
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
	public function toArray(bool $for_json_encode = false): array
	{
		$ret = [];
		$ret["Username"] = $this->Username;
		$ret["AccountName"] = $this->AccountName;
		$ret["LocalTimezone"] = $this->LocalTimezone;
		$ret["LanguageCode"] = $this->LanguageCode;
		$ret["OrganizationID"] = $this->OrganizationID;
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
		$ret["LastSuspended"] = $this->LastSuspended;
		$ret["AllProtectedItemsQuotaEnabled"] = $this->AllProtectedItemsQuotaEnabled;
		$ret["AllProtectedItemsQuotaBytes"] = $this->AllProtectedItemsQuotaBytes;
		$ret["MaximumDevices"] = $this->MaximumDevices;
		$ret["QuotaOffice365ProtectedAccounts"] = $this->QuotaOffice365ProtectedAccounts;
		$ret["PolicyID"] = $this->PolicyID;
		if ( $this->Policy === null ) {
			$ret["Policy"] = $for_json_encode ? (object)[] : [];
		} else {
			$ret["Policy"] = $this->Policy->toArray($for_json_encode);
		}
		$ret["PasswordFormat"] = $this->PasswordFormat;
		$ret["PasswordHash"] = $this->PasswordHash;
		$ret["PasswordRecovery"] = $this->PasswordRecovery;
		$ret["AllowPasswordLogin"] = $this->AllowPasswordLogin;
		$ret["AllowPasswordAndTOTPLogin"] = $this->AllowPasswordAndTOTPLogin;
		$ret["TOTPKeyEncryptionFormat"] = $this->TOTPKeyEncryptionFormat;
		$ret["TOTPKey"] = $this->TOTPKey;
		$ret["RequirePasswordChange"] = $this->RequirePasswordChange;
		$ret["CreateTime"] = $this->CreateTime;
		$ret["CreationGUID"] = $this->CreationGUID;
		if ( $this->ServerConfig === null ) {
			$ret["ServerConfig"] = $for_json_encode ? (object)[] : [];
		} else {
			$ret["ServerConfig"] = $this->ServerConfig->toArray($for_json_encode);
		}

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
	public function toJSON(): string
	{
		$arr = $this->toArray(true);
		if (count($arr) === 0) {
			return "{}"; // object
		} else {
			return json_encode($arr, JSON_UNESCAPED_SLASHES);
		}
	}

	/**
	 * Convert this object to a PHP \stdClass.
	 * This may be a more convenient format for working with unknown class properties.
	 *
	 * @return \stdClass
	 */
	public function toStdClass(): \stdClass
	{
		$arr = $this->toArray(false);
		if (count($arr) === 0) {
			return new \stdClass();
		} else {
			return json_decode(json_encode($arr, JSON_UNESCAPED_SLASHES));
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
		if ($this->ServerConfig !== null) {
			$this->ServerConfig->RemoveUnknownProperties();
		}
	}

}

