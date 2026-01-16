<?php
if (isset($_POST["key"])&&isset($_POST["id"])&&isset($_POST["date"])&&isset($_POST["title"])&&isset($_POST["text"])){
    require_once ("../../../Config/connDB.php");
    if ($_POST["key"]==KEY){
        $id=$_POST["id"];
        $title=$_POST["title"];
        $date=$_POST["date"];
        $text=$_POST["text"];
        $conn->query("UPDATE `blog` SET `title`='$title',`date`='$date',`text`='$text' WHERE id='$id'");
        echo "200";

    }
}
?>