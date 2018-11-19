<?php

/**
 * Copyright (c) 2018 Comet Licensing Ltd.
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
	 * The GuzzleHttp client used to make synchronous network requests
	 *
	 * @var \GuzzleHttp\Client
	 */
	protected $client = null;

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
			'defaults' => [
				'headers' => [
					'User-Agent' => 'comet-php-sdk/1.x',
				],
				'allow_redirects' => false,
			],
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
	 * Add a new user account
	 * 
	 * You must supply administrator authentication credentials to use this API.
	 * This API requires the Auth Role to be enabled.
	 *
	 * @param string $TargetUser New account username
	 * @param string $TargetPassword New account password
	 * @param int $StoreRecoveryCode If set to 1, store and keep a password recovery code for the generated user (>= 18.3.9) (optional)
	 * @return \Comet\APIResponseMessage 
	 * @throws \Exception
	 */
	public function AdminAddUser($TargetUser, $TargetPassword, $StoreRecoveryCode = null)
	{
		$nr = new \Comet\AdminAddUserRequest($TargetUser, $TargetPassword, $StoreRecoveryCode);
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
	 * Delete user account
	 * This does not remove any storage buckets. Unused storage buckets will be cleaned up by the Constellation Role.
	 * Any stored data can not be decrypted without the user profile. Misuse can cause data loss!
	 * 
	 * You must supply administrator authentication credentials to use this API.
	 * This API requires the Auth Role to be enabled.
	 *
	 * @param string $TargetUser Selected account username
	 * @return \Comet\APIResponseMessage 
	 * @throws \Exception
	 */
	public function AdminDeleteUser($TargetUser)
	{
		$nr = new \Comet\AdminDeleteUserRequest($TargetUser);
		$response = $this->client->send($this->AsPSR7($nr));
		return \Comet\AdminDeleteUserRequest::ProcessResponse($response->getStatusCode(), (string)$response->getBody());
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
	 * @return \Comet\APIResponseMessage 
	 * @throws \Exception
	 */
	public function AdminDispatcherRunBackupCustom($TargetID, $Source, $Destination)
	{
		$nr = new \Comet\AdminDispatcherRunBackupCustomRequest($TargetID, $Source, $Destination);
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
	 * @return \Comet\APIResponseMessage 
	 * @throws \Exception
	 */
	public function AdminDispatcherRunRestore($TargetID, $Path, $Source, $Destination, $Snapshot = null)
	{
		$nr = new \Comet\AdminDispatcherRunRestoreRequest($TargetID, $Path, $Source, $Destination, $Snapshot);
		$response = $this->client->send($this->AsPSR7($nr));
		return \Comet\AdminDispatcherRunRestoreRequest::ProcessResponse($response->getStatusCode(), (string)$response->getBody());
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
	 * Instruct a live connected device to download a software update
	 * 
	 * You must supply administrator authentication credentials to use this API.
	 * This API requires the Auth Role to be enabled.
	 * This API requires the Software Build Role to be enabled.
	 *
	 * @param string $TargetID The live connection GUID
	 * @return \Comet\APIResponseMessage 
	 * @throws \Exception
	 */
	public function AdminDispatcherUpdateSoftware($TargetID)
	{
		$nr = new \Comet\AdminDispatcherUpdateSoftwareRequest($TargetID);
		$response = $this->client->send($this->AsPSR7($nr));
		return \Comet\AdminDispatcherUpdateSoftwareRequest::ProcessResponse($response->getStatusCode(), (string)$response->getBody());
	}

	/** 
	 * Get the report log entries for a single job
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
	 * Get log files
	 * 
	 * You must supply administrator authentication credentials to use this API.
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
	 * The lifespan of an uploaded resource is undefined. Resources may be deleted automatically, but it should remain available until the next call to AdminMetaServerconfigSet, and will remain available for as long as it is referenced by the server configuration.
	 * 
	 * You must supply administrator authentication credentials to use this API.
	 *
	 * @return \Comet\AdminResourceResponse 
	 * @throws \Exception
	 */
	public function AdminMetaResourceNew()
	{
		throw new Exception("This API is not currently representable by the Comet Server SDK");
	}

	/** 
	 * Restart server
	 * The Comet Server process will exit. The service manager should restart the server automatically.
	 * 
	 * Prior to 18.9.2, this API terminated the server immediately without returning a response. In 18.9.2 and later, it returns a successful response before shutting down.
	 * 
	 * You must supply administrator authentication credentials to use this API.
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
	 * Get server configuration
	 * 
	 * You must supply administrator authentication credentials to use this API.
	 * Access to this API may be prevented on a per-administrator basis.
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
	 * Set server configuration
	 * The Comet Server process will exit. The service manager should restart the server automatically.
	 * 
	 * Prior to 18.9.2, this API terminated the server immediately without returning a response. In 18.9.2 and later, it returns a successful response before shutting down.
	 * 
	 * You must supply administrator authentication credentials to use this API.
	 * Access to this API may be prevented on a per-administrator basis.
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
	 * Remove news entry
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
	 * Submit news entry
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
	 * Get Replication status
	 * 
	 * You must supply administrator authentication credentials to use this API.
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
	 * 
	 * You must supply administrator authentication credentials to use this API.
	 * This API requires the Auth Role to be enabled.
	 *
	 * @param string $TargetUser The user to recieve the new Storage Vault
	 * @param string $StorageProvider ID for the Requestable destination
	 * @param string $SelfAddress The external URL for this server. Used to resolve conflicts (optional)
	 * @return \Comet\APIResponseMessage 
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
	 * @return \Comet\APIResponseMessage 
	 * @throws \Exception
	 */
	public function AdminResetUserPassword($TargetUser, $NewPassword)
	{
		$nr = new \Comet\AdminResetUserPasswordRequest($TargetUser, $NewPassword);
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
	 * @param string $SetBucketValue Bucket name (optional)
	 * @param string $SetKeyHashFormat Bucket key hashing format (optional)
	 * @param string $SetKeyHashValue Bucket key hash (optional)
	 * @return \Comet\AddBucketResponseMessage 
	 * @throws \Exception
	 */
	public function AdminStorageRegisterBucket($SetBucketValue = null, $SetKeyHashFormat = null, $SetKeyHashValue = null)
	{
		$nr = new \Comet\AdminStorageRegisterBucketRequest($SetBucketValue, $SetKeyHashFormat, $SetKeyHashValue);
		$response = $this->client->send($this->AsPSR7($nr));
		return \Comet\AdminStorageRegisterBucketRequest::ProcessResponse($response->getStatusCode(), (string)$response->getBody());
	}

	/** 
	 * Start a new software update campaign
	 * 
	 * You must supply administrator authentication credentials to use this API.
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
	 * Get a PSR-7 request object for a \Comet\NetworkRequest.
	 *
	 * @param NetworkRequest $nr
	 * @return \Psr\Http\Message\RequestInterface
	 */
	public function AsPSR7(NetworkRequest $nr) {

		$params = $nr->Parameters();
		$params['Username'] = $this->username;
		$params['AuthType'] = 'Password';
		$params['Password'] = $this->password;

		return new \GuzzleHttp\Psr7\Request(
			'POST',
			$this->server_url . ltrim($nr->Endpoint(), '/'),
			[
				'Content-Type' => 'application/x-www-form-urlencoded',
			],
			http_build_query($params)
		);
	}

}
