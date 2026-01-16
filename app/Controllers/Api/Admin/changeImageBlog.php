<?php
if (isset($_POST["key"])&&isset($_POST["id"])&&isset($_FILES["image"])){
require_once ("../../../Config/connDB.php");
if ($_POST["key"]==KEY){
    $id = $_POST["id"];
    $getBlog = $conn->query("SELECT * FROM `blog` WHERE id='$id'")->fetch_row();
    if (file_exists("../../../../".$getBlog[1])){
        unlink("../../../../".$getBlog[1]);
    }
    $imageName=str_shuffle("qwertyuiopasdfghjklzxcvbnm0123456789").$_FILES["image"]["name"];
    move_uploaded_file($_FILES["image"]["tmp_name"],"../../../../public/images/".$imageName);
    $imageName="public/images/".$imageName;
    $conn->query("UPDATE `blog` SET `image`='$imageName' WHERE id='$id'");
    echo "200";
}
}
?>
