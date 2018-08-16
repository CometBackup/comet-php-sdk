<?php

namespace Comet;

class B2DestinationLocation {
	
	/**
	 * @var string
	 */
	public $AccountID = "";
	
	/**
	 * @var string
	 */
	public $Key = "";
	
	/**
	 * @var string
	 */
	public $Bucket = "";
	
	/**
	 * @var string
	 */
	public $Prefix = "";
	
	/**
	 * @var int
	 */
	public $MaxConnections = 0;
	
	/**
	 * Preserve unknown properties when dealing with future server versions.
	 * You can recursively remove all unknown properties by calling RemoveUnknownProperties().
	 *
	 * @var array
	 */
	private $__unknown_properties = [];
	
	public function inflateFrom(array $decodedJsonObject)
	{
		if (array_key_exists('AccountID', $decodedJsonObject)) {
			$this->AccountID = (string)($decodedJsonObject['AccountID']);
			
		}
		if (array_key_exists('Key', $decodedJsonObject)) {
			$this->Key = (string)($decodedJsonObject['Key']);
			
		}
		if (array_key_exists('Bucket', $decodedJsonObject)) {
			$this->Bucket = (string)($decodedJsonObject['Bucket']);
			
		}
		if (array_key_exists('Prefix', $decodedJsonObject)) {
			$this->Prefix = (string)($decodedJsonObject['Prefix']);
			
		}
		if (array_key_exists('MaxConnections', $decodedJsonObject)) {
			$this->MaxConnections = (int)($decodedJsonObject['MaxConnections']);
			
		}
		foreach($decodedJsonObject as $k => $v) {
			switch($k) {
			case 'AccountID':
			case 'Key':
			case 'Bucket':
			case 'Prefix':
			case 'MaxConnections':
				break;
			default:
				$this->__unknown_properties[$k] = $v;
			}
		}
	}
	
	public static function createFrom(array $decodedJsonObject)
	{
		$retn = new B2DestinationLocation();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}
	
	public function toArray($for_json_encode=false)
	{
		$ret = [];
		$ret["AccountID"] = $this->AccountID;
		$ret["Key"] = $this->Key;
		$ret["Bucket"] = $this->Bucket;
		$ret["Prefix"] = $this->Prefix;
		$ret["MaxConnections"] = $this->MaxConnections;
		
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

