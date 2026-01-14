<?php
if (isset($_POST["key"])&&isset($_POST["id"])&&isset($_FILES["image"])){
    require_once ("../../../Config/connDB.php");
    if ($_POST["key"]==KEY){
        $id = $_POST["id"];
        $getWork = $conn->query("SELECT * FROM `works` WHERE `id`='$id'")->fetch_row();
        if (file_exists("../../../../".$getWork[1])){
            unlink("../../../../".$getWork[1]);
        }
        $imageName =str_shuffle("qwertyuiopasdfghjklzxcvbnm0123456789").$_FILES["image"]["name"];
        move_uploaded_file($_FILES['image']['tmp_name'],"../../../../public/images/".$imageName);
        $imageName="public/images/".$imageName;
        $conn->query("UPDATE `works` SET `image`='$imageName' WHERE `id`='$id'");
        echo "200";
    }
}
?>