<?php

namespace Woothee\AgentCategory\Browser;

use Woothee\AgentCategory\AbstractCategory;
use Woothee\DataSet;

class Opera extends AbstractCategory
{
    public static function challenge($ua, &$result)
    {
        // See \Woothee\AgentCategory\Browser\SafariChrome for new Opera (w/ blink)
        if (strpos($ua, 'Opera') === false) {
            return false;
        }

        $version = DataSet::VALUE_UNKNOWN;

        if (preg_match('/Version\/([.0-9]+)/Du', $ua, $matches)) {
            $version = $matches[1];
        } elseif (preg_match('/Opera[\/ ]([.0-9]+)/Du', $ua, $matches)) {
            $version = $matches[1];
        }

        static::updateMap($result, DataSet::get('Opera'));
        static::updateVersion($result, $version);

        return true;
    }
}
