<?php
function mainMenu() {
    return json_encode([
        "keyboard" => [
            [["text" => "Продать"], ["text" => "Купить"]],
            [["text" => "Мои объявления"]]
        ],
        "resize_keyboard" => true
    ]);
}
?>
