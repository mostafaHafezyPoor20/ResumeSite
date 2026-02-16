<?php
if (isset($_POST["key"])&&isset($_POST["token"])){
    require_once ("../../../../Config/connDB.php");
    if ($_POST["key"]==KEY){
        $token=$_POST["token"];
        file_put_contents("../../../../Storage/tokenNotification.txt",$token);
        echo "200";
    }
}

?>