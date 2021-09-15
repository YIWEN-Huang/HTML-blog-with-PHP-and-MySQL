<!DOCTYPE html>
<html lang="zh">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Antinna blog index</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">

</head>

<body>

    <header class="header">
        <a href="manager.php" class="logo"><span>A</span>ntinna's blog</a>
        <nav class="navbar">

            <a href="profile.php">User: <?php  echo $_SESSION['login_session']; ?></a>


            <a href="select.php">新增文章</a>

            <a href="logout.php">登出</a>

        </nav>
        <div class="icons">
            <i class="fas fa-bars" id="menu-bars"></i>
            <i class="fas fa-search" id="search-icon"></i>
        </div>

        <form action="" class="search-form">
            <input type="search" name="" placeholder="search..." id="search-box">
            <label for="search-box" class="fas fa-search"></label>
        </form>
    </header>