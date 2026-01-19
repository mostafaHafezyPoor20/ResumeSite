<?php
if (isset($_POST["key"])&&isset($_POST["title"])&&isset($_POST["date"])&&isset($_POST["description"])) {
    require_once("../../../../Config/connDB.php");
    if ($_POST["key"]==KEY){
        $id = $_POST["id"];
        $title = $_POST["title"];
        $date = $_POST["date"];
        $description = $_POST["description"];
        $conn->query("UPDATE `work_experience` SET `title`='$title',`date`='$date',`description`='$description' WHERE `id`='$id'");
        echo "200";
    }
}

?>
