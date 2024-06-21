FROM drupal:10.2.6-php8.2-apache-bookworm

RUN apt-get update -y && apt-get install -y \
    git \
    unzip \
    libpng-dev \
    default-mysql-client \
    postgresql-client \
    vim \
    libpq-dev \
    sendmail

COPY ob.ini /usr/local/etc/php/conf.d/ob.ini

RUN docker-php-ext-install mysqli pgsql pdo_pgsql
RUN apt-get clean \
 && rm -rf /var/lib/apt/lists/* \
 && rm -rf /var/www/html/*

WORKDIR /var/www/html
COPY web .
COPY composer.* .

WORKDIR /var/www/
COPY composer.json /var/www/composer.json
RUN composer install

WORKDIR /var/www/html

RUN chown -R www-data:www-data /var/www/html/sites/default/ && chmod -R 755 /var/www/html/sites/default/  && chmod -R 755 /opt/drupal/web/modules/

EXPOSE 80
