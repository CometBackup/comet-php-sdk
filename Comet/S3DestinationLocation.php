<?php

/**
 * Copyright (c) 2018 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 * 
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

class S3DestinationLocation {
	
	/**
	 * @var string
	 */
	public $S3Server = "";
	
	/**
	 * @var boolean
	 */
	public $S3UsesTLS = false;
	
	/**
	 * @var string
	 */
	public $S3AccessKey = "";
	
	/**
	 * @var string
	 */
	public $S3SecretKey = "";
	
	/**
	 * @var string
	 */
	public $S3BucketName = "";
	
	/**
	 * @var string
	 */
	public $S3Subdir = "";
	
	/**
	 * Preserve unknown properties when dealing with future server versions.
	 *
	 * @see S3DestinationLocation::RemoveUnknownProperties() Remove all unknown properties
	 * @var array
	 */
	private $__unknown_properties = [];
	
	/**
	 * Replace the content of this S3DestinationLocation object from a PHP \stdClass.
	 * The data could be supplied from an API call after json_decode(...); or generated manually.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return void
	 */
	protected function inflateFrom(\stdClass $sc)
	{
		if (property_exists($sc, 'S3Server')) {
			$this->S3Server = (string)($sc->S3Server);
		}
		if (property_exists($sc, 'S3UsesTLS')) {
			$this->S3UsesTLS = (bool)($sc->S3UsesTLS);
		}
		if (property_exists($sc, 'S3AccessKey')) {
			$this->S3AccessKey = (string)($sc->S3AccessKey);
		}
		if (property_exists($sc, 'S3SecretKey')) {
			$this->S3SecretKey = (string)($sc->S3SecretKey);
		}
		if (property_exists($sc, 'S3BucketName')) {
			$this->S3BucketName = (string)($sc->S3BucketName);
		}
		if (property_exists($sc, 'S3Subdir')) {
			$this->S3Subdir = (string)($sc->S3Subdir);
		}
		foreach(get_object_vars($sc) as $k => $v) {
			switch($k) {
			case 'S3Server':
			case 'S3UsesTLS':
			case 'S3AccessKey':
			case 'S3SecretKey':
			case 'S3BucketName':
			case 'S3Subdir':
				break;
			default:
				$this->__unknown_properties[$k] = $v;
			}
		}
	}
	
	/**
	 * Coerce a stdClass into a new strongly-typed S3DestinationLocation object.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return S3DestinationLocation
	 */
	public static function createFromStdclass(\stdClass $sc)
	{
		$retn = new S3DestinationLocation();
		$retn->inflateFrom($sc);
		return $retn;
	}
	
	/**
	 * Coerce a plain PHP array into a new strongly-typed S3DestinationLocation object.
	 * Because the Comet Server requires strict distinction between empty objects ({}) and arrays ([]),
	 * the result of this method may not be safe to re-submit to the Comet Server.
	 *
	 * @param array $arr Object data as PHP array
	 * @return S3DestinationLocation
	 */
	public static function createFromArray(array $arr)
	{
		$stdClass = json_decode(json_encode($arr));
		return self::createFromStdclass($stdClass);
	}
	
	/**
	 * Coerce a plain PHP array into a new strongly-typed S3DestinationLocation object.
	 * Because the Comet Server requires strict distinction between empty objects ({}) and arrays ([]),
	 * the result of this method may not be safe to re-submit to the Comet Server.
	 *
	 * @deprecated 3.0.0 Unsafe for round-trip server traversal. You should either 
	 *             (A) acknowledge this and continue by switching to createFromArray, or
	 *             (b) switch to the roundtrip-safe createFromStdclass alternative.
	 * @param array $arr Object data as PHP array
	 * @return S3DestinationLocation
	 */
	public static function createFrom(array $arr)
	{
		return self::createFromArray($arr);
	}
	
	/**
	 * Coerce a JSON string into a new strongly-typed S3DestinationLocation object.
	 *
	 * @param string $JsonString Object data as JSON string
	 * @return S3DestinationLocation
	 */
	public static function createFromJSON($JsonString)
	{
		$decodedJsonObject = json_decode($JsonString); // as stdClass
		if (\json_last_error() != \JSON_ERROR_NONE) {
			throw new \Exception("JSON decode failed: " . \json_last_error_msg());
		}
		$retn = new S3DestinationLocation();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}
	
	/**
	 * Convert this S3DestinationLocation object into a plain PHP array.
	 *
	 * Unknown properties may still be represented as \stdClass objects.
	 *
	 * @param bool $for_json_encode Represent empty key-value maps as \stdClass instead of plain PHP arrays
	 * @return array
	 */
	public function toArray($for_json_encode = false)
	{
		$ret = [];
		$ret["S3Server"] = $this->S3Server;
		$ret["S3UsesTLS"] = $this->S3UsesTLS;
		$ret["S3AccessKey"] = $this->S3AccessKey;
		$ret["S3SecretKey"] = $this->S3SecretKey;
		$ret["S3BucketName"] = $this->S3BucketName;
		$ret["S3Subdir"] = $this->S3Subdir;
		
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

