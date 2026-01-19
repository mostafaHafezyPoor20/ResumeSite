<?php
if(isset($_POST["key"])&&isset($_POST["titleAboutMe"])&&isset($_POST["descriptionAboutMe"])&&isset($_POST["email"])&&isset($_POST["phoneNumber"])&&isset($_POST["address"])){
    require_once ("../../../Config/connDB.php");
    if($_POST["key"]==KEY){
        $titleAboutMe=$_POST["titleAboutMe"];
        $descriptionAboutMe=$_POST["descriptionAboutMe"];
        $email=$_POST["email"];
        $phoneNumber=$_POST["phoneNumber"];
        $address = $_POST["address"];
        file_put_contents("../../../Storage/titleAboutMe.txt",$titleAboutMe);
        file_put_contents("../../../Storage/descriptionAboutMe.txt",$descriptionAboutMe);
        file_put_contents("../../../Storage/email.txt",$email);
        file_put_contents("../../../Storage/phoneNumber.txt",$phoneNumber);
        file_put_contents("../../../Storage/address.txt",$address);
        echo 200;
    }
}
?>
