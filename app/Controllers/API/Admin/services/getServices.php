<?php
if (isset($_POST["key"])){
    require_once("../../../../Config/connDB.php");
    if ($_POST["key"]==KEY){
     $getAllServices=$conn->query("SELECT * FROM `services`");
     $finalArray=array();
     while($row=$getAllServices->fetch_row()){
         $finalArray[]=array(
             "id"=>$row[0],
             "icon"=>$row[1],
             "title"=>$row[2],
             "description"=>$row[3]
         );
     }
     echo json_encode($finalArray);
    }
}

?>
