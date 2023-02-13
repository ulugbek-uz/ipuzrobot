<?php
$sql = new mysqli('localhost','shoxcoder0_ip','root','shoxcoder0_ip');
$data = "SELECT COUNT(*) FROM `stat`";
$res = mysqli_query($sql,$data);
$d = mysqli_fetch_all($res);
echo $d[0][0];
?>