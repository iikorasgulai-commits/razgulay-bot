<?php
declare(strict_types=1);

// ==== ОБЯЗАТЕЛЬНО ВСТАВЬ ТОКЕН ====
$BOT_TOKEN = "ВАШ_API_KEY"; // токен от @BotFather, в кавычках

// Базовые URL
$API_URL  = "https://api.telegram.org/bot{$BOT_TOKEN}/";
$FILE_URL = "https://api.telegram.org/file/bot{$BOT_TOKEN}/";

// Когда задеплоишь на Render — замени на свой адрес + /bot
$BASE_URL = "https://ВАШ_АДРЕС/bot";

$TIMEZONE = "Europe/Moscow";
date_default_timezone_set($TIMEZONE);

// Пути (на будущее)
$DIR_FILES = __DIR__ . "/files";
$DIR_DATA  = __DIR__ . "/data";
if (!is_dir($DIR_FILES)) mkdir($DIR_FILES, 0777, true);
if (!is_dir($DIR_DATA))  mkdir($DIR_DATA,  0777, true);
?>
