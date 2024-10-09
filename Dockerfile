# Используем PHP 8.3 образ
FROM php:8.3-fpm

# Устанавливаем системные зависимости и PHP расширения
RUN apt-get update && apt-get install -y \
    git \
    curl \
    zip \
    unzip \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip

# Устанавливаем Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Устанавливаем рабочую директорию
WORKDIR /var/www

# Копируем все файлы проекта
COPY . .

# Устанавливаем права для папок storage и bootstrap/cache
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

# Экспонируем порт 9000 для PHP-FPM
EXPOSE 9000

CMD ["php-fpm"]
