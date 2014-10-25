<?php
namespace Woothee\AgentCategory\Os;

use Woothee\AgentCategory\AbstractCategory;
use Woothee\DataSet;

class MiscOs extends AbstractCategory
{
    public static function challenge($ua, &$result)
    {
        $data = null;
        $os_version = null;

        if (strpos($ua, '(Win98;') > -1) {
            $data = DataSet::get('Win98');
            $os_version = "98";
        } elseif (strpos($ua, 'Macintosh; U; PPC;') > -1 || strpos($ua, 'Mac_PowerPC') > -1) {
            $data = DataSet::get('MacOS');
        } elseif (strpos($ua, 'X11; FreeBSD ') > -1) {
            $data = DataSet::get('BSD');
        } elseif (strpos($ua, 'X11; CrOS ') > -1) {
            $data = DataSet::get('ChromeOS');
        }

        if ($data) {
            static::updateCategory($result, $data[DataSet::DATASET_KEY_CATEGORY]);
            static::updateOs($result, $data[DataSet::DATASET_KEY_NAME]);
            if ($os_version) {
                static::updateOsVersion($result, $os_version);
            }

            return true;
        }

        return false;
    }
}
