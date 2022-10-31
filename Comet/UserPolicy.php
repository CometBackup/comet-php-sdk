<?php

/**
 * Copyright (c) 2018-2022 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 *
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

class UserPolicy {

	/**
	 * @var boolean
	 */
	public $PreventRequestStorageVault = false;

	/**
	 * @var boolean
	 */
	public $PreventAddCustomStorageVault = false;

	/**
	 * @var boolean
	 */
	public $PreventEditStorageVault = false;

	/**
	 * @var boolean
	 */
	public $HideCloudStorageBranding = false;

	/**
	 * @var boolean
	 */
	public $PreventDeleteStorageVault = false;

	/**
	 * @var \Comet\StorageVaultProviderPolicy
	 */
	public $StorageVaultProviders = null;

	/**
	 * @var boolean
	 */
	public $PreventNewProtectedItem = false;

	/**
	 * @var boolean
	 */
	public $PreventEditProtectedItem = false;

	/**
	 * @var boolean
	 */
	public $PreventDeleteProtectedItem = false;

	/**
	 * @var \Comet\ProtectedItemEngineTypePolicy
	 */
	public $ProtectedItemEngineTypes = null;

	/**
	 * @var \Comet\ExtraFileExclusion[]
	 */
	public $FileAndFolderMandatoryExclusions = [];

	/**
	 * @var int
	 */
	public $ModeScheduleSkipAlreadyRunning = 0;

	/**
	 * @var int
	 */
	public $ModeAdminResetPassword = 0;

	/**
	 * @var int
	 */
	public $ModeAdminViewFilenames = 0;

	/**
	 * @var int
	 */
	public $ModeRequireUserResetPassword = 0;

	/**
	 * @var boolean
	 */
	public $PreventDeleteSingleSnapshots = false;

	/**
	 * @var boolean
	 */
	public $PreventChangeAccountPassword = false;

	/**
	 * @var boolean
	 */
	public $PreventChangeEmailSettings = false;

	/**
	 * @var boolean
	 */
	public $PreventChangeAccountName = false;

	/**
	 * @var boolean
	 */
	public $PreventOpenAppUI = false;

	/**
	 * @var boolean
	 */
	public $RequirePasswordOpenAppUI = false;

	/**
	 * @var boolean
	 */
	public $HideAppImport = false;

	/**
	 * @var boolean
	 */
	public $HideAppVersion = false;

	/**
	 * @var boolean
	 */
	public $PreventOpenWebUI = false;

	/**
	 * @var boolean
	 */
	public $PreventViewDeviceNames = false;

	/**
	 * @var \Comet\DefaultEmailReportPolicy
	 */
	public $DefaultEmailReports = null;

	/**
	 * @var \Comet\RetentionPolicy
	 */
	public $DefaultStorageVaultRetention = null;

	/**
	 * @var boolean
	 */
	public $EnforceStorageVaultRetention = false;

	/**
	 * @var boolean
	 */
	public $PreventProtectedItemRetention = false;

	/**
	 * @var \Comet\SourceConfig[] An array with string keys.
	 */
	public $DefaultSources = [];

	/**
	 * @var \Comet\BackupRuleConfig[] An array with string keys.
	 */
	public $DefaultSourcesBackupRules = [];

	/**
	 * @var \Comet\DefaultSourceWithOSRestriction[] An array with string keys.
	 */
	public $DefaultSourcesWithOSRestriction = [];

	/**
	 * @var \Comet\BackupRuleConfig[] An array with string keys.
	 */
	public $DefaultBackupRules = [];

	/**
	 * @var int
	 */
	public $RandomDelaySecs = 0;

	/**
	 * Preserve unknown properties when dealing with future server versions.
	 *
	 * @see UserPolicy::RemoveUnknownProperties() Remove all unknown properties
	 * @var array
	 */
	private $__unknown_properties = [];

	/**
	 * Replace the content of this UserPolicy object from a PHP \stdClass.
	 * The data could be supplied from an API call after json_decode(...); or generated manually.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return void
	 */
	protected function inflateFrom(\stdClass $sc)
	{
		if (property_exists($sc, 'PreventRequestStorageVault')) {
			$this->PreventRequestStorageVault = (bool)($sc->PreventRequestStorageVault);
		}
		if (property_exists($sc, 'PreventAddCustomStorageVault')) {
			$this->PreventAddCustomStorageVault = (bool)($sc->PreventAddCustomStorageVault);
		}
		if (property_exists($sc, 'PreventEditStorageVault')) {
			$this->PreventEditStorageVault = (bool)($sc->PreventEditStorageVault);
		}
		if (property_exists($sc, 'HideCloudStorageBranding')) {
			$this->HideCloudStorageBranding = (bool)($sc->HideCloudStorageBranding);
		}
		if (property_exists($sc, 'PreventDeleteStorageVault')) {
			$this->PreventDeleteStorageVault = (bool)($sc->PreventDeleteStorageVault);
		}
		if (property_exists($sc, 'StorageVaultProviders')) {
			if (is_array($sc->StorageVaultProviders) && count($sc->StorageVaultProviders) === 0) {
			// Work around edge case in json_decode--json_encode stdClass conversion
				$this->StorageVaultProviders = \Comet\StorageVaultProviderPolicy::createFromStdclass(new \stdClass());
			} else {
				$this->StorageVaultProviders = \Comet\StorageVaultProviderPolicy::createFromStdclass($sc->StorageVaultProviders);
			}
		}
		if (property_exists($sc, 'PreventNewProtectedItem')) {
			$this->PreventNewProtectedItem = (bool)($sc->PreventNewProtectedItem);
		}
		if (property_exists($sc, 'PreventEditProtectedItem')) {
			$this->PreventEditProtectedItem = (bool)($sc->PreventEditProtectedItem);
		}
		if (property_exists($sc, 'PreventDeleteProtectedItem')) {
			$this->PreventDeleteProtectedItem = (bool)($sc->PreventDeleteProtectedItem);
		}
		if (property_exists($sc, 'ProtectedItemEngineTypes')) {
			if (is_array($sc->ProtectedItemEngineTypes) && count($sc->ProtectedItemEngineTypes) === 0) {
			// Work around edge case in json_decode--json_encode stdClass conversion
				$this->ProtectedItemEngineTypes = \Comet\ProtectedItemEngineTypePolicy::createFromStdclass(new \stdClass());
			} else {
				$this->ProtectedItemEngineTypes = \Comet\ProtectedItemEngineTypePolicy::createFromStdclass($sc->ProtectedItemEngineTypes);
			}
		}
		if (property_exists($sc, 'FileAndFolderMandatoryExclusions') && !is_null($sc->FileAndFolderMandatoryExclusions)) {
			$val_2 = [];
			if ($sc->FileAndFolderMandatoryExclusions !== null) {
				for($i_2 = 0; $i_2 < count($sc->FileAndFolderMandatoryExclusions); ++$i_2) {
					if (is_array($sc->FileAndFolderMandatoryExclusions[$i_2]) && count($sc->FileAndFolderMandatoryExclusions[$i_2]) === 0) {
					// Work around edge case in json_decode--json_encode stdClass conversion
						$val_2[] = \Comet\ExtraFileExclusion::createFromStdclass(new \stdClass());
					} else {
						$val_2[] = \Comet\ExtraFileExclusion::createFromStdclass($sc->FileAndFolderMandatoryExclusions[$i_2]);
					}
				}
			}
			$this->FileAndFolderMandatoryExclusions = $val_2;
		}
		if (property_exists($sc, 'ModeScheduleSkipAlreadyRunning') && !is_null($sc->ModeScheduleSkipAlreadyRunning)) {
			$this->ModeScheduleSkipAlreadyRunning = (int)($sc->ModeScheduleSkipAlreadyRunning);
		}
		if (property_exists($sc, 'ModeAdminResetPassword') && !is_null($sc->ModeAdminResetPassword)) {
			$this->ModeAdminResetPassword = (int)($sc->ModeAdminResetPassword);
		}
		if (property_exists($sc, 'ModeAdminViewFilenames') && !is_null($sc->ModeAdminViewFilenames)) {
			$this->ModeAdminViewFilenames = (int)($sc->ModeAdminViewFilenames);
		}
		if (property_exists($sc, 'ModeRequireUserResetPassword') && !is_null($sc->ModeRequireUserResetPassword)) {
			$this->ModeRequireUserResetPassword = (int)($sc->ModeRequireUserResetPassword);
		}
		if (property_exists($sc, 'PreventDeleteSingleSnapshots')) {
			$this->PreventDeleteSingleSnapshots = (bool)($sc->PreventDeleteSingleSnapshots);
		}
		if (property_exists($sc, 'PreventChangeAccountPassword')) {
			$this->PreventChangeAccountPassword = (bool)($sc->PreventChangeAccountPassword);
		}
		if (property_exists($sc, 'PreventChangeEmailSettings')) {
			$this->PreventChangeEmailSettings = (bool)($sc->PreventChangeEmailSettings);
		}
		if (property_exists($sc, 'PreventChangeAccountName')) {
			$this->PreventChangeAccountName = (bool)($sc->PreventChangeAccountName);
		}
		if (property_exists($sc, 'PreventOpenAppUI')) {
			$this->PreventOpenAppUI = (bool)($sc->PreventOpenAppUI);
		}
		if (property_exists($sc, 'RequirePasswordOpenAppUI')) {
			$this->RequirePasswordOpenAppUI = (bool)($sc->RequirePasswordOpenAppUI);
		}
		if (property_exists($sc, 'HideAppImport')) {
			$this->HideAppImport = (bool)($sc->HideAppImport);
		}
		if (property_exists($sc, 'HideAppVersion')) {
			$this->HideAppVersion = (bool)($sc->HideAppVersion);
		}
		if (property_exists($sc, 'PreventOpenWebUI')) {
			$this->PreventOpenWebUI = (bool)($sc->PreventOpenWebUI);
		}
		if (property_exists($sc, 'PreventViewDeviceNames')) {
			$this->PreventViewDeviceNames = (bool)($sc->PreventViewDeviceNames);
		}
		if (property_exists($sc, 'DefaultEmailReports')) {
			if (is_array($sc->DefaultEmailReports) && count($sc->DefaultEmailReports) === 0) {
			// Work around edge case in json_decode--json_encode stdClass conversion
				$this->DefaultEmailReports = \Comet\DefaultEmailReportPolicy::createFromStdclass(new \stdClass());
			} else {
				$this->DefaultEmailReports = \Comet\DefaultEmailReportPolicy::createFromStdclass($sc->DefaultEmailReports);
			}
		}
		if (property_exists($sc, 'DefaultStorageVaultRetention')) {
			if (is_array($sc->DefaultStorageVaultRetention) && count($sc->DefaultStorageVaultRetention) === 0) {
			// Work around edge case in json_decode--json_encode stdClass conversion
				$this->DefaultStorageVaultRetention = \Comet\RetentionPolicy::createFromStdclass(new \stdClass());
			} else {
				$this->DefaultStorageVaultRetention = \Comet\RetentionPolicy::createFromStdclass($sc->DefaultStorageVaultRetention);
			}
		}
		if (property_exists($sc, 'EnforceStorageVaultRetention')) {
			$this->EnforceStorageVaultRetention = (bool)($sc->EnforceStorageVaultRetention);
		}
		if (property_exists($sc, 'PreventProtectedItemRetention')) {
			$this->PreventProtectedItemRetention = (bool)($sc->PreventProtectedItemRetention);
		}
		if (property_exists($sc, 'DefaultSources')) {
			$val_2 = [];
			if ($sc->DefaultSources !== null) {
				foreach($sc->DefaultSources as $k_2 => $v_2) {
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
			$this->DefaultSources = $val_2;
		}
		if (property_exists($sc, 'DefaultSourcesBackupRules')) {
			$val_2 = [];
			if ($sc->DefaultSourcesBackupRules !== null) {
				foreach($sc->DefaultSourcesBackupRules as $k_2 => $v_2) {
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
			$this->DefaultSourcesBackupRules = $val_2;
		}
		if (property_exists($sc, 'DefaultSourcesWithOSRestriction')) {
			$val_2 = [];
			if ($sc->DefaultSourcesWithOSRestriction !== null) {
				foreach($sc->DefaultSourcesWithOSRestriction as $k_2 => $v_2) {
					$phpk_2 = (string)($k_2);
					if (is_array($v_2) && count($v_2) === 0) {
					// Work around edge case in json_decode--json_encode stdClass conversion
						$phpv_2 = \Comet\DefaultSourceWithOSRestriction::createFromStdclass(new \stdClass());
					} else {
						$phpv_2 = \Comet\DefaultSourceWithOSRestriction::createFromStdclass($v_2);
					}
					$val_2[$phpk_2] = $phpv_2;
				}
			}
			$this->DefaultSourcesWithOSRestriction = $val_2;
		}
		if (property_exists($sc, 'DefaultBackupRules')) {
			$val_2 = [];
			if ($sc->DefaultBackupRules !== null) {
				foreach($sc->DefaultBackupRules as $k_2 => $v_2) {
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
			$this->DefaultBackupRules = $val_2;
		}
		if (property_exists($sc, 'RandomDelaySecs') && !is_null($sc->RandomDelaySecs)) {
			$this->RandomDelaySecs = (int)($sc->RandomDelaySecs);
		}
		foreach(get_object_vars($sc) as $k => $v) {
			switch($k) {
			case 'PreventRequestStorageVault':
			case 'PreventAddCustomStorageVault':
			case 'PreventEditStorageVault':
			case 'HideCloudStorageBranding':
			case 'PreventDeleteStorageVault':
			case 'StorageVaultProviders':
			case 'PreventNewProtectedItem':
			case 'PreventEditProtectedItem':
			case 'PreventDeleteProtectedItem':
			case 'ProtectedItemEngineTypes':
			case 'FileAndFolderMandatoryExclusions':
			case 'ModeScheduleSkipAlreadyRunning':
			case 'ModeAdminResetPassword':
			case 'ModeAdminViewFilenames':
			case 'ModeRequireUserResetPassword':
			case 'PreventDeleteSingleSnapshots':
			case 'PreventChangeAccountPassword':
			case 'PreventChangeEmailSettings':
			case 'PreventChangeAccountName':
			case 'PreventOpenAppUI':
			case 'RequirePasswordOpenAppUI':
			case 'HideAppImport':
			case 'HideAppVersion':
			case 'PreventOpenWebUI':
			case 'PreventViewDeviceNames':
			case 'DefaultEmailReports':
			case 'DefaultStorageVaultRetention':
			case 'EnforceStorageVaultRetention':
			case 'PreventProtectedItemRetention':
			case 'DefaultSources':
			case 'DefaultSourcesBackupRules':
			case 'DefaultSourcesWithOSRestriction':
			case 'DefaultBackupRules':
			case 'RandomDelaySecs':
				break;
			default:
				$this->__unknown_properties[$k] = $v;
			}
		}
	}

	/**
	 * Coerce a stdClass into a new strongly-typed UserPolicy object.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return UserPolicy
	 */
	public static function createFromStdclass(\stdClass $sc): \Comet\UserPolicy
	{
		$retn = new UserPolicy();
		$retn->inflateFrom($sc);
		return $retn;
	}

	/**
	 * Coerce a plain PHP array into a new strongly-typed UserPolicy object.
	 * Because the Comet Server requires strict distinction between empty objects ({}) and arrays ([]),
	 * the result of this method may not be safe to re-submit to the Comet Server.
	 *
	 * @param array $arr Object data as PHP array
	 * @return UserPolicy
	 */
	public static function createFromArray(array $arr): \Comet\UserPolicy
	{
		$stdClass = json_decode(json_encode($arr, JSON_UNESCAPED_SLASHES));
		if (is_array($stdClass) && count($stdClass) === 0) {
			$stdClass = new \stdClass();
		}
		return self::createFromStdclass($stdClass);
	}

	/**
	 * Coerce a JSON string into a new strongly-typed UserPolicy object.
	 *
	 * @param string $JsonString Object data as JSON string
	 * @return UserPolicy
	 */
	public static function createFromJSON(string $JsonString): \Comet\UserPolicy
	{
		$decodedJsonObject = json_decode($JsonString); // as stdClass
		if (\json_last_error() != \JSON_ERROR_NONE) {
			throw new \Exception("JSON decode failed: " . \json_last_error_msg(), \json_last_error());
		}
		$retn = new UserPolicy();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}

	/**
	 * Convert this UserPolicy object into a plain PHP array.
	 *
	 * Unknown properties may still be represented as \stdClass objects.
	 *
	 * @param bool $for_json_encode Represent empty key-value maps as \stdClass instead of plain PHP arrays
	 * @return array
	 */
	public function toArray(bool $for_json_encode = false): array
	{
		$ret = [];
		$ret["PreventRequestStorageVault"] = $this->PreventRequestStorageVault;
		$ret["PreventAddCustomStorageVault"] = $this->PreventAddCustomStorageVault;
		$ret["PreventEditStorageVault"] = $this->PreventEditStorageVault;
		$ret["HideCloudStorageBranding"] = $this->HideCloudStorageBranding;
		$ret["PreventDeleteStorageVault"] = $this->PreventDeleteStorageVault;
		if ( $this->StorageVaultProviders === null ) {
			$ret["StorageVaultProviders"] = $for_json_encode ? (object)[] : [];
		} else {
			$ret["StorageVaultProviders"] = $this->StorageVaultProviders->toArray($for_json_encode);
		}
		$ret["PreventNewProtectedItem"] = $this->PreventNewProtectedItem;
		$ret["PreventEditProtectedItem"] = $this->PreventEditProtectedItem;
		$ret["PreventDeleteProtectedItem"] = $this->PreventDeleteProtectedItem;
		if ( $this->ProtectedItemEngineTypes === null ) {
			$ret["ProtectedItemEngineTypes"] = $for_json_encode ? (object)[] : [];
		} else {
			$ret["ProtectedItemEngineTypes"] = $this->ProtectedItemEngineTypes->toArray($for_json_encode);
		}
		{
			$c0 = [];
			for($i0 = 0; $i0 < count($this->FileAndFolderMandatoryExclusions); ++$i0) {
				if ( $this->FileAndFolderMandatoryExclusions[$i0] === null ) {
					$val0 = $for_json_encode ? (object)[] : [];
				} else {
					$val0 = $this->FileAndFolderMandatoryExclusions[$i0]->toArray($for_json_encode);
				}
				$c0[] = $val0;
			}
			$ret["FileAndFolderMandatoryExclusions"] = $c0;
		}
		$ret["ModeScheduleSkipAlreadyRunning"] = $this->ModeScheduleSkipAlreadyRunning;
		$ret["ModeAdminResetPassword"] = $this->ModeAdminResetPassword;
		$ret["ModeAdminViewFilenames"] = $this->ModeAdminViewFilenames;
		$ret["ModeRequireUserResetPassword"] = $this->ModeRequireUserResetPassword;
		$ret["PreventDeleteSingleSnapshots"] = $this->PreventDeleteSingleSnapshots;
		$ret["PreventChangeAccountPassword"] = $this->PreventChangeAccountPassword;
		$ret["PreventChangeEmailSettings"] = $this->PreventChangeEmailSettings;
		$ret["PreventChangeAccountName"] = $this->PreventChangeAccountName;
		$ret["PreventOpenAppUI"] = $this->PreventOpenAppUI;
		$ret["RequirePasswordOpenAppUI"] = $this->RequirePasswordOpenAppUI;
		$ret["HideAppImport"] = $this->HideAppImport;
		$ret["HideAppVersion"] = $this->HideAppVersion;
		$ret["PreventOpenWebUI"] = $this->PreventOpenWebUI;
		$ret["PreventViewDeviceNames"] = $this->PreventViewDeviceNames;
		if ( $this->DefaultEmailReports === null ) {
			$ret["DefaultEmailReports"] = $for_json_encode ? (object)[] : [];
		} else {
			$ret["DefaultEmailReports"] = $this->DefaultEmailReports->toArray($for_json_encode);
		}
		if ( $this->DefaultStorageVaultRetention === null ) {
			$ret["DefaultStorageVaultRetention"] = $for_json_encode ? (object)[] : [];
		} else {
			$ret["DefaultStorageVaultRetention"] = $this->DefaultStorageVaultRetention->toArray($for_json_encode);
		}
		$ret["EnforceStorageVaultRetention"] = $this->EnforceStorageVaultRetention;
		$ret["PreventProtectedItemRetention"] = $this->PreventProtectedItemRetention;
		{
			$c0 = [];
			foreach($this->DefaultSources as $k0 => $v0) {
				$ko_0 = $k0;
				if ( $v0 === null ) {
					$vo_0 = $for_json_encode ? (object)[] : [];
				} else {
					$vo_0 = $v0->toArray($for_json_encode);
				}
				$c0[ $ko_0 ] = $vo_0;
			}
			if ($for_json_encode && count($c0) == 0) {
				$ret["DefaultSources"] = (object)[];
			} else {
				$ret["DefaultSources"] = $c0;
			}
		}
		{
			$c0 = [];
			foreach($this->DefaultSourcesBackupRules as $k0 => $v0) {
				$ko_0 = $k0;
				if ( $v0 === null ) {
					$vo_0 = $for_json_encode ? (object)[] : [];
				} else {
					$vo_0 = $v0->toArray($for_json_encode);
				}
				$c0[ $ko_0 ] = $vo_0;
			}
			if ($for_json_encode && count($c0) == 0) {
				$ret["DefaultSourcesBackupRules"] = (object)[];
			} else {
				$ret["DefaultSourcesBackupRules"] = $c0;
			}
		}
		{
			$c0 = [];
			foreach($this->DefaultSourcesWithOSRestriction as $k0 => $v0) {
				$ko_0 = $k0;
				if ( $v0 === null ) {
					$vo_0 = $for_json_encode ? (object)[] : [];
				} else {
					$vo_0 = $v0->toArray($for_json_encode);
				}
				$c0[ $ko_0 ] = $vo_0;
			}
			if ($for_json_encode && count($c0) == 0) {
				$ret["DefaultSourcesWithOSRestriction"] = (object)[];
			} else {
				$ret["DefaultSourcesWithOSRestriction"] = $c0;
			}
		}
		{
			$c0 = [];
			foreach($this->DefaultBackupRules as $k0 => $v0) {
				$ko_0 = $k0;
				if ( $v0 === null ) {
					$vo_0 = $for_json_encode ? (object)[] : [];
				} else {
					$vo_0 = $v0->toArray($for_json_encode);
				}
				$c0[ $ko_0 ] = $vo_0;
			}
			if ($for_json_encode && count($c0) == 0) {
				$ret["DefaultBackupRules"] = (object)[];
			} else {
				$ret["DefaultBackupRules"] = $c0;
			}
		}
		$ret["RandomDelaySecs"] = $this->RandomDelaySecs;

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
		if ($this->StorageVaultProviders !== null) {
			$this->StorageVaultProviders->RemoveUnknownProperties();
		}
		if ($this->ProtectedItemEngineTypes !== null) {
			$this->ProtectedItemEngineTypes->RemoveUnknownProperties();
		}
		if ($this->DefaultEmailReports !== null) {
			$this->DefaultEmailReports->RemoveUnknownProperties();
		}
		if ($this->DefaultStorageVaultRetention !== null) {
			$this->DefaultStorageVaultRetention->RemoveUnknownProperties();
		}
	}

}

