<?php

namespace Woothee\AgentCategory\Browser;

use Woothee\AgentCategory\AbstractCategory;
use Woothee\DataSet;

class Vivaldi extends AbstractCategory
{
    public static function challenge($ua, &$result)
    {
        if (strpos($ua, 'Vivaldi') === false) {
            return false;
        }

        $version = DataSet::VALUE_UNKNOWN;

        if (preg_match('/Vivaldi\/([.0-9]+)/Du', $ua, $matches)) {
            $version = $matches[1];
        }

        static::updateMap($result, DataSet::get('Vivaldi'));
        static::updateVersion($result, $version);

        return true;
    }
}
