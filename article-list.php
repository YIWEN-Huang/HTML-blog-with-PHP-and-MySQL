<?php 
include("header.php");
include("dbcon.php");
session_start();
?>
<html>
    <title>文章列表 - Antinna blog index</title>
 <section class="banner" id="banner">
 <form class="form-check-input" action="" method="post">
            <div class="content">
                <input type="submit" name="food" value="food" id="food">
                <label for="food">食物</label>
                <input type="submit" name="trevel" value="trevel" id="trevel">
                <label for="trevel">旅遊</label>
                <input type="submit" name="openbox" value="openbox" id="openbox">
                <label for="openbox">開箱</label>
                <input type="submit" name="photo" value="photo" id="photo">
                <label for="photo">圖片與影片</label>
            </div>
        </form>
        <?php
        if (isset($_POST['food'])) {
            $sql = "SELECT * FROM food ORDER BY id desc";
            mysqli_query($link, 'SET NAMES utf8');
            $result = mysqli_query($link, $sql);
            $_SESSION['select'] = 'food'; 
        } else if (isset($_POST['trevel'])) {
            $sql = "SELECT * FROM trevel ORDER BY id desc";
            
            mysqli_query($link, 'SET NAMES utf8');
            $result = mysqli_query($link, $sql);
            $_SESSION['select'] = 'trevel'; 
        }else if (isset($_POST['openbox'])) {
            $sql = "SELECT * FROM openbox ORDER BY id desc";
            mysqli_query($link, 'SET NAMES utf8');
            $result = mysqli_query($link, $sql);
            $_SESSION['select'] = 'openbox'; 
        }else if (isset($_POST['photo'])) {
            $sql = "SELECT * FROM photo ORDER BY id desc";
            mysqli_query($link, 'SET NAMES utf8');
            $result = mysqli_query($link, $sql);
            $_SESSION['select'] = 'photo'; 

        }else {
            $sql = "SELECT * FROM total ORDER BY id desc";
            mysqli_query($link, 'SET NAMES utf8');
            $result = mysqli_query($link, $sql);
            $_SESSION['select'] = 'total'; 
        }

        ?>

    </section>
 <section class="container-index" id="posts">
        <div class="posts-container">
        <?php while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) { ?>
                <div class="post">
                    <img src="uploads/<?php echo $row[4]; ?>" alt="" class="images">
                    <div class="date">
                        <i class="far fa-clock"></i>
                        <span><?php echo $row[3]; ?></span>
                    </div>
                    <h3 class="title"><?php echo $row[1]; ?></h3>
                    <p class="text"><?php echo  substr($row[2], 0, 150); ?></p>
                    <a href="single.php?id=<?php echo $row[0]; ?>"> Read more...</a>
                    <div class="links">
                        <a href="#" class="user">
                            <i class="far fa-user"></i>
                            <span>by admin</span>
                        </a>
                        <a href="#" class="icon">
                            <i class="far fa-comment"></i>
                            <span>(45)</span>
                        </a>
                        <a href="#" class="user">
                            <i class="far fa-share-square"></i>
                            <span>(29)</span>
                        </a>
                    </div>
                </div>
            <?php } ?>
       
        </div>
        
<?php
        include("profile.php")
    ?>
    </section>

    
    <script src="js/script.js"></script>

</body>

</html>