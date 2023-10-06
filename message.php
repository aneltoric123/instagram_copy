<?php include 'database.php';
include_once 'session.php';

$receiver = $_GET['receiver'];
$sender=$_SESSION['user_id'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <title>Messages</title>
    <link rel="icon" href="assets/images/1200px-Instagram.svg.png" type="image/png">
    <link rel="stylesheet" href="CSS/test.css">
    <link rel="stylesheet" href="CSS/message.css">
    <link rel="stylesheet" href="css/header.css">
</head>
<body>

<header>

<div>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container justify-content-center">
                <div class="d-flex flex-row justify-content-between align-items-center col-9">
                <?php

if ($_SESSION['admin']==1) {
                                    echo ' <a class="navbar-brand" href="homepage2.php">
                                    <img src="assets/images/ig-logo.png" alt="" loading="lazy">
                                </a>';

                                }
                                else {
                                echo ' <a class="navbar-brand" href="homepage2.php">
                                <img src="assets/images/ig-logo.png" alt="" loading="lazy">
                            </a>';
                                }
?>
                    <div>
                        
                    </div>
                    <div class="d-flex flex-row">
                        <ul class="list-inline">
                            <li class="list-inline-item">
                            <?php
                                if ($_SESSION['admin']==1)
                                {
                                    echo '<a href="homepage2.php" class="link-menu" data-toggle="tooltip" data-placement="bottom" title="Home">';

                                }
                                else {
                                echo '<a href="homepage2.php" class="link-menu" data-toggle="tooltip" data-placement="bottom" title="Home">';
                                }
                                ?>
                                    <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-house-door-fill"
                                        fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M6.5 10.995V14.5a.5.5 0 0 1-.5.5H2a.5.5 0 0 1-.5-.5v-7a.5.5 0 0 1 .146-.354l6-6a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 .146.354v7a.5.5 0 0 1-.5.5h-4a.5.5 0 0 1-.5-.5V11c0-.25-.25-.5-.5-.5H7c-.25 0-.5.25-.5.495z" />
                                        <path fill-rule="evenodd"
                                            d="M13 2.5V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z" />
                                    </svg>
                                </a>
                            </li>
                             <li class="list-inline-item ">
                                <a href="message.php" class="link-menu" data-toggle="tooltip" data-placement="bottom" title="Messages">
                                    <img src="assets/images/message-svgrepo-com.svg" alt="slika-5" class="profile-size">
                                </a>
                            </li>
                          
                           
                            <li class="list-inline-item">
                                <a href="profile.php" class="link-menu" data-toggle="tooltip" data-placement="bottom" title="Profile">
                                    <img src="assets/images/profile-svgrepo-com.svg" alt="slika-3" class="profile-size">
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="logout.php" class="link-menu" data-toggle="tooltip" data-placement="bottom" title="Logout">
                                    <img src="assets/images/logout-svgrepo-com.svg" alt="slika-4" class="profile-size">
                                </a>
                            </li>
                            
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </div>  
    <footer>
    <!-- JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
        crossorigin="anonymous"></script>
</footer>

 </header>
    <div class="container">
        <div class="followers-list">
        <?php $followed_users_query = $pdo->prepare("
      SELECT u.username
      FROM users u
      INNER JOIN user_follows uf ON u.id_u = uf.following_id
      WHERE uf.follower_id = ?
  ");

$followed_users_query->execute([$sender]);
  $followed_users = $followed_users_query->fetchAll(PDO::FETCH_ASSOC);
           ?>
            <h3>Following</h3>
            
            
        <?php foreach ($followed_users as $user) : ?>
            <div class="user">
            <a href="message.php?receiver=<?= $user['username'] ?>"><?= $user['username'] ?></a>
            </div>
        <?php endforeach; ?>
        </div>
        <?php    
        if(empty($receiver)){
           
        }else{ ?>
        <div class="chatroom">
        <?php 
        echo '<h2 class="chatroom-heading">Messaging with  '.$receiver.'</h2>';
        
    echo ' <div class="messages">';
    $receiver_query="SELECT id_u FROM users WHERE username=?";
    $stmt3=$pdo->prepare($receiver_query);
    
    $stmt3->execute([$receiver]);
    $receiver_id=$stmt3->fetchColumn();
   
    $query = "SELECT * FROM messages WHERE (sender_id = ? AND receiver_id = ?) OR (receiver_id=? AND sender_id=?)  ORDER BY date_sent ASC";
$stmt = $pdo->prepare($query);
$stmt->execute([ $sender, $receiver_id,$sender,$receiver_id]);
    


while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    
    $sender_id = $row['sender_id'];
    $sender_query = "SELECT username FROM users WHERE id_u = ?";
    $stmt2 = $pdo->prepare($sender_query); 
    $stmt2->execute([$sender_id]);
   
    $sender_data = $stmt2->fetch(PDO::FETCH_ASSOC);
    $message_class = ($sender_id == $sender) ? 'sender-message' : 'receiver-message';
    echo "<div class='message $message_class'>
            <span class='username'>" . $sender_data['username'] . "</span>
            <span class='message-content'>" . $row['content'] . "</span>
            <span class='message-date'>Sent on: " . $row['date_sent'] . "</span>
          </div>";

    
}

'</div>';
         ?>   
        </div>
         <form action="message_insert.php" method="post">
                        <input type="hidden" name="receiver" value="<?= $receiver ?>">
                        <input type="text" placeholder="Write Message" name="message" required>
                        <input type="submit" name="poslji_sporocilo" value="Send">
                      </form>
    </div>
    <?php } ?>
</body>
<footer>    
    
</footer>
</html>




      
