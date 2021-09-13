<?php 
session_start();
if(isset($_SESSION['login_session'])) { 
    header("Location: manager.php");
}else{

?>
<link rel="stylesheet" href="css/login.css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<?php
    $account = ""; $password = "";
    if (isset($_POST["account"])){
        $account = $_POST["account"];
        $login_session = $account;
    }
    if (isset($_POST["password"])){
        $password = $_POST["password"];
    }
    if ($account != "" && $password != ""){
        include("dbcon.php");
        mysqli_query($link, 'SET NAMES utf8'); 
        $sql = "SELECT * FROM account WHERE account='$account'  AND password='$password'";
        $result = mysqli_query($link, $sql);
        $total_records = mysqli_num_rows($result);
        if ( $total_records > 0 ) {
            // 成功登入, 指定Session變數
            $_SESSION['login_session'] = $account;
            header("Location: manager.php");
         } else {  // 登入失敗
            echo "<center><font color='red'>";
            echo "使用者名稱或密碼錯誤!<br/>";
            echo "</font>";
            $_SESSION["login_session"] = false;
         }
         mysqli_close($link);  // 關閉資料庫連接  
      }
    

?>


<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->

    <!-- Icon -->
    <div class="fadeIn first">
      <img src="" id="icon" alt="User Icon" />
    </div>

    <!-- Login Form -->
    <form class="login-form" action="memberlogin.php" method="post"> 
      <input type="text" id="login" class="fadeIn second" name="account" placeholder="login">
      <input type="password" id="password" class="fadeIn third" name="password" placeholder="password">
      <input type="submit" class="fadeIn fourth" value="Log In">
    </form>

    <!-- Remind Passowrd -->
    <div id="formFooter">
      <a class="underlineHover" href="#">Forgot Password?</a>
    </div>

  </div>
</div>
<?php } 
?>