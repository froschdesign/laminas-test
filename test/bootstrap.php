<?php

/**
 * @see       https://github.com/laminas/laminas-test for the canonical source repository
 * @copyright https://github.com/laminas/laminas-test/blob/master/COPYRIGHT.md
 * @license   https://github.com/laminas/laminas-test/blob/master/LICENSE.md New BSD License
 */

/*
 * Set error reporting to the level to which Laminas code must comply.
 */
error_reporting(E_ALL | E_STRICT);

if (class_exists('PHPUnit_Runner_Version', true)) {
    $phpUnitVersion = PHPUnit_Runner_Version::id();
    if ('@package_version@' !== $phpUnitVersion && version_compare($phpUnitVersion, '4.0.0', '<')) {
        echo 'This version of PHPUnit (' . PHPUnit_Runner_Version::id() . ') is not supported'
           . ' in the laminas-test unit tests. Supported is version 4.0.0 or higher.'
           . ' See also the CONTRIBUTING.md file in the component root.' . PHP_EOL;
        exit(1);
    }
    unset($phpUnitVersion);
}

/**
 * Setup autoloading
 */
require __DIR__ . '/../vendor/autoload.php';

/**
 * Start output buffering, if enabled
 */
if (defined('TESTS_LAMINAS_OB_ENABLED') && constant('TESTS_LAMINAS_OB_ENABLED')) {
    ob_start();
}

/**
 * Prevent failures due to deprecation notices.
 */
PHPUnit_Framework_Error_Deprecated::$enabled = false;
