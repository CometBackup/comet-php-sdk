<?php

/**
 * Copyright (c) 2018-2025 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 *
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

class BackupJobProgress {

	/**
	 * This field will always increase monotonically, exactly once, for every change to the
	 * BackupJobProgress for a given backup job.
	 *
	 * @var int
	 */
	public $Counter = 0;

	/**
	 * Unix timestamp in seconds
	 *
	 * @var int
	 */
	public $SentTime = 0;

	/**
	 * Unix timestamp in seconds. The typo is preserved for backwards-compatibility reasons.
	 *
	 * @var int
	 */
	public $RecievedTime = 0;

	/**
	 * @var int
	 */
	public $BytesDone = 0;

	/**
	 * @var int
	 */
	public $ItemsDone = 0;

	/**
	 * @var int
	 */
	public $ItemsTotal = 0;

	/**
	 * Preserve unknown properties when dealing with future server versions.
	 *
	 * @see BackupJobProgress::RemoveUnknownProperties() Remove all unknown properties
	 * @var array
	 */
	private $__unknown_properties = [];

	/**
	 * Replace the content of this BackupJobProgress object from a PHP \stdClass.
	 * The data could be supplied from an API call after json_decode(...); or generated manually.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return void
	 */
	protected function inflateFrom(\stdClass $sc)
	{
		if (property_exists($sc, 'Counter')) {
			$this->Counter = (int)($sc->Counter);
		}
		if (property_exists($sc, 'SentTime')) {
			$this->SentTime = (int)($sc->SentTime);
		}
		if (property_exists($sc, 'RecievedTime')) {
			$this->RecievedTime = (int)($sc->RecievedTime);
		}
		if (property_exists($sc, 'BytesDone')) {
			$this->BytesDone = (int)($sc->BytesDone);
		}
		if (property_exists($sc, 'ItemsDone')) {
			$this->ItemsDone = (int)($sc->ItemsDone);
		}
		if (property_exists($sc, 'ItemsTotal')) {
			$this->ItemsTotal = (int)($sc->ItemsTotal);
		}
		foreach(get_object_vars($sc) as $k => $v) {
			switch($k) {
			case 'Counter':
			case 'SentTime':
			case 'RecievedTime':
			case 'BytesDone':
			case 'ItemsDone':
			case 'ItemsTotal':
				break;
			default:
				$this->__unknown_properties[$k] = $v;
			}
		}
	}

	/**
	 * Coerce a stdClass into a new strongly-typed BackupJobProgress object.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return BackupJobProgress
	 */
	public static function createFromStdclass(\stdClass $sc): \Comet\BackupJobProgress
	{
		$retn = new BackupJobProgress();
		$retn->inflateFrom($sc);
		return $retn;
	}

	/**
	 * Coerce a plain PHP array into a new strongly-typed BackupJobProgress object.
	 * Because the Comet Server requires strict distinction between empty objects ({}) and arrays ([]),
	 * the result of this method may not be safe to re-submit to the Comet Server.
	 *
	 * @param array $arr Object data as PHP array
	 * @return BackupJobProgress
	 */
	public static function createFromArray(array $arr): \Comet\BackupJobProgress
	{
		$stdClass = json_decode(json_encode($arr, JSON_UNESCAPED_SLASHES));
		if (is_array($stdClass) && count($stdClass) === 0) {
			$stdClass = new \stdClass();
		}
		return self::createFromStdclass($stdClass);
	}

	/**
	 * Coerce a JSON string into a new strongly-typed BackupJobProgress object.
	 *
	 * @param string $JsonString Object data as JSON string
	 * @return BackupJobProgress
	 */
	public static function createFromJSON(string $JsonString): \Comet\BackupJobProgress
	{
		$decodedJsonObject = json_decode($JsonString); // as stdClass
		if (\json_last_error() != \JSON_ERROR_NONE) {
			throw new \Exception("JSON decode failed: " . \json_last_error_msg(), \json_last_error());
		}
		$retn = new BackupJobProgress();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}

	/**
	 * Convert this BackupJobProgress object into a plain PHP array.
	 *
	 * Unknown properties may still be represented as \stdClass objects.
	 *
	 * @param bool $for_json_encode Represent key-value maps as \stdClass instead of plain PHP arrays
	 * @return array
	 */
	public function toArray(bool $for_json_encode = false): array
	{
		$ret = [];
		$ret["Counter"] = $this->Counter;
		$ret["SentTime"] = $this->SentTime;
		$ret["RecievedTime"] = $this->RecievedTime;
		$ret["BytesDone"] = $this->BytesDone;
		$ret["ItemsDone"] = $this->ItemsDone;
		$ret["ItemsTotal"] = $this->ItemsTotal;

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

