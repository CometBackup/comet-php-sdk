<?php

namespace Comet;

class PublicBrandingProperties {
	
	/**
	 * @var string
	 */
	public $ProductName = "";
	
	/**
	 * @var string
	 */
	public $CompanyName = "";
	
	/**
	 * @var string
	 */
	public $HelpURL = "";
	
	/**
	 * @var boolean
	 */
	public $HelpIsPopup = false;
	
	/**
	 * @var string
	 */
	public $DefaultLoginServerURL = "";
	
	/**
	 * @var string
	 */
	public $TileBackgroundColor = "";
	
	/**
	 * @var string
	 */
	public $AccountRegisterURL = "";
	
	/**
	 * @var boolean
	 */
	public $HideBackgroundLogo = false;
	
	/**
	 * Preserve unknown properties when dealing with future server versions.
	 * You can recursively remove all unknown properties by calling RemoveUnknownProperties().
	 *
	 * @var array
	 */
	private $__unknown_properties = [];
	
	public function inflateFrom(array $decodedJsonObject)
	{
		$this->ProductName = (string)($decodedJsonObject['ProductName']);
		
		$this->CompanyName = (string)($decodedJsonObject['CompanyName']);
		
		$this->HelpURL = (string)($decodedJsonObject['HelpURL']);
		
		$this->HelpIsPopup = (bool)($decodedJsonObject['HelpIsPopup']);
		
		$this->DefaultLoginServerURL = (string)($decodedJsonObject['DefaultLoginServerURL']);
		
		$this->TileBackgroundColor = (string)($decodedJsonObject['TileBackgroundColor']);
		
		$this->AccountRegisterURL = (string)($decodedJsonObject['AccountRegisterURL']);
		
		$this->HideBackgroundLogo = (bool)($decodedJsonObject['HideBackgroundLogo']);
		
		foreach($decodedJsonObject as $k => $v) {
			switch($k) {
			case 'ProductName':
			case 'CompanyName':
			case 'HelpURL':
			case 'HelpIsPopup':
			case 'DefaultLoginServerURL':
			case 'TileBackgroundColor':
			case 'AccountRegisterURL':
			case 'HideBackgroundLogo':
				break;
			default:
				$this->__unknown_properties[$k] = $v;
			}
		}
	}
	
	public static function createFrom(array $decodedJsonObject)
	{
		$retn = new PublicBrandingProperties();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}
	
	public function toArray($for_json_encode=false)
	{
		$ret = [];
		$ret["ProductName"] = $this->ProductName;
		$ret["CompanyName"] = $this->CompanyName;
		$ret["HelpURL"] = $this->HelpURL;
		$ret["HelpIsPopup"] = $this->HelpIsPopup;
		$ret["DefaultLoginServerURL"] = $this->DefaultLoginServerURL;
		$ret["TileBackgroundColor"] = $this->TileBackgroundColor;
		$ret["AccountRegisterURL"] = $this->AccountRegisterURL;
		$ret["HideBackgroundLogo"] = $this->HideBackgroundLogo;
		
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

