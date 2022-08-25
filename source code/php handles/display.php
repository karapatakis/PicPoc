<?php
session_start();

$selection=$_POST['order'];

if($selection=='likes'){
    $_SESSION['order']="SELECT * FROM gallery ORDER BY like_counter DESC";
}else{
    $_SESSION['order']="SELECT * FROM gallery ORDER BY id DESC";
}
// echo $_SESSION['order'];
header("location: ../index.php");
?>