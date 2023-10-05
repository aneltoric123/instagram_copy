<?php
include 'session.php';
include_once 'database.php';

$photo_id = $_POST['post_id'];
$user_id = $_POST['user_id'];

$get_like_count = $pdo->prepare("SELECT like_number FROM likes WHERE post_id = ?");
$get_like_count->execute([$photo_id]);
$current_like_count = $get_like_count->fetchColumn();

$check_like_query = $pdo->prepare("SELECT * FROM likes WHERE user_id = ? AND post_id = ?");
$check_like_query->execute([$user_id, $photo_id]);
$existing_like = $check_like_query->fetch();

if ($existing_like) {
    $new_like_count = max(0, $current_like_count - 1); 
    $delete_like_query = $pdo->prepare("DELETE FROM  likes  WHERE id_l = ?");
    $delete_like_query->execute([ $existing_like['id_l']]);
   
} else {
    
    $new_like_count = $current_like_count + 1;
    $like_query = "INSERT INTO likes (user_id, post_id, like_number) VALUES (?, ?, ?)";
    $stmt = $pdo->prepare($like_query);
    $stmt->execute([$user_id, $photo_id, $new_like_count]);
    
}

$referring_page = $_SERVER['HTTP_REFERER'];


header("Location:$referring_page");
?>
