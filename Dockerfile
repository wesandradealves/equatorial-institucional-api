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

RUN docker-php-ext-install mysqli pgsql pdo_pgsql
RUN apt-get clean \
 && rm -rf /var/lib/apt/lists/* \
 && rm -rf /var/www/html/*

WORKDIR /var/www/html
COPY web .
COPY composer.json .

WORKDIR /var/www/
COPY composer.json /var/www/composer.json
RUN composer install

WORKDIR /var/www/html

RUN chown -R www-data:www-data /var/www/html/sites/default/ && \
    chmod -R 755 /var/www/html/sites/default/  && \
    chmod -R 755 /opt/drupal/web/modules/

RUN echo "memory_limit = 1024M" >> /usr/local/etc/php/php.ini
RUN echo "post_max_size = 1024M" >> /usr/local/etc/php/php.ini
RUN echo "upload_max_filesize = 1024M" >> /usr/local/etc/php/php.ini
RUN echo "max_execution_time = 6000" >> /usr/local/etc/php/php.ini
RUN echo "output_buffering = 1" >> /usr/local/etc/php/php.ini
RUN echo "log_errors = On" >> /usr/local/etc/php/php.ini
RUN echo "error_log = /var/log/php_errors.log" >> /usr/local/etc/php/php.ini

RUN cd .. && rm -rf composer.* vendor && cd web && cp composer.json ../composer.json && cd .. && composer install

EXPOSE 80
