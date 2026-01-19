<?php
if (isset($_POST["key"])){
    require_once("../../../../Config/connDB.php");
    if ($_POST["key"]==KEY){
        $getAllSkills=$conn->query("SELECT * FROM `skills`");
        $finalArray=array();
        while($row=$getAllSkills->fetch_row()){
            $finalArray[]=[
                "id"=>$row[0],
                "title"=>$row[1],
                "percent"=>$row[2]
            ];
        }
        echo json_encode($finalArray);
    }
}
?>
