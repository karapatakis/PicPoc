<?php
    
    echo '
    <h1 style="text-align:center;">Settings</h1>
    <br>
    <form method="POST" action="php handles/select_change.php" id="myForm">
        <table  style="width:100%; text-align:center;">
            <tr>
                <td class="login_fields"><label for="2">Change your Username</label><input style="float:right; margin:2px;" type="checkbox" value="2" onclick="myFunction()" name="s" id="2"></td>
            </tr>
            <tr>
                <td class="login_fields"><label for="1">Change your Password</label><input style="float:right; margin:2px;"type="checkbox" value="1" onclick="myFunction()" name="s" id="1"></td>
            </tr>
            <tr>
                <td class="login_fields"><label for="3">Change your Profile Photo</label><input style="float:right; margin:2px;" type="checkbox" value="3" onclick="myFunction()" name="s" id="3"></td>
            </tr>
        </table>
    </form><br>';
    
    // change password
    if($_SESSION['selected']=='1'){
   echo ' <form style="border: 3px solid #abbad6; border-radius: 20px; padding:10px;" method="POST" action="php handles/change_password.php" name="change_password">
            <h3>Reset your Password</h3>
            <input class="login_fields" type="text" minlength="5" maxlength="30" placeholder="Old password" name="old">
            <input class="login_fields" type="text" minlength="5" maxlength="30" placeholder="New password" name="new">
            <input class="login_fields" type="text" minlength="5" maxlength="30" placeholder="Confirm new password" name="confirm_new">
            <input class="login_fields" type="submit"  value="change">
        </form>';
        // change username
    }elseif($_SESSION['selected']=='2'){
        echo '<form style="border: 3px solid #abbad6; border-radius: 20px; padding:10px;" method="POST" action="php handles/change_usesrname.php" name="change_usesrname">
        <h3>Change your Username</h3>
        <input class="login_fields" type="text" minlength="5" maxlength="30" placeholder="New Username" name="new">
        <input class="login_fields" type="submit" value="change">
    </form>';
    // change profile pic
    }elseif($_SESSION['selected']=='3'){
        echo '<form style="border: 3px solid #abbad6; border-radius: 20px; padding:10px;" method="POST" action="php handles/change_profile_photo.php" name="change_profile" enctype="multipart/form-data">
        <h3>Change your Profile Photo</h3>
        <h4>Select a profile picture: </h4>
            <input type="hidden" name="MAX_FILE_SIZE" value="41943040" />
            <input class="login_fields" type="file" name="upfile">
            <input class="login_fields" type="submit" name="submit" value="change">
    </form>';
    }
    echo '<form onsubmit="return checkForm()" method="POST" action="php handles/deactivate.php">
                <input type="submit" value="Deactivate account" style="float:right; background-color: rgb(255, 77, 77); padding:0 4px; border-radius:4px;">
                <input type="checkbox" required style="float:right; background-color: rgb(255, 77, 77); padding:0 4px; border-radius:4px;">
            </from>';

    //to log out
    $_SESSION['selected']=NULL;
    ?>