<?php

namespace Woothee\Tests;

use Symfony\Component\Yaml\Yaml;
use Woothee\Classifier;

class ClassifierTest extends TestCase
{
    /** @var Classifier */
    private $classifier;

    public function setUp()
    {
        parent::setUp();
        $this->classifier = new Classifier();
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
            'crawler_nonmajor.yaml',
            'blank.yaml'
        );
    }

    /**
     * @test
     * @dataProvider provideAllTestSet
     */
    public function testParse($param)
    {
        $expected = $param;
        unset($expected['target']);

        $result = $this->classifier->parse($param['target']);

        $this->assertSame($expected['name'], $result['name']);
        $this->assertSame($expected['category'], $result['category']);

        if (isset($expected['os'])) {
            $this->assertSame($expected['os'], $result['os']);
        }

        if (isset($expected['os_version'])) {
            $this->assertSame($expected['os_version'], $result['os_version']);
        }

        if (isset($expected['version'])) {
            $this->assertSame($expected['version'], $result['version']);
        }
    }

    public function provideAllTestSet()
    {
        return $this->loadTestSetYaml(
            'crawler.yaml',
            'crawler_google.yaml',
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
            'crawler_nonmajor.yaml',
            'blank.yaml'
        );
    }

    public function testNonMobilePhone()
    {
        $ua = 'non mobile phone';
        $result = array();
        $this->assertFalse($this->classifier->tryMobilePhone($ua, $result));
    }

    /**
     * @test
     * confirm when invalid UserAgent string
     */
    public function testNeverExistingParseResult()
    {
        $ua = 'never%existing$user&agent';
        $result = $this->classifier->parse($ua);

        $resultKeys = \Woothee\DataSet::$ATTRIBUTE_LIST;
        foreach ($resultKeys as $key) {
            $this->assertSame(\Woothee\DataSet::VALUE_UNKNOWN, $result[$key]);
        }
    }

    private function loadTestSetYaml($file)
    {
        $files = func_get_args();

        return array_reduce(
            array_map(
                function ($file) {
                    return array_map(
                        function ($testCase) {
                            return array($testCase);
                        },
                        Yaml::parse(file_get_contents('woothee/testsets/'.$file))
                    );
                },
                $files
            ),
            function ($result, $testSet) {
                return array_merge($result, $testSet);
            },
            array()
        );
    }
}
