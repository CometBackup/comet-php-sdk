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
	 * Replace the content of this ReplicatorStateAPIResponse object from a PHP \stdClass.
	 * The data could be supplied from an API call after json_decode(...); or generated manually.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return void
	 */
	protected function inflateFrom(\stdClass $sc)
	{
		if (property_exists($sc, 'Description')) {
			$this->Description = (string)($sc->Description);
		}
		if (property_exists($sc, 'RemoteServerID')) {
			$this->RemoteServerID = (string)($sc->RemoteServerID);
		}
		if (property_exists($sc, 'DisplayClass')) {
			$this->DisplayClass = (int)($sc->DisplayClass);
		}
		if (property_exists($sc, 'ActiveWorkers')) {
			$this->ActiveWorkers = (int)($sc->ActiveWorkers);
		}
		if (property_exists($sc, 'TotalWorkers')) {
			$this->TotalWorkers = (int)($sc->TotalWorkers);
		}
		if (property_exists($sc, 'State')) {
			$this->State = (int)($sc->State);
		}
		if (property_exists($sc, 'ItemsQueued')) {
			$this->ItemsQueued = (int)($sc->ItemsQueued);
		}
		if (property_exists($sc, 'BytesQueued')) {
			$this->BytesQueued = (int)($sc->BytesQueued);
		}
		if (property_exists($sc, 'LastWorkerSubmitTime')) {
			$this->LastWorkerSubmitTime = (int)($sc->LastWorkerSubmitTime);
		}
		if (property_exists($sc, 'CurrentTime')) {
			$this->CurrentTime = (int)($sc->CurrentTime);
		}
		if (property_exists($sc, 'ItemsReplicated')) {
			$this->ItemsReplicated = (int)($sc->ItemsReplicated);
		}
		if (property_exists($sc, 'BytesReplicated')) {
			$this->BytesReplicated = (int)($sc->BytesReplicated);
		}
		foreach(get_object_vars($sc) as $k => $v) {
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
	 * Coerce a stdClass into a new strongly-typed ReplicatorStateAPIResponse object.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return ReplicatorStateAPIResponse
	 */
	public static function createFromStdclass(\stdClass $sc)
	{
		$retn = new ReplicatorStateAPIResponse();
		$retn->inflateFrom($sc);
		return $retn;
	}
	
	/**
	 * Coerce a plain PHP array into a new strongly-typed ReplicatorStateAPIResponse object.
	 * Because the Comet Server requires strict distinction between empty objects ({}) and arrays ([]),
	 * the result of this method may not be safe to re-submit to the Comet Server.
	 *
	 * @param array $arr Object data as PHP array
	 * @return ReplicatorStateAPIResponse
	 */
	public static function createFromArray(array $arr)
	{
		$stdClass = json_decode(json_encode($arr));
		return self::createFromStdclass($stdClass);
	}
	
	/**
	 * Coerce a plain PHP array into a new strongly-typed ReplicatorStateAPIResponse object.
	 * Because the Comet Server requires strict distinction between empty objects ({}) and arrays ([]),
	 * the result of this method may not be safe to re-submit to the Comet Server.
	 *
	 * @deprecated 3.0.0 Unsafe for round-trip server traversal. You should either 
	 *             (A) acknowledge this and continue by switching to createFromArray, or
	 *             (b) switch to the roundtrip-safe createFromStdclass alternative.
	 * @param array $arr Object data as PHP array
	 * @return ReplicatorStateAPIResponse
	 */
	public static function createFrom(array $arr)
	{
		return self::createFromArray($arr);
	}
	
	/**
	 * Coerce a JSON string into a new strongly-typed ReplicatorStateAPIResponse object.
	 *
	 * @param string $JsonString Object data as JSON string
	 * @return ReplicatorStateAPIResponse
	 */
	public static function createFromJSON($JsonString)
	{
		$decodedJsonObject = json_decode($JsonString); // as stdClass
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
	 * Unknown properties may still be represented as \stdClass objects.
	 *
	 * @param bool $for_json_encode Represent empty key-value maps as \stdClass instead of plain PHP arrays
	 * @return array
	 */
	public function toArray($for_json_encode = false)
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
			$ret[$k] = $v;
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
		$arr = self::toArray(true);
		if (count($arr) === 0) {
			return "{}"; // object
		} else {
			return json_encode($arr);
		}
	}
	
	/**
	 * Convert this object to a PHP \stdClass.
	 * This may be a more convenient format for working with unknown class properties.
	 *
	 * @return \stdClass
	 */
	public function toStdClass()
	{
		$arr = self::toArray(false);
		if (count($arr) === 0) {
			return new \stdClass();
		} else {
			return json_decode(json_encode($arr));
		}
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

