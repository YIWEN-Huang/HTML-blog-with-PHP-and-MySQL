<?php
session_start();


include("dbcon.php");
include("header.php");

    

$id = $_GET['id'];
$select = $_SESSION['select'];
switch ($select) {
    case 'food':
        $sql = "SELECT * FROM food WHERE id='$id'";
        mysqli_query($link, 'SET NAMES utf8');
        $result = mysqli_query($link, $sql);
        $row = mysqli_fetch_array($result, MYSQLI_NUM);
        break;
    case 'trevel':
        $sql = "SELECT * FROM trevel WHERE id='$id'";
        mysqli_query($link, 'SET NAMES utf8');
        $result = mysqli_query($link, $sql);

        $row = mysqli_fetch_array($result, MYSQLI_NUM);
        break;
    case 'openbox':
        $sql = "SELECT * FROM openbox WHERE id='$id'";
        mysqli_query($link, 'SET NAMES utf8');
        $result = mysqli_query($link, $sql);

        $row = mysqli_fetch_array($result, MYSQLI_NUM);
        break;
    case 'photo':
        $sql = "SELECT * FROM photo WHERE id='$id'";
        mysqli_query($link, 'SET NAMES utf8');
        $result = mysqli_query($link, $sql);

        $row = mysqli_fetch_array($result, MYSQLI_NUM);
        break;



    case 'total':
        $sql = "SELECT * FROM total WHERE id='$id'";
        mysqli_query($link, 'SET NAMES utf8');
        $result = mysqli_query($link, $sql);
        $row = mysqli_fetch_array($result, MYSQLI_NUM);
        break;
}
?>
<html>
    <title><?php echo $row[1]; ?>- Antinna blog</title>

<title><?php echo $row[1]; ?></title>
<section class="banner" id="banner">
    <div class="content">
    </div>

</section>
<section class="container-index" id="posts">
    <div class="posts-container">

        <div class="post">
            <img src="uploads/<?php echo $row[4]; ?>" alt="" class="images">
            <div class="date">
                <span><?php echo $row[3]; ?></span>
            </div>
            <h3 class="title"><?php echo $row[1]; ?> </h3>
            <p class="text"><?php echo  $row[2]; ?></p>
            <div class="links">
                <a href="#" class="user">
                    <i class="far fa-user"></i>
                    <span>by <?php echo $row[5];?></span>
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


    </div>
    <?php
        include("profile.php")
    ?>

</section>




<!--post section end -->

















<script src="js/script.js"></script>
</body>

</html>