<?php
session_start();
require("database_info.php");

$text=$_POST['text'];
$who=$_POST['user_name'];
$photo_id=$_POST['photo_id'];
$time=date('h:i:s');

if(!empty($text)){
    $sql="INSERT INTO comments(id, user_name, photo_id, comment, time) VALUES (NULL, '$who', '$photo_id', '$text', '$time')";
    $comment=mysqli_query($con, $sql);
    if ($comment== FALSE){
        echo 'Error commenting the photo<br>';
    }
   
}

 header("location: ../index.php");
?>