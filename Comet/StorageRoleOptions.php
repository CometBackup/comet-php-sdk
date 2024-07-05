<?php

/**
 * Copyright (c) 2018-2024 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 *
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

class StorageRoleOptions {

	/**
	 * @var boolean
	 */
	public $RoleEnabled = false;

	/**
	 * @var \Comet\DestinationLocation
	 */
	public $Storage = null;

	/**
	 * @var \Comet\LocalStorageDirectory[]
	 * @deprecated 17.3.5 This member has been deprecated since Comet version 17.3.5
	 */
	public $LocalStorage_Legacy = [];

	/**
	 * @var \Comet\ReplicaServer[]
	 */
	public $ReplicateTo = [];

	/**
	 * Preserve unknown properties when dealing with future server versions.
	 *
	 * @see StorageRoleOptions::RemoveUnknownProperties() Remove all unknown properties
	 * @var array
	 */
	private $__unknown_properties = [];

	/**
	 * Replace the content of this StorageRoleOptions object from a PHP \stdClass.
	 * The data could be supplied from an API call after json_decode(...); or generated manually.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return void
	 */
	protected function inflateFrom(\stdClass $sc)
	{
		if (property_exists($sc, 'RoleEnabled')) {
			$this->RoleEnabled = (bool)($sc->RoleEnabled);
		}
		if (property_exists($sc, 'Storage')) {
			if (is_array($sc->Storage) && count($sc->Storage) === 0) {
			// Work around edge case in json_decode--json_encode stdClass conversion
				$this->Storage = \Comet\DestinationLocation::createFromStdclass(new \stdClass());
			} else {
				$this->Storage = \Comet\DestinationLocation::createFromStdclass($sc->Storage);
			}
		}
		if (property_exists($sc, 'LocalStorage') && !is_null($sc->LocalStorage)) {
			$val_2 = [];
			if ($sc->LocalStorage !== null) {
				for($i_2 = 0; $i_2 < count($sc->LocalStorage); ++$i_2) {
					if (is_array($sc->LocalStorage[$i_2]) && count($sc->LocalStorage[$i_2]) === 0) {
					// Work around edge case in json_decode--json_encode stdClass conversion
						$val_2[] = \Comet\LocalStorageDirectory::createFromStdclass(new \stdClass());
					} else {
						$val_2[] = \Comet\LocalStorageDirectory::createFromStdclass($sc->LocalStorage[$i_2]);
					}
				}
			}
			$this->LocalStorage_Legacy = $val_2;
		}
		if (property_exists($sc, 'ReplicateTo')) {
			$val_2 = [];
			if ($sc->ReplicateTo !== null) {
				for($i_2 = 0; $i_2 < count($sc->ReplicateTo); ++$i_2) {
					if (is_array($sc->ReplicateTo[$i_2]) && count($sc->ReplicateTo[$i_2]) === 0) {
					// Work around edge case in json_decode--json_encode stdClass conversion
						$val_2[] = \Comet\ReplicaServer::createFromStdclass(new \stdClass());
					} else {
						$val_2[] = \Comet\ReplicaServer::createFromStdclass($sc->ReplicateTo[$i_2]);
					}
				}
			}
			$this->ReplicateTo = $val_2;
		}
		foreach(get_object_vars($sc) as $k => $v) {
			switch($k) {
			case 'RoleEnabled':
			case 'Storage':
			case 'LocalStorage':
			case 'ReplicateTo':
				break;
			default:
				$this->__unknown_properties[$k] = $v;
			}
		}
	}

	/**
	 * Coerce a stdClass into a new strongly-typed StorageRoleOptions object.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return StorageRoleOptions
	 */
	public static function createFromStdclass(\stdClass $sc): \Comet\StorageRoleOptions
	{
		$retn = new StorageRoleOptions();
		$retn->inflateFrom($sc);
		return $retn;
	}

	/**
	 * Coerce a plain PHP array into a new strongly-typed StorageRoleOptions object.
	 * Because the Comet Server requires strict distinction between empty objects ({}) and arrays ([]),
	 * the result of this method may not be safe to re-submit to the Comet Server.
	 *
	 * @param array $arr Object data as PHP array
	 * @return StorageRoleOptions
	 */
	public static function createFromArray(array $arr): \Comet\StorageRoleOptions
	{
		$stdClass = json_decode(json_encode($arr, JSON_UNESCAPED_SLASHES));
		if (is_array($stdClass) && count($stdClass) === 0) {
			$stdClass = new \stdClass();
		}
		return self::createFromStdclass($stdClass);
	}

	/**
	 * Coerce a JSON string into a new strongly-typed StorageRoleOptions object.
	 *
	 * @param string $JsonString Object data as JSON string
	 * @return StorageRoleOptions
	 */
	public static function createFromJSON(string $JsonString): \Comet\StorageRoleOptions
	{
		$decodedJsonObject = json_decode($JsonString); // as stdClass
		if (\json_last_error() != \JSON_ERROR_NONE) {
			throw new \Exception("JSON decode failed: " . \json_last_error_msg(), \json_last_error());
		}
		$retn = new StorageRoleOptions();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}

	/**
	 * Convert this StorageRoleOptions object into a plain PHP array.
	 *
	 * Unknown properties may still be represented as \stdClass objects.
	 *
	 * @param bool $for_json_encode Represent key-value maps as \stdClass instead of plain PHP arrays
	 * @return array
	 */
	public function toArray(bool $for_json_encode = false): array
	{
		$ret = [];
		$ret["RoleEnabled"] = $this->RoleEnabled;
		if ( $this->Storage === null ) {
			$ret["Storage"] = $for_json_encode ? (object)[] : [];
		} else {
			$ret["Storage"] = $this->Storage->toArray($for_json_encode);
		}
		{
			$c0 = [];
			for($i0 = 0; $i0 < count($this->LocalStorage_Legacy); ++$i0) {
				if ( $this->LocalStorage_Legacy[$i0] === null ) {
					$val0 = $for_json_encode ? (object)[] : [];
				} else {
					$val0 = $this->LocalStorage_Legacy[$i0]->toArray($for_json_encode);
				}
				$c0[] = $val0;
			}
			$ret["LocalStorage"] = $c0;
		}
		{
			$c0 = [];
			for($i0 = 0; $i0 < count($this->ReplicateTo); ++$i0) {
				if ( $this->ReplicateTo[$i0] === null ) {
					$val0 = $for_json_encode ? (object)[] : [];
				} else {
					$val0 = $this->ReplicateTo[$i0]->toArray($for_json_encode);
				}
				$c0[] = $val0;
			}
			$ret["ReplicateTo"] = $c0;
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
		if ($this->Storage !== null) {
			$this->Storage->RemoveUnknownProperties();
		}
	}

}

