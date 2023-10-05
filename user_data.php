<?php

include 'session.php';
include_once 'database.php';
$user_id = $_SESSION['user_id'];

$user_data = "SELECT * FROM users WHERE id_u=?";
$stmt = $pdo->prepare($user_data);
$stmt->execute([$user_id]);

$user = $stmt->fetch(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/user_data.css">
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <title>Document</title>
    <link rel="stylesheet" href="CSS/test.css">
    <link rel="stylesheet" href="CSS/header.css">
    <title>Document</title>
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
<div class="user-profile">
    <h2>Edit Profile</h2>
    <form method="post" action="user_update.php">
        <label for="new_name">Name:</label>
        <input type="text" id="new_name" name="new_name" value="<?php echo $user['name']; ?>" required><br><br>
        <label for="new_username">Username:</label>
        <input type="text" id="new_user" name="new_user" value="<?php echo $user['username']; ?>" required><br><br>
        <label for="new_email">Email:</label>
        <input type="email" id="new_email" name="new_email" value="<?php echo $user['email']; ?>" required><br><br>
        
        <input type="submit" value="Save Changes">
    </form>
</div>

<div class="user-data">
    <h2>Your Data</h2>
    <p>Name: <?php echo $user['name']; ?></p>
    <p>Username: <?php echo $user['username']; ?></p>
    <p>Email: <?php echo $user['email']; ?></p>
    
</div>

<a href="user_delete.php">Delete Account</a>  
</body>
</html>

