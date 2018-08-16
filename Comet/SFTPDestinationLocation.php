<?php

namespace Comet;

class SFTPDestinationLocation {
	
	/**
	 * @var string
	 */
	public $SFTPServer = "";
	
	/**
	 * @var string
	 */
	public $SFTPUsername = "";
	
	/**
	 * @var string
	 */
	public $SFTPRemotePath = "";
	
	/**
	 * @var int
	 */
	public $SFTPAuthMode = 0;
	
	/**
	 * @var string
	 */
	public $SFTPPassword = "";
	
	/**
	 * @var string
	 */
	public $SFTPPrivateKey = "";
	
	/**
	 * @var boolean
	 */
	public $SFTPCustomAuth_UseKnownHostsFile = false;
	
	/**
	 * @var string
	 */
	public $SFTPCustomAuth_KnownHostsFile = "";
	
	/**
	 * Preserve unknown properties when dealing with future server versions.
	 * You can recursively remove all unknown properties by calling RemoveUnknownProperties().
	 *
	 * @var array
	 */
	private $__unknown_properties = [];
	
	public function inflateFrom(array $decodedJsonObject)
	{
		$this->SFTPServer = (string)($decodedJsonObject['SFTPServer']);
		
		$this->SFTPUsername = (string)($decodedJsonObject['SFTPUsername']);
		
		$this->SFTPRemotePath = (string)($decodedJsonObject['SFTPRemotePath']);
		
		$this->SFTPAuthMode = (int)($decodedJsonObject['SFTPAuthMode']);
		
		$this->SFTPPassword = (string)($decodedJsonObject['SFTPPassword']);
		
		$this->SFTPPrivateKey = (string)($decodedJsonObject['SFTPPrivateKey']);
		
		$this->SFTPCustomAuth_UseKnownHostsFile = (bool)($decodedJsonObject['SFTPCustomAuth_UseKnownHostsFile']);
		
		$this->SFTPCustomAuth_KnownHostsFile = (string)($decodedJsonObject['SFTPCustomAuth_KnownHostsFile']);
		
		foreach($decodedJsonObject as $k => $v) {
			switch($k) {
			case 'SFTPServer':
			case 'SFTPUsername':
			case 'SFTPRemotePath':
			case 'SFTPAuthMode':
			case 'SFTPPassword':
			case 'SFTPPrivateKey':
			case 'SFTPCustomAuth_UseKnownHostsFile':
			case 'SFTPCustomAuth_KnownHostsFile':
				break;
			default:
				$this->__unknown_properties[$k] = $v;
			}
		}
	}
	
	public static function createFrom(array $decodedJsonObject)
	{
		$retn = new SFTPDestinationLocation();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}
	
	public function toArray($for_json_encode=false)
	{
		$ret = [];
		$ret["SFTPServer"] = $this->SFTPServer;
		$ret["SFTPUsername"] = $this->SFTPUsername;
		$ret["SFTPRemotePath"] = $this->SFTPRemotePath;
		$ret["SFTPAuthMode"] = $this->SFTPAuthMode;
		$ret["SFTPPassword"] = $this->SFTPPassword;
		$ret["SFTPPrivateKey"] = $this->SFTPPrivateKey;
		$ret["SFTPCustomAuth_UseKnownHostsFile"] = $this->SFTPCustomAuth_UseKnownHostsFile;
		$ret["SFTPCustomAuth_KnownHostsFile"] = $this->SFTPCustomAuth_KnownHostsFile;
		
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

