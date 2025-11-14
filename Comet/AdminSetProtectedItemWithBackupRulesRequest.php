<?php

/**
 * Copyright (c) 2018-2025 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 *
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

/**
 * Comet Server AdminSetProtectedItemWithBackupRules API
 * Add or update a Protected Item with its backup rules
 *
 * You must supply administrator authentication credentials to use this API.
 * This API requires the Auth Role to be enabled.
 */
class AdminSetProtectedItemWithBackupRulesRequest implements \Comet\NetworkRequest {

	/**
	 * Selected account username
	 *
	 * @var string
	 */
	protected $TargetUser = null;

	/**
	 * Selected Protected Item GUID
	 *
	 * @var string
	 */
	protected $SourceID = null;

	/**
	 * Previous account profile hash (optional)
	 *
	 * @var string|null
	 */
	protected $RequireHash = null;

	/**
	 * Optional Protected Item to create or update (optional)
	 *
	 * @var \Comet\SourceConfig|null
	 */
	protected $Source = null;

	/**
	 * Optional backup rules for the Protected Item (optional)
	 *
	 * @var array<string, \Comet\BackupRuleConfig>|null
	 */
	protected $BackupRules = null;

	/**
	 * Construct a new AdminSetProtectedItemWithBackupRulesRequest instance.
	 *
	 * @param string $TargetUser Selected account username
	 * @param string $SourceID Selected Protected Item GUID
	 * @param string $RequireHash Previous account profile hash (optional)
	 * @param \Comet\SourceConfig $Source Optional Protected Item to create or update (optional)
	 * @param array<string, \Comet\BackupRuleConfig> $BackupRules Optional backup rules for the Protected Item (optional)
	 */
	public function __construct(string $TargetUser, string $SourceID, string $RequireHash = null, \Comet\SourceConfig $Source = null, array $BackupRules = null)
	{
		$this->TargetUser = $TargetUser;
		$this->SourceID = $SourceID;
		$this->RequireHash = $RequireHash;
		$this->Source = $Source;
		$this->BackupRules = $BackupRules;
	}

	/**
	 * Get the URL where this POST request should be submitted to.
	 *
	 * @return string
	 */
	public function Endpoint(): string
	{
		return '/api/v1/admin/set-protected-item-with-backup-rules';
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
		$ret["TargetUser"] = (string)($this->TargetUser);
		$ret["SourceID"] = (string)($this->SourceID);
		if ($this->RequireHash !== null) {
			$ret["RequireHash"] = (string)($this->RequireHash);
		}
		if ($this->Source !== null) {
			$ret["Source"] = $this->Source->toJSON();
		}
		if ($this->BackupRules !== null) {
			{
				$c0 = [];
				foreach($this->BackupRules as $k0 => $v0) {
					$ko_0 = $k0;

					$vo_0 = $v0->toArray(true);

					$c0[ $ko_0 ] = $vo_0;
				}
				if (count($c0) == 0) {
					$ret["BackupRules"] = '{}';
				} else {
					$ret["BackupRules"] = json_encode($c0);
				}
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

