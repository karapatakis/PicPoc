<?php 

if( !isset($_SESSION['username']) && empty($_SESSION['username']) )
        {
        echo '<div class="login">
            <form method="POST" action="php handles/credential_check.php" name="login_form">
                <table>

                    <tr>
                        <td>
                            <img src="images/un.png" alt="image" height="30" width="30" style="vertical-align: middle;">
                            <input required class="login_fields" type="text" minlength="2" maxlength="30" autofocus placeholder="Username" name="username"
                                style="vertical-align: middle;">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <img src="images/ps.png" alt="image" height="30" width="30" style="vertical-align: middle;">
                            <input required type="password" minlength="3" placeholder="Password" class="login_fields" name="password"
                                style="vertical-align: middle;">
                        </td>
                        <td>

                            <input class="login_fields" type="submit" value="Log in">
                        </td>
                        
                    </tr>
                    <tr>
                        <td>
                            <a href="index.php">Main Feed</a>
                        </td>
                        <td>
                            <a href="register_screen.php">Register?</a>
                        </td>
                    </tr>
                </table>
            </form>
        </div>';
}
else
     {
     echo '
     <div class="login">
        <table>
        <tr>
            <td style="text-align:center;">
                    <form  method="POST" action="php handles/logout.php">
                        <input class="login_fields" type="submit" value="Log out">
                    </form>
            </td>
        </tr>
        <tr>
            <td style="padding: 5px;">
                <a href="index.php">Main Feed</a>
            </td>
            <td style="padding: 5px;">
                <a href="myprofile_screen.php">My Profile</a>
            </td>
        </tr>
        </table> 
        </div>';
         
    }

?>