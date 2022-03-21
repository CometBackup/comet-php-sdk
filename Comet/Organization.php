<?php

/**
 * Copyright (c) 2018-2022 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 *
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

class Organization {

	/**
	 * @var string
	 */
	public $Name = "";

	/**
	 * @var string[]
	 */
	public $Hosts = [];

	/**
	 * @var \Comet\SoftwareBuildRoleOptions
	 */
	public $SoftwareBuildRole = null;

	/**
	 * @var \Comet\BrandingOptions
	 */
	public $Branding = null;

	/**
	 * @var \Comet\RemoteStorageOption[]
	 */
	public $RemoteStorage = [];

	/**
	 * @var \Comet\WebhookOption[] An array with string keys.
	 */
	public $WebhookOptions = [];

	/**
	 * @var \Comet\AdminEmailOptions
	 */
	public $Email = null;

	/**
	 * @var boolean
	 */
	public $IsSuspended = false;

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
		if (property_exists($sc, 'Name')) {
			$this->Name = (string)($sc->Name);
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
		if (property_exists($sc, 'SoftwareBuildRole')) {
			if (is_array($sc->SoftwareBuildRole) && count($sc->SoftwareBuildRole) === 0) {
			// Work around edge case in json_decode--json_encode stdClass conversion
				$this->SoftwareBuildRole = \Comet\SoftwareBuildRoleOptions::createFromStdclass(new \stdClass());
			} else {
				$this->SoftwareBuildRole = \Comet\SoftwareBuildRoleOptions::createFromStdclass($sc->SoftwareBuildRole);
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
		if (property_exists($sc, 'Email')) {
			if (is_array($sc->Email) && count($sc->Email) === 0) {
			// Work around edge case in json_decode--json_encode stdClass conversion
				$this->Email = \Comet\AdminEmailOptions::createFromStdclass(new \stdClass());
			} else {
				$this->Email = \Comet\AdminEmailOptions::createFromStdclass($sc->Email);
			}
		}
		if (property_exists($sc, 'IsSuspended')) {
			$this->IsSuspended = (bool)($sc->IsSuspended);
		}
		foreach(get_object_vars($sc) as $k => $v) {
			switch($k) {
			case 'Name':
			case 'Hosts':
			case 'SoftwareBuildRole':
			case 'Branding':
			case 'RemoteStorage':
			case 'WebhookOptions':
			case 'Email':
			case 'IsSuspended':
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
	public static function createFromStdclass(\stdClass $sc)
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
	public static function createFromArray(array $arr)
	{
		$stdClass = json_decode(json_encode($arr, JSON_UNESCAPED_SLASHES));
		if (is_array($stdClass) && count($stdClass) === 0) {
			$stdClass = new \stdClass();
		}
		return self::createFromStdclass($stdClass);
	}

	/**
	 * Coerce a plain PHP array into a new strongly-typed Organization object.
	 * Because the Comet Server requires strict distinction between empty objects ({}) and arrays ([]),
	 * the result of this method may not be safe to re-submit to the Comet Server.
	 *
	 * @deprecated 3.0.0 Unsafe for round-trip server traversal. You should either
	 *             (A) acknowledge this and continue by switching to createFromArray, or
	 *             (b) switch to the roundtrip-safe createFromStdclass alternative.
	 * @param array $arr Object data as PHP array
	 * @return Organization
	 */
	public static function createFrom(array $arr)
	{
		return self::createFromArray($arr);
	}

	/**
	 * Coerce a JSON string into a new strongly-typed Organization object.
	 *
	 * @param string $JsonString Object data as JSON string
	 * @return Organization
	 */
	public static function createFromJSON($JsonString)
	{
		$decodedJsonObject = json_decode($JsonString); // as stdClass
		if (\json_last_error() != \JSON_ERROR_NONE) {
			throw new \Exception("JSON decode failed: " . \json_last_error_msg());
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
	 * @param bool $for_json_encode Represent empty key-value maps as \stdClass instead of plain PHP arrays
	 * @return array
	 */
	public function toArray($for_json_encode = false)
	{
		$ret = [];
		$ret["Name"] = $this->Name;
		{
			$c0 = [];
			for($i0 = 0; $i0 < count($this->Hosts); ++$i0) {
				$val0 = $this->Hosts[$i0];
				$c0[] = $val0;
			}
			$ret["Hosts"] = $c0;
		}
		if ( $this->SoftwareBuildRole === null ) {
			$ret["SoftwareBuildRole"] = $for_json_encode ? (object)[] : [];
		} else {
			$ret["SoftwareBuildRole"] = $this->SoftwareBuildRole->toArray($for_json_encode);
		}
		if ( $this->Branding === null ) {
			$ret["Branding"] = $for_json_encode ? (object)[] : [];
		} else {
			$ret["Branding"] = $this->Branding->toArray($for_json_encode);
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
		if ( $this->Email === null ) {
			$ret["Email"] = $for_json_encode ? (object)[] : [];
		} else {
			$ret["Email"] = $this->Email->toArray($for_json_encode);
		}
		$ret["IsSuspended"] = $this->IsSuspended;

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
	public function toStdClass()
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
		if ($this->SoftwareBuildRole !== null) {
			$this->SoftwareBuildRole->RemoveUnknownProperties();
		}
		if ($this->Branding !== null) {
			$this->Branding->RemoveUnknownProperties();
		}
		if ($this->Email !== null) {
			$this->Email->RemoveUnknownProperties();
		}
	}

}

