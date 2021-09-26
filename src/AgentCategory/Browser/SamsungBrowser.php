<?php

namespace Woothee\AgentCategory\Browser;

use Woothee\AgentCategory\AbstractCategory;
use Woothee\DataSet;

class SamsungBrowser extends AbstractCategory
{
    public static function challenge($ua, &$result)
    {
        if (strpos($ua, 'SamsungBrowser/') === false) {
            return false;
        }

        $version = DataSet::VALUE_UNKNOWN;

        if (preg_match('/SamsungBrowser\/([.0-9]+)/Du', $ua, $matches)) {
            $version = $matches[1];
        }

        static::updateMap($result, DataSet::get('SamsungBrowser'));
        static::updateVersion($result, $version);

        return true;
    }
}
