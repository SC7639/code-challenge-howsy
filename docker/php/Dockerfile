FROM composer:2.5.8 as build

WORKDIR /app/

COPY ./ /app/

RUN composer install

# Fails to build imge if tests fail
RUN composer test 

FROM php:8.2-fpm as exec

COPY --from=build /app/ /app/

EXPOSE 9000