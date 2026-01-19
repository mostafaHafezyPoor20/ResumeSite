<?php
if (isset($_POST["key"])&&isset($_POST["id"])){
    require_once("../../../../Config/connDB.php");
    if ($_POST["key"]==KEY){
        $id = $_POST["id"];
        $getDetailWorkExperience = $conn->query("SELECT * FROM `work_experience` WHERE `id`='$id'")->fetch_row();
        echo json_encode([
            'id'=>$getDetailWorkExperience[0],
            'title'=>$getDetailWorkExperience[1],
            'date'=>$getDetailWorkExperience[2],
            'description'=>$getDetailWorkExperience[3]
        ]);
    }
}
?>
