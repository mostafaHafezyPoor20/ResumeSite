<?php
if (isset($_POST["key"])&&isset($_POST["name"])&&isset($_POST["summerSkill"])&&isset($_POST["telegram"])&&isset($_POST["instagram"])){
    require_once ("../../../Config/connDB.php");
    if ($_POST["key"]==KEY){
        $name = $_POST["name"];
        $summerSkill = $_POST["summerSkill"];
        $telegram = $_POST["telegram"];
        $instagram = $_POST["instagram"];
        file_put_contents("../../../Storage/name.txt",$name);
        file_put_contents("../../../Storage/summerSkill.txt",$summerSkill);
        file_put_contents("../../../Storage/telegram.txt",$telegram);
        file_put_contents("../../../Storage/instagram.txt",$instagram);
        echo "200";
    }
}
?>
