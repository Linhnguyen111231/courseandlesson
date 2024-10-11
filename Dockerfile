# Sử dụng image PHP chính thức với FPM
FROM php:8.1-fpm

# Thiết lập thư mục làm việc
WORKDIR /var/www

# Cài đặt các gói hệ thống cần thiết
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libonig-dev \
    libzip-dev \
    git \
    unzip

# Kiểm tra và cài đặt GD chỉ nếu chưa có
RUN if ! php -m | grep -q 'gd'; then \
    docker-php-ext-configure gd --with-freetype --with-jpeg && \
    docker-php-ext-install gd; \
fi

# Cài đặt PDO và PDO_MYSQL nếu chưa có
RUN if ! php -m | grep -q 'pdo_mysql'; then \
    docker-php-ext-install pdo pdo_mysql; \
fi

# Cài đặt zip nếu chưa có
RUN if ! php -m | grep -q 'zip'; then \
    docker-php-ext-install zip; \
fi

# Cài đặt Composer nếu chưa có
RUN if [ ! -f /usr/local/bin/composer ]; then \
    curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer; \
fi


# Sao chép ứng dụng Laravel vào container
COPY . /var/www
RUN mkdir -p /var/www/storage /var/www/bootstrap/cache && \
    chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache
# Khởi động PHP-FPM
CMD ["php-fpm"]
