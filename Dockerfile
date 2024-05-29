FROM drupal:10.2.6-php8.2-apache-bookworm

RUN apt-get update -y

RUN apt-get install -y \
    git \
    unzip \
    libpng-dev

RUN apt-get clean && rm -rf /var/lib/apt/lists/*

WORKDIR /var/www/html

EXPOSE 80
