FROM php:8.2-fpm

# Installer les dépendances système
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    libpq-dev

# Installer les extensions PHP
RUN docker-php-ext-install pdo pdo_pgsql

# Installer Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# Copier les fichiers du projet
COPY . /var/www/html

# Installer les dépendances
RUN composer install

# Exposer le port pour le serveur de développement
EXPOSE 8000

# Commande par défaut pour lancer le serveur Symfony
CMD ["php", "bin/console", "server:run", "0.0.0.0:8000"]