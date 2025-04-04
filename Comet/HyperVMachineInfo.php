<?php

/**
 * Copyright (c) 2018-2025 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 *
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

class HyperVMachineInfo {

	/**
	 * @var string
	 */
	public $ID = "";

	/**
	 * @var string
	 */
	public $DisplayName = "";

	/**
	 * @var int
	 * This field is available in Comet 24.12.x and later.
	 */
	public $MemoryLimitMB = 0;

	/**
	 * @var int
	 * This field is available in Comet 24.12.x and later.
	 */
	public $CPUCores = 0;

	/**
	 * @var string[]
	 * This field is available in Comet 24.12.x and later.
	 */
	public $HardDrives = [];

	/**
	 * @var int
	 * This field is available in Comet 24.12.x and later.
	 */
	public $Generation = 0;

	/**
	 * @var string
	 * This field is available in Comet 24.12.x and later.
	 */
	public $ConfigFilePath = "";

	/**
	 * Preserve unknown properties when dealing with future server versions.
	 *
	 * @see HyperVMachineInfo::RemoveUnknownProperties() Remove all unknown properties
	 * @var array
	 */
	private $__unknown_properties = [];

	/**
	 * Replace the content of this HyperVMachineInfo object from a PHP \stdClass.
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
		if (property_exists($sc, 'Name')) {
			$this->DisplayName = (string)($sc->Name);
		}
		if (property_exists($sc, 'MemoryLimitMB')) {
			$this->MemoryLimitMB = (int)($sc->MemoryLimitMB);
		}
		if (property_exists($sc, 'CPUCores')) {
			$this->CPUCores = (int)($sc->CPUCores);
		}
		if (property_exists($sc, 'HardDrives')) {
			$val_2 = [];
			if ($sc->HardDrives !== null) {
				for($i_2 = 0; $i_2 < count($sc->HardDrives); ++$i_2) {
					$val_2[] = (string)($sc->HardDrives[$i_2]);
				}
			}
			$this->HardDrives = $val_2;
		}
		if (property_exists($sc, 'Generation')) {
			$this->Generation = (int)($sc->Generation);
		}
		if (property_exists($sc, 'ConfigFilePath')) {
			$this->ConfigFilePath = (string)($sc->ConfigFilePath);
		}
		foreach(get_object_vars($sc) as $k => $v) {
			switch($k) {
			case 'ID':
			case 'Name':
			case 'MemoryLimitMB':
			case 'CPUCores':
			case 'HardDrives':
			case 'Generation':
			case 'ConfigFilePath':
				break;
			default:
				$this->__unknown_properties[$k] = $v;
			}
		}
	}

	/**
	 * Coerce a stdClass into a new strongly-typed HyperVMachineInfo object.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return HyperVMachineInfo
	 */
	public static function createFromStdclass(\stdClass $sc): \Comet\HyperVMachineInfo
	{
		$retn = new HyperVMachineInfo();
		$retn->inflateFrom($sc);
		return $retn;
	}

	/**
	 * Coerce a plain PHP array into a new strongly-typed HyperVMachineInfo object.
	 * Because the Comet Server requires strict distinction between empty objects ({}) and arrays ([]),
	 * the result of this method may not be safe to re-submit to the Comet Server.
	 *
	 * @param array $arr Object data as PHP array
	 * @return HyperVMachineInfo
	 */
	public static function createFromArray(array $arr): \Comet\HyperVMachineInfo
	{
		$stdClass = json_decode(json_encode($arr, JSON_UNESCAPED_SLASHES));
		if (is_array($stdClass) && count($stdClass) === 0) {
			$stdClass = new \stdClass();
		}
		return self::createFromStdclass($stdClass);
	}

	/**
	 * Coerce a JSON string into a new strongly-typed HyperVMachineInfo object.
	 *
	 * @param string $JsonString Object data as JSON string
	 * @return HyperVMachineInfo
	 */
	public static function createFromJSON(string $JsonString): \Comet\HyperVMachineInfo
	{
		$decodedJsonObject = json_decode($JsonString); // as stdClass
		if (\json_last_error() != \JSON_ERROR_NONE) {
			throw new \Exception("JSON decode failed: " . \json_last_error_msg(), \json_last_error());
		}
		$retn = new HyperVMachineInfo();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}

	/**
	 * Convert this HyperVMachineInfo object into a plain PHP array.
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
		$ret["Name"] = $this->DisplayName;
		$ret["MemoryLimitMB"] = $this->MemoryLimitMB;
		$ret["CPUCores"] = $this->CPUCores;
		{
			$c0 = [];
			for($i0 = 0; $i0 < count($this->HardDrives); ++$i0) {
				$val0 = $this->HardDrives[$i0];
				$c0[] = $val0;
			}
			$ret["HardDrives"] = $c0;
		}
		$ret["Generation"] = $this->Generation;
		$ret["ConfigFilePath"] = $this->ConfigFilePath;

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

