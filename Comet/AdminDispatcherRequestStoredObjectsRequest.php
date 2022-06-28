<?php

/**
 * Copyright (c) 2018-2022 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 *
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

/**
 * Comet Server AdminDispatcherRequestStoredObjects API
 * Request a list of stored objects inside an existing backup job
 * The remote device must have given consent for an MSP to browse their files.
 * To service this request, the remote device must connect to the Storage Vault and load index data. There may be a small delay. If the remote device is running Comet 20.12.0 or later, the necessary index data is cached when this API is first called, for 15 minutes after the last repeated call. This can improve performance for interactively browsing an entire tree of stored objects.
 *
 * You must supply administrator authentication credentials to use this API.
 * This API requires the Auth Role to be enabled.
 */
class AdminDispatcherRequestStoredObjectsRequest implements \Comet\NetworkRequest {

	/**
	 * The live connection GUID
	 *
	 * @var string
	 */
	protected $TargetID = null;

	/**
	 * The Storage Vault ID
	 *
	 * @var string
	 */
	protected $Destination = null;

	/**
	 * The selected backup job snapshot
	 *
	 * @var string
	 */
	protected $SnapshotID = null;

	/**
	 * Browse objects inside subdirectory of backup snapshot. If it is for VMDK single file restore, it should be the disk image's subtree ID. (optional)
	 *
	 * @var string|null
	 */
	protected $TreeID = null;

	/**
	 * Request a list of stored objects in vmdk file (optional)
	 *
	 * @var \Comet\VMDKSnapshotViewOptions|null
	 */
	protected $Options = null;

	/**
	 * Construct a new AdminDispatcherRequestStoredObjectsRequest instance.
	 *
	 * @param string $TargetID The live connection GUID
	 * @param string $Destination The Storage Vault ID
	 * @param string $SnapshotID The selected backup job snapshot
	 * @param string $TreeID Browse objects inside subdirectory of backup snapshot. If it is for VMDK single file restore, it should be the disk image's subtree ID. (optional)
	 * @param \Comet\VMDKSnapshotViewOptions $Options Request a list of stored objects in vmdk file (optional)
	 */
	public function __construct(string $TargetID, string $Destination, string $SnapshotID, string $TreeID = null, \Comet\VMDKSnapshotViewOptions $Options = null)
	{
		$this->TargetID = $TargetID;
		$this->Destination = $Destination;
		$this->SnapshotID = $SnapshotID;
		$this->TreeID = $TreeID;
		$this->Options = $Options;
	}

	/**
	 * Get the URL where this POST request should be submitted to.
	 *
	 * @return string
	 */
	public function Endpoint(): string
	{
		return '/api/v1/admin/dispatcher/request-stored-objects';
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
		$ret["Destination"] = (string)($this->Destination);
		$ret["SnapshotID"] = (string)($this->SnapshotID);
		if ($this->TreeID !== null) {
			$ret["TreeID"] = (string)($this->TreeID);
		}
		if ($this->Options !== null) {
			$ret["Options"] = $this->Options->toJSON();
		}
		return $ret;
	}

	/**
	 * Decode types used in a response to this request.
	 * Use any network library to make the request.
	 *
	 * @param int $responseCode HTTP response code
	 * @param string $body HTTP response body
	 * @return \Comet\DispatcherStoredObjectsResponse
	 * @throws \Exception
	 */
	public static function ProcessResponse(int $responseCode, string $body): \Comet\DispatcherStoredObjectsResponse
	{
		// Require expected HTTP 200 response
		if ($responseCode !== 200) {
			throw new \Exception("Unexpected HTTP " . intval($responseCode) . " response");
		}

		// Decode JSON
		$decoded = \json_decode($body); // as stdClass
		if (\json_last_error() != \JSON_ERROR_NONE) {
			throw new \Exception("JSON decode failed: " . \json_last_error_msg());
		}

		// Try to parse as error format
		$isCARMDerivedType = (($decoded instanceof \stdClass) && property_exists($decoded, 'Status') && property_exists($decoded, 'Message'));
		if ($isCARMDerivedType) {
			$carm = \Comet\APIResponseMessage::createFromStdclass($decoded);
			if ($carm->Status >= 400) {
				throw new \Exception("Error " . $carm->Status . ": " . $carm->Message);
			}
		}

		// Parse as DispatcherStoredObjectsResponse
		if (is_array($decoded) && count($decoded) === 0) {
		// Work around edge case in json_decode--json_encode stdClass conversion
			$ret = \Comet\DispatcherStoredObjectsResponse::createFromStdclass(new \stdClass());
		} else {
			$ret = \Comet\DispatcherStoredObjectsResponse::createFromStdclass($decoded);
		}

		return $ret;
	}

}

