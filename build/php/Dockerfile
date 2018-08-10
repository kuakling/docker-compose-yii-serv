FROM php:5.6-apache

MAINTAINER kuakling@gmail.com

ENV PATH $PATH:/root/.composer/vendor/bin

# PHP extensions come first, as they are less likely to change between Yii releases
RUN apt-get update \
    && apt-get -y install \
            git-core \
            g++ \
            libicu-dev \
            libmcrypt-dev \
            zlib1g-dev \
            libmagickwand-dev \
            libpq-dev \
            apache2 \
            nano \
            libmemcached-dev \
        --no-install-recommends \
    && rm -rf /var/lib/apt/lists/* \
    # Enable mod_rewrite
    && a2enmod rewrite
# Manually set up the apache environment variables
ENV APACHE_RUN_USER www-data
ENV APACHE_RUN_GROUP www-data
ENV APACHE_LOG_DIR /var/log/apache2
ENV APACHE_LOCK_DIR /var/lock/apache2
ENV APACHE_PID_FILE /var/run/apache2.pid
# Update the default apache site with the config we created.
ADD conf/apache-config.conf /etc/apache2/sites-enabled/000-default.conf

    # Install PHP extensions
RUN docker-php-ext-install intl \
    && docker-php-ext-install pdo_mysql \
    && docker-php-ext-install pdo mysqli \
    && docker-php-ext-install pdo pdo_pgsql \
    && docker-php-ext-install mbstring \
    && docker-php-ext-install mcrypt \
    && docker-php-ext-install zip \
    && pecl install imagick \
    && docker-php-ext-enable imagick \
    && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
    && docker-php-ext-install gd \
    && pecl install memcached-2.2.0 \ 
    && docker-php-ext-enable memcached \
    && pecl install apcu-4.0.11 && echo extension=apcu.so > /usr/local/etc/php/conf.d/apcu.ini \
    && apt-get purge -y g++ \
    && apt-get autoremove -y \
    && rm -rf /var/lib/apt/lists/* \

    # Fix write permissions with shared folders
    && usermod -u 1000 www-data

# Copy php config
COPY conf/php.ini /usr/local/etc/php/conf.d/docker-php-ext-upd.ini


# Next composer and global composer package, as their versions may change from time to time
RUN curl -sS https://getcomposer.org/installer | php \
    && mv composer.phar /usr/local/bin/composer \
    && composer global require --no-progress "fxp/composer-asset-plugin:~1.2.0" \
    && composer global require --no-progress "codeception/codeception=2.0.*" \
    && composer global require --no-progress "codeception/specify=*" \
    && composer global require --no-progress "codeception/verify=*"


# Composer shell and run it
COPY composer.sh /usr/local/bin/composer.sh
RUN composer.sh && rm /usr/local/bin/composer.sh

WORKDIR /var/www/html


