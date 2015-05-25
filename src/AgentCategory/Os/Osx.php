<?php

namespace Woothee\AgentCategory\Os;

use Woothee\AgentCategory\AbstractCategory;
use Woothee\DataSet;

class Osx extends AbstractCategory
{
    public static function challenge($ua, &$result)
    {
        if (strpos($ua, 'Mac OS X') === false) {
            return false;
        }

        $data = DataSet::get('OSX');
        $version = null;

        if (strpos($ua, 'like Mac OS X') !== false) {
            return false;
        } else {
            if (preg_match('/Mac OS X (10[._]\\d+(?:[._]\\d+)?)(?:\\)|;)/', $ua, $matches) === 1) {
                $version = str_replace('_', '.', $matches[1]);
            }
        }

        static::updateCategory($result, $data[DataSet::DATASET_KEY_CATEGORY]);
        static::updateOs($result, $data[DataSet::DATASET_KEY_NAME]);
        if ($version) {
            static::updateOsVersion($result, $version);
        }

        return true;
    }
}
