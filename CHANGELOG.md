# CloudBase | Plugin Core | Changelog

## [1.2.1] - 2025-10-06
### Fixed
- Fix for template loading by package name.

## [1.2.0] - 2025-10-06
### Added
- Pass `CloudBase` instance to all Latte templates via the `$app` variable.
- Allow plugins to hook into CloudBase core layouts with `$app->getCoreLayout($layout)`.

## [1.1.2] - 2025-10-06
### Added
- Add license to `composer.json`.