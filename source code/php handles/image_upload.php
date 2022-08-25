<?php   
session_start();
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
    $tag=$_POST['tag'];
    $who=$_SESSION['id'];
    echo $who;
    $upload_time = getdate();

    //destination folder
    $destination = "../user_image_data/";
    $destination_0 = "user_image_data/";
    //random name for each image
    $random_image_number = date('d-m-Y_h-i-s');
    $random_image_number .= "."; //adding dot
    //gettin file extention
    $extention = pathinfo($fname, PATHINFO_EXTENSION);
    
    //putting path together
    $destination .= $random_image_number.$extention;

    // Check if file size is acceptable
    if ($fsize > $mb * $max_file_size) {
        echo "<script type='text/javascript'>alert('Sorry, your file is too large. Try again');
        location.href='../myprofile_screen.php'</script>";
    }
    // Check if file already exists
    elseif (file_exists($destination)) {
        echo "<script type='text/javascript'>alert('Sorry, file already exists.');
    location.href='../myprofile_screen.php'</script>";
    }
    else{
      
    
    // set database
    require("database_info.php");
    // insert
    mysqli_query($con, "INSERT INTO gallery (id, photo_path, photo_name, extention, like_counter, user_id, upload_time, photo_size, tag) VALUE (NULL,'$destination_0', '$random_image_number', '$extention', '0', '$who', '$upload_time[hours]:$upload_time[minutes]:$upload_time[seconds]', '$fsize', '$tag')") or die(mysqli_error($con));
    mysqli_close($con);
    echo $destination_0. $random_image_number. $extention. $fsize;
    move_uploaded_file($ftmp_name, $destination);
    header ("location: ../myprofile_screen.php");
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
    echo "<script type='text/javascript'>alert('Error: $phpFileUploadErrors[$ferror]');
    location.href='../myprofile_screen.php'</script>";
}
?>