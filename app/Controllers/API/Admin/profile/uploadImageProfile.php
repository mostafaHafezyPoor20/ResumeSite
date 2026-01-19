<?php
if (isset($_POST["key"])&isset($_FILES["image"])){
    require_once("../../../../Config/connDB.php");
    if ($_POST["key"]==KEY){
        if (file_exists("../../../../../".file_get_contents("../../../Storage/imageProfile.txt"))){
            unlink("../../../../../".file_get_contents("../../../Storage/imageProfile.txt"));
        }
        move_uploaded_file($_FILES["image"]["tmp_name"],"../../../../../public/images/".$_FILES["image"]["name"]);
        file_put_contents("../../../../Storage/imageProfile.txt","public/images/".$_FILES["image"]["name"]);
    }
}
?>
