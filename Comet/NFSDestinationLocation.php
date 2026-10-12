<?php

/**
 * Copyright (c) 2018-2026 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 *
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

/**
 * NFSDestinationLocation describes an NFSv4 storage location.
 * Only NFS version 4 is supported; the older mount protocol (NFSv2/v3) is not.
 * This type is available in Comet 26.9.x and later.
 */
class NFSDestinationLocation {

	/**
	 * The hostname or IP address of the NFSv4 server. An optional ":port" suffix may be supplied; the
	 * default port is 2049.
	 *
	 * @var string
	 */
	public $Server = "";

	/**
	 * The target directory path underneath the server's NFSv4 pseudo-filesystem root
	 *
	 * @var string
	 */
	public $Path = "";

	/**
	 * The numeric user ID presented to the server for AUTH_SYS authentication.
	 * NFSv4 performs no password exchange; the server grants access based on this
	 * identity and on its own export rules. Defaults to 0 (root).
	 *
	 * @var int
	 */
	public $Uid = 0;

	/**
	 * The numeric group ID presented to the server for AUTH_SYS authentication.
	 * Defaults to 0 (root).
	 *
	 * @var int
	 */
	public $Gid = 0;

	/**
	 * The client machine name presented to the server for AUTH_SYS authentication.
	 * If blank, the local hostname is used.
	 *
	 * @var string
	 */
	public $MachineName = "";

	/**
	 * Preserve unknown properties when dealing with future server versions.
	 *
	 * @see NFSDestinationLocation::RemoveUnknownProperties() Remove all unknown properties
	 * @var array
	 */
	private $__unknown_properties = [];

	/**
	 * Replace the content of this NFSDestinationLocation object from a PHP \stdClass.
	 * The data could be supplied from an API call after json_decode(...); or generated manually.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return void
	 */
	protected function inflateFrom(\stdClass $sc)
	{
		if (property_exists($sc, 'Server') && !is_null($sc->Server)) {
			$this->Server = (string)($sc->Server);
		}
		if (property_exists($sc, 'Path') && !is_null($sc->Path)) {
			$this->Path = (string)($sc->Path);
		}
		if (property_exists($sc, 'Uid') && !is_null($sc->Uid)) {
			$this->Uid = (int)($sc->Uid);
		}
		if (property_exists($sc, 'Gid') && !is_null($sc->Gid)) {
			$this->Gid = (int)($sc->Gid);
		}
		if (property_exists($sc, 'MachineName') && !is_null($sc->MachineName)) {
			$this->MachineName = (string)($sc->MachineName);
		}
		foreach(get_object_vars($sc) as $k => $v) {
			switch($k) {
			case 'Server':
			case 'Path':
			case 'Uid':
			case 'Gid':
			case 'MachineName':
				break;
			default:
				$this->__unknown_properties[$k] = $v;
			}
		}
	}

	/**
	 * Coerce a stdClass into a new strongly-typed NFSDestinationLocation object.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return NFSDestinationLocation
	 */
	public static function createFromStdclass(\stdClass $sc): \Comet\NFSDestinationLocation
	{
		$retn = new NFSDestinationLocation();
		$retn->inflateFrom($sc);
		return $retn;
	}

	/**
	 * Coerce a plain PHP array into a new strongly-typed NFSDestinationLocation object.
	 * Because the Comet Server requires strict distinction between empty objects ({}) and arrays ([]),
	 * the result of this method may not be safe to re-submit to the Comet Server.
	 *
	 * @param array $arr Object data as PHP array
	 * @return NFSDestinationLocation
	 */
	public static function createFromArray(array $arr): \Comet\NFSDestinationLocation
	{
		$stdClass = json_decode(json_encode($arr, JSON_UNESCAPED_SLASHES));
		if (is_array($stdClass) && count($stdClass) === 0) {
			$stdClass = new \stdClass();
		}
		return self::createFromStdclass($stdClass);
	}

	/**
	 * Coerce a JSON string into a new strongly-typed NFSDestinationLocation object.
	 *
	 * @param string $JsonString Object data as JSON string
	 * @return NFSDestinationLocation
	 */
	public static function createFromJSON(string $JsonString): \Comet\NFSDestinationLocation
	{
		$decodedJsonObject = json_decode($JsonString); // as stdClass
		if (\json_last_error() != \JSON_ERROR_NONE) {
			throw new \Exception("JSON decode failed: " . \json_last_error_msg(), \json_last_error());
		}
		$retn = new NFSDestinationLocation();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}

	/**
	 * Convert this NFSDestinationLocation object into a plain PHP array.
	 *
	 * Unknown properties may still be represented as \stdClass objects.
	 *
	 * @param bool $for_json_encode Represent key-value maps as \stdClass instead of plain PHP arrays
	 * @return array
	 */
	public function toArray(bool $for_json_encode = false): array
	{
		$ret = [];
		$ret["Server"] = $this->Server;
		$ret["Path"] = $this->Path;
		$ret["Uid"] = $this->Uid;
		$ret["Gid"] = $this->Gid;
		$ret["MachineName"] = $this->MachineName;

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

