# Woothee PHP

[![Build Status](https://travis-ci.org/woothee/woothee-php.svg?branch=master)](https://travis-ci.org/woothee/woothee-php)
[![Coverage Status](https://coveralls.io/repos/woothee/woothee-php/badge.png)](https://coveralls.io/r/woothee/woothee-php)
[![Packagist](https://img.shields.io/packagist/v/woothee/woothee.svg)](https://packagist.org/packages/woothee/woothee)

The PHP implementation of Project Woothee, which is multi-language user-agent strings parsers.

https://github.com/woothee/woothee

This project is almost ported from [`woothee-java`](https://github.com/woothee/woothee-java)

## Installation

Install this library using [Composer](https://getcomposer.org/).

Run below command in your project directory.

```
$ composer require woothee/woothee
```

Or add this library in your `composer.json`'s `require` section manually.

```json
{
  "require": {
    "woothee/woothee": "*"
  }
}
```

## Usage

### Parsing user-agent

```php
<?php
$classifier = new \Woothee\Classifier;

$r = $classifier->parse('user agent string');

$r['name'];
// => name of browser (or string like name of user-agent)

$r['category'];
// => "pc", "smartphone", "mobilephone", "appliance", "crawler", "misc", "unknown"

$r['os'];
// => os from user-agent, or carrier name of mobile phones

$r['version'];
// => version of browser, or terminal type name of mobile phones

$r['os_version'];
// => version of operating systems (for some typical cases)
```

Parse user-agent string and returns a `array` with keys `name`, `category`, `os`, `version` and `vendor`.

The details is same as [`woothee-java`](https://github.com/woothee/woothee-java)

### Finding crawlers (almost all, not all) in fast

```php
<?php
$classifier->isCrawler($str); // boolean
```

## Authors

* k-holy
* okonomi
* TAGOMORI Satoshi
* Yuya Takeyama <sign.of.the.wolf.pentagram@gmail.com>

## License

Copyright 2014- Yuya Takeyama (@yuya-takeyama)

Licensed under the Apache License, Version 2.0 (the "License");
you may not use this file except in compliance with the License.
You may obtain a copy of the License at

   http://www.apache.org/licenses/LICENSE-2.0

Unless required by applicable law or agreed to in writing, software
distributed under the License is distributed on an "AS IS" BASIS,
WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
See the License for the specific language governing permissions and
limitations under the License.
