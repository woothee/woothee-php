<?php

namespace Woothee\AgentCategory\Misc;

use Woothee\AgentCategory\AbstractCategory;
use Woothee\DataSet;

class DesktopTools extends AbstractCategory
{
    public static function challenge($ua, &$result)
    {
        $data = null;

        if (strpos($ua, 'AppleSyndication/') !== false) {
            $data = DataSet::get('SafariRSSReader');
        } elseif (strpos($ua, 'compatible; Google Desktop/') !== false) {
            $data = DataSet::get('GoogleDesktop');
        } elseif (strpos($ua, 'Windows-RSS-Platform') !== false) {
            $data = DataSet::get('WindowsRSSReader');
        }

        if (is_null($data)) {
            return false;
        }

        static::updateMap($result, $data);

        return true;
    }
}
