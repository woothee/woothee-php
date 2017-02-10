<?php

namespace Woothee\AgentCategory\Browser;

use Woothee\AgentCategory\AbstractCategory;
use Woothee\DataSet;

class Webview extends AbstractCategory
{
    public static function challenge($ua, &$result)
    {
        $version = self::extractVersion($ua) ?: DataSet::VALUE_UNKNOWN;

        // Android(Lollipop and Above)
        if (strpos($ua, 'Chrome') !== false && strpos($ua, 'wv') !== false) {
            static::updateMap($result, DataSet::get('Webview'));
            static::updateVersion($result, $version);

            return true;
        }

        // iOS
        if (strpos($ua, 'like Mac OS X') < 0) {
            return false;
        }

        if (preg_match('/iP(?:hone;|ad;|od) .*like Mac OS X/', $ua, $matches)) {
            static::updateMap($result, DataSet::get('Webview'));
            static::updateVersion($result, $version);

            return true;
        }

        return false;
    }

    private static function extractVersion($ua)
    {
        if (preg_match('#Version/([.0-9]+)#', $ua, $matches)) {
            return $matches[1];
        }
    }
}
