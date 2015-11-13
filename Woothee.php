<?php
use Woothee\Classifier;

final class Woothee
{
    const VERSION = '1.1.0';

    /**
     * @param  string $ua User-Agent string
     * @return array
     */
    public static function parse($ua)
    {
        return Classifier::fillResult(Classifier::execParse($ua));
    }
}
