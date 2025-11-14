<?php

/**
 * Copyright (c) 2018-2025 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 *
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

/**
 * Comet Server AdminDispatcherRunRestore API
 * Instruct a live connected device to perform a local restore
 * This command is understood by Comet Backup 17.9.3 and newer.
 *
 * You must supply administrator authentication credentials to use this API.
 * This API requires the Auth Role to be enabled.
 */
class AdminDispatcherRunRestoreRequest implements \Comet\NetworkRequest {

	/**
	 * The live connection GUID
	 *
	 * @var string
	 */
	protected $TargetID = null;

	/**
	 * The local path to restore to
	 *
	 * @var string
	 */
	protected $Path = null;

	/**
	 * The Protected Item ID
	 *
	 * @var string
	 */
	protected $Source = null;

	/**
	 * The Storage Vault ID
	 *
	 * @var string
	 */
	protected $Destination = null;

	/**
	 * If present, restore a specific snapshot. Otherwise, restore the latest snapshot for the selected Protected Item + Storage Vault pair (optional)
	 *
	 * @var string|null
	 */
	protected $Snapshot = null;

	/**
	 * If present, restore these paths only. Otherwise, restore all data (>= 19.3.0) (optional)
	 *
	 * @var string[]|null
	 */
	protected $Paths = null;

	/**
	 * Construct a new AdminDispatcherRunRestoreRequest instance.
	 *
	 * @param string $TargetID The live connection GUID
	 * @param string $Path The local path to restore to
	 * @param string $Source The Protected Item ID
	 * @param string $Destination The Storage Vault ID
	 * @param string $Snapshot If present, restore a specific snapshot. Otherwise, restore the latest snapshot for the selected Protected Item + Storage Vault pair (optional)
	 * @param string[] $Paths If present, restore these paths only. Otherwise, restore all data (>= 19.3.0) (optional)
	 */
	public function __construct(string $TargetID, string $Path, string $Source, string $Destination, string $Snapshot = null, array $Paths = null)
	{
		$this->TargetID = $TargetID;
		$this->Path = $Path;
		$this->Source = $Source;
		$this->Destination = $Destination;
		$this->Snapshot = $Snapshot;
		$this->Paths = $Paths;
	}

	/**
	 * Get the URL where this POST request should be submitted to.
	 *
	 * @return string
	 */
	public function Endpoint(): string
	{
		return '/api/v1/admin/dispatcher/run-restore';
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
		$ret["Path"] = (string)($this->Path);
		$ret["Source"] = (string)($this->Source);
		$ret["Destination"] = (string)($this->Destination);
		if ($this->Snapshot !== null) {
			$ret["Snapshot"] = (string)($this->Snapshot);
		}
		if ($this->Paths !== null) {
			{
				$c0 = [];
				for($i0 = 0; $i0 < count($this->Paths); ++$i0) {
					$val0 = $this->Paths[$i0];

					$c0[] = $val0;
				}
				$ret["Paths"] = json_encode($c0);
			}

		}
		return $ret;
	}

	/**
	 * Decode types used in a response to this request.
	 * Use any network library to make the request.
	 *
	 * @param int $responseCode HTTP response code
	 * @param string $body HTTP response body
	 * @return \Comet\DispatchWithJobIDResponse
	 * @throws \Exception
	 */
	public static function ProcessResponse(int $responseCode, string $body): \Comet\DispatchWithJobIDResponse
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

		// Parse as DispatchWithJobIDResponse
		if (is_array($decoded) && count($decoded) === 0) {
		// Work around edge case in json_decode--json_encode stdClass conversion
			$ret = \Comet\DispatchWithJobIDResponse::createFromStdclass(new \stdClass());
		} else {
			$ret = \Comet\DispatchWithJobIDResponse::createFromStdclass($decoded);
		}

		return $ret;
	}

}

