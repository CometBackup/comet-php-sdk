<?php

/**
 * Copyright (c) 2018-2025 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 *
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

/**
 * Comet Server AdminDispatcherRequestBrowseProxmox API
 * Request a list of Proxmox virtual machines and containers
 *
 * You must supply administrator authentication credentials to use this API.
 * This API requires the Auth Role to be enabled.
 */
class AdminDispatcherRequestBrowseProxmoxRequest implements \Comet\NetworkRequest {

	/**
	 * The live connection GUID
	 *
	 * @var string
	 */
	protected $TargetID = null;

	/**
	 * The Proxmox connection settings
	 *
	 * @var \Comet\ProxmoxConnection
	 */
	protected $Credentials = null;

	/**
	 * Construct a new AdminDispatcherRequestBrowseProxmoxRequest instance.
	 *
	 * @param string $TargetID The live connection GUID
	 * @param \Comet\ProxmoxConnection $Credentials The Proxmox connection settings
	 */
	public function __construct(string $TargetID, \Comet\ProxmoxConnection $Credentials)
	{
		$this->TargetID = $TargetID;
		$this->Credentials = $Credentials;
	}

	/**
	 * Get the URL where this POST request should be submitted to.
	 *
	 * @return string
	 */
	public function Endpoint(): string
	{
		return '/api/v1/admin/dispatcher/request-browse-proxmox';
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
		$ret["TargetID"] = (string)($this->TargetID);
		$ret["Credentials"] = $this->Credentials->toJSON();
		return $ret;
	}

	/**
	 * Decode types used in a response to this request.
	 * Use any network library to make the request.
	 *
	 * @param int $responseCode HTTP response code
	 * @param string $body HTTP response body
	 * @return \Comet\BrowseProxmoxResponse
	 * @throws \Exception
	 */
	public static function ProcessResponse(int $responseCode, string $body): \Comet\BrowseProxmoxResponse
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
			if ($carm->Status >= 400) {
				throw new \Exception("Error " . $carm->Status . ": " . $carm->Message, $carm->Status);
			}
		}

		// Parse as BrowseProxmoxResponse
		if (is_array($decoded) && count($decoded) === 0) {
		// Work around edge case in json_decode--json_encode stdClass conversion
			$ret = \Comet\BrowseProxmoxResponse::createFromStdclass(new \stdClass());
		} else {
			$ret = \Comet\BrowseProxmoxResponse::createFromStdclass($decoded);
		}

		return $ret;
	}

}

