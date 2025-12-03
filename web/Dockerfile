FROM php:8.2-apache

RUN docker-php-ext-install pdo_mysql \
    && a2enmod rewrite \
    && sed -i 's/80/8000/g' /etc/apache2/ports.conf /etc/apache2/sites-available/000-default.conf

COPY php.ini /usr/local/etc/php/conf.d/99-custom.ini

# 🔽🔽 이 줄 추가: 소스 경로는 빌드 컨텍스트 기준으로 조정!
COPY my_website_docker/web/ /var/www/html/

WORKDIR /var/www/html
EXPOSE 8000
