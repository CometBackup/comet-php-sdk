<?php

/**
 * Copyright (c) 2018 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 * 
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

class SpannedDestinationLocation {
	
	/**
	 * @var \Comet\DestinationLocation[]
	 */
	public $SpanTargets = [];
	
	/**
	 * Preserve unknown properties when dealing with future server versions.
	 *
	 * @see SpannedDestinationLocation::RemoveUnknownProperties() Remove all unknown properties
	 * @var array
	 */
	private $__unknown_properties = [];
	
	/**
	 * Replace the content of this SpannedDestinationLocation object from a PHP array.
	 * The data could be supplied from an API call after json_decode(..., true); or generated manually.
	 *
	 * @param array $decodedJsonObject Object data as PHP array
	 * @return void
	 */
	protected function inflateFrom(array $decodedJsonObject)
	{
		$val_2 = [];
		for($i_2 = 0; $i_2 < count($decodedJsonObject['SpanTargets']); ++$i_2) {
			$val_2[] = \Comet\DestinationLocation::createFrom(isset($decodedJsonObject['SpanTargets'][$i_2]) ? $decodedJsonObject['SpanTargets'][$i_2] : []);
		}
		$this->SpanTargets = $val_2;
		
		foreach($decodedJsonObject as $k => $v) {
			switch($k) {
			case 'SpanTargets':
				break;
			default:
				$this->__unknown_properties[$k] = $v;
			}
		}
	}
	
	/**
	 * Coerce a plain PHP array into a new strongly-typed SpannedDestinationLocation object.
	 *
	 * @param array $decodedJsonObject Object data as PHP array
	 * @return SpannedDestinationLocation
	 */
	public static function createFrom(array $decodedJsonObject)
	{
		$retn = new SpannedDestinationLocation();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}
	
	/**
	 * Coerce a JSON string into a new strongly-typed SpannedDestinationLocation object.
	 *
	 * @param string $JsonString Object data as JSON string
	 * @return SpannedDestinationLocation
	 */
	public static function createFromJSON($JsonString)
	{
		$decodedJsonObject = json_decode($JsonString, true);
		if (\json_last_error() != \JSON_ERROR_NONE) {
			throw new \Exception("JSON decode failed: " . \json_last_error_msg());
		}
		$retn = new SpannedDestinationLocation();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}
	
	/**
	 * Convert this SpannedDestinationLocation object into a plain PHP array.
	 *
	 * @param bool $forJSONEncode Set true to use stdClass() for empty objects instead of just [], in order to
	 *                             accurately roundtrip empty objects/arrays through json_encode() compatibility
	 * @return array
	 */
	public function toArray($forJSONEncode=false)
	{
		$ret = [];
		{
			$c0 = [];
			for($i0 = 0; $i0 < count($this->SpanTargets); ++$i0) {
				if ( $this->SpanTargets[$i0] === null ) {
					$val0 = $for_json_encode ? (object)[] : [];
				} else {
					$val0 = $this->SpanTargets[$i0]->toArray($for_json_encode);
				}
				$c0[] = $val0;
			}
			$ret["SpanTargets"] = $c0;
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
	}
	
}

