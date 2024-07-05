<?php

/**
 * Copyright (c) 2018-2024 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 *
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

class EmailOptions {

	/**
	 * @var string
	 */
	public $FromEmail = "";

	/**
	 * @var string
	 */
	public $FromName = "";

	/**
	 * One of the EMAIL_DELIVERY_ constants
	 *
	 * @var string
	 */
	public $Mode = "";

	/**
	 * @var \Comet\EmailReportingOption[]
	 */
	public $EmailReportingOptions = [];

	/**
	 * @var string
	 */
	public $SMTPHost = "";

	/**
	 * @var int
	 */
	public $SMTPPort = 0;

	/**
	 * @var string
	 */
	public $SMTPUsername = "";

	/**
	 * @var string
	 */
	public $SMTPPassword = "";

	/**
	 * @var boolean
	 */
	public $SMTPAllowInvalidCertificate = false;

	/**
	 * @var boolean
	 */
	public $SMTPAllowUnencrypted = false;

	/**
	 * Override the HELO/EHLO hostname for SMTP or MX Direct modes. If blank, uses system default
	 * HELO/EHLO hostname.
	 *
	 * @var string
	 */
	public $SMTPCustomEhlo = "";

	/**
	 * Preserve unknown properties when dealing with future server versions.
	 *
	 * @see EmailOptions::RemoveUnknownProperties() Remove all unknown properties
	 * @var array
	 */
	private $__unknown_properties = [];

	/**
	 * Replace the content of this EmailOptions object from a PHP \stdClass.
	 * The data could be supplied from an API call after json_decode(...); or generated manually.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return void
	 */
	protected function inflateFrom(\stdClass $sc)
	{
		if (property_exists($sc, 'FromEmail')) {
			$this->FromEmail = (string)($sc->FromEmail);
		}
		if (property_exists($sc, 'FromName')) {
			$this->FromName = (string)($sc->FromName);
		}
		if (property_exists($sc, 'Mode')) {
			$this->Mode = (string)($sc->Mode);
		}
		if (property_exists($sc, 'EmailReportingOptions') && !is_null($sc->EmailReportingOptions)) {
			$val_2 = [];
			if ($sc->EmailReportingOptions !== null) {
				for($i_2 = 0; $i_2 < count($sc->EmailReportingOptions); ++$i_2) {
					if (is_array($sc->EmailReportingOptions[$i_2]) && count($sc->EmailReportingOptions[$i_2]) === 0) {
					// Work around edge case in json_decode--json_encode stdClass conversion
						$val_2[] = \Comet\EmailReportingOption::createFromStdclass(new \stdClass());
					} else {
						$val_2[] = \Comet\EmailReportingOption::createFromStdclass($sc->EmailReportingOptions[$i_2]);
					}
				}
			}
			$this->EmailReportingOptions = $val_2;
		}
		if (property_exists($sc, 'SMTPHost') && !is_null($sc->SMTPHost)) {
			$this->SMTPHost = (string)($sc->SMTPHost);
		}
		if (property_exists($sc, 'SMTPPort') && !is_null($sc->SMTPPort)) {
			$this->SMTPPort = (int)($sc->SMTPPort);
		}
		if (property_exists($sc, 'SMTPUsername') && !is_null($sc->SMTPUsername)) {
			$this->SMTPUsername = (string)($sc->SMTPUsername);
		}
		if (property_exists($sc, 'SMTPPassword') && !is_null($sc->SMTPPassword)) {
			$this->SMTPPassword = (string)($sc->SMTPPassword);
		}
		if (property_exists($sc, 'SMTPAllowInvalidCertificate') && !is_null($sc->SMTPAllowInvalidCertificate)) {
			$this->SMTPAllowInvalidCertificate = (bool)($sc->SMTPAllowInvalidCertificate);
		}
		if (property_exists($sc, 'SMTPAllowUnencrypted') && !is_null($sc->SMTPAllowUnencrypted)) {
			$this->SMTPAllowUnencrypted = (bool)($sc->SMTPAllowUnencrypted);
		}
		if (property_exists($sc, 'SMTPCustomEhlo') && !is_null($sc->SMTPCustomEhlo)) {
			$this->SMTPCustomEhlo = (string)($sc->SMTPCustomEhlo);
		}
		foreach(get_object_vars($sc) as $k => $v) {
			switch($k) {
			case 'FromEmail':
			case 'FromName':
			case 'Mode':
			case 'EmailReportingOptions':
			case 'SMTPHost':
			case 'SMTPPort':
			case 'SMTPUsername':
			case 'SMTPPassword':
			case 'SMTPAllowInvalidCertificate':
			case 'SMTPAllowUnencrypted':
			case 'SMTPCustomEhlo':
				break;
			default:
				$this->__unknown_properties[$k] = $v;
			}
		}
	}

	/**
	 * Coerce a stdClass into a new strongly-typed EmailOptions object.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return EmailOptions
	 */
	public static function createFromStdclass(\stdClass $sc): \Comet\EmailOptions
	{
		$retn = new EmailOptions();
		$retn->inflateFrom($sc);
		return $retn;
	}

	/**
	 * Coerce a plain PHP array into a new strongly-typed EmailOptions object.
	 * Because the Comet Server requires strict distinction between empty objects ({}) and arrays ([]),
	 * the result of this method may not be safe to re-submit to the Comet Server.
	 *
	 * @param array $arr Object data as PHP array
	 * @return EmailOptions
	 */
	public static function createFromArray(array $arr): \Comet\EmailOptions
	{
		$stdClass = json_decode(json_encode($arr, JSON_UNESCAPED_SLASHES));
		if (is_array($stdClass) && count($stdClass) === 0) {
			$stdClass = new \stdClass();
		}
		return self::createFromStdclass($stdClass);
	}

	/**
	 * Coerce a JSON string into a new strongly-typed EmailOptions object.
	 *
	 * @param string $JsonString Object data as JSON string
	 * @return EmailOptions
	 */
	public static function createFromJSON(string $JsonString): \Comet\EmailOptions
	{
		$decodedJsonObject = json_decode($JsonString); // as stdClass
		if (\json_last_error() != \JSON_ERROR_NONE) {
			throw new \Exception("JSON decode failed: " . \json_last_error_msg(), \json_last_error());
		}
		$retn = new EmailOptions();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}

	/**
	 * Convert this EmailOptions object into a plain PHP array.
	 *
	 * Unknown properties may still be represented as \stdClass objects.
	 *
	 * @param bool $for_json_encode Represent key-value maps as \stdClass instead of plain PHP arrays
	 * @return array
	 */
	public function toArray(bool $for_json_encode = false): array
	{
		$ret = [];
		$ret["FromEmail"] = $this->FromEmail;
		$ret["FromName"] = $this->FromName;
		$ret["Mode"] = $this->Mode;
		{
			$c0 = [];
			for($i0 = 0; $i0 < count($this->EmailReportingOptions); ++$i0) {
				if ( $this->EmailReportingOptions[$i0] === null ) {
					$val0 = $for_json_encode ? (object)[] : [];
				} else {
					$val0 = $this->EmailReportingOptions[$i0]->toArray($for_json_encode);
				}
				$c0[] = $val0;
			}
			$ret["EmailReportingOptions"] = $c0;
		}
		$ret["SMTPHost"] = $this->SMTPHost;
		$ret["SMTPPort"] = $this->SMTPPort;
		$ret["SMTPUsername"] = $this->SMTPUsername;
		$ret["SMTPPassword"] = $this->SMTPPassword;
		$ret["SMTPAllowInvalidCertificate"] = $this->SMTPAllowInvalidCertificate;
		$ret["SMTPAllowUnencrypted"] = $this->SMTPAllowUnencrypted;
		$ret["SMTPCustomEhlo"] = $this->SMTPCustomEhlo;

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

