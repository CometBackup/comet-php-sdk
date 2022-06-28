<?php

/**
 * Copyright (c) 2018-2022 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 *
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

class HTTPConnectorOptions {

	/**
	 * @var string
	 */
	public $ListenAddress__DONOTUSEDIRECTLY = "";

	/**
	 * @var string
	 */
	public $SSLCertPath = "";

	/**
	 * @var string
	 */
	public $SSLIntermediate = "";

	/**
	 * @var string
	 */
	public $SSLCertKey = "";

	/**
	 * @var string
	 */
	public $AutoSSLDomains = "";

	/**
	 * @var string
	 */
	public $SSLPfxPath = "";

	/**
	 * @var string
	 */
	public $SSLPfxPassword = "";

	/**
	 * Preserve unknown properties when dealing with future server versions.
	 *
	 * @see HTTPConnectorOptions::RemoveUnknownProperties() Remove all unknown properties
	 * @var array
	 */
	private $__unknown_properties = [];

	/**
	 * Replace the content of this HTTPConnectorOptions object from a PHP \stdClass.
	 * The data could be supplied from an API call after json_decode(...); or generated manually.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return void
	 */
	protected function inflateFrom(\stdClass $sc)
	{
		if (property_exists($sc, 'ListenAddress')) {
			$this->ListenAddress__DONOTUSEDIRECTLY = (string)($sc->ListenAddress);
		}
		if (property_exists($sc, 'SSLCertPath') && !is_null($sc->SSLCertPath)) {
			$this->SSLCertPath = (string)($sc->SSLCertPath);
		}
		if (property_exists($sc, 'SSLIntermediate') && !is_null($sc->SSLIntermediate)) {
			$this->SSLIntermediate = (string)($sc->SSLIntermediate);
		}
		if (property_exists($sc, 'SSLCertKey') && !is_null($sc->SSLCertKey)) {
			$this->SSLCertKey = (string)($sc->SSLCertKey);
		}
		if (property_exists($sc, 'AutoSSLDomains') && !is_null($sc->AutoSSLDomains)) {
			$this->AutoSSLDomains = (string)($sc->AutoSSLDomains);
		}
		if (property_exists($sc, 'SSLPfxPath') && !is_null($sc->SSLPfxPath)) {
			$this->SSLPfxPath = (string)($sc->SSLPfxPath);
		}
		if (property_exists($sc, 'SSLPfxPassword') && !is_null($sc->SSLPfxPassword)) {
			$this->SSLPfxPassword = (string)($sc->SSLPfxPassword);
		}
		foreach(get_object_vars($sc) as $k => $v) {
			switch($k) {
			case 'ListenAddress':
			case 'SSLCertPath':
			case 'SSLIntermediate':
			case 'SSLCertKey':
			case 'AutoSSLDomains':
			case 'SSLPfxPath':
			case 'SSLPfxPassword':
				break;
			default:
				$this->__unknown_properties[$k] = $v;
			}
		}
	}

	/**
	 * Coerce a stdClass into a new strongly-typed HTTPConnectorOptions object.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return HTTPConnectorOptions
	 */
	public static function createFromStdclass(\stdClass $sc): \Comet\HTTPConnectorOptions
	{
		$retn = new HTTPConnectorOptions();
		$retn->inflateFrom($sc);
		return $retn;
	}

	/**
	 * Coerce a plain PHP array into a new strongly-typed HTTPConnectorOptions object.
	 * Because the Comet Server requires strict distinction between empty objects ({}) and arrays ([]),
	 * the result of this method may not be safe to re-submit to the Comet Server.
	 *
	 * @param array $arr Object data as PHP array
	 * @return HTTPConnectorOptions
	 */
	public static function createFromArray(array $arr): \Comet\HTTPConnectorOptions
	{
		$stdClass = json_decode(json_encode($arr, JSON_UNESCAPED_SLASHES));
		if (is_array($stdClass) && count($stdClass) === 0) {
			$stdClass = new \stdClass();
		}
		return self::createFromStdclass($stdClass);
	}

	/**
	 * Coerce a plain PHP array into a new strongly-typed HTTPConnectorOptions object.
	 * Because the Comet Server requires strict distinction between empty objects ({}) and arrays ([]),
	 * the result of this method may not be safe to re-submit to the Comet Server.
	 *
	 * @deprecated 3.0.0 Unsafe for round-trip server traversal. You should either
	 *             (A) acknowledge this and continue by switching to createFromArray, or
	 *             (b) switch to the roundtrip-safe createFromStdclass alternative.
	 * @param array $arr Object data as PHP array
	 * @return HTTPConnectorOptions
	 */
	public static function createFrom(array $arr): \Comet\HTTPConnectorOptions
	{
		return self::createFromArray($arr);
	}

	/**
	 * Coerce a JSON string into a new strongly-typed HTTPConnectorOptions object.
	 *
	 * @param string $JsonString Object data as JSON string
	 * @return HTTPConnectorOptions
	 */
	public static function createFromJSON(string $JsonString): \Comet\HTTPConnectorOptions
	{
		$decodedJsonObject = json_decode($JsonString); // as stdClass
		if (\json_last_error() != \JSON_ERROR_NONE) {
			throw new \Exception("JSON decode failed: " . \json_last_error_msg());
		}
		$retn = new HTTPConnectorOptions();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}

	/**
	 * Convert this HTTPConnectorOptions object into a plain PHP array.
	 *
	 * Unknown properties may still be represented as \stdClass objects.
	 *
	 * @param bool $for_json_encode Represent empty key-value maps as \stdClass instead of plain PHP arrays
	 * @return array
	 */
	public function toArray(bool $for_json_encode = false): array
	{
		$ret = [];
		$ret["ListenAddress"] = $this->ListenAddress__DONOTUSEDIRECTLY;
		$ret["SSLCertPath"] = $this->SSLCertPath;
		$ret["SSLIntermediate"] = $this->SSLIntermediate;
		$ret["SSLCertKey"] = $this->SSLCertKey;
		$ret["AutoSSLDomains"] = $this->AutoSSLDomains;
		$ret["SSLPfxPath"] = $this->SSLPfxPath;
		$ret["SSLPfxPassword"] = $this->SSLPfxPassword;

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

