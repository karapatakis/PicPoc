<?php 
session_start();

$Ufirstname=trim($_POST['first_name']);
$Ulastname=trim($_POST['last_name']);
$Ubirthday=trim($_POST['birthday']);
$Uusername=trim($_POST['username']);
$Upassword=trim($_POST['password']);
$confirm_password=trim($_POST['confirm_password']);
$Umail=trim($_POST['email']);
$Usex=trim($_POST['sex']);

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
        echo "<script type='text/javascript'>alert('Sorry, your image file is too large. Try again');
        location.href='../register_screen.php'</script>";
    }
    // Check if file already exists
    elseif (file_exists($destination)) {
        echo "<script type='text/javascript'>alert('Sorry, image file already exists.');
    location.href='../register_screen.php'</script>";
    }
}
else{
    $fsize =$_FILES['upfile']['size'];
    
    if( $fsize >= $_POST['MAX_FILE_SIZE'] && isset($_POST['MAX_FILE_SIZE']))
    $ferror = 2;
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
    location.href='../register_screen.php'</script>";
}


if(isset($Ufirstname) && isset($Ulastname) &&isset ($Ubirthday) &&isset ($Uusername) &&isset ($Upassword) && isset($Usex) && isset($Umail)){
    if(!empty($Ufirstname) && !empty($Ulastname) && !empty ($Ubirthday) && !empty ($Uusername) && !empty ($Upassword) && !empty($Usex) && !empty($Umail)){
        if($Upassword != $confirm_password){
            echo "<script type='text/javascript'> alert('Password confirmation error, passwords don't match');
            location.href = '../register_screen.php'</script>";
        }else{
            // importing to database
            require("database_info.php");
            
            $res=mysqli_query($con, "INSERT INTO users (id, user_name, user_password, profile_photo_path, first_name, last_name, birthday, mail, gender) VALUE(NULL, '$Uusername', '$Upassword','$destination', '$Ufirstname', '$Ulastname', '$Ubirthday', '$Umail', '$Usex')");
            move_uploaded_file($ftmp_name, '../'.$destination);
            echo $destination;
            mysqli_close($con);
            if(!$res){
                echo "<script type='text/javascript'>alert('Mail or username already exists');
            location.href='../register_screen.php'</script>";
            }else{
                $_SESSION['username']=$Uusername;
                $_SESSION['password']=$Upassword;
                require("credential_check.php");
            }
        }
    }
    else{
    echo "<script type='text/javascript'> alert('fill all the fields ');</script>
    location.href='../register_screen.php'";
    }
}
mysqli_close($con);


?>