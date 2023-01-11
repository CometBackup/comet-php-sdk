<?php

/**
 * Copyright (c) 2018-2023 Comet Licensing Ltd.
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
	 * @var float
	 */
	public $UsedPercent = 0;

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
			$this->UsedPercent = (float)($sc->UsedPercent);
		}
		if (property_exists($sc, 'AvailableBytes')) {
			$this->AvailableBytes = (int)($sc->AvailableBytes);
		}
		if (property_exists($sc, 'Spanned') && !is_null($sc->Spanned)) {
			if (is_array($sc->Spanned) && count($sc->Spanned) === 0) {
			// Work around edge case in json_decode--json_encode stdClass conversion
				$this->Spanned = \Comet\SpannedStorageExtraInfo::createFromStdclass(new \stdClass());
			} else {
				$this->Spanned = \Comet\SpannedStorageExtraInfo::createFromStdclass($sc->Spanned);
			}
		}
		if (property_exists($sc, 'B2') && !is_null($sc->B2)) {
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
	public static function createFromStdclass(\stdClass $sc): \Comet\StorageFreeSpaceInfo
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
	public static function createFromArray(array $arr): \Comet\StorageFreeSpaceInfo
	{
		$stdClass = json_decode(json_encode($arr, JSON_UNESCAPED_SLASHES));
		if (is_array($stdClass) && count($stdClass) === 0) {
			$stdClass = new \stdClass();
		}
		return self::createFromStdclass($stdClass);
	}

	/**
	 * Coerce a JSON string into a new strongly-typed StorageFreeSpaceInfo object.
	 *
	 * @param string $JsonString Object data as JSON string
	 * @return StorageFreeSpaceInfo
	 */
	public static function createFromJSON(string $JsonString): \Comet\StorageFreeSpaceInfo
	{
		$decodedJsonObject = json_decode($JsonString); // as stdClass
		if (\json_last_error() != \JSON_ERROR_NONE) {
			throw new \Exception("JSON decode failed: " . \json_last_error_msg(), \json_last_error());
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
	public function toArray(bool $for_json_encode = false): array
	{
		$ret = [];
		$ret["Unlimited"] = $this->Unlimited;
		$ret["UsedPercent"] = $this->UsedPercent;
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
		if ($this->Spanned !== null) {
			$this->Spanned->RemoveUnknownProperties();
		}
		if ($this->B2 !== null) {
			$this->B2->RemoveUnknownProperties();
		}
	}

}

