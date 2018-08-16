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
	 * You can recursively remove all unknown properties by calling RemoveUnknownProperties().
	 *
	 * @var array
	 */
	private $__unknown_properties = [];
	
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
	
	public static function createFrom(array $decodedJsonObject)
	{
		$retn = new SizeMeasurement();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}
	
	public function toArray($for_json_encode=false)
	{
		$ret = [];
		$ret["Size"] = $this->Size;
		$ret["MeasureStarted"] = $this->MeasureStarted;
		$ret["MeasureCompleted"] = $this->MeasureCompleted;
		
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

