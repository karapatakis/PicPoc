<?php 
echo '


<form method="POST" name="registration_form" action="php handles/registration.php" enctype="multipart/form-data">
<table style="float: right;">
    <tr>
        <td><input required class="cred" minlength="2" maxlength="30" type="text" name="first_name" placeholder="First name" style=" width: 100%;"></td>
    </tr>
    <tr>
        <td><input required class="cred" minlength="5" maxlength="30" type="text" name="last_name" placeholder="Last name" style=" width: 100%;"></td>
    </tr>
    <tr>
        <td><input required class="cred" type="date" name="birthday" placeholder="Birthday" style=" width: 100%;"></td>
    </tr>
    <tr>
        <td><input required class="cred" minlength="2" maxlength="30" type="text" name="username" placeholder="Username" style=" width: 100%;"></td>
    </tr>
    <tr>
        <td><input required class="cred" minlength="3" maxlength="30" type="password" name="password" placeholder="Password" style=" width: 100%;"></td>
    </tr>
    <tr>
        <td><input required class="cred" minlength="3" maxlength="30" type="password" name="confirm_password" placeholder="Confirm password" style=" width: 100%;"></td>
    </tr>
    <tr>
        <td><input required class="cred" minlength="5" maxlength="30" type="email" name="email" placeholder="E-mail" style=" width: 100%;"></td>
    </tr>
    <tr>
        <td>
            <h4 style="margin-top:15px;">Select your sex: </h4><br>
        </td>
    </tr>
    <tr>
        <td style="text-align:center; padding-bottom:50px"><input required class="cred" type="radio" name="sex" value="male"> Male <input  class="cred" type="radio" name="sex" value="female"> Female <input  class="cred" type="radio" name="sex" value="other"> Other </td>
    </tr>
    <tr>
        <td>
            <h4 style="margin:0px 0px 0px 5px;">Select a profile picture (optional): </h4><br>
            <input type="hidden" name="MAX_FILE_SIZE" value="41943040" />
            <input required class="cred" type="file" name="upfile" style="margin:0px 5px 5px5px; width: 100%;">
            <br>
            <input style="float: left; padding:7px;" type="submit" name="submit"  class="cred" value="Register!">
            <input style="float: right; border:none; background:none; margin:5px; color: #4086c6; padding:8px;" type="reset" name="reset" value="Reset">
        </td>
    </tr>
</table>
</form>';
?> 