<?php
namespace Woothee\AgentCategory\Browser;

use Woothee\AgentCategory\AbstractCategory;
use Woothee\DataSet;

class SafariChrome extends AbstractCategory
{
    public static function challenge($ua, &$result)
    {
        if (strpos($ua, 'Safari/') === false) {
            return false;
        }

        $version = DataSet::VALUE_UNKNOWN;

        $cpos = strpos($ua, 'Chrome');

        if ($cpos === false) {
            $cpos = strpos($ua, 'CrMo');
        }

        if ($cpos === false) {
            $cpos = strpos($ua, 'CriOS');
        }

        if ($cpos !== false) {
            $opos = strpos($ua, 'OPR');

            if ($opos !== false) {
                if (preg_match('/OPR\/([.0-9]+)/', $ua, $matches)) {
                    $version = $matches[1];

                    static::updateMap($result, DataSet::get('Opera'));
                    static::updateVersion($result, $version);

                    return true;
                }
            }
        }

        if (strpos($ua, 'Chrome') !== false
            || strpos($ua, 'CrMo') !== false
            || strpos($ua, 'CriOS') !== false) {
            if (preg_match('/(?:Chrome|CrMo|CriOS)\/([.0-9]+)/uD', $ua, $matches)) {
                $version = $matches[1];
            }

            static::updateMap($result, DataSet::get('Chrome'));
            static::updateVersion($result, $version);

            return true;
        }

        if (preg_match('/Version\/([.0-9]+)/uD', $ua, $matches)) {
            $version = $matches[1];
        }

        static::updateMap($result, DataSet::get('Safari'));
        static::updateVersion($result, $version);

        return true;
    }
}
