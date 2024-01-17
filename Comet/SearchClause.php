<?php

/**
 * Copyright (c) 2018-2024 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 *
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

class SearchClause {

	/**
	 * One of the SEARCHCLAUSE_ constants (e.g. empty-string if this is a rule, or "and"/"or" if there
	 * are ClauseChildren)
	 *
	 * @var string
	 */
	public $ClauseType = "";

	/**
	 * The field name to search. Check the specific API for more information about which fields are
	 * available for searching. For use with ClauseType = SEARCHCLAUSE_RULE.
	 *
	 * @var string
	 */
	public $RuleField = "";

	/**
	 * One of the SEARCHOPERATOR_ constants. The operator must match the type of the particular field.
	 * For use with ClauseType = SEARCHCLAUSE_RULE.
	 *
	 * @var string
	 */
	public $RuleOperator = "";

	/**
	 * The value to compare the field against.
	 * - If the field is a string, any string is permissable.
	 * - If the field is an integer, the integer should be cast to a base-10 string. There is currently
	 * no support for fractional or floating-point numbers.
	 * - If the field is a boolean, the following values can be used for true ("1", "t", "T", "true",
	 * "TRUE", "True") and the following values can be used for false ("0", "f", "F", "false", "FALSE",
	 * "False").
	 * For use with ClauseType = SEARCHCLAUSE_RULE.
	 *
	 * @var string
	 */
	public $RuleValue = "";

	/**
	 * If ClauseType is not SEARCHCLAUSE_RULE, the child rules will be applied according to the
	 * ClauseType (e.g. "and"/"or")
	 *
	 * @var \Comet\SearchClause[]
	 */
	public $ClauseChildren = [];

	/**
	 * Preserve unknown properties when dealing with future server versions.
	 *
	 * @see SearchClause::RemoveUnknownProperties() Remove all unknown properties
	 * @var array
	 */
	private $__unknown_properties = [];

	/**
	 * Replace the content of this SearchClause object from a PHP \stdClass.
	 * The data could be supplied from an API call after json_decode(...); or generated manually.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return void
	 */
	protected function inflateFrom(\stdClass $sc)
	{
		if (property_exists($sc, 'ClauseType')) {
			$this->ClauseType = (string)($sc->ClauseType);
		}
		if (property_exists($sc, 'RuleField')) {
			$this->RuleField = (string)($sc->RuleField);
		}
		if (property_exists($sc, 'RuleOperator')) {
			$this->RuleOperator = (string)($sc->RuleOperator);
		}
		if (property_exists($sc, 'RuleValue')) {
			$this->RuleValue = (string)($sc->RuleValue);
		}
		if (property_exists($sc, 'ClauseChildren') && !is_null($sc->ClauseChildren)) {
			$val_2 = [];
			if ($sc->ClauseChildren !== null) {
				for($i_2 = 0; $i_2 < count($sc->ClauseChildren); ++$i_2) {
					if (is_array($sc->ClauseChildren[$i_2]) && count($sc->ClauseChildren[$i_2]) === 0) {
					// Work around edge case in json_decode--json_encode stdClass conversion
						$val_2[] = \Comet\SearchClause::createFromStdclass(new \stdClass());
					} else {
						$val_2[] = \Comet\SearchClause::createFromStdclass($sc->ClauseChildren[$i_2]);
					}
				}
			}
			$this->ClauseChildren = $val_2;
		}
		foreach(get_object_vars($sc) as $k => $v) {
			switch($k) {
			case 'ClauseType':
			case 'RuleField':
			case 'RuleOperator':
			case 'RuleValue':
			case 'ClauseChildren':
				break;
			default:
				$this->__unknown_properties[$k] = $v;
			}
		}
	}

	/**
	 * Coerce a stdClass into a new strongly-typed SearchClause object.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return SearchClause
	 */
	public static function createFromStdclass(\stdClass $sc): \Comet\SearchClause
	{
		$retn = new SearchClause();
		$retn->inflateFrom($sc);
		return $retn;
	}

	/**
	 * Coerce a plain PHP array into a new strongly-typed SearchClause object.
	 * Because the Comet Server requires strict distinction between empty objects ({}) and arrays ([]),
	 * the result of this method may not be safe to re-submit to the Comet Server.
	 *
	 * @param array $arr Object data as PHP array
	 * @return SearchClause
	 */
	public static function createFromArray(array $arr): \Comet\SearchClause
	{
		$stdClass = json_decode(json_encode($arr, JSON_UNESCAPED_SLASHES));
		if (is_array($stdClass) && count($stdClass) === 0) {
			$stdClass = new \stdClass();
		}
		return self::createFromStdclass($stdClass);
	}

	/**
	 * Coerce a JSON string into a new strongly-typed SearchClause object.
	 *
	 * @param string $JsonString Object data as JSON string
	 * @return SearchClause
	 */
	public static function createFromJSON(string $JsonString): \Comet\SearchClause
	{
		$decodedJsonObject = json_decode($JsonString); // as stdClass
		if (\json_last_error() != \JSON_ERROR_NONE) {
			throw new \Exception("JSON decode failed: " . \json_last_error_msg(), \json_last_error());
		}
		$retn = new SearchClause();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}

	/**
	 * Convert this SearchClause object into a plain PHP array.
	 *
	 * Unknown properties may still be represented as \stdClass objects.
	 *
	 * @param bool $for_json_encode Represent empty key-value maps as \stdClass instead of plain PHP arrays
	 * @return array
	 */
	public function toArray(bool $for_json_encode = false): array
	{
		$ret = [];
		$ret["ClauseType"] = $this->ClauseType;
		$ret["RuleField"] = $this->RuleField;
		$ret["RuleOperator"] = $this->RuleOperator;
		$ret["RuleValue"] = $this->RuleValue;
		{
			$c0 = [];
			for($i0 = 0; $i0 < count($this->ClauseChildren); ++$i0) {
				if ( $this->ClauseChildren[$i0] === null ) {
					$val0 = $for_json_encode ? (object)[] : [];
				} else {
					$val0 = $this->ClauseChildren[$i0]->toArray($for_json_encode);
				}
				$c0[] = $val0;
			}
			$ret["ClauseChildren"] = $c0;
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

