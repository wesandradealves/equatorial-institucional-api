FROM drupal:10.2.6-php8.2-apache-bookworm

RUN apt-get update -y

RUN apt-get update -y && apt-get install -y \
    git \
    unzip \
    libpng-dev \
    default-mysql-client

RUN apt-get clean && rm -rf /var/lib/apt/lists/*

WORKDIR /var/www/html

RUN rm -rf /var/www/html/*

COPY web .
COPY composer.* .

RUN composer install --working-dir /opt/drupal

RUN chown -R www-data:www-data /var/www/html/sites/default/ && chmod -R 755 /var/www/html/sites/default/

EXPOSE 80
