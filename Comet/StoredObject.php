<?php

/**
 * Copyright (c) 2018-2019 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 * 
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

class StoredObject {
	
	/**
	 * @var string
	 */
	public $Name = "";
	
	/**
	 * @var int
	 */
	public $ModifyTime = 0;
	
	/**
	 * @var string
	 */
	public $Type = "";
	
	/**
	 * @var string
	 */
	public $Subtree = "";
	
	/**
	 * @var int
	 */
	public $Size = 0;
	
	/**
	 * @var boolean
	 */
	public $RecursiveCountKnown = false;
	
	/**
	 * @var int
	 */
	public $RecursiveFiles = 0;
	
	/**
	 * @var int
	 */
	public $RecursiveBytes = 0;
	
	/**
	 * @var int
	 */
	public $RecursiveFolders = 0;
	
	/**
	 * Preserve unknown properties when dealing with future server versions.
	 *
	 * @see StoredObject::RemoveUnknownProperties() Remove all unknown properties
	 * @var array
	 */
	private $__unknown_properties = [];
	
	/**
	 * Replace the content of this StoredObject object from a PHP \stdClass.
	 * The data could be supplied from an API call after json_decode(...); or generated manually.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return void
	 */
	protected function inflateFrom(\stdClass $sc)
	{
		if (property_exists($sc, 'name')) {
			$this->Name = (string)($sc->name);
		}
		if (property_exists($sc, 'mtime')) {
			$this->ModifyTime = (int)($sc->mtime);
		}
		if (property_exists($sc, 'type')) {
			$this->Type = (string)($sc->type);
		}
		if (property_exists($sc, 'subtree')) {
			$this->Subtree = (string)($sc->subtree);
		}
		if (property_exists($sc, 'size')) {
			$this->Size = (int)($sc->size);
		}
		if (property_exists($sc, 'r')) {
			$this->RecursiveCountKnown = (bool)($sc->r);
		}
		if (property_exists($sc, 'f')) {
			$this->RecursiveFiles = (int)($sc->f);
		}
		if (property_exists($sc, 'b')) {
			$this->RecursiveBytes = (int)($sc->b);
		}
		if (property_exists($sc, 'd')) {
			$this->RecursiveFolders = (int)($sc->d);
		}
		foreach(get_object_vars($sc) as $k => $v) {
			switch($k) {
			case 'name':
			case 'mtime':
			case 'type':
			case 'subtree':
			case 'size':
			case 'r':
			case 'f':
			case 'b':
			case 'd':
				break;
			default:
				$this->__unknown_properties[$k] = $v;
			}
		}
	}
	
	/**
	 * Coerce a stdClass into a new strongly-typed StoredObject object.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return StoredObject
	 */
	public static function createFromStdclass(\stdClass $sc)
	{
		$retn = new StoredObject();
		$retn->inflateFrom($sc);
		return $retn;
	}
	
	/**
	 * Coerce a plain PHP array into a new strongly-typed StoredObject object.
	 * Because the Comet Server requires strict distinction between empty objects ({}) and arrays ([]),
	 * the result of this method may not be safe to re-submit to the Comet Server.
	 *
	 * @param array $arr Object data as PHP array
	 * @return StoredObject
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
	 * Coerce a plain PHP array into a new strongly-typed StoredObject object.
	 * Because the Comet Server requires strict distinction between empty objects ({}) and arrays ([]),
	 * the result of this method may not be safe to re-submit to the Comet Server.
	 *
	 * @deprecated 3.0.0 Unsafe for round-trip server traversal. You should either 
	 *             (A) acknowledge this and continue by switching to createFromArray, or
	 *             (b) switch to the roundtrip-safe createFromStdclass alternative.
	 * @param array $arr Object data as PHP array
	 * @return StoredObject
	 */
	public static function createFrom(array $arr)
	{
		return self::createFromArray($arr);
	}
	
	/**
	 * Coerce a JSON string into a new strongly-typed StoredObject object.
	 *
	 * @param string $JsonString Object data as JSON string
	 * @return StoredObject
	 */
	public static function createFromJSON($JsonString)
	{
		$decodedJsonObject = json_decode($JsonString); // as stdClass
		if (\json_last_error() != \JSON_ERROR_NONE) {
			throw new \Exception("JSON decode failed: " . \json_last_error_msg());
		}
		$retn = new StoredObject();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}
	
	/**
	 * Convert this StoredObject object into a plain PHP array.
	 *
	 * Unknown properties may still be represented as \stdClass objects.
	 *
	 * @param bool $for_json_encode Represent empty key-value maps as \stdClass instead of plain PHP arrays
	 * @return array
	 */
	public function toArray($for_json_encode = false)
	{
		$ret = [];
		$ret["name"] = $this->Name;
		$ret["mtime"] = $this->ModifyTime;
		$ret["type"] = $this->Type;
		$ret["subtree"] = $this->Subtree;
		$ret["size"] = $this->Size;
		$ret["r"] = $this->RecursiveCountKnown;
		$ret["f"] = $this->RecursiveFiles;
		$ret["b"] = $this->RecursiveBytes;
		$ret["d"] = $this->RecursiveFolders;
		
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

