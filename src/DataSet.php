<?php
namespace Woothee;

// GENERATED from dataset.yml at Sun Jul 22 02:46:33 JST 2018 by tell_k
class DataSet
{
    const DATASET_KEY_LABEL            = 'label';
    const DATASET_KEY_NAME             = 'name';
    const DATASET_KEY_TYPE             = 'type';
    const DATASET_KEY_CATEGORY         = 'category';
    const DATASET_KEY_OS               = 'os';
    const DATASET_KEY_OS_VERSION       = 'os_version';
    const DATASET_KEY_VENDOR           = 'vendor';
    const DATASET_KEY_VERSION          = 'version';

    const DATASET_TYPE_BROWSER         = 'browser';
    const DATASET_TYPE_OS              = 'os';
    const DATASET_TYPE_FULL            = 'full';

    const DATASET_CATEGORY_PC          = 'pc';
    const DATASET_CATEGORY_SMARTPHONE  = 'smartphone';
    const DATASET_CATEGORY_MOBILEPHONE = 'mobilephone';
    const DATASET_CATEGORY_CRAWLER     = 'crawler';
    const DATASET_CATEGORY_APPLIANCE   = 'appliance';
    const DATASET_CATEGORY_MISC        = 'misc';

    const ATTRIBUTE_NAME               = 'name';
    const ATTRIBUTE_CATEGORY           = 'category';
    const ATTRIBUTE_OS                 = 'os';
    const ATTRIBUTE_OS_VERSION         = 'os_version';
    const ATTRIBUTE_VENDOR             = 'vendor';
    const ATTRIBUTE_VERSION            = 'version';
    const VALUE_UNKNOWN                = 'UNKNOWN';

    public static $CATEGORY_LIST = array(
        self::DATASET_CATEGORY_PC,
        self::DATASET_CATEGORY_SMARTPHONE,
        self::DATASET_CATEGORY_MOBILEPHONE,
        self::DATASET_CATEGORY_CRAWLER,
        self::DATASET_CATEGORY_APPLIANCE,
        self::DATASET_CATEGORY_MISC,
        self::VALUE_UNKNOWN,
    );

    public static $ATTRIBUTE_LIST = array(
        self::ATTRIBUTE_NAME,
        self::ATTRIBUTE_CATEGORY,
        self::ATTRIBUTE_OS,
        self::ATTRIBUTE_OS_VERSION,
        self::ATTRIBUTE_VENDOR,
        self::ATTRIBUTE_VERSION,
    );

    private static $dataset = array(
        'MSIE' => array(
            'label'    => 'MSIE',
            'name'     => 'Internet Explorer',
            'type'     => 'browser',
            'vendor'   => 'Microsoft',
        ),
        'Edge' => array(
            'label'    => 'Edge',
            'name'     => 'Edge',
            'type'     => 'browser',
            'vendor'   => 'Microsoft',
        ),
        'Chrome' => array(
            'label'    => 'Chrome',
            'name'     => 'Chrome',
            'type'     => 'browser',
            'vendor'   => 'Google',
        ),
        'Safari' => array(
            'label'    => 'Safari',
            'name'     => 'Safari',
            'type'     => 'browser',
            'vendor'   => 'Apple',
        ),
        'Firefox' => array(
            'label'    => 'Firefox',
            'name'     => 'Firefox',
            'type'     => 'browser',
            'vendor'   => 'Mozilla',
        ),
        'Opera' => array(
            'label'    => 'Opera',
            'name'     => 'Opera',
            'type'     => 'browser',
            'vendor'   => 'Opera',
        ),
        'Vivaldi' => array(
            'label'    => 'Vivaldi',
            'name'     => 'Vivaldi',
            'type'     => 'browser',
            'vendor'   => 'Vivaldi Technologies',
        ),
        'Sleipnir' => array(
            'label'    => 'Sleipnir',
            'name'     => 'Sleipnir',
            'type'     => 'browser',
            'vendor'   => 'Fenrir Inc.',
        ),
        'Webview' => array(
            'label'    => 'Webview',
            'name'     => 'Webview',
            'type'     => 'browser',
            'vendor'   => 'OS vendor',
        ),
        'YaBrowser' => array(
            'label'    => 'YaBrowser',
            'name'     => 'Yandex Browser',
            'type'     => 'browser',
            'vendor'   => 'Yandex',
        ),
        'Win' => array(
            'label'    => 'Win',
            'name'     => 'Windows UNKNOWN Ver',
            'type'     => 'os',
            'category' => 'pc',
        ),
        'Win10' => array(
            'label'    => 'Win10',
            'name'     => 'Windows 10',
            'type'     => 'os',
            'category' => 'pc',
        ),
        'Win8.1' => array(
            'label'    => 'Win8.1',
            'name'     => 'Windows 8.1',
            'type'     => 'os',
            'category' => 'pc',
        ),
        'Win8' => array(
            'label'    => 'Win8',
            'name'     => 'Windows 8',
            'type'     => 'os',
            'category' => 'pc',
        ),
        'Win7' => array(
            'label'    => 'Win7',
            'name'     => 'Windows 7',
            'type'     => 'os',
            'category' => 'pc',
        ),
        'WinVista' => array(
            'label'    => 'WinVista',
            'name'     => 'Windows Vista',
            'type'     => 'os',
            'category' => 'pc',
        ),
        'WinXP' => array(
            'label'    => 'WinXP',
            'name'     => 'Windows XP',
            'type'     => 'os',
            'category' => 'pc',
        ),
        'Win2000' => array(
            'label'    => 'Win2000',
            'name'     => 'Windows 2000',
            'type'     => 'os',
            'category' => 'pc',
        ),
        'WinNT4' => array(
            'label'    => 'WinNT4',
            'name'     => 'Windows NT 4.0',
            'type'     => 'os',
            'category' => 'pc',
        ),
        'WinMe' => array(
            'label'    => 'WinMe',
            'name'     => 'Windows Me',
            'type'     => 'os',
            'category' => 'pc',
        ),
        'Win98' => array(
            'label'    => 'Win98',
            'name'     => 'Windows 98',
            'type'     => 'os',
            'category' => 'pc',
        ),
        'Win95' => array(
            'label'    => 'Win95',
            'name'     => 'Windows 95',
            'type'     => 'os',
            'category' => 'pc',
        ),
        'WinPhone' => array(
            'label'    => 'WinPhone',
            'name'     => 'Windows Phone OS',
            'type'     => 'os',
            'category' => 'smartphone',
        ),
        'WinCE' => array(
            'label'    => 'WinCE',
            'name'     => 'Windows CE',
            'type'     => 'os',
            'category' => 'smartphone',
        ),
        'OSX' => array(
            'label'    => 'OSX',
            'name'     => 'Mac OSX',
            'type'     => 'os',
            'category' => 'pc',
        ),
        'MacOS' => array(
            'label'    => 'MacOS',
            'name'     => 'Mac OS Classic',
            'type'     => 'os',
            'category' => 'pc',
        ),
        'Linux' => array(
            'label'    => 'Linux',
            'name'     => 'Linux',
            'type'     => 'os',
            'category' => 'pc',
        ),
        'BSD' => array(
            'label'    => 'BSD',
            'name'     => 'BSD',
            'type'     => 'os',
            'category' => 'pc',
        ),
        'ChromeOS' => array(
            'label'    => 'ChromeOS',
            'name'     => 'ChromeOS',
            'type'     => 'os',
            'category' => 'pc',
        ),
        'Android' => array(
            'label'    => 'Android',
            'name'     => 'Android',
            'type'     => 'os',
            'category' => 'smartphone',
        ),
        'iPhone' => array(
            'label'    => 'iPhone',
            'name'     => 'iPhone',
            'type'     => 'os',
            'category' => 'smartphone',
        ),
        'iPad' => array(
            'label'    => 'iPad',
            'name'     => 'iPad',
            'type'     => 'os',
            'category' => 'smartphone',
        ),
        'iPod' => array(
            'label'    => 'iPod',
            'name'     => 'iPod',
            'type'     => 'os',
            'category' => 'smartphone',
        ),
        'iOS' => array(
            'label'    => 'iOS',
            'name'     => 'iOS',
            'type'     => 'os',
            'category' => 'smartphone',
        ),
        'FirefoxOS' => array(
            'label'    => 'FirefoxOS',
            'name'     => 'Firefox OS',
            'type'     => 'os',
            'category' => 'smartphone',
        ),
        'BlackBerry' => array(
            'label'    => 'BlackBerry',
            'name'     => 'BlackBerry',
            'type'     => 'os',
            'category' => 'smartphone',
        ),
        'BlackBerry10' => array(
            'label'    => 'BlackBerry10',
            'name'     => 'BlackBerry 10',
            'type'     => 'os',
            'category' => 'smartphone',
        ),
        'docomo' => array(
            'label'    => 'docomo',
            'name'     => 'docomo',
            'type'     => 'full',
            'os'       => 'docomo',
            'category' => 'mobilephone',
            'vendor'   => 'docomo',
        ),
        'au' => array(
            'label'    => 'au',
            'name'     => 'au by KDDI',
            'type'     => 'full',
            'os'       => 'au',
            'category' => 'mobilephone',
            'vendor'   => 'au',
        ),
        'SoftBank' => array(
            'label'    => 'SoftBank',
            'name'     => 'SoftBank Mobile',
            'type'     => 'full',
            'os'       => 'SoftBank',
            'category' => 'mobilephone',
            'vendor'   => 'SoftBank',
        ),
        'willcom' => array(
            'label'    => 'willcom',
            'name'     => 'WILLCOM',
            'type'     => 'full',
            'os'       => 'WILLCOM',
            'category' => 'mobilephone',
            'vendor'   => 'WILLCOM',
        ),
        'jig' => array(
            'label'    => 'jig',
            'name'     => 'jig browser',
            'type'     => 'full',
            'os'       => 'jig',
            'category' => 'mobilephone',
        ),
        'emobile' => array(
            'label'    => 'emobile',
            'name'     => 'emobile',
            'type'     => 'full',
            'os'       => 'emobile',
            'category' => 'mobilephone',
        ),
        'SymbianOS' => array(
            'label'    => 'SymbianOS',
            'name'     => 'SymbianOS',
            'type'     => 'full',
            'os'       => 'SymbianOS',
            'category' => 'mobilephone',
        ),
        'MobileTranscoder' => array(
            'label'    => 'MobileTranscoder',
            'name'     => 'Mobile Transcoder',
            'type'     => 'full',
            'os'       => 'Mobile Transcoder',
            'category' => 'mobilephone',
        ),
        'Nintendo3DS' => array(
            'label'    => 'Nintendo3DS',
            'name'     => 'Nintendo 3DS',
            'type'     => 'full',
            'os'       => 'Nintendo 3DS',
            'category' => 'appliance',
            'vendor'   => 'Nintendo',
        ),
        'NintendoDSi' => array(
            'label'    => 'NintendoDSi',
            'name'     => 'Nintendo DSi',
            'type'     => 'full',
            'os'       => 'Nintendo DSi',
            'category' => 'appliance',
            'vendor'   => 'Nintendo',
        ),
        'NintendoWii' => array(
            'label'    => 'NintendoWii',
            'name'     => 'Nintendo Wii',
            'type'     => 'full',
            'os'       => 'Nintendo Wii',
            'category' => 'appliance',
            'vendor'   => 'Nintendo',
        ),
        'NintendoWiiU' => array(
            'label'    => 'NintendoWiiU',
            'name'     => 'Nintendo Wii U',
            'type'     => 'full',
            'os'       => 'Nintendo Wii U',
            'category' => 'appliance',
            'vendor'   => 'Nintendo',
        ),
        'PSP' => array(
            'label'    => 'PSP',
            'name'     => 'PlayStation Portable',
            'type'     => 'full',
            'os'       => 'PlayStation Portable',
            'category' => 'appliance',
            'vendor'   => 'Sony',
        ),
        'PSVita' => array(
            'label'    => 'PSVita',
            'name'     => 'PlayStation Vita',
            'type'     => 'full',
            'os'       => 'PlayStation Vita',
            'category' => 'appliance',
            'vendor'   => 'Sony',
        ),
        'PS3' => array(
            'label'    => 'PS3',
            'name'     => 'PlayStation 3',
            'type'     => 'full',
            'os'       => 'PlayStation 3',
            'category' => 'appliance',
            'vendor'   => 'Sony',
        ),
        'PS4' => array(
            'label'    => 'PS4',
            'name'     => 'PlayStation 4',
            'type'     => 'full',
            'os'       => 'PlayStation 4',
            'category' => 'appliance',
            'vendor'   => 'Sony',
        ),
        'Xbox360' => array(
            'label'    => 'Xbox360',
            'name'     => 'Xbox 360',
            'type'     => 'full',
            'os'       => 'Xbox 360',
            'category' => 'appliance',
            'vendor'   => 'Microsoft',
        ),
        'XboxOne' => array(
            'label'    => 'XboxOne',
            'name'     => 'Xbox One',
            'type'     => 'full',
            'os'       => 'Xbox One',
            'category' => 'appliance',
            'vendor'   => 'Microsoft',
        ),
        'DigitalTV' => array(
            'label'    => 'DigitalTV',
            'name'     => 'InternetTVBrowser',
            'type'     => 'full',
            'os'       => 'DigitalTV',
            'category' => 'appliance',
        ),
        'SafariRSSReader' => array(
            'label'    => 'SafariRSSReader',
            'name'     => 'Safari RSSReader',
            'type'     => 'full',
            'category' => 'misc',
            'vendor'   => 'Apple',
        ),
        'GoogleDesktop' => array(
            'label'    => 'GoogleDesktop',
            'name'     => 'Google Desktop',
            'type'     => 'full',
            'category' => 'misc',
            'vendor'   => 'Google',
        ),
        'WindowsRSSReader' => array(
            'label'    => 'WindowsRSSReader',
            'name'     => 'Windows RSSReader',
            'type'     => 'full',
            'category' => 'misc',
            'vendor'   => 'Microsoft',
        ),
        'VariousRSSReader' => array(
            'label'    => 'VariousRSSReader',
            'name'     => 'RSSReader',
            'type'     => 'full',
            'category' => 'misc',
        ),
        'HTTPLibrary' => array(
            'label'    => 'HTTPLibrary',
            'name'     => 'HTTP Library',
            'type'     => 'full',
            'category' => 'misc',
        ),
        'GoogleBot' => array(
            'label'    => 'GoogleBot',
            'name'     => 'Googlebot',
            'type'     => 'full',
            'category' => 'crawler',
        ),
        'GoogleBotMobile' => array(
            'label'    => 'GoogleBotMobile',
            'name'     => 'Googlebot Mobile',
            'type'     => 'full',
            'category' => 'crawler',
        ),
        'GoogleMediaPartners' => array(
            'label'    => 'GoogleMediaPartners',
            'name'     => 'Google Mediapartners',
            'type'     => 'full',
            'category' => 'crawler',
        ),
        'GoogleFeedFetcher' => array(
            'label'    => 'GoogleFeedFetcher',
            'name'     => 'Google Feedfetcher',
            'type'     => 'full',
            'category' => 'crawler',
        ),
        'GoogleAppEngine' => array(
            'label'    => 'GoogleAppEngine',
            'name'     => 'Google AppEngine',
            'type'     => 'full',
            'category' => 'crawler',
        ),
        'GoogleWebPreview' => array(
            'label'    => 'GoogleWebPreview',
            'name'     => 'Google Web Preview',
            'type'     => 'full',
            'category' => 'crawler',
        ),
        'YahooSlurp' => array(
            'label'    => 'YahooSlurp',
            'name'     => 'Yahoo! Slurp',
            'type'     => 'full',
            'category' => 'crawler',
        ),
        'YahooJP' => array(
            'label'    => 'YahooJP',
            'name'     => 'Yahoo! Japan',
            'type'     => 'full',
            'category' => 'crawler',
        ),
        'YahooPipes' => array(
            'label'    => 'YahooPipes',
            'name'     => 'Yahoo! Pipes',
            'type'     => 'full',
            'category' => 'crawler',
        ),
        'Baiduspider' => array(
            'label'    => 'Baiduspider',
            'name'     => 'Baiduspider',
            'type'     => 'full',
            'category' => 'crawler',
        ),
        'msnbot' => array(
            'label'    => 'msnbot',
            'name'     => 'msnbot',
            'type'     => 'full',
            'category' => 'crawler',
        ),
        'bingbot' => array(
            'label'    => 'bingbot',
            'name'     => 'bingbot',
            'type'     => 'full',
            'category' => 'crawler',
        ),
        'BingPreview' => array(
            'label'    => 'BingPreview',
            'name'     => 'BingPreview',
            'type'     => 'full',
            'category' => 'crawler',
        ),
        'Yeti' => array(
            'label'    => 'Yeti',
            'name'     => 'Naver Yeti',
            'type'     => 'full',
            'category' => 'crawler',
        ),
        'FeedBurner' => array(
            'label'    => 'FeedBurner',
            'name'     => 'Google FeedBurner',
            'type'     => 'full',
            'category' => 'crawler',
        ),
        'facebook' => array(
            'label'    => 'facebook',
            'name'     => 'facebook',
            'type'     => 'full',
            'category' => 'crawler',
        ),
        'twitter' => array(
            'label'    => 'twitter',
            'name'     => 'twitter',
            'type'     => 'full',
            'category' => 'crawler',
        ),
        'trendictionbot' => array(
            'label'    => 'trendictionbot',
            'name'     => 'trendiction',
            'type'     => 'full',
            'category' => 'crawler',
        ),
        'mixi' => array(
            'label'    => 'mixi',
            'name'     => 'mixi',
            'type'     => 'full',
            'category' => 'crawler',
        ),
        'IndyLibrary' => array(
            'label'    => 'IndyLibrary',
            'name'     => 'Indy Library',
            'type'     => 'full',
            'category' => 'crawler',
        ),
        'ApplePubSub' => array(
            'label'    => 'ApplePubSub',
            'name'     => 'Apple iCloud',
            'type'     => 'full',
            'category' => 'crawler',
        ),
        'Genieo' => array(
            'label'    => 'Genieo',
            'name'     => 'Genieo Web Filter',
            'type'     => 'full',
            'category' => 'crawler',
        ),
        'topsyButterfly' => array(
            'label'    => 'topsyButterfly',
            'name'     => 'topsy Butterfly',
            'type'     => 'full',
            'category' => 'crawler',
        ),
        'rogerbot' => array(
            'label'    => 'rogerbot',
            'name'     => 'SeoMoz rogerbot',
            'type'     => 'full',
            'category' => 'crawler',
        ),
        'AhrefsBot' => array(
            'label'    => 'AhrefsBot',
            'name'     => 'ahref AhrefsBot',
            'type'     => 'full',
            'category' => 'crawler',
        ),
        'radian6' => array(
            'label'    => 'radian6',
            'name'     => 'salesforce radian6',
            'type'     => 'full',
            'category' => 'crawler',
        ),
        'Hatena' => array(
            'label'    => 'Hatena',
            'name'     => 'Hatena',
            'type'     => 'full',
            'category' => 'crawler',
        ),
        'goo' => array(
            'label'    => 'goo',
            'name'     => 'goo',
            'type'     => 'full',
            'category' => 'crawler',
        ),
        'livedoorFeedFetcher' => array(
            'label'    => 'livedoorFeedFetcher',
            'name'     => 'livedoor FeedFetcher',
            'type'     => 'full',
            'category' => 'crawler',
        ),
        'VariousCrawler' => array(
            'label'    => 'VariousCrawler',
            'name'     => 'misc crawler',
            'type'     => 'full',
            'category' => 'crawler',
        ),
    );

    public static function get($label)
    {
        return static::$dataset[$label];
    }
}
