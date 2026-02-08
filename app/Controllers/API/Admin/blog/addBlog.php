<?php
require_once ("../../../../../vendor/autoload.php");
use RubikaBot\Bot;

if (isset($_POST["key"])&&isset($_POST["title"])&&isset($_POST["date"])&&isset($_POST["text"])&&isset($_FILES["image"])){
   require_once("../../../../Config/connDB.php");
    if ($_POST["key"]==KEY){
        $title=$_POST["title"];
        $date=$_POST["date"];
        $text=$_POST["text"];
        $imageName=str_shuffle("qwertyuiopasdfghjklzxcvbnm0123456789") . $_FILES["image"]["name"];
        move_uploaded_file($_FILES["image"]["tmp_name"],"../../../../../public/images/".$imageName);
        $imageName="public/images/".$imageName;
        $conn->query("INSERT INTO `blog` (`image`,`title`,`date`,`text`) VALUES ('$imageName','$title','$date','$text')");
        senderBale("../../../../../".$imageName,$title,$text);
        senderEitaa("../../../../../".$imageName,$title,$text);
        senderRubika("../../../../../".$imageName,$title,$text);
        echo "200";
    }
}
function senderEitaa($file,$title,$caption){
    $caption=$title.
        "
        "
        .$caption;
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

function senderBale($file,$title,$description){
    $caption=$title."
    ".$description;
    $request=curl_init("https://tapi.bale.ai/bot".BALE_TOKEN_BOT."/sendPhoto");
    curl_setopt($request,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($request,CURLOPT_POST,true);
    curl_setopt($request,CURLOPT_POSTFIELDS,[
        "chat_id"=>BALE_CHANNEL_ID,
        "photo"=>new \CURLFile($file),
        "caption"=>$caption
    ]);
    curl_exec($request);
    curl_close($request);
}
function senderRubika($file,$title,$description){
    $caption=
        $title
        ."
        "
        .$description;
    $bot=new Bot(RUBIKA_TOKEN_BOT);
    $bot->chat(RUBIKA_CHANNEL_ID)->file($file)->caption($caption)->sendFile();
}
?>