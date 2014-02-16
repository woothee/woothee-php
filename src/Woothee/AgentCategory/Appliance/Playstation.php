<?php
namespace Woothee\AgentCategory\Appliance;

use Woothee\AgentCategory\AbstractCategory;
use Woothee\DataSet;

class Playstation extends AbstractCategory
{
    public static function challenge($ua, &$result)
    {
        $data = null;

        if (strpos($ua, 'PSP (PlayStation Portable);') !== false) {
            $data = DataSet::get('PSP');
        } elseif (strpos($ua, 'PlayStation Vita') !== false) {
            $data = DataSet::get('PSVita');
        } else if (strpos($ua, 'PLAYSTATION 3 ') !== false
            || strpos($ua, 'PLAYSTATION 3;') !== false) {
            $data = DataSet::get('PS3');
        } elseif (strpos($ua, 'PlayStation 4 ') !== false) {
            $data = DataSet::get('PS4');
        }

        if (is_null($data)) {
            return false;
        }

        static::updateMap($result, $data);

        return true;
    }
}
