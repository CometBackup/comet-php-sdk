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
	 * You can recursively remove all unknown properties by calling RemoveUnknownProperties().
	 *
	 * @var array
	 */
	private $__unknown_properties = [];
	
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
	
	public static function createFrom(array $decodedJsonObject)
	{
		$retn = new SearchClause();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}
	
	public function toArray($for_json_encode=false)
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
			if ($for_json_encode && is_array($v) && count($v) == 0) {
				$ret[$k] = (object)[];
			} else {
				$ret[$k] = $v;
			}
		}
		
		// Special handling for empty objects
		if ($for_json_encode && count($ret) === 0) {
			return new stdClass();
		}
		return $ret;
	}
	
	public function toJSON()
	{
		return json_encode( self::toArray(true) );
	}
	
	public function RemoveUnknownProperties()
	{
		$this->__unknown_properties = [];
	}
	
}

