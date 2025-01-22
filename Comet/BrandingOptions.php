<?php

/**
 * Copyright (c) 2018-2025 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 *
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

class BrandingOptions {

	/**
	 * One of the BRANDINGSTYLETYPE_ constants
	 *
	 * @var int
	 * This field is available in Comet 23.3.3 and later.
	 */
	public $BrandingStyleType = 0;

	/**
	 * @var string
	 */
	public $BrandName = "";

	/**
	 * @var string
	 */
	public $LogoImage = "";

	/**
	 * @var string
	 */
	public $TopColor = "";

	/**
	 * @var string
	 */
	public $AccentColor = "";

	/**
	 * @var string
	 */
	public $Favicon = "";

	/**
	 * @var boolean
	 */
	public $HideNewsArea = false;

	/**
	 * @var string
	 */
	public $ProductName = "";

	/**
	 * @var string
	 */
	public $CompanyName = "";

	/**
	 * @var string
	 */
	public $HelpURL = "";

	/**
	 * @var boolean
	 */
	public $HelpIsPopup = false;

	/**
	 * @var string
	 */
	public $DefaultLoginServerURL = "";

	/**
	 * @var string
	 */
	public $TileBackgroundColor = "";

	/**
	 * @var string
	 */
	public $AccountRegisterURL = "";

	/**
	 * @var boolean
	 */
	public $HideBackgroundLogo = false;

	/**
	 * @var string
	 */
	public $CloudStorageName = "";

	/**
	 * @var boolean
	 */
	public $AdminHidePreBuiltClientOption = false;

	/**
	 * @var boolean
	 */
	public $AdminHideBrandedCloudStorage = false;

	/**
	 * One of the CLIENTBRANDINGBUILD_ constants
	 *
	 * @var int
	 */
	public $BuildMode = 0;

	/**
	 * @var string
	 */
	public $PathIcoFile = "";

	/**
	 * @var string
	 */
	public $PathIcnsFile = "";

	/**
	 * @var string
	 */
	public $PathMenuBarIcnsFile = "";

	/**
	 * @var string
	 */
	public $PathEulaRtf = "";

	/**
	 * @var string
	 */
	public $PathTilePng = "";

	/**
	 * @var string
	 */
	public $PathHeaderImage = "";

	/**
	 * @var string
	 */
	public $PathAppIconImage = "";

	/**
	 * @var string
	 */
	public $PackageIdentifier = "";

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
	 * @var \Comet\MacOSCodeSignProperties
	 */
	public $MacOSCodeSign = null;

	/**
	 * Preserve unknown properties when dealing with future server versions.
	 *
	 * @see BrandingOptions::RemoveUnknownProperties() Remove all unknown properties
	 * @var array
	 */
	private $__unknown_properties = [];

	/**
	 * Replace the content of this BrandingOptions object from a PHP \stdClass.
	 * The data could be supplied from an API call after json_decode(...); or generated manually.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return void
	 */
	protected function inflateFrom(\stdClass $sc)
	{
		if (property_exists($sc, 'BrandingStyleType')) {
			$this->BrandingStyleType = (int)($sc->BrandingStyleType);
		}
		if (property_exists($sc, 'BrandName')) {
			$this->BrandName = (string)($sc->BrandName);
		}
		if (property_exists($sc, 'LogoImage')) {
			$this->LogoImage = (string)($sc->LogoImage);
		}
		if (property_exists($sc, 'TopColor')) {
			$this->TopColor = (string)($sc->TopColor);
		}
		if (property_exists($sc, 'AccentColor')) {
			$this->AccentColor = (string)($sc->AccentColor);
		}
		if (property_exists($sc, 'Favicon')) {
			$this->Favicon = (string)($sc->Favicon);
		}
		if (property_exists($sc, 'HideNewsArea')) {
			$this->HideNewsArea = (bool)($sc->HideNewsArea);
		}
		if (property_exists($sc, 'ProductName')) {
			$this->ProductName = (string)($sc->ProductName);
		}
		if (property_exists($sc, 'CompanyName')) {
			$this->CompanyName = (string)($sc->CompanyName);
		}
		if (property_exists($sc, 'HelpURL')) {
			$this->HelpURL = (string)($sc->HelpURL);
		}
		if (property_exists($sc, 'HelpIsPopup')) {
			$this->HelpIsPopup = (bool)($sc->HelpIsPopup);
		}
		if (property_exists($sc, 'DefaultLoginServerURL')) {
			$this->DefaultLoginServerURL = (string)($sc->DefaultLoginServerURL);
		}
		if (property_exists($sc, 'TileBackgroundColor')) {
			$this->TileBackgroundColor = (string)($sc->TileBackgroundColor);
		}
		if (property_exists($sc, 'AccountRegisterURL')) {
			$this->AccountRegisterURL = (string)($sc->AccountRegisterURL);
		}
		if (property_exists($sc, 'HideBackgroundLogo')) {
			$this->HideBackgroundLogo = (bool)($sc->HideBackgroundLogo);
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
		if (property_exists($sc, 'BuildMode')) {
			$this->BuildMode = (int)($sc->BuildMode);
		}
		if (property_exists($sc, 'PathIcoFile')) {
			$this->PathIcoFile = (string)($sc->PathIcoFile);
		}
		if (property_exists($sc, 'PathIcnsFile')) {
			$this->PathIcnsFile = (string)($sc->PathIcnsFile);
		}
		if (property_exists($sc, 'PathMenuBarIcnsFile')) {
			$this->PathMenuBarIcnsFile = (string)($sc->PathMenuBarIcnsFile);
		}
		if (property_exists($sc, 'PathEulaRtf')) {
			$this->PathEulaRtf = (string)($sc->PathEulaRtf);
		}
		if (property_exists($sc, 'PathTilePng')) {
			$this->PathTilePng = (string)($sc->PathTilePng);
		}
		if (property_exists($sc, 'PathHeaderImage')) {
			$this->PathHeaderImage = (string)($sc->PathHeaderImage);
		}
		if (property_exists($sc, 'PathAppIconImage')) {
			$this->PathAppIconImage = (string)($sc->PathAppIconImage);
		}
		if (property_exists($sc, 'PackageIdentifier')) {
			$this->PackageIdentifier = (string)($sc->PackageIdentifier);
		}
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
		if (property_exists($sc, 'MacOSCodeSign')) {
			if (is_array($sc->MacOSCodeSign) && count($sc->MacOSCodeSign) === 0) {
			// Work around edge case in json_decode--json_encode stdClass conversion
				$this->MacOSCodeSign = \Comet\MacOSCodeSignProperties::createFromStdclass(new \stdClass());
			} else {
				$this->MacOSCodeSign = \Comet\MacOSCodeSignProperties::createFromStdclass($sc->MacOSCodeSign);
			}
		}
		foreach(get_object_vars($sc) as $k => $v) {
			switch($k) {
			case 'BrandingStyleType':
			case 'BrandName':
			case 'LogoImage':
			case 'TopColor':
			case 'AccentColor':
			case 'Favicon':
			case 'HideNewsArea':
			case 'ProductName':
			case 'CompanyName':
			case 'HelpURL':
			case 'HelpIsPopup':
			case 'DefaultLoginServerURL':
			case 'TileBackgroundColor':
			case 'AccountRegisterURL':
			case 'HideBackgroundLogo':
			case 'CloudStorageName':
			case 'AdminHidePreBuiltClientOption':
			case 'AdminHideBrandedCloudStorage':
			case 'BuildMode':
			case 'PathIcoFile':
			case 'PathIcnsFile':
			case 'PathMenuBarIcnsFile':
			case 'PathEulaRtf':
			case 'PathTilePng':
			case 'PathHeaderImage':
			case 'PathAppIconImage':
			case 'PackageIdentifier':
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
			case 'MacOSCodeSign':
				break;
			default:
				$this->__unknown_properties[$k] = $v;
			}
		}
	}

	/**
	 * Coerce a stdClass into a new strongly-typed BrandingOptions object.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return BrandingOptions
	 */
	public static function createFromStdclass(\stdClass $sc): \Comet\BrandingOptions
	{
		$retn = new BrandingOptions();
		$retn->inflateFrom($sc);
		return $retn;
	}

	/**
	 * Coerce a plain PHP array into a new strongly-typed BrandingOptions object.
	 * Because the Comet Server requires strict distinction between empty objects ({}) and arrays ([]),
	 * the result of this method may not be safe to re-submit to the Comet Server.
	 *
	 * @param array $arr Object data as PHP array
	 * @return BrandingOptions
	 */
	public static function createFromArray(array $arr): \Comet\BrandingOptions
	{
		$stdClass = json_decode(json_encode($arr, JSON_UNESCAPED_SLASHES));
		if (is_array($stdClass) && count($stdClass) === 0) {
			$stdClass = new \stdClass();
		}
		return self::createFromStdclass($stdClass);
	}

	/**
	 * Coerce a JSON string into a new strongly-typed BrandingOptions object.
	 *
	 * @param string $JsonString Object data as JSON string
	 * @return BrandingOptions
	 */
	public static function createFromJSON(string $JsonString): \Comet\BrandingOptions
	{
		$decodedJsonObject = json_decode($JsonString); // as stdClass
		if (\json_last_error() != \JSON_ERROR_NONE) {
			throw new \Exception("JSON decode failed: " . \json_last_error_msg(), \json_last_error());
		}
		$retn = new BrandingOptions();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}

	/**
	 * Convert this BrandingOptions object into a plain PHP array.
	 *
	 * Unknown properties may still be represented as \stdClass objects.
	 *
	 * @param bool $for_json_encode Represent key-value maps as \stdClass instead of plain PHP arrays
	 * @return array
	 */
	public function toArray(bool $for_json_encode = false): array
	{
		$ret = [];
		$ret["BrandingStyleType"] = $this->BrandingStyleType;
		$ret["BrandName"] = $this->BrandName;
		$ret["LogoImage"] = $this->LogoImage;
		$ret["TopColor"] = $this->TopColor;
		$ret["AccentColor"] = $this->AccentColor;
		$ret["Favicon"] = $this->Favicon;
		$ret["HideNewsArea"] = $this->HideNewsArea;
		$ret["ProductName"] = $this->ProductName;
		$ret["CompanyName"] = $this->CompanyName;
		$ret["HelpURL"] = $this->HelpURL;
		$ret["HelpIsPopup"] = $this->HelpIsPopup;
		$ret["DefaultLoginServerURL"] = $this->DefaultLoginServerURL;
		$ret["TileBackgroundColor"] = $this->TileBackgroundColor;
		$ret["AccountRegisterURL"] = $this->AccountRegisterURL;
		$ret["HideBackgroundLogo"] = $this->HideBackgroundLogo;
		$ret["CloudStorageName"] = $this->CloudStorageName;
		$ret["AdminHidePreBuiltClientOption"] = $this->AdminHidePreBuiltClientOption;
		$ret["AdminHideBrandedCloudStorage"] = $this->AdminHideBrandedCloudStorage;
		$ret["BuildMode"] = $this->BuildMode;
		$ret["PathIcoFile"] = $this->PathIcoFile;
		$ret["PathIcnsFile"] = $this->PathIcnsFile;
		$ret["PathMenuBarIcnsFile"] = $this->PathMenuBarIcnsFile;
		$ret["PathEulaRtf"] = $this->PathEulaRtf;
		$ret["PathTilePng"] = $this->PathTilePng;
		$ret["PathHeaderImage"] = $this->PathHeaderImage;
		$ret["PathAppIconImage"] = $this->PathAppIconImage;
		$ret["PackageIdentifier"] = $this->PackageIdentifier;
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
		if ( $this->MacOSCodeSign === null ) {
			$ret["MacOSCodeSign"] = $for_json_encode ? (object)[] : [];
		} else {
			$ret["MacOSCodeSign"] = $this->MacOSCodeSign->toArray($for_json_encode);
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
		if ($this->MacOSCodeSign !== null) {
			$this->MacOSCodeSign->RemoveUnknownProperties();
		}
	}

}

