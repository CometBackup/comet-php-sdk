<?php

/**
 * Copyright (c) 2018-2023 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 *
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

class LiveUserConnection {

	/**
	 * @var string
	 */
	public $Username = "";

	/**
	 * @var string
	 */
	public $DeviceID = "";

	/**
	 * The Comet Backup software version that this live-connected device reports that it is running. It
	 * takes the format "MAJOR.MINOR.PATCH", such as "23.2.0". See the APPLICATION_VERSION constant for
	 * more information.
	 *
	 * @var string
	 */
	public $ReportedVersion = "";

	/**
	 * The operating system of the device. It is one of the PLATFORM_ constants; then a forwardslash
	 * (/); then the device's GOARCH.
	 *
	 * @var string
	 */
	public $ReportedPlatform = "";

	/**
	 * The operating system of the device, in extended detail.
	 *
	 * @var \Comet\OSInfo
	 */
	public $ReportedPlatformVersion = null;

	/**
	 * The reported timezone of the device, in IANA format.
	 *
	 * @var string
	 */
	public $DeviceTimeZone = "";

	/**
	 * The live-connected device's remote IP address, as seen from the Comet Server.
	 *
	 * @var string
	 */
	public $IPAddress = "";

	/**
	 * Unix timestamp, in seconds.
	 *
	 * @var int
	 */
	public $ConnectionTime = 0;

	/**
	 * The current state of the "Allow administrator to view my files" client-side option. If this
	 * option is refused, some live-connected actions will be refused by the device.
	 *
	 * @var boolean
	 */
	public $AllowsFilenames = false;

	/**
	 * Preserve unknown properties when dealing with future server versions.
	 *
	 * @see LiveUserConnection::RemoveUnknownProperties() Remove all unknown properties
	 * @var array
	 */
	private $__unknown_properties = [];

	/**
	 * Replace the content of this LiveUserConnection object from a PHP \stdClass.
	 * The data could be supplied from an API call after json_decode(...); or generated manually.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return void
	 */
	protected function inflateFrom(\stdClass $sc)
	{
		if (property_exists($sc, 'Username')) {
			$this->Username = (string)($sc->Username);
		}
		if (property_exists($sc, 'DeviceID')) {
			$this->DeviceID = (string)($sc->DeviceID);
		}
		if (property_exists($sc, 'ReportedVersion')) {
			$this->ReportedVersion = (string)($sc->ReportedVersion);
		}
		if (property_exists($sc, 'ReportedPlatform')) {
			$this->ReportedPlatform = (string)($sc->ReportedPlatform);
		}
		if (property_exists($sc, 'ReportedPlatformVersion') && !is_null($sc->ReportedPlatformVersion)) {
			if (is_array($sc->ReportedPlatformVersion) && count($sc->ReportedPlatformVersion) === 0) {
			// Work around edge case in json_decode--json_encode stdClass conversion
				$this->ReportedPlatformVersion = \Comet\OSInfo::createFromStdclass(new \stdClass());
			} else {
				$this->ReportedPlatformVersion = \Comet\OSInfo::createFromStdclass($sc->ReportedPlatformVersion);
			}
		}
		if (property_exists($sc, 'DeviceTimeZone') && !is_null($sc->DeviceTimeZone)) {
			$this->DeviceTimeZone = (string)($sc->DeviceTimeZone);
		}
		if (property_exists($sc, 'IPAddress') && !is_null($sc->IPAddress)) {
			$this->IPAddress = (string)($sc->IPAddress);
		}
		if (property_exists($sc, 'ConnectionTime')) {
			$this->ConnectionTime = (int)($sc->ConnectionTime);
		}
		if (property_exists($sc, 'AllowsFilenames')) {
			$this->AllowsFilenames = (bool)($sc->AllowsFilenames);
		}
		foreach(get_object_vars($sc) as $k => $v) {
			switch($k) {
			case 'Username':
			case 'DeviceID':
			case 'ReportedVersion':
			case 'ReportedPlatform':
			case 'ReportedPlatformVersion':
			case 'DeviceTimeZone':
			case 'IPAddress':
			case 'ConnectionTime':
			case 'AllowsFilenames':
				break;
			default:
				$this->__unknown_properties[$k] = $v;
			}
		}
	}

	/**
	 * Coerce a stdClass into a new strongly-typed LiveUserConnection object.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return LiveUserConnection
	 */
	public static function createFromStdclass(\stdClass $sc): \Comet\LiveUserConnection
	{
		$retn = new LiveUserConnection();
		$retn->inflateFrom($sc);
		return $retn;
	}

	/**
	 * Coerce a plain PHP array into a new strongly-typed LiveUserConnection object.
	 * Because the Comet Server requires strict distinction between empty objects ({}) and arrays ([]),
	 * the result of this method may not be safe to re-submit to the Comet Server.
	 *
	 * @param array $arr Object data as PHP array
	 * @return LiveUserConnection
	 */
	public static function createFromArray(array $arr): \Comet\LiveUserConnection
	{
		$stdClass = json_decode(json_encode($arr, JSON_UNESCAPED_SLASHES));
		if (is_array($stdClass) && count($stdClass) === 0) {
			$stdClass = new \stdClass();
		}
		return self::createFromStdclass($stdClass);
	}

	/**
	 * Coerce a JSON string into a new strongly-typed LiveUserConnection object.
	 *
	 * @param string $JsonString Object data as JSON string
	 * @return LiveUserConnection
	 */
	public static function createFromJSON(string $JsonString): \Comet\LiveUserConnection
	{
		$decodedJsonObject = json_decode($JsonString); // as stdClass
		if (\json_last_error() != \JSON_ERROR_NONE) {
			throw new \Exception("JSON decode failed: " . \json_last_error_msg(), \json_last_error());
		}
		$retn = new LiveUserConnection();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}

	/**
	 * Convert this LiveUserConnection object into a plain PHP array.
	 *
	 * Unknown properties may still be represented as \stdClass objects.
	 *
	 * @param bool $for_json_encode Represent empty key-value maps as \stdClass instead of plain PHP arrays
	 * @return array
	 */
	public function toArray(bool $for_json_encode = false): array
	{
		$ret = [];
		$ret["Username"] = $this->Username;
		$ret["DeviceID"] = $this->DeviceID;
		$ret["ReportedVersion"] = $this->ReportedVersion;
		$ret["ReportedPlatform"] = $this->ReportedPlatform;
		if ( $this->ReportedPlatformVersion === null ) {
			$ret["ReportedPlatformVersion"] = $for_json_encode ? (object)[] : [];
		} else {
			$ret["ReportedPlatformVersion"] = $this->ReportedPlatformVersion->toArray($for_json_encode);
		}
		$ret["DeviceTimeZone"] = $this->DeviceTimeZone;
		$ret["IPAddress"] = $this->IPAddress;
		$ret["ConnectionTime"] = $this->ConnectionTime;
		$ret["AllowsFilenames"] = $this->AllowsFilenames;

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
		if ($this->ReportedPlatformVersion !== null) {
			$this->ReportedPlatformVersion->RemoveUnknownProperties();
		}
	}

}

