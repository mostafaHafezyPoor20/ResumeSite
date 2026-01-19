<?php
if (isset($_POST["key"])){
    require_once("../../../../Config/connDB.php");
    if ($_POST["key"]==KEY){
        $getAllMessagesNotVisited=$conn->query("SELECT * FROM `messages` WHERE `visited`='false'");
        $finalArray=[];
        while ($row=$getAllMessagesNotVisited->fetch_row()){
            $finalArray[]=[
                "id"=>$row[0],
                "name"=>$row[1],
                "phoneNumber"=>$row[2],
                "message"=>$row[3],
                "visited"=>$row[4]
            ];
        }
        $getAllMessagesVisited=$conn->query("SELECT * FROM `messages` WHERE `visited`='true'");
        while ($row=$getAllMessagesVisited->fetch_row()){
            $finalArray[]=[
                "id"=>$row[0],
                "name"=>$row[1],
                "phoneNumber"=>$row[2],
                "message"=>$row[3],
                "visited"=>$row[4]
            ];
        }
        echo json_encode($finalArray);
    }
}

?>