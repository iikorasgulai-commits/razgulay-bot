# Используем официальный PHP-образ
FROM php:8.1-cli

# Устанавливаем curl (для работы с Telegram API)
RUN apt-get update && apt-get install -y \
    libcurl4-openssl-dev \
    && docker-php-ext-install curl

# Копируем все файлы в контейнер
COPY . /app/

# Устанавливаем рабочую директорию
WORKDIR /app

# Указываем команду запуска
CMD ["php", "webhook.php"]
