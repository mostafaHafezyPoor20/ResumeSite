<?php
if (isset($_POST["key"])&&isset($_POST["id"])){
    require_once ("../../../../Config/connDB.php");
    if ($_POST["key"]==KEY){
        $id=$_POST["id"];
        $conn->query("UPDATE `messages` SET `visited`='true' WHERE `id`='$id'");
        echo "200";
    }
}
?>