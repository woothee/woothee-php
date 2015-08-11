<?php

namespace Woothee\AgentCategory\Os;

use Woothee\AgentCategory\AbstractCategory;
use Woothee\DataSet;

class Appliance extends AbstractCategory
{
    public static function challenge($ua, &$result)
    {
        if (strpos($ua, 'Nintendo DSi;') !== false) {
            $data = DataSet::get('NintendoDSi');

            static::updateCategory($result, $data[DataSet::DATASET_KEY_CATEGORY]);
            static::updateOs($result, $data[DataSet::DATASET_KEY_OS]);

            return true;
        }

        if (strpos($ua, 'Nintendo Wii;') !== false) {
            $data = DataSet::get('NintendoWii');

            static::updateCategory($result, $data[DataSet::DATASET_KEY_CATEGORY]);
            static::updateOs($result, $data[DataSet::DATASET_KEY_OS]);

            return true;
        }

        return false;
    }
}
