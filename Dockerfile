# Use PHP with Apache as the base image
# TODO not work yet
FROM php:8.3.11RC2-zts-alpine3.20


RUN apk update
RUN apk add php83-dom php83-tokenizer php83-fileinfo php83-simplexml \
        apache2 php83  php83-apache2 php83-ctype php83-openssl \
        php83-curl php83-pecl-apcu php83-opcache php83-bcmath php83-xml \
        php83-intl php83-iconv php83-mbstring php83-session php83-common \
        bash util-linux-misc
RUN apk upgrade

COPY ./ /var/src

# Install Composer
WORKDIR /var/src
# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install project dependencies
RUN composer install
# Install Additional System Dependencies

EXPOSE 8077
ENTRYPOINT [ "bash", "entry.sh" ]


