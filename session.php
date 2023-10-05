<?php
session_start();

if(!isset($_SESSION['user_id'])
        && $_SERVER['REQUEST_URI']!='/index.php'
        && $_SERVER['REQUEST_URI']!='/reg.php'
        && $_SERVER['REQUEST_URI']!='/login_check.php') {
    header("Location: index.php");
    die();
}
function isAdmin() {
    $result = false;
    if (isset($_SESSION['admin']) && ($_SESSION['admin']==1)) {
        $result = true;
    }
    return $result;
}






?>