<?php

/**
 * Copyright (c) 2018-2025 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 *
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

/**
 * BrowseVMwareHostsResponse contains a list of VMware Datastores for a specific VMware Datacenter,
 * when remotely browsing a VMware vSphere connection.
 */
class BrowseVMwareDatastoresResponse {

	/**
	 * If the operation was successful, the status will be in the 200-299 range.
	 *
	 * @var int
	 */
	public $Status = 0;

	/**
	 * @var string
	 */
	public $Message = "";

	/**
	 * @var \Comet\VMwareDatastoreInfo[]
	 */
	public $Datastores = [];

	/**
	 * Preserve unknown properties when dealing with future server versions.
	 *
	 * @see BrowseVMwareDatastoresResponse::RemoveUnknownProperties() Remove all unknown properties
	 * @var array
	 */
	private $__unknown_properties = [];

	/**
	 * Replace the content of this BrowseVMwareDatastoresResponse object from a PHP \stdClass.
	 * The data could be supplied from an API call after json_decode(...); or generated manually.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return void
	 */
	protected function inflateFrom(\stdClass $sc)
	{
		if (property_exists($sc, 'Status')) {
			$this->Status = (int)($sc->Status);
		}
		if (property_exists($sc, 'Message')) {
			$this->Message = (string)($sc->Message);
		}
		if (property_exists($sc, 'Datastores')) {
			$val_2 = [];
			if ($sc->Datastores !== null) {
				for($i_2 = 0; $i_2 < count($sc->Datastores); ++$i_2) {
					if (is_array($sc->Datastores[$i_2]) && count($sc->Datastores[$i_2]) === 0) {
					// Work around edge case in json_decode--json_encode stdClass conversion
						$val_2[] = \Comet\VMwareDatastoreInfo::createFromStdclass(new \stdClass());
					} else {
						$val_2[] = \Comet\VMwareDatastoreInfo::createFromStdclass($sc->Datastores[$i_2]);
					}
				}
			}
			$this->Datastores = $val_2;
		}
		foreach(get_object_vars($sc) as $k => $v) {
			switch($k) {
			case 'Status':
			case 'Message':
			case 'Datastores':
				break;
			default:
				$this->__unknown_properties[$k] = $v;
			}
		}
	}

	/**
	 * Coerce a stdClass into a new strongly-typed BrowseVMwareDatastoresResponse object.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return BrowseVMwareDatastoresResponse
	 */
	public static function createFromStdclass(\stdClass $sc): \Comet\BrowseVMwareDatastoresResponse
	{
		$retn = new BrowseVMwareDatastoresResponse();
		$retn->inflateFrom($sc);
		return $retn;
	}

	/**
	 * Coerce a plain PHP array into a new strongly-typed BrowseVMwareDatastoresResponse object.
	 * Because the Comet Server requires strict distinction between empty objects ({}) and arrays ([]),
	 * the result of this method may not be safe to re-submit to the Comet Server.
	 *
	 * @param array $arr Object data as PHP array
	 * @return BrowseVMwareDatastoresResponse
	 */
	public static function createFromArray(array $arr): \Comet\BrowseVMwareDatastoresResponse
	{
		$stdClass = json_decode(json_encode($arr, JSON_UNESCAPED_SLASHES));
		if (is_array($stdClass) && count($stdClass) === 0) {
			$stdClass = new \stdClass();
		}
		return self::createFromStdclass($stdClass);
	}

	/**
	 * Coerce a JSON string into a new strongly-typed BrowseVMwareDatastoresResponse object.
	 *
	 * @param string $JsonString Object data as JSON string
	 * @return BrowseVMwareDatastoresResponse
	 */
	public static function createFromJSON(string $JsonString): \Comet\BrowseVMwareDatastoresResponse
	{
		$decodedJsonObject = json_decode($JsonString); // as stdClass
		if (\json_last_error() != \JSON_ERROR_NONE) {
			throw new \Exception("JSON decode failed: " . \json_last_error_msg(), \json_last_error());
		}
		$retn = new BrowseVMwareDatastoresResponse();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}

	/**
	 * Convert this BrowseVMwareDatastoresResponse object into a plain PHP array.
	 *
	 * Unknown properties may still be represented as \stdClass objects.
	 *
	 * @param bool $for_json_encode Represent key-value maps as \stdClass instead of plain PHP arrays
	 * @return array
	 */
	public function toArray(bool $for_json_encode = false): array
	{
		$ret = [];
		$ret["Status"] = $this->Status;
		$ret["Message"] = $this->Message;
		{
			$c0 = [];
			for($i0 = 0; $i0 < count($this->Datastores); ++$i0) {
				if ( $this->Datastores[$i0] === null ) {
					$val0 = $for_json_encode ? (object)[] : [];
				} else {
					$val0 = $this->Datastores[$i0]->toArray($for_json_encode);
				}
				$c0[] = $val0;
			}
			$ret["Datastores"] = $c0;
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

