<?php

/**
 * Copyright (c) 2018-2023 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 *
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

/**
 * FileOption defines the configuration for Comet Server to log live events to a file. See the SEVT_
 * constants for more information.
 * This type is available in Comet 23.3.7 and later.
 */
class FileOption {

	/**
	 * The prefix for the log filename. It will be stored in the same file location as the Comet Server
	 * log files
	 *
	 * @var string
	 */
	public $Filename = "";

	/**
	 * Configure a subset of allowed event types (see SEVT_ constants). If the array is empty, all
	 * events will be sent
	 *
	 * @var int[]
	 */
	public $AllowEventTypes = [];

	/**
	 * One of the STREAM_LEVEL_ constants. This controls how much data is logged into the file
	 *
	 * @var string
	 */
	public $Level = "";

	/**
	 * Enables pruning of log files
	 *
	 * @var boolean
	 */
	public $PruningEnabled = false;

	/**
	 * Limit in days to keep log files when PruningEnabled is set to true. If not set or 0, uses
	 * server's PruneLogsAfterDays
	 *
	 * @var int
	 */
	public $PruningLimit = 0;

	/**
	 * Preserve unknown properties when dealing with future server versions.
	 *
	 * @see FileOption::RemoveUnknownProperties() Remove all unknown properties
	 * @var array
	 */
	private $__unknown_properties = [];

	/**
	 * Replace the content of this FileOption object from a PHP \stdClass.
	 * The data could be supplied from an API call after json_decode(...); or generated manually.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return void
	 */
	protected function inflateFrom(\stdClass $sc)
	{
		if (property_exists($sc, 'Filename')) {
			$this->Filename = (string)($sc->Filename);
		}
		if (property_exists($sc, 'AllowEventTypes') && !is_null($sc->AllowEventTypes)) {
			$val_2 = [];
			if ($sc->AllowEventTypes !== null) {
				for($i_2 = 0; $i_2 < count($sc->AllowEventTypes); ++$i_2) {
					$val_2[] = (int)($sc->AllowEventTypes[$i_2]);
				}
			}
			$this->AllowEventTypes = $val_2;
		}
		if (property_exists($sc, 'Level') && !is_null($sc->Level)) {
			$this->Level = (string)($sc->Level);
		}
		if (property_exists($sc, 'PruningEnabled') && !is_null($sc->PruningEnabled)) {
			$this->PruningEnabled = (bool)($sc->PruningEnabled);
		}
		if (property_exists($sc, 'PruningLimit') && !is_null($sc->PruningLimit)) {
			$this->PruningLimit = (int)($sc->PruningLimit);
		}
		foreach(get_object_vars($sc) as $k => $v) {
			switch($k) {
			case 'Filename':
			case 'AllowEventTypes':
			case 'Level':
			case 'PruningEnabled':
			case 'PruningLimit':
				break;
			default:
				$this->__unknown_properties[$k] = $v;
			}
		}
	}

	/**
	 * Coerce a stdClass into a new strongly-typed FileOption object.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return FileOption
	 */
	public static function createFromStdclass(\stdClass $sc): \Comet\FileOption
	{
		$retn = new FileOption();
		$retn->inflateFrom($sc);
		return $retn;
	}

	/**
	 * Coerce a plain PHP array into a new strongly-typed FileOption object.
	 * Because the Comet Server requires strict distinction between empty objects ({}) and arrays ([]),
	 * the result of this method may not be safe to re-submit to the Comet Server.
	 *
	 * @param array $arr Object data as PHP array
	 * @return FileOption
	 */
	public static function createFromArray(array $arr): \Comet\FileOption
	{
		$stdClass = json_decode(json_encode($arr, JSON_UNESCAPED_SLASHES));
		if (is_array($stdClass) && count($stdClass) === 0) {
			$stdClass = new \stdClass();
		}
		return self::createFromStdclass($stdClass);
	}

	/**
	 * Coerce a JSON string into a new strongly-typed FileOption object.
	 *
	 * @param string $JsonString Object data as JSON string
	 * @return FileOption
	 */
	public static function createFromJSON(string $JsonString): \Comet\FileOption
	{
		$decodedJsonObject = json_decode($JsonString); // as stdClass
		if (\json_last_error() != \JSON_ERROR_NONE) {
			throw new \Exception("JSON decode failed: " . \json_last_error_msg(), \json_last_error());
		}
		$retn = new FileOption();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}

	/**
	 * Convert this FileOption object into a plain PHP array.
	 *
	 * Unknown properties may still be represented as \stdClass objects.
	 *
	 * @param bool $for_json_encode Represent empty key-value maps as \stdClass instead of plain PHP arrays
	 * @return array
	 */
	public function toArray(bool $for_json_encode = false): array
	{
		$ret = [];
		$ret["Filename"] = $this->Filename;
		{
			$c0 = [];
			for($i0 = 0; $i0 < count($this->AllowEventTypes); ++$i0) {
				$val0 = $this->AllowEventTypes[$i0];
				$c0[] = $val0;
			}
			$ret["AllowEventTypes"] = $c0;
		}
		$ret["Level"] = $this->Level;
		$ret["PruningEnabled"] = $this->PruningEnabled;
		$ret["PruningLimit"] = $this->PruningLimit;

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

