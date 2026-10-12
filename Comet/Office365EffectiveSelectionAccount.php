<?php

/**
 * Copyright (c) 2018-2026 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 *
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

/**
 * Office365EffectiveSelectionAccount is the effective backup selection that an
 * ordered rule list produces for a single account, as returned by the Office 365
 * rule evaluation APIs.
 * This type is available in Comet 26.8.1 and later.
 */
class Office365EffectiveSelectionAccount {

	/**
	 * A bitset of the SERVICE_ constants that the rule list selects for backup for
	 * this account. Zero when the account is not backed up.
	 *
	 * @var int
	 */
	public $ServiceMask = 0;

	/**
	 * One entry per service covered by at least one matching rule, ordered by
	 * ascending ServiceOption, recording the last rule that decided that service.
	 * Services with no entry were not covered by any matching rule (default deny).
	 *
	 * @var \Comet\Office365ServiceRuleDecision[]
	 */
	public $DecidedByRule = [];

	/**
	 * Preserve unknown properties when dealing with future server versions.
	 *
	 * @see Office365EffectiveSelectionAccount::RemoveUnknownProperties() Remove all unknown properties
	 * @var array
	 */
	private $__unknown_properties = [];

	/**
	 * Replace the content of this Office365EffectiveSelectionAccount object from a PHP \stdClass.
	 * The data could be supplied from an API call after json_decode(...); or generated manually.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return void
	 */
	protected function inflateFrom(\stdClass $sc)
	{
		if (property_exists($sc, 'ServiceMask') && !is_null($sc->ServiceMask)) {
			$this->ServiceMask = (int)($sc->ServiceMask);
		}
		if (property_exists($sc, 'DecidedByRule') && !is_null($sc->DecidedByRule)) {
			$val_2 = [];
			if ($sc->DecidedByRule !== null) {
				for($i_2 = 0; $i_2 < count($sc->DecidedByRule); ++$i_2) {
					if (is_array($sc->DecidedByRule[$i_2]) && count($sc->DecidedByRule[$i_2]) === 0) {
					// Work around edge case in json_decode--json_encode stdClass conversion
						$val_2[] = \Comet\Office365ServiceRuleDecision::createFromStdclass(new \stdClass());
					} else {
						$val_2[] = \Comet\Office365ServiceRuleDecision::createFromStdclass($sc->DecidedByRule[$i_2]);
					}
				}
			}
			$this->DecidedByRule = $val_2;
		}
		foreach(get_object_vars($sc) as $k => $v) {
			switch($k) {
			case 'ServiceMask':
			case 'DecidedByRule':
				break;
			default:
				$this->__unknown_properties[$k] = $v;
			}
		}
	}

	/**
	 * Coerce a stdClass into a new strongly-typed Office365EffectiveSelectionAccount object.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return Office365EffectiveSelectionAccount
	 */
	public static function createFromStdclass(\stdClass $sc): \Comet\Office365EffectiveSelectionAccount
	{
		$retn = new Office365EffectiveSelectionAccount();
		$retn->inflateFrom($sc);
		return $retn;
	}

	/**
	 * Coerce a plain PHP array into a new strongly-typed Office365EffectiveSelectionAccount object.
	 * Because the Comet Server requires strict distinction between empty objects ({}) and arrays ([]),
	 * the result of this method may not be safe to re-submit to the Comet Server.
	 *
	 * @param array $arr Object data as PHP array
	 * @return Office365EffectiveSelectionAccount
	 */
	public static function createFromArray(array $arr): \Comet\Office365EffectiveSelectionAccount
	{
		$stdClass = json_decode(json_encode($arr, JSON_UNESCAPED_SLASHES));
		if (is_array($stdClass) && count($stdClass) === 0) {
			$stdClass = new \stdClass();
		}
		return self::createFromStdclass($stdClass);
	}

	/**
	 * Coerce a JSON string into a new strongly-typed Office365EffectiveSelectionAccount object.
	 *
	 * @param string $JsonString Object data as JSON string
	 * @return Office365EffectiveSelectionAccount
	 */
	public static function createFromJSON(string $JsonString): \Comet\Office365EffectiveSelectionAccount
	{
		$decodedJsonObject = json_decode($JsonString); // as stdClass
		if (\json_last_error() != \JSON_ERROR_NONE) {
			throw new \Exception("JSON decode failed: " . \json_last_error_msg(), \json_last_error());
		}
		$retn = new Office365EffectiveSelectionAccount();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}

	/**
	 * Convert this Office365EffectiveSelectionAccount object into a plain PHP array.
	 *
	 * Unknown properties may still be represented as \stdClass objects.
	 *
	 * @param bool $for_json_encode Represent key-value maps as \stdClass instead of plain PHP arrays
	 * @return array
	 */
	public function toArray(bool $for_json_encode = false): array
	{
		$ret = [];
		$ret["ServiceMask"] = $this->ServiceMask;
		{
			$c0 = [];
			for($i0 = 0; $i0 < count($this->DecidedByRule); ++$i0) {
				if ( $this->DecidedByRule[$i0] === null ) {
					$val0 = $for_json_encode ? (object)[] : [];
				} else {
					$val0 = $this->DecidedByRule[$i0]->toArray($for_json_encode);
				}
				$c0[] = $val0;
			}
			$ret["DecidedByRule"] = $c0;
		}

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

