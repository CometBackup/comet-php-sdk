<?php

/**
 * Copyright (c) 2018-2025 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 *
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

/**
 * WebhookOption defines the configuration of a webhook target. The Comet Server will send a live
 * HTTP POST event to the webhook URL when certain events happen.
 */
class WebhookOption {

	/**
	 * The target URL to POST the event data to
	 *
	 * @var string
	 */
	public $URL = "";

	/**
	 * CustomHeaders allows specifying custom headers which are added to the outgoing POST request
	 * from Comet Server. Custom headers are specified as (header name, header value) pairs. If a
	 * custom header conflicts with a header required by HTTP or the Comet tracing ID header
	 * (`x-Comet-Tracing-Id`), it will be ignored.
	 *
	 * @var array<string, string>
	 */
	public $CustomHeaders = [];

	/**
	 * One of the STREAM_LEVEL_ constants. This controls how much data is sent in the webhook event.
	 *
	 * @var string
	 */
	public $Level = "";

	/**
	 * Configure a subset of allowed event types (see SEVT_ constants). If the array is empty, all
	 * events will be sent
	 *
	 * @var int[]
	 */
	public $WhiteListedEventTypes = [];

	/**
	 * Preserve unknown properties when dealing with future server versions.
	 *
	 * @see WebhookOption::RemoveUnknownProperties() Remove all unknown properties
	 * @var array
	 */
	private $__unknown_properties = [];

	/**
	 * Replace the content of this WebhookOption object from a PHP \stdClass.
	 * The data could be supplied from an API call after json_decode(...); or generated manually.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return void
	 */
	protected function inflateFrom(\stdClass $sc)
	{
		if (property_exists($sc, 'URL')) {
			$this->URL = (string)($sc->URL);
		}
		if (property_exists($sc, 'CustomHeaders')) {
			$val_2 = [];
			if ($sc->CustomHeaders !== null) {
				foreach($sc->CustomHeaders as $k_2 => $v_2) {
					$phpk_2 = (string)($k_2);
					$phpv_2 = (string)($v_2);
					$val_2[$phpk_2] = $phpv_2;
				}
			}
			$this->CustomHeaders = $val_2;
		}
		if (property_exists($sc, 'Level')) {
			$this->Level = (string)($sc->Level);
		}
		if (property_exists($sc, 'WhiteListedEventTypes')) {
			$val_2 = [];
			if ($sc->WhiteListedEventTypes !== null) {
				for($i_2 = 0; $i_2 < count($sc->WhiteListedEventTypes); ++$i_2) {
					$val_2[] = (int)($sc->WhiteListedEventTypes[$i_2]);
				}
			}
			$this->WhiteListedEventTypes = $val_2;
		}
		foreach(get_object_vars($sc) as $k => $v) {
			switch($k) {
			case 'URL':
			case 'CustomHeaders':
			case 'Level':
			case 'WhiteListedEventTypes':
				break;
			default:
				$this->__unknown_properties[$k] = $v;
			}
		}
	}

	/**
	 * Coerce a stdClass into a new strongly-typed WebhookOption object.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return WebhookOption
	 */
	public static function createFromStdclass(\stdClass $sc): \Comet\WebhookOption
	{
		$retn = new WebhookOption();
		$retn->inflateFrom($sc);
		return $retn;
	}

	/**
	 * Coerce a plain PHP array into a new strongly-typed WebhookOption object.
	 * Because the Comet Server requires strict distinction between empty objects ({}) and arrays ([]),
	 * the result of this method may not be safe to re-submit to the Comet Server.
	 *
	 * @param array $arr Object data as PHP array
	 * @return WebhookOption
	 */
	public static function createFromArray(array $arr): \Comet\WebhookOption
	{
		$stdClass = json_decode(json_encode($arr, JSON_UNESCAPED_SLASHES));
		if (is_array($stdClass) && count($stdClass) === 0) {
			$stdClass = new \stdClass();
		}
		return self::createFromStdclass($stdClass);
	}

	/**
	 * Coerce a JSON string into a new strongly-typed WebhookOption object.
	 *
	 * @param string $JsonString Object data as JSON string
	 * @return WebhookOption
	 */
	public static function createFromJSON(string $JsonString): \Comet\WebhookOption
	{
		$decodedJsonObject = json_decode($JsonString); // as stdClass
		if (\json_last_error() != \JSON_ERROR_NONE) {
			throw new \Exception("JSON decode failed: " . \json_last_error_msg(), \json_last_error());
		}
		$retn = new WebhookOption();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}

	/**
	 * Convert this WebhookOption object into a plain PHP array.
	 *
	 * Unknown properties may still be represented as \stdClass objects.
	 *
	 * @param bool $for_json_encode Represent key-value maps as \stdClass instead of plain PHP arrays
	 * @return array
	 */
	public function toArray(bool $for_json_encode = false): array
	{
		$ret = [];
		$ret["URL"] = $this->URL;
		{
			$c0 = $for_json_encode ? (object)[] : [];
			foreach($this->CustomHeaders as $k0 => $v0) {
				$ko_0 = $k0;
				$vo_0 = $v0;
				if ($for_json_encode) {
				$c0->{ $ko_0 } = $vo_0;
				} else {
					$c0[ $ko_0 ] = $vo_0;
				}
			}
			$ret["CustomHeaders"] = $c0;
		}
		$ret["Level"] = $this->Level;
		{
			$c0 = [];
			for($i0 = 0; $i0 < count($this->WhiteListedEventTypes); ++$i0) {
				$val0 = $this->WhiteListedEventTypes[$i0];
				$c0[] = $val0;
			}
			$ret["WhiteListedEventTypes"] = $c0;
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

