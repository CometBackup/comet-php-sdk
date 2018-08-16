<?php

namespace Comet;

class GetProfileAndHashResponseMessage {
	
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
	public $ProfileHash = "";
	
	/**
	 * @var \Comet\UserProfileConfig
	 */
	public $Profile = null;
	
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
		
		$this->ProfileHash = (string)($decodedJsonObject['ProfileHash']);
		
		$this->Profile = \Comet\UserProfileConfig::createFrom(isset($decodedJsonObject['Profile']) ? $decodedJsonObject['Profile'] : []);
		
		foreach($decodedJsonObject as $k => $v) {
			switch($k) {
			case 'Status':
			case 'Message':
			case 'ProfileHash':
			case 'Profile':
				break;
			default:
				$this->__unknown_properties[$k] = $v;
			}
		}
	}
	
	public static function createFrom(array $decodedJsonObject)
	{
		$retn = new GetProfileAndHashResponseMessage();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}
	
	public function toArray($for_json_encode=false)
	{
		$ret = [];
		$ret["Status"] = $this->Status;
		$ret["Message"] = $this->Message;
		$ret["ProfileHash"] = $this->ProfileHash;
		if ( $this->Profile === null ) {
			$ret["Profile"] = $for_json_encode ? (object)[] : [];
		} else {
			$ret["Profile"] = $this->Profile->toArray($for_json_encode);
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
		if ($this->Profile !== null) {
			$this->Profile->RemoveUnknownProperties();
		}
	}
	
}

