<?php
$host = '127.0.0.1';
$dbname   = 'aneltoric_instagram';
$username = 'aneltoric_aneltoric';
$password = 'HG;.[QcN(,4v';
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
