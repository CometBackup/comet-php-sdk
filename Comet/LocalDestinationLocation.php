<?php

namespace Comet;

class LocalDestinationLocation {
	
	/**
	 * @var string
	 */
	public $LocalcopyPath = "";
	
	/**
	 * @var string
	 */
	public $LocalcopyWinSMBUsername = "";
	
	/**
	 * @var string
	 */
	public $LocalcopyWinSMBPassword = "";
	
	/**
	 * @var int
	 */
	public $LocalcopyWinSMBPasswordFormat = 0;
	
	/**
	 * Preserve unknown properties when dealing with future server versions.
	 * You can recursively remove all unknown properties by calling RemoveUnknownProperties().
	 *
	 * @var array
	 */
	private $__unknown_properties = [];
	
	public function inflateFrom(array $decodedJsonObject)
	{
		$this->LocalcopyPath = (string)($decodedJsonObject['LocalcopyPath']);
		
		$this->LocalcopyWinSMBUsername = (string)($decodedJsonObject['LocalcopyWinSMBUsername']);
		
		$this->LocalcopyWinSMBPassword = (string)($decodedJsonObject['LocalcopyWinSMBPassword']);
		
		$this->LocalcopyWinSMBPasswordFormat = (int)($decodedJsonObject['LocalcopyWinSMBPasswordFormat']);
		
		foreach($decodedJsonObject as $k => $v) {
			switch($k) {
			case 'LocalcopyPath':
			case 'LocalcopyWinSMBUsername':
			case 'LocalcopyWinSMBPassword':
			case 'LocalcopyWinSMBPasswordFormat':
				break;
			default:
				$this->__unknown_properties[$k] = $v;
			}
		}
	}
	
	public static function createFrom(array $decodedJsonObject)
	{
		$retn = new LocalDestinationLocation();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}
	
	public function toArray($for_json_encode=false)
	{
		$ret = [];
		$ret["LocalcopyPath"] = $this->LocalcopyPath;
		$ret["LocalcopyWinSMBUsername"] = $this->LocalcopyWinSMBUsername;
		$ret["LocalcopyWinSMBPassword"] = $this->LocalcopyWinSMBPassword;
		$ret["LocalcopyWinSMBPasswordFormat"] = $this->LocalcopyWinSMBPasswordFormat;
		
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

