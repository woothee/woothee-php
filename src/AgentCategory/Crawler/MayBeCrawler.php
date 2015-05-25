<?php

namespace Woothee\AgentCategory\Crawler;

use Woothee\AgentCategory\AbstractCategory;
use Woothee\DataSet;

class MayBeCrawler extends AbstractCategory
{
    public static function challenge($ua, &$result)
    {
        if (preg_match('/(bot|crawler|spider)(?:[-_ .\/;@\\(\\)]|$)/Dui', $ua, $matches) === 1) {
            static::updateMap($result, DataSet::get('VariousCrawler'));

            return true;
        }

        if (strpos($ua, 'Rome Client ') === 0 ||
            strpos($ua, 'UnwindFetchor/') === 0 ||
            strpos($ua, 'ia_archiver ') === 0 ||
            strpos($ua, 'Summify ') === 0 ||
            strpos($ua, 'PostRank/') === 0 ||
            strpos($ua, 'ASP-Ranker Feed Crawler') !== false) {
            static::updateMap($result, DataSet::get('VariousCrawler'));

            return true;
        }

        if (preg_match('/(feed|web) ?parser/Dui', $ua, $matches) === 1) {
            static::updateMap($result, DataSet::get('VariousCrawler'));

            return true;
        }

        if (preg_match('/watch ?dog/Dui', $ua, $matches)) {
            static::updateMap($result, DataSet::get('VariousCrawler'));

            return true;
        }

        return false;
    }
}
