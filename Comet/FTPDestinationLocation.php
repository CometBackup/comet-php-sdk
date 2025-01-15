<?php

/**
 * Copyright (c) 2018-2025 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 *
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

class FTPDestinationLocation {

	/**
	 * @var string
	 */
	public $FTPServer = "";

	/**
	 * @var string
	 */
	public $FTPUsername = "";

	/**
	 * @var string
	 */
	public $FTPPassword = "";

	/**
	 * If true, store data in the default home directory given by the FTP server. If false, store data
	 * in the FTPCustomBaseDirectory path.
	 *
	 * @var boolean
	 */
	public $FTPBaseUseHomeDirectory = false;

	/**
	 * If FTPBaseUseHomeDirectory is false, this field controls the path where data is stored.
	 *
	 * @var string
	 */
	public $FTPCustomBaseDirectory = "";

	/**
	 * Control whether this is plaintext FTP or secure FTPS by using one of the FTPS_MODE_ constants.
	 *
	 * @var int
	 */
	public $FTPSMode = 0;

	/**
	 * @var int
	 */
	public $FTPPort = 0;

	/**
	 * If set to zero, uses a system default value that is not unlimited.
	 *
	 * @var int
	 */
	public $FTPMaxConnections = 0;

	/**
	 * @var boolean
	 */
	public $FTPAcceptInvalidSSL = false;

	/**
	 * Preserve unknown properties when dealing with future server versions.
	 *
	 * @see FTPDestinationLocation::RemoveUnknownProperties() Remove all unknown properties
	 * @var array
	 */
	private $__unknown_properties = [];

	/**
	 * Replace the content of this FTPDestinationLocation object from a PHP \stdClass.
	 * The data could be supplied from an API call after json_decode(...); or generated manually.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return void
	 */
	protected function inflateFrom(\stdClass $sc)
	{
		if (property_exists($sc, 'FTPServer')) {
			$this->FTPServer = (string)($sc->FTPServer);
		}
		if (property_exists($sc, 'FTPUsername')) {
			$this->FTPUsername = (string)($sc->FTPUsername);
		}
		if (property_exists($sc, 'FTPPassword')) {
			$this->FTPPassword = (string)($sc->FTPPassword);
		}
		if (property_exists($sc, 'FTPBaseUseHomeDirectory')) {
			$this->FTPBaseUseHomeDirectory = (bool)($sc->FTPBaseUseHomeDirectory);
		}
		if (property_exists($sc, 'FTPCustomBaseDirectory')) {
			$this->FTPCustomBaseDirectory = (string)($sc->FTPCustomBaseDirectory);
		}
		if (property_exists($sc, 'FTPSMode')) {
			$this->FTPSMode = (int)($sc->FTPSMode);
		}
		if (property_exists($sc, 'FTPPort')) {
			$this->FTPPort = (int)($sc->FTPPort);
		}
		if (property_exists($sc, 'FTPMaxConnections')) {
			$this->FTPMaxConnections = (int)($sc->FTPMaxConnections);
		}
		if (property_exists($sc, 'FTPAcceptInvalidSSL')) {
			$this->FTPAcceptInvalidSSL = (bool)($sc->FTPAcceptInvalidSSL);
		}
		foreach(get_object_vars($sc) as $k => $v) {
			switch($k) {
			case 'FTPServer':
			case 'FTPUsername':
			case 'FTPPassword':
			case 'FTPBaseUseHomeDirectory':
			case 'FTPCustomBaseDirectory':
			case 'FTPSMode':
			case 'FTPPort':
			case 'FTPMaxConnections':
			case 'FTPAcceptInvalidSSL':
				break;
			default:
				$this->__unknown_properties[$k] = $v;
			}
		}
	}

	/**
	 * Coerce a stdClass into a new strongly-typed FTPDestinationLocation object.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return FTPDestinationLocation
	 */
	public static function createFromStdclass(\stdClass $sc): \Comet\FTPDestinationLocation
	{
		$retn = new FTPDestinationLocation();
		$retn->inflateFrom($sc);
		return $retn;
	}

	/**
	 * Coerce a plain PHP array into a new strongly-typed FTPDestinationLocation object.
	 * Because the Comet Server requires strict distinction between empty objects ({}) and arrays ([]),
	 * the result of this method may not be safe to re-submit to the Comet Server.
	 *
	 * @param array $arr Object data as PHP array
	 * @return FTPDestinationLocation
	 */
	public static function createFromArray(array $arr): \Comet\FTPDestinationLocation
	{
		$stdClass = json_decode(json_encode($arr, JSON_UNESCAPED_SLASHES));
		if (is_array($stdClass) && count($stdClass) === 0) {
			$stdClass = new \stdClass();
		}
		return self::createFromStdclass($stdClass);
	}

	/**
	 * Coerce a JSON string into a new strongly-typed FTPDestinationLocation object.
	 *
	 * @param string $JsonString Object data as JSON string
	 * @return FTPDestinationLocation
	 */
	public static function createFromJSON(string $JsonString): \Comet\FTPDestinationLocation
	{
		$decodedJsonObject = json_decode($JsonString); // as stdClass
		if (\json_last_error() != \JSON_ERROR_NONE) {
			throw new \Exception("JSON decode failed: " . \json_last_error_msg(), \json_last_error());
		}
		$retn = new FTPDestinationLocation();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}

	/**
	 * Convert this FTPDestinationLocation object into a plain PHP array.
	 *
	 * Unknown properties may still be represented as \stdClass objects.
	 *
	 * @param bool $for_json_encode Represent key-value maps as \stdClass instead of plain PHP arrays
	 * @return array
	 */
	public function toArray(bool $for_json_encode = false): array
	{
		$ret = [];
		$ret["FTPServer"] = $this->FTPServer;
		$ret["FTPUsername"] = $this->FTPUsername;
		$ret["FTPPassword"] = $this->FTPPassword;
		$ret["FTPBaseUseHomeDirectory"] = $this->FTPBaseUseHomeDirectory;
		$ret["FTPCustomBaseDirectory"] = $this->FTPCustomBaseDirectory;
		$ret["FTPSMode"] = $this->FTPSMode;
		$ret["FTPPort"] = $this->FTPPort;
		$ret["FTPMaxConnections"] = $this->FTPMaxConnections;
		$ret["FTPAcceptInvalidSSL"] = $this->FTPAcceptInvalidSSL;

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

