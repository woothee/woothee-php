<?php

namespace Woothee\AgentCategory\Misc;

use Woothee\AgentCategory\AbstractCategory;
use Woothee\DataSet;

class MayBeRssReader extends AbstractCategory
{
    public static function challenge($ua, &$result)
    {
        $data = null;

        if (preg_match('/rss(reader|bar|[-_ \/;\\(\\)]|[ +]*\/)/Dui', $ua, $matches) === 1
            || preg_match('/headline-reader/Dui', $ua, $matches) === 1) {
            $data = DataSet::get('VariousRSSReader');
        } elseif (strpos($ua, 'cococ/') !== false) {
            $data = DataSet::get('VariousRSSReader');
        }

        if (is_null($data)) {
            return false;
        }

        static::updateMap($result, $data);

        return true;
    }
}
