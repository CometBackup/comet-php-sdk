<?php

namespace Comet;

class FTPDestinationLocation {
	
	/**
	 * @var string
	 */
	public $FTPServer = "";
	
	/**
	 * @var string
	 */
	public $FTPUsername = "";
	
	/**
	 * @var string
	 */
	public $FTPPassword = "";
	
	/**
	 * @var boolean
	 */
	public $FTPBaseUseHomeDirectory = false;
	
	/**
	 * @var string
	 */
	public $FTPCustomBaseDirectory = "";
	
	/**
	 * Preserve unknown properties when dealing with future server versions.
	 * You can recursively remove all unknown properties by calling RemoveUnknownProperties().
	 *
	 * @var array
	 */
	private $__unknown_properties = [];
	
	public function inflateFrom(array $decodedJsonObject)
	{
		$this->FTPServer = (string)($decodedJsonObject['FTPServer']);
		
		$this->FTPUsername = (string)($decodedJsonObject['FTPUsername']);
		
		$this->FTPPassword = (string)($decodedJsonObject['FTPPassword']);
		
		$this->FTPBaseUseHomeDirectory = (bool)($decodedJsonObject['FTPBaseUseHomeDirectory']);
		
		$this->FTPCustomBaseDirectory = (string)($decodedJsonObject['FTPCustomBaseDirectory']);
		
		foreach($decodedJsonObject as $k => $v) {
			switch($k) {
			case 'FTPServer':
			case 'FTPUsername':
			case 'FTPPassword':
			case 'FTPBaseUseHomeDirectory':
			case 'FTPCustomBaseDirectory':
				break;
			default:
				$this->__unknown_properties[$k] = $v;
			}
		}
	}
	
	public static function createFrom(array $decodedJsonObject)
	{
		$retn = new FTPDestinationLocation();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}
	
	public function toArray($for_json_encode=false)
	{
		$ret = [];
		$ret["FTPServer"] = $this->FTPServer;
		$ret["FTPUsername"] = $this->FTPUsername;
		$ret["FTPPassword"] = $this->FTPPassword;
		$ret["FTPBaseUseHomeDirectory"] = $this->FTPBaseUseHomeDirectory;
		$ret["FTPCustomBaseDirectory"] = $this->FTPCustomBaseDirectory;
		
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

