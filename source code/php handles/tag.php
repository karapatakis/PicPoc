<?php
session_start();
require("database_info.php");

$value=$_POST['search'];
$value=trim($value);
// echo $value;
ob_start();
if(empty($value)){
    echo 'Nothing to search';
}else{
    $_SESSION['order']="SELECT * FROM gallery WHERE tag='$value' ORDER BY id DESC";
    // $res=mysqli_query($con, $_SESSION['order']);
    // $img=mysqli_fetch_array($res);
    // while($img){
    // echo $img['id'];
    // $img=mysqli_fetch_array($res);
    // }
}
header("location: ../index.php");
ob_end_flush();
?>