<?php

/**
 * Copyright (c) 2018-2025 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 *
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

/**
 * VMwareRestoreTargetOptions is used when restoring a virtual machine backup job into VMware, using
 * the RESTORETYPE_VMHOST option.
 * This type is available in Comet 24.12.x and later.
 */
class VMwareRestoreTargetOptions {

	/**
	 * The name of the VMware Datacenter to restore into. If blank and there is only one Datacenter in
	 * the vSphere connection, it is chosen.
	 *
	 * @var string
	 */
	public $Datacenter = "";

	/**
	 * The name of the VMware Host within the VMware Datacenter to restore into. If blank and there is
	 * only one Datacenter in the vSphere connection, it is chosen.
	 *
	 * @var string
	 */
	public $Host = "";

	/**
	 * The name of the VMware Datastore on the VMware Host to restore into. If blank and there is only
	 * one Datacenter in the vSphere connection, it is chosen.
	 *
	 * @var string
	 */
	public $DatastorePath = "";

	/**
	 * The name of the VMware Network on the VMware Host to restore into. If blank and there is only one
	 * network on the target vSphere connection, it is chosen.
	 *
	 * @var string
	 */
	public $Network = "";

	/**
	 * @var \Comet\VMwareConnection
	 */
	public $Connection = null;

	/**
	 * Preserve unknown properties when dealing with future server versions.
	 *
	 * @see VMwareRestoreTargetOptions::RemoveUnknownProperties() Remove all unknown properties
	 * @var array
	 */
	private $__unknown_properties = [];

	/**
	 * Replace the content of this VMwareRestoreTargetOptions object from a PHP \stdClass.
	 * The data could be supplied from an API call after json_decode(...); or generated manually.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return void
	 */
	protected function inflateFrom(\stdClass $sc)
	{
		if (property_exists($sc, 'Datacenter')) {
			$this->Datacenter = (string)($sc->Datacenter);
		}
		if (property_exists($sc, 'Host')) {
			$this->Host = (string)($sc->Host);
		}
		if (property_exists($sc, 'DatastorePath')) {
			$this->DatastorePath = (string)($sc->DatastorePath);
		}
		if (property_exists($sc, 'Network')) {
			$this->Network = (string)($sc->Network);
		}
		if (property_exists($sc, 'Connection')) {
			if (is_array($sc->Connection) && count($sc->Connection) === 0) {
			// Work around edge case in json_decode--json_encode stdClass conversion
				$this->Connection = \Comet\VMwareConnection::createFromStdclass(new \stdClass());
			} else {
				$this->Connection = \Comet\VMwareConnection::createFromStdclass($sc->Connection);
			}
		}
		foreach(get_object_vars($sc) as $k => $v) {
			switch($k) {
			case 'Datacenter':
			case 'Host':
			case 'DatastorePath':
			case 'Network':
			case 'Connection':
				break;
			default:
				$this->__unknown_properties[$k] = $v;
			}
		}
	}

	/**
	 * Coerce a stdClass into a new strongly-typed VMwareRestoreTargetOptions object.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return VMwareRestoreTargetOptions
	 */
	public static function createFromStdclass(\stdClass $sc): \Comet\VMwareRestoreTargetOptions
	{
		$retn = new VMwareRestoreTargetOptions();
		$retn->inflateFrom($sc);
		return $retn;
	}

	/**
	 * Coerce a plain PHP array into a new strongly-typed VMwareRestoreTargetOptions object.
	 * Because the Comet Server requires strict distinction between empty objects ({}) and arrays ([]),
	 * the result of this method may not be safe to re-submit to the Comet Server.
	 *
	 * @param array $arr Object data as PHP array
	 * @return VMwareRestoreTargetOptions
	 */
	public static function createFromArray(array $arr): \Comet\VMwareRestoreTargetOptions
	{
		$stdClass = json_decode(json_encode($arr, JSON_UNESCAPED_SLASHES));
		if (is_array($stdClass) && count($stdClass) === 0) {
			$stdClass = new \stdClass();
		}
		return self::createFromStdclass($stdClass);
	}

	/**
	 * Coerce a JSON string into a new strongly-typed VMwareRestoreTargetOptions object.
	 *
	 * @param string $JsonString Object data as JSON string
	 * @return VMwareRestoreTargetOptions
	 */
	public static function createFromJSON(string $JsonString): \Comet\VMwareRestoreTargetOptions
	{
		$decodedJsonObject = json_decode($JsonString); // as stdClass
		if (\json_last_error() != \JSON_ERROR_NONE) {
			throw new \Exception("JSON decode failed: " . \json_last_error_msg(), \json_last_error());
		}
		$retn = new VMwareRestoreTargetOptions();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}

	/**
	 * Convert this VMwareRestoreTargetOptions object into a plain PHP array.
	 *
	 * Unknown properties may still be represented as \stdClass objects.
	 *
	 * @param bool $for_json_encode Represent key-value maps as \stdClass instead of plain PHP arrays
	 * @return array
	 */
	public function toArray(bool $for_json_encode = false): array
	{
		$ret = [];
		$ret["Datacenter"] = $this->Datacenter;
		$ret["Host"] = $this->Host;
		$ret["DatastorePath"] = $this->DatastorePath;
		$ret["Network"] = $this->Network;
		if ( $this->Connection === null ) {
			$ret["Connection"] = $for_json_encode ? (object)[] : [];
		} else {
			$ret["Connection"] = $this->Connection->toArray($for_json_encode);
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
		if ($this->Connection !== null) {
			$this->Connection->RemoveUnknownProperties();
		}
	}

}

