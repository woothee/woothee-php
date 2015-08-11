<?php

namespace Woothee\AgentCategory\MobilePhone;

use Woothee\AgentCategory\AbstractCategory;
use Woothee\DataSet;

class Willcom extends AbstractCategory
{
    const VERSION_PATTERN = '/(?:WILLCOM|DDIPOCKET);[^\/]+\/([^ \/;\\(\\)]+)/Du';

    public static function challenge($ua, &$result)
    {
        $pos = strpos($ua, 'WILLCOM');

        if ($pos === false) {
            $pos = strpos($ua, 'DDIPOCKET');
        }

        if ($pos === false) {
            return false;
        }

        $version = DataSet::VALUE_UNKNOWN;

        if (preg_match(self::VERSION_PATTERN, $ua, $matches)) {
            $version = $matches[1];
        }

        static::updateMap($result, DataSet::get('willcom'));
        static::updateVersion($result, $version);

        return true;
    }
}
