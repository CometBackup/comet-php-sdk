<?php

/**
 * Copyright (c) 2018-2025 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 *
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

class S3GenericVirtualStorageRole {

	/**
	 * The URL for S3 API calls (e.g. "s3.amazonaws.com")
	 *
	 * @var string
	 */
	public $S3Endpoint = "";

	/**
	 * The URL for IAM API calls (e.g. "iam.amazonaws.com")
	 *
	 * @var string
	 */
	public $IAMEndpoint = "";

	/**
	 * If set, the Storage Template will generate Storage Vaults pointing to a subdirectory within this
	 * bucket. A single dynamic IAM policy will cover all created Storage Vaults.
	 * This is preferable for platforms that have limits on the total number of IAM policies. However,
	 * it requires a high level of IAM compatibility.
	 * If left blank, the Storage Template will generate Storage Vaults pointing to new, separate S3
	 * buckets each time. An additional IAM policy is created for each new Storage Vault.
	 * This is preferable for platforms that have a lower level of IAM compatibility.
	 *
	 * @var string
	 */
	public $MasterBucket = "";

	/**
	 * @var string
	 */
	public $AccessKey = "";

	/**
	 * @var string
	 */
	public $SecretKey = "";

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
	 * Optional. The region to be used for new buckets. If blank, uses the default region for the
	 * S3-compatible provider (e.g. us-east-1).
	 *
	 * @var string
	 * This field is available in Comet 24.3.1 and later.
	 */
	public $Region = "";

	/**
	 * Optional. Prefix to use for bucket paths.
	 *
	 * @var string
	 * This field is available in Comet 24.6.3 and later.
	 */
	public $Prefix = "";

	/**
	 * Preserve unknown properties when dealing with future server versions.
	 *
	 * @see S3GenericVirtualStorageRole::RemoveUnknownProperties() Remove all unknown properties
	 * @var array
	 */
	private $__unknown_properties = [];

	/**
	 * Replace the content of this S3GenericVirtualStorageRole object from a PHP \stdClass.
	 * The data could be supplied from an API call after json_decode(...); or generated manually.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return void
	 */
	protected function inflateFrom(\stdClass $sc)
	{
		if (property_exists($sc, 'S3Endpoint')) {
			$this->S3Endpoint = (string)($sc->S3Endpoint);
		}
		if (property_exists($sc, 'IAMEndpoint')) {
			$this->IAMEndpoint = (string)($sc->IAMEndpoint);
		}
		if (property_exists($sc, 'MasterBucket')) {
			$this->MasterBucket = (string)($sc->MasterBucket);
		}
		if (property_exists($sc, 'AccessKey')) {
			$this->AccessKey = (string)($sc->AccessKey);
		}
		if (property_exists($sc, 'SecretKey')) {
			$this->SecretKey = (string)($sc->SecretKey);
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
		if (property_exists($sc, 'Region')) {
			$this->Region = (string)($sc->Region);
		}
		if (property_exists($sc, 'Prefix')) {
			$this->Prefix = (string)($sc->Prefix);
		}
		foreach(get_object_vars($sc) as $k => $v) {
			switch($k) {
			case 'S3Endpoint':
			case 'IAMEndpoint':
			case 'MasterBucket':
			case 'AccessKey':
			case 'SecretKey':
			case 'UseObjectLock':
			case 'ObjectLockMode':
			case 'ObjectLockDays':
			case 'RemoveDeleted':
			case 'Region':
			case 'Prefix':
				break;
			default:
				$this->__unknown_properties[$k] = $v;
			}
		}
	}

	/**
	 * Coerce a stdClass into a new strongly-typed S3GenericVirtualStorageRole object.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return S3GenericVirtualStorageRole
	 */
	public static function createFromStdclass(\stdClass $sc): \Comet\S3GenericVirtualStorageRole
	{
		$retn = new S3GenericVirtualStorageRole();
		$retn->inflateFrom($sc);
		return $retn;
	}

	/**
	 * Coerce a plain PHP array into a new strongly-typed S3GenericVirtualStorageRole object.
	 * Because the Comet Server requires strict distinction between empty objects ({}) and arrays ([]),
	 * the result of this method may not be safe to re-submit to the Comet Server.
	 *
	 * @param array $arr Object data as PHP array
	 * @return S3GenericVirtualStorageRole
	 */
	public static function createFromArray(array $arr): \Comet\S3GenericVirtualStorageRole
	{
		$stdClass = json_decode(json_encode($arr, JSON_UNESCAPED_SLASHES));
		if (is_array($stdClass) && count($stdClass) === 0) {
			$stdClass = new \stdClass();
		}
		return self::createFromStdclass($stdClass);
	}

	/**
	 * Coerce a JSON string into a new strongly-typed S3GenericVirtualStorageRole object.
	 *
	 * @param string $JsonString Object data as JSON string
	 * @return S3GenericVirtualStorageRole
	 */
	public static function createFromJSON(string $JsonString): \Comet\S3GenericVirtualStorageRole
	{
		$decodedJsonObject = json_decode($JsonString); // as stdClass
		if (\json_last_error() != \JSON_ERROR_NONE) {
			throw new \Exception("JSON decode failed: " . \json_last_error_msg(), \json_last_error());
		}
		$retn = new S3GenericVirtualStorageRole();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}

	/**
	 * Convert this S3GenericVirtualStorageRole object into a plain PHP array.
	 *
	 * Unknown properties may still be represented as \stdClass objects.
	 *
	 * @param bool $for_json_encode Represent key-value maps as \stdClass instead of plain PHP arrays
	 * @return array
	 */
	public function toArray(bool $for_json_encode = false): array
	{
		$ret = [];
		$ret["S3Endpoint"] = $this->S3Endpoint;
		$ret["IAMEndpoint"] = $this->IAMEndpoint;
		$ret["MasterBucket"] = $this->MasterBucket;
		$ret["AccessKey"] = $this->AccessKey;
		$ret["SecretKey"] = $this->SecretKey;
		$ret["UseObjectLock"] = $this->UseObjectLock_Legacy_DoNotUse;
		$ret["ObjectLockMode"] = $this->ObjectLockMode;
		$ret["ObjectLockDays"] = $this->ObjectLockDays;
		$ret["RemoveDeleted"] = $this->RemoveDeleted;
		$ret["Region"] = $this->Region;
		$ret["Prefix"] = $this->Prefix;

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

