<?php

namespace Woothee\AgentCategory\Appliance;

use Woothee\AgentCategory\AbstractCategory;
use Woothee\DataSet;

class Playstation extends AbstractCategory
{
    public static function challenge($ua, &$result)
    {
        $data = null;
        $version = null;

        if (strpos($ua, 'PSP (PlayStation Portable);') !== false) {
            $data = DataSet::get('PSP');
            if (preg_match('/PSP \\(PlayStation Portable\\); ([.0-9]+)\\)/', $ua, $matches) === 1) {
                $version = $matches[1];
            }
        } elseif (strpos($ua, 'PlayStation Vita') !== false) {
            $data = DataSet::get('PSVita');
            if (preg_match('/PlayStation Vita ([.0-9]+)\\)/', $ua, $matches) === 1) {
                $version = $matches[1];
            }
        } elseif (strpos($ua, 'PLAYSTATION 3 ') !== false
            || strpos($ua, 'PLAYSTATION 3;') !== false) {
            $data = DataSet::get('PS3');
            if (preg_match('/PLAYSTATION 3;? ([.0-9]+)\\)/', $ua, $matches) === 1) {
                $version = $matches[1];
            }
        } elseif (strpos($ua, 'PlayStation 4 ') !== false) {
            $data = DataSet::get('PS4');
            if (preg_match('/PlayStation 4 ([.0-9]+)\\)/', $ua, $matches) === 1) {
                $version = $matches[1];
            }
        }

        if (is_null($data)) {
            return false;
        }

        static::updateMap($result, $data);
        if ($version) {
            static::updateOsVersion($result, $version);
        }

        return true;
    }
}
