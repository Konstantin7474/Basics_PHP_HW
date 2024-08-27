# Используем официальный образ PHP с поддержкой FPM
FROM php:8.2-fpm

# Установка необходимых расширений PHP
RUN docker-php-ext-install pdo pdo_mysql

# Установка Composer для управления зависимостями PHP
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Устанавливаем необходимые инструменты и пакеты
RUN apt-get update && apt-get install -y \
    libzip-dev \
    zip \
    unzip \
 && docker-php-ext-install zip
