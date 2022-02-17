#!/usr/bin/env bash
XDEBUG_MODE=coverage vendor/bin/phpunit -c src/ --coverage-xml coverage --coverage-text