<?php

/**
 * Copyright (c) 2018-2022 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 *
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

class ConstellationCheckReport {

	/**
	 * @var int
	 */
	public $CheckStarted = 0;

	/**
	 * @var int
	 */
	public $CheckCompleted = 0;

	/**
	 * @var \Comet\BucketUsageInfo[] An array with string keys.
	 */
	public $Usage = [];

	/**
	 * Preserve unknown properties when dealing with future server versions.
	 *
	 * @see ConstellationCheckReport::RemoveUnknownProperties() Remove all unknown properties
	 * @var array
	 */
	private $__unknown_properties = [];

	/**
	 * Replace the content of this ConstellationCheckReport object from a PHP \stdClass.
	 * The data could be supplied from an API call after json_decode(...); or generated manually.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return void
	 */
	protected function inflateFrom(\stdClass $sc)
	{
		if (property_exists($sc, 'CheckStarted')) {
			$this->CheckStarted = (int)($sc->CheckStarted);
		}
		if (property_exists($sc, 'CheckCompleted')) {
			$this->CheckCompleted = (int)($sc->CheckCompleted);
		}
		if (property_exists($sc, 'Usage')) {
			$val_2 = [];
			if ($sc->Usage !== null) {
				foreach($sc->Usage as $k_2 => $v_2) {
					$phpk_2 = (string)($k_2);
					if (is_array($v_2) && count($v_2) === 0) {
					// Work around edge case in json_decode--json_encode stdClass conversion
						$phpv_2 = \Comet\BucketUsageInfo::createFromStdclass(new \stdClass());
					} else {
						$phpv_2 = \Comet\BucketUsageInfo::createFromStdclass($v_2);
					}
					$val_2[$phpk_2] = $phpv_2;
				}
			}
			$this->Usage = $val_2;
		}
		foreach(get_object_vars($sc) as $k => $v) {
			switch($k) {
			case 'CheckStarted':
			case 'CheckCompleted':
			case 'Usage':
				break;
			default:
				$this->__unknown_properties[$k] = $v;
			}
		}
	}

	/**
	 * Coerce a stdClass into a new strongly-typed ConstellationCheckReport object.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return ConstellationCheckReport
	 */
	public static function createFromStdclass(\stdClass $sc): \Comet\ConstellationCheckReport
	{
		$retn = new ConstellationCheckReport();
		$retn->inflateFrom($sc);
		return $retn;
	}

	/**
	 * Coerce a plain PHP array into a new strongly-typed ConstellationCheckReport object.
	 * Because the Comet Server requires strict distinction between empty objects ({}) and arrays ([]),
	 * the result of this method may not be safe to re-submit to the Comet Server.
	 *
	 * @param array $arr Object data as PHP array
	 * @return ConstellationCheckReport
	 */
	public static function createFromArray(array $arr): \Comet\ConstellationCheckReport
	{
		$stdClass = json_decode(json_encode($arr, JSON_UNESCAPED_SLASHES));
		if (is_array($stdClass) && count($stdClass) === 0) {
			$stdClass = new \stdClass();
		}
		return self::createFromStdclass($stdClass);
	}

	/**
	 * Coerce a JSON string into a new strongly-typed ConstellationCheckReport object.
	 *
	 * @param string $JsonString Object data as JSON string
	 * @return ConstellationCheckReport
	 */
	public static function createFromJSON(string $JsonString): \Comet\ConstellationCheckReport
	{
		$decodedJsonObject = json_decode($JsonString); // as stdClass
		if (\json_last_error() != \JSON_ERROR_NONE) {
			throw new \Exception("JSON decode failed: " . \json_last_error_msg(), \json_last_error());
		}
		$retn = new ConstellationCheckReport();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}

	/**
	 * Convert this ConstellationCheckReport object into a plain PHP array.
	 *
	 * Unknown properties may still be represented as \stdClass objects.
	 *
	 * @param bool $for_json_encode Represent empty key-value maps as \stdClass instead of plain PHP arrays
	 * @return array
	 */
	public function toArray(bool $for_json_encode = false): array
	{
		$ret = [];
		$ret["CheckStarted"] = $this->CheckStarted;
		$ret["CheckCompleted"] = $this->CheckCompleted;
		{
			$c0 = [];
			foreach($this->Usage as $k0 => $v0) {
				$ko_0 = $k0;
				if ( $v0 === null ) {
					$vo_0 = $for_json_encode ? (object)[] : [];
				} else {
					$vo_0 = $v0->toArray($for_json_encode);
				}
				$c0[ $ko_0 ] = $vo_0;
			}
			if ($for_json_encode && count($c0) == 0) {
				$ret["Usage"] = (object)[];
			} else {
				$ret["Usage"] = $c0;
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
	}

}

