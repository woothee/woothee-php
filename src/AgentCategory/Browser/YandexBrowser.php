<?php

namespace Woothee\AgentCategory\Browser;

use Woothee\AgentCategory\AbstractCategory;
use Woothee\DataSet;

class YandexBrowser extends AbstractCategory
{
    public static function challenge($ua, &$result)
    {
        if (strpos($ua, 'YaBrowser/') === false) {
            return false;
        }

        $version = DataSet::VALUE_UNKNOWN;

        if (preg_match('/YaBrowser\/([.0-9]+)/Du', $ua, $matches)) {
            $version = $matches[1];
        }

        static::updateMap($result, DataSet::get('YaBrowser'));
        static::updateVersion($result, $version);

        return true;
    }
}
