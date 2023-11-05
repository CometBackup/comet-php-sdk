# CHANGELOG

## 2023-11-06 v4.20.0

- Based on Comet 23.9.9
- Add Syncro support

## 2023-11-03 v4.19.0

- Based on Comet 23.9.8

## 2023-10-25 v4.18.0

- Based on Comet 23.9.7
- Add VMware support

## 2023-10-17 v4.17.0

- (This git tag is identical to the v4.16.0 release version.)

## 2023-10-17 v4.16.0

- Based on Comet 23.9.6
- Added new "Comet Storage" and "Comet Storage (Object Lock)" storage destinations, allowing users to select Comet's new bundled Wasabi storage option for Storage Vaults (including Storage Templates)
- Fixed an issue with the Comet Server stats processing returning incorrect stats for previous days
- Fixed an issue in Comet Server web interface where creating or editing a custom Storage Vault can cause invalid Object Lock settings

## 2023-10-12 v4.15.0

- Based on Comet 23.9.5
- Add new field `LogLevel` to control job log verbosity
- Add new `RESTORETYPE_WINDISK_ESXI` for restoring to VMware-compatible
virtual disks

## 2023-09-19 v4.14.0

- Based on Comet 23.9.2
- 'UseObjectLock' for S3 compatible storage settings deprecated. Replaced by 'ObjectLockMode'
- New Streamable event SEVT_DEVICE_LOBBY_CONNECT and SEVT_DEVICE_LOBBY_DISCONNECT
- Added 'TOTPCode' to 'InstallCreds' used for device registration.
- 'GroupedBy' added to 'PSAConfig' for grouping statistics.
- New APIs
	- AdminInstallationDispatchDropConnection
	- AdminInstallationDispatchRegisterDevice
	- AdminInstallationListActive
	- AdminJobAbandon

## 2023-08-29 v4.13.0

- Based on Comet 23.8.0
- Improve documentation of JobStatus constants

## 2023-08-09 v4.12.0

- Based on Comet 23.6.9
- Added WebDAV `DestinationLocation`
- Update PHPDoc types for arrays with non-int keys

## 2023-08-02 v4.11.0

- Based on Comet 23.6.9
- Support new API endpoints for managing external admin authentication sources
- Support Object Lock policy option
- Update docstrings for various types and fields

## 2023-07-11 v4.10.0

- Based on Comet 23.6.5
- Support `DeviceConfig->ClientVersion`
- Support new `OSInfo` and `RestoreJobAdvancedOptions` fields
- Support new `SourceConfig` fields for tracking policy-enforced Protected Items
- Support new optional parameters in `AdminDispatcherRunRestoreCustom` API
- Add many more documentation comments, including behaviour of base64 byte arrays

## 2023-06-01 v4.9.0

- Based on Comet 23.5.0
- Add new `StreamableEventType` constants (`SEVT_*`) used for tracking Comet Server config changes
- Add new `StreamerType` constants (`STREAMER_TYPE_*`)
- Add new `FileOptions` type for configuring the Comet Server to log live events to a file
- Add new field `AuditFileOptions` to the `Organization` type for configuring per-tenant audit log options
- Add `Actor` (authenticated user), `ResourceID`, `Timestamp` and `TypeString` fields to the `StreamableEvent` type
- Deprecate the `UserProfileFragment` type
- Add extra comments to many types

## 2023-05-05 v4.8.0

- Based on Comet 23.3.7
- No functional changes
- Add significantly many more comments to constants, fields and types

## 2023-04-24 v4.7.0

- Based on Comet 23.3.5
- Support new `AdminDispatcherSearchSnapshots` API to remotely search for files in a Storage Vault
- Support new `AdminMetaRemoteStorageVaultTest` API to test connections for a Storage Template
- Support new `AccentColor` and `BrandingStyleType` branding options for the Comet Server web interface
- New Self-Backup option to include server logs
- Track creation and modification timestamps for `GroupPolicy` objects

## 2023-03-23 v4.6.0

- Based on Comet 23.3.1
- Support filter parameters on `AdminGetJobLogEntries`
- Support S3 Object Lock
- Support Azure Key Vault codesigning

## 2023-02-15 v4.5.0
- Based on 22.12.8
- Add `TimeSpan` option to `EmailReportOptions`
- Add `AlertsDisabled` (default: false) toggle for `PSAConfig` objects
- Add `LastSuspended` for tracking `UserProfileConfig` suspensions
- Improve documentation

## 2023-01-11 v4.4.0
- Based on 22.12.2
- Add new `AdminCountJobsForCustomSearchRequest` API to count total number of jobs for a given search query
- Add new `AdminMetaEmailOptionsGetRequest` / `AdminMetaEmailOptionsSetRequest` / `AdminMetaSendTestReportRequest` APIs for managing tenant email settings
- Add new O365 Protected Accounts quota option in the `UserProfileConfig`
- Add new tenant admin permission `AllowEditEmailOptions`

## 2022-12-09 v4.3.0
- Based on 22.11.1
- Support `getCode()` on exceptions to retrieve internal error code
- New features for PSAs, remote URLs and MS SQL Server restores.
- New features for exporting a self backup for single tenant. 

## 2022-09-08 v4.2.0
- Based on 22.9.0
- Add Storj.io support as a Storage Vault Location and Storage Template provider
- Add Constellation role support for Tenants
- Add Webhook edit option for Tenant admins
- Add MySQL direct restore option
- Improve Office365 credentials handling

## 2022-07-27 v4.1.0
- Based on 22.6.7
- Add support enforcing the `RandomDelaySecs` for both whole-server and in policies
- Add support for username filter parameter in `AdminDispatcherListActive`
- Add custom region parameters for S3-compatible storage
- Add IDrive e2 as a Storage Template provider and in Constellation, including access-key cleanup
- Add `OverwriteIfNewer` to `RestoreJobAdvancedOptions`
- Add Office365 User Principal names

## 2022-06-28 v4.0.0
- Based on 22.6.2
- **BREAKING:** Add support for PHP 7 return type declarations and scalar argument types. PHP 7.0 is now the minimum required PHP version
- **BREAKING:** Remove deprecated `::createFrom()` methods, deprecated since SDK 3.0.0. Callers should switch to `createFromArray` (drop-in compatible, but with known issues for server round-trips) or `createFromStdclass`
- **BREAKING:** The `Organization::Email` class member is now declared as `EmailOptions` type instead of `AdminEmailOptions`. This change is fully backward-compatible on the HTTP/JSON level, but may cause issues if your application code checked this type explicitly
- **BREAKING:** The `AdminOrganizationDeleteRequest` API's response type has changed to be `APIResponseMessage`, not `OrganizationResponse`. The Comet Server API had only ever filled in the `APIResponseMessage`-compatible fields of the `OrganizationResponse` structure, so the HTTP/JSON response is unchanged, but this may cause issues if your application code checked this type explicitly
- "Requestable" Storage Vaults have been renamed to "Storage Templates". The API endpoint is unchanged, so this is backward-compatible with older Comet Server instances
- Document all `ServerConfigOptions` types for the `AdminMetaServerConfigSet` and `AdminMetaServerConfigGet` APIs
- Add new `FallbackServers` option for LDAP external authentication sources
- Add new `RandomDelaySecs` option for job schedules

## 2022-06-03 v3.25.0
- Based on 22.5.0
- Add support for AWS Virtual Storage Roles
- Add `$TargetOrganization` to some API methods to support cross-tenant actions
- Add `RESTOREARCHIVEFORMAT_TARZSTD` for tar.zst archive restore format
- Add `COMPRESS_*` Server Self-Backup compression settings
- Add zh-TW language

## 2022-05-25 v3.24.0
- Based on 22.3.7
- Add new `REMOTESERVER_S3_GENERIC` `RemoteServerType`
- Add new `S3GenericVirtualStorageRole` support to the `RemoteServerAddress`

## 2022-05-10 v3.23.0
- Based on 22.3.5
- Add new `RestrictRuntime`, `FromTime`, `ToTime`, `RestrictDays`, `DaysSelect` types to ScheduleConfig to add time and day restrictions in a hourly schedule.
- Add new `TotalVmCount` to `BackupJobDetail` API.
- Add new fields to `MacOSCodeSignProperties` to support code signing.

## 2022-03-21 v3.22.0
- Based on 22.3.0
- Add new `ForceUpgradeRunning`, `ApplyDeviceFilter`, and `DeviceFilter` fields to `UpdateCampaign` types to support sending a bulk upgrade to a custom query of users

## 2022-03-21 v3.21.0
- Based on 22.2.0
- Add new `AdminBrandingGenerateClientSpkDsm6` and `AdminBrandingGenerateClientSpkDsm7` APIs and associated types for generating and downloading Synology SPKs
- Add new `PathAppIconImage` field to branding options types to support branding of the app icon when installed in Synology's Package Center (and other software managers)
- Add new constants for VMDK single file restore
- Fix an issue with serialization of types which include BASE64-ed byte array fields

## 2022-01-28 v3.20.0
- Based on 21.12.4
- Add `AdminStoragePingDestination` API to perform a server-side Test Connections action when configuring Storage Role
- Add `DestinationSize*` on `BackupJobDetail` struct, to track Storage Vault size measurements taken as part of jobs
- Add `HasLicense` on `Office365MixedVirtualAccount` struct, and add `TotalLicensedMailsCount` and `TotalUnlicensedMailsCount` on `BackupJobDetail` struct, to track Office 365 license usage
- Add `AdminWebAuthnRegistration` new `Type` field and `WEBAUTHN_DEVICE_TYPE` constants, to determine the type of hardware WebAuthn device
- Add deprecation comments to U2F types (use WebAuthn instead), to `B2DestinationLocation.MaxConnections`, and to `Office365CustomSetting` (use Office365CustomSettingV2 instead)
- Fix an issue with wrong array types in `WebAuthnPublicKeyCredentialCreationOptions` and `WebAuthnPublicKeyCredentialRequestOptions`
- Fix an issue with executable permissions on some files

## 2021-12-22 v3.19.0
- Based on 21.12.1
- Add `AdminAccountWebauthnRegistration` endpoint for new WebAuthn support.
- Deprecate `AdminAccountU2fSubmitChallenge` as U2F is ending browser support in February 2022.

## 2021-11-24 v3.18.0
- Based on 21.9.12
- Add support for Thai and Danish localizations
- Add From and To fields to the EmailReportGenerated API
- Add `AdminDispatcherEmailPreview` api method for requesting the HTML content of an email
- Add `ImageEtag` field to the response of the ServerMetaBrandingProperties endpoint.
- Add support for new engine properties on the Office365 backup type.
- Add `AdminDispatcherOffice365ListVirtualAccounts` api method for requesting Objects that Office365 is capable of backing up.

## 2021-10-21 v3.17.0
- Based on 21.9.7
- Add Support for HideFiles parameter in B2 Destination Locations
- Add support for RegistrationTime to the DeviceConfig
- Upgrade MYSQL to support new TLS connection options
- Add support for new API: AdminMetaReadAllLogsRequest and AdminDispatcherRequestWindiskSnapshot

## 2021-09-14 v3.16.0
- Based on Comet 21.9.2
- Support new `CustomHeaders` option on the `WebhookOption` class for specifying custom HTTP headers
  to be sent in webhook POST requests from Comet Server

## 2021-09-08 v3.15.0
- Based on Comet 21.9.1
- Support new device_timezone field on the DeviceConfig class.
- Add admin_dispatcher_ping_destination api method
- Add support for new retention range type constants: RETENTIONRANGE_LAST_X_BACKUPS_ONE_FOR_EACH_DAY
- Add support for new retention range type constants: RETENTIONRANGE_LAST_X_BACKUPS_ONE_FOR_EACH_WEEK
- Add support for new retention range type constants: RETENTIONRANGE_LAST_X_BACKUPS_ONE_FOR_EACH_MONTH
- Add support for Microsoft Office 365 Sharepoiint constant STOREDOBJECTTYPE_MSSITELISTDRIVEENTITY
- Add Microsoft Office 365 Region cloud region constants OFFICE_365_REGION_PUBLIC
- Add Microsoft Office 365 Region cloud region constants OFFICE_365_REGION_CHINA
- Add Microsoft Office 365 Region cloud region constants OFFICE_365_REGION_GERMANY
- Add Microsoft Office 365 Region cloud region constants OFFICE_365_REGION_US_GOVT
- Add Microsoft Office 365 Region cloud region constants OFFICE_365_REGION_US_DOD

## 2021-07-01 v3.14.0
- Based on Comet 21.6.6
- Support new `DefaultSourceWithOSRestriction` and `LastSuccessfulBackupJob` fields
- Support custom credentials when performing a cloud Office 365 restore job
- Support identifying Microsoft Teams folders inside a Sharepoint backup job
- Document the `SourceIncludePattern` structure used for `PINCLUDE`/`RINCLUDE` rules in a File-type `EngineProps` array
- Document existing `BrandingProps` endpoint

## 2021-05-25 v3.13.0
- Based on Comet 21.6.1
- Add new APIs to remotely browse MySQL, MongoDB, MSSQL database servers
- Add Microsoft Office 365 properties on BackupJobDetail and on StoredObject
- Add Microsoft Office 365 browsing APIs
- Add Microsoft Office 365 Engine definition (`ENGINE_BUILTIN_MSOFFICE`) and associated `EngineProp` data structure definitions
- Add `AdminDispatcherRegisterOfficeApplication` APIs
- Add `RESTORETYPE_OFFICE365_CLOUD` constant
- Support suspending organizations
- Support reading the Server Self-Backup status
- Support new `PathMenuBarIcnsFile` branding option for Comet Backup on macOS
- Add more detailed description for `AdminDispatcherRequestStoredObjects`
- Add defensive null checks when parsing fields that may be omitted

## 2021-03-03 v3.12.0
- Based on Comet 21.2.1
- Support restoring files to original paths
- Support the new "Custom" requestable Storage Vault provider type and its `CustomRemoteBucketSettings` structure
- Support new `SpanUseStaticSlots` attribute
- Fix missing fields in `ExternalLDAPAuthenticationSourceSettings` structure
- Fix broken `AdminDispatcherRequestFilesystemObjects` that was parsing into the wrong response type

## 2020-11-24 v3.11.0
- Based on Comet 20.11.0
- Support new `AdminDispatcherDeleteSnapshots` API for deleting multiple snapshots in a single step
- Support `AdminMetaResourceNew` API using multipart request
- Support `setLanguage()` to request translated error messages and status codes
- Fix an issue with expected filesizes unit tests for downloading software versions
- Fix a cosmetic issue with capitalization in AdminMetaResourceNewRequest API description

## 2020-11-05 v3.10.0
- Based on Comet 20.9.10
- Support new `ThawExec` feature

## 2020-10-08 v3.9.0
- Based on Comet 20.9.6
- Support new `AdminStorageBucketProperties` API
- Allow passing in null or no value for `AdminStorageFreeSpace` parameter

## 2020-09-16 v3.8.0
- Based on Comet 20.9.1
- Support `SetTOTPCode` function, to authenticate against Comet Server with a temporary 6-digit TOTP code
- Support new Organization feature
- Support new `AdminCreateInstallTokenRequest` API
- Support new Admin user management APIs
- Support new `RebrandStorage` property on Storage Vaults and on Requestable destination targets
- Fix an issue with incorrect type marshalling in `StorageFreeSpaceInfo.UsedPercent`
- Remove some unnecessary null checks and constant comparisons when submitting an API parameter containing object data

## 2020-09-03 v3.7.0
- Add definitions for B2/Wasabi direct to cloud storage
- Add definitions for remote LDAP servers
- Use gzip content-encoding for all response bodies
- Update descriptions for `SEVT_META_HELLO` and `AdminMetaWebhookOptionsSet`
- Fix an issue with submitting boolean, array, and map parameters to the Comet Server
- Fix an issue with receiving 2xx status codes other than 200
- Fix an issue with interpreting null parameters where an array or key-value map was expected in the response
- Fix an issue with running the test suite against current versions of Comet Server
- Fix an issue with not properly configuring a custom SDK User-Agent for API requests

## 2020-08-24 v3.6.0
- Based on Comet 20.8.0
- Support new AdminGetJobLogEntries endpoint

## 2020-08-05 v3.5.0
- Based on Comet 20.6.8-rc
- Support new feature for configuring default Protected Items and default Schedules in Policies
- Support new Microsoft SQL Server OLE DB method type constants
- Support new MX Direct email method constant
- Fix an issue with wrong API name in phpdoc comment for `HybridSessionStartRequest`
- Fix an issue with type definitions for `WebhookOptions` and for `StorageSpaceFreeInfo->UsedPercent`
- Fix an issue with statically calling non-static methods in `toJSON` and `toStdClass` methods

## 2020-07-22 v3.4.0
- Based on Comet 20.6.6-rc
- Support new Disk Image Protected Item type
- Support restoring files as archive (`RESTORETYPE_FILE_ARCHIVE`) or as physical disk image (`RESTORETYPE_WINDISK`)
- Support remotely browsing Application-Aware Writers, Exchange EDB databases, Hyper-V VMs, Disk Image drives
- Support webhooks (configure by submitting `WebhookOption` structs to `AdminMetaWebhookOptions` APIs; webhook target will receive `StreamableEvent` by POST)
- Support new limited permission APIs to modify server settings (`AdminMetaRemoteStorageVault`, `AdminMetaBuildConfig`, `AdminMetaBrandingConfig`)
- Support new limited permission flags for admin user accounts (`PreventChangePassword`, `AllowEditBranding`, `AllowEditRemoteStorage`)
- Support new `AdminDisableUserTotp` API
- Update field definitions for `ConstellationCheckReport` data structure and its embedded data structures
- Update description for `AdminDispatcherRequestFilesystemObjects` parameter
- Fix an issue with incorrect data type marshalling in `AdminU2FRegistration` class `Registration` field

## 2020-05-22 v3.3.0
- Based on Comet 20.5.0
- Support new `RequirePasswordChange` field in `UserProfileConfig`, and matching parameter on existing `AdminAddUserRequest` API
- Support new TOTP fields in `UserProfileConfig` and corresponding new `AdminAccountValidateTotp` helper API 
- Support new `B2` field in `StorageFreeSpaceInfo` class type
- Support new `AdminDispatcherUninstallSoftware` API, and matching `UninstallConfig` parameter on existing `AdminDeleteUser` API
- Support new `AdminDispatcherRequestFilesystemObjects` API
- Support new `AdminDispatcherUpdateLoginUrl` API 
- Support new `HideCloudStorageBranding`, `RequirePasswordOpenAppUI`, and `ModeRequireUserResetPassword` policy fields in the `UserPolicy` class type
- Support new case-insensitive search clause operators
- Support new `EmailAddress` parameter on `AdminPreviewUserEmailReport` API
- Support new `OldPassword` parameter on `AdminResetUserPassword` API

## 2020-03-09 v3.2.0
- Based on Comet 20.2.1
- Support new `AdminBrandingGenerateClientTest` and `AdminStorageFreeSpace` APIs
- Support new `GroupPolicy.DefaultUserPolicy` field
- Support new `OSInfo` field in both `LiveUserConnection` and `UserProfileConfig.Devices`

## 2020-01-10 v3.1.0
- Based on Comet 19.12.2-rc
- Support new `AdminDispatcherDeleteSnapshot` and `AdminMetaSendTestEmail` APIs
- Support new `AllowZeroFilesSuccess` property on backup job advanced options
- Support new properties for MongoDB, FTPS, Microsoft SQL Server, Regex searches, Periodic schedules
- Update description for Portuguese languages
- Fix an issue with exceptions thrown from placeholder `AdminMetaResourceNew` API

## 2019-08-27 v3.0.0
- Based on Comet 19.9.0-rc
- **BREAKING:** Change `AdminRequestStorageVault` response type to add extra parameter. This would be a backwards-compatible change if no callers are checking the exact returned object type from this function.
- Fix spelling mistake in `AdminRequestStorageVault` API

## 2019-08-20 v2.7.0
- Based on Comet 19.6.9-rc
- Support new `AdminAccountSessionStartAsUser` API
- Support existing `UserWebSessionStart` / `UserWebSessionRevoke` APIs
- Update documentation for `HybridSessionStart` API
- Fix a cosmetic issue with inconsistent terminology for News APIs

## 2019-06-26 v2.6.0
- Based on Comet 19.6.2
- Support new `SelfAddress` parameter in `AdminDispatcherUpdateSoftwareRequest` API
- Support new Scheduled Emailer properties in `ServerMetaVersionInfo` API
- Support new custom options in `AdminDispatcherRunBackupCustom` API
- Support new `AdminDispatcherRunRestoreCustom` API
- Support new `AdminMetaServerConfigNetworkInterfaces` API
- Support new `JOB_STATUS_RUNNING_REVIVED` status
- Update documentation for `JOB_STATUS_RUNNING_INDETERMINATE`
- Update documentation for more `STOREDOBJECTYPE` constants
- Fix wrong description for `AdminBrandingGenerateClientByPlatform` API

## 2019-04-10 v2.5.4
- Fix an issue with `\Comet\SearchClause` class type definition

## 2019-04-10 v2.5.3
- Fix an issue with unmarshalling empty objects to array instead of `stdClass`

## 2019-04-10 v2.5.2
- Fix an issue with distinguishing empty arrays and empty objects when marshalling data after having used the compatibility methods

## 2019-04-02 v2.5.1
- Fix an issue with unmarshalling empty arrays from some versions of Comet Server, that were returning `null` instead of `[]` (v2)

## 2019-04-02 v2.5.0
- Based on Comet 19.3.5-rc
- Support new S3 V2 signing option
- Support new filename consent options
- Support browsing and restoring single files from snapshots
- Fix an issue with unmarshalling empty arrays from some versions of Comet Server, that were returning `null` instead of `[]`

## 2019-02-12 v2.4.0
- Based on Comet 18.12.6-rc
- Support new "Account Name" field
- Support new retention options in policies, backup runtime options
- Support new software download APIs
- Support new hybrid admin/user session logon API

## 2018-12-10 v2.3.2
- Based on Comet 18.12.0
- Updated list of available languages in `\Comet\Def`
- Fix an issue with JSON marshalling for objects containing top-level k/v maps

## 2018-11-22 v2.3.1
- Based on Comet 18.11.1
- Fix release codename in `\Comet\Def`
- Fix an issue with error exceptions

## 2018-11-19 v2.3.0
- Based on Comet 18.11.1-rc
- Support new policy email report functionality
- Fix broken `multipart/form-data` AdminMetaResourceNew API
- Fix undeclared `for_json_encode` variable in marshaller
- Fix download size tests for latest version of Comet Server
- Remove unnecessary `isset` check in unmarshaller

## 2018-11-07 v2.2.0
- Based on Comet 18.9.9-rc
- Support new resource and security functionality

## 2018-10-10 v2.1.0
- Based on Comet 18.9.5-rc
- Support new email functionality
- Fix an issue with `AdminReplicationStateRequest` response types

## 2018-09-21 v2.0.0
- Based on Comet 18.9.2
- **BREAKING:** Throw exception on all non-200 status responses
- **BREAKING:** Make `inflateFrom()` method protected
- **BREAKING:** Remove `forJSONEncode` parameter from `toArray()` class methods
- Accurately round-trip empty arrays/objects instead of using a heuristic
- New `createFromArray()`, `createFromJSON()`, `createFromStdclass()`, `toStdclass()` class methods
- Add test cases for downloading client software and for modifying server settings
- Fix an issue with `@unreached` response types

## 2018-09-20 v1.1.0
- Based on Comet 18.9.2-rc
- Add stub classes for `ServerConfigOptions`/`ConstellationCheckReport`
- Fix an issue with `MAXINT` constants
- Fix an issue with `AdminPoliciesDeleteRequest` response types

## 2018-08-20 v1.0.1
- Based on Comet 18.8.2
- Fix an issue with Exception classes

## 2018-08-16 v1.0.0
- Based on Comet 18.8.1
- Initial public release
