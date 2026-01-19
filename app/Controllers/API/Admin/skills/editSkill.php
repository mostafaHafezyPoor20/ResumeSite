<?php
 if (isset($_POST["key"])&&isset($_POST["id"])&&isset($_POST["title"])&&isset($_POST["percent"])){
     require_once("../../../../Config/connDB.php");
     if ($_POST["key"]==KEY){
         $id = $_POST["id"];
         $title = $_POST["title"];
         $percent = $_POST["percent"];
         $conn->query("UPDATE `skills` SET `title`='$title',`percent`='$percent' WHERE `id`='$id'");
         echo "200";

     }
 }
?>