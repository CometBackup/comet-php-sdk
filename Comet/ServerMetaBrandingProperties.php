<?php

/**
 * Copyright (c) 2018-2025 Comet Licensing Ltd.
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
	 * If true, this Comet Server has an image configured for its main logo. You can access it from the
	 * /gen/logo.img endpoint. If false, this Comet Server has text configured for its main logo.
	 *
	 * @var boolean
	 */
	public $HasImage = false;

	/**
	 * A value that will change if the branding image (/gen/logo.img) changes. You can use this as a
	 * cache key.
	 *
	 * @var string
	 */
	public $ImageEtag = "";

	/**
	 * Colour in RGB hex format (e.g. "#FFFFFF")
	 *
	 * @var string
	 */
	public $TopColor = "";

	/**
	 * Colour in RGB hex format (e.g. "#FFFFFF")
	 *
	 * @var string
	 */
	public $AccentColor = "";

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
	 * @var \Comet\ExternalAuthenticationSourceDisplay[]
	 */
	public $ExternalAuthenticationSources = [];

	/**
	 * If true, this Comet Server currently has no admins or users.
	 *
	 * @var boolean
	 */
	public $ServerIsEmpty = false;

	/**
	 * @var string
	 */
	public $CloudStorageName = "";

	/**
	 * Will hide the "Pre-built software client" option from the server settings. Only properly enforced
	 * when custom branding is enforced via the license.
	 *
	 * @var boolean
	 */
	public $AdminHidePreBuiltClientOption = false;

	/**
	 * Will hide Comet Storage from everywhere, including the admin view. Only properly enforced when
	 * custom branding is enforced via the license.
	 *
	 * @var boolean
	 */
	public $AdminHideBrandedCloudStorage = false;

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
		if (property_exists($sc, 'AccentColor')) {
			$this->AccentColor = (string)($sc->AccentColor);
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
		if (property_exists($sc, 'ExternalAuthenticationSources') && !is_null($sc->ExternalAuthenticationSources)) {
			$val_2 = [];
			if ($sc->ExternalAuthenticationSources !== null) {
				for($i_2 = 0; $i_2 < count($sc->ExternalAuthenticationSources); ++$i_2) {
					if (is_array($sc->ExternalAuthenticationSources[$i_2]) && count($sc->ExternalAuthenticationSources[$i_2]) === 0) {
					// Work around edge case in json_decode--json_encode stdClass conversion
						$val_2[] = \Comet\ExternalAuthenticationSourceDisplay::createFromStdclass(new \stdClass());
					} else {
						$val_2[] = \Comet\ExternalAuthenticationSourceDisplay::createFromStdclass($sc->ExternalAuthenticationSources[$i_2]);
					}
				}
			}
			$this->ExternalAuthenticationSources = $val_2;
		}
		if (property_exists($sc, 'ServerIsEmpty')) {
			$this->ServerIsEmpty = (bool)($sc->ServerIsEmpty);
		}
		if (property_exists($sc, 'CloudStorageName')) {
			$this->CloudStorageName = (string)($sc->CloudStorageName);
		}
		if (property_exists($sc, 'AdminHidePreBuiltClientOption')) {
			$this->AdminHidePreBuiltClientOption = (bool)($sc->AdminHidePreBuiltClientOption);
		}
		if (property_exists($sc, 'AdminHideBrandedCloudStorage')) {
			$this->AdminHideBrandedCloudStorage = (bool)($sc->AdminHideBrandedCloudStorage);
		}
		foreach(get_object_vars($sc) as $k => $v) {
			switch($k) {
			case 'BrandName':
			case 'ProductName':
			case 'HasImage':
			case 'ImageEtag':
			case 'TopColor':
			case 'AccentColor':
			case 'HideNewsArea':
			case 'AllowUnauthenticatedDownloads':
			case 'AllowAuthenticatedDownloads':
			case 'PruneLogsAfterDays':
			case 'ExpiredInSeconds':
			case 'ExternalAuthenticationSources':
			case 'ServerIsEmpty':
			case 'CloudStorageName':
			case 'AdminHidePreBuiltClientOption':
			case 'AdminHideBrandedCloudStorage':
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
	 * @param bool $for_json_encode Represent key-value maps as \stdClass instead of plain PHP arrays
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
		$ret["AccentColor"] = $this->AccentColor;
		$ret["HideNewsArea"] = $this->HideNewsArea;
		$ret["AllowUnauthenticatedDownloads"] = $this->AllowUnauthenticatedDownloads;
		$ret["AllowAuthenticatedDownloads"] = $this->AllowAuthenticatedDownloads;
		$ret["PruneLogsAfterDays"] = $this->PruneLogsAfterDays;
		$ret["ExpiredInSeconds"] = $this->ExpiredInSeconds;
		{
			$c0 = [];
			for($i0 = 0; $i0 < count($this->ExternalAuthenticationSources); ++$i0) {
				if ( $this->ExternalAuthenticationSources[$i0] === null ) {
					$val0 = $for_json_encode ? (object)[] : [];
				} else {
					$val0 = $this->ExternalAuthenticationSources[$i0]->toArray($for_json_encode);
				}
				$c0[] = $val0;
			}
			$ret["ExternalAuthenticationSources"] = $c0;
		}
		$ret["ServerIsEmpty"] = $this->ServerIsEmpty;
		$ret["CloudStorageName"] = $this->CloudStorageName;
		$ret["AdminHidePreBuiltClientOption"] = $this->AdminHidePreBuiltClientOption;
		$ret["AdminHideBrandedCloudStorage"] = $this->AdminHideBrandedCloudStorage;

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

