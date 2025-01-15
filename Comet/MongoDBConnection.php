<?php

/**
 * Copyright (c) 2018-2025 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 *
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

class MongoDBConnection {

	/**
	 * @var string
	 */
	public $Server = "";

	/**
	 * @var int
	 */
	public $Port = 0;

	/**
	 * @var string
	 */
	public $Username = "";

	/**
	 * @var string
	 */
	public $Password = "";

	/**
	 * @var string
	 */
	public $AuthenticationDB = "";

	/**
	 * Prior to Comet 22.12.3, must be a filesystem path to `mongo` (n.b. not `mongosh`). In Comet >=
	 * 22.12.3, not used.
	 *
	 * @var string
	 * @deprecated 22.12.3 This member has been deprecated since Comet version 22.12.3
	 */
	public $MongoShellPath = "";

	/**
	 * @var string
	 */
	public $MongodumpPath = "";

	/**
	 * @var string
	 */
	public $ReadPreference = "";

	/**
	 * @var boolean
	 */
	public $UseReplica = false;

	/**
	 * @var string
	 */
	public $ReplicaName = "";

	/**
	 * @var string[]
	 */
	public $ReplicaMembers = [];

	/**
	 * @var boolean
	 */
	public $UseSSL = false;

	/**
	 * @var string
	 */
	public $ClientSSLPEMPath = "";

	/**
	 * @var string
	 */
	public $ServerSSLPEMPath = "";

	/**
	 * @var string
	 */
	public $SSLClientKeyPassword = "";

	/**
	 * @var boolean
	 */
	public $AllowInvalidCertificate = false;

	/**
	 * @var boolean
	 */
	public $AllowInvalidHostname = false;

	/**
	 * @var boolean
	 */
	public $UseSSH = false;

	/**
	 * @var \Comet\SSHConnection
	 */
	public $SSHConnection = null;

	/**
	 * Preserve unknown properties when dealing with future server versions.
	 *
	 * @see MongoDBConnection::RemoveUnknownProperties() Remove all unknown properties
	 * @var array
	 */
	private $__unknown_properties = [];

	/**
	 * Replace the content of this MongoDBConnection object from a PHP \stdClass.
	 * The data could be supplied from an API call after json_decode(...); or generated manually.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return void
	 */
	protected function inflateFrom(\stdClass $sc)
	{
		if (property_exists($sc, 'Server')) {
			$this->Server = (string)($sc->Server);
		}
		if (property_exists($sc, 'Port')) {
			$this->Port = (int)($sc->Port);
		}
		if (property_exists($sc, 'Username')) {
			$this->Username = (string)($sc->Username);
		}
		if (property_exists($sc, 'Password')) {
			$this->Password = (string)($sc->Password);
		}
		if (property_exists($sc, 'AuthenticationDB')) {
			$this->AuthenticationDB = (string)($sc->AuthenticationDB);
		}
		if (property_exists($sc, 'MongoShellPath')) {
			$this->MongoShellPath = (string)($sc->MongoShellPath);
		}
		if (property_exists($sc, 'MongodumpPath')) {
			$this->MongodumpPath = (string)($sc->MongodumpPath);
		}
		if (property_exists($sc, 'ReadPreference')) {
			$this->ReadPreference = (string)($sc->ReadPreference);
		}
		if (property_exists($sc, 'UseReplica')) {
			$this->UseReplica = (bool)($sc->UseReplica);
		}
		if (property_exists($sc, 'ReplicaName')) {
			$this->ReplicaName = (string)($sc->ReplicaName);
		}
		if (property_exists($sc, 'ReplicaMembers')) {
			$val_2 = [];
			if ($sc->ReplicaMembers !== null) {
				for($i_2 = 0; $i_2 < count($sc->ReplicaMembers); ++$i_2) {
					$val_2[] = (string)($sc->ReplicaMembers[$i_2]);
				}
			}
			$this->ReplicaMembers = $val_2;
		}
		if (property_exists($sc, 'UseSSL')) {
			$this->UseSSL = (bool)($sc->UseSSL);
		}
		if (property_exists($sc, 'ClientSSLPEMPath')) {
			$this->ClientSSLPEMPath = (string)($sc->ClientSSLPEMPath);
		}
		if (property_exists($sc, 'ServerSSLPEMPath')) {
			$this->ServerSSLPEMPath = (string)($sc->ServerSSLPEMPath);
		}
		if (property_exists($sc, 'SSLClientKeyPassword')) {
			$this->SSLClientKeyPassword = (string)($sc->SSLClientKeyPassword);
		}
		if (property_exists($sc, 'AllowInvalidCertificate')) {
			$this->AllowInvalidCertificate = (bool)($sc->AllowInvalidCertificate);
		}
		if (property_exists($sc, 'AllowInvalidHostname')) {
			$this->AllowInvalidHostname = (bool)($sc->AllowInvalidHostname);
		}
		if (property_exists($sc, 'UseSSH')) {
			$this->UseSSH = (bool)($sc->UseSSH);
		}
		if (property_exists($sc, 'SSHConnection') && !is_null($sc->SSHConnection)) {
			if (is_array($sc->SSHConnection) && count($sc->SSHConnection) === 0) {
			// Work around edge case in json_decode--json_encode stdClass conversion
				$this->SSHConnection = \Comet\SSHConnection::createFromStdclass(new \stdClass());
			} else {
				$this->SSHConnection = \Comet\SSHConnection::createFromStdclass($sc->SSHConnection);
			}
		}
		foreach(get_object_vars($sc) as $k => $v) {
			switch($k) {
			case 'Server':
			case 'Port':
			case 'Username':
			case 'Password':
			case 'AuthenticationDB':
			case 'MongoShellPath':
			case 'MongodumpPath':
			case 'ReadPreference':
			case 'UseReplica':
			case 'ReplicaName':
			case 'ReplicaMembers':
			case 'UseSSL':
			case 'ClientSSLPEMPath':
			case 'ServerSSLPEMPath':
			case 'SSLClientKeyPassword':
			case 'AllowInvalidCertificate':
			case 'AllowInvalidHostname':
			case 'UseSSH':
			case 'SSHConnection':
				break;
			default:
				$this->__unknown_properties[$k] = $v;
			}
		}
	}

	/**
	 * Coerce a stdClass into a new strongly-typed MongoDBConnection object.
	 *
	 * @param \stdClass $sc Object data as stdClass
	 * @return MongoDBConnection
	 */
	public static function createFromStdclass(\stdClass $sc): \Comet\MongoDBConnection
	{
		$retn = new MongoDBConnection();
		$retn->inflateFrom($sc);
		return $retn;
	}

	/**
	 * Coerce a plain PHP array into a new strongly-typed MongoDBConnection object.
	 * Because the Comet Server requires strict distinction between empty objects ({}) and arrays ([]),
	 * the result of this method may not be safe to re-submit to the Comet Server.
	 *
	 * @param array $arr Object data as PHP array
	 * @return MongoDBConnection
	 */
	public static function createFromArray(array $arr): \Comet\MongoDBConnection
	{
		$stdClass = json_decode(json_encode($arr, JSON_UNESCAPED_SLASHES));
		if (is_array($stdClass) && count($stdClass) === 0) {
			$stdClass = new \stdClass();
		}
		return self::createFromStdclass($stdClass);
	}

	/**
	 * Coerce a JSON string into a new strongly-typed MongoDBConnection object.
	 *
	 * @param string $JsonString Object data as JSON string
	 * @return MongoDBConnection
	 */
	public static function createFromJSON(string $JsonString): \Comet\MongoDBConnection
	{
		$decodedJsonObject = json_decode($JsonString); // as stdClass
		if (\json_last_error() != \JSON_ERROR_NONE) {
			throw new \Exception("JSON decode failed: " . \json_last_error_msg(), \json_last_error());
		}
		$retn = new MongoDBConnection();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}

	/**
	 * Convert this MongoDBConnection object into a plain PHP array.
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
		$ret["Port"] = $this->Port;
		$ret["Username"] = $this->Username;
		$ret["Password"] = $this->Password;
		$ret["AuthenticationDB"] = $this->AuthenticationDB;
		$ret["MongoShellPath"] = $this->MongoShellPath;
		$ret["MongodumpPath"] = $this->MongodumpPath;
		$ret["ReadPreference"] = $this->ReadPreference;
		$ret["UseReplica"] = $this->UseReplica;
		$ret["ReplicaName"] = $this->ReplicaName;
		{
			$c0 = [];
			for($i0 = 0; $i0 < count($this->ReplicaMembers); ++$i0) {
				$val0 = $this->ReplicaMembers[$i0];
				$c0[] = $val0;
			}
			$ret["ReplicaMembers"] = $c0;
		}
		$ret["UseSSL"] = $this->UseSSL;
		$ret["ClientSSLPEMPath"] = $this->ClientSSLPEMPath;
		$ret["ServerSSLPEMPath"] = $this->ServerSSLPEMPath;
		$ret["SSLClientKeyPassword"] = $this->SSLClientKeyPassword;
		$ret["AllowInvalidCertificate"] = $this->AllowInvalidCertificate;
		$ret["AllowInvalidHostname"] = $this->AllowInvalidHostname;
		$ret["UseSSH"] = $this->UseSSH;
		if ( $this->SSHConnection === null ) {
			$ret["SSHConnection"] = $for_json_encode ? (object)[] : [];
		} else {
			$ret["SSHConnection"] = $this->SSHConnection->toArray($for_json_encode);
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

