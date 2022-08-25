<?php
session_start();
require('database_info.php');

$photo=$_POST['photo_id'];
$user=$_SESSION['id'];

$sql="SELECT * FROM likes WHERE photo_id='$photo' AND user_id='$user' ";
$res=mysqli_query($con, $sql);
$liked=mysqli_fetch_array($res);
if(empty($liked)){
    echo 'You have not liked the photo<br>';
    $sql="INSERT INTO likes (id, user_id, photo_id) VALUES (NULL, '$user', '$photo')";
    $liked=mysqli_query($con, $sql);
    if(empty($liked)){
        echo 'Error liking the photo<br>';
    }else{
        echo 'photo liked<br>';
    }
}else{
    echo 'You have already liked the photo<br>';
    $sql="DELETE FROM likes WHERE photo_id='$photo' AND user_id='$user' ";
    $disliked=mysqli_query($con, $sql);
    if(empty($disliked)){
        echo 'Error disliking the photo<br>';
    }else{
        echo 'photo disliked<br>';
    }
}
//echo 'current like count:';
$sql="SELECT * FROM likes WHERE photo_id='$photo' ";
$res=mysqli_query($con, $sql);
//current like count
$likes=mysqli_num_rows($res);

//add current like count to photo row
$sql="UPDATE gallery SET like_counter = '$likes' WHERE id = '$photo' ";
$res=mysqli_query($con, $sql);
if(empty($res)){
    echo 'error';
}
header("location: ../index.php")
?>

