<?php

/**
 * Polyfill for PHPUnit 4.8
 */

namespace PHPUnit\Framework
{
    use PHPUnit_Framework_TestCase;

    if (!class_exists(TestCase::class)) {
        abstract class TestCase extends PHPUnit_Framework_TestCase
        {
        }
    }
}
