FROM webdevops/php-nginx:8.0-alpine as php-fpm
WORKDIR /app
COPY . /var/www/multidoc-laravel
WORKDIR /var/www/multidoc-laravel

RUN apk --no-cache add pcre-dev ${PHPIZE_DEPS}  && \
    pecl install xdebug-3.1.1 &&  \
    docker-php-ext-enable xdebug &&  \
    apk del pcre-dev ${PHPIZE_DEPS} &&  \
    mkdir /tmp/xdebug-output && \
    echo $'xdebug.mode=develop,debug\nxdebug.start_with_request=yes\nxdebug.client_host=host.docker.internal\nxdebug.output_dir=/tmp/xdebug-output-multidoc-laravel' >> /opt/docker/etc/php/php.ini && \
    set -ex && apk --no-cache add sudo
EXPOSE 80
