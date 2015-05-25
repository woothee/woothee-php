<?php

namespace Woothee\AgentCategory\MobilePhone;

use Woothee\AgentCategory\AbstractCategory;
use Woothee\DataSet;

class Softbank extends AbstractCategory
{
    public static function challenge($ua, &$result)
    {
        $pos = strpos($ua, 'SoftBank');

        if ($pos === false) {
            $pos = strpos($ua, 'Vodafone');
        }

        if ($pos === false) {
            $pos = strpos($ua, 'J-PHONE');
        }

        if ($pos === false) {
            return false;
        }

        $version = DataSet::VALUE_UNKNOWN;

        if (preg_match('/(?:SoftBank|Vodafone|J-PHONE)\/[.0-9]+\/([^ \/;\\(\\)]+)/Du', $ua, $matches)) {
            $version = $matches[1];
        }

        static::updateMap($result, DataSet::get('SoftBank'));
        static::updateVersion($result, $version);

        return true;
    }
}
