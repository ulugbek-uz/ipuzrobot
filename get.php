<?php
$sql = new mysqli('localhost','db_user','root','db_name');
$data = "SELECT COUNT(*) FROM `stat`";
$res = mysqli_query($sql,$data);
$d = mysqli_fetch_all($res);
echo $d[0][0];
?>
