<?php
if (isset($_POST["key"])&&isset($_POST["id"])){
    require_once ("../../../Config/connDB.php");
    if ($_POST["key"]==KEY){
        $id=$_POST["id"];
        $getBlog=$conn->query("SELECT * FROM `blog` WHERE `id`='$id'")->fetch_row();
      echo json_encode([
          "id"=>$getBlog["0"],
          "image"=>WEB_ADDRESS.$getBlog["1"],
          "date"=>$getBlog["2"],
          "title"=>$getBlog["3"],
          "text"=>$getBlog["4"]
      ]);
    }
}
?>