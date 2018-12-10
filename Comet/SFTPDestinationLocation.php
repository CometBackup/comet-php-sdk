<?php

/**
 * Copyright (c) 2018 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 * 
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

class SFTPDestinationLocation {
	
	/**
	 * @var string
	 */
	public $SFTPServer = "";
	
	/**
	 * @var string
	 */
	public $SFTPUsername = "";
	
	/**
	 * @var string
	 */
	public $SFTPRemotePath = "";
	
	/**
	 * @var int
	 */
	public $SFTPAuthMode = 0;
	
	/**
	 * @var string
	 */
	public $SFTPPassword = "";
	
	/**
	 * @var string
	 */
	public $SFTPPrivateKey = "";
	
	/**
	 * @var boolean
	 */
	public $SFTPCustomAuth_UseKnownHostsFile = false;
	
	/**
	 * @var string
	 */
	public $SFTPCustomAuth_KnownHostsFile = "";
	
	/**
	 * Preserve unknown properties when dealing with future server versions.
	 *
	 * @see SFTPDestinationLocation::RemoveUnknownProperties() Remove all unknown properties
	 * @var array
	 */
	private $__unknown_properties = [];
	
	/**
	 * Replace the content of this SFTPDestinationLocation object from a PHP \stdClass.
	 * The data could be supplied from an API call after json_decode(...); or generated manually.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return void
	 */
	protected function inflateFrom(\stdClass $sc)
	{
		if (property_exists($sc, 'SFTPServer')) {
			$this->SFTPServer = (string)($sc->SFTPServer);
		}
		if (property_exists($sc, 'SFTPUsername')) {
			$this->SFTPUsername = (string)($sc->SFTPUsername);
		}
		if (property_exists($sc, 'SFTPRemotePath')) {
			$this->SFTPRemotePath = (string)($sc->SFTPRemotePath);
		}
		if (property_exists($sc, 'SFTPAuthMode')) {
			$this->SFTPAuthMode = (int)($sc->SFTPAuthMode);
		}
		if (property_exists($sc, 'SFTPPassword')) {
			$this->SFTPPassword = (string)($sc->SFTPPassword);
		}
		if (property_exists($sc, 'SFTPPrivateKey')) {
			$this->SFTPPrivateKey = (string)($sc->SFTPPrivateKey);
		}
		if (property_exists($sc, 'SFTPCustomAuth_UseKnownHostsFile')) {
			$this->SFTPCustomAuth_UseKnownHostsFile = (bool)($sc->SFTPCustomAuth_UseKnownHostsFile);
		}
		if (property_exists($sc, 'SFTPCustomAuth_KnownHostsFile')) {
			$this->SFTPCustomAuth_KnownHostsFile = (string)($sc->SFTPCustomAuth_KnownHostsFile);
		}
		foreach(get_object_vars($sc) as $k => $v) {
			switch($k) {
			case 'SFTPServer':
			case 'SFTPUsername':
			case 'SFTPRemotePath':
			case 'SFTPAuthMode':
			case 'SFTPPassword':
			case 'SFTPPrivateKey':
			case 'SFTPCustomAuth_UseKnownHostsFile':
			case 'SFTPCustomAuth_KnownHostsFile':
				break;
			default:
				$this->__unknown_properties[$k] = $v;
			}
		}
	}
	
	/**
	 * Coerce a stdClass into a new strongly-typed SFTPDestinationLocation object.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return SFTPDestinationLocation
	 */
	public static function createFromStdclass(\stdClass $sc)
	{
		$retn = new SFTPDestinationLocation();
		$retn->inflateFrom($sc);
		return $retn;
	}
	
	/**
	 * Coerce a plain PHP array into a new strongly-typed SFTPDestinationLocation object.
	 * Because the Comet Server requires strict distinction between empty objects ({}) and arrays ([]),
	 * the result of this method may not be safe to re-submit to the Comet Server.
	 *
	 * @param array $arr Object data as PHP array
	 * @return SFTPDestinationLocation
	 */
	public static function createFromArray(array $arr)
	{
		$stdClass = json_decode(json_encode($arr));
		return self::createFromStdclass($stdClass);
	}
	
	/**
	 * Coerce a plain PHP array into a new strongly-typed SFTPDestinationLocation object.
	 * Because the Comet Server requires strict distinction between empty objects ({}) and arrays ([]),
	 * the result of this method may not be safe to re-submit to the Comet Server.
	 *
	 * @deprecated 3.0.0 Unsafe for round-trip server traversal. You should either 
	 *             (A) acknowledge this and continue by switching to createFromArray, or
	 *             (b) switch to the roundtrip-safe createFromStdclass alternative.
	 * @param array $arr Object data as PHP array
	 * @return SFTPDestinationLocation
	 */
	public static function createFrom(array $arr)
	{
		return self::createFromArray($arr);
	}
	
	/**
	 * Coerce a JSON string into a new strongly-typed SFTPDestinationLocation object.
	 *
	 * @param string $JsonString Object data as JSON string
	 * @return SFTPDestinationLocation
	 */
	public static function createFromJSON($JsonString)
	{
		$decodedJsonObject = json_decode($JsonString); // as stdClass
		if (\json_last_error() != \JSON_ERROR_NONE) {
			throw new \Exception("JSON decode failed: " . \json_last_error_msg());
		}
		$retn = new SFTPDestinationLocation();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}
	
	/**
	 * Convert this SFTPDestinationLocation object into a plain PHP array.
	 *
	 * Unknown properties may still be represented as \stdClass objects.
	 *
	 * @param bool $for_json_encode Represent empty key-value maps as \stdClass instead of plain PHP arrays
	 * @return array
	 */
	public function toArray($for_json_encode = false)
	{
		$ret = [];
		$ret["SFTPServer"] = $this->SFTPServer;
		$ret["SFTPUsername"] = $this->SFTPUsername;
		$ret["SFTPRemotePath"] = $this->SFTPRemotePath;
		$ret["SFTPAuthMode"] = $this->SFTPAuthMode;
		$ret["SFTPPassword"] = $this->SFTPPassword;
		$ret["SFTPPrivateKey"] = $this->SFTPPrivateKey;
		$ret["SFTPCustomAuth_UseKnownHostsFile"] = $this->SFTPCustomAuth_UseKnownHostsFile;
		$ret["SFTPCustomAuth_KnownHostsFile"] = $this->SFTPCustomAuth_KnownHostsFile;
		
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

