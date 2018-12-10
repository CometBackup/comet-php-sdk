<?php

/**
 * Copyright (c) 2018 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 * 
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

class Def {
	
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
	 * JobStatus: 
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
	 * Severity: 
	 *
	 * @type string
	 */
	const SEVERITY_INFO = 'I';
	
	/**
	 * Severity: 
	 *
	 * @type string
	 */
	const SEVERITY_WARNING = 'W';
	
	/**
	 * Severity: 
	 *
	 * @type string
	 */
	const SEVERITY_ERROR = 'E';
	
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
	 * RetentionRangeType: 
	 *
	 * @type int
	 */
	const RETENTIONRANGE__HIGHEST = 906;
	
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
	 * @type int
	 */
	const SCHEDULE_FREQUENCY_HIGHEST = 8014;
	
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
	const APPLICATION_VERSION = "18.12.1";
	
	/**
	 * @type int
	 */
	const APPLICATION_VERSION_MAJOR = 18;
	
	/**
	 * @type int
	 */
	const APPLICATION_VERSION_MINOR = 12;
	
	/**
	 * @type int
	 */
	const APPLICATION_VERSION_REVISION = 1;
	
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
	
	
	/*
	 * Retrieve a mapping of language codes supported by Comet Server.
	 *
	 * @return array
	 */
	function LanguageCodes() {
		return [
			'en_US' => 'English',
			'de_DE' => 'Deutsch',
			'es_ES' => 'Español',
			'fr_FR' => 'Français',
			'hr_HR' => 'Hrvatski',
			'it_IT' => 'Italiano',
			'nl_NL' => 'Nederlands',
			'pt_BR' => 'Português (Brazil)',
			'pt_PT' => 'Português (Europe)',
			'ru_RU' => 'Русский',
			'he_IL' => 'עברית‬',
		];
		
	}
	
}

