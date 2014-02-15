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
        return $this->loadTestSetYaml('crawler.yaml', 'crawler_google.yaml');
    }

    /**
     * @test
     * @dataProvider provideNonCrawlerTestSet
     */
    public function testNonCrawler($param)
    {
        $this->assertFalse($this->classifier->isCrawler($param['target']));
    }

    public function provideNonCrawlerTestSet()
    {
        return $this->loadTestSetYaml('pc_windows.yaml', 'pc_misc.yaml');
    }

    private function loadTestSetYaml($file)
    {
        $files = func_get_args();

        return array_reduce(
            array_map(
                function ($file) {
                    return array_map(
                        function ($testCase) {
                            return [$testCase];
                        },
                        Yaml::parse(file_get_contents('woothee/testsets/'.$file))
                    );
                },
                $files
            ),
            function ($result, $testSet) {
                return array_merge($result, $testSet);
            },
            []
        );
    }
}
