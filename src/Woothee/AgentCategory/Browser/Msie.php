<?php
namespace Woothee\AgentCategory\Browser;

use Woothee\AgentCategory\AbstractCategory;
use Woothee\DataSet;

class Msie extends AbstractCategory
{
    public static function challenge($ua, &$result)
    {
        if (strpos($ua, 'compatible; MSIE') !== false || strpos($ua, 'Trident/') !== false) {
            $version = DataSet::VALUE_UNKNOWN;

            if (preg_match('/MSIE ([.0-9]+);/', $ua, $matches) === 1) {
                $version = $matches[1];
            } elseif (preg_match('/Trident\/([.0-9]+);(?: BOIE[0-9]+;[A-Z]+;)? rv:([.0-9]+)/', $ua, $matches) === 1) {
                $version = $matches[2];
            }

            static::updateMap($result, DataSet::get('MSIE'));
            static::updateVersion($result, $version);

            return true;
        }

        return false;
    }
}
