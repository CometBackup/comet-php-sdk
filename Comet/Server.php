<?php

/**
 * Copyright (c) 2018-2021 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 * 
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

/**
 * The \Comet\Server instance represents a single remote Comet Server, for the purposes
 * of making networked API requests.
 */
class Server {

	/**
	 * The fully qualified URL to the Comet Server, including protocol and trailing slash
	 *
	 * @var string
	 */
	protected $server_url = '';

	/**
	 * The username for administrative API requests to the Comet Server
	 *
	 * @var string
	 */
	protected $username = '';

	/**
	 * The password for administrative API requests to the Comet Server
	 *
	 * @var string
	 */
	protected $password = '';

	/**
	 * The TOTP code for administrative API requests to the Comet Server
	 *
	 * @var string
	 */
	protected $TOTPCode = '';

	/**
	 * The GuzzleHttp client used to make synchronous network requests
	 *
	 * @var \GuzzleHttp\Client
	 */
	protected $client = null;

	/**
	 * The language string to send to the remote Comet Server, for receiving translated
	 * status message text
	 * 
	 * @var string|null
	 */
	protected $language = null;

	/**
	 * Construct a new \Comet\Server instance.
	 *
	 * @param string $server_url The fully qualified URL to the Comet Server, including protocol and trailing slash
	 * @param string $username   The username for administrative API requests to the Comet Server
	 * @param string $password   The password for administrative API requests to the Comet Server
	 * @return \Comet\Server
	 */
	public function __construct($server_url, $username, $password) {
		$this->server_url = $server_url;
		$this->username = $username;
		$this->password = $password;

		// Construct a GuzzleHttp client using its default options.
		// The client can be customised later {@see setClient()}.
		$this->client = new \GuzzleHttp\Client([
			'headers' => [
				'User-Agent' => 'comet-php-sdk/1.x',
				'Accept-Encoding' => 'gzip',
			],
			'allow_redirects' => false,
			'decode_content' => true,
		]);
	}

	/**
	 * Supply a custom GuzzleHttp client for synchronous network requests.
	 *
	 * @param \GuzzleHttp\Client $client
	 * @return void
	 */
	public function setClient(\GuzzleHttp\Client $client) {
		$this->client = $client;
	}

	/**
	 * Supply a TOTP code to authenticate 2FA-restricted accounts
	 *
	 * @param string $TOTPCode
	 * @return void
	 */
	public function setTOTPCode($TOTPCode) {
		$this->TOTPCode = $TOTPCode;
	}

	/**
	 * Specify our preferred language. The Comet Server may supply translated response messages.
	 * 
	 * The value should be one of Comet Server's supported languages, such as 'en_US' or 'pt_BR'.
	 *
	 * @param string $language
	 * @return void
	 */
	public function setLanguage($language) {
		$this->language = $language;
	}

	/** 
	 * Retrieve properties about the current admin account
	 * Some key parameters are obscured, but the obscured values are safely recognised by the corresponding AdminAccountSetProperties API.
	 * 
	 * You must supply administrator authentication credentials to use this API.
	 *
	 * @return \Comet\AdminAccountPropertiesResponse 
	 * @throws \Exception
	 */
	public function AdminAccountProperties()
	{
		$nr = new \Comet\AdminAccountPropertiesRequest();
		$response = $this->client->send($this->AsPSR7($nr));
		return \Comet\AdminAccountPropertiesRequest::ProcessResponse($response->getStatusCode(), (string)$response->getBody());
	}

	/** 
	 * Generate a new TOTP secret
	 * The secret is returned as a `data-uri` image of a QR code. The new secret is immediately applied to the current admin account.
	 * 
	 * You must supply administrator authentication credentials to use this API.
	 *
	 * @return \Comet\TotpRegeneratedResponse 
	 * @throws \Exception
	 */
	public function AdminAccountRegenerateTotp()
	{
		$nr = new \Comet\AdminAccountRegenerateTotpRequest();
		$response = $this->client->send($this->AsPSR7($nr));
		return \Comet\AdminAccountRegenerateTotpRequest::ProcessResponse($response->getStatusCode(), (string)$response->getBody());
	}

	/** 
	 * Revoke a session key (log out)
	 * 
	 * You must supply administrator authentication credentials to use this API.
	 *
	 * @return \Comet\APIResponseMessage 
	 * @throws \Exception
	 */
	public function AdminAccountSessionRevoke()
	{
		$nr = new \Comet\AdminAccountSessionRevokeRequest();
		$response = $this->client->send($this->AsPSR7($nr));
		return \Comet\AdminAccountSessionRevokeRequest::ProcessResponse($response->getStatusCode(), (string)$response->getBody());
	}

	/** 
	 * Generate a session key (log in)
	 * 
	 * You must supply administrator authentication credentials to use this API.
	 *
	 * @param string $SelfAddress External URL of this server (used for U2F AppID) (optional)
	 * @return \Comet\SessionKeyRegeneratedResponse 
	 * @throws \Exception
	 */
	public function AdminAccountSessionStart($SelfAddress = null)
	{
		if ($SelfAddress === null) {
			$SelfAddress = $this->server_url;
		}

		$nr = new \Comet\AdminAccountSessionStartRequest($SelfAddress);
		$response = $this->client->send($this->AsPSR7($nr));
		return \Comet\AdminAccountSessionStartRequest::ProcessResponse($response->getStatusCode(), (string)$response->getBody());
	}

	/** 
	 * Generate a session key for an end-user (log in as end-user)
	 * 
	 * You must supply administrator authentication credentials to use this API.
	 *
	 * @param string $TargetUser Target account username
	 * @return \Comet\SessionKeyRegeneratedResponse 
	 * @throws \Exception
	 */
	public function AdminAccountSessionStartAsUser($TargetUser)
	{
		$nr = new \Comet\AdminAccountSessionStartAsUserRequest($TargetUser);
		$response = $this->client->send($this->AsPSR7($nr));
		return \Comet\AdminAccountSessionStartAsUserRequest::ProcessResponse($response->getStatusCode(), (string)$response->getBody());
	}

	/** 
	 * Update settings for your own admin account
	 * Updating your account password requires you to supply your current password.
	 * To set a new plaintext password, use a password format of 0 (PASSWORD_FORMAT_PLAINTEXT).
	 * This API does not currently allow you to modify your TOTP secret or IP whitelist.
	 * 
	 * You must supply administrator authentication credentials to use this API.
	 *
	 * @param \Comet\AdminSecurityOptions $Security Updated account properties
	 * @return \Comet\APIResponseMessage 
	 * @throws \Exception
	 */
	public function AdminAccountSetProperties(AdminSecurityOptions $Security)
	{
		$nr = new \Comet\AdminAccountSetPropertiesRequest($Security);
		$response = $this->client->send($this->AsPSR7($nr));
		return \Comet\AdminAccountSetPropertiesRequest::ProcessResponse($response->getStatusCode(), (string)$response->getBody());
	}

	/** 
	 * Register a new FIDO U2F token
	 * 
	 * You must supply administrator authentication credentials to use this API.
	 *
	 * @param string $SelfAddress External URL of this server, used as U2F AppID and Facet
	 * @return \Comet\U2FRegistrationChallengeResponse 
	 * @throws \Exception
	 */
	public function AdminAccountU2fRequestRegistrationChallenge($SelfAddress)
	{
		$nr = new \Comet\AdminAccountU2fRequestRegistrationChallengeRequest($SelfAddress);
		$response = $this->client->send($this->AsPSR7($nr));
		return \Comet\AdminAccountU2fRequestRegistrationChallengeRequest::ProcessResponse($response->getStatusCode(), (string)$response->getBody());
	}

	/** 
	 * Register a new FIDO U2F token
	 * 
	 * You must supply administrator authentication credentials to use this API.
	 *
	 * @param string $U2FChallengeID Associated value from AdminAccountU2fRequestRegistrationChallenge API
	 * @param string $U2FClientData U2F response data supplied by hardware token
	 * @param string $U2FRegistrationData U2F response data supplied by hardware token
	 * @param string $U2FVersion U2F response data supplied by hardware token
	 * @param string $Description Optional description of the token
	 * @return \Comet\APIResponseMessage 
	 * @throws \Exception
	 */
	public function AdminAccountU2fSubmitChallengeResponse($U2FChallengeID, $U2FClientData, $U2FRegistrationData, $U2FVersion, $Description)
	{
		$nr = new \Comet\AdminAccountU2fSubmitChallengeResponseRequest($U2FChallengeID, $U2FClientData, $U2FRegistrationData, $U2FVersion, $Description);
		$response = $this->client->send($this->AsPSR7($nr));
		return \Comet\AdminAccountU2fSubmitChallengeResponseRequest::ProcessResponse($response->getStatusCode(), (string)$response->getBody());
	}

	/** 
	 * Validate the TOTP code before turning 2fa(TOTP) on
	 * 
	 * You must supply administrator authentication credentials to use this API.
	 *
	 * @param string $TOTPCode Six-digit code after scanning barcode image
	 * @return \Comet\APIResponseMessage 
	 * @throws \Exception
	 */
	public function AdminAccountValidateTotp($TOTPCode)
	{
		$nr = new \Comet\AdminAccountValidateTotpRequest($TOTPCode);
		$response = $this->client->send($this->AsPSR7($nr));
		return \Comet\AdminAccountValidateTotpRequest::ProcessResponse($response->getStatusCode(), (string)$response->getBody());
	}

	/** 
	 * Add a new user account
	 * 
	 * You must supply administrator authentication credentials to use this API.
	 * This API requires the Auth Role to be enabled.
	 *
	 * @param string $TargetUser New account username
	 * @param string $TargetPassword New account password
	 * @param int $StoreRecoveryCode If set to 1, store and keep a password recovery code for the generated user (>= 18.3.9) (optional)
	 * @param int $RequirePasswordChange If set to 1, require to reset password at the first login for the generated user (>= 20.3.4) (optional)
	 * @return \Comet\APIResponseMessage 
	 * @throws \Exception
	 */
	public function AdminAddUser($TargetUser, $TargetPassword, $StoreRecoveryCode = null, $RequirePasswordChange = null)
	{
		$nr = new \Comet\AdminAddUserRequest($TargetUser, $TargetPassword, $StoreRecoveryCode, $RequirePasswordChange);
		$response = $this->client->send($this->AsPSR7($nr));
		return \Comet\AdminAddUserRequest::ProcessResponse($response->getStatusCode(), (string)$response->getBody());
	}

	/** 
	 * Add a new user account (with all information)
	 * This allows you to create a new account and set all its properties at once (e.g. during account replication). Developers creating a signup form may find it simpler to use the AdminAddUser and AdminGetUserProfile / AdminSetUserProfile APIs separately.
	 * 
	 * You must supply administrator authentication credentials to use this API.
	 * This API requires the Auth Role to be enabled.
	 *
	 * @param string $TargetUser New account username
	 * @param \Comet\UserProfileConfig $ProfileData New account profile
	 * @return \Comet\APIResponseMessage 
	 * @throws \Exception
	 */
	public function AdminAddUserFromProfile($TargetUser, UserProfileConfig $ProfileData)
	{
		$nr = new \Comet\AdminAddUserFromProfileRequest($TargetUser, $ProfileData);
		$response = $this->client->send($this->AsPSR7($nr));
		return \Comet\AdminAddUserFromProfileRequest::ProcessResponse($response->getStatusCode(), (string)$response->getBody());
	}

	/** 
	 * Delete an administrator
	 * 
	 * You must supply administrator authentication credentials to use this API.
	 * Access to this API may be prevented on a per-administrator basis.
	 * This API is only available for administrator accounts in the top-level Organization, not in any other Organization.
	 *
	 * @param string $TargetUser the username of the admin to be deleted
	 * @return \Comet\APIResponseMessage 
	 * @throws \Exception
	 */
	public function AdminAdminUserDelete($TargetUser)
	{
		$nr = new \Comet\AdminAdminUserDeleteRequest($TargetUser);
		$response = $this->client->send($this->AsPSR7($nr));
		return \Comet\AdminAdminUserDeleteRequest::ProcessResponse($response->getStatusCode(), (string)$response->getBody());
	}

	/** 
	 * List administrators
	 * 
	 * You must supply administrator authentication credentials to use this API.
	 * Access to this API may be prevented on a per-administrator basis.
	 * This API is only available for administrator accounts in the top-level Organization, not in any other Organization.
	 *
	 * @return \Comet\AllowedAdminUser[] 
	 * @throws \Exception
	 */
	public function AdminAdminUserList()
	{
		$nr = new \Comet\AdminAdminUserListRequest();
		$response = $this->client->send($this->AsPSR7($nr));
		return \Comet\AdminAdminUserListRequest::ProcessResponse($response->getStatusCode(), (string)$response->getBody());
	}

	/** 
	 * Add a new administrator
	 * 
	 * You must supply administrator authentication credentials to use this API.
	 * Access to this API may be prevented on a per-administrator basis.
	 * This API is only available for administrator accounts in the top-level Organization, not in any other Organization.
	 *
	 * @param string $TargetUser the username for this new admin
	 * @param string $TargetPassword the password for this new admin user
	 * @param string $TargetOrgID provide the organization ID for this user, it will default to the org of the authenticating user otherwise (optional)
	 * @return \Comet\APIResponseMessage 
	 * @throws \Exception
	 */
	public function AdminAdminUserNew($TargetUser, $TargetPassword, $TargetOrgID = null)
	{
		$nr = new \Comet\AdminAdminUserNewRequest($TargetUser, $TargetPassword, $TargetOrgID);
		$response = $this->client->send($this->AsPSR7($nr));
		return \Comet\AdminAdminUserNewRequest::ProcessResponse($response->getStatusCode(), (string)$response->getBody());
	}

	/** 
	 * List available software download platforms
	 * 
	 * This API requires administrator authentication credentials, unless the server is configured to allow unauthenticated software downloads.
	 * This API requires the Software Build Role to be enabled.
	 * This API requires the Auth Role to be enabled.
	 *
	 * @return \Comet\AvailableDownload[] An array with int keys. 
	 * @throws \Exception
	 */
	public function AdminBrandingAvailablePlatforms()
	{
		$nr = new \Comet\AdminBrandingAvailablePlatformsRequest();
		$response = $this->client->send($this->AsPSR7($nr));
		return \Comet\AdminBrandingAvailablePlatformsRequest::ProcessResponse($response->getStatusCode(), (string)$response->getBody());
	}

	/** 
	 * Download software
	 * 
	 * This API requires administrator authentication credentials, unless the server is configured to allow unauthenticated software downloads.
	 * This API requires the Software Build Role to be enabled.
	 * This API requires the Auth Role to be enabled.
	 *
	 * @param int $Platform The selected download platform, from the AdminBrandingAvailablePlatforms API
	 * @param string $SelfAddress The external URL of this server, used to resolve conflicts (optional)
	 * @return string 
	 * @throws \Exception
	 */
	public function AdminBrandingGenerateClientByPlatform($Platform, $SelfAddress = null)
	{
		if ($SelfAddress === null) {
			$SelfAddress = $this->server_url;
		}

		$nr = new \Comet\AdminBrandingGenerateClientByPlatformRequest($Platform, $SelfAddress);
		$response = $this->client->send($this->AsPSR7($nr));
		return \Comet\AdminBrandingGenerateClientByPlatformRequest::ProcessResponse($response->getStatusCode(), (string)$response->getBody());
	}

	/** 
	 * Download software (Linux Server .run)
	 * 
	 * This API requires administrator authentication credentials, unless the server is configured to allow unauthenticated software downloads.
	 * This API requires the Software Build Role to be enabled.
	 * This API requires the Auth Role to be enabled.
	 *
	 * @param string $SelfAddress The external URL of this server, used to resolve conflicts (optional)
	 * @return string 
	 * @throws \Exception
	 */
	public function AdminBrandingGenerateClientLinuxgeneric($SelfAddress = null)
	{
		if ($SelfAddress === null) {
			$SelfAddress = $this->server_url;
		}

		$nr = new \Comet\AdminBrandingGenerateClientLinuxgenericRequest($SelfAddress);
		$response = $this->client->send($this->AsPSR7($nr));
		return \Comet\AdminBrandingGenerateClientLinuxgenericRequest::ProcessResponse($response->getStatusCode(), (string)$response->getBody());
	}

	/** 
	 * Download software (macOS x86_64 pkg)
	 * 
	 * This API requires administrator authentication credentials, unless the server is configured to allow unauthenticated software downloads.
	 * This API requires the Software Build Role to be enabled.
	 * This API requires the Auth Role to be enabled.
	 *
	 * @param string $SelfAddress The external URL of this server, used to resolve conflicts (optional)
	 * @return string 
	 * @throws \Exception
	 */
	public function AdminBrandingGenerateClientMacosX8664($SelfAddress = null)
	{
		if ($SelfAddress === null) {
			$SelfAddress = $this->server_url;
		}

		$nr = new \Comet\AdminBrandingGenerateClientMacosX8664Request($SelfAddress);
		$response = $this->client->send($this->AsPSR7($nr));
		return \Comet\AdminBrandingGenerateClientMacosX8664Request::ProcessResponse($response->getStatusCode(), (string)$response->getBody());
	}

	/** 
	 * Check if a software download is available
	 * 
	 * This API requires administrator authentication credentials, unless the server is configured to allow unauthenticated software downloads.
	 * This API requires the Software Build Role to be enabled.
	 * This API requires the Auth Role to be enabled.
	 *
	 * @param int $Platform The selected download platform, from the AdminBrandingAvailablePlatforms API
	 * @param string $SelfAddress The external URL of this server, used to resolve conflicts (optional)
	 * @return \Comet\APIResponseMessage 
	 * @throws \Exception
	 */
	public function AdminBrandingGenerateClientTest($Platform, $SelfAddress = null)
	{
		if ($SelfAddress === null) {
			$SelfAddress = $this->server_url;
		}

		$nr = new \Comet\AdminBrandingGenerateClientTestRequest($Platform, $SelfAddress);
		$response = $this->client->send($this->AsPSR7($nr));
		return \Comet\AdminBrandingGenerateClientTestRequest::ProcessResponse($response->getStatusCode(), (string)$response->getBody());
	}

	/** 
	 * Download software update (Windows AnyCPU exe)
	 * The exe endpoints are not recommended for end-users, as they may not be able to provide a codesigned installer if no custom codesigning certificate is present.
	 * 
	 * This API requires administrator authentication credentials, unless the server is configured to allow unauthenticated software downloads.
	 * This API requires the Software Build Role to be enabled.
	 * This API requires the Auth Role to be enabled.
	 *
	 * @param string $SelfAddress The external URL of this server, used to resolve conflicts (optional)
	 * @return string 
	 * @throws \Exception
	 */
	public function AdminBrandingGenerateClientWindowsAnycpuExe($SelfAddress = null)
	{
		if ($SelfAddress === null) {
			$SelfAddress = $this->server_url;
		}

		$nr = new \Comet\AdminBrandingGenerateClientWindowsAnycpuExeRequest($SelfAddress);
		$response = $this->client->send($this->AsPSR7($nr));
		return \Comet\AdminBrandingGenerateClientWindowsAnycpuExeRequest::ProcessResponse($response->getStatusCode(), (string)$response->getBody());
	}

	/** 
	 * Download software (Windows AnyCPU zip)
	 * The zip endpoints are recommended for end-users, as they may be able to provide a codesigned installer even when no custom codesigning certificate is present.
	 * 
	 * This API requires administrator authentication credentials, unless the server is configured to allow unauthenticated software downloads.
	 * This API requires the Software Build Role to be enabled.
	 * This API requires the Auth Role to be enabled.
	 *
	 * @param string $SelfAddress The external URL of this server, used to resolve conflicts (optional)
	 * @return string 
	 * @throws \Exception
	 */
	public function AdminBrandingGenerateClientWindowsAnycpuZip($SelfAddress = null)
	{
		if ($SelfAddress === null) {
			$SelfAddress = $this->server_url;
		}

		$nr = new \Comet\AdminBrandingGenerateClientWindowsAnycpuZipRequest($SelfAddress);
		$response = $this->client->send($this->AsPSR7($nr));
		return \Comet\AdminBrandingGenerateClientWindowsAnycpuZipRequest::ProcessResponse($response->getStatusCode(), (string)$response->getBody());
	}

	/** 
	 * Download software update (Windows x86_32 exe)
	 * The exe endpoints are not recommended for end-users, as they may not be able to provide a codesigned installer if no custom codesigning certificate is present.
	 * 
	 * This API requires administrator authentication credentials, unless the server is configured to allow unauthenticated software downloads.
	 * This API requires the Software Build Role to be enabled.
	 * This API requires the Auth Role to be enabled.
	 *
	 * @param string $SelfAddress The external URL of this server, used to resolve conflicts (optional)
	 * @return string 
	 * @throws \Exception
	 */
	public function AdminBrandingGenerateClientWindowsX8632Exe($SelfAddress = null)
	{
		if ($SelfAddress === null) {
			$SelfAddress = $this->server_url;
		}

		$nr = new \Comet\AdminBrandingGenerateClientWindowsX8632ExeRequest($SelfAddress);
		$response = $this->client->send($this->AsPSR7($nr));
		return \Comet\AdminBrandingGenerateClientWindowsX8632ExeRequest::ProcessResponse($response->getStatusCode(), (string)$response->getBody());
	}

	/** 
	 * Download software (Windows x86_32 zip)
	 * The zip endpoints are recommended for end-users, as they may be able to provide a codesigned installer even when no custom codesigning certificate is present.
	 * 
	 * This API requires administrator authentication credentials, unless the server is configured to allow unauthenticated software downloads.
	 * This API requires the Software Build Role to be enabled.
	 * This API requires the Auth Role to be enabled.
	 *
	 * @param string $SelfAddress The external URL of this server, used to resolve conflicts (optional)
	 * @return string 
	 * @throws \Exception
	 */
	public function AdminBrandingGenerateClientWindowsX8632Zip($SelfAddress = null)
	{
		if ($SelfAddress === null) {
			$SelfAddress = $this->server_url;
		}

		$nr = new \Comet\AdminBrandingGenerateClientWindowsX8632ZipRequest($SelfAddress);
		$response = $this->client->send($this->AsPSR7($nr));
		return \Comet\AdminBrandingGenerateClientWindowsX8632ZipRequest::ProcessResponse($response->getStatusCode(), (string)$response->getBody());
	}

	/** 
	 * Download software update (Windows x86_64 exe)
	 * The exe endpoints are not recommended for end-users, as they may not be able to provide a codesigned installer if no custom codesigning certificate is present.
	 * 
	 * This API requires administrator authentication credentials, unless the server is configured to allow unauthenticated software downloads.
	 * This API requires the Software Build Role to be enabled.
	 * This API requires the Auth Role to be enabled.
	 *
	 * @param string $SelfAddress The external URL of this server, used to resolve conflicts (optional)
	 * @return string 
	 * @throws \Exception
	 */
	public function AdminBrandingGenerateClientWindowsX8664Exe($SelfAddress = null)
	{
		if ($SelfAddress === null) {
			$SelfAddress = $this->server_url;
		}

		$nr = new \Comet\AdminBrandingGenerateClientWindowsX8664ExeRequest($SelfAddress);
		$response = $this->client->send($this->AsPSR7($nr));
		return \Comet\AdminBrandingGenerateClientWindowsX8664ExeRequest::ProcessResponse($response->getStatusCode(), (string)$response->getBody());
	}

	/** 
	 * Download software (Windows x86_64 zip)
	 * The zip endpoints are recommended for end-users, as they may be able to provide a codesigned installer even when no custom codesigning certificate is present.
	 * 
	 * This API requires administrator authentication credentials, unless the server is configured to allow unauthenticated software downloads.
	 * This API requires the Software Build Role to be enabled.
	 * This API requires the Auth Role to be enabled.
	 *
	 * @param string $SelfAddress The external URL of this server, used to resolve conflicts (optional)
	 * @return string 
	 * @throws \Exception
	 */
	public function AdminBrandingGenerateClientWindowsX8664Zip($SelfAddress = null)
	{
		if ($SelfAddress === null) {
			$SelfAddress = $this->server_url;
		}

		$nr = new \Comet\AdminBrandingGenerateClientWindowsX8664ZipRequest($SelfAddress);
		$response = $this->client->send($this->AsPSR7($nr));
		return \Comet\AdminBrandingGenerateClientWindowsX8664ZipRequest::ProcessResponse($response->getStatusCode(), (string)$response->getBody());
	}

	/** 
	 * Send an email bulletin to all users
	 * 
	 * You must supply administrator authentication credentials to use this API.
	 * This API requires the Auth Role to be enabled.
	 *
	 * @param string $Subject Bulletin subject line
	 * @param string $Content Bulletin message content
	 * @return \Comet\APIResponseMessage 
	 * @throws \Exception
	 */
	public function AdminBulletinSubmit($Subject, $Content)
	{
		$nr = new \Comet\AdminBulletinSubmitRequest($Subject, $Content);
		$response = $this->client->send($this->AsPSR7($nr));
		return \Comet\AdminBulletinSubmitRequest::ProcessResponse($response->getStatusCode(), (string)$response->getBody());
	}

	/** 
	 * Get Constellation bucket usage report (cached)
	 * 
	 * You must supply administrator authentication credentials to use this API.
	 * This API is only available for administrator accounts in the top-level Organization, not in any other Organization.
	 * This API requires the Constellation Role to be enabled.
	 *
	 * @return \Comet\ConstellationCheckReport 
	 * @throws \Exception
	 */
	public function AdminConstellationLastReport()
	{
		$nr = new \Comet\AdminConstellationLastReportRequest();
		$response = $this->client->send($this->AsPSR7($nr));
		return \Comet\AdminConstellationLastReportRequest::ProcessResponse($response->getStatusCode(), (string)$response->getBody());
	}

	/** 
	 * Get Constellation bucket usage report (regenerate)
	 * 
	 * You must supply administrator authentication credentials to use this API.
	 * This API is only available for administrator accounts in the top-level Organization, not in any other Organization.
	 * This API requires the Constellation Role to be enabled.
	 *
	 * @return \Comet\ConstellationCheckReport 
	 * @throws \Exception
	 */
	public function AdminConstellationNewReport()
	{
		$nr = new \Comet\AdminConstellationNewReportRequest();
		$response = $this->client->send($this->AsPSR7($nr));
		return \Comet\AdminConstellationNewReportRequest::ProcessResponse($response->getStatusCode(), (string)$response->getBody());
	}

	/** 
	 * Prune unused buckets
	 * 
	 * You must supply administrator authentication credentials to use this API.
	 * This API is only available for administrator accounts in the top-level Organization, not in any other Organization.
	 * This API requires the Constellation Role to be enabled.
	 *
	 * @return \Comet\APIResponseMessage 
	 * @throws \Exception
	 */
	public function AdminConstellationPruneNow()
	{
		$nr = new \Comet\AdminConstellationPruneNowRequest();
		$response = $this->client->send($this->AsPSR7($nr));
		return \Comet\AdminConstellationPruneNowRequest::ProcessResponse($response->getStatusCode(), (string)$response->getBody());
	}

	/** 
	 * Get Constellation status
	 * 
	 * You must supply administrator authentication credentials to use this API.
	 * This API is only available for administrator accounts in the top-level Organization, not in any other Organization.
	 * This API requires the Constellation Role to be enabled.
	 *
	 * @return \Comet\ConstellationStatusAPIResponse 
	 * @throws \Exception
	 */
	public function AdminConstellationStatus()
	{
		$nr = new \Comet\AdminConstellationStatusRequest();
		$response = $this->client->send($this->AsPSR7($nr));
		return \Comet\AdminConstellationStatusRequest::ProcessResponse($response->getStatusCode(), (string)$response->getBody());
	}

	/** 
	 * Create token for silent installation (Windows only)
	 * Provide the installation token to silently install the client on windows `install.exe /TOKEN=<installtoken>`
	 * 
	 * You must supply administrator authentication credentials to use this API.
	 * This API requires the Auth Role to be enabled.
	 *
	 * @param string $TargetUser Selected account username
	 * @param string $TargetPassword Selected account password
	 * @param string $Server External URL of the authentication server that is different from the current server (optional)
	 * @return \Comet\InstallTokenResponse 
	 * @throws \Exception
	 */
	public function AdminCreateInstallToken($TargetUser, $TargetPassword, $Server = null)
	{
		$nr = new \Comet\AdminCreateInstallTokenRequest($TargetUser, $TargetPassword, $Server);
		$response = $this->client->send($this->AsPSR7($nr));
		return \Comet\AdminCreateInstallTokenRequest::ProcessResponse($response->getStatusCode(), (string)$response->getBody());
	}

	/** 
	 * Delete user account
	 * This does not remove any storage buckets. Unused storage buckets will be cleaned up by the Constellation Role.
	 * Any stored data can not be decrypted without the user profile. Misuse can cause data loss!
	 * This also allows to uninstall software from active devices under the user account
	 * 
	 * You must supply administrator authentication credentials to use this API.
	 * This API requires the Auth Role to be enabled.
	 *
	 * @param string $TargetUser Selected account username
	 * @param \Comet\UninstallConfig $UninstallConfig Uninstall software configuration (>= 20.3.5) (optional)
	 * @return \Comet\APIResponseMessage 
	 * @throws \Exception
	 */
	public function AdminDeleteUser($TargetUser, UninstallConfig $UninstallConfig = null)
	{
		$nr = new \Comet\AdminDeleteUserRequest($TargetUser, $UninstallConfig);
		$response = $this->client->send($this->AsPSR7($nr));
		return \Comet\AdminDeleteUserRequest::ProcessResponse($response->getStatusCode(), (string)$response->getBody());
	}

	/** 
	 * Disable user account 2FA(TOTP) authentication
	 * 
	 * You must supply administrator authentication credentials to use this API.
	 * This API requires the Auth Role to be enabled.
	 *
	 * @param string $TargetUser Selected account username
	 * @return \Comet\APIResponseMessage 
	 * @throws \Exception
	 */
	public function AdminDisableUserTotp($TargetUser)
	{
		$nr = new \Comet\AdminDisableUserTotpRequest($TargetUser);
		$response = $this->client->send($this->AsPSR7($nr));
		return \Comet\AdminDisableUserTotpRequest::ProcessResponse($response->getStatusCode(), (string)$response->getBody());
	}

	/** 
	 * Instruct a live connected device to apply retention rules now
	 * This command is understood by Comet Backup 17.6.9 and newer.
	 * 
	 * You must supply administrator authentication credentials to use this API.
	 * This API requires the Auth Role to be enabled.
	 *
	 * @param string $TargetID The live connection GUID
	 * @param string $Destination The Storage Vault GUID
	 * @return \Comet\APIResponseMessage 
	 * @throws \Exception
	 */
	public function AdminDispatcherApplyRetentionRules($TargetID, $Destination)
	{
		$nr = new \Comet\AdminDispatcherApplyRetentionRulesRequest($TargetID, $Destination);
		$response = $this->client->send($this->AsPSR7($nr));
		return \Comet\AdminDispatcherApplyRetentionRulesRequest::ProcessResponse($response->getStatusCode(), (string)$response->getBody());
	}

	/** 
	 * Instruct a live connected device to deeply verify Storage Vault content
	 * This command is understood by Comet Backup 18.8.2 and newer.
	 * 
	 * You must supply administrator authentication credentials to use this API.
	 * This API requires the Auth Role to be enabled.
	 *
	 * @param string $TargetID The live connection GUID
	 * @param string $Destination The Storage Vault GUID
	 * @return \Comet\APIResponseMessage 
	 * @throws \Exception
	 */
	public function AdminDispatcherDeepverifyStorageVault($TargetID, $Destination)
	{
		$nr = new \Comet\AdminDispatcherDeepverifyStorageVaultRequest($TargetID, $Destination);
		$response = $this->client->send($this->AsPSR7($nr));
		return \Comet\AdminDispatcherDeepverifyStorageVaultRequest::ProcessResponse($response->getStatusCode(), (string)$response->getBody());
	}

	/** 
	 * Instruct a live connected device to delete a stored snapshot
	 * 
	 * You must supply administrator authentication credentials to use this API.
	 * This API requires the Auth Role to be enabled.
	 *
	 * @param string $TargetID The live connection GUID
	 * @param string $DestinationID The Storage Vault GUID
	 * @param string $SnapshotID The backup job snapshot ID to delete
	 * @return \Comet\APIResponseMessage 
	 * @throws \Exception
	 */
	public function AdminDispatcherDeleteSnapshot($TargetID, $DestinationID, $SnapshotID)
	{
		$nr = new \Comet\AdminDispatcherDeleteSnapshotRequest($TargetID, $DestinationID, $SnapshotID);
		$response = $this->client->send($this->AsPSR7($nr));
		return \Comet\AdminDispatcherDeleteSnapshotRequest::ProcessResponse($response->getStatusCode(), (string)$response->getBody());
	}

	/** 
	 * Instruct a live connected device to delete multiple stored snapshots
	 * The target device must be running Comet 20.9.10 or later.
	 * 
	 * You must supply administrator authentication credentials to use this API.
	 * This API requires the Auth Role to be enabled.
	 *
	 * @param string $TargetID The live connection GUID
	 * @param string $DestinationID The Storage Vault GUID
	 * @param string[] $SnapshotIDs The backup job snapshot IDs to delete
	 * @return \Comet\APIResponseMessage 
	 * @throws \Exception
	 */
	public function AdminDispatcherDeleteSnapshots($TargetID, $DestinationID, array $SnapshotIDs)
	{
		$nr = new \Comet\AdminDispatcherDeleteSnapshotsRequest($TargetID, $DestinationID, $SnapshotIDs);
		$response = $this->client->send($this->AsPSR7($nr));
		return \Comet\AdminDispatcherDeleteSnapshotsRequest::ProcessResponse($response->getStatusCode(), (string)$response->getBody());
	}

	/** 
	 * Disconnect a live connected device
	 * The device will almost certainly attempt to reconnect.
	 * 
	 * You must supply administrator authentication credentials to use this API.
	 * This API requires the Auth Role to be enabled.
	 *
	 * @param string $TargetID The live connection GUID
	 * @return \Comet\APIResponseMessage 
	 * @throws \Exception
	 */
	public function AdminDispatcherDropConnection($TargetID)
	{
		$nr = new \Comet\AdminDispatcherDropConnectionRequest($TargetID);
		$response = $this->client->send($this->AsPSR7($nr));
		return \Comet\AdminDispatcherDropConnectionRequest::ProcessResponse($response->getStatusCode(), (string)$response->getBody());
	}

	/** 
	 * Instruct a live connected device to import settings from an installed product
	 * This command is understood by Comet Backup 17.12.0 and newer.
	 * 
	 * You must supply administrator authentication credentials to use this API.
	 * This API requires the Auth Role to be enabled.
	 *
	 * @param string $TargetID The live connection GUID
	 * @param string $ImportSourceID The selected import source, as found by the AdminDispatcherRequestImportSources API
	 * @return \Comet\APIResponseMessage 
	 * @throws \Exception
	 */
	public function AdminDispatcherImportApply($TargetID, $ImportSourceID)
	{
		$nr = new \Comet\AdminDispatcherImportApplyRequest($TargetID, $ImportSourceID);
		$response = $this->client->send($this->AsPSR7($nr));
		return \Comet\AdminDispatcherImportApplyRequest::ProcessResponse($response->getStatusCode(), (string)$response->getBody());
	}

	/** 
	 * Instruct a live connected device to disconnect
	 * The device will terminate its live-connection process and will not reconnect.
	 * 
	 * You must supply administrator authentication credentials to use this API.
	 * This API requires the Auth Role to be enabled.
	 *
	 * @param string $TargetID The live connection GUID
	 * @return \Comet\APIResponseMessage 
	 * @throws \Exception
	 */
	public function AdminDispatcherKillProcess($TargetID)
	{
		$nr = new \Comet\AdminDispatcherKillProcessRequest($TargetID);
		$response = $this->client->send($this->AsPSR7($nr));
		return \Comet\AdminDispatcherKillProcessRequest::ProcessResponse($response->getStatusCode(), (string)$response->getBody());
	}

	/** 
	 * List live connected devices
	 * 
	 * You must supply administrator authentication credentials to use this API.
	 * This API requires the Auth Role to be enabled.
	 *
	 * @return \Comet\LiveUserConnection[] An array with string keys. 
	 * @throws \Exception
	 */
	public function AdminDispatcherListActive()
	{
		$nr = new \Comet\AdminDispatcherListActiveRequest();
		$response = $this->client->send($this->AsPSR7($nr));
		return \Comet\AdminDispatcherListActiveRequest::ProcessResponse($response->getStatusCode(), (string)$response->getBody());
	}

	/** 
	 * Instruct a live connected device to refresh their profile
	 * This command is understood by Comet Backup 17.12.0 and newer.
	 * 
	 * You must supply administrator authentication credentials to use this API.
	 * This API requires the Auth Role to be enabled.
	 *
	 * @param string $TargetID The live connection GUID
	 * @return \Comet\APIResponseMessage 
	 * @throws \Exception
	 */
	public function AdminDispatcherRefetchProfile($TargetID)
	{
		$nr = new \Comet\AdminDispatcherRefetchProfileRequest($TargetID);
		$response = $this->client->send($this->AsPSR7($nr));
		return \Comet\AdminDispatcherRefetchProfileRequest::ProcessResponse($response->getStatusCode(), (string)$response->getBody());
	}

	/** 
	 * Begin the process of registering a new Azure AD application that can access Office 365 for backup
	 * After calling this API, you should supply the login details to the end-user, and then begin polling the AdminDispatcherRegisterOfficeApplicationCheck with the supplied "Continuation" parameter to check on the registration process.
	 * 
	 * You must supply administrator authentication credentials to use this API.
	 * This API requires the Auth Role to be enabled.
	 *
	 * @param string $TargetID The live connection GUID
	 * @param string $EmailAddress The email address of the Azure AD administrator
	 * @return \Comet\RegisterOfficeApplicationBeginResponse 
	 * @throws \Exception
	 */
	public function AdminDispatcherRegisterOfficeApplicationBegin($TargetID, $EmailAddress)
	{
		$nr = new \Comet\AdminDispatcherRegisterOfficeApplicationBeginRequest($TargetID, $EmailAddress);
		$response = $this->client->send($this->AsPSR7($nr));
		return \Comet\AdminDispatcherRegisterOfficeApplicationBeginRequest::ProcessResponse($response->getStatusCode(), (string)$response->getBody());
	}

	/** 
	 * Check the process of registering a new Azure AD application that can access Office 365 for backup
	 * You should begin the process by calling AdminDispatcherRegisterOfficeApplicationBegin and asking the end-user to complete the Azure authentication steps.
	 * 
	 * You must supply administrator authentication credentials to use this API.
	 * This API requires the Auth Role to be enabled.
	 *
	 * @param string $TargetID The live connection GUID
	 * @param string $Continuation The ID returned from the AdminDispatcherRegisterOfficeApplicationBegin endpoint
	 * @return \Comet\RegisterOfficeApplicationCheckResponse 
	 * @throws \Exception
	 */
	public function AdminDispatcherRegisterOfficeApplicationCheck($TargetID, $Continuation)
	{
		$nr = new \Comet\AdminDispatcherRegisterOfficeApplicationCheckRequest($TargetID, $Continuation);
		$response = $this->client->send($this->AsPSR7($nr));
		return \Comet\AdminDispatcherRegisterOfficeApplicationCheckRequest::ProcessResponse($response->getStatusCode(), (string)$response->getBody());
	}

	/** 
	 * Instruct a live connected device to rebuild Storage Vault indexes now
	 * This command is understood by Comet Backup 18.6.9 and newer.
	 * 
	 * You must supply administrator authentication credentials to use this API.
	 * This API requires the Auth Role to be enabled.
	 *
	 * @param string $TargetID The live connection GUID
	 * @param string $Destination The Storage Vault GUID
	 * @return \Comet\APIResponseMessage 
	 * @throws \Exception
	 */
	public function AdminDispatcherReindexStorageVault($TargetID, $Destination)
	{
		$nr = new \Comet\AdminDispatcherReindexStorageVaultRequest($TargetID, $Destination);
		$response = $this->client->send($this->AsPSR7($nr));
		return \Comet\AdminDispatcherReindexStorageVaultRequest::ProcessResponse($response->getStatusCode(), (string)$response->getBody());
	}

	/** 
	 * Request a list of physical disk drive information from a live connected device
	 * 
	 * You must supply administrator authentication credentials to use this API.
	 * This API requires the Auth Role to be enabled.
	 *
	 * @param string $TargetID The live connection GUID
	 * @return \Comet\BrowseDiskDrivesResponse 
	 * @throws \Exception
	 */
	public function AdminDispatcherRequestBrowseDiskDrives($TargetID)
	{
		$nr = new \Comet\AdminDispatcherRequestBrowseDiskDrivesRequest($TargetID);
		$response = $this->client->send($this->AsPSR7($nr));
		return \Comet\AdminDispatcherRequestBrowseDiskDrivesRequest::ProcessResponse($response->getStatusCode(), (string)$response->getBody());
	}

	/** 
	 * Request a list of Exchange EDB databases from a live connected device
	 * 
	 * You must supply administrator authentication credentials to use this API.
	 * This API requires the Auth Role to be enabled.
	 *
	 * @param string $TargetID The live connection GUID
	 * @return \Comet\BrowseEDBResponse 
	 * @throws \Exception
	 */
	public function AdminDispatcherRequestBrowseExchangeEdb($TargetID)
	{
		$nr = new \Comet\AdminDispatcherRequestBrowseExchangeEdbRequest($TargetID);
		$response = $this->client->send($this->AsPSR7($nr));
		return \Comet\AdminDispatcherRequestBrowseExchangeEdbRequest::ProcessResponse($response->getStatusCode(), (string)$response->getBody());
	}

	/** 
	 * Request a list of Hyper-V virtual machines from a live connected device
	 * 
	 * You must supply administrator authentication credentials to use this API.
	 * This API requires the Auth Role to be enabled.
	 *
	 * @param string $TargetID The live connection GUID
	 * @return \Comet\BrowseHVResponse 
	 * @throws \Exception
	 */
	public function AdminDispatcherRequestBrowseHyperv($TargetID)
	{
		$nr = new \Comet\AdminDispatcherRequestBrowseHypervRequest($TargetID);
		$response = $this->client->send($this->AsPSR7($nr));
		return \Comet\AdminDispatcherRequestBrowseHypervRequest::ProcessResponse($response->getStatusCode(), (string)$response->getBody());
	}

	/** 
	 * Request a list of tables in MongoDB database
	 * The remote device must have given consent for an MSP to browse their files.
	 * 
	 * You must supply administrator authentication credentials to use this API.
	 * This API requires the Auth Role to be enabled.
	 *
	 * @param string $TargetID The live connection GUID
	 * @param \Comet\MongoDBConnection $Credentials The Mongo database authentication settings
	 * @return \Comet\BrowseSQLServerResponse 
	 * @throws \Exception
	 */
	public function AdminDispatcherRequestBrowseMongodb($TargetID, MongoDBConnection $Credentials)
	{
		$nr = new \Comet\AdminDispatcherRequestBrowseMongodbRequest($TargetID, $Credentials);
		$response = $this->client->send($this->AsPSR7($nr));
		return \Comet\AdminDispatcherRequestBrowseMongodbRequest::ProcessResponse($response->getStatusCode(), (string)$response->getBody());
	}

	/** 
	 * Request a list of tables in MSSQL database
	 * The remote device must have given consent for an MSP to browse their files.
	 * 
	 * You must supply administrator authentication credentials to use this API.
	 * This API requires the Auth Role to be enabled.
	 *
	 * @param string $TargetID The live connection GUID
	 * @param \Comet\MSSQLConnection $Credentials The MSSQL database authentication settings
	 * @return \Comet\BrowseSQLServerResponse 
	 * @throws \Exception
	 */
	public function AdminDispatcherRequestBrowseMssql($TargetID, MSSQLConnection $Credentials)
	{
		$nr = new \Comet\AdminDispatcherRequestBrowseMssqlRequest($TargetID, $Credentials);
		$response = $this->client->send($this->AsPSR7($nr));
		return \Comet\AdminDispatcherRequestBrowseMssqlRequest::ProcessResponse($response->getStatusCode(), (string)$response->getBody());
	}

	/** 
	 * Request a list of tables in MySQL database
	 * The remote device must have given consent for an MSP to browse their files.
	 * 
	 * You must supply administrator authentication credentials to use this API.
	 * This API requires the Auth Role to be enabled.
	 *
	 * @param string $TargetID The live connection GUID
	 * @param \Comet\MySQLConnection $Credentials The MySQL database authentication settings
	 * @return \Comet\BrowseSQLServerResponse 
	 * @throws \Exception
	 */
	public function AdminDispatcherRequestBrowseMysql($TargetID, MySQLConnection $Credentials)
	{
		$nr = new \Comet\AdminDispatcherRequestBrowseMysqlRequest($TargetID, $Credentials);
		$response = $this->client->send($this->AsPSR7($nr));
		return \Comet\AdminDispatcherRequestBrowseMysqlRequest::ProcessResponse($response->getStatusCode(), (string)$response->getBody());
	}

	/** 
	 * Request a list of installed VSS Writers (Application-Aware Writers) from a live connected device
	 * 
	 * You must supply administrator authentication credentials to use this API.
	 * This API requires the Auth Role to be enabled.
	 *
	 * @param string $TargetID The live connection GUID
	 * @return \Comet\BrowseVSSResponse 
	 * @throws \Exception
	 */
	public function AdminDispatcherRequestBrowseVssAaw($TargetID)
	{
		$nr = new \Comet\AdminDispatcherRequestBrowseVssAawRequest($TargetID);
		$response = $this->client->send($this->AsPSR7($nr));
		return \Comet\AdminDispatcherRequestBrowseVssAawRequest::ProcessResponse($response->getStatusCode(), (string)$response->getBody());
	}

	/** 
	 * Request a list of filesystem objects from a live connected device
	 * The device must have granted the administrator permission to view its filenames.
	 * 
	 * You must supply administrator authentication credentials to use this API.
	 * This API requires the Auth Role to be enabled.
	 *
	 * @param string $TargetID The live connection GUID
	 * @param string $Path Browse objects inside this path. If empty or not present, returns the top-level device paths (optional)
	 * @return \Comet\DispatcherStoredObjectsResponse 
	 * @throws \Exception
	 */
	public function AdminDispatcherRequestFilesystemObjects($TargetID, $Path = null)
	{
		$nr = new \Comet\AdminDispatcherRequestFilesystemObjectsRequest($TargetID, $Path);
		$response = $this->client->send($this->AsPSR7($nr));
		return \Comet\AdminDispatcherRequestFilesystemObjectsRequest::ProcessResponse($response->getStatusCode(), (string)$response->getBody());
	}

	/** 
	 * Request a list of import sources from a live connected device
	 * 
	 * You must supply administrator authentication credentials to use this API.
	 * This API requires the Auth Role to be enabled.
	 *
	 * @param string $TargetID The live connection GUID
	 * @return \Comet\DispatcherAdminSourcesResponse 
	 * @throws \Exception
	 */
	public function AdminDispatcherRequestImportSources($TargetID)
	{
		$nr = new \Comet\AdminDispatcherRequestImportSourcesRequest($TargetID);
		$response = $this->client->send($this->AsPSR7($nr));
		return \Comet\AdminDispatcherRequestImportSourcesRequest::ProcessResponse($response->getStatusCode(), (string)$response->getBody());
	}

	/** 
	 * Request a list of Office365 mailbox accounts
	 * The remote device must have given consent for an MSP to browse their files.
	 * 
	 * You must supply administrator authentication credentials to use this API.
	 * This API requires the Auth Role to be enabled.
	 *
	 * @param string $TargetID The live connection GUID
	 * @param \Comet\Office365Credential $Credentials The Office365 account credential
	 * @return \Comet\BrowseOffice365ObjectsResponse 
	 * @throws \Exception
	 */
	public function AdminDispatcherRequestOffice365Accounts($TargetID, Office365Credential $Credentials)
	{
		$nr = new \Comet\AdminDispatcherRequestOffice365AccountsRequest($TargetID, $Credentials);
		$response = $this->client->send($this->AsPSR7($nr));
		return \Comet\AdminDispatcherRequestOffice365AccountsRequest::ProcessResponse($response->getStatusCode(), (string)$response->getBody());
	}

	/** 
	 * Request a list of Office365 sites
	 * The remote device must have given consent for an MSP to browse their files.
	 * 
	 * You must supply administrator authentication credentials to use this API.
	 * This API requires the Auth Role to be enabled.
	 *
	 * @param string $TargetID The live connection GUID
	 * @param \Comet\Office365Credential $Credentials The Office365 account credential
	 * @return \Comet\BrowseOffice365ObjectsResponse 
	 * @throws \Exception
	 */
	public function AdminDispatcherRequestOffice365Sites($TargetID, Office365Credential $Credentials)
	{
		$nr = new \Comet\AdminDispatcherRequestOffice365SitesRequest($TargetID, $Credentials);
		$response = $this->client->send($this->AsPSR7($nr));
		return \Comet\AdminDispatcherRequestOffice365SitesRequest::ProcessResponse($response->getStatusCode(), (string)$response->getBody());
	}

	/** 
	 * Request a list of stored objects inside an existing backup job
	 * The remote device must have given consent for an MSP to browse their files.
	 * To service this request, the remote device must connect to the Storage Vault and load index data. There may be a small delay. If the remote device is running Comet 20.12.0 or later, the necessary index data is cached when this API is first called, for 15 minutes after the last repeated call. This can improve performance for interactively browsing an entire tree of stored objects.
	 * 
	 * You must supply administrator authentication credentials to use this API.
	 * This API requires the Auth Role to be enabled.
	 *
	 * @param string $TargetID The live connection GUID
	 * @param string $Destination The Storage Vault ID
	 * @param string $SnapshotID The selected backup job snapshot
	 * @param string $TreeID Browse objects inside subdirectory of backup snapshot (optional)
	 * @return \Comet\DispatcherStoredObjectsResponse 
	 * @throws \Exception
	 */
	public function AdminDispatcherRequestStoredObjects($TargetID, $Destination, $SnapshotID, $TreeID = null)
	{
		$nr = new \Comet\AdminDispatcherRequestStoredObjectsRequest($TargetID, $Destination, $SnapshotID, $TreeID);
		$response = $this->client->send($this->AsPSR7($nr));
		return \Comet\AdminDispatcherRequestStoredObjectsRequest::ProcessResponse($response->getStatusCode(), (string)$response->getBody());
	}

	/** 
	 * Request a list of Storage Vault snapshots from a live connected device
	 * 
	 * You must supply administrator authentication credentials to use this API.
	 * This API requires the Auth Role to be enabled.
	 *
	 * @param string $TargetID The live connection GUID
	 * @param string $Destination The Storage Vault ID
	 * @return \Comet\DispatcherVaultSnapshotsResponse 
	 * @throws \Exception
	 */
	public function AdminDispatcherRequestVaultSnapshots($TargetID, $Destination)
	{
		$nr = new \Comet\AdminDispatcherRequestVaultSnapshotsRequest($TargetID, $Destination);
		$response = $this->client->send($this->AsPSR7($nr));
		return \Comet\AdminDispatcherRequestVaultSnapshotsRequest::ProcessResponse($response->getStatusCode(), (string)$response->getBody());
	}

	/** 
	 * Instruct a live connected device to run a scheduled backup
	 * 
	 * You must supply administrator authentication credentials to use this API.
	 * This API requires the Auth Role to be enabled.
	 *
	 * @param string $TargetID The live connection GUID
	 * @param string $BackupRule The schedule GUID
	 * @return \Comet\APIResponseMessage 
	 * @throws \Exception
	 */
	public function AdminDispatcherRunBackup($TargetID, $BackupRule)
	{
		$nr = new \Comet\AdminDispatcherRunBackupRequest($TargetID, $BackupRule);
		$response = $this->client->send($this->AsPSR7($nr));
		return \Comet\AdminDispatcherRunBackupRequest::ProcessResponse($response->getStatusCode(), (string)$response->getBody());
	}

	/** 
	 * Instruct a live connected device to run a backup
	 * 
	 * You must supply administrator authentication credentials to use this API.
	 * This API requires the Auth Role to be enabled.
	 *
	 * @param string $TargetID The live connection GUID
	 * @param string $Source The Protected Item GUID
	 * @param string $Destination The Storage Vault GUID
	 * @param \Comet\BackupJobAdvancedOptions $Options Extra job parameters (>= 19.3.6) (optional)
	 * @return \Comet\APIResponseMessage 
	 * @throws \Exception
	 */
	public function AdminDispatcherRunBackupCustom($TargetID, $Source, $Destination, BackupJobAdvancedOptions $Options = null)
	{
		$nr = new \Comet\AdminDispatcherRunBackupCustomRequest($TargetID, $Source, $Destination, $Options);
		$response = $this->client->send($this->AsPSR7($nr));
		return \Comet\AdminDispatcherRunBackupCustomRequest::ProcessResponse($response->getStatusCode(), (string)$response->getBody());
	}

	/** 
	 * Instruct a live connected device to perform a local restore
	 * This command is understood by Comet Backup 17.9.3 and newer.
	 * 
	 * You must supply administrator authentication credentials to use this API.
	 * This API requires the Auth Role to be enabled.
	 *
	 * @param string $TargetID The live connection GUID
	 * @param string $Path The local path to restore to
	 * @param string $Source The Protected Item ID
	 * @param string $Destination The Storage Vault ID
	 * @param string $Snapshot If present, restore a specific snapshot. Otherwise, restore the latest snapshot for the selected Protected Item + Storage Vault pair (optional)
	 * @param string[] $Paths If present, restore these paths only. Otherwise, restore all data (>= 19.3.0) (optional)
	 * @return \Comet\APIResponseMessage 
	 * @throws \Exception
	 */
	public function AdminDispatcherRunRestore($TargetID, $Path, $Source, $Destination, $Snapshot = null, array $Paths = null)
	{
		$nr = new \Comet\AdminDispatcherRunRestoreRequest($TargetID, $Path, $Source, $Destination, $Snapshot, $Paths);
		$response = $this->client->send($this->AsPSR7($nr));
		return \Comet\AdminDispatcherRunRestoreRequest::ProcessResponse($response->getStatusCode(), (string)$response->getBody());
	}

	/** 
	 * Instruct a live connected device to perform a local restore
	 * This command is understood by Comet Backup 18.6.0 and newer.
	 * 
	 * You must supply administrator authentication credentials to use this API.
	 * This API requires the Auth Role to be enabled.
	 *
	 * @param string $TargetID The live connection GUID
	 * @param string $Source The Protected Item ID
	 * @param string $Destination The Storage Vault ID
	 * @param \Comet\RestoreJobAdvancedOptions $Options Restore targets
	 * @param string $Snapshot If present, restore a specific snapshot. Otherwise, restore the latest snapshot for the selected Protected Item + Storage Vault pair (optional)
	 * @param string[] $Paths If present, restore these paths only. Otherwise, restore all data (optional)
	 * @return \Comet\APIResponseMessage 
	 * @throws \Exception
	 */
	public function AdminDispatcherRunRestoreCustom($TargetID, $Source, $Destination, RestoreJobAdvancedOptions $Options, $Snapshot = null, array $Paths = null)
	{
		$nr = new \Comet\AdminDispatcherRunRestoreCustomRequest($TargetID, $Source, $Destination, $Options, $Snapshot, $Paths);
		$response = $this->client->send($this->AsPSR7($nr));
		return \Comet\AdminDispatcherRunRestoreCustomRequest::ProcessResponse($response->getStatusCode(), (string)$response->getBody());
	}

	/** 
	 * Instruct a live connected device to self-uninstall the software
	 * 
	 * You must supply administrator authentication credentials to use this API.
	 * This API requires the Auth Role to be enabled.
	 *
	 * @param string $TargetID The live connection GUID
	 * @param boolean $RemoveConfigFile Determine if the config.dat file will be deleted at the same time
	 * @return \Comet\APIResponseMessage 
	 * @throws \Exception
	 */
	public function AdminDispatcherUninstallSoftware($TargetID, $RemoveConfigFile)
	{
		$nr = new \Comet\AdminDispatcherUninstallSoftwareRequest($TargetID, $RemoveConfigFile);
		$response = $this->client->send($this->AsPSR7($nr));
		return \Comet\AdminDispatcherUninstallSoftwareRequest::ProcessResponse($response->getStatusCode(), (string)$response->getBody());
	}

	/** 
	 * Instruct a live connected device to remove lock files from a Storage Vault
	 * Misuse can cause data loss!
	 * This command is understood by Comet Backup 17.9.4 and newer.
	 * 
	 * You must supply administrator authentication credentials to use this API.
	 * This API requires the Auth Role to be enabled.
	 *
	 * @param string $TargetID The live connection GUID
	 * @param string $Destination The Storage Vault GUID
	 * @return \Comet\APIResponseMessage 
	 * @throws \Exception
	 */
	public function AdminDispatcherUnlock($TargetID, $Destination)
	{
		$nr = new \Comet\AdminDispatcherUnlockRequest($TargetID, $Destination);
		$response = $this->client->send($this->AsPSR7($nr));
		return \Comet\AdminDispatcherUnlockRequest::ProcessResponse($response->getStatusCode(), (string)$response->getBody());
	}

	/** 
	 * Instruct a live connected device to update its login server URL
	 * The device will attempt to connect to the new Auth Role Comet Server using its current username and password. If the test connection succeeds, the device migrates its saved connection settings and live connections to the new server. If the device is not registered on the new URL, or if the credentials are incorrect, the device remains on the current Auth Role server.
	 * 
	 * You must supply administrator authentication credentials to use this API.
	 * This API requires the Auth Role to be enabled.
	 *
	 * @param string $TargetID The live connection GUID
	 * @param string $NewURL The new external URL of this server
	 * @return \Comet\APIResponseMessage 
	 * @throws \Exception
	 */
	public function AdminDispatcherUpdateLoginUrl($TargetID, $NewURL)
	{
		$nr = new \Comet\AdminDispatcherUpdateLoginUrlRequest($TargetID, $NewURL);
		$response = $this->client->send($this->AsPSR7($nr));
		return \Comet\AdminDispatcherUpdateLoginUrlRequest::ProcessResponse($response->getStatusCode(), (string)$response->getBody());
	}

	/** 
	 * Instruct a live connected device to download a software update
	 * 
	 * You must supply administrator authentication credentials to use this API.
	 * This API requires the Auth Role to be enabled.
	 * This API requires the Software Build Role to be enabled.
	 *
	 * @param string $TargetID The live connection GUID
	 * @param string $SelfAddress The external URL of this server, used to resolve conflicts (>= 19.3.11) (optional)
	 * @return \Comet\APIResponseMessage 
	 * @throws \Exception
	 */
	public function AdminDispatcherUpdateSoftware($TargetID, $SelfAddress = null)
	{
		if ($SelfAddress === null) {
			$SelfAddress = $this->server_url;
		}

		$nr = new \Comet\AdminDispatcherUpdateSoftwareRequest($TargetID, $SelfAddress);
		$response = $this->client->send($this->AsPSR7($nr));
		return \Comet\AdminDispatcherUpdateSoftwareRequest::ProcessResponse($response->getStatusCode(), (string)$response->getBody());
	}

	/** 
	 * Get the report log entries for a single job, in plaintext format
	 * 
	 * You must supply administrator authentication credentials to use this API.
	 * This API requires the Auth Role to be enabled.
	 *
	 * @param string $JobID Selected job ID
	 * @return string 
	 * @throws \Exception
	 */
	public function AdminGetJobLog($JobID)
	{
		$nr = new \Comet\AdminGetJobLogRequest($JobID);
		$response = $this->client->send($this->AsPSR7($nr));
		return \Comet\AdminGetJobLogRequest::ProcessResponse($response->getStatusCode(), (string)$response->getBody());
	}

	/** 
	 * Get the report log entries for a single job
	 * 
	 * You must supply administrator authentication credentials to use this API.
	 * This API requires the Auth Role to be enabled.
	 *
	 * @param string $JobID Selected job ID
	 * @return \Comet\JobEntry[] 
	 * @throws \Exception
	 */
	public function AdminGetJobLogEntries($JobID)
	{
		$nr = new \Comet\AdminGetJobLogEntriesRequest($JobID);
		$response = $this->client->send($this->AsPSR7($nr));
		return \Comet\AdminGetJobLogEntriesRequest::ProcessResponse($response->getStatusCode(), (string)$response->getBody());
	}

	/** 
	 * Get properties of a single job
	 * 
	 * You must supply administrator authentication credentials to use this API.
	 * This API requires the Auth Role to be enabled.
	 *
	 * @param string $JobID Selected job ID
	 * @return \Comet\BackupJobDetail 
	 * @throws \Exception
	 */
	public function AdminGetJobProperties($JobID)
	{
		$nr = new \Comet\AdminGetJobPropertiesRequest($JobID);
		$response = $this->client->send($this->AsPSR7($nr));
		return \Comet\AdminGetJobPropertiesRequest::ProcessResponse($response->getStatusCode(), (string)$response->getBody());
	}

	/** 
	 * Get jobs (All)
	 * The jobs are returned in an unspecified order.
	 * 
	 * You must supply administrator authentication credentials to use this API.
	 * This API requires the Auth Role to be enabled.
	 *
	 * @return \Comet\BackupJobDetail[] 
	 * @throws \Exception
	 */
	public function AdminGetJobsAll()
	{
		$nr = new \Comet\AdminGetJobsAllRequest();
		$response = $this->client->send($this->AsPSR7($nr));
		return \Comet\AdminGetJobsAllRequest::ProcessResponse($response->getStatusCode(), (string)$response->getBody());
	}

	/** 
	 * Get jobs (for custom search)
	 * The jobs are returned in an unspecified order.
	 * 
	 * You must supply administrator authentication credentials to use this API.
	 * This API requires the Auth Role to be enabled.
	 *
	 * @param \Comet\SearchClause $Query (No description available)
	 * @return \Comet\BackupJobDetail[] 
	 * @throws \Exception
	 */
	public function AdminGetJobsForCustomSearch(SearchClause $Query)
	{
		$nr = new \Comet\AdminGetJobsForCustomSearchRequest($Query);
		$response = $this->client->send($this->AsPSR7($nr));
		return \Comet\AdminGetJobsForCustomSearchRequest::ProcessResponse($response->getStatusCode(), (string)$response->getBody());
	}

	/** 
	 * Get jobs (for date range)
	 * The jobs are returned in an unspecified order.
	 * 
	 * If the `Start` parameter is later than `End`, they will be swapped.
	 * 
	 * This API will return all jobs that either started or ended within the supplied range.
	 * 
	 * Incomplete jobs have an end time of `0`. You can use this API to find incomplete jobs by setting both `Start` and `End` to `0`.
	 * 
	 * You must supply administrator authentication credentials to use this API.
	 * This API requires the Auth Role to be enabled.
	 *
	 * @param int $Start Timestamp (Unix)
	 * @param int $End Timestamp (Unix)
	 * @return \Comet\BackupJobDetail[] 
	 * @throws \Exception
	 */
	public function AdminGetJobsForDateRange($Start, $End)
	{
		$nr = new \Comet\AdminGetJobsForDateRangeRequest($Start, $End);
		$response = $this->client->send($this->AsPSR7($nr));
		return \Comet\AdminGetJobsForDateRangeRequest::ProcessResponse($response->getStatusCode(), (string)$response->getBody());
	}

	/** 
	 * Get jobs (for user)
	 * The jobs are returned in an unspecified order.
	 * 
	 * You must supply administrator authentication credentials to use this API.
	 * This API requires the Auth Role to be enabled.
	 *
	 * @param string $TargetUser Selected username
	 * @return \Comet\BackupJobDetail[] 
	 * @throws \Exception
	 */
	public function AdminGetJobsForUser($TargetUser)
	{
		$nr = new \Comet\AdminGetJobsForUserRequest($TargetUser);
		$response = $this->client->send($this->AsPSR7($nr));
		return \Comet\AdminGetJobsForUserRequest::ProcessResponse($response->getStatusCode(), (string)$response->getBody());
	}

	/** 
	 * Get jobs (Recent and incomplete)
	 * The jobs are returned in an unspecified order.
	 * 
	 * You must supply administrator authentication credentials to use this API.
	 * This API requires the Auth Role to be enabled.
	 *
	 * @return \Comet\BackupJobDetail[] 
	 * @throws \Exception
	 */
	public function AdminGetJobsRecent()
	{
		$nr = new \Comet\AdminGetJobsRecentRequest();
		$response = $this->client->send($this->AsPSR7($nr));
		return \Comet\AdminGetJobsRecentRequest::ProcessResponse($response->getStatusCode(), (string)$response->getBody());
	}

	/** 
	 * Get user account profile
	 * 
	 * You must supply administrator authentication credentials to use this API.
	 * This API requires the Auth Role to be enabled.
	 *
	 * @param string $TargetUser Selected account username
	 * @return \Comet\UserProfileConfig 
	 * @throws \Exception
	 */
	public function AdminGetUserProfile($TargetUser)
	{
		$nr = new \Comet\AdminGetUserProfileRequest($TargetUser);
		$response = $this->client->send($this->AsPSR7($nr));
		return \Comet\AdminGetUserProfileRequest::ProcessResponse($response->getStatusCode(), (string)$response->getBody());
	}

	/** 
	 * Get user account profile (atomic)
	 * The resulting hash parameter can be passed to the corresponding update API, to atomically ensure that no changes occur between get/set operations.
	 * The hash format is not publicly documented and may change in a future server version. Use server APIs to retrieve current hash values.
	 * 
	 * You must supply administrator authentication credentials to use this API.
	 * This API requires the Auth Role to be enabled.
	 *
	 * @param string $TargetUser Selected account username
	 * @return \Comet\GetProfileAndHashResponseMessage 
	 * @throws \Exception
	 */
	public function AdminGetUserProfileAndHash($TargetUser)
	{
		$nr = new \Comet\AdminGetUserProfileAndHashRequest($TargetUser);
		$response = $this->client->send($this->AsPSR7($nr));
		return \Comet\AdminGetUserProfileAndHashRequest::ProcessResponse($response->getStatusCode(), (string)$response->getBody());
	}

	/** 
	 * Get user account profile (hash)
	 * The profile hash can be used to determine if a user account profile has changed.
	 * The hash format is not publicly documented and may change in a future server version. Use server APIs to retrieve current hash values.
	 * 
	 * You must supply administrator authentication credentials to use this API.
	 * This API requires the Auth Role to be enabled.
	 *
	 * @param string $TargetUser Selected account username
	 * @return \Comet\GetProfileHashResponseMessage 
	 * @throws \Exception
	 */
	public function AdminGetUserProfileHash($TargetUser)
	{
		$nr = new \Comet\AdminGetUserProfileHashRequest($TargetUser);
		$response = $this->client->send($this->AsPSR7($nr));
		return \Comet\AdminGetUserProfileHashRequest::ProcessResponse($response->getStatusCode(), (string)$response->getBody());
	}

	/** 
	 * Cancel a running job
	 * A request is sent to the live-connected device, asking it to cancel the operation. This may fail if there is no live-connection.
	 * Only jobs from Comet 18.3.5 or newer can be cancelled. A job can only be cancelled if it has a non-empty CancellationID field in its properties.
	 * 
	 * You must supply administrator authentication credentials to use this API.
	 * This API requires the Auth Role to be enabled.
	 *
	 * @param string $TargetUser Username
	 * @param string $JobID Job ID
	 * @return \Comet\APIResponseMessage 
	 * @throws \Exception
	 */
	public function AdminJobCancel($TargetUser, $JobID)
	{
		$nr = new \Comet\AdminJobCancelRequest($TargetUser, $JobID);
		$response = $this->client->send($this->AsPSR7($nr));
		return \Comet\AdminJobCancelRequest::ProcessResponse($response->getStatusCode(), (string)$response->getBody());
	}

	/** 
	 * List all user accounts
	 * 
	 * You must supply administrator authentication credentials to use this API.
	 * This API requires the Auth Role to be enabled.
	 *
	 * @return string[] 
	 * @throws \Exception
	 */
	public function AdminListUsers()
	{
		$nr = new \Comet\AdminListUsersRequest();
		$response = $this->client->send($this->AsPSR7($nr));
		return \Comet\AdminListUsersRequest::ProcessResponse($response->getStatusCode(), (string)$response->getBody());
	}

	/** 
	 * List all user account profiles
	 * 
	 * You must supply administrator authentication credentials to use this API.
	 * This API requires the Auth Role to be enabled.
	 *
	 * @return \Comet\UserProfileConfig[] An array with string keys. 
	 * @throws \Exception
	 */
	public function AdminListUsersFull()
	{
		$nr = new \Comet\AdminListUsersFullRequest();
		$response = $this->client->send($this->AsPSR7($nr));
		return \Comet\AdminListUsersFullRequest::ProcessResponse($response->getStatusCode(), (string)$response->getBody());
	}

	/** 
	 * Get Branding configuration
	 * 
	 * You must supply administrator authentication credentials to use this API.
	 * Access to this API may be prevented on a per-administrator basis.
	 *
	 * @return \Comet\ServerConfigOptionsBrandingFragment 
	 * @throws \Exception
	 */
	public function AdminMetaBrandingConfigGet()
	{
		$nr = new \Comet\AdminMetaBrandingConfigGetRequest();
		$response = $this->client->send($this->AsPSR7($nr));
		return \Comet\AdminMetaBrandingConfigGetRequest::ProcessResponse($response->getStatusCode(), (string)$response->getBody());
	}

	/** 
	 * Set Branding configuration
	 * Note that file resources must be provided using a resource URI I.E `"resource://05ba0b90ee66bda433169581188aba8d29faa938f9464cccd651a02fdf2e5b57"`. See AdminMetaResourceNew for the API documentation to create new file resources.
	 * 
	 * You must supply administrator authentication credentials to use this API.
	 * Access to this API may be prevented on a per-administrator basis.
	 *
	 * @param \Comet\BrandingOptions $BrandingConfig Updated configuration content
	 * @return \Comet\APIResponseMessage 
	 * @throws \Exception
	 */
	public function AdminMetaBrandingConfigSet(BrandingOptions $BrandingConfig)
	{
		$nr = new \Comet\AdminMetaBrandingConfigSetRequest($BrandingConfig);
		$response = $this->client->send($this->AsPSR7($nr));
		return \Comet\AdminMetaBrandingConfigSetRequest::ProcessResponse($response->getStatusCode(), (string)$response->getBody());
	}

	/** 
	 * Get Software Build Role configuration
	 * 
	 * You must supply administrator authentication credentials to use this API.
	 * Access to this API may be prevented on a per-administrator basis.
	 *
	 * @return \Comet\ServerConfigOptionsSoftwareBuildRoleFragment 
	 * @throws \Exception
	 */
	public function AdminMetaBuildConfigGet()
	{
		$nr = new \Comet\AdminMetaBuildConfigGetRequest();
		$response = $this->client->send($this->AsPSR7($nr));
		return \Comet\AdminMetaBuildConfigGetRequest::ProcessResponse($response->getStatusCode(), (string)$response->getBody());
	}

	/** 
	 * Set Build Role configuration
	 * 
	 * You must supply administrator authentication credentials to use this API.
	 * Access to this API may be prevented on a per-administrator basis.
	 *
	 * @param \Comet\SoftwareBuildRoleOptions $SoftwareBuildRoleConfig Updated configuration content
	 * @return \Comet\APIResponseMessage 
	 * @throws \Exception
	 */
	public function AdminMetaBuildConfigSet(SoftwareBuildRoleOptions $SoftwareBuildRoleConfig)
	{
		$nr = new \Comet\AdminMetaBuildConfigSetRequest($SoftwareBuildRoleConfig);
		$response = $this->client->send($this->AsPSR7($nr));
		return \Comet\AdminMetaBuildConfigSetRequest::ProcessResponse($response->getStatusCode(), (string)$response->getBody());
	}

	/** 
	 * Get log files
	 * 
	 * You must supply administrator authentication credentials to use this API.
	 * This API is only available for administrator accounts in the top-level Organization, not in any other Organization.
	 *
	 * @return int[] 
	 * @throws \Exception
	 */
	public function AdminMetaListAvailableLogDays()
	{
		$nr = new \Comet\AdminMetaListAvailableLogDaysRequest();
		$response = $this->client->send($this->AsPSR7($nr));
		return \Comet\AdminMetaListAvailableLogDaysRequest::ProcessResponse($response->getStatusCode(), (string)$response->getBody());
	}

	/** 
	 * Get log file content
	 * On non-Windows platforms, log content uses LF line endings. On Windows, Comet changed from LF to CRLF line endings in 18.3.2.
	 * This API does not automatically convert line endings; around the 18.3.2 timeframe, log content may even contain mixed line-endings.
	 * 
	 * You must supply administrator authentication credentials to use this API.
	 * This API is only available for administrator accounts in the top-level Organization, not in any other Organization.
	 *
	 * @param int $Log A log day, selected from the options returned by the Get Log Files API
	 * @return string 
	 * @throws \Exception
	 */
	public function AdminMetaReadLogs($Log)
	{
		$nr = new \Comet\AdminMetaReadLogsRequest($Log);
		$response = $this->client->send($this->AsPSR7($nr));
		return \Comet\AdminMetaReadLogsRequest::ProcessResponse($response->getStatusCode(), (string)$response->getBody());
	}

	/** 
	 * Get Requesting Remote Storage Vault Config
	 * 
	 * You must supply administrator authentication credentials to use this API.
	 * Access to this API may be prevented on a per-administrator basis.
	 *
	 * @return \Comet\RemoteStorageOption[] 
	 * @throws \Exception
	 */
	public function AdminMetaRemoteStorageVaultGet()
	{
		$nr = new \Comet\AdminMetaRemoteStorageVaultGetRequest();
		$response = $this->client->send($this->AsPSR7($nr));
		return \Comet\AdminMetaRemoteStorageVaultGetRequest::ProcessResponse($response->getStatusCode(), (string)$response->getBody());
	}

	/** 
	 * Set Requestable Remote Storage Vault options
	 * 
	 * You must supply administrator authentication credentials to use this API.
	 * Access to this API may be prevented on a per-administrator basis.
	 *
	 * @param \Comet\RemoteStorageOption[] $RemoteStorageOptions Updated configuration content
	 * @return \Comet\APIResponseMessage 
	 * @throws \Exception
	 */
	public function AdminMetaRemoteStorageVaultSet(array $RemoteStorageOptions)
	{
		$nr = new \Comet\AdminMetaRemoteStorageVaultSetRequest($RemoteStorageOptions);
		$response = $this->client->send($this->AsPSR7($nr));
		return \Comet\AdminMetaRemoteStorageVaultSetRequest::ProcessResponse($response->getStatusCode(), (string)$response->getBody());
	}

	/** 
	 * Get a resource file
	 * Resources are used to upload files within the server configuration.
	 * 
	 * You must supply administrator authentication credentials to use this API.
	 *
	 * @param string $Hash The resource identifier
	 * @return string 
	 * @throws \Exception
	 */
	public function AdminMetaResourceGet($Hash)
	{
		$nr = new \Comet\AdminMetaResourceGetRequest($Hash);
		$response = $this->client->send($this->AsPSR7($nr));
		return \Comet\AdminMetaResourceGetRequest::ProcessResponse($response->getStatusCode(), (string)$response->getBody());
	}

	/** 
	 * Upload a resource file
	 * Resources are used to upload files within the server configuration.
	 * The resulting resource ID is autogenerated.
	 * The lifespan of an uploaded resource is undefined. Resources may be deleted automatically, but it should remain available until the next call to AdminMetaServerConfigSet, and will remain available for as long as it is referenced by the server configuration.
	 * 
	 * You must supply administrator authentication credentials to use this API.
	 *
	 * @param string $upload The uploaded file contents, as a multipart/form-data part.
	 * @return \Comet\AdminResourceResponse 
	 * @throws \Exception
	 */
	public function AdminMetaResourceNew($upload)
	{
		$nr = new \Comet\AdminMetaResourceNewRequest($upload);
		$response = $this->client->send($this->AsPSR7($nr));
		return \Comet\AdminMetaResourceNewRequest::ProcessResponse($response->getStatusCode(), (string)$response->getBody());
	}

	/** 
	 * Restart server
	 * The Comet Server process will exit. The service manager should restart the server automatically.
	 * 
	 * Prior to 18.9.2, this API terminated the server immediately without returning a response. In 18.9.2 and later, it returns a successful response before shutting down.
	 * 
	 * You must supply administrator authentication credentials to use this API.
	 * This API is only available for administrator accounts in the top-level Organization, not in any other Organization.
	 * Access to this API may be prevented on a per-administrator basis.
	 *
	 * @return \Comet\APIResponseMessage 
	 * @throws \Exception
	 */
	public function AdminMetaRestartService()
	{
		$nr = new \Comet\AdminMetaRestartServiceRequest();
		$response = $this->client->send($this->AsPSR7($nr));
		return \Comet\AdminMetaRestartServiceRequest::ProcessResponse($response->getStatusCode(), (string)$response->getBody());
	}

	/** 
	 * Send a test email message
	 * This allows the Comet Server web interface to support testing different email credentials during setup.
	 * 
	 * You must supply administrator authentication credentials to use this API.
	 * This API is only available for administrator accounts in the top-level Organization, not in any other Organization.
	 * Access to this API may be prevented on a per-administrator basis.
	 *
	 * @param \Comet\EmailOptions $EmailOptions Updated configuration content
	 * @param string $Recipient Target email address to send test email
	 * @return \Comet\APIResponseMessage 
	 * @throws \Exception
	 */
	public function AdminMetaSendTestEmail(EmailOptions $EmailOptions, $Recipient)
	{
		$nr = new \Comet\AdminMetaSendTestEmailRequest($EmailOptions, $Recipient);
		$response = $this->client->send($this->AsPSR7($nr));
		return \Comet\AdminMetaSendTestEmailRequest::ProcessResponse($response->getStatusCode(), (string)$response->getBody());
	}

	/** 
	 * Get server configuration
	 * 
	 * You must supply administrator authentication credentials to use this API.
	 * Access to this API may be prevented on a per-administrator basis.
	 * This API is only available for administrator accounts in the top-level Organization, not in any other Organization.
	 *
	 * @return \Comet\ServerConfigOptions 
	 * @throws \Exception
	 */
	public function AdminMetaServerConfigGet()
	{
		$nr = new \Comet\AdminMetaServerConfigGetRequest();
		$response = $this->client->send($this->AsPSR7($nr));
		return \Comet\AdminMetaServerConfigGetRequest::ProcessResponse($response->getStatusCode(), (string)$response->getBody());
	}

	/** 
	 * List the available network interfaces on the PC running Comet Server
	 * Any IPv6 addresses are listed in compressed form without square-brackets.
	 * 
	 * You must supply administrator authentication credentials to use this API.
	 * Access to this API may be prevented on a per-administrator basis.
	 * This API is only available for administrator accounts in the top-level Organization, not in any other Organization.
	 *
	 * @return string[] 
	 * @throws \Exception
	 */
	public function AdminMetaServerConfigNetworkInterfaces()
	{
		$nr = new \Comet\AdminMetaServerConfigNetworkInterfacesRequest();
		$response = $this->client->send($this->AsPSR7($nr));
		return \Comet\AdminMetaServerConfigNetworkInterfacesRequest::ProcessResponse($response->getStatusCode(), (string)$response->getBody());
	}

	/** 
	 * Set server configuration
	 * The Comet Server process will exit. The service manager should restart the server automatically.
	 * 
	 * Prior to 18.9.2, this API terminated the server immediately without returning a response. In 18.9.2 and later, it returns a successful response before shutting down.
	 * 
	 * You must supply administrator authentication credentials to use this API.
	 * Access to this API may be prevented on a per-administrator basis.
	 * This API is only available for administrator accounts in the top-level Organization, not in any other Organization.
	 *
	 * @param \Comet\ServerConfigOptions $Config Updated configuration content
	 * @return \Comet\APIResponseMessage 
	 * @throws \Exception
	 */
	public function AdminMetaServerConfigSet(ServerConfigOptions $Config)
	{
		$nr = new \Comet\AdminMetaServerConfigSetRequest($Config);
		$response = $this->client->send($this->AsPSR7($nr));
		return \Comet\AdminMetaServerConfigSetRequest::ProcessResponse($response->getStatusCode(), (string)$response->getBody());
	}

	/** 
	 * Shut down server
	 * The Comet Server process will exit.
	 * 
	 * Prior to 18.9.2, this API terminated the server immediately without returning a response. In 18.9.2 and later, it returns a successful response before shutting down.
	 * 
	 * You must supply administrator authentication credentials to use this API.
	 * This API is only available for administrator accounts in the top-level Organization, not in any other Organization.
	 * Access to this API may be prevented on a per-administrator basis.
	 *
	 * @return \Comet\APIResponseMessage 
	 * @throws \Exception
	 */
	public function AdminMetaShutdownService()
	{
		$nr = new \Comet\AdminMetaShutdownServiceRequest();
		$response = $this->client->send($this->AsPSR7($nr));
		return \Comet\AdminMetaShutdownServiceRequest::ProcessResponse($response->getStatusCode(), (string)$response->getBody());
	}

	/** 
	 * Get software update news from the software provider
	 * 
	 * You must supply administrator authentication credentials to use this API.
	 *
	 * @return \Comet\SoftwareUpdateNewsResponse 
	 * @throws \Exception
	 */
	public function AdminMetaSoftwareUpdateNews()
	{
		$nr = new \Comet\AdminMetaSoftwareUpdateNewsRequest();
		$response = $this->client->send($this->AsPSR7($nr));
		return \Comet\AdminMetaSoftwareUpdateNewsRequest::ProcessResponse($response->getStatusCode(), (string)$response->getBody());
	}

	/** 
	 * Get Comet Server historical statistics
	 * The returned key-value map is not necessarily ordered. Client-side code should sort the result before display.
	 * 
	 * You must supply administrator authentication credentials to use this API.
	 *
	 * @param boolean $Simple Remove redundant statistics
	 * @return \Comet\StatResult[] An array with int keys. 
	 * @throws \Exception
	 */
	public function AdminMetaStats($Simple)
	{
		$nr = new \Comet\AdminMetaStatsRequest($Simple);
		$response = $this->client->send($this->AsPSR7($nr));
		return \Comet\AdminMetaStatsRequest::ProcessResponse($response->getStatusCode(), (string)$response->getBody());
	}

	/** 
	 * Get server properties
	 * Retrieve the version number and basic properties about the server.
	 * 
	 * You must supply administrator authentication credentials to use this API.
	 *
	 * @return \Comet\ServerMetaVersionInfo 
	 * @throws \Exception
	 */
	public function AdminMetaVersion()
	{
		$nr = new \Comet\AdminMetaVersionRequest();
		$response = $this->client->send($this->AsPSR7($nr));
		return \Comet\AdminMetaVersionRequest::ProcessResponse($response->getStatusCode(), (string)$response->getBody());
	}

	/** 
	 * Get the server webhook configuration
	 * 
	 * You must supply administrator authentication credentials to use this API.
	 *
	 * @return \Comet\WebhookOption[] An array with string keys. 
	 * @throws \Exception
	 */
	public function AdminMetaWebhookOptionsGet()
	{
		$nr = new \Comet\AdminMetaWebhookOptionsGetRequest();
		$response = $this->client->send($this->AsPSR7($nr));
		return \Comet\AdminMetaWebhookOptionsGetRequest::ProcessResponse($response->getStatusCode(), (string)$response->getBody());
	}

	/** 
	 * Update the server webhook configuration
	 * Calling this endpoint will interrupt any messages currently queued for existing webhook destinations.
	 * 
	 * You must supply administrator authentication credentials to use this API.
	 *
	 * @param \Comet\WebhookOption[] An array with string keys. $WebhookOptions The replacement webhook target options.
	 * @return \Comet\APIResponseMessage 
	 * @throws \Exception
	 */
	public function AdminMetaWebhookOptionsSet(array $WebhookOptions)
	{
		$nr = new \Comet\AdminMetaWebhookOptionsSetRequest($WebhookOptions);
		$response = $this->client->send($this->AsPSR7($nr));
		return \Comet\AdminMetaWebhookOptionsSetRequest::ProcessResponse($response->getStatusCode(), (string)$response->getBody());
	}

	/** 
	 * Get News entries (Admin)
	 * 
	 * You must supply administrator authentication credentials to use this API.
	 * This API requires the Auth Role to be enabled.
	 *
	 * @return \Comet\NewsEntry[] An array with string keys. 
	 * @throws \Exception
	 */
	public function AdminNewsGetAll()
	{
		$nr = new \Comet\AdminNewsGetAllRequest();
		$response = $this->client->send($this->AsPSR7($nr));
		return \Comet\AdminNewsGetAllRequest::ProcessResponse($response->getStatusCode(), (string)$response->getBody());
	}

	/** 
	 * Remove news item
	 * 
	 * You must supply administrator authentication credentials to use this API.
	 * This API requires the Auth Role to be enabled.
	 *
	 * @param string $NewsItem Selected news item GUID
	 * @return \Comet\APIResponseMessage 
	 * @throws \Exception
	 */
	public function AdminNewsRemove($NewsItem)
	{
		$nr = new \Comet\AdminNewsRemoveRequest($NewsItem);
		$response = $this->client->send($this->AsPSR7($nr));
		return \Comet\AdminNewsRemoveRequest::ProcessResponse($response->getStatusCode(), (string)$response->getBody());
	}

	/** 
	 * Submit news item
	 * 
	 * You must supply administrator authentication credentials to use this API.
	 * This API requires the Auth Role to be enabled.
	 *
	 * @param string $NewsContent Content of news item
	 * @return \Comet\APIResponseMessage 
	 * @throws \Exception
	 */
	public function AdminNewsSubmit($NewsContent)
	{
		$nr = new \Comet\AdminNewsSubmitRequest($NewsContent);
		$response = $this->client->send($this->AsPSR7($nr));
		return \Comet\AdminNewsSubmitRequest::ProcessResponse($response->getStatusCode(), (string)$response->getBody());
	}

	/** 
	 * Delete an organization and all related users
	 * 
	 * You must supply administrator authentication credentials to use this API.
	 * This API is only available for administrator accounts in the top-level Organization, not in any other Organization.
	 *
	 * @param string $OrganizationID (No description available) (optional)
	 * @param \Comet\UninstallConfig $UninstallConfig Uninstall software configuration (optional)
	 * @return \Comet\OrganizationResponse 
	 * @throws \Exception
	 */
	public function AdminOrganizationDelete($OrganizationID = null, UninstallConfig $UninstallConfig = null)
	{
		$nr = new \Comet\AdminOrganizationDeleteRequest($OrganizationID, $UninstallConfig);
		$response = $this->client->send($this->AsPSR7($nr));
		return \Comet\AdminOrganizationDeleteRequest::ProcessResponse($response->getStatusCode(), (string)$response->getBody());
	}

	/** 
	 * List Organizations
	 * 
	 * You must supply administrator authentication credentials to use this API.
	 * This API is only available for administrator accounts in the top-level Organization, not in any other Organization.
	 *
	 * @return \Comet\Organization[] An array with string keys. 
	 * @throws \Exception
	 */
	public function AdminOrganizationList()
	{
		$nr = new \Comet\AdminOrganizationListRequest();
		$response = $this->client->send($this->AsPSR7($nr));
		return \Comet\AdminOrganizationListRequest::ProcessResponse($response->getStatusCode(), (string)$response->getBody());
	}

	/** 
	 * Create or Update an Organization
	 * 
	 * You must supply administrator authentication credentials to use this API.
	 * This API is only available for administrator accounts in the top-level Organization, not in any other Organization.
	 *
	 * @param string $OrganizationID (No description available) (optional)
	 * @param \Comet\Organization $Organization (No description available) (optional)
	 * @return \Comet\OrganizationResponse 
	 * @throws \Exception
	 */
	public function AdminOrganizationSet($OrganizationID = null, Organization $Organization = null)
	{
		$nr = new \Comet\AdminOrganizationSetRequest($OrganizationID, $Organization);
		$response = $this->client->send($this->AsPSR7($nr));
		return \Comet\AdminOrganizationSetRequest::ProcessResponse($response->getStatusCode(), (string)$response->getBody());
	}

	/** 
	 * Delete an existing policy object
	 * 
	 * You must supply administrator authentication credentials to use this API.
	 * This API requires the Auth Role to be enabled.
	 *
	 * @param string $PolicyID The policy ID to update or create
	 * @return \Comet\APIResponseMessage 
	 * @throws \Exception
	 */
	public function AdminPoliciesDelete($PolicyID)
	{
		$nr = new \Comet\AdminPoliciesDeleteRequest($PolicyID);
		$response = $this->client->send($this->AsPSR7($nr));
		return \Comet\AdminPoliciesDeleteRequest::ProcessResponse($response->getStatusCode(), (string)$response->getBody());
	}

	/** 
	 * Retrieve a single policy object
	 * A hash is also returned, to allow atomic modification operations.
	 * 
	 * You must supply administrator authentication credentials to use this API.
	 * This API requires the Auth Role to be enabled.
	 *
	 * @param string $PolicyID The policy ID to retrieve
	 * @return \Comet\GetGroupPolicyResponse 
	 * @throws \Exception
	 */
	public function AdminPoliciesGet($PolicyID)
	{
		$nr = new \Comet\AdminPoliciesGetRequest($PolicyID);
		$response = $this->client->send($this->AsPSR7($nr));
		return \Comet\AdminPoliciesGetRequest::ProcessResponse($response->getStatusCode(), (string)$response->getBody());
	}

	/** 
	 * List all policy object names
	 * 
	 * You must supply administrator authentication credentials to use this API.
	 * This API requires the Auth Role to be enabled.
	 *
	 * @return string[] An array with string keys. 
	 * @throws \Exception
	 */
	public function AdminPoliciesList()
	{
		$nr = new \Comet\AdminPoliciesListRequest();
		$response = $this->client->send($this->AsPSR7($nr));
		return \Comet\AdminPoliciesListRequest::ProcessResponse($response->getStatusCode(), (string)$response->getBody());
	}

	/** 
	 * Get all policy objects
	 * 
	 * You must supply administrator authentication credentials to use this API.
	 * This API requires the Auth Role to be enabled.
	 *
	 * @return \Comet\GroupPolicy[] An array with string keys. 
	 * @throws \Exception
	 */
	public function AdminPoliciesListFull()
	{
		$nr = new \Comet\AdminPoliciesListFullRequest();
		$response = $this->client->send($this->AsPSR7($nr));
		return \Comet\AdminPoliciesListFullRequest::ProcessResponse($response->getStatusCode(), (string)$response->getBody());
	}

	/** 
	 * Create a new policy object
	 * 
	 * You must supply administrator authentication credentials to use this API.
	 * This API requires the Auth Role to be enabled.
	 *
	 * @param \Comet\GroupPolicy $Policy The policy data
	 * @return \Comet\CreateGroupPolicyResponse 
	 * @throws \Exception
	 */
	public function AdminPoliciesNew(GroupPolicy $Policy)
	{
		$nr = new \Comet\AdminPoliciesNewRequest($Policy);
		$response = $this->client->send($this->AsPSR7($nr));
		return \Comet\AdminPoliciesNewRequest::ProcessResponse($response->getStatusCode(), (string)$response->getBody());
	}

	/** 
	 * Update an existing policy object
	 * An optional hash may be used, to ensure the modification was atomic.
	 * This API can also be used to create a new policy object with a specific hash.
	 * 
	 * You must supply administrator authentication credentials to use this API.
	 * This API requires the Auth Role to be enabled.
	 *
	 * @param string $PolicyID The policy ID to update or create
	 * @param \Comet\GroupPolicy $Policy The policy data
	 * @param string $CheckPolicyHash An atomic verification hash as supplied by the AdminPoliciesGet API (optional)
	 * @return \Comet\APIResponseMessage 
	 * @throws \Exception
	 */
	public function AdminPoliciesSet($PolicyID, GroupPolicy $Policy, $CheckPolicyHash = null)
	{
		$nr = new \Comet\AdminPoliciesSetRequest($PolicyID, $Policy, $CheckPolicyHash);
		$response = $this->client->send($this->AsPSR7($nr));
		return \Comet\AdminPoliciesSetRequest::ProcessResponse($response->getStatusCode(), (string)$response->getBody());
	}

	/** 
	 * Preview an email report for a customer
	 * 
	 * You must supply administrator authentication credentials to use this API.
	 * This API requires the Auth Role to be enabled.
	 *
	 * @param string $TargetUser Selected account username
	 * @param \Comet\EmailReportConfig $EmailReportConfig Email report configuration to preview
	 * @param string $EmailAddress Email address that may be included in the report body (>= 20.3.3) (optional)
	 * @return \Comet\EmailReportGeneratedPreview 
	 * @throws \Exception
	 */
	public function AdminPreviewUserEmailReport($TargetUser, EmailReportConfig $EmailReportConfig, $EmailAddress = null)
	{
		$nr = new \Comet\AdminPreviewUserEmailReportRequest($TargetUser, $EmailReportConfig, $EmailAddress);
		$response = $this->client->send($this->AsPSR7($nr));
		return \Comet\AdminPreviewUserEmailReportRequest::ProcessResponse($response->getStatusCode(), (string)$response->getBody());
	}

	/** 
	 * Get Replication status
	 * 
	 * You must supply administrator authentication credentials to use this API.
	 * This API is only available for administrator accounts in the top-level Organization, not in any other Organization.
	 *
	 * @return \Comet\ReplicatorStateAPIResponse[] 
	 * @throws \Exception
	 */
	public function AdminReplicationState()
	{
		$nr = new \Comet\AdminReplicationStateRequest();
		$response = $this->client->send($this->AsPSR7($nr));
		return \Comet\AdminReplicationStateRequest::ProcessResponse($response->getStatusCode(), (string)$response->getBody());
	}

	/** 
	 * Request a new Storage Vault on behalf of a user
	 * This action does not respect the "Prevent creating new Storage Vaults (via Request)" policy setting. New Storage Vaults can be requested regardless of the policy setting.
	 * Prior to Comet 19.8.0, the response type was CometAPIResponseMessage (i.e. no DestinationID field in response).
	 * 
	 * You must supply administrator authentication credentials to use this API.
	 * This API requires the Auth Role to be enabled.
	 *
	 * @param string $TargetUser The user to receive the new Storage Vault
	 * @param string $StorageProvider ID for the Requestable destination
	 * @param string $SelfAddress The external URL for this server. Used to resolve conflicts (optional)
	 * @return \Comet\RequestStorageVaultResponseMessage 
	 * @throws \Exception
	 */
	public function AdminRequestStorageVault($TargetUser, $StorageProvider, $SelfAddress = null)
	{
		if ($SelfAddress === null) {
			$SelfAddress = $this->server_url;
		}

		$nr = new \Comet\AdminRequestStorageVaultRequest($TargetUser, $StorageProvider, $SelfAddress);
		$response = $this->client->send($this->AsPSR7($nr));
		return \Comet\AdminRequestStorageVaultRequest::ProcessResponse($response->getStatusCode(), (string)$response->getBody());
	}

	/** 
	 * Get the available options for Requesting a Storage Vault
	 * 
	 * You must supply administrator authentication credentials to use this API.
	 * This API requires the Auth Role to be enabled.
	 *
	 * @return string[] An array with string keys. 
	 * @throws \Exception
	 */
	public function AdminRequestStorageVaultProviders()
	{
		$nr = new \Comet\AdminRequestStorageVaultProvidersRequest();
		$response = $this->client->send($this->AsPSR7($nr));
		return \Comet\AdminRequestStorageVaultProvidersRequest::ProcessResponse($response->getStatusCode(), (string)$response->getBody());
	}

	/** 
	 * Reset user account password
	 * The user account must have a recovery code present. A new replacement recovery code will be generated automatically.
	 * 
	 * You must supply administrator authentication credentials to use this API.
	 * This API requires the Auth Role to be enabled.
	 *
	 * @param string $TargetUser Selected account username
	 * @param string $NewPassword New account password
	 * @param string $OldPassword Old account password (optional)
	 * @return \Comet\APIResponseMessage 
	 * @throws \Exception
	 */
	public function AdminResetUserPassword($TargetUser, $NewPassword, $OldPassword)
	{
		$nr = new \Comet\AdminResetUserPasswordRequest($TargetUser, $NewPassword, $OldPassword);
		$response = $this->client->send($this->AsPSR7($nr));
		return \Comet\AdminResetUserPasswordRequest::ProcessResponse($response->getStatusCode(), (string)$response->getBody());
	}

	/** 
	 * Revoke device from user account
	 * It's possible to simply remove the Device section from the user's profile, however, using this dedicated API will also gracefully handle live connections.
	 * 
	 * You must supply administrator authentication credentials to use this API.
	 * This API requires the Auth Role to be enabled.
	 *
	 * @param string $TargetUser Selected account username
	 * @param string $TargetDevice Selected Device ID
	 * @return \Comet\APIResponseMessage 
	 * @throws \Exception
	 */
	public function AdminRevokeDevice($TargetUser, $TargetDevice)
	{
		$nr = new \Comet\AdminRevokeDeviceRequest($TargetUser, $TargetDevice);
		$response = $this->client->send($this->AsPSR7($nr));
		return \Comet\AdminRevokeDeviceRequest::ProcessResponse($response->getStatusCode(), (string)$response->getBody());
	}

	/** 
	 * Modify user account profile
	 * 
	 * You must supply administrator authentication credentials to use this API.
	 * This API requires the Auth Role to be enabled.
	 *
	 * @param string $TargetUser Selected account username
	 * @param \Comet\UserProfileConfig $ProfileData Modified user profile
	 * @return \Comet\APIResponseMessage 
	 * @throws \Exception
	 */
	public function AdminSetUserProfile($TargetUser, UserProfileConfig $ProfileData)
	{
		$nr = new \Comet\AdminSetUserProfileRequest($TargetUser, $ProfileData);
		$response = $this->client->send($this->AsPSR7($nr));
		return \Comet\AdminSetUserProfileRequest::ProcessResponse($response->getStatusCode(), (string)$response->getBody());
	}

	/** 
	 * Modify user account profile (atomic)
	 * The hash parameter can be determined from the corresponding API, to atomically ensure that no changes occur between get/set operations.
	 * The hash format is not publicly documented and may change in a future server version. Use server APIs to retrieve current hash values.
	 * 
	 * You must supply administrator authentication credentials to use this API.
	 * This API requires the Auth Role to be enabled.
	 *
	 * @param string $TargetUser Selected account username
	 * @param \Comet\UserProfileConfig $ProfileData Modified user profile
	 * @param string $RequireHash Previous hash parameter
	 * @return \Comet\APIResponseMessage 
	 * @throws \Exception
	 */
	public function AdminSetUserProfileHash($TargetUser, UserProfileConfig $ProfileData, $RequireHash)
	{
		$nr = new \Comet\AdminSetUserProfileHashRequest($TargetUser, $ProfileData, $RequireHash);
		$response = $this->client->send($this->AsPSR7($nr));
		return \Comet\AdminSetUserProfileHashRequest::ProcessResponse($response->getStatusCode(), (string)$response->getBody());
	}

	/** 
	 * Retrieve properties for a single bucket
	 * This API can also be used to refresh the size measurement for a single bucket by passing a valid AfterTimestamp parameter.
	 * 
	 * You must supply administrator authentication credentials to use this API.
	 * This API requires the Storage Role to be enabled.
	 *
	 * @param string $BucketID Bucket ID
	 * @param int $AfterTimestamp Allow a stale size measurement if it is at least as new as the supplied Unix timestamp. Timestamps in the future may produce a result clamped down to the Comet Server's current time. If not present, the size measurement may be arbitrarily stale. (optional)
	 * @return \Comet\BucketProperties 
	 * @throws \Exception
	 */
	public function AdminStorageBucketProperties($BucketID, $AfterTimestamp = null)
	{
		$nr = new \Comet\AdminStorageBucketPropertiesRequest($BucketID, $AfterTimestamp);
		$response = $this->client->send($this->AsPSR7($nr));
		return \Comet\AdminStorageBucketPropertiesRequest::ProcessResponse($response->getStatusCode(), (string)$response->getBody());
	}

	/** 
	 * Delete a bucket
	 * All data will be removed from the server. Misuse can cause data loss!
	 * 
	 * You must supply administrator authentication credentials to use this API.
	 * This API requires the Storage Role to be enabled.
	 *
	 * @param string $BucketID Selected bucket name
	 * @return \Comet\APIResponseMessage 
	 * @throws \Exception
	 */
	public function AdminStorageDeleteBucket($BucketID)
	{
		$nr = new \Comet\AdminStorageDeleteBucketRequest($BucketID);
		$response = $this->client->send($this->AsPSR7($nr));
		return \Comet\AdminStorageDeleteBucketRequest::ProcessResponse($response->getStatusCode(), (string)$response->getBody());
	}

	/** 
	 * Retrieve available space metrics
	 * 
	 * You must supply administrator authentication credentials to use this API.
	 * Access to this API may be prevented on a per-administrator basis.
	 * This API requires the Storage Role to be enabled.
	 * This API is only available for administrator accounts in the top-level Organization, not in any other Organization.
	 *
	 * @param string $BucketID (This parameter is not used) (optional)
	 * @return \Comet\StorageFreeSpaceInfo 
	 * @throws \Exception
	 */
	public function AdminStorageFreeSpace($BucketID = null)
	{
		$nr = new \Comet\AdminStorageFreeSpaceRequest($BucketID);
		$response = $this->client->send($this->AsPSR7($nr));
		return \Comet\AdminStorageFreeSpaceRequest::ProcessResponse($response->getStatusCode(), (string)$response->getBody());
	}

	/** 
	 * List all buckets
	 * 
	 * You must supply administrator authentication credentials to use this API.
	 * This API requires the Storage Role to be enabled.
	 *
	 * @return \Comet\BucketProperties[] An array with string keys. 
	 * @throws \Exception
	 */
	public function AdminStorageListBuckets()
	{
		$nr = new \Comet\AdminStorageListBucketsRequest();
		$response = $this->client->send($this->AsPSR7($nr));
		return \Comet\AdminStorageListBucketsRequest::ProcessResponse($response->getStatusCode(), (string)$response->getBody());
	}

	/** 
	 * Create a new bucket
	 * Leave the Set* parameters blank to generate a bucket with random credentials, or, supply a pre-hashed password for zero-knowledge operations.
	 * Any auto-generated credentials are returned in the response message.
	 * 
	 * You must supply administrator authentication credentials to use this API.
	 * This API requires the Storage Role to be enabled.
	 *
	 * @param string $SetBucketValue Bucket ID (optional)
	 * @param string $SetKeyHashFormat Bucket key hashing format (optional)
	 * @param string $SetKeyHashValue Bucket key hash (optional)
	 * @param string $SetOrganizationID Target organization ID (>= 20.9.0) (optional)
	 * @return \Comet\AddBucketResponseMessage 
	 * @throws \Exception
	 */
	public function AdminStorageRegisterBucket($SetBucketValue = null, $SetKeyHashFormat = null, $SetKeyHashValue = null, $SetOrganizationID = null)
	{
		$nr = new \Comet\AdminStorageRegisterBucketRequest($SetBucketValue, $SetKeyHashFormat, $SetKeyHashValue, $SetOrganizationID);
		$response = $this->client->send($this->AsPSR7($nr));
		return \Comet\AdminStorageRegisterBucketRequest::ProcessResponse($response->getStatusCode(), (string)$response->getBody());
	}

	/** 
	 * Start a new software update campaign
	 * 
	 * You must supply administrator authentication credentials to use this API.
	 * This API is only available for administrator accounts in the top-level Organization, not in any other Organization.
	 * This API requires the Software Build Role to be enabled.
	 * This API requires the Auth Role to be enabled.
	 *
	 * @param \Comet\UpdateCampaignOptions $Options Configure targets for the software update campaign
	 * @return \Comet\APIResponseMessage 
	 * @throws \Exception
	 */
	public function AdminUpdateCampaignStart(UpdateCampaignOptions $Options)
	{
		$nr = new \Comet\AdminUpdateCampaignStartRequest($Options);
		$response = $this->client->send($this->AsPSR7($nr));
		return \Comet\AdminUpdateCampaignStartRequest::ProcessResponse($response->getStatusCode(), (string)$response->getBody());
	}

	/** 
	 * Get current campaign status
	 * 
	 * You must supply administrator authentication credentials to use this API.
	 * This API is only available for administrator accounts in the top-level Organization, not in any other Organization.
	 * This API requires the Software Build Role to be enabled.
	 * This API requires the Auth Role to be enabled.
	 *
	 * @return \Comet\UpdateCampaignStatus 
	 * @throws \Exception
	 */
	public function AdminUpdateCampaignStatus()
	{
		$nr = new \Comet\AdminUpdateCampaignStatusRequest();
		$response = $this->client->send($this->AsPSR7($nr));
		return \Comet\AdminUpdateCampaignStatusRequest::ProcessResponse($response->getStatusCode(), (string)$response->getBody());
	}

	/** 
	 * Retreve basic information about this Comet Server
	 *
	 * @return \Comet\ServerMetaBrandingProperties 
	 * @throws \Exception
	 */
	public function BrandingProps()
	{
		$nr = new \Comet\BrandingPropsRequest();
		$response = $this->client->send($this->AsPSR7($nr));
		return \Comet\BrandingPropsRequest::ProcessResponse($response->getStatusCode(), (string)$response->getBody());
	}

	/** 
	 * Generate a session key (log in)
	 * This hybrid API allows you to log in to the Comet Server as either an administrator or end-user account.
	 * This API behaves like either AdminAccountSessionStart or UserWebSessionStart, depending on what the supplied credentials were valid for.
	 *
	 * @return \Comet\SessionKeyRegeneratedResponse 
	 * @throws \Exception
	 */
	public function HybridSessionStart()
	{
		$nr = new \Comet\HybridSessionStartRequest();
		$response = $this->client->send($this->AsPSR7($nr));
		return \Comet\HybridSessionStartRequest::ProcessResponse($response->getStatusCode(), (string)$response->getBody());
	}

	/** 
	 * Revoke a session key (log out)
	 * 
	 * You must supply user authentication credentials to use this API, and the user account must be authorized for web access.
	 * This API requires the Auth Role to be enabled.
	 *
	 * @return \Comet\APIResponseMessage 
	 * @throws \Exception
	 */
	public function UserWebSessionRevoke()
	{
		$nr = new \Comet\UserWebSessionRevokeRequest();
		$response = $this->client->send($this->AsPSR7($nr));
		return \Comet\UserWebSessionRevokeRequest::ProcessResponse($response->getStatusCode(), (string)$response->getBody());
	}

	/** 
	 * Generate a session key (log in)
	 * 
	 * You must supply user authentication credentials to use this API, and the user account must be authorized for web access.
	 * This API requires the Auth Role to be enabled.
	 *
	 * @return \Comet\SessionKeyRegeneratedResponse 
	 * @throws \Exception
	 */
	public function UserWebSessionStart()
	{
		$nr = new \Comet\UserWebSessionStartRequest();
		$response = $this->client->send($this->AsPSR7($nr));
		return \Comet\UserWebSessionStartRequest::ProcessResponse($response->getStatusCode(), (string)$response->getBody());
	}

	/**
	 * Get a PSR-7 request object for a \Comet\NetworkRequest.
	 *
	 * @param NetworkRequest $nr
	 * @return \Psr\Http\Message\RequestInterface
	 */
	public function AsPSR7(NetworkRequest $nr) {
		$params = $nr->Parameters();
		
		$contentType = $nr->ContentType();
		
		$headers = [];
		if ($this->language !== null) {
			$headers['Accept-Language'] = str_replace('_', '-', $this->language).';q=0.9, en;q=0.8, *;q=0.5';
		}

		$body = '';

		if ($contentType === 'application/x-www-form-urlencoded') {
			
			// Authentication parameters go in the body
			$params['Username'] = $this->username;
			$params['AuthType'] = 'Password';
			$params['Password'] = $this->password;
			if (strlen($this->TOTPCode) > 0) {
				$params['AuthType'] = 'PasswordTOTP';
				$params['TOTP']     = $this->TOTPCode;
			}

			$headers['Content-Type'] = $contentType;
			$body = http_build_query($params);

		} else if ($contentType === 'multipart/form-data') {
			
			// Authentication parameters go in the headers
			$headers['X-Comet-Admin-Username'] = $this->username;
			$headers['X-Comet-Admin-AuthType'] = 'Password';
			$headers['X-Comet-Admin-Password'] = $this->password;
			if (strlen($this->TOTPCode) > 0) {
				$headers['X-Comet-Admin-AuthType'] = 'PasswordTOTP';
				$headers['X-Comet-Admin-TOTP']     = $this->TOTPCode;
			}

			$boundary = '-------------' . uniqid();
			$headers['Content-Type'] = $contentType.'; boundary='.$boundary;
			$body = self::http_build_query_multipart($params, $boundary);

		} else {
			throw new \Exception("Unexpected ContentType '{$contentType}'");

		}

		$headers['Content-Length'] = strlen($body);

		return new \GuzzleHttp\Psr7\Request(
			$nr->Method(),
			$this->server_url . ltrim($nr->Endpoint(), '/'),
			$headers,
			$body			
		);
	}

	/**
	 * http_build_query_multipart is a version of \http_build_query() that produces a
	 * multipart/form-data POST body instead of an application/x-www-form-urlencoded one.
	 * 
	 * @param array $params POST parameters
	 * @param string $boundary Boundary with leading hyphens
	 * @return string POST body
	 */ 
	protected static function http_build_query_multipart(array $params, $boundary) {
		$ret = '';

		foreach($params as $k => $v) {
			$ret .= "--{$boundary}\r\n";
			$ret .= "Content-Disposition: form-data; name=\"{$k}\"; filename=\"{$k}\"\r\n\r\n";
			$ret .= $v . "\r\n";
		}

		$ret .= "--{$boundary}--\r\n";

		return $ret;
	}

}
