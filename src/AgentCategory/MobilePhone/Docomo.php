<?php

namespace Woothee\AgentCategory\MobilePhone;

use Woothee\AgentCategory\AbstractCategory;
use Woothee\DataSet;

class Docomo extends AbstractCategory
{
    public static function challenge($ua, &$result)
    {
        $pos = strpos($ua, 'DoCoMo');

        if ($pos === false) {
            $pos = strpos($ua, ';FOMA;');
        }

        if ($pos === false) { // not DoCoMo

            return false;
        }

        $version = DataSet::VALUE_UNKNOWN;

        if (preg_match('/DoCoMo\/[.0-9]+[ \/]([^- \/;\(\)"\'\]+)\']+)/Du', $ua, $matches) === 1) {
            $version = $matches[1];
        } else {
            if (preg_match('/\(([^;\)]+);FOMA;/Du', $ua, $matches)) {
                $version = $matches[1];
            }
        }

        static::updateMap($result, DataSet::get('docomo'));
        static::updateVersion($result, $version);

        return true;
    }
}
