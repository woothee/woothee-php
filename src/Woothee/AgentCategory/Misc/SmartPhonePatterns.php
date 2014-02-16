<?php
namespace Woothee\AgentCategory\Misc;

use Woothee\AgentCategory\AbstractCategory;
use Woothee\DataSet;

class SmartPhonePatterns extends AbstractCategory
{
    public static function challenge($ua, &$result)
    {
        $data = null;

        if (strpos($ua, 'CFNetwork/') !== false) {
            $data = DataSet::get('iOS');

            static::updateCategory($result, $data[DataSet::DATASET_KEY_CATEGORY]);
            static::updateOs($result, $data[DataSet::DATASET_KEY_NAME]);

            return true;
        }

        return false;
    }
}
