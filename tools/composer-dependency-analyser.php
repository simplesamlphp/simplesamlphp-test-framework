<?php

declare(strict_types=1);

use ShipMonk\ComposerDependencyAnalyser\Config\Configuration;
use ShipMonk\ComposerDependencyAnalyser\Config\ErrorType;

return (new Configuration())
    // Composer dependencies – never referenced from PHP source
    ->ignoreErrorsOnPackage(
        'phpstan/extension-installer',
        [ErrorType::UNUSED_DEPENDENCY]
    )
    ->ignoreErrorsOnPackage(
        'phpstan/phpstan',
        [ErrorType::UNUSED_DEPENDENCY]
    )
    ->ignoreErrorsOnPackage(
        'phpstan/phpstan-mockery',
        [ErrorType::UNUSED_DEPENDENCY]
    )
    ->ignoreErrorsOnPackage(
        'phpstan/phpstan-phpunit',
        [ErrorType::UNUSED_DEPENDENCY]
    )
    ->ignoreErrorsOnPackage(
        'shipmonk/composer-dependency-analyser',
        [ErrorType::UNUSED_DEPENDENCY]
    )
    ->ignoreErrorsOnPackage(
        'slevomat/coding-standard',
        [ErrorType::UNUSED_DEPENDENCY]
    )
    ->ignoreErrorsOnPackage(
        'squizlabs/php_codesniffer',
        [ErrorType::UNUSED_DEPENDENCY]
    )
    ->ignoreErrorsOnPackage(
        'symfony/phpunit-bridge',
        [ErrorType::UNUSED_DEPENDENCY]
    );
