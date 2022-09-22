<?php
    session_start();
    
    $given_name="$_POST[username]";
    $given_pass="$_POST[password]";

    //to login automaticaly after registration
    if(isset($_SESSION['username'])&&!empty($_SESSION['username'])){
        $given_name=$_SESSION['username'];
        $given_pass=$_SESSION['password'];
    }
    // trim credentials
    $given_name=trim($given_name);
    $given_pass=trim($given_pass);
        
    require("database_info.php");

    $sql ="SELECT * FROM users WHERE user_name='$given_name' AND user_password='$given_pass' ";
    $res = mysqli_query( $con, $sql);
    $_SESSION['id']=0;

    
    
    // tropos 2
        $count=mysqli_num_rows($res); // It returns the number of rows present in a result set. If no rows match the given criteria then it returns false instead.

        if($count != 1){
            echo "Not a valid user!";
        }else{
            $res1=mysqli_query($con, "SELECT * FROM users WHERE user_name='$given_name'");
            $user = mysqli_fetch_assoc($res1);

            $_SESSION['id']=$user['id'];
            // echo $_SESSION['id'];
            $_SESSION['username'] = $given_name;
            echo "OK! $count";
        }
    
    mysqli_close($con);
    header ("location: ./index.php");

?>