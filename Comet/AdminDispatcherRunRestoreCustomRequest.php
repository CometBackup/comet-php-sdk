<?php

/**
 * Copyright (c) 2018-2021 Comet Licensing Ltd.
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
	 * Construct a new AdminDispatcherRunRestoreCustomRequest instance.
	 *
	 * @param string $TargetID The live connection GUID
	 * @param string $Source The Protected Item ID
	 * @param string $Destination The Storage Vault ID
	 * @param \Comet\RestoreJobAdvancedOptions $Options Restore targets
	 * @param string $Snapshot If present, restore a specific snapshot. Otherwise, restore the latest snapshot for the selected Protected Item + Storage Vault pair (optional)
	 * @param string[] $Paths If present, restore these paths only. Otherwise, restore all data (optional)
	 */
	public function __construct($TargetID, $Source, $Destination, RestoreJobAdvancedOptions $Options, $Snapshot = null, array $Paths = null)
	{
		$this->TargetID = $TargetID;
		$this->Source = $Source;
		$this->Destination = $Destination;
		$this->Options = $Options;
		$this->Snapshot = $Snapshot;
		$this->Paths = $Paths;
	}

	/**
	 * Get the URL where this POST request should be submitted to.
	 *
	 * @return string
	 */
	public function Endpoint()
	{
		return '/api/v1/admin/dispatcher/run-restore-custom';
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

