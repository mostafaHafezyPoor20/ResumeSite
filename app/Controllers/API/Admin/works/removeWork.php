<?php
if (isset($_POST["key"])&&isset($_POST["id"])){
    require_once("../../../../Config/connDB.php");
    if ($_POST["key"]==KEY){
        $id = $_POST["id"];
        $getWork = $conn->query("SELECT * FROM `works` WHERE `id`='$id'")->fetch_row();
        if (file_exists("../../../../$getWork[1]")){
            unlink("../../../../$getWork[1]");
        }
        $conn->query("DELETE FROM `works` WHERE `id`='$id'");
        echo "200";
    }
}
?>