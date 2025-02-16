<?php

/**
 * Copyright (c) 2018-2025 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 *
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

/**
 * Comet Server AdminDispatcherRequestBrowseVmwareHosts API
 * Request a list of VMware vSphere Hosts on a VMware vSphere connection, for a specified VMware Datacenter
 * The remote device must have given consent for an MSP to browse their files.
 *
 * You must supply administrator authentication credentials to use this API.
 * This API requires the Auth Role to be enabled.
 */
class AdminDispatcherRequestBrowseVmwareHostsRequest implements \Comet\NetworkRequest {

	/**
	 * The live connection GUID
	 *
	 * @var string
	 */
	protected $TargetID = null;

	/**
	 * The VMware vSphere connection settings
	 *
	 * @var \Comet\VMwareConnection
	 */
	protected $Credentials = null;

	/**
	 * The name of the target VMware Datacenter
	 *
	 * @var string
	 */
	protected $Filter = null;

	/**
	 * Construct a new AdminDispatcherRequestBrowseVmwareHostsRequest instance.
	 *
	 * @param string $TargetID The live connection GUID
	 * @param \Comet\VMwareConnection $Credentials The VMware vSphere connection settings
	 * @param string $Filter The name of the target VMware Datacenter
	 */
	public function __construct(string $TargetID, \Comet\VMwareConnection $Credentials, string $Filter)
	{
		$this->TargetID = $TargetID;
		$this->Credentials = $Credentials;
		$this->Filter = $Filter;
	}

	/**
	 * Get the URL where this POST request should be submitted to.
	 *
	 * @return string
	 */
	public function Endpoint(): string
	{
		return '/api/v1/admin/dispatcher/request-browse-vmware/hosts';
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
		$ret["Filter"] = (string)($this->Filter);
		return $ret;
	}

	/**
	 * Decode types used in a response to this request.
	 * Use any network library to make the request.
	 *
	 * @param int $responseCode HTTP response code
	 * @param string $body HTTP response body
	 * @return \Comet\BrowseVMwareHostsResponse
	 * @throws \Exception
	 */
	public static function ProcessResponse(int $responseCode, string $body): \Comet\BrowseVMwareHostsResponse
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

		// Parse as BrowseVMwareHostsResponse
		if (is_array($decoded) && count($decoded) === 0) {
		// Work around edge case in json_decode--json_encode stdClass conversion
			$ret = \Comet\BrowseVMwareHostsResponse::createFromStdclass(new \stdClass());
		} else {
			$ret = \Comet\BrowseVMwareHostsResponse::createFromStdclass($decoded);
		}

		return $ret;
	}

}

