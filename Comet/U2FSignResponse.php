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
	 * You can recursively remove all unknown properties by calling RemoveUnknownProperties().
	 *
	 * @var array
	 */
	private $__unknown_properties = [];
	
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
	
	public static function createFrom(array $decodedJsonObject)
	{
		$retn = new U2FSignResponse();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}
	
	public function toArray($for_json_encode=false)
	{
		$ret = [];
		$ret["ChallengeID"] = $this->ChallengeID;
		$ret["KeyHandle"] = $this->KeyHandle;
		$ret["Signature"] = $this->Signature;
		$ret["ClientData"] = $this->ClientData;
		
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

