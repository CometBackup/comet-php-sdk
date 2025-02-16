<?php

/**
 * Copyright (c) 2018-2025 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 *
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

class DiskDrive {

	/**
	 * @var string
	 */
	public $ID = "";

	/**
	 * @var string
	 */
	public $DeviceName = "";

	/**
	 * @var string
	 */
	public $Caption = "";

	/**
	 * @var string
	 */
	public $Model = "";

	/**
	 * @var string
	 */
	public $SerialNumber = "";

	/**
	 * Bytes
	 *
	 * @var int
	 */
	public $Size = 0;

	/**
	 * @var \Comet\Partition[]
	 */
	public $Partitions = [];

	/**
	 * For physical disks, this array will be empty. For virtual disks, RAID devices or Linux DM
	 * devices, this array may contain the DeviceName of the parent device.
	 *
	 * @var string[]
	 * This field is available in Comet 24.6.x and later.
	 */
	public $DeviceParents = [];

	/**
	 * See WINDISKFLAG_ constants
	 *
	 * @var int
	 */
	public $Flags = 0;

	/**
	 * @var int
	 * @deprecated 24.6.x This value is reported from the disk driver if available. Otherwise emulates a value based on modern LBA addressing. The field value is not used. This member has been deprecated since Comet version 24.6.x This value is reported from the disk driver if available. Otherwise emulates a value based on modern LBA addressing. The field value is not used.
	 */
	public $Cylinders = 0;

	/**
	 * @var int
	 * @deprecated 24.6.x This value is reported from the disk driver if available. Otherwise emulates a value based on modern LBA addressing. The field value is not used. This member has been deprecated since Comet version 24.6.x This value is reported from the disk driver if available. Otherwise emulates a value based on modern LBA addressing. The field value is not used.
	 */
	public $Heads = 0;

	/**
	 * @var int
	 * @deprecated 24.6.x This value is reported from the disk driver if available. Otherwise emulates a value based on modern LBA addressing. The field value is not used. This member has been deprecated since Comet version 24.6.x This value is reported from the disk driver if available. Otherwise emulates a value based on modern LBA addressing. The field value is not used.
	 */
	public $Sectors = 0;

	/**
	 * @var int
	 */
	public $SectorSize = 0;

	/**
	 * Used to indicate the partition conflicts on the disk.
	 *
	 * @var \Comet\PartitionConflict[]
	 */
	public $PartitionConflicts = [];

	/**
	 * Preserve unknown properties when dealing with future server versions.
	 *
	 * @see DiskDrive::RemoveUnknownProperties() Remove all unknown properties
	 * @var array
	 */
	private $__unknown_properties = [];

	/**
	 * Replace the content of this DiskDrive object from a PHP \stdClass.
	 * The data could be supplied from an API call after json_decode(...); or generated manually.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return void
	 */
	protected function inflateFrom(\stdClass $sc)
	{
		if (property_exists($sc, 'ID')) {
			$this->ID = (string)($sc->ID);
		}
		if (property_exists($sc, 'DeviceName')) {
			$this->DeviceName = (string)($sc->DeviceName);
		}
		if (property_exists($sc, 'Caption')) {
			$this->Caption = (string)($sc->Caption);
		}
		if (property_exists($sc, 'Model')) {
			$this->Model = (string)($sc->Model);
		}
		if (property_exists($sc, 'SerialNumber')) {
			$this->SerialNumber = (string)($sc->SerialNumber);
		}
		if (property_exists($sc, 'Size')) {
			$this->Size = (int)($sc->Size);
		}
		if (property_exists($sc, 'Partitions')) {
			$val_2 = [];
			if ($sc->Partitions !== null) {
				for($i_2 = 0; $i_2 < count($sc->Partitions); ++$i_2) {
					if (is_array($sc->Partitions[$i_2]) && count($sc->Partitions[$i_2]) === 0) {
					// Work around edge case in json_decode--json_encode stdClass conversion
						$val_2[] = \Comet\Partition::createFromStdclass(new \stdClass());
					} else {
						$val_2[] = \Comet\Partition::createFromStdclass($sc->Partitions[$i_2]);
					}
				}
			}
			$this->Partitions = $val_2;
		}
		if (property_exists($sc, 'DeviceParents')) {
			$val_2 = [];
			if ($sc->DeviceParents !== null) {
				for($i_2 = 0; $i_2 < count($sc->DeviceParents); ++$i_2) {
					$val_2[] = (string)($sc->DeviceParents[$i_2]);
				}
			}
			$this->DeviceParents = $val_2;
		}
		if (property_exists($sc, 'Flags')) {
			$this->Flags = (int)($sc->Flags);
		}
		if (property_exists($sc, 'Cylinders')) {
			$this->Cylinders = (int)($sc->Cylinders);
		}
		if (property_exists($sc, 'Heads')) {
			$this->Heads = (int)($sc->Heads);
		}
		if (property_exists($sc, 'Sectors')) {
			$this->Sectors = (int)($sc->Sectors);
		}
		if (property_exists($sc, 'SectorSize')) {
			$this->SectorSize = (int)($sc->SectorSize);
		}
		if (property_exists($sc, 'PartitionConflicts')) {
			$val_2 = [];
			if ($sc->PartitionConflicts !== null) {
				for($i_2 = 0; $i_2 < count($sc->PartitionConflicts); ++$i_2) {
					if (is_array($sc->PartitionConflicts[$i_2]) && count($sc->PartitionConflicts[$i_2]) === 0) {
					// Work around edge case in json_decode--json_encode stdClass conversion
						$val_2[] = \Comet\PartitionConflict::createFromStdclass(new \stdClass());
					} else {
						$val_2[] = \Comet\PartitionConflict::createFromStdclass($sc->PartitionConflicts[$i_2]);
					}
				}
			}
			$this->PartitionConflicts = $val_2;
		}
		foreach(get_object_vars($sc) as $k => $v) {
			switch($k) {
			case 'ID':
			case 'DeviceName':
			case 'Caption':
			case 'Model':
			case 'SerialNumber':
			case 'Size':
			case 'Partitions':
			case 'DeviceParents':
			case 'Flags':
			case 'Cylinders':
			case 'Heads':
			case 'Sectors':
			case 'SectorSize':
			case 'PartitionConflicts':
				break;
			default:
				$this->__unknown_properties[$k] = $v;
			}
		}
	}

	/**
	 * Coerce a stdClass into a new strongly-typed DiskDrive object.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return DiskDrive
	 */
	public static function createFromStdclass(\stdClass $sc): \Comet\DiskDrive
	{
		$retn = new DiskDrive();
		$retn->inflateFrom($sc);
		return $retn;
	}

	/**
	 * Coerce a plain PHP array into a new strongly-typed DiskDrive object.
	 * Because the Comet Server requires strict distinction between empty objects ({}) and arrays ([]),
	 * the result of this method may not be safe to re-submit to the Comet Server.
	 *
	 * @param array $arr Object data as PHP array
	 * @return DiskDrive
	 */
	public static function createFromArray(array $arr): \Comet\DiskDrive
	{
		$stdClass = json_decode(json_encode($arr, JSON_UNESCAPED_SLASHES));
		if (is_array($stdClass) && count($stdClass) === 0) {
			$stdClass = new \stdClass();
		}
		return self::createFromStdclass($stdClass);
	}

	/**
	 * Coerce a JSON string into a new strongly-typed DiskDrive object.
	 *
	 * @param string $JsonString Object data as JSON string
	 * @return DiskDrive
	 */
	public static function createFromJSON(string $JsonString): \Comet\DiskDrive
	{
		$decodedJsonObject = json_decode($JsonString); // as stdClass
		if (\json_last_error() != \JSON_ERROR_NONE) {
			throw new \Exception("JSON decode failed: " . \json_last_error_msg(), \json_last_error());
		}
		$retn = new DiskDrive();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}

	/**
	 * Convert this DiskDrive object into a plain PHP array.
	 *
	 * Unknown properties may still be represented as \stdClass objects.
	 *
	 * @param bool $for_json_encode Represent key-value maps as \stdClass instead of plain PHP arrays
	 * @return array
	 */
	public function toArray(bool $for_json_encode = false): array
	{
		$ret = [];
		$ret["ID"] = $this->ID;
		$ret["DeviceName"] = $this->DeviceName;
		$ret["Caption"] = $this->Caption;
		$ret["Model"] = $this->Model;
		$ret["SerialNumber"] = $this->SerialNumber;
		$ret["Size"] = $this->Size;
		{
			$c0 = [];
			for($i0 = 0; $i0 < count($this->Partitions); ++$i0) {
				if ( $this->Partitions[$i0] === null ) {
					$val0 = $for_json_encode ? (object)[] : [];
				} else {
					$val0 = $this->Partitions[$i0]->toArray($for_json_encode);
				}
				$c0[] = $val0;
			}
			$ret["Partitions"] = $c0;
		}
		{
			$c0 = [];
			for($i0 = 0; $i0 < count($this->DeviceParents); ++$i0) {
				$val0 = $this->DeviceParents[$i0];
				$c0[] = $val0;
			}
			$ret["DeviceParents"] = $c0;
		}
		$ret["Flags"] = $this->Flags;
		$ret["Cylinders"] = $this->Cylinders;
		$ret["Heads"] = $this->Heads;
		$ret["Sectors"] = $this->Sectors;
		$ret["SectorSize"] = $this->SectorSize;
		{
			$c0 = [];
			for($i0 = 0; $i0 < count($this->PartitionConflicts); ++$i0) {
				if ( $this->PartitionConflicts[$i0] === null ) {
					$val0 = $for_json_encode ? (object)[] : [];
				} else {
					$val0 = $this->PartitionConflicts[$i0]->toArray($for_json_encode);
				}
				$c0[] = $val0;
			}
			$ret["PartitionConflicts"] = $c0;
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
	}

}

