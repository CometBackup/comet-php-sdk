<?php

/**
 * Copyright (c) 2018-2022 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 *
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

class Office365MixedVirtualAccount {

	/**
	 * @var string
	 */
	public $ID = "";

	/**
	 * @var int
	 */
	public $Type = 0;

	/**
	 * @var string
	 */
	public $DisplayName = "";

	/**
	 * @var string
	 */
	public $Mail = "";

	/**
	 * @var string
	 */
	public $JobTitle = "";

	/**
	 * @var string
	 */
	public $SiteID = "";

	/**
	 * @var string
	 */
	public $WebID = "";

	/**
	 * @var string
	 */
	public $WebURL = "";

	/**
	 * @var int
	 */
	public $EnabledServiceOption = 0;

	/**
	 * @var string[]
	 */
	public $Members = [];

	/**
	 * @var int
	 */
	public $ServiceOptions = 0;

	/**
	 * @var int
	 */
	public $MemberServiceOptions = 0;

	/**
	 * @var boolean
	 */
	public $HasLicense = false;

	/**
	 * Preserve unknown properties when dealing with future server versions.
	 *
	 * @see Office365MixedVirtualAccount::RemoveUnknownProperties() Remove all unknown properties
	 * @var array
	 */
	private $__unknown_properties = [];

	/**
	 * Replace the content of this Office365MixedVirtualAccount object from a PHP \stdClass.
	 * The data could be supplied from an API call after json_decode(...); or generated manually.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return void
	 */
	protected function inflateFrom(\stdClass $sc)
	{
		if (property_exists($sc, 'id')) {
			$this->ID = (string)($sc->id);
		}
		if (property_exists($sc, 'Type') && !is_null($sc->Type)) {
			$this->Type = (int)($sc->Type);
		}
		if (property_exists($sc, 'DisplayName') && !is_null($sc->DisplayName)) {
			$this->DisplayName = (string)($sc->DisplayName);
		}
		if (property_exists($sc, 'Mail') && !is_null($sc->Mail)) {
			$this->Mail = (string)($sc->Mail);
		}
		if (property_exists($sc, 'JobTitle') && !is_null($sc->JobTitle)) {
			$this->JobTitle = (string)($sc->JobTitle);
		}
		if (property_exists($sc, 'SiteID') && !is_null($sc->SiteID)) {
			$this->SiteID = (string)($sc->SiteID);
		}
		if (property_exists($sc, 'WebID') && !is_null($sc->WebID)) {
			$this->WebID = (string)($sc->WebID);
		}
		if (property_exists($sc, 'WebURL') && !is_null($sc->WebURL)) {
			$this->WebURL = (string)($sc->WebURL);
		}
		if (property_exists($sc, 'EnabledServiceOption') && !is_null($sc->EnabledServiceOption)) {
			$this->EnabledServiceOption = (int)($sc->EnabledServiceOption);
		}
		if (property_exists($sc, 'Members') && !is_null($sc->Members)) {
			$val_2 = [];
			if ($sc->Members !== null) {
				for($i_2 = 0; $i_2 < count($sc->Members); ++$i_2) {
					$val_2[] = (string)($sc->Members[$i_2]);
				}
			}
			$this->Members = $val_2;
		}
		if (property_exists($sc, 'ServiceOptions') && !is_null($sc->ServiceOptions)) {
			$this->ServiceOptions = (int)($sc->ServiceOptions);
		}
		if (property_exists($sc, 'MemberServiceOptions') && !is_null($sc->MemberServiceOptions)) {
			$this->MemberServiceOptions = (int)($sc->MemberServiceOptions);
		}
		if (property_exists($sc, 'hasLicense') && !is_null($sc->hasLicense)) {
			$this->HasLicense = (bool)($sc->hasLicense);
		}
		foreach(get_object_vars($sc) as $k => $v) {
			switch($k) {
			case 'id':
			case 'Type':
			case 'DisplayName':
			case 'Mail':
			case 'JobTitle':
			case 'SiteID':
			case 'WebID':
			case 'WebURL':
			case 'EnabledServiceOption':
			case 'Members':
			case 'ServiceOptions':
			case 'MemberServiceOptions':
			case 'hasLicense':
				break;
			default:
				$this->__unknown_properties[$k] = $v;
			}
		}
	}

	/**
	 * Coerce a stdClass into a new strongly-typed Office365MixedVirtualAccount object.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return Office365MixedVirtualAccount
	 */
	public static function createFromStdclass(\stdClass $sc): \Comet\Office365MixedVirtualAccount
	{
		$retn = new Office365MixedVirtualAccount();
		$retn->inflateFrom($sc);
		return $retn;
	}

	/**
	 * Coerce a plain PHP array into a new strongly-typed Office365MixedVirtualAccount object.
	 * Because the Comet Server requires strict distinction between empty objects ({}) and arrays ([]),
	 * the result of this method may not be safe to re-submit to the Comet Server.
	 *
	 * @param array $arr Object data as PHP array
	 * @return Office365MixedVirtualAccount
	 */
	public static function createFromArray(array $arr): \Comet\Office365MixedVirtualAccount
	{
		$stdClass = json_decode(json_encode($arr, JSON_UNESCAPED_SLASHES));
		if (is_array($stdClass) && count($stdClass) === 0) {
			$stdClass = new \stdClass();
		}
		return self::createFromStdclass($stdClass);
	}

	/**
	 * Coerce a JSON string into a new strongly-typed Office365MixedVirtualAccount object.
	 *
	 * @param string $JsonString Object data as JSON string
	 * @return Office365MixedVirtualAccount
	 */
	public static function createFromJSON(string $JsonString): \Comet\Office365MixedVirtualAccount
	{
		$decodedJsonObject = json_decode($JsonString); // as stdClass
		if (\json_last_error() != \JSON_ERROR_NONE) {
			throw new \Exception("JSON decode failed: " . \json_last_error_msg());
		}
		$retn = new Office365MixedVirtualAccount();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}

	/**
	 * Convert this Office365MixedVirtualAccount object into a plain PHP array.
	 *
	 * Unknown properties may still be represented as \stdClass objects.
	 *
	 * @param bool $for_json_encode Represent empty key-value maps as \stdClass instead of plain PHP arrays
	 * @return array
	 */
	public function toArray(bool $for_json_encode = false): array
	{
		$ret = [];
		$ret["id"] = $this->ID;
		$ret["Type"] = $this->Type;
		$ret["DisplayName"] = $this->DisplayName;
		$ret["Mail"] = $this->Mail;
		$ret["JobTitle"] = $this->JobTitle;
		$ret["SiteID"] = $this->SiteID;
		$ret["WebID"] = $this->WebID;
		$ret["WebURL"] = $this->WebURL;
		$ret["EnabledServiceOption"] = $this->EnabledServiceOption;
		{
			$c0 = [];
			for($i0 = 0; $i0 < count($this->Members); ++$i0) {
				$val0 = $this->Members[$i0];
				$c0[] = $val0;
			}
			$ret["Members"] = $c0;
		}
		$ret["ServiceOptions"] = $this->ServiceOptions;
		$ret["MemberServiceOptions"] = $this->MemberServiceOptions;
		$ret["hasLicense"] = $this->HasLicense;

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

