<?php

/**
 * Copyright (c) 2018-2026 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 *
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

class AttributedContentMeasurementComponent {

	/**
	 * @var int
	 */
	public $Bytes = 0;

	/**
	 * A list of strings describing which groups of snapshots, and which items within those snapshots,
	 * rely on reaching this component of data.
	 * Each string is one reacher path, whose parts are joined by a NUL (0x00) byte. The parts are:
	 * - Part 1: CURRENT or HISTORIC - whether the most recent (CURRENT) or an older (HISTORIC) backup
	 * job snapshot for the source reaches this data.
	 * - Part 2: the Protected Item source ID (for on-premises Protected Items) or Tenant ID (for hosted
	 * Office 365) that reaches this data.
	 * - Parts 3 and beyond (optional): typed item segments of the form "<EngineType>:<type>:<id>"
	 * identifying the item within the snapshot that reaches this data (e.g.
	 * "engine1/winmsofficemail:mailbox:user@example.com"). An id may itself contain colons; parse each
	 * segment as SplitN(":", 3).
	 * A pack shared by N distinct reachers appears once per reacher in this array.
	 * As a special case, a single empty string means the data is not currently referenced by any backup
	 * job snapshot and will be deleted on the next retention pass. (This measurement is never
	 * truncated, so there is no "TRUNCATED/*" value.)
	 * Reserved delimiter bytes (0x00 and 0x01) are stripped from part values during measurement.
	 *
	 * @var string[]
	 */
	public $UsedBy = [];

	/**
	 * Preserve unknown properties when dealing with future server versions.
	 *
	 * @see AttributedContentMeasurementComponent::RemoveUnknownProperties() Remove all unknown properties
	 * @var array
	 */
	private $__unknown_properties = [];

	/**
	 * Replace the content of this AttributedContentMeasurementComponent object from a PHP \stdClass.
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
	 * Coerce a stdClass into a new strongly-typed AttributedContentMeasurementComponent object.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return AttributedContentMeasurementComponent
	 */
	public static function createFromStdclass(\stdClass $sc): \Comet\AttributedContentMeasurementComponent
	{
		$retn = new AttributedContentMeasurementComponent();
		$retn->inflateFrom($sc);
		return $retn;
	}

	/**
	 * Coerce a plain PHP array into a new strongly-typed AttributedContentMeasurementComponent object.
	 * Because the Comet Server requires strict distinction between empty objects ({}) and arrays ([]),
	 * the result of this method may not be safe to re-submit to the Comet Server.
	 *
	 * @param array $arr Object data as PHP array
	 * @return AttributedContentMeasurementComponent
	 */
	public static function createFromArray(array $arr): \Comet\AttributedContentMeasurementComponent
	{
		$stdClass = json_decode(json_encode($arr, JSON_UNESCAPED_SLASHES));
		if (is_array($stdClass) && count($stdClass) === 0) {
			$stdClass = new \stdClass();
		}
		return self::createFromStdclass($stdClass);
	}

	/**
	 * Coerce a JSON string into a new strongly-typed AttributedContentMeasurementComponent object.
	 *
	 * @param string $JsonString Object data as JSON string
	 * @return AttributedContentMeasurementComponent
	 */
	public static function createFromJSON(string $JsonString): \Comet\AttributedContentMeasurementComponent
	{
		$decodedJsonObject = json_decode($JsonString); // as stdClass
		if (\json_last_error() != \JSON_ERROR_NONE) {
			throw new \Exception("JSON decode failed: " . \json_last_error_msg(), \json_last_error());
		}
		$retn = new AttributedContentMeasurementComponent();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}

	/**
	 * Convert this AttributedContentMeasurementComponent object into a plain PHP array.
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

