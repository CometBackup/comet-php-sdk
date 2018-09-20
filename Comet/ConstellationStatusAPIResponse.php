<?php

namespace Comet;

class ConstellationStatusAPIResponse {
	
	/**
	 * @var boolean
	 */
	public $DeletionEnabled = false;
	
	/**
	 * @var string[]
	 */
	public $Targets = [];
	
	/**
	 * @var string[]
	 */
	public $TargetNames = [];
	
	/**
	 * @var \Comet\ConstellationStats
	 */
	public $Stats = null;
	
	/**
	 * Preserve unknown properties when dealing with future server versions.
	 *
	 * @see ConstellationStatusAPIResponse::RemoveUnknownProperties() Remove all unknown properties
	 * @var array
	 */
	private $__unknown_properties = [];
	
	/**
	 * Replace the content of this ConstellationStatusAPIResponse object from a PHP array.
	 * The data could be supplied from an API call after json_decode(..., true); or generated manually.
	 *
	 * @param array $decodedJsonObject Object data as PHP array
	 * @return void
	 */
	public function inflateFrom(array $decodedJsonObject)
	{
		$this->DeletionEnabled = (bool)($decodedJsonObject['DeletionEnabled']);
		
		$val_2 = [];
		for($i_2 = 0; $i_2 < count($decodedJsonObject['Targets']); ++$i_2) {
			$val_2[] = (string)($decodedJsonObject['Targets'][$i_2]);
		}
		$this->Targets = $val_2;
		
		if (array_key_exists('TargetNames', $decodedJsonObject)) {
			$val_2 = [];
			for($i_2 = 0; $i_2 < count($decodedJsonObject['TargetNames']); ++$i_2) {
				$val_2[] = (string)($decodedJsonObject['TargetNames'][$i_2]);
			}
			$this->TargetNames = $val_2;
			
		}
		$this->Stats = \Comet\ConstellationStats::createFrom(isset($decodedJsonObject['Stats']) ? $decodedJsonObject['Stats'] : []);
		
		foreach($decodedJsonObject as $k => $v) {
			switch($k) {
			case 'DeletionEnabled':
			case 'Targets':
			case 'TargetNames':
			case 'Stats':
				break;
			default:
				$this->__unknown_properties[$k] = $v;
			}
		}
	}
	
	/**
	 * Coerce a plain PHP array into a new strongly-typed ConstellationStatusAPIResponse object.
	 * The data could be supplied from an API call after json_decode(..., true); or generated manually.
	 *
	 * @param array $decodedJsonObject Object data as PHP array
	 * @return ConstellationStatusAPIResponse
	 */
	public static function createFrom(array $decodedJsonObject)
	{
		$retn = new ConstellationStatusAPIResponse();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}
	
	/**
	 * Convert this ConstellationStatusAPIResponse object into a plain PHP array.
	 *
	 * @param bool $forJSONEncode Set true to use stdClass() for empty objects instead of just [], in order to
	 *                             accurately roundtrip empty objects/arrays through json_encode() compatibility
	 * @return array
	 */
	public function toArray($forJSONEncode=false)
	{
		$ret = [];
		$ret["DeletionEnabled"] = $this->DeletionEnabled;
		{
			$c0 = [];
			for($i0 = 0; $i0 < count($this->Targets); ++$i0) {
				$val0 = $this->Targets[$i0];
				$c0[] = $val0;
			}
			$ret["Targets"] = $c0;
		}
		{
			$c0 = [];
			for($i0 = 0; $i0 < count($this->TargetNames); ++$i0) {
				$val0 = $this->TargetNames[$i0];
				$c0[] = $val0;
			}
			$ret["TargetNames"] = $c0;
		}
		if ( $this->Stats === null ) {
			$ret["Stats"] = $for_json_encode ? (object)[] : [];
		} else {
			$ret["Stats"] = $this->Stats->toArray($for_json_encode);
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
		if ($this->Stats !== null) {
			$this->Stats->RemoveUnknownProperties();
		}
	}
	
}

