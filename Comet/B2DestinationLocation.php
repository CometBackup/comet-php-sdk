<?php

/**
 * Copyright (c) 2018-2022 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 *
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

class B2DestinationLocation {

	/**
	 * @var string
	 */
	public $AccountID = "";

	/**
	 * @var string
	 */
	public $Key = "";

	/**
	 * @var string
	 */
	public $Bucket = "";

	/**
	 * @var string
	 */
	public $Prefix = "";

	/**
	 * @var int
	 * @deprecated 21.9.7 This member has been deprecated since Comet version 21.9.7
	 */
	public $MaxConnections = 0;

	/**
	 * @var boolean
	 */
	public $HideDeletedFiles = false;

	/**
	 * Preserve unknown properties when dealing with future server versions.
	 *
	 * @see B2DestinationLocation::RemoveUnknownProperties() Remove all unknown properties
	 * @var array
	 */
	private $__unknown_properties = [];

	/**
	 * Replace the content of this B2DestinationLocation object from a PHP \stdClass.
	 * The data could be supplied from an API call after json_decode(...); or generated manually.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return void
	 */
	protected function inflateFrom(\stdClass $sc)
	{
		if (property_exists($sc, 'AccountID') && !is_null($sc->AccountID)) {
			$this->AccountID = (string)($sc->AccountID);
		}
		if (property_exists($sc, 'Key') && !is_null($sc->Key)) {
			$this->Key = (string)($sc->Key);
		}
		if (property_exists($sc, 'Bucket') && !is_null($sc->Bucket)) {
			$this->Bucket = (string)($sc->Bucket);
		}
		if (property_exists($sc, 'Prefix') && !is_null($sc->Prefix)) {
			$this->Prefix = (string)($sc->Prefix);
		}
		if (property_exists($sc, 'MaxConnections') && !is_null($sc->MaxConnections)) {
			$this->MaxConnections = (int)($sc->MaxConnections);
		}
		if (property_exists($sc, 'HideDeletedFiles') && !is_null($sc->HideDeletedFiles)) {
			$this->HideDeletedFiles = (bool)($sc->HideDeletedFiles);
		}
		foreach(get_object_vars($sc) as $k => $v) {
			switch($k) {
			case 'AccountID':
			case 'Key':
			case 'Bucket':
			case 'Prefix':
			case 'MaxConnections':
			case 'HideDeletedFiles':
				break;
			default:
				$this->__unknown_properties[$k] = $v;
			}
		}
	}

	/**
	 * Coerce a stdClass into a new strongly-typed B2DestinationLocation object.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return B2DestinationLocation
	 */
	public static function createFromStdclass(\stdClass $sc): \Comet\B2DestinationLocation
	{
		$retn = new B2DestinationLocation();
		$retn->inflateFrom($sc);
		return $retn;
	}

	/**
	 * Coerce a plain PHP array into a new strongly-typed B2DestinationLocation object.
	 * Because the Comet Server requires strict distinction between empty objects ({}) and arrays ([]),
	 * the result of this method may not be safe to re-submit to the Comet Server.
	 *
	 * @param array $arr Object data as PHP array
	 * @return B2DestinationLocation
	 */
	public static function createFromArray(array $arr): \Comet\B2DestinationLocation
	{
		$stdClass = json_decode(json_encode($arr, JSON_UNESCAPED_SLASHES));
		if (is_array($stdClass) && count($stdClass) === 0) {
			$stdClass = new \stdClass();
		}
		return self::createFromStdclass($stdClass);
	}

	/**
	 * Coerce a JSON string into a new strongly-typed B2DestinationLocation object.
	 *
	 * @param string $JsonString Object data as JSON string
	 * @return B2DestinationLocation
	 */
	public static function createFromJSON(string $JsonString): \Comet\B2DestinationLocation
	{
		$decodedJsonObject = json_decode($JsonString); // as stdClass
		if (\json_last_error() != \JSON_ERROR_NONE) {
			throw new \Exception("JSON decode failed: " . \json_last_error_msg(), \json_last_error());
		}
		$retn = new B2DestinationLocation();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}

	/**
	 * Convert this B2DestinationLocation object into a plain PHP array.
	 *
	 * Unknown properties may still be represented as \stdClass objects.
	 *
	 * @param bool $for_json_encode Represent empty key-value maps as \stdClass instead of plain PHP arrays
	 * @return array
	 */
	public function toArray(bool $for_json_encode = false): array
	{
		$ret = [];
		$ret["AccountID"] = $this->AccountID;
		$ret["Key"] = $this->Key;
		$ret["Bucket"] = $this->Bucket;
		$ret["Prefix"] = $this->Prefix;
		$ret["MaxConnections"] = $this->MaxConnections;
		$ret["HideDeletedFiles"] = $this->HideDeletedFiles;

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

