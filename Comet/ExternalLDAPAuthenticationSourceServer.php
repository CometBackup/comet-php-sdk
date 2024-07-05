<?php

/**
 * Copyright (c) 2018-2024 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 *
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

class ExternalLDAPAuthenticationSourceServer {

	/**
	 * @var string
	 */
	public $Hostname = "";

	/**
	 * @var int
	 */
	public $Port = 0;

	/**
	 * One of the LDAPSECURITYMETHOD_ constants (e.g. "plain" / "ldaps" / "starttls")
	 *
	 * @var string
	 */
	public $SecurityMethod = "";

	/**
	 * @var boolean
	 */
	public $AcceptInvalidSSL = false;

	/**
	 * Preserve unknown properties when dealing with future server versions.
	 *
	 * @see ExternalLDAPAuthenticationSourceServer::RemoveUnknownProperties() Remove all unknown properties
	 * @var array
	 */
	private $__unknown_properties = [];

	/**
	 * Replace the content of this ExternalLDAPAuthenticationSourceServer object from a PHP \stdClass.
	 * The data could be supplied from an API call after json_decode(...); or generated manually.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return void
	 */
	protected function inflateFrom(\stdClass $sc)
	{
		if (property_exists($sc, 'Hostname')) {
			$this->Hostname = (string)($sc->Hostname);
		}
		if (property_exists($sc, 'Port')) {
			$this->Port = (int)($sc->Port);
		}
		if (property_exists($sc, 'SecurityMethod')) {
			$this->SecurityMethod = (string)($sc->SecurityMethod);
		}
		if (property_exists($sc, 'AcceptInvalidSSL')) {
			$this->AcceptInvalidSSL = (bool)($sc->AcceptInvalidSSL);
		}
		foreach(get_object_vars($sc) as $k => $v) {
			switch($k) {
			case 'Hostname':
			case 'Port':
			case 'SecurityMethod':
			case 'AcceptInvalidSSL':
				break;
			default:
				$this->__unknown_properties[$k] = $v;
			}
		}
	}

	/**
	 * Coerce a stdClass into a new strongly-typed ExternalLDAPAuthenticationSourceServer object.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return ExternalLDAPAuthenticationSourceServer
	 */
	public static function createFromStdclass(\stdClass $sc): \Comet\ExternalLDAPAuthenticationSourceServer
	{
		$retn = new ExternalLDAPAuthenticationSourceServer();
		$retn->inflateFrom($sc);
		return $retn;
	}

	/**
	 * Coerce a plain PHP array into a new strongly-typed ExternalLDAPAuthenticationSourceServer object.
	 * Because the Comet Server requires strict distinction between empty objects ({}) and arrays ([]),
	 * the result of this method may not be safe to re-submit to the Comet Server.
	 *
	 * @param array $arr Object data as PHP array
	 * @return ExternalLDAPAuthenticationSourceServer
	 */
	public static function createFromArray(array $arr): \Comet\ExternalLDAPAuthenticationSourceServer
	{
		$stdClass = json_decode(json_encode($arr, JSON_UNESCAPED_SLASHES));
		if (is_array($stdClass) && count($stdClass) === 0) {
			$stdClass = new \stdClass();
		}
		return self::createFromStdclass($stdClass);
	}

	/**
	 * Coerce a JSON string into a new strongly-typed ExternalLDAPAuthenticationSourceServer object.
	 *
	 * @param string $JsonString Object data as JSON string
	 * @return ExternalLDAPAuthenticationSourceServer
	 */
	public static function createFromJSON(string $JsonString): \Comet\ExternalLDAPAuthenticationSourceServer
	{
		$decodedJsonObject = json_decode($JsonString); // as stdClass
		if (\json_last_error() != \JSON_ERROR_NONE) {
			throw new \Exception("JSON decode failed: " . \json_last_error_msg(), \json_last_error());
		}
		$retn = new ExternalLDAPAuthenticationSourceServer();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}

	/**
	 * Convert this ExternalLDAPAuthenticationSourceServer object into a plain PHP array.
	 *
	 * Unknown properties may still be represented as \stdClass objects.
	 *
	 * @param bool $for_json_encode Represent key-value maps as \stdClass instead of plain PHP arrays
	 * @return array
	 */
	public function toArray(bool $for_json_encode = false): array
	{
		$ret = [];
		$ret["Hostname"] = $this->Hostname;
		$ret["Port"] = $this->Port;
		$ret["SecurityMethod"] = $this->SecurityMethod;
		$ret["AcceptInvalidSSL"] = $this->AcceptInvalidSSL;

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

