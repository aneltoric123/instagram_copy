<?php

include 'database.php';
include_once 'session.php';
$new_caption=$_POST['caption'];
$post_id=$_POST['post_id'];



$update_query="UPDATE posts SET caption=? WHERE id_p=?";
$stmt=$pdo->prepare($update_query);
$stmt->execute([$new_caption,$post_id]);


header("Location:profile.php");