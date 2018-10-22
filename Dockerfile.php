FROM php:7.1.9-fpm

RUN apt-get update && apt-get install -y libmcrypt-dev \
git \
mysql-client libmagickwand-dev --no-install-recommends \
&& docker-php-ext-install mcrypt pdo_mysql mbstring zip gd opcache

# install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Set Tokyo Timezone
RUN cp /usr/share/zoneinfo/Asia/Tokyo /etc/localtime