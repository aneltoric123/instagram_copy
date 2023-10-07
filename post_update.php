<?php

include 'database.php';
include_once 'session.php';
$new_caption=filter_input(INPUT_POST,'caption',FILTER_SANITIZE_STRING);
$post_id=filter_input(INPUT_POST,'post_id',FILTER_VALIDATE_INT);
if (preg_match('/#\w+/', $new_caption, $matches)) {
    $hashtag = $matches[0];
    $update_hashtag="UPDATE posts SET is_hashtag=? WHERE id_p=?";
    $stmt2=$pdo->prepare($update_hashtag);
$stmt2->execute([1,$post_id]);
$update_query="UPDATE posts SET caption=? WHERE id_p=?";
$stmt=$pdo->prepare($update_query);
$stmt->execute([$new_caption,$post_id]);
}
else{
    $update_query="UPDATE posts SET caption=? WHERE id_p=?";
$stmt=$pdo->prepare($update_query);
$stmt->execute([$new_caption,$post_id]);
}




header("Location:profile.php");