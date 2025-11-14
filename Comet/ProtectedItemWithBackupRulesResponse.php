<?php

/**
 * Copyright (c) 2018-2025 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 *
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

class ProtectedItemWithBackupRulesResponse {

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
	 * The Protected Item configuration
	 *
	 * @var \Comet\SourceConfig
	 */
	public $Source = null;

	/**
	 * All backup rules for the Protected Item
	 *
	 * @var array<string, \Comet\BackupRuleConfig>
	 */
	public $BackupRules = [];

	/**
	 * @var string
	 */
	public $ProfileHash = "";

	/**
	 * Preserve unknown properties when dealing with future server versions.
	 *
	 * @see ProtectedItemWithBackupRulesResponse::RemoveUnknownProperties() Remove all unknown properties
	 * @var array
	 */
	private $__unknown_properties = [];

	/**
	 * Replace the content of this ProtectedItemWithBackupRulesResponse object from a PHP \stdClass.
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
		if (property_exists($sc, 'Source')) {
			if (is_array($sc->Source) && count($sc->Source) === 0) {
			// Work around edge case in json_decode--json_encode stdClass conversion
				$this->Source = \Comet\SourceConfig::createFromStdclass(new \stdClass());
			} else {
				$this->Source = \Comet\SourceConfig::createFromStdclass($sc->Source);
			}
		}
		if (property_exists($sc, 'BackupRules') && !is_null($sc->BackupRules)) {
			$val_2 = [];
			if ($sc->BackupRules !== null) {
				foreach($sc->BackupRules as $k_2 => $v_2) {
					$phpk_2 = (string)($k_2);
					if (is_array($v_2) && count($v_2) === 0) {
					// Work around edge case in json_decode--json_encode stdClass conversion
						$phpv_2 = \Comet\BackupRuleConfig::createFromStdclass(new \stdClass());
					} else {
						$phpv_2 = \Comet\BackupRuleConfig::createFromStdclass($v_2);
					}
					$val_2[$phpk_2] = $phpv_2;
				}
			}
			$this->BackupRules = $val_2;
		}
		if (property_exists($sc, 'ProfileHash')) {
			$this->ProfileHash = (string)($sc->ProfileHash);
		}
		foreach(get_object_vars($sc) as $k => $v) {
			switch($k) {
			case 'Status':
			case 'Message':
			case 'Source':
			case 'BackupRules':
			case 'ProfileHash':
				break;
			default:
				$this->__unknown_properties[$k] = $v;
			}
		}
	}

	/**
	 * Coerce a stdClass into a new strongly-typed ProtectedItemWithBackupRulesResponse object.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return ProtectedItemWithBackupRulesResponse
	 */
	public static function createFromStdclass(\stdClass $sc): \Comet\ProtectedItemWithBackupRulesResponse
	{
		$retn = new ProtectedItemWithBackupRulesResponse();
		$retn->inflateFrom($sc);
		return $retn;
	}

	/**
	 * Coerce a plain PHP array into a new strongly-typed ProtectedItemWithBackupRulesResponse object.
	 * Because the Comet Server requires strict distinction between empty objects ({}) and arrays ([]),
	 * the result of this method may not be safe to re-submit to the Comet Server.
	 *
	 * @param array $arr Object data as PHP array
	 * @return ProtectedItemWithBackupRulesResponse
	 */
	public static function createFromArray(array $arr): \Comet\ProtectedItemWithBackupRulesResponse
	{
		$stdClass = json_decode(json_encode($arr, JSON_UNESCAPED_SLASHES));
		if (is_array($stdClass) && count($stdClass) === 0) {
			$stdClass = new \stdClass();
		}
		return self::createFromStdclass($stdClass);
	}

	/**
	 * Coerce a JSON string into a new strongly-typed ProtectedItemWithBackupRulesResponse object.
	 *
	 * @param string $JsonString Object data as JSON string
	 * @return ProtectedItemWithBackupRulesResponse
	 */
	public static function createFromJSON(string $JsonString): \Comet\ProtectedItemWithBackupRulesResponse
	{
		$decodedJsonObject = json_decode($JsonString); // as stdClass
		if (\json_last_error() != \JSON_ERROR_NONE) {
			throw new \Exception("JSON decode failed: " . \json_last_error_msg(), \json_last_error());
		}
		$retn = new ProtectedItemWithBackupRulesResponse();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}

	/**
	 * Convert this ProtectedItemWithBackupRulesResponse object into a plain PHP array.
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
		if ( $this->Source === null ) {
			$ret["Source"] = $for_json_encode ? (object)[] : [];
		} else {
			$ret["Source"] = $this->Source->toArray($for_json_encode);
		}
		{
			$c0 = $for_json_encode ? (object)[] : [];
			foreach($this->BackupRules as $k0 => $v0) {
				$ko_0 = $k0;
				if ( $v0 === null ) {
					$vo_0 = $for_json_encode ? (object)[] : [];
				} else {
					$vo_0 = $v0->toArray($for_json_encode);
				}
				if ($for_json_encode) {
				$c0->{ $ko_0 } = $vo_0;
				} else {
					$c0[ $ko_0 ] = $vo_0;
				}
			}
			$ret["BackupRules"] = $c0;
		}
		$ret["ProfileHash"] = $this->ProfileHash;

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
		if ($this->Source !== null) {
			$this->Source->RemoveUnknownProperties();
		}
	}

}

