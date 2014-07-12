<?php
namespace Woothee\AgentCategory\Os;

use Woothee\AgentCategory\AbstractCategory;
use Woothee\DataSet;

class Linux extends AbstractCategory
{
    public static function challenge($ua, &$result)
    {
        if (strpos($ua, 'Linux') === false) {
            return false;
        }

        $data = DataSet::get('Linux');

        if (strpos($ua, 'Android') !== false) {
            $data = DataSet::get('Android');
        }

        static::updateCategory($result, $data[DataSet::DATASET_KEY_CATEGORY]);
        static::updateOs($result, $data[DataSet::DATASET_KEY_NAME]);

        return true;
    }
}
