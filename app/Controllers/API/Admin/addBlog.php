<?php
if (isset($_POST["key"])&&isset($_POST["title"])&&isset($_POST["date"])&&isset($_POST["text"])&&isset($_FILES["image"])){
   require_once ("../../../Config/connDB.php");
    if ($_POST["key"]==KEY){
        $title=$_POST["title"];
        $date=$_POST["date"];
        $text=$_POST["text"];
        $imageName=str_shuffle("qwertyuiopasdfghjklzxcvbnm0123456789").$_FILES["image"]["name"];
        move_uploaded_file($_FILES["image"]["tmp_name"],"../../../../public/images/".$imageName);
        $imageName="public/images/".$imageName;
        $conn->query("INSERT INTO `blog` (`image`,`title`,`date`,`text`) VALUES ('$imageName','$title','$date','$text')");
        echo "200";
    }
}
?>