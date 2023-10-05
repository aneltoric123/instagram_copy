<?php
include 'session.php';

include 'database.php';
$user_id=$_POST['user_id'];
$delete_query3="DELETE FROM comments WHERE user_id=?";
$stmt3=$pdo->prepare($delete_query3);
$stmt3->execute([$user_id]);

$delete_query4="DELETE FROM likes WHERE user_id=?";
$stmt4=$pdo->prepare($delete_query4);
$stmt4->execute([$user_id]);
$delete_query6="DELETE FROM messages WHERE sender_id=? OR receiver_id=?";
$stmt6=$pdo->prepare($delete_query6);
$stmt6->execute([$user_id,$user_id]);
$delete_query2="DELETE FROM posts WHERE user_id=?";
$stmt2=$pdo->prepare($delete_query2);
$stmt2->execute([$user_id]);
$delete_query5="DELETE FROM user_follows WHERE follower_id=? OR following_id=?";
$stmt5=$pdo->prepare($delete_query5);
$stmt5->execute([$user_id,$user_id]);

$delete_query="DELETE FROM users WHERE id_u=?";
$stmt=$pdo->prepare($delete_query);
$stmt->execute([$user_id]);


header("Location:homepage2.php");



?>