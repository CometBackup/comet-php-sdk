<?php

namespace Comet;

class RetentionRange {
	
	/**
	 * @var int
	 */
	public $Type = 0;
	
	/**
	 * @var int
	 */
	public $Timestamp = 0;
	
	/**
	 * @var int
	 */
	public $Jobs = 0;
	
	/**
	 * @var int
	 */
	public $Days = 0;
	
	/**
	 * @var int
	 */
	public $Weeks = 0;
	
	/**
	 * @var int
	 */
	public $Months = 0;
	
	/**
	 * @var int
	 */
	public $WeekOffset = 0;
	
	/**
	 * @var int
	 */
	public $MonthOffset = 0;
	
	/**
	 * Preserve unknown properties when dealing with future server versions.
	 * You can recursively remove all unknown properties by calling RemoveUnknownProperties().
	 *
	 * @var array
	 */
	private $__unknown_properties = [];
	
	public function inflateFrom(array $decodedJsonObject)
	{
		$this->Type = (int)($decodedJsonObject['Type']);
		
		$this->Timestamp = (int)($decodedJsonObject['Timestamp']);
		
		$this->Jobs = (int)($decodedJsonObject['Jobs']);
		
		$this->Days = (int)($decodedJsonObject['Days']);
		
		$this->Weeks = (int)($decodedJsonObject['Weeks']);
		
		$this->Months = (int)($decodedJsonObject['Months']);
		
		$this->WeekOffset = (int)($decodedJsonObject['WeekOffset']);
		
		$this->MonthOffset = (int)($decodedJsonObject['MonthOffset']);
		
		foreach($decodedJsonObject as $k => $v) {
			switch($k) {
			case 'Type':
			case 'Timestamp':
			case 'Jobs':
			case 'Days':
			case 'Weeks':
			case 'Months':
			case 'WeekOffset':
			case 'MonthOffset':
				break;
			default:
				$this->__unknown_properties[$k] = $v;
			}
		}
	}
	
	public static function createFrom(array $decodedJsonObject)
	{
		$retn = new RetentionRange();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}
	
	public function toArray($for_json_encode=false)
	{
		$ret = [];
		$ret["Type"] = $this->Type;
		$ret["Timestamp"] = $this->Timestamp;
		$ret["Jobs"] = $this->Jobs;
		$ret["Days"] = $this->Days;
		$ret["Weeks"] = $this->Weeks;
		$ret["Months"] = $this->Months;
		$ret["WeekOffset"] = $this->WeekOffset;
		$ret["MonthOffset"] = $this->MonthOffset;
		
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

