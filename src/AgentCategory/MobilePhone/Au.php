<?php

namespace Woothee\AgentCategory\MobilePhone;

use Woothee\AgentCategory\AbstractCategory;
use Woothee\DataSet;

class Au extends AbstractCategory
{
    const VERSION_PATTERN = '/KDDI-([^- \/;\\(\\)\"\']+)/Du';

    public static function challenge($ua, &$result)
    {
        if (strpos($ua, 'KDDI-') === false) {
            return false;
        }

        $version = DataSet::VALUE_UNKNOWN;

        if (preg_match(self::VERSION_PATTERN, $ua, $matches)) {
            $version = $matches[1];
        }

        static::updateMap($result, DataSet::get('au'));
        static::updateVersion($result, $version);

        return true;
    }
}
