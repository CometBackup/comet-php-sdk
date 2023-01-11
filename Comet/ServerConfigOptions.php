<?php

/**
 * Copyright (c) 2018-2023 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 *
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

class ServerConfigOptions {

	/**
	 * @var \Comet\AllowedAdminUser[]
	 */
	public $AdminUsers = [];

	/**
	 * @var \Comet\AuthenticationRoleOptions
	 */
	public $AuthenticationRole = null;

	/**
	 * @var \Comet\BrandingOptions
	 */
	public $Branding = null;

	/**
	 * @var \Comet\ConstellationRoleOptions
	 */
	public $ConstellationRole = null;

	/**
	 * @var \Comet\ConstellationRoleOptions
	 */
	public $ConstellationRole_Legacy = null;

	/**
	 * @var \Comet\EmailOptions
	 */
	public $Email = null;

	/**
	 * @var string[]
	 */
	public $ExperimentalOptions = [];

	/**
	 * @var \Comet\ExternalAuthenticationSource[] An array with string keys.
	 */
	public $ExternalAdminUserSources = [];

	/**
	 * @var \Comet\RatelimitOptions
	 */
	public $IPRateLimit = null;

	/**
	 * @var \Comet\LicenseOptions
	 */
	public $License = null;

	/**
	 * @var \Comet\HTTPConnectorOptions[]
	 */
	public $ListenAddresses = [];

	/**
	 * @var \Comet\Organization[] An array with string keys.
	 */
	public $Organizations = [];

	/**
	 * @var \Comet\PSAConfig[]
	 */
	public $PSAConfigs = [];

	/**
	 * @var \Comet\SelfBackupOptions
	 */
	public $SelfBackup = null;

	/**
	 * @var \Comet\SessionOptions
	 */
	public $SessionSettings = null;

	/**
	 * @var \Comet\SoftwareBuildRoleOptions
	 */
	public $SoftwareBuildRole = null;

	/**
	 * @var \Comet\StorageRoleOptions
	 */
	public $StorageRole = null;

	/**
	 * @var boolean
	 */
	public $TrustXForwardedFor = false;

	/**
	 * @var \Comet\WebhookOption[] An array with string keys.
	 */
	public $WebhookOptions = [];

	/**
	 * Preserve unknown properties when dealing with future server versions.
	 *
	 * @see ServerConfigOptions::RemoveUnknownProperties() Remove all unknown properties
	 * @var array
	 */
	private $__unknown_properties = [];

	/**
	 * Replace the content of this ServerConfigOptions object from a PHP \stdClass.
	 * The data could be supplied from an API call after json_decode(...); or generated manually.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return void
	 */
	protected function inflateFrom(\stdClass $sc)
	{
		if (property_exists($sc, 'AdminUsers')) {
			$val_2 = [];
			if ($sc->AdminUsers !== null) {
				for($i_2 = 0; $i_2 < count($sc->AdminUsers); ++$i_2) {
					if (is_array($sc->AdminUsers[$i_2]) && count($sc->AdminUsers[$i_2]) === 0) {
					// Work around edge case in json_decode--json_encode stdClass conversion
						$val_2[] = \Comet\AllowedAdminUser::createFromStdclass(new \stdClass());
					} else {
						$val_2[] = \Comet\AllowedAdminUser::createFromStdclass($sc->AdminUsers[$i_2]);
					}
				}
			}
			$this->AdminUsers = $val_2;
		}
		if (property_exists($sc, 'AuthenticationRole')) {
			if (is_array($sc->AuthenticationRole) && count($sc->AuthenticationRole) === 0) {
			// Work around edge case in json_decode--json_encode stdClass conversion
				$this->AuthenticationRole = \Comet\AuthenticationRoleOptions::createFromStdclass(new \stdClass());
			} else {
				$this->AuthenticationRole = \Comet\AuthenticationRoleOptions::createFromStdclass($sc->AuthenticationRole);
			}
		}
		if (property_exists($sc, 'Branding')) {
			if (is_array($sc->Branding) && count($sc->Branding) === 0) {
			// Work around edge case in json_decode--json_encode stdClass conversion
				$this->Branding = \Comet\BrandingOptions::createFromStdclass(new \stdClass());
			} else {
				$this->Branding = \Comet\BrandingOptions::createFromStdclass($sc->Branding);
			}
		}
		if (property_exists($sc, 'ConstellationRole')) {
			if (is_array($sc->ConstellationRole) && count($sc->ConstellationRole) === 0) {
			// Work around edge case in json_decode--json_encode stdClass conversion
				$this->ConstellationRole = \Comet\ConstellationRoleOptions::createFromStdclass(new \stdClass());
			} else {
				$this->ConstellationRole = \Comet\ConstellationRoleOptions::createFromStdclass($sc->ConstellationRole);
			}
		}
		if (property_exists($sc, 'OverseerRole') && !is_null($sc->OverseerRole)) {
			if (is_array($sc->OverseerRole) && count($sc->OverseerRole) === 0) {
			// Work around edge case in json_decode--json_encode stdClass conversion
				$this->ConstellationRole_Legacy = \Comet\ConstellationRoleOptions::createFromStdclass(new \stdClass());
			} else {
				$this->ConstellationRole_Legacy = \Comet\ConstellationRoleOptions::createFromStdclass($sc->OverseerRole);
			}
		}
		if (property_exists($sc, 'Email')) {
			if (is_array($sc->Email) && count($sc->Email) === 0) {
			// Work around edge case in json_decode--json_encode stdClass conversion
				$this->Email = \Comet\EmailOptions::createFromStdclass(new \stdClass());
			} else {
				$this->Email = \Comet\EmailOptions::createFromStdclass($sc->Email);
			}
		}
		if (property_exists($sc, 'ExperimentalOptions') && !is_null($sc->ExperimentalOptions)) {
			$val_2 = [];
			if ($sc->ExperimentalOptions !== null) {
				for($i_2 = 0; $i_2 < count($sc->ExperimentalOptions); ++$i_2) {
					$val_2[] = (string)($sc->ExperimentalOptions[$i_2]);
				}
			}
			$this->ExperimentalOptions = $val_2;
		}
		if (property_exists($sc, 'ExternalAdminUserSources')) {
			$val_2 = [];
			if ($sc->ExternalAdminUserSources !== null) {
				foreach($sc->ExternalAdminUserSources as $k_2 => $v_2) {
					$phpk_2 = (string)($k_2);
					if (is_array($v_2) && count($v_2) === 0) {
					// Work around edge case in json_decode--json_encode stdClass conversion
						$phpv_2 = \Comet\ExternalAuthenticationSource::createFromStdclass(new \stdClass());
					} else {
						$phpv_2 = \Comet\ExternalAuthenticationSource::createFromStdclass($v_2);
					}
					$val_2[$phpk_2] = $phpv_2;
				}
			}
			$this->ExternalAdminUserSources = $val_2;
		}
		if (property_exists($sc, 'IPRateLimit')) {
			if (is_array($sc->IPRateLimit) && count($sc->IPRateLimit) === 0) {
			// Work around edge case in json_decode--json_encode stdClass conversion
				$this->IPRateLimit = \Comet\RatelimitOptions::createFromStdclass(new \stdClass());
			} else {
				$this->IPRateLimit = \Comet\RatelimitOptions::createFromStdclass($sc->IPRateLimit);
			}
		}
		if (property_exists($sc, 'License')) {
			if (is_array($sc->License) && count($sc->License) === 0) {
			// Work around edge case in json_decode--json_encode stdClass conversion
				$this->License = \Comet\LicenseOptions::createFromStdclass(new \stdClass());
			} else {
				$this->License = \Comet\LicenseOptions::createFromStdclass($sc->License);
			}
		}
		if (property_exists($sc, 'ListenAddresses')) {
			$val_2 = [];
			if ($sc->ListenAddresses !== null) {
				for($i_2 = 0; $i_2 < count($sc->ListenAddresses); ++$i_2) {
					if (is_array($sc->ListenAddresses[$i_2]) && count($sc->ListenAddresses[$i_2]) === 0) {
					// Work around edge case in json_decode--json_encode stdClass conversion
						$val_2[] = \Comet\HTTPConnectorOptions::createFromStdclass(new \stdClass());
					} else {
						$val_2[] = \Comet\HTTPConnectorOptions::createFromStdclass($sc->ListenAddresses[$i_2]);
					}
				}
			}
			$this->ListenAddresses = $val_2;
		}
		if (property_exists($sc, 'Organizations')) {
			$val_2 = [];
			if ($sc->Organizations !== null) {
				foreach($sc->Organizations as $k_2 => $v_2) {
					$phpk_2 = (string)($k_2);
					if (is_array($v_2) && count($v_2) === 0) {
					// Work around edge case in json_decode--json_encode stdClass conversion
						$phpv_2 = \Comet\Organization::createFromStdclass(new \stdClass());
					} else {
						$phpv_2 = \Comet\Organization::createFromStdclass($v_2);
					}
					$val_2[$phpk_2] = $phpv_2;
				}
			}
			$this->Organizations = $val_2;
		}
		if (property_exists($sc, 'PSAConfigs')) {
			$val_2 = [];
			if ($sc->PSAConfigs !== null) {
				for($i_2 = 0; $i_2 < count($sc->PSAConfigs); ++$i_2) {
					if (is_array($sc->PSAConfigs[$i_2]) && count($sc->PSAConfigs[$i_2]) === 0) {
					// Work around edge case in json_decode--json_encode stdClass conversion
						$val_2[] = \Comet\PSAConfig::createFromStdclass(new \stdClass());
					} else {
						$val_2[] = \Comet\PSAConfig::createFromStdclass($sc->PSAConfigs[$i_2]);
					}
				}
			}
			$this->PSAConfigs = $val_2;
		}
		if (property_exists($sc, 'SelfBackup')) {
			if (is_array($sc->SelfBackup) && count($sc->SelfBackup) === 0) {
			// Work around edge case in json_decode--json_encode stdClass conversion
				$this->SelfBackup = \Comet\SelfBackupOptions::createFromStdclass(new \stdClass());
			} else {
				$this->SelfBackup = \Comet\SelfBackupOptions::createFromStdclass($sc->SelfBackup);
			}
		}
		if (property_exists($sc, 'SessionSettings')) {
			if (is_array($sc->SessionSettings) && count($sc->SessionSettings) === 0) {
			// Work around edge case in json_decode--json_encode stdClass conversion
				$this->SessionSettings = \Comet\SessionOptions::createFromStdclass(new \stdClass());
			} else {
				$this->SessionSettings = \Comet\SessionOptions::createFromStdclass($sc->SessionSettings);
			}
		}
		if (property_exists($sc, 'SoftwareBuildRole')) {
			if (is_array($sc->SoftwareBuildRole) && count($sc->SoftwareBuildRole) === 0) {
			// Work around edge case in json_decode--json_encode stdClass conversion
				$this->SoftwareBuildRole = \Comet\SoftwareBuildRoleOptions::createFromStdclass(new \stdClass());
			} else {
				$this->SoftwareBuildRole = \Comet\SoftwareBuildRoleOptions::createFromStdclass($sc->SoftwareBuildRole);
			}
		}
		if (property_exists($sc, 'StorageRole')) {
			if (is_array($sc->StorageRole) && count($sc->StorageRole) === 0) {
			// Work around edge case in json_decode--json_encode stdClass conversion
				$this->StorageRole = \Comet\StorageRoleOptions::createFromStdclass(new \stdClass());
			} else {
				$this->StorageRole = \Comet\StorageRoleOptions::createFromStdclass($sc->StorageRole);
			}
		}
		if (property_exists($sc, 'TrustXForwardedFor')) {
			$this->TrustXForwardedFor = (bool)($sc->TrustXForwardedFor);
		}
		if (property_exists($sc, 'WebhookOptions')) {
			$val_2 = [];
			if ($sc->WebhookOptions !== null) {
				foreach($sc->WebhookOptions as $k_2 => $v_2) {
					$phpk_2 = (string)($k_2);
					if (is_array($v_2) && count($v_2) === 0) {
					// Work around edge case in json_decode--json_encode stdClass conversion
						$phpv_2 = \Comet\WebhookOption::createFromStdclass(new \stdClass());
					} else {
						$phpv_2 = \Comet\WebhookOption::createFromStdclass($v_2);
					}
					$val_2[$phpk_2] = $phpv_2;
				}
			}
			$this->WebhookOptions = $val_2;
		}
		foreach(get_object_vars($sc) as $k => $v) {
			switch($k) {
			case 'AdminUsers':
			case 'AuthenticationRole':
			case 'Branding':
			case 'ConstellationRole':
			case 'OverseerRole':
			case 'Email':
			case 'ExperimentalOptions':
			case 'ExternalAdminUserSources':
			case 'IPRateLimit':
			case 'License':
			case 'ListenAddresses':
			case 'Organizations':
			case 'PSAConfigs':
			case 'SelfBackup':
			case 'SessionSettings':
			case 'SoftwareBuildRole':
			case 'StorageRole':
			case 'TrustXForwardedFor':
			case 'WebhookOptions':
				break;
			default:
				$this->__unknown_properties[$k] = $v;
			}
		}
	}

	/**
	 * Coerce a stdClass into a new strongly-typed ServerConfigOptions object.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return ServerConfigOptions
	 */
	public static function createFromStdclass(\stdClass $sc): \Comet\ServerConfigOptions
	{
		$retn = new ServerConfigOptions();
		$retn->inflateFrom($sc);
		return $retn;
	}

	/**
	 * Coerce a plain PHP array into a new strongly-typed ServerConfigOptions object.
	 * Because the Comet Server requires strict distinction between empty objects ({}) and arrays ([]),
	 * the result of this method may not be safe to re-submit to the Comet Server.
	 *
	 * @param array $arr Object data as PHP array
	 * @return ServerConfigOptions
	 */
	public static function createFromArray(array $arr): \Comet\ServerConfigOptions
	{
		$stdClass = json_decode(json_encode($arr, JSON_UNESCAPED_SLASHES));
		if (is_array($stdClass) && count($stdClass) === 0) {
			$stdClass = new \stdClass();
		}
		return self::createFromStdclass($stdClass);
	}

	/**
	 * Coerce a JSON string into a new strongly-typed ServerConfigOptions object.
	 *
	 * @param string $JsonString Object data as JSON string
	 * @return ServerConfigOptions
	 */
	public static function createFromJSON(string $JsonString): \Comet\ServerConfigOptions
	{
		$decodedJsonObject = json_decode($JsonString); // as stdClass
		if (\json_last_error() != \JSON_ERROR_NONE) {
			throw new \Exception("JSON decode failed: " . \json_last_error_msg(), \json_last_error());
		}
		$retn = new ServerConfigOptions();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}

	/**
	 * Convert this ServerConfigOptions object into a plain PHP array.
	 *
	 * Unknown properties may still be represented as \stdClass objects.
	 *
	 * @param bool $for_json_encode Represent empty key-value maps as \stdClass instead of plain PHP arrays
	 * @return array
	 */
	public function toArray(bool $for_json_encode = false): array
	{
		$ret = [];
		{
			$c0 = [];
			for($i0 = 0; $i0 < count($this->AdminUsers); ++$i0) {
				if ( $this->AdminUsers[$i0] === null ) {
					$val0 = $for_json_encode ? (object)[] : [];
				} else {
					$val0 = $this->AdminUsers[$i0]->toArray($for_json_encode);
				}
				$c0[] = $val0;
			}
			$ret["AdminUsers"] = $c0;
		}
		if ( $this->AuthenticationRole === null ) {
			$ret["AuthenticationRole"] = $for_json_encode ? (object)[] : [];
		} else {
			$ret["AuthenticationRole"] = $this->AuthenticationRole->toArray($for_json_encode);
		}
		if ( $this->Branding === null ) {
			$ret["Branding"] = $for_json_encode ? (object)[] : [];
		} else {
			$ret["Branding"] = $this->Branding->toArray($for_json_encode);
		}
		if ( $this->ConstellationRole === null ) {
			$ret["ConstellationRole"] = $for_json_encode ? (object)[] : [];
		} else {
			$ret["ConstellationRole"] = $this->ConstellationRole->toArray($for_json_encode);
		}
		if ( $this->ConstellationRole_Legacy === null ) {
			$ret["OverseerRole"] = $for_json_encode ? (object)[] : [];
		} else {
			$ret["OverseerRole"] = $this->ConstellationRole_Legacy->toArray($for_json_encode);
		}
		if ( $this->Email === null ) {
			$ret["Email"] = $for_json_encode ? (object)[] : [];
		} else {
			$ret["Email"] = $this->Email->toArray($for_json_encode);
		}
		{
			$c0 = [];
			for($i0 = 0; $i0 < count($this->ExperimentalOptions); ++$i0) {
				$val0 = $this->ExperimentalOptions[$i0];
				$c0[] = $val0;
			}
			$ret["ExperimentalOptions"] = $c0;
		}
		{
			$c0 = [];
			foreach($this->ExternalAdminUserSources as $k0 => $v0) {
				$ko_0 = $k0;
				if ( $v0 === null ) {
					$vo_0 = $for_json_encode ? (object)[] : [];
				} else {
					$vo_0 = $v0->toArray($for_json_encode);
				}
				$c0[ $ko_0 ] = $vo_0;
			}
			if ($for_json_encode && count($c0) == 0) {
				$ret["ExternalAdminUserSources"] = (object)[];
			} else {
				$ret["ExternalAdminUserSources"] = $c0;
			}
		}
		if ( $this->IPRateLimit === null ) {
			$ret["IPRateLimit"] = $for_json_encode ? (object)[] : [];
		} else {
			$ret["IPRateLimit"] = $this->IPRateLimit->toArray($for_json_encode);
		}
		if ( $this->License === null ) {
			$ret["License"] = $for_json_encode ? (object)[] : [];
		} else {
			$ret["License"] = $this->License->toArray($for_json_encode);
		}
		{
			$c0 = [];
			for($i0 = 0; $i0 < count($this->ListenAddresses); ++$i0) {
				if ( $this->ListenAddresses[$i0] === null ) {
					$val0 = $for_json_encode ? (object)[] : [];
				} else {
					$val0 = $this->ListenAddresses[$i0]->toArray($for_json_encode);
				}
				$c0[] = $val0;
			}
			$ret["ListenAddresses"] = $c0;
		}
		{
			$c0 = [];
			foreach($this->Organizations as $k0 => $v0) {
				$ko_0 = $k0;
				if ( $v0 === null ) {
					$vo_0 = $for_json_encode ? (object)[] : [];
				} else {
					$vo_0 = $v0->toArray($for_json_encode);
				}
				$c0[ $ko_0 ] = $vo_0;
			}
			if ($for_json_encode && count($c0) == 0) {
				$ret["Organizations"] = (object)[];
			} else {
				$ret["Organizations"] = $c0;
			}
		}
		{
			$c0 = [];
			for($i0 = 0; $i0 < count($this->PSAConfigs); ++$i0) {
				if ( $this->PSAConfigs[$i0] === null ) {
					$val0 = $for_json_encode ? (object)[] : [];
				} else {
					$val0 = $this->PSAConfigs[$i0]->toArray($for_json_encode);
				}
				$c0[] = $val0;
			}
			$ret["PSAConfigs"] = $c0;
		}
		if ( $this->SelfBackup === null ) {
			$ret["SelfBackup"] = $for_json_encode ? (object)[] : [];
		} else {
			$ret["SelfBackup"] = $this->SelfBackup->toArray($for_json_encode);
		}
		if ( $this->SessionSettings === null ) {
			$ret["SessionSettings"] = $for_json_encode ? (object)[] : [];
		} else {
			$ret["SessionSettings"] = $this->SessionSettings->toArray($for_json_encode);
		}
		if ( $this->SoftwareBuildRole === null ) {
			$ret["SoftwareBuildRole"] = $for_json_encode ? (object)[] : [];
		} else {
			$ret["SoftwareBuildRole"] = $this->SoftwareBuildRole->toArray($for_json_encode);
		}
		if ( $this->StorageRole === null ) {
			$ret["StorageRole"] = $for_json_encode ? (object)[] : [];
		} else {
			$ret["StorageRole"] = $this->StorageRole->toArray($for_json_encode);
		}
		$ret["TrustXForwardedFor"] = $this->TrustXForwardedFor;
		{
			$c0 = [];
			foreach($this->WebhookOptions as $k0 => $v0) {
				$ko_0 = $k0;
				if ( $v0 === null ) {
					$vo_0 = $for_json_encode ? (object)[] : [];
				} else {
					$vo_0 = $v0->toArray($for_json_encode);
				}
				$c0[ $ko_0 ] = $vo_0;
			}
			if ($for_json_encode && count($c0) == 0) {
				$ret["WebhookOptions"] = (object)[];
			} else {
				$ret["WebhookOptions"] = $c0;
			}
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
		if ($this->AuthenticationRole !== null) {
			$this->AuthenticationRole->RemoveUnknownProperties();
		}
		if ($this->Branding !== null) {
			$this->Branding->RemoveUnknownProperties();
		}
		if ($this->ConstellationRole !== null) {
			$this->ConstellationRole->RemoveUnknownProperties();
		}
		if ($this->ConstellationRole_Legacy !== null) {
			$this->ConstellationRole_Legacy->RemoveUnknownProperties();
		}
		if ($this->Email !== null) {
			$this->Email->RemoveUnknownProperties();
		}
		if ($this->IPRateLimit !== null) {
			$this->IPRateLimit->RemoveUnknownProperties();
		}
		if ($this->License !== null) {
			$this->License->RemoveUnknownProperties();
		}
		if ($this->SelfBackup !== null) {
			$this->SelfBackup->RemoveUnknownProperties();
		}
		if ($this->SessionSettings !== null) {
			$this->SessionSettings->RemoveUnknownProperties();
		}
		if ($this->SoftwareBuildRole !== null) {
			$this->SoftwareBuildRole->RemoveUnknownProperties();
		}
		if ($this->StorageRole !== null) {
			$this->StorageRole->RemoveUnknownProperties();
		}
	}

}

