<?php

namespace Comet;

class BucketProperties {
	
	/**
	 * @var int
	 */
	public $CreateTime = 0;
	
	/**
	 * @var int
	 */
	public $ReadWriteKeyFormat = 0;
	
	/**
	 * @var string
	 */
	public $ReadWriteKey = "";
	
	/**
	 * @var \Comet\SizeMeasurement
	 */
	public $Size = null;
	
	/**
	 * Preserve unknown properties when dealing with future server versions.
	 * You can recursively remove all unknown properties by calling RemoveUnknownProperties().
	 *
	 * @var array
	 */
	private $__unknown_properties = [];
	
	public function inflateFrom(array $decodedJsonObject)
	{
		$this->CreateTime = (int)($decodedJsonObject['CreateTime']);
		
		$this->ReadWriteKeyFormat = (int)($decodedJsonObject['ReadWriteKeyFormat']);
		
		$this->ReadWriteKey = (string)($decodedJsonObject['ReadWriteKey']);
		
		$this->Size = \Comet\SizeMeasurement::createFrom(isset($decodedJsonObject['Size']) ? $decodedJsonObject['Size'] : []);
		
		foreach($decodedJsonObject as $k => $v) {
			switch($k) {
			case 'CreateTime':
			case 'ReadWriteKeyFormat':
			case 'ReadWriteKey':
			case 'Size':
				break;
			default:
				$this->__unknown_properties[$k] = $v;
			}
		}
	}
	
	public static function createFrom(array $decodedJsonObject)
	{
		$retn = new BucketProperties();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}
	
	public function toArray($for_json_encode=false)
	{
		$ret = [];
		$ret["CreateTime"] = $this->CreateTime;
		$ret["ReadWriteKeyFormat"] = $this->ReadWriteKeyFormat;
		$ret["ReadWriteKey"] = $this->ReadWriteKey;
		if ( $this->Size === null ) {
			$ret["Size"] = $for_json_encode ? (object)[] : [];
		} else {
			$ret["Size"] = $this->Size->toArray($for_json_encode);
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
		if ($this->Size !== null) {
			$this->Size->RemoveUnknownProperties();
		}
	}
	
}

