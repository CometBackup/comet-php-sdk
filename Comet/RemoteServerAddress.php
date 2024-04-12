<?php

/**
 * Copyright (c) 2018-2024 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 *
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

class RemoteServerAddress {

	/**
	 * @var string
	 */
	public $Type = "";

	/**
	 * @var string
	 */
	public $Description = "";

	/**
	 * For use with Comet Server (Storage Role / Auth Role)
	 *
	 * @var string
	 */
	public $RemoteAddress = "";

	/**
	 * For use with Comet Server (Storage Role / Auth Role)
	 *
	 * @var string
	 */
	public $Username = "";

	/**
	 * For use with Comet Server (Storage Role / Auth Role)
	 *
	 * @var string
	 */
	public $Password = "";

	/**
	 * @var \Comet\ExternalLDAPAuthenticationSourceSettings
	 */
	public $LDAP = null;

	/**
	 * @var \Comet\OidcConfig
	 */
	public $OIDC = null;

	/**
	 * Backblaze B2 (Storage Template / Constellation)
	 *
	 * @var \Comet\B2VirtualStorageRoleSettings
	 */
	public $B2 = null;

	/**
	 * Wasabi, or Comet Storage powered by Wasabi (Storage Template / Constellation)
	 *
	 * @var \Comet\WasabiVirtualStorageRoleSettings
	 */
	public $Wasabi = null;

	/**
	 * Custom Remote Bucket HTTP protocol (Storage Template)
	 *
	 * @var \Comet\CustomRemoteBucketSettings
	 */
	public $Custom = null;

	/**
	 * IDrive e2, or Custom IAM-compatible (Storage Template / Constellation)
	 *
	 * @var \Comet\S3GenericVirtualStorageRole
	 */
	public $S3 = null;

	/**
	 * Amazon AWS (Storage Template / Constellation)
	 *
	 * @var \Comet\AmazonAWSVirtualStorageRoleSettings
	 */
	public $AWS = null;

	/**
	 * Storj (Storage Template / Constellation)
	 *
	 * @var \Comet\StorjVirtualStorageRoleSetting
	 */
	public $Storj = null;

	/**
	 * Impossible Cloud Partner API (Storage Template / Constellation)
	 *
	 * @var \Comet\ImpossibleCloudPartnerTemplateSettings
	 */
	public $ImpPartner = null;

	/**
	 * Impossible Cloud IAM API (Storage Template / Constellation)
	 *
	 * @var \Comet\ImpossibleCloudIAMTemplateSettings
	 */
	public $ImpUser = null;

	/**
	 * Preserve unknown properties when dealing with future server versions.
	 *
	 * @see RemoteServerAddress::RemoveUnknownProperties() Remove all unknown properties
	 * @var array
	 */
	private $__unknown_properties = [];

	/**
	 * Replace the content of this RemoteServerAddress object from a PHP \stdClass.
	 * The data could be supplied from an API call after json_decode(...); or generated manually.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return void
	 */
	protected function inflateFrom(\stdClass $sc)
	{
		if (property_exists($sc, 'Type')) {
			$this->Type = (string)($sc->Type);
		}
		if (property_exists($sc, 'Description')) {
			$this->Description = (string)($sc->Description);
		}
		if (property_exists($sc, 'RemoteAddress') && !is_null($sc->RemoteAddress)) {
			$this->RemoteAddress = (string)($sc->RemoteAddress);
		}
		if (property_exists($sc, 'Username') && !is_null($sc->Username)) {
			$this->Username = (string)($sc->Username);
		}
		if (property_exists($sc, 'Password') && !is_null($sc->Password)) {
			$this->Password = (string)($sc->Password);
		}
		if (property_exists($sc, 'LDAP') && !is_null($sc->LDAP)) {
			if (is_array($sc->LDAP) && count($sc->LDAP) === 0) {
			// Work around edge case in json_decode--json_encode stdClass conversion
				$this->LDAP = \Comet\ExternalLDAPAuthenticationSourceSettings::createFromStdclass(new \stdClass());
			} else {
				$this->LDAP = \Comet\ExternalLDAPAuthenticationSourceSettings::createFromStdclass($sc->LDAP);
			}
		}
		if (property_exists($sc, 'OIDC') && !is_null($sc->OIDC)) {
			if (is_array($sc->OIDC) && count($sc->OIDC) === 0) {
			// Work around edge case in json_decode--json_encode stdClass conversion
				$this->OIDC = \Comet\OidcConfig::createFromStdclass(new \stdClass());
			} else {
				$this->OIDC = \Comet\OidcConfig::createFromStdclass($sc->OIDC);
			}
		}
		if (property_exists($sc, 'B2') && !is_null($sc->B2)) {
			if (is_array($sc->B2) && count($sc->B2) === 0) {
			// Work around edge case in json_decode--json_encode stdClass conversion
				$this->B2 = \Comet\B2VirtualStorageRoleSettings::createFromStdclass(new \stdClass());
			} else {
				$this->B2 = \Comet\B2VirtualStorageRoleSettings::createFromStdclass($sc->B2);
			}
		}
		if (property_exists($sc, 'Wasabi') && !is_null($sc->Wasabi)) {
			if (is_array($sc->Wasabi) && count($sc->Wasabi) === 0) {
			// Work around edge case in json_decode--json_encode stdClass conversion
				$this->Wasabi = \Comet\WasabiVirtualStorageRoleSettings::createFromStdclass(new \stdClass());
			} else {
				$this->Wasabi = \Comet\WasabiVirtualStorageRoleSettings::createFromStdclass($sc->Wasabi);
			}
		}
		if (property_exists($sc, 'Custom') && !is_null($sc->Custom)) {
			if (is_array($sc->Custom) && count($sc->Custom) === 0) {
			// Work around edge case in json_decode--json_encode stdClass conversion
				$this->Custom = \Comet\CustomRemoteBucketSettings::createFromStdclass(new \stdClass());
			} else {
				$this->Custom = \Comet\CustomRemoteBucketSettings::createFromStdclass($sc->Custom);
			}
		}
		if (property_exists($sc, 'S3') && !is_null($sc->S3)) {
			if (is_array($sc->S3) && count($sc->S3) === 0) {
			// Work around edge case in json_decode--json_encode stdClass conversion
				$this->S3 = \Comet\S3GenericVirtualStorageRole::createFromStdclass(new \stdClass());
			} else {
				$this->S3 = \Comet\S3GenericVirtualStorageRole::createFromStdclass($sc->S3);
			}
		}
		if (property_exists($sc, 'AWS') && !is_null($sc->AWS)) {
			if (is_array($sc->AWS) && count($sc->AWS) === 0) {
			// Work around edge case in json_decode--json_encode stdClass conversion
				$this->AWS = \Comet\AmazonAWSVirtualStorageRoleSettings::createFromStdclass(new \stdClass());
			} else {
				$this->AWS = \Comet\AmazonAWSVirtualStorageRoleSettings::createFromStdclass($sc->AWS);
			}
		}
		if (property_exists($sc, 'Storj') && !is_null($sc->Storj)) {
			if (is_array($sc->Storj) && count($sc->Storj) === 0) {
			// Work around edge case in json_decode--json_encode stdClass conversion
				$this->Storj = \Comet\StorjVirtualStorageRoleSetting::createFromStdclass(new \stdClass());
			} else {
				$this->Storj = \Comet\StorjVirtualStorageRoleSetting::createFromStdclass($sc->Storj);
			}
		}
		if (property_exists($sc, 'ImpPartner') && !is_null($sc->ImpPartner)) {
			if (is_array($sc->ImpPartner) && count($sc->ImpPartner) === 0) {
			// Work around edge case in json_decode--json_encode stdClass conversion
				$this->ImpPartner = \Comet\ImpossibleCloudPartnerTemplateSettings::createFromStdclass(new \stdClass());
			} else {
				$this->ImpPartner = \Comet\ImpossibleCloudPartnerTemplateSettings::createFromStdclass($sc->ImpPartner);
			}
		}
		if (property_exists($sc, 'ImpUser') && !is_null($sc->ImpUser)) {
			if (is_array($sc->ImpUser) && count($sc->ImpUser) === 0) {
			// Work around edge case in json_decode--json_encode stdClass conversion
				$this->ImpUser = \Comet\ImpossibleCloudIAMTemplateSettings::createFromStdclass(new \stdClass());
			} else {
				$this->ImpUser = \Comet\ImpossibleCloudIAMTemplateSettings::createFromStdclass($sc->ImpUser);
			}
		}
		foreach(get_object_vars($sc) as $k => $v) {
			switch($k) {
			case 'Type':
			case 'Description':
			case 'RemoteAddress':
			case 'Username':
			case 'Password':
			case 'LDAP':
			case 'OIDC':
			case 'B2':
			case 'Wasabi':
			case 'Custom':
			case 'S3':
			case 'AWS':
			case 'Storj':
			case 'ImpPartner':
			case 'ImpUser':
				break;
			default:
				$this->__unknown_properties[$k] = $v;
			}
		}
	}

	/**
	 * Coerce a stdClass into a new strongly-typed RemoteServerAddress object.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return RemoteServerAddress
	 */
	public static function createFromStdclass(\stdClass $sc): \Comet\RemoteServerAddress
	{
		$retn = new RemoteServerAddress();
		$retn->inflateFrom($sc);
		return $retn;
	}

	/**
	 * Coerce a plain PHP array into a new strongly-typed RemoteServerAddress object.
	 * Because the Comet Server requires strict distinction between empty objects ({}) and arrays ([]),
	 * the result of this method may not be safe to re-submit to the Comet Server.
	 *
	 * @param array $arr Object data as PHP array
	 * @return RemoteServerAddress
	 */
	public static function createFromArray(array $arr): \Comet\RemoteServerAddress
	{
		$stdClass = json_decode(json_encode($arr, JSON_UNESCAPED_SLASHES));
		if (is_array($stdClass) && count($stdClass) === 0) {
			$stdClass = new \stdClass();
		}
		return self::createFromStdclass($stdClass);
	}

	/**
	 * Coerce a JSON string into a new strongly-typed RemoteServerAddress object.
	 *
	 * @param string $JsonString Object data as JSON string
	 * @return RemoteServerAddress
	 */
	public static function createFromJSON(string $JsonString): \Comet\RemoteServerAddress
	{
		$decodedJsonObject = json_decode($JsonString); // as stdClass
		if (\json_last_error() != \JSON_ERROR_NONE) {
			throw new \Exception("JSON decode failed: " . \json_last_error_msg(), \json_last_error());
		}
		$retn = new RemoteServerAddress();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}

	/**
	 * Convert this RemoteServerAddress object into a plain PHP array.
	 *
	 * Unknown properties may still be represented as \stdClass objects.
	 *
	 * @param bool $for_json_encode Represent empty key-value maps as \stdClass instead of plain PHP arrays
	 * @return array
	 */
	public function toArray(bool $for_json_encode = false): array
	{
		$ret = [];
		$ret["Type"] = $this->Type;
		$ret["Description"] = $this->Description;
		$ret["RemoteAddress"] = $this->RemoteAddress;
		$ret["Username"] = $this->Username;
		$ret["Password"] = $this->Password;
		if ( $this->LDAP === null ) {
			$ret["LDAP"] = $for_json_encode ? (object)[] : [];
		} else {
			$ret["LDAP"] = $this->LDAP->toArray($for_json_encode);
		}
		if ( $this->OIDC === null ) {
			$ret["OIDC"] = $for_json_encode ? (object)[] : [];
		} else {
			$ret["OIDC"] = $this->OIDC->toArray($for_json_encode);
		}
		if ( $this->B2 === null ) {
			$ret["B2"] = $for_json_encode ? (object)[] : [];
		} else {
			$ret["B2"] = $this->B2->toArray($for_json_encode);
		}
		if ( $this->Wasabi === null ) {
			$ret["Wasabi"] = $for_json_encode ? (object)[] : [];
		} else {
			$ret["Wasabi"] = $this->Wasabi->toArray($for_json_encode);
		}
		if ( $this->Custom === null ) {
			$ret["Custom"] = $for_json_encode ? (object)[] : [];
		} else {
			$ret["Custom"] = $this->Custom->toArray($for_json_encode);
		}
		if ( $this->S3 === null ) {
			$ret["S3"] = $for_json_encode ? (object)[] : [];
		} else {
			$ret["S3"] = $this->S3->toArray($for_json_encode);
		}
		if ( $this->AWS === null ) {
			$ret["AWS"] = $for_json_encode ? (object)[] : [];
		} else {
			$ret["AWS"] = $this->AWS->toArray($for_json_encode);
		}
		if ( $this->Storj === null ) {
			$ret["Storj"] = $for_json_encode ? (object)[] : [];
		} else {
			$ret["Storj"] = $this->Storj->toArray($for_json_encode);
		}
		if ( $this->ImpPartner === null ) {
			$ret["ImpPartner"] = $for_json_encode ? (object)[] : [];
		} else {
			$ret["ImpPartner"] = $this->ImpPartner->toArray($for_json_encode);
		}
		if ( $this->ImpUser === null ) {
			$ret["ImpUser"] = $for_json_encode ? (object)[] : [];
		} else {
			$ret["ImpUser"] = $this->ImpUser->toArray($for_json_encode);
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
		if ($this->LDAP !== null) {
			$this->LDAP->RemoveUnknownProperties();
		}
		if ($this->OIDC !== null) {
			$this->OIDC->RemoveUnknownProperties();
		}
		if ($this->B2 !== null) {
			$this->B2->RemoveUnknownProperties();
		}
		if ($this->Wasabi !== null) {
			$this->Wasabi->RemoveUnknownProperties();
		}
		if ($this->Custom !== null) {
			$this->Custom->RemoveUnknownProperties();
		}
		if ($this->S3 !== null) {
			$this->S3->RemoveUnknownProperties();
		}
		if ($this->AWS !== null) {
			$this->AWS->RemoveUnknownProperties();
		}
		if ($this->Storj !== null) {
			$this->Storj->RemoveUnknownProperties();
		}
		if ($this->ImpPartner !== null) {
			$this->ImpPartner->RemoveUnknownProperties();
		}
		if ($this->ImpUser !== null) {
			$this->ImpUser->RemoveUnknownProperties();
		}
	}

}

