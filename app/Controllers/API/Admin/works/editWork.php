<?php
if (isset($_POST["key"])&&isset($_POST["id"])&&isset($_POST["title"])&&isset($_POST["description"])){
    require_once("../../../../Config/connDB.php");
    if ($_POST["key"]==KEY){
        $id = $_POST["id"];
        $title=$_POST["title"];
        $description=$_POST["description"];
        $conn->query("UPDATE `works` SET `title`='$title',`description`='$description' WHERE `id`='$id'");
        echo "200";
    }
}
?>