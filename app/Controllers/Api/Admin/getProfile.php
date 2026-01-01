<?php
if (isset($_POST["key"])){
    require_once ("../../../Config/connDB.php");
    if ($_POST["key"] == KEY){
        $imageProfile=WEB_ADDRESS.file_get_contents("../../../Storage/imageProfile.txt");
        $name = file_get_contents("../../../Storage/name.txt");
        $summerSkill = file_get_contents("../../../Storage/summerSkill.txt");
        $telegram= file_get_contents("../../../Storage/telegram.txt");
        $instagram = file_get_contents("../../../Storage/instagram.txt");
        echo json_encode([
            "imageProfile"=>$imageProfile,
            "name" => $name,
            "summerSkill" => $summerSkill,
            "telegram" => $telegram,
            "instagram" => $instagram
        ]);
    }
}
?>
