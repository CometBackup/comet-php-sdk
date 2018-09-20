<?php

namespace Comet;

class ConstellationStatusAPIResponse {
	
	/**
	 * @var boolean
	 */
	public $DeletionEnabled = false;
	
	/**
	 * @var string[]
	 */
	public $Targets = [];
	
	/**
	 * @var string[]
	 */
	public $TargetNames = [];
	
	/**
	 * @var \Comet\ConstellationStats
	 */
	public $Stats = null;
	
	/**
	 * Preserve unknown properties when dealing with future server versions.
	 * You can recursively remove all unknown properties by calling RemoveUnknownProperties().
	 *
	 * @var array
	 */
	private $__unknown_properties = [];
	
	public function inflateFrom(array $decodedJsonObject)
	{
		$this->DeletionEnabled = (bool)($decodedJsonObject['DeletionEnabled']);
		
		$val_2 = [];
		for($i_2 = 0; $i_2 < count($decodedJsonObject['Targets']); ++$i_2) {
			$val_2[] = (string)($decodedJsonObject['Targets'][$i_2]);
		}
		$this->Targets = $val_2;
		
		if (array_key_exists('TargetNames', $decodedJsonObject)) {
			$val_2 = [];
			for($i_2 = 0; $i_2 < count($decodedJsonObject['TargetNames']); ++$i_2) {
				$val_2[] = (string)($decodedJsonObject['TargetNames'][$i_2]);
			}
			$this->TargetNames = $val_2;
			
		}
		$this->Stats = \Comet\ConstellationStats::createFrom(isset($decodedJsonObject['Stats']) ? $decodedJsonObject['Stats'] : []);
		
		foreach($decodedJsonObject as $k => $v) {
			switch($k) {
			case 'DeletionEnabled':
			case 'Targets':
			case 'TargetNames':
			case 'Stats':
				break;
			default:
				$this->__unknown_properties[$k] = $v;
			}
		}
	}
	
	public static function createFrom(array $decodedJsonObject)
	{
		$retn = new ConstellationStatusAPIResponse();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}
	
	public function toArray($for_json_encode=false)
	{
		$ret = [];
		$ret["DeletionEnabled"] = $this->DeletionEnabled;
		{
			$c0 = [];
			for($i0 = 0; $i0 < count($this->Targets); ++$i0) {
				$val0 = $this->Targets[$i0];
				$c0[] = $val0;
			}
			$ret["Targets"] = $c0;
		}
		{
			$c0 = [];
			for($i0 = 0; $i0 < count($this->TargetNames); ++$i0) {
				$val0 = $this->TargetNames[$i0];
				$c0[] = $val0;
			}
			$ret["TargetNames"] = $c0;
		}
		if ( $this->Stats === null ) {
			$ret["Stats"] = $for_json_encode ? (object)[] : [];
		} else {
			$ret["Stats"] = $this->Stats->toArray($for_json_encode);
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
		if ($this->Stats !== null) {
			$this->Stats->RemoveUnknownProperties();
		}
	}
	
}

