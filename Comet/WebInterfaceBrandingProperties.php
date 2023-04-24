<?php

/**
 * Copyright (c) 2018-2023 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 *
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

class WebInterfaceBrandingProperties {

	/**
	 * @var int
	 */
	public $BrandingStyleType = 0;

	/**
	 * @var string
	 */
	public $BrandName = "";

	/**
	 * @var string
	 */
	public $LogoImage = "";

	/**
	 * @var string
	 */
	public $TopColor = "";

	/**
	 * @var string
	 */
	public $AccentColor = "";

	/**
	 * @var string
	 */
	public $Favicon = "";

	/**
	 * @var boolean
	 */
	public $HideNewsArea = false;

	/**
	 * Preserve unknown properties when dealing with future server versions.
	 *
	 * @see WebInterfaceBrandingProperties::RemoveUnknownProperties() Remove all unknown properties
	 * @var array
	 */
	private $__unknown_properties = [];

	/**
	 * Replace the content of this WebInterfaceBrandingProperties object from a PHP \stdClass.
	 * The data could be supplied from an API call after json_decode(...); or generated manually.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return void
	 */
	protected function inflateFrom(\stdClass $sc)
	{
		if (property_exists($sc, 'BrandingStyleType')) {
			$this->BrandingStyleType = (int)($sc->BrandingStyleType);
		}
		if (property_exists($sc, 'BrandName')) {
			$this->BrandName = (string)($sc->BrandName);
		}
		if (property_exists($sc, 'LogoImage')) {
			$this->LogoImage = (string)($sc->LogoImage);
		}
		if (property_exists($sc, 'TopColor')) {
			$this->TopColor = (string)($sc->TopColor);
		}
		if (property_exists($sc, 'AccentColor')) {
			$this->AccentColor = (string)($sc->AccentColor);
		}
		if (property_exists($sc, 'Favicon')) {
			$this->Favicon = (string)($sc->Favicon);
		}
		if (property_exists($sc, 'HideNewsArea')) {
			$this->HideNewsArea = (bool)($sc->HideNewsArea);
		}
		foreach(get_object_vars($sc) as $k => $v) {
			switch($k) {
			case 'BrandingStyleType':
			case 'BrandName':
			case 'LogoImage':
			case 'TopColor':
			case 'AccentColor':
			case 'Favicon':
			case 'HideNewsArea':
				break;
			default:
				$this->__unknown_properties[$k] = $v;
			}
		}
	}

	/**
	 * Coerce a stdClass into a new strongly-typed WebInterfaceBrandingProperties object.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return WebInterfaceBrandingProperties
	 */
	public static function createFromStdclass(\stdClass $sc): \Comet\WebInterfaceBrandingProperties
	{
		$retn = new WebInterfaceBrandingProperties();
		$retn->inflateFrom($sc);
		return $retn;
	}

	/**
	 * Coerce a plain PHP array into a new strongly-typed WebInterfaceBrandingProperties object.
	 * Because the Comet Server requires strict distinction between empty objects ({}) and arrays ([]),
	 * the result of this method may not be safe to re-submit to the Comet Server.
	 *
	 * @param array $arr Object data as PHP array
	 * @return WebInterfaceBrandingProperties
	 */
	public static function createFromArray(array $arr): \Comet\WebInterfaceBrandingProperties
	{
		$stdClass = json_decode(json_encode($arr, JSON_UNESCAPED_SLASHES));
		if (is_array($stdClass) && count($stdClass) === 0) {
			$stdClass = new \stdClass();
		}
		return self::createFromStdclass($stdClass);
	}

	/**
	 * Coerce a JSON string into a new strongly-typed WebInterfaceBrandingProperties object.
	 *
	 * @param string $JsonString Object data as JSON string
	 * @return WebInterfaceBrandingProperties
	 */
	public static function createFromJSON(string $JsonString): \Comet\WebInterfaceBrandingProperties
	{
		$decodedJsonObject = json_decode($JsonString); // as stdClass
		if (\json_last_error() != \JSON_ERROR_NONE) {
			throw new \Exception("JSON decode failed: " . \json_last_error_msg(), \json_last_error());
		}
		$retn = new WebInterfaceBrandingProperties();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}

	/**
	 * Convert this WebInterfaceBrandingProperties object into a plain PHP array.
	 *
	 * Unknown properties may still be represented as \stdClass objects.
	 *
	 * @param bool $for_json_encode Represent empty key-value maps as \stdClass instead of plain PHP arrays
	 * @return array
	 */
	public function toArray(bool $for_json_encode = false): array
	{
		$ret = [];
		$ret["BrandingStyleType"] = $this->BrandingStyleType;
		$ret["BrandName"] = $this->BrandName;
		$ret["LogoImage"] = $this->LogoImage;
		$ret["TopColor"] = $this->TopColor;
		$ret["AccentColor"] = $this->AccentColor;
		$ret["Favicon"] = $this->Favicon;
		$ret["HideNewsArea"] = $this->HideNewsArea;

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

