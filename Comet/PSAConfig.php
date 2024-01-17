<?php

/**
 * Copyright (c) 2018-2024 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 *
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

class PSAConfig {

	/**
	 * For PSA_TYPE_GRADIENT. Defaults to enabled
	 *
	 * @var boolean
	 */
	public $AlertsDisabled = false;

	/**
	 * Custom headers to send with each PSA request
	 *
	 * @var array<string, string>
	 */
	public $CustomHeaders = [];

	/**
	 * Specified API key for the target PSA
	 *
	 * @var string
	 */
	public $PartnerKey = "";

	/**
	 * One of the PSA_TYPE_ constants
	 *
	 * @var int
	 */
	public $Type = 0;

	/**
	 * The URL or subdomain for outbound PSA requests
	 *
	 * @var string
	 */
	public $URL = "";

	/**
	 * @var \Comet\PSAGroupedBy
	 */
	public $GroupedBy = null;

	/**
	 * Preserve unknown properties when dealing with future server versions.
	 *
	 * @see PSAConfig::RemoveUnknownProperties() Remove all unknown properties
	 * @var array
	 */
	private $__unknown_properties = [];

	/**
	 * Replace the content of this PSAConfig object from a PHP \stdClass.
	 * The data could be supplied from an API call after json_decode(...); or generated manually.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return void
	 */
	protected function inflateFrom(\stdClass $sc)
	{
		if (property_exists($sc, 'AlertsDisabled')) {
			$this->AlertsDisabled = (bool)($sc->AlertsDisabled);
		}
		if (property_exists($sc, 'CustomHeaders') && !is_null($sc->CustomHeaders)) {
			$val_2 = [];
			if ($sc->CustomHeaders !== null) {
				foreach($sc->CustomHeaders as $k_2 => $v_2) {
					$phpk_2 = (string)($k_2);
					$phpv_2 = (string)($v_2);
					$val_2[$phpk_2] = $phpv_2;
				}
			}
			$this->CustomHeaders = $val_2;
		}
		if (property_exists($sc, 'PartnerKey') && !is_null($sc->PartnerKey)) {
			$this->PartnerKey = (string)($sc->PartnerKey);
		}
		if (property_exists($sc, 'Type')) {
			$this->Type = (int)($sc->Type);
		}
		if (property_exists($sc, 'URL')) {
			$this->URL = (string)($sc->URL);
		}
		if (property_exists($sc, 'GroupedBy')) {
			if (is_array($sc->GroupedBy) && count($sc->GroupedBy) === 0) {
			// Work around edge case in json_decode--json_encode stdClass conversion
				$this->GroupedBy = \Comet\PSAGroupedBy::createFromStdclass(new \stdClass());
			} else {
				$this->GroupedBy = \Comet\PSAGroupedBy::createFromStdclass($sc->GroupedBy);
			}
		}
		foreach(get_object_vars($sc) as $k => $v) {
			switch($k) {
			case 'AlertsDisabled':
			case 'CustomHeaders':
			case 'PartnerKey':
			case 'Type':
			case 'URL':
			case 'GroupedBy':
				break;
			default:
				$this->__unknown_properties[$k] = $v;
			}
		}
	}

	/**
	 * Coerce a stdClass into a new strongly-typed PSAConfig object.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return PSAConfig
	 */
	public static function createFromStdclass(\stdClass $sc): \Comet\PSAConfig
	{
		$retn = new PSAConfig();
		$retn->inflateFrom($sc);
		return $retn;
	}

	/**
	 * Coerce a plain PHP array into a new strongly-typed PSAConfig object.
	 * Because the Comet Server requires strict distinction between empty objects ({}) and arrays ([]),
	 * the result of this method may not be safe to re-submit to the Comet Server.
	 *
	 * @param array $arr Object data as PHP array
	 * @return PSAConfig
	 */
	public static function createFromArray(array $arr): \Comet\PSAConfig
	{
		$stdClass = json_decode(json_encode($arr, JSON_UNESCAPED_SLASHES));
		if (is_array($stdClass) && count($stdClass) === 0) {
			$stdClass = new \stdClass();
		}
		return self::createFromStdclass($stdClass);
	}

	/**
	 * Coerce a JSON string into a new strongly-typed PSAConfig object.
	 *
	 * @param string $JsonString Object data as JSON string
	 * @return PSAConfig
	 */
	public static function createFromJSON(string $JsonString): \Comet\PSAConfig
	{
		$decodedJsonObject = json_decode($JsonString); // as stdClass
		if (\json_last_error() != \JSON_ERROR_NONE) {
			throw new \Exception("JSON decode failed: " . \json_last_error_msg(), \json_last_error());
		}
		$retn = new PSAConfig();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}

	/**
	 * Convert this PSAConfig object into a plain PHP array.
	 *
	 * Unknown properties may still be represented as \stdClass objects.
	 *
	 * @param bool $for_json_encode Represent empty key-value maps as \stdClass instead of plain PHP arrays
	 * @return array
	 */
	public function toArray(bool $for_json_encode = false): array
	{
		$ret = [];
		$ret["AlertsDisabled"] = $this->AlertsDisabled;
		{
			$c0 = [];
			foreach($this->CustomHeaders as $k0 => $v0) {
				$ko_0 = $k0;
				$vo_0 = $v0;
				$c0[ $ko_0 ] = $vo_0;
			}
			if ($for_json_encode && count($c0) == 0) {
				$ret["CustomHeaders"] = (object)[];
			} else {
				$ret["CustomHeaders"] = $c0;
			}
		}
		$ret["PartnerKey"] = $this->PartnerKey;
		$ret["Type"] = $this->Type;
		$ret["URL"] = $this->URL;
		if ( $this->GroupedBy === null ) {
			$ret["GroupedBy"] = $for_json_encode ? (object)[] : [];
		} else {
			$ret["GroupedBy"] = $this->GroupedBy->toArray($for_json_encode);
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
		if ($this->GroupedBy !== null) {
			$this->GroupedBy->RemoveUnknownProperties();
		}
	}

}

