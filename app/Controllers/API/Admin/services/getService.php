<?php
 if (isset($_POST["key"])&&isset($_POST["id"])){
     require_once("../../../../Config/connDB.php");
     if ($_POST["key"]==KEY){
         $id = $_POST["id"];
         $getService = $conn->query("SELECT * FROM `services` WHERE `id`='$id'")->fetch_row();
         echo json_encode([
             "id"=>$getService[0],
             "icon"=>$getService[1],
             "title"=>$getService[2],
             "description"=>$getService[3]
         ]);
     }
 }
?>