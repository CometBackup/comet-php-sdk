<?php

/**
 * Copyright (c) 2018-2026 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 *
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

class PrivateBrandingProperties {

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
	 * URL of the SAS Relic server, with protocol (https://) and trailing slash
	 *
	 * @var string
	 */
	public $WindowsCodeSignRelicServerURL = "";

	/**
	 * The SAS Relic client keypair in PEM format
	 *
	 * @var string
	 */
	public $WindowsCodeSignRelicKeypairFile = "";

	/**
	 * The name of the key to select on the remote SAS Relic server
	 *
	 * @var string
	 */
	public $WindowsCodeSignRelicKeyName = "";

	/**
	 * The AWS region containing the KMS key, e.g. us-east-1
	 *
	 * @var string
	 */
	public $WindowsCodeSignAWSRegion = "";

	/**
	 * The access key ID of an IAM user permitted to call kms:GetPublicKey and kms:Sign on the key
	 *
	 * @var string
	 */
	public $WindowsCodeSignAWSAccessKeyID = "";

	/**
	 * One of the ENCRYPTIONMETHOD_ constants
	 *
	 * @var int
	 */
	public $WindowsCodeSignAWSSecretAccessKeyFormat = 0;

	/**
	 * @var string
	 */
	public $WindowsCodeSignAWSSecretAccessKey = "";

	/**
	 * The KMS key ID, key ARN, alias name (alias/...) or alias ARN of an asymmetric SIGN_VERIFY key
	 *
	 * @var string
	 */
	public $WindowsCodeSignAWSKMSKeyID = "";

	/**
	 * The X.509 code signing certificate for the KMS key, and optionally its intermediate certificates,
	 * in PEM or DER format
	 *
	 * @var string
	 */
	public $WindowsCodeSignAWSCertfile = "";

	/**
	 * The full resource name of a Cloud KMS asymmetric signing key version:
	 * projects/PROJECT/locations/LOCATION/keyRings/KEYRING/cryptoKeys/KEY/cryptoKeyVersions/VERSION
	 *
	 * @var string
	 */
	public $WindowsCodeSignGCPKMSKeyVersion = "";

	/**
	 * One of the ENCRYPTIONMETHOD_ constants
	 *
	 * @var int
	 */
	public $WindowsCodeSignGCPServiceAccountKeyFormat = 0;

	/**
	 * The JSON key file contents of a Google Cloud service account with the Cloud KMS Signer/Verifier
	 * role on the key version. Only keys of type service_account are accepted.
	 *
	 * @var string
	 */
	public $WindowsCodeSignGCPServiceAccountKey = "";

	/**
	 * The X.509 code signing certificate for the Cloud KMS key, and optionally its intermediate
	 * certificates, in PEM or DER format
	 *
	 * @var string
	 */
	public $WindowsCodeSignGCPCertfile = "";

	/**
	 * The regional endpoint of the Azure Artifact Signing account, e.g.
	 * https://eus.codesigning.azure.net
	 *
	 * @var string
	 */
	public $WindowsCodeSignAzureArtifactSigningEndpoint = "";

	/**
	 * The Azure Artifact Signing account name
	 *
	 * @var string
	 */
	public $WindowsCodeSignAzureArtifactSigningAccount = "";

	/**
	 * The certificate profile name within the Azure Artifact Signing account
	 *
	 * @var string
	 */
	public $WindowsCodeSignAzureArtifactSigningProfile = "";

	/**
	 * The Microsoft Entra tenant ID of the app registration
	 *
	 * @var string
	 */
	public $WindowsCodeSignAzureArtifactSigningTenantID = "";

	/**
	 * The application (client) ID of a Microsoft Entra app registration with the Artifact Signing
	 * Certificate Profile Signer role on the certificate profile
	 *
	 * @var string
	 */
	public $WindowsCodeSignAzureArtifactSigningAppID = "";

	/**
	 * One of the ENCRYPTIONMETHOD_ constants
	 *
	 * @var int
	 */
	public $WindowsCodeSignAzureArtifactSigningAppSecretFormat = 0;

	/**
	 * A client secret of the app registration
	 *
	 * @var string
	 */
	public $WindowsCodeSignAzureArtifactSigningAppSecret = "";

	/**
	 * @var \Comet\MacOSCodeSignProperties
	 */
	public $MacOSCodeSign = null;

	/**
	 * @var \Comet\LinuxRpmCodeSignProperties
	 */
	public $LinuxRpmCodeSign = null;

	/**
	 * Preserve unknown properties when dealing with future server versions.
	 *
	 * @see PrivateBrandingProperties::RemoveUnknownProperties() Remove all unknown properties
	 * @var array
	 */
	private $__unknown_properties = [];

	/**
	 * Replace the content of this PrivateBrandingProperties object from a PHP \stdClass.
	 * The data could be supplied from an API call after json_decode(...); or generated manually.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return void
	 */
	protected function inflateFrom(\stdClass $sc)
	{
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
		if (property_exists($sc, 'WindowsCodeSignRelicServerURL')) {
			$this->WindowsCodeSignRelicServerURL = (string)($sc->WindowsCodeSignRelicServerURL);
		}
		if (property_exists($sc, 'WindowsCodeSignRelicKeypairFile')) {
			$this->WindowsCodeSignRelicKeypairFile = (string)($sc->WindowsCodeSignRelicKeypairFile);
		}
		if (property_exists($sc, 'WindowsCodeSignRelicKeyName')) {
			$this->WindowsCodeSignRelicKeyName = (string)($sc->WindowsCodeSignRelicKeyName);
		}
		if (property_exists($sc, 'WindowsCodeSignAWSRegion')) {
			$this->WindowsCodeSignAWSRegion = (string)($sc->WindowsCodeSignAWSRegion);
		}
		if (property_exists($sc, 'WindowsCodeSignAWSAccessKeyID')) {
			$this->WindowsCodeSignAWSAccessKeyID = (string)($sc->WindowsCodeSignAWSAccessKeyID);
		}
		if (property_exists($sc, 'WindowsCodeSignAWSSecretAccessKeyFormat')) {
			$this->WindowsCodeSignAWSSecretAccessKeyFormat = (int)($sc->WindowsCodeSignAWSSecretAccessKeyFormat);
		}
		if (property_exists($sc, 'WindowsCodeSignAWSSecretAccessKey')) {
			$this->WindowsCodeSignAWSSecretAccessKey = (string)($sc->WindowsCodeSignAWSSecretAccessKey);
		}
		if (property_exists($sc, 'WindowsCodeSignAWSKMSKeyID')) {
			$this->WindowsCodeSignAWSKMSKeyID = (string)($sc->WindowsCodeSignAWSKMSKeyID);
		}
		if (property_exists($sc, 'WindowsCodeSignAWSCertfile')) {
			$this->WindowsCodeSignAWSCertfile = (string)($sc->WindowsCodeSignAWSCertfile);
		}
		if (property_exists($sc, 'WindowsCodeSignGCPKMSKeyVersion')) {
			$this->WindowsCodeSignGCPKMSKeyVersion = (string)($sc->WindowsCodeSignGCPKMSKeyVersion);
		}
		if (property_exists($sc, 'WindowsCodeSignGCPServiceAccountKeyFormat')) {
			$this->WindowsCodeSignGCPServiceAccountKeyFormat = (int)($sc->WindowsCodeSignGCPServiceAccountKeyFormat);
		}
		if (property_exists($sc, 'WindowsCodeSignGCPServiceAccountKey')) {
			$this->WindowsCodeSignGCPServiceAccountKey = (string)($sc->WindowsCodeSignGCPServiceAccountKey);
		}
		if (property_exists($sc, 'WindowsCodeSignGCPCertfile')) {
			$this->WindowsCodeSignGCPCertfile = (string)($sc->WindowsCodeSignGCPCertfile);
		}
		if (property_exists($sc, 'WindowsCodeSignAzureArtifactSigningEndpoint')) {
			$this->WindowsCodeSignAzureArtifactSigningEndpoint = (string)($sc->WindowsCodeSignAzureArtifactSigningEndpoint);
		}
		if (property_exists($sc, 'WindowsCodeSignAzureArtifactSigningAccount')) {
			$this->WindowsCodeSignAzureArtifactSigningAccount = (string)($sc->WindowsCodeSignAzureArtifactSigningAccount);
		}
		if (property_exists($sc, 'WindowsCodeSignAzureArtifactSigningProfile')) {
			$this->WindowsCodeSignAzureArtifactSigningProfile = (string)($sc->WindowsCodeSignAzureArtifactSigningProfile);
		}
		if (property_exists($sc, 'WindowsCodeSignAzureArtifactSigningTenantID')) {
			$this->WindowsCodeSignAzureArtifactSigningTenantID = (string)($sc->WindowsCodeSignAzureArtifactSigningTenantID);
		}
		if (property_exists($sc, 'WindowsCodeSignAzureArtifactSigningAppID')) {
			$this->WindowsCodeSignAzureArtifactSigningAppID = (string)($sc->WindowsCodeSignAzureArtifactSigningAppID);
		}
		if (property_exists($sc, 'WindowsCodeSignAzureArtifactSigningAppSecretFormat')) {
			$this->WindowsCodeSignAzureArtifactSigningAppSecretFormat = (int)($sc->WindowsCodeSignAzureArtifactSigningAppSecretFormat);
		}
		if (property_exists($sc, 'WindowsCodeSignAzureArtifactSigningAppSecret')) {
			$this->WindowsCodeSignAzureArtifactSigningAppSecret = (string)($sc->WindowsCodeSignAzureArtifactSigningAppSecret);
		}
		if (property_exists($sc, 'MacOSCodeSign')) {
			if (is_array($sc->MacOSCodeSign) && count($sc->MacOSCodeSign) === 0) {
			// Work around edge case in json_decode--json_encode stdClass conversion
				$this->MacOSCodeSign = \Comet\MacOSCodeSignProperties::createFromStdclass(new \stdClass());
			} else {
				$this->MacOSCodeSign = \Comet\MacOSCodeSignProperties::createFromStdclass($sc->MacOSCodeSign);
			}
		}
		if (property_exists($sc, 'LinuxRpmCodeSign')) {
			if (is_array($sc->LinuxRpmCodeSign) && count($sc->LinuxRpmCodeSign) === 0) {
			// Work around edge case in json_decode--json_encode stdClass conversion
				$this->LinuxRpmCodeSign = \Comet\LinuxRpmCodeSignProperties::createFromStdclass(new \stdClass());
			} else {
				$this->LinuxRpmCodeSign = \Comet\LinuxRpmCodeSignProperties::createFromStdclass($sc->LinuxRpmCodeSign);
			}
		}
		foreach(get_object_vars($sc) as $k => $v) {
			switch($k) {
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
			case 'WindowsCodeSignRelicServerURL':
			case 'WindowsCodeSignRelicKeypairFile':
			case 'WindowsCodeSignRelicKeyName':
			case 'WindowsCodeSignAWSRegion':
			case 'WindowsCodeSignAWSAccessKeyID':
			case 'WindowsCodeSignAWSSecretAccessKeyFormat':
			case 'WindowsCodeSignAWSSecretAccessKey':
			case 'WindowsCodeSignAWSKMSKeyID':
			case 'WindowsCodeSignAWSCertfile':
			case 'WindowsCodeSignGCPKMSKeyVersion':
			case 'WindowsCodeSignGCPServiceAccountKeyFormat':
			case 'WindowsCodeSignGCPServiceAccountKey':
			case 'WindowsCodeSignGCPCertfile':
			case 'WindowsCodeSignAzureArtifactSigningEndpoint':
			case 'WindowsCodeSignAzureArtifactSigningAccount':
			case 'WindowsCodeSignAzureArtifactSigningProfile':
			case 'WindowsCodeSignAzureArtifactSigningTenantID':
			case 'WindowsCodeSignAzureArtifactSigningAppID':
			case 'WindowsCodeSignAzureArtifactSigningAppSecretFormat':
			case 'WindowsCodeSignAzureArtifactSigningAppSecret':
			case 'MacOSCodeSign':
			case 'LinuxRpmCodeSign':
				break;
			default:
				$this->__unknown_properties[$k] = $v;
			}
		}
	}

	/**
	 * Coerce a stdClass into a new strongly-typed PrivateBrandingProperties object.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return PrivateBrandingProperties
	 */
	public static function createFromStdclass(\stdClass $sc): \Comet\PrivateBrandingProperties
	{
		$retn = new PrivateBrandingProperties();
		$retn->inflateFrom($sc);
		return $retn;
	}

	/**
	 * Coerce a plain PHP array into a new strongly-typed PrivateBrandingProperties object.
	 * Because the Comet Server requires strict distinction between empty objects ({}) and arrays ([]),
	 * the result of this method may not be safe to re-submit to the Comet Server.
	 *
	 * @param array $arr Object data as PHP array
	 * @return PrivateBrandingProperties
	 */
	public static function createFromArray(array $arr): \Comet\PrivateBrandingProperties
	{
		$stdClass = json_decode(json_encode($arr, JSON_UNESCAPED_SLASHES));
		if (is_array($stdClass) && count($stdClass) === 0) {
			$stdClass = new \stdClass();
		}
		return self::createFromStdclass($stdClass);
	}

	/**
	 * Coerce a JSON string into a new strongly-typed PrivateBrandingProperties object.
	 *
	 * @param string $JsonString Object data as JSON string
	 * @return PrivateBrandingProperties
	 */
	public static function createFromJSON(string $JsonString): \Comet\PrivateBrandingProperties
	{
		$decodedJsonObject = json_decode($JsonString); // as stdClass
		if (\json_last_error() != \JSON_ERROR_NONE) {
			throw new \Exception("JSON decode failed: " . \json_last_error_msg(), \json_last_error());
		}
		$retn = new PrivateBrandingProperties();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}

	/**
	 * Convert this PrivateBrandingProperties object into a plain PHP array.
	 *
	 * Unknown properties may still be represented as \stdClass objects.
	 *
	 * @param bool $for_json_encode Represent key-value maps as \stdClass instead of plain PHP arrays
	 * @return array
	 */
	public function toArray(bool $for_json_encode = false): array
	{
		$ret = [];
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
		$ret["WindowsCodeSignRelicServerURL"] = $this->WindowsCodeSignRelicServerURL;
		$ret["WindowsCodeSignRelicKeypairFile"] = $this->WindowsCodeSignRelicKeypairFile;
		$ret["WindowsCodeSignRelicKeyName"] = $this->WindowsCodeSignRelicKeyName;
		$ret["WindowsCodeSignAWSRegion"] = $this->WindowsCodeSignAWSRegion;
		$ret["WindowsCodeSignAWSAccessKeyID"] = $this->WindowsCodeSignAWSAccessKeyID;
		$ret["WindowsCodeSignAWSSecretAccessKeyFormat"] = $this->WindowsCodeSignAWSSecretAccessKeyFormat;
		$ret["WindowsCodeSignAWSSecretAccessKey"] = $this->WindowsCodeSignAWSSecretAccessKey;
		$ret["WindowsCodeSignAWSKMSKeyID"] = $this->WindowsCodeSignAWSKMSKeyID;
		$ret["WindowsCodeSignAWSCertfile"] = $this->WindowsCodeSignAWSCertfile;
		$ret["WindowsCodeSignGCPKMSKeyVersion"] = $this->WindowsCodeSignGCPKMSKeyVersion;
		$ret["WindowsCodeSignGCPServiceAccountKeyFormat"] = $this->WindowsCodeSignGCPServiceAccountKeyFormat;
		$ret["WindowsCodeSignGCPServiceAccountKey"] = $this->WindowsCodeSignGCPServiceAccountKey;
		$ret["WindowsCodeSignGCPCertfile"] = $this->WindowsCodeSignGCPCertfile;
		$ret["WindowsCodeSignAzureArtifactSigningEndpoint"] = $this->WindowsCodeSignAzureArtifactSigningEndpoint;
		$ret["WindowsCodeSignAzureArtifactSigningAccount"] = $this->WindowsCodeSignAzureArtifactSigningAccount;
		$ret["WindowsCodeSignAzureArtifactSigningProfile"] = $this->WindowsCodeSignAzureArtifactSigningProfile;
		$ret["WindowsCodeSignAzureArtifactSigningTenantID"] = $this->WindowsCodeSignAzureArtifactSigningTenantID;
		$ret["WindowsCodeSignAzureArtifactSigningAppID"] = $this->WindowsCodeSignAzureArtifactSigningAppID;
		$ret["WindowsCodeSignAzureArtifactSigningAppSecretFormat"] = $this->WindowsCodeSignAzureArtifactSigningAppSecretFormat;
		$ret["WindowsCodeSignAzureArtifactSigningAppSecret"] = $this->WindowsCodeSignAzureArtifactSigningAppSecret;
		if ( $this->MacOSCodeSign === null ) {
			$ret["MacOSCodeSign"] = $for_json_encode ? (object)[] : [];
		} else {
			$ret["MacOSCodeSign"] = $this->MacOSCodeSign->toArray($for_json_encode);
		}
		if ( $this->LinuxRpmCodeSign === null ) {
			$ret["LinuxRpmCodeSign"] = $for_json_encode ? (object)[] : [];
		} else {
			$ret["LinuxRpmCodeSign"] = $this->LinuxRpmCodeSign->toArray($for_json_encode);
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
		if ($this->LinuxRpmCodeSign !== null) {
			$this->LinuxRpmCodeSign->RemoveUnknownProperties();
		}
	}

}

