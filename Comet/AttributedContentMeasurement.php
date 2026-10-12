<?php

/**
 * Copyright (c) 2018-2026 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 *
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

class AttributedContentMeasurement {

	/**
	 * Unix timestamp in seconds
	 *
	 * @var int
	 */
	public $MeasureStarted = 0;

	/**
	 * Unix timestamp in seconds
	 *
	 * @var int
	 */
	public $MeasureCompleted = 0;

	/**
	 * @var \Comet\AttributedContentMeasurementComponent[]
	 */
	public $Components = [];

	/**
	 * Display names for the item segments that appear in the Components' UsedBy paths, deduplicated.
	 * The key is the "<EngineType>:<type>:<id>" segment token; the value is a human-readable name (e.g.
	 * a SharePoint site display name). A consumer can render the item tree offline from the paths and
	 * these names without a separate catalog lookup.
	 *
	 * @var array<string, string>
	 */
	public $DisplayNames = [];

	/**
	 * The number of data chunks that could not be located in the Storage Vault index during
	 * measurement. A non-zero value means the measurement may under-attribute: per-item byte figures
	 * are an undercount, and a pack whose references all missed is bucketed as unreferenced rather than
	 * under its true source. Consumers that require exact source-level parity MUST discard a
	 * measurement with a non-zero value and remeasure later.
	 *
	 * @var int
	 */
	public $LookupMisses = 0;

	/**
	 * The number of data chunks that were found in more than one pack during measurement (a transient
	 * duplicate pending cleanup). The index cannot say which physical copy existing snapshots
	 * reference, so component byte totals may shift between packs. Consumers that require exact
	 * source-level parity MUST discard a measurement with a non-zero value and remeasure later.
	 *
	 * @var int
	 */
	public $AmbiguousBlobs = 0;

	/**
	 * Preserve unknown properties when dealing with future server versions.
	 *
	 * @see AttributedContentMeasurement::RemoveUnknownProperties() Remove all unknown properties
	 * @var array
	 */
	private $__unknown_properties = [];

	/**
	 * Replace the content of this AttributedContentMeasurement object from a PHP \stdClass.
	 * The data could be supplied from an API call after json_decode(...); or generated manually.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return void
	 */
	protected function inflateFrom(\stdClass $sc)
	{
		if (property_exists($sc, 'MeasureStarted')) {
			$this->MeasureStarted = (int)($sc->MeasureStarted);
		}
		if (property_exists($sc, 'MeasureCompleted')) {
			$this->MeasureCompleted = (int)($sc->MeasureCompleted);
		}
		if (property_exists($sc, 'Components')) {
			$val_2 = [];
			if ($sc->Components !== null) {
				for($i_2 = 0; $i_2 < count($sc->Components); ++$i_2) {
					if (is_array($sc->Components[$i_2]) && count($sc->Components[$i_2]) === 0) {
					// Work around edge case in json_decode--json_encode stdClass conversion
						$val_2[] = \Comet\AttributedContentMeasurementComponent::createFromStdclass(new \stdClass());
					} else {
						$val_2[] = \Comet\AttributedContentMeasurementComponent::createFromStdclass($sc->Components[$i_2]);
					}
				}
			}
			$this->Components = $val_2;
		}
		if (property_exists($sc, 'DisplayNames')) {
			$val_2 = [];
			if ($sc->DisplayNames !== null) {
				foreach($sc->DisplayNames as $k_2 => $v_2) {
					$phpk_2 = (string)($k_2);
					$phpv_2 = (string)($v_2);
					$val_2[$phpk_2] = $phpv_2;
				}
			}
			$this->DisplayNames = $val_2;
		}
		if (property_exists($sc, 'LookupMisses')) {
			$this->LookupMisses = (int)($sc->LookupMisses);
		}
		if (property_exists($sc, 'AmbiguousBlobs')) {
			$this->AmbiguousBlobs = (int)($sc->AmbiguousBlobs);
		}
		foreach(get_object_vars($sc) as $k => $v) {
			switch($k) {
			case 'MeasureStarted':
			case 'MeasureCompleted':
			case 'Components':
			case 'DisplayNames':
			case 'LookupMisses':
			case 'AmbiguousBlobs':
				break;
			default:
				$this->__unknown_properties[$k] = $v;
			}
		}
	}

	/**
	 * Coerce a stdClass into a new strongly-typed AttributedContentMeasurement object.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return AttributedContentMeasurement
	 */
	public static function createFromStdclass(\stdClass $sc): \Comet\AttributedContentMeasurement
	{
		$retn = new AttributedContentMeasurement();
		$retn->inflateFrom($sc);
		return $retn;
	}

	/**
	 * Coerce a plain PHP array into a new strongly-typed AttributedContentMeasurement object.
	 * Because the Comet Server requires strict distinction between empty objects ({}) and arrays ([]),
	 * the result of this method may not be safe to re-submit to the Comet Server.
	 *
	 * @param array $arr Object data as PHP array
	 * @return AttributedContentMeasurement
	 */
	public static function createFromArray(array $arr): \Comet\AttributedContentMeasurement
	{
		$stdClass = json_decode(json_encode($arr, JSON_UNESCAPED_SLASHES));
		if (is_array($stdClass) && count($stdClass) === 0) {
			$stdClass = new \stdClass();
		}
		return self::createFromStdclass($stdClass);
	}

	/**
	 * Coerce a JSON string into a new strongly-typed AttributedContentMeasurement object.
	 *
	 * @param string $JsonString Object data as JSON string
	 * @return AttributedContentMeasurement
	 */
	public static function createFromJSON(string $JsonString): \Comet\AttributedContentMeasurement
	{
		$decodedJsonObject = json_decode($JsonString); // as stdClass
		if (\json_last_error() != \JSON_ERROR_NONE) {
			throw new \Exception("JSON decode failed: " . \json_last_error_msg(), \json_last_error());
		}
		$retn = new AttributedContentMeasurement();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}

	/**
	 * Convert this AttributedContentMeasurement object into a plain PHP array.
	 *
	 * Unknown properties may still be represented as \stdClass objects.
	 *
	 * @param bool $for_json_encode Represent key-value maps as \stdClass instead of plain PHP arrays
	 * @return array
	 */
	public function toArray(bool $for_json_encode = false): array
	{
		$ret = [];
		$ret["MeasureStarted"] = $this->MeasureStarted;
		$ret["MeasureCompleted"] = $this->MeasureCompleted;
		{
			$c0 = [];
			for($i0 = 0; $i0 < count($this->Components); ++$i0) {
				if ( $this->Components[$i0] === null ) {
					$val0 = $for_json_encode ? (object)[] : [];
				} else {
					$val0 = $this->Components[$i0]->toArray($for_json_encode);
				}
				$c0[] = $val0;
			}
			$ret["Components"] = $c0;
		}
		{
			$c0 = $for_json_encode ? (object)[] : [];
			foreach($this->DisplayNames as $k0 => $v0) {
				$ko_0 = $k0;
				$vo_0 = $v0;
				if ($for_json_encode) {
				$c0->{ $ko_0 } = $vo_0;
				} else {
					$c0[ $ko_0 ] = $vo_0;
				}
			}
			$ret["DisplayNames"] = $c0;
		}
		$ret["LookupMisses"] = $this->LookupMisses;
		$ret["AmbiguousBlobs"] = $this->AmbiguousBlobs;

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

