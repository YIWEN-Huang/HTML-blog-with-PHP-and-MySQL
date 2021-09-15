<?php
session_start();
if (isset($_SESSION['login_session'])) {
    include("member.php");
    $account = $_SESSION['login_session'];

?>

<?php    
  if(isset($_POST["Submit"])){
    $file = $_FILES['file'];
    $fileName = $_FILES['file']['name'];
    $fileTmp = $_FILES['file']['tmp_name'];
    $fileerror = $_FILES['file']['error'];
    $filesize = $_FILES['file']['size'];
    $filetype = $_FILES['file']['type'];
    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));
    $allowed = array("jpg", "png", "jepg");
    if(in_array($fileActualExt, $allowed)){
        $new_img_name = uniqid("IMG-",true).'.'.$fileActualExt;
        $img_upload_path = 'uploads/'.$new_img_name;
        move_uploaded_file($fileTmp, $img_upload_path);
    include("dbcon.php");
    include("total.php");
switch ($_SESSION['checkbox']){
    
    case 'food':
        $sql ="INSERT INTO food (title, text, img, account) 
           VALUES ('".$_POST["title"]."','".$_POST["article"]."','$new_img_name', '$account' )";
        break;
    case 'trevel':
            $sql ="INSERT INTO trevel (title, text, img, account) 
               VALUES ('".$_POST["title"]."','".$_POST["article"]."','$new_img_name', '$account' )";
            break;
    case 'photo':
                $sql ="INSERT INTO photo (title, text, img, account) 
                   VALUES ('".$_POST["title"]."','".$_POST["article"]."','$new_img_name', '$account' )";
                break;
    case 'openbox':
                    $sql ="INSERT INTO openbox (title, text, img, account) 
                       VALUES ('".$_POST["title"]."','".$_POST["article"]."','$new_img_name', '$account' )";
    break;

    }
    
    mysqli_query($link, 'SET NAMES utf8'); 
    if ( mysqli_query($link, $sql) ){ // 執行SQL指令
    echo "資料庫新增記錄成功, 影響記錄數: ". 
       mysqli_affected_rows($link) . "<br/>"; 
       header("Location: manager.php");
    }
    else{
    die("資料庫新增記錄失敗<br/>");
    mysqli_close($link);      // 關閉資料庫連接
        }
    }
}


?>

    <section class="banner-add" id="banner">
    <h1>現在類別 <?php  echo $_SESSION['checkbox'] ?></h1>

    </section>
    <section class="addnew">
        <div class="center-new">
            <h1>新增文章</h1>
            <form class="update-form" action="addnew.php" method="post" enctype="multipart/form-data">
                <div class="mb-3-new">
                    <label class="title">標題</label>
                    <input type="title" class="form-control" name="title">
                </div>
                <div class="mb-3-new">
                    <label class="article">文章內容</label>
                    <textarea class="article" rows="10" name="article"></textarea>
                </div>

                <div class="mb-3-new">
                    <input type="file" name="file">
                </div>
                <button type="submit" class="btn btn-primary" name="Submit">下一步</button>
            </form>
        </div>
        
        <a>img src="" alt="" class="img_text"</a>

    </section>

<?php } else {
    echo "非法登入!";
    exit();
}
?>