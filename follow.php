<?php

include_once 'database.php';
include_once 'session.php';

$following_id=$_POST['following_id'];
$user_id=$_SESSION['user_id'];


$follower_query="INSERT INTO user_follows(follower_id,following_id) VALUES (?,?)";
$stmt=$pdo->prepare($follower_query);
$stmt->execute([$user_id,$following_id,]);
if($_SESSION['admin']==1){
    header("Location:homepage2.php");
}else{
header("Location:homepage2.php");
}
