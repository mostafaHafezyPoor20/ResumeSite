<?php
if (isset($_POST["key"])&&isset($_POST["id"])){
    require_once("../../../../Config/connDB.php");
    if ($_POST["key"]==KEY){
        $id = $_POST["id"];
        $getEducation = $conn->query("SELECT * FROM `education` WHERE `id` = '$id'")->fetch_row();
        echo json_encode(array(
            "id"=>$getEducation["0"],
            "title"=>$getEducation["1"],
            "date"=>$getEducation["2"],
            "description"=>$getEducation["3"]

        ));
    }


}

?>