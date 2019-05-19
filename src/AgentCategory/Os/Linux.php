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
        $version = null;

        if (strpos($ua, 'Android') !== false) {
            $data = DataSet::get('Android');

            if (preg_match('/Android[- ](\\d+(?:\\.\\d+(?:\\.\\d+)?)?)/', $ua, $matches)) {
                $version = $matches[1];
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
