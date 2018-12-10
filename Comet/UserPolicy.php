<?php

/**
 * Copyright (c) 2018 Comet Licensing Ltd.
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
	public $PreventOpenAppUI = false;
	
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
		if (property_exists($sc, 'PreventDeleteStorageVault')) {
			$this->PreventDeleteStorageVault = (bool)($sc->PreventDeleteStorageVault);
		}
		if (property_exists($sc, 'StorageVaultProviders')) {
			$this->StorageVaultProviders = \Comet\StorageVaultProviderPolicy::createFromStdclass($sc->StorageVaultProviders);
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
			$this->ProtectedItemEngineTypes = \Comet\ProtectedItemEngineTypePolicy::createFromStdclass($sc->ProtectedItemEngineTypes);
		}
		if (property_exists($sc, 'FileAndFolderMandatoryExclusions')) {
			$val_2 = [];
			for($i_2 = 0; $i_2 < count($sc->FileAndFolderMandatoryExclusions); ++$i_2) {
				$val_2[] = \Comet\ExtraFileExclusion::createFromStdclass($sc->FileAndFolderMandatoryExclusions[$i_2]);
			}
			$this->FileAndFolderMandatoryExclusions = $val_2;
		}
		if (property_exists($sc, 'ModeScheduleSkipAlreadyRunning')) {
			$this->ModeScheduleSkipAlreadyRunning = (int)($sc->ModeScheduleSkipAlreadyRunning);
		}
		if (property_exists($sc, 'ModeAdminResetPassword')) {
			$this->ModeAdminResetPassword = (int)($sc->ModeAdminResetPassword);
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
		if (property_exists($sc, 'PreventOpenAppUI')) {
			$this->PreventOpenAppUI = (bool)($sc->PreventOpenAppUI);
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
			$this->DefaultEmailReports = \Comet\DefaultEmailReportPolicy::createFromStdclass($sc->DefaultEmailReports);
		}
		foreach(get_object_vars($sc) as $k => $v) {
			switch($k) {
			case 'PreventRequestStorageVault':
			case 'PreventAddCustomStorageVault':
			case 'PreventEditStorageVault':
			case 'PreventDeleteStorageVault':
			case 'StorageVaultProviders':
			case 'PreventNewProtectedItem':
			case 'PreventEditProtectedItem':
			case 'PreventDeleteProtectedItem':
			case 'ProtectedItemEngineTypes':
			case 'FileAndFolderMandatoryExclusions':
			case 'ModeScheduleSkipAlreadyRunning':
			case 'ModeAdminResetPassword':
			case 'PreventDeleteSingleSnapshots':
			case 'PreventChangeAccountPassword':
			case 'PreventChangeEmailSettings':
			case 'PreventOpenAppUI':
			case 'HideAppImport':
			case 'HideAppVersion':
			case 'PreventOpenWebUI':
			case 'PreventViewDeviceNames':
			case 'DefaultEmailReports':
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
	public static function createFromStdclass(\stdClass $sc)
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
	public static function createFromArray(array $arr)
	{
		$stdClass = json_decode(json_encode($arr));
		return self::createFromStdclass($stdClass);
	}
	
	/**
	 * Coerce a plain PHP array into a new strongly-typed UserPolicy object.
	 * Because the Comet Server requires strict distinction between empty objects ({}) and arrays ([]),
	 * the result of this method may not be safe to re-submit to the Comet Server.
	 *
	 * @deprecated 3.0.0 Unsafe for round-trip server traversal. You should either 
	 *             (A) acknowledge this and continue by switching to createFromArray, or
	 *             (b) switch to the roundtrip-safe createFromStdclass alternative.
	 * @param array $arr Object data as PHP array
	 * @return UserPolicy
	 */
	public static function createFrom(array $arr)
	{
		return self::createFromArray($arr);
	}
	
	/**
	 * Coerce a JSON string into a new strongly-typed UserPolicy object.
	 *
	 * @param string $JsonString Object data as JSON string
	 * @return UserPolicy
	 */
	public static function createFromJSON($JsonString)
	{
		$decodedJsonObject = json_decode($JsonString); // as stdClass
		if (\json_last_error() != \JSON_ERROR_NONE) {
			throw new \Exception("JSON decode failed: " . \json_last_error_msg());
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
	public function toArray($for_json_encode = false)
	{
		$ret = [];
		$ret["PreventRequestStorageVault"] = $this->PreventRequestStorageVault;
		$ret["PreventAddCustomStorageVault"] = $this->PreventAddCustomStorageVault;
		$ret["PreventEditStorageVault"] = $this->PreventEditStorageVault;
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
		$ret["PreventDeleteSingleSnapshots"] = $this->PreventDeleteSingleSnapshots;
		$ret["PreventChangeAccountPassword"] = $this->PreventChangeAccountPassword;
		$ret["PreventChangeEmailSettings"] = $this->PreventChangeEmailSettings;
		$ret["PreventOpenAppUI"] = $this->PreventOpenAppUI;
		$ret["HideAppImport"] = $this->HideAppImport;
		$ret["HideAppVersion"] = $this->HideAppVersion;
		$ret["PreventOpenWebUI"] = $this->PreventOpenWebUI;
		$ret["PreventViewDeviceNames"] = $this->PreventViewDeviceNames;
		if ( $this->DefaultEmailReports === null ) {
			$ret["DefaultEmailReports"] = $for_json_encode ? (object)[] : [];
		} else {
			$ret["DefaultEmailReports"] = $this->DefaultEmailReports->toArray($for_json_encode);
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
		if ($this->StorageVaultProviders !== null) {
			$this->StorageVaultProviders->RemoveUnknownProperties();
		}
		if ($this->ProtectedItemEngineTypes !== null) {
			$this->ProtectedItemEngineTypes->RemoveUnknownProperties();
		}
		if ($this->DefaultEmailReports !== null) {
			$this->DefaultEmailReports->RemoveUnknownProperties();
		}
	}
	
}

