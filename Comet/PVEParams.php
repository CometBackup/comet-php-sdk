<?php

/**
 * Copyright (c) 2018-2025 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 *
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

class PVEParams {

	/**
	 * @var boolean
	 */
	public $Everything = false;

	/**
	 * @var \Comet\PVEBackupNode[]
	 */
	public $Exclusions = [];

	/**
	 * @var string
	 */
	public $Method = "";

	/**
	 * @var int
	 */
	public $Quota = 0;

	/**
	 * @var \Comet\SSHConnection
	 */
	public $SSHConnection = null;

	/**
	 * @var \Comet\PVEBackupNode[]
	 */
	public $Selections = [];

	/**
	 * Preserve unknown properties when dealing with future server versions.
	 *
	 * @see PVEParams::RemoveUnknownProperties() Remove all unknown properties
	 * @var array
	 */
	private $__unknown_properties = [];

	/**
	 * Replace the content of this PVEParams object from a PHP \stdClass.
	 * The data could be supplied from an API call after json_decode(...); or generated manually.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return void
	 */
	protected function inflateFrom(\stdClass $sc)
	{
		if (property_exists($sc, 'Everything') && !is_null($sc->Everything)) {
			$this->Everything = (bool)($sc->Everything);
		}
		if (property_exists($sc, 'Exclusions') && !is_null($sc->Exclusions)) {
			$val_2 = [];
			if ($sc->Exclusions !== null) {
				for($i_2 = 0; $i_2 < count($sc->Exclusions); ++$i_2) {
					if (is_array($sc->Exclusions[$i_2]) && count($sc->Exclusions[$i_2]) === 0) {
					// Work around edge case in json_decode--json_encode stdClass conversion
						$val_2[] = \Comet\PVEBackupNode::createFromStdclass(new \stdClass());
					} else {
						$val_2[] = \Comet\PVEBackupNode::createFromStdclass($sc->Exclusions[$i_2]);
					}
				}
			}
			$this->Exclusions = $val_2;
		}
		if (property_exists($sc, 'Method') && !is_null($sc->Method)) {
			$this->Method = (string)($sc->Method);
		}
		if (property_exists($sc, 'Quota') && !is_null($sc->Quota)) {
			$this->Quota = (int)($sc->Quota);
		}
		if (property_exists($sc, 'SSHConnection') && !is_null($sc->SSHConnection)) {
			if (is_array($sc->SSHConnection) && count($sc->SSHConnection) === 0) {
			// Work around edge case in json_decode--json_encode stdClass conversion
				$this->SSHConnection = \Comet\SSHConnection::createFromStdclass(new \stdClass());
			} else {
				$this->SSHConnection = \Comet\SSHConnection::createFromStdclass($sc->SSHConnection);
			}
		}
		if (property_exists($sc, 'Selections') && !is_null($sc->Selections)) {
			$val_2 = [];
			if ($sc->Selections !== null) {
				for($i_2 = 0; $i_2 < count($sc->Selections); ++$i_2) {
					if (is_array($sc->Selections[$i_2]) && count($sc->Selections[$i_2]) === 0) {
					// Work around edge case in json_decode--json_encode stdClass conversion
						$val_2[] = \Comet\PVEBackupNode::createFromStdclass(new \stdClass());
					} else {
						$val_2[] = \Comet\PVEBackupNode::createFromStdclass($sc->Selections[$i_2]);
					}
				}
			}
			$this->Selections = $val_2;
		}
		foreach(get_object_vars($sc) as $k => $v) {
			switch($k) {
			case 'Everything':
			case 'Exclusions':
			case 'Method':
			case 'Quota':
			case 'SSHConnection':
			case 'Selections':
				break;
			default:
				$this->__unknown_properties[$k] = $v;
			}
		}
	}

	/**
	 * Coerce a stdClass into a new strongly-typed PVEParams object.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return PVEParams
	 */
	public static function createFromStdclass(\stdClass $sc): \Comet\PVEParams
	{
		$retn = new PVEParams();
		$retn->inflateFrom($sc);
		return $retn;
	}

	/**
	 * Coerce a plain PHP array into a new strongly-typed PVEParams object.
	 * Because the Comet Server requires strict distinction between empty objects ({}) and arrays ([]),
	 * the result of this method may not be safe to re-submit to the Comet Server.
	 *
	 * @param array $arr Object data as PHP array
	 * @return PVEParams
	 */
	public static function createFromArray(array $arr): \Comet\PVEParams
	{
		$stdClass = json_decode(json_encode($arr, JSON_UNESCAPED_SLASHES));
		if (is_array($stdClass) && count($stdClass) === 0) {
			$stdClass = new \stdClass();
		}
		return self::createFromStdclass($stdClass);
	}

	/**
	 * Coerce a JSON string into a new strongly-typed PVEParams object.
	 *
	 * @param string $JsonString Object data as JSON string
	 * @return PVEParams
	 */
	public static function createFromJSON(string $JsonString): \Comet\PVEParams
	{
		$decodedJsonObject = json_decode($JsonString); // as stdClass
		if (\json_last_error() != \JSON_ERROR_NONE) {
			throw new \Exception("JSON decode failed: " . \json_last_error_msg(), \json_last_error());
		}
		$retn = new PVEParams();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}

	/**
	 * Convert this PVEParams object into a plain PHP array.
	 *
	 * Unknown properties may still be represented as \stdClass objects.
	 *
	 * @param bool $for_json_encode Represent key-value maps as \stdClass instead of plain PHP arrays
	 * @return array
	 */
	public function toArray(bool $for_json_encode = false): array
	{
		$ret = [];
		$ret["Everything"] = $this->Everything;
		{
			$c0 = [];
			for($i0 = 0; $i0 < count($this->Exclusions); ++$i0) {
				if ( $this->Exclusions[$i0] === null ) {
					$val0 = $for_json_encode ? (object)[] : [];
				} else {
					$val0 = $this->Exclusions[$i0]->toArray($for_json_encode);
				}
				$c0[] = $val0;
			}
			$ret["Exclusions"] = $c0;
		}
		$ret["Method"] = $this->Method;
		$ret["Quota"] = $this->Quota;
		if ( $this->SSHConnection === null ) {
			$ret["SSHConnection"] = $for_json_encode ? (object)[] : [];
		} else {
			$ret["SSHConnection"] = $this->SSHConnection->toArray($for_json_encode);
		}
		{
			$c0 = [];
			for($i0 = 0; $i0 < count($this->Selections); ++$i0) {
				if ( $this->Selections[$i0] === null ) {
					$val0 = $for_json_encode ? (object)[] : [];
				} else {
					$val0 = $this->Selections[$i0]->toArray($for_json_encode);
				}
				$c0[] = $val0;
			}
			$ret["Selections"] = $c0;
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
		if ($this->SSHConnection !== null) {
			$this->SSHConnection->RemoveUnknownProperties();
		}
	}

}

