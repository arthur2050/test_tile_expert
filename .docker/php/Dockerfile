ARG PHP_VERSION=7.4

FROM php:${PHP_VERSION}-fpm-alpine

RUN apk add --update \
    zip \
    unzip \
    curl \
    nodejs \
    git \
    yarn

RUN docker-php-ext-install mysqli pdo pdo_mysql

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer && \
    ln -s $(composer config --global home) /root/composer
ENV PATH=$PATH:/root/composer/vendor/bin COMPOSER_ALLOW_SUPERUSER=1

COPY .docker/php/config/php.ini /usr/local/etc/php/php.ini

WORKDIR /var/www/html

COPY .docker/php/config/docker-entrypoint.sh /usr/local/bin/docker-entrypoint.sh
RUN chmod 775 /usr/local/bin/docker-entrypoint.sh
# Скачивание и установка Xdebug
RUN curl -fsSL https://xdebug.org/files/xdebug-2.9.8.tgz -o xdebug.tgz \
    && mkdir -p /usr/src/php/ext/xdebug \
    && tar -xf xdebug.tgz -C /usr/src/php/ext/xdebug --strip-components=1 \
    && docker-php-ext-install xdebug

# Настройка Xdebug
RUN echo "zend_extension=$(find /usr/local/lib/php/extensions/ -name xdebug.so)" >> /usr/local/etc/php/php.ini \
    && echo "xdebug.remote_enable=1" >> /usr/local/etc/php/php.ini \
    && echo "xdebug.remote_autostart=1" >> /usr/local/etc/php/php.ini \
    && echo "xdebug.remote_connect_back=0" >> /usr/local/etc/php/php.ini \
    && echo "xdebug.remote_host=host.docker.internal" >> /usr/local/etc/php/php.ini \
    && echo "xdebug.remote_port=9030" >> /usr/local/etc/php/php.ini \
    && echo "xdebug.remote_log=/var/log/xdebug.log" >> /usr/local/etc/php/php.ini

EXPOSE 9000

ENTRYPOINT ["/usr/local/bin/docker-entrypoint.sh"]

CMD ["php-fpm"]
