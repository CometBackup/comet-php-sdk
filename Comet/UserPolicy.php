<?php

namespace Comet;

class UserPolicy {
	
	/**
	 * @var boolean
	 */
	public $PreventRequestStorageVault = false;
	
	/**
	 * @var boolean
	 */
	public $PreventAddCustomStorageVault = false;
	
	/**
	 * @var boolean
	 */
	public $PreventEditStorageVault = false;
	
	/**
	 * @var boolean
	 */
	public $PreventDeleteStorageVault = false;
	
	/**
	 * @var \Comet\StorageVaultProviderPolicy
	 */
	public $StorageVaultProviders = null;
	
	/**
	 * @var boolean
	 */
	public $PreventNewProtectedItem = false;
	
	/**
	 * @var boolean
	 */
	public $PreventEditProtectedItem = false;
	
	/**
	 * @var boolean
	 */
	public $PreventDeleteProtectedItem = false;
	
	/**
	 * @var \Comet\ProtectedItemEngineTypePolicy
	 */
	public $ProtectedItemEngineTypes = null;
	
	/**
	 * @var \Comet\ExtraFileExclusion[]
	 */
	public $FileAndFolderMandatoryExclusions = [];
	
	/**
	 * @var int
	 */
	public $ModeScheduleSkipAlreadyRunning = 0;
	
	/**
	 * @var boolean
	 */
	public $PreventDeleteSingleSnapshots = false;
	
	/**
	 * @var boolean
	 */
	public $PreventChangeAccountPassword = false;
	
	/**
	 * @var boolean
	 */
	public $PreventChangeEmailSettings = false;
	
	/**
	 * @var boolean
	 */
	public $PreventOpenAppUI = false;
	
	/**
	 * @var boolean
	 */
	public $HideAppImport = false;
	
	/**
	 * @var boolean
	 */
	public $HideAppVersion = false;
	
	/**
	 * @var boolean
	 */
	public $PreventOpenWebUI = false;
	
	/**
	 * @var boolean
	 */
	public $PreventViewDeviceNames = false;
	
	/**
	 * Preserve unknown properties when dealing with future server versions.
	 *
	 * @see UserPolicy::RemoveUnknownProperties() Remove all unknown properties
	 * @var array
	 */
	private $__unknown_properties = [];
	
	/**
	 * Replace the content of this UserPolicy object from a PHP array.
	 * The data could be supplied from an API call after json_decode(..., true); or generated manually.
	 *
	 * @param array $decodedJsonObject Object data as PHP array
	 * @return void
	 */
	public function inflateFrom(array $decodedJsonObject)
	{
		$this->PreventRequestStorageVault = (bool)($decodedJsonObject['PreventRequestStorageVault']);
		
		$this->PreventAddCustomStorageVault = (bool)($decodedJsonObject['PreventAddCustomStorageVault']);
		
		$this->PreventEditStorageVault = (bool)($decodedJsonObject['PreventEditStorageVault']);
		
		$this->PreventDeleteStorageVault = (bool)($decodedJsonObject['PreventDeleteStorageVault']);
		
		$this->StorageVaultProviders = \Comet\StorageVaultProviderPolicy::createFrom(isset($decodedJsonObject['StorageVaultProviders']) ? $decodedJsonObject['StorageVaultProviders'] : []);
		
		$this->PreventNewProtectedItem = (bool)($decodedJsonObject['PreventNewProtectedItem']);
		
		$this->PreventEditProtectedItem = (bool)($decodedJsonObject['PreventEditProtectedItem']);
		
		$this->PreventDeleteProtectedItem = (bool)($decodedJsonObject['PreventDeleteProtectedItem']);
		
		$this->ProtectedItemEngineTypes = \Comet\ProtectedItemEngineTypePolicy::createFrom(isset($decodedJsonObject['ProtectedItemEngineTypes']) ? $decodedJsonObject['ProtectedItemEngineTypes'] : []);
		
		if (array_key_exists('FileAndFolderMandatoryExclusions', $decodedJsonObject)) {
			$val_2 = [];
			for($i_2 = 0; $i_2 < count($decodedJsonObject['FileAndFolderMandatoryExclusions']); ++$i_2) {
				$val_2[] = \Comet\ExtraFileExclusion::createFrom(isset($decodedJsonObject['FileAndFolderMandatoryExclusions'][$i_2]) ? $decodedJsonObject['FileAndFolderMandatoryExclusions'][$i_2] : []);
			}
			$this->FileAndFolderMandatoryExclusions = $val_2;
			
		}
		if (array_key_exists('ModeScheduleSkipAlreadyRunning', $decodedJsonObject)) {
			$this->ModeScheduleSkipAlreadyRunning = (int)($decodedJsonObject['ModeScheduleSkipAlreadyRunning']);
			
		}
		$this->PreventDeleteSingleSnapshots = (bool)($decodedJsonObject['PreventDeleteSingleSnapshots']);
		
		$this->PreventChangeAccountPassword = (bool)($decodedJsonObject['PreventChangeAccountPassword']);
		
		$this->PreventChangeEmailSettings = (bool)($decodedJsonObject['PreventChangeEmailSettings']);
		
		$this->PreventOpenAppUI = (bool)($decodedJsonObject['PreventOpenAppUI']);
		
		$this->HideAppImport = (bool)($decodedJsonObject['HideAppImport']);
		
		$this->HideAppVersion = (bool)($decodedJsonObject['HideAppVersion']);
		
		$this->PreventOpenWebUI = (bool)($decodedJsonObject['PreventOpenWebUI']);
		
		$this->PreventViewDeviceNames = (bool)($decodedJsonObject['PreventViewDeviceNames']);
		
		foreach($decodedJsonObject as $k => $v) {
			switch($k) {
			case 'PreventRequestStorageVault':
			case 'PreventAddCustomStorageVault':
			case 'PreventEditStorageVault':
			case 'PreventDeleteStorageVault':
			case 'StorageVaultProviders':
			case 'PreventNewProtectedItem':
			case 'PreventEditProtectedItem':
			case 'PreventDeleteProtectedItem':
			case 'ProtectedItemEngineTypes':
			case 'FileAndFolderMandatoryExclusions':
			case 'ModeScheduleSkipAlreadyRunning':
			case 'PreventDeleteSingleSnapshots':
			case 'PreventChangeAccountPassword':
			case 'PreventChangeEmailSettings':
			case 'PreventOpenAppUI':
			case 'HideAppImport':
			case 'HideAppVersion':
			case 'PreventOpenWebUI':
			case 'PreventViewDeviceNames':
				break;
			default:
				$this->__unknown_properties[$k] = $v;
			}
		}
	}
	
	/**
	 * Coerce a plain PHP array into a new strongly-typed UserPolicy object.
	 * The data could be supplied from an API call after json_decode(..., true); or generated manually.
	 *
	 * @param array $decodedJsonObject Object data as PHP array
	 * @return UserPolicy
	 */
	public static function createFrom(array $decodedJsonObject)
	{
		$retn = new UserPolicy();
		$retn->inflateFrom($decodedJsonObject);
		return $retn;
	}
	
	/**
	 * Convert this UserPolicy object into a plain PHP array.
	 *
	 * @param bool $forJSONEncode Set true to use stdClass() for empty objects instead of just [], in order to
	 *                             accurately roundtrip empty objects/arrays through json_encode() compatibility
	 * @return array
	 */
	public function toArray($forJSONEncode=false)
	{
		$ret = [];
		$ret["PreventRequestStorageVault"] = $this->PreventRequestStorageVault;
		$ret["PreventAddCustomStorageVault"] = $this->PreventAddCustomStorageVault;
		$ret["PreventEditStorageVault"] = $this->PreventEditStorageVault;
		$ret["PreventDeleteStorageVault"] = $this->PreventDeleteStorageVault;
		if ( $this->StorageVaultProviders === null ) {
			$ret["StorageVaultProviders"] = $for_json_encode ? (object)[] : [];
		} else {
			$ret["StorageVaultProviders"] = $this->StorageVaultProviders->toArray($for_json_encode);
		}
		$ret["PreventNewProtectedItem"] = $this->PreventNewProtectedItem;
		$ret["PreventEditProtectedItem"] = $this->PreventEditProtectedItem;
		$ret["PreventDeleteProtectedItem"] = $this->PreventDeleteProtectedItem;
		if ( $this->ProtectedItemEngineTypes === null ) {
			$ret["ProtectedItemEngineTypes"] = $for_json_encode ? (object)[] : [];
		} else {
			$ret["ProtectedItemEngineTypes"] = $this->ProtectedItemEngineTypes->toArray($for_json_encode);
		}
		{
			$c0 = [];
			for($i0 = 0; $i0 < count($this->FileAndFolderMandatoryExclusions); ++$i0) {
				if ( $this->FileAndFolderMandatoryExclusions[$i0] === null ) {
					$val0 = $for_json_encode ? (object)[] : [];
				} else {
					$val0 = $this->FileAndFolderMandatoryExclusions[$i0]->toArray($for_json_encode);
				}
				$c0[] = $val0;
			}
			$ret["FileAndFolderMandatoryExclusions"] = $c0;
		}
		$ret["ModeScheduleSkipAlreadyRunning"] = $this->ModeScheduleSkipAlreadyRunning;
		$ret["PreventDeleteSingleSnapshots"] = $this->PreventDeleteSingleSnapshots;
		$ret["PreventChangeAccountPassword"] = $this->PreventChangeAccountPassword;
		$ret["PreventChangeEmailSettings"] = $this->PreventChangeEmailSettings;
		$ret["PreventOpenAppUI"] = $this->PreventOpenAppUI;
		$ret["HideAppImport"] = $this->HideAppImport;
		$ret["HideAppVersion"] = $this->HideAppVersion;
		$ret["PreventOpenWebUI"] = $this->PreventOpenWebUI;
		$ret["PreventViewDeviceNames"] = $this->PreventViewDeviceNames;
		
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
		if ($this->StorageVaultProviders !== null) {
			$this->StorageVaultProviders->RemoveUnknownProperties();
		}
		if ($this->ProtectedItemEngineTypes !== null) {
			$this->ProtectedItemEngineTypes->RemoveUnknownProperties();
		}
	}
	
}

