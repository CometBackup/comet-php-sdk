<?php

/**
 * Copyright (c) 2018-2022 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 *
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

class StorjDestinationLocation {

	/**
	 * @var string
	 */
	public $SatelliteAddress = "";

	/**
	 * @var string
	 */
	public $APIKey = "";

	/**
	 * @var string
	 */
	public $Passphrase = "";

	/**
	 * @var string
	 */
	public $StorjBucket = "";

	/**
	 * @var string
	 */
	public $StorjBucketPrefix = "";

	/**
	 * Preserve unknown properties when dealing with future server versions.
	 *
	 * @see StorjDestinationLocation::RemoveUnknownProperties() Remove all unknown properties
	 * @var array
	 */
	private $__unknown_properties = [];

	/**
	 * Replace the content of this StorjDestinationLocation object from a PHP \stdClass.
	 * The data could be supplied from an API call after json_decode(...); or generated manually.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return void
	 */
	protected function inflateFrom(\stdClass $sc)
	{
		if (property_exists($sc, 'SatelliteAddress')) {
			$this->SatelliteAddress = (string)($sc->SatelliteAddress);
		}
		if (property_exists($sc, 'APIKey')) {
			$this->APIKey = (string)($sc->APIKey);
		}
		if (property_exists($sc, 'Passphrase')) {
			$this->Passphrase = (string)($sc->Passphrase);
		}
		if (property_exists($sc, 'StorjBucket')) {
			$this->StorjBucket = (string)($sc->StorjBucket);
		}
		if (property_exists($sc, 'StorjBucketPrefix') && !is_null($sc->StorjBucketPrefix)) {
			$this->StorjBucketPrefix = (string)($sc->StorjBucketPrefix);
		}
		foreach(get_object_vars($sc) as $k => $v) {
			switch($k) {
			case 'SatelliteAddress':
			case 'APIKey':
			case 'Passphrase':
			case 'StorjBucket':
			case 'StorjBucketPrefix':
				break;
			default:
				$this->__unknown_properties[$k] = $v;
			}
		}
	}

	/**
	 * Coerce a stdClass into a new strongly-typed StorjDestinationLocation object.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return StorjDestinationLocation
	 */
	public static function createFromStdclass(\stdClass $sc): \Comet\StorjDestinationLocation
	{
		$retn = new StorjDestinationLocation();
		$retn->inflateFrom($sc);
		return $retn;
	}

	/**
	 * Coerce a plain PHP array into a new strongly-typed StorjDestinationLocation object.
	 * Because the Comet Server requires strict distinction between empty objects ({}) and arrays ([]),
	 * the result of this method may not be safe to re-submit to the Comet Server.
	 *
	 * @param array $arr Object data as PHP array
	 * @return StorjDestinationLocation
	 */
	public static function createFromArray(array $arr): \Comet\StorjDestinationLocation
	{
		$stdClass = json_decode(json_encode($arr, JSON_UNESCAPED_SLASHES));
		if (is_array($stdClass) && count($stdClass) === 0) {
			$stdClass = new \stdClass();
		}
		return self::createFromStdclass($stdClass);
	}

	/**
	 * Coerce a JSON string into a new strongly-typed StorjDestinationLocation object.
	 *
	 * @param string $JsonString Object data as JSON string
	 * @return StorjDestinationLocation
	 */
	public static function createFromJSON(string $JsonString): \Comet\StorjDestinationLocation
	{
		$decodedJsonObject = json_decode($JsonString); // as stdClass
		if (\json_last_error() != \JSON_ERROR_NONE) {
			throw new \Exception("JSON decode failed: " . \json_last_error_msg(), \json_last_error());
		}
		$retn = new StorjDestinationLocation();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}

	/**
	 * Convert this StorjDestinationLocation object into a plain PHP array.
	 *
	 * Unknown properties may still be represented as \stdClass objects.
	 *
	 * @param bool $for_json_encode Represent empty key-value maps as \stdClass instead of plain PHP arrays
	 * @return array
	 */
	public function toArray(bool $for_json_encode = false): array
	{
		$ret = [];
		$ret["SatelliteAddress"] = $this->SatelliteAddress;
		$ret["APIKey"] = $this->APIKey;
		$ret["Passphrase"] = $this->Passphrase;
		$ret["StorjBucket"] = $this->StorjBucket;
		$ret["StorjBucketPrefix"] = $this->StorjBucketPrefix;

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
