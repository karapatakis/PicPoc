<?php
session_start();
require('database_info.php');

$new=$_POST['new'];

$id=$_SESSION['id'];
//get to server
$res=mysqli_query($con,"UPDATE users SET user_name='$new' WHERE id=$id");
if(empty($res)){
    echo mysqli_connect_error().' error';
}
$_SESSION['username']=$new;
echo "<script type='text/javascript'>alert('Username changed!');
location.href='../myprofile_screen.php'</script>";
?>