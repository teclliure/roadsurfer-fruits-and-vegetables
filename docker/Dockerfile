FROM php:8.2-fpm-alpine

ARG APP_ENV
RUN apk add --no-cache git

COPY --from=mlocati/php-extension-installer /usr/bin/install-php-extensions /usr/local/bin/

RUN install-php-extensions xdebug zip bcmath @composer; \
    rm /usr/local/bin/install-php-extensions;

WORKDIR /app
