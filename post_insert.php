<?php 
include_once 'database.php';
include_once 'session.php';


$post_caption=$_POST['caption'];

preg_match_all("/#\w+/", $post_caption, $matches);
$hashtags = $matches[0];

if(empty($hashtags)){
    $is_hashtag=0;
}
else{
    $is_hashtag=1;
}
$user_id=$_SESSION['user_id'];
$date=date('Y-m-d H:i:s');
$fileName = $_FILES['slika']['name'];
$fileType = $_FILES['slika']['type'];
$fileSize = $_FILES['slika']['size'];

$referring_page = $_SERVER['HTTP_REFERER'];

$target_dir = "Pictures/";
$target_file = $target_dir . $fileName;

$uploadOK=1;

if ($fileSize > 5000000) {
    $uploadOK = 0;
    $upload_error = "File size exceeds maximum limit (5MB).";
    echo $upload_error;
    header("Refresh:3;url=$referring_page");
}
$fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);
if ($fileExtension != "jpg" && $fileExtension != "png") {
    $uploadOK = 0;
    $upload_error = "Invalid file type. Only JPG and PNG files are allowed.";
    echo $upload_error;
   
   header("Refresh:3;url=$referring_page");
    
}

if($uploadOK===1){
    if (move_uploaded_file($_FILES["slika"]["tmp_name"], $target_file))
    {
        $insert_query="INSERT INTO posts(caption,filename,path,date,user_id,is_hashtag) VALUES  (?,?,?,?,?,?)";
        $stmt = $pdo->prepare($insert_query);
        $stmt->execute([$post_caption,$fileName,$target_file,$date,$user_id,$is_hashtag]);
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            
            header("Location: $referring_page");
            exit();
        }
    }
}






?>