<?php
declare(strict_types=1);

require_once __DIR__ . "/config.php";

// Функция для отправки запросов в Telegram API
function tgRequest(string $method, array $params = []): array {
    global $API_URL;
    $ch = curl_init($API_URL . $method);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
    $res = curl_exec($ch);
    curl_close($ch);
    return json_decode((string)$res, true) ?? [];
}

// Отправка сообщения
function sendMessage(int $chat_id, string $text, array $options = []): array {
    $params = [
        'chat_id' => $chat_id,
        'text'    => $text,
        'parse_mode' => 'HTML'
    ] + $options;
    return tgRequest("sendMessage", $params);
}

// Отправка фото
function sendPhoto(int $chat_id, string $photo_path, string $caption = ""): array {
    $params = [
        'chat_id' => $chat_id,
        'caption' => $caption,
        'photo'   => new CURLFile($photo_path)
    ];
    return tgRequest("sendPhoto", $params);
}
?>
