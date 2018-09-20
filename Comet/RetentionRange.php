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
	 *
	 * @see RetentionRange::RemoveUnknownProperties() Remove all unknown properties
	 * @var array
	 */
	private $__unknown_properties = [];
	
	/**
	 * Replace the content of this RetentionRange object from a PHP array.
	 * The data could be supplied from an API call after json_decode(..., true); or generated manually.
	 *
	 * @param array $decodedJsonObject Object data as PHP array
	 * @return void
	 */
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
	
	/**
	 * Coerce a plain PHP array into a new strongly-typed RetentionRange object.
	 * The data could be supplied from an API call after json_decode(..., true); or generated manually.
	 *
	 * @param array $decodedJsonObject Object data as PHP array
	 * @return RetentionRange
	 */
	public static function createFrom(array $decodedJsonObject)
	{
		$retn = new RetentionRange();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}
	
	/**
	 * Convert this RetentionRange object into a plain PHP array.
	 *
	 * @param bool $forJSONEncode Set true to use stdClass() for empty objects instead of just [], in order to
	 *                             accurately roundtrip empty objects/arrays through json_encode() compatibility
	 * @return array
	 */
	public function toArray($forJSONEncode=false)
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

