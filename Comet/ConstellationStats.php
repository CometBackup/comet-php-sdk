<?php

namespace Comet;

class ConstellationStats {
	
	/**
	 * @var int
	 */
	public $LastCheckStart = 0;
	
	/**
	 * @var int
	 */
	public $TotalChecksStarted = 0;
	
	/**
	 * @var int
	 */
	public $TotalBucketsDeleted = 0;
	
	/**
	 * @var int
	 */
	public $ChecksCurrentlyActive = 0;
	
	/**
	 * Preserve unknown properties when dealing with future server versions.
	 * You can recursively remove all unknown properties by calling RemoveUnknownProperties().
	 *
	 * @var array
	 */
	private $__unknown_properties = [];
	
	public function inflateFrom(array $decodedJsonObject)
	{
		$this->LastCheckStart = (int)($decodedJsonObject['LastCheckStart']);
		
		$this->TotalChecksStarted = (int)($decodedJsonObject['TotalChecksStarted']);
		
		$this->TotalBucketsDeleted = (int)($decodedJsonObject['TotalBucketsDeleted']);
		
		$this->ChecksCurrentlyActive = (int)($decodedJsonObject['ChecksCurrentlyActive']);
		
		foreach($decodedJsonObject as $k => $v) {
			switch($k) {
			case 'LastCheckStart':
			case 'TotalChecksStarted':
			case 'TotalBucketsDeleted':
			case 'ChecksCurrentlyActive':
				break;
			default:
				$this->__unknown_properties[$k] = $v;
			}
		}
	}
	
	public static function createFrom(array $decodedJsonObject)
	{
		$retn = new ConstellationStats();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}
	
	public function toArray($for_json_encode=false)
	{
		$ret = [];
		$ret["LastCheckStart"] = $this->LastCheckStart;
		$ret["TotalChecksStarted"] = $this->TotalChecksStarted;
		$ret["TotalBucketsDeleted"] = $this->TotalBucketsDeleted;
		$ret["ChecksCurrentlyActive"] = $this->ChecksCurrentlyActive;
		
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

