<?php

/**
 * Copyright (c) 2018-2025 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 *
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

class SpannedDestinationLocation {

	/**
	 * A list of underlying destinations, that will be combined and presented as one.
	 *
	 * @var \Comet\DestinationLocation[]
	 */
	public $SpanTargets = [];

	/**
	 * If true, this Spanned destination will use a consistent hashing scheme
	 * to immediately find specific files on exactly one of the target destinations.
	 * In the Static Slots mode, the span targets cannot be moved or merged, and
	 * the files must always remain in their original location.
	 *
	 * If false, the Spanned destination system will search all targets to find
	 * the requested file. This is slightly slower, but allows you to freely merge,
	 * split, and reorder the underlying destination locations.
	 *
	 * The default option is false.
	 *
	 * @var boolean
	 */
	public $SpanUseStaticSlots = false;

	/**
	 * Preserve unknown properties when dealing with future server versions.
	 *
	 * @see SpannedDestinationLocation::RemoveUnknownProperties() Remove all unknown properties
	 * @var array
	 */
	private $__unknown_properties = [];

	/**
	 * Replace the content of this SpannedDestinationLocation object from a PHP \stdClass.
	 * The data could be supplied from an API call after json_decode(...); or generated manually.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return void
	 */
	protected function inflateFrom(\stdClass $sc)
	{
		if (property_exists($sc, 'SpanTargets')) {
			$val_2 = [];
			if ($sc->SpanTargets !== null) {
				for($i_2 = 0; $i_2 < count($sc->SpanTargets); ++$i_2) {
					if (is_array($sc->SpanTargets[$i_2]) && count($sc->SpanTargets[$i_2]) === 0) {
					// Work around edge case in json_decode--json_encode stdClass conversion
						$val_2[] = \Comet\DestinationLocation::createFromStdclass(new \stdClass());
					} else {
						$val_2[] = \Comet\DestinationLocation::createFromStdclass($sc->SpanTargets[$i_2]);
					}
				}
			}
			$this->SpanTargets = $val_2;
		}
		if (property_exists($sc, 'SpanUseStaticSlots')) {
			$this->SpanUseStaticSlots = (bool)($sc->SpanUseStaticSlots);
		}
		foreach(get_object_vars($sc) as $k => $v) {
			switch($k) {
			case 'SpanTargets':
			case 'SpanUseStaticSlots':
				break;
			default:
				$this->__unknown_properties[$k] = $v;
			}
		}
	}

	/**
	 * Coerce a stdClass into a new strongly-typed SpannedDestinationLocation object.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return SpannedDestinationLocation
	 */
	public static function createFromStdclass(\stdClass $sc): \Comet\SpannedDestinationLocation
	{
		$retn = new SpannedDestinationLocation();
		$retn->inflateFrom($sc);
		return $retn;
	}

	/**
	 * Coerce a plain PHP array into a new strongly-typed SpannedDestinationLocation object.
	 * Because the Comet Server requires strict distinction between empty objects ({}) and arrays ([]),
	 * the result of this method may not be safe to re-submit to the Comet Server.
	 *
	 * @param array $arr Object data as PHP array
	 * @return SpannedDestinationLocation
	 */
	public static function createFromArray(array $arr): \Comet\SpannedDestinationLocation
	{
		$stdClass = json_decode(json_encode($arr, JSON_UNESCAPED_SLASHES));
		if (is_array($stdClass) && count($stdClass) === 0) {
			$stdClass = new \stdClass();
		}
		return self::createFromStdclass($stdClass);
	}

	/**
	 * Coerce a JSON string into a new strongly-typed SpannedDestinationLocation object.
	 *
	 * @param string $JsonString Object data as JSON string
	 * @return SpannedDestinationLocation
	 */
	public static function createFromJSON(string $JsonString): \Comet\SpannedDestinationLocation
	{
		$decodedJsonObject = json_decode($JsonString); // as stdClass
		if (\json_last_error() != \JSON_ERROR_NONE) {
			throw new \Exception("JSON decode failed: " . \json_last_error_msg(), \json_last_error());
		}
		$retn = new SpannedDestinationLocation();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}

	/**
	 * Convert this SpannedDestinationLocation object into a plain PHP array.
	 *
	 * Unknown properties may still be represented as \stdClass objects.
	 *
	 * @param bool $for_json_encode Represent key-value maps as \stdClass instead of plain PHP arrays
	 * @return array
	 */
	public function toArray(bool $for_json_encode = false): array
	{
		$ret = [];
		{
			$c0 = [];
			for($i0 = 0; $i0 < count($this->SpanTargets); ++$i0) {
				if ( $this->SpanTargets[$i0] === null ) {
					$val0 = $for_json_encode ? (object)[] : [];
				} else {
					$val0 = $this->SpanTargets[$i0]->toArray($for_json_encode);
				}
				$c0[] = $val0;
			}
			$ret["SpanTargets"] = $c0;
		}
		$ret["SpanUseStaticSlots"] = $this->SpanUseStaticSlots;

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

