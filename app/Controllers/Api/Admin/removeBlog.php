<?php
if (isset($_POST["key"])&&isset($_POST["id"])){
    require_once ("../../../Config/connDB.php");
    if ($_POST["key"]==KEY){
        $id = $_POST["id"];
        $getBlog = $conn->query("SELECT * FROM `blog` WHERE `id`='$id'")->fetch_row();
        if (file_exists("../../../../$getBlog[1]")){
            unlink("../../../../$getBlog[1]");
        }
        $conn->query("DELETE FROM `blog` WHERE `id`='$id'");
        echo "200";
    }
}
?>