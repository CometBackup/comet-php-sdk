<?php

/**
 * Copyright (c) 2018-2020 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 * 
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

class MacOSCodeSignProperties {
	
	/**
	 * @var int
	 */
	public $Level = 0;
	
	/**
	 * @var \Comet\SSHConnection
	 */
	public $SSHServer = null;
	
	/**
	 * @var string
	 */
	public $CertificateName = "";
	
	/**
	 * @var string
	 */
	public $AppCertificateName = "";
	
	/**
	 * @var string
	 */
	public $AppleID = "";
	
	/**
	 * @var string
	 */
	public $AppleIDPass = "";
	
	/**
	 * @var int
	 */
	public $AppleIDPassFormat = 0;
	
	/**
	 * Preserve unknown properties when dealing with future server versions.
	 *
	 * @see MacOSCodeSignProperties::RemoveUnknownProperties() Remove all unknown properties
	 * @var array
	 */
	private $__unknown_properties = [];
	
	/**
	 * Replace the content of this MacOSCodeSignProperties object from a PHP \stdClass.
	 * The data could be supplied from an API call after json_decode(...); or generated manually.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return void
	 */
	protected function inflateFrom(\stdClass $sc)
	{
		if (property_exists($sc, 'Level')) {
			$this->Level = (int)($sc->Level);
		}
		if (property_exists($sc, 'SSHServer')) {
			if (is_array($sc->SSHServer) && count($sc->SSHServer) === 0) {
			// Work around edge case in json_decode--json_encode stdClass conversion
				$this->SSHServer = \Comet\SSHConnection::createFromStdclass(new \stdClass());
			} else {
				$this->SSHServer = \Comet\SSHConnection::createFromStdclass($sc->SSHServer);
			}
		}
		if (property_exists($sc, 'CertificateName')) {
			$this->CertificateName = (string)($sc->CertificateName);
		}
		if (property_exists($sc, 'AppCertificateName')) {
			$this->AppCertificateName = (string)($sc->AppCertificateName);
		}
		if (property_exists($sc, 'AppleID')) {
			$this->AppleID = (string)($sc->AppleID);
		}
		if (property_exists($sc, 'AppleIDPass')) {
			$this->AppleIDPass = (string)($sc->AppleIDPass);
		}
		if (property_exists($sc, 'AppleIDPassFormat')) {
			$this->AppleIDPassFormat = (int)($sc->AppleIDPassFormat);
		}
		foreach(get_object_vars($sc) as $k => $v) {
			switch($k) {
			case 'Level':
			case 'SSHServer':
			case 'CertificateName':
			case 'AppCertificateName':
			case 'AppleID':
			case 'AppleIDPass':
			case 'AppleIDPassFormat':
				break;
			default:
				$this->__unknown_properties[$k] = $v;
			}
		}
	}
	
	/**
	 * Coerce a stdClass into a new strongly-typed MacOSCodeSignProperties object.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return MacOSCodeSignProperties
	 */
	public static function createFromStdclass(\stdClass $sc)
	{
		$retn = new MacOSCodeSignProperties();
		$retn->inflateFrom($sc);
		return $retn;
	}
	
	/**
	 * Coerce a plain PHP array into a new strongly-typed MacOSCodeSignProperties object.
	 * Because the Comet Server requires strict distinction between empty objects ({}) and arrays ([]),
	 * the result of this method may not be safe to re-submit to the Comet Server.
	 *
	 * @param array $arr Object data as PHP array
	 * @return MacOSCodeSignProperties
	 */
	public static function createFromArray(array $arr)
	{
		$stdClass = json_decode(json_encode($arr));
		if (is_array($stdClass) && count($stdClass) === 0) {
			$stdClass = new \stdClass();
		}
		return self::createFromStdclass($stdClass);
	}
	
	/**
	 * Coerce a plain PHP array into a new strongly-typed MacOSCodeSignProperties object.
	 * Because the Comet Server requires strict distinction between empty objects ({}) and arrays ([]),
	 * the result of this method may not be safe to re-submit to the Comet Server.
	 *
	 * @deprecated 3.0.0 Unsafe for round-trip server traversal. You should either 
	 *             (A) acknowledge this and continue by switching to createFromArray, or
	 *             (b) switch to the roundtrip-safe createFromStdclass alternative.
	 * @param array $arr Object data as PHP array
	 * @return MacOSCodeSignProperties
	 */
	public static function createFrom(array $arr)
	{
		return self::createFromArray($arr);
	}
	
	/**
	 * Coerce a JSON string into a new strongly-typed MacOSCodeSignProperties object.
	 *
	 * @param string $JsonString Object data as JSON string
	 * @return MacOSCodeSignProperties
	 */
	public static function createFromJSON($JsonString)
	{
		$decodedJsonObject = json_decode($JsonString); // as stdClass
		if (\json_last_error() != \JSON_ERROR_NONE) {
			throw new \Exception("JSON decode failed: " . \json_last_error_msg());
		}
		$retn = new MacOSCodeSignProperties();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}
	
	/**
	 * Convert this MacOSCodeSignProperties object into a plain PHP array.
	 *
	 * Unknown properties may still be represented as \stdClass objects.
	 *
	 * @param bool $for_json_encode Represent empty key-value maps as \stdClass instead of plain PHP arrays
	 * @return array
	 */
	public function toArray($for_json_encode = false)
	{
		$ret = [];
		$ret["Level"] = $this->Level;
		if ( $this->SSHServer === null ) {
			$ret["SSHServer"] = $for_json_encode ? (object)[] : [];
		} else {
			$ret["SSHServer"] = $this->SSHServer->toArray($for_json_encode);
		}
		$ret["CertificateName"] = $this->CertificateName;
		$ret["AppCertificateName"] = $this->AppCertificateName;
		$ret["AppleID"] = $this->AppleID;
		$ret["AppleIDPass"] = $this->AppleIDPass;
		$ret["AppleIDPassFormat"] = $this->AppleIDPassFormat;
		
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
		if ($this->SSHServer !== null) {
			$this->SSHServer->RemoveUnknownProperties();
		}
	}
	
}

