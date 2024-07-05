<?php

/**
 * Copyright (c) 2018-2024 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 *
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

class Partition {

	/**
	 * @var string
	 */
	public $DeviceName = "";

	/**
	 * The name of the filesystem used on this partition (e.g. "NTFS")
	 *
	 * @var string
	 */
	public $Filesystem = "";

	/**
	 * @var string
	 */
	public $VolumeName = "";

	/**
	 * @var string
	 */
	public $VolumeGuid = "";

	/**
	 * @var string
	 */
	public $VolumeSerial = "";

	/**
	 * @var string[]
	 */
	public $MountPoints = [];

	/**
	 * Bytes. The partition's offset within the DeviceName. It will be zero if this partition has a
	 * direct DeviceName handle.
	 *
	 * @var int
	 */
	public $ReadOffset = 0;

	/**
	 * Bytes
	 *
	 * @var int
	 */
	public $Size = 0;

	/**
	 * Bytes. Only present for supported filesystems that are currently mounted by the OS
	 *
	 * @var int
	 */
	public $UsedSize = 0;

	/**
	 * @var int
	 */
	public $Flags = 0;

	/**
	 * @var int
	 */
	public $BytesPerFilesystemCluster = 0;

	/**
	 * Preserve unknown properties when dealing with future server versions.
	 *
	 * @see Partition::RemoveUnknownProperties() Remove all unknown properties
	 * @var array
	 */
	private $__unknown_properties = [];

	/**
	 * Replace the content of this Partition object from a PHP \stdClass.
	 * The data could be supplied from an API call after json_decode(...); or generated manually.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return void
	 */
	protected function inflateFrom(\stdClass $sc)
	{
		if (property_exists($sc, 'DeviceName')) {
			$this->DeviceName = (string)($sc->DeviceName);
		}
		if (property_exists($sc, 'Filesystem')) {
			$this->Filesystem = (string)($sc->Filesystem);
		}
		if (property_exists($sc, 'VolumeName')) {
			$this->VolumeName = (string)($sc->VolumeName);
		}
		if (property_exists($sc, 'VolumeGuid')) {
			$this->VolumeGuid = (string)($sc->VolumeGuid);
		}
		if (property_exists($sc, 'VolumeSerial')) {
			$this->VolumeSerial = (string)($sc->VolumeSerial);
		}
		if (property_exists($sc, 'MountPoints')) {
			$val_2 = [];
			if ($sc->MountPoints !== null) {
				for($i_2 = 0; $i_2 < count($sc->MountPoints); ++$i_2) {
					$val_2[] = (string)($sc->MountPoints[$i_2]);
				}
			}
			$this->MountPoints = $val_2;
		}
		if (property_exists($sc, 'ReadOffset')) {
			$this->ReadOffset = (int)($sc->ReadOffset);
		}
		if (property_exists($sc, 'Size')) {
			$this->Size = (int)($sc->Size);
		}
		if (property_exists($sc, 'UsedSize')) {
			$this->UsedSize = (int)($sc->UsedSize);
		}
		if (property_exists($sc, 'Flags')) {
			$this->Flags = (int)($sc->Flags);
		}
		if (property_exists($sc, 'BytesPerFilesystemCluster')) {
			$this->BytesPerFilesystemCluster = (int)($sc->BytesPerFilesystemCluster);
		}
		foreach(get_object_vars($sc) as $k => $v) {
			switch($k) {
			case 'DeviceName':
			case 'Filesystem':
			case 'VolumeName':
			case 'VolumeGuid':
			case 'VolumeSerial':
			case 'MountPoints':
			case 'ReadOffset':
			case 'Size':
			case 'UsedSize':
			case 'Flags':
			case 'BytesPerFilesystemCluster':
				break;
			default:
				$this->__unknown_properties[$k] = $v;
			}
		}
	}

	/**
	 * Coerce a stdClass into a new strongly-typed Partition object.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return Partition
	 */
	public static function createFromStdclass(\stdClass $sc): \Comet\Partition
	{
		$retn = new Partition();
		$retn->inflateFrom($sc);
		return $retn;
	}

	/**
	 * Coerce a plain PHP array into a new strongly-typed Partition object.
	 * Because the Comet Server requires strict distinction between empty objects ({}) and arrays ([]),
	 * the result of this method may not be safe to re-submit to the Comet Server.
	 *
	 * @param array $arr Object data as PHP array
	 * @return Partition
	 */
	public static function createFromArray(array $arr): \Comet\Partition
	{
		$stdClass = json_decode(json_encode($arr, JSON_UNESCAPED_SLASHES));
		if (is_array($stdClass) && count($stdClass) === 0) {
			$stdClass = new \stdClass();
		}
		return self::createFromStdclass($stdClass);
	}

	/**
	 * Coerce a JSON string into a new strongly-typed Partition object.
	 *
	 * @param string $JsonString Object data as JSON string
	 * @return Partition
	 */
	public static function createFromJSON(string $JsonString): \Comet\Partition
	{
		$decodedJsonObject = json_decode($JsonString); // as stdClass
		if (\json_last_error() != \JSON_ERROR_NONE) {
			throw new \Exception("JSON decode failed: " . \json_last_error_msg(), \json_last_error());
		}
		$retn = new Partition();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}

	/**
	 * Convert this Partition object into a plain PHP array.
	 *
	 * Unknown properties may still be represented as \stdClass objects.
	 *
	 * @param bool $for_json_encode Represent key-value maps as \stdClass instead of plain PHP arrays
	 * @return array
	 */
	public function toArray(bool $for_json_encode = false): array
	{
		$ret = [];
		$ret["DeviceName"] = $this->DeviceName;
		$ret["Filesystem"] = $this->Filesystem;
		$ret["VolumeName"] = $this->VolumeName;
		$ret["VolumeGuid"] = $this->VolumeGuid;
		$ret["VolumeSerial"] = $this->VolumeSerial;
		{
			$c0 = [];
			for($i0 = 0; $i0 < count($this->MountPoints); ++$i0) {
				$val0 = $this->MountPoints[$i0];
				$c0[] = $val0;
			}
			$ret["MountPoints"] = $c0;
		}
		$ret["ReadOffset"] = $this->ReadOffset;
		$ret["Size"] = $this->Size;
		$ret["UsedSize"] = $this->UsedSize;
		$ret["Flags"] = $this->Flags;
		$ret["BytesPerFilesystemCluster"] = $this->BytesPerFilesystemCluster;

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

