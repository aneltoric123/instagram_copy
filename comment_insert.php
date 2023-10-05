<?php
 include_once 'session.php';
include_once 'database.php';

$user_id = $_SESSION['user_id'];
$photo_id = $_POST['photo_id'];
$comment_text = $_POST['comment_text'];
$date=date('Y-m-d H:i:s');

$query = "INSERT INTO comments (user_id, post_id, content,date_commented) VALUES (?, ?, ?,?)";
$stmt = $pdo->prepare($query);
$stmt->execute([$user_id, $photo_id, $comment_text,$date]);



$referring_page = $_SERVER['HTTP_REFERER'];


header("Location:$referring_page");
exit();
?>