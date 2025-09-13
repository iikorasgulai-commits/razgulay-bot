<?php
declare(strict_types=1);

require_once __DIR__ . "/config.php";
require_once __DIR__ . "/api.php";
require_once __DIR__ . "/router.php";

// Чтение "сырого" входящего запроса от Telegram
$input = file_get_contents("php://input");
if ($input) {
    $update = json_decode($input, true);
    if ($update) {
        handleUpdate($update);
    }
}

// Ответ для Telegram (чтобы не было ошибок 500)
http_response_code(200);
echo "OK";
?>
