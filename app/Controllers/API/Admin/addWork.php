<?php
if (isset($_POST["key"])&&isset($_POST["title"])&&isset($_POST["description"])&&isset($_FILES["image"])){
    require_once ("../../../Config/connDB.php");
    if($_POST["key"]==KEY){
        $title = $_POST["title"];
        $description = $_POST["description"];
        $imageName=str_shuffle("qwertyuiopasdfghjklzxcvbnm1234567890").$_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'],"../../../../public/images/".$imageName);
        $imageName="public/images/".$imageName;
        $conn->query("INSERT INTO `works` (`image`,`title`,`description`) VALUES ('$imageName','$title','$description')");
        echo "200";
    }
}
?>