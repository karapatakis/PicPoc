<?php
session_start();
require('database_info.php');

//photo to delete
$id=$_POST['photo_id'];
$result=mysqli_query($con, "SELECT * FROM gallery WHERE id=$id");
$row=mysqli_fetch_array($result);


//delete local file
$location='../'.$row['photo_path'].$row['photo_name'].$row['extention'];
if (!unlink($location)) {  
    echo $row['photo_name']." cannot be deleted due to an error";  
}  
else {
    echo $row['photo_name']." has been deleted";  
}

//delete likes
$sql="DELETE FROM likes WHERE photo_id = $row[id]";
$result=mysqli_query($con, $sql);
if(!$result){
    echo '<br>Error deleting the likes from db...';
}else{
    echo '<br>Removed likes from db';
}

//delete comments
$sql="DELETE FROM comments WHERE photo_id = $row[id]";
$result=mysqli_query($con, $sql);
if(!$result){
    echo '<br>Error deleting the comments from db...';
}else{
    echo '<br>Removed comments from db';
}

//delete row from gallery
$sql="DELETE FROM gallery WHERE id = $row[id]";
$result=mysqli_query($con, $sql);
if(!$result){
    echo '<br>Error deleting the photo from db...';
}else{
    echo '<br>Removed photo from db';
}

header("location: ../myprofile_screen.php");
mysqli_close($con);
?>