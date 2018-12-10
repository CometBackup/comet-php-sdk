<?php

/**
 * Copyright (c) 2018 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 * 
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

class SoftwareUpdateNewsResponse {
	
	/**
	 * @var string
	 */
	public $LatestStable = "";
	
	/**
	 * @var string
	 */
	public $LatestPrerelease = "";
	
	/**
	 * @var string
	 */
	public $DownloadsURL = "";
	
	/**
	 * @var string[]
	 */
	public $WhatsNew = [];
	
	/**
	 * Preserve unknown properties when dealing with future server versions.
	 *
	 * @see SoftwareUpdateNewsResponse::RemoveUnknownProperties() Remove all unknown properties
	 * @var array
	 */
	private $__unknown_properties = [];
	
	/**
	 * Replace the content of this SoftwareUpdateNewsResponse object from a PHP \stdClass.
	 * The data could be supplied from an API call after json_decode(...); or generated manually.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return void
	 */
	protected function inflateFrom(\stdClass $sc)
	{
		if (property_exists($sc, 'latest_stable')) {
			$this->LatestStable = (string)($sc->latest_stable);
		}
		if (property_exists($sc, 'latest_prerelease')) {
			$this->LatestPrerelease = (string)($sc->latest_prerelease);
		}
		if (property_exists($sc, 'downloads_url')) {
			$this->DownloadsURL = (string)($sc->downloads_url);
		}
		if (property_exists($sc, 'updates_info')) {
			$val_2 = [];
			for($i_2 = 0; $i_2 < count($sc->updates_info); ++$i_2) {
				$val_2[] = (string)($sc->updates_info[$i_2]);
			}
			$this->WhatsNew = $val_2;
		}
		foreach(get_object_vars($sc) as $k => $v) {
			switch($k) {
			case 'latest_stable':
			case 'latest_prerelease':
			case 'downloads_url':
			case 'updates_info':
				break;
			default:
				$this->__unknown_properties[$k] = $v;
			}
		}
	}
	
	/**
	 * Coerce a stdClass into a new strongly-typed SoftwareUpdateNewsResponse object.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return SoftwareUpdateNewsResponse
	 */
	public static function createFromStdclass(\stdClass $sc)
	{
		$retn = new SoftwareUpdateNewsResponse();
		$retn->inflateFrom($sc);
		return $retn;
	}
	
	/**
	 * Coerce a plain PHP array into a new strongly-typed SoftwareUpdateNewsResponse object.
	 * Because the Comet Server requires strict distinction between empty objects ({}) and arrays ([]),
	 * the result of this method may not be safe to re-submit to the Comet Server.
	 *
	 * @param array $arr Object data as PHP array
	 * @return SoftwareUpdateNewsResponse
	 */
	public static function createFromArray(array $arr)
	{
		$stdClass = json_decode(json_encode($arr));
		return self::createFromStdclass($stdClass);
	}
	
	/**
	 * Coerce a plain PHP array into a new strongly-typed SoftwareUpdateNewsResponse object.
	 * Because the Comet Server requires strict distinction between empty objects ({}) and arrays ([]),
	 * the result of this method may not be safe to re-submit to the Comet Server.
	 *
	 * @deprecated 3.0.0 Unsafe for round-trip server traversal. You should either 
	 *             (A) acknowledge this and continue by switching to createFromArray, or
	 *             (b) switch to the roundtrip-safe createFromStdclass alternative.
	 * @param array $arr Object data as PHP array
	 * @return SoftwareUpdateNewsResponse
	 */
	public static function createFrom(array $arr)
	{
		return self::createFromArray($arr);
	}
	
	/**
	 * Coerce a JSON string into a new strongly-typed SoftwareUpdateNewsResponse object.
	 *
	 * @param string $JsonString Object data as JSON string
	 * @return SoftwareUpdateNewsResponse
	 */
	public static function createFromJSON($JsonString)
	{
		$decodedJsonObject = json_decode($JsonString); // as stdClass
		if (\json_last_error() != \JSON_ERROR_NONE) {
			throw new \Exception("JSON decode failed: " . \json_last_error_msg());
		}
		$retn = new SoftwareUpdateNewsResponse();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}
	
	/**
	 * Convert this SoftwareUpdateNewsResponse object into a plain PHP array.
	 *
	 * Unknown properties may still be represented as \stdClass objects.
	 *
	 * @param bool $for_json_encode Represent empty key-value maps as \stdClass instead of plain PHP arrays
	 * @return array
	 */
	public function toArray($for_json_encode = false)
	{
		$ret = [];
		$ret["latest_stable"] = $this->LatestStable;
		$ret["latest_prerelease"] = $this->LatestPrerelease;
		$ret["downloads_url"] = $this->DownloadsURL;
		{
			$c0 = [];
			for($i0 = 0; $i0 < count($this->WhatsNew); ++$i0) {
				$val0 = $this->WhatsNew[$i0];
				$c0[] = $val0;
			}
			$ret["updates_info"] = $c0;
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

