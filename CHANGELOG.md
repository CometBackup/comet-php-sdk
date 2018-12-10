# CHANGELOG

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
