<?php
namespace Woothee;

use Woothee\AgentCategory\Crawler\Crawlers;
use Woothee\AgentCategory\Crawler\Google;

class Classifier
{
    public function isCrawler($ua)
    {
        if (is_null($ua) || strlen($ua) < 1 || $ua === '-') {
            return false;
        }

        $result = [];

        if ($this->tryCrawler($ua, $result)) {
            return true;
        }

        return false;
    }

    public function tryCrawler($ua, &$result)
    {
        if (Google::challenge($ua, $result)) {
            return true;
        } elseif (Crawlers::challenge($ua, $result)) {
            return true;
        }

        return false;
    }
}
