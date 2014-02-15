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
        return $this->loadTestSetYaml(
            'pc_windows.yaml',
            'pc_misc.yaml',
            'mobilephone_docomo.yaml',
            'mobilephone_au.yaml',
            'mobilephone_softbank.yaml',
            'mobilephone_willcom.yaml',
            'mobilephone_misc.yaml',
            'smartphone_ios.yaml',
            'smartphone_android.yaml',
            'smartphone_misc.yaml',
            'appliance.yaml',
            'pc_lowpriority.yaml',
            'misc.yaml',
            'crawler_nonmajor.yaml'
        );
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
