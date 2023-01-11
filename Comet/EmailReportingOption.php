<?php

/**
 * Copyright (c) 2018-2023 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 *
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

class EmailReportingOption {

	/**
	 * @var \Comet\EmailReportConfig
	 */
	public $EmailReportConfig = null;

	/**
	 * @var string
	 */
	public $LanguageCode = "";

	/**
	 * @var string
	 */
	public $LocalTimezone = "";

	/**
	 * @var string[]
	 */
	public $Recipients = [];

	/**
	 * Preserve unknown properties when dealing with future server versions.
	 *
	 * @see EmailReportingOption::RemoveUnknownProperties() Remove all unknown properties
	 * @var array
	 */
	private $__unknown_properties = [];

	/**
	 * Replace the content of this EmailReportingOption object from a PHP \stdClass.
	 * The data could be supplied from an API call after json_decode(...); or generated manually.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return void
	 */
	protected function inflateFrom(\stdClass $sc)
	{
		if (property_exists($sc, 'EmailReportConfig')) {
			if (is_array($sc->EmailReportConfig) && count($sc->EmailReportConfig) === 0) {
			// Work around edge case in json_decode--json_encode stdClass conversion
				$this->EmailReportConfig = \Comet\EmailReportConfig::createFromStdclass(new \stdClass());
			} else {
				$this->EmailReportConfig = \Comet\EmailReportConfig::createFromStdclass($sc->EmailReportConfig);
			}
		}
		if (property_exists($sc, 'LanguageCode')) {
			$this->LanguageCode = (string)($sc->LanguageCode);
		}
		if (property_exists($sc, 'LocalTimezone')) {
			$this->LocalTimezone = (string)($sc->LocalTimezone);
		}
		if (property_exists($sc, 'Recipients')) {
			$val_2 = [];
			if ($sc->Recipients !== null) {
				for($i_2 = 0; $i_2 < count($sc->Recipients); ++$i_2) {
					$val_2[] = (string)($sc->Recipients[$i_2]);
				}
			}
			$this->Recipients = $val_2;
		}
		foreach(get_object_vars($sc) as $k => $v) {
			switch($k) {
			case 'EmailReportConfig':
			case 'LanguageCode':
			case 'LocalTimezone':
			case 'Recipients':
				break;
			default:
				$this->__unknown_properties[$k] = $v;
			}
		}
	}

	/**
	 * Coerce a stdClass into a new strongly-typed EmailReportingOption object.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return EmailReportingOption
	 */
	public static function createFromStdclass(\stdClass $sc): \Comet\EmailReportingOption
	{
		$retn = new EmailReportingOption();
		$retn->inflateFrom($sc);
		return $retn;
	}

	/**
	 * Coerce a plain PHP array into a new strongly-typed EmailReportingOption object.
	 * Because the Comet Server requires strict distinction between empty objects ({}) and arrays ([]),
	 * the result of this method may not be safe to re-submit to the Comet Server.
	 *
	 * @param array $arr Object data as PHP array
	 * @return EmailReportingOption
	 */
	public static function createFromArray(array $arr): \Comet\EmailReportingOption
	{
		$stdClass = json_decode(json_encode($arr, JSON_UNESCAPED_SLASHES));
		if (is_array($stdClass) && count($stdClass) === 0) {
			$stdClass = new \stdClass();
		}
		return self::createFromStdclass($stdClass);
	}

	/**
	 * Coerce a JSON string into a new strongly-typed EmailReportingOption object.
	 *
	 * @param string $JsonString Object data as JSON string
	 * @return EmailReportingOption
	 */
	public static function createFromJSON(string $JsonString): \Comet\EmailReportingOption
	{
		$decodedJsonObject = json_decode($JsonString); // as stdClass
		if (\json_last_error() != \JSON_ERROR_NONE) {
			throw new \Exception("JSON decode failed: " . \json_last_error_msg(), \json_last_error());
		}
		$retn = new EmailReportingOption();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}

	/**
	 * Convert this EmailReportingOption object into a plain PHP array.
	 *
	 * Unknown properties may still be represented as \stdClass objects.
	 *
	 * @param bool $for_json_encode Represent empty key-value maps as \stdClass instead of plain PHP arrays
	 * @return array
	 */
	public function toArray(bool $for_json_encode = false): array
	{
		$ret = [];
		if ( $this->EmailReportConfig === null ) {
			$ret["EmailReportConfig"] = $for_json_encode ? (object)[] : [];
		} else {
			$ret["EmailReportConfig"] = $this->EmailReportConfig->toArray($for_json_encode);
		}
		$ret["LanguageCode"] = $this->LanguageCode;
		$ret["LocalTimezone"] = $this->LocalTimezone;
		{
			$c0 = [];
			for($i0 = 0; $i0 < count($this->Recipients); ++$i0) {
				$val0 = $this->Recipients[$i0];
				$c0[] = $val0;
			}
			$ret["Recipients"] = $c0;
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
		if ($this->EmailReportConfig !== null) {
			$this->EmailReportConfig->RemoveUnknownProperties();
		}
	}

}

