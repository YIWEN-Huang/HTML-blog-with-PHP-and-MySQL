<?php
$link = @mysqli_connect("sql112.epizy.com","epiz_29599183","vB3qYtKnpld") 
or die("無法開啟MySQL資料庫連接!<br/>");

// 選取資料庫
mysqli_select_db($link, "epiz_29599183_blog");

?>