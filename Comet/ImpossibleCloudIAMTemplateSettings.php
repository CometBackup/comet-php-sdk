<?php

/**
 * Copyright (c) 2018-2025 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 *
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

class ImpossibleCloudIAMTemplateSettings {

	/**
	 * @var string
	 */
	public $AccessKey = "";

	/**
	 * @var string
	 */
	public $SecretKey = "";

	/**
	 * Optional. The region for both IAM communication and for provisioning new buckets. If blank, uses
	 * the default region for Impossible Cloud (eu-central-2).
	 *
	 * @var string
	 */
	public $Region = "";

	/**
	 * @var boolean
	 * @deprecated 23.x.x This member has been deprecated since Comet version 23.x.x
	 */
	public $UseObjectLock_Legacy_DoNotUse = false;

	/**
	 * Control whether the resulting Storage Vaults are configured for Object Lock. One of the
	 * OBJECT_LOCK_ constants
	 *
	 * @var int
	 */
	public $ObjectLockMode = 0;

	/**
	 * @var int
	 */
	public $ObjectLockDays = 0;

	/**
	 * Control whether the "Allow removal of deleted files" checkbox is enabled for Storage Vaults
	 * generated from this Storage Template.
	 * When configuring a Storage Template from the Comet Server web interface, this field is set
	 * automatically for Storage Templates using Object Lock.
	 *
	 * @var boolean
	 */
	public $RemoveDeleted = false;

	/**
	 * Preserve unknown properties when dealing with future server versions.
	 *
	 * @see ImpossibleCloudIAMTemplateSettings::RemoveUnknownProperties() Remove all unknown properties
	 * @var array
	 */
	private $__unknown_properties = [];

	/**
	 * Replace the content of this ImpossibleCloudIAMTemplateSettings object from a PHP \stdClass.
	 * The data could be supplied from an API call after json_decode(...); or generated manually.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return void
	 */
	protected function inflateFrom(\stdClass $sc)
	{
		if (property_exists($sc, 'AccessKey')) {
			$this->AccessKey = (string)($sc->AccessKey);
		}
		if (property_exists($sc, 'SecretKey')) {
			$this->SecretKey = (string)($sc->SecretKey);
		}
		if (property_exists($sc, 'Region')) {
			$this->Region = (string)($sc->Region);
		}
		if (property_exists($sc, 'UseObjectLock')) {
			$this->UseObjectLock_Legacy_DoNotUse = (bool)($sc->UseObjectLock);
		}
		if (property_exists($sc, 'ObjectLockMode')) {
			$this->ObjectLockMode = (int)($sc->ObjectLockMode);
		}
		if (property_exists($sc, 'ObjectLockDays')) {
			$this->ObjectLockDays = (int)($sc->ObjectLockDays);
		}
		if (property_exists($sc, 'RemoveDeleted')) {
			$this->RemoveDeleted = (bool)($sc->RemoveDeleted);
		}
		foreach(get_object_vars($sc) as $k => $v) {
			switch($k) {
			case 'AccessKey':
			case 'SecretKey':
			case 'Region':
			case 'UseObjectLock':
			case 'ObjectLockMode':
			case 'ObjectLockDays':
			case 'RemoveDeleted':
				break;
			default:
				$this->__unknown_properties[$k] = $v;
			}
		}
	}

	/**
	 * Coerce a stdClass into a new strongly-typed ImpossibleCloudIAMTemplateSettings object.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return ImpossibleCloudIAMTemplateSettings
	 */
	public static function createFromStdclass(\stdClass $sc): \Comet\ImpossibleCloudIAMTemplateSettings
	{
		$retn = new ImpossibleCloudIAMTemplateSettings();
		$retn->inflateFrom($sc);
		return $retn;
	}

	/**
	 * Coerce a plain PHP array into a new strongly-typed ImpossibleCloudIAMTemplateSettings object.
	 * Because the Comet Server requires strict distinction between empty objects ({}) and arrays ([]),
	 * the result of this method may not be safe to re-submit to the Comet Server.
	 *
	 * @param array $arr Object data as PHP array
	 * @return ImpossibleCloudIAMTemplateSettings
	 */
	public static function createFromArray(array $arr): \Comet\ImpossibleCloudIAMTemplateSettings
	{
		$stdClass = json_decode(json_encode($arr, JSON_UNESCAPED_SLASHES));
		if (is_array($stdClass) && count($stdClass) === 0) {
			$stdClass = new \stdClass();
		}
		return self::createFromStdclass($stdClass);
	}

	/**
	 * Coerce a JSON string into a new strongly-typed ImpossibleCloudIAMTemplateSettings object.
	 *
	 * @param string $JsonString Object data as JSON string
	 * @return ImpossibleCloudIAMTemplateSettings
	 */
	public static function createFromJSON(string $JsonString): \Comet\ImpossibleCloudIAMTemplateSettings
	{
		$decodedJsonObject = json_decode($JsonString); // as stdClass
		if (\json_last_error() != \JSON_ERROR_NONE) {
			throw new \Exception("JSON decode failed: " . \json_last_error_msg(), \json_last_error());
		}
		$retn = new ImpossibleCloudIAMTemplateSettings();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}

	/**
	 * Convert this ImpossibleCloudIAMTemplateSettings object into a plain PHP array.
	 *
	 * Unknown properties may still be represented as \stdClass objects.
	 *
	 * @param bool $for_json_encode Represent key-value maps as \stdClass instead of plain PHP arrays
	 * @return array
	 */
	public function toArray(bool $for_json_encode = false): array
	{
		$ret = [];
		$ret["AccessKey"] = $this->AccessKey;
		$ret["SecretKey"] = $this->SecretKey;
		$ret["Region"] = $this->Region;
		$ret["UseObjectLock"] = $this->UseObjectLock_Legacy_DoNotUse;
		$ret["ObjectLockMode"] = $this->ObjectLockMode;
		$ret["ObjectLockDays"] = $this->ObjectLockDays;
		$ret["RemoveDeleted"] = $this->RemoveDeleted;

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

