<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php require('php includes/html_head_include.php');?>
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
          <h2>about as modern as it gets...</h2>
        </hgroup>
       
        <?php require('php includes/html_login_form.php');?>
       

      </header>
    </div>
    <!-- ASIDE START -->
    <aside id="introduction" class="bodywidth clear">
      <div id="introleft">
      <h2>Welcome to <span class="blue">our website,
        
        <?php
            if( isset($_SESSION['username']) && !empty($_SESSION['username'])){
               
                //profile photo of uploader
                require("php handles/database_info.php"); 
                $sql_pic="SELECT * FROM users WHERE id='$_SESSION[id]'";
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

          <div style="float:left;">
          <a style="float:none;" href="account_settings.php">Account Settings</a>
          <br><br>
          <?php require("php includes/html_image_upload_form.php"); ?>
        </div>
         
         
        

      <div  id="aboutleft">
        <div class="stream">


              <?php 
              require("php handles/database_info.php"); 
                $sql="SELECT * FROM gallery WHERE user_id='$_SESSION[id]' ORDER BY id DESC";
                $result=mysqli_query($con, $sql);
                $row=mysqli_fetch_array($result);
                
                  if(empty($row)){
                    echo "You haven't uploaded any photos to your profile.";
                  }else{
                  while($row){
                    //profile photo of uploader
                    $sql_pic="SELECT * FROM users WHERE id='$_SESSION[id]'";
                    $result_pic=mysqli_query($con, $sql_pic);
                    $pic=mysqli_fetch_array($result_pic);
                    if(empty($pic['profile_photo_path'])){
                      $pic['profile_photo_path']='images/pp_2.png';
                    }

                    //delete photo form
                    echo '
                    <form method="POST" action="php handles/delete_photo.php" name="delete">
                      <input type="hidden" name="photo_id" value="'.$row['id'].'"/> 
                      <input type="submit" name="delete_button" value="X" style="float:right; background-color: rgb(255, 138, 138); border-radius:4px;">
                    </form>';

                    //name of uploader
                    echo '<h4><img src="'.$pic['profile_photo_path'].'" height: 30px; width="30px" style="border: 4px solid #d84c6a; border-radius: 50%;">'.'by: "'.$_SESSION['username'];
                    echo '"<br>';
                    echo '<img src="'.$row['photo_path'].$row['photo_name'].$row['extention'].'"width="99%" style="border:4px solid #4086c6; border-radius: 10px;">';
                    echo '<br>';
                    echo $row['like_counter'].' likes';
                    if( isset($_SESSION['username']) && !empty($_SESSION['username'])){
                    echo '<form method="POST" action="php handles/like.php" name="like_form" style="float:left;">
                                <input type="hidden" value='.$row['id'].' name="photo_id">
                                <input type="submit" value="Like!" style="outline: none; border:2px solid #4086c6; color:#4086c6; border-radius: 20px; padding:2px 15px; font-family: Verdana;">
                              </form>';
                    }
                echo' | '.'Uploaded at ~ '.$row['upload_time'];
                    echo '</h4>';
                    echo '<br>';
                    //comments preview
                    $result1=mysqli_query($con, "SELECT * FROM comments WHERE photo_id='$row[id]' ");
                    $comment=mysqli_fetch_array($result1);
                    if($comment!=FALSE){
                      
                       echo '<div style=" border:2px solid #4086c6; color:#1411b8; border-radius: 20px; padding: 10px; font-size: larger; font-family: Comic Sans MS;">';
                     
                      while($comment){
                        
                        echo '['.$comment['user_name'].'] - "'.$comment['comment'].'"<small style="float:right;">[ '.$comment['time'].']</small>';
                      echo '<br>';
                      $comment=mysqli_fetch_array($result1);
                      }
                      echo '</div>';
                    }

                    echo '<br><div style="border-radius: 10px; border:2px #dbdbdb solid; padding:0 0 0 0; overflow:hidden;"></div>';
                    //getting image from database
                    $row=mysqli_fetch_array($result);
                    echo '<br>';
                  }
                }
              // close con
              mysqli_close($con);
              ?>

              </div>
      </div>
    </div>
        
    <!-- MAIN END -->






    <!-- FOOTER START -->
    <div id="footerwrap" style="margin-top: 100%; bottom: 0;">
      <footer id="mainfooter" class="bodywidth clear">

        <nav class="clear">
          <a href="#">Contact Us</a>
          <br>
          <h5 class="white"><small>&copy; 2020</h5>
        </nav>
        <p class="copyright">
          Website Template by
          <a target="_blank" href="http://www.tristarwebdesign.co.uk/">Tristar</a> <br>
          Template Perfected by <a>Karapatakis & Androutsos</a>
        </p>
      </footer>
    </div>
    <!-- FOOTER END -->
  </div>
</body>

</html>