<?php

/**
 * Copyright (c) 2018-2024 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 *
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

/**
 * SearchResultFileInfo describes a single result entry when searching for files within a Storage
 * Vault snapshot.
 */
class SearchResultFileInfo {

	/**
	 * Path to the file within the selected snapshot, using forwardslash (/) separators
	 *
	 * @var string
	 */
	public $Path = "";

	/**
	 * Filename
	 *
	 * @var string
	 */
	public $Name = "";

	/**
	 * One of the STOREDOBJECTTYPE_ constants
	 *
	 * @var string
	 */
	public $Type = "";

	/**
	 * @var string
	 */
	public $Mode = "";

	/**
	 * Timestamp in RFC3339 format with subsecond precision and time zone offset. See the Golang
	 * time.RFC3339Nano for more information.
	 *
	 * @var string
	 */
	public $ModTime = "";

	/**
	 * Timestamp in RFC3339 format with subsecond precision and time zone offset. See the Golang
	 * time.RFC3339Nano for more information.
	 *
	 * @var string
	 */
	public $AccessTime = "";

	/**
	 * Timestamp in RFC3339 format with subsecond precision and time zone offset. See the Golang
	 * time.RFC3339Nano for more information.
	 *
	 * @var string
	 */
	public $ChangeTime = "";

	/**
	 * Bytes
	 *
	 * @var int
	 */
	public $Size = 0;

	/**
	 * Preserve unknown properties when dealing with future server versions.
	 *
	 * @see SearchResultFileInfo::RemoveUnknownProperties() Remove all unknown properties
	 * @var array
	 */
	private $__unknown_properties = [];

	/**
	 * Replace the content of this SearchResultFileInfo object from a PHP \stdClass.
	 * The data could be supplied from an API call after json_decode(...); or generated manually.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return void
	 */
	protected function inflateFrom(\stdClass $sc)
	{
		if (property_exists($sc, 'path')) {
			$this->Path = (string)($sc->path);
		}
		if (property_exists($sc, 'name')) {
			$this->Name = (string)($sc->name);
		}
		if (property_exists($sc, 'type')) {
			$this->Type = (string)($sc->type);
		}
		if (property_exists($sc, 'mode') && !is_null($sc->mode)) {
			$this->Mode = (string)($sc->mode);
		}
		if (property_exists($sc, 'mtime') && !is_null($sc->mtime)) {
			$this->ModTime = (string)($sc->mtime);
		}
		if (property_exists($sc, 'atime') && !is_null($sc->atime)) {
			$this->AccessTime = (string)($sc->atime);
		}
		if (property_exists($sc, 'ctime') && !is_null($sc->ctime)) {
			$this->ChangeTime = (string)($sc->ctime);
		}
		if (property_exists($sc, 'size') && !is_null($sc->size)) {
			$this->Size = (int)($sc->size);
		}
		foreach(get_object_vars($sc) as $k => $v) {
			switch($k) {
			case 'path':
			case 'name':
			case 'type':
			case 'mode':
			case 'mtime':
			case 'atime':
			case 'ctime':
			case 'size':
				break;
			default:
				$this->__unknown_properties[$k] = $v;
			}
		}
	}

	/**
	 * Coerce a stdClass into a new strongly-typed SearchResultFileInfo object.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return SearchResultFileInfo
	 */
	public static function createFromStdclass(\stdClass $sc): \Comet\SearchResultFileInfo
	{
		$retn = new SearchResultFileInfo();
		$retn->inflateFrom($sc);
		return $retn;
	}

	/**
	 * Coerce a plain PHP array into a new strongly-typed SearchResultFileInfo object.
	 * Because the Comet Server requires strict distinction between empty objects ({}) and arrays ([]),
	 * the result of this method may not be safe to re-submit to the Comet Server.
	 *
	 * @param array $arr Object data as PHP array
	 * @return SearchResultFileInfo
	 */
	public static function createFromArray(array $arr): \Comet\SearchResultFileInfo
	{
		$stdClass = json_decode(json_encode($arr, JSON_UNESCAPED_SLASHES));
		if (is_array($stdClass) && count($stdClass) === 0) {
			$stdClass = new \stdClass();
		}
		return self::createFromStdclass($stdClass);
	}

	/**
	 * Coerce a JSON string into a new strongly-typed SearchResultFileInfo object.
	 *
	 * @param string $JsonString Object data as JSON string
	 * @return SearchResultFileInfo
	 */
	public static function createFromJSON(string $JsonString): \Comet\SearchResultFileInfo
	{
		$decodedJsonObject = json_decode($JsonString); // as stdClass
		if (\json_last_error() != \JSON_ERROR_NONE) {
			throw new \Exception("JSON decode failed: " . \json_last_error_msg(), \json_last_error());
		}
		$retn = new SearchResultFileInfo();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}

	/**
	 * Convert this SearchResultFileInfo object into a plain PHP array.
	 *
	 * Unknown properties may still be represented as \stdClass objects.
	 *
	 * @param bool $for_json_encode Represent empty key-value maps as \stdClass instead of plain PHP arrays
	 * @return array
	 */
	public function toArray(bool $for_json_encode = false): array
	{
		$ret = [];
		$ret["path"] = $this->Path;
		$ret["name"] = $this->Name;
		$ret["type"] = $this->Type;
		$ret["mode"] = $this->Mode;
		$ret["mtime"] = $this->ModTime;
		$ret["atime"] = $this->AccessTime;
		$ret["ctime"] = $this->ChangeTime;
		$ret["size"] = $this->Size;

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

