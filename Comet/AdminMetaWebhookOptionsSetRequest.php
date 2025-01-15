<?php

/**
 * Copyright (c) 2018-2025 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 *
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

/**
 * Comet Server AdminMetaWebhookOptionsSet API
 * Update the server webhook configuration
 * Calling this endpoint will interrupt any messages currently queued for existing webhook destinations.
 *
 * You must supply administrator authentication credentials to use this API.
 * Access to this API may be prevented on a per-administrator basis.
 */
class AdminMetaWebhookOptionsSetRequest implements \Comet\NetworkRequest {

	/**
	 * The replacement webhook target options.
	 *
	 * @var array<string, \Comet\WebhookOption>
	 */
	protected $WebhookOptions = null;

	/**
	 * Construct a new AdminMetaWebhookOptionsSetRequest instance.
	 *
	 * @param array<string, \Comet\WebhookOption> $WebhookOptions The replacement webhook target options.
	 */
	public function __construct(array $WebhookOptions)
	{
		$this->WebhookOptions = $WebhookOptions;
	}

	/**
	 * Get the URL where this POST request should be submitted to.
	 *
	 * @return string
	 */
	public function Endpoint(): string
	{
		return '/api/v1/admin/meta/webhook-options/set';
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
		{
			$c0 = [];
			foreach($this->WebhookOptions as $k0 => $v0) {
				$ko_0 = $k0;

				$vo_0 = $v0->toArray(true);

				$c0[ $ko_0 ] = $vo_0;
			}
			if (count($c0) == 0) {
				$ret["WebhookOptions"] = '{}';
			} else {
				$ret["WebhookOptions"] = json_encode($c0);
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

