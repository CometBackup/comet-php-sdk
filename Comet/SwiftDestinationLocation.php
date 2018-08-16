<?php

namespace Comet;

class SwiftDestinationLocation {
	
	/**
	 * @var string
	 */
	public $Username = "";
	
	/**
	 * @var string
	 */
	public $APIKey = "";
	
	/**
	 * @var string
	 */
	public $Region = "";
	
	/**
	 * @var string
	 */
	public $AuthURL = "";
	
	/**
	 * @var string
	 */
	public $Domain = "";
	
	/**
	 * @var string
	 */
	public $Tenant = "";
	
	/**
	 * @var string
	 */
	public $TenantDomain = "";
	
	/**
	 * @var string
	 */
	public $TenantID = "";
	
	/**
	 * @var string
	 */
	public $TrustID = "";
	
	/**
	 * @var string
	 */
	public $AuthToken = "";
	
	/**
	 * @var string
	 */
	public $Prefix = "";
	
	/**
	 * @var string
	 */
	public $Container = "";
	
	/**
	 * @var string
	 */
	public $DefaultContainerPolicy = "";
	
	/**
	 * Preserve unknown properties when dealing with future server versions.
	 * You can recursively remove all unknown properties by calling RemoveUnknownProperties().
	 *
	 * @var array
	 */
	private $__unknown_properties = [];
	
	public function inflateFrom(array $decodedJsonObject)
	{
		if (array_key_exists('Username', $decodedJsonObject)) {
			$this->Username = (string)($decodedJsonObject['Username']);
			
		}
		if (array_key_exists('APIKey', $decodedJsonObject)) {
			$this->APIKey = (string)($decodedJsonObject['APIKey']);
			
		}
		if (array_key_exists('Region', $decodedJsonObject)) {
			$this->Region = (string)($decodedJsonObject['Region']);
			
		}
		if (array_key_exists('AuthURL', $decodedJsonObject)) {
			$this->AuthURL = (string)($decodedJsonObject['AuthURL']);
			
		}
		if (array_key_exists('Domain', $decodedJsonObject)) {
			$this->Domain = (string)($decodedJsonObject['Domain']);
			
		}
		if (array_key_exists('Tenant', $decodedJsonObject)) {
			$this->Tenant = (string)($decodedJsonObject['Tenant']);
			
		}
		if (array_key_exists('TenantDomain', $decodedJsonObject)) {
			$this->TenantDomain = (string)($decodedJsonObject['TenantDomain']);
			
		}
		if (array_key_exists('TenantID', $decodedJsonObject)) {
			$this->TenantID = (string)($decodedJsonObject['TenantID']);
			
		}
		if (array_key_exists('TrustID', $decodedJsonObject)) {
			$this->TrustID = (string)($decodedJsonObject['TrustID']);
			
		}
		if (array_key_exists('AuthToken', $decodedJsonObject)) {
			$this->AuthToken = (string)($decodedJsonObject['AuthToken']);
			
		}
		if (array_key_exists('Prefix', $decodedJsonObject)) {
			$this->Prefix = (string)($decodedJsonObject['Prefix']);
			
		}
		if (array_key_exists('Container', $decodedJsonObject)) {
			$this->Container = (string)($decodedJsonObject['Container']);
			
		}
		if (array_key_exists('DefaultContainerPolicy', $decodedJsonObject)) {
			$this->DefaultContainerPolicy = (string)($decodedJsonObject['DefaultContainerPolicy']);
			
		}
		foreach($decodedJsonObject as $k => $v) {
			switch($k) {
			case 'Username':
			case 'APIKey':
			case 'Region':
			case 'AuthURL':
			case 'Domain':
			case 'Tenant':
			case 'TenantDomain':
			case 'TenantID':
			case 'TrustID':
			case 'AuthToken':
			case 'Prefix':
			case 'Container':
			case 'DefaultContainerPolicy':
				break;
			default:
				$this->__unknown_properties[$k] = $v;
			}
		}
	}
	
	public static function createFrom(array $decodedJsonObject)
	{
		$retn = new SwiftDestinationLocation();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}
	
	public function toArray($for_json_encode=false)
	{
		$ret = [];
		$ret["Username"] = $this->Username;
		$ret["APIKey"] = $this->APIKey;
		$ret["Region"] = $this->Region;
		$ret["AuthURL"] = $this->AuthURL;
		$ret["Domain"] = $this->Domain;
		$ret["Tenant"] = $this->Tenant;
		$ret["TenantDomain"] = $this->TenantDomain;
		$ret["TenantID"] = $this->TenantID;
		$ret["TrustID"] = $this->TrustID;
		$ret["AuthToken"] = $this->AuthToken;
		$ret["Prefix"] = $this->Prefix;
		$ret["Container"] = $this->Container;
		$ret["DefaultContainerPolicy"] = $this->DefaultContainerPolicy;
		
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

