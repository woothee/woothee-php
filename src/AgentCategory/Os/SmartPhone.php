<?php

namespace Woothee\AgentCategory\Os;

use Woothee\AgentCategory\AbstractCategory;
use Woothee\DataSet;

class SmartPhone extends AbstractCategory
{
    public static function challenge($ua, &$result)
    {
        $data = null;
        $version = null;

        if (strpos($ua, 'iPod') !== false) {
            $data = DataSet::get('iPod');
            $version = static::parseIosVersion($ua);
        } elseif (strpos($ua, 'iPad') !== false) {
            $data = DataSet::get('iPad');
            $version = static::parseIosVersion($ua);
        } elseif (strpos($ua, 'iPhone') !== false) {
            $data = DataSet::get('iPhone');
            $version = static::parseIosVersion($ua);
        } elseif (strpos($ua, 'Android') !== false) {
            $data = DataSet::get('Android');
        } elseif (strpos($ua, 'CFNetwork') !== false) {
            $data = DataSet::get('iOS');
        } elseif (strpos($ua, 'BB10') !== false) {
            $data = DataSet::get('BlackBerry10');
            if (preg_match('#BB10(?:.+)Version/([.0-9]+)#', $ua, $matches)) {
                $version = $matches[1];
            }
        } elseif (strpos($ua, 'BlackBerry') !== false) {
            $data = DataSet::get('BlackBerry');
            if (preg_match('/BlackBerry(?:\\d+)\/([.0-9]+) /', $ua, $matches) === 1) {
                $version = $matches[1];
            }
        }

        if (isset($result[DataSet::DATASET_KEY_NAME])
            && $result[DataSet::DATASET_KEY_NAME] === 'Firefox') {
            if (preg_match('/^Mozilla\/[.0-9]+ \\((?:Mobile|Tablet);(?:.*;)? rv:([.0-9]+)\\) Gecko\/[.0-9]+ Firefox\/[.0-9]+$/', $ua, $matches) === 1) {
                $data = DataSet::get('FirefoxOS');
                $version = $matches[1];
            }
        }

        if (is_null($data)) {
            return false;
        }

        static::updateCategory($result, $data[DataSet::DATASET_KEY_CATEGORY]);
        static::updateOs($result, $data[DataSet::DATASET_KEY_NAME]);
        if ($version) {
            static::updateOsVersion($result, $version);
        }

        return true;
    }

    private static function parseIosVersion($ua)
    {
        if (preg_match('/; CPU(?: iPhone)? OS (\\d+_\\d+(?:_\\d+)?) like Mac OS X/', $ua, $matches) === 1) {
            return str_replace('_', '.', $matches[1]);
        }
    }
}
