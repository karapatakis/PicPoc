<?php

$db_host = "mariadb";
// Place the username for the MySQL database here
$db_username = "root"; 
// Place the password for the MySQL database here
$db_pass = ""; 
// Place the name for the MySQL database here
$db_name = "pic_poc_db";

// connection
$con = mysqli_connect("$db_host" ,"$db_username", "$db_pass");
if (!$con)
{
    echo "error connecting";
    die('Could not Connect My Sql:' .mysql_error());
}
mysqli_select_db($con, "$db_name");

// prin apo kathe INSERT gia ellinika
mysqli_set_charset ($con, 'utf8');
?>