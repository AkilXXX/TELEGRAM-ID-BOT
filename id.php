<?php

function bot($method, $datas = []) {
$token = " ";//TOKEN 
$url = "https://api.telegram.org/bot$token/" . $method;
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $datas);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$res = curl_exec($ch);
curl_close($ch);
return json_decode($res, true);
}
function getupdates($up_id) {
$get = bot('getupdates', ['offset' => $up_id]);
return end($get['result']);
}



while (1) {
    
    
$get_up = getupdates($last_up + 1);
$last_up = $get_up['update_id'];
if ($get_up) {
    $message = $get_up['message'];
    $mid = $get_up['message']['message_id'];
    $userID = $message['from']['id'];
    $chat_id = $message['chat']['id'];
    $firstname = $message["from"]["first_name"]; 
     $text = $message['text'];
     


if($text == '/start'){




bot('sendMessage',[
        'chat_id'=>$chat_id,
         'text'=>"YOUR ID : $chat_id \n.BY  @AKIL828"]);
         } 
         
         
 

}
  
}
