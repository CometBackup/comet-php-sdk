<?php

/**
 * Copyright (c) 2018-2024 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 *
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

class VMDKSnapshotViewOptions {

	/**
	 * Request a list of stored objects in vmdk file. It should be always true for restoring single
	 * files from vmdk file
	 *
	 * @var boolean
	 */
	public $Enabled = false;

	/**
	 * The vmdk filename inside subdirectory of disk image, should be end with .vmdk
	 *
	 * @var string
	 */
	public $PartitionGUID = "";

	/**
	 * Browse objects' paths inside vmdk file
	 *
	 * @var string
	 */
	public $ListPath = "";

	/**
	 * @var string
	 */
	public $PartitionName = "";

	/**
	 * Preserve unknown properties when dealing with future server versions.
	 *
	 * @see VMDKSnapshotViewOptions::RemoveUnknownProperties() Remove all unknown properties
	 * @var array
	 */
	private $__unknown_properties = [];

	/**
	 * Replace the content of this VMDKSnapshotViewOptions object from a PHP \stdClass.
	 * The data could be supplied from an API call after json_decode(...); or generated manually.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return void
	 */
	protected function inflateFrom(\stdClass $sc)
	{
		if (property_exists($sc, 'Enabled')) {
			$this->Enabled = (bool)($sc->Enabled);
		}
		if (property_exists($sc, 'PartitionGUID')) {
			$this->PartitionGUID = (string)($sc->PartitionGUID);
		}
		if (property_exists($sc, 'ListPath')) {
			$this->ListPath = (string)($sc->ListPath);
		}
		if (property_exists($sc, 'PartitionName')) {
			$this->PartitionName = (string)($sc->PartitionName);
		}
		foreach(get_object_vars($sc) as $k => $v) {
			switch($k) {
			case 'Enabled':
			case 'PartitionGUID':
			case 'ListPath':
			case 'PartitionName':
				break;
			default:
				$this->__unknown_properties[$k] = $v;
			}
		}
	}

	/**
	 * Coerce a stdClass into a new strongly-typed VMDKSnapshotViewOptions object.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return VMDKSnapshotViewOptions
	 */
	public static function createFromStdclass(\stdClass $sc): \Comet\VMDKSnapshotViewOptions
	{
		$retn = new VMDKSnapshotViewOptions();
		$retn->inflateFrom($sc);
		return $retn;
	}

	/**
	 * Coerce a plain PHP array into a new strongly-typed VMDKSnapshotViewOptions object.
	 * Because the Comet Server requires strict distinction between empty objects ({}) and arrays ([]),
	 * the result of this method may not be safe to re-submit to the Comet Server.
	 *
	 * @param array $arr Object data as PHP array
	 * @return VMDKSnapshotViewOptions
	 */
	public static function createFromArray(array $arr): \Comet\VMDKSnapshotViewOptions
	{
		$stdClass = json_decode(json_encode($arr, JSON_UNESCAPED_SLASHES));
		if (is_array($stdClass) && count($stdClass) === 0) {
			$stdClass = new \stdClass();
		}
		return self::createFromStdclass($stdClass);
	}

	/**
	 * Coerce a JSON string into a new strongly-typed VMDKSnapshotViewOptions object.
	 *
	 * @param string $JsonString Object data as JSON string
	 * @return VMDKSnapshotViewOptions
	 */
	public static function createFromJSON(string $JsonString): \Comet\VMDKSnapshotViewOptions
	{
		$decodedJsonObject = json_decode($JsonString); // as stdClass
		if (\json_last_error() != \JSON_ERROR_NONE) {
			throw new \Exception("JSON decode failed: " . \json_last_error_msg(), \json_last_error());
		}
		$retn = new VMDKSnapshotViewOptions();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}

	/**
	 * Convert this VMDKSnapshotViewOptions object into a plain PHP array.
	 *
	 * Unknown properties may still be represented as \stdClass objects.
	 *
	 * @param bool $for_json_encode Represent empty key-value maps as \stdClass instead of plain PHP arrays
	 * @return array
	 */
	public function toArray(bool $for_json_encode = false): array
	{
		$ret = [];
		$ret["Enabled"] = $this->Enabled;
		$ret["PartitionGUID"] = $this->PartitionGUID;
		$ret["ListPath"] = $this->ListPath;
		$ret["PartitionName"] = $this->PartitionName;

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

