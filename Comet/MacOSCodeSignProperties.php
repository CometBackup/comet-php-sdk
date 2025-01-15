<?php

/**
 * Copyright (c) 2018-2025 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 *
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

class MacOSCodeSignProperties {

	/**
	 * One of the MACOSCODESIGN_LEVEL_ constants
	 *
	 * @var int
	 */
	public $Level = 0;

	/**
	 * @var boolean
	 */
	public $SignLocally = false;

	/**
	 * @var \Comet\SSHConnection
	 */
	public $SSHServer = null;

	/**
	 * "Developer ID Installer" certificate, either a local filepath or a resource:// URI. Used for
	 * signing the final flat *.pkg.
	 *
	 * @var string
	 */
	public $CertificateName = "";

	/**
	 * "Developer ID Application" certificate, either a local filepath or a resource:// URI. Used for
	 * signing internal binaries if Notary is enabled
	 *
	 * @var string
	 */
	public $AppCertificateName = "";

	/**
	 * @var string
	 */
	public $AppleID = "";

	/**
	 * @var string
	 */
	public $AppleIDPass = "";

	/**
	 * One of the ENCRYPTIONMETHOD_ constants
	 *
	 * @var int
	 */
	public $AppleIDPassFormat = 0;

	/**
	 * @var string
	 */
	public $CertificateFile = "";

	/**
	 * @var string
	 */
	public $AppCertificateFile = "";

	/**
	 * @var string
	 */
	public $PfxFilePassword = "";

	/**
	 * One of the ENCRYPTIONMETHOD_ constants
	 *
	 * @var int
	 */
	public $PfxFilePasswordFormat = 0;

	/**
	 * @var string
	 */
	public $NotaryAPIIssuerID = "";

	/**
	 * @var string
	 */
	public $NotaryAPIKeyID = "";

	/**
	 * @var string
	 */
	public $NotaryAPIKeyFile = "";

	/**
	 * Preserve unknown properties when dealing with future server versions.
	 *
	 * @see MacOSCodeSignProperties::RemoveUnknownProperties() Remove all unknown properties
	 * @var array
	 */
	private $__unknown_properties = [];

	/**
	 * Replace the content of this MacOSCodeSignProperties object from a PHP \stdClass.
	 * The data could be supplied from an API call after json_decode(...); or generated manually.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return void
	 */
	protected function inflateFrom(\stdClass $sc)
	{
		if (property_exists($sc, 'Level')) {
			$this->Level = (int)($sc->Level);
		}
		if (property_exists($sc, 'SignLocally')) {
			$this->SignLocally = (bool)($sc->SignLocally);
		}
		if (property_exists($sc, 'SSHServer')) {
			if (is_array($sc->SSHServer) && count($sc->SSHServer) === 0) {
			// Work around edge case in json_decode--json_encode stdClass conversion
				$this->SSHServer = \Comet\SSHConnection::createFromStdclass(new \stdClass());
			} else {
				$this->SSHServer = \Comet\SSHConnection::createFromStdclass($sc->SSHServer);
			}
		}
		if (property_exists($sc, 'CertificateName')) {
			$this->CertificateName = (string)($sc->CertificateName);
		}
		if (property_exists($sc, 'AppCertificateName')) {
			$this->AppCertificateName = (string)($sc->AppCertificateName);
		}
		if (property_exists($sc, 'AppleID')) {
			$this->AppleID = (string)($sc->AppleID);
		}
		if (property_exists($sc, 'AppleIDPass')) {
			$this->AppleIDPass = (string)($sc->AppleIDPass);
		}
		if (property_exists($sc, 'AppleIDPassFormat')) {
			$this->AppleIDPassFormat = (int)($sc->AppleIDPassFormat);
		}
		if (property_exists($sc, 'CertificateFile')) {
			$this->CertificateFile = (string)($sc->CertificateFile);
		}
		if (property_exists($sc, 'AppCertificateFile')) {
			$this->AppCertificateFile = (string)($sc->AppCertificateFile);
		}
		if (property_exists($sc, 'PfxFilePassword')) {
			$this->PfxFilePassword = (string)($sc->PfxFilePassword);
		}
		if (property_exists($sc, 'PfxFilePasswordFormat')) {
			$this->PfxFilePasswordFormat = (int)($sc->PfxFilePasswordFormat);
		}
		if (property_exists($sc, 'NotaryAPIIssuerID')) {
			$this->NotaryAPIIssuerID = (string)($sc->NotaryAPIIssuerID);
		}
		if (property_exists($sc, 'NotaryAPIKeyID')) {
			$this->NotaryAPIKeyID = (string)($sc->NotaryAPIKeyID);
		}
		if (property_exists($sc, 'NotaryAPIKeyFile')) {
			$this->NotaryAPIKeyFile = (string)($sc->NotaryAPIKeyFile);
		}
		foreach(get_object_vars($sc) as $k => $v) {
			switch($k) {
			case 'Level':
			case 'SignLocally':
			case 'SSHServer':
			case 'CertificateName':
			case 'AppCertificateName':
			case 'AppleID':
			case 'AppleIDPass':
			case 'AppleIDPassFormat':
			case 'CertificateFile':
			case 'AppCertificateFile':
			case 'PfxFilePassword':
			case 'PfxFilePasswordFormat':
			case 'NotaryAPIIssuerID':
			case 'NotaryAPIKeyID':
			case 'NotaryAPIKeyFile':
				break;
			default:
				$this->__unknown_properties[$k] = $v;
			}
		}
	}

	/**
	 * Coerce a stdClass into a new strongly-typed MacOSCodeSignProperties object.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return MacOSCodeSignProperties
	 */
	public static function createFromStdclass(\stdClass $sc): \Comet\MacOSCodeSignProperties
	{
		$retn = new MacOSCodeSignProperties();
		$retn->inflateFrom($sc);
		return $retn;
	}

	/**
	 * Coerce a plain PHP array into a new strongly-typed MacOSCodeSignProperties object.
	 * Because the Comet Server requires strict distinction between empty objects ({}) and arrays ([]),
	 * the result of this method may not be safe to re-submit to the Comet Server.
	 *
	 * @param array $arr Object data as PHP array
	 * @return MacOSCodeSignProperties
	 */
	public static function createFromArray(array $arr): \Comet\MacOSCodeSignProperties
	{
		$stdClass = json_decode(json_encode($arr, JSON_UNESCAPED_SLASHES));
		if (is_array($stdClass) && count($stdClass) === 0) {
			$stdClass = new \stdClass();
		}
		return self::createFromStdclass($stdClass);
	}

	/**
	 * Coerce a JSON string into a new strongly-typed MacOSCodeSignProperties object.
	 *
	 * @param string $JsonString Object data as JSON string
	 * @return MacOSCodeSignProperties
	 */
	public static function createFromJSON(string $JsonString): \Comet\MacOSCodeSignProperties
	{
		$decodedJsonObject = json_decode($JsonString); // as stdClass
		if (\json_last_error() != \JSON_ERROR_NONE) {
			throw new \Exception("JSON decode failed: " . \json_last_error_msg(), \json_last_error());
		}
		$retn = new MacOSCodeSignProperties();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}

	/**
	 * Convert this MacOSCodeSignProperties object into a plain PHP array.
	 *
	 * Unknown properties may still be represented as \stdClass objects.
	 *
	 * @param bool $for_json_encode Represent key-value maps as \stdClass instead of plain PHP arrays
	 * @return array
	 */
	public function toArray(bool $for_json_encode = false): array
	{
		$ret = [];
		$ret["Level"] = $this->Level;
		$ret["SignLocally"] = $this->SignLocally;
		if ( $this->SSHServer === null ) {
			$ret["SSHServer"] = $for_json_encode ? (object)[] : [];
		} else {
			$ret["SSHServer"] = $this->SSHServer->toArray($for_json_encode);
		}
		$ret["CertificateName"] = $this->CertificateName;
		$ret["AppCertificateName"] = $this->AppCertificateName;
		$ret["AppleID"] = $this->AppleID;
		$ret["AppleIDPass"] = $this->AppleIDPass;
		$ret["AppleIDPassFormat"] = $this->AppleIDPassFormat;
		$ret["CertificateFile"] = $this->CertificateFile;
		$ret["AppCertificateFile"] = $this->AppCertificateFile;
		$ret["PfxFilePassword"] = $this->PfxFilePassword;
		$ret["PfxFilePasswordFormat"] = $this->PfxFilePasswordFormat;
		$ret["NotaryAPIIssuerID"] = $this->NotaryAPIIssuerID;
		$ret["NotaryAPIKeyID"] = $this->NotaryAPIKeyID;
		$ret["NotaryAPIKeyFile"] = $this->NotaryAPIKeyFile;

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
		if ($this->SSHServer !== null) {
			$this->SSHServer->RemoveUnknownProperties();
		}
	}

}

