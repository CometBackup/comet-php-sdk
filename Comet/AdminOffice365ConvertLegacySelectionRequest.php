<?php

/**
 * Copyright (c) 2018-2026 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 *
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

/**
 * Comet Server AdminOffice365ConvertLegacySelection API
 * Convert a legacy Office 365 Protected Item selection into an equivalent ordered rule list
 * This is a pure computation with no device round-trip. The optional Accounts list is used only to enrich the generated rules' display metadata.
 *
 * You must supply administrator authentication credentials to use this API.
 * This API does not accept admin personal API token authentication (AuthType=Token, or the token supplied as the password with AuthType=Password).
 */
class AdminOffice365ConvertLegacySelectionRequest implements \Comet\NetworkRequest {

	/**
	 * The legacy selection to convert
	 *
	 * @var \Comet\Office365CustomSettingV2
	 */
	protected $Selection = null;

	/**
	 * The organization's account list, for display-name enrichment (optional)
	 *
	 * @var \Comet\Office365MixedVirtualAccount[]|null
	 */
	protected $Accounts = null;

	/**
	 * Construct a new AdminOffice365ConvertLegacySelectionRequest instance.
	 *
	 * @param \Comet\Office365CustomSettingV2 $Selection The legacy selection to convert
	 * @param \Comet\Office365MixedVirtualAccount[] $Accounts The organization's account list, for display-name enrichment (optional)
	 */
	public function __construct(\Comet\Office365CustomSettingV2 $Selection, array $Accounts = null)
	{
		$this->Selection = $Selection;
		$this->Accounts = $Accounts;
	}

	/**
	 * Get the URL where this POST request should be submitted to.
	 *
	 * @return string
	 */
	public function Endpoint(): string
	{
		return '/api/v1/admin/office365/convert-legacy-selection';
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
		$ret["Selection"] = $this->Selection->toJSON();
		if ($this->Accounts !== null) {
			{
				$c0 = [];
				for($i0 = 0; $i0 < count($this->Accounts); ++$i0) {
					$val0 = $this->Accounts[$i0]->toArray(true);

					$c0[] = $val0;
				}
				$ret["Accounts"] = json_encode($c0);
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
	 * @return \Comet\Office365ConvertSelectionResponse
	 * @throws \Exception
	 */
	public static function ProcessResponse(int $responseCode, string $body): \Comet\Office365ConvertSelectionResponse
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
			if ($carm->Status < 200 || $carm->Status > 299) {
				throw new \Exception("Error " . $carm->Status . ": " . $carm->Message, $carm->Status);
			}
		}

		// Parse as Office365ConvertSelectionResponse
		if (is_array($decoded) && count($decoded) === 0) {
		// Work around edge case in json_decode--json_encode stdClass conversion
			$ret = \Comet\Office365ConvertSelectionResponse::createFromStdclass(new \stdClass());
		} else {
			$ret = \Comet\Office365ConvertSelectionResponse::createFromStdclass($decoded);
		}

		return $ret;
	}

}

