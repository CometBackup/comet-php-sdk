<?php

namespace Comet;

class U2FSignResponse {
	
	/**
	 * @var string
	 */
	public $ChallengeID = "";
	
	/**
	 * @var string
	 */
	public $KeyHandle = "";
	
	/**
	 * @var string
	 */
	public $Signature = "";
	
	/**
	 * @var string
	 */
	public $ClientData = "";
	
	/**
	 * Preserve unknown properties when dealing with future server versions.
	 *
	 * @see U2FSignResponse::RemoveUnknownProperties() Remove all unknown properties
	 * @var array
	 */
	private $__unknown_properties = [];
	
	/**
	 * Replace the content of this U2FSignResponse object from a PHP array.
	 * The data could be supplied from an API call after json_decode(..., true); or generated manually.
	 *
	 * @param array $decodedJsonObject Object data as PHP array
	 * @return void
	 */
	public function inflateFrom(array $decodedJsonObject)
	{
		$this->ChallengeID = (string)($decodedJsonObject['ChallengeID']);
		
		$this->KeyHandle = (string)($decodedJsonObject['KeyHandle']);
		
		$this->Signature = (string)($decodedJsonObject['Signature']);
		
		$this->ClientData = (string)($decodedJsonObject['ClientData']);
		
		foreach($decodedJsonObject as $k => $v) {
			switch($k) {
			case 'ChallengeID':
			case 'KeyHandle':
			case 'Signature':
			case 'ClientData':
				break;
			default:
				$this->__unknown_properties[$k] = $v;
			}
		}
	}
	
	/**
	 * Coerce a plain PHP array into a new strongly-typed U2FSignResponse object.
	 * The data could be supplied from an API call after json_decode(..., true); or generated manually.
	 *
	 * @param array $decodedJsonObject Object data as PHP array
	 * @return U2FSignResponse
	 */
	public static function createFrom(array $decodedJsonObject)
	{
		$retn = new U2FSignResponse();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}
	
	/**
	 * Convert this U2FSignResponse object into a plain PHP array.
	 *
	 * @param bool $forJSONEncode Set true to use stdClass() for empty objects instead of just [], in order to
	 *                             accurately roundtrip empty objects/arrays through json_encode() compatibility
	 * @return array
	 */
	public function toArray($forJSONEncode=false)
	{
		$ret = [];
		$ret["ChallengeID"] = $this->ChallengeID;
		$ret["KeyHandle"] = $this->KeyHandle;
		$ret["Signature"] = $this->Signature;
		$ret["ClientData"] = $this->ClientData;
		
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

