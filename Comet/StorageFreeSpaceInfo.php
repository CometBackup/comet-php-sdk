<?php

/**
 * Copyright (c) 2018-2020 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 * 
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

class StorageFreeSpaceInfo {
	
	/**
	 * @var boolean
	 */
	public $Unlimited = false;
	
	/**
	 * @var \Comet\float32
	 */
	public $UsedPercent = null;
	
	/**
	 * @var int
	 */
	public $AvailableBytes = 0;
	
	/**
	 * @var \Comet\SpannedStorageExtraInfo
	 */
	public $Spanned = null;
	
	/**
	 * @var \Comet\B2StorageExtraInfo
	 */
	public $B2 = null;
	
	/**
	 * Preserve unknown properties when dealing with future server versions.
	 *
	 * @see StorageFreeSpaceInfo::RemoveUnknownProperties() Remove all unknown properties
	 * @var array
	 */
	private $__unknown_properties = [];
	
	/**
	 * Replace the content of this StorageFreeSpaceInfo object from a PHP \stdClass.
	 * The data could be supplied from an API call after json_decode(...); or generated manually.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return void
	 */
	protected function inflateFrom(\stdClass $sc)
	{
		if (property_exists($sc, 'Unlimited')) {
			$this->Unlimited = (bool)($sc->Unlimited);
		}
		if (property_exists($sc, 'UsedPercent')) {
			if (is_array($sc->UsedPercent) && count($sc->UsedPercent) === 0) {
			// Work around edge case in json_decode--json_encode stdClass conversion
				$this->UsedPercent = \Comet\float32::createFromStdclass(new \stdClass());
			} else {
				$this->UsedPercent = \Comet\float32::createFromStdclass($sc->UsedPercent);
			}
		}
		if (property_exists($sc, 'AvailableBytes')) {
			$this->AvailableBytes = (int)($sc->AvailableBytes);
		}
		if (property_exists($sc, 'Spanned')) {
			if (is_array($sc->Spanned) && count($sc->Spanned) === 0) {
			// Work around edge case in json_decode--json_encode stdClass conversion
				$this->Spanned = \Comet\SpannedStorageExtraInfo::createFromStdclass(new \stdClass());
			} else {
				$this->Spanned = \Comet\SpannedStorageExtraInfo::createFromStdclass($sc->Spanned);
			}
		}
		if (property_exists($sc, 'B2')) {
			if (is_array($sc->B2) && count($sc->B2) === 0) {
			// Work around edge case in json_decode--json_encode stdClass conversion
				$this->B2 = \Comet\B2StorageExtraInfo::createFromStdclass(new \stdClass());
			} else {
				$this->B2 = \Comet\B2StorageExtraInfo::createFromStdclass($sc->B2);
			}
		}
		foreach(get_object_vars($sc) as $k => $v) {
			switch($k) {
			case 'Unlimited':
			case 'UsedPercent':
			case 'AvailableBytes':
			case 'Spanned':
			case 'B2':
				break;
			default:
				$this->__unknown_properties[$k] = $v;
			}
		}
	}
	
	/**
	 * Coerce a stdClass into a new strongly-typed StorageFreeSpaceInfo object.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return StorageFreeSpaceInfo
	 */
	public static function createFromStdclass(\stdClass $sc)
	{
		$retn = new StorageFreeSpaceInfo();
		$retn->inflateFrom($sc);
		return $retn;
	}
	
	/**
	 * Coerce a plain PHP array into a new strongly-typed StorageFreeSpaceInfo object.
	 * Because the Comet Server requires strict distinction between empty objects ({}) and arrays ([]),
	 * the result of this method may not be safe to re-submit to the Comet Server.
	 *
	 * @param array $arr Object data as PHP array
	 * @return StorageFreeSpaceInfo
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
	 * Coerce a plain PHP array into a new strongly-typed StorageFreeSpaceInfo object.
	 * Because the Comet Server requires strict distinction between empty objects ({}) and arrays ([]),
	 * the result of this method may not be safe to re-submit to the Comet Server.
	 *
	 * @deprecated 3.0.0 Unsafe for round-trip server traversal. You should either 
	 *             (A) acknowledge this and continue by switching to createFromArray, or
	 *             (b) switch to the roundtrip-safe createFromStdclass alternative.
	 * @param array $arr Object data as PHP array
	 * @return StorageFreeSpaceInfo
	 */
	public static function createFrom(array $arr)
	{
		return self::createFromArray($arr);
	}
	
	/**
	 * Coerce a JSON string into a new strongly-typed StorageFreeSpaceInfo object.
	 *
	 * @param string $JsonString Object data as JSON string
	 * @return StorageFreeSpaceInfo
	 */
	public static function createFromJSON($JsonString)
	{
		$decodedJsonObject = json_decode($JsonString); // as stdClass
		if (\json_last_error() != \JSON_ERROR_NONE) {
			throw new \Exception("JSON decode failed: " . \json_last_error_msg());
		}
		$retn = new StorageFreeSpaceInfo();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}
	
	/**
	 * Convert this StorageFreeSpaceInfo object into a plain PHP array.
	 *
	 * Unknown properties may still be represented as \stdClass objects.
	 *
	 * @param bool $for_json_encode Represent empty key-value maps as \stdClass instead of plain PHP arrays
	 * @return array
	 */
	public function toArray($for_json_encode = false)
	{
		$ret = [];
		$ret["Unlimited"] = $this->Unlimited;
		if ( $this->UsedPercent === null ) {
			$ret["UsedPercent"] = $for_json_encode ? (object)[] : [];
		} else {
			$ret["UsedPercent"] = $this->UsedPercent->toArray($for_json_encode);
		}
		$ret["AvailableBytes"] = $this->AvailableBytes;
		if ( $this->Spanned === null ) {
			$ret["Spanned"] = $for_json_encode ? (object)[] : [];
		} else {
			$ret["Spanned"] = $this->Spanned->toArray($for_json_encode);
		}
		if ( $this->B2 === null ) {
			$ret["B2"] = $for_json_encode ? (object)[] : [];
		} else {
			$ret["B2"] = $this->B2->toArray($for_json_encode);
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
		$arr = $this->toArray(true);
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
		$arr = $this->toArray(false);
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
		if ($this->UsedPercent !== null) {
			$this->UsedPercent->RemoveUnknownProperties();
		}
		if ($this->Spanned !== null) {
			$this->Spanned->RemoveUnknownProperties();
		}
		if ($this->B2 !== null) {
			$this->B2->RemoveUnknownProperties();
		}
	}
	
}

