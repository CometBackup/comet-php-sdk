<?php

/**
 * Copyright (c) 2018-2023 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 *
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

class WebDavDestinationLocation {

	/**
	 * The URL of the WebDAV server, including http/https and any custom port
	 *
	 * @var string
	 */
	public $DavServer = "";

	/**
	 * The username for logging in to the WebDAV server
	 *
	 * @var string
	 */
	public $UserName = "";

	/**
	 * The password for logging in to the WebDAV server
	 *
	 * @var string
	 */
	public $AccessKey = "";

	/**
	 * The target directory path within the WebDAV server
	 *
	 * @var string
	 */
	public $Path = "";

	/**
	 * Preserve unknown properties when dealing with future server versions.
	 *
	 * @see WebDavDestinationLocation::RemoveUnknownProperties() Remove all unknown properties
	 * @var array
	 */
	private $__unknown_properties = [];

	/**
	 * Replace the content of this WebDavDestinationLocation object from a PHP \stdClass.
	 * The data could be supplied from an API call after json_decode(...); or generated manually.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return void
	 */
	protected function inflateFrom(\stdClass $sc)
	{
		if (property_exists($sc, 'DavServer') && !is_null($sc->DavServer)) {
			$this->DavServer = (string)($sc->DavServer);
		}
		if (property_exists($sc, 'UserName') && !is_null($sc->UserName)) {
			$this->UserName = (string)($sc->UserName);
		}
		if (property_exists($sc, 'AccessKey') && !is_null($sc->AccessKey)) {
			$this->AccessKey = (string)($sc->AccessKey);
		}
		if (property_exists($sc, 'Path') && !is_null($sc->Path)) {
			$this->Path = (string)($sc->Path);
		}
		foreach(get_object_vars($sc) as $k => $v) {
			switch($k) {
			case 'DavServer':
			case 'UserName':
			case 'AccessKey':
			case 'Path':
				break;
			default:
				$this->__unknown_properties[$k] = $v;
			}
		}
	}

	/**
	 * Coerce a stdClass into a new strongly-typed WebDavDestinationLocation object.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return WebDavDestinationLocation
	 */
	public static function createFromStdclass(\stdClass $sc): \Comet\WebDavDestinationLocation
	{
		$retn = new WebDavDestinationLocation();
		$retn->inflateFrom($sc);
		return $retn;
	}

	/**
	 * Coerce a plain PHP array into a new strongly-typed WebDavDestinationLocation object.
	 * Because the Comet Server requires strict distinction between empty objects ({}) and arrays ([]),
	 * the result of this method may not be safe to re-submit to the Comet Server.
	 *
	 * @param array $arr Object data as PHP array
	 * @return WebDavDestinationLocation
	 */
	public static function createFromArray(array $arr): \Comet\WebDavDestinationLocation
	{
		$stdClass = json_decode(json_encode($arr, JSON_UNESCAPED_SLASHES));
		if (is_array($stdClass) && count($stdClass) === 0) {
			$stdClass = new \stdClass();
		}
		return self::createFromStdclass($stdClass);
	}

	/**
	 * Coerce a JSON string into a new strongly-typed WebDavDestinationLocation object.
	 *
	 * @param string $JsonString Object data as JSON string
	 * @return WebDavDestinationLocation
	 */
	public static function createFromJSON(string $JsonString): \Comet\WebDavDestinationLocation
	{
		$decodedJsonObject = json_decode($JsonString); // as stdClass
		if (\json_last_error() != \JSON_ERROR_NONE) {
			throw new \Exception("JSON decode failed: " . \json_last_error_msg(), \json_last_error());
		}
		$retn = new WebDavDestinationLocation();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}

	/**
	 * Convert this WebDavDestinationLocation object into a plain PHP array.
	 *
	 * Unknown properties may still be represented as \stdClass objects.
	 *
	 * @param bool $for_json_encode Represent empty key-value maps as \stdClass instead of plain PHP arrays
	 * @return array
	 */
	public function toArray(bool $for_json_encode = false): array
	{
		$ret = [];
		$ret["DavServer"] = $this->DavServer;
		$ret["UserName"] = $this->UserName;
		$ret["AccessKey"] = $this->AccessKey;
		$ret["Path"] = $this->Path;

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

