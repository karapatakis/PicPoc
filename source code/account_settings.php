<?php
// Start the session
session_start();
?>
	<!DOCTYPE html>
	<html lang="en">

	<head>
		<?php require ('php includes/html_head_include.php'); ?>
	</head>

	<body>
		<div class="container">
			<div id="headerwrap">
				<header id="mainheader" class="bodywidth clear"> <img src="images/favicon-96x96.png" style="width:60px; vertical-align: middle; height:60px;" class="logo">
					<!--
         'hgroup': It groups a set of <h1>–<h6> elements.
        -->
					<hgroup id="websitetitle">
						<h1><span class="bold">𝓟𝓲𝓬 𝓟𝓸𝓬 </span></h1>
						<h2>about as modern as it gets...</h2> </hgroup>
					<?php require('php includes/html_login_form.php'); ?>
						<!-- like comment icons -->
						<!-- <i class="fa fa-heart fa-lg"></i> -->
						<!-- <i class="fa fa-comment fa-lg"></i> --></header>
			</div>
			<!-- ASIDE START -->
			<aside id="introduction" class="bodywidth clear">
      <div id="introleft">
      <h2>Welcome to <span class="blue">our website,
        
        <?php
            if( isset($_SESSION['username']) && !empty($_SESSION['username'])){
               
                //profile photo of uploader
                require("php handles/database_info.php"); 
                $sql_pic="SELECT * FROM users WHERE id=$_SESSION[id]";
                $result_pic=mysqli_query($con, $sql_pic);
                $pic=mysqli_fetch_array($result_pic);
                if(empty($pic['profile_photo_path'])){
                  $pic['profile_photo_path']='images/pp_2.png';
                }
                echo '<img src="'.$pic['profile_photo_path'].'" height: 50px; width="50px" style="border: 2px solid #555; border-radius: 20%;">';
                
                //username of uploader
                echo $_SESSION["username"];
              }
        ?>
         </span></h2>
         </div>
    </aside>
			<div id="maincontent" class="bodywidth clear">
				<div id="aboutleft">

					<?php require('php includes/html_account_settings.php');?>
					
                </div>
			</div>
			<!-- MAIN END -->
			<!-- FOOTER START -->
			<div id="footerwrap" style="margin-top: 100%; bottom: 0;">
				<footer id="mainfooter" class="bodywidth clear">
					<nav class="clear"> <a href="#">Contact Us</a>
						<br>
						<h5 class="white"><small>&copy; 2020</h5> </nav>
					<p class="copyright"> Website Template by <a target="_blank" href="http://www.tristarwebdesign.co.uk/">Tristar</a>
						<br> Template by <a>Karapatakis</a> </p>
				</footer>
			</div>
			<!-- FOOTER END -->
		</div>
	</body>

	</html>