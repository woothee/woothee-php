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
use Woothee\AgentCategory\Browser\Webview;
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
    const VERSION = '1.1.0';

    public static function isCrawler($ua)
    {
        if (is_null($ua) || strlen($ua) < 1 || $ua === '-') {
            return false;
        }

        $result = array();

        if (static::tryCrawler($ua, $result)) {
            return true;
        }

        return false;
    }

    public static function tryCrawler($ua, &$result)
    {
        if (Google::challenge($ua, $result)) {
            return true;
        } elseif (Crawlers::challenge($ua, $result)) {
            return true;
        }

        return false;
    }

    public static function tryBrowser($ua, &$result)
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

        if (Webview::challenge($ua, $result)) {
            return true;
        }

        return false;
    }

    public static function tryOs($ua, &$result)
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

    public static function tryMobilePhone($ua, &$result)
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

    public static function tryAppliance($ua, &$result)
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

    public static function tryMisc($ua, &$result)
    {
        if (DesktopTools::challenge($ua, $result)) {
            return true;
        }

        return false;
    }

    public static function tryRareCases($ua, &$result)
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

    /**
     * @deprecated
     */
    public static function parse($ua)
    {
        return static::fillResult(static::execParse($ua));
    }

    public static function fillResult($result)
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

    public static function execParse($ua)
    {
        $result = array();

        if (is_null($ua) || strlen($ua) < 1 || $ua === '-') {
            return $result;
        }

        if (static::tryCrawler($ua, $result)) {
            return $result;
        }

        if (static::tryBrowser($ua, $result)) {
            static::tryOs($ua, $result);

            return $result;
        }

        if (static::tryMobilePhone($ua, $result)) {
            return $result;
        }

        if (static::tryAppliance($ua, $result)) {
            return $result;
        }

        if (static::tryMisc($ua, $result)) {
            return $result;
        }

        if (static::tryOs($ua, $result)) {
            return $result;
        }

        if (static::tryRareCases($ua, $result)) {
            return $result;
        }

        return false;
    }
}
