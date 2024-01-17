<?php

/**
 * Copyright (c) 2018-2024 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 *
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

class ExternalLDAPAuthenticationSourceSettings {

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
	 * @var \Comet\ExternalLDAPAuthenticationSourceServer[]
	 */
	public $FallbackServers = [];

	/**
	 * @var string
	 */
	public $BindUser = "";

	/**
	 * @var string
	 */
	public $BindPassword = "";

	/**
	 * @var string
	 */
	public $SearchDN = "";

	/**
	 * @var string
	 */
	public $SearchFilter = "";

	/**
	 * Preserve unknown properties when dealing with future server versions.
	 *
	 * @see ExternalLDAPAuthenticationSourceSettings::RemoveUnknownProperties() Remove all unknown properties
	 * @var array
	 */
	private $__unknown_properties = [];

	/**
	 * Replace the content of this ExternalLDAPAuthenticationSourceSettings object from a PHP \stdClass.
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
		if (property_exists($sc, 'FallbackServers')) {
			$val_2 = [];
			if ($sc->FallbackServers !== null) {
				for($i_2 = 0; $i_2 < count($sc->FallbackServers); ++$i_2) {
					if (is_array($sc->FallbackServers[$i_2]) && count($sc->FallbackServers[$i_2]) === 0) {
					// Work around edge case in json_decode--json_encode stdClass conversion
						$val_2[] = \Comet\ExternalLDAPAuthenticationSourceServer::createFromStdclass(new \stdClass());
					} else {
						$val_2[] = \Comet\ExternalLDAPAuthenticationSourceServer::createFromStdclass($sc->FallbackServers[$i_2]);
					}
				}
			}
			$this->FallbackServers = $val_2;
		}
		if (property_exists($sc, 'BindUser')) {
			$this->BindUser = (string)($sc->BindUser);
		}
		if (property_exists($sc, 'BindPassword')) {
			$this->BindPassword = (string)($sc->BindPassword);
		}
		if (property_exists($sc, 'SearchDN')) {
			$this->SearchDN = (string)($sc->SearchDN);
		}
		if (property_exists($sc, 'SearchFilter')) {
			$this->SearchFilter = (string)($sc->SearchFilter);
		}
		foreach(get_object_vars($sc) as $k => $v) {
			switch($k) {
			case 'Hostname':
			case 'Port':
			case 'SecurityMethod':
			case 'AcceptInvalidSSL':
			case 'FallbackServers':
			case 'BindUser':
			case 'BindPassword':
			case 'SearchDN':
			case 'SearchFilter':
				break;
			default:
				$this->__unknown_properties[$k] = $v;
			}
		}
	}

	/**
	 * Coerce a stdClass into a new strongly-typed ExternalLDAPAuthenticationSourceSettings object.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return ExternalLDAPAuthenticationSourceSettings
	 */
	public static function createFromStdclass(\stdClass $sc): \Comet\ExternalLDAPAuthenticationSourceSettings
	{
		$retn = new ExternalLDAPAuthenticationSourceSettings();
		$retn->inflateFrom($sc);
		return $retn;
	}

	/**
	 * Coerce a plain PHP array into a new strongly-typed ExternalLDAPAuthenticationSourceSettings object.
	 * Because the Comet Server requires strict distinction between empty objects ({}) and arrays ([]),
	 * the result of this method may not be safe to re-submit to the Comet Server.
	 *
	 * @param array $arr Object data as PHP array
	 * @return ExternalLDAPAuthenticationSourceSettings
	 */
	public static function createFromArray(array $arr): \Comet\ExternalLDAPAuthenticationSourceSettings
	{
		$stdClass = json_decode(json_encode($arr, JSON_UNESCAPED_SLASHES));
		if (is_array($stdClass) && count($stdClass) === 0) {
			$stdClass = new \stdClass();
		}
		return self::createFromStdclass($stdClass);
	}

	/**
	 * Coerce a JSON string into a new strongly-typed ExternalLDAPAuthenticationSourceSettings object.
	 *
	 * @param string $JsonString Object data as JSON string
	 * @return ExternalLDAPAuthenticationSourceSettings
	 */
	public static function createFromJSON(string $JsonString): \Comet\ExternalLDAPAuthenticationSourceSettings
	{
		$decodedJsonObject = json_decode($JsonString); // as stdClass
		if (\json_last_error() != \JSON_ERROR_NONE) {
			throw new \Exception("JSON decode failed: " . \json_last_error_msg(), \json_last_error());
		}
		$retn = new ExternalLDAPAuthenticationSourceSettings();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}

	/**
	 * Convert this ExternalLDAPAuthenticationSourceSettings object into a plain PHP array.
	 *
	 * Unknown properties may still be represented as \stdClass objects.
	 *
	 * @param bool $for_json_encode Represent empty key-value maps as \stdClass instead of plain PHP arrays
	 * @return array
	 */
	public function toArray(bool $for_json_encode = false): array
	{
		$ret = [];
		$ret["Hostname"] = $this->Hostname;
		$ret["Port"] = $this->Port;
		$ret["SecurityMethod"] = $this->SecurityMethod;
		$ret["AcceptInvalidSSL"] = $this->AcceptInvalidSSL;
		{
			$c0 = [];
			for($i0 = 0; $i0 < count($this->FallbackServers); ++$i0) {
				if ( $this->FallbackServers[$i0] === null ) {
					$val0 = $for_json_encode ? (object)[] : [];
				} else {
					$val0 = $this->FallbackServers[$i0]->toArray($for_json_encode);
				}
				$c0[] = $val0;
			}
			$ret["FallbackServers"] = $c0;
		}
		$ret["BindUser"] = $this->BindUser;
		$ret["BindPassword"] = $this->BindPassword;
		$ret["SearchDN"] = $this->SearchDN;
		$ret["SearchFilter"] = $this->SearchFilter;

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

