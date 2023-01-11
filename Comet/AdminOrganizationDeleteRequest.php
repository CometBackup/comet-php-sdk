<?php

/**
 * Copyright (c) 2018-2023 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 *
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

/**
 * Comet Server AdminOrganizationDelete API
 * Delete an organization and all related users
 *
 * Prior to Comet 22.6.0, this API was documented as returning the OrganizationResponse type. However, it always has returned only a CometAPIResponseMessage.
 *
 * You must supply administrator authentication credentials to use this API.
 * This API is only available for administrator accounts in the top-level Organization, not in any other Organization.
 */
class AdminOrganizationDeleteRequest implements \Comet\NetworkRequest {

	/**
	 * (No description available) (optional)
	 *
	 * @var string|null
	 */
	protected $OrganizationID = null;

	/**
	 * Uninstall software configuration (optional)
	 *
	 * @var \Comet\UninstallConfig|null
	 */
	protected $UninstallConfig = null;

	/**
	 * Construct a new AdminOrganizationDeleteRequest instance.
	 *
	 * @param string $OrganizationID (No description available) (optional)
	 * @param \Comet\UninstallConfig $UninstallConfig Uninstall software configuration (optional)
	 */
	public function __construct(string $OrganizationID = null, \Comet\UninstallConfig $UninstallConfig = null)
	{
		$this->OrganizationID = $OrganizationID;
		$this->UninstallConfig = $UninstallConfig;
	}

	/**
	 * Get the URL where this POST request should be submitted to.
	 *
	 * @return string
	 */
	public function Endpoint(): string
	{
		return '/api/v1/admin/organization/delete';
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
		if ($this->OrganizationID !== null) {
			$ret["OrganizationID"] = (string)($this->OrganizationID);
		}
		if ($this->UninstallConfig !== null) {
			$ret["UninstallConfig"] = $this->UninstallConfig->toJSON();
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
			if ($carm->Status >= 400) {
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

