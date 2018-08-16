<?php

namespace Comet;

class RetentionPolicy {
	
	/**
	 * @var int
	 */
	public $Mode = 0;
	
	/**
	 * @var \Comet\RetentionRange[]
	 */
	public $Ranges = [];
	
	/**
	 * Preserve unknown properties when dealing with future server versions.
	 * You can recursively remove all unknown properties by calling RemoveUnknownProperties().
	 *
	 * @var array
	 */
	private $__unknown_properties = [];
	
	public function inflateFrom(array $decodedJsonObject)
	{
		$this->Mode = (int)($decodedJsonObject['Mode']);
		
		$val_2 = [];
		for($i_2 = 0; $i_2 < count($decodedJsonObject['Ranges']); ++$i_2) {
			$val_2[] = \Comet\RetentionRange::createFrom(isset($decodedJsonObject['Ranges'][$i_2]) ? $decodedJsonObject['Ranges'][$i_2] : []);
		}
		$this->Ranges = $val_2;
		
		foreach($decodedJsonObject as $k => $v) {
			switch($k) {
			case 'Mode':
			case 'Ranges':
				break;
			default:
				$this->__unknown_properties[$k] = $v;
			}
		}
	}
	
	public static function createFrom(array $decodedJsonObject)
	{
		$retn = new RetentionPolicy();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}
	
	public function toArray($for_json_encode=false)
	{
		$ret = [];
		$ret["Mode"] = $this->Mode;
		{
			$c0 = [];
			for($i0 = 0; $i0 < count($this->Ranges); ++$i0) {
				if ( $this->Ranges[$i0] === null ) {
					$val0 = $for_json_encode ? (object)[] : [];
				} else {
					$val0 = $this->Ranges[$i0]->toArray($for_json_encode);
				}
				$c0[] = $val0;
			}
			$ret["Ranges"] = $c0;
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

