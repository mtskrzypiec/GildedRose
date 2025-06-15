# Użyj oficjalnego obrazu PHP z Composerem i rozszerzeniami
FROM php:8.2-cli

# Zainstaluj zależności systemowe oraz rozszerzenia PHP (jeśli potrzeba)
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    zip \
    && docker-php-ext-install pdo

# Zainstaluj Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Ustaw katalog roboczy
WORKDIR /app

# Skopiuj pliki projektu
COPY .. .

RUN composer install

CMD ["./vendor/bin/phpunit", "--configuration", "phpunit.xml"]
