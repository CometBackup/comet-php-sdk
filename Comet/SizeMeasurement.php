<?php

namespace Comet;

class SizeMeasurement {
	
	/**
	 * @var int
	 */
	public $Size = 0;
	
	/**
	 * @var int
	 */
	public $MeasureStarted = 0;
	
	/**
	 * @var int
	 */
	public $MeasureCompleted = 0;
	
	/**
	 * Preserve unknown properties when dealing with future server versions.
	 *
	 * @see SizeMeasurement::RemoveUnknownProperties() Remove all unknown properties
	 * @var array
	 */
	private $__unknown_properties = [];
	
	/**
	 * Replace the content of this SizeMeasurement object from a PHP array.
	 * The data could be supplied from an API call after json_decode(..., true); or generated manually.
	 *
	 * @param array $decodedJsonObject Object data as PHP array
	 * @return void
	 */
	public function inflateFrom(array $decodedJsonObject)
	{
		$this->Size = (int)($decodedJsonObject['Size']);
		
		$this->MeasureStarted = (int)($decodedJsonObject['MeasureStarted']);
		
		$this->MeasureCompleted = (int)($decodedJsonObject['MeasureCompleted']);
		
		foreach($decodedJsonObject as $k => $v) {
			switch($k) {
			case 'Size':
			case 'MeasureStarted':
			case 'MeasureCompleted':
				break;
			default:
				$this->__unknown_properties[$k] = $v;
			}
		}
	}
	
	/**
	 * Coerce a plain PHP array into a new strongly-typed SizeMeasurement object.
	 * The data could be supplied from an API call after json_decode(..., true); or generated manually.
	 *
	 * @param array $decodedJsonObject Object data as PHP array
	 * @return SizeMeasurement
	 */
	public static function createFrom(array $decodedJsonObject)
	{
		$retn = new SizeMeasurement();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}
	
	/**
	 * Convert this SizeMeasurement object into a plain PHP array.
	 *
	 * @param bool $forJSONEncode Set true to use stdClass() for empty objects instead of just [], in order to
	 *                             accurately roundtrip empty objects/arrays through json_encode() compatibility
	 * @return array
	 */
	public function toArray($forJSONEncode=false)
	{
		$ret = [];
		$ret["Size"] = $this->Size;
		$ret["MeasureStarted"] = $this->MeasureStarted;
		$ret["MeasureCompleted"] = $this->MeasureCompleted;
		
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

