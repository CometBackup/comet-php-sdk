<?php

/**
 * Copyright (c) 2018-2026 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 *
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

/**
 * Office365ServiceRuleDecision records which rule made the final include/exclude
 * decision for one service of one account, as returned by the Office 365 rule
 * evaluation APIs.
 * This type is available in Comet 26.8.1 and later.
 */
class Office365ServiceRuleDecision {

	/**
	 * A single SERVICE_ constant bit identifying the service this decision is for.
	 *
	 * @var int
	 */
	public $ServiceOption = 0;

	/**
	 * The index (into the evaluated rule list) of the last rule that decided this
	 * service for the account.
	 *
	 * @var int
	 */
	public $RuleIndex = 0;

	/**
	 * Preserve unknown properties when dealing with future server versions.
	 *
	 * @see Office365ServiceRuleDecision::RemoveUnknownProperties() Remove all unknown properties
	 * @var array
	 */
	private $__unknown_properties = [];

	/**
	 * Replace the content of this Office365ServiceRuleDecision object from a PHP \stdClass.
	 * The data could be supplied from an API call after json_decode(...); or generated manually.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return void
	 */
	protected function inflateFrom(\stdClass $sc)
	{
		if (property_exists($sc, 'ServiceOption') && !is_null($sc->ServiceOption)) {
			$this->ServiceOption = (int)($sc->ServiceOption);
		}
		if (property_exists($sc, 'RuleIndex') && !is_null($sc->RuleIndex)) {
			$this->RuleIndex = (int)($sc->RuleIndex);
		}
		foreach(get_object_vars($sc) as $k => $v) {
			switch($k) {
			case 'ServiceOption':
			case 'RuleIndex':
				break;
			default:
				$this->__unknown_properties[$k] = $v;
			}
		}
	}

	/**
	 * Coerce a stdClass into a new strongly-typed Office365ServiceRuleDecision object.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return Office365ServiceRuleDecision
	 */
	public static function createFromStdclass(\stdClass $sc): \Comet\Office365ServiceRuleDecision
	{
		$retn = new Office365ServiceRuleDecision();
		$retn->inflateFrom($sc);
		return $retn;
	}

	/**
	 * Coerce a plain PHP array into a new strongly-typed Office365ServiceRuleDecision object.
	 * Because the Comet Server requires strict distinction between empty objects ({}) and arrays ([]),
	 * the result of this method may not be safe to re-submit to the Comet Server.
	 *
	 * @param array $arr Object data as PHP array
	 * @return Office365ServiceRuleDecision
	 */
	public static function createFromArray(array $arr): \Comet\Office365ServiceRuleDecision
	{
		$stdClass = json_decode(json_encode($arr, JSON_UNESCAPED_SLASHES));
		if (is_array($stdClass) && count($stdClass) === 0) {
			$stdClass = new \stdClass();
		}
		return self::createFromStdclass($stdClass);
	}

	/**
	 * Coerce a JSON string into a new strongly-typed Office365ServiceRuleDecision object.
	 *
	 * @param string $JsonString Object data as JSON string
	 * @return Office365ServiceRuleDecision
	 */
	public static function createFromJSON(string $JsonString): \Comet\Office365ServiceRuleDecision
	{
		$decodedJsonObject = json_decode($JsonString); // as stdClass
		if (\json_last_error() != \JSON_ERROR_NONE) {
			throw new \Exception("JSON decode failed: " . \json_last_error_msg(), \json_last_error());
		}
		$retn = new Office365ServiceRuleDecision();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}

	/**
	 * Convert this Office365ServiceRuleDecision object into a plain PHP array.
	 *
	 * Unknown properties may still be represented as \stdClass objects.
	 *
	 * @param bool $for_json_encode Represent key-value maps as \stdClass instead of plain PHP arrays
	 * @return array
	 */
	public function toArray(bool $for_json_encode = false): array
	{
		$ret = [];
		$ret["ServiceOption"] = $this->ServiceOption;
		$ret["RuleIndex"] = $this->RuleIndex;

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

