<?php

/**
 * Copyright (c) 2018-2025 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 *
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

class SelfBackupExportOptions {

	/**
	 * @var \Comet\DestinationLocation
	 */
	public $Location = null;

	/**
	 * @var string
	 */
	public $EncryptionKey = "";

	/**
	 * One of the ENCRYPTIONMETHOD_ constants
	 *
	 * @var int
	 */
	public $EncryptionKeyFormat = 0;

	/**
	 * One of the COMPRESS_LVL_ constants
	 *
	 * @var int
	 */
	public $Compression = 0;

	/**
	 * The jobs database is often the largest component of the System Self-Backup archive. By excluding
	 * it, you could run the System Self-Backup more often.
	 *
	 * @var boolean
	 */
	public $ExcludeJobsDB = false;

	/**
	 * @var boolean
	 */
	public $IncludeServerLogs = false;

	/**
	 * @var string
	 */
	public $RestrictToSingleOrgID = "";

	/**
	 * @var int
	 */
	public $Index = 0;

	/**
	 * Preserve unknown properties when dealing with future server versions.
	 *
	 * @see SelfBackupExportOptions::RemoveUnknownProperties() Remove all unknown properties
	 * @var array
	 */
	private $__unknown_properties = [];

	/**
	 * Replace the content of this SelfBackupExportOptions object from a PHP \stdClass.
	 * The data could be supplied from an API call after json_decode(...); or generated manually.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return void
	 */
	protected function inflateFrom(\stdClass $sc)
	{
		if (property_exists($sc, 'Location')) {
			if (is_array($sc->Location) && count($sc->Location) === 0) {
			// Work around edge case in json_decode--json_encode stdClass conversion
				$this->Location = \Comet\DestinationLocation::createFromStdclass(new \stdClass());
			} else {
				$this->Location = \Comet\DestinationLocation::createFromStdclass($sc->Location);
			}
		}
		if (property_exists($sc, 'EncryptionKey')) {
			$this->EncryptionKey = (string)($sc->EncryptionKey);
		}
		if (property_exists($sc, 'EncryptionKeyFormat')) {
			$this->EncryptionKeyFormat = (int)($sc->EncryptionKeyFormat);
		}
		if (property_exists($sc, 'Compression')) {
			$this->Compression = (int)($sc->Compression);
		}
		if (property_exists($sc, 'ExcludeJobsDB')) {
			$this->ExcludeJobsDB = (bool)($sc->ExcludeJobsDB);
		}
		if (property_exists($sc, 'IncludeServerLogs')) {
			$this->IncludeServerLogs = (bool)($sc->IncludeServerLogs);
		}
		if (property_exists($sc, 'RestrictToSingleOrgID') && !is_null($sc->RestrictToSingleOrgID)) {
			$this->RestrictToSingleOrgID = (string)($sc->RestrictToSingleOrgID);
		}
		if (property_exists($sc, 'Index')) {
			$this->Index = (int)($sc->Index);
		}
		foreach(get_object_vars($sc) as $k => $v) {
			switch($k) {
			case 'Location':
			case 'EncryptionKey':
			case 'EncryptionKeyFormat':
			case 'Compression':
			case 'ExcludeJobsDB':
			case 'IncludeServerLogs':
			case 'RestrictToSingleOrgID':
			case 'Index':
				break;
			default:
				$this->__unknown_properties[$k] = $v;
			}
		}
	}

	/**
	 * Coerce a stdClass into a new strongly-typed SelfBackupExportOptions object.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return SelfBackupExportOptions
	 */
	public static function createFromStdclass(\stdClass $sc): \Comet\SelfBackupExportOptions
	{
		$retn = new SelfBackupExportOptions();
		$retn->inflateFrom($sc);
		return $retn;
	}

	/**
	 * Coerce a plain PHP array into a new strongly-typed SelfBackupExportOptions object.
	 * Because the Comet Server requires strict distinction between empty objects ({}) and arrays ([]),
	 * the result of this method may not be safe to re-submit to the Comet Server.
	 *
	 * @param array $arr Object data as PHP array
	 * @return SelfBackupExportOptions
	 */
	public static function createFromArray(array $arr): \Comet\SelfBackupExportOptions
	{
		$stdClass = json_decode(json_encode($arr, JSON_UNESCAPED_SLASHES));
		if (is_array($stdClass) && count($stdClass) === 0) {
			$stdClass = new \stdClass();
		}
		return self::createFromStdclass($stdClass);
	}

	/**
	 * Coerce a JSON string into a new strongly-typed SelfBackupExportOptions object.
	 *
	 * @param string $JsonString Object data as JSON string
	 * @return SelfBackupExportOptions
	 */
	public static function createFromJSON(string $JsonString): \Comet\SelfBackupExportOptions
	{
		$decodedJsonObject = json_decode($JsonString); // as stdClass
		if (\json_last_error() != \JSON_ERROR_NONE) {
			throw new \Exception("JSON decode failed: " . \json_last_error_msg(), \json_last_error());
		}
		$retn = new SelfBackupExportOptions();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}

	/**
	 * Convert this SelfBackupExportOptions object into a plain PHP array.
	 *
	 * Unknown properties may still be represented as \stdClass objects.
	 *
	 * @param bool $for_json_encode Represent key-value maps as \stdClass instead of plain PHP arrays
	 * @return array
	 */
	public function toArray(bool $for_json_encode = false): array
	{
		$ret = [];
		if ( $this->Location === null ) {
			$ret["Location"] = $for_json_encode ? (object)[] : [];
		} else {
			$ret["Location"] = $this->Location->toArray($for_json_encode);
		}
		$ret["EncryptionKey"] = $this->EncryptionKey;
		$ret["EncryptionKeyFormat"] = $this->EncryptionKeyFormat;
		$ret["Compression"] = $this->Compression;
		$ret["ExcludeJobsDB"] = $this->ExcludeJobsDB;
		$ret["IncludeServerLogs"] = $this->IncludeServerLogs;
		$ret["RestrictToSingleOrgID"] = $this->RestrictToSingleOrgID;
		$ret["Index"] = $this->Index;

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
		if ($this->Location !== null) {
			$this->Location->RemoveUnknownProperties();
		}
	}

}

