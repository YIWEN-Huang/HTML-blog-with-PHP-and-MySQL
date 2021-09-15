<?php
$link = @mysqli_connect("127.0.0.1","antinnab_blog","QAZ951zaq") 
or die("無法開啟MySQL資料庫連接!<br/>");

// 選取資料庫
mysqli_select_db($link, "antinnab_blog");

?>