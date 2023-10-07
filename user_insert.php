<?php
include_once 'database.php';


$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
$surname = filter_input(INPUT_POST, 'surname', FILTER_SANITIZE_STRING);
$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

if ($name && $surname && $username && $email && $password) {
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ? OR email = ?");
    $stmt->execute([$username, $email]);
    $existingUser = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($existingUser) {
        header("Location: reg.php?error=1");
        exit();
    } else {
        $pass = password_hash($password, PASSWORD_BCRYPT);
        $date_joined = date('Y-m-d H:i:s');
        $admin = 0;

        $query = "INSERT INTO users (name, surname, email, password, username, date_joined, admin) VALUES (?, ?, ?, ?, ?, ?, ?)";

        $stmt = $pdo->prepare($query);
        $stmt->execute([$name, $surname, $email, $pass, $username, $date_joined, $admin]);

        header("Location: index.php");
        exit();
    }
} else {
    header("Location: reg.php");
    exit();
}
