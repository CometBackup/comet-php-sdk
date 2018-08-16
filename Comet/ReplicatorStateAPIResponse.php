<?php

namespace Comet;

class ReplicatorStateAPIResponse {
	
	/**
	 * @var string
	 */
	public $Description = "";
	
	/**
	 * @var string
	 */
	public $RemoteServerID = "";
	
	/**
	 * @var int
	 */
	public $DisplayClass = 0;
	
	/**
	 * @var int
	 */
	public $ActiveWorkers = 0;
	
	/**
	 * @var int
	 */
	public $TotalWorkers = 0;
	
	/**
	 * @var int
	 */
	public $State = 0;
	
	/**
	 * @var int
	 */
	public $ItemsQueued = 0;
	
	/**
	 * @var int
	 */
	public $BytesQueued = 0;
	
	/**
	 * @var int
	 */
	public $LastWorkerSubmitTime = 0;
	
	/**
	 * @var int
	 */
	public $CurrentTime = 0;
	
	/**
	 * @var int
	 */
	public $ItemsReplicated = 0;
	
	/**
	 * @var int
	 */
	public $BytesReplicated = 0;
	
	/**
	 * Preserve unknown properties when dealing with future server versions.
	 * You can recursively remove all unknown properties by calling RemoveUnknownProperties().
	 *
	 * @var array
	 */
	private $__unknown_properties = [];
	
	public function inflateFrom(array $decodedJsonObject)
	{
		$this->Description = (string)($decodedJsonObject['Description']);
		
		$this->RemoteServerID = (string)($decodedJsonObject['RemoteServerID']);
		
		$this->DisplayClass = (int)($decodedJsonObject['DisplayClass']);
		
		$this->ActiveWorkers = (int)($decodedJsonObject['ActiveWorkers']);
		
		$this->TotalWorkers = (int)($decodedJsonObject['TotalWorkers']);
		
		$this->State = (int)($decodedJsonObject['State']);
		
		$this->ItemsQueued = (int)($decodedJsonObject['ItemsQueued']);
		
		$this->BytesQueued = (int)($decodedJsonObject['BytesQueued']);
		
		$this->LastWorkerSubmitTime = (int)($decodedJsonObject['LastWorkerSubmitTime']);
		
		$this->CurrentTime = (int)($decodedJsonObject['CurrentTime']);
		
		$this->ItemsReplicated = (int)($decodedJsonObject['ItemsReplicated']);
		
		$this->BytesReplicated = (int)($decodedJsonObject['BytesReplicated']);
		
		foreach($decodedJsonObject as $k => $v) {
			switch($k) {
			case 'Description':
			case 'RemoteServerID':
			case 'DisplayClass':
			case 'ActiveWorkers':
			case 'TotalWorkers':
			case 'State':
			case 'ItemsQueued':
			case 'BytesQueued':
			case 'LastWorkerSubmitTime':
			case 'CurrentTime':
			case 'ItemsReplicated':
			case 'BytesReplicated':
				break;
			default:
				$this->__unknown_properties[$k] = $v;
			}
		}
	}
	
	public static function createFrom(array $decodedJsonObject)
	{
		$retn = new ReplicatorStateAPIResponse();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}
	
	public function toArray($for_json_encode=false)
	{
		$ret = [];
		$ret["Description"] = $this->Description;
		$ret["RemoteServerID"] = $this->RemoteServerID;
		$ret["DisplayClass"] = $this->DisplayClass;
		$ret["ActiveWorkers"] = $this->ActiveWorkers;
		$ret["TotalWorkers"] = $this->TotalWorkers;
		$ret["State"] = $this->State;
		$ret["ItemsQueued"] = $this->ItemsQueued;
		$ret["BytesQueued"] = $this->BytesQueued;
		$ret["LastWorkerSubmitTime"] = $this->LastWorkerSubmitTime;
		$ret["CurrentTime"] = $this->CurrentTime;
		$ret["ItemsReplicated"] = $this->ItemsReplicated;
		$ret["BytesReplicated"] = $this->BytesReplicated;
		
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

