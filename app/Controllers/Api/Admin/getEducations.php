<?php
if (isset($_POST["key"])){
    require_once ("../../../Config/connDB.php");
    if ($_POST["key"]==KEY){
        $getAllEducation=$conn->query("SELECT * FROM `education`");
        $finalArray=array();
        while ($row=$getAllEducation->fetch_row()){
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
