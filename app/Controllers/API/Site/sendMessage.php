<?php
if (isset($_POST["name"])&&isset($_POST["phoneNumber"])&&isset($_POST["message"])){
    require_once ("../../../Config/connDB.php");
    $name=$conn->real_escape_string($_POST["name"]);
    $phoneNumber=$conn->real_escape_string($_POST["phoneNumber"]);
    $message=$conn->real_escape_string($_POST["message"]);
    if ($name!=""&&$phoneNumber!=""&&$message!=""){
        $stmt=$conn->prepare("INSERT INTO `messages` (`name`,`phoneNumber`,`message`) VALUES (?,?,?)");
        $stmt->bind_param("sss",$name,$phoneNumber,$message);
        $stmt->execute();
        $stmt->close();
        $key=urlencode(KEY);
        file_get_contents(WEB_ADDRESS."app/Controllers/API/Admin/notification/sendNotficationNewMessage.php?key=$key");
        echo "200";
    }
}
?>