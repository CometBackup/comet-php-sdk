<?php

namespace Comet;

class GroupPolicy {
	
	/**
	 * @var string
	 */
	public $Description = "";
	
	/**
	 * @var \Comet\UserPolicy
	 */
	public $Policy = null;
	
	/**
	 * Preserve unknown properties when dealing with future server versions.
	 *
	 * @see GroupPolicy::RemoveUnknownProperties() Remove all unknown properties
	 * @var array
	 */
	private $__unknown_properties = [];
	
	/**
	 * Replace the content of this GroupPolicy object from a PHP array.
	 * The data could be supplied from an API call after json_decode(..., true); or generated manually.
	 *
	 * @param array $decodedJsonObject Object data as PHP array
	 * @return void
	 */
	protected function inflateFrom(array $decodedJsonObject)
	{
		$this->Description = (string)($decodedJsonObject['Description']);
		
		$this->Policy = \Comet\UserPolicy::createFrom(isset($decodedJsonObject['Policy']) ? $decodedJsonObject['Policy'] : []);
		
		foreach($decodedJsonObject as $k => $v) {
			switch($k) {
			case 'Description':
			case 'Policy':
				break;
			default:
				$this->__unknown_properties[$k] = $v;
			}
		}
	}
	
	/**
	 * Coerce a plain PHP array into a new strongly-typed GroupPolicy object.
	 *
	 * @param array $decodedJsonObject Object data as PHP array
	 * @return GroupPolicy
	 */
	public static function createFrom(array $decodedJsonObject)
	{
		$retn = new GroupPolicy();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}
	
	/**
	 * Coerce a JSON string into a new strongly-typed GroupPolicy object.
	 *
	 * @param string $JsonString Object data as JSON string
	 * @return GroupPolicy
	 */
	public static function createFromJSON($JsonString)
	{
		$decodedJsonObject = json_decode($JsonString, true);
		if (\json_last_error() != \JSON_ERROR_NONE) {
			throw new \Exception("JSON decode failed: " . \json_last_error_msg());
		}
		$retn = new GroupPolicy();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}
	
	/**
	 * Convert this GroupPolicy object into a plain PHP array.
	 *
	 * @param bool $forJSONEncode Set true to use stdClass() for empty objects instead of just [], in order to
	 *                             accurately roundtrip empty objects/arrays through json_encode() compatibility
	 * @return array
	 */
	public function toArray($forJSONEncode=false)
	{
		$ret = [];
		$ret["Description"] = $this->Description;
		if ( $this->Policy === null ) {
			$ret["Policy"] = $for_json_encode ? (object)[] : [];
		} else {
			$ret["Policy"] = $this->Policy->toArray($for_json_encode);
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
		if ($this->Policy !== null) {
			$this->Policy->RemoveUnknownProperties();
		}
	}
	
}

