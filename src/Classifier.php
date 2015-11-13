<?php

namespace Woothee;

use Woothee\AgentCategory\Appliance;
use Woothee\AgentCategory\Browser;
use Woothee\AgentCategory\Crawler;
use Woothee\AgentCategory\Misc;
use Woothee\AgentCategory\MobilePhone;
use Woothee\AgentCategory\Os;

class Classifier
{
    const VERSION = '1.1.0';

    public function isCrawler($ua)
    {
        if (is_null($ua) || strlen($ua) < 1 || $ua === '-') {
            return false;
        }

        $result = array();

        if ($this->tryCrawler($ua, $result)) {
            return true;
        }

        return false;
    }

    public function tryCrawler($ua, &$result)
    {
        if (Crawler\Google::challenge($ua, $result)) {
            return true;
        } elseif (Crawler\Crawlers::challenge($ua, $result)) {
            return true;
        }

        return false;
    }

    public function tryBrowser($ua, &$result)
    {
        if (Browser\Msie::challenge($ua, $result)) {
            return true;
        }

        if (Browser\SafariChrome::challenge($ua, $result)) {
            return true;
        }

        if (Browser\Firefox::challenge($ua, $result)) {
            return true;
        }

        if (Browser\Opera::challenge($ua, $result)) {
            return true;
        }

        if (Browser\Webview::challenge($ua, $result)) {
            return true;
        }

        return false;
    }

    public function tryOs($ua, &$result)
    {
        if (Os\Windows::challenge($ua, $result)) {
            return true;
        }

        if (Os\Osx::challenge($ua, $result)) {
            return true;
        }

        if (Os\Linux::challenge($ua, $result)) {
            return true;
        }

        if (Os\SmartPhone::challenge($ua, $result)) {
            return true;
        }

        if (Os\MobilePhone::challenge($ua, $result)) {
            return true;
        }

        if (Os\Appliance::challenge($ua, $result)) {
            return true;
        }

        if (Os\MiscOs::challenge($ua, $result)) {
            return true;
        }

        return false;
    }

    public function tryMobilePhone($ua, &$result)
    {
        if (MobilePhone\Docomo::challenge($ua, $result)) {
            return true;
        }

        if (MobilePhone\Au::challenge($ua, $result)) {
            return true;
        }

        if (MobilePhone\Softbank::challenge($ua, $result)) {
            return true;
        }

        if (MobilePhone\Willcom::challenge($ua, $result)) {
            return true;
        }

        if (MobilePhone\MiscPhones::challenge($ua, $result)) {
            return true;
        }

        return false;
    }

    public function tryAppliance($ua, &$result)
    {
        if (Appliance\Playstation::challenge($ua, $result)) {
            return true;
        }

        if (Appliance\Nintendo::challenge($ua, $result)) {
            return true;
        }

        if (Appliance\DigitalTv::challenge($ua, $result)) {
            return true;
        }

        return false;
    }

    public function tryMisc($ua, &$result)
    {
        if (Misc\DesktopTools::challenge($ua, $result)) {
            return true;
        }

        return false;
    }

    public function tryRareCases($ua, &$result)
    {
        if (Browser\Sleipnir::challenge($ua, $result)) {
            return true;
        }

        if (Misc\HttpLibrary::challenge($ua, $result)) {
            return true;
        }

        if (Misc\MayBeRssReader::challenge($ua, $result)) {
            return true;
        }

        if (Crawler\MayBeCrawler::challenge($ua, $result)) {
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

        if (isset($result[DataSet::ATTRIBUTE_OS_VERSION]) === false) {
            $result[DataSet::ATTRIBUTE_OS_VERSION] = DataSet::VALUE_UNKNOWN;
        }

        return $result;
    }

    public function execParse($ua)
    {
        $result = array();

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

        if ($this->tryMobilePhone($ua, $result)) {
            return $result;
        }

        if ($this->tryAppliance($ua, $result)) {
            return $result;
        }

        if ($this->tryMisc($ua, $result)) {
            return $result;
        }

        if ($this->tryOs($ua, $result)) {
            return $result;
        }

        if ($this->tryRareCases($ua, $result)) {
            return $result;
        }

        return false;
    }
}
