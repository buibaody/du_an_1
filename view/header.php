<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->

<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>Trang chủ</title>
    <!-- Meta tag Keywords -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8" />
    <meta name="keywords" content="Bootie Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script>
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!-- //Meta tag Keywords -->

    <!-- Custom-Files -->
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/chitietsp.css">
    <!-- Bootstrap-Core-CSS -->
    <link rel="stylesheet" href="assets/css/style.css" type="text/css" media="all" />
    <!-- Style-CSS -->
    <!-- font-awesome-icons -->
    <link href="assets/css/font-awesome.css" rel="stylesheet">

    <!-- //font-awesome-icons -->
    <!-- /Fonts -->
    <link href="//fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Source+Sans+Pro:200,200i,300,300i,400,400i,600,600i,700,700i,900" rel="stylesheet">
    <!-- //Fonts -->

</head>

<body>

    <!-- mian-content -->
    <div class="main-banner" id="home">
        <!-- header -->
        <header class="header">
            <div class="container-fluid px-lg-5">
                <!-- nav -->
                <nav class="py-4">
                    <div id="logo">
                        <h1> <a href="index.php"><img src="assets/images/logo ui.jpg" alt=""></a></h1>
                    </div>

                    <label for="drop" class="toggle">Menu</label>
                    <input type="checkbox" id="drop" />
                    <ul class="menu mt-2">
                        <li class="active"><a href="index.php">Trang Chủ</a></li>
                        <li><a href="index.php?page=about">Giới Thiệu</a></li>
                        <li><a href="index.php?page=blog">Blog</a></li>
                        <li><a href="index.php?page=contact">Liên Hệ</a></li>
                        <li><a href="index.php?page=giohang">Giỏ Hàng</a></li> 
                        <!-- <li><a href="index.php?page=update">Update</a></li> -->
                        <li>
                            <!-- First Tier Drop Down -->
                            <label for="drop-2" class="toggle">Drop Down <span class="fa fa-angle-down" aria-hidden="true"></span> </label>
                            <a href="#">tài khoản <span class="fa fa-angle-down" aria-hidden="true"></span></a>
                            <input type="checkbox" id="drop-2" />
                            <ul>
                            <?php
                                if(isset($_SESSION['user'])&&($_SESSION['user']!="")&& isset($_SESSION['img'])&&($_SESSION['img']!="")){
                                    echo '<li><a class="user_log" href="index.php?page=userinfo"><img class="img-uploadus" src="uploadimg/'.$_SESSION['img'].'"><br>'.$_SESSION['name'].'</a></li>';
                                    echo '<li><a class="user_log" href="index.php?page=dangxuat">Đăng xuất</a></li>';
                                } else {
                                ?>
                                <li><a href="index.php?page=signup">Đăng ký</a></li>
                                <li><a href="index.php?page=login">Đăng nhập</a></li>
                                <?php } ?>
                            </ul> 
                        </li>
                    </ul>
                </nav>
                <!-- //nav -->
            </div>
        </header>
        <!-- //header -->
        <!--/banner-->
        <!-- <div class="banner-info">
            <p>Trending of the week</p>
            <h3 class="mb-4">Casual Shoes for Men</h3>
            <div class="ban-buttons">
                <a href="shop-single.html" class="btn">Shop Now</a>
                <a href="single.html" class="btn active">Read More</a>
            </div>
        </div> -->
        <!--// banner-inner -->

    </div>