<?php
if (isset($_POST['key'])){
    require_once("../../../../Config/connDB.php");
    if ($_POST["key"]==KEY){
        $getAllBlog=$conn->query("SELECT * FROM `blog`");
        $finalArray=[];
        while ($row=$getAllBlog->fetch_row()){
            $finalArray[]=[
                'id'=>$row[0],
                'image'=>WEB_ADDRESS.$row[1],
                'date'=>$row[2],
                'title'=>$row[3],
                'description'=>$row[4],
                'liked'=>$row[5],
                'view'=>$row[6]
            ];
        }
      echo json_encode($finalArray);
    }
}
?>