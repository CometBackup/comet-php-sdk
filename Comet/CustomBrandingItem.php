<?php

/**
 * Copyright (c) 2018-2026 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 *
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

class CustomBrandingItem {

	/**
	 * Display label for this item in the Comet Server web interface
	 *
	 * @var string
	 */
	public $Description = "";

	/**
	 * One of the CUSTOMBRANDING_CONTENT_ constants
	 *
	 * @var string
	 */
	public $ContentType = "";

	/**
	 * One of the CUSTOMBRANDING_SOURCE_ constants
	 *
	 * @var string
	 */
	public $SourceType = "";

	/**
	 * One of the CUSTOMBRANDING_PLACEMENT_ constants. An empty string defaults to head placement
	 *
	 * @var string
	 */
	public $Placement = "";

	/**
	 * Inline JavaScript or CSS source text. Only used when SourceType is inline. For inline JavaScript,
	 * the Content-Security-Policy is automatically extended with this script's SHA-256 hash
	 *
	 * @var string
	 */
	public $Content = "";

	/**
	 * Absolute http(s) URL of an external script or stylesheet. Only used when SourceType is url. The
	 * URL's origin is automatically added to the relevant Content-Security-Policy directive
	 *
	 * @var string
	 */
	public $URL = "";

	/**
	 * Extra origins that the injected code needs to contact (XHR / beacon / tracking pixel), added to
	 * the web interface Content-Security-Policy
	 *
	 * @var \Comet\CustomBrandingOrigin[]
	 */
	public $AdditionalNetworkOrigins = [];

	/**
	 * Preserve unknown properties when dealing with future server versions.
	 *
	 * @see CustomBrandingItem::RemoveUnknownProperties() Remove all unknown properties
	 * @var array
	 */
	private $__unknown_properties = [];

	/**
	 * Replace the content of this CustomBrandingItem object from a PHP \stdClass.
	 * The data could be supplied from an API call after json_decode(...); or generated manually.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return void
	 */
	protected function inflateFrom(\stdClass $sc)
	{
		if (property_exists($sc, 'Description')) {
			$this->Description = (string)($sc->Description);
		}
		if (property_exists($sc, 'ContentType')) {
			$this->ContentType = (string)($sc->ContentType);
		}
		if (property_exists($sc, 'SourceType')) {
			$this->SourceType = (string)($sc->SourceType);
		}
		if (property_exists($sc, 'Placement')) {
			$this->Placement = (string)($sc->Placement);
		}
		if (property_exists($sc, 'Content')) {
			$this->Content = (string)($sc->Content);
		}
		if (property_exists($sc, 'URL')) {
			$this->URL = (string)($sc->URL);
		}
		if (property_exists($sc, 'AdditionalNetworkOrigins')) {
			$val_2 = [];
			if ($sc->AdditionalNetworkOrigins !== null) {
				for($i_2 = 0; $i_2 < count($sc->AdditionalNetworkOrigins); ++$i_2) {
					if (is_array($sc->AdditionalNetworkOrigins[$i_2]) && count($sc->AdditionalNetworkOrigins[$i_2]) === 0) {
					// Work around edge case in json_decode--json_encode stdClass conversion
						$val_2[] = \Comet\CustomBrandingOrigin::createFromStdclass(new \stdClass());
					} else {
						$val_2[] = \Comet\CustomBrandingOrigin::createFromStdclass($sc->AdditionalNetworkOrigins[$i_2]);
					}
				}
			}
			$this->AdditionalNetworkOrigins = $val_2;
		}
		foreach(get_object_vars($sc) as $k => $v) {
			switch($k) {
			case 'Description':
			case 'ContentType':
			case 'SourceType':
			case 'Placement':
			case 'Content':
			case 'URL':
			case 'AdditionalNetworkOrigins':
				break;
			default:
				$this->__unknown_properties[$k] = $v;
			}
		}
	}

	/**
	 * Coerce a stdClass into a new strongly-typed CustomBrandingItem object.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return CustomBrandingItem
	 */
	public static function createFromStdclass(\stdClass $sc): \Comet\CustomBrandingItem
	{
		$retn = new CustomBrandingItem();
		$retn->inflateFrom($sc);
		return $retn;
	}

	/**
	 * Coerce a plain PHP array into a new strongly-typed CustomBrandingItem object.
	 * Because the Comet Server requires strict distinction between empty objects ({}) and arrays ([]),
	 * the result of this method may not be safe to re-submit to the Comet Server.
	 *
	 * @param array $arr Object data as PHP array
	 * @return CustomBrandingItem
	 */
	public static function createFromArray(array $arr): \Comet\CustomBrandingItem
	{
		$stdClass = json_decode(json_encode($arr, JSON_UNESCAPED_SLASHES));
		if (is_array($stdClass) && count($stdClass) === 0) {
			$stdClass = new \stdClass();
		}
		return self::createFromStdclass($stdClass);
	}

	/**
	 * Coerce a JSON string into a new strongly-typed CustomBrandingItem object.
	 *
	 * @param string $JsonString Object data as JSON string
	 * @return CustomBrandingItem
	 */
	public static function createFromJSON(string $JsonString): \Comet\CustomBrandingItem
	{
		$decodedJsonObject = json_decode($JsonString); // as stdClass
		if (\json_last_error() != \JSON_ERROR_NONE) {
			throw new \Exception("JSON decode failed: " . \json_last_error_msg(), \json_last_error());
		}
		$retn = new CustomBrandingItem();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}

	/**
	 * Convert this CustomBrandingItem object into a plain PHP array.
	 *
	 * Unknown properties may still be represented as \stdClass objects.
	 *
	 * @param bool $for_json_encode Represent key-value maps as \stdClass instead of plain PHP arrays
	 * @return array
	 */
	public function toArray(bool $for_json_encode = false): array
	{
		$ret = [];
		$ret["Description"] = $this->Description;
		$ret["ContentType"] = $this->ContentType;
		$ret["SourceType"] = $this->SourceType;
		$ret["Placement"] = $this->Placement;
		$ret["Content"] = $this->Content;
		$ret["URL"] = $this->URL;
		{
			$c0 = [];
			for($i0 = 0; $i0 < count($this->AdditionalNetworkOrigins); ++$i0) {
				if ( $this->AdditionalNetworkOrigins[$i0] === null ) {
					$val0 = $for_json_encode ? (object)[] : [];
				} else {
					$val0 = $this->AdditionalNetworkOrigins[$i0]->toArray($for_json_encode);
				}
				$c0[] = $val0;
			}
			$ret["AdditionalNetworkOrigins"] = $c0;
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

