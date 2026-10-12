<?php

/**
 * Copyright (c) 2018-2026 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 *
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

class PSAConfigConnectWise {

	/**
	 * The ConnectWise Manage company ID used for API authentication
	 *
	 * @var string
	 */
	public $CompanyID = "";

	/**
	 * The public part of the ConnectWise Manage API member keypair
	 *
	 * @var string
	 */
	public $PublicKey = "";

	/**
	 * The private part of the ConnectWise Manage API member keypair
	 *
	 * @var string
	 */
	public $PrivateKey = "";

	/**
	 * The ConnectWise Manage developer "clientId" header value
	 *
	 * @var string
	 */
	public $ClientID = "";

	/**
	 * Optional. The name of the Service Board that tickets are created on. If blank, the ConnectWise
	 * Manage default board is used
	 *
	 * @var string
	 */
	public $ServiceBoard = "";

	/**
	 * Optional. The identifier of the ConnectWise Manage company that tickets are raised against, when
	 * no company matches the Comet user account's AccountName
	 *
	 * @var string
	 */
	public $TicketCompany = "";

	/**
	 * Preserve unknown properties when dealing with future server versions.
	 *
	 * @see PSAConfigConnectWise::RemoveUnknownProperties() Remove all unknown properties
	 * @var array
	 */
	private $__unknown_properties = [];

	/**
	 * Replace the content of this PSAConfigConnectWise object from a PHP \stdClass.
	 * The data could be supplied from an API call after json_decode(...); or generated manually.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return void
	 */
	protected function inflateFrom(\stdClass $sc)
	{
		if (property_exists($sc, 'CompanyID')) {
			$this->CompanyID = (string)($sc->CompanyID);
		}
		if (property_exists($sc, 'PublicKey')) {
			$this->PublicKey = (string)($sc->PublicKey);
		}
		if (property_exists($sc, 'PrivateKey')) {
			$this->PrivateKey = (string)($sc->PrivateKey);
		}
		if (property_exists($sc, 'ClientID')) {
			$this->ClientID = (string)($sc->ClientID);
		}
		if (property_exists($sc, 'ServiceBoard') && !is_null($sc->ServiceBoard)) {
			$this->ServiceBoard = (string)($sc->ServiceBoard);
		}
		if (property_exists($sc, 'TicketCompany') && !is_null($sc->TicketCompany)) {
			$this->TicketCompany = (string)($sc->TicketCompany);
		}
		foreach(get_object_vars($sc) as $k => $v) {
			switch($k) {
			case 'CompanyID':
			case 'PublicKey':
			case 'PrivateKey':
			case 'ClientID':
			case 'ServiceBoard':
			case 'TicketCompany':
				break;
			default:
				$this->__unknown_properties[$k] = $v;
			}
		}
	}

	/**
	 * Coerce a stdClass into a new strongly-typed PSAConfigConnectWise object.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return PSAConfigConnectWise
	 */
	public static function createFromStdclass(\stdClass $sc): \Comet\PSAConfigConnectWise
	{
		$retn = new PSAConfigConnectWise();
		$retn->inflateFrom($sc);
		return $retn;
	}

	/**
	 * Coerce a plain PHP array into a new strongly-typed PSAConfigConnectWise object.
	 * Because the Comet Server requires strict distinction between empty objects ({}) and arrays ([]),
	 * the result of this method may not be safe to re-submit to the Comet Server.
	 *
	 * @param array $arr Object data as PHP array
	 * @return PSAConfigConnectWise
	 */
	public static function createFromArray(array $arr): \Comet\PSAConfigConnectWise
	{
		$stdClass = json_decode(json_encode($arr, JSON_UNESCAPED_SLASHES));
		if (is_array($stdClass) && count($stdClass) === 0) {
			$stdClass = new \stdClass();
		}
		return self::createFromStdclass($stdClass);
	}

	/**
	 * Coerce a JSON string into a new strongly-typed PSAConfigConnectWise object.
	 *
	 * @param string $JsonString Object data as JSON string
	 * @return PSAConfigConnectWise
	 */
	public static function createFromJSON(string $JsonString): \Comet\PSAConfigConnectWise
	{
		$decodedJsonObject = json_decode($JsonString); // as stdClass
		if (\json_last_error() != \JSON_ERROR_NONE) {
			throw new \Exception("JSON decode failed: " . \json_last_error_msg(), \json_last_error());
		}
		$retn = new PSAConfigConnectWise();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}

	/**
	 * Convert this PSAConfigConnectWise object into a plain PHP array.
	 *
	 * Unknown properties may still be represented as \stdClass objects.
	 *
	 * @param bool $for_json_encode Represent key-value maps as \stdClass instead of plain PHP arrays
	 * @return array
	 */
	public function toArray(bool $for_json_encode = false): array
	{
		$ret = [];
		$ret["CompanyID"] = $this->CompanyID;
		$ret["PublicKey"] = $this->PublicKey;
		$ret["PrivateKey"] = $this->PrivateKey;
		$ret["ClientID"] = $this->ClientID;
		$ret["ServiceBoard"] = $this->ServiceBoard;
		$ret["TicketCompany"] = $this->TicketCompany;

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

