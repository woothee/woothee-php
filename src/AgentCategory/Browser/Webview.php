<?php

namespace Woothee\AgentCategory\Browser;

use Woothee\AgentCategory\AbstractCategory;
use Woothee\DataSet;

class Webview extends AbstractCategory
{
    public static function challenge($ua, &$result)
    {
        if (strpos($ua, 'like Mac OS X') < 0) {
            return false;
        }

        $version = DataSet::VALUE_UNKNOWN;

        if (preg_match('/iP(?:hone;|ad;|od) .*like Mac OS X/', $ua, $matches)) {
            if (preg_match('#Version/([.0-9]+)#', $ua, $matches)) {
                $version = $matches[1];
            }

            static::updateMap($result, DataSet::get('Webview'));
            static::updateVersion($result, $version);

            return true;
        }

        return false;
    }
}
