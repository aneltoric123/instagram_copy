<?php
include_once 'session.php';
include_once 'database.php';

$sender=$_SESSION['user_id'];
$receiver=$_POST['receiver'];


$receiver_id_query="SELECT id_u FROM users WHERE username=?";
$stmt2=$pdo->prepare($receiver_id_query);
$stmt2->execute([$receiver]);
$receiver_id=$stmt2->fetchColumn();

$content=$_POST['message'];
$date=date('Y-m-d H:i:s');
$insert="INSERT into messages(content,date_sent,sender_id,receiver_id) VALUES(?,?,?,?)";
$stmt=$pdo->prepare($insert);
$stmt->execute([$content,$date,$sender,$receiver_id]);

$receiver_username_query = $pdo->prepare("SELECT username FROM users WHERE id_u = ?");
$receiver_username_query->execute([$receiver_id]);
$receiver_username = $receiver_username_query->fetchColumn();


header("Location:message.php?receiver=".urlencode($receiver_username));

?>