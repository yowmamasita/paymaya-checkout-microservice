#!/bin/sh
set -eo pipefail

if [ -z ${BBL_PAYMAYA_DSN} ]; then
    echo >&2 'error: you need to specify the BBL_PAYMAYA_DSN environment variable '
    exit 1
fi

vendor/bin/doctrine-migrations migrations:migrate --no-interaction --allow-no-migration

php-fpm
