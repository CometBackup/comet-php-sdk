<?php

namespace Comet;

class DestinationStatistics {
	
	/**
	 * @var \Comet\SizeMeasurement
	 */
	public $ClientProvidedSize = null;
	
	/**
	 * @var \Comet\ContentMeasurement
	 */
	public $ClientProvidedContent = null;
	
	/**
	 * Preserve unknown properties when dealing with future server versions.
	 * You can recursively remove all unknown properties by calling RemoveUnknownProperties().
	 *
	 * @var array
	 */
	private $__unknown_properties = [];
	
	public function inflateFrom(array $decodedJsonObject)
	{
		$this->ClientProvidedSize = \Comet\SizeMeasurement::createFrom(isset($decodedJsonObject['ClientProvidedSize']) ? $decodedJsonObject['ClientProvidedSize'] : []);
		
		$this->ClientProvidedContent = \Comet\ContentMeasurement::createFrom(isset($decodedJsonObject['ClientProvidedContent']) ? $decodedJsonObject['ClientProvidedContent'] : []);
		
		foreach($decodedJsonObject as $k => $v) {
			switch($k) {
			case 'ClientProvidedSize':
			case 'ClientProvidedContent':
				break;
			default:
				$this->__unknown_properties[$k] = $v;
			}
		}
	}
	
	public static function createFrom(array $decodedJsonObject)
	{
		$retn = new DestinationStatistics();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}
	
	public function toArray($for_json_encode=false)
	{
		$ret = [];
		if ( $this->ClientProvidedSize === null ) {
			$ret["ClientProvidedSize"] = $for_json_encode ? (object)[] : [];
		} else {
			$ret["ClientProvidedSize"] = $this->ClientProvidedSize->toArray($for_json_encode);
		}
		if ( $this->ClientProvidedContent === null ) {
			$ret["ClientProvidedContent"] = $for_json_encode ? (object)[] : [];
		} else {
			$ret["ClientProvidedContent"] = $this->ClientProvidedContent->toArray($for_json_encode);
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
		if ($this->ClientProvidedSize !== null) {
			$this->ClientProvidedSize->RemoveUnknownProperties();
		}
		if ($this->ClientProvidedContent !== null) {
			$this->ClientProvidedContent->RemoveUnknownProperties();
		}
	}
	
}

