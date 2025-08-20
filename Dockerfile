FROM php:8.0-fpm

# 必要なパッケージをインストール
RUN apt-get update && apt-get install -y \
    libonig-dev \
    libzip-dev \
    unzip \
    git \
    && rm -rf /var/lib/apt/lists/*

# PHP拡張をインストール
RUN docker-php-ext-install \
    mysqli \
    pdo_mysql \
    mbstring \
    zip

# セッションを有効にするためのPHP設定
RUN echo "session.auto_start = Off" >> /usr/local/etc/php/conf.d/session.ini
RUN echo "session.use_cookies = 1" >> /usr/local/etc/php/conf.d/session.ini

# 作業ディレクトリを設定
WORKDIR /var/www/html

# アップロードディレクトリの権限設定
RUN mkdir -p /var/www/html/upload && \
    chown -R www-data:www-data /var/www/html/upload && \
    chmod -R 755 /var/www/html/upload

# PHP-FPMを起動
CMD ["php-fpm"]