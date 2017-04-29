<?php

namespace Woothee\AgentCategory\Crawler;

use Woothee\AgentCategory\AbstractCategory;
use Woothee\DataSet;

class Crawlers extends AbstractCategory
{
    public static function challenge($ua, &$result)
    {
        if (strpos($ua, 'Yahoo') !== false
            || strpos($ua, 'help.yahoo.co.jp/help/jp/') !== false
            || strpos($ua, 'listing.yahoo.co.jp/support/faq/') !== false) {
            if (strpos($ua, 'compatible; Yahoo! Slurp') !== false) {
                static::updateMap($result, DataSet::get('YahooSlurp'));

                return true;
            } elseif (strpos($ua, 'YahooFeedSeekerJp') !== false
                || strpos($ua, 'YahooFeedSeekerBetaJp') !== false) {
                static::updateMap($result, DataSet::get('YahooJP'));

                return true;
            } elseif (strpos($ua, 'Y!J-BRZ/YATSHA crawler') !== false || strpos($ua, 'Y!J-BRY/YATSH crawler')) {
                static::updateMap($result, DataSet::get('YahooJP'));

                return true;
            } elseif (strpos($ua, 'crawler (http://listing.yahoo.co.jp/support/faq/') !== false
                || strpos($ua, 'crawler (http://help.yahoo.co.jp/help/jp/') !== false) {
                static::updateMap($result, DataSet::get('YahooJP'));

                return true;
            } elseif (strpos($ua, 'Yahoo Pipes') !== false) {
                static::updateMap($result, DataSet::get('YahooPipes'));

                return true;
            }
        } elseif (strpos($ua, 'msnbot') !== false) {
            static::updateMap($result, DataSet::get('msnbot'));

            return true;
        } elseif (strpos($ua, 'bingbot') !== false) {
            if (strpos($ua, 'compatible; bingbot') !== false) {
                static::updateMap($result, DataSet::get('bingbot'));

                return true;
            }
        } elseif (strpos($ua, 'BingPreview') !== false) {
            static::updateMap($result, DataSet::get('BingPreview'));

            return true;
        } elseif (strpos($ua, 'Baidu') !== false) {
            if (strpos($ua, 'compatible; Baiduspider') !== false || strpos($ua, 'Baiduspider+') !== false || strpos($ua, 'Baiduspider-image+') !== false) {
                static::updateMap($result, DataSet::get('Baiduspider'));

                return true;
            }
        } elseif (strpos($ua, 'Yeti') !== false) {
            if (strpos($ua, 'http://help.naver.com/robots') !== false || strpos($ua, 'http://help.naver.com/support/robots.html') !== false || strpos($ua, 'http://naver.me/bot') !== false) {
                static::updateMap($result, DataSet::get('Yeti'));

                return true;
            }
        } elseif (strpos($ua, 'FeedBurner/') !== false) {
            static::updateMap($result, DataSet::get('FeedBurner'));

            return true;
        } elseif (strpos($ua, 'facebookexternalhit') !== false) {
            static::updateMap($result, DataSet::get('facebook'));

            return true;
        } elseif (strpos($ua, 'Twitterbot/') !== false) {
            static::updateMap($result, DataSet::get('twitter'));

            return true;
        } elseif (strpos($ua, 'ichiro') !== false) {
            if (strpos($ua, 'http://help.goo.ne.jp/door/crawler.html') !== false || strpos($ua, 'compatible; ichiro/mobile goo;') !== false) {
                static::updateMap($result, DataSet::get('goo'));

                return true;
            }
        } elseif (strpos($ua, 'gooblogsearch/') !== false) {
            static::updateMap($result, DataSet::get('goo'));

            return true;
        } elseif (strpos($ua, 'Apple-PubSub') !== false) {
            static::updateMap($result, DataSet::get('ApplePubSub'));

            return true;
        } elseif (strpos($ua, '(www.radian6.com/crawler)') !== false) {
            static::updateMap($result, DataSet::get('radian6'));

            return true;
        } elseif (strpos($ua, 'Genieo/') !== false) {
            static::updateMap($result, DataSet::get('Genieo'));

            return true;
        } elseif (strpos($ua, 'labs.topsy.com/butterfly/') !== false) {
            static::updateMap($result, DataSet::get('topsyButterfly'));

            return true;
        } elseif (strpos($ua, 'rogerbot/1.0 (http://www.seomoz.org/dp/rogerbot') !== false) {
            static::updateMap($result, DataSet::get('rogerbot'));

            return true;
        } elseif (strpos($ua, 'compatible; AhrefsBot/') !== false) {
            static::updateMap($result, DataSet::get('AhrefsBot'));

            return true;
        } elseif (strpos($ua, 'livedoor FeedFetcher') !== false || strpos($ua, 'Fastladder FeedFetcher') !== false) {
            static::updateMap($result, DataSet::get('livedoorFeedFetcher'));

            return true;
        } elseif (strpos($ua, 'Hatena ') !== false) {
            if (strpos($ua, 'Hatena Antenna') !== false || strpos($ua, 'Hatena Pagetitle Agent') !== false || strpos($ua, 'Hatena Diary RSS') !== false) {
                static::updateMap($result, DataSet::get('Hatena'));

                return true;
            }
        } elseif (strpos($ua, 'mixi-check') !== false || strpos($ua, 'mixi-crawler') !== false || strpos($ua, 'mixi-news-crawler') !== false) {
            static::updateMap($result, DataSet::get('mixi'));

            return true;
        } elseif (strpos($ua, 'Indy Library') !== false) {
            if (strpos($ua, 'compatible; Indy Library') !== false) {
                static::updateMap($result, DataSet::get('IndyLibrary'));

                return true;
            }
        } elseif (strpos($ua, 'trendictionbot') !== false) {
            static::updateMap($result, DataSet::get('trendictionbot'));

            return true;
        }

        return false;
    }
}
