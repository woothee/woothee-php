<?php

namespace Woothee\AgentCategory\Appliance;

use Woothee\AgentCategory\AbstractCategory;
use Woothee\DataSet;

class DigitalTv extends AbstractCategory
{
    public static function challenge($ua, &$result)
    {
        $data = null;

        if (strpos($ua, 'InettvBrowser/') !== false) {
            $data = DataSet::get('DigitalTV');
        }

        if (is_null($data)) {
            return false;
        }

        static::updateMap($result, $data);

        return true;
    }
}
