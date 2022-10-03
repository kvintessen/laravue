ARG VERSION

FROM php:${VERSION}-fpm

# Install PHP and composer dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    rsync \
    libpng-dev \
    libxml2-dev \
    libmagickwand-dev

# Clear out the local repository of retrieved package files
RUN apt-get clean

RUN apt-get update && apt-get install -y \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libpng-dev \
        libwebp-dev \
        libpq-dev \
        libzip-dev \
    && docker-php-ext-configure gd --with-webp=/usr/local/webp --with-freetype --with-webp --with-jpeg  \
    && docker-php-ext-install gd \
    && docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql \
    && docker-php-ext-install pdo pdo_pgsql pgsql \
    && docker-php-ext-install zip \
    && docker-php-ext-install soap \
    && pecl install xdebug && docker-php-ext-enable xdebug

# Install Composer
RUN curl -O https://getcomposer.org/download/2.1.0/composer.phar \
    && chmod a+x composer.phar \
    && mv composer.phar /usr/local/bin/composer

# Install Node.js
ARG NODE_VERSION

RUN curl -sL $(echo https://deb.nodesource.com/setup_$NODE_VERSION | perl -pe 's/(.[0-9])$/x/g') -o nodesource_setup.sh \
    && bash nodesource_setup.sh \
    && apt-get install -qq nodejs

# Set permissions
RUN chmod -R 777 /var/www/
