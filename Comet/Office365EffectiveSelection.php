<?php

/**
 * Copyright (c) 2018-2026 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 *
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

/**
 * Office365EffectiveSelection is the full result of evaluating an ordered rule list
 * against an organization's accounts, including per-service rule attribution for
 * display purposes.
 * This type is available in Comet 26.8.1 and later.
 */
class Office365EffectiveSelection {

	/**
	 * The effective selection for every account in the organization, keyed by
	 * account ID. Accounts with no matching rules are present with a zero
	 * ServiceMask.
	 *
	 * @var array<string, \Comet\Office365EffectiveSelectionAccount>
	 */
	public $Accounts = [];

	/**
	 * Indexes (into the evaluated rule list) of rules that are the final decider of
	 * at least one (account, service) pair. A rule index absent from this list is
	 * fully overridden by later rules (or matches nothing) and has no effect.
	 *
	 * @var int[]
	 */
	public $EffectiveRuleIndexes = [];

	/**
	 * Preserve unknown properties when dealing with future server versions.
	 *
	 * @see Office365EffectiveSelection::RemoveUnknownProperties() Remove all unknown properties
	 * @var array
	 */
	private $__unknown_properties = [];

	/**
	 * Replace the content of this Office365EffectiveSelection object from a PHP \stdClass.
	 * The data could be supplied from an API call after json_decode(...); or generated manually.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return void
	 */
	protected function inflateFrom(\stdClass $sc)
	{
		if (property_exists($sc, 'Accounts') && !is_null($sc->Accounts)) {
			$val_2 = [];
			if ($sc->Accounts !== null) {
				foreach($sc->Accounts as $k_2 => $v_2) {
					$phpk_2 = (string)($k_2);
					if (is_array($v_2) && count($v_2) === 0) {
					// Work around edge case in json_decode--json_encode stdClass conversion
						$phpv_2 = \Comet\Office365EffectiveSelectionAccount::createFromStdclass(new \stdClass());
					} else {
						$phpv_2 = \Comet\Office365EffectiveSelectionAccount::createFromStdclass($v_2);
					}
					$val_2[$phpk_2] = $phpv_2;
				}
			}
			$this->Accounts = $val_2;
		}
		if (property_exists($sc, 'EffectiveRuleIndexes') && !is_null($sc->EffectiveRuleIndexes)) {
			$val_2 = [];
			if ($sc->EffectiveRuleIndexes !== null) {
				for($i_2 = 0; $i_2 < count($sc->EffectiveRuleIndexes); ++$i_2) {
					$val_2[] = (int)($sc->EffectiveRuleIndexes[$i_2]);
				}
			}
			$this->EffectiveRuleIndexes = $val_2;
		}
		foreach(get_object_vars($sc) as $k => $v) {
			switch($k) {
			case 'Accounts':
			case 'EffectiveRuleIndexes':
				break;
			default:
				$this->__unknown_properties[$k] = $v;
			}
		}
	}

	/**
	 * Coerce a stdClass into a new strongly-typed Office365EffectiveSelection object.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return Office365EffectiveSelection
	 */
	public static function createFromStdclass(\stdClass $sc): \Comet\Office365EffectiveSelection
	{
		$retn = new Office365EffectiveSelection();
		$retn->inflateFrom($sc);
		return $retn;
	}

	/**
	 * Coerce a plain PHP array into a new strongly-typed Office365EffectiveSelection object.
	 * Because the Comet Server requires strict distinction between empty objects ({}) and arrays ([]),
	 * the result of this method may not be safe to re-submit to the Comet Server.
	 *
	 * @param array $arr Object data as PHP array
	 * @return Office365EffectiveSelection
	 */
	public static function createFromArray(array $arr): \Comet\Office365EffectiveSelection
	{
		$stdClass = json_decode(json_encode($arr, JSON_UNESCAPED_SLASHES));
		if (is_array($stdClass) && count($stdClass) === 0) {
			$stdClass = new \stdClass();
		}
		return self::createFromStdclass($stdClass);
	}

	/**
	 * Coerce a JSON string into a new strongly-typed Office365EffectiveSelection object.
	 *
	 * @param string $JsonString Object data as JSON string
	 * @return Office365EffectiveSelection
	 */
	public static function createFromJSON(string $JsonString): \Comet\Office365EffectiveSelection
	{
		$decodedJsonObject = json_decode($JsonString); // as stdClass
		if (\json_last_error() != \JSON_ERROR_NONE) {
			throw new \Exception("JSON decode failed: " . \json_last_error_msg(), \json_last_error());
		}
		$retn = new Office365EffectiveSelection();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}

	/**
	 * Convert this Office365EffectiveSelection object into a plain PHP array.
	 *
	 * Unknown properties may still be represented as \stdClass objects.
	 *
	 * @param bool $for_json_encode Represent key-value maps as \stdClass instead of plain PHP arrays
	 * @return array
	 */
	public function toArray(bool $for_json_encode = false): array
	{
		$ret = [];
		{
			$c0 = $for_json_encode ? (object)[] : [];
			foreach($this->Accounts as $k0 => $v0) {
				$ko_0 = $k0;
				if ( $v0 === null ) {
					$vo_0 = $for_json_encode ? (object)[] : [];
				} else {
					$vo_0 = $v0->toArray($for_json_encode);
				}
				if ($for_json_encode) {
				$c0->{ $ko_0 } = $vo_0;
				} else {
					$c0[ $ko_0 ] = $vo_0;
				}
			}
			$ret["Accounts"] = $c0;
		}
		{
			$c0 = [];
			for($i0 = 0; $i0 < count($this->EffectiveRuleIndexes); ++$i0) {
				$val0 = $this->EffectiveRuleIndexes[$i0];
				$c0[] = $val0;
			}
			$ret["EffectiveRuleIndexes"] = $c0;
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

