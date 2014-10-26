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
            if (strpos($ua, 'iPhone;') !== false) {
                $data = DataSet::get('iPhone');
            } elseif (strpos($ua, 'iPad') !== false) {
                $data = DataSet::get('iPad');
            } elseif (strpos($ua, 'iPod') !== false) {
                $data = DataSet::get('iPod');
            }

            if (preg_match('/; CPU(?: iPhone)? OS (\\d+_\\d+(?:_\\d+)?) like Mac OS X/', $ua, $matches) === 1) {
                $version = str_replace('_', '.', $matches[1]);
            }
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
