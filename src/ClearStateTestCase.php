<?php

declare(strict_types=1);

namespace SimpleSAML\TestUtils;

use PHPUnit\Framework\TestCase;

/**
 * A base SSP test case that takes care of removing global state prior to test runs
 */
class ClearStateTestCase extends TestCase
{
    /**
     * Used for managing and clearing state
     */
    protected static ?StateClearer $stateClearer = null;


    /**
     */
    public static function setUpBeforeClass(): void
    {
        if (!isset(self::$stateClearer)) {
            self::$stateClearer = new StateClearer();
            self::$stateClearer->backupGlobals();
        }
    }


    /**
     */
    protected function setUp(): void
    {
        self::clearState();
    }


    /**
     */
    public static function tearDownAfterClass(): void
    {
        self::clearState();
    }


    /**
     * Clear any SSP global state to reduce spill over between tests.
     */
    public static function clearState(): void
    {
        if (isset(self::$stateClearer)) {
            self::$stateClearer->clearGlobals();
            self::$stateClearer->clearSSPState();
        }
    }
}
