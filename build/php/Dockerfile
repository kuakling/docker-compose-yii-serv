FROM php:5.6-apache
 
RUN apt-get update && apt-get install -y zlib1g-dev libicu-dev g++ libmagickwand-dev --no-install-recommends libpq-dev libmemcached-dev
RUN rm -rf /var/lib/apt/lists/*
RUN docker-php-ext-configure intl \
    && docker-php-ext-install intl \
    && docker-php-ext-install pdo mysql \
    && docker-php-ext-install pdo pdo_mysql \
    && docker-php-ext-install pdo pdo_pgsql \
    && docker-php-ext-install pdo mysqli \
    && pecl install imagick \
    && docker-php-ext-enable imagick \
    && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
    && docker-php-ext-install gd \
    && pecl install memcached \ 
    && docker-php-ext-enable memcached \
    && pecl install apc \
    && echo extension=apc.so > /usr/local/etc/php/conf.d/apc.ini
    

COPY conf/php.ini /usr/local/etc/php/conf.d/docker-php-ext-yii.ini
 
# Workaround for write permission on write to MacOS X volumes
RUN usermod -u 1000 www-data
 
# Enable Apache mod_rewrite
RUN a2enmod rewrite
