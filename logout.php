<?php

//開啟Session
session_start();
//清除Session
session_destroy();
//導到login.php
header("Location:memberlogin.php");
?>