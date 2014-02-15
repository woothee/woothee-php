<?php
namespace Woothee;

use Woothee\AgentCategory\Crawler\Crawlers;
use Woothee\AgentCategory\Crawler\Google;

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
    }
}
