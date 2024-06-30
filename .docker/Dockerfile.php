FROM php:8.3-fpm	

ARG user=user_td
ARG uid=1000

RUN apt-get update && apt-get install -y \
    git \
    curl \
    zip \
    unzip

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN useradd -G www-data,root -u $uid -d /home/$user $user
RUN mkdir -p /home/$user/.composer && \
    chown -R $user:$user /home/$user

RUN pecl install xdebug && docker-php-ext-enable xdebug && \
    echo "xdebug.mode=debug" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini

WORKDIR /var/www

USER $user
