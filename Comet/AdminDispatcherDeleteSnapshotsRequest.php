<?php

/**
 * Copyright (c) 2018-2022 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 *
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

/**
 * Comet Server AdminDispatcherDeleteSnapshots API
 * Instruct a live connected device to delete multiple stored snapshots
 * The target device must be running Comet 20.9.10 or later.
 *
 * You must supply administrator authentication credentials to use this API.
 * This API requires the Auth Role to be enabled.
 */
class AdminDispatcherDeleteSnapshotsRequest implements \Comet\NetworkRequest {

	/**
	 * The live connection GUID
	 *
	 * @var string
	 */
	protected $TargetID = null;

	/**
	 * The Storage Vault GUID
	 *
	 * @var string
	 */
	protected $DestinationID = null;

	/**
	 * The backup job snapshot IDs to delete
	 *
	 * @var string[]
	 */
	protected $SnapshotIDs = null;

	/**
	 * Construct a new AdminDispatcherDeleteSnapshotsRequest instance.
	 *
	 * @param string $TargetID The live connection GUID
	 * @param string $DestinationID The Storage Vault GUID
	 * @param string[] $SnapshotIDs The backup job snapshot IDs to delete
	 */
	public function __construct($TargetID, $DestinationID, array $SnapshotIDs)
	{
		$this->TargetID = $TargetID;
		$this->DestinationID = $DestinationID;
		$this->SnapshotIDs = $SnapshotIDs;
	}

	/**
	 * Get the URL where this POST request should be submitted to.
	 *
	 * @return string
	 */
	public function Endpoint()
	{
		return '/api/v1/admin/dispatcher/delete-snapshots';
	}

	public function Method()
	{
		return 'POST';
	}

	public function ContentType()
	{
		return 'application/x-www-form-urlencoded';
	}

	/**
	 * Get the POST parameters for this request.
	 *
	 * @return string[]
	 */
	public function Parameters()
	{
		$ret = [];
		$ret["TargetID"] = (string)($this->TargetID);
		$ret["DestinationID"] = (string)($this->DestinationID);
		{
			$c0 = [];
			for($i0 = 0; $i0 < count($this->SnapshotIDs); ++$i0) {
				$val0 = $this->SnapshotIDs[$i0];

				$c0[] = $val0;
			}
			$ret["SnapshotIDs"] = json_encode($c0);
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
	public static function ProcessResponse($responseCode, $body)
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

