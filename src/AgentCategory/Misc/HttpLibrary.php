<?php

namespace Woothee\AgentCategory\Misc;

use Woothee\AgentCategory\AbstractCategory;
use Woothee\DataSet;

class HttpLibrary extends AbstractCategory
{
    public static function challenge($ua, &$result)
    {
        $data = null;
        $version = null;

        if (strpos($ua, 'Apache-HttpClient/') === 0
            || strpos($ua, 'Jakarta Commons-HttpClient/') === 0
            || strpos($ua, 'Java/') === 0) {
            $data = DataSet::get('HTTPLibrary');
            $version = 'Java';
        } elseif (preg_match('/[- ]HttpClient(\/|$)/Du', $ua, $matches) === 1) {
            $data = DataSet::get('HTTPLibrary');
            $version = 'Java';
        } elseif (strpos($ua, 'Java(TM) 2 Runtime Environment,') !== false) {
            $data = DataSet::get('HTTPLibrary');
            $version = 'Java';
        } elseif (strpos($ua, 'Wget/') === 0) {
            $data = DataSet::get('HTTPLibrary');
            $version = 'wget';
        } elseif (strpos($ua, 'libwww-perl') === 0
            || strpos($ua, 'WWW-Mechanize') === 0
            || strpos($ua, 'LWP::Simple') === 0
            || strpos($ua, 'LWP ') === 0
            || strpos($ua, 'lwp-trivial') === 0) {
            $data = DataSet::get('HTTPLibrary');
            $version = 'perl';
        } elseif (strpos($ua, 'Ruby') === 0
            || strpos($ua, 'feedzirra') === 0
            || strpos($ua, 'Typhoeus') === 0) {
            $data = DataSet::get('HTTPLibrary');
            $version = 'ruby';
        } elseif (strpos($ua, 'Python-urllib/') === 0
            || strpos($ua, 'Twisted ') === 0) {
            $data = DataSet::get('HTTPLibrary');
            $version = 'python';
        } elseif (strpos($ua, 'PHP') === 0
            || strpos($ua, 'WordPress/') === 0
            || strpos($ua, 'CakePHP') === 0
            || strpos($ua, 'PukiWiki/') === 0
            || strpos($ua, 'PECL::HTTP') === 0
            || preg_match('/(?:PEAR |)HTTP_Request(?: class|2)/Du', $ua, $matches) === 1) {
            $data = DataSet::get('HTTPLibrary');
            $version = 'php';
        } elseif (strpos($ua, 'curl/') === 0) {
            $data = DataSet::get('HTTPLibrary');
            $version = 'curl';
        }

        if (is_null($data)) {
            return false;
        }

        static::updateMap($result, $data);

        if ($version) {
            static::updateVersion($result, $version);
        }

        return true;
    }
}
