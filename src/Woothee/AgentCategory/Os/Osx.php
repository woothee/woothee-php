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

        if (strpos($ua, 'like Mac OS X') !== false) {
            if (strpos($ua, 'iPhone;') !== false) {
                $data = DataSet::get('iPhone');
            } elseif (strpos($ua, 'iPad') !== false) {
                $data = DataSet::get('iPad');
            } elseif (strpos($ua, 'iPod') !== false) {
                $data = DataSet::get('iPod');
            }
        }

        static::updateCategory($result, $data[DataSet::DATASET_KEY_CATEGORY]);
        static::updateOs($result, $data[DataSet::DATASET_KEY_NAME]);

        return true;
    }
}
