    <?php

    include 'database.php';
    include 'session.php';

    $unfollowing_id=$_POST['unfollow_id'];
    $unfollower_id=$_SESSION['user_id'];

    echo $unfollower_id,$unfollowing_id;

    $unfollow_query="DELETE FROM user_follows WHERE following_id=? AND follower_id=?";
    $stmt=$pdo->prepare($unfollow_query);
    $stmt->execute([$unfollowing_id,$unfollower_id]);
    if($_SESSION['admin']==1){
    header("Location:homepage2.php");
    }else{
      header("Location:homepage2.php");
    }