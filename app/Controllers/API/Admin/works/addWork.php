<?php
if (isset($_POST["key"])&&isset($_POST["title"])&&isset($_POST["description"])&&isset($_FILES["image"])){
    require_once("../../../../Config/connDB.php");
    if($_POST["key"]==KEY){
        $title = $_POST["title"];
        $description = $_POST["description"];
        $imageName=str_shuffle("qwertyuiopasdfghjklzxcvbnm1234567890") . $_FILES['image']['name'];
        senderEitaa($_FILES["image"]["tmp_name"],$title,$description);
        move_uploaded_file($_FILES['image']['tmp_name'],"../../../../../public/images/".$imageName);
        $imageName="public/images/".$imageName;
        $conn->query("INSERT INTO `works` (`image`,`title`,`description`) VALUES ('$imageName','$title','$description')");
        echo "200";
    }

}
function senderEitaa($file,$title,$caption){
    $caption=$title."
    ".$caption;
    $request=curl_init("https://eitaayar.ir/api/".EITAA_TOKEN_BOT."/sendFile");
    curl_setopt($request,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($request,CURLOPT_POST,true);
    curl_setopt($request,CURLOPT_PROXY_SSL_VERIFYHOST,0);
    curl_setopt($request,CURLOPT_POSTFIELDS,[
        'file'=>new \CURLFile($file),
        'chat_id'=>EITAA_CHANNEL_ID,
        'title'=>$title,
        'caption'=>$caption,
        'date'=>0
    ]);
    curl_exec($request);
    curl_close($request);

}
?>