<?php

namespace Woothee\Tests;

use Woothee;
use Woothee\Classifier;

class WootheeTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function testParse()
    {
        $ua = "";

        $this->assertSame(Classifier::parse($ua), \Woothee::parse($ua));
    }
}
