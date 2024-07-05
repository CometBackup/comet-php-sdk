<?php

/**
 * Copyright (c) 2018-2024 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 *
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

class AuthenticationRoleOptions {

	/**
	 * @var boolean
	 */
	public $RoleEnabled = false;

	/**
	 * One of the INTEGRITYCHECK_ constants
	 *
	 * @var int
	 */
	public $DatabaseCheckLevel = 0;

	/**
	 * @var boolean
	 */
	public $GenerateMissedBackupEvents = false;

	/**
	 * Unix timestamp in seconds, before which no Missed jobs are created
	 *
	 * @var int
	 */
	public $NoMissedBackupEventsBefore = 0;

	/**
	 * @var boolean
	 */
	public $GenerateScheduledEmails = false;

	/**
	 * @var int
	 */
	public $PruneLogsAfterDays = 0;

	/**
	 * @var \Comet\RemoteStorageOption[]
	 */
	public $RemoteStorage = [];

	/**
	 * @var \Comet\ReplicaServer[]
	 */
	public $ReplicateTo = [];

	/**
	 * @var \Comet\GlobalOverrideOptions
	 */
	public $GlobalOverrides = null;

	/**
	 * Preserve unknown properties when dealing with future server versions.
	 *
	 * @see AuthenticationRoleOptions::RemoveUnknownProperties() Remove all unknown properties
	 * @var array
	 */
	private $__unknown_properties = [];

	/**
	 * Replace the content of this AuthenticationRoleOptions object from a PHP \stdClass.
	 * The data could be supplied from an API call after json_decode(...); or generated manually.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return void
	 */
	protected function inflateFrom(\stdClass $sc)
	{
		if (property_exists($sc, 'RoleEnabled')) {
			$this->RoleEnabled = (bool)($sc->RoleEnabled);
		}
		if (property_exists($sc, 'DatabaseCheckLevel')) {
			$this->DatabaseCheckLevel = (int)($sc->DatabaseCheckLevel);
		}
		if (property_exists($sc, 'GenerateMissedBackupEvents')) {
			$this->GenerateMissedBackupEvents = (bool)($sc->GenerateMissedBackupEvents);
		}
		if (property_exists($sc, 'NoMissedBackupEventsBefore')) {
			$this->NoMissedBackupEventsBefore = (int)($sc->NoMissedBackupEventsBefore);
		}
		if (property_exists($sc, 'GenerateScheduledEmails')) {
			$this->GenerateScheduledEmails = (bool)($sc->GenerateScheduledEmails);
		}
		if (property_exists($sc, 'PruneLogsAfterDays')) {
			$this->PruneLogsAfterDays = (int)($sc->PruneLogsAfterDays);
		}
		if (property_exists($sc, 'RemoteStorage')) {
			$val_2 = [];
			if ($sc->RemoteStorage !== null) {
				for($i_2 = 0; $i_2 < count($sc->RemoteStorage); ++$i_2) {
					if (is_array($sc->RemoteStorage[$i_2]) && count($sc->RemoteStorage[$i_2]) === 0) {
					// Work around edge case in json_decode--json_encode stdClass conversion
						$val_2[] = \Comet\RemoteStorageOption::createFromStdclass(new \stdClass());
					} else {
						$val_2[] = \Comet\RemoteStorageOption::createFromStdclass($sc->RemoteStorage[$i_2]);
					}
				}
			}
			$this->RemoteStorage = $val_2;
		}
		if (property_exists($sc, 'ReplicateTo')) {
			$val_2 = [];
			if ($sc->ReplicateTo !== null) {
				for($i_2 = 0; $i_2 < count($sc->ReplicateTo); ++$i_2) {
					if (is_array($sc->ReplicateTo[$i_2]) && count($sc->ReplicateTo[$i_2]) === 0) {
					// Work around edge case in json_decode--json_encode stdClass conversion
						$val_2[] = \Comet\ReplicaServer::createFromStdclass(new \stdClass());
					} else {
						$val_2[] = \Comet\ReplicaServer::createFromStdclass($sc->ReplicateTo[$i_2]);
					}
				}
			}
			$this->ReplicateTo = $val_2;
		}
		if (property_exists($sc, 'GlobalOverrides') && !is_null($sc->GlobalOverrides)) {
			if (is_array($sc->GlobalOverrides) && count($sc->GlobalOverrides) === 0) {
			// Work around edge case in json_decode--json_encode stdClass conversion
				$this->GlobalOverrides = \Comet\GlobalOverrideOptions::createFromStdclass(new \stdClass());
			} else {
				$this->GlobalOverrides = \Comet\GlobalOverrideOptions::createFromStdclass($sc->GlobalOverrides);
			}
		}
		foreach(get_object_vars($sc) as $k => $v) {
			switch($k) {
			case 'RoleEnabled':
			case 'DatabaseCheckLevel':
			case 'GenerateMissedBackupEvents':
			case 'NoMissedBackupEventsBefore':
			case 'GenerateScheduledEmails':
			case 'PruneLogsAfterDays':
			case 'RemoteStorage':
			case 'ReplicateTo':
			case 'GlobalOverrides':
				break;
			default:
				$this->__unknown_properties[$k] = $v;
			}
		}
	}

	/**
	 * Coerce a stdClass into a new strongly-typed AuthenticationRoleOptions object.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return AuthenticationRoleOptions
	 */
	public static function createFromStdclass(\stdClass $sc): \Comet\AuthenticationRoleOptions
	{
		$retn = new AuthenticationRoleOptions();
		$retn->inflateFrom($sc);
		return $retn;
	}

	/**
	 * Coerce a plain PHP array into a new strongly-typed AuthenticationRoleOptions object.
	 * Because the Comet Server requires strict distinction between empty objects ({}) and arrays ([]),
	 * the result of this method may not be safe to re-submit to the Comet Server.
	 *
	 * @param array $arr Object data as PHP array
	 * @return AuthenticationRoleOptions
	 */
	public static function createFromArray(array $arr): \Comet\AuthenticationRoleOptions
	{
		$stdClass = json_decode(json_encode($arr, JSON_UNESCAPED_SLASHES));
		if (is_array($stdClass) && count($stdClass) === 0) {
			$stdClass = new \stdClass();
		}
		return self::createFromStdclass($stdClass);
	}

	/**
	 * Coerce a JSON string into a new strongly-typed AuthenticationRoleOptions object.
	 *
	 * @param string $JsonString Object data as JSON string
	 * @return AuthenticationRoleOptions
	 */
	public static function createFromJSON(string $JsonString): \Comet\AuthenticationRoleOptions
	{
		$decodedJsonObject = json_decode($JsonString); // as stdClass
		if (\json_last_error() != \JSON_ERROR_NONE) {
			throw new \Exception("JSON decode failed: " . \json_last_error_msg(), \json_last_error());
		}
		$retn = new AuthenticationRoleOptions();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}

	/**
	 * Convert this AuthenticationRoleOptions object into a plain PHP array.
	 *
	 * Unknown properties may still be represented as \stdClass objects.
	 *
	 * @param bool $for_json_encode Represent key-value maps as \stdClass instead of plain PHP arrays
	 * @return array
	 */
	public function toArray(bool $for_json_encode = false): array
	{
		$ret = [];
		$ret["RoleEnabled"] = $this->RoleEnabled;
		$ret["DatabaseCheckLevel"] = $this->DatabaseCheckLevel;
		$ret["GenerateMissedBackupEvents"] = $this->GenerateMissedBackupEvents;
		$ret["NoMissedBackupEventsBefore"] = $this->NoMissedBackupEventsBefore;
		$ret["GenerateScheduledEmails"] = $this->GenerateScheduledEmails;
		$ret["PruneLogsAfterDays"] = $this->PruneLogsAfterDays;
		{
			$c0 = [];
			for($i0 = 0; $i0 < count($this->RemoteStorage); ++$i0) {
				if ( $this->RemoteStorage[$i0] === null ) {
					$val0 = $for_json_encode ? (object)[] : [];
				} else {
					$val0 = $this->RemoteStorage[$i0]->toArray($for_json_encode);
				}
				$c0[] = $val0;
			}
			$ret["RemoteStorage"] = $c0;
		}
		{
			$c0 = [];
			for($i0 = 0; $i0 < count($this->ReplicateTo); ++$i0) {
				if ( $this->ReplicateTo[$i0] === null ) {
					$val0 = $for_json_encode ? (object)[] : [];
				} else {
					$val0 = $this->ReplicateTo[$i0]->toArray($for_json_encode);
				}
				$c0[] = $val0;
			}
			$ret["ReplicateTo"] = $c0;
		}
		if ( $this->GlobalOverrides === null ) {
			$ret["GlobalOverrides"] = $for_json_encode ? (object)[] : [];
		} else {
			$ret["GlobalOverrides"] = $this->GlobalOverrides->toArray($for_json_encode);
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
		if ($this->GlobalOverrides !== null) {
			$this->GlobalOverrides->RemoveUnknownProperties();
		}
	}

}

