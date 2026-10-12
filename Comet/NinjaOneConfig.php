<?php

/**
 * Copyright (c) 2018-2026 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 *
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

class NinjaOneConfig {

	/**
	 * OAuth 2.0 Client ID for NinjaOne API
	 *
	 * @var string
	 */
	public $ClientID = "";

	/**
	 * OAuth 2.0 Client Secret for NinjaOne API
	 *
	 * @var string
	 */
	public $ClientSecret = "";

	/**
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
	 * Whether to create and manage tickets in NinjaOne for backup failures
	 *
	 * @var boolean
	 */
	public $TicketsEnabled = false;

	/**
	 * NinjaOne client (organization) ID. Required when tickets are enabled.
	 *
	 * @var int
	 */
	public $NinjaClientID = 0;

	/**
	 * Preserve unknown properties when dealing with future server versions.
	 *
	 * @see NinjaOneConfig::RemoveUnknownProperties() Remove all unknown properties
	 * @var array
	 */
	private $__unknown_properties = [];

	/**
	 * Replace the content of this NinjaOneConfig object from a PHP \stdClass.
	 * The data could be supplied from an API call after json_decode(...); or generated manually.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return void
	 */
	protected function inflateFrom(\stdClass $sc)
	{
		if (property_exists($sc, 'ClientID') && !is_null($sc->ClientID)) {
			$this->ClientID = (string)($sc->ClientID);
		}
		if (property_exists($sc, 'ClientSecret') && !is_null($sc->ClientSecret)) {
			$this->ClientSecret = (string)($sc->ClientSecret);
		}
		if (property_exists($sc, 'RefreshToken') && !is_null($sc->RefreshToken)) {
			$this->RefreshToken = (string)($sc->RefreshToken);
		}
		if (property_exists($sc, 'RefreshTokenFormat') && !is_null($sc->RefreshTokenFormat)) {
			$this->RefreshTokenFormat = (int)($sc->RefreshTokenFormat);
		}
		if (property_exists($sc, 'TicketsEnabled')) {
			$this->TicketsEnabled = (bool)($sc->TicketsEnabled);
		}
		if (property_exists($sc, 'NinjaClientID') && !is_null($sc->NinjaClientID)) {
			$this->NinjaClientID = (int)($sc->NinjaClientID);
		}
		foreach(get_object_vars($sc) as $k => $v) {
			switch($k) {
			case 'ClientID':
			case 'ClientSecret':
			case 'RefreshToken':
			case 'RefreshTokenFormat':
			case 'TicketsEnabled':
			case 'NinjaClientID':
				break;
			default:
				$this->__unknown_properties[$k] = $v;
			}
		}
	}

	/**
	 * Coerce a stdClass into a new strongly-typed NinjaOneConfig object.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return NinjaOneConfig
	 */
	public static function createFromStdclass(\stdClass $sc): \Comet\NinjaOneConfig
	{
		$retn = new NinjaOneConfig();
		$retn->inflateFrom($sc);
		return $retn;
	}

	/**
	 * Coerce a plain PHP array into a new strongly-typed NinjaOneConfig object.
	 * Because the Comet Server requires strict distinction between empty objects ({}) and arrays ([]),
	 * the result of this method may not be safe to re-submit to the Comet Server.
	 *
	 * @param array $arr Object data as PHP array
	 * @return NinjaOneConfig
	 */
	public static function createFromArray(array $arr): \Comet\NinjaOneConfig
	{
		$stdClass = json_decode(json_encode($arr, JSON_UNESCAPED_SLASHES));
		if (is_array($stdClass) && count($stdClass) === 0) {
			$stdClass = new \stdClass();
		}
		return self::createFromStdclass($stdClass);
	}

	/**
	 * Coerce a JSON string into a new strongly-typed NinjaOneConfig object.
	 *
	 * @param string $JsonString Object data as JSON string
	 * @return NinjaOneConfig
	 */
	public static function createFromJSON(string $JsonString): \Comet\NinjaOneConfig
	{
		$decodedJsonObject = json_decode($JsonString); // as stdClass
		if (\json_last_error() != \JSON_ERROR_NONE) {
			throw new \Exception("JSON decode failed: " . \json_last_error_msg(), \json_last_error());
		}
		$retn = new NinjaOneConfig();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}

	/**
	 * Convert this NinjaOneConfig object into a plain PHP array.
	 *
	 * Unknown properties may still be represented as \stdClass objects.
	 *
	 * @param bool $for_json_encode Represent key-value maps as \stdClass instead of plain PHP arrays
	 * @return array
	 */
	public function toArray(bool $for_json_encode = false): array
	{
		$ret = [];
		$ret["ClientID"] = $this->ClientID;
		$ret["ClientSecret"] = $this->ClientSecret;
		$ret["RefreshToken"] = $this->RefreshToken;
		$ret["RefreshTokenFormat"] = $this->RefreshTokenFormat;
		$ret["TicketsEnabled"] = $this->TicketsEnabled;
		$ret["NinjaClientID"] = $this->NinjaClientID;

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

