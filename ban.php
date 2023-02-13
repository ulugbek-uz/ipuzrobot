<?php
$sql = new mysqli('localhost','shoxcoder0_ip','root','shoxcoder0_ip');
$data ="CREATE TABLE IF NOT EXISTS ban(chatid VARCHAR(10))";
mysqli_query($sql,$data);

if(isset($_GET['unban'])){
    $chatid = $_GET['unban'];
    $unban = "DELETE FROM `ban` WHERE chatid='$chatid'";
    mysqli_query($sql,$unban);
}elseif(isset($_GET['info'])){
    $chatinfo = $_GET['info'];
    $info ="SELECT * FROM `ban` WHERE chatid='$chatinfo'";
    $res = mysqli_query($sql,$info);
    $num =mysqli_num_rows($res);
    if($num>0){
        echo "False";
    }else{
        echo 'True';
    }
}elseif(isset($_GET['ban'])){
    $ban = $_GET['ban'];
    $banid = "INSERT INTO ban (chatid) values('$ban')";
    mysqli_query($sql,$banid);
    echo "ok";
}



?>