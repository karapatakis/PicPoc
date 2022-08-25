<?php 
echo '<form name="upload_photos" method="POST" action="php handles/image_upload.php" enctype="multipart/form-data">
    <input type="hidden" name="MAX_FILE_SIZE" value="41943040"/> 
    <input required class="login_fields" type="file" name="upfile"> 
    <br>
    <input class="login_fields" type="text" placeholder="tag your image" maxlength="30" name="tag"> 
    <br>
    <input class="login_fields" type="submit" name="submit" value="Upload">
</form>';
?>