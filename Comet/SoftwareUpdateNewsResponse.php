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
	 *
	 * @see SoftwareUpdateNewsResponse::RemoveUnknownProperties() Remove all unknown properties
	 * @var array
	 */
	private $__unknown_properties = [];
	
	/**
	 * Replace the content of this SoftwareUpdateNewsResponse object from a PHP array.
	 * The data could be supplied from an API call after json_decode(..., true); or generated manually.
	 *
	 * @param array $decodedJsonObject Object data as PHP array
	 * @return void
	 */
	protected function inflateFrom(array $decodedJsonObject)
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
	
	/**
	 * Coerce a plain PHP array into a new strongly-typed SoftwareUpdateNewsResponse object.
	 *
	 * @param array $decodedJsonObject Object data as PHP array
	 * @return SoftwareUpdateNewsResponse
	 */
	public static function createFrom(array $decodedJsonObject)
	{
		$retn = new SoftwareUpdateNewsResponse();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}
	
	/**
	 * Coerce a JSON string into a new strongly-typed SoftwareUpdateNewsResponse object.
	 *
	 * @param string $JsonString Object data as JSON string
	 * @return SoftwareUpdateNewsResponse
	 */
	public static function createFromJSON($JsonString)
	{
		$decodedJsonObject = json_decode($JsonString, true);
		if (\json_last_error() != \JSON_ERROR_NONE) {
			throw new \Exception("JSON decode failed: " . \json_last_error_msg());
		}
		$retn = new SoftwareUpdateNewsResponse();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}
	
	/**
	 * Convert this SoftwareUpdateNewsResponse object into a plain PHP array.
	 *
	 * @param bool $forJSONEncode Set true to use stdClass() for empty objects instead of just [], in order to
	 *                             accurately roundtrip empty objects/arrays through json_encode() compatibility
	 * @return array
	 */
	public function toArray($forJSONEncode=false)
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

