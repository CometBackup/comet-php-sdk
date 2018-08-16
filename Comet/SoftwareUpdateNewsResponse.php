<?php

namespace Comet;

class SoftwareUpdateNewsResponse {
	
	/**
	 * @var string
	 */
	public $LatestStable = "";
	
	/**
	 * @var string
	 */
	public $LatestPrerelease = "";
	
	/**
	 * @var string
	 */
	public $DownloadsURL = "";
	
	/**
	 * @var string[]
	 */
	public $WhatsNew = [];
	
	/**
	 * Preserve unknown properties when dealing with future server versions.
	 * You can recursively remove all unknown properties by calling RemoveUnknownProperties().
	 *
	 * @var array
	 */
	private $__unknown_properties = [];
	
	public function inflateFrom(array $decodedJsonObject)
	{
		$this->LatestStable = (string)($decodedJsonObject['latest_stable']);
		
		$this->LatestPrerelease = (string)($decodedJsonObject['latest_prerelease']);
		
		$this->DownloadsURL = (string)($decodedJsonObject['downloads_url']);
		
		$val_2 = [];
		for($i_2 = 0; $i_2 < count($decodedJsonObject['updates_info']); ++$i_2) {
			$val_2[] = (string)($decodedJsonObject['updates_info'][$i_2]);
		}
		$this->WhatsNew = $val_2;
		
		foreach($decodedJsonObject as $k => $v) {
			switch($k) {
			case 'latest_stable':
			case 'latest_prerelease':
			case 'downloads_url':
			case 'updates_info':
				break;
			default:
				$this->__unknown_properties[$k] = $v;
			}
		}
	}
	
	public static function createFrom(array $decodedJsonObject)
	{
		$retn = new SoftwareUpdateNewsResponse();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}
	
	public function toArray($for_json_encode=false)
	{
		$ret = [];
		$ret["latest_stable"] = $this->LatestStable;
		$ret["latest_prerelease"] = $this->LatestPrerelease;
		$ret["downloads_url"] = $this->DownloadsURL;
		{
			$c0 = [];
			for($i0 = 0; $i0 < count($this->WhatsNew); ++$i0) {
				$val0 = $this->WhatsNew[$i0];
				$c0[] = $val0;
			}
			$ret["updates_info"] = $c0;
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
	}
	
}

