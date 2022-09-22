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
      <header id="mainheader" class="bodywidth clear"> <img src="images/favicon-96x96.png" alt="" class="logo" style="width:60px; vertical-align: middle; height:60px;">
        <!--
         'hgroup': It groups a set of <h1>–<h6> elements.
        -->
        <hgroup id="websitetitle">
          <h1><span class="bold">𝓟𝓲𝓬 𝓟𝓸𝓬 </span></h1>
          <h2>about as modern as it gets...</h2>
        </hgroup>

        <?php require('php includes/html_login_form.php');?>


        <!-- like comment icons -->
        <!-- <i class="fa fa-heart fa-lg"></i> -->
        <!-- <i class="fa fa-comment fa-lg"></i> -->
        

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
    <!-- ASIDE END -->
    
    <!-- MAIN START -->
    <div id="maincontent" class="bodywidth clear">
      <div id="aboutleft">
        <form style="margin-right:5px;" method="POST" action="php handles/tag.php">
                      <table>
                          <tr>
                            <td><input type="text" name="search"  class="tag" placeholder="Search a tag..." style="vertical-align: middle;">
                            <input type="image" src="images/search_icon.png" onclick="myFunction()" style="width:32px; vertical-align: middle;"></td>
                          </tr>
                        </table>
                      </form>
                      
      <form style="margin-right:5px;" method="POST" action="php handles/display.php" name="display_form" id="display_form">
        <select  class="select" name="order" id="order">
          <option value="date">Most recent</option>
          <option value="likes">Most popular</option>
        </select>
        <input class="select" type="submit" value="next">
        </form>
        
        <br><br>
        <div class="stream">
        
          <?php 
              require("php handles/database_info.php");
             
                 
                if(empty($_SESSION['order'])){
                  //default display setting
                  $sql="SELECT * FROM gallery ORDER BY id DESC";
                }else{
                  //selected setting
                  $sql=$_SESSION['order'];
                }
                $result=mysqli_query($con, $sql);
                $row=mysqli_fetch_array($result);
               
                  if(empty($row)){
                    echo '<h4 style="text-align: center;">No photos uploaded yet.</h4>';
                  }else{
                          while($row){
                            $user_id=$row['user_id'];
                            //get profile photo of uploader
                            if(!empty($user_id)){
                              $sql_pic="SELECT * FROM users WHERE id='$user_id'";
                              $result_pic=mysqli_query($con, $sql_pic);
                              $pic=mysqli_fetch_array($result_pic);
                            }
                              
                            if(empty($pic['profile_photo_path'])){
                              $pic['profile_photo_path']='images/pp_2.png';
                            } 

                            //get username of uploader
                            
                            $result_who=mysqli_query($con, "SELECT user_name FROM users WHERE id='$user_id'");
                            $result_who=mysqli_fetch_array($result_who);
                            
                            //display uploader
                            echo '<h4> <img src="'.$pic['profile_photo_path'].'" height: 30px; width="30px"; style="border: 4px solid #d84c6a; border-radius: 50%;">'.'by: "'.$result_who['user_name'];
                            echo '"<br>';
                            echo '<img src="'.$row['photo_path'].$row['photo_name'].$row['extention'].'"width="99%" style="border:4px solid #4086c6; border-radius: 10px;">';
                            echo '<br>';
                            echo $row['like_counter'].' likes';

                            //like button
                            if( isset($_SESSION['username']) && !empty($_SESSION['username'])){
                            echo '<form method="POST" action="php handles/like.php" name="like_form" style="float:left;">
                                        <input type="hidden" value='.$row['id'].' name="photo_id">
                                        <input type="submit" value="Like!" style="outline: none; border:2px solid #4086c6; color:#4086c6; border-radius: 20px; padding:2px 15px; font-family: Verdana;">
                                    </form>';
                            }
                              echo' | '.'Uploaded at ~ '.$row['upload_time'];
                              echo '</h4>';

                            //comment adding 
                            if( isset($_SESSION['username']) && !empty($_SESSION['username'])){
                              echo '<br>
                              <form method="POST" action="php handles/comment.php" name="comment_form">
                                    <input type="hidden" value='.$row['id'].' name="photo_id">
                                    <input type="hidden" value='.$_SESSION["username"].' name="user_name">
                                    <input type="text" name="text"  placeholder="Type your comment"  style="margin:2px 0;width:96%;  padding: 8px; border-radius: 20px; border: 2px solid #4086c6;">
                                    <input type="submit" value="Comment!" style=" outline: none; border:2px solid #4086c6; color:#4086c6; border-radius: 20px; padding:3px 8px; font-family: Verdana;">
                                </form>';
                                echo '<br>';
                            }
                          
                            //comments preview
                            $result1=mysqli_query($con, "SELECT * FROM comments WHERE photo_id='$row[id]' ");
                            $comment=mysqli_fetch_array($result1);
                            if($comment != FALSE){
                              
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
                            $_SESSION['order']=NULL;
                            echo '<br>';
                  }
                }
              // close con
              mysqli_close($con);
              $_SESSION['selected']=NULL;
              ?>


        </div>
      </div>
    </div>
    <!-- MAIN END -->






    <!-- FOOTER START -->
    <div id="footerwrap" style="margin-top: 100%; bottom: 0;">
      <footer id="mainfooter" class="bodywidth clear" >

        <nav class="clear">
          <a href="#">Contact Us</a>
          <br>
          <h5 class="white"><small>&copy; 2020</h5>
        </nav>
        <p class="copyright">
          Website Template by
          <a target="_blank" href="http://www.tristarwebdesign.co.uk/">Tristar</a> <br>
          Template by <a>Karapatakis</a>
        </p>
      </footer>
    </div>
    <!-- FOOTER END -->
  </div>
  
    <!-- <script src="https://cdn.jsdelivr.net/npm/darkmode-js@1.5.5/lib/darkmode-js.min.js"></script>
  <script>
    new Darkmode().showWidget();
  </script> -->
</body>

</html>