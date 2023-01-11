<?php

/**
 * Copyright (c) 2018-2023 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 *
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

class ServerMetaBrandingProperties {

	/**
	 * @var string
	 */
	public $BrandName = "";

	/**
	 * @var string
	 */
	public $ProductName = "";

	/**
	 * @var boolean
	 */
	public $HasImage = false;

	/**
	 * @var string
	 */
	public $ImageEtag = "";

	/**
	 * @var string
	 */
	public $TopColor = "";

	/**
	 * @var boolean
	 */
	public $HideNewsArea = false;

	/**
	 * @var boolean
	 */
	public $AllowUnauthenticatedDownloads = false;

	/**
	 * @var boolean
	 */
	public $AllowAuthenticatedDownloads = false;

	/**
	 * @var int
	 */
	public $PruneLogsAfterDays = 0;

	/**
	 * @var int
	 */
	public $ExpiredInSeconds = 0;

	/**
	 * Preserve unknown properties when dealing with future server versions.
	 *
	 * @see ServerMetaBrandingProperties::RemoveUnknownProperties() Remove all unknown properties
	 * @var array
	 */
	private $__unknown_properties = [];

	/**
	 * Replace the content of this ServerMetaBrandingProperties object from a PHP \stdClass.
	 * The data could be supplied from an API call after json_decode(...); or generated manually.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return void
	 */
	protected function inflateFrom(\stdClass $sc)
	{
		if (property_exists($sc, 'BrandName')) {
			$this->BrandName = (string)($sc->BrandName);
		}
		if (property_exists($sc, 'ProductName')) {
			$this->ProductName = (string)($sc->ProductName);
		}
		if (property_exists($sc, 'HasImage')) {
			$this->HasImage = (bool)($sc->HasImage);
		}
		if (property_exists($sc, 'ImageEtag')) {
			$this->ImageEtag = (string)($sc->ImageEtag);
		}
		if (property_exists($sc, 'TopColor')) {
			$this->TopColor = (string)($sc->TopColor);
		}
		if (property_exists($sc, 'HideNewsArea')) {
			$this->HideNewsArea = (bool)($sc->HideNewsArea);
		}
		if (property_exists($sc, 'AllowUnauthenticatedDownloads')) {
			$this->AllowUnauthenticatedDownloads = (bool)($sc->AllowUnauthenticatedDownloads);
		}
		if (property_exists($sc, 'AllowAuthenticatedDownloads')) {
			$this->AllowAuthenticatedDownloads = (bool)($sc->AllowAuthenticatedDownloads);
		}
		if (property_exists($sc, 'PruneLogsAfterDays')) {
			$this->PruneLogsAfterDays = (int)($sc->PruneLogsAfterDays);
		}
		if (property_exists($sc, 'ExpiredInSeconds')) {
			$this->ExpiredInSeconds = (int)($sc->ExpiredInSeconds);
		}
		foreach(get_object_vars($sc) as $k => $v) {
			switch($k) {
			case 'BrandName':
			case 'ProductName':
			case 'HasImage':
			case 'ImageEtag':
			case 'TopColor':
			case 'HideNewsArea':
			case 'AllowUnauthenticatedDownloads':
			case 'AllowAuthenticatedDownloads':
			case 'PruneLogsAfterDays':
			case 'ExpiredInSeconds':
				break;
			default:
				$this->__unknown_properties[$k] = $v;
			}
		}
	}

	/**
	 * Coerce a stdClass into a new strongly-typed ServerMetaBrandingProperties object.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return ServerMetaBrandingProperties
	 */
	public static function createFromStdclass(\stdClass $sc): \Comet\ServerMetaBrandingProperties
	{
		$retn = new ServerMetaBrandingProperties();
		$retn->inflateFrom($sc);
		return $retn;
	}

	/**
	 * Coerce a plain PHP array into a new strongly-typed ServerMetaBrandingProperties object.
	 * Because the Comet Server requires strict distinction between empty objects ({}) and arrays ([]),
	 * the result of this method may not be safe to re-submit to the Comet Server.
	 *
	 * @param array $arr Object data as PHP array
	 * @return ServerMetaBrandingProperties
	 */
	public static function createFromArray(array $arr): \Comet\ServerMetaBrandingProperties
	{
		$stdClass = json_decode(json_encode($arr, JSON_UNESCAPED_SLASHES));
		if (is_array($stdClass) && count($stdClass) === 0) {
			$stdClass = new \stdClass();
		}
		return self::createFromStdclass($stdClass);
	}

	/**
	 * Coerce a JSON string into a new strongly-typed ServerMetaBrandingProperties object.
	 *
	 * @param string $JsonString Object data as JSON string
	 * @return ServerMetaBrandingProperties
	 */
	public static function createFromJSON(string $JsonString): \Comet\ServerMetaBrandingProperties
	{
		$decodedJsonObject = json_decode($JsonString); // as stdClass
		if (\json_last_error() != \JSON_ERROR_NONE) {
			throw new \Exception("JSON decode failed: " . \json_last_error_msg(), \json_last_error());
		}
		$retn = new ServerMetaBrandingProperties();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}

	/**
	 * Convert this ServerMetaBrandingProperties object into a plain PHP array.
	 *
	 * Unknown properties may still be represented as \stdClass objects.
	 *
	 * @param bool $for_json_encode Represent empty key-value maps as \stdClass instead of plain PHP arrays
	 * @return array
	 */
	public function toArray(bool $for_json_encode = false): array
	{
		$ret = [];
		$ret["BrandName"] = $this->BrandName;
		$ret["ProductName"] = $this->ProductName;
		$ret["HasImage"] = $this->HasImage;
		$ret["ImageEtag"] = $this->ImageEtag;
		$ret["TopColor"] = $this->TopColor;
		$ret["HideNewsArea"] = $this->HideNewsArea;
		$ret["AllowUnauthenticatedDownloads"] = $this->AllowUnauthenticatedDownloads;
		$ret["AllowAuthenticatedDownloads"] = $this->AllowAuthenticatedDownloads;
		$ret["PruneLogsAfterDays"] = $this->PruneLogsAfterDays;
		$ret["ExpiredInSeconds"] = $this->ExpiredInSeconds;

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

