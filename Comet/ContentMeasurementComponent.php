<?php

namespace Comet;

class ContentMeasurementComponent {
	
	/**
	 * @var int
	 */
	public $Bytes = 0;
	
	/**
	 * @var string[]
	 */
	public $UsedBy = [];
	
	/**
	 * Preserve unknown properties when dealing with future server versions.
	 * You can recursively remove all unknown properties by calling RemoveUnknownProperties().
	 *
	 * @var array
	 */
	private $__unknown_properties = [];
	
	public function inflateFrom(array $decodedJsonObject)
	{
		$this->Bytes = (int)($decodedJsonObject['Bytes']);
		
		$val_2 = [];
		for($i_2 = 0; $i_2 < count($decodedJsonObject['UsedBy']); ++$i_2) {
			$val_2[] = (string)($decodedJsonObject['UsedBy'][$i_2]);
		}
		$this->UsedBy = $val_2;
		
		foreach($decodedJsonObject as $k => $v) {
			switch($k) {
			case 'Bytes':
			case 'UsedBy':
				break;
			default:
				$this->__unknown_properties[$k] = $v;
			}
		}
	}
	
	public static function createFrom(array $decodedJsonObject)
	{
		$retn = new ContentMeasurementComponent();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}
	
	public function toArray($for_json_encode=false)
	{
		$ret = [];
		$ret["Bytes"] = $this->Bytes;
		{
			$c0 = [];
			for($i0 = 0; $i0 < count($this->UsedBy); ++$i0) {
				$val0 = $this->UsedBy[$i0];
				$c0[] = $val0;
			}
			$ret["UsedBy"] = $c0;
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

