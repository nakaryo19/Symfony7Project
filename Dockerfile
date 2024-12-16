# ベースイメージとしてPHP-FPMを使用
FROM php:8.2-fpm

# 必要なパッケージのインストール
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql

# Composerをインストール
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

# 作業ディレクトリを設定
WORKDIR /var/www/symfony7_app

# プロジェクトファイルをコピー
COPY . .

# Composerの依存関係をインストール
RUN composer install

# Symfonyのマイグレーションを実行する場合（任意）
# RUN php bin/console doctrine:migrations:migrate
