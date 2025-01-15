<?php

/**
 * Copyright (c) 2018-2025 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 *
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

class EmailReportGeneratedPreview {

	/**
	 * If the operation was successful, the status will be in the 200-299 range.
	 *
	 * @var int
	 */
	public $Status = 0;

	/**
	 * @var string
	 */
	public $Message = "";

	/**
	 * @var string
	 */
	public $From = "";

	/**
	 * @var string[]
	 */
	public $To = [];

	/**
	 * @var string
	 */
	public $EmailSubject = "";

	/**
	 * @var string
	 */
	public $EmailBodyHTML = "";

	/**
	 * @var string
	 */
	public $EmailBodyPlaintext = "";

	/**
	 * Preserve unknown properties when dealing with future server versions.
	 *
	 * @see EmailReportGeneratedPreview::RemoveUnknownProperties() Remove all unknown properties
	 * @var array
	 */
	private $__unknown_properties = [];

	/**
	 * Replace the content of this EmailReportGeneratedPreview object from a PHP \stdClass.
	 * The data could be supplied from an API call after json_decode(...); or generated manually.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return void
	 */
	protected function inflateFrom(\stdClass $sc)
	{
		if (property_exists($sc, 'Status')) {
			$this->Status = (int)($sc->Status);
		}
		if (property_exists($sc, 'Message')) {
			$this->Message = (string)($sc->Message);
		}
		if (property_exists($sc, 'From')) {
			$this->From = (string)($sc->From);
		}
		if (property_exists($sc, 'To')) {
			$val_2 = [];
			if ($sc->To !== null) {
				for($i_2 = 0; $i_2 < count($sc->To); ++$i_2) {
					$val_2[] = (string)($sc->To[$i_2]);
				}
			}
			$this->To = $val_2;
		}
		if (property_exists($sc, 'EmailSubject')) {
			$this->EmailSubject = (string)($sc->EmailSubject);
		}
		if (property_exists($sc, 'EmailBodyHTML')) {
			$this->EmailBodyHTML = (string)($sc->EmailBodyHTML);
		}
		if (property_exists($sc, 'EmailBodyPlaintext')) {
			$this->EmailBodyPlaintext = (string)($sc->EmailBodyPlaintext);
		}
		foreach(get_object_vars($sc) as $k => $v) {
			switch($k) {
			case 'Status':
			case 'Message':
			case 'From':
			case 'To':
			case 'EmailSubject':
			case 'EmailBodyHTML':
			case 'EmailBodyPlaintext':
				break;
			default:
				$this->__unknown_properties[$k] = $v;
			}
		}
	}

	/**
	 * Coerce a stdClass into a new strongly-typed EmailReportGeneratedPreview object.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return EmailReportGeneratedPreview
	 */
	public static function createFromStdclass(\stdClass $sc): \Comet\EmailReportGeneratedPreview
	{
		$retn = new EmailReportGeneratedPreview();
		$retn->inflateFrom($sc);
		return $retn;
	}

	/**
	 * Coerce a plain PHP array into a new strongly-typed EmailReportGeneratedPreview object.
	 * Because the Comet Server requires strict distinction between empty objects ({}) and arrays ([]),
	 * the result of this method may not be safe to re-submit to the Comet Server.
	 *
	 * @param array $arr Object data as PHP array
	 * @return EmailReportGeneratedPreview
	 */
	public static function createFromArray(array $arr): \Comet\EmailReportGeneratedPreview
	{
		$stdClass = json_decode(json_encode($arr, JSON_UNESCAPED_SLASHES));
		if (is_array($stdClass) && count($stdClass) === 0) {
			$stdClass = new \stdClass();
		}
		return self::createFromStdclass($stdClass);
	}

	/**
	 * Coerce a JSON string into a new strongly-typed EmailReportGeneratedPreview object.
	 *
	 * @param string $JsonString Object data as JSON string
	 * @return EmailReportGeneratedPreview
	 */
	public static function createFromJSON(string $JsonString): \Comet\EmailReportGeneratedPreview
	{
		$decodedJsonObject = json_decode($JsonString); // as stdClass
		if (\json_last_error() != \JSON_ERROR_NONE) {
			throw new \Exception("JSON decode failed: " . \json_last_error_msg(), \json_last_error());
		}
		$retn = new EmailReportGeneratedPreview();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}

	/**
	 * Convert this EmailReportGeneratedPreview object into a plain PHP array.
	 *
	 * Unknown properties may still be represented as \stdClass objects.
	 *
	 * @param bool $for_json_encode Represent key-value maps as \stdClass instead of plain PHP arrays
	 * @return array
	 */
	public function toArray(bool $for_json_encode = false): array
	{
		$ret = [];
		$ret["Status"] = $this->Status;
		$ret["Message"] = $this->Message;
		$ret["From"] = $this->From;
		{
			$c0 = [];
			for($i0 = 0; $i0 < count($this->To); ++$i0) {
				$val0 = $this->To[$i0];
				$c0[] = $val0;
			}
			$ret["To"] = $c0;
		}
		$ret["EmailSubject"] = $this->EmailSubject;
		$ret["EmailBodyHTML"] = $this->EmailBodyHTML;
		$ret["EmailBodyPlaintext"] = $this->EmailBodyPlaintext;

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

