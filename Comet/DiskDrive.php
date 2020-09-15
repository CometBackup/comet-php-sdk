<?php

/**
 * Copyright (c) 2018-2020 Comet Licensing Ltd.
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
	 * @var int
	 */
	public $Size = 0;

	/**
	 * @var \Comet\Partition[]
	 */
	public $Partitions = [];

	/**
	 * @var int
	 */
	public $Flags = 0;

	/**
	 * @var int
	 */
	public $Cylinders = 0;

	/**
	 * @var int
	 */
	public $Heads = 0;

	/**
	 * @var int
	 */
	public $Sectors = 0;

	/**
	 * @var int
	 */
	public $SectorSize = 0;

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
		foreach(get_object_vars($sc) as $k => $v) {
			switch($k) {
			case 'ID':
			case 'DeviceName':
			case 'Caption':
			case 'Model':
			case 'SerialNumber':
			case 'Size':
			case 'Partitions':
			case 'Flags':
			case 'Cylinders':
			case 'Heads':
			case 'Sectors':
			case 'SectorSize':
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
	public static function createFromStdclass(\stdClass $sc)
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
	public static function createFromArray(array $arr)
	{
		$stdClass = json_decode(json_encode($arr));
		if (is_array($stdClass) && count($stdClass) === 0) {
			$stdClass = new \stdClass();
		}
		return self::createFromStdclass($stdClass);
	}

	/**
	 * Coerce a plain PHP array into a new strongly-typed DiskDrive object.
	 * Because the Comet Server requires strict distinction between empty objects ({}) and arrays ([]),
	 * the result of this method may not be safe to re-submit to the Comet Server.
	 *
	 * @deprecated 3.0.0 Unsafe for round-trip server traversal. You should either
	 *             (A) acknowledge this and continue by switching to createFromArray, or
	 *             (b) switch to the roundtrip-safe createFromStdclass alternative.
	 * @param array $arr Object data as PHP array
	 * @return DiskDrive
	 */
	public static function createFrom(array $arr)
	{
		return self::createFromArray($arr);
	}

	/**
	 * Coerce a JSON string into a new strongly-typed DiskDrive object.
	 *
	 * @param string $JsonString Object data as JSON string
	 * @return DiskDrive
	 */
	public static function createFromJSON($JsonString)
	{
		$decodedJsonObject = json_decode($JsonString); // as stdClass
		if (\json_last_error() != \JSON_ERROR_NONE) {
			throw new \Exception("JSON decode failed: " . \json_last_error_msg());
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
	 * @param bool $for_json_encode Represent empty key-value maps as \stdClass instead of plain PHP arrays
	 * @return array
	 */
	public function toArray($for_json_encode = false)
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
		$ret["Flags"] = $this->Flags;
		$ret["Cylinders"] = $this->Cylinders;
		$ret["Heads"] = $this->Heads;
		$ret["Sectors"] = $this->Sectors;
		$ret["SectorSize"] = $this->SectorSize;

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
	}

}

