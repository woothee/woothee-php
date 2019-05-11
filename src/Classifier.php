<?php

namespace Woothee;

use Woothee\AgentCategory\Appliance\DigitalTv;
use Woothee\AgentCategory\Appliance\Nintendo;
use Woothee\AgentCategory\Appliance\Playstation;
use Woothee\AgentCategory\Browser\Firefox;
use Woothee\AgentCategory\Browser\Msie;
use Woothee\AgentCategory\Browser\Opera;
use Woothee\AgentCategory\Browser\SafariChrome;
use Woothee\AgentCategory\Browser\Sleipnir;
use Woothee\AgentCategory\Browser\Vivaldi;
use Woothee\AgentCategory\Browser\Webview;
use Woothee\AgentCategory\Browser\YandexBrowser;
use Woothee\AgentCategory\Crawler\Crawlers;
use Woothee\AgentCategory\Crawler\Google;
use Woothee\AgentCategory\Crawler\MayBeCrawler;
use Woothee\AgentCategory\Misc\DesktopTools;
use Woothee\AgentCategory\Misc\HttpLibrary;
use Woothee\AgentCategory\Misc\MayBeRssReader;
use Woothee\AgentCategory\MobilePhone\Au;
use Woothee\AgentCategory\MobilePhone\Docomo;
use Woothee\AgentCategory\MobilePhone\MiscPhones;
use Woothee\AgentCategory\MobilePhone\Softbank;
use Woothee\AgentCategory\MobilePhone\Willcom;
use Woothee\AgentCategory\Os\Appliance;
use Woothee\AgentCategory\Os\Linux;
use Woothee\AgentCategory\Os\MiscOs;
use Woothee\AgentCategory\Os\MobilePhone;
use Woothee\AgentCategory\Os\Osx;
use Woothee\AgentCategory\Os\SmartPhone;
use Woothee\AgentCategory\Os\Windows;

class Classifier
{
    const VERSION = '1.10.0';

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

        if (Vivaldi::challenge($ua, $result)) {
            return true;
        }

        if (YandexBrowser::challenge($ua, $result)) {
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

        if (Webview::challenge($ua, $result)) {
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

        if (MobilePhone::challenge($ua, $result)) {
            return true;
        }

        if (Appliance::challenge($ua, $result)) {
            return true;
        }

        if (MiscOs::challenge($ua, $result)) {
            return true;
        }

        return false;
    }

    public function tryMobilePhone($ua, &$result)
    {
        if (Docomo::challenge($ua, $result)) {
            return true;
        }

        if (Au::challenge($ua, $result)) {
            return true;
        }

        if (Softbank::challenge($ua, $result)) {
            return true;
        }

        if (Willcom::challenge($ua, $result)) {
            return true;
        }

        if (MiscPhones::challenge($ua, $result)) {
            return true;
        }

        return false;
    }

    public function tryAppliance($ua, &$result)
    {
        if (Playstation::challenge($ua, $result)) {
            return true;
        }

        if (Nintendo::challenge($ua, $result)) {
            return true;
        }

        if (DigitalTv::challenge($ua, $result)) {
            return true;
        }

        return false;
    }

    public function tryMisc($ua, &$result)
    {
        if (DesktopTools::challenge($ua, $result)) {
            return true;
        }

        return false;
    }

    public function tryRareCases($ua, &$result)
    {
        if (Sleipnir::challenge($ua, $result)) {
            return true;
        }

        if (HttpLibrary::challenge($ua, $result)) {
            return true;
        }

        if (MayBeRssReader::challenge($ua, $result)) {
            return true;
        }

        if (MayBeCrawler::challenge($ua, $result)) {
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
