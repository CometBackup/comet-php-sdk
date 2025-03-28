<?php

/**
 * Copyright (c) 2018-2025 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 *
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

class Organization {

	/**
	 * @var array<string, \Comet\FileOption>
	 */
	public $AuditFileOptions = [];

	/**
	 * @var \Comet\BrandingOptions
	 */
	public $Branding = null;

	/**
	 * @var \Comet\ConstellationRoleOptions
	 */
	public $ConstellationRole = null;

	/**
	 * @var \Comet\EmailOptions
	 */
	public $Email = null;

	/**
	 * @var string[]
	 */
	public $ExperimentalOptions = [];

	/**
	 * @var string[]
	 */
	public $Hosts = [];

	/**
	 * @var string
	 */
	public $Name = "";

	/**
	 * @var boolean
	 */
	public $IsSuspended = false;

	/**
	 * @var \Comet\PSAConfig[]
	 */
	public $PSAConfigs = [];

	/**
	 * @var \Comet\RemoteStorageOption[]
	 */
	public $RemoteStorage = [];

	/**
	 * @var \Comet\SoftwareBuildRoleOptions
	 */
	public $SoftwareBuildRole = null;

	/**
	 * @var array<string, \Comet\WebhookOption>
	 */
	public $WebhookOptions = [];

	/**
	 * Preserve unknown properties when dealing with future server versions.
	 *
	 * @see Organization::RemoveUnknownProperties() Remove all unknown properties
	 * @var array
	 */
	private $__unknown_properties = [];

	/**
	 * Replace the content of this Organization object from a PHP \stdClass.
	 * The data could be supplied from an API call after json_decode(...); or generated manually.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return void
	 */
	protected function inflateFrom(\stdClass $sc)
	{
		if (property_exists($sc, 'AuditFileOptions')) {
			$val_2 = [];
			if ($sc->AuditFileOptions !== null) {
				foreach($sc->AuditFileOptions as $k_2 => $v_2) {
					$phpk_2 = (string)($k_2);
					if (is_array($v_2) && count($v_2) === 0) {
					// Work around edge case in json_decode--json_encode stdClass conversion
						$phpv_2 = \Comet\FileOption::createFromStdclass(new \stdClass());
					} else {
						$phpv_2 = \Comet\FileOption::createFromStdclass($v_2);
					}
					$val_2[$phpk_2] = $phpv_2;
				}
			}
			$this->AuditFileOptions = $val_2;
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
		if (property_exists($sc, 'Hosts')) {
			$val_2 = [];
			if ($sc->Hosts !== null) {
				for($i_2 = 0; $i_2 < count($sc->Hosts); ++$i_2) {
					$val_2[] = (string)($sc->Hosts[$i_2]);
				}
			}
			$this->Hosts = $val_2;
		}
		if (property_exists($sc, 'Name')) {
			$this->Name = (string)($sc->Name);
		}
		if (property_exists($sc, 'IsSuspended')) {
			$this->IsSuspended = (bool)($sc->IsSuspended);
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
		if (property_exists($sc, 'RemoteStorage')) {
			$val_2 = [];
			if ($sc->RemoteStorage !== null) {
				for($i_2 = 0; $i_2 < count($sc->RemoteStorage); ++$i_2) {
					if (is_array($sc->RemoteStorage[$i_2]) && count($sc->RemoteStorage[$i_2]) === 0) {
					// Work around edge case in json_decode--json_encode stdClass conversion
						$val_2[] = \Comet\RemoteStorageOption::createFromStdclass(new \stdClass());
					} else {
						$val_2[] = \Comet\RemoteStorageOption::createFromStdclass($sc->RemoteStorage[$i_2]);
					}
				}
			}
			$this->RemoteStorage = $val_2;
		}
		if (property_exists($sc, 'SoftwareBuildRole')) {
			if (is_array($sc->SoftwareBuildRole) && count($sc->SoftwareBuildRole) === 0) {
			// Work around edge case in json_decode--json_encode stdClass conversion
				$this->SoftwareBuildRole = \Comet\SoftwareBuildRoleOptions::createFromStdclass(new \stdClass());
			} else {
				$this->SoftwareBuildRole = \Comet\SoftwareBuildRoleOptions::createFromStdclass($sc->SoftwareBuildRole);
			}
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
			case 'AuditFileOptions':
			case 'Branding':
			case 'ConstellationRole':
			case 'Email':
			case 'ExperimentalOptions':
			case 'Hosts':
			case 'Name':
			case 'IsSuspended':
			case 'PSAConfigs':
			case 'RemoteStorage':
			case 'SoftwareBuildRole':
			case 'WebhookOptions':
				break;
			default:
				$this->__unknown_properties[$k] = $v;
			}
		}
	}

	/**
	 * Coerce a stdClass into a new strongly-typed Organization object.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return Organization
	 */
	public static function createFromStdclass(\stdClass $sc): \Comet\Organization
	{
		$retn = new Organization();
		$retn->inflateFrom($sc);
		return $retn;
	}

	/**
	 * Coerce a plain PHP array into a new strongly-typed Organization object.
	 * Because the Comet Server requires strict distinction between empty objects ({}) and arrays ([]),
	 * the result of this method may not be safe to re-submit to the Comet Server.
	 *
	 * @param array $arr Object data as PHP array
	 * @return Organization
	 */
	public static function createFromArray(array $arr): \Comet\Organization
	{
		$stdClass = json_decode(json_encode($arr, JSON_UNESCAPED_SLASHES));
		if (is_array($stdClass) && count($stdClass) === 0) {
			$stdClass = new \stdClass();
		}
		return self::createFromStdclass($stdClass);
	}

	/**
	 * Coerce a JSON string into a new strongly-typed Organization object.
	 *
	 * @param string $JsonString Object data as JSON string
	 * @return Organization
	 */
	public static function createFromJSON(string $JsonString): \Comet\Organization
	{
		$decodedJsonObject = json_decode($JsonString); // as stdClass
		if (\json_last_error() != \JSON_ERROR_NONE) {
			throw new \Exception("JSON decode failed: " . \json_last_error_msg(), \json_last_error());
		}
		$retn = new Organization();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}

	/**
	 * Convert this Organization object into a plain PHP array.
	 *
	 * Unknown properties may still be represented as \stdClass objects.
	 *
	 * @param bool $for_json_encode Represent key-value maps as \stdClass instead of plain PHP arrays
	 * @return array
	 */
	public function toArray(bool $for_json_encode = false): array
	{
		$ret = [];
		{
			$c0 = $for_json_encode ? (object)[] : [];
			foreach($this->AuditFileOptions as $k0 => $v0) {
				$ko_0 = $k0;
				if ( $v0 === null ) {
					$vo_0 = $for_json_encode ? (object)[] : [];
				} else {
					$vo_0 = $v0->toArray($for_json_encode);
				}
				if ($for_json_encode) {
				$c0->{ $ko_0 } = $vo_0;
				} else {
					$c0[ $ko_0 ] = $vo_0;
				}
			}
			$ret["AuditFileOptions"] = $c0;
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
			for($i0 = 0; $i0 < count($this->Hosts); ++$i0) {
				$val0 = $this->Hosts[$i0];
				$c0[] = $val0;
			}
			$ret["Hosts"] = $c0;
		}
		$ret["Name"] = $this->Name;
		$ret["IsSuspended"] = $this->IsSuspended;
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
		{
			$c0 = [];
			for($i0 = 0; $i0 < count($this->RemoteStorage); ++$i0) {
				if ( $this->RemoteStorage[$i0] === null ) {
					$val0 = $for_json_encode ? (object)[] : [];
				} else {
					$val0 = $this->RemoteStorage[$i0]->toArray($for_json_encode);
				}
				$c0[] = $val0;
			}
			$ret["RemoteStorage"] = $c0;
		}
		if ( $this->SoftwareBuildRole === null ) {
			$ret["SoftwareBuildRole"] = $for_json_encode ? (object)[] : [];
		} else {
			$ret["SoftwareBuildRole"] = $this->SoftwareBuildRole->toArray($for_json_encode);
		}
		{
			$c0 = $for_json_encode ? (object)[] : [];
			foreach($this->WebhookOptions as $k0 => $v0) {
				$ko_0 = $k0;
				if ( $v0 === null ) {
					$vo_0 = $for_json_encode ? (object)[] : [];
				} else {
					$vo_0 = $v0->toArray($for_json_encode);
				}
				if ($for_json_encode) {
				$c0->{ $ko_0 } = $vo_0;
				} else {
					$c0[ $ko_0 ] = $vo_0;
				}
			}
			$ret["WebhookOptions"] = $c0;
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
		if ($this->Branding !== null) {
			$this->Branding->RemoveUnknownProperties();
		}
		if ($this->ConstellationRole !== null) {
			$this->ConstellationRole->RemoveUnknownProperties();
		}
		if ($this->Email !== null) {
			$this->Email->RemoveUnknownProperties();
		}
		if ($this->SoftwareBuildRole !== null) {
			$this->SoftwareBuildRole->RemoveUnknownProperties();
		}
	}

}

