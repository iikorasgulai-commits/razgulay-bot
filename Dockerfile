# Используем официальный PHP-образ
FROM php:8.2-cli

# curl для работы с Telegram API
RUN apt-get update && apt-get install -y \
    libcurl4-openssl-dev \
    && docker-php-ext-install curl \
    && rm -rf /var/lib/apt/lists/*

# Рабочая папка и файлы
WORKDIR /app
COPY . /app/

# Railway даёт порт в переменной PORT, слушаем его
EXPOSE 3000
CMD ["sh", "-c", "php -S 0.0.0.0:${PORT:-3000} -t ."]
