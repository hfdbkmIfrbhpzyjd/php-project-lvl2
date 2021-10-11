### Hexlet tests and linter status:
[![Actions Status](https://github.com/hfdbkmIfrbhpzyjd/php-project-lvl2/workflows/hexlet-check/badge.svg)](https://github.com/hfdbkmIfrbhpzyjd/php-project-lvl2/actions)

<a href="https://codeclimate.com/github/hfdbkmIfrbhpzyjd/php-project-lvl2/maintainability"><img src="https://api.codeclimate.com/v1/badges/d1295c02cd747ea61ef0/maintainability" /></a>

<a href="https://codeclimate.com/github/hfdbkmIfrbhpzyjd/php-project-lvl2/test_coverage"><img src="https://api.codeclimate.com/v1/badges/d1295c02cd747ea61ef0/test_coverage" /></a>

![Linter](https://github.com/hfdbkmIfrbhpzyjd/php-project-lvl2/actions/workflows/Linter.yml/badge.svg)

# Generate diff
[![Build Status](https://travis-ci.org/Gumarov1991/php-project-lvl1.svg?branch=master)](https://travis-ci.org/Gumarov1991/php-project-lvl2)
[![Maintainability](https://api.codeclimate.com/v1/badges/bcde362de2d160e40d48/maintainability)](https://codeclimate.com/github/Gumarov1991/php-project-lvl2/maintainability)
[![Test Coverage](https://api.codeclimate.com/v1/badges/bcde362de2d160e40d48/test_coverage)](https://codeclimate.com/github/Gumarov1991/php-project-lvl2/test_coverage)
### Description
'Generate diff' is the application for search differeces in configuration files.

### Install
```
curl -sS https://getcomposer.org/installer | php
php composer.phar global require albert1991/php-project-lvl2
```
### Help
```
gendiff -h
```
### Ussage

For examples we have 4 сompared files and 3 result files:

Compared files: [before.json](https://github.com/Gumarov1991/php-project-lvl2/blob/master/tests/fixtures/before.json) //
[after.json](https://github.com/Gumarov1991/php-project-lvl2/blob/master/tests/fixtures/after.json) //
[before.yml](https://github.com/Gumarov1991/php-project-lvl2/blob/master/tests/fixtures/before.yml) //
[after.yml](https://github.com/Gumarov1991/php-project-lvl2/blob/master/tests/fixtures/after.yml) //

Result files: [json_pretty](https://github.com/Gumarov1991/php-project-lvl2/blob/master/tests/fixtures/results/json_pretty) //
[yml_json](https://github.com/Gumarov1991/php-project-lvl2/blob/master/tests/fixtures/results/yml_json) //
[json_plain](https://github.com/Gumarov1991/php-project-lvl2/blob/master/tests/fixtures/results/json_plain)

[![demo](https://asciinema.org/a/s8DShmIg3EuBU8zjuNvjKMbGN.svg)](https://asciinema.org/a/s8DShmIg3EuBU8zjuNvjKMbGN?autoplay=1)
