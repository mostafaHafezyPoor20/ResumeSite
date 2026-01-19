<?php
if (isset($_POST["key"])){
    require_once("../../../../Config/connDB.php");
    if ($_POST["key"]==KEY){
        $getAllExperiences=$conn->query("SELECT * FROM `work_experience`");
        $finalArray=array();
        while($row=$getAllExperiences->fetch_row()){
         $finalArray[]=array(
             "id"=>$row[0],
             "title"=>$row[1],
             "date"=>$row[2],
             "description"=>$row[3]
         );
        }
        echo json_encode($finalArray);
    }
}
?>