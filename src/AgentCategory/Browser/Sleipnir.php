<?php

namespace Woothee\AgentCategory\Browser;

use Woothee\AgentCategory\AbstractCategory;
use Woothee\DataSet;

class Sleipnir extends AbstractCategory
{
    public static function challenge($ua, &$result)
    {
        if (strpos($ua, 'Sleipnir/') === false) {
            return false;
        }

        $version = DataSet::VALUE_UNKNOWN;

        if (preg_match('/Sleipnir\/([.0-9]+)/Du', $ua, $matches)) {
            $version = $matches[1];
        }

        static::updateMap($result, DataSet::get('Sleipnir'));
        static::updateVersion($result, $version);

        $win = DataSet::get('Win');

        static::updateCategory($result, $win[DataSet::DATASET_KEY_CATEGORY]);
        static::updateOs($result, $win[DataSet::DATASET_KEY_NAME]);

        return true;
    }
}
