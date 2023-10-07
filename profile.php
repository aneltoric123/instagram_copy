<?php
 include_once 'database.php';
 include 'session.php';
 include_once 'header.php';
 
 $user_id = $_SESSION['user_id'];
 
 $query = "SELECT * FROM users WHERE id_u=?";
 $stmt = $pdo->prepare($query);
 $stmt->execute([$user_id]);
 $user = $stmt->fetch(PDO::FETCH_ASSOC);
 

 $query_posts="SELECT COUNT(*) FROM posts WHERE user_id=?";
 $stmt_posts=$pdo->prepare($query_posts);
 $stmt_posts->execute([$user_id]);
 $posts_count=$stmt_posts->fetchColumn();

$query_followers = "SELECT COUNT(*) FROM user_follows WHERE follower_id=?";
$stmt_followers = $pdo->prepare($query_followers);
$stmt_followers->execute([$user_id]);
$followers_count = $stmt_followers->fetchColumn();

$query_following = "SELECT COUNT(*) FROM user_follows WHERE following_id=?";
$stmt_following = $pdo->prepare($query_following);
$stmt_following->execute([$user_id]);
$following_count = $stmt_following->fetchColumn();
 ?>
 
 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title><?php echo $user['username']; ?>'s Profile</title>
     <link rel="icon" href="assets/images/1200px-Instagram.svg.png" type="image/png">
     <link rel="stylesheet" href="CSS/profile_style.css">
     <link rel="stylesheet" href="CSS/test.css">
     <link rel="stylesheet" href="CSS/footer.css">
 </head>
 <body>
 
    <div class="container">
    <div class="profile-pic">
        <label for="profile-picture">
            <img src="Pictures/44884218_345707102882519_2446069589734326272_n.jpg" alt="slika1" class="profile">
        
    </div>
    
        </label>
        <input type="file" id="profile-picture" style="display:none;" accept="image/*">
        <div class="username"><?php echo $user['username']; ?></div>
      <div class="edit_profile edit-profile-container">
    <a href="user_data.php" class="edit-profile-button">Edit Profile</a>
</div>
<div class="posts-count"><?php echo $posts_count; ?> Posts</div> 
    <div class="followers">
    <a href="#" id="followers-link">Followers</a>
    <span class="follower-count"><?php echo $following_count; ?></span>
    <div id="followers-popup" class="popup">
        <div class="popup-content">
            <span class="close" onclick="closePopup()">&times;</span>
            <h2>Followers</h2>
            <ul>
                <?php
                $stmt_followers_list = $pdo->prepare("SELECT u.username FROM users u INNER JOIN user_follows uf ON u.id_u = uf.follower_id WHERE uf.following_id = ?");
                $stmt_followers_list->execute([$user_id]);
                $followers_list = $stmt_followers_list->fetchAll(PDO::FETCH_COLUMN);

                foreach ($followers_list as $follower) {
                    echo '<li>' . $follower . '</li>';
                }
                ?>
            </ul>
        </div>
    </div>
</div>
<div class="following">

    <a href="#" id="following-link">Following</a>
    <span class="follower-count"><?php echo $followers_count ?></span>
    <div id="following-popup" class="popup">
        <div class="popup-content">
            <span class="close" onclick="closePopup()">&times;</span>
            <h2>Following</h2>
            <ul>
                <?php
                $stmt_following_list = $pdo->prepare("SELECT u.username FROM users u INNER JOIN user_follows uf ON u.id_u = uf.following_id WHERE uf.follower_id = ?");
                $stmt_following_list->execute([$user_id]);
                $following_list = $stmt_following_list->fetchAll(PDO::FETCH_COLUMN);

                foreach ($following_list as $following) {
                    echo '<li>' . $following . '</li>';
                }
                ?>
            </ul>
        </div>
    </div>
</div>
    </div>
    <script>
  
    function closePopup() {
        document.getElementById('followers-popup').style.display = 'none';
        document.getElementById('following-popup').style.display = 'none';
        document.getElementById('postPopup').style.display = 'none';
        document.getElementById('like-popup').style.display = 'none';
    }

    document.getElementById('followers-link').addEventListener('click', function() {
        document.getElementById('followers-popup').style.display = 'block';
    });

    document.getElementById('following-link').addEventListener('click', function() {
        document.getElementById('following-popup').style.display = 'block';
    });
document.addEventListener('DOMContentLoaded', function() {
    const likeLinks = document.querySelectorAll('.view-likes');
    
    likeLinks.forEach(function(likeLink) {
        likeLink.addEventListener('click', function() {
            const likePopup = this.nextElementSibling;
            likePopup.style.display = 'block';
        });
    });

    const closeButtons = document.querySelectorAll('.close');
    closeButtons.forEach(function(closeButton) {
        closeButton.addEventListener('click', function() {
            this.parentElement.parentElement.style.display = 'none';
        });
    });
});

</script>
    <script>
        document.getElementById('profile-picture').addEventListener('change', function() {
            const file = this.files[0];
            const reader = new FileReader();

            reader.onload = function() {
                const img = document.querySelector('.profile-pic img');
                img.src = reader.result;
            }

            reader.readAsDataURL(file);
        });
    </script>
    
<div id="postPopup" class="popup">
    <div class="popup-content">
        <span class="close" onclick="closePopup()">&times;</span>
        <form action="post_insert.php" method="post" enctype="multipart/form-data">
            <input type="file" name="slika" id="fileInput" required>
            <label for="fileInput" class="file-input-label">Choose File</label>
            <input type="text" name="caption" placeholder="Write your caption here!" minlength="2" maxlength="400" required>
            <input type="submit" value="Post">
        </form>
    </div>
</div>


<div class="gallery">
  
<?php
    $user_id = $_SESSION['user_id'];

$stmt = $pdo->prepare("SELECT * FROM posts WHERE user_id= ? ORDER BY date DESC"); 
$stmt->execute([$user_id]);
    $images = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach($images as $image):
?>
<div class="post-container">
    <div class="image-container">
        <img src="<?php echo $image['path']; ?>" alt="User Image">


    <div class="options-container" >
    <div class="post-caption">
    <?php echo $user['username']; ?>: <?php if($image['is_hashtag']==1)
                                        {
                                            $words = explode(' ', $image['caption']);
    
    
    foreach($words as $word) {
        
        if (substr($word, 0, 1) == '#') {
            
            $hashtag = substr($word, 1);
            
            
            echo '<a href="hashtag.php?hashtag=' . $hashtag . '">' . $word . '</a> ';
        } else {
           
            echo $word . ' ';
        }
    }
                                          
                                        }
                                        else{  
                                           
                                        echo $image['caption'];} ?>
</div>
        <div class="caption">
<?php
$session_id=$_SESSION['user_id'];

if($image['user_id']==$session_id){
 echo '<form action="post_update.php" method="post">
 <input type="text" name="caption" placeholder="Update caption" required>
 <input type="hidden" name="post_id" value="'.$image["id_p"].'">
 <input type="submit" value="Update">
 </form>';
 echo '<form method="post" action="post_delete.php">
 <input type="hidden" name="post_id" value="'.$image["id_p"].'">
 <input type="submit" name="delete" value="Delete">
 </form>';
}


?>


        </div>
    <div class="comment-section">
    <?php $post_id = $image['id_p'];
    
    $stmt_likes_count = $pdo->prepare("SELECT COUNT(*) FROM likes WHERE post_id = ?");
    $stmt_likes_count->execute([$post_id]);
    $likes_count = $stmt_likes_count->fetchColumn();
    ?>

 
    <div class="likes">
    <span class="like-count"><?php echo $likes_count; ?></span>
    <a href="#" class="view-likes" >Likes</a>
    <div  class="popup">
        <div class="popup-content">
            <span class="close" onclick="closePopup()">&times;</span>
            <h2>Likes</h2>
            <ul class="likes-list-content">
                <?php
                $stmt_likes_list = $pdo->prepare("SELECT u.username FROM users u INNER JOIN likes l ON u.id_u = l.user_id WHERE l.post_id = ?");
                $stmt_likes_list->execute([$image['id_p']]);
                $likes_list = $stmt_likes_list->fetchAll(PDO::FETCH_COLUMN);

                foreach ($likes_list as $like) {
                    echo '<li>' . $like . '</li>';
                }
                ?>
            </ul>
        </div>
    </div>
</div>
</div>

        <div class="comments">
            
            <?php
               
                $stmt_comments = $pdo->prepare("SELECT * FROM comments WHERE post_id = ?");
                $stmt_comments->execute([$image['id_p']]);
                $comments = $stmt_comments->fetchAll(PDO::FETCH_ASSOC);
                ;
             

echo "Comments:";
                foreach ($comments as $comment) {
                    $stmt_comments_user = $pdo->prepare("SELECT username FROM users WHERE id_u=?");
                    $stmt_comments_user->bindParam(1, $comment['user_id'], PDO::PARAM_INT);
                    $stmt_comments_user->execute();
                    $comment_user = $stmt_comments_user->fetchColumn();
                    echo '<div class="comment">' .$comment_user. ": " .$comment['content'] . '</div>'; echo '<hr>';
                }
            ?>
        </div>

        </div>
        </div>
    </div
    </div> 
<?php endforeach; ?>
    
    

    </div>

     <footer>
         <?php include_once 'footer.php'; ?>
     </footer>
 </body>
 </html>
 

