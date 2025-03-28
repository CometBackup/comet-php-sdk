<?php

/**
 * Copyright (c) 2018-2025 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 *
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

class StreamableEvent {

	/**
	 * @var string
	 */
	public $Actor = "";

	/**
	 * @var string
	 */
	public $OwnerOrganizationID = "";

	/**
	 * @var string
	 */
	public $ResourceID = "";

	/**
	 * @var int
	 */
	public $Type = 0;

	/**
	 * @var int
	 */
	public $Timestamp = 0;

	/**
	 * @var string
	 */
	public $TypeString = "";

	/**
	 * @var mixed
	 */
	public $Data = null;

	/**
	 * Preserve unknown properties when dealing with future server versions.
	 *
	 * @see StreamableEvent::RemoveUnknownProperties() Remove all unknown properties
	 * @var array
	 */
	private $__unknown_properties = [];

	/**
	 * Replace the content of this StreamableEvent object from a PHP \stdClass.
	 * The data could be supplied from an API call after json_decode(...); or generated manually.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return void
	 */
	protected function inflateFrom(\stdClass $sc)
	{
		if (property_exists($sc, 'Actor')) {
			$this->Actor = (string)($sc->Actor);
		}
		if (property_exists($sc, 'OwnerOrganizationID')) {
			$this->OwnerOrganizationID = (string)($sc->OwnerOrganizationID);
		}
		if (property_exists($sc, 'ResourceID') && !is_null($sc->ResourceID)) {
			$this->ResourceID = (string)($sc->ResourceID);
		}
		if (property_exists($sc, 'Type')) {
			$this->Type = (int)($sc->Type);
		}
		if (property_exists($sc, 'Timestamp') && !is_null($sc->Timestamp)) {
			$this->Timestamp = (int)($sc->Timestamp);
		}
		if (property_exists($sc, 'TypeString') && !is_null($sc->TypeString)) {
			$this->TypeString = (string)($sc->TypeString);
		}
		if (property_exists($sc, 'Data') && !is_null($sc->Data)) {
			$this->Data = $sc->Data; // May be any type
		}
		foreach(get_object_vars($sc) as $k => $v) {
			switch($k) {
			case 'Actor':
			case 'OwnerOrganizationID':
			case 'ResourceID':
			case 'Type':
			case 'Timestamp':
			case 'TypeString':
			case 'Data':
				break;
			default:
				$this->__unknown_properties[$k] = $v;
			}
		}
	}

	/**
	 * Coerce a stdClass into a new strongly-typed StreamableEvent object.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return StreamableEvent
	 */
	public static function createFromStdclass(\stdClass $sc): \Comet\StreamableEvent
	{
		$retn = new StreamableEvent();
		$retn->inflateFrom($sc);
		return $retn;
	}

	/**
	 * Coerce a plain PHP array into a new strongly-typed StreamableEvent object.
	 * Because the Comet Server requires strict distinction between empty objects ({}) and arrays ([]),
	 * the result of this method may not be safe to re-submit to the Comet Server.
	 *
	 * @param array $arr Object data as PHP array
	 * @return StreamableEvent
	 */
	public static function createFromArray(array $arr): \Comet\StreamableEvent
	{
		$stdClass = json_decode(json_encode($arr, JSON_UNESCAPED_SLASHES));
		if (is_array($stdClass) && count($stdClass) === 0) {
			$stdClass = new \stdClass();
		}
		return self::createFromStdclass($stdClass);
	}

	/**
	 * Coerce a JSON string into a new strongly-typed StreamableEvent object.
	 *
	 * @param string $JsonString Object data as JSON string
	 * @return StreamableEvent
	 */
	public static function createFromJSON(string $JsonString): \Comet\StreamableEvent
	{
		$decodedJsonObject = json_decode($JsonString); // as stdClass
		if (\json_last_error() != \JSON_ERROR_NONE) {
			throw new \Exception("JSON decode failed: " . \json_last_error_msg(), \json_last_error());
		}
		$retn = new StreamableEvent();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}

	/**
	 * Convert this StreamableEvent object into a plain PHP array.
	 *
	 * Unknown properties may still be represented as \stdClass objects.
	 *
	 * @param bool $for_json_encode Represent key-value maps as \stdClass instead of plain PHP arrays
	 * @return array
	 */
	public function toArray(bool $for_json_encode = false): array
	{
		$ret = [];
		$ret["Actor"] = $this->Actor;
		$ret["OwnerOrganizationID"] = $this->OwnerOrganizationID;
		$ret["ResourceID"] = $this->ResourceID;
		$ret["Type"] = $this->Type;
		$ret["Timestamp"] = $this->Timestamp;
		$ret["TypeString"] = $this->TypeString;
		$ret["Data"] = $this->Data;

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

