FROM bitnami/laravel:latest

COPY . /app

RUN composer install --no-dev --optimize-autoloader

RUN php artisan key:generate

EXPOSE 8000

CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
