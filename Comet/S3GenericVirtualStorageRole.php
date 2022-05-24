<?php

/**
 * Copyright (c) 2018-2022 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 *
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

class S3GenericVirtualStorageRole {

	/**
	 * @var string
	 */
	public $S3Endpoint = "";

	/**
	 * @var string
	 */
	public $IAMEndpoint = "";

	/**
	 * @var string
	 */
	public $MasterBucket = "";

	/**
	 * @var string
	 */
	public $AccessKey = "";

	/**
	 * @var string
	 */
	public $SecretKey = "";

	/**
	 * Preserve unknown properties when dealing with future server versions.
	 *
	 * @see S3GenericVirtualStorageRole::RemoveUnknownProperties() Remove all unknown properties
	 * @var array
	 */
	private $__unknown_properties = [];

	/**
	 * Replace the content of this S3GenericVirtualStorageRole object from a PHP \stdClass.
	 * The data could be supplied from an API call after json_decode(...); or generated manually.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return void
	 */
	protected function inflateFrom(\stdClass $sc)
	{
		if (property_exists($sc, 'S3Endpoint')) {
			$this->S3Endpoint = (string)($sc->S3Endpoint);
		}
		if (property_exists($sc, 'IAMEndpoint')) {
			$this->IAMEndpoint = (string)($sc->IAMEndpoint);
		}
		if (property_exists($sc, 'MasterBucket')) {
			$this->MasterBucket = (string)($sc->MasterBucket);
		}
		if (property_exists($sc, 'AccessKey')) {
			$this->AccessKey = (string)($sc->AccessKey);
		}
		if (property_exists($sc, 'SecretKey')) {
			$this->SecretKey = (string)($sc->SecretKey);
		}
		foreach(get_object_vars($sc) as $k => $v) {
			switch($k) {
			case 'S3Endpoint':
			case 'IAMEndpoint':
			case 'MasterBucket':
			case 'AccessKey':
			case 'SecretKey':
				break;
			default:
				$this->__unknown_properties[$k] = $v;
			}
		}
	}

	/**
	 * Coerce a stdClass into a new strongly-typed S3GenericVirtualStorageRole object.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return S3GenericVirtualStorageRole
	 */
	public static function createFromStdclass(\stdClass $sc)
	{
		$retn = new S3GenericVirtualStorageRole();
		$retn->inflateFrom($sc);
		return $retn;
	}

	/**
	 * Coerce a plain PHP array into a new strongly-typed S3GenericVirtualStorageRole object.
	 * Because the Comet Server requires strict distinction between empty objects ({}) and arrays ([]),
	 * the result of this method may not be safe to re-submit to the Comet Server.
	 *
	 * @param array $arr Object data as PHP array
	 * @return S3GenericVirtualStorageRole
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
	 * Coerce a plain PHP array into a new strongly-typed S3GenericVirtualStorageRole object.
	 * Because the Comet Server requires strict distinction between empty objects ({}) and arrays ([]),
	 * the result of this method may not be safe to re-submit to the Comet Server.
	 *
	 * @deprecated 3.0.0 Unsafe for round-trip server traversal. You should either
	 *             (A) acknowledge this and continue by switching to createFromArray, or
	 *             (b) switch to the roundtrip-safe createFromStdclass alternative.
	 * @param array $arr Object data as PHP array
	 * @return S3GenericVirtualStorageRole
	 */
	public static function createFrom(array $arr)
	{
		return self::createFromArray($arr);
	}

	/**
	 * Coerce a JSON string into a new strongly-typed S3GenericVirtualStorageRole object.
	 *
	 * @param string $JsonString Object data as JSON string
	 * @return S3GenericVirtualStorageRole
	 */
	public static function createFromJSON($JsonString)
	{
		$decodedJsonObject = json_decode($JsonString); // as stdClass
		if (\json_last_error() != \JSON_ERROR_NONE) {
			throw new \Exception("JSON decode failed: " . \json_last_error_msg());
		}
		$retn = new S3GenericVirtualStorageRole();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}

	/**
	 * Convert this S3GenericVirtualStorageRole object into a plain PHP array.
	 *
	 * Unknown properties may still be represented as \stdClass objects.
	 *
	 * @param bool $for_json_encode Represent empty key-value maps as \stdClass instead of plain PHP arrays
	 * @return array
	 */
	public function toArray($for_json_encode = false)
	{
		$ret = [];
		$ret["S3Endpoint"] = $this->S3Endpoint;
		$ret["IAMEndpoint"] = $this->IAMEndpoint;
		$ret["MasterBucket"] = $this->MasterBucket;
		$ret["AccessKey"] = $this->AccessKey;
		$ret["SecretKey"] = $this->SecretKey;

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
	}

}

