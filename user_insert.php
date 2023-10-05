<?php
include_once 'database.php';

$name = $_POST['name'];
$surname = $_POST['surname'];
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

if (!empty($name) && !empty($surname) && !empty($email) && !empty($username) && !empty($password)) {
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ? OR email = ?");
    $stmt->execute([$username, $email]);
    $existingUser = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($existingUser) {
        
        header("Location: reg.php?error=exists");
    } else {
        
        $pass = password_hash($password, PASSWORD_BCRYPT);
        $date_joined = date('Y-m-d H:i:s');
        $admin = 0;

        $query = "INSERT INTO users (name, surname, email, password, username, date_joined, admin) VALUES (?, ?, ?, ?, ?, ?, ?)";

        $stmt = $pdo->prepare($query);
        $stmt->execute([$name, $surname, $email, $pass, $username, $date_joined, $admin]);

        header("Location: index.php");
    }
} else {
    header("Location: reg.php");
}
