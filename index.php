<?php
    session_start();
    include("header.php");
    
?>

<!DOCTYPE html>
<html>
    <title>Antinna blog index</title>
    
<section class="banner" id="banner">
    <div class="content">
        <h3>explore the nature</h3>
        <p>生活娛樂開開心心快快樂樂</p>
        <a href="#" class="btn">我的部落格</a>
    </div>

</section>
<?php
include("dbcon.php");
$sql = "SELECT * FROM total ORDER BY id desc";
mysqli_set_charset($link, 'utf8');
$result = mysqli_query($link, $sql);
$_SESSION['select'] = 'total';
?>

<!--post section start -->

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
        <?php } ?>


    </div>
    <?php
        include("profile.php")
    ?>

</section>






<!--post section end -->

















<script src="js/script.js"></script>
</body>

</html>