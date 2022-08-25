<?php
session_start();

$old=$_POST['old'];
$new=$_POST['new'];
$confirm=$_POST['confirm_new'];
// echo $new.$confirm;

//if passwords match
if($confirm!=$new){
    $_SESSION['selected']=1;
    header('location: ../account_settings.php');
}

//get user row
require('database_info.php');
$sql="SELECT * FROM users WHERE user_password=$old";
$res=mysqli_query($con, $sql);
$row=mysqli_fetch_array($res);
if(empty($row)){
    $_SESSION['selected']=1;
    echo "<script type='text/javascript'>alert('old Password is wrong!');
 location.href='../account_settings.php'</script>";
    // header('location: ../account_settings.php');
}

//set new password

$id=$row['id'];
$res=mysqli_query($con, "UPDATE users SET user_password=$new WHERE id=$id");
if(empty($res)){
    echo 'Error';
}
// echo 'Good '.$id;
echo "<script type='text/javascript'>alert('Password changed!');
location.href='../myprofile_screen.php'</script>";
// header('location: ../myprofile_screen.php');
?>