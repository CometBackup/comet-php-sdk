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
	 *
	 * @see ContentMeasurement::RemoveUnknownProperties() Remove all unknown properties
	 * @var array
	 */
	private $__unknown_properties = [];
	
	/**
	 * Replace the content of this ContentMeasurement object from a PHP array.
	 * The data could be supplied from an API call after json_decode(..., true); or generated manually.
	 *
	 * @param array $decodedJsonObject Object data as PHP array
	 * @return void
	 */
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
	
	/**
	 * Coerce a plain PHP array into a new strongly-typed ContentMeasurement object.
	 * The data could be supplied from an API call after json_decode(..., true); or generated manually.
	 *
	 * @param array $decodedJsonObject Object data as PHP array
	 * @return ContentMeasurement
	 */
	public static function createFrom(array $decodedJsonObject)
	{
		$retn = new ContentMeasurement();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}
	
	/**
	 * Convert this ContentMeasurement object into a plain PHP array.
	 *
	 * @param bool $forJSONEncode Set true to use stdClass() for empty objects instead of just [], in order to
	 *                             accurately roundtrip empty objects/arrays through json_encode() compatibility
	 * @return array
	 */
	public function toArray($forJSONEncode=false)
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

