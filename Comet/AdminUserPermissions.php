<?php

/**
 * Copyright (c) 2018-2023 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 *
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

class AdminUserPermissions {

	/**
	 * @var boolean
	 */
	public $PreventEditServerSettings = false;

	/**
	 * @var boolean
	 */
	public $PreventServerShutdown = false;

	/**
	 * @var boolean
	 */
	public $PreventChangePassword = false;

	/**
	 * @var boolean
	 */
	public $AllowEditBranding = false;

	/**
	 * @var boolean
	 */
	public $AllowEditEmailOptions = false;

	/**
	 * @var boolean
	 */
	public $AllowEditRemoteStorage = false;

	/**
	 * @var boolean
	 */
	public $AllowEditWebhooks = false;

	/**
	 * @var boolean
	 */
	public $AllowEditExternalAuthSources = false;

	/**
	 * @var boolean
	 */
	public $DenyConstellationRole = false;

	/**
	 * @var boolean
	 * This field is available in Comet 23.6.0 and later.
	 */
	public $DenyViewServerHistory = false;

	/**
	 * @var boolean
	 * This field is available in Comet 23.6.0 and later.
	 */
	public $DenyViewServerInfo = false;

	/**
	 * @var boolean
	 * This field is available in Comet 23.6.0 and later.
	 */
	public $PreventRequestStorageVault = false;

	/**
	 * @var boolean
	 * This field is available in Comet 23.6.0 and later.
	 */
	public $PreventAddCustomStorageVault = false;

	/**
	 * @var boolean
	 * This field is available in Comet 23.6.0 and later.
	 */
	public $HideCloudStorageBranding = false;

	/**
	 * @var boolean
	 * This field is available in Comet 23.6.0 and later.
	 */
	public $ShouldRestrictProviderList = false;

	/**
	 * @var int[]
	 * This field is available in Comet 23.6.0 and later.
	 */
	public $AllowedProvidersWhenRestricted = [];

	/**
	 * Preserve unknown properties when dealing with future server versions.
	 *
	 * @see AdminUserPermissions::RemoveUnknownProperties() Remove all unknown properties
	 * @var array
	 */
	private $__unknown_properties = [];

	/**
	 * Replace the content of this AdminUserPermissions object from a PHP \stdClass.
	 * The data could be supplied from an API call after json_decode(...); or generated manually.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return void
	 */
	protected function inflateFrom(\stdClass $sc)
	{
		if (property_exists($sc, 'PreventEditServerSettings') && !is_null($sc->PreventEditServerSettings)) {
			$this->PreventEditServerSettings = (bool)($sc->PreventEditServerSettings);
		}
		if (property_exists($sc, 'PreventServerShutdown') && !is_null($sc->PreventServerShutdown)) {
			$this->PreventServerShutdown = (bool)($sc->PreventServerShutdown);
		}
		if (property_exists($sc, 'PreventChangePassword') && !is_null($sc->PreventChangePassword)) {
			$this->PreventChangePassword = (bool)($sc->PreventChangePassword);
		}
		if (property_exists($sc, 'AllowEditBranding') && !is_null($sc->AllowEditBranding)) {
			$this->AllowEditBranding = (bool)($sc->AllowEditBranding);
		}
		if (property_exists($sc, 'AllowEditEmailOptions') && !is_null($sc->AllowEditEmailOptions)) {
			$this->AllowEditEmailOptions = (bool)($sc->AllowEditEmailOptions);
		}
		if (property_exists($sc, 'AllowEditRemoteStorage') && !is_null($sc->AllowEditRemoteStorage)) {
			$this->AllowEditRemoteStorage = (bool)($sc->AllowEditRemoteStorage);
		}
		if (property_exists($sc, 'AllowEditWebhooks') && !is_null($sc->AllowEditWebhooks)) {
			$this->AllowEditWebhooks = (bool)($sc->AllowEditWebhooks);
		}
		if (property_exists($sc, 'AllowEditExternalAuthSources') && !is_null($sc->AllowEditExternalAuthSources)) {
			$this->AllowEditExternalAuthSources = (bool)($sc->AllowEditExternalAuthSources);
		}
		if (property_exists($sc, 'DenyConstellationRole') && !is_null($sc->DenyConstellationRole)) {
			$this->DenyConstellationRole = (bool)($sc->DenyConstellationRole);
		}
		if (property_exists($sc, 'DenyViewServerHistory') && !is_null($sc->DenyViewServerHistory)) {
			$this->DenyViewServerHistory = (bool)($sc->DenyViewServerHistory);
		}
		if (property_exists($sc, 'DenyViewServerInfo') && !is_null($sc->DenyViewServerInfo)) {
			$this->DenyViewServerInfo = (bool)($sc->DenyViewServerInfo);
		}
		if (property_exists($sc, 'PreventRequestStorageVault') && !is_null($sc->PreventRequestStorageVault)) {
			$this->PreventRequestStorageVault = (bool)($sc->PreventRequestStorageVault);
		}
		if (property_exists($sc, 'PreventAddCustomStorageVault') && !is_null($sc->PreventAddCustomStorageVault)) {
			$this->PreventAddCustomStorageVault = (bool)($sc->PreventAddCustomStorageVault);
		}
		if (property_exists($sc, 'HideCloudStorageBranding') && !is_null($sc->HideCloudStorageBranding)) {
			$this->HideCloudStorageBranding = (bool)($sc->HideCloudStorageBranding);
		}
		if (property_exists($sc, 'ShouldRestrictProviderList') && !is_null($sc->ShouldRestrictProviderList)) {
			$this->ShouldRestrictProviderList = (bool)($sc->ShouldRestrictProviderList);
		}
		if (property_exists($sc, 'AllowedProvidersWhenRestricted') && !is_null($sc->AllowedProvidersWhenRestricted)) {
			$val_2 = [];
			if ($sc->AllowedProvidersWhenRestricted !== null) {
				for($i_2 = 0; $i_2 < count($sc->AllowedProvidersWhenRestricted); ++$i_2) {
					$val_2[] = (int)($sc->AllowedProvidersWhenRestricted[$i_2]);
				}
			}
			$this->AllowedProvidersWhenRestricted = $val_2;
		}
		foreach(get_object_vars($sc) as $k => $v) {
			switch($k) {
			case 'PreventEditServerSettings':
			case 'PreventServerShutdown':
			case 'PreventChangePassword':
			case 'AllowEditBranding':
			case 'AllowEditEmailOptions':
			case 'AllowEditRemoteStorage':
			case 'AllowEditWebhooks':
			case 'AllowEditExternalAuthSources':
			case 'DenyConstellationRole':
			case 'DenyViewServerHistory':
			case 'DenyViewServerInfo':
			case 'PreventRequestStorageVault':
			case 'PreventAddCustomStorageVault':
			case 'HideCloudStorageBranding':
			case 'ShouldRestrictProviderList':
			case 'AllowedProvidersWhenRestricted':
				break;
			default:
				$this->__unknown_properties[$k] = $v;
			}
		}
	}

	/**
	 * Coerce a stdClass into a new strongly-typed AdminUserPermissions object.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return AdminUserPermissions
	 */
	public static function createFromStdclass(\stdClass $sc): \Comet\AdminUserPermissions
	{
		$retn = new AdminUserPermissions();
		$retn->inflateFrom($sc);
		return $retn;
	}

	/**
	 * Coerce a plain PHP array into a new strongly-typed AdminUserPermissions object.
	 * Because the Comet Server requires strict distinction between empty objects ({}) and arrays ([]),
	 * the result of this method may not be safe to re-submit to the Comet Server.
	 *
	 * @param array $arr Object data as PHP array
	 * @return AdminUserPermissions
	 */
	public static function createFromArray(array $arr): \Comet\AdminUserPermissions
	{
		$stdClass = json_decode(json_encode($arr, JSON_UNESCAPED_SLASHES));
		if (is_array($stdClass) && count($stdClass) === 0) {
			$stdClass = new \stdClass();
		}
		return self::createFromStdclass($stdClass);
	}

	/**
	 * Coerce a JSON string into a new strongly-typed AdminUserPermissions object.
	 *
	 * @param string $JsonString Object data as JSON string
	 * @return AdminUserPermissions
	 */
	public static function createFromJSON(string $JsonString): \Comet\AdminUserPermissions
	{
		$decodedJsonObject = json_decode($JsonString); // as stdClass
		if (\json_last_error() != \JSON_ERROR_NONE) {
			throw new \Exception("JSON decode failed: " . \json_last_error_msg(), \json_last_error());
		}
		$retn = new AdminUserPermissions();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}

	/**
	 * Convert this AdminUserPermissions object into a plain PHP array.
	 *
	 * Unknown properties may still be represented as \stdClass objects.
	 *
	 * @param bool $for_json_encode Represent empty key-value maps as \stdClass instead of plain PHP arrays
	 * @return array
	 */
	public function toArray(bool $for_json_encode = false): array
	{
		$ret = [];
		$ret["PreventEditServerSettings"] = $this->PreventEditServerSettings;
		$ret["PreventServerShutdown"] = $this->PreventServerShutdown;
		$ret["PreventChangePassword"] = $this->PreventChangePassword;
		$ret["AllowEditBranding"] = $this->AllowEditBranding;
		$ret["AllowEditEmailOptions"] = $this->AllowEditEmailOptions;
		$ret["AllowEditRemoteStorage"] = $this->AllowEditRemoteStorage;
		$ret["AllowEditWebhooks"] = $this->AllowEditWebhooks;
		$ret["AllowEditExternalAuthSources"] = $this->AllowEditExternalAuthSources;
		$ret["DenyConstellationRole"] = $this->DenyConstellationRole;
		$ret["DenyViewServerHistory"] = $this->DenyViewServerHistory;
		$ret["DenyViewServerInfo"] = $this->DenyViewServerInfo;
		$ret["PreventRequestStorageVault"] = $this->PreventRequestStorageVault;
		$ret["PreventAddCustomStorageVault"] = $this->PreventAddCustomStorageVault;
		$ret["HideCloudStorageBranding"] = $this->HideCloudStorageBranding;
		$ret["ShouldRestrictProviderList"] = $this->ShouldRestrictProviderList;
		{
			$c0 = [];
			for($i0 = 0; $i0 < count($this->AllowedProvidersWhenRestricted); ++$i0) {
				$val0 = $this->AllowedProvidersWhenRestricted[$i0];
				$c0[] = $val0;
			}
			$ret["AllowedProvidersWhenRestricted"] = $c0;
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
	}

}

