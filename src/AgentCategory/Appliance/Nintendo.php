<?php

namespace Woothee\AgentCategory\Appliance;

use Woothee\AgentCategory\AbstractCategory;
use Woothee\DataSet;

class Nintendo extends AbstractCategory
{
    public static function challenge($ua, &$result)
    {
        $data = null;

        if (strpos($ua, 'Nintendo 3DS;') !== false) {
            $data = DataSet::get('Nintendo3DS');
        } elseif (strpos($ua, 'Nintendo DSi;') !== false) {
            $data = DataSet::get('NintendoDSi');
        } elseif (strpos($ua, 'Nintendo Wii;') !== false) {
            $data = DataSet::get('NintendoWii');
        } elseif (strpos($ua, '(Nintendo WiiU)') !== false) {
            $data = DataSet::get('NintendoWiiU');
        }

        if (is_null($data)) {
            return false;
        }

        static::updateMap($result, $data);

        return true;
    }
}
