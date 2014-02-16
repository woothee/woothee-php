<?php
namespace Woothee\AgentCategory\Os;

use Woothee\AgentCategory\AbstractCategory;
use Woothee\DataSet;

class SmartPhone extends AbstractCategory
{
    public static function challenge($ua, &$result)
    {
        $data = null;

        if (strpos($ua, 'iPhone') !== false) {
            $data = DataSet::get('iPhone');
        } elseif (strpos($ua, 'iPad')) {
            $data = DataSet::get('iPad');
        } elseif (strpos($ua, 'iPod')) {
            $data = DataSet::get('iPod');
        } elseif (strpos($ua, 'Android')) {
            $data = DataSet::get('Android');
        } elseif (strpos($ua, 'CFNetwork')) {
            $data = DataSet::get('iOS');
        } elseif (strpos($ua, 'BlackBerry')) {
            $data = DataSet::get('BlackBerry');
        }

        if (isset($result[DataSet::DATASET_KEY_NAME])
            && $result[DataSet::DATASET_KEY_NAME] === 'Firefox') {
            if (preg_match('/^Mozilla\/[.0-9]+ \\(Mobile;(.*;)? rv:[.0-9]+\\) Gecko\/[.0-9]+ Firefox\/[.0-9]+$/Du', $ua) === 1) {
                $data = DataSet::get('FirefoxOS');
            }
        }

        if (is_null($data)) {
            return false;
        }

        static::updateCategory($result, $data[DataSet::DATASET_KEY_CATEGORY]);
        static::updateOs($result, $data[DataSet::DATASET_KEY_NAME]);

        return true;
    }
}
