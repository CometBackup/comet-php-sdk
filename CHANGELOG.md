# CHANGELOG

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
