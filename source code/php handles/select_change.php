<?php
session_start();


if(!empty($_POST)){
    
$_SESSION['selected']=$_POST['s'];
}
header("location: ../account_settings.php");
?>