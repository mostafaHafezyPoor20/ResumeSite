<?php
if (isset($_POST["key"])&&isset($_POST["icon"])&&isset($_POST["title"])&&isset($_POST["description"])){
    require_once ("../../../Config/connDB.php");
    if ($_POST["key"]==KEY){
        $icon = $_POST["icon"];
        $title = $_POST["title"];
        $description = $_POST["description"];
        $conn->query("INSERT INTO `services` (icon,title,description) VALUES ('$icon','$title','$description')");
        echo "200";
    }
}
?>
