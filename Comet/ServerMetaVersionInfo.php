<?php

/**
 * Copyright (c) 2018-2025 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 *
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

class ServerMetaVersionInfo {

	/**
	 * @var string
	 */
	public $Version = "";

	/**
	 * @var string
	 */
	public $VersionCodename = "";

	/**
	 * @var boolean
	 */
	public $StorageRole = false;

	/**
	 * @var boolean
	 */
	public $AuthenticationRole = false;

	/**
	 * @var boolean
	 */
	public $SoftwareBuildRole = false;

	/**
	 * @var boolean
	 * @deprecated 18.2.0 "Overseer Role" was the old name for the Constellation Role. This field is a duplicate of ConstellationRole for backward compatibility with earlier API consumers. This member has been deprecated since Comet version 18.2.0 "Overseer Role" was the old name for the Constellation Role. This field is a duplicate of ConstellationRole for backward compatibility with earlier API consumers.
	 */
	public $ConstellationRole_Legacy = false;

	/**
	 * @var boolean
	 */
	public $ConstellationRole = false;

	/**
	 * @var string[]
	 */
	public $ExperimentalOptions = [];

	/**
	 * Unix timestamp, in seconds.
	 *
	 * @var int
	 */
	public $ServerStartTime = 0;

	/**
	 * A GUID that was randomly generated when this Comet Server started up. You can check this value to
	 * see if the Comet Server has restarted.
	 *
	 * @var string
	 */
	public $ServerStartHash = "";

	/**
	 * The current time on the Comet Server host machine. Unix timestamp, in seconds. You can check this
	 * value to see if clock drift is occuring.
	 *
	 * @var int
	 */
	public $CurrentTime = 0;

	/**
	 * A hash derived from the Comet Server's serial number. You can check this value to see if two
	 * Comet Server endpoints point to an identical server.
	 *
	 * @var string
	 */
	public $ServerLicenseHash = "";

	/**
	 * @var boolean
	 * @deprecated 24.9.x This member has been deprecated since Comet version 24.9.x
	 */
	public $ServerLicenseFeaturesAll = false;

	/**
	 * A bitset of feature flags representing functionality available in this Comet Server's plan
	 *
	 * @var int
	 */
	public $ServerLicenseFeatureSet = 0;

	/**
	 * If non-zero, the maximum numbers of devices and Protected Item types that this server is allowed.
	 *
	 * @var \Comet\LicenseLimits
	 * This field is available in Comet 24.6.3 and later.
	 */
	public $ServerLicenseLimit = null;

	/**
	 * A count of the devices registered on the server that have a configured Protected Item.
	 *
	 * @var int
	 * This field is available in Comet 24.6.3 and later.
	 */
	public $ConfiguredDevices = 0;

	/**
	 * The current number of Protected Item types configured on the server.
	 *
	 * @var array<string, int>
	 * This field is available in Comet 24.6.3 and later.
	 */
	public $BoosterLimit = [];

	/**
	 * Unix timestamp, in seconds.
	 *
	 * @var int
	 */
	public $LicenseValidUntil = 0;

	/**
	 * @var int
	 */
	public $EmailsSentSuccessfully = 0;

	/**
	 * @var int
	 */
	public $EmailsSentErrors = 0;

	/**
	 * @var int
	 */
	public $EmailsWaitingInQueue = 0;

	/**
	 * @var int
	 */
	public $ScheduledEmailThreadCurrentState = 0;

	/**
	 * @var int
	 */
	public $ScheduledEmailThreadLastCalculateDurationNanos = 0;

	/**
	 * @var int
	 */
	public $ScheduledEmailThreadWaitingUntil = 0;

	/**
	 * @var int
	 */
	public $ScheduledEmailThreadLastWakeTime = 0;

	/**
	 * @var boolean
	 */
	public $ScheduledEmailThreadLastWakeSentEmails = false;

	/**
	 * @var \Comet\SelfBackupStatistics[]
	 * This field is available in Comet 21.3.2 and later.
	 */
	public $SelfBackup = [];

	/**
	 * Preserve unknown properties when dealing with future server versions.
	 *
	 * @see ServerMetaVersionInfo::RemoveUnknownProperties() Remove all unknown properties
	 * @var array
	 */
	private $__unknown_properties = [];

	/**
	 * Replace the content of this ServerMetaVersionInfo object from a PHP \stdClass.
	 * The data could be supplied from an API call after json_decode(...); or generated manually.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return void
	 */
	protected function inflateFrom(\stdClass $sc)
	{
		if (property_exists($sc, 'Version')) {
			$this->Version = (string)($sc->Version);
		}
		if (property_exists($sc, 'VersionCodename')) {
			$this->VersionCodename = (string)($sc->VersionCodename);
		}
		if (property_exists($sc, 'StorageRole')) {
			$this->StorageRole = (bool)($sc->StorageRole);
		}
		if (property_exists($sc, 'AuthenticationRole')) {
			$this->AuthenticationRole = (bool)($sc->AuthenticationRole);
		}
		if (property_exists($sc, 'SoftwareBuildRole')) {
			$this->SoftwareBuildRole = (bool)($sc->SoftwareBuildRole);
		}
		if (property_exists($sc, 'OverseerRole')) {
			$this->ConstellationRole_Legacy = (bool)($sc->OverseerRole);
		}
		if (property_exists($sc, 'ConstellationRole')) {
			$this->ConstellationRole = (bool)($sc->ConstellationRole);
		}
		if (property_exists($sc, 'ExperimentalOptions') && !is_null($sc->ExperimentalOptions)) {
			$val_2 = [];
			if ($sc->ExperimentalOptions !== null) {
				for($i_2 = 0; $i_2 < count($sc->ExperimentalOptions); ++$i_2) {
					$val_2[] = (string)($sc->ExperimentalOptions[$i_2]);
				}
			}
			$this->ExperimentalOptions = $val_2;
		}
		if (property_exists($sc, 'ServerStartTime')) {
			$this->ServerStartTime = (int)($sc->ServerStartTime);
		}
		if (property_exists($sc, 'ServerStartHash')) {
			$this->ServerStartHash = (string)($sc->ServerStartHash);
		}
		if (property_exists($sc, 'CurrentTime')) {
			$this->CurrentTime = (int)($sc->CurrentTime);
		}
		if (property_exists($sc, 'ServerLicenseHash')) {
			$this->ServerLicenseHash = (string)($sc->ServerLicenseHash);
		}
		if (property_exists($sc, 'ServerLicenseFeaturesAll')) {
			$this->ServerLicenseFeaturesAll = (bool)($sc->ServerLicenseFeaturesAll);
		}
		if (property_exists($sc, 'ServerLicenseFeatureSet')) {
			$this->ServerLicenseFeatureSet = (int)($sc->ServerLicenseFeatureSet);
		}
		if (property_exists($sc, 'ServerLicenseLimit')) {
			if (is_array($sc->ServerLicenseLimit) && count($sc->ServerLicenseLimit) === 0) {
			// Work around edge case in json_decode--json_encode stdClass conversion
				$this->ServerLicenseLimit = \Comet\LicenseLimits::createFromStdclass(new \stdClass());
			} else {
				$this->ServerLicenseLimit = \Comet\LicenseLimits::createFromStdclass($sc->ServerLicenseLimit);
			}
		}
		if (property_exists($sc, 'ConfiguredDevices')) {
			$this->ConfiguredDevices = (int)($sc->ConfiguredDevices);
		}
		if (property_exists($sc, 'BoosterLimit')) {
			$val_2 = [];
			if ($sc->BoosterLimit !== null) {
				foreach($sc->BoosterLimit as $k_2 => $v_2) {
					$phpk_2 = (string)($k_2);
					$phpv_2 = (int)($v_2);
					$val_2[$phpk_2] = $phpv_2;
				}
			}
			$this->BoosterLimit = $val_2;
		}
		if (property_exists($sc, 'LicenseValidUntil')) {
			$this->LicenseValidUntil = (int)($sc->LicenseValidUntil);
		}
		if (property_exists($sc, 'EmailsSentSuccessfully')) {
			$this->EmailsSentSuccessfully = (int)($sc->EmailsSentSuccessfully);
		}
		if (property_exists($sc, 'EmailsSentErrors')) {
			$this->EmailsSentErrors = (int)($sc->EmailsSentErrors);
		}
		if (property_exists($sc, 'EmailsWaitingInQueue')) {
			$this->EmailsWaitingInQueue = (int)($sc->EmailsWaitingInQueue);
		}
		if (property_exists($sc, 'ScheduledEmailThreadCurrentState')) {
			$this->ScheduledEmailThreadCurrentState = (int)($sc->ScheduledEmailThreadCurrentState);
		}
		if (property_exists($sc, 'ScheduledEmailThreadLastCalculateDurationNanos')) {
			$this->ScheduledEmailThreadLastCalculateDurationNanos = (int)($sc->ScheduledEmailThreadLastCalculateDurationNanos);
		}
		if (property_exists($sc, 'ScheduledEmailThreadWaitingUntil')) {
			$this->ScheduledEmailThreadWaitingUntil = (int)($sc->ScheduledEmailThreadWaitingUntil);
		}
		if (property_exists($sc, 'ScheduledEmailThreadLastWakeTime')) {
			$this->ScheduledEmailThreadLastWakeTime = (int)($sc->ScheduledEmailThreadLastWakeTime);
		}
		if (property_exists($sc, 'ScheduledEmailThreadLastWakeSentEmails')) {
			$this->ScheduledEmailThreadLastWakeSentEmails = (bool)($sc->ScheduledEmailThreadLastWakeSentEmails);
		}
		if (property_exists($sc, 'SelfBackup')) {
			$val_2 = [];
			if ($sc->SelfBackup !== null) {
				for($i_2 = 0; $i_2 < count($sc->SelfBackup); ++$i_2) {
					if (is_array($sc->SelfBackup[$i_2]) && count($sc->SelfBackup[$i_2]) === 0) {
					// Work around edge case in json_decode--json_encode stdClass conversion
						$val_2[] = \Comet\SelfBackupStatistics::createFromStdclass(new \stdClass());
					} else {
						$val_2[] = \Comet\SelfBackupStatistics::createFromStdclass($sc->SelfBackup[$i_2]);
					}
				}
			}
			$this->SelfBackup = $val_2;
		}
		foreach(get_object_vars($sc) as $k => $v) {
			switch($k) {
			case 'Version':
			case 'VersionCodename':
			case 'StorageRole':
			case 'AuthenticationRole':
			case 'SoftwareBuildRole':
			case 'OverseerRole':
			case 'ConstellationRole':
			case 'ExperimentalOptions':
			case 'ServerStartTime':
			case 'ServerStartHash':
			case 'CurrentTime':
			case 'ServerLicenseHash':
			case 'ServerLicenseFeaturesAll':
			case 'ServerLicenseFeatureSet':
			case 'ServerLicenseLimit':
			case 'ConfiguredDevices':
			case 'BoosterLimit':
			case 'LicenseValidUntil':
			case 'EmailsSentSuccessfully':
			case 'EmailsSentErrors':
			case 'EmailsWaitingInQueue':
			case 'ScheduledEmailThreadCurrentState':
			case 'ScheduledEmailThreadLastCalculateDurationNanos':
			case 'ScheduledEmailThreadWaitingUntil':
			case 'ScheduledEmailThreadLastWakeTime':
			case 'ScheduledEmailThreadLastWakeSentEmails':
			case 'SelfBackup':
				break;
			default:
				$this->__unknown_properties[$k] = $v;
			}
		}
	}

	/**
	 * Coerce a stdClass into a new strongly-typed ServerMetaVersionInfo object.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return ServerMetaVersionInfo
	 */
	public static function createFromStdclass(\stdClass $sc): \Comet\ServerMetaVersionInfo
	{
		$retn = new ServerMetaVersionInfo();
		$retn->inflateFrom($sc);
		return $retn;
	}

	/**
	 * Coerce a plain PHP array into a new strongly-typed ServerMetaVersionInfo object.
	 * Because the Comet Server requires strict distinction between empty objects ({}) and arrays ([]),
	 * the result of this method may not be safe to re-submit to the Comet Server.
	 *
	 * @param array $arr Object data as PHP array
	 * @return ServerMetaVersionInfo
	 */
	public static function createFromArray(array $arr): \Comet\ServerMetaVersionInfo
	{
		$stdClass = json_decode(json_encode($arr, JSON_UNESCAPED_SLASHES));
		if (is_array($stdClass) && count($stdClass) === 0) {
			$stdClass = new \stdClass();
		}
		return self::createFromStdclass($stdClass);
	}

	/**
	 * Coerce a JSON string into a new strongly-typed ServerMetaVersionInfo object.
	 *
	 * @param string $JsonString Object data as JSON string
	 * @return ServerMetaVersionInfo
	 */
	public static function createFromJSON(string $JsonString): \Comet\ServerMetaVersionInfo
	{
		$decodedJsonObject = json_decode($JsonString); // as stdClass
		if (\json_last_error() != \JSON_ERROR_NONE) {
			throw new \Exception("JSON decode failed: " . \json_last_error_msg(), \json_last_error());
		}
		$retn = new ServerMetaVersionInfo();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}

	/**
	 * Convert this ServerMetaVersionInfo object into a plain PHP array.
	 *
	 * Unknown properties may still be represented as \stdClass objects.
	 *
	 * @param bool $for_json_encode Represent key-value maps as \stdClass instead of plain PHP arrays
	 * @return array
	 */
	public function toArray(bool $for_json_encode = false): array
	{
		$ret = [];
		$ret["Version"] = $this->Version;
		$ret["VersionCodename"] = $this->VersionCodename;
		$ret["StorageRole"] = $this->StorageRole;
		$ret["AuthenticationRole"] = $this->AuthenticationRole;
		$ret["SoftwareBuildRole"] = $this->SoftwareBuildRole;
		$ret["OverseerRole"] = $this->ConstellationRole_Legacy;
		$ret["ConstellationRole"] = $this->ConstellationRole;
		{
			$c0 = [];
			for($i0 = 0; $i0 < count($this->ExperimentalOptions); ++$i0) {
				$val0 = $this->ExperimentalOptions[$i0];
				$c0[] = $val0;
			}
			$ret["ExperimentalOptions"] = $c0;
		}
		$ret["ServerStartTime"] = $this->ServerStartTime;
		$ret["ServerStartHash"] = $this->ServerStartHash;
		$ret["CurrentTime"] = $this->CurrentTime;
		$ret["ServerLicenseHash"] = $this->ServerLicenseHash;
		$ret["ServerLicenseFeaturesAll"] = $this->ServerLicenseFeaturesAll;
		$ret["ServerLicenseFeatureSet"] = $this->ServerLicenseFeatureSet;
		if ( $this->ServerLicenseLimit === null ) {
			$ret["ServerLicenseLimit"] = $for_json_encode ? (object)[] : [];
		} else {
			$ret["ServerLicenseLimit"] = $this->ServerLicenseLimit->toArray($for_json_encode);
		}
		$ret["ConfiguredDevices"] = $this->ConfiguredDevices;
		{
			$c0 = $for_json_encode ? (object)[] : [];
			foreach($this->BoosterLimit as $k0 => $v0) {
				$ko_0 = $k0;
				$vo_0 = $v0;
				if ($for_json_encode) {
				$c0->{ $ko_0 } = $vo_0;
				} else {
					$c0[ $ko_0 ] = $vo_0;
				}
			}
			$ret["BoosterLimit"] = $c0;
		}
		$ret["LicenseValidUntil"] = $this->LicenseValidUntil;
		$ret["EmailsSentSuccessfully"] = $this->EmailsSentSuccessfully;
		$ret["EmailsSentErrors"] = $this->EmailsSentErrors;
		$ret["EmailsWaitingInQueue"] = $this->EmailsWaitingInQueue;
		$ret["ScheduledEmailThreadCurrentState"] = $this->ScheduledEmailThreadCurrentState;
		$ret["ScheduledEmailThreadLastCalculateDurationNanos"] = $this->ScheduledEmailThreadLastCalculateDurationNanos;
		$ret["ScheduledEmailThreadWaitingUntil"] = $this->ScheduledEmailThreadWaitingUntil;
		$ret["ScheduledEmailThreadLastWakeTime"] = $this->ScheduledEmailThreadLastWakeTime;
		$ret["ScheduledEmailThreadLastWakeSentEmails"] = $this->ScheduledEmailThreadLastWakeSentEmails;
		{
			$c0 = [];
			for($i0 = 0; $i0 < count($this->SelfBackup); ++$i0) {
				if ( $this->SelfBackup[$i0] === null ) {
					$val0 = $for_json_encode ? (object)[] : [];
				} else {
					$val0 = $this->SelfBackup[$i0]->toArray($for_json_encode);
				}
				$c0[] = $val0;
			}
			$ret["SelfBackup"] = $c0;
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
		if ($this->ServerLicenseLimit !== null) {
			$this->ServerLicenseLimit->RemoveUnknownProperties();
		}
	}

}

