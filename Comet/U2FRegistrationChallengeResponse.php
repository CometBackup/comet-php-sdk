<?php

namespace Comet;

class U2FRegistrationChallengeResponse {
	
	/**
	 * @var int
	 */
	public $Status = 0;
	
	/**
	 * @var string
	 */
	public $Message = "";
	
	/**
	 * @var string
	 */
	public $ChallengeID = "";
	
	/**
	 * @var string
	 */
	public $AppID = "";
	
	/**
	 * @var \Comet\U2FRegisteredKey[]
	 */
	public $RegisteredKeys = [];
	
	/**
	 * @var \Comet\U2FRegisterRequest[]
	 */
	public $RegisterRequests = [];
	
	/**
	 * Preserve unknown properties when dealing with future server versions.
	 * You can recursively remove all unknown properties by calling RemoveUnknownProperties().
	 *
	 * @var array
	 */
	private $__unknown_properties = [];
	
	public function inflateFrom(array $decodedJsonObject)
	{
		$this->Status = (int)($decodedJsonObject['Status']);
		
		$this->Message = (string)($decodedJsonObject['Message']);
		
		$this->ChallengeID = (string)($decodedJsonObject['ChallengeID']);
		
		$this->AppID = (string)($decodedJsonObject['AppID']);
		
		$val_2 = [];
		for($i_2 = 0; $i_2 < count($decodedJsonObject['RegisteredKeys']); ++$i_2) {
			$val_2[] = \Comet\U2FRegisteredKey::createFrom(isset($decodedJsonObject['RegisteredKeys'][$i_2]) ? $decodedJsonObject['RegisteredKeys'][$i_2] : []);
		}
		$this->RegisteredKeys = $val_2;
		
		$val_2 = [];
		for($i_2 = 0; $i_2 < count($decodedJsonObject['RegisterRequests']); ++$i_2) {
			$val_2[] = \Comet\U2FRegisterRequest::createFrom(isset($decodedJsonObject['RegisterRequests'][$i_2]) ? $decodedJsonObject['RegisterRequests'][$i_2] : []);
		}
		$this->RegisterRequests = $val_2;
		
		foreach($decodedJsonObject as $k => $v) {
			switch($k) {
			case 'Status':
			case 'Message':
			case 'ChallengeID':
			case 'AppID':
			case 'RegisteredKeys':
			case 'RegisterRequests':
				break;
			default:
				$this->__unknown_properties[$k] = $v;
			}
		}
	}
	
	public static function createFrom(array $decodedJsonObject)
	{
		$retn = new U2FRegistrationChallengeResponse();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}
	
	public function toArray($for_json_encode=false)
	{
		$ret = [];
		$ret["Status"] = $this->Status;
		$ret["Message"] = $this->Message;
		$ret["ChallengeID"] = $this->ChallengeID;
		$ret["AppID"] = $this->AppID;
		{
			$c0 = [];
			for($i0 = 0; $i0 < count($this->RegisteredKeys); ++$i0) {
				if ( $this->RegisteredKeys[$i0] === null ) {
					$val0 = $for_json_encode ? (object)[] : [];
				} else {
					$val0 = $this->RegisteredKeys[$i0]->toArray($for_json_encode);
				}
				$c0[] = $val0;
			}
			$ret["RegisteredKeys"] = $c0;
		}
		{
			$c0 = [];
			for($i0 = 0; $i0 < count($this->RegisterRequests); ++$i0) {
				if ( $this->RegisterRequests[$i0] === null ) {
					$val0 = $for_json_encode ? (object)[] : [];
				} else {
					$val0 = $this->RegisterRequests[$i0]->toArray($for_json_encode);
				}
				$c0[] = $val0;
			}
			$ret["RegisterRequests"] = $c0;
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
	}
	
}

