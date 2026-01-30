<?php
if (isset($_POST["id"])){
    require_once ("../../../Config/connDB.php");
    $id =$conn->real_escape_string($_POST["id"]);
    $stmt=$conn->prepare(" SELECT * FROM `blog` WHERE `id`=?");
    $stmt->bind_param("s",$id);
    $stmt->execute();
    $getCountLike=$stmt->get_result()->fetch_row()[5];
    $getCountLike=$getCountLike+1;
    $conn->query("UPDATE `blog` SET `liked`='$getCountLike' WHERE `id`='$id'");
}

?>