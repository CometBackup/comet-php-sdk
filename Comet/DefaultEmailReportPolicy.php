<?php

/**
 * Copyright (c) 2018-2025 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 *
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

class DefaultEmailReportPolicy {

	/**
	 * If true, the email reports will use the custom configuration that is defined in
	 * UserCustomEmailSettings / Reports fields.
	 * If false, the email reports will use configuration from the policy setting if present, or else
	 * from the built-in system default email report configuration.
	 *
	 * @var boolean
	 */
	public $ShouldOverrideDefaultReports = false;

	/**
	 * @var \Comet\EmailReportConfig[]
	 */
	public $Reports = [];

	/**
	 * Preserve unknown properties when dealing with future server versions.
	 *
	 * @see DefaultEmailReportPolicy::RemoveUnknownProperties() Remove all unknown properties
	 * @var array
	 */
	private $__unknown_properties = [];

	/**
	 * Replace the content of this DefaultEmailReportPolicy object from a PHP \stdClass.
	 * The data could be supplied from an API call after json_decode(...); or generated manually.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return void
	 */
	protected function inflateFrom(\stdClass $sc)
	{
		if (property_exists($sc, 'ShouldOverrideDefaultReports')) {
			$this->ShouldOverrideDefaultReports = (bool)($sc->ShouldOverrideDefaultReports);
		}
		if (property_exists($sc, 'Reports')) {
			$val_2 = [];
			if ($sc->Reports !== null) {
				for($i_2 = 0; $i_2 < count($sc->Reports); ++$i_2) {
					if (is_array($sc->Reports[$i_2]) && count($sc->Reports[$i_2]) === 0) {
					// Work around edge case in json_decode--json_encode stdClass conversion
						$val_2[] = \Comet\EmailReportConfig::createFromStdclass(new \stdClass());
					} else {
						$val_2[] = \Comet\EmailReportConfig::createFromStdclass($sc->Reports[$i_2]);
					}
				}
			}
			$this->Reports = $val_2;
		}
		foreach(get_object_vars($sc) as $k => $v) {
			switch($k) {
			case 'ShouldOverrideDefaultReports':
			case 'Reports':
				break;
			default:
				$this->__unknown_properties[$k] = $v;
			}
		}
	}

	/**
	 * Coerce a stdClass into a new strongly-typed DefaultEmailReportPolicy object.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return DefaultEmailReportPolicy
	 */
	public static function createFromStdclass(\stdClass $sc): \Comet\DefaultEmailReportPolicy
	{
		$retn = new DefaultEmailReportPolicy();
		$retn->inflateFrom($sc);
		return $retn;
	}

	/**
	 * Coerce a plain PHP array into a new strongly-typed DefaultEmailReportPolicy object.
	 * Because the Comet Server requires strict distinction between empty objects ({}) and arrays ([]),
	 * the result of this method may not be safe to re-submit to the Comet Server.
	 *
	 * @param array $arr Object data as PHP array
	 * @return DefaultEmailReportPolicy
	 */
	public static function createFromArray(array $arr): \Comet\DefaultEmailReportPolicy
	{
		$stdClass = json_decode(json_encode($arr, JSON_UNESCAPED_SLASHES));
		if (is_array($stdClass) && count($stdClass) === 0) {
			$stdClass = new \stdClass();
		}
		return self::createFromStdclass($stdClass);
	}

	/**
	 * Coerce a JSON string into a new strongly-typed DefaultEmailReportPolicy object.
	 *
	 * @param string $JsonString Object data as JSON string
	 * @return DefaultEmailReportPolicy
	 */
	public static function createFromJSON(string $JsonString): \Comet\DefaultEmailReportPolicy
	{
		$decodedJsonObject = json_decode($JsonString); // as stdClass
		if (\json_last_error() != \JSON_ERROR_NONE) {
			throw new \Exception("JSON decode failed: " . \json_last_error_msg(), \json_last_error());
		}
		$retn = new DefaultEmailReportPolicy();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}

	/**
	 * Convert this DefaultEmailReportPolicy object into a plain PHP array.
	 *
	 * Unknown properties may still be represented as \stdClass objects.
	 *
	 * @param bool $for_json_encode Represent key-value maps as \stdClass instead of plain PHP arrays
	 * @return array
	 */
	public function toArray(bool $for_json_encode = false): array
	{
		$ret = [];
		$ret["ShouldOverrideDefaultReports"] = $this->ShouldOverrideDefaultReports;
		{
			$c0 = [];
			for($i0 = 0; $i0 < count($this->Reports); ++$i0) {
				if ( $this->Reports[$i0] === null ) {
					$val0 = $for_json_encode ? (object)[] : [];
				} else {
					$val0 = $this->Reports[$i0]->toArray($for_json_encode);
				}
				$c0[] = $val0;
			}
			$ret["Reports"] = $c0;
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

