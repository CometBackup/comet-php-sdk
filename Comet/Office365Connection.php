<?php

/**
 * Copyright (c) 2018-2021 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 *
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

class Office365Connection {

	/**
	 * @var string
	 */
	public $FeatureFlag = "";

	/**
	 * @var \Comet\Office365Credential
	 */
	public $Credential = null;

	/**
	 * @var \Comet\Office365CustomSetting
	 */
	public $CustomSetting = null;

	/**
	 * @var string[]
	 */
	public $MailboxUniqueMembers = [];

	/**
	 * @var string[]
	 */
	public $SiteUniqueMembers = [];

	/**
	 * @var \Comet\Office365CustomSettingV2
	 */
	public $CustomSettingV2 = null;

	/**
	 * Preserve unknown properties when dealing with future server versions.
	 *
	 * @see Office365Connection::RemoveUnknownProperties() Remove all unknown properties
	 * @var array
	 */
	private $__unknown_properties = [];

	/**
	 * Replace the content of this Office365Connection object from a PHP \stdClass.
	 * The data could be supplied from an API call after json_decode(...); or generated manually.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return void
	 */
	protected function inflateFrom(\stdClass $sc)
	{
		if (property_exists($sc, 'FeatureFlag')) {
			$this->FeatureFlag = (string)($sc->FeatureFlag);
		}
		if (property_exists($sc, 'Credential')) {
			if (is_array($sc->Credential) && count($sc->Credential) === 0) {
			// Work around edge case in json_decode--json_encode stdClass conversion
				$this->Credential = \Comet\Office365Credential::createFromStdclass(new \stdClass());
			} else {
				$this->Credential = \Comet\Office365Credential::createFromStdclass($sc->Credential);
			}
		}
		if (property_exists($sc, 'CustomSetting')) {
			if (is_array($sc->CustomSetting) && count($sc->CustomSetting) === 0) {
			// Work around edge case in json_decode--json_encode stdClass conversion
				$this->CustomSetting = \Comet\Office365CustomSetting::createFromStdclass(new \stdClass());
			} else {
				$this->CustomSetting = \Comet\Office365CustomSetting::createFromStdclass($sc->CustomSetting);
			}
		}
		if (property_exists($sc, 'MailboxUniqueMembers')) {
			$val_2 = [];
			if ($sc->MailboxUniqueMembers !== null) {
				for($i_2 = 0; $i_2 < count($sc->MailboxUniqueMembers); ++$i_2) {
					$val_2[] = (string)($sc->MailboxUniqueMembers[$i_2]);
				}
			}
			$this->MailboxUniqueMembers = $val_2;
		}
		if (property_exists($sc, 'SiteUniqueMembers')) {
			$val_2 = [];
			if ($sc->SiteUniqueMembers !== null) {
				for($i_2 = 0; $i_2 < count($sc->SiteUniqueMembers); ++$i_2) {
					$val_2[] = (string)($sc->SiteUniqueMembers[$i_2]);
				}
			}
			$this->SiteUniqueMembers = $val_2;
		}
		if (property_exists($sc, 'CustomSettingV2')) {
			if (is_array($sc->CustomSettingV2) && count($sc->CustomSettingV2) === 0) {
			// Work around edge case in json_decode--json_encode stdClass conversion
				$this->CustomSettingV2 = \Comet\Office365CustomSettingV2::createFromStdclass(new \stdClass());
			} else {
				$this->CustomSettingV2 = \Comet\Office365CustomSettingV2::createFromStdclass($sc->CustomSettingV2);
			}
		}
		foreach(get_object_vars($sc) as $k => $v) {
			switch($k) {
			case 'FeatureFlag':
			case 'Credential':
			case 'CustomSetting':
			case 'MailboxUniqueMembers':
			case 'SiteUniqueMembers':
			case 'CustomSettingV2':
				break;
			default:
				$this->__unknown_properties[$k] = $v;
			}
		}
	}

	/**
	 * Coerce a stdClass into a new strongly-typed Office365Connection object.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return Office365Connection
	 */
	public static function createFromStdclass(\stdClass $sc)
	{
		$retn = new Office365Connection();
		$retn->inflateFrom($sc);
		return $retn;
	}

	/**
	 * Coerce a plain PHP array into a new strongly-typed Office365Connection object.
	 * Because the Comet Server requires strict distinction between empty objects ({}) and arrays ([]),
	 * the result of this method may not be safe to re-submit to the Comet Server.
	 *
	 * @param array $arr Object data as PHP array
	 * @return Office365Connection
	 */
	public static function createFromArray(array $arr)
	{
		$stdClass = json_decode(json_encode($arr));
		if (is_array($stdClass) && count($stdClass) === 0) {
			$stdClass = new \stdClass();
		}
		return self::createFromStdclass($stdClass);
	}

	/**
	 * Coerce a plain PHP array into a new strongly-typed Office365Connection object.
	 * Because the Comet Server requires strict distinction between empty objects ({}) and arrays ([]),
	 * the result of this method may not be safe to re-submit to the Comet Server.
	 *
	 * @deprecated 3.0.0 Unsafe for round-trip server traversal. You should either
	 *             (A) acknowledge this and continue by switching to createFromArray, or
	 *             (b) switch to the roundtrip-safe createFromStdclass alternative.
	 * @param array $arr Object data as PHP array
	 * @return Office365Connection
	 */
	public static function createFrom(array $arr)
	{
		return self::createFromArray($arr);
	}

	/**
	 * Coerce a JSON string into a new strongly-typed Office365Connection object.
	 *
	 * @param string $JsonString Object data as JSON string
	 * @return Office365Connection
	 */
	public static function createFromJSON($JsonString)
	{
		$decodedJsonObject = json_decode($JsonString); // as stdClass
		if (\json_last_error() != \JSON_ERROR_NONE) {
			throw new \Exception("JSON decode failed: " . \json_last_error_msg());
		}
		$retn = new Office365Connection();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}

	/**
	 * Convert this Office365Connection object into a plain PHP array.
	 *
	 * Unknown properties may still be represented as \stdClass objects.
	 *
	 * @param bool $for_json_encode Represent empty key-value maps as \stdClass instead of plain PHP arrays
	 * @return array
	 */
	public function toArray($for_json_encode = false)
	{
		$ret = [];
		$ret["FeatureFlag"] = $this->FeatureFlag;
		if ( $this->Credential === null ) {
			$ret["Credential"] = $for_json_encode ? (object)[] : [];
		} else {
			$ret["Credential"] = $this->Credential->toArray($for_json_encode);
		}
		if ( $this->CustomSetting === null ) {
			$ret["CustomSetting"] = $for_json_encode ? (object)[] : [];
		} else {
			$ret["CustomSetting"] = $this->CustomSetting->toArray($for_json_encode);
		}
		{
			$c0 = [];
			for($i0 = 0; $i0 < count($this->MailboxUniqueMembers); ++$i0) {
				$val0 = $this->MailboxUniqueMembers[$i0];
				$c0[] = $val0;
			}
			$ret["MailboxUniqueMembers"] = $c0;
		}
		{
			$c0 = [];
			for($i0 = 0; $i0 < count($this->SiteUniqueMembers); ++$i0) {
				$val0 = $this->SiteUniqueMembers[$i0];
				$c0[] = $val0;
			}
			$ret["SiteUniqueMembers"] = $c0;
		}
		if ( $this->CustomSettingV2 === null ) {
			$ret["CustomSettingV2"] = $for_json_encode ? (object)[] : [];
		} else {
			$ret["CustomSettingV2"] = $this->CustomSettingV2->toArray($for_json_encode);
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
		$arr = $this->toArray(true);
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
		$arr = $this->toArray(false);
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
		if ($this->Credential !== null) {
			$this->Credential->RemoveUnknownProperties();
		}
		if ($this->CustomSetting !== null) {
			$this->CustomSetting->RemoveUnknownProperties();
		}
		if ($this->CustomSettingV2 !== null) {
			$this->CustomSettingV2->RemoveUnknownProperties();
		}
	}

}

