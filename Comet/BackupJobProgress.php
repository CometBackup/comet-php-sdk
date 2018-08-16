<?php

namespace Comet;

class BackupJobProgress {
	
	/**
	 * @var int
	 */
	public $Counter = 0;
	
	/**
	 * @var int
	 */
	public $SentTime = 0;
	
	/**
	 * @var int
	 */
	public $RecievedTime = 0;
	
	/**
	 * @var int
	 */
	public $BytesDone = 0;
	
	/**
	 * @var int
	 */
	public $ItemsDone = 0;
	
	/**
	 * Preserve unknown properties when dealing with future server versions.
	 * You can recursively remove all unknown properties by calling RemoveUnknownProperties().
	 *
	 * @var array
	 */
	private $__unknown_properties = [];
	
	public function inflateFrom(array $decodedJsonObject)
	{
		$this->Counter = (int)($decodedJsonObject['Counter']);
		
		$this->SentTime = (int)($decodedJsonObject['SentTime']);
		
		$this->RecievedTime = (int)($decodedJsonObject['RecievedTime']);
		
		$this->BytesDone = (int)($decodedJsonObject['BytesDone']);
		
		$this->ItemsDone = (int)($decodedJsonObject['ItemsDone']);
		
		foreach($decodedJsonObject as $k => $v) {
			switch($k) {
			case 'Counter':
			case 'SentTime':
			case 'RecievedTime':
			case 'BytesDone':
			case 'ItemsDone':
				break;
			default:
				$this->__unknown_properties[$k] = $v;
			}
		}
	}
	
	public static function createFrom(array $decodedJsonObject)
	{
		$retn = new BackupJobProgress();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}
	
	public function toArray($for_json_encode=false)
	{
		$ret = [];
		$ret["Counter"] = $this->Counter;
		$ret["SentTime"] = $this->SentTime;
		$ret["RecievedTime"] = $this->RecievedTime;
		$ret["BytesDone"] = $this->BytesDone;
		$ret["ItemsDone"] = $this->ItemsDone;
		
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

