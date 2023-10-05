<?php
include 'database.php';
include_once 'session.php';
$user_id=$_SESSION['user_id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   
   $new_name = $_POST['new_name'];
   $new_email = $_POST['new_email'];
   $new_user=$_POST['new_user'];
   $update_query = "UPDATE users SET name=?, email=?,username=? WHERE id_u=?";
   $update_stmt = $pdo->prepare($update_query);
   $update_stmt->execute([$new_name, $new_email,$new_user ,$user_id]);
   header("Location: user_data.php");
   exit();

  
}
?>