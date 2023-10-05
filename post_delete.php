<?php

include 'database.php';
include 'session.php';

$post_id=$_POST['post_id'];

echo $post_id;
$referring_page = $_SERVER['HTTP_REFERER'];


$delete_query="DELETE FROM likes WHERE post_id=?";
$stmt=$pdo->prepare($delete_query);
$stmt->execute([$post_id]);


$delete_query2="DELETE FROM comments WHERE post_id=?";
$stmt2=$pdo->prepare($delete_query2);
$stmt2->execute([$post_id]);

$delete_query3="DELETE FROM posts WHERE id_p=?";
$stmt3=$pdo->prepare($delete_query3);
$stmt3->execute([$post_id]);

header("Location:$referring_page");