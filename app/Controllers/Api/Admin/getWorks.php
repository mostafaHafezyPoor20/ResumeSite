<?php
if (isset($_POST["key"])){
    require_once ("../../../Config/connDB.php");
    if ($_POST["key"]==KEY){
        $getAllWorks =$conn->query("SELECT * FROM `works`");
        $finalArray=[];
        while($row=$getAllWorks->fetch_row()){
            $finalArray[]=[
                "id"=>$row[0],
                "image"=>WEB_ADDRESS.$row[1],
                "title"=>$row[2],
                "description"=>$row[3]
            ];
        }
        echo json_encode($finalArray);
    }
}
?>