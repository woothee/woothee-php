<?php
namespace Woothee;

use Woothee\AgentCategory\Browser\Firefox;
use Woothee\AgentCategory\Browser\Msie;
use Woothee\AgentCategory\Browser\Opera;
use Woothee\AgentCategory\Browser\SafariChrome;
use Woothee\AgentCategory\Crawler\Crawlers;
use Woothee\AgentCategory\Crawler\Google;
use Woothee\AgentCategory\Os\Linux;
use Woothee\AgentCategory\Os\Osx;
use Woothee\AgentCategory\Os\SmartPhone;
use Woothee\AgentCategory\Os\Windows;

class Classifier
{
    public function isCrawler($ua)
    {
        if (is_null($ua) || strlen($ua) < 1 || $ua === '-') {
            return false;
        }

        $result = [];

        if ($this->tryCrawler($ua, $result)) {
            return true;
        }

        return false;
    }

    public function tryCrawler($ua, &$result)
    {
        if (Google::challenge($ua, $result)) {
            return true;
        } elseif (Crawlers::challenge($ua, $result)) {
            return true;
        }

        return false;
    }

    public function tryBrowser($ua, &$result)
    {
        if (Msie::challenge($ua, $result)) {
            return true;
        }

        if (SafariChrome::challenge($ua, $result)) {
            return true;
        }

        if (Firefox::challenge($ua, $result)) {
            return true;
        }

        if (Opera::challenge($ua, $result)) {
            return true;
        }

        return false;
    }

    public function tryOs($ua, &$result)
    {
        if (Windows::challenge($ua, $result)) {
            return true;
        }

        if (Osx::challenge($ua, $result)) {
            return true;
        }

        if (Linux::challenge($ua, $result)) {
            return true;
        }

        if (SmartPhone::challenge($ua, $result)) {
            return true;
        }
    }

    public function parse($ua)
    {
        return $this->fillResult($this->execParse($ua));
    }

    private function fillResult($result)
    {
        if (isset($result[DataSet::ATTRIBUTE_NAME]) === false) {
          $result[DataSet::ATTRIBUTE_NAME] = DataSet::VALUE_UNKNOWN;
        }

        if (isset($result[DataSet::ATTRIBUTE_CATEGORY]) === false) {
            $result[DataSet::ATTRIBUTE_CATEGORY] = DataSet::VALUE_UNKNOWN;
        }

        if (isset($result[DataSet::ATTRIBUTE_OS]) === false) {
            $result[DataSet::ATTRIBUTE_OS] = DataSet::VALUE_UNKNOWN;
        }

        if (isset($result[DataSet::ATTRIBUTE_VERSION]) === false) {
            $result[DataSet::ATTRIBUTE_VERSION] = DataSet::VALUE_UNKNOWN;
        }

        if (isset($result[DataSet::ATTRIBUTE_VENDOR]) === false) {
            $result[DataSet::ATTRIBUTE_VENDOR] = DataSet::VALUE_UNKNOWN;
        }

        return $result;
    }

    public function execParse($ua)
    {
        $result = [];

        if (is_null($ua) || strlen($ua) < 1 || $ua === '-') {
            return $result;
        }

        if ($this->tryCrawler($ua, $result)) {
            return $result;
        }

        if ($this->tryBrowser($ua, $result)) {
            $this->tryOs($ua, $result);

            return $result;
        }
    }
}
