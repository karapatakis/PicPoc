<?php 
echo ' 
<title>Pic Poc</title>
<meta charset="utf-8">
<link rel="icon" href="images/favicon-96x96.png"> <!-- tab icon -->
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
<link href="css/styles.css" rel="stylesheet">
 <link href="http://fonts.googleapis.com/css?family=Ubuntu:regular,bold" rel="stylesheet" > <!-- for ubuntu font -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css"> <!-- to use "like", "share" icons -->
<!--[if lt IE 9]>
<script src="js/html5.js"></script>
<script src="js/IE9.js"></script>
<![endif]-->
<script>
function myFunction() {
  document.getElementById("myForm").submit();
}
function checkForm() {
  var choice = confirm("Your data will be permanently deleted");
  
  if (choice) {
    return true ;
  }
  else if (!choice){
    return false;
  }
}

</script>';
?>