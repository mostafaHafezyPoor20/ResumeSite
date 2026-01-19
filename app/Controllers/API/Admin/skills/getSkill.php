<?php
if (isset($_POST["key"])&&isset($_POST["id"])){
    require_once("../../../../Config/connDB.php");
    if ($_POST["key"]==KEY){
        $id = $_POST["id"];
        $getSkill = $conn->query("SELECT * FROM `skills` WHERE `id`='$id'")->fetch_row();
        echo json_encode(
            [
                "id"=>$getSkill[0],
                "title"=>$getSkill[1],
                 "percent"=>$getSkill[2]
            ]
        );
    }
}
?>

