<?php

/**
 * Copyright (c) 2018-2019 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 * 
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

class DispatcherStoredObjectsResponse {
	
	/**
	 * @var int
	 */
	public $Status = 0;
	
	/**
	 * @var string
	 */
	public $Message = "";
	
	/**
	 * @var \Comet\StoredObject[]
	 */
	public $StoredObjects = [];
	
	/**
	 * Preserve unknown properties when dealing with future server versions.
	 *
	 * @see DispatcherStoredObjectsResponse::RemoveUnknownProperties() Remove all unknown properties
	 * @var array
	 */
	private $__unknown_properties = [];
	
	/**
	 * Replace the content of this DispatcherStoredObjectsResponse object from a PHP \stdClass.
	 * The data could be supplied from an API call after json_decode(...); or generated manually.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return void
	 */
	protected function inflateFrom(\stdClass $sc)
	{
		if (property_exists($sc, 'Status')) {
			$this->Status = (int)($sc->Status);
		}
		if (property_exists($sc, 'Message')) {
			$this->Message = (string)($sc->Message);
		}
		if (property_exists($sc, 'StoredObjects')) {
			$val_2 = [];
			if ($sc->StoredObjects !== null) {
				for($i_2 = 0; $i_2 < count($sc->StoredObjects); ++$i_2) {
					if (is_array($sc->StoredObjects[$i_2]) && count($sc->StoredObjects[$i_2]) === 0) {
					// Work around edge case in json_decode--json_encode stdClass conversion
						$val_2[] = \Comet\StoredObject::createFromStdclass(new \stdClass());
					} else {
						$val_2[] = \Comet\StoredObject::createFromStdclass($sc->StoredObjects[$i_2]);
					}
				}
			}
			$this->StoredObjects = $val_2;
		}
		foreach(get_object_vars($sc) as $k => $v) {
			switch($k) {
			case 'Status':
			case 'Message':
			case 'StoredObjects':
				break;
			default:
				$this->__unknown_properties[$k] = $v;
			}
		}
	}
	
	/**
	 * Coerce a stdClass into a new strongly-typed DispatcherStoredObjectsResponse object.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return DispatcherStoredObjectsResponse
	 */
	public static function createFromStdclass(\stdClass $sc)
	{
		$retn = new DispatcherStoredObjectsResponse();
		$retn->inflateFrom($sc);
		return $retn;
	}
	
	/**
	 * Coerce a plain PHP array into a new strongly-typed DispatcherStoredObjectsResponse object.
	 * Because the Comet Server requires strict distinction between empty objects ({}) and arrays ([]),
	 * the result of this method may not be safe to re-submit to the Comet Server.
	 *
	 * @param array $arr Object data as PHP array
	 * @return DispatcherStoredObjectsResponse
	 */
	public static function createFromArray(array $arr)
	{
		$stdClass = json_decode(json_encode($arr));
		if (is_array($stdClass) && count($stdClass) === 0) {
			$stdClass = new \stdClass();
		}
		return self::createFromStdclass($stdClass);
	}
	
	/**
	 * Coerce a plain PHP array into a new strongly-typed DispatcherStoredObjectsResponse object.
	 * Because the Comet Server requires strict distinction between empty objects ({}) and arrays ([]),
	 * the result of this method may not be safe to re-submit to the Comet Server.
	 *
	 * @deprecated 3.0.0 Unsafe for round-trip server traversal. You should either 
	 *             (A) acknowledge this and continue by switching to createFromArray, or
	 *             (b) switch to the roundtrip-safe createFromStdclass alternative.
	 * @param array $arr Object data as PHP array
	 * @return DispatcherStoredObjectsResponse
	 */
	public static function createFrom(array $arr)
	{
		return self::createFromArray($arr);
	}
	
	/**
	 * Coerce a JSON string into a new strongly-typed DispatcherStoredObjectsResponse object.
	 *
	 * @param string $JsonString Object data as JSON string
	 * @return DispatcherStoredObjectsResponse
	 */
	public static function createFromJSON($JsonString)
	{
		$decodedJsonObject = json_decode($JsonString); // as stdClass
		if (\json_last_error() != \JSON_ERROR_NONE) {
			throw new \Exception("JSON decode failed: " . \json_last_error_msg());
		}
		$retn = new DispatcherStoredObjectsResponse();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}
	
	/**
	 * Convert this DispatcherStoredObjectsResponse object into a plain PHP array.
	 *
	 * Unknown properties may still be represented as \stdClass objects.
	 *
	 * @param bool $for_json_encode Represent empty key-value maps as \stdClass instead of plain PHP arrays
	 * @return array
	 */
	public function toArray($for_json_encode = false)
	{
		$ret = [];
		$ret["Status"] = $this->Status;
		$ret["Message"] = $this->Message;
		{
			$c0 = [];
			for($i0 = 0; $i0 < count($this->StoredObjects); ++$i0) {
				if ( $this->StoredObjects[$i0] === null ) {
					$val0 = $for_json_encode ? (object)[] : [];
				} else {
					$val0 = $this->StoredObjects[$i0]->toArray($for_json_encode);
				}
				$c0[] = $val0;
			}
			$ret["StoredObjects"] = $c0;
		}
		
		// Reinstate unknown properties from future server versions
		foreach($this->__unknown_properties as $k => $v) {
			$ret[$k] = $v;
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
		$arr = self::toArray(true);
		if (count($arr) === 0) {
			return "{}"; // object
		} else {
			return json_encode($arr);
		}
	}
	
	/**
	 * Convert this object to a PHP \stdClass.
	 * This may be a more convenient format for working with unknown class properties.
	 *
	 * @return \stdClass
	 */
	public function toStdClass()
	{
		$arr = self::toArray(false);
		if (count($arr) === 0) {
			return new \stdClass();
		} else {
			return json_decode(json_encode($arr));
		}
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
