<?php

/**
 * Copyright (c) 2018-2025 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 *
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

class CustomRemoteBucketSettings {

	/**
	 * @var string
	 */
	public $URL = "";

	/**
	 * @var array<string, string>
	 * This field is available in Comet 23.12.5 and later.
	 */
	public $CustomHeaders = [];

	/**
	 * @var string
	 * This field is available in Comet 24.5.0 and later.
	 */
	public $CustomBody = "";

	/**
	 * @var string
	 */
	public $CustomBodyType = "";

	/**
	 * Preserve unknown properties when dealing with future server versions.
	 *
	 * @see CustomRemoteBucketSettings::RemoveUnknownProperties() Remove all unknown properties
	 * @var array
	 */
	private $__unknown_properties = [];

	/**
	 * Replace the content of this CustomRemoteBucketSettings object from a PHP \stdClass.
	 * The data could be supplied from an API call after json_decode(...); or generated manually.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return void
	 */
	protected function inflateFrom(\stdClass $sc)
	{
		if (property_exists($sc, 'URL')) {
			$this->URL = (string)($sc->URL);
		}
		if (property_exists($sc, 'CustomHeaders')) {
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
		if (property_exists($sc, 'CustomBody')) {
			$this->CustomBody = (string)($sc->CustomBody);
		}
		if (property_exists($sc, 'CustomBodyType')) {
			$this->CustomBodyType = (string)($sc->CustomBodyType);
		}
		foreach(get_object_vars($sc) as $k => $v) {
			switch($k) {
			case 'URL':
			case 'CustomHeaders':
			case 'CustomBody':
			case 'CustomBodyType':
				break;
			default:
				$this->__unknown_properties[$k] = $v;
			}
		}
	}

	/**
	 * Coerce a stdClass into a new strongly-typed CustomRemoteBucketSettings object.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return CustomRemoteBucketSettings
	 */
	public static function createFromStdclass(\stdClass $sc): \Comet\CustomRemoteBucketSettings
	{
		$retn = new CustomRemoteBucketSettings();
		$retn->inflateFrom($sc);
		return $retn;
	}

	/**
	 * Coerce a plain PHP array into a new strongly-typed CustomRemoteBucketSettings object.
	 * Because the Comet Server requires strict distinction between empty objects ({}) and arrays ([]),
	 * the result of this method may not be safe to re-submit to the Comet Server.
	 *
	 * @param array $arr Object data as PHP array
	 * @return CustomRemoteBucketSettings
	 */
	public static function createFromArray(array $arr): \Comet\CustomRemoteBucketSettings
	{
		$stdClass = json_decode(json_encode($arr, JSON_UNESCAPED_SLASHES));
		if (is_array($stdClass) && count($stdClass) === 0) {
			$stdClass = new \stdClass();
		}
		return self::createFromStdclass($stdClass);
	}

	/**
	 * Coerce a JSON string into a new strongly-typed CustomRemoteBucketSettings object.
	 *
	 * @param string $JsonString Object data as JSON string
	 * @return CustomRemoteBucketSettings
	 */
	public static function createFromJSON(string $JsonString): \Comet\CustomRemoteBucketSettings
	{
		$decodedJsonObject = json_decode($JsonString); // as stdClass
		if (\json_last_error() != \JSON_ERROR_NONE) {
			throw new \Exception("JSON decode failed: " . \json_last_error_msg(), \json_last_error());
		}
		$retn = new CustomRemoteBucketSettings();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}

	/**
	 * Convert this CustomRemoteBucketSettings object into a plain PHP array.
	 *
	 * Unknown properties may still be represented as \stdClass objects.
	 *
	 * @param bool $for_json_encode Represent key-value maps as \stdClass instead of plain PHP arrays
	 * @return array
	 */
	public function toArray(bool $for_json_encode = false): array
	{
		$ret = [];
		$ret["URL"] = $this->URL;
		{
			$c0 = $for_json_encode ? (object)[] : [];
			foreach($this->CustomHeaders as $k0 => $v0) {
				$ko_0 = $k0;
				$vo_0 = $v0;
				if ($for_json_encode) {
				$c0->{ $ko_0 } = $vo_0;
				} else {
					$c0[ $ko_0 ] = $vo_0;
				}
			}
			$ret["CustomHeaders"] = $c0;
		}
		$ret["CustomBody"] = $this->CustomBody;
		$ret["CustomBodyType"] = $this->CustomBodyType;

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

