<?php

/**
 * Copyright (c) 2018-2025 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 *
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

/**
 * Comet Server AdminDispatcherRunRestoreCustom API
 * Instruct a live connected device to perform a local restore
 * This command is understood by Comet Backup 18.6.0 and newer.
 *
 * You must supply administrator authentication credentials to use this API.
 * This API requires the Auth Role to be enabled.
 */
class AdminDispatcherRunRestoreCustomRequest implements \Comet\NetworkRequest {

	/**
	 * The live connection GUID
	 *
	 * @var string
	 */
	protected $TargetID = null;

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
	 * Restore targets
	 *
	 * @var \Comet\RestoreJobAdvancedOptions
	 */
	protected $Options = null;

	/**
	 * If present, restore a specific snapshot. Otherwise, restore the latest snapshot for the selected Protected Item + Storage Vault pair (optional)
	 *
	 * @var string|null
	 */
	protected $Snapshot = null;

	/**
	 * If present, restore these paths only. Otherwise, restore all data (optional)
	 *
	 * @var string[]|null
	 */
	protected $Paths = null;

	/**
	 * The number of files to restore, if known. Supplying this means we don't need to walk the entire tree just to find the file count and will speed up the restoration process. (optional)
	 *
	 * @var int|null
	 */
	protected $KnownFileCount = null;

	/**
	 * The total size in bytes of files to restore, if known. Supplying this means we don't need to walk the entire tree just to find the total file size and will speed up the restoration process. (optional)
	 *
	 * @var int|null
	 */
	protected $KnownByteCount = null;

	/**
	 * The number of directories to restore, if known. Supplying this means we don't need to walk the entire tree just to find the number of directories and will speed up the restoration process. (optional)
	 *
	 * @var int|null
	 */
	protected $KnownDirCount = null;

	/**
	 * Construct a new AdminDispatcherRunRestoreCustomRequest instance.
	 *
	 * @param string $TargetID The live connection GUID
	 * @param string $Source The Protected Item ID
	 * @param string $Destination The Storage Vault ID
	 * @param \Comet\RestoreJobAdvancedOptions $Options Restore targets
	 * @param string $Snapshot If present, restore a specific snapshot. Otherwise, restore the latest snapshot for the selected Protected Item + Storage Vault pair (optional)
	 * @param string[] $Paths If present, restore these paths only. Otherwise, restore all data (optional)
	 * @param int $KnownFileCount The number of files to restore, if known. Supplying this means we don't need to walk the entire tree just to find the file count and will speed up the restoration process. (optional)
	 * @param int $KnownByteCount The total size in bytes of files to restore, if known. Supplying this means we don't need to walk the entire tree just to find the total file size and will speed up the restoration process. (optional)
	 * @param int $KnownDirCount The number of directories to restore, if known. Supplying this means we don't need to walk the entire tree just to find the number of directories and will speed up the restoration process. (optional)
	 */
	public function __construct(string $TargetID, string $Source, string $Destination, \Comet\RestoreJobAdvancedOptions $Options, string $Snapshot = null, array $Paths = null, int $KnownFileCount = null, int $KnownByteCount = null, int $KnownDirCount = null)
	{
		$this->TargetID = $TargetID;
		$this->Source = $Source;
		$this->Destination = $Destination;
		$this->Options = $Options;
		$this->Snapshot = $Snapshot;
		$this->Paths = $Paths;
		$this->KnownFileCount = $KnownFileCount;
		$this->KnownByteCount = $KnownByteCount;
		$this->KnownDirCount = $KnownDirCount;
	}

	/**
	 * Get the URL where this POST request should be submitted to.
	 *
	 * @return string
	 */
	public function Endpoint(): string
	{
		return '/api/v1/admin/dispatcher/run-restore-custom';
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
		$ret["Source"] = (string)($this->Source);
		$ret["Destination"] = (string)($this->Destination);
		$ret["Options"] = $this->Options->toJSON();
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
		if ($this->KnownFileCount !== null) {
			$ret["KnownFileCount"] = (string)($this->KnownFileCount);
		}
		if ($this->KnownByteCount !== null) {
			$ret["KnownByteCount"] = (string)($this->KnownByteCount);
		}
		if ($this->KnownDirCount !== null) {
			$ret["KnownDirCount"] = (string)($this->KnownDirCount);
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

