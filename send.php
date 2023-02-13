<?php
$token = '5878752443:AAECgAuSWjwmHtO7Y-efnve5jG0IHdS8cXo';
error_reporting(0);

ob_start();

define('API_KEY',$token); 

#Functions

function bot($method,$datas=[]){
    $url = "https://api.telegram.org/bot".API_KEY."/".$method;
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
    $res = curl_exec($ch);
    if(curl_error($ch)){
        var_dump(curl_error($ch));
    }else{
        return json_decode($res);}
    }

if(isset($_GET['chatid'])){
$cid = $_GET['chatid'];
    bot('sendmessage',[
        'chat_id'=>$cid,
        'text'=>"<b>🛎 Sizning ip havolangizga kirishga harakat boldi !</b>",
        'parse_mode'=>'html',
        'reply_markup'=>$menu
    ]);
}
?>