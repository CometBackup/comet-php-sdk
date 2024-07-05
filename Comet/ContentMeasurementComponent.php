<?php

/**
 * Copyright (c) 2018-2024 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 *
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

class ContentMeasurementComponent {

	/**
	 * @var int
	 */
	public $Bytes = 0;

	/**
	 * A list of strings describing which groups of snapshots rely on reaching this component of data.
	 * The strings may take the following formats:
	 * - source_id/CURRENT - this data is required by the most recent backup job snapshot for the listed
	 * Protected Item source.
	 * - source_id/HISTORIC - this data is required by an older backup job snapshot for the listed
	 * Protected Item source.
	 * - TRUNCATED/* - there are too many separate components to show, and this component represents
	 * data that is used by some other combination of components. If present, it will be the only entry
	 * in the UsedBy array.
	 * - the empty string - this amount of data is not currently referenced by any backup job snapshots.
 * If that remains the case by the next retention pass, this much data will be deleted to free up
	 * space. If present, it will be the only entry in the UsedBy array.
	 *
	 * @var string[]
	 */
	public $UsedBy = [];

	/**
	 * Preserve unknown properties when dealing with future server versions.
	 *
	 * @see ContentMeasurementComponent::RemoveUnknownProperties() Remove all unknown properties
	 * @var array
	 */
	private $__unknown_properties = [];

	/**
	 * Replace the content of this ContentMeasurementComponent object from a PHP \stdClass.
	 * The data could be supplied from an API call after json_decode(...); or generated manually.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return void
	 */
	protected function inflateFrom(\stdClass $sc)
	{
		if (property_exists($sc, 'Bytes')) {
			$this->Bytes = (int)($sc->Bytes);
		}
		if (property_exists($sc, 'UsedBy')) {
			$val_2 = [];
			if ($sc->UsedBy !== null) {
				for($i_2 = 0; $i_2 < count($sc->UsedBy); ++$i_2) {
					$val_2[] = (string)($sc->UsedBy[$i_2]);
				}
			}
			$this->UsedBy = $val_2;
		}
		foreach(get_object_vars($sc) as $k => $v) {
			switch($k) {
			case 'Bytes':
			case 'UsedBy':
				break;
			default:
				$this->__unknown_properties[$k] = $v;
			}
		}
	}

	/**
	 * Coerce a stdClass into a new strongly-typed ContentMeasurementComponent object.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return ContentMeasurementComponent
	 */
	public static function createFromStdclass(\stdClass $sc): \Comet\ContentMeasurementComponent
	{
		$retn = new ContentMeasurementComponent();
		$retn->inflateFrom($sc);
		return $retn;
	}

	/**
	 * Coerce a plain PHP array into a new strongly-typed ContentMeasurementComponent object.
	 * Because the Comet Server requires strict distinction between empty objects ({}) and arrays ([]),
	 * the result of this method may not be safe to re-submit to the Comet Server.
	 *
	 * @param array $arr Object data as PHP array
	 * @return ContentMeasurementComponent
	 */
	public static function createFromArray(array $arr): \Comet\ContentMeasurementComponent
	{
		$stdClass = json_decode(json_encode($arr, JSON_UNESCAPED_SLASHES));
		if (is_array($stdClass) && count($stdClass) === 0) {
			$stdClass = new \stdClass();
		}
		return self::createFromStdclass($stdClass);
	}

	/**
	 * Coerce a JSON string into a new strongly-typed ContentMeasurementComponent object.
	 *
	 * @param string $JsonString Object data as JSON string
	 * @return ContentMeasurementComponent
	 */
	public static function createFromJSON(string $JsonString): \Comet\ContentMeasurementComponent
	{
		$decodedJsonObject = json_decode($JsonString); // as stdClass
		if (\json_last_error() != \JSON_ERROR_NONE) {
			throw new \Exception("JSON decode failed: " . \json_last_error_msg(), \json_last_error());
		}
		$retn = new ContentMeasurementComponent();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}

	/**
	 * Convert this ContentMeasurementComponent object into a plain PHP array.
	 *
	 * Unknown properties may still be represented as \stdClass objects.
	 *
	 * @param bool $for_json_encode Represent key-value maps as \stdClass instead of plain PHP arrays
	 * @return array
	 */
	public function toArray(bool $for_json_encode = false): array
	{
		$ret = [];
		$ret["Bytes"] = $this->Bytes;
		{
			$c0 = [];
			for($i0 = 0; $i0 < count($this->UsedBy); ++$i0) {
				$val0 = $this->UsedBy[$i0];
				$c0[] = $val0;
			}
			$ret["UsedBy"] = $c0;
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
	}

}

