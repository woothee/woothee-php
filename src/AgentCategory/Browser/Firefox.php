<?php

namespace Woothee\AgentCategory\Browser;

use Woothee\AgentCategory\AbstractCategory;
use Woothee\DataSet;

class Firefox extends AbstractCategory
{
    public static function challenge($ua, &$result)
    {
        if (strpos($ua, 'Firefox/') === false) {
            return false;
        }

        $version = DataSet::VALUE_UNKNOWN;

        if (preg_match('/Firefox\/([.0-9]+)/', $ua, $matches) === 1) {
            $version = $matches[1];
        }

        static::updateMap($result, DataSet::get('Firefox'));
        static::updateVersion($result, $version);

        return true;
    }
}
