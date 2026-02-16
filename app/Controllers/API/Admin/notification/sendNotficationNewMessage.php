<?php
require_once ("../../../../../vendor/autoload.php");
require_once ("../../../../Config/connDB.php");
use Google\Client as GoogleClient;
use GuzzleHttp\Client as GuzzleClient;
if(!isset($_GET["key"])){
    return;
}else if (urldecode($_GET["key"])!=KEY){
    return;
}
//get token user
$tokenUser=file_get_contents("../../../../Storage/tokenNotification.txt");
//dir file service account json
$serviceAccountPath="ahmmad-askarinya-panel-site-firebase-adminsdk-fbsvc-6d31ac262b.json";
$projectId="ahmmad-askarinya-panel-site";

//Google client for Access Token
$googleClient=new GoogleClient();
$googleClient->setAuthConfig($serviceAccountPath);
$googleClient->addSCope('https://www.googleapis.com/auth/firebase.messaging');

//get access token
$accessToken=$googleClient->fetchAccessTokenWithAssertion()['access_token'];

//payload notification
$payload=[
    "message"=>[
        "token"=>$tokenUser,
        "notification"=>[
            "title"=>"پیام جدید",
            "body"=>"شما یک پیام جدید دارید . برای برسی کلیک کنید"
        ]
    ]
];

//send with Guzzle
$client = new GuzzleClient(["timeout"=>10]);
$response = $client->post("https://fcm.googleapis.com/v1/projects/{$projectId}/messages:send",[
    "headers" => [
        'Authorization' => "Bearer {$accessToken}",
        "Content-Type" => "application/json"
    ],
    'json' => $payload
]);
$result = json_encode($response->getBody(),true);
print_r($result);
?>