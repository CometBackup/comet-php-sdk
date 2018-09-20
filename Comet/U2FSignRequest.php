<?php

namespace Comet;

class U2FSignRequest {
	
	/**
	 * @var string
	 */
	public $ChallengeID = "";
	
	/**
	 * @var string
	 */
	public $ChallengeData = "";
	
	/**
	 * @var string
	 */
	public $AppID = "";
	
	/**
	 * @var \Comet\U2FRegisteredKey[]
	 */
	public $RegisteredKeys = [];
	
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
		
		$this->ChallengeData = (string)($decodedJsonObject['ChallengeData']);
		
		$this->AppID = (string)($decodedJsonObject['AppID']);
		
		$val_2 = [];
		for($i_2 = 0; $i_2 < count($decodedJsonObject['RegisteredKeys']); ++$i_2) {
			$val_2[] = \Comet\U2FRegisteredKey::createFrom(isset($decodedJsonObject['RegisteredKeys'][$i_2]) ? $decodedJsonObject['RegisteredKeys'][$i_2] : []);
		}
		$this->RegisteredKeys = $val_2;
		
		foreach($decodedJsonObject as $k => $v) {
			switch($k) {
			case 'ChallengeID':
			case 'ChallengeData':
			case 'AppID':
			case 'RegisteredKeys':
				break;
			default:
				$this->__unknown_properties[$k] = $v;
			}
		}
	}
	
	public static function createFrom(array $decodedJsonObject)
	{
		$retn = new U2FSignRequest();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}
	
	public function toArray($for_json_encode=false)
	{
		$ret = [];
		$ret["ChallengeID"] = $this->ChallengeID;
		$ret["ChallengeData"] = $this->ChallengeData;
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

