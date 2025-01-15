<?php

/**
 * Copyright (c) 2018-2025 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 *
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

class WindowsCodeSignProperties {

	/**
	 * One of the WINDOWSCODESIGN_METHOD_ constants
	 *
	 * @var int
	 */
	public $WindowsCodeSignMethod = 0;

	/**
	 * @var string
	 */
	public $WindowsCodeSignPKCS12FilePath = "";

	/**
	 * One of the ENCRYPTIONMETHOD_ constants
	 *
	 * @var int
	 */
	public $WindowsCodeSignPKCS12PasswordFormat = 0;

	/**
	 * @var string
	 */
	public $WindowsCodeSignPKCS12Password = "";

	/**
	 * @var string
	 */
	public $WindowsCodeSignPKCS11Engine = "";

	/**
	 * @var string
	 */
	public $WindowsCodeSignPKCS11Module = "";

	/**
	 * This field was deprecated between 23.3.0 and 23.6.x, but is now used again.
	 *
	 * @var string
	 */
	public $WindowsCodeSignPKCS11Certfile = "";

	/**
	 * @var string
	 */
	public $WindowsCodeSignPKCS11KeyID = "";

	/**
	 * One of the ENCRYPTIONMETHOD_ constants
	 *
	 * @var int
	 */
	public $WindowsCodeSignPKCS11PasswordFormat = 0;

	/**
	 * @var string
	 */
	public $WindowsCodeSignPKCS11Password = "";

	/**
	 * @var string
	 */
	public $WindowsCodeSignAzureVaultName = "";

	/**
	 * @var string
	 */
	public $WindowsCodeSignAzureCertName = "";

	/**
	 * @var string
	 */
	public $WindowsCodeSignAzureAppID = "";

	/**
	 * One of the ENCRYPTIONMETHOD_ constants
	 *
	 * @var int
	 */
	public $WindowsCodeSignAzureAppSecretFormat = 0;

	/**
	 * @var string
	 */
	public $WindowsCodeSignAzureAppSecret = "";

	/**
	 * @var string
	 */
	public $WindowsCodeSignAzureTenantID = "";

	/**
	 * Preserve unknown properties when dealing with future server versions.
	 *
	 * @see WindowsCodeSignProperties::RemoveUnknownProperties() Remove all unknown properties
	 * @var array
	 */
	private $__unknown_properties = [];

	/**
	 * Replace the content of this WindowsCodeSignProperties object from a PHP \stdClass.
	 * The data could be supplied from an API call after json_decode(...); or generated manually.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return void
	 */
	protected function inflateFrom(\stdClass $sc)
	{
		if (property_exists($sc, 'WindowsCodeSignMethod')) {
			$this->WindowsCodeSignMethod = (int)($sc->WindowsCodeSignMethod);
		}
		if (property_exists($sc, 'WindowsCodeSignPKCS12FilePath')) {
			$this->WindowsCodeSignPKCS12FilePath = (string)($sc->WindowsCodeSignPKCS12FilePath);
		}
		if (property_exists($sc, 'WindowsCodeSignPKCS12PasswordFormat')) {
			$this->WindowsCodeSignPKCS12PasswordFormat = (int)($sc->WindowsCodeSignPKCS12PasswordFormat);
		}
		if (property_exists($sc, 'WindowsCodeSignPKCS12Password')) {
			$this->WindowsCodeSignPKCS12Password = (string)($sc->WindowsCodeSignPKCS12Password);
		}
		if (property_exists($sc, 'WindowsCodeSignPKCS11Engine')) {
			$this->WindowsCodeSignPKCS11Engine = (string)($sc->WindowsCodeSignPKCS11Engine);
		}
		if (property_exists($sc, 'WindowsCodeSignPKCS11Module')) {
			$this->WindowsCodeSignPKCS11Module = (string)($sc->WindowsCodeSignPKCS11Module);
		}
		if (property_exists($sc, 'WindowsCodeSignPKCS11Certfile')) {
			$this->WindowsCodeSignPKCS11Certfile = (string)($sc->WindowsCodeSignPKCS11Certfile);
		}
		if (property_exists($sc, 'WindowsCodeSignPKCS11KeyID')) {
			$this->WindowsCodeSignPKCS11KeyID = (string)($sc->WindowsCodeSignPKCS11KeyID);
		}
		if (property_exists($sc, 'WindowsCodeSignPKCS11PasswordFormat')) {
			$this->WindowsCodeSignPKCS11PasswordFormat = (int)($sc->WindowsCodeSignPKCS11PasswordFormat);
		}
		if (property_exists($sc, 'WindowsCodeSignPKCS11Password')) {
			$this->WindowsCodeSignPKCS11Password = (string)($sc->WindowsCodeSignPKCS11Password);
		}
		if (property_exists($sc, 'WindowsCodeSignAzureVaultName')) {
			$this->WindowsCodeSignAzureVaultName = (string)($sc->WindowsCodeSignAzureVaultName);
		}
		if (property_exists($sc, 'WindowsCodeSignAzureCertName')) {
			$this->WindowsCodeSignAzureCertName = (string)($sc->WindowsCodeSignAzureCertName);
		}
		if (property_exists($sc, 'WindowsCodeSignAzureAppID')) {
			$this->WindowsCodeSignAzureAppID = (string)($sc->WindowsCodeSignAzureAppID);
		}
		if (property_exists($sc, 'WindowsCodeSignAzureAppSecretFormat')) {
			$this->WindowsCodeSignAzureAppSecretFormat = (int)($sc->WindowsCodeSignAzureAppSecretFormat);
		}
		if (property_exists($sc, 'WindowsCodeSignAzureAppSecret')) {
			$this->WindowsCodeSignAzureAppSecret = (string)($sc->WindowsCodeSignAzureAppSecret);
		}
		if (property_exists($sc, 'WindowsCodeSignAzureTenantID')) {
			$this->WindowsCodeSignAzureTenantID = (string)($sc->WindowsCodeSignAzureTenantID);
		}
		foreach(get_object_vars($sc) as $k => $v) {
			switch($k) {
			case 'WindowsCodeSignMethod':
			case 'WindowsCodeSignPKCS12FilePath':
			case 'WindowsCodeSignPKCS12PasswordFormat':
			case 'WindowsCodeSignPKCS12Password':
			case 'WindowsCodeSignPKCS11Engine':
			case 'WindowsCodeSignPKCS11Module':
			case 'WindowsCodeSignPKCS11Certfile':
			case 'WindowsCodeSignPKCS11KeyID':
			case 'WindowsCodeSignPKCS11PasswordFormat':
			case 'WindowsCodeSignPKCS11Password':
			case 'WindowsCodeSignAzureVaultName':
			case 'WindowsCodeSignAzureCertName':
			case 'WindowsCodeSignAzureAppID':
			case 'WindowsCodeSignAzureAppSecretFormat':
			case 'WindowsCodeSignAzureAppSecret':
			case 'WindowsCodeSignAzureTenantID':
				break;
			default:
				$this->__unknown_properties[$k] = $v;
			}
		}
	}

	/**
	 * Coerce a stdClass into a new strongly-typed WindowsCodeSignProperties object.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return WindowsCodeSignProperties
	 */
	public static function createFromStdclass(\stdClass $sc): \Comet\WindowsCodeSignProperties
	{
		$retn = new WindowsCodeSignProperties();
		$retn->inflateFrom($sc);
		return $retn;
	}

	/**
	 * Coerce a plain PHP array into a new strongly-typed WindowsCodeSignProperties object.
	 * Because the Comet Server requires strict distinction between empty objects ({}) and arrays ([]),
	 * the result of this method may not be safe to re-submit to the Comet Server.
	 *
	 * @param array $arr Object data as PHP array
	 * @return WindowsCodeSignProperties
	 */
	public static function createFromArray(array $arr): \Comet\WindowsCodeSignProperties
	{
		$stdClass = json_decode(json_encode($arr, JSON_UNESCAPED_SLASHES));
		if (is_array($stdClass) && count($stdClass) === 0) {
			$stdClass = new \stdClass();
		}
		return self::createFromStdclass($stdClass);
	}

	/**
	 * Coerce a JSON string into a new strongly-typed WindowsCodeSignProperties object.
	 *
	 * @param string $JsonString Object data as JSON string
	 * @return WindowsCodeSignProperties
	 */
	public static function createFromJSON(string $JsonString): \Comet\WindowsCodeSignProperties
	{
		$decodedJsonObject = json_decode($JsonString); // as stdClass
		if (\json_last_error() != \JSON_ERROR_NONE) {
			throw new \Exception("JSON decode failed: " . \json_last_error_msg(), \json_last_error());
		}
		$retn = new WindowsCodeSignProperties();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}

	/**
	 * Convert this WindowsCodeSignProperties object into a plain PHP array.
	 *
	 * Unknown properties may still be represented as \stdClass objects.
	 *
	 * @param bool $for_json_encode Represent key-value maps as \stdClass instead of plain PHP arrays
	 * @return array
	 */
	public function toArray(bool $for_json_encode = false): array
	{
		$ret = [];
		$ret["WindowsCodeSignMethod"] = $this->WindowsCodeSignMethod;
		$ret["WindowsCodeSignPKCS12FilePath"] = $this->WindowsCodeSignPKCS12FilePath;
		$ret["WindowsCodeSignPKCS12PasswordFormat"] = $this->WindowsCodeSignPKCS12PasswordFormat;
		$ret["WindowsCodeSignPKCS12Password"] = $this->WindowsCodeSignPKCS12Password;
		$ret["WindowsCodeSignPKCS11Engine"] = $this->WindowsCodeSignPKCS11Engine;
		$ret["WindowsCodeSignPKCS11Module"] = $this->WindowsCodeSignPKCS11Module;
		$ret["WindowsCodeSignPKCS11Certfile"] = $this->WindowsCodeSignPKCS11Certfile;
		$ret["WindowsCodeSignPKCS11KeyID"] = $this->WindowsCodeSignPKCS11KeyID;
		$ret["WindowsCodeSignPKCS11PasswordFormat"] = $this->WindowsCodeSignPKCS11PasswordFormat;
		$ret["WindowsCodeSignPKCS11Password"] = $this->WindowsCodeSignPKCS11Password;
		$ret["WindowsCodeSignAzureVaultName"] = $this->WindowsCodeSignAzureVaultName;
		$ret["WindowsCodeSignAzureCertName"] = $this->WindowsCodeSignAzureCertName;
		$ret["WindowsCodeSignAzureAppID"] = $this->WindowsCodeSignAzureAppID;
		$ret["WindowsCodeSignAzureAppSecretFormat"] = $this->WindowsCodeSignAzureAppSecretFormat;
		$ret["WindowsCodeSignAzureAppSecret"] = $this->WindowsCodeSignAzureAppSecret;
		$ret["WindowsCodeSignAzureTenantID"] = $this->WindowsCodeSignAzureTenantID;

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

