<?php

/**
 * Copyright (c) 2018-2025 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 *
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

/**
 * Office365CustomSetting is used in the EngineProps for an Office 365 Protected Item (see
 * ENGINE_BUILTIN_MSOFFICE).
 * If present, it will be automatically converted to the replacement Office365CustomSettingV2 type.
 * @deprecated 21.9.xx This type has been deprecated since Comet version 21.9.xx
 */
class Office365CustomSetting {

	/**
	 * @var string
	 */
	public $MailboxStrategy = "";

	/**
	 * @var string
	 */
	public $SiteStrategy = "";

	/**
	 * @var string[]
	 */
	public $MailboxUserIDs = [];

	/**
	 * @var string[]
	 */
	public $MailboxGroupIDs = [];

	/**
	 * @var string[]
	 */
	public $SiteIDs = [];

	/**
	 * Preserve unknown properties when dealing with future server versions.
	 *
	 * @see Office365CustomSetting::RemoveUnknownProperties() Remove all unknown properties
	 * @var array
	 */
	private $__unknown_properties = [];

	/**
	 * Replace the content of this Office365CustomSetting object from a PHP \stdClass.
	 * The data could be supplied from an API call after json_decode(...); or generated manually.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return void
	 */
	protected function inflateFrom(\stdClass $sc)
	{
		if (property_exists($sc, 'MailboxStrategy')) {
			$this->MailboxStrategy = (string)($sc->MailboxStrategy);
		}
		if (property_exists($sc, 'SiteStrategy')) {
			$this->SiteStrategy = (string)($sc->SiteStrategy);
		}
		if (property_exists($sc, 'MailboxUserIDs')) {
			$val_2 = [];
			if ($sc->MailboxUserIDs !== null) {
				for($i_2 = 0; $i_2 < count($sc->MailboxUserIDs); ++$i_2) {
					$val_2[] = (string)($sc->MailboxUserIDs[$i_2]);
				}
			}
			$this->MailboxUserIDs = $val_2;
		}
		if (property_exists($sc, 'MailboxGroupIDs')) {
			$val_2 = [];
			if ($sc->MailboxGroupIDs !== null) {
				for($i_2 = 0; $i_2 < count($sc->MailboxGroupIDs); ++$i_2) {
					$val_2[] = (string)($sc->MailboxGroupIDs[$i_2]);
				}
			}
			$this->MailboxGroupIDs = $val_2;
		}
		if (property_exists($sc, 'SiteIDs')) {
			$val_2 = [];
			if ($sc->SiteIDs !== null) {
				for($i_2 = 0; $i_2 < count($sc->SiteIDs); ++$i_2) {
					$val_2[] = (string)($sc->SiteIDs[$i_2]);
				}
			}
			$this->SiteIDs = $val_2;
		}
		foreach(get_object_vars($sc) as $k => $v) {
			switch($k) {
			case 'MailboxStrategy':
			case 'SiteStrategy':
			case 'MailboxUserIDs':
			case 'MailboxGroupIDs':
			case 'SiteIDs':
				break;
			default:
				$this->__unknown_properties[$k] = $v;
			}
		}
	}

	/**
	 * Coerce a stdClass into a new strongly-typed Office365CustomSetting object.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return Office365CustomSetting
	 */
	public static function createFromStdclass(\stdClass $sc): \Comet\Office365CustomSetting
	{
		$retn = new Office365CustomSetting();
		$retn->inflateFrom($sc);
		return $retn;
	}

	/**
	 * Coerce a plain PHP array into a new strongly-typed Office365CustomSetting object.
	 * Because the Comet Server requires strict distinction between empty objects ({}) and arrays ([]),
	 * the result of this method may not be safe to re-submit to the Comet Server.
	 *
	 * @param array $arr Object data as PHP array
	 * @return Office365CustomSetting
	 */
	public static function createFromArray(array $arr): \Comet\Office365CustomSetting
	{
		$stdClass = json_decode(json_encode($arr, JSON_UNESCAPED_SLASHES));
		if (is_array($stdClass) && count($stdClass) === 0) {
			$stdClass = new \stdClass();
		}
		return self::createFromStdclass($stdClass);
	}

	/**
	 * Coerce a JSON string into a new strongly-typed Office365CustomSetting object.
	 *
	 * @param string $JsonString Object data as JSON string
	 * @return Office365CustomSetting
	 */
	public static function createFromJSON(string $JsonString): \Comet\Office365CustomSetting
	{
		$decodedJsonObject = json_decode($JsonString); // as stdClass
		if (\json_last_error() != \JSON_ERROR_NONE) {
			throw new \Exception("JSON decode failed: " . \json_last_error_msg(), \json_last_error());
		}
		$retn = new Office365CustomSetting();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}

	/**
	 * Convert this Office365CustomSetting object into a plain PHP array.
	 *
	 * Unknown properties may still be represented as \stdClass objects.
	 *
	 * @param bool $for_json_encode Represent key-value maps as \stdClass instead of plain PHP arrays
	 * @return array
	 */
	public function toArray(bool $for_json_encode = false): array
	{
		$ret = [];
		$ret["MailboxStrategy"] = $this->MailboxStrategy;
		$ret["SiteStrategy"] = $this->SiteStrategy;
		{
			$c0 = [];
			for($i0 = 0; $i0 < count($this->MailboxUserIDs); ++$i0) {
				$val0 = $this->MailboxUserIDs[$i0];
				$c0[] = $val0;
			}
			$ret["MailboxUserIDs"] = $c0;
		}
		{
			$c0 = [];
			for($i0 = 0; $i0 < count($this->MailboxGroupIDs); ++$i0) {
				$val0 = $this->MailboxGroupIDs[$i0];
				$c0[] = $val0;
			}
			$ret["MailboxGroupIDs"] = $c0;
		}
		{
			$c0 = [];
			for($i0 = 0; $i0 < count($this->SiteIDs); ++$i0) {
				$val0 = $this->SiteIDs[$i0];
				$c0[] = $val0;
			}
			$ret["SiteIDs"] = $c0;
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

