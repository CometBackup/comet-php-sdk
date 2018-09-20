<?php

namespace Comet;

class S3DestinationLocation {
	
	/**
	 * @var string
	 */
	public $S3Server = "";
	
	/**
	 * @var boolean
	 */
	public $S3UsesTLS = false;
	
	/**
	 * @var string
	 */
	public $S3AccessKey = "";
	
	/**
	 * @var string
	 */
	public $S3SecretKey = "";
	
	/**
	 * @var string
	 */
	public $S3BucketName = "";
	
	/**
	 * @var string
	 */
	public $S3Subdir = "";
	
	/**
	 * Preserve unknown properties when dealing with future server versions.
	 *
	 * @see S3DestinationLocation::RemoveUnknownProperties() Remove all unknown properties
	 * @var array
	 */
	private $__unknown_properties = [];
	
	/**
	 * Replace the content of this S3DestinationLocation object from a PHP array.
	 * The data could be supplied from an API call after json_decode(..., true); or generated manually.
	 *
	 * @param array $decodedJsonObject Object data as PHP array
	 * @return void
	 */
	protected function inflateFrom(array $decodedJsonObject)
	{
		$this->S3Server = (string)($decodedJsonObject['S3Server']);
		
		$this->S3UsesTLS = (bool)($decodedJsonObject['S3UsesTLS']);
		
		$this->S3AccessKey = (string)($decodedJsonObject['S3AccessKey']);
		
		$this->S3SecretKey = (string)($decodedJsonObject['S3SecretKey']);
		
		$this->S3BucketName = (string)($decodedJsonObject['S3BucketName']);
		
		$this->S3Subdir = (string)($decodedJsonObject['S3Subdir']);
		
		foreach($decodedJsonObject as $k => $v) {
			switch($k) {
			case 'S3Server':
			case 'S3UsesTLS':
			case 'S3AccessKey':
			case 'S3SecretKey':
			case 'S3BucketName':
			case 'S3Subdir':
				break;
			default:
				$this->__unknown_properties[$k] = $v;
			}
		}
	}
	
	/**
	 * Coerce a plain PHP array into a new strongly-typed S3DestinationLocation object.
	 *
	 * @param array $decodedJsonObject Object data as PHP array
	 * @return S3DestinationLocation
	 */
	public static function createFrom(array $decodedJsonObject)
	{
		$retn = new S3DestinationLocation();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}
	
	/**
	 * Coerce a JSON string into a new strongly-typed S3DestinationLocation object.
	 *
	 * @param string $JsonString Object data as JSON string
	 * @return S3DestinationLocation
	 */
	public static function createFromJSON($JsonString)
	{
		$decodedJsonObject = json_decode($JsonString, true);
		if (\json_last_error() != \JSON_ERROR_NONE) {
			throw new \Exception("JSON decode failed: " . \json_last_error_msg());
		}
		$retn = new S3DestinationLocation();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}
	
	/**
	 * Convert this S3DestinationLocation object into a plain PHP array.
	 *
	 * @param bool $forJSONEncode Set true to use stdClass() for empty objects instead of just [], in order to
	 *                             accurately roundtrip empty objects/arrays through json_encode() compatibility
	 * @return array
	 */
	public function toArray($forJSONEncode=false)
	{
		$ret = [];
		$ret["S3Server"] = $this->S3Server;
		$ret["S3UsesTLS"] = $this->S3UsesTLS;
		$ret["S3AccessKey"] = $this->S3AccessKey;
		$ret["S3SecretKey"] = $this->S3SecretKey;
		$ret["S3BucketName"] = $this->S3BucketName;
		$ret["S3Subdir"] = $this->S3Subdir;
		
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

