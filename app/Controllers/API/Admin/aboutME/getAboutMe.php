<?php
if (isset($_POST["key"])){
    require_once("../../../../Config/connDB.php");
    if ($_POST["key"]==KEY){
      $titleAboutMe=file_get_contents("../../../../Storage/titleAboutMe.txt");
      $descriptionAboutMe=file_get_contents("../../../../Storage/descriptionAboutMe.txt");
      $address=file_get_contents("../../../../Storage/address.txt");
      $email=file_get_contents("../../../../Storage/email.txt");
      $phoneNumber=file_get_contents("../../../../Storage/phoneNumber.txt");
      echo json_encode([
          "titleAboutMe"=>$titleAboutMe,
          "descriptionAboutMe"=>$descriptionAboutMe,
          "address"=>$address,
          "email"=>$email,
          "phoneNumber"=>$phoneNumber
      ]);
    }
}

?>
