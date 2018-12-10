<?php

/**
 * Copyright (c) 2018 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 * 
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

class ServerMetaVersionInfo {
	
	/**
	 * @var string
	 */
	public $Version = "";
	
	/**
	 * @var string
	 */
	public $VersionCodename = "";
	
	/**
	 * @var boolean
	 */
	public $StorageRole = false;
	
	/**
	 * @var boolean
	 */
	public $AuthenticationRole = false;
	
	/**
	 * @var boolean
	 */
	public $SoftwareBuildRole = false;
	
	/**
	 * @var boolean
	 */
	public $ConstellationRole_Legacy = false;
	
	/**
	 * @var boolean
	 */
	public $ConstellationRole = false;
	
	/**
	 * @var int
	 */
	public $ServerStartTime = 0;
	
	/**
	 * @var string
	 */
	public $ServerStartHash = "";
	
	/**
	 * @var int
	 */
	public $CurrentTime = 0;
	
	/**
	 * @var string
	 */
	public $ServerLicenseHash = "";
	
	/**
	 * @var int
	 */
	public $LicenseValidUntil = 0;
	
	/**
	 * @var int
	 */
	public $EmailsSentSuccessfully = 0;
	
	/**
	 * @var int
	 */
	public $EmailsSentErrors = 0;
	
	/**
	 * @var int
	 */
	public $EmailsWaitingInQueue = 0;
	
	/**
	 * Preserve unknown properties when dealing with future server versions.
	 *
	 * @see ServerMetaVersionInfo::RemoveUnknownProperties() Remove all unknown properties
	 * @var array
	 */
	private $__unknown_properties = [];
	
	/**
	 * Replace the content of this ServerMetaVersionInfo object from a PHP \stdClass.
	 * The data could be supplied from an API call after json_decode(...); or generated manually.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return void
	 */
	protected function inflateFrom(\stdClass $sc)
	{
		if (property_exists($sc, 'Version')) {
			$this->Version = (string)($sc->Version);
		}
		if (property_exists($sc, 'VersionCodename')) {
			$this->VersionCodename = (string)($sc->VersionCodename);
		}
		if (property_exists($sc, 'StorageRole')) {
			$this->StorageRole = (bool)($sc->StorageRole);
		}
		if (property_exists($sc, 'AuthenticationRole')) {
			$this->AuthenticationRole = (bool)($sc->AuthenticationRole);
		}
		if (property_exists($sc, 'SoftwareBuildRole')) {
			$this->SoftwareBuildRole = (bool)($sc->SoftwareBuildRole);
		}
		if (property_exists($sc, 'OverseerRole')) {
			$this->ConstellationRole_Legacy = (bool)($sc->OverseerRole);
		}
		if (property_exists($sc, 'ConstellationRole')) {
			$this->ConstellationRole = (bool)($sc->ConstellationRole);
		}
		if (property_exists($sc, 'ServerStartTime')) {
			$this->ServerStartTime = (int)($sc->ServerStartTime);
		}
		if (property_exists($sc, 'ServerStartHash')) {
			$this->ServerStartHash = (string)($sc->ServerStartHash);
		}
		if (property_exists($sc, 'CurrentTime')) {
			$this->CurrentTime = (int)($sc->CurrentTime);
		}
		if (property_exists($sc, 'ServerLicenseHash')) {
			$this->ServerLicenseHash = (string)($sc->ServerLicenseHash);
		}
		if (property_exists($sc, 'LicenseValidUntil')) {
			$this->LicenseValidUntil = (int)($sc->LicenseValidUntil);
		}
		if (property_exists($sc, 'EmailsSentSuccessfully')) {
			$this->EmailsSentSuccessfully = (int)($sc->EmailsSentSuccessfully);
		}
		if (property_exists($sc, 'EmailsSentErrors')) {
			$this->EmailsSentErrors = (int)($sc->EmailsSentErrors);
		}
		if (property_exists($sc, 'EmailsWaitingInQueue')) {
			$this->EmailsWaitingInQueue = (int)($sc->EmailsWaitingInQueue);
		}
		foreach(get_object_vars($sc) as $k => $v) {
			switch($k) {
			case 'Version':
			case 'VersionCodename':
			case 'StorageRole':
			case 'AuthenticationRole':
			case 'SoftwareBuildRole':
			case 'OverseerRole':
			case 'ConstellationRole':
			case 'ServerStartTime':
			case 'ServerStartHash':
			case 'CurrentTime':
			case 'ServerLicenseHash':
			case 'LicenseValidUntil':
			case 'EmailsSentSuccessfully':
			case 'EmailsSentErrors':
			case 'EmailsWaitingInQueue':
				break;
			default:
				$this->__unknown_properties[$k] = $v;
			}
		}
	}
	
	/**
	 * Coerce a stdClass into a new strongly-typed ServerMetaVersionInfo object.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return ServerMetaVersionInfo
	 */
	public static function createFromStdclass(\stdClass $sc)
	{
		$retn = new ServerMetaVersionInfo();
		$retn->inflateFrom($sc);
		return $retn;
	}
	
	/**
	 * Coerce a plain PHP array into a new strongly-typed ServerMetaVersionInfo object.
	 * Because the Comet Server requires strict distinction between empty objects ({}) and arrays ([]),
	 * the result of this method may not be safe to re-submit to the Comet Server.
	 *
	 * @param array $arr Object data as PHP array
	 * @return ServerMetaVersionInfo
	 */
	public static function createFromArray(array $arr)
	{
		$stdClass = json_decode(json_encode($arr));
		return self::createFromStdclass($stdClass);
	}
	
	/**
	 * Coerce a plain PHP array into a new strongly-typed ServerMetaVersionInfo object.
	 * Because the Comet Server requires strict distinction between empty objects ({}) and arrays ([]),
	 * the result of this method may not be safe to re-submit to the Comet Server.
	 *
	 * @deprecated 3.0.0 Unsafe for round-trip server traversal. You should either 
	 *             (A) acknowledge this and continue by switching to createFromArray, or
	 *             (b) switch to the roundtrip-safe createFromStdclass alternative.
	 * @param array $arr Object data as PHP array
	 * @return ServerMetaVersionInfo
	 */
	public static function createFrom(array $arr)
	{
		return self::createFromArray($arr);
	}
	
	/**
	 * Coerce a JSON string into a new strongly-typed ServerMetaVersionInfo object.
	 *
	 * @param string $JsonString Object data as JSON string
	 * @return ServerMetaVersionInfo
	 */
	public static function createFromJSON($JsonString)
	{
		$decodedJsonObject = json_decode($JsonString); // as stdClass
		if (\json_last_error() != \JSON_ERROR_NONE) {
			throw new \Exception("JSON decode failed: " . \json_last_error_msg());
		}
		$retn = new ServerMetaVersionInfo();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}
	
	/**
	 * Convert this ServerMetaVersionInfo object into a plain PHP array.
	 *
	 * Unknown properties may still be represented as \stdClass objects.
	 *
	 * @param bool $for_json_encode Represent empty key-value maps as \stdClass instead of plain PHP arrays
	 * @return array
	 */
	public function toArray($for_json_encode = false)
	{
		$ret = [];
		$ret["Version"] = $this->Version;
		$ret["VersionCodename"] = $this->VersionCodename;
		$ret["StorageRole"] = $this->StorageRole;
		$ret["AuthenticationRole"] = $this->AuthenticationRole;
		$ret["SoftwareBuildRole"] = $this->SoftwareBuildRole;
		$ret["OverseerRole"] = $this->ConstellationRole_Legacy;
		$ret["ConstellationRole"] = $this->ConstellationRole;
		$ret["ServerStartTime"] = $this->ServerStartTime;
		$ret["ServerStartHash"] = $this->ServerStartHash;
		$ret["CurrentTime"] = $this->CurrentTime;
		$ret["ServerLicenseHash"] = $this->ServerLicenseHash;
		$ret["LicenseValidUntil"] = $this->LicenseValidUntil;
		$ret["EmailsSentSuccessfully"] = $this->EmailsSentSuccessfully;
		$ret["EmailsSentErrors"] = $this->EmailsSentErrors;
		$ret["EmailsWaitingInQueue"] = $this->EmailsWaitingInQueue;
		
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

