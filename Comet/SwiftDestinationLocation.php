<?php

/**
 * Copyright (c) 2018-2023 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 *
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

class SwiftDestinationLocation {

	/**
	 * @var string
	 */
	public $Username = "";

	/**
	 * @var string
	 */
	public $APIKey = "";

	/**
	 * @var string
	 */
	public $Region = "";

	/**
	 * @var string
	 */
	public $AuthURL = "";

	/**
	 * @var string
	 */
	public $Domain = "";

	/**
	 * @var string
	 */
	public $Tenant = "";

	/**
	 * @var string
	 */
	public $TenantDomain = "";

	/**
	 * @var string
	 */
	public $TenantID = "";

	/**
	 * @var string
	 */
	public $TrustID = "";

	/**
	 * @var string
	 */
	public $AuthToken = "";

	/**
	 * @var string
	 */
	public $Prefix = "";

	/**
	 * @var string
	 */
	public $Container = "";

	/**
	 * @var string
	 */
	public $DefaultContainerPolicy = "";

	/**
	 * Preserve unknown properties when dealing with future server versions.
	 *
	 * @see SwiftDestinationLocation::RemoveUnknownProperties() Remove all unknown properties
	 * @var array
	 */
	private $__unknown_properties = [];

	/**
	 * Replace the content of this SwiftDestinationLocation object from a PHP \stdClass.
	 * The data could be supplied from an API call after json_decode(...); or generated manually.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return void
	 */
	protected function inflateFrom(\stdClass $sc)
	{
		if (property_exists($sc, 'Username') && !is_null($sc->Username)) {
			$this->Username = (string)($sc->Username);
		}
		if (property_exists($sc, 'APIKey') && !is_null($sc->APIKey)) {
			$this->APIKey = (string)($sc->APIKey);
		}
		if (property_exists($sc, 'Region') && !is_null($sc->Region)) {
			$this->Region = (string)($sc->Region);
		}
		if (property_exists($sc, 'AuthURL') && !is_null($sc->AuthURL)) {
			$this->AuthURL = (string)($sc->AuthURL);
		}
		if (property_exists($sc, 'Domain') && !is_null($sc->Domain)) {
			$this->Domain = (string)($sc->Domain);
		}
		if (property_exists($sc, 'Tenant') && !is_null($sc->Tenant)) {
			$this->Tenant = (string)($sc->Tenant);
		}
		if (property_exists($sc, 'TenantDomain') && !is_null($sc->TenantDomain)) {
			$this->TenantDomain = (string)($sc->TenantDomain);
		}
		if (property_exists($sc, 'TenantID') && !is_null($sc->TenantID)) {
			$this->TenantID = (string)($sc->TenantID);
		}
		if (property_exists($sc, 'TrustID') && !is_null($sc->TrustID)) {
			$this->TrustID = (string)($sc->TrustID);
		}
		if (property_exists($sc, 'AuthToken') && !is_null($sc->AuthToken)) {
			$this->AuthToken = (string)($sc->AuthToken);
		}
		if (property_exists($sc, 'Prefix') && !is_null($sc->Prefix)) {
			$this->Prefix = (string)($sc->Prefix);
		}
		if (property_exists($sc, 'Container') && !is_null($sc->Container)) {
			$this->Container = (string)($sc->Container);
		}
		if (property_exists($sc, 'DefaultContainerPolicy') && !is_null($sc->DefaultContainerPolicy)) {
			$this->DefaultContainerPolicy = (string)($sc->DefaultContainerPolicy);
		}
		foreach(get_object_vars($sc) as $k => $v) {
			switch($k) {
			case 'Username':
			case 'APIKey':
			case 'Region':
			case 'AuthURL':
			case 'Domain':
			case 'Tenant':
			case 'TenantDomain':
			case 'TenantID':
			case 'TrustID':
			case 'AuthToken':
			case 'Prefix':
			case 'Container':
			case 'DefaultContainerPolicy':
				break;
			default:
				$this->__unknown_properties[$k] = $v;
			}
		}
	}

	/**
	 * Coerce a stdClass into a new strongly-typed SwiftDestinationLocation object.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return SwiftDestinationLocation
	 */
	public static function createFromStdclass(\stdClass $sc): \Comet\SwiftDestinationLocation
	{
		$retn = new SwiftDestinationLocation();
		$retn->inflateFrom($sc);
		return $retn;
	}

	/**
	 * Coerce a plain PHP array into a new strongly-typed SwiftDestinationLocation object.
	 * Because the Comet Server requires strict distinction between empty objects ({}) and arrays ([]),
	 * the result of this method may not be safe to re-submit to the Comet Server.
	 *
	 * @param array $arr Object data as PHP array
	 * @return SwiftDestinationLocation
	 */
	public static function createFromArray(array $arr): \Comet\SwiftDestinationLocation
	{
		$stdClass = json_decode(json_encode($arr, JSON_UNESCAPED_SLASHES));
		if (is_array($stdClass) && count($stdClass) === 0) {
			$stdClass = new \stdClass();
		}
		return self::createFromStdclass($stdClass);
	}

	/**
	 * Coerce a JSON string into a new strongly-typed SwiftDestinationLocation object.
	 *
	 * @param string $JsonString Object data as JSON string
	 * @return SwiftDestinationLocation
	 */
	public static function createFromJSON(string $JsonString): \Comet\SwiftDestinationLocation
	{
		$decodedJsonObject = json_decode($JsonString); // as stdClass
		if (\json_last_error() != \JSON_ERROR_NONE) {
			throw new \Exception("JSON decode failed: " . \json_last_error_msg(), \json_last_error());
		}
		$retn = new SwiftDestinationLocation();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}

	/**
	 * Convert this SwiftDestinationLocation object into a plain PHP array.
	 *
	 * Unknown properties may still be represented as \stdClass objects.
	 *
	 * @param bool $for_json_encode Represent empty key-value maps as \stdClass instead of plain PHP arrays
	 * @return array
	 */
	public function toArray(bool $for_json_encode = false): array
	{
		$ret = [];
		$ret["Username"] = $this->Username;
		$ret["APIKey"] = $this->APIKey;
		$ret["Region"] = $this->Region;
		$ret["AuthURL"] = $this->AuthURL;
		$ret["Domain"] = $this->Domain;
		$ret["Tenant"] = $this->Tenant;
		$ret["TenantDomain"] = $this->TenantDomain;
		$ret["TenantID"] = $this->TenantID;
		$ret["TrustID"] = $this->TrustID;
		$ret["AuthToken"] = $this->AuthToken;
		$ret["Prefix"] = $this->Prefix;
		$ret["Container"] = $this->Container;
		$ret["DefaultContainerPolicy"] = $this->DefaultContainerPolicy;

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

