<?php

namespace Comet;

class SearchClause {
	
	/**
	 * @var string
	 */
	public $ClauseType = "";
	
	/**
	 * @var string
	 */
	public $RuleField = "";
	
	/**
	 * @var string
	 */
	public $RuleOperator = "";
	
	/**
	 * @var string
	 */
	public $RuleValue = "";
	
	/**
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
	 * Replace the content of this SearchClause object from a PHP array.
	 * The data could be supplied from an API call after json_decode(..., true); or generated manually.
	 *
	 * @param array $decodedJsonObject Object data as PHP array
	 * @return void
	 */
	public function inflateFrom(array $decodedJsonObject)
	{
		$this->ClauseType = (string)($decodedJsonObject['ClauseType']);
		
		$this->RuleField = (string)($decodedJsonObject['RuleField']);
		
		$this->RuleOperator = (string)($decodedJsonObject['RuleOperator']);
		
		$this->RuleValue = (string)($decodedJsonObject['RuleValue']);
		
		if (array_key_exists('ClauseChildren', $decodedJsonObject)) {
			$val_2 = [];
			for($i_2 = 0; $i_2 < count($decodedJsonObject['ClauseChildren']); ++$i_2) {
				$val_2[] = \Comet\SearchClause::createFrom(isset($decodedJsonObject['ClauseChildren'][$i_2]) ? $decodedJsonObject['ClauseChildren'][$i_2] : []);
			}
			$this->ClauseChildren = $val_2;
			
		}
		foreach($decodedJsonObject as $k => $v) {
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
	 * Coerce a plain PHP array into a new strongly-typed SearchClause object.
	 * The data could be supplied from an API call after json_decode(..., true); or generated manually.
	 *
	 * @param array $decodedJsonObject Object data as PHP array
	 * @return SearchClause
	 */
	public static function createFrom(array $decodedJsonObject)
	{
		$retn = new SearchClause();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}
	
	/**
	 * Convert this SearchClause object into a plain PHP array.
	 *
	 * @param bool $forJSONEncode Set true to use stdClass() for empty objects instead of just [], in order to
	 *                             accurately roundtrip empty objects/arrays through json_encode() compatibility
	 * @return array
	 */
	public function toArray($forJSONEncode=false)
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
			if ($forJSONEncode && is_array($v) && count($v) == 0) {
				$ret[$k] = (object)[];
			} else {
				$ret[$k] = $v;
			}
		}
		
		// Special handling for empty objects
		if ($forJSONEncode && count($ret) === 0) {
			return new stdClass();
		}
		return $ret;
	}
	
	/**
	 * Convert this object to a JSON string.
	 * The result is suitable to submit to the Comet Server API.
	 *
	 * @return string
	 */
	public function toJSON()
	{
		return json_encode( self::toArray(true) );
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

