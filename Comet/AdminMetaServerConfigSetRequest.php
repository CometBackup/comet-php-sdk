<?php

/**
 * Copyright (c) 2018-2026 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 *
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

/**
 * Comet Server AdminMetaServerConfigSet API
 * Set server configuration
 * The Comet Server process will exit. The service manager should restart the server automatically.
 *
 * Prior to 18.9.2, this API terminated the server immediately without returning a response. In 18.9.2 and later, it returns a successful response before shutting down.
 *
 * You must supply administrator authentication credentials to use this API.
 * Access to this API may be prevented on a per-administrator basis.
 * This API does not accept admin personal API token authentication (AuthType=Token, or the token supplied as the password with AuthType=Password).
 * This API is only available for top-level administrator accounts, not for Tenant administrator accounts.
 */
class AdminMetaServerConfigSetRequest implements \Comet\NetworkRequest {

	/**
	 * Updated configuration content (>= 17.3.8)
	 *
	 * @var \Comet\ServerConfigOptions
	 */
	protected $Config = null;

	/**
	 * If present, the change is only applied if the server configuration is unchanged since this hash was retrieved from the AdminMetaServerConfigGetAndHash API. Otherwise, the change is rejected with status 409 and the server does not restart. (>= 26.10.2) (optional)
	 *
	 * @var string|null
	 */
	protected $RequireHash = null;

	/**
	 * Construct a new AdminMetaServerConfigSetRequest instance.
	 *
	 * @param \Comet\ServerConfigOptions $Config Updated configuration content (>= 17.3.8)
	 * @param string $RequireHash If present, the change is only applied if the server configuration is unchanged since this hash was retrieved from the AdminMetaServerConfigGetAndHash API. Otherwise, the change is rejected with status 409 and the server does not restart. (>= 26.10.2) (optional)
	 */
	public function __construct(\Comet\ServerConfigOptions $Config, string $RequireHash = null)
	{
		$this->Config = $Config;
		$this->RequireHash = $RequireHash;
	}

	/**
	 * Get the URL where this POST request should be submitted to.
	 *
	 * @return string
	 */
	public function Endpoint(): string
	{
		return '/api/v1/admin/meta/server-config/set';
	}

	public function Method(): string
	{
		return 'POST';
	}

	public function ContentType(): string
	{
		return 'application/x-www-form-urlencoded';
	}

	/**
	 * Get the POST parameters for this request.
	 *
	 * @return string[]
	 */
	public function Parameters(): array
	{
		$ret = [];
		$ret["Config"] = $this->Config->toJSON();
		if ($this->RequireHash !== null) {
			$ret["RequireHash"] = (string)($this->RequireHash);
		}
		return $ret;
	}

	/**
	 * Decode types used in a response to this request.
	 * Use any network library to make the request.
	 *
	 * @param int $responseCode HTTP response code
	 * @param string $body HTTP response body
	 * @return \Comet\APIResponseMessage
	 * @throws \Exception
	 */
	public static function ProcessResponse(int $responseCode, string $body): \Comet\APIResponseMessage
	{
		// Require expected HTTP 200 response
		if ($responseCode !== 200) {
			throw new \Exception("Unexpected HTTP " . intval($responseCode) . " response", $responseCode);
		}

		// Decode JSON
		$decoded = \json_decode($body); // as stdClass
		if (\json_last_error() != \JSON_ERROR_NONE) {
			throw new \Exception("JSON decode failed: " . \json_last_error_msg(), \json_last_error());
		}

		// Try to parse as error format
		$isCARMDerivedType = (($decoded instanceof \stdClass) && property_exists($decoded, 'Status') && property_exists($decoded, 'Message'));
		if ($isCARMDerivedType) {
			$carm = \Comet\APIResponseMessage::createFromStdclass($decoded);
			if ($carm->Status < 200 || $carm->Status > 299) {
				throw new \Exception("Error " . $carm->Status . ": " . $carm->Message, $carm->Status);
			}
		}

		// Parse as CometAPIResponseMessage
		if (is_array($decoded) && count($decoded) === 0) {
		// Work around edge case in json_decode--json_encode stdClass conversion
			$ret = \Comet\APIResponseMessage::createFromStdclass(new \stdClass());
		} else {
			$ret = \Comet\APIResponseMessage::createFromStdclass($decoded);
		}

		return $ret;
	}

}

