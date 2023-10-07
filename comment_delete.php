<?php 
include_once 'database.php';
include_once 'session.php';


$comment_id = filter_input(INPUT_POST, 'comment_id', FILTER_VALIDATE_INT);

$delete_query="DELETE FROM comments WHERE id_c=?";
$stmt=$pdo->prepare($delete_query);
$stmt->execute([$comment_id]);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $referring_page = $_SERVER['HTTP_REFERER'];
    
    
    header("Location: $referring_page");
    exit();
}

?>