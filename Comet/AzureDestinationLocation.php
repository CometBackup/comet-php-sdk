<?php

namespace Comet;

class AzureDestinationLocation {
	
	/**
	 * @var string
	 */
	public $AZBAccountName = "";
	
	/**
	 * @var string
	 */
	public $AZBAccountKey = "";
	
	/**
	 * @var string
	 */
	public $AZBContainer = "";
	
	/**
	 * @var string
	 */
	public $AZBRealm = "";
	
	/**
	 * @var string
	 */
	public $AZBPrefix = "";
	
	/**
	 * Preserve unknown properties when dealing with future server versions.
	 * You can recursively remove all unknown properties by calling RemoveUnknownProperties().
	 *
	 * @var array
	 */
	private $__unknown_properties = [];
	
	public function inflateFrom(array $decodedJsonObject)
	{
		$this->AZBAccountName = (string)($decodedJsonObject['AZBAccountName']);
		
		$this->AZBAccountKey = (string)($decodedJsonObject['AZBAccountKey']);
		
		$this->AZBContainer = (string)($decodedJsonObject['AZBContainer']);
		
		$this->AZBRealm = (string)($decodedJsonObject['AZBRealm']);
		
		$this->AZBPrefix = (string)($decodedJsonObject['AZBPrefix']);
		
		foreach($decodedJsonObject as $k => $v) {
			switch($k) {
			case 'AZBAccountName':
			case 'AZBAccountKey':
			case 'AZBContainer':
			case 'AZBRealm':
			case 'AZBPrefix':
				break;
			default:
				$this->__unknown_properties[$k] = $v;
			}
		}
	}
	
	public static function createFrom(array $decodedJsonObject)
	{
		$retn = new AzureDestinationLocation();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}
	
	public function toArray($for_json_encode=false)
	{
		$ret = [];
		$ret["AZBAccountName"] = $this->AZBAccountName;
		$ret["AZBAccountKey"] = $this->AZBAccountKey;
		$ret["AZBContainer"] = $this->AZBContainer;
		$ret["AZBRealm"] = $this->AZBRealm;
		$ret["AZBPrefix"] = $this->AZBPrefix;
		
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

