<?php
require "config.php";
require "db.php";
require "product.php";

use Telegram\Bot\Api;

$config = require "config.php";
$telegram = new Api($config["bot"]["token"]);

try {
    $updates = $telegram->getWebhookUpdates();
    file_put_contents("logs.txt", print_r($updates, true), FILE_APPEND);
    $chatId = $updates["message"]["chat"]["id"] ?? null;
    $text = $updates["message"]["text"] ?? "";
    $userId = $updates["message"]["from"]["id"] ?? null;

    if ($text === "/start") {
        saveUser($pdo, $userId, $updates["message"]["from"]["first_name"]);
        $telegram->sendMessage([
            "chat_id" => $chatId,
            "text" => "Добро пожаловать! Используйте меню ниже.",
            "reply_markup" => mainMenu()
        ]);
    }
} catch (Exception $e) {
    file_put_contents("error_logs.txt", $e->getMessage(), FILE_APPEND);
}
?>
