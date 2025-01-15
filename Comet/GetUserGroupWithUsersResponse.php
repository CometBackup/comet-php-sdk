<?php

/**
 * Copyright (c) 2018-2025 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 *
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

class GetUserGroupWithUsersResponse {

	/**
	 * @var \Comet\UserGroup
	 */
	public $UserGroup = null;

	/**
	 * @var array<string, \Comet\UserProfileConfig>
	 */
	public $Users = [];

	/**
	 * Preserve unknown properties when dealing with future server versions.
	 *
	 * @see GetUserGroupWithUsersResponse::RemoveUnknownProperties() Remove all unknown properties
	 * @var array
	 */
	private $__unknown_properties = [];

	/**
	 * Replace the content of this GetUserGroupWithUsersResponse object from a PHP \stdClass.
	 * The data could be supplied from an API call after json_decode(...); or generated manually.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return void
	 */
	protected function inflateFrom(\stdClass $sc)
	{
		if (property_exists($sc, 'UserGroup')) {
			if (is_array($sc->UserGroup) && count($sc->UserGroup) === 0) {
			// Work around edge case in json_decode--json_encode stdClass conversion
				$this->UserGroup = \Comet\UserGroup::createFromStdclass(new \stdClass());
			} else {
				$this->UserGroup = \Comet\UserGroup::createFromStdclass($sc->UserGroup);
			}
		}
		if (property_exists($sc, 'Users')) {
			$val_2 = [];
			if ($sc->Users !== null) {
				foreach($sc->Users as $k_2 => $v_2) {
					$phpk_2 = (string)($k_2);
					if (is_array($v_2) && count($v_2) === 0) {
					// Work around edge case in json_decode--json_encode stdClass conversion
						$phpv_2 = \Comet\UserProfileConfig::createFromStdclass(new \stdClass());
					} else {
						$phpv_2 = \Comet\UserProfileConfig::createFromStdclass($v_2);
					}
					$val_2[$phpk_2] = $phpv_2;
				}
			}
			$this->Users = $val_2;
		}
		foreach(get_object_vars($sc) as $k => $v) {
			switch($k) {
			case 'UserGroup':
			case 'Users':
				break;
			default:
				$this->__unknown_properties[$k] = $v;
			}
		}
	}

	/**
	 * Coerce a stdClass into a new strongly-typed GetUserGroupWithUsersResponse object.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return GetUserGroupWithUsersResponse
	 */
	public static function createFromStdclass(\stdClass $sc): \Comet\GetUserGroupWithUsersResponse
	{
		$retn = new GetUserGroupWithUsersResponse();
		$retn->inflateFrom($sc);
		return $retn;
	}

	/**
	 * Coerce a plain PHP array into a new strongly-typed GetUserGroupWithUsersResponse object.
	 * Because the Comet Server requires strict distinction between empty objects ({}) and arrays ([]),
	 * the result of this method may not be safe to re-submit to the Comet Server.
	 *
	 * @param array $arr Object data as PHP array
	 * @return GetUserGroupWithUsersResponse
	 */
	public static function createFromArray(array $arr): \Comet\GetUserGroupWithUsersResponse
	{
		$stdClass = json_decode(json_encode($arr, JSON_UNESCAPED_SLASHES));
		if (is_array($stdClass) && count($stdClass) === 0) {
			$stdClass = new \stdClass();
		}
		return self::createFromStdclass($stdClass);
	}

	/**
	 * Coerce a JSON string into a new strongly-typed GetUserGroupWithUsersResponse object.
	 *
	 * @param string $JsonString Object data as JSON string
	 * @return GetUserGroupWithUsersResponse
	 */
	public static function createFromJSON(string $JsonString): \Comet\GetUserGroupWithUsersResponse
	{
		$decodedJsonObject = json_decode($JsonString); // as stdClass
		if (\json_last_error() != \JSON_ERROR_NONE) {
			throw new \Exception("JSON decode failed: " . \json_last_error_msg(), \json_last_error());
		}
		$retn = new GetUserGroupWithUsersResponse();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}

	/**
	 * Convert this GetUserGroupWithUsersResponse object into a plain PHP array.
	 *
	 * Unknown properties may still be represented as \stdClass objects.
	 *
	 * @param bool $for_json_encode Represent key-value maps as \stdClass instead of plain PHP arrays
	 * @return array
	 */
	public function toArray(bool $for_json_encode = false): array
	{
		$ret = [];
		if ( $this->UserGroup === null ) {
			$ret["UserGroup"] = $for_json_encode ? (object)[] : [];
		} else {
			$ret["UserGroup"] = $this->UserGroup->toArray($for_json_encode);
		}
		{
			$c0 = $for_json_encode ? (object)[] : [];
			foreach($this->Users as $k0 => $v0) {
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
			$ret["Users"] = $c0;
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
		if ($this->UserGroup !== null) {
			$this->UserGroup->RemoveUnknownProperties();
		}
	}

}

