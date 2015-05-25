<?php

namespace Woothee\AgentCategory\Os;

use Woothee\AgentCategory\AbstractCategory;
use Woothee\AgentCategory\MobilePhone\Au;
use Woothee\AgentCategory\MobilePhone\Willcom;
use Woothee\DataSet;

class MobilePhone extends AbstractCategory
{
    public static function challenge($ua, &$result)
    {
        if (strpos($ua, 'KDDI-') !== false) {
            if (preg_match(Au::VERSION_PATTERN, $ua, $matches) === 1) {
                $term = $matches[1];
                $data = DataSet::get('au');

                static::updateCategory($result, $data[DataSet::DATASET_KEY_CATEGORY]);
                static::updateOs($result, $data[DataSet::DATASET_KEY_OS]);
                static::updateVersion($result, $term);

                return true;
            }
        }

        if (strpos($ua, 'WILLCOM') !== false || strpos($ua, 'DDIPOCKET') !== false) {
            if (preg_match(Willcom::VERSION_PATTERN, $ua, $matches) === 1) {
                $term = $matches[1];
                $data = DataSet::get('willcom');

                static::updateCategory($result, $data[DataSet::DATASET_KEY_CATEGORY]);
                static::updateOs($result, $data[DataSet::DATASET_KEY_OS]);
                static::updateVersion($result, $term);

                return true;
            }
        }

        if (strpos($ua, 'SymbianOS') !== false) {
            $data = DataSet::get('SymbianOS');

            static::updateCategory($result, $data[DataSet::DATASET_KEY_CATEGORY]);
            static::updateOs($result, $data[DataSet::DATASET_KEY_OS]);

            return true;
        }

        if (strpos($ua, 'Google Wireless Transcoder') !== false) {
            $data = DataSet::get('MobileTranscoder');

            static::updateMap($result, $data);
            static::updateVersion($result, 'Google');

            return true;
        }

        if (strpos($ua, 'Naver Transcoder') !== false) {
            $data = DataSet::get('MobileTranscoder');

            static::updateMap($result, $data);
            static::updateVersion($result, 'Naver');

            return true;
        }

        return false;
    }
}
