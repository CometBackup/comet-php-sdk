<?php

/**
 * Copyright (c) 2018-2023 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 *
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

class Def {

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
	 * JobClassification:
	 *
	 * @type int
	 */
	const JOB_CLASSIFICATION__MIN = 4000;

	/**
	 * JobClassification:
	 *
	 * @type int
	 */
	const JOB_CLASSIFICATION_UNKNOWN = 4000;

	/**
	 * JobClassification:
	 *
	 * @type int
	 */
	const JOB_CLASSIFICATION_BACKUP = 4001;

	/**
	 * JobClassification:
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
	 * JobClassification:
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
	 * JobClassification:
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
	 * JobClassification:
	 *
	 * @type int
	 */
	const JOB_CLASSIFICATION__MAX = 4999;

	/**
	 * JobStatus:
	 *
	 * @type int
	 */
	const JOB_STATUS_STOP_SUCCESS__MIN = 5000;

	/**
	 * JobStatus:
	 *
	 * @type int
	 */
	const JOB_STATUS_STOP_SUCCESS = 5000;

	/**
	 * JobStatus:
	 *
	 * @type int
	 */
	const JOB_STATUS_STOP_SUCCESS__MAX = 5999;

	/**
	 * JobStatus:
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
	 * JobStatus:
	 *
	 * @type int
	 */
	const JOB_STATUS_RUNNING_ACTIVE = 6001;

	/**
	 * JobStatus: A backup job that was marked as stopped or abandoned, but has somehow continued to run
	 *
	 * @type int
	 */
	const JOB_STATUS_RUNNING_REVIVED = 6002;

	/**
	 * JobStatus:
	 *
	 * @type int
	 */
	const JOB_STATUS_RUNNING__MAX = 6999;

	/**
	 * JobStatus:
	 *
	 * @type int
	 */
	const JOB_STATUS_FAILED__MIN = 7000;

	/**
	 * JobStatus:
	 *
	 * @type int
	 */
	const JOB_STATUS_FAILED_TIMEOUT = 7000;

	/**
	 * JobStatus:
	 *
	 * @type int
	 */
	const JOB_STATUS_FAILED_WARNING = 7001;

	/**
	 * JobStatus:
	 *
	 * @type int
	 */
	const JOB_STATUS_FAILED_ERROR = 7002;

	/**
	 * JobStatus:
	 *
	 * @type int
	 */
	const JOB_STATUS_FAILED_QUOTA = 7003;

	/**
	 * JobStatus:
	 *
	 * @type int
	 */
	const JOB_STATUS_FAILED_SCHEDULEMISSED = 7004;

	/**
	 * JobStatus:
	 *
	 * @type int
	 */
	const JOB_STATUS_FAILED_CANCELLED = 7005;

	/**
	 * JobStatus:
	 *
	 * @type int
	 */
	const JOB_STATUS_FAILED_SKIPALREADYRUNNING = 7006;

	/**
	 * JobStatus:
	 *
	 * @type int
	 */
	const JOB_STATUS_FAILED_ABANDONED = 7007;

	/**
	 * JobStatus:
	 *
	 * @type int
	 */
	const JOB_STATUS_FAILED__MAX = 7999;

	/**
	 * @type int
	 */
	const DESTINATIONTYPE___INVALID = 0;

	/**
	 * @type int
	 */
	const DESTINATIONTYPE_S3 = 1000;

	/**
	 * @type int
	 */
	const DESTINATIONTYPE_SFTP = 1001;

	/**
	 * @type int
	 */
	const DESTINATIONTYPE_LOCALCOPY = 1002;

	/**
	 * @type int
	 */
	const DESTINATIONTYPE_COMET = 1003;

	/**
	 * @type int
	 */
	const DESTINATIONTYPE_FTP = 1004;

	/**
	 * @type int
	 */
	const DESTINATIONTYPE_AZUREBLOB = 1005;

	/**
	 * @type int
	 */
	const DESTINATIONTYPE_SPANNED = 1006;

	/**
	 * @type int
	 */
	const DESTINATIONTYPE_SWIFT = 1007;

	/**
	 * @type int
	 */
	const DESTINATIONTYPE_B2 = 1008;

	/**
	 * @type int
	 */
	const DESTINATIONTYPE_STORJ = 1009;

	/**
	 * @type int
	 */
	const DESTINATIONTYPE_LATEST = 1100;

	/**
	 * @type int
	 */
	const DESTINATIONTYPE_ALL = 1101;

	/**
	 * EmailReportType:
	 *
	 * @type int
	 */
	const EMAILREPORTTYPE_IMMEDIATE = 0;

	/**
	 * EmailReportType:
	 *
	 * @type int
	 */
	const EMAILREPORTTYPE_SUMMARY = 1;

	/**
	 * EmailReportType:
	 *
	 * @type int
	 */
	const EMAILREPORTTYPE_GROUPED_STATUS = 2;

	/**
	 * EmailReportType:
	 *
	 * @type int
	 */
	const EMAILREPORTTYPE_RECENT_ACTIVITY = 3;

	/**
	 * FtpsModeType:
	 *
	 * @type int
	 */
	const FTPS_MODE_PLAINTEXT = 0;

	/**
	 * FtpsModeType:
	 *
	 * @type int
	 */
	const FTPS_MODE_IMPLICIT = 1;

	/**
	 * FtpsModeType:
	 *
	 * @type int
	 */
	const FTPS_MODE_EXPLICIT = 2;

	/**
	 * Severity:
	 *
	 * @type string
	 */
	const SEVERITY_INFO = "I";

	/**
	 * Severity:
	 *
	 * @type string
	 */
	const SEVERITY_WARNING = "W";

	/**
	 * Severity:
	 *
	 * @type string
	 */
	const SEVERITY_ERROR = "E";

	/**
	 * @type int
	 */
	const MONGODB_DEFAULT_PORT = 27017;

	/**
	 * @type int
	 */
	const SERVICE_CALENDAR = 1;

	/**
	 * @type int
	 */
	const SERVICE_CONTACT = 2;

	/**
	 * @type int
	 */
	const SERVICE_MAIL = 4;

	/**
	 * @type int
	 */
	const SERVICE_SHAREPOINT = 8;

	/**
	 * @type int
	 */
	const SERVICE_ONEDRIVE = 16;

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
	 * RestoreType:
	 *
	 * @type int
	 */
	const RESTORETYPE_INVALID = -1;

	/**
	 * RestoreType:
	 *
	 * @type int
	 */
	const RESTORETYPE_FILE = 0;

	/**
	 * RestoreType:
	 *
	 * @type int
	 */
	const RESTORETYPE_NULL = 1;

	/**
	 * RestoreType:
	 *
	 * @type int
	 */
	const RESTORETYPE_PROCESS_PERFILE = 2;

	/**
	 * RestoreType:
	 *
	 * @type int
	 */
	const RESTORETYPE_PROCESS_ARCHIVE = 3;

	/**
	 * RestoreType:
	 *
	 * @type int
	 */
	const RESTORETYPE_WINDISK = 4;

	/**
	 * RestoreType:
	 *
	 * @type int
	 */
	const RESTORETYPE_FILE_ARCHIVE = 5;

	/**
	 * RestoreType:
	 *
	 * @type int
	 */
	const RESTORETYPE_OFFICE365_CLOUD = 6;

	/**
	 * RestoreType:
	 *
	 * @type int
	 */
	const RESTORETYPE_VMDK_FILE = 7;

	/**
	 * RestoreType:
	 *
	 * @type int
	 */
	const RESTORETYPE_VMDK_FILE_NULL = 8;

	/**
	 * RestoreType:
	 *
	 * @type int
	 */
	const RESTORETYPE_VMDK_FILE_ARCHIVE = 9;

	/**
	 * RestoreType:
	 *
	 * @type int
	 */
	const RESTORETYPE_MYSQL = 10;

	/**
	 * RestoreType:
	 *
	 * @type int
	 */
	const RESTORETYPE_MSSQL = 11;

	/**
	 * RestoreType: RESTORETYPE_PROCESS_ARCHIVE
	 *
	 * @type int
	 */
	const RESTORETYPE_PROCESS_TARBALL = 3;

	/**
	 * RestoreArchiveFormat:
	 *
	 * @type int
	 */
	const RESTOREARCHIVEFORMAT_TAR = 0;

	/**
	 * RestoreArchiveFormat:
	 *
	 * @type int
	 */
	const RESTOREARCHIVEFORMAT_TARGZ = 1;

	/**
	 * RestoreArchiveFormat:
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
	 * RestoreArchiveFormat:
	 *
	 * @type int
	 */
	const RESTOREARCHIVEFORMAT_TARZSTD = 4;

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
	 * RetentionRangeType:
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
	 * RetentionRangeType: Removed
	 *
	 * @type int
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
	 * RetentionRangeType:
	 *
	 * @type int
	 */
	const RETENTIONRANGE__HIGHEST = 909;

	/**
	 * @type int
	 */
	const RETENTIONRANGE_MAXINT = 1125899906842624;

	/**
	 * SftpAuthMode:
	 *
	 * @type int
	 */
	const DESTINATION_SFTP_AUTHMODE_NATIVE = 0;

	/**
	 * SftpAuthMode:
	 *
	 * @type int
	 */
	const DESTINATION_SFTP_AUTHMODE_PASSWORD = 1;

	/**
	 * SftpAuthMode:
	 *
	 * @type int
	 */
	const DESTINATION_SFTP_AUTHMODE_PRIVATEKEY = 2;

	/**
	 * SSHAuthMode:
	 *
	 * @type int
	 */
	const SSHCONNECTION_AUTHMODE__INVALID = 0;

	/**
	 * SSHAuthMode:
	 *
	 * @type int
	 */
	const SSHCONNECTION_AUTHMODE_PASSWORD = 1;

	/**
	 * SSHAuthMode: n.b. change values
	 *
	 * @type int
	 */
	const SSHCONNECTION_AUTHMODE_PRIVATEKEY = 2;

	/**
	 * @type int
	 */
	const SCHEDULE_FREQUENCY_LOWEST = 8010;

	/**
	 * epoch time
	 *
	 * @type int
	 */
	const SCHEDULE_FREQUENCY_ONCEONLY = 8010;

	/**
	 * seconds past 00:00 local time
	 *
	 * @type int
	 */
	const SCHEDULE_FREQUENCY_DAILY = 8011;

	/**
	 * seconds past *:00 local time
	 *
	 * @type int
	 */
	const SCHEDULE_FREQUENCY_HOURLY = 8012;

	/**
	 * seconds past 00:00 Sunday, local time
	 *
	 * @type int
	 */
	const SCHEDULE_FREQUENCY_WEEKLY = 8013;

	/**
	 * seconds past 00:00 1st, local time
	 *
	 * @type int
	 */
	const SCHEDULE_FREQUENCY_MONTHLY = 8014;

	/**
	 * SecondsPast: number of seconds per period. Offset: Shunt seconds after unix epoch
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
	 * 2^50 (1 << 50)
	 *
	 * @type int
	 */
	const SCHEDULE_MAXINT = 1125899906842624;

	/**
	 * @type string
	 */
	const ENGINE_BUILTIN_FILE = "engine1/file";

	/**
	 * @type string
	 */
	const ENGINE_BUILTIN_STDOUT = "engine1/stdout";

	/**
	 * @type string
	 */
	const ENGINE_BUILTIN_MYSQL = "engine1/mysql";

	/**
	 * @type string
	 */
	const ENGINE_BUILTIN_SYSTEMSTATE = "engine1/systemstate";

	/**
	 * @type string
	 */
	const ENGINE_BUILTIN_MSSQL = "engine1/mssql";

	/**
	 * @type string
	 */
	const ENGINE_BUILTIN_WINDOWSSYSTEM = "engine1/windowssystem";

	/**
	 * @type string
	 */
	const ENGINE_BUILTIN_EXCHANGEEDB = "engine1/exchangeedb";

	/**
	 * @type string
	 */
	const ENGINE_BUILTIN_VSSWRITER = "engine1/vsswriter";

	/**
	 * @type string
	 */
	const ENGINE_BUILTIN_HYPERV = "engine1/hyperv";

	/**
	 * @type string
	 */
	const ENGINE_BUILTIN_WINDISK = "engine1/windisk";

	/**
	 * @type string
	 */
	const ENGINE_BUILTIN_MONGODB = "engine1/mongodb";

	/**
	 * @type string
	 */
	const ENGINE_BUILTIN_MSOFFICE = "engine1/winmsofficemail";

	/**
	 * MSSQLAuthMode:
	 *
	 * @type string
	 */
	const MSSQL_AUTH_WINDOWS = "windows";

	/**
	 * MSSQLAuthMode:
	 *
	 * @type string
	 */
	const MSSQL_AUTH_NATIVE = "native";

	/**
	 * MSSQLMethod:
	 *
	 * @type string
	 */
	const MSSQL_METHOD_OLEDB_NATIVE = "OLEDB_NATIVE";

	/**
	 * MSSQLMethod:
	 *
	 * @type string
	 */
	const MSSQL_METHOD_OLEDB_32 = "OLEDB_32";

	/**
	 * MSSQLRestoreOpt:
	 *
	 * @type string
	 */
	const MSSQL_RESTORE_RECOVERY = "RECOVERY";

	/**
	 * MSSQLRestoreOpt:
	 *
	 * @type string
	 */
	const MSSQL_RESTORE_NORECOVERY = "NO_RECOVERY";

	/**
	 * StoredObjectType:
	 *
	 * @type string
	 */
	const STOREDOBJECTTYPE_FILE = "file";

	/**
	 * StoredObjectType:
	 *
	 * @type string
	 */
	const STOREDOBJECTTYPE_DIRECTORY = "dir";

	/**
	 * StoredObjectType:
	 *
	 * @type string
	 */
	const STOREDOBJECTTYPE_SYMLINK = "symlink";

	/**
	 * StoredObjectType:
	 *
	 * @type string
	 */
	const STOREDOBJECTTYPE_UNIXBLOCKDEVICE = "dev";

	/**
	 * StoredObjectType:
	 *
	 * @type string
	 */
	const STOREDOBJECTTYPE_UNIXCHARDEVICE = "chardev";

	/**
	 * StoredObjectType:
	 *
	 * @type string
	 */
	const STOREDOBJECTTYPE_UNIXFIFO = "fifo";

	/**
	 * StoredObjectType:
	 *
	 * @type string
	 */
	const STOREDOBJECTTYPE_UNIXSOCKET = "socket";

	/**
	 * StoredObjectType:
	 *
	 * @type string
	 */
	const STOREDOBJECTTYPE_WINEFS = "winefs";

	/**
	 * StoredObjectType: "file"
	 *
	 * @type string
	 */
	const STOREDOBJECTTYPE_EMAILMESSAGE = "emailmessage";

	/**
	 * StoredObjectType: "dir"
	 *
	 * @type string
	 */
	const STOREDOBJECTTYPE_EMAILFOLDER = "mailfolder";

	/**
	 * StoredObjectType: "file"
	 *
	 * @type string
	 */
	const STOREDOBJECTTYPE_OFFICECONTACT = "contact";

	/**
	 * StoredObjectType: "dir"
	 *
	 * @type string
	 */
	const STOREDOBJECTTYPE_OFFICECONTACTFOLDER = "contactfolder";

	/**
	 * StoredObjectType: "file"
	 *
	 * @type string
	 */
	const STOREDOBJECTTYPE_OFFICECALENDAREVENT = "calendarevent";

	/**
	 * StoredObjectType: "dir"
	 *
	 * @type string
	 */
	const STOREDOBJECTTYPE_OFFICECALENDAR = "calendar";

	/**
	 * StoredObjectType:
	 *
	 * @type string
	 */
	const STOREDOBJECTTYPE_MSSITE = "mssite";

	/**
	 * StoredObjectType:
	 *
	 * @type string
	 */
	const STOREDOBJECTTYPE_MSSITE_TEAM = "mssiteteam";

	/**
	 * StoredObjectType:
	 *
	 * @type string
	 */
	const STOREDOBJECTTYPE_MSSITELISTENTITY = "mssitelistentity";

	/**
	 * StoredObjectType:
	 *
	 * @type string
	 */
	const STOREDOBJECTTYPE_MSSITEITEMENTITY = "mssiteitementity";

	/**
	 * StoredObjectType:
	 *
	 * @type string
	 */
	const STOREDOBJECTTYPE_MSSITELISTDRIVEENTITY = "mssitelistdriveentity";

	/**
	 * StoredObjectType:
	 *
	 * @type string
	 */
	const STOREDOBJECTTYPE_VMDK_FILE = "vmdkfile";

	/**
	 * StoredObjectType:
	 *
	 * @type string
	 */
	const STOREDOBJECTTYPE_VMDK_DIRECTORY = "vmdkdir";

	/**
	 * StoredObjectType:
	 *
	 * @type string
	 */
	const STOREDOBJECTTYPE_VMDK_WINEFS = "vmdkwinefs";

	/**
	 * StoredObjectType:
	 *
	 * @type string
	 */
	const STOREDOBJECTTYPE_VMDK_SYMLINK = "vmdksymlink";

	/**
	 * StoredObjectType:
	 *
	 * @type string
	 */
	const STOREDOBJECTTYPE_VIRTUALIMAGE_DISK = "virtualimagedisk";

	/**
	 * StoredObjectType:
	 *
	 * @type string
	 */
	const STOREDOBJECTTYPE_VHDX_GPT_PARTITION = "vhdxpartitiongpt";

	/**
	 * StoredObjectType:
	 *
	 * @type string
	 */
	const STOREDOBJECTTYPE_VHDX_MBR_PARTITION = "vhdxpartitionmbr";

	/**
	 * ExtraFileExclusionOSRestriction:
	 *
	 * @type int
	 */
	const OS_ANY = 0;

	/**
	 * ExtraFileExclusionOSRestriction:
	 *
	 * @type int
	 */
	const OS_ONLY_WINDOWS = 1;

	/**
	 * ExtraFileExclusionOSRestriction:
	 *
	 * @type int
	 */
	const OS_ONLY_WINDOWS_X8632 = 2;

	/**
	 * ExtraFileExclusionOSRestriction:
	 *
	 * @type int
	 */
	const OS_ONLY_WINDOWS_X8664 = 3;

	/**
	 * ExtraFileExclusionOSRestriction:
	 *
	 * @type int
	 */
	const OS_ONLY_MACOS = 4;

	/**
	 * ExtraFileExclusionOSRestriction:
	 *
	 * @type int
	 */
	const OS_ONLY_LINUX = 5;

	/**
	 * DefaultSettingMode:
	 *
	 * @type int
	 */
	const SETTING_SYSTEM_DEFAULT = 0;

	/**
	 * DefaultSettingMode:
	 *
	 * @type int
	 */
	const SETTING_OPTIONAL_DEFAULT_ON = 1;

	/**
	 * DefaultSettingMode:
	 *
	 * @type int
	 */
	const SETTING_OPTIONAL_DEFAULT_OFF = 2;

	/**
	 * DefaultSettingMode:
	 *
	 * @type int
	 */
	const SETTING_ENFORCED_ON = 3;

	/**
	 * DefaultSettingMode:
	 *
	 * @type int
	 */
	const SETTING_ENFORCED_OFF = 4;

	/**
	 * LanguageCode:
	 *
	 * @type string
	 */
	const DEFAULT_LANGUAGE = "en_US";

	/**
	 * @type string
	 */
	const DEFAULT_TIMEZONE = "UTC";

	/**
	 * @type string
	 */
	const APPLICATION_VERSION = "22.12.8";

	/**
	 * @type int
	 */
	const APPLICATION_VERSION_MAJOR = 22;

	/**
	 * @type int
	 */
	const APPLICATION_VERSION_MINOR = 12;

	/**
	 * @type int
	 */
	const APPLICATION_VERSION_REVISION = 8;

	/**
	 * @type string
	 */
	const RELEASE_CODENAME = "Voyager";

	/**
	 * @type int
	 */
	const ENCRYPTIONMETHOD_UNCONFIGURED = 0;

	/**
	 * @type int
	 */
	const PASSWORD_FORMAT_PLAINTEXT = 0;

	/**
	 * @type string
	 */
	const UnknownDeviceError = "ERR_UNKNOWN_DEVICE";

	/**
	 * @type string
	 */
	const TOTPRequiredError = "ERR_TOTP_REQUIRED";

	/**
	 * @type string
	 */
	const UnsupportVmdkFileSystem = "ERR_UNSUPPORT_VMDK_FILE_SYSTEM";

	/**
	 * @type string
	 */
	const UnsupportVhdxFileSystem = "ERR_UNSUPPORT_VHDX_FILE_SYSTEM";

	/**
	 * @type string
	 */
	const VhdxPartitonReadErrMsg = "ERR_VHDX_PARTITION";

	/**
	 * @type int
	 */
	const EMAIL_WORKER_STATE_NOT_STARTED = 0;

	/**
	 * @type int
	 */
	const EMAIL_WORKER_STATE_STARTED = 1;

	/**
	 * @type int
	 */
	const EMAIL_WORKER_STATE_CALCULATING = 2;

	/**
	 * @type int
	 */
	const EMAIL_WORKER_STATE_WAITING = 3;

	/**
	 * @type int
	 */
	const EMAIL_WORKER_STATE_SENDING = 4;

	/**
	 * WebAuthnDeviceType:
	 *
	 * @type int
	 */
	const WEBAUTHN_DEVICE_TYPE__UNKNOWN = 0;

	/**
	 * WebAuthnDeviceType:
	 *
	 * @type int
	 */
	const WEBAUTHN_DEVICE_TYPE__HARDWARE_TOKEN = 1;

	/**
	 * WebAuthnDeviceType:
	 *
	 * @type int
	 */
	const WEBAUTHN_DEVICE_TYPE__ANDROID = 2;

	/**
	 * WebAuthnDeviceType:
	 *
	 * @type int
	 */
	const WEBAUTHN_DEVICE_TYPE__APPLE = 3;

	/**
	 * WebAuthnDeviceType:
	 *
	 * @type int
	 */
	const WEBAUTHN_DEVICE_TYPE__TPM_GENERIC = 4;

	/**
	 * WebAuthnDeviceType:
	 *
	 * @type int
	 */
	const WEBAUTHN_DEVICE_TYPE__TPM_WINDOWS = 5;

	/**
	 * WebAuthnDeviceType:
	 *
	 * @type int
	 */
	const WEBAUTHN_DEVICE_TYPE__TPM_LINUX = 6;

	/**
	 * UpdateStatus:
	 *
	 * @type int
	 */
	const UPDATESTATUS_NOT_SEEN = 0;

	/**
	 * UpdateStatus:
	 *
	 * @type int
	 */
	const UPDATESTATUS_INELIGIBLE = 1;

	/**
	 * UpdateStatus:
	 *
	 * @type int
	 */
	const UPDATESTATUS_PENDING = 2;

	/**
	 * UpdateStatus:
	 *
	 * @type int
	 */
	const UPDATESTATUS_REQUEST_MADE = 3;

	/**
	 * UpdateStatus: Device reconnected with bad version
	 *
	 * @type int
	 */
	const UPDATESTATUS_UPDATE_FAILED = 4;

	/**
	 * UpdateStatus:
	 *
	 * @type int
	 */
	const UPDATESTATUS_UPDATE_CONFIRMED = 5;

	/**
	 * ReplicatorState:
	 *
	 * @type int
	 */
	const REPLICATOR_STATE_NONE = 0;

	/**
	 * ReplicatorState:
	 *
	 * @type int
	 */
	const REPLICATOR_STATE_FILE_LIST_WORKER_STARTED = 1;

	/**
	 * ReplicatorState:
	 *
	 * @type int
	 */
	const REPLICATOR_STATE_FILE_LIST_SYNC_RUNNING = 2;

	/**
	 * ReplicatorState:
	 *
	 * @type int
	 */
	const REPLICATOR_STATE_FILE_LIST_SYNC_FINISHED = 4;

	/**
	 * ReplicatorState:
	 *
	 * @type int
	 */
	const REPLICATOR_STATE_WORKERS_STARTED = 8;

	/**
	 * ReplicatorDisplayClass:
	 *
	 * @type int
	 */
	const REPLICATOR_DISPLAYCLASS_STORAGE = 100;

	/**
	 * ReplicatorDisplayClass:
	 *
	 * @type int
	 */
	const REPLICATOR_DISPLAYCLASS_USER = 101;

	/**
	 * SearchClauseType:
	 *
	 * @type string
	 */
	const SEARCHCLAUSE_RULE = "";

	/**
	 * SearchClauseType:
	 *
	 * @type string
	 */
	const SEARCHCLAUSE_AND = "and";

	/**
	 * SearchClauseType:
	 *
	 * @type string
	 */
	const SEARCHCLAUSE_OR = "or";

	/**
	 * SearchClauseType:
	 *
	 * @type string
	 */
	const SEARCHCLAUSE_NOT_AND = "not_and";

	/**
	 * SearchClauseType:
	 *
	 * @type string
	 */
	const SEARCHCLAUSE_NOT_OR = "not_or";

	/**
	 * @type string
	 */
	const SEARCHOPERATOR_STRING_EQ = "str_eq";

	/**
	 * @type string
	 */
	const SEARCHOPERATOR_STRING_NEQ = "str_neq";

	/**
	 * @type string
	 */
	const SEARCHOPERATOR_STRING_CONTAINS = "str_contains";

	/**
	 * @type string
	 */
	const SEARCHOPERATOR_STRING_NCONTAINS = "str_ncontains";

	/**
	 * @type string
	 */
	const SEARCHOPERATOR_STRING_STARTSWITH = "str_startswith";

	/**
	 * @type string
	 */
	const SEARCHOPERATOR_STRING_NSTARTSWITH = "str_nstartswith";

	/**
	 * @type string
	 */
	const SEARCHOPERATOR_STRING_ENDSWITH = "str_endswith";

	/**
	 * @type string
	 */
	const SEARCHOPERATOR_STRING_NENDSWITH = "str_nendswith";

	/**
	 * @type string
	 */
	const SEARCHOPERATOR_STRING_EQ_CI = "str_eq_ci";

	/**
	 * @type string
	 */
	const SEARCHOPERATOR_STRING_NEQ_CI = "str_neq_ci";

	/**
	 * @type string
	 */
	const SEARCHOPERATOR_STRING_CONTAINS_CI = "str_contains_ci";

	/**
	 * @type string
	 */
	const SEARCHOPERATOR_STRING_NCONTAINS_CI = "str_ncontains_ci";

	/**
	 * @type string
	 */
	const SEARCHOPERATOR_STRING_STARTSWITH_CI = "str_startswith_ci";

	/**
	 * @type string
	 */
	const SEARCHOPERATOR_STRING_NSTARTSWITH_CI = "str_nstartswith_ci";

	/**
	 * @type string
	 */
	const SEARCHOPERATOR_STRING_ENDSWITH_CI = "str_endswith_ci";

	/**
	 * @type string
	 */
	const SEARCHOPERATOR_STRING_NENDSWITH_CI = "str_nendswith_ci";

	/**
	 * @type string
	 */
	const SEARCHOPERATOR_STRING_REGEXMATCH = "str_regexmatch";

	/**
	 * @type string
	 */
	const SEARCHOPERATOR_STRING_NREGEXMATCH = "str_nregexmatch";

	/**
	 * @type string
	 */
	const SEARCHOPERATOR_INT_EQ = "int_eq";

	/**
	 * @type string
	 */
	const SEARCHOPERATOR_INT_NEQ = "int_neq";

	/**
	 * @type string
	 */
	const SEARCHOPERATOR_INT_GT = "int_gt";

	/**
	 * @type string
	 */
	const SEARCHOPERATOR_INT_GTE = "int_gte";

	/**
	 * @type string
	 */
	const SEARCHOPERATOR_INT_LT = "int_lt";

	/**
	 * @type string
	 */
	const SEARCHOPERATOR_INT_LTE = "int_lte";

	/**
	 * @type string
	 */
	const SEARCHOPERATOR_BOOL_IS = "bool_is";

	/**
	 * @type string
	 */
	const SEARCHOPERATOR_BOOL_NIS = "bool_nis";

	/**
	 * EmailDeliveryType:
	 *
	 * @type string
	 */
	const EMAIL_DELIVERY_INHERIT = "";

	/**
	 * EmailDeliveryType:
	 *
	 * @type string
	 */
	const EMAIL_DELIVERY_MX_DIRECT = "builtin";

	/**
	 * EmailDeliveryType:
	 *
	 * @type string
	 */
	const EMAIL_DELIVERY_SMTP = "smtp";

	/**
	 * EmailDeliveryType:
	 *
	 * @type string
	 */
	const EMAIL_DELIVERY_SMTP_SSL = "smtp-ssl";

	/**
	 * EmailDeliveryType:
	 *
	 * @type string
	 */
	const EMAIL_DELIVERY_DISABLED = "disabled";

	/**
	 * EmailDeliveryType: Legacy alias
	 *
	 * @type string
	 */
	const EMAIL_DELIVERY_BUILTIN = self::EMAIL_DELIVERY_MX_DIRECT;

	/**
	 * EmailDeliveryType: changed for clarity
	 *
	 * @type string
	 * @deprecated 22.12.1 This const has been deprecated since Comet version 22.12.1
	 */
	const EMAIL_DELIVERY_NONE = self::EMAIL_DELIVERY_INHERIT;

	/**
	 * RemoteServerType:
	 *
	 * @type string
	 */
	const REMOTESERVER_COMET = "comet";

	/**
	 * RemoteServerType:
	 *
	 * @type string
	 */
	const REMOTESERVER_LDAP = "ldap";

	/**
	 * RemoteServerType:
	 *
	 * @type string
	 */
	const REMOTESERVER_B2 = "b2";

	/**
	 * RemoteServerType:
	 *
	 * @type string
	 */
	const REMOTESERVER_WASABI = "wasabi";

	/**
	 * RemoteServerType:
	 *
	 * @type string
	 */
	const REMOTESERVER_CUSTOM = "custom";

	/**
	 * RemoteServerType:
	 *
	 * @type string
	 */
	const REMOTESERVER_S3_GENERIC = "s3";

	/**
	 * RemoteServerType:
	 *
	 * @type string
	 */
	const REMOTESERVER_AWS = "aws";

	/**
	 * RemoteServerType:
	 *
	 * @type string
	 */
	const REMOTESERVER_STORJ = "storj";

	/**
	 * RemoteServerType:
	 *
	 * @type string
	 */
	const REMOTESERVER_IDRIVEE2 = "idrivee2";

	/**
	 * LDAPSecurityMethod:
	 *
	 * @type string
	 */
	const LDAPSECURITYMETHOD_PLAIN = "plain";

	/**
	 * LDAPSecurityMethod:
	 *
	 * @type string
	 */
	const LDAPSECURITYMETHOD_LDAPS = "ldaps";

	/**
	 * LDAPSecurityMethod:
	 *
	 * @type string
	 */
	const LDAPSECURITYMETHOD_STARTTLS = "starttls";

	/**
	 * MacOSCodesignLevel:
	 *
	 * @type int
	 */
	const MACOSCODESIGN_LEVEL_SIGN = 0;

	/**
	 * MacOSCodesignLevel:
	 *
	 * @type int
	 */
	const MACOSCODESIGN_LEVEL_SIGN_NOTARISE = 1;

	/**
	 * MacOSCodesignLevel:
	 *
	 * @type int
	 */
	const MACOSCODESIGN_LEVEL_SIGN_NOTARISE_STAPLE = 2;

	/**
	 * ClientBrandingBuildMode: Public-Doc: The software client will be custom-built by this Comet Server, allowing custom branding, default server URL, and codesigning.
	 *
	 * @type int
	 */
	const CLIENTBRANDINGBUILD_CUSTOM = 0;

	/**
	 * ClientBrandingBuildMode: Public-Doc: A pre-built software client will be served, with Comet-branding, no server URL, and Comet codesigning.
	 *
	 * @type int
	 */
	const CLIENTBRANDINGBUILD_PREBUILT = 1;

	/**
	 * StreamableEventType:
	 *
	 * @type int
	 */
	const SEVT__MIN = 4000;

	/**
	 * StreamableEventType: Event is emitted when the webhook is registered, or when the server starts up. The Data associated is ServerMetaVersionInfo
	 *
	 * @type int
	 */
	const SEVT_META_HELLO = 4000;

	/**
	 * StreamableEventType: Data is the profile object
	 *
	 * @type int
	 */
	const SEVT_ACCOUNT_NEW = 4100;

	/**
	 * StreamableEventType: Data is the username
	 *
	 * @type int
	 */
	const SEVT_ACCOUNT_REMOVED = 4101;

	/**
	 * StreamableEventType: Data is the profile object
	 *
	 * @type int
	 */
	const SEVT_ACCOUNT_UPDATED = 4102;

	/**
	 * StreamableEventType:
	 *
	 * @type int
	 */
	const SEVT_JOB_NEW = 4200;

	/**
	 * StreamableEventType:
	 *
	 * @type int
	 */
	const SEVT_JOB_COMPLETED = 4201;

	/**
	 * StreamableEventType: Data is the string bucket ref
	 *
	 * @type int
	 */
	const SEVT_BUCKET_NEW = 4300;

	/**
	 * StreamableEventType:
	 *
	 * @type int
	 */
	const SEVT__MAX = 4999;

	/**
	 * PSAType:
	 *
	 * @type int
	 */
	const PSA_TYPE_GENERIC = 0;

	/**
	 * PSAType:
	 *
	 * @type int
	 */
	const PSA_TYPE_GRADIENT = 1;

	/**
	 * CompressMode:
	 *
	 * @type int
	 */
	const COMPRESS_INVALID = 0;

	/**
	 * CompressMode:
	 *
	 * @type int
	 */
	const COMPRESS_LVL_1 = 1;

	/**
	 * CompressMode:
	 *
	 * @type int
	 */
	const COMPRESS_LVL_2 = 2;

	/**
	 * CompressMode:
	 *
	 * @type int
	 */
	const COMPRESS_LVL_3 = 3;

	/**
	 * CompressMode:
	 *
	 * @type int
	 */
	const COMPRESS_LVL_4 = 4;

	/**
	 * CompressMode:
	 *
	 * @type int
	 */
	const COMPRESS_LVL_5 = 5;

	/**
	 * CompressMode:
	 *
	 * @type int
	 */
	const COMPRESS_MAX = self::COMPRESS_LVL_5;

	/**
	 * CompressMode:
	 *
	 * @type int
	 */
	const COMPRESS_DEFAULT = self::COMPRESS_LVL_4;

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

