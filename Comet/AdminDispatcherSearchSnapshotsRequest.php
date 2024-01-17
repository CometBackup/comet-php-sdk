<?php

/**
 * Copyright (c) 2018-2024 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 *
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

/**
 * Comet Server AdminDispatcherSearchSnapshots API
 * Search storage vault snapshots
 *
 * You must supply administrator authentication credentials to use this API.
 * This API requires the Auth Role to be enabled.
 */
class AdminDispatcherSearchSnapshotsRequest implements \Comet\NetworkRequest {

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
	 * Snapshots to search
	 *
	 * @var string[]
	 */
	protected $SnapshotIDs = null;

	/**
	 * The search filter
	 *
	 * @var \Comet\SearchClause
	 */
	protected $Filter = null;

	/**
	 * Construct a new AdminDispatcherSearchSnapshotsRequest instance.
	 *
	 * @param string $TargetID The live connection GUID
	 * @param string $DestinationID The Storage Vault GUID
	 * @param string[] $SnapshotIDs Snapshots to search
	 * @param \Comet\SearchClause $Filter The search filter
	 */
	public function __construct(string $TargetID, string $DestinationID, array $SnapshotIDs, \Comet\SearchClause $Filter)
	{
		$this->TargetID = $TargetID;
		$this->DestinationID = $DestinationID;
		$this->SnapshotIDs = $SnapshotIDs;
		$this->Filter = $Filter;
	}

	/**
	 * Get the URL where this POST request should be submitted to.
	 *
	 * @return string
	 */
	public function Endpoint(): string
	{
		return '/api/v1/admin/dispatcher/search-snapshots';
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
		$ret["DestinationID"] = (string)($this->DestinationID);
		{
			$c0 = [];
			for($i0 = 0; $i0 < count($this->SnapshotIDs); ++$i0) {
				$val0 = $this->SnapshotIDs[$i0];

				$c0[] = $val0;
			}
			$ret["SnapshotIDs"] = json_encode($c0);
		}

		$ret["Filter"] = $this->Filter->toJSON();
		return $ret;
	}

	/**
	 * Decode types used in a response to this request.
	 * Use any network library to make the request.
	 *
	 * @param int $responseCode HTTP response code
	 * @param string $body HTTP response body
	 * @return \Comet\SearchSnapshotsResponse
	 * @throws \Exception
	 */
	public static function ProcessResponse(int $responseCode, string $body): \Comet\SearchSnapshotsResponse
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

		// Parse as SearchSnapshotsResponse
		if (is_array($decoded) && count($decoded) === 0) {
		// Work around edge case in json_decode--json_encode stdClass conversion
			$ret = \Comet\SearchSnapshotsResponse::createFromStdclass(new \stdClass());
		} else {
			$ret = \Comet\SearchSnapshotsResponse::createFromStdclass($decoded);
		}

		return $ret;
	}

}

