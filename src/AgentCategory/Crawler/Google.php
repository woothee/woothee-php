<?php

namespace Woothee\AgentCategory\Crawler;

use Woothee\AgentCategory\AbstractCategory;
use Woothee\DataSet;

class Google extends AbstractCategory
{
    public static function challenge($ua, &$result)
    {
        if (strpos($ua, 'Google') === false) {
            return false;
        }

        if (strpos($ua, 'compatible; Googlebot') !== false) { // Googlebot or Googlebot-Mobile
            if (strpos($ua, 'compatible; Googlebot-Mobile') !== false) {
                static::updateMap($result, DataSet::get('GoogleBotMobile'));

                return true;
            } else {
                static::updateMap($result, DataSet::get('GoogleBot'));

                return true;
            }
        }

        if (strpos($ua, 'Googlebot-Image/') !== false) {
            static::updateMap($result, DataSet::get('GoogleBot'));

            return true;
        }

        if (strpos($ua, 'Mediapartners-Google') !== false) {
            if (strpos($ua, 'compatible; Mediapartners-Google') !== false || $ua === 'Mediapartners-Google') {
                static::updateMap($result, DataSet::get('GoogleMediaPartners'));

                return true;
            }
        }

        if (strpos($ua, 'Feedfetcher-Google;') !== false) {
            static::updateMap($result, DataSet::get('GoogleFeedFetcher'));

            return true;
        }

        if (strpos($ua, 'AppEngine-Google') !== false) {
            static::updateMap($result, DataSet::get('GoogleAppEngine'));

            return true;
        }

        if (strpos($ua, 'Google Web Preview') !== false) {
            static::updateMap($result, DataSet::get('GoogleWebPreview'));

            return true;
        }

        return false;
    }
}
