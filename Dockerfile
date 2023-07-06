FROM composer:latest as vendor


WORKDIR /tmp/

COPY composer.json composer.json
COPY composer.lock composer.lock


RUN composer install \
    --ignore-platform-reqs \
    --no-interaction \
    --no-plugins \
    --no-scripts \
    --prefer-dist


FROM php:apache-bullseye

COPY . /var/www/html
COPY --from=vendor /tmp/vendor/ /var/www/html/vendor/

# Change apache2 port to 8080
RUN sed -i "s/Listen 80/Listen 8080/" /etc/apache2/ports.conf 
EXPOSE 8080
# Set a non-root user
USER 10001