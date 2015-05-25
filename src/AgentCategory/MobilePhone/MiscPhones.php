<?php

namespace Woothee\AgentCategory\MobilePhone;

use Woothee\AgentCategory\AbstractCategory;
use Woothee\DataSet;

class MiscPhones extends AbstractCategory
{
    public static function challenge($ua, &$result)
    {
        if (strpos($ua, 'jig browser') !== false) {
            static::updateMap($result, DataSet::get('jig'));

            if (preg_match('/jig browser[^;]+; ([^\\);]+)/Du', $ua, $matches)) {
                static::updateVersion($result, $matches[1]);
            }

            return true;
        } elseif (strpos($ua, 'emobile/') !== false
            || strpos($ua, 'OpenBrowser') !== false
            || strpos($ua, 'Browser/Obigo-Browser') !== false) {
            static::updateMap($result, DataSet::get('emobile'));

            return true;
        } elseif (strpos($ua, 'SymbianOS') !== false) {
            static::updateMap($result, DataSet::get('SymbianOS'));

            return true;
        } elseif (strpos($ua, 'Hatena-Mobile-Gateway/') !== false) {
            $data = DataSet::get('MobileTranscoder');

            static::updateMap($result, $data);
            static::updateVersion($result, 'Hatena');

            return true;
        } elseif (strpos($ua, 'livedoor-Mobile-Gateway/') !== false) {
            $data = DataSet::get('MobileTranscoder');

            static::updateMap($result, $data);
            static::updateVersion($result, 'livedoor');

            return true;
        }

        return false;
    }
}
