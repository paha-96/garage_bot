<?php
function saveUser($pdo, $userId, $username) {
    $stmt = $pdo->prepare("INSERT INTO users (user_id, username) VALUES (:user_id, :username) ON DUPLICATE KEY UPDATE username = :username");
    $stmt->execute(["user_id" => $userId, "username" => $username]);
}
?>
