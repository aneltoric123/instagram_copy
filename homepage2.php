<?php
 require_once 'session.php';
 include_once 'database.php';
 include_once 'functions.php';
 $admin=$_SESSION['admin'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="CSS/homepage2.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/d3d6f2df1f.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="CSS/test.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="CSS/footer.css">
   
</head>
<body>
 <header>
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

<script>
    function openPopup() {
        document.getElementById('postPopup').style.display = 'flex';
        document.body.style.overflow = 'hidden'; 
    }

    function closePopup() {
        document.getElementById('postPopup').style.display = 'none';
        document.body.style.overflow = 'auto'; 
    }
    
</script>
<div>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container justify-content-center">
                <div class="d-flex flex-row justify-content-between align-items-center col-9">
                    <a class="navbar-brand" href="homepage2.php">
                        <img src="assets/images/ig-logo.png" alt="" loading="lazy">
                    </a>
                    <div>
                        
                    </div>
                    <div class="d-flex flex-row">
                        <ul class="list-inline m-0">
                            <li class="list-inline-item">
                                <a href="homepage2.php" class="link-menu" data-toggle="tooltip" data-placement="bottom" title="Home">
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
                            <a href="javascript:void(0);" id="plusButton" onclick="openPopup()" class="link-menu" data-toggle="tooltip" data-placement="bottom" title="Create Post">
    <img src="assets/images/172525_plus_icon.svg" alt="slika-2" class="profile-size">
</a>

                            </li>
                           
                            <li class="list-inline-item ">
                                <a href="profile.php" class="link-menu" data-toggle="tooltip" data-placement="bottom" title="Profile">
                                    <img src="assets/images/profile-svgrepo-com.svg" alt="slika-3" class="profile-size">
                                </a>
                            </li>
                            <li class="list-inline-item ">
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
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-M4VsmezbOZDV6MXOcEBIQTqvHNUHyto0MjgfyI2BGCyWCujK3Gh2JdMDvq71BeSg"
    crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
    integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
    crossorigin="anonymous"></script>
</footer>
 </header>   

        <?php
        $session_id=$_SESSION['user_id'];
            
    $stmt = $pdo->query("SELECT * FROM posts ORDER BY id_p DESC"); 
    $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if($admin==1){ ?>
        <div class="userslist">
        <h2>Users List</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $stmt = $pdo->query("SELECT * FROM users"); 
                    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($users as $user):
                ?>
                <tr>
                    <td><?= $user['username']; ?></td>
                    <td>
                        <form action="admin_delete.php" method="post">
                            <input type="hidden" name="user_id" value="<?= $user['id_u']; ?>">
                            <input type="submit" name="delete_user" value="Delete" class="btn btn-danger">
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
        <?php
    }
?>

   
<div class="trending">
    <h1>Trending</h1>
    <div class="hashtag-box">
        <div class="hashtags-container">
            <div class="hashtag-content">
                <?php
                
            $hashtag_query="SELECT caption FROM posts WHERE is_hashtag=? ORDER BY RAND() LIMIT 5";
                    $hashtag_stmt=$pdo->prepare($hashtag_query);
                    $hashtag_stmt->execute([1]);
                    $hashtags=$hashtag_stmt->fetchAll(PDO::FETCH_COLUMN);
                    $processed_hashtags = [];
                foreach($hashtags as $hashtag) {
                    
                    
                    
                    $words = explode(' ', $hashtag);
    
                    
                    foreach($words as $word) {
                       
                        if (substr($word, 0, 1) == '#') {
                            
                            $hashtag = substr($word, 1);
                            
                           if (!in_array($hashtag, $processed_hashtags)) {
                $processed_hashtags[] = $hashtag; // Add to processed hashtags
                echo '<a href="hashtag.php?hashtag=' . $hashtag . '">' . $word . '</a> ';
            }
                         
                        } else {
                            
                            continue;
                        }
                    }
                    }
                ?>
            </div>
            
        </div>
           </div>
</div>
       
                        

                        <?php foreach($posts as $post): ?>
                                <?php
                                $user_id = $post['user_id'];
                                $user_stmt = $pdo->prepare("SELECT * FROM users WHERE id_u =?");
                                $user_stmt->execute([$user_id]);
                                $user = $user_stmt->fetch(PDO::FETCH_ASSOC);
                                ?>
                                <div class="card">
                                    <div class="card-header">
                                        
                                            
                                            <span class="username"><?php echo $user['username']; ?>  </span>
       <?php 
                                            if($session_id != $post['user_id']) {   
                                                $is_following_query = "SELECT COUNT(*) FROM user_follows WHERE follower_id = ? AND following_id = ?";
    $is_following_stmt = $pdo->prepare($is_following_query);
    $is_following_stmt->execute([$session_id,$user_id]);
    
    $is_following = $is_following_stmt->fetchColumn();   
    if($is_following){  
        echo '<form action=message.php method=get> 
        <input type=hidden value="'.$user['username'].'" name=receiver> 
        <button class="message" type="submit">Message </button>
        
        </form>';
        echo '<form action=unfollow.php method=post> 
        <input type=hidden value="'.$user['id_u'].'" name=unfollow_id> 
         <button class="follow" type="submit">Unfollow </button>
        </form>';
     }
        else{
        echo '<div class="followbutton">';
echo '<form action="follow.php" method="post">
    <input type="hidden" value="'.$post['user_id'].'" name="following_id">
     <button class="follow" type="submit">Follow </button>
</form>';
echo '</div>';
            }
          }   ?>                 
                                        
                                    </div>
                                    <div class="card-body p-0">
                                <img src="Pictures/<?php echo $post['filename']; ?>" alt="<?php echo $post['filename']; ?>">    <?php 
                                if($admin==1){ ?>
                                <form action="post_delete.php" method="post">
                                    <input type="hidden" name="post_id" value="<?= $post['id_p'];   ?>">
                                    <input type="submit" name="admin_izbris" value="Delete">
                                </form>
                                <?php
                                
                                    
                                }
                                
                                
                                
                                ?>
                                    <div class="d-flex flex-row justify-content-between pl-3 pr-3 pt-3 pb-1">
                                      <ul class="list-inline d-flex flex-row align-items-center m-0">
                                          <li class="list-inline-item">
                                            
                                          </li>
                                         
                                         
                                      </ul>                    
                                  </div>

                                  <form action="like.php" method="post" class="like-form">
    <input type="hidden" name="post_id" value="<?php echo $post['id_p']; ?>">
    <input type="hidden" name="user_id" value="<?php echo $session_id; ?>">
     <button type="submit" class="like-button">
         <?php $check_like_query = $pdo->prepare("SELECT * FROM likes WHERE user_id = ? AND post_id = ?");
    $check_like_query->execute([$session_id, $post['id_p']]);
    $existing_like = $check_like_query->fetch(); ?>
        <?php if ($existing_like): ?>
            <img src="assets/images/heart-red-svgrepo-com.svg" alt="heart2" id="heart">
        <?php else: ?>
            <img src="assets/images/heart-svgrepo-com.svg" alt="heart2" id="heart">
        <?php endif; ?>
    </button>
</form><div class="pl-3 pr-3 pb-2">
                                        <strong class="d-block"><?php $likesQuery = "SELECT COUNT(*) AS like_count FROM likes WHERE post_id=?";
    $stmt = $pdo->prepare($likesQuery);
    $stmt->execute([$post['id_p']]);
    $likeData = $stmt->fetch(PDO::FETCH_ASSOC);
    $like_count = $likeData['like_count'];
    echo $like_count." Likes";
    


                                        ?></strong>
                                        <strong class="d-block"><?php echo $user['username']; ?></strong>

                                        <p class="d-block mb-1"><?php    if($post['is_hashtag']==1)
                                        {
                                            $words = explode(' ', $post['caption']);
    
    
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
                                            echo $post['caption']; 
                                        }
                                        ?></p>
                                        <hr>
                                        </div>
                                        <div  class="comments" >
<p class="font-weight-bold" id="comments">Comments:</p>
<?php  
$commentsQuery="SELECT * FROM comments WHERE post_id=?";
$stmt=$pdo-> prepare($commentsQuery);
$stmt->execute([$post['id_p']]);
$comments=$stmt->fetchAll(PDO::FETCH_ASSOC);
foreach($comments as $comment) {
    $commenter_id = $comment['user_id'];
    $commenter_stmt = $pdo->prepare("SELECT username FROM users WHERE id_u = ?");
    $commenter_stmt->execute([$commenter_id]);
    $commenter = $commenter_stmt->fetch(PDO::FETCH_ASSOC);
?>
<div class="comment-container">
            <div class="comment">
                <?php echo $commenter['username']."  ". $comment['content']; ?>
              
                <span class="username" >
                    <?php if($session_id == $comment['user_id'] || $admin==1): ?>
                        <form action="comment_delete.php" method="post">
                            <input type="hidden" name="comment_id" value="<?= $comment['id_c']; ?>">
                            <input type="submit" value="Delete Comment" class="submit2">
                        </form>
                    <?php endif; ?>
                    
                </span>
                
            </div>
            <?php
?>
<?php
}
     ?>                          
                                        </div>
                                           <div><hr>  
                                        <form action="comment_insert.php" method="post">
                                            <div >
    <input class="comment-input"  placeholder="Add a comment..." name="comment_text" required minlength="2" maxlength="255">
    <input type="hidden" name="photo_id" value="<?php echo $post['id_p']; ?>">
    <input  type="submit" value="Post" class="submit">
                                            </div>
</form>

                                        </div>
                                    </div>

                                    
                                </div>
                          
                    </div>
            
                                    </div>
                                     </div>
                                     <?php endforeach; ?>
                                    </div>
                                    
                                   
</body>
</html>
