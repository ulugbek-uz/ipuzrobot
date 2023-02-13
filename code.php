<?php
print_r($_SERVER);
$urlb = "/var/www/m_2289/data/www/mycoder.ga/ip/";
$sql = new mysqli('localhost','shoxcoder0_ip','root','shoxcoder0_ip');
$data ="CREATE TABLE IF NOT EXISTS stat(chatid VARCHAR(20))";
mysqli_query($sql,$data);
if(isset($_GET['start'])){
    $id = $_GET['start'];
    $info ="SELECT * FROM `stat` WHERE chatid='$id'";
    $res = mysqli_query($sql,$info);
    $num = mysqli_num_rows($res);
    if($num>0){
        echo "ok";
    }else{
        $txt ="INSERT INTO stat(chatid) values('$id')";
        mysqli_query($sql,$txt);
        echo "add";
mkdir($urlb.$id);
fopen($urlb.$id."/chatid.txt","wr");
file_put_contents($urlb.$id."/chatid.txt",$id);
copy("./db.php",$urlb.$id."/index.php");
    }
}


?>