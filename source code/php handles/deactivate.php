<?php
session_start();

    ob_end_flush();
    //get user row
    require("database_info.php");
    $sql_for_user="SELECT * FROM users WHERE id='$_SESSION[id]'";
    $sql_for_gallery="SELECT * FROM gallery WHERE user_id='$_SESSION[id]'";
    //first get user
    $result=mysqli_query($con, $sql_for_user);
    $user=mysqli_fetch_array($result);

    //then get gallery
    $result=mysqli_query($con, $sql_for_gallery);
    $gallery=mysqli_fetch_array($result);


    //delete server images
    $location='../'.$gallery['photo_path'].$gallery['photo_name'].$gallery['extention'];

    if (!unlink($location)) {  
        echo $gallery['photo_name']." cannot be deleted due to an error<br>";  
    }  
    else {
        echo $gallery['photo_name']." has been deleted<br>";  
    }

    //delete server profile photo
    $location='../'.$user['profile_photo_path'];    echo $location;
        if (!unlink($location)) {  
        echo "profile photo cannot be deleted due to an error<br>";  
    }  
    else {
        echo  "profile photo has been deleted<br>";  
    }

    //delete the gallery row
    if(mysqli_query($con,"DELETE FROM gallery WHERE user_id='$_SESSION[id]'")){
        echo 'Error removing gallery row<br>';
    }

    //delete the user row
    if(mysqli_query($con, "DELETE FROM users WHERE id='$_SESSION[id]'")){
        echo 'Error removing user row <br>';
    }

    //delete the likes
    if(mysqli_query($con, "DELETE FROM likes WHERE user_id='$_SESSION[id]'")){
        echo 'Error removing all likes <br>';
    }

    //delete the comments
    if(mysqli_query($con, "DELETE FROM comments WHERE user_name='$_SESSION[username]'")){
        echo 'Error removing all comments <br>';
    }
    
    require('logout.php');
    header("location: ../index.php");
    ob_end_flush();
?>