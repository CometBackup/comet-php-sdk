# CHANGELOG

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
