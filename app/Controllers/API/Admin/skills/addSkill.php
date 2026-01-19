<?php
if (isset($_POST["key"])&&isset($_POST["percent"])&&isset($_POST["title"])){
    require_once("../../../../Config/connDB.php");
    if ($_POST["key"]==KEY){
        $percent = $_POST["percent"];
        $title = $_POST["title"];
        $conn->query("INSERT INTO `skills` (`title`,`percent`) VALUES ('$title','$percent')");
        echo "200";
    }
}
?>