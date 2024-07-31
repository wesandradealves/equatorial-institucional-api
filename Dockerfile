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

COPY . .

RUN cd .. && rm -rf composer.* vendor && cd web && mv core/ modules/ profiles/ themes/ composer.json drush/ sites/ DOCKER.md db libraries readme Dockerfile  docker-compose.yml load.environment.php scripts README.md phpunit.xml.dist ../ && cd web && cp -r * ../ && cd .. && rm -rf web

RUN chown -R www-data:www-data /var/www/html/sites/default/ && \
    chmod -R 755 /var/www/html/sites/default/  && \
    chmod -R 755 /opt/drupal/web/modules/  && \
    chmod -R 755 /opt/drupal/web/config/sync/

RUN echo "memory_limit = 1024M" >> /usr/local/etc/php/php.ini
RUN echo "post_max_size = 1024M" >> /usr/local/etc/php/php.ini
RUN echo "upload_max_filesize = 1024M" >> /usr/local/etc/php/php.ini
RUN echo "max_execution_time = 6000" >> /usr/local/etc/php/php.ini
RUN echo "output_buffering = 1" >> /usr/local/etc/php/php.ini
RUN echo "log_errors = On" >> /usr/local/etc/php/php.ini
RUN echo "error_log = /var/log/php_errors.log" >> /usr/local/etc/php/php.ini

RUN cd .. && composer install
#  && drush cr && drush updb && drush cex -y

EXPOSE 80
