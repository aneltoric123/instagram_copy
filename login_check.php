<?php
session_start();
include_once 'database.php';
require_once 'vendor/autoload.php';
// Initialize Google OAuth
$clientID = '392700914879-sjv69vsqtu386cldgbcf2s791odpf8pg.apps.googleusercontent.com';
$clientSecret = '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';
$redirectUri = 'https://instagram.aneltoric.si/login_check.php';

$client = new Google_Client();
$client->setClientId($clientID);
$client->setClientSecret($clientSecret);
$client->setRedirectUri($redirectUri);
$client->addScope("email");
$client->addScope("profile");

// Check if the user is attempting a regular login
if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $pass = $_POST['password'];
    echo $email,$pass;
    
    $query = "SELECT * FROM users WHERE email=?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$email]);
    
    if ($stmt->rowCount() == 1) {
        $user = $stmt->fetch();
        if (password_verify($pass, $user['password'])) {
            $_SESSION['user_id'] = $user['id_u'];
            $_SESSION['admin'] = $user['admin'];
             echo $user['admin'];
            if ($user['admin'] == 1) {
              header("Location: homepage2.php");
                exit();
            }  
           else if($user['admin'] == 0){
            header("Location: homepage2.php");
            exit();
            }
            
        }
    }

 header("Location: index.php");
    exit();
}

// Handle Google OAuth login
if (isset($_GET['code'])) {
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
    $client->setAccessToken($token['access_token']);

    $google_oauth = new Google_Service_Oauth2($client);
    $google_account_info = $google_oauth->userinfo->get();
    $email =  $google_account_info->email;

    $query = "SELECT * FROM users WHERE email=?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$email]);

    if ($stmt->rowCount() == 1) {
        $user = $stmt->fetch();
        $_SESSION['user_id'] = $user['id_u'];
        $_SESSION['admin'] = $user['admin'];
        echo $user['admin'];
        if ($user['admin'] == 1) {
            header("Location: homepage2.php");
            exit();
            
        } 
        else if($user['admin'] == 0){
    header("Location: homepage2.php");
    exit();
        }
    } else {
       echo "You havent signed up yet";
  header("Refresh:3;url=reg.php");
    }
}



?>
