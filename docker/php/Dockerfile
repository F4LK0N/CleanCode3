FROM php:7.4-fpm-alpine

### APKs ###
RUN apk add --no-cache --update make gcc g++ \
    libc-dev \
    autoconf


### COMPOSER ###
# Copy composer executable
COPY --from=composer /usr/bin/composer /usr/bin/


### PHP - EXTENSIONS ###
RUN docker-php-ext-install mysqli \
    && docker-php-ext-install pdo \
    && docker-php-ext-install pdo_mysql

RUN pecl install -o -f xdebug \
    && pecl install -o -f redis

RUN docker-php-ext-enable xdebug redis


### PHP - CONFIG ###
ENV XDEBUG_INI_FILE=/usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
RUN echo "xdebug.remote_port=10100" >> ${XDEBUG_INI_FILE} \
    && echo "xdebug.coverage_enable=0" >> ${XDEBUG_INI_FILE} \
    && echo "xdebug.remote_enable=1" >> ${XDEBUG_INI_FILE} \
    && echo "xdebug.remote_connect_back=0" >> ${XDEBUG_INI_FILE} \
    && echo "xdebug.remote_log=/tmp/xdebug.log" >> ${XDEBUG_INI_FILE} \
    && echo "xdebug.remote_autostart=true" >> ${XDEBUG_INI_FILE} \
    && echo "xdebug.remote_host=webserver" >> ${XDEBUG_INI_FILE} \
    && echo "xdebug.max_nesting_level=256" >> ${XDEBUG_INI_FILE} \
    && echo "xdebug.var_display_max_depth=24" >> ${XDEBUG_INI_FILE} \
    && echo "xdebug.var_display_max_children=512" >> ${XDEBUG_INI_FILE} \
    && echo "xdebug.var_display_max_data=2048" >> ${XDEBUG_INI_FILE} \
