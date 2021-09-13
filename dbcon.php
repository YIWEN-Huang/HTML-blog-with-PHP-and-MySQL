<?php
$link = @mysqli_connect("localhost","root","A12345678") 
or die("無法開啟MySQL資料庫連接!<br/>");

// 選取資料庫
mysqli_select_db($link, "blog");

?>