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
     * @dataProvider provideCrawlerTestSet
     */
    public function testCrawler($param)
    {
        $this->assertTrue($this->classifier->isCrawler($param['target']));
    }

    public function provideCrawlerTestSet()
    {
        return $this->loadTestSetYaml('crawler.yaml');
    }

    /**
     * @test
     * @dataProvider provideGoogleTestSet
     */
    public function testCrawlerGoogle($param)
    {
        $this->assertTrue($this->classifier->isCrawler($param['target']));
    }

    public function provideGoogleTestSet()
    {
        return $this->loadTestSetYaml('crawler_google.yaml');
    }

    private function loadTestSetYaml($file)
    {
        return array_map(
            function ($testCase) {
                return [$testCase];
            },
            Yaml::parse(file_get_contents('woothee/testsets/' . $file))
        );
    }
}
