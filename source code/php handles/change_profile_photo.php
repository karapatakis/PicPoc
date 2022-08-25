<?php
session_start();
require('database_info.php');

//profile photo
$ferror =$_FILES['upfile']['error'];

if(!empty($_FILES) && ($ferror == '0')){
    // mb
    $mb = 1024*1024;
    //max size
    $max_file_size = "12";

    $fname = $_FILES['upfile']['name'];
    $ftype =$_FILES['upfile']['type'];
    $fsize =$_FILES['upfile']['size'];
    $ftmp_name =$_FILES['upfile']['tmp_name'];
    $upload_time = getdate();

    //destination folder
    $destination = "user_image_data/";
    
    //random name for each image
    $random_image_number = date('d-m-Y_H-i-s');
    $random_image_number .= "."; //adding dot
    //gettin file extention
    $extention = pathinfo($fname, PATHINFO_EXTENSION);
    
    //putting path together
    $destination .= $random_image_number.$extention;

    // Check if file size is acceptable
    if ($fsize > $mb * $max_file_size) {
        echo "<script type='text/javascript'>alert('Sorry, your file is too large. Try again');
        location.href='../account_settings.php'</script>";
    }
    // Check if file already exists
    elseif (file_exists($destination)) {
        echo "<script type='text/javascript'>alert('Sorry, file already exists.');
    location.href='../account_settings.php'</script>";
    }
}
else{
    $fsize =$_FILES['upfile']['size'];
    
    if( $fsize >= $_POST['MAX_FILE_SIZE'] && isset($_POST['MAX_FILE_SIZE'])) $ferror = 2;
    $phpFileUploadErrors = array(
        0 => 'There is no error, the file uploaded with success',
        1 => 'The uploaded file exceeds the upload_max_filesize directive in php.ini',
        2 => 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form',
        3 => 'The uploaded file was only partially uploaded',
        4 => 'No file was uploaded',
        6 => 'Missing a temporary folder',
        7 => 'Failed to write file to disk.',
        8 => 'A PHP extension stopped the file upload.',
    );
    echo "<script type='text/javascript'>alert('Error: $phpFileUploadErrors[$ferror]'); </script>";
}

$id=$_SESSION['id'];
//delete current photo
$sql="SELECT * FROM users WHERE id=$id";
$res=mysqli_query($con, $sql);
$path=mysqli_fetch_array($res);
$path='../'.$path['profile_photo_path'];
if (!unlink($path)) {  
    echo " cannot be deleted due to an error";  
}  
else {
    echo " has been deleted";  
}

//get to server
$res=mysqli_query($con,"UPDATE users SET profile_photo_path='$destination' WHERE id=$id");

if(empty($res)){
    echo mysqli_connect_error().' error';
}
move_uploaded_file($ftmp_name, '../'.$destination);
echo "<script type='text/javascript'>alert('Profile photo changed!');
location.href='../myprofile_screen.php'</script>";
// header("location: ../account_settings.php");
?>