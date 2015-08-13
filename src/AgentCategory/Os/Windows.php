<?php

namespace Woothee\AgentCategory\Os;

use Woothee\AgentCategory\AbstractCategory;
use Woothee\DataSet;

class Windows extends AbstractCategory
{
    public static function challenge($ua, &$result)
    {
        if (strpos($ua, 'Windows') === false) {
            return false;
        }

        // Xbox Series
        if (strpos($ua, 'Xbox') !== false) {
            if (strpos($ua, 'Xbox; Xbox One)') !== false) {
                $data = DataSet::get('XboxOne');
            } else {
                $data = DataSet::get('Xbox360');
            }

            static::updateMap($result, $data);

            return true;
        }

        $data = DataSet::get('Win');

        if (preg_match('/Windows ([ .a-zA-Z0-9]+)[;\\)]/', $ua, $matches) === 0) {
            static::updateCategory($result, $data[DataSet::DATASET_KEY_CATEGORY]);
            static::updateOs($result, $data[DataSet::DATASET_KEY_NAME]);

            return true;
        }

        $version = $matches[1];

        if ($version === 'NT 10.0') {
            $data = DataSet::get('Win10');
        } elseif ($version === 'NT 6.3') {
            $data = DataSet::get('Win8.1');
        } elseif ($version === 'NT 6.2') {
            $data = DataSet::get('Win8');
        } elseif ($version === 'NT 6.1') {
            $data = DataSet::get('Win7');
        } elseif ($version === 'NT 6.0') {
            $data = DataSet::get('WinVista');
        } elseif ($version === 'NT 5.1') {
            $data = DataSet::get('WinXP');
        } elseif (strpos($version, 'Phone') === 0) {
            $data = DataSet::get('WinPhone');
            if (preg_match('/Phone(?: OS)? ([.0-9]+)/', $ua, $matches) === 1) {
                $version = $matches[1];
            }
        } elseif ($version === 'NT 5.0') {
            $data = DataSet::get('Win2000');
        } elseif ($version === 'NT 4.0') {
            $data = DataSet::get('WinNT4');
        } elseif ($version === '98') {
            $data = DataSet::get('Win98');
        } elseif ($version === '95') {
            $data = DataSet::get('Win95');
        } elseif ($version === 'CE') {
            $data = DataSet::get('WinCE');
        }

        static::updateCategory($result, $data[DataSet::DATASET_KEY_CATEGORY]);
        static::updateOs($result, $data[DataSet::DATASET_KEY_NAME]);
        static::updateOsVersion($result, $version);

        return true;
    }
}
