<?php

/**
 * Copyright (c) 2018-2026 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 *
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

class SMTPOAuthOptions {

	/**
	 * One of the SMTP_OAUTH_PROVIDER_ constants
	 *
	 * @var int
	 */
	public $Provider = 0;

	/**
	 * One of the SMTP_OAUTH_FLOW_ constants
	 *
	 * @var int
	 */
	public $Flow = 0;

	/**
	 * For SMTP_OAUTH_PROVIDER_MICROSOFT, the directory (tenant) ID or verified domain of the app
	 * registration
	 *
	 * @var string
	 */
	public $TenantID = "";

	/**
	 * The OAuth 2.0 client ID of the customer-owned app registration
	 *
	 * @var string
	 */
	public $ClientID = "";

	/**
	 * The OAuth 2.0 client secret of the customer-owned app registration
	 *
	 * @var string
	 */
	public $ClientSecret = "";

	/**
	 * One of the ENCRYPTIONMETHOD_ constants
	 *
	 * @var int
	 */
	public $ClientSecretFormat = 0;

	/**
	 * For SMTP_OAUTH_FLOW_AUTHORIZATION_CODE, the refresh token returned by the
	 * AdminMetaEmailOptionsOauthCallback API
	 *
	 * @var string
	 */
	public $RefreshToken = "";

	/**
	 * One of the ENCRYPTIONMETHOD_ constants
	 *
	 * @var int
	 */
	public $RefreshTokenFormat = 0;

	/**
	 * Preserve unknown properties when dealing with future server versions.
	 *
	 * @see SMTPOAuthOptions::RemoveUnknownProperties() Remove all unknown properties
	 * @var array
	 */
	private $__unknown_properties = [];

	/**
	 * Replace the content of this SMTPOAuthOptions object from a PHP \stdClass.
	 * The data could be supplied from an API call after json_decode(...); or generated manually.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return void
	 */
	protected function inflateFrom(\stdClass $sc)
	{
		if (property_exists($sc, 'Provider')) {
			$this->Provider = (int)($sc->Provider);
		}
		if (property_exists($sc, 'Flow')) {
			$this->Flow = (int)($sc->Flow);
		}
		if (property_exists($sc, 'TenantID') && !is_null($sc->TenantID)) {
			$this->TenantID = (string)($sc->TenantID);
		}
		if (property_exists($sc, 'ClientID')) {
			$this->ClientID = (string)($sc->ClientID);
		}
		if (property_exists($sc, 'ClientSecret')) {
			$this->ClientSecret = (string)($sc->ClientSecret);
		}
		if (property_exists($sc, 'ClientSecretFormat') && !is_null($sc->ClientSecretFormat)) {
			$this->ClientSecretFormat = (int)($sc->ClientSecretFormat);
		}
		if (property_exists($sc, 'RefreshToken') && !is_null($sc->RefreshToken)) {
			$this->RefreshToken = (string)($sc->RefreshToken);
		}
		if (property_exists($sc, 'RefreshTokenFormat') && !is_null($sc->RefreshTokenFormat)) {
			$this->RefreshTokenFormat = (int)($sc->RefreshTokenFormat);
		}
		foreach(get_object_vars($sc) as $k => $v) {
			switch($k) {
			case 'Provider':
			case 'Flow':
			case 'TenantID':
			case 'ClientID':
			case 'ClientSecret':
			case 'ClientSecretFormat':
			case 'RefreshToken':
			case 'RefreshTokenFormat':
				break;
			default:
				$this->__unknown_properties[$k] = $v;
			}
		}
	}

	/**
	 * Coerce a stdClass into a new strongly-typed SMTPOAuthOptions object.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return SMTPOAuthOptions
	 */
	public static function createFromStdclass(\stdClass $sc): \Comet\SMTPOAuthOptions
	{
		$retn = new SMTPOAuthOptions();
		$retn->inflateFrom($sc);
		return $retn;
	}

	/**
	 * Coerce a plain PHP array into a new strongly-typed SMTPOAuthOptions object.
	 * Because the Comet Server requires strict distinction between empty objects ({}) and arrays ([]),
	 * the result of this method may not be safe to re-submit to the Comet Server.
	 *
	 * @param array $arr Object data as PHP array
	 * @return SMTPOAuthOptions
	 */
	public static function createFromArray(array $arr): \Comet\SMTPOAuthOptions
	{
		$stdClass = json_decode(json_encode($arr, JSON_UNESCAPED_SLASHES));
		if (is_array($stdClass) && count($stdClass) === 0) {
			$stdClass = new \stdClass();
		}
		return self::createFromStdclass($stdClass);
	}

	/**
	 * Coerce a JSON string into a new strongly-typed SMTPOAuthOptions object.
	 *
	 * @param string $JsonString Object data as JSON string
	 * @return SMTPOAuthOptions
	 */
	public static function createFromJSON(string $JsonString): \Comet\SMTPOAuthOptions
	{
		$decodedJsonObject = json_decode($JsonString); // as stdClass
		if (\json_last_error() != \JSON_ERROR_NONE) {
			throw new \Exception("JSON decode failed: " . \json_last_error_msg(), \json_last_error());
		}
		$retn = new SMTPOAuthOptions();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}

	/**
	 * Convert this SMTPOAuthOptions object into a plain PHP array.
	 *
	 * Unknown properties may still be represented as \stdClass objects.
	 *
	 * @param bool $for_json_encode Represent key-value maps as \stdClass instead of plain PHP arrays
	 * @return array
	 */
	public function toArray(bool $for_json_encode = false): array
	{
		$ret = [];
		$ret["Provider"] = $this->Provider;
		$ret["Flow"] = $this->Flow;
		$ret["TenantID"] = $this->TenantID;
		$ret["ClientID"] = $this->ClientID;
		$ret["ClientSecret"] = $this->ClientSecret;
		$ret["ClientSecretFormat"] = $this->ClientSecretFormat;
		$ret["RefreshToken"] = $this->RefreshToken;
		$ret["RefreshTokenFormat"] = $this->RefreshTokenFormat;

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

