<?php

/**
 * Copyright (c) 2018-2022 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 *
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

class RestoreJobAdvancedOptions {

	/**
	 * @var int
	 */
	public $Type = 0;

	/**
	 * @var boolean
	 */
	public $OverwriteExistingFiles = false;

	/**
	 * @var boolean
	 */
	public $DestIsOriginalLocation = false;

	/**
	 * @var string
	 */
	public $DestPath = "";

	/**
	 * @var string[]
	 */
	public $ExactDestPaths = [];

	/**
	 * @var int
	 */
	public $ArchiveFormat = 0;

	/**
	 * @var \Comet\Office365Credential
	 */
	public $Office365Credential = null;

	/**
	 * Preserve unknown properties when dealing with future server versions.
	 *
	 * @see RestoreJobAdvancedOptions::RemoveUnknownProperties() Remove all unknown properties
	 * @var array
	 */
	private $__unknown_properties = [];

	/**
	 * Replace the content of this RestoreJobAdvancedOptions object from a PHP \stdClass.
	 * The data could be supplied from an API call after json_decode(...); or generated manually.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return void
	 */
	protected function inflateFrom(\stdClass $sc)
	{
		if (property_exists($sc, 'Type')) {
			$this->Type = (int)($sc->Type);
		}
		if (property_exists($sc, 'OverwriteExistingFiles')) {
			$this->OverwriteExistingFiles = (bool)($sc->OverwriteExistingFiles);
		}
		if (property_exists($sc, 'DestIsOriginalLocation')) {
			$this->DestIsOriginalLocation = (bool)($sc->DestIsOriginalLocation);
		}
		if (property_exists($sc, 'DestPath')) {
			$this->DestPath = (string)($sc->DestPath);
		}
		if (property_exists($sc, 'ExactDestPaths')) {
			$val_2 = [];
			if ($sc->ExactDestPaths !== null) {
				for($i_2 = 0; $i_2 < count($sc->ExactDestPaths); ++$i_2) {
					$val_2[] = (string)($sc->ExactDestPaths[$i_2]);
				}
			}
			$this->ExactDestPaths = $val_2;
		}
		if (property_exists($sc, 'ArchiveFormat')) {
			$this->ArchiveFormat = (int)($sc->ArchiveFormat);
		}
		if (property_exists($sc, 'Office365Credential') && !is_null($sc->Office365Credential)) {
			if (is_array($sc->Office365Credential) && count($sc->Office365Credential) === 0) {
			// Work around edge case in json_decode--json_encode stdClass conversion
				$this->Office365Credential = \Comet\Office365Credential::createFromStdclass(new \stdClass());
			} else {
				$this->Office365Credential = \Comet\Office365Credential::createFromStdclass($sc->Office365Credential);
			}
		}
		foreach(get_object_vars($sc) as $k => $v) {
			switch($k) {
			case 'Type':
			case 'OverwriteExistingFiles':
			case 'DestIsOriginalLocation':
			case 'DestPath':
			case 'ExactDestPaths':
			case 'ArchiveFormat':
			case 'Office365Credential':
				break;
			default:
				$this->__unknown_properties[$k] = $v;
			}
		}
	}

	/**
	 * Coerce a stdClass into a new strongly-typed RestoreJobAdvancedOptions object.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return RestoreJobAdvancedOptions
	 */
	public static function createFromStdclass(\stdClass $sc)
	{
		$retn = new RestoreJobAdvancedOptions();
		$retn->inflateFrom($sc);
		return $retn;
	}

	/**
	 * Coerce a plain PHP array into a new strongly-typed RestoreJobAdvancedOptions object.
	 * Because the Comet Server requires strict distinction between empty objects ({}) and arrays ([]),
	 * the result of this method may not be safe to re-submit to the Comet Server.
	 *
	 * @param array $arr Object data as PHP array
	 * @return RestoreJobAdvancedOptions
	 */
	public static function createFromArray(array $arr)
	{
		$stdClass = json_decode(json_encode($arr));
		if (is_array($stdClass) && count($stdClass) === 0) {
			$stdClass = new \stdClass();
		}
		return self::createFromStdclass($stdClass);
	}

	/**
	 * Coerce a plain PHP array into a new strongly-typed RestoreJobAdvancedOptions object.
	 * Because the Comet Server requires strict distinction between empty objects ({}) and arrays ([]),
	 * the result of this method may not be safe to re-submit to the Comet Server.
	 *
	 * @deprecated 3.0.0 Unsafe for round-trip server traversal. You should either
	 *             (A) acknowledge this and continue by switching to createFromArray, or
	 *             (b) switch to the roundtrip-safe createFromStdclass alternative.
	 * @param array $arr Object data as PHP array
	 * @return RestoreJobAdvancedOptions
	 */
	public static function createFrom(array $arr)
	{
		return self::createFromArray($arr);
	}

	/**
	 * Coerce a JSON string into a new strongly-typed RestoreJobAdvancedOptions object.
	 *
	 * @param string $JsonString Object data as JSON string
	 * @return RestoreJobAdvancedOptions
	 */
	public static function createFromJSON($JsonString)
	{
		$decodedJsonObject = json_decode($JsonString); // as stdClass
		if (\json_last_error() != \JSON_ERROR_NONE) {
			throw new \Exception("JSON decode failed: " . \json_last_error_msg());
		}
		$retn = new RestoreJobAdvancedOptions();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}

	/**
	 * Convert this RestoreJobAdvancedOptions object into a plain PHP array.
	 *
	 * Unknown properties may still be represented as \stdClass objects.
	 *
	 * @param bool $for_json_encode Represent empty key-value maps as \stdClass instead of plain PHP arrays
	 * @return array
	 */
	public function toArray($for_json_encode = false)
	{
		$ret = [];
		$ret["Type"] = $this->Type;
		$ret["OverwriteExistingFiles"] = $this->OverwriteExistingFiles;
		$ret["DestIsOriginalLocation"] = $this->DestIsOriginalLocation;
		$ret["DestPath"] = $this->DestPath;
		{
			$c0 = [];
			for($i0 = 0; $i0 < count($this->ExactDestPaths); ++$i0) {
				$val0 = $this->ExactDestPaths[$i0];
				$c0[] = $val0;
			}
			$ret["ExactDestPaths"] = $c0;
		}
		$ret["ArchiveFormat"] = $this->ArchiveFormat;
		if ( $this->Office365Credential === null ) {
			$ret["Office365Credential"] = $for_json_encode ? (object)[] : [];
		} else {
			$ret["Office365Credential"] = $this->Office365Credential->toArray($for_json_encode);
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
	public function toJSON()
	{
		$arr = $this->toArray(true);
		if (count($arr) === 0) {
			return "{}"; // object
		} else {
			return json_encode($arr);
		}
	}

	/**
	 * Convert this object to a PHP \stdClass.
	 * This may be a more convenient format for working with unknown class properties.
	 *
	 * @return \stdClass
	 */
	public function toStdClass()
	{
		$arr = $this->toArray(false);
		if (count($arr) === 0) {
			return new \stdClass();
		} else {
			return json_decode(json_encode($arr));
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
		if ($this->Office365Credential !== null) {
			$this->Office365Credential->RemoveUnknownProperties();
		}
	}

}

