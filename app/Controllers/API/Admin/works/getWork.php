<?php
if (isset($_POST["key"])&&isset($_POST["id"])){
    require_once("../../../../Config/connDB.php");
    if ($_POST["key"]==KEY){
        $id = $_POST["id"];
        $getWork = $conn->query("SELECT * FROM `works` WHERE `id`='$id'")->fetch_row();
        echo json_encode([
            "id"=>$getWork[0],
            "image"=>WEB_ADDRESS.$getWork[1],
            "title"=>$getWork[2],
            "description"=>$getWork[3]
        ]);
    }
}
?>