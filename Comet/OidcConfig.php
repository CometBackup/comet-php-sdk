<?php

/**
 * Copyright (c) 2018-2024 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 *
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

class OidcConfig {

	/**
	 * @var string
	 */
	public $DisplayName = "";

	/**
	 * @var string[]
	 */
	public $Hosts = [];

	/**
	 * @var string
	 */
	public $OrganizationID = "";

	/**
	 * @var string
	 */
	public $Provider = "";

	/**
	 * @var string
	 */
	public $ClientID = "";

	/**
	 * @var string
	 */
	public $ClientSecret = "";

	/**
	 * @var boolean
	 */
	public $SkipMFA = false;

	/**
	 * @var string[]
	 */
	public $Scopes = [];

	/**
	 * @var \Comet\OidcClaim[]
	 */
	public $RequiredClaims = [];

	/**
	 * @var string
	 */
	public $GenericOP_DiscoveryDocumentURL = "";

	/**
	 * @var string
	 */
	public $AzureADV2OP_TenantID = "";

	/**
	 * @var string
	 */
	public $GoogleOP_HostedDomain = "";

	/**
	 * Preserve unknown properties when dealing with future server versions.
	 *
	 * @see OidcConfig::RemoveUnknownProperties() Remove all unknown properties
	 * @var array
	 */
	private $__unknown_properties = [];

	/**
	 * Replace the content of this OidcConfig object from a PHP \stdClass.
	 * The data could be supplied from an API call after json_decode(...); or generated manually.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return void
	 */
	protected function inflateFrom(\stdClass $sc)
	{
		if (property_exists($sc, 'DisplayName')) {
			$this->DisplayName = (string)($sc->DisplayName);
		}
		if (property_exists($sc, 'Hosts') && !is_null($sc->Hosts)) {
			$val_2 = [];
			if ($sc->Hosts !== null) {
				for($i_2 = 0; $i_2 < count($sc->Hosts); ++$i_2) {
					$val_2[] = (string)($sc->Hosts[$i_2]);
				}
			}
			$this->Hosts = $val_2;
		}
		if (property_exists($sc, 'OrganizationID') && !is_null($sc->OrganizationID)) {
			$this->OrganizationID = (string)($sc->OrganizationID);
		}
		if (property_exists($sc, 'Provider')) {
			$this->Provider = (string)($sc->Provider);
		}
		if (property_exists($sc, 'ClientID')) {
			$this->ClientID = (string)($sc->ClientID);
		}
		if (property_exists($sc, 'ClientSecret')) {
			$this->ClientSecret = (string)($sc->ClientSecret);
		}
		if (property_exists($sc, 'SkipMFA')) {
			$this->SkipMFA = (bool)($sc->SkipMFA);
		}
		if (property_exists($sc, 'Scopes') && !is_null($sc->Scopes)) {
			$val_2 = [];
			if ($sc->Scopes !== null) {
				for($i_2 = 0; $i_2 < count($sc->Scopes); ++$i_2) {
					$val_2[] = (string)($sc->Scopes[$i_2]);
				}
			}
			$this->Scopes = $val_2;
		}
		if (property_exists($sc, 'RequiredClaims') && !is_null($sc->RequiredClaims)) {
			$val_2 = [];
			if ($sc->RequiredClaims !== null) {
				for($i_2 = 0; $i_2 < count($sc->RequiredClaims); ++$i_2) {
					if (is_array($sc->RequiredClaims[$i_2]) && count($sc->RequiredClaims[$i_2]) === 0) {
					// Work around edge case in json_decode--json_encode stdClass conversion
						$val_2[] = \Comet\OidcClaim::createFromStdclass(new \stdClass());
					} else {
						$val_2[] = \Comet\OidcClaim::createFromStdclass($sc->RequiredClaims[$i_2]);
					}
				}
			}
			$this->RequiredClaims = $val_2;
		}
		if (property_exists($sc, 'DiscoveryDocumentURL') && !is_null($sc->DiscoveryDocumentURL)) {
			$this->GenericOP_DiscoveryDocumentURL = (string)($sc->DiscoveryDocumentURL);
		}
		if (property_exists($sc, 'AzureTenantID') && !is_null($sc->AzureTenantID)) {
			$this->AzureADV2OP_TenantID = (string)($sc->AzureTenantID);
		}
		if (property_exists($sc, 'GoogleHostedDomain') && !is_null($sc->GoogleHostedDomain)) {
			$this->GoogleOP_HostedDomain = (string)($sc->GoogleHostedDomain);
		}
		foreach(get_object_vars($sc) as $k => $v) {
			switch($k) {
			case 'DisplayName':
			case 'Hosts':
			case 'OrganizationID':
			case 'Provider':
			case 'ClientID':
			case 'ClientSecret':
			case 'SkipMFA':
			case 'Scopes':
			case 'RequiredClaims':
			case 'DiscoveryDocumentURL':
			case 'AzureTenantID':
			case 'GoogleHostedDomain':
				break;
			default:
				$this->__unknown_properties[$k] = $v;
			}
		}
	}

	/**
	 * Coerce a stdClass into a new strongly-typed OidcConfig object.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return OidcConfig
	 */
	public static function createFromStdclass(\stdClass $sc): \Comet\OidcConfig
	{
		$retn = new OidcConfig();
		$retn->inflateFrom($sc);
		return $retn;
	}

	/**
	 * Coerce a plain PHP array into a new strongly-typed OidcConfig object.
	 * Because the Comet Server requires strict distinction between empty objects ({}) and arrays ([]),
	 * the result of this method may not be safe to re-submit to the Comet Server.
	 *
	 * @param array $arr Object data as PHP array
	 * @return OidcConfig
	 */
	public static function createFromArray(array $arr): \Comet\OidcConfig
	{
		$stdClass = json_decode(json_encode($arr, JSON_UNESCAPED_SLASHES));
		if (is_array($stdClass) && count($stdClass) === 0) {
			$stdClass = new \stdClass();
		}
		return self::createFromStdclass($stdClass);
	}

	/**
	 * Coerce a JSON string into a new strongly-typed OidcConfig object.
	 *
	 * @param string $JsonString Object data as JSON string
	 * @return OidcConfig
	 */
	public static function createFromJSON(string $JsonString): \Comet\OidcConfig
	{
		$decodedJsonObject = json_decode($JsonString); // as stdClass
		if (\json_last_error() != \JSON_ERROR_NONE) {
			throw new \Exception("JSON decode failed: " . \json_last_error_msg(), \json_last_error());
		}
		$retn = new OidcConfig();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}

	/**
	 * Convert this OidcConfig object into a plain PHP array.
	 *
	 * Unknown properties may still be represented as \stdClass objects.
	 *
	 * @param bool $for_json_encode Represent key-value maps as \stdClass instead of plain PHP arrays
	 * @return array
	 */
	public function toArray(bool $for_json_encode = false): array
	{
		$ret = [];
		$ret["DisplayName"] = $this->DisplayName;
		{
			$c0 = [];
			for($i0 = 0; $i0 < count($this->Hosts); ++$i0) {
				$val0 = $this->Hosts[$i0];
				$c0[] = $val0;
			}
			$ret["Hosts"] = $c0;
		}
		$ret["OrganizationID"] = $this->OrganizationID;
		$ret["Provider"] = $this->Provider;
		$ret["ClientID"] = $this->ClientID;
		$ret["ClientSecret"] = $this->ClientSecret;
		$ret["SkipMFA"] = $this->SkipMFA;
		{
			$c0 = [];
			for($i0 = 0; $i0 < count($this->Scopes); ++$i0) {
				$val0 = $this->Scopes[$i0];
				$c0[] = $val0;
			}
			$ret["Scopes"] = $c0;
		}
		{
			$c0 = [];
			for($i0 = 0; $i0 < count($this->RequiredClaims); ++$i0) {
				if ( $this->RequiredClaims[$i0] === null ) {
					$val0 = $for_json_encode ? (object)[] : [];
				} else {
					$val0 = $this->RequiredClaims[$i0]->toArray($for_json_encode);
				}
				$c0[] = $val0;
			}
			$ret["RequiredClaims"] = $c0;
		}
		$ret["DiscoveryDocumentURL"] = $this->GenericOP_DiscoveryDocumentURL;
		$ret["AzureTenantID"] = $this->AzureADV2OP_TenantID;
		$ret["GoogleHostedDomain"] = $this->GoogleOP_HostedDomain;

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

