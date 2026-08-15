<?php

use ShipMonk\ComposerDependencyAnalyser\Config\Configuration;
use ShipMonk\ComposerDependencyAnalyser\Config\ErrorType;

$config = new Configuration();

return $config
    // ext-curl is required; functions are used via `use function`
    ->ignoreErrorsOnExtension('ext-curl', [ErrorType::UNUSED_DEPENDENCY])

    // Intentional: this package is a test framework, so these live in "require"
    // but are only referenced from test/dev paths
    ->ignoreErrorsOnPackages([
        'phpunit/phpunit',
        'psr/log',
        'twig/twig',
    ], [ErrorType::PROD_DEPENDENCY_ONLY_IN_DEV])

    ->ignoreErrorsOnPackage(
        'simplesamlphp/simplesamlphp',
        [ErrorType::DEV_DEPENDENCY_IN_PROD]
    )

    // Tooling / meta packages that are intentionally declared but never
    // referenced from scanned PHP sources (same set you previously
    // excluded with composer-unused)
    ->ignoreErrorsOnPackages([
        'phpstan/extension-installer',
        'phpstan/phpstan',
        'phpstan/phpstan-mockery',
        'phpstan/phpstan-phpunit',
        'shipmonk/composer-dependency-analyser',
        'slevomat/coding-standard',
        'squizlabs/php_codesniffer',
        'symfony/phpunit-bridge',
    ], [ErrorType::UNUSED_DEPENDENCY])

    // Optional: stop the tool from complaining about ignores that no longer match
    ->disableReportingUnmatchedIgnores();
