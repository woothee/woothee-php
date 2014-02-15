<?php
namespace Woothee\Tests;

use Symfony\Component\Yaml\Yaml;
use Woothee\Classifier;

class ClassifierTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->classifier = new Classifier;
    }

    /**
     * @test
     * @dataProvider provideGoogleTestCases
     */
    public function testCrawlerGoogle($param)
    {
        $this->assertTrue($this->classifier->isCrawler($param['target']));
    }

    private function loadTestCaseYaml($file)
    {
        return array_map(
            function ($testCase) {
                return [$testCase];
            },
            Yaml::parse(file_get_contents('woothee/testsets/' . $file))
        );
    }

    public function provideGoogleTestCases()
    {
        return $this->loadTestCaseYaml('crawler_google.yaml');
    }
}
