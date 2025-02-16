<?php

/**
 * Copyright (c) 2018-2025 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 *
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

class Def {

	/**
	 * @type string
	 */
	const APPLICATION_VERSION = "24.12.5";

	/**
	 * @type int
	 */
	const APPLICATION_VERSION_MAJOR = 24;

	/**
	 * @type int
	 */
	const APPLICATION_VERSION_MINOR = 12;

	/**
	 * @type int
	 */
	const APPLICATION_VERSION_REVISION = 5;

	/**
	 * AutoRetentionLevel: The system will automatically choose how often to run an automatic Retention Pass after each backup job.
	 *
	 * @type int
	 */
	const BACKUPJOBAUTORETENTION_AUTOMATIC = 0;

	/**
	 * AutoRetentionLevel: The system will run a Retention Pass after every single backup job. This is more system-intensive, but is the most responsive at freeing storage space.
	 *
	 * @type int
	 */
	const BACKUPJOBAUTORETENTION_IMMEDIATE = 1;

	/**
	 * AutoRetentionLevel: The system will follow the automatic ruleset for a 'High Power' device.
	 *
	 * @type int
	 */
	const BACKUPJOBAUTORETENTION_MORE_OFTEN = 2;

	/**
	 * AutoRetentionLevel: The system will follow the automatic ruleset for a 'Low Power' device.
	 *
	 * @type int
	 */
	const BACKUPJOBAUTORETENTION_LESS_OFTEN = 3;

	/**
	 * If set, will be automatically replaced with one of the other BRANDINGSTYLETYPE_ constants after next server upgrade.
	 *
	 * @type int
	 */
	const BRANDINGSTYLETYPE_AUTO_LEGACY = 0;

	/**
	 * Use Comet company branding and colours for all web interface branding
	 *
	 * @type int
	 */
	const BRANDINGSTYLETYPE_DEFAULT = 1;

	/**
	 * Use custom branding and colours, with text in the main logo area.
	 *
	 * @type int
	 */
	const BRANDINGSTYLETYPE_CUSTOM_TEXT = 2;

	/**
	 * Use custom branding and colours, with a supplied image in the main logo area.
	 *
	 * @type int
	 */
	const BRANDINGSTYLETYPE_CUSTOM_LOGO = 3;

	/**
	 * ClientBrandingBuildMode: The software client will be custom-built by this Comet Server, allowing custom branding, default server URL, and codesigning.
	 *
	 * @type int
	 */
	const CLIENTBRANDINGBUILD_CUSTOM = 0;

	/**
	 * ClientBrandingBuildMode: A pre-built software client will be served, with Comet-branding, no server URL, and Comet codesigning.
	 *
	 * @type int
	 */
	const CLIENTBRANDINGBUILD_PREBUILT = 1;

	/**
	 * CompressMode
	 *
	 * @type int
	 */
	const COMPRESS_INVALID = 0;

	/**
	 * CompressMode
	 *
	 * @type int
	 */
	const COMPRESS_LVL_1 = 1;

	/**
	 * CompressMode
	 *
	 * @type int
	 */
	const COMPRESS_LVL_2 = 2;

	/**
	 * CompressMode
	 *
	 * @type int
	 */
	const COMPRESS_LVL_3 = 3;

	/**
	 * CompressMode
	 *
	 * @type int
	 */
	const COMPRESS_LVL_4 = 4;

	/**
	 * CompressMode
	 *
	 * @type int
	 */
	const COMPRESS_LVL_5 = 5;

	/**
	 * CompressMode
	 *
	 * @type int
	 */
	const COMPRESS_MAX = self::COMPRESS_LVL_5;

	/**
	 * CompressMode
	 *
	 * @type int
	 */
	const COMPRESS_DEFAULT = self::COMPRESS_LVL_4;

	/**
	 * CustomRemoteBucketCustomBodyType
	 *
	 * @type string
	 */
	const CUSTOMREMOTEBUCKET_CUSTOMBODY_NONE = "none";

	/**
	 * CustomRemoteBucketCustomBodyType
	 *
	 * @type string
	 */
	const CUSTOMREMOTEBUCKET_CUSTOMBODY_JSON = "json";

	/**
	 * CustomRemoteBucketCustomBodyType
	 *
	 * @type string
	 */
	const CUSTOMREMOTEBUCKET_CUSTOMBODY_URLENC = "urlencoded";

	/**
	 * CustomRemoteBucketCustomBodyType
	 *
	 * @type string
	 */
	const CUSTOMREMOTEBUCKET_CUSTOMBODY_FORM = "form";

	/**
	 * The number of retry attempts a backup job can do
	 *
	 * @type int
	 * This const is available in Comet 24.6.6 and later.
	 */
	const DEFAULT_RETRY_COUNT = 1;

	/**
	 * The number of minutes between backup job retry attempts
	 *
	 * @type int
	 * This const is available in Comet 24.6.6 and later.
	 */
	const DEFAULT_RETRY_TIME = 30;

	/**
	 * LanguageCode
	 *
	 * @type string
	 */
	const DEFAULT_LANGUAGE = "en_US";

	/**
	 * @type string
	 */
	const DEFAULT_TIMEZONE = "UTC";

	/**
	 * SftpAuthMode
	 *
	 * @type int
	 */
	const DESTINATION_SFTP_AUTHMODE_NATIVE = 0;

	/**
	 * SftpAuthMode
	 *
	 * @type int
	 */
	const DESTINATION_SFTP_AUTHMODE_PASSWORD = 1;

	/**
	 * SftpAuthMode
	 *
	 * @type int
	 */
	const DESTINATION_SFTP_AUTHMODE_PRIVATEKEY = 2;

	/**
	 * @type int
	 */
	const DESTINATIONTYPE___INVALID = 0;

	/**
	 * S3-compatible, or a specific S3 service such as AWS S3, Wasabi, or iDrive e2
	 *
	 * @type int
	 */
	const DESTINATIONTYPE_S3 = 1000;

	/**
	 * SFTP protocol
	 *
	 * @type int
	 */
	const DESTINATIONTYPE_SFTP = 1001;

	/**
	 * Local Path
	 *
	 * @type int
	 */
	const DESTINATIONTYPE_LOCALCOPY = 1002;

	/**
	 * The Comet Server Storage Role protocol
	 *
	 * @type int
	 */
	const DESTINATIONTYPE_COMET = 1003;

	/**
	 * FTP protocol
	 *
	 * @type int
	 */
	const DESTINATIONTYPE_FTP = 1004;

	/**
	 * Azure Blob Storage
	 *
	 * @type int
	 */
	const DESTINATIONTYPE_AZUREBLOB = 1005;

	/**
	 * Spanned
	 *
	 * @type int
	 */
	const DESTINATIONTYPE_SPANNED = 1006;

	/**
	 * Openstack Swift
	 *
	 * @type int
	 */
	const DESTINATIONTYPE_SWIFT = 1007;

	/**
	 * Backblaze B2 (Native API)
	 *
	 * @type int
	 */
	const DESTINATIONTYPE_B2 = 1008;

	/**
	 * Storj
	 *
	 * @type int
	 */
	const DESTINATIONTYPE_STORJ = 1009;

	/**
	 * @type int
	 */
	const DESTINATIONTYPE_WEBDAV = 1010;

	/**
	 * SMB Path
	 *
	 * @type int
	 */
	const DESTINATIONTYPE_SMB = 1011;

	/**
	 * When defining a schedule via policy, use this option to dynamically select the Storage Vault that was created most recently.
	 *
	 * @type int
	 */
	const DESTINATIONTYPE_LATEST = 1100;

	/**
	 * When defining a schedule via policy, use this option to create a schedule for each Storage Vault in the user's profile.
	 *
	 * @type int
	 */
	const DESTINATIONTYPE_ALL = 1101;

	/**
	 * The Comet Server is still starting up and has not yet checked whether any email reports are due to be sent.
	 *
	 * @type int
	 */
	const EMAIL_WORKER_STATE_NOT_STARTED = 0;

	/**
	 * The Comet Server is still starting up and has not yet checked whether any email reports are due to be sent.
	 *
	 * @type int
	 */
	const EMAIL_WORKER_STATE_STARTED = 1;

	/**
	 * The Comet Server is currently searching through email report configuration, to determine when the next email report is due to be sent.
	 *
	 * @type int
	 */
	const EMAIL_WORKER_STATE_CALCULATING = 2;

	/**
	 * The Comet Server knows when the next scheduled email report is due to be sent, and is waiting until that time.
	 *
	 * @type int
	 */
	const EMAIL_WORKER_STATE_WAITING = 3;

	/**
	 * The Comet Server is currently sending a scheduled email report.
	 *
	 * @type int
	 */
	const EMAIL_WORKER_STATE_SENDING = 4;

	/**
	 * EmailDeliveryType: If this is for the top-level Organization, email is disabled. If this is for an Organization, use the parent's email settings.
	 *
	 * @type string
	 */
	const EMAIL_DELIVERY_INHERIT = "";

	/**
	 * EmailDeliveryType
	 *
	 * @type string
	 */
	const EMAIL_DELIVERY_MX_DIRECT = "builtin";

	/**
	 * EmailDeliveryType
	 *
	 * @type string
	 */
	const EMAIL_DELIVERY_SMTP = "smtp";

	/**
	 * EmailDeliveryType
	 *
	 * @type string
	 */
	const EMAIL_DELIVERY_SMTP_SSL = "smtp-ssl";

	/**
	 * EmailDeliveryType
	 *
	 * @type string
	 */
	const EMAIL_DELIVERY_DISABLED = "disabled";

	/**
	 * EmailDeliveryType: Legacy alias for EMAIL_DELIVERY_MX_DIRECT
	 *
	 * @type string
	 */
	const EMAIL_DELIVERY_BUILTIN = self::EMAIL_DELIVERY_MX_DIRECT;

	/**
	 * EmailDeliveryType: Legacy alias for EMAIL_DELIVERY_INHERIT
	 *
	 * @type string
	 * @deprecated 22.12.1 This const has been deprecated since Comet version 22.12.1
	 */
	const EMAIL_DELIVERY_NONE = self::EMAIL_DELIVERY_INHERIT;

	/**
	 * EmailReportType
	 *
	 * @type int
	 */
	const EMAILREPORTTYPE_IMMEDIATE = 0;

	/**
	 * EmailReportType
	 *
	 * @type int
	 */
	const EMAILREPORTTYPE_SUMMARY = 1;

	/**
	 * EmailReportType
	 *
	 * @type int
	 */
	const EMAILREPORTTYPE_GROUPED_STATUS = 2;

	/**
	 * EmailReportType
	 *
	 * @type int
	 */
	const EMAILREPORTTYPE_RECENT_ACTIVITY = 3;

	/**
	 * @type int
	 */
	const ENCRYPTIONMETHOD_UNCONFIGURED = 0;

	/**
	 * Files and Folders
	 *
	 * @type string
	 */
	const ENGINE_BUILTIN_FILE = "engine1/file";

	/**
	 * Program Output
	 *
	 * @type string
	 */
	const ENGINE_BUILTIN_STDOUT = "engine1/stdout";

	/**
	 * MySQL
	 *
	 * @type string
	 */
	const ENGINE_BUILTIN_MYSQL = "engine1/mysql";

	/**
	 * Windows Server System State
	 *
	 * @type string
	 */
	const ENGINE_BUILTIN_SYSTEMSTATE = "engine1/systemstate";

	/**
	 * Microsoft SQL Server
	 *
	 * @type string
	 */
	const ENGINE_BUILTIN_MSSQL = "engine1/mssql";

	/**
	 * Windows System Backup, deprecated from version 24.12.2
	 *
	 * @type string
	 */
	const ENGINE_BUILTIN_WINDOWSSYSTEM = "engine1/windowssystem";

	/**
	 * Microsoft Exchange Server
	 *
	 * @type string
	 */
	const ENGINE_BUILTIN_EXCHANGEEDB = "engine1/exchangeedb";

	/**
	 * Application-Aware Writer
	 *
	 * @type string
	 */
	const ENGINE_BUILTIN_VSSWRITER = "engine1/vsswriter";

	/**
	 * Microsoft Hyper-V
	 *
	 * @type string
	 */
	const ENGINE_BUILTIN_HYPERV = "engine1/hyperv";

	/**
	 * Disk Image
	 *
	 * @type string
	 */
	const ENGINE_BUILTIN_WINDISK = "engine1/windisk";

	/**
	 * MongoDB
	 *
	 * @type string
	 */
	const ENGINE_BUILTIN_MONGODB = "engine1/mongodb";

	/**
	 * Office 365
	 *
	 * @type string
	 */
	const ENGINE_BUILTIN_MSOFFICE = "engine1/winmsofficemail";

	/**
	 * VMware
	 *
	 * @type string
	 */
	const ENGINE_BUILTIN_VMWARE = "engine1/vmware";

	/**
	 * FtpsModeType: Use plain FTP, do not use FTPS.
	 *
	 * @type int
	 */
	const FTPS_MODE_PLAINTEXT = 0;

	/**
	 * FtpsModeType: Use implicit FTPS, immediately creating a secure SSL/TLS channel before any data is sent. This usually requires a different port on the FTP server. It is generally advised to use explicit mode instead.
	 *
	 * @type int
	 */
	const FTPS_MODE_IMPLICIT = 1;

	/**
	 * FtpsModeType: Use explicit FTPS, first creating an insecure connection and then upgrading to SSL/TLS using AUTH TLS (like STARTTLS).
	 *
	 * @type int
	 */
	const FTPS_MODE_EXPLICIT = 2;

	/**
	 * HypervMethod: Back up Hyper-V virtual machines using VSS mode. This includes all previous snapshots.
	 *
	 * @type string
	 */
	const HYPERV_METHOD_VSS = "vss";

	/**
	 * HypervMethod: Back up Hyper-V virtual machines using WMI mode. This includes the latest snapshot data only.
	 *
	 * @type string
	 * This const is available in Comet 23.9.8 and later.
	 */
	const HYPERV_METHOD_WMI_COPY = "copy";

	/**
	 * HypervMethod: Back up Hyper-V virtual machines using WMI mode with RCT acceleration. This includes the latest snapshot data only.
	 *
	 * @type string
	 * This const is available in Comet 23.9.8 and later.
	 */
	const HYPERV_METHOD_WMI_CBT = "wmi";

	/**
	 * JobClassification: All BackupJobDetail.Classification fields will fall in the 4xxx range.
	 *
	 * @type int
	 */
	const JOB_CLASSIFICATION__MIN = 4000;

	/**
	 * JobClassification
	 *
	 * @type int
	 */
	const JOB_CLASSIFICATION_UNKNOWN = 4000;

	/**
	 * JobClassification: This is a backup job.
	 *
	 * @type int
	 */
	const JOB_CLASSIFICATION_BACKUP = 4001;

	/**
	 * JobClassification: This is a restore job.
	 *
	 * @type int
	 */
	const JOB_CLASSIFICATION_RESTORE = 4002;

	/**
	 * JobClassification: Automatic or manual retention cleaning pass.
	 *
	 * @type int
	 */
	const JOB_CLASSIFICATION_RETENTION = 4003;

	/**
	 * JobClassification: Another process needed exclusive Vault access (e.g. for retention) but the process died. This task cleans up exclusive lockfiles.
	 *
	 * @type int
	 */
	const JOB_CLASSIFICATION_UNLOCK = 4004;

	/**
	 * JobClassification: A specific snapshot has been deleted via the Restore wizard.
	 *
	 * @type int
	 */
	const JOB_CLASSIFICATION_DELETE_CUSTOM = 4005;

	/**
	 * JobClassification: Explicitly re-measuring the size of a Vault (right-click > Advanced menu).
	 *
	 * @type int
	 */
	const JOB_CLASSIFICATION_REMEASURE = 4006;

	/**
	 * JobClassification: Software update
	 *
	 * @type int
	 */
	const JOB_CLASSIFICATION_UPDATE = 4007;

	/**
	 * JobClassification: Importing settings from another installed product
	 *
	 * @type int
	 */
	const JOB_CLASSIFICATION_IMPORT = 4008;

	/**
	 * JobClassification: Repair indexes
	 *
	 * @type int
	 */
	const JOB_CLASSIFICATION_REINDEX = 4009;

	/**
	 * JobClassification: Deep Verify
	 *
	 * @type int
	 */
	const JOB_CLASSIFICATION_DEEPVERIFY = 4010;

	/**
	 * JobClassification: Software uninstall
	 *
	 * @type int
	 */
	const JOB_CLASSIFICATION_UNINSTALL = 4011;

	/**
	 * JobClassification
	 *
	 * @type int
	 */
	const JOB_CLASSIFICATION__MAX = 4999;

	/**
	 * JobStatus: If the BackupJobDetail.Status field is a 5xxx code, the job has stopped for a successful reason.
	 *
	 * @type int
	 */
	const JOB_STATUS_STOP_SUCCESS__MIN = 5000;

	/**
	 * JobStatus: The job is complete and was successful.
	 *
	 * @type int
	 */
	const JOB_STATUS_STOP_SUCCESS = 5000;

	/**
	 * JobStatus
	 *
	 * @type int
	 */
	const JOB_STATUS_STOP_SUCCESS__MAX = 5999;

	/**
	 * JobStatus: If the BackupJobDetail.Status field is a 6xxx code, the job is still running.
	 *
	 * @type int
	 */
	const JOB_STATUS_RUNNING__MIN = 6000;

	/**
	 * JobStatus: Unused
	 *
	 * @type int
	 */
	const JOB_STATUS_RUNNING_INDETERMINATE = 6000;

	/**
	 * JobStatus: The last information the server received from the device is that the job is currently running.
	 *
	 * @type int
	 */
	const JOB_STATUS_RUNNING_ACTIVE = 6001;

	/**
	 * JobStatus: The job was thought to have been in an Abandoned state but updated the Comet Server with a running status.
	 *
	 * @type int
	 */
	const JOB_STATUS_RUNNING_REVIVED = 6002;

	/**
	 * JobStatus: The job has encountered an error and will wait to retry.
	 *
	 * @type int
	 */
	const JOB_STATUS_RUNNING_TRYAGAIN = 6003;

	/**
	 * JobStatus
	 *
	 * @type int
	 */
	const JOB_STATUS_RUNNING__MAX = 6999;

	/**
	 * JobStatus: If the BackupJobDetail.Status field is a 7xxx code, the job has stopped for an unsuccessful reason.
	 *
	 * @type int
	 */
	const JOB_STATUS_FAILED__MIN = 7000;

	/**
	 * JobStatus
	 *
	 * @type int
	 */
	const JOB_STATUS_FAILED_TIMEOUT = 7000;

	/**
	 * JobStatus: The job is complete but there was a problem that may have resulted in issues with the expected result.
	 *
	 * @type int
	 */
	const JOB_STATUS_FAILED_WARNING = 7001;

	/**
	 * JobStatus: There was an error during the job and it did not fully complete.
	 *
	 * @type int
	 */
	const JOB_STATUS_FAILED_ERROR = 7002;

	/**
	 * JobStatus: During a backup job either the "All protected items" quota or "Storage Vault" quota was exceeded.
	 *
	 * @type int
	 */
	const JOB_STATUS_FAILED_QUOTA = 7003;

	/**
	 * JobStatus: The job did not start at its scheduled time.
	 *
	 * @type int
	 */
	const JOB_STATUS_FAILED_SCHEDULEMISSED = 7004;

	/**
	 * JobStatus: The job was cancelled manually, a device shutdown was detected, or the backup time limit was reached.
	 *
	 * @type int
	 */
	const JOB_STATUS_FAILED_CANCELLED = 7005;

	/**
	 * JobStatus: The backup job was skipped as there was already a backup running and the "Skip if already running" option was enabled.
	 *
	 * @type int
	 */
	const JOB_STATUS_FAILED_SKIPALREADYRUNNING = 7006;

	/**
	 * JobStatus: The job has stopped unexpectedly or has been manually marked as abandoned by an admin.
	 *
	 * @type int
	 */
	const JOB_STATUS_FAILED_ABANDONED = 7007;

	/**
	 * JobStatus
	 *
	 * @type int
	 */
	const JOB_STATUS_FAILED__MAX = 7999;

	/**
	 * LDAPSecurityMethod
	 *
	 * @type string
	 */
	const LDAPSECURITYMETHOD_PLAIN = "plain";

	/**
	 * LDAPSecurityMethod
	 *
	 * @type string
	 */
	const LDAPSECURITYMETHOD_LDAPS = "ldaps";

	/**
	 * LDAPSecurityMethod
	 *
	 * @type string
	 */
	const LDAPSECURITYMETHOD_STARTTLS = "starttls";

	/**
	 * MacOSCodesignLevel: Sign only
	 *
	 * @type int
	 */
	const MACOSCODESIGN_LEVEL_SIGN = 0;

	/**
	 * MacOSCodesignLevel: Sign and notarize
	 *
	 * @type int
	 */
	const MACOSCODESIGN_LEVEL_SIGN_NOTARISE = 1;

	/**
	 * MacOSCodesignLevel: Sign, notarize, and staple
	 *
	 * @type int
	 */
	const MACOSCODESIGN_LEVEL_SIGN_NOTARISE_STAPLE = 2;

	/**
	 * @type int
	 */
	const MIN_BUILD_NUMBER_WIN_SERVER_2016 = 14393;

	/**
	 * @type int
	 */
	const MIN_BUILD_NUMBER_WIN_10 = 10240;

	/**
	 * @type int
	 */
	const MIXED_VIRTUAL_ACCOUNT_TYPE_USER = 1;

	/**
	 * @type int
	 */
	const MIXED_VIRTUAL_ACCOUNT_TYPE_GROUP = 2;

	/**
	 * @type int
	 */
	const MIXED_VIRTUAL_ACCOUNT_TYPE_TEAM_GROUP = 3;

	/**
	 * @type int
	 */
	const MIXED_VIRTUAL_ACCOUNT_TYPE_SHAREPOINT_ONLY = 4;

	/**
	 * @type int
	 */
	const MONGODB_DEFAULT_PORT = 27017;

	/**
	 * MSSQLAuthMode
	 *
	 * @type string
	 */
	const MSSQL_AUTH_WINDOWS = "windows";

	/**
	 * MSSQLAuthMode
	 *
	 * @type string
	 */
	const MSSQL_AUTH_NATIVE = "native";

	/**
	 * MSSQLMethod: On Windows x86_64, use the native x86_64 driver.
	 *
	 * @type string
	 */
	const MSSQL_METHOD_OLEDB_NATIVE = "OLEDB_NATIVE";

	/**
	 * MSSQLMethod: On Windows x86_64, use an x86_32 OLEDB driver.
	 *
	 * @type string
	 */
	const MSSQL_METHOD_OLEDB_32 = "OLEDB_32";

	/**
	 * MSSQLRestoreOpt
	 *
	 * @type string
	 */
	const MSSQL_RESTORE_RECOVERY = "RECOVERY";

	/**
	 * MSSQLRestoreOpt
	 *
	 * @type string
	 */
	const MSSQL_RESTORE_NORECOVERY = "NO_RECOVERY";

	/**
	 * Used in policy to define that the automatic Storage Vaults for new devices is not enforced by the policy
	 *
	 * @type string
	 */
	const NEW_STORAGE_VAULT_MODE_USER = "user_controlled";

	/**
	 * No Storage Vault will be created when a new device is added
	 *
	 * @type string
	 */
	const NEW_STORAGE_VAULT_MODE_NONE = "none";

	/**
	 * When a new device is added, a Storage Vault will be created using the servers default Storage Template
	 *
	 * @type string
	 */
	const NEW_STORAGE_VAULT_MODE_SERVER = "server_controlled";

	/**
	 * Enable Object Lock capability if the corresponding Days field is greater than zero.
	New code should explicitly use OBJECT_LOCK_ON / OBJECT_LOCK_OFF instead.
	 *
	 * @type int
	 * @deprecated 23.x.x This const has been deprecated since Comet version 23.x.x
	 */
	const OBJECT_LOCK_LEGACY = 0;

	/**
	 * @type int
	 */
	const OBJECT_LOCK_ON = 1;

	/**
	 * @type int
	 */
	const OBJECT_LOCK_OFF = 2;

	/**
	 * @type string
	 */
	const OFFICE365_REGION_PUBLIC = "GlobalPublicCloud";

	/**
	 * @type string
	 */
	const OFFICE365_REGION_CHINA = "ChinaCloud";

	/**
	 * @type string
	 */
	const OFFICE365_REGION_GERMANY = "GermanCloud";

	/**
	 * @type string
	 */
	const OFFICE365_REGION_US_GOVT = "USGovtGccCloud";

	/**
	 * @type string
	 */
	const OFFICE365_REGION_US_DOD = "USGovtGccDoDCloud";

	/**
	 * ExtraFileExclusionOSRestriction: Applies to any device
	 *
	 * @type int
	 */
	const OS_ANY = 0;

	/**
	 * ExtraFileExclusionOSRestriction: Applies to all Windows devices, regardless of CPU type
	 *
	 * @type int
	 */
	const OS_ONLY_WINDOWS = 1;

	/**
	 * ExtraFileExclusionOSRestriction: Applies to Windows devices with x86_32 CPU
	 *
	 * @type int
	 */
	const OS_ONLY_WINDOWS_X8632 = 2;

	/**
	 * ExtraFileExclusionOSRestriction: Applies to Windows devices with x86_64 CPU
	 *
	 * @type int
	 */
	const OS_ONLY_WINDOWS_X8664 = 3;

	/**
	 * ExtraFileExclusionOSRestriction: Applies to macOS devices, regardless of CPU type
	 *
	 * @type int
	 */
	const OS_ONLY_MACOS = 4;

	/**
	 * ExtraFileExclusionOSRestriction: Applies to Linux devices (including Synology DSM), regardless of CPU type
	 *
	 * @type int
	 */
	const OS_ONLY_LINUX = 5;

	/**
	 * When resetting a password with the API, set the PasswordFormat to this value. The Comet Server will re-hash the credential automatically.
	 *
	 * @type int
	 */
	const PASSWORD_FORMAT_PLAINTEXT = 0;

	/**
	 * OidcProvider
	 *
	 * @type string
	 */
	const PROVIDER_GENERIC = "oidc";

	/**
	 * OidcProvider
	 *
	 * @type string
	 */
	const PROVIDER_AZUREADV2 = "azure-ad-v2";

	/**
	 * OidcProvider
	 *
	 * @type string
	 */
	const PROVIDER_GOOGLE = "google";

	/**
	 * OidcProvider
	 *
	 * @type string
	 */
	const PROVIDER_DASHBOARD = "dashboard";

	/**
	 * PSAType
	 *
	 * @type int
	 */
	const PSA_TYPE_GENERIC = 0;

	/**
	 * PSAType
	 *
	 * @type int
	 */
	const PSA_TYPE_GRADIENT = 1;

	/**
	 * PSAType
	 *
	 * @type int
	 */
	const PSA_TYPE_SYNCRO = 2;

	/**
	 * @type string
	 */
	const RELEASE_CODENAME = "Voyager";

	/**
	 * RemoteServerType: Comet Server
	 *
	 * @type string
	 */
	const REMOTESERVER_COMET = "comet";

	/**
	 * RemoteServerType: Comet Storage powered by Wasabi
	 *
	 * @type string
	 */
	const REMOTESERVER_COMET_STORAGE = "cometstorage";

	/**
	 * RemoteServerType: LDAP (Lightweight Directory Access Protocol)
	 *
	 * @type string
	 */
	const REMOTESERVER_LDAP = "ldap";

	/**
	 * RemoteServerType: OpenID Connect
	 *
	 * @type string
	 */
	const REMOTESERVER_OIDC = "oidc";

	/**
	 * RemoteServerType: Backblaze B2
	 *
	 * @type string
	 */
	const REMOTESERVER_B2 = "b2";

	/**
	 * RemoteServerType: Wasabi Cloud Storage
	 *
	 * @type string
	 */
	const REMOTESERVER_WASABI = "wasabi";

	/**
	 * RemoteServerType: Custom Remote Bucket HTTP protocol
	 *
	 * @type string
	 */
	const REMOTESERVER_CUSTOM = "custom";

	/**
	 * RemoteServerType: Custom IAM-Compatible
	 *
	 * @type string
	 */
	const REMOTESERVER_S3_GENERIC = "s3";

	/**
	 * RemoteServerType: Amazon Web Services
	 *
	 * @type string
	 */
	const REMOTESERVER_AWS = "aws";

	/**
	 * RemoteServerType: Storj DCS
	 *
	 * @type string
	 */
	const REMOTESERVER_STORJ = "storj";

	/**
	 * RemoteServerType: IDrive e2
	 *
	 * @type string
	 */
	const REMOTESERVER_IDRIVEE2 = "idrivee2";

	/**
	 * RemoteServerType: Impossible Cloud (Partner API)
	 *
	 * @type string
	 */
	const REMOTESERVER_IMPOSSIBLECLOUD_PARTNER = "impossiblecloud-partner";

	/**
	 * RemoteServerType: Impossible Cloud
	 *
	 * @type string
	 */
	const REMOTESERVER_IMPOSSIBLECLOUD_IAM = "impossiblecloud-iam";

	/**
	 * ReplicatorState
	 *
	 * @type int
	 */
	const REPLICATOR_STATE_NONE = 0;

	/**
	 * ReplicatorState
	 *
	 * @type int
	 */
	const REPLICATOR_STATE_FILE_LIST_WORKER_STARTED = 1;

	/**
	 * ReplicatorState
	 *
	 * @type int
	 */
	const REPLICATOR_STATE_FILE_LIST_SYNC_RUNNING = 2;

	/**
	 * ReplicatorState
	 *
	 * @type int
	 */
	const REPLICATOR_STATE_FILE_LIST_SYNC_FINISHED = 4;

	/**
	 * ReplicatorState
	 *
	 * @type int
	 */
	const REPLICATOR_STATE_WORKERS_STARTED = 8;

	/**
	 * ReplicatorDisplayClass
	 *
	 * @type int
	 */
	const REPLICATOR_DISPLAYCLASS_STORAGE = 100;

	/**
	 * ReplicatorDisplayClass
	 *
	 * @type int
	 */
	const REPLICATOR_DISPLAYCLASS_USER = 101;

	/**
	 * RestoreArchiveFormat: Tar file format
	 *
	 * @type int
	 */
	const RESTOREARCHIVEFORMAT_TAR = 0;

	/**
	 * RestoreArchiveFormat: Compressed Tar.gz (.tgz) file format
	 *
	 * @type int
	 */
	const RESTOREARCHIVEFORMAT_TARGZ = 1;

	/**
	 * RestoreArchiveFormat: Zip file format
	 *
	 * @type int
	 */
	const RESTOREARCHIVEFORMAT_ZIP = 2;

	/**
	 * RestoreArchiveFormat: SquashFS container
	 *
	 * @type int
	 */
	const RESTOREARCHIVEFORMAT_SQFS = 3;

	/**
	 * RestoreArchiveFormat: Compressed Tar.zstd (.tzst) file format
	 *
	 * @type int
	 */
	const RESTOREARCHIVEFORMAT_TARZSTD = 4;

	/**
	 * RestoreType
	 *
	 * @type int
	 */
	const RESTORETYPE_INVALID = -1;

	/**
	 * RestoreType: Restore as files and folders
	 *
	 * @type int
	 */
	const RESTORETYPE_FILE = 0;

	/**
	 * RestoreType: Download and reconstruct files, but do not save them (for test purposes)
	 *
	 * @type int
	 */
	const RESTORETYPE_NULL = 1;

	/**
	 * RestoreType: Stream each restored file into the target command stdin. The target command may be executed multiple times, once for each restored file.
	 *
	 * @type int
	 */
	const RESTORETYPE_PROCESS_PERFILE = 2;

	/**
	 * RestoreType: Stream an archive of each restored file into the target command stdin. The target command will be executed only once.
	 *
	 * @type int
	 */
	const RESTORETYPE_PROCESS_ARCHIVE = 3;

	/**
	 * RestoreType: Restore partitions back to the physical disk
	 *
	 * @type int
	 */
	const RESTORETYPE_WINDISK = 4;

	/**
	 * RestoreType: Restore selected files and folders as a single compressed archive
	 *
	 * @type int
	 */
	const RESTORETYPE_FILE_ARCHIVE = 5;

	/**
	 * RestoreType: Restore selected Office 365 emails, contacts, calendars, and SharePoint/OneDrive data directly to the Office 365 cloud service
	 *
	 * @type int
	 */
	const RESTORETYPE_OFFICE365_CLOUD = 6;

	/**
	 * RestoreType: Granular restore of single files from within a Disk Image or Hyper-V backup
	 *
	 * @type int
	 */
	const RESTORETYPE_VMDK_FILE = 7;

	/**
	 * RestoreType: Granular restore of single files from within a Disk Image or Hyper-V backup, downloading and reconstructing files, but without saving them (for test purposes)
	 *
	 * @type int
	 */
	const RESTORETYPE_VMDK_FILE_NULL = 8;

	/**
	 * RestoreType: Granular restore of single files from within a Disk Image or Hyper-V backup, creating an archive file of all selected files
	 *
	 * @type int
	 */
	const RESTORETYPE_VMDK_FILE_ARCHIVE = 9;

	/**
	 * RestoreType: Stream restore as SQL statements into a target MySQL server
	 *
	 * @type int
	 */
	const RESTORETYPE_MYSQL = 10;

	/**
	 * RestoreType: Stream restore as T-SQL BACKUP output into a target Microsoft SQL Server
	 *
	 * @type int
	 */
	const RESTORETYPE_MSSQL = 11;

	/**
	 * RestoreType: Restore disk image backup as VMware-compatible virtual disks
	 *
	 * @type int
	 */
	const RESTORETYPE_WINDISK_ESXI = 12;

	/**
	 * RestoreType: Restore disk image backup as Hyper-V-compatible virtual disks (.vhdx format)
	 *
	 * @type int
	 */
	const RESTORETYPE_WINDISK_VHDX = 13;

	/**
	 * RestoreType: Restore virtual machines directly to hypervisor
	 *
	 * @type int
	 * This const is available in Comet 24.12.x and later.
	 */
	const RESTORETYPE_VMHOST = 14;

	/**
	 * RestoreType: Legacy name alias - Prefer to use RESTORETYPE_PROCESS_ARCHIVE since multiple archive file formats are supported within this single RESTORETYPE_
	 *
	 * @type int
	 */
	const RESTORETYPE_PROCESS_TARBALL = 3;

	/**
	 * RetentionMode: If this mode is set in a RetentionPolicy, then RetentionPolicy.Ranges should be ignored.
	 *
	 * @type int
	 */
	const RETENTIONMODE_KEEP_EVERYTHING = 801;

	/**
	 * RetentionMode: Delete everything except for jobs matching the ranges in RetentionPolicy.Ranges.
	 *
	 * @type int
	 */
	const RETENTIONMODE_DELETE_EXCEPT = 802;

	/**
	 * RetentionRangeType
	 *
	 * @type int
	 */
	const RETENTIONRANGE__LOWEST = 900;

	/**
	 * RetentionRangeType: Uses Jobs
	 *
	 * @type int
	 */
	const RETENTIONRANGE_MOST_RECENT_X_JOBS = 900;

	/**
	 * RetentionRangeType: Uses Timestamp
	 *
	 * @type int
	 */
	const RETENTIONRANGE_NEWER_THAN_X = 901;

	/**
	 * RetentionRangeType: Uses Days, Weeks, Months
	 *
	 * @type int
	 */
	const RETENTIONRANGE_JOBS_SINCE = 902;

	/**
	 * RetentionRangeType: Uses Days
	 *
	 * @type int
	 */
	const RETENTIONRANGE_FIRST_JOB_FOR_EACH_LAST_X_DAYS = 903;

	/**
	 * RetentionRangeType
	 *
	 * @type int
	 * @deprecated 17.2.0 This const has been deprecated since Comet version 17.2.0
	 */
	const RETENTIONRANGE__RESERVED904 = 904;

	/**
	 * RetentionRangeType: Uses Months, MonthOffset
	 *
	 * @type int
	 */
	const RETENTIONRANGE_FIRST_JOB_FOR_LAST_X_MONTHS = 905;

	/**
	 * RetentionRangeType: Uses Weeks, WeekOffset
	 *
	 * @type int
	 */
	const RETENTIONRANGE_FIRST_JOB_FOR_LAST_X_WEEKS = 906;

	/**
	 * RetentionRangeType: Uses Jobs
	 *
	 * @type int
	 */
	const RETENTIONRANGE_LAST_X_BACKUPS_ONE_FOR_EACH_DAY = 907;

	/**
	 * RetentionRangeType: Uses Jobs
	 *
	 * @type int
	 */
	const RETENTIONRANGE_LAST_X_BACKUPS_ONE_FOR_EACH_WEEK = 908;

	/**
	 * RetentionRangeType: Uses Jobs
	 *
	 * @type int
	 */
	const RETENTIONRANGE_LAST_X_BACKUPS_ONE_FOR_EACH_MONTH = 909;

	/**
	 * RetentionRangeType
	 *
	 * @type int
	 */
	const RETENTIONRANGE__HIGHEST = 909;

	/**
	 * @type int
	 */
	const RETENTIONRANGE_MAXINT = 1125899906842624;

	/**
	 * @type int
	 */
	const SCHEDULE_FREQUENCY_LOWEST = 8010;

	/**
	 * SecondsPast should be a Unix timestamp, in seconds
	 *
	 * @type int
	 */
	const SCHEDULE_FREQUENCY_ONCEONLY = 8010;

	/**
	 * SecondsPast is the number of seconds past 00:00, in the device's local timezone.
	 *
	 * @type int
	 */
	const SCHEDULE_FREQUENCY_DAILY = 8011;

	/**
	 * SecondsPast is the number of seconds past *:00, in the device's local timezone.
	 *
	 * @type int
	 */
	const SCHEDULE_FREQUENCY_HOURLY = 8012;

	/**
	 * SecondsPast is the number of seconds past 00:00 Sunday, in the device's local timezone.
	 *
	 * @type int
	 */
	const SCHEDULE_FREQUENCY_WEEKLY = 8013;

	/**
	 * SecondsPast is the number of seconds past 00:00 1st, in the device's local timezone.
	 *
	 * @type int
	 */
	const SCHEDULE_FREQUENCY_MONTHLY = 8014;

	/**
	 * SecondsPast is the number of seconds per period. Offset: Shunt seconds after unix epoch
	 *
	 * @type int
	 */
	const SCHEDULE_FREQUENCY_PERIODIC = 8015;

	/**
	 * @type int
	 */
	const SCHEDULE_FREQUENCY_HIGHEST = 8015;

	/**
	 * Maximum random delay (5 hours)
	 *
	 * @type int
	 */
	const SCHEDULE_MAX_RANDOM_DELAY_SECS = 18000;

	/**
	 * @type int
	 */
	const SCHEDULE_MAXINT = 1125899906842624;

	/**
	 * SearchClauseType: The search clause is an explicit rule
	 *
	 * @type string
	 */
	const SEARCHCLAUSE_RULE = "";

	/**
	 * SearchClauseType: All of the ClauseChildren must match
	 *
	 * @type string
	 */
	const SEARCHCLAUSE_AND = "and";

	/**
	 * SearchClauseType: At least one of the ClauseChildren must match
	 *
	 * @type string
	 */
	const SEARCHCLAUSE_OR = "or";

	/**
	 * SearchClauseType
	 *
	 * @type string
	 */
	const SEARCHCLAUSE_NOT_AND = "not_and";

	/**
	 * SearchClauseType
	 *
	 * @type string
	 */
	const SEARCHCLAUSE_NOT_OR = "not_or";

	/**
 * String equals (case sensitive)
	 *
	 * @type string
	 */
	const SEARCHOPERATOR_STRING_EQ = "str_eq";

	/**
 * String does not equal (case sensitive)
	 *
	 * @type string
	 */
	const SEARCHOPERATOR_STRING_NEQ = "str_neq";

	/**
 * String contains anywhere (case sensitive)
	 *
	 * @type string
	 */
	const SEARCHOPERATOR_STRING_CONTAINS = "str_contains";

	/**
 * String does not contain anywhere (case sensitive)
	 *
	 * @type string
	 */
	const SEARCHOPERATOR_STRING_NCONTAINS = "str_ncontains";

	/**
 * String starts with prefix (case sensitive)
	 *
	 * @type string
	 */
	const SEARCHOPERATOR_STRING_STARTSWITH = "str_startswith";

	/**
 * String does not start with prefix (case sensitive)
	 *
	 * @type string
	 */
	const SEARCHOPERATOR_STRING_NSTARTSWITH = "str_nstartswith";

	/**
 * String ends with suffix (case sensitive)
	 *
	 * @type string
	 */
	const SEARCHOPERATOR_STRING_ENDSWITH = "str_endswith";

	/**
 * String does not end with suffix (case sensitive)
	 *
	 * @type string
	 */
	const SEARCHOPERATOR_STRING_NENDSWITH = "str_nendswith";

	/**
 * String equals (case insensitive)
	 *
	 * @type string
	 */
	const SEARCHOPERATOR_STRING_EQ_CI = "str_eq_ci";

	/**
 * String does not equal (case insensitive)
	 *
	 * @type string
	 */
	const SEARCHOPERATOR_STRING_NEQ_CI = "str_neq_ci";

	/**
 * String contains anywhere (case sensitive)
	 *
	 * @type string
	 */
	const SEARCHOPERATOR_STRING_CONTAINS_CI = "str_contains_ci";

	/**
 * String does not contain anywhere (case sensitive)
	 *
	 * @type string
	 */
	const SEARCHOPERATOR_STRING_NCONTAINS_CI = "str_ncontains_ci";

	/**
 * String starts with prefix (case sensitive)
	 *
	 * @type string
	 */
	const SEARCHOPERATOR_STRING_STARTSWITH_CI = "str_startswith_ci";

	/**
 * String does not start with (case sensitive)
	 *
	 * @type string
	 */
	const SEARCHOPERATOR_STRING_NSTARTSWITH_CI = "str_nstartswith_ci";

	/**
 * String ends with suffix (case sensitive)
	 *
	 * @type string
	 */
	const SEARCHOPERATOR_STRING_ENDSWITH_CI = "str_endswith_ci";

	/**
 * String does not end with suffix (case sensitive)
	 *
	 * @type string
	 */
	const SEARCHOPERATOR_STRING_NENDSWITH_CI = "str_nendswith_ci";

	/**
	 * String matches provided regular expression (using Go regex syntax)
	 *
	 * @type string
	 */
	const SEARCHOPERATOR_STRING_REGEXMATCH = "str_regexmatch";

	/**
	 * String does not match provided regular expression (using Go regex syntax)
	 *
	 * @type string
	 */
	const SEARCHOPERATOR_STRING_NREGEXMATCH = "str_nregexmatch";

	/**
	 * Integer field is equal to value
	 *
	 * @type string
	 */
	const SEARCHOPERATOR_INT_EQ = "int_eq";

	/**
	 * Integer field is not equal to value
	 *
	 * @type string
	 */
	const SEARCHOPERATOR_INT_NEQ = "int_neq";

	/**
	 * Integer field is greater than value
	 *
	 * @type string
	 */
	const SEARCHOPERATOR_INT_GT = "int_gt";

	/**
	 * Integer field is greater than or equal to value
	 *
	 * @type string
	 */
	const SEARCHOPERATOR_INT_GTE = "int_gte";

	/**
	 * Integer field is less than value
	 *
	 * @type string
	 */
	const SEARCHOPERATOR_INT_LT = "int_lt";

	/**
	 * Integer field is less than or equal to value
	 *
	 * @type string
	 */
	const SEARCHOPERATOR_INT_LTE = "int_lte";

	/**
	 * Boolean field matches value
	 *
	 * @type string
	 */
	const SEARCHOPERATOR_BOOL_IS = "bool_is";

	/**
	 * Boolean field does not match value
	 *
	 * @type string
	 */
	const SEARCHOPERATOR_BOOL_NIS = "bool_nis";

	/**
	 * 0000 0001. If this value is present in the bitset, then the Calendar service is selected for backup.
	 *
	 * @type int
	 */
	const SERVICE_CALENDAR = 1;

	/**
	 * 0000 0010. If this value is present in the bitset, then the Contact service is selected for backup.
	 *
	 * @type int
	 */
	const SERVICE_CONTACT = 2;

	/**
	 * 0000 0100. If this value is present in the bitset, then the Mail service is selected for backup.
	 *
	 * @type int
	 */
	const SERVICE_MAIL = 4;

	/**
	 * 0000 1000. If this value is present in the bitset, then the SharePoint service is selected for backup.
	 *
	 * @type int
	 */
	const SERVICE_SHAREPOINT = 8;

	/**
	 * 0001 0000. If this value is present in the bitset, then the OneDrive service is selected for backup.
	 *
	 * @type int
	 */
	const SERVICE_ONEDRIVE = 16;

	/**
	 * DefaultSettingMode
	 *
	 * @type int
	 */
	const SETTING_SYSTEM_DEFAULT = 0;

	/**
	 * DefaultSettingMode
	 *
	 * @type int
	 */
	const SETTING_OPTIONAL_DEFAULT_ON = 1;

	/**
	 * DefaultSettingMode
	 *
	 * @type int
	 */
	const SETTING_OPTIONAL_DEFAULT_OFF = 2;

	/**
	 * DefaultSettingMode
	 *
	 * @type int
	 */
	const SETTING_ENFORCED_ON = 3;

	/**
	 * DefaultSettingMode
	 *
	 * @type int
	 */
	const SETTING_ENFORCED_OFF = 4;

	/**
	 * Severity
	 *
	 * @type string
	 */
	const SEVERITY_DEBUG = "D";

	/**
	 * Severity
	 *
	 * @type string
	 */
	const SEVERITY_INFO = "I";

	/**
	 * Severity
	 *
	 * @type string
	 */
	const SEVERITY_WARNING = "W";

	/**
	 * Severity
	 *
	 * @type string
	 */
	const SEVERITY_ERROR = "E";

	/**
	 * StreamableEventType
	 *
	 * @type int
	 */
	const SEVT__MIN = 4000;

	/**
	 * StreamableEventType: New event stream connection. Data is typically ServerMetaVersionInfo
	 *
	 * @type int
	 */
	const SEVT_META_HELLO = 4000;

	/**
	 * StreamableEventType: User created. Data is the profile object
	 *
	 * @type int
	 */
	const SEVT_ACCOUNT_NEW = 4100;

	/**
	 * StreamableEventType: User deleted
	 *
	 * @type int
	 */
	const SEVT_ACCOUNT_REMOVED = 4101;

	/**
	 * StreamableEventType: User updated. Data is the profile object
	 *
	 * @type int
	 */
	const SEVT_ACCOUNT_UPDATED = 4102;

	/**
	 * StreamableEventType: User authentication succeeded. Only emitted for non-session requests. Resource is the requested path
	 *
	 * @type int
	 */
	const SEVT_ACCOUNT_LOGIN = 4103;

	/**
	 * StreamableEventType: User authentication failed. Only emitted if the user exists. Resource is the requested path
	 *
	 * @type int
	 */
	const SEVT_ACCOUNT_LOGIN_FAILED = 4104;

	/**
	 * StreamableEventType: User session token created. Data is the session object
	 *
	 * @type int
	 */
	const SEVT_ACCOUNT_SESSION_START = 4105;

	/**
	 * StreamableEventType: User session token deleted
	 *
	 * @type int
	 */
	const SEVT_ACCOUNT_SESSION_REVOKE = 4106;

	/**
	 * StreamableEventType: User session token expired
	 *
	 * @type int
	 */
	const SEVT_ACCOUNT_SESSION_EXPIRE = 4107;

	/**
	 * StreamableEventType: Admin created. Data is the profile object
	 *
	 * @type int
	 */
	const SEVT_ACCOUNT_ADMIN_NEW = 4150;

	/**
	 * StreamableEventType: Admin deleted
	 *
	 * @type int
	 */
	const SEVT_ACCOUNT_ADMIN_REMOVED = 4151;

	/**
	 * StreamableEventType: Admin updated
	 *
	 * @type int
	 */
	const SEVT_ACCOUNT_ADMIN_UPDATED = 4152;

	/**
	 * StreamableEventType: Admin authentication succeeded. Only emitted for non-session requests. Resource is the requested path
	 *
	 * @type int
	 */
	const SEVT_ACCOUNT_ADMIN_LOGIN = 4153;

	/**
	 * StreamableEventType: Admin authentication failed. Only emitted if the admin exists. Resource is the request path
	 *
	 * @type int
	 */
	const SEVT_ACCOUNT_ADMIN_LOGIN_FAILED = 4154;

	/**
	 * StreamableEventType: Admin session token created. Data is the session object
	 *
	 * @type int
	 */
	const SEVT_ACCOUNT_ADMIN_SESSION_START = 4155;

	/**
	 * StreamableEventType: Admin session token deleted
	 *
	 * @type int
	 */
	const SEVT_ACCOUNT_ADMIN_SESSION_REVOKE = 4156;

	/**
	 * StreamableEventType: Admin session token expired
	 *
	 * @type int
	 */
	const SEVT_ACCOUNT_ADMIN_SESSION_EXPIRE = 4157;

	/**
	 * StreamableEventType: New backup job started. Data is the job object
	 *
	 * @type int
	 */
	const SEVT_JOB_NEW = 4200;

	/**
	 * StreamableEventType: Backup job completed. Data is the job object
	 *
	 * @type int
	 */
	const SEVT_JOB_COMPLETED = 4201;

	/**
	 * StreamableEventType: New bucket created
	 *
	 * @type int
	 */
	const SEVT_BUCKET_NEW = 4300;

	/**
	 * StreamableEventType: Bucket deleted
	 *
	 * @type int
	 */
	const SEVT_BUCKET_REMOVED = 4301;

	/**
	 * StreamableEventType: Server started
	 *
	 * @type int
	 */
	const SEVT_SERVER_STARTED = 4400;

	/**
	 * StreamableEventType: Server restarting (pending)
	 *
	 * @type int
	 */
	const SEVT_SERVER_RESTARTED = 4401;

	/**
	 * StreamableEventType: Server shutting down (pending)
	 *
	 * @type int
	 */
	const SEVT_SERVER_SHUTDOWN = 4402;

	/**
	 * StreamableEventType: Server configuration has been updated. Data is the server config object
	 *
	 * @type int
	 */
	const SEVT_SERVER_UPDATED = 4403;

	/**
	 * StreamableEventType: Tenant created. Data is the tenant object
	 *
	 * @type int
	 */
	const SEVT_TENANT_NEW = 4500;

	/**
	 * StreamableEventType: Tenant deleted
	 *
	 * @type int
	 */
	const SEVT_TENANT_REMOVED = 4501;

	/**
	 * StreamableEventType: Tenant updated. Data is the tenant object
	 *
	 * @type int
	 */
	const SEVT_TENANT_UPDATED = 4502;

	/**
	 * StreamableEventType: Policy created. Data is the policy object
	 *
	 * @type int
	 */
	const SEVT_POLICY_NEW = 4600;

	/**
	 * StreamableEventType: Policy deleted
	 *
	 * @type int
	 */
	const SEVT_POLICY_REMOVED = 4601;

	/**
	 * StreamableEventType: Policy updated. Data is the policy object
	 *
	 * @type int
	 */
	const SEVT_POLICY_UPDATED = 4602;

	/**
	 * StreamableEventType: Device created. Data is device object
	 *
	 * @type int
	 */
	const SEVT_DEVICE_NEW = 4700;

	/**
	 * StreamableEventType: Device deleted
	 *
	 * @type int
	 */
	const SEVT_DEVICE_REMOVED = 4701;

	/**
	 * StreamableEventType: Device live connection started
	 *
	 * @type int
	 */
	const SEVT_DEVICE_LIVE_CONNECT = 4702;

	/**
	 * StreamableEventType: Device live connection ended
	 *
	 * @type int
	 */
	const SEVT_DEVICE_LIVE_DISCONNECT = 4703;

	/**
	 * StreamableEventType: Device connected to registration lobby
	 *
	 * @type int
	 */
	const SEVT_DEVICE_LOBBY_CONNECT = 4704;

	/**
	 * StreamableEventType: Device disconnected from registration lobby
	 *
	 * @type int
	 */
	const SEVT_DEVICE_LOBBY_DISCONNECT = 4705;

	/**
	 * StreamableEventType: UserGroup created.
	 *
	 * @type int
	 */
	const SEVT_USERGROUP_NEW = 4800;

	/**
	 * StreamableEventType: UserGroup deleted
	 *
	 * @type int
	 */
	const SEVT_USERGROUP_REMOVED = 4801;

	/**
	 * StreamableEventType: UserGroup updated.
	 *
	 * @type int
	 */
	const SEVT_USERGROUP_UPDATED = 4802;

	/**
	 * StreamableEventType
	 *
	 * @type int
	 */
	const SEVT__MAX = 4999;

	/**
	 * SSHAuthMode
	 *
	 * @type int
	 */
	const SSHCONNECTION_AUTHMODE__INVALID = 0;

	/**
	 * SSHAuthMode
	 *
	 * @type int
	 */
	const SSHCONNECTION_AUTHMODE_PASSWORD = 1;

	/**
	 * SSHAuthMode
	 *
	 * @type int
	 */
	const SSHCONNECTION_AUTHMODE_PRIVATEKEY = 2;

	/**
	 * StoredObjectType
	 *
	 * @type string
	 */
	const STOREDOBJECTTYPE_FILE = "file";

	/**
	 * StoredObjectType
	 *
	 * @type string
	 */
	const STOREDOBJECTTYPE_DIRECTORY = "dir";

	/**
	 * StoredObjectType
	 *
	 * @type string
	 */
	const STOREDOBJECTTYPE_SYMLINK = "symlink";

	/**
	 * StoredObjectType
	 *
	 * @type string
	 */
	const STOREDOBJECTTYPE_UNIXBLOCKDEVICE = "dev";

	/**
	 * StoredObjectType
	 *
	 * @type string
	 */
	const STOREDOBJECTTYPE_UNIXCHARDEVICE = "chardev";

	/**
	 * StoredObjectType
	 *
	 * @type string
	 */
	const STOREDOBJECTTYPE_UNIXFIFO = "fifo";

	/**
	 * StoredObjectType
	 *
	 * @type string
	 */
	const STOREDOBJECTTYPE_UNIXSOCKET = "socket";

	/**
	 * StoredObjectType
	 *
	 * @type string
	 */
	const STOREDOBJECTTYPE_WINEFS = "winefs";

	/**
	 * StoredObjectType
	 *
	 * @type string
	 */
	const STOREDOBJECTTYPE_WINDOWSFILE = "winfile";

	/**
	 * StoredObjectType
	 *
	 * @type string
	 */
	const STOREDOBJECTTYPE_WINDOWSDIR = "windir";

	/**
	 * StoredObjectType
	 *
	 * @type string
	 */
	const STOREDOBJECTTYPE_EMAILMESSAGE = "emailmessage";

	/**
	 * StoredObjectType
	 *
	 * @type string
	 */
	const STOREDOBJECTTYPE_EMAILFOLDER = "mailfolder";

	/**
	 * StoredObjectType
	 *
	 * @type string
	 */
	const STOREDOBJECTTYPE_OFFICECONTACT = "contact";

	/**
	 * StoredObjectType
	 *
	 * @type string
	 */
	const STOREDOBJECTTYPE_OFFICECONTACTFOLDER = "contactfolder";

	/**
	 * StoredObjectType
	 *
	 * @type string
	 */
	const STOREDOBJECTTYPE_OFFICECALENDAREVENT = "calendarevent";

	/**
	 * StoredObjectType
	 *
	 * @type string
	 */
	const STOREDOBJECTTYPE_OFFICECALENDAR = "calendar";

	/**
	 * StoredObjectType
	 *
	 * @type string
	 */
	const STOREDOBJECTTYPE_MSSITE = "mssite";

	/**
	 * StoredObjectType
	 *
	 * @type string
	 */
	const STOREDOBJECTTYPE_MSSITE_TEAM = "mssiteteam";

	/**
	 * StoredObjectType
	 *
	 * @type string
	 */
	const STOREDOBJECTTYPE_MSSITELISTENTITY = "mssitelistentity";

	/**
	 * StoredObjectType
	 *
	 * @type string
	 */
	const STOREDOBJECTTYPE_MSSITEITEMENTITY = "mssiteitementity";

	/**
	 * StoredObjectType
	 *
	 * @type string
	 */
	const STOREDOBJECTTYPE_MSSITELISTDRIVEENTITY = "mssitelistdriveentity";

	/**
	 * StoredObjectType
	 *
	 * @type string
	 */
	const STOREDOBJECTTYPE_VMDK_FILE = "vmdkfile";

	/**
	 * StoredObjectType
	 *
	 * @type string
	 */
	const STOREDOBJECTTYPE_VMDK_DIRECTORY = "vmdkdir";

	/**
	 * StoredObjectType
	 *
	 * @type string
	 */
	const STOREDOBJECTTYPE_VMDK_WINEFS = "vmdkwinefs";

	/**
	 * StoredObjectType
	 *
	 * @type string
	 */
	const STOREDOBJECTTYPE_VMDK_SYMLINK = "vmdksymlink";

	/**
	 * StoredObjectType
	 *
	 * @type string
	 */
	const STOREDOBJECTTYPE_VIRTUALIMAGE_DISK = "virtualimagedisk";

	/**
	 * StoredObjectType
	 *
	 * @type string
	 */
	const STOREDOBJECTTYPE_VHDX_GPT_PARTITION = "vhdxpartitiongpt";

	/**
	 * StoredObjectType
	 *
	 * @type string
	 */
	const STOREDOBJECTTYPE_VHDX_MBR_PARTITION = "vhdxpartitionmbr";

	/**
	 * StreamLevel: Event data contains full data types
	 *
	 * @type string
	 */
	const STREAM_LEVEL_FULL = "full";

	/**
	 * StreamLevel: Event data contains nothing
	 *
	 * @type string
	 */
	const STREAM_LEVEL_NONE = "none";

	/**
	 * StreamerType
	 *
	 * @type string
	 */
	const STREAMER_TYPE_INTERNAL = "internal";

	/**
	 * StreamerType
	 *
	 * @type string
	 */
	const STREAMER_TYPE_WEBHOOK = "webhook";

	/**
	 * StreamerType
	 *
	 * @type string
	 */
	const STREAMER_TYPE_WEBSOCKET = "websocket";

	/**
	 * StreamerType
	 *
	 * @type string
	 */
	const STREAMER_TYPE_FILE = "file";

	/**
	 * If an API response returns in failure, but it includes this value in the CometAPIResponseMessage->Message parameter, it indicates that your supplied authentication was insufficient, and you must supply additional two-factor authentication credentials.
	 *
	 * @type string
	 */
	const TOTPRequiredError = "ERR_TOTP_REQUIRED";

	/**
	 * UpdateStatus
	 *
	 * @type int
	 */
	const UPDATESTATUS_NOT_SEEN = 0;

	/**
	 * UpdateStatus: The selected device does not meet the filter criteria from the Bulk Update Campaign's configuration.
	 *
	 * @type int
	 */
	const UPDATESTATUS_INELIGIBLE = 1;

	/**
	 * UpdateStatus
	 *
	 * @type int
	 */
	const UPDATESTATUS_PENDING = 2;

	/**
	 * UpdateStatus: The device has made a live connection and it meets the filter criteria. A live connection message has been sent asking it to perform the software upgrade.
	 *
	 * @type int
	 */
	const UPDATESTATUS_REQUEST_MADE = 3;

	/**
	 * UpdateStatus: An update signal was sent to the device, but when it reconnected, it did not advertise the target software version. It's likely that the update failed - please check the device's Update log for more information.
	 *
	 * @type int
	 */
	const UPDATESTATUS_UPDATE_FAILED = 4;

	/**
	 * UpdateStatus: The device has successfully updated to the target version.
	 *
	 * @type int
	 */
	const UPDATESTATUS_UPDATE_CONFIRMED = 5;

	/**
	 * @type int
	 */
	const USERNAME_MAX_LENGTH = 255;

	/**
	 * If an API response returns in failure, but it includes this value in the CometAPIResponseMessage->Message parameter, it indicates that the specified Device ID was invalid or not found.
	 *
	 * @type string
	 */
	const UnknownDeviceError = "ERR_UNKNOWN_DEVICE";

	/**
	 * @type string
	 */
	const UnsupportVhdxFileSystem = "ERR_UNSUPPORT_VHDX_FILE_SYSTEM";

	/**
	 * @type string
	 */
	const UnsupportVmdkFileSystem = "ERR_UNSUPPORT_VMDK_FILE_SYSTEM";

	/**
	 * VMwareConnectionType
	 *
	 * @type string
	 * @deprecated 23.9.11 This const has been deprecated since Comet version 23.9.11
	 */
	const VMWARE_CONNECTION_SSH = "ssh";

	/**
	 * VMwareConnectionType
	 *
	 * @type string
	 */
	const VMWARE_CONNECTION_VSPHERE = "vsphere";

	/**
	 * VmwareSnapshotType
	 *
	 * @type string
	 */
	const VMWARE_SNAPSHOT_FAST = "";

	/**
	 * VmwareSnapshotType
	 *
	 * @type string
	 */
	const VMWARE_SNAPSHOT_QUIESCE = "quiesce";

	/**
	 * VmwareSnapshotType
	 *
	 * @type string
	 */
	const VMWARE_SNAPSHOT_MEMORY = "memory";

	/**
	 * VmwareBackupType
	 *
	 * @type string
	 */
	const VMWARE_BACKUP_FULL = "full";

	/**
	 * VmwareBackupType
	 *
	 * @type string
	 */
	const VMWARE_BACKUP_CBT = "cbt";

	/**
	 * VmwareBackupType
	 *
	 * @type string
	 * @deprecated 23.9.11 This const has been deprecated since Comet version 23.9.11
	 */
	const VMWARE_BACKUP_COPY = "copy";

	/**
	 * @type string
	 */
	const VhdxPartitonReadErrMsg = "ERR_VHDX_PARTITION";

	/**
	 * WebAuthnDeviceType
	 *
	 * @type int
	 */
	const WEBAUTHN_DEVICE_TYPE__UNKNOWN = 0;

	/**
	 * WebAuthnDeviceType
	 *
	 * @type int
	 */
	const WEBAUTHN_DEVICE_TYPE__HARDWARE_TOKEN = 1;

	/**
	 * WebAuthnDeviceType
	 *
	 * @type int
	 */
	const WEBAUTHN_DEVICE_TYPE__ANDROID = 2;

	/**
	 * WebAuthnDeviceType
	 *
	 * @type int
	 */
	const WEBAUTHN_DEVICE_TYPE__APPLE = 3;

	/**
	 * WebAuthnDeviceType
	 *
	 * @type int
	 */
	const WEBAUTHN_DEVICE_TYPE__TPM_GENERIC = 4;

	/**
	 * WebAuthnDeviceType
	 *
	 * @type int
	 */
	const WEBAUTHN_DEVICE_TYPE__TPM_WINDOWS = 5;

	/**
	 * WebAuthnDeviceType
	 *
	 * @type int
	 */
	const WEBAUTHN_DEVICE_TYPE__TPM_LINUX = 6;

	/**
	 * WindowsCodesignMethod: When upgrading from a version of Comet Server prior to 23.3.0, this option will be automatically converted to a more specific type.
	 *
	 * @type int
	 * @deprecated 23.3.0 This const has been deprecated since Comet version 23.3.0
	 */
	const WINDOWSCODESIGN_METHOD_AUTO = 0;

	/**
	 * WindowsCodesignMethod: Do not perform Authenticode codesigning
	 *
	 * @type int
	 */
	const WINDOWSCODESIGN_METHOD_DISABLED = 1;

	/**
	 * WindowsCodesignMethod: Use a configured PKCS#12 key file for Authenticode codesigning
	 *
	 * @type int
	 */
	const WINDOWSCODESIGN_METHOD_PKCS12FILE = 2;

	/**
	 * WindowsCodesignMethod: Use a configured PKCS#11 hardware security module (HSM) for Authenticode codesigning
	 *
	 * @type int
	 */
	const WINDOWSCODESIGN_METHOD_PKCS11HSM = 3;

	/**
	 * WindowsCodesignMethod: Use a configured Azure Key Vault for Authenticode codesigning
	 *
	 * @type int
	 */
	const WINDOWSCODESIGN_METHOD_AZUREKEYVAULT = 4;

	/**
	 * Retrieve a mapping of language codes supported by Comet Server.
	 *
	 * @return array
	 */
	function LanguageCodes() {
		return [
			'en_US' => 'English',
			'da_DK' => 'Dansk',
			'de_DE' => 'Deutsch',
			'es_ES' => 'Español',
			'fr_FR' => 'Français',
			'hr_HR' => 'Hrvatski',
			'it_IT' => 'Italiano',
			'nl_NL' => 'Nederlands',
			'pt_BR' => 'Português (Brasil)',
			'pt_PT' => 'Português (Europa)',
			'ru_RU' => 'Русский',
			'he_IL' => 'עברית‬',
			'th_TH' => 'ภาษาไทย',
			'zh_TW' => '中文 (繁體)',
			'pl_PL' => 'Polski',
		];
	}
}

