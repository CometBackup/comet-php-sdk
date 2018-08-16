<?php

namespace Comet;

class ContentMeasurement {
	
	/**
	 * @var int
	 */
	public $MeasureStarted = 0;
	
	/**
	 * @var int
	 */
	public $MeasureCompleted = 0;
	
	/**
	 * @var \Comet\ContentMeasurementComponent[]
	 */
	public $Components = [];
	
	/**
	 * Preserve unknown properties when dealing with future server versions.
	 * You can recursively remove all unknown properties by calling RemoveUnknownProperties().
	 *
	 * @var array
	 */
	private $__unknown_properties = [];
	
	public function inflateFrom(array $decodedJsonObject)
	{
		$this->MeasureStarted = (int)($decodedJsonObject['MeasureStarted']);
		
		$this->MeasureCompleted = (int)($decodedJsonObject['MeasureCompleted']);
		
		$val_2 = [];
		for($i_2 = 0; $i_2 < count($decodedJsonObject['Components']); ++$i_2) {
			$val_2[] = \Comet\ContentMeasurementComponent::createFrom(isset($decodedJsonObject['Components'][$i_2]) ? $decodedJsonObject['Components'][$i_2] : []);
		}
		$this->Components = $val_2;
		
		foreach($decodedJsonObject as $k => $v) {
			switch($k) {
			case 'MeasureStarted':
			case 'MeasureCompleted':
			case 'Components':
				break;
			default:
				$this->__unknown_properties[$k] = $v;
			}
		}
	}
	
	public static function createFrom(array $decodedJsonObject)
	{
		$retn = new ContentMeasurement();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}
	
	public function toArray($for_json_encode=false)
	{
		$ret = [];
		$ret["MeasureStarted"] = $this->MeasureStarted;
		$ret["MeasureCompleted"] = $this->MeasureCompleted;
		{
			$c0 = [];
			for($i0 = 0; $i0 < count($this->Components); ++$i0) {
				if ( $this->Components[$i0] === null ) {
					$val0 = $for_json_encode ? (object)[] : [];
				} else {
					$val0 = $this->Components[$i0]->toArray($for_json_encode);
				}
				$c0[] = $val0;
			}
			$ret["Components"] = $c0;
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

