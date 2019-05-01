# Makefile for PHP Project
#
# Copyright (c) 2019  USAMI Kenta
#
# Permission is hereby granted, free of charge, to any person obtaining a copy
# of this software and associated documentation files (the "Software"), to deal
# in the Software without restriction, including without limitation the rights
# to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
# copies of the Software, and to permit persons to whom the Software is
# furnished to do so, subject to the following conditions:
#
# The above copyright notice and this permission notice shall be included in all
# copies or substantial portions of the Software.
#
# THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
# IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
# FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
# AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
# LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
# OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
# SOFTWARE.
#
# License: MIT

PHP ?= php
COMPOSER = scripts/composer.phar
AUTOLOAD_PHP = vendor/autoload.php
RM = rm -f
APP_ENV =

.DEFAULT_GOAL := $(AUTOLOAD_PHP)

$(COMPOSER):
	scripts/setup-composer

composer.lock: $(COMPOSER) composer.json
	$(PHP) $(COMPOSER) install --no-progress

$(AUTOLOAD_PHP): composer.lock

scripts/.phan/vendor/bin/phan:
	$(PHP) $(COMPOSER) install -d scripts/.phan

scripts/.php-cs-fixer/vendor/bin/php-cs-fixer:
	$(PHP) $(COMPOSER) install -d scripts/.php-cs-fixer

scripts/.phpstan/vendor/bin/phpstan:
	$(PHP) $(COMPOSER) install -d scripts/.phpstan

scripts/phan: scripts/.phan/vendor/bin/phan
	(cd scripts; ln -sf .phan/vendor/bin/phan .)

scripts/php-cs-fixer: scripts/.php-cs-fixer/vendor/bin/php-cs-fixer
	(cd scripts; ln -sf .php-cs-fixer/vendor/bin/php-cs-fixer .)

scripts/phpstan: scripts/.phpstan/vendor/bin/phpstan
	(cd scripts; ln -sf .phpstan/vendor/bin/phpstan .)

.PHONY: analyse composer composer-no-dev clean clobber fix phan phpdoc phpstan-no-dev phpstan psalm setup setup-tools test

analyse-no-dev: phan phpstan-no-dev psalm-no-dev
analyse: phan phpstan psalm deptrac

composer: $(AUTOLOAD_PHP)

composer-no-dev:
	$(PHP) $(COMPOSER) install --no-dev --optimize-autoloader --no-progress

clobber: clean
	-$(RM) scripts/*.phar scripts/phan scripts/php-cs-fixer scripts/phpstan scripts/psalm
	-$(RM) -r scripts/.phan/composer.lock scripts/.phan/vendor
	-$(RM) -r scripts/.php-cs-fixer/composer.lock scripts/.php-cs-fixer/vendor
	-$(RM) -r scripts/.phpstan/composer.lock scripts/.phpstan/vendor
	-$(RM) -r vendor
	-$(RM) composer.lock

clean:
	-$(RM) -r build
	-$(RM) .php_cs.cache

doc: phpdoc

fix: scripts/php-cs-fixer
	$(PHP) scripts/php-cs-fixer fix

phan: scripts/phan
	-$(PHP) scripts/phan

phpstan-no-dev: scripts/phpstan
	-$(PHP) scripts/phpstan analyse src/ --no-progress

phpstan: scripts/phpstan
	-$(PHP) scripts/phpstan analyse --no-progress

psalm: scripts/psalm
	-$(PHP) scripts/psalm

setup: $(COMPOSER)

setup-tools: setup scripts/php-cs-fixer scripts/phan scripts/phpstan

test: vendor/bin/phpunit
	$(PHP) vendor/bin/phpunit
