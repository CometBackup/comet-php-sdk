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
	 *
	 * @see B2DestinationLocation::RemoveUnknownProperties() Remove all unknown properties
	 * @var array
	 */
	private $__unknown_properties = [];
	
	/**
	 * Replace the content of this B2DestinationLocation object from a PHP array.
	 * The data could be supplied from an API call after json_decode(..., true); or generated manually.
	 *
	 * @param array $decodedJsonObject Object data as PHP array
	 * @return void
	 */
	protected function inflateFrom(array $decodedJsonObject)
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
	
	/**
	 * Coerce a plain PHP array into a new strongly-typed B2DestinationLocation object.
	 *
	 * @param array $decodedJsonObject Object data as PHP array
	 * @return B2DestinationLocation
	 */
	public static function createFrom(array $decodedJsonObject)
	{
		$retn = new B2DestinationLocation();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}
	
	/**
	 * Coerce a JSON string into a new strongly-typed B2DestinationLocation object.
	 *
	 * @param string $JsonString Object data as JSON string
	 * @return B2DestinationLocation
	 */
	public static function createFromJSON($JsonString)
	{
		$decodedJsonObject = json_decode($JsonString, true);
		if (\json_last_error() != \JSON_ERROR_NONE) {
			throw new \Exception("JSON decode failed: " . \json_last_error_msg());
		}
		$retn = new B2DestinationLocation();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}
	
	/**
	 * Convert this B2DestinationLocation object into a plain PHP array.
	 *
	 * @param bool $forJSONEncode Set true to use stdClass() for empty objects instead of just [], in order to
	 *                             accurately roundtrip empty objects/arrays through json_encode() compatibility
	 * @return array
	 */
	public function toArray($forJSONEncode=false)
	{
		$ret = [];
		$ret["AccountID"] = $this->AccountID;
		$ret["Key"] = $this->Key;
		$ret["Bucket"] = $this->Bucket;
		$ret["Prefix"] = $this->Prefix;
		$ret["MaxConnections"] = $this->MaxConnections;
		
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

