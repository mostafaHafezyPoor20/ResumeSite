<?php
if (isset($_POST["key"])&&isset($_POST["id"])){
    require_once ("../../../Config/connDB.php");
    if ($_POST["key"]==KEY){
        $id = $_POST["id"];
        $conn->query("DELETE FROM `work_experience` WHERE `id`='$id'");
        echo "200";
    }
}

?>
