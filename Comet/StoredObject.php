<?php

/**
 * Copyright (c) 2018-2024 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 *
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

class StoredObject {

	/**
	 * The name of the stored object. It is unique within this directory tree.
	 *
	 * @var string
	 */
	public $Name = "";

	/**
	 * Unix timestamp in seconds
	 *
	 * @var int
	 */
	public $ModifyTime = 0;

	/**
	 * One of the STOREDOBJECTTYPE_... constant values
	 *
	 * @var string
	 */
	public $Type = "";

	/**
	 * If this StoredObject represents a directory, this value can be used to recursively select the
	 * directory contents.
	 *
	 * @var string
	 */
	public $Subtree = "";

	/**
	 * Bytes
	 *
	 * @var int
	 */
	public $Size = 0;

	/**
	 * @var string
	 */
	public $DisplayName = "";

	/**
	 * @var string
	 */
	public $ItemClass = "";

	/**
	 * @var string
	 */
	public $From = "";

	/**
	 * @var string
	 */
	public $To = "";

	/**
	 * @var int
	 */
	public $ReceivedDateTime = 0;

	/**
	 * @var boolean
	 */
	public $HasAttachments = false;

	/**
	 * Unix timestamp in seconds
	 *
	 * @var int
	 */
	public $StartTime = 0;

	/**
	 * Unix timestamp in seconds
	 *
	 * @var int
	 */
	public $EndTime = 0;

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
		if (property_exists($sc, 'dname') && !is_null($sc->dname)) {
			$this->DisplayName = (string)($sc->dname);
		}
		if (property_exists($sc, 'itemClass') && !is_null($sc->itemClass)) {
			$this->ItemClass = (string)($sc->itemClass);
		}
		if (property_exists($sc, 'from') && !is_null($sc->from)) {
			$this->From = (string)($sc->from);
		}
		if (property_exists($sc, 'to') && !is_null($sc->to)) {
			$this->To = (string)($sc->to);
		}
		if (property_exists($sc, 'rtime') && !is_null($sc->rtime)) {
			$this->ReceivedDateTime = (int)($sc->rtime);
		}
		if (property_exists($sc, 'has_attachments') && !is_null($sc->has_attachments)) {
			$this->HasAttachments = (bool)($sc->has_attachments);
		}
		if (property_exists($sc, 'stime') && !is_null($sc->stime)) {
			$this->StartTime = (int)($sc->stime);
		}
		if (property_exists($sc, 'etime') && !is_null($sc->etime)) {
			$this->EndTime = (int)($sc->etime);
		}
		if (property_exists($sc, 'r') && !is_null($sc->r)) {
			$this->RecursiveCountKnown = (bool)($sc->r);
		}
		if (property_exists($sc, 'f') && !is_null($sc->f)) {
			$this->RecursiveFiles = (int)($sc->f);
		}
		if (property_exists($sc, 'b') && !is_null($sc->b)) {
			$this->RecursiveBytes = (int)($sc->b);
		}
		if (property_exists($sc, 'd') && !is_null($sc->d)) {
			$this->RecursiveFolders = (int)($sc->d);
		}
		foreach(get_object_vars($sc) as $k => $v) {
			switch($k) {
			case 'name':
			case 'mtime':
			case 'type':
			case 'subtree':
			case 'size':
			case 'dname':
			case 'itemClass':
			case 'from':
			case 'to':
			case 'rtime':
			case 'has_attachments':
			case 'stime':
			case 'etime':
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
	public static function createFromStdclass(\stdClass $sc): \Comet\StoredObject
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
	public static function createFromArray(array $arr): \Comet\StoredObject
	{
		$stdClass = json_decode(json_encode($arr, JSON_UNESCAPED_SLASHES));
		if (is_array($stdClass) && count($stdClass) === 0) {
			$stdClass = new \stdClass();
		}
		return self::createFromStdclass($stdClass);
	}

	/**
	 * Coerce a JSON string into a new strongly-typed StoredObject object.
	 *
	 * @param string $JsonString Object data as JSON string
	 * @return StoredObject
	 */
	public static function createFromJSON(string $JsonString): \Comet\StoredObject
	{
		$decodedJsonObject = json_decode($JsonString); // as stdClass
		if (\json_last_error() != \JSON_ERROR_NONE) {
			throw new \Exception("JSON decode failed: " . \json_last_error_msg(), \json_last_error());
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
	 * @param bool $for_json_encode Represent key-value maps as \stdClass instead of plain PHP arrays
	 * @return array
	 */
	public function toArray(bool $for_json_encode = false): array
	{
		$ret = [];
		$ret["name"] = $this->Name;
		$ret["mtime"] = $this->ModifyTime;
		$ret["type"] = $this->Type;
		$ret["subtree"] = $this->Subtree;
		$ret["size"] = $this->Size;
		$ret["dname"] = $this->DisplayName;
		$ret["itemClass"] = $this->ItemClass;
		$ret["from"] = $this->From;
		$ret["to"] = $this->To;
		$ret["rtime"] = $this->ReceivedDateTime;
		$ret["has_attachments"] = $this->HasAttachments;
		$ret["stime"] = $this->StartTime;
		$ret["etime"] = $this->EndTime;
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
	public function toJSON(): string
	{
		$arr = $this->toArray(true);
		if (count($arr) === 0) {
			return "{}"; // object
		} else {
			return json_encode($arr, JSON_UNESCAPED_SLASHES);
		}
	}

	/**
	 * Convert this object to a PHP \stdClass.
	 * This may be a more convenient format for working with unknown class properties.
	 *
	 * @return \stdClass
	 */
	public function toStdClass(): \stdClass
	{
		$arr = $this->toArray(false);
		if (count($arr) === 0) {
			return new \stdClass();
		} else {
			return json_decode(json_encode($arr, JSON_UNESCAPED_SLASHES));
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

