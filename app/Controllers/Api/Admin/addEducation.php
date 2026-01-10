<?php
if (isset($_POST["key"])&&isset($_POST["title"])&&isset($_POST["date"])&&isset($_POST["description"])){
    require_once ("../../../Config/connDB.php");
    if ($_POST["key"]==KEY){
        $title=$_POST["title"];
        $date=$_POST["date"];
        $description=$_POST["description"];
        $conn->query("INSERT INTO `education` (`title`, `date`, `description`) VALUES ('$title', '$date', '$description')");
        echo "200";
    }
}

?>