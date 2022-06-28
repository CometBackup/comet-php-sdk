<?php

/**
 * Copyright (c) 2018-2022 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 *
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

class Office365CustomSettingV2 {

	/**
	 * @var boolean
	 */
	public $Organization = false;

	/**
	 * @var int[] An array with string keys.
	 */
	public $BackupOptions = [];

	/**
	 * @var int[] An array with string keys.
	 */
	public $MemberBackupOptions = [];

	/**
	 * Preserve unknown properties when dealing with future server versions.
	 *
	 * @see Office365CustomSettingV2::RemoveUnknownProperties() Remove all unknown properties
	 * @var array
	 */
	private $__unknown_properties = [];

	/**
	 * Replace the content of this Office365CustomSettingV2 object from a PHP \stdClass.
	 * The data could be supplied from an API call after json_decode(...); or generated manually.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return void
	 */
	protected function inflateFrom(\stdClass $sc)
	{
		if (property_exists($sc, 'Organization')) {
			$this->Organization = (bool)($sc->Organization);
		}
		if (property_exists($sc, 'BackupOptions') && !is_null($sc->BackupOptions)) {
			$val_2 = [];
			if ($sc->BackupOptions !== null) {
				foreach($sc->BackupOptions as $k_2 => $v_2) {
					$phpk_2 = (string)($k_2);
					$phpv_2 = (int)($v_2);
					$val_2[$phpk_2] = $phpv_2;
				}
			}
			$this->BackupOptions = $val_2;
		}
		if (property_exists($sc, 'MemberBackupOptions') && !is_null($sc->MemberBackupOptions)) {
			$val_2 = [];
			if ($sc->MemberBackupOptions !== null) {
				foreach($sc->MemberBackupOptions as $k_2 => $v_2) {
					$phpk_2 = (string)($k_2);
					$phpv_2 = (int)($v_2);
					$val_2[$phpk_2] = $phpv_2;
				}
			}
			$this->MemberBackupOptions = $val_2;
		}
		foreach(get_object_vars($sc) as $k => $v) {
			switch($k) {
			case 'Organization':
			case 'BackupOptions':
			case 'MemberBackupOptions':
				break;
			default:
				$this->__unknown_properties[$k] = $v;
			}
		}
	}

	/**
	 * Coerce a stdClass into a new strongly-typed Office365CustomSettingV2 object.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return Office365CustomSettingV2
	 */
	public static function createFromStdclass(\stdClass $sc): \Comet\Office365CustomSettingV2
	{
		$retn = new Office365CustomSettingV2();
		$retn->inflateFrom($sc);
		return $retn;
	}

	/**
	 * Coerce a plain PHP array into a new strongly-typed Office365CustomSettingV2 object.
	 * Because the Comet Server requires strict distinction between empty objects ({}) and arrays ([]),
	 * the result of this method may not be safe to re-submit to the Comet Server.
	 *
	 * @param array $arr Object data as PHP array
	 * @return Office365CustomSettingV2
	 */
	public static function createFromArray(array $arr): \Comet\Office365CustomSettingV2
	{
		$stdClass = json_decode(json_encode($arr, JSON_UNESCAPED_SLASHES));
		if (is_array($stdClass) && count($stdClass) === 0) {
			$stdClass = new \stdClass();
		}
		return self::createFromStdclass($stdClass);
	}

	/**
	 * Coerce a JSON string into a new strongly-typed Office365CustomSettingV2 object.
	 *
	 * @param string $JsonString Object data as JSON string
	 * @return Office365CustomSettingV2
	 */
	public static function createFromJSON(string $JsonString): \Comet\Office365CustomSettingV2
	{
		$decodedJsonObject = json_decode($JsonString); // as stdClass
		if (\json_last_error() != \JSON_ERROR_NONE) {
			throw new \Exception("JSON decode failed: " . \json_last_error_msg());
		}
		$retn = new Office365CustomSettingV2();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}

	/**
	 * Convert this Office365CustomSettingV2 object into a plain PHP array.
	 *
	 * Unknown properties may still be represented as \stdClass objects.
	 *
	 * @param bool $for_json_encode Represent empty key-value maps as \stdClass instead of plain PHP arrays
	 * @return array
	 */
	public function toArray(bool $for_json_encode = false): array
	{
		$ret = [];
		$ret["Organization"] = $this->Organization;
		{
			$c0 = [];
			foreach($this->BackupOptions as $k0 => $v0) {
				$ko_0 = $k0;
				$vo_0 = $v0;
				$c0[ $ko_0 ] = $vo_0;
			}
			if ($for_json_encode && count($c0) == 0) {
				$ret["BackupOptions"] = (object)[];
			} else {
				$ret["BackupOptions"] = $c0;
			}
		}
		{
			$c0 = [];
			foreach($this->MemberBackupOptions as $k0 => $v0) {
				$ko_0 = $k0;
				$vo_0 = $v0;
				$c0[ $ko_0 ] = $vo_0;
			}
			if ($for_json_encode && count($c0) == 0) {
				$ret["MemberBackupOptions"] = (object)[];
			} else {
				$ret["MemberBackupOptions"] = $c0;
			}
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

