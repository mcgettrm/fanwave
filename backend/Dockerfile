# Use the official PHP image with Apache
FROM php:8.4-apache

# Enable required PHP extensions and tools
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    libzip-dev \
    && docker-php-ext-install pdo pdo_mysql mbstring zip exif pcntl bcmath gd

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Install Composer globally
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www/html

# Copy existing application directory contents
COPY . /var/www/html

# Find and replace the apache virtual host configuration to set the webroot to Laravel's public folder
RUN sed -i 's!/var/www/html!/var/www/html/public!g' /etc/apache2/sites-available/000-default.conf

# Good 'ol 775  TODO::Need to review permissions here
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 775 /var/www/html



# Expose port 80 (Apache default) TODO::SSL Cert on 8080?
EXPOSE 80

# TODO:: Different build targets for dev and prod?
