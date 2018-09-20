<?php

/**
 * Copyright (c) 2018 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 * 
 * SPDX-License-Identifier: MIT
 */

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
	 *
	 * @see ReplicatorStateAPIResponse::RemoveUnknownProperties() Remove all unknown properties
	 * @var array
	 */
	private $__unknown_properties = [];
	
	/**
	 * Replace the content of this ReplicatorStateAPIResponse object from a PHP array.
	 * The data could be supplied from an API call after json_decode(..., true); or generated manually.
	 *
	 * @param array $decodedJsonObject Object data as PHP array
	 * @return void
	 */
	protected function inflateFrom(array $decodedJsonObject)
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
	
	/**
	 * Coerce a plain PHP array into a new strongly-typed ReplicatorStateAPIResponse object.
	 *
	 * @param array $decodedJsonObject Object data as PHP array
	 * @return ReplicatorStateAPIResponse
	 */
	public static function createFrom(array $decodedJsonObject)
	{
		$retn = new ReplicatorStateAPIResponse();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}
	
	/**
	 * Coerce a JSON string into a new strongly-typed ReplicatorStateAPIResponse object.
	 *
	 * @param string $JsonString Object data as JSON string
	 * @return ReplicatorStateAPIResponse
	 */
	public static function createFromJSON($JsonString)
	{
		$decodedJsonObject = json_decode($JsonString, true);
		if (\json_last_error() != \JSON_ERROR_NONE) {
			throw new \Exception("JSON decode failed: " . \json_last_error_msg());
		}
		$retn = new ReplicatorStateAPIResponse();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}
	
	/**
	 * Convert this ReplicatorStateAPIResponse object into a plain PHP array.
	 *
	 * @param bool $forJSONEncode Set true to use stdClass() for empty objects instead of just [], in order to
	 *                             accurately roundtrip empty objects/arrays through json_encode() compatibility
	 * @return array
	 */
	public function toArray($forJSONEncode=false)
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

