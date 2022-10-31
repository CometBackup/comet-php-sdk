<?php

/**
 * Copyright (c) 2018-2022 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 *
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

/**
 * Comet Server AdminOrganizationSet API
 * Create or Update an Organization
 *
 * Prior to Comet 22.6.0, the 'ID' and 'Organization' fields were not present in the response.
 *
 * You must supply administrator authentication credentials to use this API.
 * This API is only available for administrator accounts in the top-level Organization, not in any other Organization.
 */
class AdminOrganizationSetRequest implements \Comet\NetworkRequest {

	/**
	 * (No description available) (optional)
	 *
	 * @var string|null
	 */
	protected $OrganizationID = null;

	/**
	 * (No description available) (optional)
	 *
	 * @var \Comet\Organization|null
	 */
	protected $Organization = null;

	/**
	 * Construct a new AdminOrganizationSetRequest instance.
	 *
	 * @param string $OrganizationID (No description available) (optional)
	 * @param \Comet\Organization $Organization (No description available) (optional)
	 */
	public function __construct(string $OrganizationID = null, \Comet\Organization $Organization = null)
	{
		$this->OrganizationID = $OrganizationID;
		$this->Organization = $Organization;
	}

	/**
	 * Get the URL where this POST request should be submitted to.
	 *
	 * @return string
	 */
	public function Endpoint(): string
	{
		return '/api/v1/admin/organization/set';
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
		if ($this->Organization !== null) {
			$ret["Organization"] = $this->Organization->toJSON();
		}
		return $ret;
	}

	/**
	 * Decode types used in a response to this request.
	 * Use any network library to make the request.
	 *
	 * @param int $responseCode HTTP response code
	 * @param string $body HTTP response body
	 * @return \Comet\OrganizationResponse
	 * @throws \Exception
	 */
	public static function ProcessResponse(int $responseCode, string $body): \Comet\OrganizationResponse
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

		// Parse as OrganizationResponse
		if (is_array($decoded) && count($decoded) === 0) {
		// Work around edge case in json_decode--json_encode stdClass conversion
			$ret = \Comet\OrganizationResponse::createFromStdclass(new \stdClass());
		} else {
			$ret = \Comet\OrganizationResponse::createFromStdclass($decoded);
		}

		return $ret;
	}

}

