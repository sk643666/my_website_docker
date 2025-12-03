FROM php:8.2-apache

# PHP 확장(pdo_mysql) 설치 + Apache 모듈 활성화
RUN docker-php-ext-install pdo_mysql \
    && a2enmod rewrite \
    # Apache가 80 대신 8000 포트로 listen 하도록 설정 변경
    && sed -i 's/80/8000/g' /etc/apache2/ports.conf /etc/apache2/sites-available/000-default.conf

# PHP 설정
COPY web/php.ini /usr/local/etc/php/conf.d/99-custom.ini

# 문서 루트
WORKDIR /var/www/html

# (선택이지만 권장) 컨테이너에서 노출할 포트 명시
EXPOSE 8000
