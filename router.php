<?php
declare(strict_types=1);

require_once __DIR__ . "/config.php";
require_once __DIR__ . "/api.php";

// Роутер: распределяет входящие апдейты
function handleUpdate(array $update): void {
    if (isset($update['message'])) {
        $msg = $update['message'];
        $chat_id = $msg['chat']['id'];
        $text = $msg['text'] ?? '';

        if ($text === "/start") {
            sendMessage($chat_id, "Привет! 👋 Я бот для приёмки товаров.\n\nСкоро здесь появятся меню и функции.");
        } else {
            sendMessage($chat_id, "Ты написал: <b>" . htmlspecialchars($text) . "</b>");
        }
    }
}
?>
