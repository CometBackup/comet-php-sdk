<?php

/**
 * Copyright (c) 2018-2025 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 *
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

/**
 * PVEVM describes a single Proxmox virtual machine or container.
 */
class PVEVM {

	/**
	 * @var string
	 */
	public $CPU = "";

	/**
	 * @var \Comet\PVEDisk[]
	 */
	public $Disks = [];

	/**
	 * @var string
	 */
	public $Memory = "";

	/**
	 * @var string
	 */
	public $Name = "";

	/**
	 * @var string
	 */
	public $Node = "";

	/**
	 * @var string
	 */
	public $OSType = "";

	/**
	 * @var boolean
	 */
	public $Running = false;

	/**
	 * @var string
	 */
	public $Type = "";

	/**
	 * String type, but always contains an integer value
	 *
	 * @var string
	 */
	public $VMID = "";

	/**
	 * Preserve unknown properties when dealing with future server versions.
	 *
	 * @see PVEVM::RemoveUnknownProperties() Remove all unknown properties
	 * @var array
	 */
	private $__unknown_properties = [];

	/**
	 * Replace the content of this PVEVM object from a PHP \stdClass.
	 * The data could be supplied from an API call after json_decode(...); or generated manually.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return void
	 */
	protected function inflateFrom(\stdClass $sc)
	{
		if (property_exists($sc, 'CPU')) {
			$this->CPU = (string)($sc->CPU);
		}
		if (property_exists($sc, 'Disks')) {
			$val_2 = [];
			if ($sc->Disks !== null) {
				for($i_2 = 0; $i_2 < count($sc->Disks); ++$i_2) {
					if (is_array($sc->Disks[$i_2]) && count($sc->Disks[$i_2]) === 0) {
					// Work around edge case in json_decode--json_encode stdClass conversion
						$val_2[] = \Comet\PVEDisk::createFromStdclass(new \stdClass());
					} else {
						$val_2[] = \Comet\PVEDisk::createFromStdclass($sc->Disks[$i_2]);
					}
				}
			}
			$this->Disks = $val_2;
		}
		if (property_exists($sc, 'Memory')) {
			$this->Memory = (string)($sc->Memory);
		}
		if (property_exists($sc, 'Name')) {
			$this->Name = (string)($sc->Name);
		}
		if (property_exists($sc, 'Node')) {
			$this->Node = (string)($sc->Node);
		}
		if (property_exists($sc, 'OSType')) {
			$this->OSType = (string)($sc->OSType);
		}
		if (property_exists($sc, 'Running')) {
			$this->Running = (bool)($sc->Running);
		}
		if (property_exists($sc, 'Type')) {
			$this->Type = (string)($sc->Type);
		}
		if (property_exists($sc, 'VMID')) {
			$this->VMID = (string)($sc->VMID);
		}
		foreach(get_object_vars($sc) as $k => $v) {
			switch($k) {
			case 'CPU':
			case 'Disks':
			case 'Memory':
			case 'Name':
			case 'Node':
			case 'OSType':
			case 'Running':
			case 'Type':
			case 'VMID':
				break;
			default:
				$this->__unknown_properties[$k] = $v;
			}
		}
	}

	/**
	 * Coerce a stdClass into a new strongly-typed PVEVM object.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return PVEVM
	 */
	public static function createFromStdclass(\stdClass $sc): \Comet\PVEVM
	{
		$retn = new PVEVM();
		$retn->inflateFrom($sc);
		return $retn;
	}

	/**
	 * Coerce a plain PHP array into a new strongly-typed PVEVM object.
	 * Because the Comet Server requires strict distinction between empty objects ({}) and arrays ([]),
	 * the result of this method may not be safe to re-submit to the Comet Server.
	 *
	 * @param array $arr Object data as PHP array
	 * @return PVEVM
	 */
	public static function createFromArray(array $arr): \Comet\PVEVM
	{
		$stdClass = json_decode(json_encode($arr, JSON_UNESCAPED_SLASHES));
		if (is_array($stdClass) && count($stdClass) === 0) {
			$stdClass = new \stdClass();
		}
		return self::createFromStdclass($stdClass);
	}

	/**
	 * Coerce a JSON string into a new strongly-typed PVEVM object.
	 *
	 * @param string $JsonString Object data as JSON string
	 * @return PVEVM
	 */
	public static function createFromJSON(string $JsonString): \Comet\PVEVM
	{
		$decodedJsonObject = json_decode($JsonString); // as stdClass
		if (\json_last_error() != \JSON_ERROR_NONE) {
			throw new \Exception("JSON decode failed: " . \json_last_error_msg(), \json_last_error());
		}
		$retn = new PVEVM();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}

	/**
	 * Convert this PVEVM object into a plain PHP array.
	 *
	 * Unknown properties may still be represented as \stdClass objects.
	 *
	 * @param bool $for_json_encode Represent key-value maps as \stdClass instead of plain PHP arrays
	 * @return array
	 */
	public function toArray(bool $for_json_encode = false): array
	{
		$ret = [];
		$ret["CPU"] = $this->CPU;
		{
			$c0 = [];
			for($i0 = 0; $i0 < count($this->Disks); ++$i0) {
				if ( $this->Disks[$i0] === null ) {
					$val0 = $for_json_encode ? (object)[] : [];
				} else {
					$val0 = $this->Disks[$i0]->toArray($for_json_encode);
				}
				$c0[] = $val0;
			}
			$ret["Disks"] = $c0;
		}
		$ret["Memory"] = $this->Memory;
		$ret["Name"] = $this->Name;
		$ret["Node"] = $this->Node;
		$ret["OSType"] = $this->OSType;
		$ret["Running"] = $this->Running;
		$ret["Type"] = $this->Type;
		$ret["VMID"] = $this->VMID;

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

