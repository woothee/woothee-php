<?php

namespace Woothee\Tests\AgentCategory\Os;

use Woothee\AgentCategory\Os\Windows;

class WindowsTest extends \Woothee\Tests\TestCase
{
    /** @var Windows */
    private $windows;

    public function setUp()
    {
        $this->windows = new Windows();
    }

    public function testInvalidWindowsPattern()
    {
        $ua = 'WindowsXX';
        $result = array();
        $this->assertTrue($this->windows->challenge($ua, $result));
    }
}
