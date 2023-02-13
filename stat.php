<?php
$sql = new mysqli('localhost','shoxcoder0_ip','root','shoxcoder0_ip');
$data = "SELECT * FROM `stat`";
$res = mysqli_query($sql,$data);
$rb =  mysqli_fetch_all($res);
$db ="";
//print_r(mysqli_num_rows($rb));
for($i=0;$i<100;$i++){
    if(strlen($rb[$i][0])>3){
$db .=$rb[$i][0].",";
    }else{
        break;
    }  
}
file_put_contents('azolar.txt',$db);
?>