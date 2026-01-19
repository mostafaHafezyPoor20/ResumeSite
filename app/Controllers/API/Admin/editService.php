<?php
if (isset($_POST["key"])&&isset($_POST["id"])&&isset($_POST["icon"])&&isset($_POST["title"])&&isset($_POST["description"])){
    require_once ("../../../Config/connDB.php");
    if ($_POST["key"]==KEY){
        $id = $_POST["id"];
        $icon = $_POST["icon"];
        $title = $_POST["title"];
        $description = $_POST["description"];
        $conn->query("UPDATE `services` SET `icon`='$icon' , `title`='$title' , `description`='$description' WHERE `id`='$id'");
        echo "200";
    }
}
?>
