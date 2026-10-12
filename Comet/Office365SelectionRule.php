<?php

/**
 * Copyright (c) 2018-2026 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 *
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

/**
 * Office365SelectionRule is a single entry in the ordered rule list of an
 * Office365CustomSettingV2 (see the Rules field).
 * Rules are applied in order from the first element of the array to the last, and a
 * later rule overrides earlier rules for the account services it covers. For each account and
 * each service, the last rule in the list that matches the account and covers that service
 * decides whether the service is included in or excluded from the backup.
 * Any account/service combination that is not covered by any matching rule is not backed up.
 * This type is available in Comet 26.8.1 and later.
 */
class Office365SelectionRule {

	/**
	 * If true, services covered by this rule are excluded from the backup. If false, they
	 * are included.
	 *
	 * @var boolean
	 */
	public $Exclude = false;

	/**
	 * If true, this rule matches every account in the organization, including accounts
	 * created after the rule was saved. SubjectID and SubjectType are ignored.
	 *
	 * @var boolean
	 */
	public $AllAccounts = false;

	/**
	 * The ID of the target account (the Office365MixedVirtualAccount ID of a User, Group,
	 * Team, or SharePoint site). Ignored if AllAccounts is true. If the ID no longer exists in the
	 * organization, the rule matches nothing.
	 *
	 * @var string
	 */
	public $SubjectID = "";

	/**
	 * One of the MIXED_VIRTUAL_ACCOUNT_TYPE_ constants. Informational only; matching is
	 * performed by SubjectID.
	 *
	 * @var int
	 */
	public $SubjectType = 0;

	/**
	 * A cached copy of the subject's display name at the time the rule was saved.
	 * Informational only, for display when the organization cannot be queried. Never used for
	 * matching.
	 *
	 * @var string
	 */
	public $SubjectDisplayName = "";

	/**
	 * If true, this rule covers every service that the matched account supports,
	 * including services added in future Comet versions. ServiceOptions is ignored.
	 *
	 * @var boolean
	 */
	public $AllServices = false;

	/**
	 * A bitset of the SERVICE_ constants covered by this rule for directly-matched
	 * accounts (the subject account itself, or every account if AllAccounts is true).
	 * If zero and AllServices is false, this rule covers no services for directly-matched
	 * accounts.
	 *
	 * @var int
	 */
	public $ServiceOptions = 0;

	/**
	 * If true, this rule covers every service for accounts that are members of the
	 * subject Group or Team, including services added in future Comet versions.
	 * MemberServiceOptions is ignored.
	 *
	 * @var boolean
	 */
	public $AllMemberServices = false;

	/**
	 * A bitset of the SERVICE_ constants covered by this rule for accounts that are
	 * members of the subject Group or Team. Ignored if AllAccounts is true.
	 *
	 * @var int
	 */
	public $MemberServiceOptions = 0;

	/**
	 * Preserve unknown properties when dealing with future server versions.
	 *
	 * @see Office365SelectionRule::RemoveUnknownProperties() Remove all unknown properties
	 * @var array
	 */
	private $__unknown_properties = [];

	/**
	 * Replace the content of this Office365SelectionRule object from a PHP \stdClass.
	 * The data could be supplied from an API call after json_decode(...); or generated manually.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return void
	 */
	protected function inflateFrom(\stdClass $sc)
	{
		if (property_exists($sc, 'Exclude') && !is_null($sc->Exclude)) {
			$this->Exclude = (bool)($sc->Exclude);
		}
		if (property_exists($sc, 'AllAccounts') && !is_null($sc->AllAccounts)) {
			$this->AllAccounts = (bool)($sc->AllAccounts);
		}
		if (property_exists($sc, 'SubjectID') && !is_null($sc->SubjectID)) {
			$this->SubjectID = (string)($sc->SubjectID);
		}
		if (property_exists($sc, 'SubjectType') && !is_null($sc->SubjectType)) {
			$this->SubjectType = (int)($sc->SubjectType);
		}
		if (property_exists($sc, 'SubjectDisplayName') && !is_null($sc->SubjectDisplayName)) {
			$this->SubjectDisplayName = (string)($sc->SubjectDisplayName);
		}
		if (property_exists($sc, 'AllServices') && !is_null($sc->AllServices)) {
			$this->AllServices = (bool)($sc->AllServices);
		}
		if (property_exists($sc, 'ServiceOptions') && !is_null($sc->ServiceOptions)) {
			$this->ServiceOptions = (int)($sc->ServiceOptions);
		}
		if (property_exists($sc, 'AllMemberServices') && !is_null($sc->AllMemberServices)) {
			$this->AllMemberServices = (bool)($sc->AllMemberServices);
		}
		if (property_exists($sc, 'MemberServiceOptions') && !is_null($sc->MemberServiceOptions)) {
			$this->MemberServiceOptions = (int)($sc->MemberServiceOptions);
		}
		foreach(get_object_vars($sc) as $k => $v) {
			switch($k) {
			case 'Exclude':
			case 'AllAccounts':
			case 'SubjectID':
			case 'SubjectType':
			case 'SubjectDisplayName':
			case 'AllServices':
			case 'ServiceOptions':
			case 'AllMemberServices':
			case 'MemberServiceOptions':
				break;
			default:
				$this->__unknown_properties[$k] = $v;
			}
		}
	}

	/**
	 * Coerce a stdClass into a new strongly-typed Office365SelectionRule object.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return Office365SelectionRule
	 */
	public static function createFromStdclass(\stdClass $sc): \Comet\Office365SelectionRule
	{
		$retn = new Office365SelectionRule();
		$retn->inflateFrom($sc);
		return $retn;
	}

	/**
	 * Coerce a plain PHP array into a new strongly-typed Office365SelectionRule object.
	 * Because the Comet Server requires strict distinction between empty objects ({}) and arrays ([]),
	 * the result of this method may not be safe to re-submit to the Comet Server.
	 *
	 * @param array $arr Object data as PHP array
	 * @return Office365SelectionRule
	 */
	public static function createFromArray(array $arr): \Comet\Office365SelectionRule
	{
		$stdClass = json_decode(json_encode($arr, JSON_UNESCAPED_SLASHES));
		if (is_array($stdClass) && count($stdClass) === 0) {
			$stdClass = new \stdClass();
		}
		return self::createFromStdclass($stdClass);
	}

	/**
	 * Coerce a JSON string into a new strongly-typed Office365SelectionRule object.
	 *
	 * @param string $JsonString Object data as JSON string
	 * @return Office365SelectionRule
	 */
	public static function createFromJSON(string $JsonString): \Comet\Office365SelectionRule
	{
		$decodedJsonObject = json_decode($JsonString); // as stdClass
		if (\json_last_error() != \JSON_ERROR_NONE) {
			throw new \Exception("JSON decode failed: " . \json_last_error_msg(), \json_last_error());
		}
		$retn = new Office365SelectionRule();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}

	/**
	 * Convert this Office365SelectionRule object into a plain PHP array.
	 *
	 * Unknown properties may still be represented as \stdClass objects.
	 *
	 * @param bool $for_json_encode Represent key-value maps as \stdClass instead of plain PHP arrays
	 * @return array
	 */
	public function toArray(bool $for_json_encode = false): array
	{
		$ret = [];
		$ret["Exclude"] = $this->Exclude;
		$ret["AllAccounts"] = $this->AllAccounts;
		$ret["SubjectID"] = $this->SubjectID;
		$ret["SubjectType"] = $this->SubjectType;
		$ret["SubjectDisplayName"] = $this->SubjectDisplayName;
		$ret["AllServices"] = $this->AllServices;
		$ret["ServiceOptions"] = $this->ServiceOptions;
		$ret["AllMemberServices"] = $this->AllMemberServices;
		$ret["MemberServiceOptions"] = $this->MemberServiceOptions;

		// Reinstate unknown properties from future server versions
		foreach($this->__unknown_properties as $k => $v) {
			$ret[$k] = $v;
		}

		return $ret;
	}

	/**
	 * Convert this object to a JSON string.
	 * The result is suitable to submit to the Comet Server API.
	 *
	 * @return string
	 */
	public function toJSON(): string
	{
		$arr = $this->toArray(true);
		if (count($arr) === 0) {
			return "{}"; // object
		} else {
			return json_encode($arr, JSON_UNESCAPED_SLASHES);
		}
	}

	/**
	 * Convert this object to a PHP \stdClass.
	 * This may be a more convenient format for working with unknown class properties.
	 *
	 * @return \stdClass
	 */
	public function toStdClass(): \stdClass
	{
		$arr = $this->toArray(false);
		if (count($arr) === 0) {
			return new \stdClass();
		} else {
			return json_decode(json_encode($arr, JSON_UNESCAPED_SLASHES));
		}
	}

	/**
	 * Erase any preserved object properties that are unknown to this Comet Server SDK.
	 *
	 * @return void
	 */
	public function RemoveUnknownProperties()
	{
		$this->__unknown_properties = [];
	}

}

