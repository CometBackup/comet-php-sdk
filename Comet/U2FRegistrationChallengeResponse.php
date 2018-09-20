<?php

/**
 * Copyright (c) 2018 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 * 
 * SPDX-License-Identifier: MIT
 */

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
	 *
	 * @see U2FRegistrationChallengeResponse::RemoveUnknownProperties() Remove all unknown properties
	 * @var array
	 */
	private $__unknown_properties = [];
	
	/**
	 * Replace the content of this U2FRegistrationChallengeResponse object from a PHP array.
	 * The data could be supplied from an API call after json_decode(..., true); or generated manually.
	 *
	 * @param array $decodedJsonObject Object data as PHP array
	 * @return void
	 */
	protected function inflateFrom(array $decodedJsonObject)
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
	
	/**
	 * Coerce a plain PHP array into a new strongly-typed U2FRegistrationChallengeResponse object.
	 *
	 * @param array $decodedJsonObject Object data as PHP array
	 * @return U2FRegistrationChallengeResponse
	 */
	public static function createFrom(array $decodedJsonObject)
	{
		$retn = new U2FRegistrationChallengeResponse();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}
	
	/**
	 * Coerce a JSON string into a new strongly-typed U2FRegistrationChallengeResponse object.
	 *
	 * @param string $JsonString Object data as JSON string
	 * @return U2FRegistrationChallengeResponse
	 */
	public static function createFromJSON($JsonString)
	{
		$decodedJsonObject = json_decode($JsonString, true);
		if (\json_last_error() != \JSON_ERROR_NONE) {
			throw new \Exception("JSON decode failed: " . \json_last_error_msg());
		}
		$retn = new U2FRegistrationChallengeResponse();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}
	
	/**
	 * Convert this U2FRegistrationChallengeResponse object into a plain PHP array.
	 *
	 * @param bool $forJSONEncode Set true to use stdClass() for empty objects instead of just [], in order to
	 *                             accurately roundtrip empty objects/arrays through json_encode() compatibility
	 * @return array
	 */
	public function toArray($forJSONEncode=false)
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

