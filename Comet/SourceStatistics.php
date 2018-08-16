<?php

namespace Comet;

class SourceStatistics {
	
	/**
	 * @var \Comet\BackupJobDetail
	 */
	public $LastBackupJob = null;
	
	/**
	 * Preserve unknown properties when dealing with future server versions.
	 * You can recursively remove all unknown properties by calling RemoveUnknownProperties().
	 *
	 * @var array
	 */
	private $__unknown_properties = [];
	
	public function inflateFrom(array $decodedJsonObject)
	{
		$this->LastBackupJob = \Comet\BackupJobDetail::createFrom(isset($decodedJsonObject['LastBackupJob']) ? $decodedJsonObject['LastBackupJob'] : []);
		
		foreach($decodedJsonObject as $k => $v) {
			switch($k) {
			case 'LastBackupJob':
				break;
			default:
				$this->__unknown_properties[$k] = $v;
			}
		}
	}
	
	public static function createFrom(array $decodedJsonObject)
	{
		$retn = new SourceStatistics();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}
	
	public function toArray($for_json_encode=false)
	{
		$ret = [];
		if ( $this->LastBackupJob === null ) {
			$ret["LastBackupJob"] = $for_json_encode ? (object)[] : [];
		} else {
			$ret["LastBackupJob"] = $this->LastBackupJob->toArray($for_json_encode);
		}
		
		// Reinstate unknown properties from future server versions
		foreach($this->__unknown_properties as $k => $v) {
			if ($for_json_encode && is_array($v) && count($v) == 0) {
				$ret[$k] = (object)[];
			} else {
				$ret[$k] = $v;
			}
		}
		
		// Special handling for empty objects
		if ($for_json_encode && count($ret) === 0) {
			return new stdClass();
		}
		return $ret;
	}
	
	public function toJSON()
	{
		return json_encode( self::toArray(true) );
	}
	
	public function RemoveUnknownProperties()
	{
		$this->__unknown_properties = [];
		if ($this->LastBackupJob !== null) {
			$this->LastBackupJob->RemoveUnknownProperties();
		}
	}
	
}

