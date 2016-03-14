<?php
    include("../config/database.php");
    $target_dir = "/var/www/user/image/";
 echo $target_file = $target_dir . basename($_FILES["file"]["name"]);
    echo $tmp_name = $_FILES['file']['tmp_name'];
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    // Check if image file is a actual image or fake image
    if(move_uploaded_file($tmp_name, $target_file))
    {
        
    }
?>