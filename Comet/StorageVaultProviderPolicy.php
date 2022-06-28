<?php

/**
 * Copyright (c) 2018-2022 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 *
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

class StorageVaultProviderPolicy {

	/**
	 * @var boolean
	 */
	public $ShouldRestrictProviderList = false;

	/**
	 * @var int[]
	 */
	public $AllowedProvidersWhenRestricted = [];

	/**
	 * Preserve unknown properties when dealing with future server versions.
	 *
	 * @see StorageVaultProviderPolicy::RemoveUnknownProperties() Remove all unknown properties
	 * @var array
	 */
	private $__unknown_properties = [];

	/**
	 * Replace the content of this StorageVaultProviderPolicy object from a PHP \stdClass.
	 * The data could be supplied from an API call after json_decode(...); or generated manually.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return void
	 */
	protected function inflateFrom(\stdClass $sc)
	{
		if (property_exists($sc, 'ShouldRestrictProviderList')) {
			$this->ShouldRestrictProviderList = (bool)($sc->ShouldRestrictProviderList);
		}
		if (property_exists($sc, 'AllowedProvidersWhenRestricted')) {
			$val_2 = [];
			if ($sc->AllowedProvidersWhenRestricted !== null) {
				for($i_2 = 0; $i_2 < count($sc->AllowedProvidersWhenRestricted); ++$i_2) {
					$val_2[] = (int)($sc->AllowedProvidersWhenRestricted[$i_2]);
				}
			}
			$this->AllowedProvidersWhenRestricted = $val_2;
		}
		foreach(get_object_vars($sc) as $k => $v) {
			switch($k) {
			case 'ShouldRestrictProviderList':
			case 'AllowedProvidersWhenRestricted':
				break;
			default:
				$this->__unknown_properties[$k] = $v;
			}
		}
	}

	/**
	 * Coerce a stdClass into a new strongly-typed StorageVaultProviderPolicy object.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return StorageVaultProviderPolicy
	 */
	public static function createFromStdclass(\stdClass $sc): \Comet\StorageVaultProviderPolicy
	{
		$retn = new StorageVaultProviderPolicy();
		$retn->inflateFrom($sc);
		return $retn;
	}

	/**
	 * Coerce a plain PHP array into a new strongly-typed StorageVaultProviderPolicy object.
	 * Because the Comet Server requires strict distinction between empty objects ({}) and arrays ([]),
	 * the result of this method may not be safe to re-submit to the Comet Server.
	 *
	 * @param array $arr Object data as PHP array
	 * @return StorageVaultProviderPolicy
	 */
	public static function createFromArray(array $arr): \Comet\StorageVaultProviderPolicy
	{
		$stdClass = json_decode(json_encode($arr, JSON_UNESCAPED_SLASHES));
		if (is_array($stdClass) && count($stdClass) === 0) {
			$stdClass = new \stdClass();
		}
		return self::createFromStdclass($stdClass);
	}

	/**
	 * Coerce a plain PHP array into a new strongly-typed StorageVaultProviderPolicy object.
	 * Because the Comet Server requires strict distinction between empty objects ({}) and arrays ([]),
	 * the result of this method may not be safe to re-submit to the Comet Server.
	 *
	 * @deprecated 3.0.0 Unsafe for round-trip server traversal. You should either
	 *             (A) acknowledge this and continue by switching to createFromArray, or
	 *             (b) switch to the roundtrip-safe createFromStdclass alternative.
	 * @param array $arr Object data as PHP array
	 * @return StorageVaultProviderPolicy
	 */
	public static function createFrom(array $arr): \Comet\StorageVaultProviderPolicy
	{
		return self::createFromArray($arr);
	}

	/**
	 * Coerce a JSON string into a new strongly-typed StorageVaultProviderPolicy object.
	 *
	 * @param string $JsonString Object data as JSON string
	 * @return StorageVaultProviderPolicy
	 */
	public static function createFromJSON(string $JsonString): \Comet\StorageVaultProviderPolicy
	{
		$decodedJsonObject = json_decode($JsonString); // as stdClass
		if (\json_last_error() != \JSON_ERROR_NONE) {
			throw new \Exception("JSON decode failed: " . \json_last_error_msg());
		}
		$retn = new StorageVaultProviderPolicy();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}

	/**
	 * Convert this StorageVaultProviderPolicy object into a plain PHP array.
	 *
	 * Unknown properties may still be represented as \stdClass objects.
	 *
	 * @param bool $for_json_encode Represent empty key-value maps as \stdClass instead of plain PHP arrays
	 * @return array
	 */
	public function toArray(bool $for_json_encode = false): array
	{
		$ret = [];
		$ret["ShouldRestrictProviderList"] = $this->ShouldRestrictProviderList;
		{
			$c0 = [];
			for($i0 = 0; $i0 < count($this->AllowedProvidersWhenRestricted); ++$i0) {
				$val0 = $this->AllowedProvidersWhenRestricted[$i0];
				$c0[] = $val0;
			}
			$ret["AllowedProvidersWhenRestricted"] = $c0;
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

