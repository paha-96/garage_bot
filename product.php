<?php
require_once "db.php";

function startSellProcess($telegram, $chatId, $userId) {
    $telegram->sendMessage([
        "chat_id" => $chatId,
        "text" => "Введите количество товара:",
        "reply_markup" => backButton()
    ]);
}

function backButton() {
    return json_encode([
        "keyboard" => [[["text" => "Назад"]]],
        "resize_keyboard" => true
    ]);
}
?>
