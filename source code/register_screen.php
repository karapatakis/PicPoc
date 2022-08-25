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
      <h2>Register to <span class="blue">our website!</h2>
    </aside>
    <!-- ASIDE END -->

    <!-- MAIN START -->
    <div id="maincontent" class="bodywidth clear">

      <?php require("php includes/html_register_form.php");?>  

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
  
    <!-- <script src="https://cdn.jsdelivr.net/npm/darkmode-js@1.5.5/lib/darkmode-js.min.js"></script>
  <script>
    new Darkmode().showWidget();
  </script> -->
</body>

</html>