<?php

/**
 * Copyright (c) 2018-2024 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 *
 * SPDX-License-Identifier: MIT
 */

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
	 * This field is available in Comet 18.6.2 and later.
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
	 * Replace the content of this ConstellationStatusAPIResponse object from a PHP \stdClass.
	 * The data could be supplied from an API call after json_decode(...); or generated manually.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return void
	 */
	protected function inflateFrom(\stdClass $sc)
	{
		if (property_exists($sc, 'DeletionEnabled')) {
			$this->DeletionEnabled = (bool)($sc->DeletionEnabled);
		}
		if (property_exists($sc, 'Targets')) {
			$val_2 = [];
			if ($sc->Targets !== null) {
				for($i_2 = 0; $i_2 < count($sc->Targets); ++$i_2) {
					$val_2[] = (string)($sc->Targets[$i_2]);
				}
			}
			$this->Targets = $val_2;
		}
		if (property_exists($sc, 'TargetNames') && !is_null($sc->TargetNames)) {
			$val_2 = [];
			if ($sc->TargetNames !== null) {
				for($i_2 = 0; $i_2 < count($sc->TargetNames); ++$i_2) {
					$val_2[] = (string)($sc->TargetNames[$i_2]);
				}
			}
			$this->TargetNames = $val_2;
		}
		if (property_exists($sc, 'Stats')) {
			if (is_array($sc->Stats) && count($sc->Stats) === 0) {
			// Work around edge case in json_decode--json_encode stdClass conversion
				$this->Stats = \Comet\ConstellationStats::createFromStdclass(new \stdClass());
			} else {
				$this->Stats = \Comet\ConstellationStats::createFromStdclass($sc->Stats);
			}
		}
		foreach(get_object_vars($sc) as $k => $v) {
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
	 * Coerce a stdClass into a new strongly-typed ConstellationStatusAPIResponse object.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return ConstellationStatusAPIResponse
	 */
	public static function createFromStdclass(\stdClass $sc): \Comet\ConstellationStatusAPIResponse
	{
		$retn = new ConstellationStatusAPIResponse();
		$retn->inflateFrom($sc);
		return $retn;
	}

	/**
	 * Coerce a plain PHP array into a new strongly-typed ConstellationStatusAPIResponse object.
	 * Because the Comet Server requires strict distinction between empty objects ({}) and arrays ([]),
	 * the result of this method may not be safe to re-submit to the Comet Server.
	 *
	 * @param array $arr Object data as PHP array
	 * @return ConstellationStatusAPIResponse
	 */
	public static function createFromArray(array $arr): \Comet\ConstellationStatusAPIResponse
	{
		$stdClass = json_decode(json_encode($arr, JSON_UNESCAPED_SLASHES));
		if (is_array($stdClass) && count($stdClass) === 0) {
			$stdClass = new \stdClass();
		}
		return self::createFromStdclass($stdClass);
	}

	/**
	 * Coerce a JSON string into a new strongly-typed ConstellationStatusAPIResponse object.
	 *
	 * @param string $JsonString Object data as JSON string
	 * @return ConstellationStatusAPIResponse
	 */
	public static function createFromJSON(string $JsonString): \Comet\ConstellationStatusAPIResponse
	{
		$decodedJsonObject = json_decode($JsonString); // as stdClass
		if (\json_last_error() != \JSON_ERROR_NONE) {
			throw new \Exception("JSON decode failed: " . \json_last_error_msg(), \json_last_error());
		}
		$retn = new ConstellationStatusAPIResponse();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}

	/**
	 * Convert this ConstellationStatusAPIResponse object into a plain PHP array.
	 *
	 * Unknown properties may still be represented as \stdClass objects.
	 *
	 * @param bool $for_json_encode Represent empty key-value maps as \stdClass instead of plain PHP arrays
	 * @return array
	 */
	public function toArray(bool $for_json_encode = false): array
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
		if ($this->Stats !== null) {
			$this->Stats->RemoveUnknownProperties();
		}
	}

}

