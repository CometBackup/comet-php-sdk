<?php

namespace Comet;

class BackupJobProgress {
	
	/**
	 * @var int
	 */
	public $Counter = 0;
	
	/**
	 * @var int
	 */
	public $SentTime = 0;
	
	/**
	 * @var int
	 */
	public $RecievedTime = 0;
	
	/**
	 * @var int
	 */
	public $BytesDone = 0;
	
	/**
	 * @var int
	 */
	public $ItemsDone = 0;
	
	/**
	 * Preserve unknown properties when dealing with future server versions.
	 *
	 * @see BackupJobProgress::RemoveUnknownProperties() Remove all unknown properties
	 * @var array
	 */
	private $__unknown_properties = [];
	
	/**
	 * Replace the content of this BackupJobProgress object from a PHP array.
	 * The data could be supplied from an API call after json_decode(..., true); or generated manually.
	 *
	 * @param array $decodedJsonObject Object data as PHP array
	 * @return void
	 */
	protected function inflateFrom(array $decodedJsonObject)
	{
		$this->Counter = (int)($decodedJsonObject['Counter']);
		
		$this->SentTime = (int)($decodedJsonObject['SentTime']);
		
		$this->RecievedTime = (int)($decodedJsonObject['RecievedTime']);
		
		$this->BytesDone = (int)($decodedJsonObject['BytesDone']);
		
		$this->ItemsDone = (int)($decodedJsonObject['ItemsDone']);
		
		foreach($decodedJsonObject as $k => $v) {
			switch($k) {
			case 'Counter':
			case 'SentTime':
			case 'RecievedTime':
			case 'BytesDone':
			case 'ItemsDone':
				break;
			default:
				$this->__unknown_properties[$k] = $v;
			}
		}
	}
	
	/**
	 * Coerce a plain PHP array into a new strongly-typed BackupJobProgress object.
	 *
	 * @param array $decodedJsonObject Object data as PHP array
	 * @return BackupJobProgress
	 */
	public static function createFrom(array $decodedJsonObject)
	{
		$retn = new BackupJobProgress();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}
	
	/**
	 * Coerce a JSON string into a new strongly-typed BackupJobProgress object.
	 *
	 * @param string $JsonString Object data as JSON string
	 * @return BackupJobProgress
	 */
	public static function createFromJSON($JsonString)
	{
		$decodedJsonObject = json_decode($JsonString, true);
		if (\json_last_error() != \JSON_ERROR_NONE) {
			throw new \Exception("JSON decode failed: " . \json_last_error_msg());
		}
		$retn = new BackupJobProgress();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}
	
	/**
	 * Convert this BackupJobProgress object into a plain PHP array.
	 *
	 * @param bool $forJSONEncode Set true to use stdClass() for empty objects instead of just [], in order to
	 *                             accurately roundtrip empty objects/arrays through json_encode() compatibility
	 * @return array
	 */
	public function toArray($forJSONEncode=false)
	{
		$ret = [];
		$ret["Counter"] = $this->Counter;
		$ret["SentTime"] = $this->SentTime;
		$ret["RecievedTime"] = $this->RecievedTime;
		$ret["BytesDone"] = $this->BytesDone;
		$ret["ItemsDone"] = $this->ItemsDone;
		
		// Reinstate unknown properties from future server versions
		foreach($this->__unknown_properties as $k => $v) {
			if ($forJSONEncode && is_array($v) && count($v) == 0) {
				$ret[$k] = (object)[];
			} else {
				$ret[$k] = $v;
			}
		}
		
		// Special handling for empty objects
		if ($forJSONEncode && count($ret) === 0) {
			return new stdClass();
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
		return json_encode( self::toArray(true) );
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

