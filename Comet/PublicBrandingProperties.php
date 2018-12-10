<?php

/**
 * Copyright (c) 2018 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 * 
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

class PublicBrandingProperties {
	
	/**
	 * @var string
	 */
	public $ProductName = "";
	
	/**
	 * @var string
	 */
	public $CompanyName = "";
	
	/**
	 * @var string
	 */
	public $HelpURL = "";
	
	/**
	 * @var boolean
	 */
	public $HelpIsPopup = false;
	
	/**
	 * @var string
	 */
	public $DefaultLoginServerURL = "";
	
	/**
	 * @var string
	 */
	public $TileBackgroundColor = "";
	
	/**
	 * @var string
	 */
	public $AccountRegisterURL = "";
	
	/**
	 * @var boolean
	 */
	public $HideBackgroundLogo = false;
	
	/**
	 * Preserve unknown properties when dealing with future server versions.
	 *
	 * @see PublicBrandingProperties::RemoveUnknownProperties() Remove all unknown properties
	 * @var array
	 */
	private $__unknown_properties = [];
	
	/**
	 * Replace the content of this PublicBrandingProperties object from a PHP \stdClass.
	 * The data could be supplied from an API call after json_decode(...); or generated manually.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return void
	 */
	protected function inflateFrom(\stdClass $sc)
	{
		if (property_exists($sc, 'ProductName')) {
			$this->ProductName = (string)($sc->ProductName);
		}
		if (property_exists($sc, 'CompanyName')) {
			$this->CompanyName = (string)($sc->CompanyName);
		}
		if (property_exists($sc, 'HelpURL')) {
			$this->HelpURL = (string)($sc->HelpURL);
		}
		if (property_exists($sc, 'HelpIsPopup')) {
			$this->HelpIsPopup = (bool)($sc->HelpIsPopup);
		}
		if (property_exists($sc, 'DefaultLoginServerURL')) {
			$this->DefaultLoginServerURL = (string)($sc->DefaultLoginServerURL);
		}
		if (property_exists($sc, 'TileBackgroundColor')) {
			$this->TileBackgroundColor = (string)($sc->TileBackgroundColor);
		}
		if (property_exists($sc, 'AccountRegisterURL')) {
			$this->AccountRegisterURL = (string)($sc->AccountRegisterURL);
		}
		if (property_exists($sc, 'HideBackgroundLogo')) {
			$this->HideBackgroundLogo = (bool)($sc->HideBackgroundLogo);
		}
		foreach(get_object_vars($sc) as $k => $v) {
			switch($k) {
			case 'ProductName':
			case 'CompanyName':
			case 'HelpURL':
			case 'HelpIsPopup':
			case 'DefaultLoginServerURL':
			case 'TileBackgroundColor':
			case 'AccountRegisterURL':
			case 'HideBackgroundLogo':
				break;
			default:
				$this->__unknown_properties[$k] = $v;
			}
		}
	}
	
	/**
	 * Coerce a stdClass into a new strongly-typed PublicBrandingProperties object.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return PublicBrandingProperties
	 */
	public static function createFromStdclass(\stdClass $sc)
	{
		$retn = new PublicBrandingProperties();
		$retn->inflateFrom($sc);
		return $retn;
	}
	
	/**
	 * Coerce a plain PHP array into a new strongly-typed PublicBrandingProperties object.
	 * Because the Comet Server requires strict distinction between empty objects ({}) and arrays ([]),
	 * the result of this method may not be safe to re-submit to the Comet Server.
	 *
	 * @param array $arr Object data as PHP array
	 * @return PublicBrandingProperties
	 */
	public static function createFromArray(array $arr)
	{
		$stdClass = json_decode(json_encode($arr));
		return self::createFromStdclass($stdClass);
	}
	
	/**
	 * Coerce a plain PHP array into a new strongly-typed PublicBrandingProperties object.
	 * Because the Comet Server requires strict distinction between empty objects ({}) and arrays ([]),
	 * the result of this method may not be safe to re-submit to the Comet Server.
	 *
	 * @deprecated 3.0.0 Unsafe for round-trip server traversal. You should either 
	 *             (A) acknowledge this and continue by switching to createFromArray, or
	 *             (b) switch to the roundtrip-safe createFromStdclass alternative.
	 * @param array $arr Object data as PHP array
	 * @return PublicBrandingProperties
	 */
	public static function createFrom(array $arr)
	{
		return self::createFromArray($arr);
	}
	
	/**
	 * Coerce a JSON string into a new strongly-typed PublicBrandingProperties object.
	 *
	 * @param string $JsonString Object data as JSON string
	 * @return PublicBrandingProperties
	 */
	public static function createFromJSON($JsonString)
	{
		$decodedJsonObject = json_decode($JsonString); // as stdClass
		if (\json_last_error() != \JSON_ERROR_NONE) {
			throw new \Exception("JSON decode failed: " . \json_last_error_msg());
		}
		$retn = new PublicBrandingProperties();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}
	
	/**
	 * Convert this PublicBrandingProperties object into a plain PHP array.
	 *
	 * Unknown properties may still be represented as \stdClass objects.
	 *
	 * @param bool $for_json_encode Represent empty key-value maps as \stdClass instead of plain PHP arrays
	 * @return array
	 */
	public function toArray($for_json_encode = false)
	{
		$ret = [];
		$ret["ProductName"] = $this->ProductName;
		$ret["CompanyName"] = $this->CompanyName;
		$ret["HelpURL"] = $this->HelpURL;
		$ret["HelpIsPopup"] = $this->HelpIsPopup;
		$ret["DefaultLoginServerURL"] = $this->DefaultLoginServerURL;
		$ret["TileBackgroundColor"] = $this->TileBackgroundColor;
		$ret["AccountRegisterURL"] = $this->AccountRegisterURL;
		$ret["HideBackgroundLogo"] = $this->HideBackgroundLogo;
		
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
	}
	
}

