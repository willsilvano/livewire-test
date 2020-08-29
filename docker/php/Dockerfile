FROM php:7.4-fpm

ENV TZ=America/Sao_Paulo \
    # OPcache defaults
    PHP_OPCACHE_ENABLE="1" \
    PHP_OPCACHE_MEMORY_CONSUMPTION="128" \
    PHP_OPCACHE_MAX_ACCELERATED_FILES="10000" \
    PHP_OPCACHE_INTERNED_STRINGS_BUFFER="16" \
    PHP_OPCACHE_REVALIDATE_FREQUENCY="0" \
    PHP_OPCACHE_VALIDATE_TIMESTAMPS="0" \
    PHP_OPCACHE_FAST_SHUTDOWN="1" \
    # PHP-FPM defaults
    PHP_FPM_PM="dynamic" \
    PHP_FPM_MAX_CHILDREN="5" \
    PHP_FPM_START_SERVERS="2" \
    PHP_FPM_MIN_SPARE_SERVERS="1" \
    PHP_FPM_MAX_SPARE_SERVERS="2" \
    PHP_FPM_MAX_REQUESTS="1000"

WORKDIR /var/www/html

RUN apt-get update && apt-get install -y --no-install-recommends \
    git  \
    curl  \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    && docker-php-ext-install opcache \
    && docker-php-ext-install \
    mbstring \
    exif \
    pcntl \
    bcmath \    
    opcache \
    gd \ 
    && apt-get install -y libpq-dev \
    && docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql \
    && docker-php-ext-install pdo pdo_pgsql pgsql \
    && pecl install redis && docker-php-ext-enable redis \
    && php -r "readfile('http://getcomposer.org/installer');" | php -- --install-dir=/usr/bin/ --filename=composer \
    && mkdir /run/php \
    && ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone \
    && apt-get -y autoremove \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

ADD opcache.ini "$PHP_INI_DIR/conf.d/opcache.ini"

COPY www.conf /usr/local/etc/php-fpm.d/www.conf

COPY . /var/www/html

RUN chown -R www-data:www-data /var/www/html